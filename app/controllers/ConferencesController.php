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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Uninett\Eloquent\Conferences\Conference::all();
		return $this->respond($this->transform->transformCollection($data->toArray()));
	}


	public function getConferenceById($id){
		$data = Uninett\Eloquent\Conferences\Conference::find($id);
		return $this->respond($this->transform->transform($data->toArray()));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
