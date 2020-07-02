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

    	$reports   = Report::all();

        // error when user been deleted

    	return view('admin.index', compact('reports'));

    }

    public function users() {

        $users = User::all();

        return view('admin.reports.users', compact('users'));
    }

    public function register() {

        return view('admin.register');
    }

    public function postRegister(Request $request) {

        $this->validate($request, [
            'fullName'      => 'required|min:3|max:30',
            'email'         => 'required|email|min:10',
            'password'      => 'required|min:5',
            'noPhone'       => 'required|numeric|min:10'
        ]);

        User::create([
            'name'          => ucwords($request->fullName),
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'phone'         => $request->noPhone
        ]);

        // Notification mail of the submitting.

        $no_of_users = User::all()->count();
        $no_of_users++;

        $to_name        = ucwords($request->fullName);
        $to_email       = $request->email;
        $userName       = ucwords($request->fullName);
        $userEmail      = $request->email;
        $userPhone      = $request->noPhone;
        $userPassword   = $request->password;

        
        $info = [
            'name'          => $userName, 
            'body'          => 'Pengguna baru.',
            'userName'      => $userName,
            'userEmail'     => $userEmail,
            'userPhone'     => $userPhone,
            'userPassword'  => $userPassword
        ];
        
        Mail::send('emails.newUser', $info, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('checkdefectrumah.com : Pengguna Baru');
            $message->from('admin@checkdefectrumah.com', 'Pendaftaran Baru.');
            $message->cc('checkdefectrumah.com@gmail.com', 'Admin Check Defect Rumah.');
            $message->bcc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
        });

        Session::flash('success', 'Pendaftaran pengguna baru berjaya.');

        return redirect()->back();

        
    }

    /* ########### */
    /** SUBMIT PDF */
    /* ########### */

    public function submitPdf($id) {

        $report     = Report::findOrFail($id);
        $complaints = Complaint::where('user_id', $report->user_id)->get();
        $complaint  = $complaints->first();
        $house      = House::where('id', $report->house_id)->first();
        $user       = User::where('id', $report->user_id)->first();
        $times      = Report::where('user_id', $user->id)->where('sent', 1)->count();
        
        $complaintsImages = $complaints->toArray();

        $pages = ceil(count($complaintsImages)/6);

        // ####################
        //       Report 1
        // ####################
        $tarikh             = Carbon::today();
        $tarikh             = $tarikh->isoFormat('DMY');
        $fileName1          = $times . '_' . $tarikh . '_report1.pdf';
        $address            = explode(',', $user->address);

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

        // ####################
        //       Report 2
        // ####################
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


        // ####################
        //       Report 3
        // ####################
        $tarikh3      = Carbon::today();
        $tarikh3     = $tarikh3->isoFormat('D/M/Y');
        $fileName3   = $times . '_' . $tarikh . '_report3.pdf';

        // return view('admin.reports.report3', compact('user', 'house', 'tarikh', 'times', 'complaints'));
        $pdf = PDF::loadView('admin.reports.report3', [
            'user'          => $user, 
            'house'         => $house, 
            'tarikh'        => $tarikh3, 
            'times'         => $times + 1, 
            'complaints'    => $complaints
        ]);

        $pdf->save($path . '/' . $fileName3);

        // return view('admin.reports.report3', compact('user', 'house', 'tarikh', 'times', 'complaints'));

        /** Update Table Report 'status' = 1 */
        $report = Report::where('id', $id)->first();
        $report->status = 1;
        $report->pages  = $pages;
        $report->sent   = 1;
        $report->save();

        // return $pdf->download('report 3.pdf');

        /** Send email attachment **/
        // Notification email to checkdefectrumah.com admin
        $userName   = $user->name;
        $userEmail  = $user->email;

        $to_name = $user->name;
        $to_email = $userEmail;
        
        $info = [
            'name'      => $user->name, 
            'body'      => 'Report of House Defect <br />Please check the attachment',
            'userName'  => $userName,
            'userEmail' => $userEmail,
        ];

        
        Mail::send('emails.report', $info, function($message) use ($to_name, $to_email, $path, $fileName1, $fileName2, $fileName3) {
            $message->to($to_email, $to_name)
            ->subject('checkdefectrumah: Laporan Kerosakan.');
            $message->from('admin@checkdefectrumah.com', 'Report Sent.');
            $message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
            $message->attach($path . '/' . $fileName1, ['as' => 'report1.pdf', 'mime' => 'application/pdf']);
            $message->attach($path . '/' . $fileName2, ['as' => 'report2.pdf', 'mime' => 'application/pdf']);
            $message->attach($path . '/' . $fileName3, ['as' => 'report3.pdf', 'mime' => 'application/pdf']);
        });
        
        $success = Session::flash('Email has been sent');


        return redirect()->back();
        
    }

    public function listFiles($id) {

        $path = public_path('pdf\\' . $id);
        // return $path;
        $files = scandir($path, SCANDIR_SORT_DESCENDING);


        dd($files[0]);
    }


}
