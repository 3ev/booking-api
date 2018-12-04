<?php namespace Tev\Bs\Endpoint\Discounts;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/discounts/for/:dwelling_id.
 *
 * See: /docs/endpoints#discounts-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Dwelling to show
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
        return "/api/discounts/for/{$this->dwellingId}";
    }
}
