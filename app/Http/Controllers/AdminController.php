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

class AdminController extends Controller
{
    public function index() {

    	$complaints = Complaint::all();

    	return view('admin.index', compact('complaints'));
    }

    public function report2($id) {

    	$complaints = Complaint::where('user_id', $id)->get();
    	$user = User::where('id', $id)->first();
    	
    	$tarikh = Carbon::today();
    	$tarikh = $tarikh->isoFormat('DMY');
    	$fileName = $user->id . '_' . $tarikh . '.pdf';

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
        $fileName = $user->id . '_' . $tarikh . '.pdf';

        $pdf = PDF::loadView('admin.detailAduan',['complaints' => $complaints]);

        // Make Directory First
        $path = public_path() . '/pdf/' . $user->id;
        File::makeDirectory($path, $mode = 0777, true, true);

        $pdf->save($path . '/' . $fileName);
        return $pdf->download('reports2.pdf');

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
