<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\Navbar;
use App\Cart;
use DB;
use Auth;
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
        'phone' => ['required', 'string', 'max:10'],
        'password' => ['required', 'string', 'min:5'],
        ]);
    	$r = new User;
    	$r->fname=$a->fname;
        $r->lname=$a->lname;
    	$r->email=$a->email;
        $r->phone=$a->phone;
        $r->role="User";
    	$r->password=Hash::make($a->password);
    	$r->save();
    	if($r){
    		return redirect('user_login')->with('message','Registered Successfully');  //reduct rout of url
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
        $session_id = Session::getId();
        $data=$b->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>"User"])){
            
            Cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            return redirect("addtocart")->with('message','Login Successfully');
        }
        else{
            return redirect("user_login")->with('wmessage','Login Unsuccessfully');
        }  
    	// print_r($a->all());
     //    $query = Signup::where('email',$b->email)->where('password',$b->password)->get()->first();
     //    if($query){
     //    	return redirect("checkout")->with('message','Login Successfully');
     //    }
     //    else{
     //    	return redirect("user_login")->with('wmessage','Login Unsuccessfully');
     //    }
    }
    public function user_logout()
    {
        $logout=Auth::logout();
        return redirect('/')->with('message','Logout Successfully');  //reduct rout of url
    }
}
