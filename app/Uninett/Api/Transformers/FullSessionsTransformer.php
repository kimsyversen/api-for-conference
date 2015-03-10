<?php namespace Uninett\Api\Transformers;


class FullSessionsTransformer extends Transformer {

    private $questionsTransformer;

    private $ratingsTransformer;

    function __construct(QuestionsTransformer $questionsTransformer, RatingsTransformer $ratingsTransformer)
    {
        $this->questionsTransformer = $questionsTransformer;

        $this->ratingsTransformer = $ratingsTransformer;
    }

    public function transform($item)
    {
        //dd($item);
        return [
            'links' => [
                'session' => [
                    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'],
                ],
                'rate' => [
                    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'] . "/ratings"
                ],
                'question' => [
                    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'] . "/questions"
                ]
            ],
            'id' => $item['id'],
            'title' => $item['title'],
            'description' => $item['description'],
            'location' => $item['location'],
            'start_date' => $item['start_time'],
            'end_date' => $item['end_time'],
            'last_modified' => $item['updated_at'],
            'questions' => $this->questionsTransformer->transformCollection($item['questions']->toArray()),
            'ratings' => $this->ratingsTransformer->transformCollection($item['ratings']->toArray())
        ];
    }
}