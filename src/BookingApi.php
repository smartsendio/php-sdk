<?php

namespace Smartsendio\Api;

use InvalidArgumentException;
use Smartsendio\Api\Contracts\BookingApiInterface;
use Smartsendio\Api\Contracts\BookingApiResponseInterface;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Data\Shipment;
use Smartsendio\Api\Traits\PaginatableTrait;

class BookingApi extends AbstractApi implements BookingApiInterface
{
    use PaginatableTrait;

    /** @var ClientInterface */
    protected $client;

    protected $api_version = '1';

    protected $api_endpoint_base = 'labels';

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getVersion(): string
    {
        return $this->api_version;
    }

    public function shipment(Shipment $shipment): BookingApiResponseInterface
    {
        $this->checkBasicRequiredParameters();

        return $this->client->post(
            $this->getBaseUri($this->api_endpoint_base),
            [
                'api_token' => $this->token,
            ],
            $shipment->toArray()
        );
    }

    /** @throws InvalidArgumentException */
    protected function checkBasicRequiredParameters()
    {
        if (! $this->token) {
            throw new InvalidArgumentException('Token is required');
        }

        if (! $this->website) {
            throw new InvalidArgumentException('Website is required');
        }
    }
}
