<?php namespace Uninett\Users\Registration\Events;


use Uninett\Eloquent\Users\User;

class UserHasBeenVerified {

	public $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}


} 