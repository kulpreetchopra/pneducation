<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use DB;

class WorkshopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Workshop::all(); 
    	return view("admin.workshop",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        "image"=>"required",
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("front/",$filename);
    	$r = new Workshop;
    	$r->title=$a->title;
    	$r->image=$filename;
    	$r->save();
    	if($r){
    		return redirect('admin/workshop')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/workshop')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Workshop::find($id);
        return view("admin.workshop_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('image'))
        {
        $this->validate($b,[
        "title"=>"required",
        "image"=>"required",
        ]);
        $e = Workshop::find($b->id);
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("front/",$filename);
        $e->image=$filename;
        $e->title=$b->title;
        $e->save();
        if($e){
            return redirect('admin/workshop')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/workshop')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $this->validate($b,[
        "title"=>"required",
        ]);
        $e = Workshop::find($b->id);
        $e->title=$b->title;
        $e->save();
        if($e){
            return redirect('admin/workshop')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/workshop')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Workshop::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/workshop')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/workshop')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
