<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use App\User;

class DashboardController extends Controller
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
    public function index()
    {
        return view('backend/dashboard');
    }
    public function profile(Request $request){

        return view('backend/profile');
    }
    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
              'name' => 'required',
              'email' => 'required|email|unique:users,email,'.Auth::user()->id,
              'first_name' => 'required',
              'last_name' => 'required',
              'address' => 'required',
              'city' => 'required',
              'country' => 'required',
              'postal_code' => 'required',
              'about_me' => 'required',
              'contact_number' => 'required',
             ]);
            if ($validator->fails()) {
                    Session::flash('error', $validator->messages()->first());
                    return redirect('/admin/profile');
            } else { 
                try{
                $user= user::findOrFail(Auth::user()->id);
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->address = $request['address'];
                $user->city = $request['city'];
                $user->country = $request['country'];
                $user->postal_code = $request['postal_code'];
                $user->about_me = $request['about_me'];
                $user->contact_number = $request['contact_number'];
                $user->save();
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/admin/profile');
            }
            catch(ModelNotFoundException $err){
                Session::flash('warning', 'Somethingwent wrong.unable to update the profile at a moment.');
                return redirect('/admin/profile');
            }
        }
    }
}
