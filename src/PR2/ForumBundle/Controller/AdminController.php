<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('PR2ForumBundle:Admin:index.html.twig');
    }
}