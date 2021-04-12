<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Subscribe;
use App\User;
use App\Course_order_product;

class AdminController extends Controller
{
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
}
