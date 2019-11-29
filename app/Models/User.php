<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "fp_users";

    public function auth_detail()
    {
        return $this->hasOne(Auth::class, 'role_id', 'id');
    }

     public function skill_detail()
    {
        return $this->hasMany(UserSkill::class, 'user_id', 'id');
    }

     public function category_detail()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
     public function weapon_detail()
    {
        return $this->belongsTo(Weapon::class, 'weapon_id', 'id');
    }
}
