<?php

namespace iriscrm\Yii2PODataAdapter;

use yii;
use POData\OperationContext\IHTTPRequest;
use POData\OperationContext\IOperationContext;
use POData\OperationContext\Web\OutgoingResponse;
use iriscrm\Yii2PODataAdapter\RequestAdapter;

class OperationContextAdapter implements IOperationContext
{
    /**
     * @var RequestAdapter;
     */
    protected $request;

    protected $response;

    /**
     * @param yii\base\Request $request
     */
    public function __construct(yii\base\Request $request)
    {
        $this->request = new RequestAdapter($request);
        $this->response = new OutgoingResponse();
    }

    /**
     * Gets the Web request context for the request being sent.
     *
     * @return OutgoingResponse reference of OutgoingResponse object
     */
    public function outgoingResponse()
    {
        return $this->response;
    }

    /**
     * Gets the Web request context for the request being received.
     *
     * @return IHTTPRequest reference of IncomingRequest object
     */
    public function incomingRequest()
    {
        return $this->request;
    }
}