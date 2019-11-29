<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class CommonController extends Controller
{
    public function index(Request $request)
    {

		$action = $request->action;

		$return = array("valid" => false, "data" => array(), "msg" => "UnAuthorised Access!");

		if( $action == "changeStatus" )
			$return = $this->changeStatus($request->status, $request);
		else if( $action == "deleteRecord" )
			$return = $this->changeStatus(2, $request);

		return response()->json($return);
    }

    private function changeStatus($status = 0, $request){

		$updateStatus = 0;

		$table = 'fp_'.$request->tab;
		$queryData = array('status' => $status);
		$cond = array('id' => $request->id);

		if( $request->tab  == 'category'){
			
			$cond = "categoryId =".$request->id;
		}

		if(!empty($table) && !empty($queryData) && !empty($cond)){
			$updateStatus = DB::table($table)->where($cond)->update($queryData);
			
		}

		if( $updateStatus )
			return array("valid" => true, "msg" => "Record updated successfully!");
		else
			return array("valid" => false, "msg" => "Something Went Wrong");
		
	}




}
