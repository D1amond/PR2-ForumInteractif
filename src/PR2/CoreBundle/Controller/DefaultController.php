<?php

namespace PR2\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PR2CoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
