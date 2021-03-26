<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Category::all(); 
    	return view("admin.category",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "c_name"=>"required",
        "image"=>"required", //rules
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("course/",$filename);
    	$r = new Category;
    	$r->c_name=$a->c_name;
        $r->c_status='1';
        $r->image=$filename;
    	$r->save();
    	if($r){
    		return redirect('admin/category')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/category')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Category::find($id);
        $status='1';
        return view("admin.category_edit",compact('edit','status'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('image'))
        {
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("course/",$filename);
        $r =Category::find($b->id);
        $r->c_name=$b->c_name;
        $r->c_status=$b->c_status;
        $r->image=$filename;
        $r->save();
        if($r){
            return redirect('admin/category')->with('message','Updated Successfully'); //reduct rout of url
        }
        else{
            return redirect('admin/category')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $r =Category::find($b->id);
        $r->c_name=$b->c_name;
        $r->c_status=$b->c_status;
        $r->save();
        if($r){
            return redirect('admin/category')->with('message','Updated Successfully'); //reduct rout of url
        }
        else{
            return redirect('admin/category')->with('wmessage','Updated Unsuccessfully');
        }   
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Category::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/category')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/category')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
