<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Portfolio;
use DB;

class AboutController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    //About
    public function display()
    {
        $display = About::all(); 
    	return view("admin.about",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        "icon"=>"required",
        "image"=>"required",
        "about"=>"required",
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("front/",$filename);
    	$r = new About;
    	$r->title=$a->title;
    	$r->icon=$a->icon;
    	$r->image=$filename;
    	$r->about=$a->about;
    	$r->save();
    	if($r){
    		return redirect('admin/about')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/about')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= About::find($id);
        return view("admin.about_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('image'))
        {
        $this->validate($b,[
        "title"=>"required",
        "icon"=>"required",
        "image"=>"required",
        "about"=>"required",
        ]);
        $e = About::find($b->id);
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("front/",$filename);
        $e->image=$filename;
        $e->title=$b->title;
    	$e->icon=$b->icon;
    	$e->about=$b->about;
        $e->save();
        if($e){
            return redirect('admin/about')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/about')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $this->validate($b,[
        "title"=>"required",
        "icon"=>"required",
        "about"=>"required",
        ]);
        $e = About::find($b->id);
        $e->title=$b->title;
    	$e->icon=$b->icon;
    	$e->about=$b->about;
        $e->save();
        if($e){
            return redirect('admin/about')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/about')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=About::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/about')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/about')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
    //Portfolio
     public function display1()
    {
        $display = Portfolio::all(); 
    	return view("admin.portfolio",compact('display'));
    }
    public function submit1(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        "url"=>"required",
        "image"=>"required",
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("front/",$filename);
    	$r = new Portfolio;
    	$r->title=$a->title;
    	$r->url=$a->url;
    	$r->image=$filename;
    	$r->save();
    	if($r){
    		return redirect('admin/portfolio')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/portfolio')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit1($id)
    {
        $edit= Portfolio::find($id);
        return view("admin.portfolio_edit",compact('edit'));
    }
    public function update1(Request $b)
    {
        if($b->hasFile('image'))
        {
        $this->validate($b,[
        "title"=>"required",
        "url"=>"required",
        "image"=>"required",
        ]);
        $e = Portfolio::find($b->id);
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("front/",$filename);
        $e->image=$filename;
        $e->title=$b->title;
    	$e->url=$b->url;
        $e->save();
        if($e){
            return redirect('admin/portfolio')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/portfolio')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $this->validate($b,[
        "title"=>"required",
        "url"=>"required",
        ]);
        $e = Portfolio::find($b->id);
        $e->title=$b->title;
    	$e->url=$b->url;
        $e->save();
        if($e){
            return redirect('admin/portfolio')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/portfolio')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete1($id)
    {
        echo $id;
        $d=Portfolio::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/portfolio')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/portfolio')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
