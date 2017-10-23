<?php namespace Tev\Bs\Endpoint\Pricing;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/pricing/pricerows/:id.
 */
class ShowPriceRowsEndpoint extends AbstractEndpoint {

    /**
     * ID of Dwelling to retrieve price rows.
     *
     * @var string
     */
    private $dwellingId;

    /**
     * Constructor.
     *
     * Set Dwelling ID.
     *
     * @param  string $dwellingId ID of Dwelling to get price rows.
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
        return "/api/pricing/pricerows/{$this->dwellingId}";
    }
}
