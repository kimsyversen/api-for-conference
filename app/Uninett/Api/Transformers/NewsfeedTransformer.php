<?php namespace Uninett\Api\Transformers;


class NewsfeedTransformer extends Transformer {


	private $newspostTransformer;

	function __construct(NewspostTransformer $newspostTransformer)
	{
		$this->newspostTransformer = $newspostTransformer;
	}


	public function transform($item)
    {
        $newsposts = array_values($item['newsposts']);

        return [
            'user_twitter' => $item['user_twitter'],
	        'newsposts' => $this->newspostTransformer->transformCollection($newsposts)
        ];
    }
}