<?php namespace Uninett\Api\Transformers;


class NewsfeedTransformer extends Transformer {


	private $newspostTransformer;

	function __construct(NewspostTransformer $newspostTransformer)
	{
		$this->newspostTransformer = $newspostTransformer;
	}


	public function transform($item)
    {

        return [
            'user_twitter' => $item['user_twitter'],
	        'newsposts' => $this->newspostTransformer->transformCollection($item['newsposts'])
        ];
    }
}