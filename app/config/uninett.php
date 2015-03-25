<?php

return [
    'listeners' => [
        'Uninett\Handlers\EmailNotifier',
        'Uninett\Handlers\SendWelcomeMessage'
    ],

    'bindings' => [
        'Uninett\Eloquent\Conferences\Repositories\ConferenceRepositoryInterface' =>
            'Uninett\Eloquent\Conferences\Repositories\EloquentConferenceRepository',
        'Uninett\Eloquent\Schedules\Repositories\ConferenceScheduleRepositoryInterface' =>
            'Uninett\Eloquent\Schedules\Repositories\EloquentConferenceScheduleRepository',
        'Uninett\Eloquent\Sessions\Repositories\ConferenceSessionRepositoryInterface' =>
            'Uninett\Eloquent\Sessions\Repositories\EloquentConferenceSessionRepository',


    ],
];
