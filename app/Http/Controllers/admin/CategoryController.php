<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;
use App\Helpers\Common_helper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.category");
    }


    public function categorydata(){
        // return Datatables::of(Category::query())->make(true);

        $queryData  = DB::table("fp_category")
                ->where('status', '<>', 2)
                ->get();

        return Datatables::of($queryData)
                        ->editColumn("status", function($queryData) {

                            return ($queryData->status)?'Deactive':'Active';
                        })
                        ->editColumn("action", function($queryData) {

                            return '<a href="javascript:" class="btn btn-rounded btn-xs btn-info mb-1 mr-1 btn-edit" data-id="' . $queryData->id . '"><i class="fa fa-pencil"></i></a>'
                                    . '<a href="javascript:" class="btn btn-rounded btn-xs btn-danger mb-1 mr-1 btn-delete" data-id="' . $queryData->id . '"><i class="fa fa-trash"></i></a>';
                        })
                        ->rawColumns(["action"])
                        ->make(true);
    }
    public function save(Request $request){
        $id = $request->hiddenval;
        $validator = Validator::make(
            array(
                "category_name"=>$request->category_name
            ),
            array(
                "category_name"=>"required".(($id > 0)?'':"|unique:fp_category")
            )
        );
        if ($validator->fails())
            return redirect("/dashboard/category")->withErrors($validator)->withInput();
        
        if($id > 0){
            $category = Category::find($id);
            $action = "updated";
        }
        else{
            $category = new Category;
            $action = "created";
        }
        $common_lib = new Common_helper();
        $slug =  $common_lib->createSlug($request->category_name,$id,'fp_category');
        $category->category_name = $request->category_name;
        $category->slug =  $slug;
        $category->save();
        $request->session()->flash("msg", "Category has been $action successfully.");
        return redirect("/dashboard/category");
        
    }
     public function delete(Request $request) {
        $id = $request->hiddenval;
        $queryData = Category::find($id);

        if (isset($queryData->id)) {
          
            $queryData->delete();

            echo json_encode(array("status" => 1, "message" => "Category deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Category does not exists"));
        }
        die();
    }
}
