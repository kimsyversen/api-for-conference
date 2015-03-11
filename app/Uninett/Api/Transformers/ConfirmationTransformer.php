<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 11.03.15
 * Time: 10:01
 */

namespace Uninett\Api\Transformers;


class ConfirmationTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'confirmation' => $item('bool')
        ];
    }
}