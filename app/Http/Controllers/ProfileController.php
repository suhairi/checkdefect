<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function index() {

    	return view('users.profile');
    }

    public function edit(Request $request) {

    	$profile = User::find(Auth::user()->id);

    	return view('users.edit', compact('profile'));
    }

    public function update(Request $request) {

        // BUG HERE
        // Validate phone number format

    	$profile = User::find(Auth::user()->id);

    	$profile->address = $request->address;
    	$profile->phone = $request->phone;
    	$profile->save();



    	return redirect('users/profile');

    }
}
