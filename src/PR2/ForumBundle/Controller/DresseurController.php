<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

class DresseurController extends Controller
{
    public function indexAction()
    {
    	$lesEntites = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2ForumBundle:Dresseur')
                        ->findAll();
        return $this->render('PR2ForumBundle:Dresseur:index.html.twig', array('dresseurs' => $lesEntites));
    }

    public function voirAction($id)
    {
        $entite = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('PR2ForumBundle:Dresseur')
                    ->find($id);
        
        return $this->render('PR2ForumBundle:Dresseur:voir.html.twig', array(
            'dresseur' => $entite
            ));
    }

}