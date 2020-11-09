<?php

namespace App\Exceptions;

use Exception;

class PersonNotFoundException extends Exception
{
    /**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Throwable  $exception
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Throwable
	 */
	public function render($request)
	{
		return response()->json([
			'status' => 'error',
			'code' => 13038,
			'message' => 'Person not found',
			'request_data' => $request->all()
		]);
	}
}
