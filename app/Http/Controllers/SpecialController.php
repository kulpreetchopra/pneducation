<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Special;
use DB;


class SpecialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Special::all(); 
    	return view("admin.special",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        "icon"=>"required",
        "about"=>"required",
        ]);
    	$r = new Special;
    	$r->title=$a->title;
    	$r->icon=$a->icon;
    	$r->about=$a->about;
    	$r->save();
    	if($r){
    		return redirect('admin/special')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/special')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Special::find($id);
        return view("admin.special_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        $e = Special::find($b->id);
        $e->title=$b->title;
        $e->icon=$b->icon;
        $e->about=$b->about;
        $e->save();
        if($e){
            return redirect('admin/special')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/special')->with('wmessage','Updated Unsuccessfully');
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Special::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/special')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/special')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
