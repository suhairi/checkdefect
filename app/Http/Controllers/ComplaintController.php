<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\House;
use App\Area;
use App\AreaDetail;
use App\Type;
use App\TypeDetail;

class ComplaintController extends Controller
{
    public function complaint() {

        $houses = House::where('user_id', Auth::user()->id)->pluck('name', 'id');
        $areas  = Area::pluck('name', 'id');

        if(sizeof($houses) <= 0) {
            Session::flash('failed', 'Tiada maklumat rumah aduan. Sila rekod/kemaskini');
            return redirect('home');
        }

        return view('house.complaint', compact('houses', 'areas'));
    }

    public function get_house_info(Request $request) {

        $house = House::where('id', $request->id)->first();

        // return $house->type->name;

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

    public function get_area_detail(Request $request) {

        $area_details = AreaDetail::where('area_id', $request->id)->get();

        $output = "<option value=''>Detail Ruang...</option>";

        foreach($area_details as $details) {
            $output .= "<option value='". $details->id ."'>". $details->name ."</option>";
        }


        return $output;
    }

    public function store(Request $request) {

    	return $request->all();
    }





}
