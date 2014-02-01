<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\ForumBundle\Entity\Connexion;
use PR2\ForumBundle\Form\ConnexionType;

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

    public function connexionAction()
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
          return $this->redirect($this->generateUrl('pr2forum_accueil'));
        }
     
        $request = $this->getRequest();
        $session = $request->getSession();
     
        // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
          $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
          $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
          $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
     
        return $this->render('PR2ForumBundle:Forum:connexion.html.twig', array(
          // Valeur du précédent nom d'utilisateur entré par l'internaute
          'last_username' => $session->get(SecurityContext::LAST_USERNAME),
          'error'         => $error,
        ));
    }
    // public function connexionAction()
    // {
    //     $connexion = new Connexion();
    //     $form = $this->createForm(new ConnexionType(), $connexion);
    //     $request = $this->get('request');
           
    //     if ($request->getMethod() == 'POST') {

    //         $form->bind($request);
            
    //         if ($form->isValid()) {
    //             $leMembre = $this->getDoctrine()
    //                  ->getManager()
    //                  ->getRepository('PR2ForumBundle:Membre')
    //                  ->findOneBy(array('identifiant' => $connexion->getIdentifiant(),
    //                                    'motDePasse' => $connexion->getMotDePasse()));
    //             if ($leMembre != null) {
    //                 if ($connexion->getResterEnLigne() === true) {
    //                     $cookie = new Cookie('utilisateur', $leMembre->getId());
    //                     $request->cookies->Add(array($cookie));
    //                 }
    //                 $session = $this->getRequest()->getSession();
    //                 $session->set('utilisateur', $leMembre->getId());
    //                 $session->set('role', $leMembre->getRole());
    //                 return $this->redirect($this->generateUrl('pr2forum_accueil'));
    //             } else {
    //                 //Les informations entrées dans le formulaire sont éronnées. Rediriger à la page de connexion avec message (alert).
    //                 return $this->render('PR2ForumBundle:Forum:connexion.html.twig', array(
    //                 'form' => $form->createView(),
    //                 'erreur' => "L'identifiant ou le mot de passe entré est erroné!"
    //                 ));
    //             }
    //         }
    //     }
    //     return $this->render('PR2ForumBundle:Forum:connexion.html.twig', array(
    //                 'form' => $form->createView(),
    //                 ));
    // }

    public function voirMembresAction(){
        $lesMembres = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Membre')
                     ->findAll();
        return $this->render('PR2ForumBundle:Forum:voirMembres.html.twig', array('membres' => $lesMembres));
    }

    public function voirRegionAction($id){
        $laRegion = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Region')
                     ->find($id);
        if($laRegion == null)
          {
            throw $this->createNotFoundException('Région[id='.$id.'] inexistante.');
          };
        return $this->render('PR2ForumBundle:Forum:voirRegion.html.twig', array('region' => $laRegion));
    }

    public function voirLieuAction($id){
    	$leLieu = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Lieu')
                     ->find($id);
        if($leLieu == null)
          {
            throw $this->createNotFoundException('Lieu[id='.$id.'] inexistant.');
          };
    	return $this->render('PR2ForumBundle:Forum:voirLieu.html.twig', array('lieu' => $leLieu));
    }

    public function voirSujetAction($id){
        $leSujet = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Sujet')
                     ->find($id);
        if($leSujet == null)
          {
            throw $this->createNotFoundException('Sujet[id='.$id.'] inexistant.');
          };
        return $this->render('PR2ForumBundle:Forum:voirSujet.html.twig', array('sujet' => $leSujet));
    }
}
