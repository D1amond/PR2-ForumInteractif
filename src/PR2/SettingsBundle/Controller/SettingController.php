<?php

namespace PR2\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingController extends Controller
{
    public function indexAction()
    {
    	$lesThemes = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2SettingsBundle:Theme')
                        ->findAll();
        return $this->render('PR2SettingsBundle:Setting:index.html.twig', array('themes' => $lesThemes));
    }
}
