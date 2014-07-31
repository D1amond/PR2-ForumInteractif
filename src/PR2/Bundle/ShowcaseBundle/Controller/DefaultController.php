<?php

namespace PR2\Bundle\ShowcaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $homePage = null;
        $homePages = $em->getRepository('PR2ShowcaseBundle:HomePage')->getActive();

        if (count($homePages) > 0) {
            $homePage = $homePages->first();
        } 

        return ['page' => $homePage];
    }
}
