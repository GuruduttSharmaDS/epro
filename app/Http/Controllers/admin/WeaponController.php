<?php

namespace App\Http\Controllers\admin;

use App\Models\Weapon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.weapon");
    }
    public function weaponData(){

        $queryData  = DB::table("fp_weapons")
                ->where('status', '<>', 2)
                ->get();

        return Datatables::of($queryData)
                        ->editColumn("status", function($queryData) {

                            return ($queryData->status)?'Deactive':'Active';
                        })
                        ->editColumn("action", function($queryData) {

                            return '<a href="javascript:" class="btn btn-rounded btn-xs btn-info mb-1 mr-1 btn-edit" data-id="' . $queryData->id . '"><i class="fa fa-pencil"></i></a><button href="javascript:" class="btn btn-rounded btn-xs btn-light mb-1 mr-1 '.($queryData->status?'text-danger':'text-success').'" onclick="ActivateDeActivateThisRecord(this, \'weapons\','.$queryData->id.')" data-status="'.$queryData->status.'"><i class="fa fa-circle"></i></button><button href="javascript:" class="btn btn-rounded btn-xs btn-danger mb-1 mr-1" onclick="delete_row(this, \'weapons\','.$queryData->id.')"><i class="fa fa-trash"></i></button>';
                        })
                        ->rawColumns(["action"])
                        ->make(true);
    }

    public function save(Request $request){
        $id = $request->hiddenval;
        $validator = Validator::make(
            array(
                "weapon_name"=>$request->weapon_name
            ),
            array(
                "weapon_name"=>"required".(($id > 0)?'':"|unique:fp_weapons")
            )
        );
        if ($validator->fails())
            return redirect("/dashboard/weapons")->withErrors($validator)->withInput();
        
        if($id > 0){
            $weapon = Weapon::find($id);
            $action = "updated";
        }
        else{
            $weapon = new Weapon;
            $action = "created";
        }

        $weapon->weapon_name = $request->weapon_name;
        $weapon->save();
        $request->session()->flash("msg", "Weapon has been $action successfully.");
        return redirect("/dashboard/weapons");
        
    }

}
