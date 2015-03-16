<?php namespace Uninett\Api\Transformers;


class ConferenceSchedulesTransformer extends Transformer {

    private $conferenceSessionsTransformer;

    function __construct(ConferenceSessionsTransformer $conferenceSessionsTransformer)
    {
        $this->conferenceSessionsTransformer = $conferenceSessionsTransformer;
    }


    public function transform($item)
	{
        return [
            'sessions' => $this->conferenceSessionsTransformer->transformCollection($item['sessions']),
            'start_date' => $item['start_time'],
            'end_date' => $item['end_time']
        ];
	}
}