<?php
use App\Models\UserSkill;
use App\Models\Category;
use App\Models\Weapon;
/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
   }
   return number_format($number, 0, '.', '.');

}

function user_skill_data($user_id = null)
    {

    	$categories = App\Models\UserSkill::with(['skill_data'])
    				 ->where('user_id', '=' ,$user_id)
    				 ->get();
    				  ;
        return $categories;

       
    }
    function user_category_data($cat_id = null)
    {

      $categories = Category::where('id', '=' ,$cat_id)
                    ->first();
              ;
        return $categories;

       
    }
    function user_weapon_data($id = null)
    {

      $weapon = Weapon::where('id', '=' ,$id)
                    ->first();
              ;
        return $weapon;
        
       
    }
    function getUserTotalRating($id = 0)
    {
        return DB::table('fp_user_reviews')
                      ->selectRaw('AVG(rating) as average_rating')
                      ->selectRaw('COUNT(review) AS totalreview')
                      ->where('user_id',"=", $id)
                      ->first();
    }
    
?>