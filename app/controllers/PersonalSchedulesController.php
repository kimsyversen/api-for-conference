<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\SchedulesTransformer;
use Uninett\Api\Transformers\SessionsTransformer;
use Uninett\Eloquent\Schedules\RequestDeleteSessionFromPersonalScheduleCommand\RequestDeleteSessionFromPersonalScheduleCommand;
use Uninett\Eloquent\Schedules\RequestPersonalScheduleCommand\RequestPersonalScheduleCommand;
use Uninett\Eloquent\Schedules\RequestAddSessionToPersonalScheduleCommand\RequestAddSessionToPersonalScheduleCommand;

class PersonalSchedulesController extends \ApiController {

    private $schedulesTransformer;

    private $sessionsTransformer;

    function __construct(SchedulesTransformer $schedulesTransformer, SessionsTransformer $sessionsTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->schedulesTransformer = $schedulesTransformer;

        $this->sessionsTransformer = $sessionsTransformer;
    }

    public function showActive($conference_id)
    {
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'user_id'));

        $sessions = $this->execute(RequestPersonalScheduleCommand::class);

        return $this->responder->respond($this->schedulesTransformer->transformCollection($sessions));
    }

    /**
     * Store a newly created resource in storage.
     * POST /personalschedule
     *
     * @param $conference_id
     * @return Response
     */
    public function store($conference_id)
    {
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'user_id'));

        $session = $this->execute(RequestAddSessionToPersonalScheduleCommand::class);

        return $this->responder->respond($this->sessionsTransformer->transform($session));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /personalschedule/{id}
     *
     * @param $conference_id
     * @param $session_id
     * @return Response
     * @internal param int $id
     */
	public function destroy($conference_id, $session_id)
	{
		$user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'session_id', 'user_id'));

        $session = $this->execute(RequestDeleteSessionFromPersonalScheduleCommand::class);

        return $this->responder->respond($this->sessionsTransformer->transform($session));
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


}