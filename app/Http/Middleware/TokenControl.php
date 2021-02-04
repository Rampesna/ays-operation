<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\Response;
use Closure;
use Illuminate\Http\Request;

class TokenControl
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->header('operationToken'))) {
            return response()->json(Response::EmptyTokenResponse(), 401);
        }

        if ($request->header('operationToken') != env('OPERATION_TOKEN')) {
            return response()->json(Response::WrongTokenResponse(), 401);
        }

        return $next($request);
    }
}
