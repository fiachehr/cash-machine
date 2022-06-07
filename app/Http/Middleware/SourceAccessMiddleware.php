<?php

namespace App\Http\Middleware;

use App\Models\Transaction;
use Closure;
use Illuminate\Http\Request;

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
        $amount = $request->input('amount');
        if ($request->input('correct-amount') != null) {
            $amount = $request->input('correct-amount');
        }
        if(!preg_replace('/[^0-9]/', '', $amount)){
            return redirect()->to(url('/'))->with('overflow', 'Amount Is Incorrect');
        }

        $total = Transaction::sum('amount');
        $overflow = 20000 - ($amount + $total);
        if ($overflow < 0) {
            $maxPayment = 20000 - $total;
            if ($maxPayment > 0) {
                $message = "The Machine Can Pay Maximum {$maxPayment}";
            } else {
                $message = "The Machine Can Not Pay";
            }
            return redirect()->to(url('/'))->with('overflow', $message);

        }
        return $next($request);
    }
}
