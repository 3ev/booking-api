<?php namespace Tev\Bs\Response;

use Tev\Bs\Client,
    Tev\Bs\Contracts\ResponseInterface,
    Tev\Bs\Contracts\EndpointInterface;

/**
 * Response object for paginated responses.
 *
 * Provides methods to inspect the pagination meta data and content.
 */
class PaginatedResponse implements ResponseInterface {

    /**
     * Parsed response data.
     *
     * @var stdClass
     */
    private $parsed;

    /**
     * Requested endpoint.
     *
     * @var \Tev\Bs\Contracts\EndpointInterface
     */
    private $endpoint;

    /**
     * Constructor.
     *
     * @param  stdClass                            $parsed   Parsed response data
     * @param  \Tev\Bs\Contracts\EndpointInterface $endpoint Requested endpoint
     * @return void
     */
    public function __construct($parsed, EndpointInterface $endpoint)
    {
        $this->parsed = $parsed;
        $this->endpoint = $endpoint;
    }

    /**
     * Fetch the parsed content of this response.
     *
     * @return array Response content
     */
    public function content()
    {
        return $this->parsed->data;
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

    /**
     * Get total results.
     *
     * @return integer
     */
    public function totalResults()
    {
        return (int) $this->parsed->total;
    }

    /**
     * Get total number of pages.
     *
     * @return integer
     */
    public function totalPages()
    {
        return (int) $this->parsed->last_page;
    }

    /**
     * Get number of results per page.
     *
     * @return integer
     */
    public function perPage()
    {
        return (int) $this->parsed->per_page;
    }

    /**
     * Get current page number.
     *
     * @return integer
     */
    public function currentPage()
    {
        return (int) $this->parsed->current_page;
    }

    /**
     * Check if we have a next page.
     *
     * @return boolean True if have next page, false if not
     */
    public function hasNextPage()
    {
        return $this->currentPage() !== $this->totalPages();
    }
}
