<?php

use Uninett\Api\Formatters\OutputFormatter;
use Uninett\Api\Transformers\SessionsTransformer;
use Uninett\Eloquent\Conferences\Conference;

class ConferenceSessionsController extends \ApiController {

	/**
	 * Display a listing of the resource.
	 * GET /conferencesessions
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /conferencesessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /conferencesessions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    private $transform;

    function __construct(SessionsTransformer $transform, OutputFormatter $outputFormatter)
    {
        parent::__construct($outputFormatter);

        $this->transform = $transform;
    }

	/**
	 * Display the specified resource.
	 * GET /conferencesessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($conference_ids, $session_ids)
	{
        $conferences = Conference::with('sessions')->find($conference_ids);

        $data = [];

        foreach ($conferences as $conference)
        {
            $data = array_merge($data, $conference['sessions']->only($session_ids)->toArray());
        }

        return $this->respond($this->transform->transformCollection($data));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /conferencesessions/{id}/edit
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
	 * PUT /conferencesessions/{id}
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
	 * DELETE /conferencesessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}