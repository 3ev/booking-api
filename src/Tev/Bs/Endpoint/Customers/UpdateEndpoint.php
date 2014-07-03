<?php namespace Tev\Bs\Endpoint\Customers;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/customers/:customer_id.
 *
 * See: /docs/endpoints#customers-update
 */
class UpdateEndpoint extends AbstractEndpoint {

    /**
     * ID of Customer to udpate.
     *
     * @var string
     */
    private $customerId;

    /**
     * Constructor.
     *
     * Set Customer ID.
     *
     * @param  string $customerId ID of Customer to update
     * @return void
     */
    public function __construct($customerId)
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_PUT;

        $this->customerId = $customerId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/customers/{$this->customerId}";
    }
}
