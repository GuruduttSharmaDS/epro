<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hash;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;
use App\Helpers\Common_helper;

class UpdateController extends Controller
{
    
    public function ajaxRequest(Request $request)
    {
        //return view('ajaxRequest');
       //dd("dddd");
       if($request->ajax())
    {
        return response()->json($request->all());
    } 

    } 

    public function ajaxRequestPost(Request $request){
    	
    	$data = DB::table($request->tab) ->where('id', $request->id) ->limit(1) ->update( [ 'status' => $request->status ]);

    	//$input = $request->all();
    	/*print_r($input);
    	exit();*/
        return response()->json(['success'=>$request->tab]);
        //dd("dddd");
    }
 }
 
 ?>   