<?php 

namespace Pokedex\Services\ApiPokedex;

use Zend\View\Model\JsonModel;

interface  ClientPokedexHttpInterface  {
     public  function response(): JsonModel;
}