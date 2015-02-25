<?php namespace Uninett\Users\Registration\Events;
use User;

class UserHasBeenVerified {

	public $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}


} 