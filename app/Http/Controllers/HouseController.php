<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Validator;

use App\House;
use App\Type;
use App\TypeDetail;
use App\Area;
use App\AreaDetail;


class HouseController extends Controller
{
    

    public function index() {

    	$houses = House::where('user_id', Auth::user()->id)->get();

    	return view('house.index', compact('houses'));
    }

    public function create() {

        $types = Type::all('name', 'id');

    	return view('house.create', compact('types'));
    }

    public function get_by_type(Request $request) {

        $details = TypeDetail::where('type_id', 1)->get();

        $output = "<option value=''>Pilih Detail Jenis Rumah...</option>";

        foreach($details as $detail) {
            $output .= "<option value='". $detail->id ."'>". $detail->name ."</option>";
        }

        echo $output;

    }

    public function store(Request $request) {


        $this->validate($request, [
            'name'          => 'required|min:3|max:30',
            'address'       => 'required|min:10',
            'dev_name'      => 'required|min:3'
        ]);

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

    public function edit($id) {

        $house = House::findOrFail($id);
        $types = Type::all('name', 'id');

        return view('house.edit', compact('house', 'types'));
    }

    public function update(Request $request) {

        $validation = Validator::make($request->all(), [
            'name'          => 'required|min:3|max:30',
            'address'       => 'required|min:10',
            'dev_name'      => 'required|min:3'
        ]);

        if($validation->fails()) {

            return redirect('house/create')
                    ->withError($validation)
                    ->withInput();
        }

        $house = House::findOrFail($request->id);

        $house->name           = $request->name;
        $house->address        = $request->address;
        $house->dev_name       = $request->dev_name;
        $house->dev_address    = $request->dev_address;
        $house->dev_phone      = $request->dev_phone;
        $house->type_id        = $request->type_id;
        $house->type_detail_id = $request->type_detail_id;
        $house->valuation_date = $request->valuation_date;
        $house->save();

        return redirect()->route('house');
    }
    
}
