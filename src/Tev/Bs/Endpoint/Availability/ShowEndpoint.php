<?php namespace Tev\Bs\Endpoint\Availability;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/availability/:id.
 *
 * See: /docs/endpoints#availability-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Dwelling to show availability
     *
     * @var string
     */
    private $dwellingId;

    /**
     * Constructor.
     *
     * Set Dwelling ID.
     *
     * @param  string $dwellingId ID of Dwelling to show
     * @return void
     */
    public function __construct($dwellingId)
    {
        parent::__construct();

        $this->dwellingId = $dwellingId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/availability/{$this->dwellingId}";
    }
}
