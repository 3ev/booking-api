<?php namespace Tev\Bs\Endpoint\Reviews;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/reviews/:id.
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Review to show
     *
     * @var string
     */
    private $reviewId;

    /**
     * Constructor.
     *
     * Set Booking ID.
     *
     * @param  string $bookingId ID of Review to show
     * @return void
     */
    public function __construct($reviewId)
    {
        parent::__construct();

        $this->reviewId = $reviewId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/reviews/{$this->reviewId}";
    }
}
