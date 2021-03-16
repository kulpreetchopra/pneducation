<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use DB;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display1 = Category::all();
        $display2 = Course::all(); 
    	return view("admin.course",compact('display1','display2'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "c_name"=>"required",
        "c_discription"=>"required",
        "c_price"=>"required",
        "c_details"=>"required",
        "c_include"=>"required",
        "c_containt"=>"required",
        "c_image"=>"required",
        "c_category"=>"required",
        "c_teacher"=>"required",
        ]);
        $file = $a->file('c_image');
        $filename = 'c_image'. time().'.'.$a->c_image->extension();
        $file->move("course/",$filename);
    	$r = new Course;
    	$r->c_name=$a->c_name;
    	$r->c_discription=$a->c_discription;
    	$r->c_price=$a->c_price;
    	$r->c_details=$a->c_details;
    	$r->c_include=$a->c_include;
    	$r->c_containt=$a->c_containt;
        $r->c_image=$filename;
        $r->c_category=$a->c_category;
        $r->c_teacher=$a->c_teacher;
    	$r->save();
    	if($r){
    		return redirect('admin/course')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/course')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Course::find($id);
        $display1 = Category::all();
        return view("admin.course_edit",compact('edit','display1'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('c_image'))
        {
        $e = Course::find($b->id);
        $file = $b->file('c_image');
        $filename = 'c_image'. time().'.'.$b->c_image->extension();
        $file->move("course/",$filename);
        $e->c_image=$filename;
        $e->c_name=$b->c_name;
        $e->c_discription=$b->c_discription;
        $e->c_price=$b->c_price;
        $e->c_details=$b->c_details;
        $e->c_include=$b->c_include;
        $e->c_containt=$b->c_containt;
        $e->c_category=$b->c_category;
        $e->c_teacher=$b->c_teacher;
        $e->save();
        if($e){
            return redirect('admin/course')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/course')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $e = Course::find($b->id);
        $e->c_name=$b->c_name;
        $e->c_discription=$b->c_discription;
        $e->c_price=$b->c_price;
        $e->c_details=$b->c_details;
        $e->c_include=$b->c_include;
        $e->c_containt=$b->c_containt;
        $e->c_category=$b->c_category;
        $e->c_teacher=$b->c_teacher;
        $e->save();
        if($e){
            return redirect('admin/course')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/course')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Course::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/course')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/course')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
