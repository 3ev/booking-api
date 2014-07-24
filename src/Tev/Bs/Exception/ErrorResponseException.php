<?php namespace Tev\Bs\Exception;

use Exception;
use Tev\Bs\Contracts\ResponseInterface;

/**
 * This exception will be thrown when an error response is returned from the API.
 *
 * You can access the response data like:
 *
 *     try {
 *         // error thrown
 *     } catch (ErrorResponseException $e) {
 *         $e->getResponse()->content()->message;
 *     }
 */
class ErrorResponseException extends Exception {

    /**
     * Error response object.
     *
     * @var \Tev\Bs\Contracts\ResponseInterface
     */
    private $response;

    /**
     * Set the error response on this exception.
     *
     * @param  \Tev\Bs\Contracts\ResponseInterface      $response Error response
     * @return \Tev\Bs\Exception\ErrorResponseException           This, for chaining
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Get the error response on this exception.
     *
     * @return \Tev\Bs\Contracts\ResponseInterface Error response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
