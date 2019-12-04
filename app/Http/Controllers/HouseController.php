<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use Auth;
use Validator;

class HouseController extends Controller
{
    

    public function index() {

    	$houses = House::where('id', Auth::user()->id)->get();

    	return view('house.index', compact('houses'));
    }

    public function create() {
    	return view('house.create');
    }

    public function store(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'name' 			=> 'required|min:3|max:30',
    		'address'		=> 'required|min:10',
    		'dev_name'		=> 'required|min:3',
    		'dev_address'	=> 'required|min:10',
    		'dev_phone'		=> 'required|numeric|min:9'
    	]);

    	if($validation->fails()) {

    		return redirect('house/create')
    				->withError($validation)
    				->withInput();
    	}


    	House::create([
    		'name'			=> $request->name,
    		'user_id'		=> Auth::user()->id,
    		'address'		=> $request->address,
    		'dev_name'		=> $request->dev_name,
    		'dev_address'	=> $request->dev_address,
    		'dev_phone'		=> $request->dev_phone
    	]);

    	return redirect()->route('house');
    }


    public function destroy($id) {

    	$house = House::findOrFail($id);
    	$house->delete();

    	return redirect()->route('house');
    }
}
