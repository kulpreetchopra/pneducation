<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('admin.index');
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
            return redirect('admin/contact')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/contact')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
