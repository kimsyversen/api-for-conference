<?php namespace Uninett\Api\Transformers;


class SessionsTransformer extends Transformer {

    public function transform($item)
    {

        return [
            'id' => $item['id'],
            'title' => $item['title'],
            'location' => $item['location'],
            'belongs_to_conference' => $item['conference_id']
        ];
    }
}