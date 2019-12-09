<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\House;
use Auth;
use Validator;
use App\Type;
use App\TypeDetail;
use Session;


class HouseController extends Controller
{
    

    public function index() {

    	$houses = House::where('id', Auth::user()->id)->get();

    	return view('house.index', compact('houses'));
    }

    public function create() {

        $types = Type::all('name', 'id');

    	return view('house.create', compact('types'));
    }

    public function get_by_type(Request $request) {

        $details = TypeDetail::where('type_id', $request->value)->get();

        $output = "<option value=''>Pilih Detail Jenis Rumah...</option>";

        foreach($details as $detail) {
            $output .= "<option value='". $detail->id ."'>". $detail->name ."</option>";
        }

        echo $output;

    }

    public function store(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'name' 			=> 'required|min:3|max:30',
    		'address'		=> 'required|min:10',
    		'dev_name'		=> 'required|min:3',
    		'dev_address'	=> 'required|min:10',
    		'dev_phone'		=> 'required|numeric|min:9'
    	]);

        // return $request->all();

    	if($validation->fails()) {

    		return redirect('house/create')
    				->withError($validation)
    				->withInput();
    	}


    	House::create([
    		'name'			=> $request->name,
    		'user_id'		=> Auth::user()->id,
    		'address'		=> $request->address,
    		'dev_name'		=> $request->dev_name,
    		'dev_address'	=> $request->dev_address,
    		'dev_phone'		=> $request->dev_phone,
            'type_id'       => $request->type_id,
            'type_detail_id'=> $request->type_detail_id,
            'valuation_date'=> $request->valuation_date
    	]);

    	return redirect()->route('house');
    }

    public function destroy($id) {

    	$house = House::findOrFail($id);
    	$house->delete();

    	return redirect()->route('house');
    }

    public function complaint() {

        $houses = House::where('user_id', Auth::user()->id)->pluck('name', 'id');

        if(sizeof($houses) <= 0) {
            Session::flash('failed', 'Tiada maklumat rumah aduan. Sila rekod/kemaskini');
            return redirect('home');
        }

        return view('house.complaint', compact('houses'));
    }

    public function get_house_info(Request $request) {

        $house = House::where('id', $request->id)->first();

        $output  = "<div class='card'>";
        $output .= "<div class='card-header'><h4>Maklumat Rumah Aduan</h4></div>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<tr><th>Alamat Rumah</th><td>". $house->address ."</td></tr>";
        $output .= "<tr><th>Jenis/Detail Rumah</th><td>". $house->type->name ."<br /> ". $house->type_detail->name ."</td></tr>";
        $output .= "<tr><th>Maklumat Pemaju</th><td>". $house->dev_name ." <br />". $house->dev_address ."<br />". $house->dev_phone ."</td></tr>";
        $output .= "</table>";
        $output .= "</div>";



        return $output;
    }
}
