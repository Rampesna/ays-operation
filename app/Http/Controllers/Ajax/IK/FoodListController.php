<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\FoodListCheck;
use Illuminate\Http\Request;

class FoodListController extends Controller
{
    public function getFoodListCheck(Request $request)
    {
        return response()->json(
            FoodListCheck::where('employee_id', $request->employee_id)->
            where('food_id', $request->food_id)->
            where('date', $request->date)->
            first()
            , 200);
    }
}
