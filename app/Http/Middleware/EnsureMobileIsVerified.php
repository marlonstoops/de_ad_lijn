<?php

namespace App\Http\Middleware;

use Closure;
use App\Contracts\MustVerifyMobile;
use Illuminate\Support\Facades\Redirect;

class EnsureMobileIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyMobile &&
            ! $request->user()->hasVerifiedMobile())) {
            return $request->expectsJson()
                    ? abort(403, 'Your mobile number is not verified.')
                    : Redirect::route($redirectToRoute ?: 'verification.notice')
                        ->withErrors(['Your mobile number is not verified.']);
        }

        return $next($request);
    }
}
