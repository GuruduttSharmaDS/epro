<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Skill;
use App\Models\UserReview;
use App\Models\UserHire;
use Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Common_helper;
use Validator;

// use App\Helpers\Common_helper::class;
use Session;
use DB;

class UserController extends Controller
{
    
public function index(){
    $pageTitle = "Dashboard";
    $common_lib = new Common_helper();
    $user_id = session::get('roleId');
    $user = User::with(['category_detail'])
       ->where('id', '=', $user_id)
       ->first();

    $totalRating = $common_lib->getTotalRating($user_id);   
    $JobDone =  $common_lib->getTotalJobDoneByGaurd($user_id);
    $totalProfileView =  $common_lib->getTotalProfileView($user_id);
    $reviews = UserReview::with(['job_detail'])
                  ->where('user_id', '=', $user_id)
                  ->paginate(5);
    $HireComapny = UserHire::with(['client_detail'])
                  ->where('user_id', '=', $user_id)
                  ->paginate(5);              

    return view("dashboard",compact('pageTitle','user','totalRating','JobDone','totalRating','totalProfileView','reviews','HireComapny'));
  }

  public function profile(){
    $pageTitle = "Profile";
    $user_id = session::get('roleId');
   $user = User::with(['category_detail','weapon_detail'])
       ->where('id', '=', $user_id)
       ->first();
    return view("user_profile",compact('user','pageTitle'));
  }
public function save_user_data(Request $request){
        $user_id = session::get('roleId');
		Session::forget('msg');
	    Session::forget('errormsg');
        $validationOn =  array(
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "dob"=>$request->dob,
                "gender"=>$request->gender,
                "address_line_1"=>$request->address_line_1,
                "city"=>$request->city,
				"pincode"=>$request->pincode,
                "state"=>$request->state,
                "country"=>$request->country,
				"work_experience" => $request->work_experience,
                "skill"=>$request->skill,
                "price" => $request->price,
                "category_id" => $request->category_id,
                "about" => $request->about
            );
     
               $validateRule=  array(
                "first_name"=>"required",
                "last_name"=>"required",
                "phone"=>"required|numeric",
                "email"=>"required|email",
                "dob"=>"required",
                "gender"=>"required", 
                "address_line_1"=>"required",
                "city"=>"required",
				"pincode"=>"required",
                "state"=>"required",
                "country"=>"required",
                "work_experience" => "required",
                'skill' => "required",
                "price" => "required",
                "category_id" => "required"
            );
            
            if(!empty($request->file('weapon_document'))){
                $validateRule["weapon_document"]= "image|mimes:jpeg,png,jpg,doc,docx,pdf|max:2048";

            }
        $validator = Validator::make($validationOn,$validateRule);
      
        
        if ($validator->fails()){
   
          return redirect("/user-dashboard/edit-profile")->withErrors($validator)->withInput();
            
        }

        $user = User::find($user_id);
        $common_lib = new Common_helper();
        $slug = $common_lib->createSlug($request->first_name,$user_id,'fp_users');
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
        $user->work_experience=$request->work_experience;
        $user->country=$request->country;
        $user->pincode=$request->pincode;
        $user->price = $request->price;
        $user->category_id= $request->category_id;
        $user->slug=$slug;
        $user->non_availability_dates = $request->non_availability_dates;
        $user->available_pincodes = $request->available_pincodes;
        $user->available_cities = $request->available_cities;
        $user->about = trim($request->about);
        $user->weapon_id = $request->weapon_id;
        $user->weapon_number = $request->weapon_number;
        $user->weapon_valid_from = date('Y-m-d', strtotime($request->weapon_valid_from));
        $user->weapon_valid_upto = date('Y-m-d', strtotime($request->weapon_valid_upto));
		$user->is_online = $request->is_online;
		 if($user->save()){
			 DB::table('fp_user_skills')->where('user_id',$user_id)->delete();
			foreach ($request->skill as $value) {
				$Skilldata = array('skill_id'=>$value,'user_id'=> $user_id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'));
				DB::table('fp_user_skills')->insert($Skilldata);
			}
        $request->session()->flash("msg", "profile updated successfully.");
		}else{
			 $request->session()->flash("errormsg", "profile not updated.");
		}
        return redirect("user-dashboard/edit-profile");
         
       
}
  

  public function edit_profile(){
    $pageTitle = "Edit Profile";
    $user_id = session::get('roleId');
        $skill_list = Skill::all()
         ->where('status', '=', '0')   
         ->pluck('skill', 'id');

         $category_list = Category::all()
         ->where('status', '=', '0')   
         ->pluck('category_name', 'id');


        $weapon_list  = DB::table("fp_weapons")
         ->where('status', '=', '0')   
         ->pluck('weapon_name', 'id');

    $user = User::with(['category_detail'])
       ->where('id', '=', $user_id)
       ->first();
    return view("edit_profile",compact('user','pageTitle','skill_list','category_list','weapon_list'));
  }


  public function change_password(Request $request){
	  
    $pageTitle = "Change Password";
	$user_id = session::get('roleId');
	$user = User::with(['category_detail'])
       ->where('id', '=', $user_id)
       ->first();
	if ($request->isMethod('post')){
		Session::forget('msg');
	    Session::forget('errormsg');
        $validationOn =  array(
				"old_password"=>$request->old_password,
                "new_password"=>$request->new_password,
                "confirm_password"=>$request->confirm_password,
            );
			$validateRule=  array(
                "old_password"=>"required",
                'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6',
            );
			 
        $validator = Validator::make($validationOn,$validateRule);
        if ($validator->fails()){
            return redirect("/user-dashboard/change-password")->withErrors($validator)->withInput();
  
        }
		 $isExist = DB::select("SELECT * FROM fp_auths WHERE status != 2 AND (role = 'user' or role = 'client') AND role_id = '".$user_id."' limit 0, 1");
		
		if(!empty($isExist)){
			if(Hash::check($request->old_password,$isExist[0]->password)){
				DB::table('fp_auths') ->where('role_id', $user_id) ->limit(1) ->update( ['password'=>bcrypt($request->new_password), 'updated_at'=>date('Y-m-d H:i:s') ]);
				$request->session()->flash("msg", "Password updated successfully.");
			}else{
			
				$request->session()->flash("error_msg", "invalid old password.");
			}
		}else{
			 $request->session()->flash("error_msg", "invalid user.");
		}
		
	}		
	return view("change_password",compact('user','pageTitle'));
  }
   public function ajaxImage(Request $request)
    {
        if ($request->isMethod('post')){
           $validationOn =  array(
                "images"=>$request->file
            );
           $validateRule=  array(
                "images"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
            );
            $validator = Validator::make($validationOn,$validateRule);
           
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
            );
            $user_id = session::get('roleId');
            $user = User::find($user_id);
            $file = $request->file('file');
            $new_name  = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'), $new_name);
            $user->image = $new_name;
            $user->save();
            return $new_name;
        }
    }

}
