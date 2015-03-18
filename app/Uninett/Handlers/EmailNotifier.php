<?php namespace Uninett\Handlers;

use Laracasts\Commander\Events\EventListener;
use Uninett\Api\Mailers\UserMailer;
use Uninett\Users\Registration\Events\UserHasRegistered;

class EmailNotifier extends EventListener {

	private $mailer;

	function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function whenUserHasRegistered(UserHasRegistered $event)
	{
		$this->mailer->sendMessageTo($event->user);
	}
}