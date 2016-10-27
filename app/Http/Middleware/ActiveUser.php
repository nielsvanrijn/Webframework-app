<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $daysactive = abs(strtotime(date('Y-m-d H:i:s')) - strtotime(Auth::user()['created_at']))/60/60/24;
        if (floor($daysactive) >= 4){
            return $next($request);
        }else{
            return redirect('dashboard');
        }
    }
}
