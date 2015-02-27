<?php
use Illuminate\Http\Response as HttpResponse;
use Laracasts\Commander\CommanderTrait;
use Illuminate\Pagination\Paginator as Paginator;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Api\Formatters\OutputFormatter;

class ApiController extends \BaseController {

	use CommanderTrait;

	protected $statusCode = 200;

	protected $limit = 100;

	protected $outputFormatter;

	/**
	 * @param OutputFormatter $outputFormatter
	 */
	function __construct(OutputFormatter $outputFormatter)
	{
		$this->outputFormatter = $outputFormatter;
	}

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param $data
	 * @param array $headers
	 * @return mixed
	 */
	public function respond($data, $headers = [])
	{
		Statistic::logRequest(Request::all());

		return $this->outputFormatter->response($data, HttpResponse::HTTP_OK, $headers);
	}

	/**
	 * @param Paginator $items
	 * @param $data
	 * @return mixed
	 */
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

	/**
	 * @param $message
	 * @return mixed
	 */
	public function respondCreated($message)
	{
		Statistic::logRequest(Request::all());

		return  $this->outputFormatter->response($message, HttpResponse::HTTP_CREATED, []);
	}

	/**
	 * @return string
	 */
	protected function getUserId()
	{
		return Authorizer::getResourceOwnerId();
	}
}