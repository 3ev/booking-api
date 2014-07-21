<?php namespace Tev\Bs\Endpoint\Pricing;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/pricing/:id.
 *
 * See: /docs/endpoints#pricing-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Dwelling to show pricing
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
        return "/api/pricing/{$this->dwellingId}";
    }
}
