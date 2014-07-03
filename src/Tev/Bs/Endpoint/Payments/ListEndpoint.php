<?php namespace Tev\Bs\Endpoint\Payments;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/payments/:booking_id.
 *
 * See: /docs/endpoints#payments-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * ID of Booking to list payments for.
     *
     * @var string
     */
    private $bookingId;

    /**
     * Constructor.
     *
     * Set booking ID.
     *
     * @param  string $bookingId ID of Booking to list payments for
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
        return "/api/payments/{$this->bookingId}";
    }
}
