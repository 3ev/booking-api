<?php namespace Tev\Bs\Endpoint\Reviews;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/reviews.
 */
class CreateEndpoint extends AbstractEndpoint {

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_POST;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/reviews';
    }
}
