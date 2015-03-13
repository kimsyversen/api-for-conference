<?php namespace Uninett\Eloquent\Schedules\RequestPersonalScheduleCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Schedules\Repositories\EloquentPersonalScheduleRepository;

class RequestPersonalScheduleCommandHandler implements CommandHandler {

    private $repository;

    function __construct(EloquentPersonalScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        $sessions = $this->repository->getOrCreatePersonalSchedule($command->conference_id, $command->user_id)->sessions;

        $sessions = $this->repository->calculateParallelSessions($sessions);

        return $sessions;
    }

}