<?php

namespace App\Exceptions;

use Exception;

class SSLNotFoundException extends Exception
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
			'code' => 13040,
			'message' => 'SSL-certificate not found',
			'request_data' => $request->all()
		]);
	}
}
