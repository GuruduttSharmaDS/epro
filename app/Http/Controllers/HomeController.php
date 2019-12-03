<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Query;
use App\Models\Category;
use App\Models\UserProfileView;
use App\Models\UserReview;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Common_helper;
use Validator;
use Session;
use DB;
use Mail;
use View;

class HomeController extends Controller
{
	
	public function __construct()
    {
		//parent::__construct();
		
			$category_list = Category::all()
			->where('status', '=', '0')   
			->pluck('category_name', 'id');
		 
			$country_list =  DB::table('fp_countries')
			->pluck('name', 'id');
		 
			View::share( 'category_list', $category_list );
			View::share ( 'country_list', $country_list);

    }
  public function index(){

   // $users = DB::select('select user.id, user.*, (SELECT skill from fp_skills where fp_skills.id  = (SELECT skill_id from fp_user_skills where fp_user_skills.user_id  = user.id limit 0,1)  limit 0,1) as skill from fp_users as user where user.status =0');
       
      $gaurd_count = User::where(['status' => 0])->get()->count();
      $client_count = User::where(['status' => 0])->get()->count();

       $users = User::with(['category_detail'])
       ->where('status', '=', '0')
       ->get();
        return view("welcome",compact('users','client_count','gaurd_count'));
  }
  public function searchResult(){

    $category_list = Category::all()
         ->where('status', '=', '0')   
         ->pluck('category_name', 'id');

        $weapon_list  = DB::table("fp_weapons")
         ->where('status', '=', '0')   
         ->pluck('weapon_name', 'id');

         $users = User::with(['category_detail'])
             ->where('status', '=', '0');
            
         if(isset($_POST) && !empty($_POST)){
             print_r($_POST);exit;
         }  
        if(isset($_GET) && !empty($_GET)){
          if(!isset($_GET['search'])){
              $_GET['search'] = $_GET;
          }
          if(isset($_GET['search']['country']) && !empty($_GET['search']['country'])){
             
              $users = $users->where('name', 'LIKE', '%' . $_GET['search']['country'] . '%');
          }
          if(isset($_GET['search']['keyword']) && !empty($_GET['search']['keyword'])){

             
              $users = $users->where('first_name', 'LIKE', '%' . $_GET['search']['keyword'] . '%');
              $users = $users->orWhere('last_name', 'LIKE', '%' . $_GET['search']['keyword'] . '%');
              $users = $users->orWhere('city', 'LIKE', '%' . $_GET['search']['keyword'] . '%');
          }
          
        }

        $users = $users->paginate(5);
        if(isset($_GET['search']) && !empty($_GET['search'])){
            $users->appends(['search' => $_GET['search']]); 
        }
          
    
  	     return view("searchresult",compact('users','category_list', 'weapon_list'));
  }

  public function gaurdDetail($id= null){
		$user_id = session::get('roleId');
		$common_lib = new Common_helper();
         $count_view = DB::table("fp_user_profile_views")
         ->where('created_at', 'like', date('Y-m-d').'%')
         ->where('user_id', '=', $id)
         ->where('client_id', '=', $user_id)
         ->get()->count();
         if($count_view <= 0){
             if($user_id != $id){
                $UserProfileView = new UserProfileView;
                $UserProfileView->client_id = $user_id;
                $UserProfileView->user_id = $id;
                $UserProfileView->save();

             }
         }

       $gaurd = User::with(['category_detail'])
       ->where('id', '=', $id)
       ->first();
        
        $total_count = $common_lib->getTotalRating($id);
		$job_done_count =  $common_lib->getTotalJobDoneByGaurd($id);
        $reviews = UserReview::with(['job_detail'])
                  ->where('user_id', '=', $id)
                  ->paginate(5);


    return view("gaurd_detail",compact('gaurd','job_done_count','reviews','total_count'));

  }

   public function about_us(){
    return view("about_us");
  }

  public function contact_us(Request $request){
	if($request->isMethod('post')){
		Session::forget('msg');
	    Session::forget('errormsg');
		$validationOn =  array(
				"name"=>$request->name,
                "contactemail"=>$request->contactemail,
                "subject" => $request->subject,
				"message" => $request->message
            );
			$validateRule=  array(
                "name"=>"required",
                'contactemail' => "required|email",
                'subject' => "required",
				'message' => "required"
            );
			 
           $validator = Validator::make($validationOn,$validateRule);
        if ($validator->fails()){
            return redirect("/contact-us")->withErrors($validator)->withInput();
  
        }
		$query = new Query;
		$query->name=$request->name;
        $query->subject=$request->subject;
        $query->email=$request->contactemail;
        $query->message=$request->message;
		 if($query->save()){
			 Mail::send('email_templates.thank_contact_us', ['url'=>''], function ($m) use ($query) {
                          $m->to($query->email, 'User')->subject('Thank You for contact us');
            });
            $request->session()->flash("msg", "We will contact you soon.");
		}else{
			 $request->session()->flash("errormsg", "Something Wrong.");
		}
		
	 }
      return view("contact_us");
  }
  public function faq(){
    return view("faq");
  } 
  public function security_service(){

    return view("security_service_view");
  }
  public function logout(Request $request){
  	$request->session()->flush();
    Session::forget(['email','roleId','role','first_name','last_name']); 
    return redirect("/");
  }
  public function dashboard(){
  	return view("dashboard");
  }
  
  public function forgotpassword(Request $request){
   $token = $request->token;
   $count = DB::table("fp_validcoupon")
         ->where('validtoken', '=', $token)
         ->where('status', '=', '0')
        ->first();
    
  
  	/*return $request;
  	exit();*/
  	return view("newpassword",compact('count'));
  }

  public function verifyEmail(Request $request){
    $token = $request->token;
    $email = base64_decode ($token);

    $count = DB::table("fp_auths")
              ->where('email', '=', $email)
              ->where('status', '=', '0')
              ->first();
     
     return view("verify_email",compact('count'));
   }
}