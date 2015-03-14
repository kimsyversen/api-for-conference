<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\MapsTransformer;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Maps\RequestAllMapsForConferenceCommand\RequestAllMapsForConferenceCommand;

class MapsController extends \ApiController {

    private $mapsTransformer;

    function __construct(MapsTransformer $mapsTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->mapsTransformer = $mapsTransformer;
    }

	/**
	 * Display a listing of the resource.
	 * GET /maps
	 *
	 * @return Response
	 */
	public function index($conference_id)
	{
        Request::merge(compact('conference_id'));

        $maps = $this->execute(RequestAllMapsForConferenceCommand::class);

		return $this->responder->respond($this->mapsTransformer->transformCollection($maps->toArray()));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /maps/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /maps
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /maps/{id}
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
	 * GET /maps/{id}/edit
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
	 * PUT /maps/{id}
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
	 * DELETE /maps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}