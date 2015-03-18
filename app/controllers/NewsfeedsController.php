<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\NewsfeedTransformer;
use Uninett\Api\Transformers\NewspostTransformer;
use Uninett\Eloquent\Newsfeeds\RequestNewsfeedCommand\RequestNewsfeedCommand;

class NewsfeedsController extends \ApiController {

    private $newsfeedTransformer;

    function __construct(NewsfeedTransformer $newsfeedTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->newsfeedTransformer = $newsfeedTransformer;
    }


    /**
	 * Display a listing of the resource.
	 * GET /newsfeed
	 *
	 * @return Response
	 */
	public function index($conference_id)
	{
        Request::merge(compact('conference_id'));

        $newsposts = $this->execute(RequestNewsfeedCommand::class);

		return $this->responder->respond($this->newsfeedTransformer->transform($newsposts->toArray()));
	}



//	/**
//	 * Show the form for creating a new resource.
//	 * GET /newsfeed/create
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
//	 * POST /newsfeed
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
//	 * GET /newsfeed/{id}
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
//	 * GET /newsfeed/{id}/edit
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
//	 * PUT /newsfeed/{id}
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
//	 * DELETE /newsfeed/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}