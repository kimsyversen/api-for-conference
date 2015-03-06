<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\SchedulesTransformer;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Schedules\ScheduelesRepository;


class ConferenceScheduelesController extends ApiController {

	private $transform;
	private $scheduelesRepository;

	function __construct(SchedulesTransformer $transform, Responder $responder, ScheduelesRepository $scheduelesRepository)
	{
		parent::__construct($responder);

		$this->transform = $transform;

		$this->scheduelesRepository = $scheduelesRepository;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$schedueles =  $this->scheduelesRepository->find($id);

		return $this->responder->respond($this->transform->transformCollection($schedueles->toArray()));
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
