<?php namespace Uninett\Api\Transformers;


class SessionsTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id' => $item['id'],
            'title' => $item['title'],
            'description' => $item['description'],
            'location' => $item['location'],
            'begins' => $item['start_time'],
            'ends' => $item['end_time'],
            'last_modified' => $item['updated_at'],
            'belongs_to_conference' => $item['conference_id']
        ];
    }
}