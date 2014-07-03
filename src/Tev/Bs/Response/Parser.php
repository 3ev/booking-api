<?php namespace Tev\Bs\Response;

use Exception;

use Buzz\Message\Response as BuzzResponse;

use Tev\Bs\Contracts\EndpointInterface,
    Tev\Bs\Exception\ErrorResponseException;

/**
 * Response parser.
 *
 * Parses raw responses into usable response objects.
 */
class Parser {

    /**
     * Raw response.
     *
     * @var \Buzz\Message\Response
     */
    private $response;

    /**
     * Requested endpoint.
     *
     * @var \Tev\Bs\Contracts\EndpointInterface
     */
    private $endpoint;

    /**
     * Constructor.
     *
     * @param  \Buzz\Message\Response              $response Raw response
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Requested endpoint
     * @return void
     */
    public function __construct(BuzzResponse $response, EndpointInterface $endpoint)
    {
        $this->response = $response;
        $this->endpoint = $endpoint;
    }

    /**
     * Parse a response.
     *
     * @return \Tev\Bs\Contracts\ResponseInterface
     *
     * @throws \Exception
     * @throws \Tev\Bs\Exception\ErrorResponseException
     */
    public function getResponse()
    {
        $content = json_decode($this->response->getContent());

        if (!$content) {
            throw new Exception('Failed to get response from server');
        }

        if (isset($content->error) && $content->error) {
            $excp = new ErrorResponseException(
                $content->message,
                $this->response->getStatusCode()
            );

            $excp->setResponse(new Response($content, $this->endpoint));

            throw $excp;
        }

        if (isset($content->per_page)) {
            return new PaginatedResponse($content, $this->endpoint);
        }

        return new Response($content, $this->endpoint);
    }
}
