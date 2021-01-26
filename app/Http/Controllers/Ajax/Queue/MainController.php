<?php

namespace App\Http\Controllers\Ajax\Queue;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getQueuesByCompany(Request $request)
    {
        return response()->json(Queue::where('company_id', $request->company_id)->get(), 200);
    }
}
