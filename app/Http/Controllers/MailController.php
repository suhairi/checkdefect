<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Mail;
use App\User;

class MailController extends Controller
{

	public function index() {

        $id = 3;

		// Notification email to checkdefectrumah.com admin
        $no_of_users = User::all()->count();
        $no_of_users++;
        $userName   = Auth::user()->name;
        $userEmail  = Auth::user()->email;

        $to_name = 'Khairul Azuar';
        $to_email = 'suhairi81@gmail.com';
        
        $info = [
            'name'      => 'Admin', 
            'body'      => 'Herewith attached the report.',
            'userName'  => $userName,
            'userEmail' => $userEmail,
            'noOfUsers' => $no_of_users
        ];

        $path = public_path('pdf\\' . $id);
        // return $path;
        $files = scandir($path, SCANDIR_SORT_DESCENDING);


        // dd($files[0]);

        $path .= '/' .$files[0];

        // return $path;
        
        Mail::send('emails.report', $info, function($message) use ($to_name, $to_email, $path) {
            $message->to($to_email, $to_name)
            ->subject('House Defect Report');
            $message->from('admin@checkdefectrumah.com', 'Notification Mail');
            $message->cc(['kowndkrul@gmail.com', 'caliphdynamics@gmail.com']);
            $message->attach($path);

        });

		Session::flash('success', 'Report has been sent.');

		return redirect()->route('home');
	}


}
