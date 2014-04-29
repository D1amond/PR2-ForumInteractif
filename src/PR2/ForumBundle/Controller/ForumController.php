<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

class ForumController extends Controller
{
    public function indexAction()
    {
    	$lesRegions = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Region')
                     ->findAll();
        $role = $this->getRequest()->getSession()->get('utilisateur');
        return $this->render('PR2ForumBundle:Forum:index.html.twig', array('regions' => $lesRegions,
                                                                           'role' => $role));
    }
    
    public function statistiqueAction(){
        return $this->render('PR2ForumBundle:Forum:statistique.html.twig');
    }

    public function voirMembresAction(){
        $lesMembres = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2CoreBundle:Membre')
                     ->findAll();
        return $this->render('PR2ForumBundle:Forum:voirMembres.html.twig', array('membres' => $lesMembres));
    }

    public function voirRegionAction($id){
        $laRegion = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2ForumBundle:Region')
                        ->find($id);
        if ($laRegion == null) {
            throw $this->createNotFoundException('Région[id='.$id.'] inexistante.');
        };
        return $this->render('PR2ForumBundle:Forum:voirRegion.html.twig', array('region' => $laRegion));
    }

    public function voirLieuAction($id){
    	$leLieu = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Lieu')
                     ->find($id);
        if ($leLieu == null) {
            throw $this->createNotFoundException('Lieu[id='.$id.'] inexistant.');
        };
    	return $this->render('PR2ForumBundle:Forum:voirLieu.html.twig', array('lieu' => $leLieu));
    }

    public function voirSujetAction($id){
        $leSujet = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Sujet')
                     ->find($id);
        if ($leSujet == null) {
            throw $this->createNotFoundException('Sujet[id='.$id.'] inexistant.');
        };
        return $this->render('PR2ForumBundle:Forum:voirSujet.html.twig', array('sujet' => $leSujet));
    }
}
