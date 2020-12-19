<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BazerCost;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $Bazer->save();
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
        $Bazer->save();
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
