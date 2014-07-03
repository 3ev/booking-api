<?php namespace Tev\Bs\Response;

use Tev\Bs\Contracts\ResponseInterface,
    Tev\Bs\Contracts\EndpointInterface;

/**
 * Basic response object.
 *
 * Provides access to the response content and the endpoint that created it.
 */
class Response implements ResponseInterface {

    /**
     * Response content.
     *
     * @var mixed
     */
    private $content;

    /**
     * Requested endpoint.
     *
     * @var \Tev\Bs\Contracts\EndpointInterface
     */
    private $endpoint;

    /**
     * Constructor.
     *
     * @param  mixed                               $content  Response content
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Requested endpoint
     * @return void
     */
    public function __construct($content, EndpointInterface $endpoint)
    {
        $this->content  = $content;
        $this->endpoint = $endpoint;
    }

    /**
     * Fetch the parsed content of this response.
     *
     * This will be a stdClass object, or array of stdClass objects.
     *
     * @return stdClass|array Response content
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * Fetch the endpoint that was used to create this response.
     *
     * @return \Tev\Bs\Contracts\EndpointInterface Requested endpoint
     */
    public function endpoint()
    {
        return $this->endpoint;
    }
}
