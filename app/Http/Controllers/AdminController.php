<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Team;
use App\Subscribe;
use App\User;
use App\Course_order_product;
use App\Navbar;
use App\Courseorder;
use App\Coupan;
use App\Course;
use App\Category;

class AdminController extends Controller
{
    public function email($id){
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $corderd = Course_order_product::all();
        $coupan = Coupan::all();
        return view("front.email",compact('navbar','corder','corderd','id','coupan'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $signup = User::all();
        $subscribe = Subscribe::all();
        $contact = Contact::all();
        $order = Course_order_product::all();
    	return view('admin.index',compact('signup','subscribe','contact','order'));
    }
    public function contact(){
        $contact = Contact::all();
    	return view("admin.contact",compact('contact'));
    }
    public function reply($id)
    {
        $edit= Contact::find($id);
        return view("admin.contact_reply",compact('edit'));
    }
    public function update(Request $b)
    {
        $e = Contact::find($b->id);
        $e->reply=$b->reply;
        $e->save();
        if($e){
            return redirect('admin/contact')->with('message','Reply Send Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/alert')->with('wmessage','Reply Send Unsuccessfully');
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Contact::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/contact')->with('message','Deleted Successfully'); //reduct rout of url
        }
        else{
            return redirect('admin/contact')->with('wmessage','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
    public function subscribers(){
        $subscriber = Subscribe::all();
        return view("admin.subscriber",compact('subscriber'));
    }
    public function orders(){
        $orders = Courseorder::all();
        return view("admin.orders",compact('orders'));
    }
    public function users(){
        $users = User::all();
        return view("admin.users",compact('users'));
    }
    public function subscriberdelete($id)
    {
        echo $id;
        $d=Subscribe::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/subscribers')->with('message','Deleted Successfully'); //reduct rout of url
        }
        else{
            return redirect('admin/subscribers')->with('wmessage','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
    public function bill($id){
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $corderd = Course_order_product::all();
        $coupan = Coupan::all();
        return view("admin.bill",compact('navbar','corder','corderd','id','coupan'));
    }
    public function billprint($id){
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $corderd = Course_order_product::all();
        $coupan = Coupan::all();
        return view("admin.billprint",compact('navbar','corder','corderd','id','coupan'));
    }

    public function print($name){
        $navbar = Navbar::all();
        $users = User::all();
        $contact = Contact::all();
        $subscriber = Subscribe::all();
        $orders = Courseorder::all();
        $coupan = Coupan::all();
        $course = Course::all();
        $category = Category::all();
        return view("admin.print",compact('navbar','users','name','contact','subscriber','orders','coupan','course','category'));
    }
}
