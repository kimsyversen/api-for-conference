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
            'twitter_hashtag' => $item['twitter_hashtag'],
	        'newsposts' => $this->newspostTransformer->transformCollection($item['newsposts'])
        ];
    }
}