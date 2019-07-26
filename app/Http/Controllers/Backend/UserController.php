<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;
use Session;

class UserController extends Controller
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
        $users =User::where('id', '!=', Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('backend/users/user')->with('users', $users);
    }
    public function search(Request $request){
         $q = $request['q'];
         if($q != ""){
         $users = User::where('id', '!=', Auth::user()->id)->orWhere ('name', 'LIKE', '%' . $q . '%' )->orWhere ('contact_number', 'LIKE', '%' . $q . '%' )->paginate (10)->setPath ( '' );

         $pagination = $users->appends ( array (
            'q' => $request['q']
          ) );
         if (count ( $users ) > 0)
          return view ('backend/users/user')->with(array('users'=>$users,'qad'=>'1'));
     }
      return view ( 'backend/users/user' )->withMessage ( 'No Details found. Try to search again !' );
    }
    public function editProfile(Request $request, $id) {
        $user =User::find($id);
        return view('backend/users/profile')->with('user', $user);
    }
    public function update(Request $request, $id) {
         $validator = Validator::make($request->all(), [
              'name' => 'required',
              'email' => 'required|email|unique:users,email,'.$id,
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
                    return redirect('/admin/edituser/'.$id);
            } else { 
                try{
                $user= user::findOrFail($id);
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
                return redirect('/admin/users');
            }
            catch(ModelNotFoundException $err){
                Session::flash('warning', 'Somethingwent wrong.unable to update the profile at a moment.');
                return redirect('/admin/edituser/'.$id);
            }
        }
    }
    public function blockUnblock(Request $request) {
        $id = $request->segment(3);
        $user = User::findOrFail($id);
        if($user['status'] ==1) { 
            $status =0;
            $message = 'User blocked successfully!.';
        } else {
          $status =1; 
          $message = 'User unblocked successfully!.';
        }
        $user->status = $status;
        $user->save();
        Session::flash('success', $message);
        return redirect('/admin/users');
    }
    public function deleteUser(Request $request) {
           $id = $request->segment(3);
           $res=User::where('id',$id)->delete();
           if(!empty($res)) {
             Session::flash('success', 'User deleted successfully.');
             return redirect('/admin/users');
            } else {
             Session::flash('error', 'Error in user deletion.');
             return redirect('/admin/users');
        }
    }    
}
