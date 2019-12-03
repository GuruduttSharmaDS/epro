<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
     protected $table = "fp_job_requests";
     public function job_detail()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }
}
