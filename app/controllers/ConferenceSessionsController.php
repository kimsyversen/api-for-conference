<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\FullSessionsTransformer;
use Uninett\Eloquent\Sessions\RequestSessionCommand\RequestSessionCommand;

class ConferenceSessionsController extends \ApiController {

    private $transformer;

    function __construct(FullSessionsTransformer $transformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->transformer = $transformer;
    }

//	/**
//	 * Display a listing of the resource.
//	 * GET /conferencesessions
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
//	 * GET /conferencesessions/create
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
//	 * POST /conferencesessions
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}

    /**
     * Display the specified resource.
     * GET /conferencesessions/{id}
     *
     * @param $conference_id
     * @param $session_id
     * @return Response
     * @internal param int $id
     */
	public function show($conference_id, $session_id)
    {
        Request::merge(compact('conference_id', 'session_id'));

        $session = $this->execute(RequestSessionCommand::class);

        return $this->responder->respond($this->transformer->transform($session));
	}

    public function showAuthenticated($conference_id, $session_id)
    {
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'session_id', 'user_id'));

        $session = $this->execute(RequestSessionCommand::class);

        return $this->responder->respond($this->transformer->transform($session));
    }

//	/**
//	 * Show the form for editing the specified resource.
//	 * GET /conferencesessions/{id}/edit
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
//	 * PUT /conferencesessions/{id}
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
//	 * DELETE /conferencesessions/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}