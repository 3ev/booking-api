<?php namespace Tev\Bs\Endpoint\Customers;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/customers/:customer_id_or_email.
 *
 * See: /docs/endpoints#customers-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID or email of Customer to show.
     *
     * @var string
     */
    private $customerIdOrEmail;

    /**
     * Constructor.
     *
     * Set Customer ID or email.
     *
     * @param  string $customerIdOrEmail ID or email of Customer to show
     * @return void
     */
    public function __construct($customerIdOrEmail)
    {
        parent::__construct();

        $this->customerIdOrEmail = $customerIdOrEmail;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/customers/{$this->customerIdOrEmail}";
    }
}
