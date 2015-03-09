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
            'starts' => $item['start_time'],
            'ends' => $item['end_time']
        ];
	}
}