<?php

namespace App\Http\Controllers\admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;

class StateController extends Controller
{
    public function index() {
        return view("admin.state");
    }

    public function stateListing() {
        $countryId = isset ($_GET['country_id']) ? $_GET['country_id']: 0;
        $queryData  = DB::table("fp_states")->where('status', '<>', 2)->where('country_id', $countryId)->get();

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
                "name"=>$request->name,
                "country_id"=>$request->country_id
            ),
            array(
                "name"=>"required".(($id > 0)?'':"|unique:fp_states")
            )
        );

        if ($validator->fails())
            return redirect("/dashboard/state")->withErrors($validator)->withInput();
        
        if ($id > 0) {
            $items = State::find($id);
            $action = "updated";
        }
        else {
            $items = new State;
            $action = "created";
        }

        $items->name = $request->name;
        $items->country_id = $request->country_id;
        // echo "<pre>"; print_r($items);die;
        $items->save();
        $request->session()->flash("msg", "State has been $action successfully.");
        return redirect("/dashboard/state");
        
    }

    public function delete(Request $request) {

        $id = $request->hiddenval;

        $queryData = State::find($id);

        if (isset($queryData->id)) {
          
            $queryData->delete();

            echo json_encode(array("status" => 1, "message" => "State deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "State does not exists"));
        }

        die();
    }

    public function stateDropdown (Request $request) {
        $countryId = isset ($_GET['country_id']) ? $_GET['country_id']: 0;
        $queryData  = DB::table("fp_states")->where('status', '<>', 2)->where('country_id', $countryId)->orderBy('name',"ASC")->get(['id', 'name']);

        if (!empty ($queryData)) {
            foreach ($queryData as $info) {
                echo "<option value='$info->id'>$info->name</option>";
            }
        }
        die;
    }
}
