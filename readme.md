#API for conference application

## Remember

Add your machine name to bootstrap/start.php

```
$env = $app->detectEnvironment(array(
	'production' => array('shockwave', 'botein.bibsys.no'),
	'local' =>  array('kImac.local')
));

```


Also remember to create the relevant .env-files. see env.example.php