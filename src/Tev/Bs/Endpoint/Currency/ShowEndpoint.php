<?php namespace Tev\Bs\Endpoint\Currency;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/currencies/:id.
 *
 * See: /docs/endpoints#currency-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Currency to show
     *
     * @var string
     */
    private $currencyId;

    /**
     * Constructor.
     *
     * Set Currency ID.
     *
     * @param  string $currencyId ID of Currency to show
     * @return void
     */
    public function __construct($currencyId)
    {
        parent::__construct();

        $this->currencyId = $currencyId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/currencies/{$this->currencyId}";
    }
}
