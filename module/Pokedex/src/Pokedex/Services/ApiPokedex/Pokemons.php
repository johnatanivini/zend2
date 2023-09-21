<?php
namespace Pokedex\Services\ApiPokedex;

use Zend\Http\Request;

class Pokemons extends ClientPokedexHttp
{
        public function __construct()
        {
                parent::__construct('/pokemon', Request::METHOD_GET, [
                    'limit' => 10000,
                    'offset' => 0
                ]);
        }
}