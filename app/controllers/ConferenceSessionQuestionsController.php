<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\QuestionsTransformer;
use Uninett\Eloquent\Questions\RequestCreateQuestionCommand\RequestCreateQuestionCommand;
use Uninett\Eloquent\Questions\RequestStoreQuestionCommand\RequestStoreQuestionCommand;

class ConferenceSessionQuestionsController extends \ApiController {

    private $questionTransformer;

    function __construct(QuestionsTransformer $questionTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->questionTransformer = $questionTransformer;
    }



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

        return $this->responder->respond($response);
	}

    /**
     * Store a newly created resource in storage.
     * POST /conferencesessionquestions
     *
     * @param $conference_id
     * @param $session_id
     * @return Response
     */
	public function store($conference_id, $session_id)
	{
		$user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'session_id', 'user_id'));

        $response = $this->execute(RequestStoreQuestionCommand::class);

        return $this->responder->respond($this->questionTransformer->transform($response->toArray()));
	}

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