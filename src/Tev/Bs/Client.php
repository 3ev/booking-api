<?php namespace Tev\Bs;

use Exception;

use Buzz\Client\Curl,
    Buzz\Message\RequestInterface,
    Buzz\Message\Request,
    Buzz\Message\Response,
    Buzz\Listener\BasicAuthListener;

use Tev\Bs\Response\Parser,
    Tev\Bs\Utils\Paginator,
    Tev\Bs\Contracts\EndpointInterface;

/**
 * API client for creating requests.
 *
 * Usage:
 *
 *     $client = new Client('http://apidomain.com', 'client_id', 'client_secret');
 *
 *     $endpoint = new ConcreteEndpoint;
 *     $endpoint->setParam('yes', 'no');
 *     $response = $client->request($endpoint);
 *
 *     echo $response->content()->key_name; // 'key value'
 *
 *     $paginatedEndpoint = new PaginatedEndpoint;
 *     $paginatedEndpoint->setParam('no', 'yes');
 *     $paginator = $client->paginate($paginatedEndpoint);
 *
 *     while ($response = $paginator->getPage()) {
 *         foreach ($response->content() as $data) {
 *             echo $response->content()->key_name; // 'key value'
 *         }
 *     }
 */
class Client {

    /**
     * API host name (including protocol).
     *
     * @var string
     */
    private $host;

    /**
     * API client ID.
     *
     * @var string
     */
    private $clientId;

    /**
     * API client secret.
     *
     * @var string
     */
    private $clientSecret;

    /**
     * API customer ID.
     *
     * @var string
     */
    private $customerId;

    /**
     * Constructor.
     *
     * Setup API credentials.
     *
     * @param  string $host         API host name (including protocol)
     * @param  string $clientId     API client ID
     * @param  string $clientSecret API client secret
     * @return void
     */
    public function __construct($host, $clientId, $clientSecret)
    {
        $this
            ->setHost($host)
            ->setAppUserCreds($clientId, $clientSecret)
            ->setCustomerCreds(null);
    }

    /**
     * Make an API request.
     *
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Requesting endpoint
     * @param  int $timeout
     *
     * @return \Tev\Bs\Contracts\ResponseInterface           Response
     *
     * @throws \Exception
     * @throws \Tev\Bs\Exception\ErrorResponseException
     */
    public function request(EndpointInterface $endpoint, $timeout = 30)
    {
        if ($this->customerId !== null) {
            $endpoint->setParam('customer_id', $this->customerId);
        }

        // Request

        $request = new Request($endpoint->getMethod(), $endpoint->getUrl(), $this->host);
        $request->setContent($endpoint->getContent());

        // Response

        $response = new Response();

        // Authorisation

        $listener = new BasicAuthListener($this->clientId, $this->clientSecret);
        $listener->preSend($request);

        // Send

        $client = new Curl();
        $client->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $client->setTimeout($timeout);
        $client->send($request, $response);

        // Parse
        $responseContent = json_decode($response->getContent(), true);
        if ($responseContent['error'] && get_class($endpoint) === "Tev\Bs\Endpoint\Customers\UpdateEndpoint") {
            $errorString = "\033[31mERROR GETTING RESPONSE USING " . get_class($endpoint) . ": \n";
            foreach($responseContent['data'] as $error) {
                $errorString  = $errorString . "----- " . $error[0] . "\n";
            }
            echo $errorString . "\033[0m";
        }

        $parser = new Parser($response, $endpoint);

        return $parser->getResponse();
    }

    /**
     * Make a paginated API request.
     *
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Requesting endpoint
     * @return \Tev\Bs\Utils\Paginator                       Pagainator
     */
    public function paginate(EndpointInterface $endpoint)
    {
        return new Paginator($this, $endpoint);
    }

    /**
     * Set the API host name (including protocol).
     *
     * @param  string         $host API host name (including protocol)
     * @return \Tev\Bs\Client       This, for chaining
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Set the API client ID and API client secret
     *
     * @param  string         $clientId     API client ID
     * @param  string         $clientSecret API client secret
     * @return \Tev\Bs\Client               This, for chaining
     */
    public function setAppUserCreds($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Set the API customer ID.
     *
     * @param  string         $customerId API customer ID
     * @return \Tev\Bs\Client             This, for chaining
     */
    public function setCustomerCreds($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }
}
