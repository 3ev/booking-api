<?php namespace Tev\Bs\Endpoint\Bookings;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/bookings/export.
 *
 * See: /docs/endpoints#bookings-export
 */
class ExportEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/bookings/export';
    }
}
