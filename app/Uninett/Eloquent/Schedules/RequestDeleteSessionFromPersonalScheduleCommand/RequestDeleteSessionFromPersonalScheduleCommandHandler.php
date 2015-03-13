<?php namespace Uninett\Eloquent\Schedules\RequestDeleteSessionFromPersonalScheduleCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Schedules\Repositories\EloquentPersonalScheduleRepository;

class RequestDeleteSessionFromPersonalScheduleCommandHandler implements CommandHandler {

    use DispatchableTrait;

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
        $session = $this->repository->removeSession($command->conference_id, $command->session_id, $command->user_id);

        $this->dispatchEventsFor($this->repository);

        return $session;
    }

}