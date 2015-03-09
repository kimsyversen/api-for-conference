<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\SchedulesTransformer;
use Uninett\Eloquent\Schedules\RequestActiveScheduleCommand\RequestActiveScheduleCommand;


class ConferenceSchedulesController extends ApiController {

    private $schedulesTransformer;

	function __construct(SchedulesTransformer $schedulesTransformer, Responder $responder)
	{
		parent::__construct($responder);

        $this->schedulesTransformer = $schedulesTransformer;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
//		$schedueles =  $this->scheduelesRepository->find($id);
//
//		return $this->responder->respond($this->transform->transformCollection($schedueles->toArray()));
	}


//	/**
//	 * Show the form for creating a new resource.
//	 *
//	 * @return Response
//	 */
//	public function create()
//	{
//		//
//	}
//
//
//	/**
//	 * Store a newly created resource in storage.
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}
//
//
//	/**
//	 * Display the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show($id)
//	{
//		//
//	}
//
//
//	/**
//	 * Show the form for editing the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		//
//	}
//
//
//	/**
//	 * Update the specified resource in storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		//
//	}
//
//
//	/**
//	 * Remove the specified resource from storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}


    public function showActive($conference_id)
    {
        $activeSchedule = $this->execute(RequestActiveScheduleCommand::class, ['conference_id' => $conference_id]);

        return $this->responder->respond($this->schedulesTransformer->transformCollection($activeSchedule));
    }

}
