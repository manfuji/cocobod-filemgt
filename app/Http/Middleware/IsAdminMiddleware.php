<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $id)
    {
        $employee = Employee::where('id',$id)->first();
        $users = User::where('email', $employee->email)->first();
        if(!$user->role=== "admin"){
            return response()->json(['status'=>'failed','message'=>'You must be an admin to access this function']);
        }
        else{
            return $next($request);
        }
    }
}
