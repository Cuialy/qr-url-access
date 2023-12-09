<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('admin')){
            return redirect()->route('admin.login');
        }
        $adminCheck = Admin::where('hashed_id', session()->get('admin')->hashed_id)->first();
        if(!$adminCheck){
            return redirect()->route('admin.login');
        }
        $request->merge(['admin' => $adminCheck]);
        return $next($request);
    }
}
