<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\OtherCost;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MealCost;
use App\Model\Mess;


class OtherCostController extends Controller
{
    public function index()
    {
        $mess_id = Auth::user()->mess_id;
        $other = OtherCost::where('mess_id',$mess_id)->get();
        return view('backend.other.view-other',compact('other'));
    }
    public function create()
    {
        $mess_id = Auth::user()->mess_id;
        $data['user'] = User::where('mess_id',$mess_id)->get();
        $data['date'] = date('Y-m-d');
        return view('backend.other.add-other',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);
        $mess_id = Auth::user()->mess_id;
        $other = new OtherCost();
        $other->date = $request->date;
        $other->user_id = $request->name;
        $other->amount = $request->amount;
        $other->description = $request->description;
        $other->mess_id = $mess_id;
        $other->created_by = Auth::user()->id;
        // $other->save();

        $tar_user = User::where('mess_id',$mess_id)->get();
        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Other Cost Added";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
            'description' => $request->description,
            'route' => 'other.view',
        );
        if($other->save()){
            foreach($tar_user as $user){
                Mail::to($user->email)->queue(new MealCost($sub,$data));
            }
        }

        $notification=array(
            'message'=>'Successfully Add Other Cost !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $mess_id = Auth::user()->mess_id;
        $data['other'] = OtherCost::find($id);
        $data['user'] = User::where('mess_id',$mess_id)->get();
        return view('backend.other.edit-other',$data);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);
        $mess_id = Auth::user()->mess_id;
        $other = OtherCost::find($id);
        $other->date = $request->date;
        $other->user_id = $request->name;
        $other->amount = $request->amount;
        $other->description = $request->description;
        $other->mess_id = $mess_id;
        $other->created_by = Auth::user()->id;
        // $other->save();

        $tar_user = User::where('mess_id',$mess_id)->get();
        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Other Cost Modified";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
            'description' => $request->description,
            'route' => 'other.view',
        );
        if($other->save()){
            foreach($tar_user as $user){
                Mail::to($user->email)->queue(new MealCost($sub,$data));
            }
        }

        $notification=array(
            'message'=>'Successfully Update Other Cost !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        $other = OtherCost::find($request->id);
        $other->delete();
    }
}
