<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Validator;
use Carbon\Carbon;

use App\House;
use App\Area;
use App\AreaDetail;
use App\Type;
use App\TypeDetail;
use App\Complaint;
use App\Defect;




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

        $house      = House::where('id', $request->id)->first();
        $complaints = Complaint::where('user_id', Auth::user()->id)->get();

        $listOfComplaints = '';

        if(empty($complaints)) {
            $listOfComplaints = "<tr><td colspan='3'><font color='red'>Tiada aduan bagi rumah ini.</td></tr>";
        } else {
            foreach($complaints as $complaint) {
                $listOfComplaints .= "<tr><td>" . $complaint->area->name . "</td><td>" . $complaint->area_detail->name . "</td><td>" . $complaint->defect->name . "</td></tr>";
            }
        }

        // return $house->type->name;

        $output  = "<div class='card'>";
        $output .= "<div class='card-header'><h4>Maklumat Rumah Aduan</h4></div>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<tr><th>Alamat Rumah</th><td>". $house->address ."</td></tr>";
        $output .= "<tr><th>Jenis/Detail Rumah</th><td>". $house->type->name ."<br /> </td></tr>";
        $output .= "<tr><th>Maklumat Pemaju</th><td>". $house->dev_name ." <br />". $house->dev_address ."<br />". $house->dev_phone ."</td></tr>";
        $output .= "</table>";
        $output .= "</div>";

        $output  .= "<div class='card'>";
        $output .= "<div class='card-header'><h4>Maklumat Aduan</h4></div>";
        $output .= "<table class='table table-bordered'>";
        $output .= "<tr><th>Area</th><th>Area Detail</th><th>Kerosakan</th></tr>";
        $output .= $listOfComplaints;
        $output .= "</table>";
        $output .= "</div>";

        return $output;
    }

    public function get_area_detail(Request $request) {

        $area_details = AreaDetail::where('area_id', $request->id)->get();

        $output = "<option id='area_detail' value=''>Detail Ruang...</option>";

        foreach($area_details as $details) {
            $output .= "<option value='". $details->id ."'>". $details->name ."</option>";
        }


        return $output;
    }

    public function get_defect(Request $request) {

        $defects = Defect::where('area_id', $request->id)->get();

        $output = "<option id='defect' value=''>Detail Kerosakan...</option>";

        foreach($defects as $defect) {
            $output .= "<option value='". $defect->id ."'>". $defect->name ."</option>";
        }


        return $output;

    }

    public function store(Request $request) {



        $date = Carbon::today();
        $date = $date->isoFormat('YMd');
        $userId = Auth::user()->id;
        $imageCount = Complaint::where('id', $userId)->get()->count();
        $imageCount++;
        
        $this->validate($request, [
            'house_id'      => 'required|integer',
            'area_id'       => 'required|integer',
            'area_detail_id'=> 'required|integer',
            'defect_id'     => 'required|integer',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'          
        ]);

        $imageName  = Auth::user()->id . '_' . $date . '_' . $imageCount . '.' . $request->image->getClientOriginalExtension();
        // dd($request->all());

        // Store

        if(is_null($request->notes))
            $notes = 'null';

        Complaint::create([
            'house_id'          => $request->house_id,
            'user_id'           => Auth::user()->id,
            'area_id'           => $request->area_id,
            'area_detail_id'    => $request->area_detail_id,
            'defect_id'         => $request->defect_id,
            'image'             => $imageName,
            'status'            => false,
            'notes'             => $notes

        ]);

        $request->image->move(public_path('/images'), $imageName);
        // $request->image->save();
        Session::flash('success', 'Aduan telah berjaya direkod.');


    	return redirect()->back();
    }





}
