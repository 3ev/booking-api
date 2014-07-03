<?php namespace Tev\Bs\Endpoint\Bookings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/bookings/:id.
 *
 * See: /docs/endpoints#bookings-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Booking to show
     *
     * @var string
     */
    private $bookingId;

    /**
     * Constructor.
     *
     * Set Booking ID.
     *
     * @param  string $bookingId ID of Booking to show
     * @return void
     */
    public function __construct($bookingId)
    {
        parent::__construct();

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
