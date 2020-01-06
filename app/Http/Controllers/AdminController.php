<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use PDF;
use Storage;
use Auth;
use Carbon\Carbon;
use File;

use App\Complaint;
use App\User;
use App\Report;
use App\House;

class AdminController extends Controller
{
    public function index() {

    	$reports = Report::where('sent', 1)->get();

    	return view('admin.index', compact('reports'));
    }

    // SUBMIT PDF
    public function submitPdf($id) {

        // return $id;

        // Page 1
        // return view('admin.reports.report1');

        //Page 2
        $complaints = Complaint::where('report_id', $id)->get();
        $complaint  = $complaints->first();
        // return $complaint;
        $house      = House::where('id', $complaint->house_id)->first();
        $tarikh     = Carbon::parse($house->valuation_date, 'UTC');
        $tarikh     = $tarikh->isoFormat('D/M/Y');
        $user       = User::where('id', $complaint->user_id)->first();
        $times      = Report::where('user_id', $user->id)->where('sent', 1)->count();

        // return view('admin.reports.report2', compact('complaints', 'user'));

        // Report 3

        return view('admin.reports.report3', compact('user', 'house', 'tarikh', 'times', 'complaints'));

        return $id;
    }


    public function report2($id) {

    	$complaints = Complaint::where('user_id', $id)->get();
    	$user = User::where('id', $id)->first();
    	
    	$tarikh = Carbon::today();
    	$tarikh = $tarikh->isoFormat('DMY');
    	$fileName = $user->id . '_' . $tarikh . '_report2.pdf';

    	$pdf = PDF::loadView('admin.reports.report2',['complaints' => $complaints]);

    	// Make Directory First
    	$path = public_path() . '/pdf/' . $user->id;
    	File::makeDirectory($path, $mode = 0777, true, true);

    	$pdf->save($path . '/' . $fileName);
    	return $pdf->download('reports2.pdf');

    }

    public function report3($id) {

        $complaints = Complaint::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        
        $tarikh = Carbon::today();
        $tarikh = $tarikh->isoFormat('DMY');
        $fileName = $user->id . '_' . $tarikh . '_report3.pdf';

        return view('admin.reports.report3', compact('complaints', 'user'));

        $pdf = PDF::loadView('admin.reports.report3',['complaints' => $complaints]);

        // Make Directory First then save into the dir.
        $path = public_path() . '/pdf/' . $user->id;
        File::makeDirectory($path, $mode = 0777, true, true);

        $pdf->save($path . '/' . $fileName);
        return $pdf->download('reports3.pdf');

    }

    public function users() {

    	$users = User::all();

    	return view('admin.reports.users', compact('users'));
    }

    public function listFiles($id) {

        $path = public_path('pdf\\' . $id);
        // return $path;
        $files = scandir($path, SCANDIR_SORT_DESCENDING);


        dd($files[0]);
    }


}
