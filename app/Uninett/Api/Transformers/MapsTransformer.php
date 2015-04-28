<?php namespace Uninett\Api\Transformers;


class MapsTransformer extends Transformer{

    public function transform($item)
    {
        return [
            'id' => $item['id'],
            'conference_id' => $item['conference_id'],
            'uri' => url($item['uri']),
            'description' => $item['description'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
        ];
    }
}