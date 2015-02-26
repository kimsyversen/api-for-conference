<?php namespace Uninett\Api\Formatters;

use Response;

class OutputFormatter {

	public function errors($error, $error_description, $code, $errors) {
		$data = [
			'error' => $error,
			'error_description' => $error_description,
			'errors' => $errors,
		];

		return $this->negotiate($data, $code, []);
	}

	public function response($data, $code, $headers)
	{
		$format = [
			'data' => $data
		];

		return $this->negotiate($format, $code, $headers);
	}

	private function negotiate($data, $code, $headers)
	{
		/*if (Request::header('Accept') === 'json')
			return Response::json($format, $code, $headers);

		if (Request::header('Accept') === 'xml')
			return "<no>xml</no>";*/

		return Response::json($data, $code, $headers);
	}
}