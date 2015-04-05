<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::resolve('commands\Generators\CommandsGenerator\CommanderGenerateCommand');
Artisan::resolve('commands\Generators\RoutesGenerator\RoutesGeneratorCommand');

Artisan::add(new ApiDatabaseSeederCommand);
Artisan::add(new ApiMigrationsMigrateCommand);
Artisan::add(new ApiMigrationsResetCommand);
