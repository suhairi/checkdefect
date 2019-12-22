<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Mail;

class MailController extends Controller
{
    $to_name = "Suhairi Abdul Hamid";
	$to_email = "caliphdynamics@gmail.com";

	$data = array('name'=>'Check Defect System(sender_name)', 'body' => 'A test mail');

	Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
		$message->to($to_email, $to_name)
				->subject('Laravel Test Mail');
		$message->from('SENDER_EMAIL_ADDRESS','Test Mail');
	});


	Session::flash('success', 'Email has been sent.');

	return redirect()->route('home');


}
