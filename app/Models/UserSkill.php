<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = "fp_user_skills";
   
     public function skill_data()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

   
}
