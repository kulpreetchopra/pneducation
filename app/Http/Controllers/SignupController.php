<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\Navbar;
use App\Cart;
use DB;
use Auth;
use FrontLogin;
use AccountLogin;
use Session;

class SignupController extends Controller
{
    public function signup()
    {
        $session_id = Session::getId();
    	$navbar = Navbar::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.signup",compact('navbar','cart'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'numeric', 'digits:10'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    	$r = new User;
    	$r->fname=$a->fname;
        $r->lname=$a->lname;
    	$r->email=$a->email;
        $r->phone=$a->phone;
        $r->role=$a->role;
    	$r->password=Hash::make($a->password);
    	$r->save();
    	if($r){
    		return redirect('user_login')->with('message','Registered Successfully Now Login First');  //reduct rout of url
    	}
    	else{
        	return redirect('signup')->with('wmessage','Registered Unsuccessfully');
        }
    }
    public function update_password(Request $b)
    {
        $this->validate($b,[
        'password' => ['required', 'string', 'min:5'],
        ]);
        $e = User::find($b->id);
        $e->password = Hash::make($b->password);
        $e->save();
        if($e){
            return redirect('account')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('account')->with('wmessage','Updated Unsuccessfully');
        }
    }
    public function update_phone(Request $b)
    {
        $this->validate($b,[
        'phone' => ['required', 'string', 'max:10'],
        ]);
        $e = User::find($b->id);
        $e->phone = $b->phone;
        $e->save();
        if($e){
            return redirect('account')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('account')->with('wmessage','Updated Unsuccessfully');
        }
    }
    public function user_login(){
        $session_id = Session::getId();
    	$navbar = Navbar::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.login",compact('navbar','cart'));
    }
    public function login_submit(Request $b)
    { 
        $this->validate($b,[
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:6'],
        ]);
        $session_id = Session::getId();
        $data=$b->all();
        $cart= Cart::where('user_email',$b->email)->get();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            $check_role = User::where('email',$data['email'])->first();
            if($check_role['role']==1){
                Session::put('kulpreet',$data['email']);
                Session::forget('ashu');
                return redirect('/admin');
            }
            elseif($check_role['role']==0){
            Session::put('ashu',$data['email']);
            Session::forget('kulpreet');
            Cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            if($cart!='[]'){
                // echo"true";
                return redirect("addtocart")->with('message','Login Successfully');
            }
            else{
                // echo"false";
                return redirect("/")->with('message','Login Successfully');
            }
            }
        }
        else{
            return redirect("user_login")->with('wmessage','Login Unsuccessfully');
        }  
    }
    public function user_logout()
    {
        Auth::logout();
        Session::forget('kulpreet');
        return redirect('/')->with('message','Logout Successfully');  //reduct rout of url
    }
}
