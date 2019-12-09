<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use App\House;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile    = User::findOrFail(Auth::user()->id);
        $house      = House::where('user_id', Auth::user()->id)->first();

        if(empty($profile->address) || empty($profile->phone))
            $profile = '';

        return view('home', compact('profile', 'house'));
    }
}
