<?php

return [
	'base_url' => 'http://localhost:8000/api/v1/',

    'listeners' => [
        'Uninett\Handlers\EmailNotifier',
    ],

    'bindings' => [
        'Uninett\Eloquent\Conferences\Repositories\ConferenceRepositoryInterface' =>
            'Uninett\Eloquent\Conferences\Repositories\EloquentConferenceRepository',
        'Uninett\Eloquent\Schedules\Repositories\ConferenceScheduleRepositoryInterface' =>
            'Uninett\Eloquent\Schedules\Repositories\EloquentConferenceScheduleRepository',
        'Uninett\Eloquent\Sessions\Repositories\ConferenceSessionRepositoryInterface' =>
            'Uninett\Eloquent\Sessions\Repositories\EloquentConferenceSessionRepository',
        'Uninett\Mailers\MailerInterface' =>
            'Uninett\Api\Mailers\UserMailer',


    ],
];
