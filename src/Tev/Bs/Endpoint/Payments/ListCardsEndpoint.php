<?php namespace Tev\Bs\Endpoint\Payments;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/payments/cards.
 *
 * See: /docs/endpoints#payments-list-cards
 */
class ListCardsEndpoint extends AbstractEndpoint {

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return '/api/payments/cards';
    }
}
