<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Model\Mess;
use App\Model\MonthDetails;
use App\User;
use DB;

class MessController extends Controller
{
    public function index()
    {
        return view('backend.mess.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required'
        ]);
        $mess = new Mess();
        $mess->name = $request->name;
        $mess->created_by = Auth::user()->id;
        $mess->address = $request->address;

        DB::transaction(function () use($request,$mess) {
            $mess->save();
            $user = User::find(Auth::user()->id);
            $user->mess_id = $mess->id;
            $user->save();
            $month = new MonthDetails();
            $month->mess_id = $mess->id;
            $month->start_date = date('Y-m-d');
            $month->save();
        });
        $notification=array(
            'message'=>'Successfully Create Mess !',
            'alert-type'=>'success'
        );
        return redirect()->route('home')->with($notification);
    }
    //show mess
    public function show()
    {
        $mess_id = Auth::user()->mess_id;
        $mess = Mess::find($mess_id);
        // dd($mess);
        return view('backend.mess.show-mess',compact('mess'));
    }
    //edit mess
    public function edit()
    {
        $mess_id = Auth::user()->mess_id;
        $editdata = Mess::find($mess_id);
        return view('backend.mess.edit',compact('editdata'));
    }
    //update mess
    public function update(Request $request)
    {
        // dd('ok');mess_type
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required'
        ]);
        $mess_id = Auth::user()->mess_id;
        $mess = Mess::find($mess_id);
        $mess->name = $request->name;
        $mess->address = $request->address;
        $mess->mess_type = $request->mess_type;
        $mess->save();
        $notification=array(
            'message'=>'Successfully Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('mess.show')->with($notification);
    }
    //mess delete
    public function delete()
    {
        $mess_id = Auth::user()->mess_id;
        $mess = Mess::find($mess_id);
        $user = User::find(Auth::user()->id);
        $user->mess_id = '';
        $user->save();
        User::where('mess_id',$mess_id)->delete();
        $mess->delete();
        $notification=array(
            'message'=>'Successfully Delete Mess !',
            'alert-type'=>'success'
        );
        return redirect()->route('home')->with($notification);
    }
}
