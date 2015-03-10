<?php namespace Uninett\Eloquent\Conferences\RequestAllConferencesCommand;

use Input;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Conferences\Repositories\ConferenceRepositoryInterface;

class RequestAllConferencesCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * @var ConferenceRepositoryInterface
     */
    private $conferenceRepo;

    function __construct(ConferenceRepositoryInterface $conferenceRepo)
    {
        $this->conferenceRepo = $conferenceRepo;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return \Illuminate\Pagination\Paginator
     */
    public function handle($command)
    {
        $limit = Input::get('limit') ?: 1000;

        $conferences = $this->conferenceRepo->getPaginator($limit);

        $this->dispatchEventsFor($this->conferenceRepo);

        return $conferences;
    }

}