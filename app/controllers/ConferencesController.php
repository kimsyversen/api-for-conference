<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\ConferenceTransformer;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Conferences\RequestAllConferencesCommand\RequestAllConferencesCommand;

class ConferencesController extends \ApiController {

    private $transform;

    function __construct(ConferenceTransformer $transform, Responder $responder)
    {
        parent::__construct($responder);

        $this->transform = $transform;
    }

	/**
	 * Display a listing of the resource.
	 * GET /conferences
	 *
	 * @return Response
	 */
	public function index()
	{
        $conferencePaginator = $this->execute(RequestAllConferencesCommand::class);

        return $this->responder->respondWithPagination(
            $this->transform->transformCollection($conferencePaginator->all()),
            $conferencePaginator
        );
	}

//	/**
//	 * Show the form for creating a new resource.
//	 * GET /conferences/create
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
//	 * POST /conferences
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}

	/**
	 * Display the specified resource.
	 * GET /conferences/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data = Conference::findOrFail($id);

        return $this->responder->respond($this->transform->transform($data->toArray()));
	}

//	/**
//	 * Show the form for editing the specified resource.
//	 * GET /conferences/{id}/edit
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
//	 * PUT /conferences/{id}
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
//	 * DELETE /conferences/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}