<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\OtherCost;
use App\Model\BazerCost;
use App\Model\Meal;
use App\Model\MemberMoney;
use App\Model\MonthReport;
use App\Model\MonthDetails;
use App\User;
use DB;

class PresentMonthController extends Controller
{
    public function index()
    {   
        $mess_id = Auth::user()->mess_id;
        $totalMember = User::where('mess_id',$mess_id)->count();
        $totalDeposit = MemberMoney::where('mess_id',$mess_id)->sum('money');
        $totalMeal = Meal::where('mess_id',$mess_id)->sum('meal');
        $bazerCost = BazerCost::where('mess_id',$mess_id)->sum('amount');
        $OtherCost = OtherCost::where('mess_id',$mess_id)->sum('amount');
        if(!$totalDeposit){
            $totalDeposit = 0;
        }
        if(!$totalMeal){
            $totalMeal = 0;
        }
        if(!$bazerCost){
            $bazerCost = 0;
        }
        if(!$OtherCost){
            $OtherCost = 0;
        }
        $totalCost = ($bazerCost + $OtherCost);
        $totalBalance = ($totalDeposit - $totalCost);
        if($totalMeal == 0){
            $mealRate = 0;
        }else{
            $mealRate = ($totalCost/$totalMeal);
        }
        //dd($totalBalance);
        return view('backend.presentMonth.view-details',compact('totalDeposit','totalMeal','bazerCost','OtherCost','totalCost','totalBalance','mealRate','totalMember'));
        // dd($totalBalance);
    }
    public function memberDetails()
    {
        $mess_id = Auth::user()->mess_id;
        $memberDeposit = MemberMoney::where('mess_id',$mess_id)->select(DB::raw("sum(money) as total,user_id"))->groupBy('user_id')->get();
        $memberDetails = Meal::where('mess_id',$mess_id)->select(DB::raw("sum(meal) as total,user_id"))->groupBy('user_id')->get();
        $totalMeal = Meal::where('mess_id',$mess_id)->sum('meal');
        $bazerCost = BazerCost::where('mess_id',$mess_id)->sum('amount');
        $OtherCost = OtherCost::where('mess_id',$mess_id)->sum('amount');
        if(!$totalMeal){
            $totalMeal = 0;
        }
        if(!$bazerCost){
            $bazerCost = 0;
        }
        if(!$OtherCost){
            $OtherCost = 0;
        }
        $totalCost = ($bazerCost + $OtherCost);
        if($totalMeal == 0){
            $mealRate = 0;
        }else{
            $mealRate = ($totalCost/$totalMeal);
        }
        return view('backend.presentMonth.member-datails',compact('memberDetails','mealRate','memberDeposit'));
    }
    public function dataStore(Request $request)
    {
        // dd($request->all());
        $mess_id = Auth::user()->mess_id;
        $monthDetails = MonthDetails::where('mess_id',$mess_id)->where('status',0)->first();
        $monthDetails->end_date = date('Y-m-d');
        $monthDetails->status = 1;

        DB::transaction(function () use($request,$monthDetails,$mess_id) {
            // $monthDetails->save();
            if($monthDetails->save()){
                $count = count($request->name);
                for($i = 0; $i < $count; $i++ ){
                    $report = new MonthReport();
                    $report->name = $request->name[$i];
                    $report->total_meal = $request->total_meal[$i];
                    $report->total_cost = $request->total_cost[$i];
                    $report->deposit_amount = $request->deposit_amount[$i];
                    $report->balance = $request->balance[$i];
                    $report->monthDetails_id = $monthDetails->id;
                    $report->created_by = Auth::user()->name;
                    $report->save();
                }
            }
            $startmonth = new MonthDetails();
            $startmonth->mess_id = $mess_id;
            $startmonth->start_date = date('Y-m-d');
            // $startmonth->save();
            if($startmonth->save()){
                OtherCost::where('mess_id',$mess_id)->delete();
                BazerCost::where('mess_id',$mess_id)->delete();
                Meal::where('mess_id',$mess_id)->delete();
                MemberMoney::where('mess_id',$mess_id)->delete();
            }
        });
        $notification=array(
            'message'=>'Successfully Add Present Month Report And Start New Month !',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
