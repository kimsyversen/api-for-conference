<?php namespace Uninett\Eloquent\Questions\RequestStoreQuestionCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Questions\Repositories\EloquentQuestionRepository;

class RequestStoreQuestionCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $questionRepository;

    function __construct(EloquentQuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        $response = $this->questionRepository->postQuestion($command->conference_id, $command->session_id, $command->user_id, $command->question);

        $this->dispatchEventsFor($this->questionRepository);

        return $response;
    }

}