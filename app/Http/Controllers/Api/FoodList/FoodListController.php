<?php

namespace App\Http\Controllers\Api\FoodList;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use App\Models\FoodList;
use Illuminate\Http\Request;

class FoodListController extends Controller
{
    public function FoodList(Request $request)
    {
        if ($request->getMethod() != 'GET') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()), 405);
        }

        return response()->json(Response::SuccessResponse(FoodList::all()), 200);
    }
}
