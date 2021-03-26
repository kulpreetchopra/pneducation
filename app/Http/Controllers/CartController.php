<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navbar;
use App\Cart;
use App\Checkout;
use DB;
use Session;

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
    		return redirect('addtocart')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('allcourse')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function cart(){
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
        $navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
        $value=1;
        return view("front.addtocart",compact('navbar','cart','value'));
    } 
    public function checkout(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
        $checkout= Checkout::all();
        return view("front.checkout",compact('navbar','cart','checkout'));
    } 
}
