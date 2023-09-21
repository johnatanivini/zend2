<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Pokedex\Controller;

use Pokedex\Services\ApiPokedex\ClientPokedexHttpInterface;
use Pokedex\Services\ApiPokedex\Pokemons;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public  Pokemons $pokemons;

    public function __construct()
    {
            $this->pokemons = new Pokemons();
    }
    public function indexAction()
    {
        return new ViewModel();
    }

    public function allAction()
    {
        return $this->pokemons->response();
    }
}
