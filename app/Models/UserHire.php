<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHire extends Model
{
     protected $table = "fp_user_hire";

      public function client_detail()
    {
        
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

      public function job_detail()
    {
        
        return $this->belongsTo(JoBDetail::class, 'job_id', 'id');
    }
}
