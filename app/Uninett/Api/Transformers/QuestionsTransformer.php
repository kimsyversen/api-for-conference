<?php namespace Uninett\Api\Transformers;


class QuestionsTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'user_id' => $item['user_id'],
            'question' => $item['text'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at'],
        ];
    }
}
