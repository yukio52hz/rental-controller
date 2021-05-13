<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract 
{   
    use Authenticatable;
   
    protected $fillable=['type','name','surname','nickname','profile','email','password','passwordCheck','rental_price','state'];
}
