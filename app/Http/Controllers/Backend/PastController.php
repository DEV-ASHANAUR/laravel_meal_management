<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\MonthDetails;
use App\Model\MonthReport;


class PastController extends Controller
{
    public function index()
    {
        $mess_id = Auth::user()->mess_id;
        $month = MonthDetails::where('mess_id',$mess_id)->where('status',1)->orderBy('id','desc')->get();
        return view('backend.pastMonth.view-details',compact('month'));
    }
    public function edit($id)
    {
        $month = MonthDetails::where('id',$id)->first();
        return view('backend.pastMonth.edit-name',compact('month'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $month = MonthDetails::find($id);
        $month->name = $request->name;
        $month->save();
        $notification=array(
            'message'=>'Successfully update Month Name !',
            'alert-type'=>'success'
        );
        return redirect()->route('pastMonth.view')->with($notification);
    }
    public function delete(Request $request)
    {
        $user = MonthDetails::find($request->id);
        MonthReport::where('monthDetails_id',$user->id)->delete();
        $user->delete();
    }
    public function show($id)
    {
        $report = MonthReport::where('monthDetails_id',$id)->get();
        return view('backend.pastMonth.show',compact('report'));
    }
    
}
