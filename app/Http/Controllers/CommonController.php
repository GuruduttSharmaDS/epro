<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Helpers\Common_helper;
use Session;
use Input;
use Mail;

class CommonController extends Controller
{
  public function index(Request $request){
    $return = array('valid' => false, 'msg'=>'Invalid Request');  
   
    $action=$request->action;
    $data=$request;
    if($action=="search_gaurd")
      $return = $this->search_gaurd($data);
    else if($action=="registration_Form")
      $return =  $this->registration_Form($data);
    else if($action=="login_Form")
      $return = $this->login_Form($data);
    else if($action=="forgot_Form")
      $return = $this->forgot_Form($data);
    else if($action=="password_mail")
      $return = $this->password_mail($data);
    else if($action=="ajaximage")
      $return = $this->ajaximage($data); 
    else if($action=="ajax_jobrequest")
      $return = $this->ajax_jobrequest($data);
    else if($action=="getstate")
      $return = $this->getstate($data);
  else if($action=="getcity")
      $return = $this->getcity($data);

    return response()->json($return);

  }
  public function registration_Form($data){
    $response = array('valid' => false, 'msg'=>'Invalid Request');  
    $id = 0;
    if($data->has('password')){
      try{

        DB::beginTransaction();
        $isExist = DB::select("SELECT * FROM fp_auths WHERE status != 2 AND email = '".$data->email."' ",[1]);
        if(empty($isExist)){
          $common_lib = new Common_helper();
          if($data->role == 'user'){
            $slug = $common_lib->createSlug($data->firstname,$id,'fp_users');

            $userdata = array('first_name' => $data->firstname, 'last_name'=>$data->lastname, 'email' => $data->email, 'slug' => $slug);
            $id = DB::table('fp_users')->insertGetId($userdata);
          }else if($data->role == 'client'){
            
            $slug = $common_lib->createSlug($data->firstname,$id,'fp_clients');
            $id = DB::table('fp_clients')->insertGetId(array('first_name' => $data->firstname, 'last_name'=>$data->lastname, 'email' => $data->email, 'slug' => $slug));
          }
          if($id > 0){

            $userauthdata = array('role'=>$data->role,'role_id'=>$id,'email'=>$data->email,'password'=>bcrypt($data->password),'created_at'=>date('Y-m-d H:i:s'));
            $success= DB::table('fp_auths')->insert($userauthdata);

            DB::commit();
            Session::put(['email'=>$data->email,'roleId'=>$id,'role'=>$data->role,'first_name'=>$data->firstname,'last_name'=>$data->lastname]);

            $response = array('valid' => true, 'msg' => 'You are registered succesfully. Your account is all set.','role'=>$data->role, 'first_name'=>$data->firstname, 'lastname'=>$data->lastname, 'mobile'=>'');
          }else
            $response['msg'] = 'Something went wrong.';

        }else
          $response['msg'] = 'This email is already in use, Please try with another email Id.';
        
      } 
      catch (\Exception $e) {
        DB::rollback();
        $response['msg'] = 'Error : '.$e->getMessage();
      }
    } 
    return $response;

  }
        
  public function login_Form($data){
    $response = array('valid' => false, 'msg'=>'Invalid Request');
    if($data->has('username')){

      $isExist = DB::select("SELECT * FROM fp_auths WHERE status != 2 AND (role = 'user' or role = 'client') AND email = '".$data->username."' limit 0, 1");

      if(isset($isExist[0]->password)){
        if(Hash::check($data->password,$isExist[0]->password)){
          if($isExist[0]->status == 0){
            $userData = '';
            if($isExist[0]->role == 'user'){
                $userData = DB::select("SELECT * FROM fp_users WHERE status != 2 AND id = '".$isExist[0]->role_id."' limit 0, 1");
            }else if($isExist[0]->role == 'client'){
                $userData = DB::select("SELECT * FROM fp_clients WHERE status != 2 AND id = '".$isExist[0]->role_id."' limit 0, 1");
            }
            if(isset($userData[0]->id) && $userData[0]->id > 0){
              Session::put(['email'=>$userData[0]->email,'roleId'=>$userData[0]->id,'role'=>$isExist[0]->role,'first_name'=>$userData[0]->first_name,'last_name'=>$userData[0]->last_name]);
              $response = array('valid' => true, 'msg'=>'Logged in successfully.',  'role'=>$isExist[0]->role, 'first_name'=>$userData[0]->first_name, 'lastname'=>$userData[0]->last_name, 'mobile'=>$userData[0]->phone);
            }else
              $response['msg'] = 'Something is wrong with your profile. Please contact to admin.'; 
          }else{
            Session::forget(['email'=>$isExist[0]->email,'roleId'=>$isExist[0]->role_id,'role'=>'user','first_name'=>'','last_name'=>'']);
            $response['msg'] = 'Sorry! Your profile is inactive, Please Contact to admin';
          }
        }else
          $response['msg'] = 'Password is not correct.';   
        
      }else
        $response['msg'] = 'Sorry! This email is not registered with us.';
    }
    return $response;
  }

