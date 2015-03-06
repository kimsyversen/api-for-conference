<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\ConferenceTransformer;
use Uninett\Eloquent\Conferences\Conference;

class ConferencesController extends ApiController  {

    private $transform;

	function __construct(ConferenceTransformer $transform, Responder $responder)
	{
		parent::__construct($responder);

		$this->transform = $transform;
	}


    /**
     * Get the paginated version of all the conferences
     * in the system.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
	{
        $limit = Input::get('limit') ?: 10;

        $conferences = Conference::paginate($limit);

        return $this->responder->respondWithPagination($this->transform->transformCollection($conferences->all()), $conferences);
	}

    public function show($id){
		$data = Conference::findOrFail($id);
		return $this->responder->respond($this->transform->transform($data->toArray()));
	}

}