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
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.signup",compact('navbar','cart'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:5'],
        ]);
    	$r = new User;
    	$r->name=$a->name;
    	$r->email=$a->email;
        $r->role="User";
    	$r->password=Hash::make($a->password);
    	$r->save();
    	if($r){
    		return redirect('/')->with('message','Registered Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('/')->with('wmessage','Registered Unsuccessfully');
        }
    }
    public function user_login(){
        $session_id = Session::getId();
    	$navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
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
