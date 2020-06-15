<?php

namespace Smartsendio\Api;

use InvalidArgumentException;
use Smartsendio\Api\Contracts\AgentApiInterface;
use Smartsendio\Api\Contracts\AgentApiResponseInterface;
use Smartsendio\Api\Contracts\ClientInterface;
use Smartsendio\Api\Contracts\ApiResponseInterface;
use Smartsendio\Api\Traits\PaginatableTrait;

class AgentApi extends AbstractApi implements AgentApiInterface
{
    use PaginatableTrait;

    /** @var ClientInterface */
    protected $client;

    protected $api_version = '1';

    protected $api_endpoint_base = 'agents';

    public $carrier;
    public $country;
    public $postalcode;
    public $street;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getVersion(): string
    {
        return $this->api_version;
    }

    public function carrier(string $carrierCode): AgentApiInterface
    {
        $this->carrier = $carrierCode;
        return $this;
    }

    public function country(string $countryCode): AgentApiInterface
    {
        $this->country = $countryCode;
        return $this;
    }

    public function postalcode(string $postalcode): AgentApiInterface
    {
        $this->postalcode = $postalcode;
        return $this;
    }

    public function street(string $street): AgentApiInterface
    {
        $this->street = $street;
        return $this;
    }

    public function lookup(string $agentNo): AgentApiResponseInterface
    {
        $this->checkRequiredAuthenticationParameters();

        if (! $this->carrier) {
            throw new InvalidArgumentException('Carrier is required');
        }

        if (! $this->country) {
            throw new InvalidArgumentException('Country is required');
        }

        $pathParameters = [
            'carrier' => $this->carrier,
            'country' => $this->country,
            'agentno' => $agentNo,
        ];

        $apiResponse = $this->client->get(
            $this->getBaseUri($this->api_endpoint_base).$this->getPathString($pathParameters),
            [
                'api_token' => $this->token,
            ]
        );

        return new AgentApiResponse($apiResponse);
    }

    public function find(string $id): AgentApiResponseInterface
    {
        $this->checkRequiredAuthenticationParameters();

        $apiResponse = $this->client->get(
            $this->getBaseUri($this->api_endpoint_base).$id.'/',
            [
                'api_token' => $this->token,
            ]
        );

        return new AgentApiResponse($apiResponse);
    }

    public function get(): ApiResponseInterface
    {
        $this->checkRequiredAuthenticationParameters();

        if (! $this->carrier) {
            throw new InvalidArgumentException('Carrier is required');
        }

        if (! $this->country) {
            throw new InvalidArgumentException('Country is required');
        }

        $pathParameters = array_filter([ // Remove any parameters not set
            'carrier' => $this->carrier,
            'country' => $this->country,
            'postalcode' => $this->postalcode,
            'street' => $this->street,
        ]);

        $apiResponse = $this->client->get(
            $this->getBaseUri($this->api_endpoint_base).$this->getPathString($pathParameters),
            [
                'api_token' => $this->token,
            ]
        );

        return new PaginatedAgentApiResponse($apiResponse);
    }

    public function closest(): ApiResponseInterface
    {
        $this->checkRequiredAuthenticationParameters();

        if (! $this->carrier) {
            throw new InvalidArgumentException('Carrier is required');
        }

        if (! $this->country) {
            throw new InvalidArgumentException('Country is required');
        }

        $pathParameters = array_filter([ // Remove any parameters not set
            'carrier' => $this->carrier,
            'country' => $this->country,
            'postalcode' => $this->postalcode,
            'street' => $this->street,
        ]);

        $apiResponse = $this->client->get(
            $this->getBaseUri($this->api_endpoint_base).'closest/'.$this->getPathString($pathParameters),
            [
                'api_token' => $this->token,
            ]
        );

        return new PaginatedAgentApiResponse($apiResponse);
    }

    /** @throws InvalidArgumentException */
    protected function checkRequiredAuthenticationParameters()
    {
        if (! $this->token) {
            throw new InvalidArgumentException('Token is required');
        }

        if (! $this->website) {
            throw new InvalidArgumentException('Website is required');
        }
    }
}
