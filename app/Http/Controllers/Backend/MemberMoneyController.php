<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\MemberMoney;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MembeDeposity;
use App\Model\Mess;

class MemberMoneyController extends Controller
{
    public function index()
    {
        $mess_id = Auth::user()->mess_id;
        $membermoney = MemberMoney::where('mess_id',$mess_id)->get();
        return view('backend.memberdeposit.view-deposit',compact('membermoney'));
    }
    public function create()
    {
        $mess_id = Auth::user()->mess_id;
        $data['user'] = User::where('mess_id',$mess_id)->get();
        $data['date'] = date('Y-m-d');
        return view('backend.memberdeposit.add-deposit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        $mess_id = Auth::user()->mess_id;
        $amount = new MemberMoney();
        $amount->date = $request->date;
        $amount->user_id = $request->name;
        $amount->money = $request->amount;
        $amount->mess_id = $mess_id;
        $amount->created_by = Auth::user()->id;
        // $amount->save();

        $tar_user = User::where('id',$request->name)->first();
        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Your Money is Deposit";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
        );
        if($amount->save()){
            Mail::to($tar_user->email)->queue(new MembeDeposity($sub,$data));
        }
        $notification=array(
            'message'=>'Successfully Create Deposit !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function Edit($id)
    {
        $mess_id = Auth::user()->mess_id;
        $data['deposit'] = MemberMoney::find($id);
        $data['user'] = User::where('mess_id',$mess_id)->get();
        return view('backend.memberdeposit.edit-deposit',$data);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        $mess_id = Auth::user()->mess_id;
        $amount = MemberMoney::find($id);
        $amount->date = $request->date;
        $amount->user_id = $request->name;
        $amount->money = $request->amount;
        $amount->mess_id = $mess_id;
        $amount->created_by = Auth::user()->id;
        // $amount->save();

        $tar_user = User::where('id',$request->name)->first();
        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Your Money is Modified";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
        );
        if($amount->save()){
            Mail::to($tar_user->email)->queue(new MembeDeposity($sub,$data));
        }

        $notification=array(
            'message'=>'Successfully update Deposit !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        $MemberMoney = MemberMoney::find($request->id);
        $MemberMoney->delete();
    }
    
    
}
