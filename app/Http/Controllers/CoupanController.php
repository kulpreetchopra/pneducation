<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupan;
use DB;

class CoupanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        $coupan = Coupan::all(); 
    	return view("admin.coupan",compact('coupan'));
    }
    public function submit(Request $a)
    {   
        $this->validate($a,[
        "coupan_code"=>"required",
        "discount"=>"required",
        "status"=>"required",
        "expiry_date"=>"required",
        ]);
    	$r = new Coupan;
    	$r->coupan_code=$a->coupan_code;
    	$r->discount=$a->discount;
    	$r->status=$a->status;
    	$r->expiry_date=$a->expiry_date;
    	$r->save();
    	if($r){
    		return redirect('admin/coupan')->with('message','Submitted Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('admin/coupan')->with('wmessage','Submitted Unsuccessfully');
        }
    }
    public function edit($id)
    {
        $edit= Coupan::find($id);
        return view("admin.coupan_edit",compact('edit'));
    }
    public function update(Request $b)
    {
        $this->validate($b,[
        "coupan_code"=>"required",
        "discount"=>"required",
        "status"=>"required",
        "expiry_date"=>"required",
        ]);
        $e = Coupan::find($b->id);
        $e->coupan_code=$b->coupan_code;
    	$e->discount=$b->discount;
    	$e->status=$b->status;
    	$e->expiry_date=$b->expiry_date;
        $e->save();
        if($e){
            return redirect('admin/coupan')->with('message','Updated Successfully');  //reduct rout of url
        }
        else{
            return redirect('admin/coupan')->with('wmessage','Updated Unsuccessfully');
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Coupan::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('admin/coupan')->with('message','Deleted Successfully');; //reduct rout of url
        }
        else{
            return redirect('admin/coupan')->with('message','Deleted Unsuccessfully'); //reduct rout of url
        }
    }
}
