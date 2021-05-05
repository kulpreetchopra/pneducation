<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use DB;

class TeamController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Team::all(); 
    	return view("admin.ourteam",compact('display'));
    } 
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "name"=>"required",
        "image"=>"required",
        "about"=>"required",
        "comment"=>"required",
        ]);
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension();
        $file->move("front/",$filename);
    	$r = new Team;
    	$r->name=$a->name;
    	$r->image=$filename;
    	$r->about=$a->about;
        $r->comment=$a->comment;
    	$r->save();
    	if($r){
    		return redirect('admin/ourteam')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/ourteam')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Team::find($id);
        return view("admin.ourteam_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('image'))
        {
        $e = Team::find($b->id);
        $file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension();
        $file->move("front/",$filename);
        $e->image=$filename;
        $e->name=$b->name;
        $e->about=$b->about;
        $e->comment=$b->comment;
        $e->save();
        if($e){
            return redirect('admin/ourteam')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/ourteam')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $e = Team::find($b->id);
        $e->name=$b->name;
        $e->about=$b->about;
        $e->comment=$b->comment;
        $e->save();
        if($e){
            return redirect('admin/ourteam')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/ourteam')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Team::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/ourteam')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/ourteam')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
