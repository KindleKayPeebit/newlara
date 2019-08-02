<?php

namespace App\Helpers;
use Route;
use DB;

class Myhelpers
{

    /*
    |--------------------------------------------------------------------------
    | Detect Active Route
    |--------------------------------------------------------------------------
    |
    | Compare given route with current route and return output if they match.
    | Very useful for navigation, marking if the link is active.
    |
    */
    public static function isActiveRoute($route, $output = "active")
    {
        if (Route::currentRouteName() == $route) return $output;
    }
    /*
     * Common function to get data.
     */
   
    public static function getData($userId ='', $smsId='')
    {
        if(!empty($userId) && !empty($smsId))
          $whereCondition = "user_id =".$userId." AND sms_id=".$smsId;
        if(!empty($smsId))
            $whereCondition = "sms_id=".$smsId;
          
          $query = "SELECT * FROM ".$table." WHERE ".$whereCondition;
          $output = DB::select($query);   
          return $output;
    }
    

}