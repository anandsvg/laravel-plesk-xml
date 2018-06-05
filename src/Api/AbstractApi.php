<?php

namespace nickurt\PleskXml\Api;

use nickurt\PleskXml\Client;
use \Spatie\ArrayToXml\ArrayToXml;

abstract class AbstractApi implements ApiInterface
{
    /**
     * @var Client
     */
    public $client;

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $parameters
     * @return mixed
     * @throws \Http\Client\Exception
     */
    protected function post($parameters)
    {
        $parameters = ArrayToXml::convert($parameters, [
            'rootElementName' => 'packet',
            '_attributes' => [
                'version' => $this->client->getHttpClient()->getOptions()['api_version'],
            ],
        ]);

        $response = $this->client->getHttpClient()->post(
            $parameters
        );

        return $response;
    }
}