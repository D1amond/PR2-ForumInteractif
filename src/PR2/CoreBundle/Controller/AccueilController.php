<?php

namespace PR2\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

class AccueilController extends Controller
{
    public function indexAction()
    {
        return $this->render('PR2CoreBundle:Accueil:index.html.twig');
    }
}