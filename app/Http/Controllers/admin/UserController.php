<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\Controller;
use Validator;
use Datatables;
use DB;
use App\Helpers\Common_helper;

class UserController extends Controller
{
    public function index(){
        return view("admin.list_user");
    }
    public function create(){
        $skill_list = Skill::all()
         ->where('status', '=', '0')   
         ->pluck('skill', 'id');

        $category_list = Category::all()
         ->where('status', '=', '0')   
         ->pluck('category_name', 'id');

        $weapon_list  = DB::table("fp_weapons")
         ->where('status', '=', '0')   
         ->pluck('weapon_name', 'id');

        return view("admin.create_user",compact('skill_list','category_list', 'weapon_list'));

    }
    public function edit($id){
        
         $skill_list = Skill::all()
         ->where('status', '=', '0')   
         ->pluck('skill', 'id');
         $category_list = Category::all()
         ->where('status', '=', '0')   
         ->pluck('category_name', 'id');


        $weapon_list  = DB::table("fp_weapons")
         ->where('status', '=', '0')   
         ->pluck('weapon_name', 'id');

        $user = ($id > 0)?User::with(['auth_detail','skill_detail'])->find($id):array();
       
         
         /*$user = ($id > 0)?User::with($id)
                ->leftJoin('fp_auths as au', 'au.role_id', '=', 'fp_users.id')
                ->get()
        :array(); */  

        if(empty($user)){
            $request->session()->flash("msg", "Invalid request.");
            return redirect("/dashboard/user_list");
        }
        return view("admin.edit_user",compact('user','skill_list','category_list', 'weapon_list'));
    } 
    public function userdata(){
         
        $queryData  = DB::table("fp_users")
                ->where('status', '<>', 2)
                ->get();

        return Datatables::of($queryData)
                        ->editColumn("image", function($queryData) {
                            $url = asset('/'); 
                            return ($queryData->image)?'<img src="'.$url.'uploads/user_images/'. $queryData->image. '" style="width:50px;">':'';
                            
                        })
                        ->editColumn("status", function($queryData) {
                            return ($queryData->status)?'Deactive':'Active';
                        })
                        ->editColumn("action", function($queryData) {
                            
                            $nestedData= array();
                            if ( $queryData->status == 1 ) {
                                $nestedData['status'] = "DeActive";
                                $className =  "fa fa-circle-o";
                            }
                            else {
                                $nestedData['status'] =  "Active";
                                $className =  "fa fa-circle";
                            }  
                            $url = asset('/'); 
                            return '<a href="'.$url.'dashboard/edit_data/'.$queryData->id.'" class="btn btn-rounded btn-xs btn-info mb-1 mr-1 btn-edit" data-id="' . $queryData->id . '"><i class="fa fa-pencil"></i></a>'
                                    . '<a href="javascript:" class="btn btn-rounded btn-xs btn-danger mb-1 mr-1 btn-delete" data-id="' . $queryData->id . '"><i class="fa fa-trash"></i></a>'.'<a href="javascript:" onclick="ActivateDeActivateThisRecord(this,\'fp_users\','.$queryData->id.');" class="btn btn-rounded btn-xs btn-success mb-1 mr-1 btn-active" title="Active/DeActive" data-status="'.$nestedData['status'].'"><i class="'.$className.'"></i></a>';
                        })
                        ->rawColumns([
                            "action","image"])
                        ->make(true);
    }

