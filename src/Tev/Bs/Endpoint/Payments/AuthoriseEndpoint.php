<?php namespace Tev\Bs\Endpoint\Payments;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/payments/:booking_id/authorise.
 *
 * See: /docs/endpoints#payments-authorise
 */
class AuthoriseEndpoint extends AbstractEndpoint {

    /**
     * ID of Booking to authorise payment for.
     *
     * @var string
     */
    private $bookingId;

    /**
     * Constructor.
     *
     * Set booking ID.
     *
     * @param  string $bookingId ID of Booking to authorise payment for
     * @return void
     */
    public function __construct($bookingId)
    {
        parent::__construct();

        $this->method    = RequestInterface::METHOD_POST;
        $this->bookingId = $bookingId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/payments/{$this->bookingId}/authorise";
    }
}
