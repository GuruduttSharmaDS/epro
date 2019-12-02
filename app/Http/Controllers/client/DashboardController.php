<?php

namespace App\Http\Controllers\client;
use App\Models\Client;
use App\Models\Category;
use App\Models\Skill;
use App\Models\UserReview;
use App\Models\UserHire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Common_helper;
use Session;
use Validator;
use DB;
use Hash;

class DashboardController extends Controller
{
    
  	public function index(){
		$pageTitle = "Dashboard";
		$common_lib = new Common_helper();
		$user_id = session::get('roleId');
		$user = Client::with([])
			->where('id', '=', $user_id)
			->first();
		/*$statisticsData = DB::select('SELECT count(*) as totalJobs, (SELECT count(*) as 
										pendingBids from fp_job_bids where status = 0 AND fp_jobs.id = job_id) 
										as pendingBids from fp_jobs where fp_jobs.status < 3 group by id');*/
		$totalRating = $common_lib->getTotalRating($user_id);   
		$JobDone =  $common_lib->getTotalJobDoneByGaurd($user_id);
		$totalProfileView =  $common_lib->getTotalProfileView($user_id);
		$reviews = UserReview::with(['job_detail'])
                  ->where('user_id', '=', $user_id)
                  ->paginate(5);
		$HireComapny = UserHire::with(['client_detail'])
                  ->where('user_id', '=', $user_id)
                  ->paginate(5);              

		return view("client/client_dashboard",compact('pageTitle','user','totalRating','JobDone','totalRating','totalProfileView','reviews','HireComapny'));
  	}
  	public function profile(){
   		$statisticsData = DB::select('SELECT count(*) as totalJobs, (SELECT count(*) as pendingBids from fp_job_bids where status = 0 AND fp_jobs.id = job_id) as pendingBids from fp_jobs where fp_jobs.status < 3 group by id');
		$pageTitle = "Profile";
		$user_id = session::get('roleId');
		$user = Client::with([])
		->where('id', '=', $user_id)
		->first();
        return view("client/client_profile",compact('statisticsData','pageTitle','user'));
  	}
	
	public function edit_profile(){
    $pageTitle = "Edit Profile";
    $user_id = session::get('roleId');
    $user = Client::with([])
       ->where('id', '=', $user_id)
       ->first();
    return view("client/client_edit_profile",compact('user','pageTitle'));
  }
   public function change_password(Request $request){
    $pageTitle = "Change Password";
	$user_id = session::get('roleId');
	$user = Client::with([])
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
            return redirect("/client/change-password")->withErrors($validator)->withInput();
  
        }
		 $isExist = DB::select("SELECT * FROM fp_auths WHERE status != 2 AND (role = 'client') AND role_id = '".$user_id."' limit 0, 1");
		
		if(!empty($isExist)){
			if(Hash::check($request->old_password,$isExist[0]->password)){
				DB::table('fp_auths') ->where('role_id', $user_id) ->limit(1) ->update( ['password'=>bcrypt($request->new_password), 'updated_at'=>date('Y-m-d H:i:s') ]);
				$request->session()->flash("msg", "Password updated successfully.");
			}else{
			
				$request->session()->flash("errormsg", "invalid old password.");
			}
		}else{
			 $request->session()->flash("errormsg", "invalid user.");
		}
		
	}		
	return view("client/client_change_password",compact('user','pageTitle'));
  }
  public function save_user_data(Request $request){
	    Session::forget('msg');
	    Session::forget('errormsg');
        $user_id = session::get('roleId');
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
                "country"=>$request->country
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
                "country"=>"required"
            );
        $validator = Validator::make($validationOn,$validateRule);
        if ($validator->fails()){
			 $request->session()->flash("errormsg", "Something wrong.");
          return redirect("/client/edit-profile")->withErrors($validator)->withInput();
        }
        $user = Client::find($user_id);
        $common_lib = new Common_helper();
        $slug = $common_lib->createSlug($request->first_name,$user_id,'fp_clients');
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
        $user->slug=$slug;
        if($user->save()){
			 $request->session()->flash("msg", "profile updated successfully.");
		}else{
			 $request->session()->flash("errormsg", "profile not updated");
		}
        return redirect("client/edit-profile");
         
       
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
            $user = Client::find($user_id);
            $file = $request->file('file');
            $new_name  = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'), $new_name);
            $user->image = $new_name;
            $user->save();
            return $new_name;
        }
    }

}
