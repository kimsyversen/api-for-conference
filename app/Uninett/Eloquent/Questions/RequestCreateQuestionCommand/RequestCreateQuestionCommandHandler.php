<?php namespace Uninett\Eloquent\Questions\RequestCreateQuestionCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Questions\Repositories\EloquentQuestionRepository;

class RequestCreateQuestionCommandHandler implements CommandHandler {

    private $questionRepository;

    function __construct(EloquentQuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return bool|mixed
     */
    public function handle($command)
    {
        return $this->questionRepository->getCreateQuestionStatuses($command->conference_id, $command->session_id, $command->user_id);
    }

}