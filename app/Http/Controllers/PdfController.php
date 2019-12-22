<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App;

class PdfController extends Controller
{
    public function index() {

    	$pdf = App::make('dompdf.wrapper');
    	$pdf->loadHTML('<h1>Text</h1>');

    	return $pdf->stream();

    }


}
