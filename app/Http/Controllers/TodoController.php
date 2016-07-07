<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use Illuminate\Support\Facades\Input;
class TodoController extends Controller
{
    public function getHome(){
    	
    	$data = Task::all();
    	return view('home')->with('data',$data);
    }

    public function postStore(Request $request){
    	
    	$this->validate($request, [
			'name'=>'required|min:3|max:60|alpha',
			'status'=>'required|max:50'
			]);

    	$data=[
    		'name'=>Input::get('name'),
    		'status'=>Input::get('status')
    	];

    	//Adding task to table

    	$responce=Task::create($data);
    	
    	if($responce){
    		return redirect('/')->with('success', 'Task Created Successfully');
    	}

    	
    	
    }
 //======edit=============
    public function getEdit($id){
    		//first find the id 
    	$data=Task::find($id);
    	return view('edit')->with('data',$data);
    	}

  //===============Update===========================

    public function postUpdate(Request $request,$id){
    	
    	$this->validate($request, [
			'name'=>'required|min:3|max:60',
			'status'=>'required|max:50'
			]);

    	$data=[
    		'name'=>Input::get('name'),
    		'status'=>Input::get('status')
    	];

    	//Updating task to table

    	$responce=Task::find($id)->update($data);
    	
    	if($responce){
    		return redirect('/')->with('success', 'Task Updated Successfully');
    	}

    	

    	
    }

    //============Deleting Task==============

    public function postDestroy($id){
    	$response = Task::find($id)->delete();

    	if($response){
    		return redirect('/')->with('success', 'Task Deleted Successfully');
    	}
    }
}
