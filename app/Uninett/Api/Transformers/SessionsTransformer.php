<?php namespace Uninett\Api\Transformers;


class SessionsTransformer extends Transformer {

/*	private function getLink($conference_id, $session_id)
	{
		return 'conferences/' . $conference_id . '/sessions/' . $session_id;
	}*/

    public function transform($item)
    {
	    /*return [
		    'links' => [
			    'session' => [
				    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'],
			    ],
			    'rate' => [
				    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'] . "/rating/"
			    ]
		    ],
		    'id' => $item['id'],
		    'title' => $item['title'],
		    'description' => $item['description'],
		    'location' => $item['location'],
		    'start_date' => $item['start_time'],
		    'end_date' => $item['end_time'],
		    'last_modified' => $item['updated_at'],
		    'questions' => ['QUESTIONS'],
		    'ratings' => [
			    [
				    'comment' => 'COMMENT HERE',
				    'rating' => 'RATING HERE'
			    ],
			    [
				    'comment' => 'COMMENT2 HERE',
				    'rating' => 'RATING2 HERE'
			    ],
		    ]
	    ];*/


        return [
            'links' => [
                'session' => [
                    'uri' => 'conferences/' . $item['conference_id'] . '/sessions/' . $item['id'],
                ]
            ],
            'id' => $item['id'],
            'title' => $item['title'],
            'description' => $item['description'],
            'location' => $item['location'],
            'start_date' => $item['start_time'],
            'end_date' => $item['end_time'],
            'last_modified' => $item['updated_at'],
        ];
    }
}