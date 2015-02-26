<?php
use Illuminate\Http\Response as HttpResponse;
use Laracasts\Commander\CommanderTrait;
use Illuminate\Pagination\Paginator as Paginator;
use Uninett\Api\Formatters\OutputFormatter;

class ApiController extends \BaseController {

	use CommanderTrait;

	protected $statusCode = 200;

	protected $limit = 100;

	protected $outputFormatter;

	function __construct(OutputFormatter $outputFormatter)
	{
		$this->outputFormatter = $outputFormatter;
	}

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
		return $this->outputFormatter->response($data, HttpResponse::HTTP_OK, $headers);
	}

	public function respondWithPagination(Paginator $items, $data)
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

	public function respondCreated($message)
	{
		return  $this->outputFormatter->response($message, HttpResponse::HTTP_CREATED, []);
	}

	protected function getUserId()
	{
		return Authorizer::getResourceOwnerId();
	}
}