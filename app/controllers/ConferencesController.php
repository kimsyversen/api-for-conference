<?php

use Uninett\Api\Formatters\OutputFormatter;
use Uninett\Api\Transformers\ConferenceTransformer;

class ConferencesController extends ApiController  {
	private $transform;

	function __construct(ConferenceTransformer $transform, OutputFormatter $outputFormatter)
	{
		parent::__construct($outputFormatter);

		$this->transform = $transform;
	}

	public function index()
	{
		$data = Uninett\Eloquent\Conferences\Conference::all();
		return $this->respond($this->transform->transformCollection($data->toArray()));
	}

    public function show($id){
		$data = Uninett\Eloquent\Conferences\Conference::find($id);
		return $this->respond($this->transform->transform($data->toArray()));
	}

}
