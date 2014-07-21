<?php namespace Tev\Bs\Endpoint\Availability;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/availability.
 *
 * See: /docs/endpoints#availability-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/availability';
    }
}
