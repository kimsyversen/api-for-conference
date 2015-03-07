<?php

return [
	'base_url' => 'http://localhost:8000/api/v1/',

    'listeners' => [
        'Uninett\Handlers\EmailNotifier',
    ],

    'bindings' => [
        'Uninett\Eloquent\Conferences\Repositories\ConferenceRepositoryInterface' =>
            'Uninett\Eloquent\Conferences\Repositories\EloquentConferenceRepository',

    ],
];
