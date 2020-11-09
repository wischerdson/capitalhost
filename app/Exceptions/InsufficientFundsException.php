<?php

namespace App\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
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
			'code' => 13037,
			'message' => 'Insufficient funds to complete this operation',
			'request_data' => $request->all()
		]);
	}
}
