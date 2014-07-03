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

## Basic usage

```php
use Tev\Bs\Client;
use Tev\Bs\Endpoint\Dwellings\ShowEndpoint;

$apiUrl       = 'http://apidomain.com';
$clientId     = 'client_id';
$clientSecret = 'client_secret';
$dwellingId   = '123';

$client = new Client($apiUrl, $clientId, $clientSecret);

$dwelling = $client->request(new ShowEndpoint($dwellingId)->content();

echo $dwelling->name = 'A Dwelling';
```
