<?php

namespace PR2\PokemonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PR2PokemonBundle:Default:index.html.twig', array('name' => $name));
    }
}
