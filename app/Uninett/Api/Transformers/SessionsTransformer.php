<?php namespace Uninett\Api\Transformers;


class SessionsTransformer extends Transformer {

    public function transform($item)
    {
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
            'begins' => $item['start_time'],
            'ends' => $item['end_time'],
            'last_modified' => $item['updated_at'],
        ];
    }
}