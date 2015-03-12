<?php

use Carbon\Carbon;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Eloquent\Questions\RequestCreateQuestionCommand\RequestCreateQuestionCommand;

class ConferenceSessionQuestionsController extends \ApiController {

//	/**
//	 * Display a listing of the resource.
//	 * GET /conferencesessionquestions
//	 *
//	 * @return Response
//	 */
//	public function index()
//	{
//		//
//	}

    /**
     * Show the form for creating a new resource.
     * GET /conferencesessionquestions/create
     *
     * @param $conference_id
     * @param $session_id
     * @return Response
     */
	public function create($conference_id, $session_id)
	{
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'session_id', 'user_id'));

        $response = $this->execute(RequestCreateQuestionCommand::class);

        return $response;
	}

//	/**
//	 * Store a newly created resource in storage.
//	 * POST /conferencesessionquestions
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
//	 * GET /conferencesessionquestions/{id}
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
//	 * GET /conferencesessionquestions/{id}/edit
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
//	 * PUT /conferencesessionquestions/{id}
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
//	 * DELETE /conferencesessionquestions/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}