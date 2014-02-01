<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\ForumBundle\Entity\Region;
use PR2\ForumBundle\Form\RegionType;
use PR2\ForumBundle\Form\RegionEditType;

class RegionController extends Controller
{
    public function indexAction()
    {
    	$lesRegions = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Region')
                     ->findAll();
        $role = $this->getRequest()->getSession()->get('utilisateur');
        return $this->render('PR2ForumBundle:Region:index.html.twig', array('regions' => $lesRegions,
                                                                           'role' => $role));
    }

    public function voirAction($id)
    {
        $region = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2ForumBundle:Region')
                        ->find($id);
       
        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'region :
        return $this->render('PR2ForumBundle:Region:voir.html.twig', array(
            'region' => $region
        ));
    }

    public function ajouterAction()
    {
        $region = new Region();
     
        // On crée le formulaire grâce à l'RegionType
        $form = $this->createForm(new RegionType(), $region);
     
        // On récupère la requête
        $request = $this->getRequest();
     
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);
     
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $region dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($region);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Region bien ajouté');
     
                // On redirige vers la page de visualisation de l'region nouvellement créé
                return $this->redirect($this->generateUrl('pr2region_index'));
            }
        }
     
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
     
        return $this->render('PR2ForumBundle:Region:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function modifierAction(Region $region)
    {
        // On utiliser le RegionEditType
        $form = $this->createForm(new RegionEditType(), $region);
     
        $request = $this->getRequest();
     
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On enregistre la region
                $em = $this->getDoctrine()->getManager();
                $em->persist($region);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Region bien modifié');
         
                return $this->redirect($this->generateUrl('pr2region_index'));
            }
        }
     
        return $this->render('PR2ForumBundle:Region:modifier.html.twig', array(
            'form'    => $form->createView(),
            'region' => $region
        ));
    }

    public function supprimerAction(Region $region)
    {
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela p   ermet de protéger la suppression d'region contre cette faille
        $form = $this->createFormBuilder()->getForm();
     
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On supprime l'region
                $em = $this->getDoctrine()->getManager();
                $em->remove($region);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Region bien supprimé');
     
                // Puis on redirige vers l'accueil
                return $this->redirect($this->generateUrl('pr2region_index'));
            }
        }
     
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
        return $this->render('PR2ForumBundle:Region:supprimer.html.twig', array(
            'region' => $region,
            'form'    => $form->createView()
        ));
    }
}