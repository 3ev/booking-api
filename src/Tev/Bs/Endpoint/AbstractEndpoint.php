<?php namespace Tev\Bs\Endpoint;

use Buzz\Message\RequestInterface;
use Tev\Bs\Contracts\EndpointInterface;

/**
 * Base Endpoint object that implements the common functionality for all
 * endpoints.
 */
abstract class AbstractEndpoint implements EndpointInterface {

    /**
     * Request method.
     *
     * @var string
     */
    private $method;

    /**
     * Request params.
     *
     * @var array
     */
    private $params;

    /**
     * Constructor.
     *
     * Endpoints are setup to use GET by default.
     *
     * @return void
     */
    public function __construct()
    {
        $this->method = RequestInterface::METHOD_GET;
        $this->params = array();
    }

    /**
     * Get the request method for this endpoint.
     *
     * @see Buzz\Message\RequestInterface
     *
     * @return string Request method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the request params for this endpoint.
     *
     * @param  array                               $params Request params
     * @return \Tev\Bs\Contracts\EndpointInterface         This, for chaining
     */
    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Set an individual request param for this endpoint.
     *
     * @param  string                              $key   Parameter key
     * @param  string                              $value Parameter value
     * @return \Tev\Bs\Contracts\EndpointInterface        This, for chaining
     */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;

        return $this;
    }

    /**
     * Get the request params for this endpoint.
     *
     * @return array Request params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get a single param from the set params.
     *
     * @param  string $key Param key
     * @return mixed       String if param is set, null if not
     */
    public function getParam($key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

    /**
     * Get the URL to use for this endpoint.
     *
     * Will include any set parameters if the request method needs them.
     *
     * @return string URL (possibly with parameters)
     */
    public function getUrl()
    {
        if (($this->getMethod() === RequestInterface::METHOD_GET) && count($this->getParams())) {
            return $this->apiUrl() . '?' . http_build_query($this->getParams());
        } else {
            return $this->apiUrl();
        }
    }

    /**
     * Get request content for this endpoint.
     *
     * This will be submitted for some requests, like POST.
     *
     * @return string
     */
    public function getContent()
    {
        if (($this->getMethod() !== RequestInterface::METHOD_GET) && count($this->getParams())) {
            return http_build_query($this->getParams());
        } else {
            return '';
        }
    }

    /**
     * Set the request method for this endpoint.
     *
     * @see Buzz\Message\RequestInterface
     *
     * @param  string                              $method Request method
     * @return \Tev\Bs\Contracts\EndpointInterface         This, for chaining
     */
    protected function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected abstract function apiUrl();
}
