<?php namespace Uninett\Eloquent\Sessions\RequestSessionCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Sessions\Repositories\ConferenceSessionRepositoryInterface;

class RequestSessionCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $repository;

    function __construct(ConferenceSessionRepositoryInterface $repository)
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
        $session = $this->repository->getConferenceSession($command->conference_id, $command->session_id);

        if ($command->user_id)
        {
            $session = $this->repository->checkPersonalProgram($command->conference_id, $command->user_id, $session);
        }

        $this->dispatchEventsFor($this->repository);

        return $session;
    }

}