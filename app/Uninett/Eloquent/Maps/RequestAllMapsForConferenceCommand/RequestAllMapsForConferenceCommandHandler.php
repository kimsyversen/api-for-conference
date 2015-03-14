<?php namespace Uninett\Eloquent\Maps\RequestAllMapsForConferenceCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Maps\Repositories\EloquentMapRepository;

class RequestAllMapsForConferenceCommandHandler implements CommandHandler {

    private $mapRepository;

    function __construct(EloquentMapRepository $mapRepository)
    {
        $this->mapRepository = $mapRepository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        $maps = $this->mapRepository->getAllForConference($command->conference_id);

        return $maps;
    }

}