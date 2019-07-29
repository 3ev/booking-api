<?php namespace Tev\Bs\Endpoint\Reviews;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/reviews/:id.
 */
class UpdateEndpoint extends AbstractEndpoint {

    /**
     * ID of Review to udpate.
     *
     * @var string
     */
    private $reviewId;

    /**
     * Constructor.
     *
     * Set Review ID.
     *
     * @param  string $reviewId ID of Review to update
     * @return void
     */
    public function __construct($reviewId)
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_PUT;

        $this->reviewId = $reviewId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/reviews/update/{$this->reviewId}";
    }
}
