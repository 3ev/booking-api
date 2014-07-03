<?php namespace Tev\Bs\Utils;

use Tev\Bs\Client,
    Tev\Bs\Contracts\EndpointInterface;

/**
 * Pagination utility.
 *
 * This utility can accept an endpoint and iterate over its pages, if it has
 * any.
 *
 * Example usage:
 *
 *     $pgn = new Paginator($client, $endpoint);
 *
 *     while ($rsp = $pgn->getPage()) {
 *         foreach ($rsp->content() as $item) {
 *             // Do stuff with item
 *         }
 *     }
 *
 */
class Paginator {

    /**
     * API client.
     *
     * @var \Tev\Bs\Client
     */
    private $client;

    /**
     * Endpoint to paginate.
     *
     * @var \Tev\Bs\Contracts\EndpointInterface
     */
    private $endpoint;

    /**
     * Current results page.
     *
     * @var \Tev\Bs\Response\PaginatedResponse
     */
    private $page;

    /**
     * Pagination complete flag.
     *
     * @var boolean
     */
    private $finished;

    /**
     * Constructor.
     *
     * Accepts a client with which to make requests and the endpoint to
     * paginate.
     *
     * @param  \Tev\Bs\Client                      $client   API client
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Endpoint to paginate
     * @return void
     *
     * @throws \Exception
     * @throws \Tev\Bs\Exception\ErrorResponseException
     */
    public function __construct(Client $client, EndpointInterface $endpoint)
    {
        $this->client   = $client;
        $this->endpoint = $endpoint;
        $this->page     = null;
        $this->finished = false;

        // Load the first page

        $this->advance();
    }

    /**
     * Get total results.
     *
     * @return integer
     */
    public function totalResults()
    {
        return $this->page->totalResults();
    }

    /**
     * Get total number of pages.
     *
     * @return integer
     */
    public function totalPages()
    {
        return $this->page->totalPages();
    }

    /**
     * Get number of results per page.
     *
     * @return integer
     */
    public function perPage()
    {
        return $this->page->perPage();
    }

    /**
     * Get current page number.
     *
     * @return integer
     */
    public function currentPage()
    {
        return $this->page ? $this->page->currentPage() : 0;
    }

    /**
     * Check if we have a next page.
     *
     * @return boolean True if have next page, false if not
     */
    public function hasNextPage()
    {
        return $this->page->hasNextPage();
    }

    /**
     * Get the current page and advanced to the next.
     *
     * If we've run out of pages, return null.
     *
     * @return \Tev\Bs\Response\PaginatedResponse|null
     *
     * @throws \Exception
     * @throws \Tev\Bs\Exception\ErrorResponseException
     */
    public function getPage()
    {
        if ($this->finished) {
            return null;
        }

        $page = $this->page;

        // Move on

        $this->advance();

        return $page;
    }

    /**
     * Advance to the next page.
     *
     * @return \Tev\Bs\Utils\Paginator This, for chaining
     *
     * @throws \Exception
     * @throws \Tev\Bs\Exception\ErrorResponseException
     */
    private function advance()
    {
        if ($this->currentPage() === 0 || $this->hasNextPage()) {
            $this->page = $this->client->request(
                $this->endpoint->setParam('page', $this->currentPage() + 1)
            );
        } else {
            $this->finished = true;
        }

        return $this;
    }
}
