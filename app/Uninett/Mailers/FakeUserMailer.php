<?php namespace Uninett\Api\Mailers;

use Log;
use Uninett\Eloquent\Users\User;
use Uninett\Mailers\MailerInterface;

class FakeUserMailer implements MailerInterface {

	public function sendMessageTo(User $user)
	{
		Log::info('User was registered. ' . $user->confirmation_code);
	}

}