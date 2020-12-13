<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    //view user method
    public function view()
    {
        $mess_id = Auth::user()->mess_id;
        $data['alldata'] = User::where('mess_id',$mess_id)->get();
        $id = Auth::user()->id;
        return view('backend.user.view-user',$data,compact('id'));
    }
    //show member
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show-member',compact('user')); 
    }
    //add user interface method
    public function add()
    {
        return view('backend.user.add-user');
    }
    //store user  method
    public function store(Request $request)
    {
        $mess_id = Auth::user()->mess_id;
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mess_id = $mess_id;
        $data->password = bcrypt($request->password);
        $insert = $data->save();
        if($insert){
            $notification=array(
                'message'=>'Successfully User Created',
                'alert-type'=>'success'
            );
            return redirect()->route('users.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('users.view')->with($notification);
        }
        
    }
    //edit user
    public function edit($id)
    {
        $editdata = User::find($id);
        return view('backend.user.edit-user',compact('editdata'));
    }
    //update user method
    public function update(Request $request,$id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $update = $data->save();
        if($update){
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('users.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('users.view')->with($notification);
        }
        
    }
    //user delete method
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if(file_exists('public/upload/users_images/'.$user->image) AND ! empty($user->image)){
            unlink('public/upload/users_images/'.$user->image);
        }
        $del = $user->delete();
        if($del){
            $notification=array(
                'message'=>'Successfully Delete',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }
}
