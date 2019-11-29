<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "fp_clients";
    
    public function auth_detail()
    {
        return $this->hasOne(Auth::class, 'role_id', 'id');
    }
}
