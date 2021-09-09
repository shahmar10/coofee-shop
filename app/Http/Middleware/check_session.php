<?php

namespace App\Http\Middleware;

use App\Models\Basket;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class check_session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( !Session::get('session') ) {
            while(true){
                $uniq = substr(uniqid(md5(time() . rand(0, 999))), 0, 12);

                $check = Basket::select('session')->where('session',$uniq)->first();

                if( empty($check) ){
                    break;
                }
            }
            Session::put('session',$uniq);
        }

        return $next($request);
    }
}
