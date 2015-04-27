<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\RatingsTransformer;
use Uninett\Eloquent\Ratings\RequestCreateConferenceRatingCommand\RequestCreateConferenceRatingCommand;
use Uninett\Eloquent\Ratings\RequestStoreConferenceRatingCommand\RequestStoreConferenceRatingCommand;

class ConferenceRatingsController extends \ApiController {

    private $ratingTransformer;

    function __construct(RatingsTransformer $ratingsTransformer, Responder $responder)
    {
        parent::__construct($responder);

        $this->ratingTransformer = $ratingsTransformer;
    }

    /**
     * Show the form for creating a new resource.
     * GET /conferenceratings/create
     *
     * @param $conference_id
     * @return Response
     */
	public function create($conference_id)
	{
        Request::merge([
            'user_id' => $this->getUserId(),
            'conference_id' => $conference_id
        ]);

		$response = $this->execute(RequestCreateConferenceRatingCommand::class);

        return $this->responder->respond($response);
	}

    /**
     * Store a newly created resource in storage.
     * POST /conferenceratings
     *
     * @param $conference_id
     * @return Response
     */
	public function store($conference_id)
	{
        Request::merge([
            'user_id' => $this->getUserId(),
            'conference_id' => $conference_id
        ]);

        $rating = $this->execute(RequestStoreConferenceRatingCommand::class);

        return $this->responder->respond($this->ratingTransformer->transform($rating->toArray()));
	}

}