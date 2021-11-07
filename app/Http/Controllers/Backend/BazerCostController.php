<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BazerCost;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MealCost;
use App\Model\Mess;

class BazerCostController extends Controller
{
    public function index()
    {
        $mess_id = Auth::user()->mess_id;
        $bazer = BazerCost::where('mess_id',$mess_id)->get();
        return view('backend.bazer.view-bazer',compact('bazer'));
    }
    public function create()
    {
        $mess_id = Auth::user()->mess_id;
        $data['user'] = User::where('mess_id',$mess_id)->get();
        $data['date'] = date('Y-m-d');
        return view('backend.bazer.add-bazer',$data);
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
        $Bazer = new BazerCost();
        $Bazer->date = $request->date;
        $Bazer->user_id = $request->name;
        $Bazer->amount = $request->amount;
        $Bazer->description = $request->description;
        $Bazer->mess_id = $mess_id;
        $Bazer->created_by = Auth::user()->id;
        $tar_user = User::where('mess_id',$mess_id)->get();
        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Bazer List Added";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
            'description' => $request->description,
            'route' => 'bazer.view',
        );
        if($Bazer->save()){
            foreach($tar_user as $user){
                Mail::to($user->email)->queue(new MealCost($sub,$data));
            }
        }
        $notification=array(
            'message'=>'Successfully Add Bazer !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $mess_id = Auth::user()->mess_id;
        $data['bazer'] = BazerCost::find($id);
        $data['user'] = User::where('mess_id',$mess_id)->get();
        return view('backend.bazer.edit-bazer',$data);
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
        $Bazer = BazerCost::find($id);
        $Bazer->date = $request->date;
        $Bazer->user_id = $request->name;
        $Bazer->amount = $request->amount;
        $Bazer->description = $request->description;
        $Bazer->mess_id = $mess_id;
        $Bazer->created_by = Auth::user()->id;
        $tar_user = User::where('mess_id',$mess_id)->get();

        $tar_mess = Mess::where('id',$mess_id)->first();
        $sub = $request->date." Bazer List Modified";
        $data = array(
            'user_name' => Auth::user()->name,
            'mess_name' => $tar_mess->name,
            'date' => $request->date,
            'total' => $request->amount,
            'description' => $request->description,
            'route' => 'bazer.view',
        );
        if($Bazer->save()){
            foreach($tar_user as $user){
                Mail::to($user->email)->queue(new MealCost($sub,$data));
            }
        }
        $notification=array(
            'message'=>'Successfully Update Bazer !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        $Bazer = BazerCost::find($request->id);
        $Bazer->delete();
    }
}
