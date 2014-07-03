<?php namespace Tev\Bs\Endpoint\Quoting;

use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/quote/:quote_id.
 *
 * See: /docs/endpoints#quoting-show
 */
class ShowEndpoint extends AbstractEndpoint {

    /**
     * ID of Quote to show.
     *
     * @var string
     */
    private $quoteId;

    /**
     * Constructor.
     *
     * Set Dwelling ID.
     *
     * @param  string $quoteId ID of Quote to show
     * @return void
     */
    public function __construct($quoteId)
    {
        parent::__construct();

        $this->quoteId = $quoteId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/quote/{$this->quoteId}";
    }
}
