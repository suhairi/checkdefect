<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Complaint;

class ReportController extends Controller
{
    public function index() {

    	$complaints = Complaint::orderBy('status', 'asc')->get();


    	return view('admin.reports.index', compact('complaints'));
    }
}
