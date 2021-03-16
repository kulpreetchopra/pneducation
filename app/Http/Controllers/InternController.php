<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;
use DB;

class InternController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Intern::all(); 
    	return view("admin.interns",compact('display'));
    } 
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "name"=>"required",
        "image"=>"required",
        "company"=>"required",
        "designation"=>"required",
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("front/",$filename);
    	$r = new Intern;
    	$r->name=$a->name;
    	$r->image=$filename;
    	$r->company=$a->company;
    	$r->designation=$a->designation;
    	$r->save();
    	if($r){
    		return redirect('admin/interns')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/interns')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Intern::find($id);
        return view("admin.interns_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('image'))
        {
        $e = Intern::find($b->id);
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("front/",$filename);
        $e->image=$filename;
        $e->name=$b->name;
        $e->company=$b->company;
        $e->designation=$b->designation;
        $e->save();
        if($e){
            return redirect('admin/interns')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/interns')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $e = Intern::find($b->id);
        $e->name=$b->name;
        $e->company=$b->company;
        $e->designation=$b->designation;
        $e->save();
        if($e){
            return redirect('admin/interns')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/interns')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Intern::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/interns')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/interns')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
