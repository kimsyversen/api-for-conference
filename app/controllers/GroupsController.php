<?php

use Laracasts\Commander\CommanderTrait;
use Uninett\Eloquent\Groups\CreateGroupCommand;

class GroupsController extends \BaseController {

    use CommanderTrait;

	/**
	 * Display a listing of the resource.
	 * GET /gropus
	 *
	 * @return Response
	 */
	public function index()
	{
        //$this->execute(CreateGroupCommand::class, ['name' => null, 'conference_id' => null]);

        return URL::route('schedueles_path');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /gropus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /gropus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /gropus/{id}
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
	 * GET /gropus/{id}/edit
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
	 * PUT /gropus/{id}
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
	 * DELETE /gropus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}