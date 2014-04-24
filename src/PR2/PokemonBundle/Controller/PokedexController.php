<?php

namespace PR2\PokemonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PokedexController extends Controller
{
    public function indexAction()
    {
    	$pokemons = '';
    	$filtres = array();
        return $this->render('PR2PokemonBundle:Pokedex:index.html.twig', array('pokemons' => $pokemons, 'filtres' => $filtres));
    }
}