<?php namespace Tev\Bs\Endpoint\Enquiries;

use Buzz\Message\RequestInterface;
use Tev\Bs\Endpoint\AbstractEndpoint;

/**
 * Endpoint object for /api/enquiries/:enquiry_id.
 *
 * See: /docs/endpoints#enquiries-update
 */
class UpdateEndpoint extends AbstractEndpoint {

    /**
     * ID of Enquiry to udpate.
     *
     * @var string
     */
    private $enquiryId;

    /**
     * Constructor.
     *
     * Set Enquiry ID.
     *
     * @param  string $enquiryId ID of Enquiry to update
     * @return void
     */
    public function __construct($enquiryId)
    {
        parent::__construct();

        $this->method = RequestInterface::METHOD_PUT;

        $this->enquiryId = $enquiryId;
    }

    /**
     * Retrieve the API URL for this endpoint.
     *
     * @return string
     */
    protected function apiUrl()
    {
        return "/api/enquiries/{$this->enquiryId}";
    }
}
