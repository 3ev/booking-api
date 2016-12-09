<?php namespace Tev\Bs\Endpoint\Dwellings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/avantio-dwellings.
 *
 * See: /docs/endpoints#dwellings-list
 */
class ListAvantioDwellingsEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/avantio-dwellings';
    }
}
