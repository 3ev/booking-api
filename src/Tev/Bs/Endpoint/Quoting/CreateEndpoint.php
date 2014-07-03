<?php namespace Tev\Bs\Endpoint\Quoting;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/quote/for/:product_id.
 *
 * See: /docs/endpoints#quoting-create
 */
class CreateEndpoint extends AbstractEndpoint {

    /**
     * ID of Product to get Quote for.
     *
     * @var string
     */
    private $productId;

    /**
     * Constructor.
     *
     * @param  string $productId ID of Product to get Quote for
     * @return void
     */
    public function __construct($productId)
    {
        parent::__construct();

        $this->method    = RequestInterface::METHOD_POST;
        $this->productId = $productId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/quote/for/{$this->productId}";
    }
}
