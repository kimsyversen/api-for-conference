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

#Testing
Tests contains of integration, functional, unit, and acceptance. In short:

 * A unit test is testing a class/method.
 * A integration test is testing multiple classes/methods (or many unit tests). Examples are UserRepositories.
 * A functional test verifies the functionality in the views works
 * A acceptance test is "outside-in". Simulating that a user is doing specific tasks on the page. Often done together with a user
 
 
Integration tests are created with codeception. To generate a new integration test

```
 vendor/bin/codecept generate:suite integration
 vendor/bin/codecept generate:test integration Name

```

To run

```
 vendor/bin/codecept run integration 
 
 vendor/bin/codecept run integration ASpecificFile.php
 
```

If using functional tests:

To generate new functional cept

```
vendor/bin/codecept generate:cept functional CreateAccount
```


#TODO

* Validering via commands?
