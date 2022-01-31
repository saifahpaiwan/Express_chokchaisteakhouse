<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class isCheckout
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
        $msg="";
        if(auth()->user()){
            if(auth()->user()->is_users == 1){
                if(session('deliveryCart')){
                    if(count(session('deliveryCart'))>0) {
                        $id=Auth::user()->id;
                        $data=User::find($id);  
                        if($data->sender_fname!="" && $data->sender_lname!="" && $data->sender_email!="" && $data->sender_phone!="" && $data->sender_address!=""){
                            return $next($request);
                        } else {
                            $msg="กรุณาระบุชื่อที่อยู่ในการจัดส่ง !";
                        }
                    }
                }
            } 
        }
        return redirect()->route('cart')->with("error", $msg); 
    }
}
