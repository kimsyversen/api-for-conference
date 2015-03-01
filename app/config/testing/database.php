<?php

return array(
	'connections' => array(
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => getenv('API_HOST'),
			'database'  => getenv('API_DATABASE'),
			'username'  => getenv('API_USERNAME'),
			'password'  => getenv('API_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
	),
);
