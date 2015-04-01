<?php

namespace PR2\PokemonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use PR2\PokemonBundle\Entity\BasePokemon;

class PokedexController extends Controller
{
    public function indexAction()
    {
        return $this->render('PR2PokemonBundle:Pokedex:index.html.twig');
    }

    public function getPokemonsAction(Request $request)
    {
        $serializer = $this->get('serializer');
        $pokemons = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2PokemonBundle:BasePokemon')
                     ->searchByPagination($request->get('searchTerm'));
        $response = ['pokemons' => $pokemons];
        return new Response($serializer->serialize($response, 'json'));
    }
}