<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Complaint;

class AdminController extends Controller
{
    public function index() {

    	$complaints = Complaint::all();

    	return view('admin.index', compact('complaints'));
    }

    public function detailAduan($id) {

    	$complaints = Complaint::where('user_id', $id)->get();

    	return view('admin.detailAduan', compact('complaints'));
    }
}
