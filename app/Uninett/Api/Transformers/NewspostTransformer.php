<?php namespace Uninett\Api\Transformers;


class NewspostTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id' => $item['id'],
            'newsfeed_id' => $item['newsfeed_id'],
            'user_id' => $item['user_id'],
            'title' => $item['title'],
            'body' => $item['body'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at'],
        ];
    }
}