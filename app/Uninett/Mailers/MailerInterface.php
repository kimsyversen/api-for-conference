<?php namespace Uninett\Mailers; 
use Uninett\Eloquent\Users\User;

interface MailerInterface {

	public function sendMessageTo(User $user);
}