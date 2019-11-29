<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Validator;
use Auth as Authenticate;
use Session;

class AuthController extends Controller
{
    
    public function login() {
        return view("admin.login");
    }

    public function checkLogin(Request $request) {
        $validator = Validator::make(
            array(
                "email"=>$request->email,
                "password"=>$request->password
            ),
            array(
                "email"=>"required",
                "password"=>"required"
            )
        );
        if ($validator->fails())
            return redirect("/login")->withErrors($validator)->withInput();
        
        $user_info = array("email" => $request->email, "password" =>$request->password,"role" => "admin");
        if(auth()->guard("dashboard")->attempt($user_info)){
            $logged_user_details = auth()->guard("dashboard")->user();
            session(["is_active"=>1]);
            session(["user_details"=>$logged_user_details]);
            return redirect("/dashboard");
        }else{
            return redirect()->back()->withErrors("Invalid Credential.");
        }
        // $request->session()->flash("msg", "Skill has been $action successfully.");
        // return redirect("/dashboard/skills");
    }

    public function forgotPassword() {
        return view("admin.forgot_password");
    }
    public function logout() {
        Session::flush();
        Authenticate::guard("dashboard")->logout();
        return redirect("/login");
    }
}
