<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navbar;
use App\Cart;
use DB;

class CartController extends Controller
{
   public function cartsubmit(Request $a)
    {   
    	//print_r($a->all());
    	$r = new Cart;
    	$r->course_id=$a->course_id;
    	$r->course_name=$a->course_name;
    	$r->course_price=$a->course_price;
        $r->image=$a->image;
    	$r->save();
    	if($r){
    		return redirect('addtocart')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('allcourse')->with('wmessage','Submitted Unsuccessfully');
        }
    }
   public function cart(){
        $navbar = Navbar::all();
        $cart= Cart::all();
        $value=1;
        return view("front.addtocart",compact('navbar','cart','value'));
    } 
}
