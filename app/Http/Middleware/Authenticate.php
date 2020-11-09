<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\Http\Controllers\Guest\Auth\SignInController;
use Auth;
use Illuminate\Http\Request;

class Authenticate
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string|null
	 */
	public function handle(Request $request, Closure $next)
	{
		if (!Auth::guard('user')->check()) {
			if ($request->ajax() or $request->wantsJson()) {
				return new Response(json_encode('Unauthorized'));
			}

			return new Response((new SignInController)->index($request));
		}

		return $next($request);
	}
}
