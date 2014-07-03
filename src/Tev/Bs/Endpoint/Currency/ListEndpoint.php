<?php namespace Tev\Bs\Endpoint\Currency;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/currencies.
 *
 * See: /docs/endpoints#currency-list
 */
class ListEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/currencies';
    }
}
