<?php namespace Uninett\Eloquent\Schedules\RequestActiveScheduleCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Schedules\Repositories\ConferenceScheduleRepositoryInterface;

class RequestActiveScheduleCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $repo;

    function __construct(ConferenceScheduleRepositoryInterface $repo)
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

        if ($command->user_id)
        {
            $activeSchedule = $this->repo->checkPersonalSchedule($command->conference_id, $command->user_id, $activeSchedule);
        }

        $this->dispatchEventsFor($this->repo);

        return $this->repo->getSessionsForSchedule($activeSchedule);
    }

}