<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Model\Mess;
use Illuminate\Http\Request;
use App\Model\OtherCost;
use App\Model\BazerCost;
use App\Model\Meal;
use App\Model\MemberMoney;
use App\Model\MonthReport;
use App\Model\MonthDetails;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $mess_id = Auth::user()->mess_id;

        if($mess_id !=null){
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
            return view('backend.layouts.home',compact('totalDeposit','totalMeal','bazerCost','OtherCost','totalCost','totalBalance','mealRate','totalMember'));
        }else{
            return view('backend.mess.create');
        }
        
    }
}
