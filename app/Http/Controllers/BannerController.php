<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use DB;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Banner::all(); 
    	return view("admin.banner",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        "bgimage"=>"required",
        "discription"=>"required",
        ]);
        $file = $a->file('bgimage');
        $filename = 'bgimage'. time().'.'.$a->bgimage->extension();
        $file->move("front/",$filename);
    	$r = new Banner;
    	$r->title=$a->title;
    	$r->bgimage=$filename;
    	$r->discription=$a->discription;
    	$r->save();
    	if($r){
    		return redirect('admin/banner')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/banner')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Banner::find($id);
        return view("admin.banner_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        if($b->hasFile('bgimage'))
        {
        $this->validate($b,[
        "title"=>"required",
        "bgimage"=>"required",
        "discription"=>"required",
        ]);
        $e = Banner::find($b->id);
        $file = $b->file('bgimage');
        $filename = 'bgimage'. time().'.'.$b->bgimage->extension();
        $file->move("front/",$filename);
        $e->bgimage=$filename;
        $e->title=$b->title;
        $e->discription=$b->discription;
        $e->save();
        if($e){
            return redirect('admin/banner')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/banner')->with('wmessage','Updated Unsuccessfully');
        }
        }
        else{
        $this->validate($b,[
        "title"=>"required",
        "discription"=>"required",
        ]);
        $e = Banner::find($b->id);
        $e->title=$b->title;
        $e->discription=$b->discription;
        $e->save();
        if($e){
            return redirect('admin/banner')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/banner')->with('wmessage','Updated Unsuccessfully');
        }
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=banner::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/banner')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/banner')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
