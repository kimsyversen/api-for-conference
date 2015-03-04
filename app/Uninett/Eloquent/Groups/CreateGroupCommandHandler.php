<?php namespace Uninett\Eloquent\Groups;

use Laracasts\Commander\CommandHandler;

class CreateGroupCommandHandler implements CommandHandler {

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        var_dump('Creating the group \'' . $command->name . '\' on conference ' . $command->conference_id);
    }

} 