<?php namespace Tev\Bs\Endpoint\Dwellings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/dwellings.
 *
 * See: /docs/endpoints#dwellings-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/dwellings';
    }
}
