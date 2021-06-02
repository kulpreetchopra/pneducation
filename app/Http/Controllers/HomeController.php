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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $signup = User::all();
        $subscribe = Subscribe::all();
        $contact = Contact::all();
        $order = Course_order_product::all();
        return view('admin.index',compact('signup','subscribe','contact','order'));
    }
}
