<?php namespace Uninett\Api\Requests;

class LogRequestCommand {

    /**
     * @var string
     */
    public $request;

	/**
	 * @param $request
	 */
    public function __construct($request)
    {
        $this->request = $request;
    }

}