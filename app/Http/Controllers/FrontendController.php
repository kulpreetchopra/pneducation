<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Course;
use App\Navbar;
use App\Cart;
use App\Team;
use App\Intern;
use App\Placement;
use App\Contact;
use App\Subscribe;
use App\Special;
use App\Alert;
use App\Workshop;
use App\User;
use App\About;
use App\Portfolio;
use App\Rating;
use App\Coupan;
use App\Courseorder;
use App\Course_order_product;
use Session;
use Auth;
use Mail;

class FrontendController extends Controller
{
    public function index(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $alert = Alert::all();
    	$banner = Banner::all();
    	$category = Category::all();
    	$course = Course::all();
        $special = Special::all();
        $team = Team::all();
        $rating = Rating::all();
        $coupan =Coupan::all();
        $c_order= Course_order_product::all();
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
    	return view("front.index",compact('banner','alert','category','course','navbar','cart','special','team','rating','c_order','coupan'));
    }
    public function courses($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $rating = Rating::all();
        $course= Course::find($id);
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
        return view("front.courses",compact('course','navbar','cart','rating'));
    }
    public function allcourses(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $allcourse= Course::all();
        $category = Category::all();
        $rating = Rating::all();
        $c_order= Course_order_product::all();
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
        return view("front.allcourses",compact('allcourse','navbar','category','cart','rating','c_order'));
    }
    public function courseslist(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $category = Category::all();
        $rating = Rating::all();
        $c_order= Course_order_product::all();
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
        return view("front.courseslist",compact('course','navbar','category','cart','rating','c_order'));
    }
    public function allcategory($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $allcategory = Category::all();
        $category = Category::find($id);
        $rating = Rating::all();
        $c_order= Course_order_product::all();
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
        return view("front.allcategory",compact('course','navbar','category','allcategory','cart','rating','c_order'));
    }
    public function categorylist($id){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $course= Course::all();
        $categorylist = Category::all();
        $category = Category::find($id);
        $rating = Rating::all();
        $c_order= Course_order_product::all();
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
        return view("front.categorylist",compact('course','navbar','category','categorylist','cart','rating','c_order'));
    }
    public function ourteam(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
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
        return view("front.ourteam",compact('navbar','team','cart'));
    }
    public function interns(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $interns = Intern::all();
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
        return view("front.interns",compact('navbar','interns','cart'));
    }
    public function placements(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $placements = Placement::all();
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
        return view("front.placements",compact('navbar','placements','cart'));
    }
    public function workshop(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $workshop = Workshop::all();
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
        return view("front.workshop",compact('navbar','workshop','cart'));
    }
    public function contact(){
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
        return view("front.contact",compact('navbar','cart'));
    }
    public function about(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $about = About::all();
        $portfolio = Portfolio::all();
        $course = Course::all();
        $signup = User::all();
        $subscribe = Subscribe::all();
        $placement = Placement::all();
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
        return view("front.about",compact('navbar','about','cart','course','signup','subscribe','placement','portfolio'));
    }
    public function contactsubmit(Request $a)
    {   
        $this->validate($a,[
        "name"=>['required', 'string', 'max:255'],
        "email"=>['required', 'string', 'email', 'max:255'],
        "contact"=>['required', 'numeric', 'digits:10'],
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
        $this->validate($a,[
        "email"=>['required', 'string', 'email', 'max:255', 'unique:subscribes'],
        ]);
        $r = new Subscribe;
        $r->email=$a->email;
        $r->save();
        if($r){
            $user = Subscribe::where('email',$a->email)->first(); 
            $to = $a->email;
            $navbar = Navbar::all();
            $subject = 'User Subscribed Successful';
            $message = "Your E-Mail Address Is Successful Subscribed In PnInfosys Course Program \n\n";
            Mail::send('front.subscribe_email', ['msg' => $message,'user' => $user,'navbar' => $navbar] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Subscribed');  
            }); 
            return redirect('/')->with('message','E-Mail Subscribed Successfully');
        }
        else{
            return redirect('/')->with('wmessage','E-Mail Subscribed Unsuccessfully');
        }
    }
    public function ratingsubmit(Request $a)
    {   
        $this->validate($a,[
        "course_id"=>"required",
        "course_name"=>"required",
        "rating"=>"required",
        "review"=>"required",
        ]);
        $r = new Rating;
        $id=$a->course_id;
        $r->user_name=$a->user_name;
        $r->user_email=$a->user_email;
        $r->course_id=$a->course_id;
        $r->course_name=$a->course_name;
        $r->rating=$a->rating;
        $r->review=$a->review;
        $r->save();
        if($r){
            return redirect('courses/'.$id)->with('message','Course Rated Successfully');
        }
        else{
            return redirect('courses/'.$id)->with('wmessage','Course Rated Unsuccessfully');
        }
    }
    public function account(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $user = User::all();
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
        return view("front.account",compact('user','navbar','team','cart'));
    }
    public function account_cart(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $user = User::all();
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
        return view("front.account_cart",compact('user','navbar','team','cart'));
    }
    public function account_bill(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $user = User::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
            $bill = Courseorder::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.account_bill",compact('user','navbar','team','cart','bill'));
    }
    public function account_order(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $user = User::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
            $bill = Course_order_product::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
            $bill = Courseorder::all();
        }
        return view("front.account_order",compact('user','navbar','team','cart','bill'));
    }
    public function account_contact(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $team = Team::all();
        $user = User::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
            $contact = Contact::where('email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.account_contact",compact('user','navbar','team','cart','contact'));
    }
    public function search(Request $s)
    {   
        echo$search = $s->search;
        echo$search = strtolower($search);
        echo$search = ucwords($search);
        $course = Course::where('c_name',$search)->get();
        foreach($course as $a){
        if($search==$a->c_name){
            return redirect('courses/'.$a->id)->with('message','Course Available to Subscribe');
        }
        else{
            return redirect('allcourses')->with('wmessage','No Such Course Avalible');
        } 
        }
        return redirect('allcourses')->with('wmessage','No Such Course Avalible');
    }
    public function billprint($id){
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $corderd = Course_order_product::all();
        $coupan = Coupan::all();
        return view("admin.billprint",compact('navbar','corder','corderd','id','coupan'));
    }
}
