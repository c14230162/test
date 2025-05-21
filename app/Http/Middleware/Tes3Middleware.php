<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Tes3Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        \Log::info($role);
        if(in_array('staf', $role)){ //harus akses pake 'staf' karena di web.php ditulisnya hanya bisa diakses oleh staf & admin
            return $next($request);
        }else{
            return response('Unauthorized', 401);
        }
    }
}
