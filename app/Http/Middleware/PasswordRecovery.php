<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use App\User;

class PasswordRecovery
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
		$token = $request->input('token');
		$userId = $request->input('user_id');

		$user = User::find($userId);
		$user->load(['passwordReset' => function ($q) use ($token) {
			$q->where('token', $token);
		}]);

		if (!$user or $user->passwordReset->isEmpty())
			abort(404);

		$request->request->add(['user' => $user]);

		return $next($request);
	}
}
