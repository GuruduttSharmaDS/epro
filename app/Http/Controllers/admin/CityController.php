<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;

class CityController extends Controller
{
    public function index() {
        return view("admin.city");
    }

    public function cityListing() {
        $state_id = isset ($_GET['state_id']) ? $_GET['state_id']: 0;
        $queryData  = DB::table("fp_cities")->where('status', '<>', 2)->where('state_id', $state_id)->get();

        return Datatables::of($queryData)->editColumn("status", function($queryData) {
            return ($queryData->status) ? 'Deactive':'Active';
        })
        ->editColumn ("action", function($queryData) {
            return '<a href="javascript:" class="btn btn-rounded btn-xs btn-info mb-1 mr-1 btn-edit" data-id="' . $queryData->id . '"><i class="fa fa-pencil"></i></a>'
                    . '<a href="javascript:" class="btn btn-rounded btn-xs btn-danger mb-1 mr-1 btn-delete" data-id="' . $queryData->id . '"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns (["action"])->make(true);
    }

    public function save(Request $request) {
        $id = $request->hiddenval;
        
        $validator = Validator::make(
            array(
                "name"=>$request->name,
                "state_id"=>$request->state_id
            ),
            array(
                "name"=>"required".(($id > 0)?'':"|unique:fp_cities")
            )
        );

        if ($validator->fails())
            return redirect("/dashboard/cities")->withErrors($validator)->withInput();
        
        if ($id > 0) {
            $items = City::find($id);
            $action = "updated";
        }
        else {
            $items = new City;
            $action = "created";
        }

        $items->name = $request->name;
        $items->state_id = $request->state_id;
        $items->save();
        $request->session()->flash("msg", "City has been $action successfully.");
        return redirect("/dashboard/cities");
        
    }

    public function delete(Request $request) {

        $id = $request->hiddenval;

        $queryData = City::find($id);

        if (isset($queryData->id)) {
          
            $queryData->delete();

            echo json_encode(array("status" => 1, "message" => "City deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "City does not exists"));
        }

        die();
    }

}
