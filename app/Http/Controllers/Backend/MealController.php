<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Meal;
use DB;
class MealController extends Controller
{
    public function index()
    {
        $mess_id = Auth::user()->mess_id;
        $meal = Meal::where('mess_id',$mess_id)->select(DB::raw("sum(meal) as total,date"))->groupBy('date')->get();
        // dd($meal);
        return view("backend.meal.view",compact('meal'));
    } 
    public function delete($date)
    {
        $mess_id = Auth::user()->mess_id;
        Meal::where('mess_id',$mess_id)->where('date',$date)->delete();
        $notification=array(
            'message'=>'Successfully Delete',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }      
    /**
     * edit
     *
     * @param  mixed $date
     * @return particular date meal
     */
    public function edit($date)
    {
        $mess_id = Auth::user()->mess_id;
        $editMeal = Meal::with('user')->where('mess_id',$mess_id)->where('date',$date)->get();
        return view("backend.meal.edit",compact('editMeal'));
    } 
    public function update(Request $request)
    {
        // dd($request->all());
        $mess_id = Auth::user()->mess_id;
        $user_id = count($request->user_id);
        for($i = 0; $i < $user_id; $i++ ){
            $meal = Meal::where('mess_id',$mess_id)->where('date',$request->date)->where('user_id',$request->user_id[$i])->first();
            $meal->user_id = $request->user_id[$i];
            $meal->mess_id = $mess_id;
            $meal->meal = $request->meal[$i];
            $meal->date = $request->date;
            $meal->created_by = Auth::user()->id;
            $meal->save();
        }
        $notification=array(
            'message'=>'Successfully Meal Updated !',
            'alert-type'=>'success'
        );
        // return redirect()->route('meal.view')->with($notification);
        return redirect()->back()->with($notification);

        
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $mess_id = Auth::user()->mess_id;
        $data['member'] = User::where('mess_id',$mess_id)->get();
        $data['date'] = date('Y-m-d');
        return view("backend.meal.create",$data);
    }    
    /**
     * store meal
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $mess_id = Auth::user()->mess_id;
        $date = date('Y-m-d',strtotime($request->date));
        $exitornot = Meal::where('mess_id',$mess_id)->where('date',$date)->first();
        if($exitornot){
            $notification=array(
                'message'=>"Today's Meal Already Added !",
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $user_id = count($request->user_id);
            for($i = 0; $i < $user_id; $i++ ){
                $meal = new Meal();
                $meal->user_id = $request->user_id[$i];
                $meal->mess_id = $mess_id;
                $meal->meal = $request->meal[$i];
                $meal->date = $date;
                $meal->created_by = Auth::user()->id;
                $meal->save();
            }
            $notification=array(
                'message'=>'Successfully Meal Added !',
                'alert-type'=>'success'
            );
            return redirect()->route('meal.view')->with($notification);
        }
        
    }
    
    
    
    
}
