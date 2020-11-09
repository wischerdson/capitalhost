<?php

namespace App\Exceptions;

use Exception;

class DomainAlreadyAddedException extends Exception
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
			'code' => 13039,
			'message' => 'Domain is already added on account',
			'request_data' => $request->all()
		]);
	}
}
