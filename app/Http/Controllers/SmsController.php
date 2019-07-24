<?php
namespace App\Http\Controllers;

use Twilio\Jwt\ClientToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\GuzzleException;
use Session;
use App\User;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    protected $code, $smsVerifcation;
    function __construct() {
       $this->smsVerifcation = new \App\SmsVerification();
    }  
	public function store(Request $request) {
		     $validator = Validator::make($request->all(), [
	           'contact_number' => 'required'
      		 ]);
            if ($validator->fails()) {
		            Session::flash('error', $validator->messages()->first());
		            return redirect('/');
		    } else { 
		    	$numberAlreadyVerfiedorNot =  $this->smsVerifcation::where('contact_number','=',$request->contact_number)->latest()->first();
		    	if(empty($numberAlreadyVerfiedorNot))  {
	                $code = rand(1000, 9999); //generate random code
					$request['code'] = $code; //add code in $request body
					$this->smsVerifcation->store($request); //call store method of model
					$check = $this->sendSms($request); // send and return its response
					if($check == '21211') {
                        Session::flash('warning', 'Something went wrong. Please check your number.');
					} else {
						Session::flash('success1', 'Please check your inbox for  OTP!');
						Session::flash('contact_number',$request->contact_number); 
					}
					return redirect('/');
				} else if($numberAlreadyVerfiedorNot['status'] == 'pending') {
					$code = rand(1000, 9999); //generate random code
					$request['code'] = $code;
					$numberAlreadyVerfiedorNot->updateModel($request);
				    $check = $this->sendSms($request); // send and return its response
				    if($check == '21211') {
                        Session::flash('warning', 'Something went wrong. Please check your number.');
					} else {
				    	Session::flash('contact_number',$request->contact_number); 
						Session::flash('success1', 'Please check your inbox for  OTP!');
				    }
					return redirect('/');
				} else {
					Session::flash('info', 'This number is already registered.');
		            return redirect('/');
				}
			}
	}
	public function verifyContact(Request $request) {
		$smsVerifcation =  $this->smsVerifcation::where('contact_number','=',$request->contact_number)->latest()->first();
		if(!empty($smsVerifcation)) {
			if($request->code == $smsVerifcation->code) {
			 $request["status"] = 'verified';
			 $smsVerifcation->updateModel($request);
			 $user = new user();
					$user->contact_number = $request->contact_number;
					$user->save();
             $check = $this->sendSms1($request->contact_number);
             if($check == '21211') {
                        Session::flash('warning', 'Something went wrong. Please check your number.');
					} else {
				    	Session::flash('success', 'Your contact number verified.');  
			            Session::forget('success1');
				    }
			 return redirect('/');
			 }
			 else {
				Session::flash('error', 'Not verified');  
				 return redirect('/');
			}
		}
	}
	public function sendSms(Request $request) {

		 $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
		 $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
		 require_once '../vendor/autoload.php';
         $twilio = new Client($accountSid, $authToken);
          try {
	         $message = $twilio->messages
				                  ->create($request->contact_number, // to
				                           array("from" => "+447480783867", "body" => $request->code.' is your twilio follow ups verification code.')
				                  );

			return $message->sid;
			} catch (\Exception $e) {		
			return $e->getCode();
			}
	 }
	 public function sendSms1($number) {

         $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
		 $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
		 require_once '../vendor/autoload.php';
         $twilio = new Client($accountSid, $authToken);
         try {
         $message = $twilio->messages
			                  ->create($number, // to
			                           array("from" => "+447480783867", "body" => 'Your number is verified and successfully registerd with us')
			                  );

			return $message->sid;
			} catch (\Exception $e) {		
			 return $e->getCode();
			}
	 }

}