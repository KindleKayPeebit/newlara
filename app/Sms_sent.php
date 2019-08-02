<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_sent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sms_id'
    ];
   
}
