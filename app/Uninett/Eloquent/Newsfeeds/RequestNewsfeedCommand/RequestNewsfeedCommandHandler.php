<?php namespace Uninett\Eloquent\Newsfeeds\RequestNewsfeedCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Newsfeeds\Repositories\EloquentNewsfeedRepository;

class RequestNewsfeedCommandHandler implements CommandHandler {

    private $repository;

    function __construct(EloquentNewsfeedRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed|void
     */
    public function handle($command)
    {
        $newsfeed = $this->repository->getOrCreateNewsfeedForConference($command->conference_id);

	    return $newsfeed;

        //$newsposts = $this->repository->getNewspostsForNewsfeed($newsfeed);
		//return $newsposts;
    }

}