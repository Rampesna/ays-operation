<?php

namespace App\Http\Controllers\Api\FoodList\FoodListCheck;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\FoodListCheck;
use Illuminate\Http\Request;

class FoodListCheckController extends Controller
{
    public function Edit(Request $request)
    {
        if ($request->getMethod() != 'GET') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()), 405);
        }

        if (!$request->email) {
            return response()->json(Response::EmptyVariableResponse('email'), 400);
        }

        if (!$request->food_id) {
            return response()->json(Response::EmptyVariableResponse('food_id'), 400);
        }

        $foodListCheck = FoodListCheck::with(['food', 'employee'])
            ->where('food_list_id', $request->food_id)
            ->where('employee_id', Employee::where('email', $request->email)->first()->id)
            ->first();

        if (!$foodListCheck) {
            return response()->json(Response::SuccessResponse(), 204);
        }

        return response()->json(Response::SuccessResponse($foodListCheck), 200);
    }
}
