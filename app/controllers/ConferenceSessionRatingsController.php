<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\ConfirmationTransformer;
use Uninett\Eloquent\Ratings\RequestCreateRatingCommand\RequestCreateRatingCommand;

class ConferenceSessionRatingsController extends \ApiController {

    private $transformer;

    function __construct(ConfirmationTransformer $transformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->transformer = $transformer;
    }

//	/**
//	 * Display a listing of the resource.
//	 * GET /conferencesessionratings
//	 *
//	 * @return Response
//	 */
//	public function index()
//	{
//		//
//	}

    /**
     * Show the form for creating a new resource.
     * GET /conferencesessionratings/create
     *
     * @param $conference_id
     * @param $session_id
     * @return Response
     */
	public function create($conference_id, $session_id)
	{
        $user_id = $this->getUserid();

        $response = $this->execute(RequestCreateRatingCommand::class, compact('conference_id', 'session_id', 'user_id'));

        return $this->responder->respond(['rateable' => $response]);
	}

//	/**
//	 * Store a newly created resource in storage.
//	 * POST /conferencesessionratings
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
//	 * GET /conferencesessionratings/{id}
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
//	 * GET /conferencesessionratings/{id}/edit
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
//	 * PUT /conferencesessionratings/{id}
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
//	 * DELETE /conferencesessionratings/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}