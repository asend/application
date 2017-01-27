<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
	public function getHome(){
    	
    	$data = Role::all();
    	return view('profil.index')->with('data',$data);
    }

    public function getForm(){
    	return view('profil.new');
    }

    public function postStore(Request $request){
    	$this->validate($request, [
			'name'=>'required|min:3|max:60|alpha'
			]);

    	$data=[
    		'name'=>Input::get('name'),
    		'description'=>Input::get('description')
    	];

    	//Adding Role to table

    	$responce=Role::create($data);
    	
    	if($responce){
    		return redirect('/new')->with('success', 'Role Created Successfully');
    	}

    }

    public function getEdit($id){
        $data=Role::find($id);
        return view('profil.edit')->with('data',$data);

    }

    public function postUpdate(Request $request,$id){
        
        $this->validate($request, [
            'name'=>'required|min:3|max:60'
            ]);

        $data=[
            'name'=>Input::get('name'),
            'description'=>Input::get('description')
        ];

        //Updating task to table

        $responce=Role::find($id)->update($data);
        
        if($responce){
            return redirect('/profil')->with('success', 'Role Updated Successfully');
        }

        

        
    }
}


