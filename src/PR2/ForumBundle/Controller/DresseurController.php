<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

use PR2\CoreBundle\Entity\Membre;
use PR2\ForumBundle\Entity\Dresseur;
use PR2\ForumBundle\Form\DresseurType;

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
    
    public function ajouterAction()
    {
        $dresseur = new Dresseur();
        $membre = $this->get('security.context')->getToken()->getUser();
        
        if ($membre == null) {
            throw $this->createNotFoundException('Vous devez être connecté pour créer un dresseur!');
        }
        
        $dresseur->setMembre($membre);
     
        $form = $this->createForm(new DresseurType(), $dresseur);
     
        $request = $this->getRequest();
     
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            
            if ($form->isValid()) {
                $membre->setDresseurActif($dresseur);
                $em = $this->getDoctrine()->getManager();
                $em->persist($dresseur);
                $em->flush();
         
                $this->get('session')->getFlashBag()->add('info', 'Dresseur bien ajouté');
         
                return $this->redirect($this->generateUrl('pr2dresseur_index'));
            }
        }
        
        return $this->render('PR2ForumBundle:Dresseur:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}