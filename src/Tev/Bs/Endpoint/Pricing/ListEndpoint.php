<?php namespace Tev\Bs\Endpoint\Pricing;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/pricing.
 *
 * See: /docs/endpoints#pricing-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/pricing';
    }
}
