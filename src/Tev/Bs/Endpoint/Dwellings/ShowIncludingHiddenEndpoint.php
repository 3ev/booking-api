<?php namespace Tev\Bs\Endpoint\Dwellings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/dwellings-including-hidden/:id.
 *
 * See: /docs/endpoints#dwellings-show
 */
class ShowIncludingHiddenEndpoint extends AbstractEndpoint {

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
        return "/api/dwellings-including-hidden/{$this->dwellingId}";
    }
}
