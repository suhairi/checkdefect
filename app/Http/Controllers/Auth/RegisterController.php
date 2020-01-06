<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Notification email to checkdefectrumah.com admin
        $no_of_users = User::all()->count();
        $no_of_users++;
        $userName   = $data['name'];
        $userEmail  = $data['email'];

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
            ->subject('checkdefectrumah: User Registration');
            $message->from('admin@checkdefectrumah.com', 'User Registered.');
            $message->cc('suhairi81@gmail.com', 'Suhairi Abdul Hamid.');
        });

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
