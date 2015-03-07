<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\ConferenceTransformer;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Conferences\Repositories\ConferenceRepositoryInterface;

class ConferencesController extends \ApiController {

    private $transform;

    private $conference;

    function __construct(ConferenceTransformer $transform, Responder $responder, ConferenceRepositoryInterface $conference)
    {
        parent::__construct($responder);

        $this->transform = $transform;

        $this->conference = $conference;
    }

	/**
	 * Display a listing of the resource.
	 * GET /conferences
	 *
	 * @return Response
	 */
	public function index()
	{
        // TODO: Do we need a command here? I can't see the benefit...

        $limit = Input::get('limit') ?: 10;

        $conferencePaginator = $this->conference->getPaginator($limit);

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