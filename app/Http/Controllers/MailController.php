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

		// Notification email to checkdefectrumah.com admin
        $no_of_users = User::all()->count();
        $no_of_users++;
        $userName   = Auth::user()->name;
        $userEmail  = Auth::user()->email;

        $to_name = 'Khairul Azuar';
        $to_email = 'kowndkrul@gmail.com';
        
        $info = [
            'name'      => 'Admin', 
            'body'      => 'A user has been registered to your portal.',
            'userName'  => $userName,
            'userEmail' => $userEmail,
            'noOfUsers' => $no_of_users
        ];
        
        Mail::send('emails.mail', $info, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Registration Notification Mail');
            $message->from('admin@checkdefectrumah.com', 'Notification Mail');
            $message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
            $message->bcc('caliphdynamics@gmail.com', 'Suhairi Abdul Hamid.');
        });

		Session::flash('success', 'Email has been sent.');

		return redirect()->route('home');
	}


}
