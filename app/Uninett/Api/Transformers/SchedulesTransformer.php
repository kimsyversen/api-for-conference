<?php namespace Uninett\Api\Transformers;


class SchedulesTransformer extends Transformer {

    private $sessionsTransformer;

    function __construct(SessionsTransformer $sessionsTransformer)
    {
        $this->sessionsTransformer = $sessionsTransformer;
    }


    public function transform($item)
	{
        return [
            'sessions' => $this->sessionsTransformer->transformCollection($item['sessions']),
            'start_date' => $item['start_time'],
            'end_date' => $item['end_time']
        ];
	}
}