<?php

use Uninett\Eloquent\Conferences\Conference;

class AdminController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		//http://localhost:8000/api/v1/conference/1/admin?access_token=qK4BM7UUf85JQQZT4rDuOzaNgrzDYgo39wX9twT4

		$user_id_from_access_token = $this->getUserId();

		// TODO:

		// Det kule ville vært å få OAuth2 til å sjekke token og se om personen som sendte tokenet har tilgang til et bestemt scope,
		// men det ser ut som om dette gjøres på klient-nivå, slik at bare vår klient kan få tilgang til en bestemt rute. NB: Det kan være mye mer enn jeg vet i skrivende stund.

		//Ellers

		// Decide if the user is admin
		// Decide if user has created any conference
		// If so, return the conference and allow access


		// Returner relevant data for konferansen. Antakeligvis noe annet enn dette
		return Conference::find($id);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
