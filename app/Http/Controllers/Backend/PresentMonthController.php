<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\OtherCost;
use App\Model\BazerCost;
use App\Model\Meal;
use App\Model\MemberMoney;
use App\User;

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
        $totalCost = ($bazerCost + $OtherCost);
        $totalBalance = ($totalDeposit - $totalCost);
        $mealRate = ($totalCost/$totalMeal);
        return view('backend.presentMonth.view-details',compact('totalDeposit','totalMeal','bazerCost','OtherCost','totalCost','totalBalance','mealRate','totalMember'));
        // dd($totalBalance);
    }
}
