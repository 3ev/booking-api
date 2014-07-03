<?php namespace Tev\Bs\Endpoint\Bookings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/bookings.
 *
 * See: /docs/endpoints#bookings-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/bookings';
    }
}
