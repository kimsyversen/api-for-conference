<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\ChatTransformer;
use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Chats\RequestConferenceChatsCommand\RequestConferenceChatsCommand;

class ChatsController extends \ApiController {

    private $chatTransformer;

    function __construct(ChatTransformer $chatTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->chatTransformer = $chatTransformer;
    }


    /**
     * Display a listing of the resource.
     * GET /chats
     *
     * @param $conference_id
     * @return Response
     */
	public function index($conference_id)
	{
        $user_id = $this->getUserId();

        Request::merge(compact('conference_id', 'user_id'));

        $chats = $this->execute(RequestConferenceChatsCommand::class);

        return $this->responder->respond($this->chatTransformer->transformCollection($chats));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /chats/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /chats
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /chats/{id}
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
	 * GET /chats/{id}/edit
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
	 * PUT /chats/{id}
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
	 * DELETE /chats/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}