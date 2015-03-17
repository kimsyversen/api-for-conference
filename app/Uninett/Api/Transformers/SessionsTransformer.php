<?php namespace Uninett\Api\Transformers;


class SessionsTransformer extends Transformer {

    public function transform($item)
    {
        $output = [
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

        if(array_key_exists('in_personal_schedule', $item))
            $output['in_personal_schedule'] = $item['in_personal_schedule'];

        return $output;
    }
}