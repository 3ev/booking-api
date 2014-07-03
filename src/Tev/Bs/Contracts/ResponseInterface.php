<?php namespace Tev\Bs\Contracts;

/**
 * Base interface for all parsed responses.
 */
interface ResponseInterface {

    /**
     * Fetch the parsed content of this response.
     *
     * This will be a stdClass object, or array of stdClass objects.
     *
     * @return stdClass|array Response content
     */
    public function content();

    /**
     * Fetch the endpoint that was used to create this response.
     *
     * @return \Tev\Bs\Contracts\EndpointInterface Requested endpoint
     */
    public function endpoint();
}
