<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\ForumBundle\Entity\Sujet;
use PR2\ForumBundle\Entity\Lieu;
use PR2\ForumBundle\Form\SujetType;

class SujetController extends Controller
{
    public function indexAction()
    {
    	$entityList = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('PR2ForumBundle:Sujet')
                     ->findAll();
        return $this->render('PR2ForumBundle:Sujet:index.html.twig', array('sujets' => $entityList));
    }

    public function voirAction($id)
    {
        $entity = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2ForumBundle:Sujet')
                        ->find($id);
       
        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'sujet :
        return $this->render('PR2ForumBundle:Sujet:voir.html.twig', array(
            'sujet' => $entity
        ));
    }

    public function ajouterAction()
    {
        $entity = new Sujet();
        
        // On crée le formulaire grâce à l'RegionType
        $form = $this->createForm(new SujetType(), $entity);
     
        // On récupère la requête
        $request = $this->getRequest();
     
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);
     
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $entity dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sujet bien ajouté');
     
                // On redirige vers la page de visualisation de l'entity nouvellement créé
                return $this->redirect($this->generateUrl('pr2sujet_index'));
            }
        }
     
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
     
        return $this->render('PR2ForumBundle:Sujet:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function modifierAction(Sujet $entity)
    {
        // On utiliser le RegionEditType
        $form = $this->createForm(new SujetType(), $entity);
     
        $request = $this->getRequest();
     
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On enregistre la entity
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sujet bien modifié');
         
                return $this->redirect($this->generateUrl('pr2sujet_index'));
            }
        }
     
        return $this->render('PR2ForumBundle:Sujet:modifier.html.twig', array(
            'form'    => $form->createView(),
            'sujet' => $entity
        ));
    }

    public function supprimerAction(Sujet $entity)
    {
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela p   ermet de protéger la suppression d'entity contre cette faille
        $form = $this->createFormBuilder()->getForm();
     
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On supprime l'entity
                $em = $this->getDoctrine()->getManager();
                $em->remove($entity);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sujet bien supprimé');
                // Puis on redirige vers l'accueil
                return $this->redirect($this->generateUrl('pr2sujet_index'));
            }
        }
     
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
        return $this->render('PR2ForumBundle:Sujet:supprimer.html.twig', array(
            'sujet' => $entity,
            'form'    => $form->createView()
        ));
    }
}