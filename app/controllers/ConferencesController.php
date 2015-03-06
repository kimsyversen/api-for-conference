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

	public function index()
	{
//        $limit = Input::get('limit') ?:3;
//        $conferences = Conference::paginate($limit);
//        return $this->respondWithPagination($conferences, $this->transform->transformCollection($conferences->all()));

		$data = Conference::all();
		return $this->responder->respond($this->transform->transformCollection($data->toArray()));
	}

    public function show($id){
		$data = Conference::find($id);
		return $this->responder->respond($this->transform->transform($data->toArray()));
	}

}