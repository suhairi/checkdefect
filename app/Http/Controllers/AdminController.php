<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use PDF;
use Storage;
use Auth;
use Carbon\Carbon;
use File;
use Mail;

use App\Complaint;
use App\User;
use App\Report;
use App\House;

class AdminController extends Controller
{
    public function index() {

    	$reports = Report::where('sent', 1)->get();

    	return view('admin.index', compact('reports'));
    }

    // SUBMIT PDF
    public function submitPdf($id) {

        $complaints = Complaint::where('id', $id)->get();
        $complaint  = $complaints->first();
        $house      = House::where('id', $complaint->house_id)->first();
        $user       = User::where('id', $complaint->user_id)->first();
        $times      = Report::where('user_id', $user->id)->where('sent', 1)->count();
        
        $complaintsImages = $complaints->toArray();


        $pages = ceil(count($complaintsImages)/6) + 1;

        // Report 1
        $tarikh     = Carbon::today();
        $tarikh     = $tarikh->isoFormat('DMY');
        $fileName1   = $times . '_' . $tarikh . '_report1.pdf';
        $address    = explode(',', $user->address);

        $pdf = PDF::loadView('admin.reports.report1', [
            'complaints'        => $complaints, 
            'address'           => $address, 
            'user'              => $user, 
            'pages'             => $pages, 
            'complaintsImages'  => $complaintsImages
        ]);

        // Make Directory First
        $path = public_path() . '/pdf/' . $user->id;
        File::makeDirectory($path, $mode = 0777, true, true);
        $pdf->save($path . '/' . $fileName1);

        // Report 2
        $tarikh2     = Carbon::parse($house->valuation_date, 'UTC');
        $tarikh2     = $tarikh2->isoFormat('D/M/Y');        
        

        $fileName2    = $times . '_' . $tarikh . '_report2.pdf';
        $pdf = PDF::loadView('admin.reports.report2', [
            'complaint' => $complaint, 
            'user'      => $user, 
            'tarikh'    => $tarikh2, 
            'times'     => $times,
            'pages'     => $pages
        ]);
        $pdf->save($path . '/' . $fileName2);

        // Report 3
        $fileName3    = $times . '_' . $tarikh . '_report3.pdf';
        $pdf = PDF::loadView('admin.reports.report3', [
            'user'          => $user, 
            'house'         => $house, 
            'tarikh'        => $tarikh, 
            'times'         => $times, 
            'complaints'    => $complaints
        ]);
        $pdf->save($path . '/' . $fileName3);

        // return view('admin.reports.report3', compact('user', 'house', 'tarikh', 'times', 'complaints'));

        /** Update Table Report 'status' = 1 */
        $report = Report::where('id', $id)->first();
        $report->status = 1;
        $report->pages  = $pages;
        $report->save();

        /** Send email attachment **/
        // Notification email to checkdefectrumah.com admin
        $userName   = $user->name;
        $userEmail  = $user->email;

        $to_name = $user->name;
        $to_email = 'suhairi81@gmail.com';
        
        $info = [
            'name'      => $user->name, 
            'body'      => 'Report of House Defect <br />Please check the attachment',
            'userName'  => $userName,
            'userEmail' => $userEmail,
        ];

        /**
        Mail::send('emails.report', $info, function($message) use ($to_name, $to_email, $path, $fileName1, $fileName2, $fileName3) {
            $message->to($to_email, $to_name)
            ->subject('checkdefectrumah: Laporan Kerosakan.');
            $message->from('admin@checkdefectrumah.com', 'Report Sent.');
            $message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
            $message->attach($path . '/' . $fileName1, ['as' => 'report1.pdf', 'mime' => 'application/pdf']);
            $message->attach($path . '/' . $fileName2, ['as' => 'report2.pdf', 'mime' => 'application/pdf']);
            $message->attach($path . '/' . $fileName3, ['as' => 'report3.pdf', 'mime' => 'application/pdf']);
        });
        */
        $success = Session::flash('Email has been sent');


        return redirect()->back();
        
    }

    public function users() {

    	$users = User::all();

    	return view('admin.reports.users', compact('users'));
    }

    public function listFiles($id) {

        $path = public_path('pdf\\' . $id);
        // return $path;
        $files = scandir($path, SCANDIR_SORT_DESCENDING);


        dd($files[0]);
    }


}
