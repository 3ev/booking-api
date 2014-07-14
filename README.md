# Booking API

Booking System API PHP Client.

## Installing

Add the following to your `composer.json`:

```json
{
    "require": {
        "3ev/booking-api": "~1.0"
    },

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/3ev/booking-api"
        }
    ]
}
```

## API Client

All requests go through the [`Tev\Bs\Client`](https://github.com/3ev/booking-api/blob/master/src/Tev/Bs/Client.php) class. You just need to configure the client with your API credentials, like so:

```php
$apiUrl       = 'http://apidomain.com';
$clientId     = 'client_id';
$clientSecret = 'client_secret';

$client = new \Tev\Bs\Client($apiUrl, $clientId, $clientSecret);

// Start making requests...
```

## Endpoints

Every API request requires and target endpoint. All endpoints can be found in
the [`Tev\Bs\Endpoint`](https://github.com/3ev/booking-api/tree/master/src/Tev/Bs/Endpoint)
namespace.

You prepare endpoints by simply instiatating endpoint objects and configuring
any parameters you might need. For example:

```php
$createCustomer = new \Tev\Bs\Endpoint\Customers\CreateEndpoint;

// Set params one at a time

$createCustomer
    ->setParam('email_address', 'test@example.com')
    ->setParam('first_name', 'Test');

// or all at once (this will override all existing parameters)

$createCustomer
    ->setParams(array(
        'email_address' => 'test@example.com'
        'first_name' => 'Test'
    ));
```

Some endpoints require parameters in their constructor:

```php
$dwellingId = '123';
$showDwelling = new \Tev\Bs\Endpoint\Dwellings\ShowEndpoint($dwellingId);
```

## Responses

Each API request will return a [`Tev\Bs\Contracts\ResponseInterface`](https://github.com/3ev/booking-api/blob/master/src/Tev/Bs/Contracts/ResponseInterface.php). This is a simple object that provides
two methods; one to fetch the response content as a `stdClass` object (or `array`
if there are multiple entries), and one to fetch the endpoint that was used to
get the response.

Example:

```php
$response->content(); // stdClass containing API response

$response->endpoint(); // Tev\Bs\Contracts\EndpointInterface that was used to get the response
```

## Errors

When making API requests, all errors are thrown as exceptions.

For most API errors, a [`\Tev\Bs\Exception\ErrorResponseException`](https://github.com/3ev/booking-api/blob/master/src/Tev/Bs/Exception/ErrorResponseException.php) will be thrown. This exectpion
provides methods to access the error response and its data. When an exception
like this is thrown, the request should normally be repeated with different
parameters.

For errors with the API itself, a standard `Exception` is thrown. The request
should normally not be repeated when this happends.

```php
use Tev\Bs\Client,
    Tev\Bs\Endpoint\Bookings\CreateEndpoint,
    Tev\Bs\Exception\ErrorResponseException;

$client   = new Client($apiUrl, $clientId, $clientSecret);
$endpoint = new CreateEndpoint;

try {
    $response = $client->request($endpoint);
}
catch (ErrorResponseException $e) {
    $response = $e->getResponse(); // Fetch the response that came from the API

    echo $response->content()->message;   // Error message
    var_dump($response->content()->data); // Arbitrary error data
}
catch (Exception $e) {
    // Problem making request
}
```
## Example Usage

Typical usage examples are listed below.

### Basic usage

This example shows making an API request using Application Authentication for
a non-paginated resource.

```php
use Tev\Bs\Client,
    Tev\Bs\Endpoint\Dwellings\ShowEndpoint,
    Tev\Bs\Exception\ErrorResponseException;

$apiUrl       = 'http://apidomain.com';
$clientId     = 'client_id';
$clientSecret = 'client_secret';
$dwellingId   = '123';

$client = new Client($apiUrl, $clientId, $clientSecret);

try {
    $dwelling = $client->request(new ShowEndpoint($dwellingId))->content();

    echo $dwelling->name = 'A Dwelling';
}
catch (ErrorResponseException $e) {
    // Handle error
}
catch (Exception $e) {
    // Handle error
}
```

### Customer Authentication

This example shows making an API request using Customer Authentication for
a non-paginated resource.

```php
use Tev\Bs\Client,
    Tev\Bs\Endpoint\Payments\ListCardsEndpoint,
    Tev\Bs\Exception\ErrorResponseException;

$apiUrl       = 'http://apidomain.com';
$clientId     = 'client_id';
$clientSecret = 'client_secret';
$customerId   = '123';

$client = new Client($apiUrl, $clientId, $clientSecret);

try {
    $cards =
        $client
            ->setCustomerCreds($customerId)
            ->request(new ListCardsEndpoint)->content()

    foreach ($cards as $c) {
        echo $c->number; // Last 4 digits of card number
    }
}
catch (ErrorResponseException $e) {
    // Handle error
}
catch (Exception $e) {
    // Handle error
}
```

### Paginated resources

Retrieving paginated resources is easy with the client. This example shows
retrieving all Bookings for a Customer.

```php
use Tev\Bs\Client,
    Tev\Bs\Endpoint\Bookings\ListEndpoint,
    Tev\Bs\Exception\ErrorResponseException;

$apiUrl       = 'http://apidomain.com';
$clientId     = 'client_id';
$clientSecret = 'client_secret';
$customerId   = '123';

$client = new Client($apiUrl, $clientId, $clientSecret);

try {
    $paginator =
        $client
            ->setCustomerCreds($customerId)
            ->paginate(new ListEndpoint);

    while ($rsp = $paginator->getPage()) {
        $bookings = $rsp->content();

        foreach ($bookings as $booking) {
            echo $booking->id;
        }
    }
}
catch (ErrorResponseException $e) {
    // Handle error
}
catch (Exception $e) {
    // Handle error
}
```

## Contributing

To contribute to this repository, please fork it and make a Pull Request.
