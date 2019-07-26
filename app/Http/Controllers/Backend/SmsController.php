<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Sms;
use Session;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
    	$sms =Sms::paginate(10);
        return view('backend/sms/sms')->with('sms', $sms);
    }
    public function search(Request $request){
         $q = $request['q'];
         if($q != ""){
         $sms = Sms::where ('title', 'LIKE', '%' . $q . '%' )->orWhere ('message', 'LIKE', '%' . $q . '%' )->paginate (10)->setPath ( '' );

         $pagination = $sms->appends ( array (
            'q' => $request['q']
          ) );
         if (count ( $sms ) > 0)
          return view ('backend/sms/sms')->with(array('sms'=>$sms,'qad'=>'1'));
     }
      return view ( 'backend/sms/sms' )->withMessage ( 'No Details found. Try to search again !' );
    }
    public function add(){
    	return view('backend/sms/add');
    }
    public function addsms(Request $request){
    	$validator = Validator::make($request->all(), [
    		  'title' => 'required',
              'message' => 'required',
              ]);
            if ($validator->fails()) {
                    Session::flash('error', $validator->messages()->first());
                    return redirect('/admin/sms/add');
            } else { 
                try{
                $sms= new sms();
                $sms->title = $request['title'];
                $sms->message = $request['message'];
                $sms->save();
                Session::flash('success', 'SMS Added successfully.');
                return redirect('/admin/sms');
            }
            catch(ModelNotFoundException $err){
                Session::flash('warning', 'Somethingwent wrong.unable to add the sms at a moment.');
                return redirect('/admin/sms/add');
            }
        }
    }
    public function edit(Request $request, $id){
    	$sms =Sms::find($id);
    	return view('backend/sms/edit')->with('sms', $sms);;
    }
    public function editSms(Request $request, $id){
    	$validator = Validator::make($request->all(), [
    		  'title' => 'required',
              'message' => 'required',
              ]);
            if ($validator->fails()) {
                    Session::flash('error', $validator->messages()->first());
                    return redirect('/admin/sms/add');
            } else { 
                try{
                $sms= Sms::findOrFail($id);
                $sms->title = $request['title'];
                $sms->message = $request['message'];
                $sms->save();
                Session::flash('success', 'SMS updated successfully.');
                return redirect('/admin/sms');
            }
            catch(ModelNotFoundException $err){
                Session::flash('warning', 'Somethingwent wrong.unable to update the sms at a moment.');
                return redirect('/admin/sms/add');
            }
        }
    }
    public function blockUnblock(Request $request) {
        $id = $request->segment(4);
        $sms = Sms::findOrFail($id);
        if($sms['status'] ==1) { 
            $status =0;
            $message = 'SMS blocked successfully!.';
        } else {
          $status =1; 
          $message = 'SMS unblocked successfully!.';
        }
        $sms->status = $status;
        $sms->save();
        Session::flash('success', $message);
        return redirect('/admin/sms');
    }
    public function deleteUser(Request $request) {
           $id = $request->segment(4);
           $res = Sms::where('id',$id)->delete();
           if(!empty($res)) {
             Session::flash('success', 'SMS deleted successfully.');
             return redirect('/admin/sms');
            } else {
             Session::flash('error', 'Error in SMS deletion.');
             return redirect('/admin/sms');
            }
    } 
    public function sendSms(){
         return view('backend/sms/smsbyday');
    }

}