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
use App\Special;
use App\Alert;
use App\Workshop;
use Session;

class FrontendController extends Controller
{
    public function index(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $alert = Alert::all();
    	$banner = Banner::all();
    	$category = Category::all();
    	$course = Course::all();
        $cart= Cart::where('session_id',$session_id)->get();
        $special = Special::all();
    	return view("front.index",compact('banner','alert','category','course','navbar','cart','special'));
    }
    public function courses($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::find($id);
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.courses",compact('course','navbar','cart'));
    }
    public function allcourses(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $allcourse= Course::all();
        $category = Category::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.allcourses",compact('allcourse','navbar','category','cart'));
    }
    public function courseslist(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $category = Category::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.courseslist",compact('course','navbar','category','cart'));
    }
    public function allcategory($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $allcategory = Category::all();
        $category = Category::find($id);
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.allcategory",compact('course','navbar','category','allcategory','cart'));
    }
    public function categorylist($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $categorylist = Category::all();
        $category = Category::find($id);
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.categorylist",compact('course','navbar','category','categorylist','cart'));
    }
    public function ourteam(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.ourteam",compact('navbar','team','cart'));
    }
    public function interns(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $interns = Intern::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.interns",compact('navbar','interns','cart'));
    }
    public function placements(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $placements = Placement::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.placements",compact('navbar','placements','cart'));
    }
    public function workshop(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $workshop = Workshop::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.workshop",compact('navbar','workshop','cart'));
    }
    public function contact(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.contact",compact('navbar','cart'));
    }
    public function about(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $cart= Cart::where('session_id',$session_id)->get();
        return view("front.about",compact('navbar','cart'));
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
