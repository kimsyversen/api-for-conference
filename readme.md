#API for conference application

## Before using the application

Add your machine name to bootstrap/start.php

```
$env = $app->detectEnvironment(array(
	'production' => array('shockwave'),
	'local' =>  array('kImac.local')
));

```

Also remember to create the relevant .env-files. see env.example.php


##Working with OAuth

First, a client must be registered. It is like telling the db that "This application has access to the API". Open the database, go to the table oauth_clients and insert a new client.

* **secret** is a secret known between the application and the api
* **name** something that describes the application

When doing requests that require OAuth, include the parameters

```
client_id
client_secret
grant_type => password
...
the rest of your parameters
```

When sending requests, include the parameter "access_token" together with the token.