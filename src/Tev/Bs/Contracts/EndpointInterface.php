<?php namespace Tev\Bs\Contracts;

/**
 * Base interface for API endpoints.
 */
interface EndpointInterface {

    /**
     * Get the request method for this endpoint.
     *
     * @see \Buzz\Message\RequestInterface
     *
     * @return string Request method
     */
    public function getMethod();

    /**
     * Set the request params for this endpoint.
     *
     * @param  array                               $params Request params
     * @return \Tev\Bs\Contracts\EndpointInterface         This, for chaining
     */
    public function setParams(array $params);

    /**
     * Set an individual request param for this endpoint.
     *
     * @param  string                              $key   Parameter key
     * @param  string                              $value Parameter value
     * @return \Tev\Bs\Contracts\EndpointInterface        This, for chaining
     */
    public function setParam($key, $value);

    /**
     * Get the request params for this endpoint.
     *
     * @return array Request params
     */
    public function getParams();

    /**
     * Get a single param from the set params.
     *
     * @param  string $key Param key
     * @return mixed       VaLue if param is set, null if not
     */
    public function getParam($key);

    /**
     * Get the URL to use for this endpoint.
     *
     * Will include any set parameters if the request method needs them.
     *
     * @return string URL (possibly with parameters)
     */
    public function getUrl();

    /**
     * Get request content for this endpoint.
     *
     * @return string Request body content
     */
    public function getContent();
}