    public function save(Request $request){

        $id = $request->userid;
      

        $validationOn =  array(
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "dob"=>$request->dob,
                "gender"=>$request->gender,
                "address_line_1"=>$request->address_line_1,
                "city"=>$request->city,
                "state"=>$request->state,
                "country"=>$request->country,
                "pincode"=>$request->pincode,
                "images"=>$request->upload_image,
                "password"=>$request->password,
                "confirm_password"=>$request->confirm_password,
                "skill"=>$request->skill,
                "price" => $request->price,
                "category_id" => $request->category_id,
                "about" => $request->about


                
            );
       if(!empty($id)){
            $validateRule =  array(
                "first_name"=>"required",
                "last_name"=>"required",
                "phone"=>"required|numeric",
                "email"=>"required|email",
                "dob"=>"required",
                "gender"=>"required", 
                "address_line_1"=>"required",
                "city"=>"required",
                "state"=>"required",
                "country"=>"required",
                "pincode"=>"required",
                "skill" => "required",
                "price" => "required",
                "category_id" => "required"

            );
            if(!empty($request->file('upload_image'))){
                $validateRule["images"]= "image|mimes:jpeg,png,jpg,gif,svg|max:2048";

            }
            if(!empty($request->file('weapon_document'))){
                $validateRule["weapon_document"]= "image|mimes:jpeg,png,jpg,doc,docx,pdf|max:2048";

            }
            if(isset($request->authpass) && !empty($request->authpass)){
                if(!empty($request->password)){
                $validateRule['password'] = ' min:6|required_with:confirm_password|same:confirm_password';
                 $validateRule['confirm_password'] = 'min:6';
                }

            }else{
                  $validateRule['password'] = ' min:6|required_with:confirm_password|same:confirm_password';
                 $validateRule['confirm_password'] = 'min:6';

            }
            
       }else{
             $validateRule=  array(
                "first_name"=>"required",
                "last_name"=>"required",
                "phone"=>"required|numeric",
                "email"=>"required|email",
                "dob"=>"required",
                "gender"=>"required", 
                "address_line_1"=>"required",
                "city"=>"required",
                "state"=>"required",
                "country"=>"required",
                "pincode"=>"required",
                "images"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "password"=>"required",
                "confirm_password"=>"required",
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6',
                'skill' => "required",
                "price" => "required",
                "category_id" => "required"
            );

       }
        
        $validator = Validator::make($validationOn,$validateRule);
   
      
        /*$imageName = time().'.'.$request->upload_image->getClientOriginalExtension();
        $request->upload_image->move(public_path('images'), $imageName);*/ 
        if ($validator->fails()){
            if(!empty($id)){
                 return redirect("/dashboard/edit_data/".$id)->withErrors($validator)->withInput();

            }else{
                return redirect("/dashboard/add_user")->withErrors($validator)->withInput();

            }
            
        }
       
       
        if($id > 0){
            $user = User::find($id);
            $action = "updated";
            //$user->id = $id;
        }
        else{
            $user = new User;
            $action = "created";
        }
      
        
        $common_lib = new Common_helper();
        $slug = $common_lib->createSlug($request->first_name,$id,'fp_users');

        if(!empty($request->file('upload_image'))){
            $file = $request->file('upload_image');
            $new_name = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'), $new_name);
            $user->image = $new_name;
        }
        if(!empty($request->file('weapon_document'))){
            $file = $request->file('weapon_document');
            $new_name = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/weapon_documents'), $new_name);
            $user->weapon_document = $new_name;
        }
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->gender=$request->gender;
        $user->address_line_1=$request->address_line_1;
        $user->city=$request->city;
        $user->state=$request->state;
        $user->country=$request->country;
        $user->pincode=$request->pincode;
        $user->price = $request->price;
        $user->category_id= $request->category_id;
        $user->slug=$slug;
        $user->about = $request->about;
        $user->weapon_id = $request->weapon_id;
        $user->weapon_number = $request->weapon_number;
        $user->weapon_valid_from = date('Y-m-d', strtotime($request->weapon_valid_from));
        $user->weapon_valid_upto = date('Y-m-d', strtotime($request->weapon_valid_upto));
        $user->save();
        /*print_r($user->id);
        exit();*/
        if($id > 0){
           DB::table('fp_user_skills')->where('user_id',$request->userid)->delete();
        if(!empty($request->password)){

            DB::table('fp_auths') ->where('role_id', $request->userid) ->limit(1) ->update( [ 'email' => $user->email,'password'=>Hash::make($request->password), 'updated_at'=>date('Y-m-d H:i:s') ]);

        }
        $UserId = $request->userid;
        }
        else{
            $data = array('role'=>'user','role_id'=>$user->id,'email'=>$request->email,'password'=>Hash::make($request->password),'created_at'=>date('Y-m-d H:i:s'));
            DB::table('fp_auths')->insert($data);
      
         $UserId = $user->id;
        }
       
        foreach ($request->skill as $value) {
            $Skilldata = array('skill_id'=>$value,'user_id'=> $UserId,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'));
            DB::table('fp_user_skills')->insert($Skilldata);
        }
        $request->session()->flash("msg", "User has been $action successfully.");
        if(!empty($id)){
             return redirect("/dashboard/edit_data/".$id);
         
        }else{
            return redirect("/dashboard/add_user");
       }
        
    }
    

    public function delete(Request $request) {

        $id = $request->hiddenval;

        $queryData = User::find($id);

        if (isset($queryData->id)) {

            $queryData->delete();

            echo json_encode(array("status" => 1, "message" => "User deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "User doesnot exists"));
        }

        die();
    }
}
