<?php 

namespace Pokedex\Services\ApiPokedex;

use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Request;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

class ClientPokedexHttp extends Client implements ClientPokedexHttpInterface
{
    private string $api = 'https://pokeapi.co/api/v2';
    private Client $client;

    public function __construct(string $url,string $method = Request::METHOD_GET, array $params = [])
    {
            $this->api = "{$this->api}{$url}";
            $this->client = new Client($this->api);
            $this->client->setAdapter( new Curl());
            $this->client->setMethod($method);
            $this->getParameters($method, $params);
           
    }
    public  function response(): JsonModel
    {
        $response = $this->client->send();
         if (!$response->isSuccess()) {
             return new JsonModel(['error' => $response->getBody()]);
         }
         return new JsonModel(['result' => Json::decode($response->getBody())]);
    }

    protected function getParameters(string $method, array $parameters = []) {
       
            switch($method) {
                case Request::METHOD_POST:
                    $this->client->setParameterPost($parameters);
                    break;
                case Request::METHOD_GET:
                    $this->client->setParameterGet($parameters);
                    break;
           }
    }

}