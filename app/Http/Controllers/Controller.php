<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;
use View;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function __construct()
    {
        $category_list = Category::all()
        ->where('status', '=', '0')   
        ->pluck('category_name', 'id');
     
        $country_list =  DB::table('fp_countries')
        ->pluck('name', 'id');
     
        View::share( 'category_list', $category_list );
        View::share ( 'country_list', $country_list);
	}
}
