# Smart Send API

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
![Tests](https://github.com/smartsendio/php-sdk/workflows/Tests/badge.svg)
[![Total Downloads][ico-downloads]][link-downloads]

PHP SDK for interacting with the Smart Send API.

Check our [Swagger documentation](https://app.swaggerhub.com/apis/smartsendio/webshop/) for more details.

## Install

Via Composer

``` bash
$ composer require smartsendio/api
```

## Usage

Use Composer's autoload:

```php
require __DIR__.'/../vendor/autoload.php';
```

And finally create an instance of the SDK:

```php
$client = new Smartsendio\Api\Adapters\GuzzleClientAdapter(new \GuzzleHttp\Client());
$api = new Smartsendio\Api\ApiFactory($client); // Any client that implements ClientInterface can be used
$api->apiToken('API_TOKEN_HERE')->website('WEBSITE'); // Set the authentication parameters
```

### Demo mode
Demo mode can be used for testing and is activated like so:

```php
$api->demo(); // Api is now in demo mode.
```

### Fetching agents
Agents are fetched using the `agents` API.

```php
// Example: All agents for a given carrier in a zipcode
$response = $api->agents() // AgentApiInterface
    ->carrier('postnord')
    ->country('DK')
    ->zipcode('2100')
    ->get(); // PaginatedAgentApiResponseInterface

// Example: The closest agents for a given carrier based on a given address
$response = $api->agents() // AgentApiInterface
    ->carrier('postnord')
    ->country('DK')
    ->zipcode('2100')
    ->street('Nordre Frihavnsgade 1')
    ->closest(); // PaginatedAgentApiResponseInterface

// Example: Get a single agent using the carries own unique agent number
$response = $api->agents() // AgentApiInterface
    ->carrier('postnord')
    ->country('DK')
    ->lookup('1234567'); // AgentApiResponseInterface
```

### Shipments
Booking of shipments (creating shipping labels) are done by firstly creating the complex `Shipment` object and passing that to the `shipments` API:

```php
$item = new \Smartsendio\Api\Data\Item([
   'internal_id' => '000000123',
   'internal_reference' => 'PRODUCT-1231456',
   'sku' => '012345678',
   'name' => 'Product A',
   'description' => 'Small product A',
   'hs_code' => '10203040',
   'country_of_origin' => 'dk',
   'image_url' => 'https://example.com/catalog/product-a.jpg',
   'unit_weight' => 1.2,
   'unit_price_excluding_tax' => 40.6,
   'unit_price_including_tax' => 50.75,
   'quantity' => 2,
   'total_price_excluding_tax' => 81.2,
   'total_price_including_tax' => 101.5,
   'total_tax_amount' => 20.3,
]);

$parcel = new \Smartsendio\Api\Data\Parcel([
    'internal_id' => '00100025556',
    'internal_reference' => 'ABC12345678',
    'weight' => 9.3,
    'height' => 1,
    'width' => 1,
    'length' => 1,
    'freetext' => 'Please handle this package',
    'total_price_excluding_tax' => 141.2,
    'total_price_including_tax' => 176.5,
    'total_tax_amount' => 35.3,
]);
$parcel->addItem($item);

$shipment = new \Smartsendio\Api\Data\Shipment();
$shipment->setReceiver([
    'internal_id' => '00000158895',
    'internal_reference' => '123456',
    'company' => 'Smart Send',
    'name_line1' => 'Sven',
    'name_line2' => 'Andersson',
    'address_line1' => 'Drottninggatan 75',
    'address_line2' => 'LGH 1102',
    'postal_code' => '46133',
    'city' => 'Trollhøttan',
    'state' => 'AL',
    'country' => 'SE',
    'sms' => '+46851972000',
    'email' => 'email@example.com',
])->addParcel($parcel);

$response = $api->booking()  // BookingApiInterface
    ->shipment($shipment); // BookingApiResponseInterface
```

### Dealing with errors
This is how to deal with API errors:

```php
$response = $api->booking()->shipment($shipment); // ApiResponseInterface
$response->isSuccessful(); // false
$error = $response->getError(); // ApiErrorInterface
$error->getId(); // Unique id of the error
$error->getCode(); // Error code describing the type of error
$error->getMessage(); // Description of the error
$error->getErrors(); // Return each individual error
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/smartsendio/api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/smartsendio/api/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/smartsendio/api.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/smartsendio/api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/smartsendio/api.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/smartsendio/api
[link-travis]: https://travis-ci.org/smartsendio/api
[link-scrutinizer]: https://scrutinizer-ci.com/g/smartsendio/api/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/smartsendio/api
[link-downloads]: https://packagist.org/packages/smartsendio/api
[link-author]: https://github.com/smartsendio
[link-contributors]: ../../contributors
