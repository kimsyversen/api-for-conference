<?php namespace Uninett\Api\Responders;

use Laracasts\Commander\CommanderTrait;
use Request;
use Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Pagination\Paginator;
use Uninett\Api\Requests\LogRequestCommand;

class Responder {

    use CommanderTrait;

    /**
     * @var int
     */
    protected $statusCode = HttpResponse::HTTP_OK;

    /**
     * Retrieve the HTTP status code of the response
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the HTTP status code for the response
     *
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Send response with default success layout
     *
     * @param $data
     * @param array $metadata
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, array $metadata = [], $headers = [])
    {
        $outputData = array_merge([
            'data' => $data,
        ], $metadata);

        return $this->negotiateOutputFormat($outputData, $this->getStatusCode(), $headers);
    }

    /**
     * Send error response with default error data layout
     *
     * @param $error
     * @param $error_description
     * @param $errors
     * @param array $metadata
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($error, $error_description, $errors, array $metadata = [], $headers = [])
    {
        $outputData = array_merge([
            'error' => $error,
            'error_description' => $error_description,
            'errors' => $errors,
        ], $metadata);

        return $this->negotiateOutputFormat($outputData, $this->getStatusCode(), $headers);
    }

    /**
     * Respond with pagination data layout
     *
     * @param $data
     * @param Paginator $paginator
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithPagination($data, Paginator $paginator)
    {
        $paginatorData = [
            'paginator' => [
                'total_count' => $paginator->getTotal(),
                'total_pages' => $paginator->getLastPage(),
                'current_page' => $paginator->getCurrentPage(),
                'limit' => $paginator->getPerPage()
            ]
        ];

        return $this->respond($data, $paginatorData);
    }

    /**
     * Send response with HTTP_CREATED status code
     *
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondCreated($message)
    {
        return  $this->setStatusCode(HttpResponse::HTTP_CREATED)->respond($message);
    }

    /**
     * Send the right response format
     *
     * @param $data
     * @param $code
     * @param $headers
     * @return \Illuminate\Http\JsonResponse
     */
    private function negotiateOutputFormat($data, $code, $headers)
    {
        //TODO: This should probably be placed a place before the response is made. However, this works "for now".
        //This is for logging statistics
        $this->execute(LogRequestCommand::class, ['request' => Request::server('PATH_INFO') ]);

        // If the api is to offer more output formats, add them here.
        // For now we are just offering json.

//		if (Request::header('Accept') === 'json')
//			return Response::json($format, $code, $headers);
//
//		if (Request::header('Accept') === 'xml')
//			return "<no>xml</no>";

        return Response::json($data, $code, $headers);
    }

    /*
	public function errors($error, $error_description, $code, $errors) {

		$headers = [];

		$data = [
			'error' => $error,
			'error_description' => $error_description,
			'errors' => $errors,
		];

		return $this->negotiate($data, $code, $headers);
	}

	public function response($data, $code, $headers)
	{
		$dataFormat = [
			'data' => $data
		];

		return $this->negotiate($dataFormat, $code, $headers);
	}

	private function negotiate($data, $code, $headers)
	{
//		if (Request::header('Accept') === 'json')
//			return Response::json($format, $code, $headers);
//
//		if (Request::header('Accept') === 'xml')
//			return "<no>xml</no>";

		return Response::json($data, $code, $headers);
	}*/
}