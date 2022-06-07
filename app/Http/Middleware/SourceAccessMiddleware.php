<?php

namespace App\Http\Middleware;

use App\Models\Transaction;
use Closure;
use Illuminate\Http\Request;

use function PHPSTORM_META\override;

class SourceAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $total = Transaction::sum('amount');
        $amount = $request->input('amount');
        if($request->input('correct-amount') != null){
            $amount = $request->input('correct-amount');
        }
        $overflow = 20000 - ($amount+$total);
        if($overflow < 0){
            $maxPayment = 20000 - $total;
            if($maxPayment > 0){
                $message = "The Machine Can Pay Maximum {$maxPayment}";
            }else{
                $message = "The Machine Can Not Pay";
            }
            return redirect()->to(url('/'))->with('overflow',$message);

        }
        return $next($request);
    }
}
