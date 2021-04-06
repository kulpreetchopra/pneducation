<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navbar;
use App\Cart;
use App\Checkout;
use DB;
use Session;
use Auth;

class CartController extends Controller
{
   public function cartsubmit(Request $a)
    {   
    	// print_r($a->all());
        // die;
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
    	$r = new Cart;
    	$r->course_id=$a->course_id;
    	$r->course_name=$a->course_name;
    	$r->course_price=$a->course_price;
        $r->image=$a->image;
        $r->session_id=$session_id;
        // print_r($r);
        // die;
    	$r->save();
    	if($r){
    		return redirect('addtocart')->with('message','Added To Cart Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('allcourse')->with('wmessage','Added To Cart Unsuccessfully');
        }
    }
    public function cart(){
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
        return view("front.addtocart",compact('navbar','cart'));
    } 
    public function coursequantity_update($id=null,$course_quantity=null){
        // echo $id;
        // echo $course_quantity;
        DB::table('carts')->where('id',$id)->increment('course_quantity',$course_quantity);
        return redirect('addtocart');
    }
    public function checkout(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
        $checkout= Checkout::all();
        return view("front.checkout",compact('navbar','cart','checkout'));
    } 
}
