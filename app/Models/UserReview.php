<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
	 protected $table = "fp_user_reviews";

	 public function job_detail()
    {
        
        return $this->belongsTo(JobDetail::class, 'job_id', 'id');
    }

    
}
