<?php namespace Uninett\Api\Transformers;


use Carbon\Carbon;

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
            'begins' => Carbon::createFromFormat('Y-m-d H:i:s', $item['start_time']),
            'ends' => Carbon::createFromFormat('Y-m-d H:i:s', $item['end_time']),
            'last_modified' => Carbon::createFromFormat('Y-m-d H:i:s', $item['updated_at']),
        ];
    }
}