<?php namespace Uninett\Api\Mailers;

use Uninett\Eloquent\Users\User;
use Uninett\Mailers\MailerInterface;

class UserMailer extends Mailer implements MailerInterface {

	public function sendMessageTo(User $user)
	{
		$subject =  'Please verify your account';
		$view = 'emails.registration.verify';
		$data = [
			'confirmation_code' => $user->confirmation_code
			];

		$this->sendTo($user, $subject, $view, $data);
	}
}