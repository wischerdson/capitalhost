<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Account\PlugController;

class CheckForSelectedPlan
{
	public function handle(Request $request, Closure $next)
	{
		$user = Auth::guard('user')->user();

		if (is_null($user->selected_plan_id)) {
			if ($request->wantsJson()) {
				return new Response(json_encode('Rate plan in not selected'));
			}

			return new Response((new PlugController)->index());
		}

		return $next($request);
	}
}
