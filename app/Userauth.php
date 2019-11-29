<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Userauth extends Authenticatable
{
    protected $table = "fp_auths";
    protected $gaurd = "dashboardUser";
}
