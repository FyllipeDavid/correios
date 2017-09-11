<?php

namespace Joelsonm\Correios;

use GuzzleHttp\Client;
/**
 *
 */
class RequestResource
{
    private $endpoint = '';

    function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->endpoint,
            'exceptions' => false
        ]);
    }

    public function getRequest(string $uri, array $query = [])
    {
        $response = $this->client->get($uri, ['query' => $query]);

        return $this->response($response);
    }

    public function postRequest(string $uri, array $params = [])
    {
        $response = $this->client->post($uri, ['xml' => $params]);

        return $this->response($response);
    }

    public function patchRequest(string $uri, array $params = [])
    {
        $response = $this->client->patch($uri, ['xml' => $params]);

        return $this->response($response);
    }

    public function putRequest(string $uri, array $params = [])
    {
        $response = $this->client->put($uri, ['xml' => $params]);

        return $this->response($response);
    }

    public function deleteRequest(string $uri, array $params = [])
    {
        $response = $this->client->delete($uri);

        return $this->response($response);
    }

    private function response($response){

        $json = json_decode(json_encode(simplexml_load_string($response->getBody(),'SimpleXMLElement',LIBXML_NOCDATA)));

        return (object) [
            'status' => $response->getStatusCode(),
            'data' => $json
        ];
    }

}
