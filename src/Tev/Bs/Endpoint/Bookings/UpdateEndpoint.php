<?php namespace Tev\Bs\Endpoint\Bookings;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/bookings/:id.
 *
 * See: /docs/endpoints#bookings-update
 */
class UpdateEndpoint extends AbstractEndpoint {

    /**
     * ID of Booking to udpate.
     *
     * @var string
     */
    private $bookingId;

    /**
     * Constructor.
     *
     * Set Booking ID.
     *
     * @param  string $bookingId ID of Booking to update
     * @return void
     */
    public function __construct($bookingId)
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_PUT;

        $this->bookingId = $bookingId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/bookings/{$this->bookingId}";
    }
}
