<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;
use DB;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $display = Alert::all(); 
    	return view("admin.alert",compact('display'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "title"=>"required",
        ]);
        $r = new Alert;
    	$r->title=$a->title;
    	$r->save();
    	if($r){
    		return redirect('admin/alert')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/alert')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Alert::find($id);
        return view("admin.alert_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        $e = Alert::find($b->id);
        $e->title=$b->title;
        $e->save();
        if($e){
            return redirect('admin/alert')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/alert')->with('wmessage','Updated Unsuccessfully');
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Alert::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/alert')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/alert')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
