<?php namespace Tev\Bs\Endpoint\Dwellings;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/dwellings/:dwelling_id.
 *
 * See: /docs/endpoints#dwelling-update
 */
class UpdateEndpoint extends AbstractEndpoint {

    /**
     * ID of Dwelling to udpate.
     *
     * @var string
     */
    private $dwellingId;

    /**
     * Constructor.
     *
     * Set Dwelling ID.
     *
     * @param  string $dwellingId ID of Dwelling to update
     * @return void
     */
    public function __construct($dwellingId)
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_PUT;

        $this->dwellingId = $dwellingId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/dwellings/{$this->dwellingId}";
    }
}

