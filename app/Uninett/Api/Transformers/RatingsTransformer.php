<?php namespace Uninett\Api\Transformers;


class RatingsTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'user_id' => $item['user_id'],
            'score' => $item['score'],
            'comment' => $item['text'],
        ];
    }
}