<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([ "middleware" => "dashboard"], function(){
	Route::get("/dashboard", "admin\DashboardController@index")->name("dashboard");
	Route::post("/dashboard/commonajax", "admin\CommonController@index")->name("commonajax");

	Route::get("/dashboard/skills", "admin\SkillController@index")->name("skills");
	Route::get("/dashboard/skill_data", "admin\SkillController@skillData")->name("skilldata");
	Route::post("/dashboard/save_skill", "admin\SkillController@save")->name("saveskill");
	Route::post("/dashboard/delete_skill", "admin\SkillController@delete")->name("deleteskill");

	Route::get("/dashboard/weapons", "admin\WeaponController@index")->name("weapons");
	Route::get("/dashboard/weapon_data", "admin\WeaponController@weaponData")->name("weapondata");
	Route::post("/dashboard/save_weapon", "admin\WeaponController@save")->name("saveweapon");
	Route::post("/dashboard/delete_weapon", "admin\WeaponController@delete")->name("deleteweapon");


	Route::get("/dashboard/category", "admin\CategoryController@index")->name("category");
	Route::get("/dashboard/category_data", "admin\CategoryController@categoryData")->name("categorydata");

	Route::post("/dashboard/save_category", "admin\CategoryController@save")->name("savecategory");
	Route::post("/dashboard/delete_category", "admin\CategoryController@delete")->name("deletecategory");

	Route::get("/dashboard/add_user", "admin\UserController@create")->name("adduser");
	
	Route::get("/dashboard/user_list", "admin\UserController@index")->name("listuser");
	Route::get("/dashboard/user_data", "admin\UserController@userData")->name("userdata");
	Route::get("/dashboard/edit_data/{id}", "admin\UserController@edit")->name("editdata");
	Route::post("/dashboard/save_user", "admin\UserController@save")->name("saveuser");
	Route::post("/dashboard/delete_user", "admin\UserController@delete")->name("deleteuser");

	Route::get("/dashboard/add_client", "admin\ClientController@create")->name("addclient");
	Route::get("/dashboard/client_list", "admin\ClientController@index")->name("listclient");
	Route::get("/dashboard/client_data", "admin\ClientController@clientData")->name("clientdata");
	Route::get("/dashboard/edit_client_data/{id}", "admin\ClientController@edit")->name("editdata");
	Route::post("/dashboard/save_client", "admin\ClientController@save")->name("saveclient");
	Route::post("/dashboard/delete_client", "admin\ClientController@delete")->name("deleteclient");

	Route::get("/dashboard/query_list", "admin\QueryController@index")->name("listquery");

	Route::get("/dashboard/query_data", "admin\QueryController@queryData")->name("querydata");

	Route::get("/dashboard/countries", "admin\CountryController@index")->name("countries");
	Route::get("/dashboard/countriesListing", "admin\CountryController@countriesListing")->name("countriesListing");
	Route::post("/dashboard/saveCountry", "admin\CountryController@save")->name("saveCountry");
	Route::post("/dashboard/deletename", "admin\CountryController@delete")->name("deletename");
});

// Route::get('/dashboard/updateUrl', 'admin\UpdateController@ajaxRequest');
Route::get('/dashboard/updateurl', 'admin\UpdateController@ajaxRequestPost')->name("activedeactive2");
Route::post('/dashboard/updateurl', 'admin\UpdateController@ajaxRequestPost')->name("activedeactive");

Route::get("/login", "AuthController@login")->name("login");
Route::post("/check-login", "AuthController@checkLogin")->name("checklogin");
Route::get("/forgot-password", "AuthController@forgotPassword")->name("forgotpassword");
Route::get("/logout", "AuthController@logout")->name("logout");


//Route::get('/', "AuthController@login")->name("home");
Route::get('/',"HomeController@index")->name("home");
Route::get('/logoutfront',"HomeController@logout")->name("logoutfront");
Route::get('/search-result','HomeController@searchResult')->name("search-result");
Route::post('common/search_gaurd', 'CommonController@search_gaurd');
//Route::get('/user-dashboard','HomeController@dashboard')->name("user-dashboard");
Route::get('/set-new-password/{token}','HomeController@forgotpassword')->name("set-new-password");
Route::get('/verify-email/{token}','HomeController@verifyEmail')->name("verify-email");
Route::get('/about-us',"HomeController@about_us")->name("about-us");
Route::match(['get', 'post'], 'contact-us',"HomeController@contact_us")->name("contact-us");
Route::get('/faq',"HomeController@faq")->name("faq");
Route::get('/security-service',"HomeController@security_service")->name("security-service");

/*Route::get('/front', function () {
    return view('welcome');
});*/
//Route::resource("/common","CommonController");
Route::post('/common',"CommonController@index")->name("common");
Route::match(['get', 'post'], 'ajax-image-upload', 'UserController@ajaxImage');
Route::match(['get', 'post'], 'ajax-client-image-upload', 'client\DashboardController@ajaxImage');

Route::group([ "middleware" => "loginuser"], function(){
	Route::get("/gaurd-detail/{id}", "HomeController@gaurdDetail")->name("gaurd-detail");
});
Route::group([ "middleware" => "userdashboard"], function(){
	Route::get('/user-dashboard','UserController@index')->name("user-dashboard");
	Route::get('/user-dashboard/profile','UserController@profile')->name("user-profile");
    Route::match(['get', 'post'], '/user-dashboard/change-password', 'UserController@change_password')->name("user-change-password");
	Route::get('/user-dashboard/edit-profile','UserController@edit_profile')->name("user-edit-profile");
	Route::post("/user-dashboard/save-user-data", "UserController@save_user_data")->name("saveuserdata");
	Route::get('/user-dashboard/user-task','UserController@user_task')->name("user-task");
	Route::get('/user-dashboard/job-request','UserController@request_listing')->name("job-request");
});

Route::group([ "middleware" => "clientdashboard"], function(){
Route::get('/client','client\DashboardController@index')->name("client-dashboard");
Route::get('/client/profile','client\DashboardController@profile')->name("client-profile");
Route::match(['get', 'post'], '/client/change-password', 'client\DashboardController@change_password')->name("client-change-password");
Route::get('/client/edit-profile','client\DashboardController@edit_profile')->name("client-edit-profile");
Route::post("/client/save-client-data", "client\DashboardController@save_user_data")->name("saveclientdata");
Route::get('/client/client-task','client\DashboardController@user_task')->name("client-task");
Route::get('/client/job/create','client\JobController@create')->name("client-job-create");
Route::get('/client/job/job-request','client\JobController@request_listing')->name("client-request");

});