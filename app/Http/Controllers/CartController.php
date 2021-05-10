<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navbar;
use App\Cart;
use App\Checkout;
use App\Courseorder;
use App\Course_order_product;
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
        if(Auth::check()){
        $user_email=Auth::User()->email;
        $r->user_email=$user_email;
        }
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
    public function delete($id)
    {
        echo $id;
        $d=Cart::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('addtocart')->with('message','Cart Deleted Successfully'); //reduct rout of url
        }
        else{
            return redirect('addtocart')->with('message','Cart Deleted Unsuccessfully'); //reduct rout of url
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
        return redirect('addtocart')->with('message','Quantity Updated Successfully');;
    }
    public function checkout(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $checkout= Checkout::all();
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
        return view("front.checkout",compact('navbar','cart','checkout'));
    } 

    //checkout
    public function checkoutsubmit(Request $a)
    {
        $this->validate($a,[
        "user_email"=>"required",
        "country"=>"required",
        "address"=>"required",
        "city"=>"required",
        "state"=>"required",
        "pincode"=>"required",
        "phone"=>"required",
        // "order_note"=>"required",
        // "order_status"=>"required",
        // "payment_methode"=>"required",
        // "coupan_code"=>"required",
        // "coupan_amount"=>"required",
        //"total"=>"required",
        ]);
        $r = new Courseorder;
        $r->user_id=$a->user_id;
        $r->fname=$a->fname;
        $r->lname=$a->lname;
        $r->user_email=$a->user_email;
        $r->country=$a->country;
        $r->address=$a->address;
        $r->city=$a->city;
        $r->state=$a->state;
        $r->pincode=$a->pincode;
        $r->phone=$a->phone;
        $r->order_note=$a->order_note;
        $r->order_status=$a->order_status;
        $r->payment_methode=$a->payment_methode;
        $r->coupan_code=$a->coupan_code;
        $r->coupan_amount=$a->coupan_amount;
        $r->total=$a->total;
        $r->save();
        $order_id=DB::getPdo()->lastinsertID();
        // print_r($order_id);
        // die;
        $cartproduct=DB::table('carts')->where(['user_email'=>$a->user_email])->get();
        foreach($cartproduct as $c){
            $cp= new Course_order_product;
            $cp->course_order_id=$order_id;
            $cp->user_id=$a->user_id;
            $cp->user_email=$a->user_email;
            $cp->course_id=$c->course_id;
            $cp->course_name=$c->course_name;
            $cp->course_price=$c->course_price;
            $cp->course_quantity=$c->course_quantity;
            $cp->course_image=$c->image;
            $cp->save();
        }
        // print_r($cartproduct);
        if($cp){
            return redirect('thanks')->with('message','Order Submitted Successfully');  //reduct rout of url
        }
        else{
            return redirect('thanks')->with('wmessage','Order Submitted Unsuccessfully');
        } 
    }
    public function thanks()
    {
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $user_email=Auth::User()->email;
        $user_id=Auth::User()->id;
        DB::table('carts')->where('user_email',$user_email)->delete();
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
        return view('front.thanks',Compact('navbar','cart','corder','user_id'))->with('message','Course Purchased Successfully');
    }
}
