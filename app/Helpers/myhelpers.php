<?php

namespace App\Helpers;
use Route;

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
    public static function sendSms1($number) {

         $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
         $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
         try {
             $client = new Client(['auth' => [$accountSid, $authToken]]);
             $result = $client->post('https://api.twilio.com/2010-04-01/Accounts/'.$accountSid.'/Messages.json',
             ['form_params' => [
             'Body' => 'Your number is verified and successfully registerd with us.', //set message body
             'To' => $number,
             'From' => '+447480783867' //we get this number from twilio
             ]]);
             return $result;
         }
         catch (Exception $e) {
              echo "Error: " . $e->getMessage();
        }
     }
}