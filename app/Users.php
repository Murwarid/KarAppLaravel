<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //

  
     public $timestamps=false;
    protected $table='users';

    // protected $fillable = [
    //     'name','lastname','province','profileimg', 'type','phone', 'password',
    // ];
}
