<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Course;
use App\Navbar;
use App\cart;
use App\Team;
use App\Intern;
use App\Placement;
use App\Contact;
use App\Subscribe;

class FrontendController extends Controller
{
    public function index(){
        $navbar = Navbar::all();
    	$banner = Banner::all();
    	$category = Category::all();
    	$course = Course::all();
        $cart = Cart::all();
    	return view("front.index",compact('banner','category','course','navbar','cart'));
    }
    public function courses($id){
        $navbar = Navbar::all();
        $course= Course::find($id);
        $cart = Cart::all();
        return view("front.courses",compact('course','navbar','cart'));
    }
    public function allcourses(){
        $navbar = Navbar::all();
        $allcourse= Course::all();
        $category = Category::all();
        $cart = Cart::all();
        return view("front.allcourses",compact('allcourse','navbar','category','cart'));
    }
    public function courseslist(){
        $navbar = Navbar::all();
        $course= Course::all();
        $category = Category::all();
        $cart = Cart::all();
        return view("front.courseslist",compact('course','navbar','category','cart'));
    }
    public function allcategory($id){
        $navbar = Navbar::all();
        $course= Course::all();
        $allcategory = Category::all();
        $category = Category::find($id);
        $cart = Cart::all();
        return view("front.allcategory",compact('course','navbar','category','allcategory','cart'));
    }
    public function categorylist($id){
        $navbar = Navbar::all();
        $course= Course::all();
        $categorylist = Category::all();
        $category = Category::find($id);
        $cart = Cart::all();
        return view("front.categorylist",compact('course','navbar','category','categorylist','cart'));
    }
    public function ourteam(){
        $navbar = Navbar::all();
        $team = Team::all();
        $cart = Cart::all();
        return view("front.ourteam",compact('navbar','team','cart'));
    }
    public function interns(){
        $navbar = Navbar::all();
        $interns = Intern::all();
        $cart = Cart::all();
        return view("front.interns",compact('navbar','interns','cart'));
    }
    public function placements(){
        $navbar = Navbar::all();
        $placements = Placement::all();
        $cart = Cart::all();
        return view("front.placements",compact('navbar','placements','cart'));
    }
    public function contact(){
        $navbar = Navbar::all();
        $cart = Cart::all();
        return view("front.contact",compact('navbar','cart'));
    }
    public function contactsubmit(Request $a)
    {   
        $this->validate($a,[
        "name"=>"required",
        "email"=>"required",
        "contact"=>"required",
        "comment"=>"required",
        ]);
        $r = new Contact;
        $r->name=$a->name;
        $r->email=$a->email;
        $r->contact=$a->contact;
        $r->comment=$a->comment;
        $r->save();
        if($r){
            return redirect('contact')->with('message','Submitted Successfully');  //reduct rout of url
        }
        else{
            return redirect('contact')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function subscribersubmit(Request $a)
    {   
        $r = new Subscribe;
        $r->email=$a->email;
        $r->save();
        if($r){
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }
}
