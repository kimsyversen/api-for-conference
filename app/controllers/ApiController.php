<?php

use Illuminate\Support\Facades\Response;

use Illuminate\Http\Response as HttpResponse;

use Laracasts\Commander\CommanderTrait;

class ApiController extends \BaseController {

	use CommanderTrait;

	protected $statusCode = 200;

	protected $limit = 100;

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithPagination(Illuminate\Pagination\Paginator $items, $data)
	{
		$data = array_merge($data, [
			'paginator' => [
				'total_count'  => $items->getTotal(),
				'total_pages'  => ceil($items->getTotal() / $items->getPerPage()),
				'current_page' => $items->getCurrentPage(),
				'limit'        => $items->getPerPage()
			]
		]);

		return $this->respond($data);
	}

	public function respondWithError($message)
	{
		return $this->respond(
			[
				'error' =>
					[
						'message' => $message,
					]
			]);
	}

	public function respondNotFound($message = 'Not found')
	{
		return $this->setStatusCode(HttpResponse::HTTP_NOT_FOUND)->respondWithError($message);
	}

	public function respondInternalError($message = 'Internal error')
	{
		return $this->setStatusCode(HttpResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondCreated($message)
	{
		return $this->setStatusCode(HttpResponse::HTTP_OK)->respond([
			'message' => $message
		]);
	}
}