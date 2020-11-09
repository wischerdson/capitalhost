<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
		if (((string) $request->input('secret')) === '255655') {
			return $next($request);
		}
		
		abort(404);
	}
}