  public function forgot_Form($data)
  {
    $response = array('valid' => false, 'data'=>'Invalid Request');
    if($data->has('email')){
       $isExist = DB::select("SELECT * FROM fp_auths WHERE email = '".$data->email."'",[1]);
       if (!empty($isExist[0])) {
              if ($isExist[0]->email == $data->email) {
                $common_lib = new Common_helper();
                $token = $common_lib->generateStrongPassword(20,false,'lud');
                $code = date('Ymdhis').$token;
               
                $match = array('email' => $isExist[0]->email, 'status' => 0);
                $isInsert = DB ::table('fp_validcoupon')->updateOrInsert($match,['validtoken' => $code,'status'=>0]);
                if ($isInsert) {
                  if(!empty($isExist[0]->email)){
                      $emailId = '';
                      $user = $isExist[0]; 
                       Mail::send('email_templates.forgot_password', ['url'=>asset('/set-new-password').'/'.$code], function ($m) use ($user) {
                          $m->to($user->email, 'User')->subject('Password reset!');
                      });
                  }
                  $response = array('valid' => true, 'data'=>'Password reset link has been sent to your email');
                }
                else
                  $response['data'] = 'Something is wrong';  
              }
              else
                $response['data'] = 'Sorry! Your profile is inactive, Please Contact to admin';
       }         
    }  
    return $response;
  }
  
  public function password_mail($data)
  { 
    
    $response = array('valid' => false, 'data'=>'Invalid Request');
    if($data->has('email') && $data->has('password')){
      // $match = array('email' => $data->email, 'status' => 0);
       $userauthdata = array('password'=>bcrypt($data->password),'updated_at'=>date('Y-m-d H:i:s'));
       
      $IsUpdate=  DB::table('fp_auths')
                ->where('email' ,'=', $data->email)
                ->where('status' ,'=', 0)
                ->update( $userauthdata);
      if($IsUpdate){
         $match = array('email' => $data->email, 'status' => 0);
         $isInsert = DB ::table('fp_validcoupon')->updateOrInsert($match,['status'=>1]);
           $response['valid'] = true;
        $response['data'] = 'Password Updated Successfully'; 

      }else{

        $response['data'] = 'Password not Updated'; 
      }
      
    }else{
      $response['data'] = 'Something is wrong';
    }
    return $response; 
  }

  public function search_gaurd($data){

    $response = array('valid' => false, 'data'=>'Invalid Request');
    $category_list = Category::all()
         ->where('status', '=', '0')   
         ->pluck('category_name', 'id');

    $weapon_list  = DB::table("fp_weapons")
         ->where('status', '=', '0')   
         ->pluck('weapon_name', 'id');

     $where = array();
     $orWhere = array();
     $where[0] = ['status', '=', '0'];
      if($data->ajax())
     { 
       $users = User::with(['category_detail'])
             ->where($where);
      if(isset($data->price) && !empty($data->price)){
          $price = $data->price;
          $i = 0;
        $users = $users->where(function($query2)  use ($price){
              foreach($price as $p){
                $ary = explode('-', $p);
                $variable1 = $ary[0];
                $variable2 = $ary[1];
               $query2->orWhere(function($query3) use ($variable1,$variable2){
                    $query3->where('price','>=',$variable1)
                   ->where('price','<=',$variable2);
              });
              }
          });
        }
        if(isset($data->weapon) && !empty($data->weapon)){
          $users =  $users->WhereIn('weapon_id',$data->weapon);
        }
        if(isset($data->category) && !empty($data->category)){
             $users = $users->WhereIn('category_id',$data->category);
            
        }
        if(isset($data->gender) && !empty($data->gender)){
            $users =  $users->WhereIn('gender',$data->gender);
        }

        $users =  $users->paginate(5);
     
        

        $view = view("ajax_gaurd_view",compact('users','category_list','weapon_list'))->render();
        $response['html'] = $view;     

      }
    return $response;
  }
  
  public function ajax_jobrequest($data){
	  print_r($data->title);exit;
	if(isset($_POST) && !empty($_POST)){
		
		$validationOn =  array(
				"title"=>$data->title,
                "category"=>$data->category,
                "address" => $data->address,
				"country" => $data->country,
				"state" => $data->state,
				"city" => $data->city,
				"pincode" => $data->pincode,
				"description" => $data->description,
				"start_date" => $data->start_date,
				"end_date" => $data->end_date,
				"working_hour" => $data->working_hour,
				"price_type" => $data->price_type,
				"user_id" => $data->user_id,
				"price" => $data->price
            );
			$validateRule=  array(
				"title"=>"required",
                "category"=>"required",
                "address" => "required",
				"country" => "required",
				"state" => "required",
				"city" => "required",
				"pincode" => "required",
				"description" => "required",
				"start_date" => "required",
				"end_date" => "required",
				"working_hour" => "required",
				"price_type" => "required",
				"user_id" => "required",
				"price" => "required"
                
            );
			 
           $validator = Validator::make($validationOn,$validateRule);
        if ($validator->fails()){
			
			
            //return redirect("/contact-us")->withErrors($validator)->withInput();
  
        }
		
	}
	  
  }
 public function getstate($data){
	 $response = array('valid' => false, 'msg'=>'Invalid Request');  
	 	$state_list = DB::table('fp_states')
			->where('country_id', '=', $_POST['country_id'])   
			->pluck('name', 'id');
	   $response['valid'] = true;
	   $response['data'] = $state_list; 
	   return $response;
  
  } 
  public function getcity($data){
		$response = array('valid' => false, 'msg'=>'Invalid Request');  
	 	$city_list = DB::table('fp_cities')
			->where('state_id', '=', $_POST['state_id'])   
			->pluck('name', 'id');
	   $response['valid'] = true;
	   $response['data'] = $city_list; 
	   return $response;
  }

 


}