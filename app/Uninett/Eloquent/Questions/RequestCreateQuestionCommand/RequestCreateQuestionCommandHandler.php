<?php namespace Uninett\Eloquent\Questions\RequestCreateQuestionCommand;

use Carbon\Carbon;
use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Sessions\Session;

class RequestCreateQuestionCommandHandler implements CommandHandler {

    private $questionRepository;

    function __construct($questionRepository)
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
//        $response = $this->questionRepository

        $session = Session::findOrFail($command->session_id);

        $now = Carbon::now();

        if (! ($command->session_id->start_time < $now && $now < $command->session_id->end_time))
            dd('Du kan ikke sende inn spørsmål');

        return true;
    }

}