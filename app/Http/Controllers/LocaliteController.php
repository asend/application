<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Localite;

use Illuminate\Support\Facades\Input;


class LocaliteController extends Controller
{
    public function getForm(){
    	$regions = Localite::all()->where('type', 'Region');
    	return view('localite.new')->with('regions', $regions);
    }

    public function postForm(Request $request){
    	if (Input::get('type') == "Departement") {
    		$parent_id = Input::get('region');
    	}
    	if (Input::get('type') == "Commune") {
    		$parent_id = Input::get('departement');
    	}
        if (Input::get('type') == "Comite") {
            $parent_id = Input::get('commune');
        }
    	if (Input::get('type') == "Region") {
    		$parent_id = 0;
    	}
    	$data=[
    		'name'=>Input::get('name'),
    		'type'=>Input::get('type'),
    		'parent_id'=>$parent_id
    	];

    	//Adding Localite to table

    	$responce=Localite::create($data);
    	
    	if($responce){
    		return redirect('/localite')->with('success', 'Localite cree avec success');
    	}
    	//return $data;//$request->all();
    }
}
