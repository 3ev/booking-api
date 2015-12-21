<?php namespace Tev\Bs\Endpoint\Quoting;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/quote/nearest-for/:dwelling_id.
 *
 * See: /docs/endpoints#quoting-nearest-for
 */
class NearestDateEndpoint extends AbstractEndpoint {

    /**
     * ID of enquired dwelling.
     *
     * @var int
     */
    private $dwellingId;

    /**
     * Constructor.
     *
     * Set Dwelling ID.
     *
     * @param  int $dwellingId ID of enquired dwelling
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
        return "/api/quote/nearest-for/{$this->dwellingId}";
    }
}
