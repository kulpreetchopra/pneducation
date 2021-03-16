<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Signup;
use App\Navbar;
use DB;

class SignupController extends Controller
{
    public function signup()
    {
    	$navbar = Navbar::all();
        return view("front.signup",compact('navbar'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "name"=>"required",
        "email"=>"required",
        "password"=>"required",
        ]);
    	$r = new Signup;
    	$r->name=$a->name;
    	$r->email=$a->email;
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
    	$navbar = Navbar::all();
        return view("front.login",compact('navbar'));
    }
    public function login_submit(Request $b)
    {   
    	//print_r($a->all());
        $query = Signup::where('email',$b->email)->where('password',$b->password)->get()->first();
        // print_r($query);
        if($query){
        	return redirect("/");
        }
        else{
        	return redirect("user_login");
        }
    }
}
