<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navbar;
use DB;

class NavbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Navbar::all(); 
    	return view("admin.navbar",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "contact"=>"required",
        "email"=>"required",
        "logo"=>"required",
        "about"=>"required",
        "address"=>"required",
        "timing"=>"required",
        "map"=>"required",
        "facebook"=>"required",
        "twitter"=>"required",
        "instagram"=>"required",
        "linkedin"=>"required",
        ]);
        $file = $a->file('logo');
        $filename = 'logo'. time().'.'.$a->logo->extension();
        $file->move("front/",$filename);
    	$r = new Navbar;
    	$r->contact=$a->contact;
    	$r->email=$a->email;
    	$r->logo=$filename;
    	$r->about=$a->about;
    	$r->address=$a->address;
        $r->timing=$a->timing;
        $r->map=$a->map;
    	$r->facebook=$a->facebook;
    	$r->twitter=$a->twitter;
    	$r->instagram=$a->instagram;
    	$r->linkedin=$a->linkedin;
    	$r->save();
    	if($r){
    		return redirect('admin/navbar')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/navbar')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Navbar::find($id);
        return view("admin.navbar_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('logo'))
        {
        $e = Navbar::find($b->id);
        $file = $b->file('logo');
        $filename = 'logo'. time().'.'.$b->logo->extension();
        $file->move("front/",$filename);
        $e->contact=$b->contact;
    	$e->email=$b->email;
    	$e->logo=$filename;
    	$e->about=$b->about;
    	$e->address=$b->address;
        $e->timing=$b->timing;
        $e->map=$b->map;
    	$e->facebook=$b->facebook;
    	$e->twitter=$b->twitter;
    	$e->instagram=$b->instagram;
    	$e->linkedin=$b->linkedin;
        $e->save();
        if($e){
            return redirect('admin/navbar')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/navbar')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $e = Navbar::find($b->id);
        $e->contact=$b->contact;
    	$e->email=$b->email;
    	$e->about=$b->about;
    	$e->address=$b->address;
        $e->timing=$b->timing;
        $e->map=$b->map;
    	$e->facebook=$b->facebook;
    	$e->twitter=$b->twitter;
    	$e->instagram=$b->instagram;
    	$e->linkedin=$b->linkedin;
        $e->save();
        if($e){
            return redirect('admin/navbar')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/navbar')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Navbar::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/navbar')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/navbar')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
