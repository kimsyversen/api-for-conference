<?php namespace Uninett\Api\Mailers;

use Uninett\Eloquent\Users\User;
use URL;

class UserMailer extends Mailer {

    public function sendMessageTo(User $user)
    {
        $subject =  'Please activate your account';
        $view = 'emails.registration.verify';
        $data = [
            'confirmation_url' => URL::to('register/verify/' . $user->confirmation_code ),
        ];

        $this->sendTo($user, $subject, $view, $data);
    }
}