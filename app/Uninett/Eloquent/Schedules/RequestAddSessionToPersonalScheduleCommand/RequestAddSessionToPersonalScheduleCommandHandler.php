<?php namespace Uninett\Eloquent\Schedules\RequestAddSessionToPersonalScheduleCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Schedules\Repositories\EloquentPersonalScheduleRepository;

class RequestAddSessionToPersonalScheduleCommandHandler implements CommandHandler {

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
        $session = $this->repository->addSession($command->conference_id, $command->user_id, $command->session_id);

        $this->dispatchEventsFor($this->repository);

        return $session;
    }

}