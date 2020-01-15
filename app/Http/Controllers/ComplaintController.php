<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Validator;
use Carbon\Carbon;
use Mail;

use App\House;
use App\Area;
use App\AreaDetail;
use App\Type;
use App\TypeDetail;
use App\Complaint;
use App\Defect;
use App\Report;
use App\User;




class ComplaintController extends Controller
{
    public function complaint() {

        $houses = House::where('user_id', Auth::user()->id)->pluck('name', 'id');
        $areas  = Area::pluck('name', 'id');

        if(sizeof($houses) <= 0) {
            Session::flash('failed', 'Tiada maklumat rumah aduan. Sila rekod/kemaskini');
            return redirect('home');
        }

        $noImage = Complaint::where('user_id', Auth::user()->id)->count() + 1;

        return view('house.complaint', compact('houses', 'areas', 'noImage'));
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

        // Store
        $notes = '';
        if(is_null($request->notes))
            $notes = 'null';

        // Create a report if does not have one that status is not done
        $report = Report::where('user_id', $userId)->where('house_id', $request->house_id)->where('sent', 0)->first();

        if(empty($report)) {

            $report = Report::create([
                    'user_id'   => $userId,
                    'house_id'  => $request->house_id,
                    'pages'     => 0,
                    'sent'      => 0,
                    'status'    => 0
                ]);
        }

        Complaint::create([
            'house_id'          => $request->house_id,
            'user_id'           => Auth::user()->id,
            'area_id'           => $request->area_id,
            'area_detail_id'    => $request->area_detail_id,
            'defect_id'         => $request->defect_id,
            'report_id'         => $report->id,
            'image'             => $imageName,
            'notes'             => $notes
        ]);

        $request->image->move(public_path('/images'), $imageName);
        Session::flash('success', 'Aduan telah berjaya direkod.');

    	return redirect()->back();
    }

    public function list() {

        $reports = Report::where('user_id', Auth::user()->id)->get();

        return view('reports.index', compact('reports'));
    }

    public function sent($id) {

        $report = Report::findOrFail($id);

        $report->sent = 1;
        $report->save();

        Session::flash('success', 'Aduan telah berjaya dihantar dan akan diambil tindakan segera.');

        $user = User::where('id', Auth::user()->id)->first();
        
        // $sms_to     = '6'.$user->phone;
        $sms_to     = '601162528520';
        $sms_msg    = "checkdefect.com : Terima kasih. Aduan anda akan diambil tindakan setelah kami menerima bayaran.";

        // return $user;

        // Send SMS Notification
        // gw_send_sms("APIQ9DNB2E8R7", "APIQ9DNB2E8R7EK783", "Admin", $user->phone, $message);
        $query_string = "api.aspx?apiusername=APIQ9DNB2E8R7&apipassword=APIQ9DNB2E8R7EK783";
        $query_string .= "&senderid=onewaysms&mobileno=".rawurlencode($sms_to);
        $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
        $url = "http://gateway.onewaysms.com.my:10001/".$query_string;

        // $fd = @implode ('', file ($url));
          

        // Notification mail of the submitting.

        $no_of_users = User::all()->count();
        $no_of_users++;

        $to_name    = 'Khairul Azuar';
        $to_email   = 'kowndkrul@gmail.com';
        $userName   = Auth::user()->name;
        $userEmail  = Auth::user()->email;
        $userPhone  = Auth::user()->phone;

        
        $info = [
            'name'      => 'Admin', 
            'body'      => 'A complaint has been submitted.',
            'userName'  => $userName,
            'userEmail'     => $userEmail,
            'userPhone'     => $userPhone
        ];
        
        Mail::send('emails.complaintsubmit', $info, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('checkdefectrumah.com : User Registration');
            $message->from('admin@checkdefectrumah.com', 'Complaint Submitted.');
            $message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
        });


        return redirect()->back();
    }

    public function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
    {           
        $query_string = "api.php?apiusername=".$user."&apipassword=".$pass;
        $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
        $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
        $url = "http://gateway.onewaysms.com.my:10001/".$query_string;       
        $fd = @implode ('', file ($url));      
        if ($fd) {                       
            if ($fd > 0) {
                Print("MT ID : " . $fd);
                $ok = "success";
            }        
            else {
                print("Please refer to API on Error : " . $fd);
                $ok = "fail";
            }

        } else {                       
            // no contact with gateway                      
            $ok = "fail";       
        }           
        return $ok;  
    }

}
