<?php namespace Tev\Bs\Endpoint\Misc;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/status.
 *
 * See: /docs/endpoints#misc-status
 */
class StatusEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/status';
    }
}
