<?php

namespace App\Exceptions;

use Exception;

class PlanNotFoundException extends Exception
{
	/**
	 * Render the exception as an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function render($request)
	{
		return response()->json([
			'status' => 'error',
			'code' => 13041,
			'message' => 'Plan not found',
			'request_data' => $request->all()
		]);
	}
}
