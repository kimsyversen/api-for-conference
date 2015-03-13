<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\SchedulesTransformer;
use Uninett\Eloquent\Schedules\RequestPersonalScheduleCommand\RequestPersonalScheduleCommand;

class PersonalSchedulesController extends \ApiController {

    private $schedulesTransformer;

    function __construct(SchedulesTransformer $schedulesTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->schedulesTransformer = $schedulesTransformer;
    }


    public function showActive($conference_id)
    {
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'user_id'));

        $sessions = $this->execute(RequestPersonalScheduleCommand::class);

        return $this->responder->respond($this->schedulesTransformer->transformCollection($sessions));
    }



//
//
//	/**
//	 * Display a listing of the resource.
//	 * GET /personalschedule
//	 *
//	 * @return Response
//	 */
//	public function index()
//	{
//		//
//	}
//
//	/**
//	 * Show the form for creating a new resource.
//	 * GET /personalschedule/create
//	 *
//	 * @return Response
//	 */
//	public function create()
//	{
//		//
//	}
//
//	/**
//	 * Store a newly created resource in storage.
//	 * POST /personalschedule
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}
//
//	/**
//	 * Display the specified resource.
//	 * GET /personalschedule/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show($id)
//	{
//		//
//	}
//
//	/**
//	 * Show the form for editing the specified resource.
//	 * GET /personalschedule/{id}/edit
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		//
//	}
//
//	/**
//	 * Update the specified resource in storage.
//	 * PUT /personalschedule/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		//
//	}
//
//	/**
//	 * Remove the specified resource from storage.
//	 * DELETE /personalschedule/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}