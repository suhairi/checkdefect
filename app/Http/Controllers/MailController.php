<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Mail;
use App\User;

class MailController extends Controller
{

	public function index() {

		$no_of_users = User::all()->count();

	    $to_name = 'Suhairi Abdul Hamid';
		$to_email = 'caliphdynamics@gmail.com';
		
		$data = [
			'name' => 'Admin', 
			'body' => 'A user has been registered to your portal.', 
			'noOfUsers' => $no_of_users
		];

		// return $data;
		
		Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
			$message->to($to_email, $to_name)
			->subject('Registration Notification Mail');
			$message->from('admin@checkdefectrumah.com', 'Notification Mail');
			$message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
		});

		Session::flash('success', 'Email has been sent.');

		return redirect()->route('home');
	}


}
