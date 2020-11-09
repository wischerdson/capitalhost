<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidDomainException extends Exception
{
    /**
	 * Report or log an exception.
	 *
	 * @return void
	 */
	public function report()
	{
		
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Throwable  $exception
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Throwable
	 */
	public function render(Request $request)
	{
		return response()->json([
			'status' => 'error',
			'code' => 13036,
			'message' => 'Domain is invalid or is not being served',
			'request_data' => $request->all()
		]);
	}
}
