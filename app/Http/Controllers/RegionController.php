<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Region;

use App\User;

use Illuminate\Support\Facades\Input;

use DB;


class RegionController extends Controller
{
    public function getHome(){
    	$regions = User
    ::join('localites', 'localites.id', '=', 'users.localite_id')
    ->select('localites.id', 'localites.name')
    ->groupBy('localite_id')
    ->get();
//     	$regions = DB::select('SELECT localites.name, COUNT(localite_id) as members FROM users, localites where localites.id = users.localite_id GROUP BY localite_id ORDER BY members DESC limit 3
// ');//Region::select('name')->limit(3)->get();
    	return view('home')->with('regions', $regions);
    }
}
