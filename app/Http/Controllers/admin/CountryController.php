<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;

class CountryController extends Controller
{
    public function index(){
        return view("admin.country");
    }

    public function countriesListing(){
        $queryData  = DB::table("fp_countries")->where('status', '<>', 2)->get();

        return Datatables::of($queryData)->editColumn("status", function($queryData) {
            return ($queryData->status) ? 'Deactive':'Active';
        })
        ->editColumn ("action", function($queryData) {
            return '<a href="javascript:" class="btn btn-rounded btn-xs btn-info mb-1 mr-1 btn-edit" data-id="' . $queryData->id . '"><i class="fa fa-pencil"></i></a>'
                    . '<a href="javascript:" class="btn btn-rounded btn-xs btn-danger mb-1 mr-1 btn-delete" data-id="' . $queryData->id . '"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns (["action"])->make(true);
    }

    public function save(Request $request){
        $id = $request->hiddenval;
        
        $validator = Validator::make(
            array(
                "name"=>$request->name
            ),
            array(
                "name"=>"required".(($id > 0)?'':"|unique:fp_countries")
            )
        );

        if ($validator->fails())
            return redirect("/dashboard/countries")->withErrors($validator)->withInput();
        
        if ($id > 0) {
            $items = Country::find($id);
            $action = "updated";
        }
        else {
            $items = new Country;
            $action = "created";
        }

        $items->name = $request->name;
        $items->save();
        $request->session()->flash("msg", "Country has been $action successfully.");
        return redirect("/dashboard/countries");
        
    }

    public function delete(Request $request) {

        $id = $request->hiddenval;

        $queryData = Country::find($id);

        if (isset($queryData->id)) {
          
            $queryData->delete();

            echo json_encode(array("status" => 1, "message" => "Country deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Country does not exists"));
        }

        die();
    }
}
