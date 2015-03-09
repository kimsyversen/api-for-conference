<?php namespace Uninett\Eloquent\Schedules\RequestActiveScheduleCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Schedules\Repositories\ConferenceScheduleRepository;

class RequestActiveScheduleCommandHandler implements CommandHandler {

    private $repo;

    function __construct(ConferenceScheduleRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        $activeSchedule = $this->repo->getActiveScheduleForConference($command->conference_id);

        return $this->repo->getSessionsForSchedule($activeSchedule);
    }

}