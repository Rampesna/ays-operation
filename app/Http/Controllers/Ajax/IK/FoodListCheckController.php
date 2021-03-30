<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\FoodListCheck;
use Illuminate\Http\Request;

class FoodListCheckController extends Controller
{
    public function getFoodListCheck(Request $request)
    {
        return response()->json(
            FoodListCheck::with(['food'])->where('employee_id', $request->employee_id)->
            where('food_list_id', $request->food_id)->
            first()
            , 200);
    }

    public function setFoodCheck(Request $request)
    {
        $foodListCheck = FoodListCheck::find($request->food_list_check_id);
        !is_null($request->get('check')) ? $foodListCheck->checked = $request->get('check') : null;
        $foodListCheck->description = $request->description;
        $foodListCheck->save();
    }
}
