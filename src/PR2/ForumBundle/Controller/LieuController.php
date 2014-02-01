<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\ForumBundle\Entity\Lieu;
use PR2\ForumBundle\Form\LieuType;
use PR2\ForumBundle\Form\LieuEditType;

class LieuController extends Controller
{
    public function indexAction()
    {
    	$lesLieux = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PR2ForumBundle:Lieu')
                        ->findAll();
        $role = $this->getRequest()->getSession()->get('utilisateur');
        return $this->render('PR2ForumBundle:Lieu:index.html.twig', array('lieux' => $lesLieux,
                                                                           'role' => $role));
    }

    public function voirAction($id)
    {
      $lieu = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('PR2ForumBundle:Lieu')
                    ->find($id);
       
      // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'lieu :
      return $this->render('PR2ForumBundle:Lieu:voir.html.twig', array(
        'lieu' => $lieu
      ));
    }

    public function ajouterAction()
      {
        $lieu = new Lieu();
     
        // On crée le formulaire grâce à LieuType
        $form = $this->createForm(new LieuType(), $lieu);
     
        // On récupère la requête
        $request = $this->getRequest();
     
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
          // On fait le lien Requête <-> Formulaire
          $form->bind($request);
     
          // On vérifie que les valeurs entrées sont correctes
          // (Nous verrons la validation des objets en détail dans le prochain chapitre)
          if ($form->isValid()) {
            // On enregistre notre objet $lieu dans la base de données
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieu);
            $em->flush();
     
            // On définit un message flash
            $this->get('session')->getFlashBag()->add('info', 'Lieu bien ajouté');
     
            // On redirige vers la page de visualisation de l'lieu nouvellement créé
            return $this->redirect($this->generateUrl('pr2lieu_index'));
          }
        }
     
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
     
        return $this->render('PR2ForumBundle:Lieu:ajouter.html.twig', array(
          'form' => $form->createView(),
        ));
      }

    public function modifierAction(Lieu $lieu)
      {
        // On utiliser le LieuEditType
        $form = $this->createForm(new LieuEditType(), $lieu);
     
        $request = $this->getRequest();
     
        if ($request->getMethod() == 'POST') {
          $form->bind($request);
     
          if ($form->isValid()) {
            // On enregistre la lieu
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieu);
            $em->flush();
     
            // On définit un message flash
            $this->get('session')->getFlashBag()->add('info', 'Lieu bien modifié');
     
            return $this->redirect($this->generateUrl('pr2lieu_index'));
          }
        }
     
        return $this->render('PR2ForumBundle:Lieu:modifier.html.twig', array(
          'form'    => $form->createView(),
          'lieu' => $lieu
        ));
      }

    public function supprimerAction(Lieu $lieu)
      {
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'lieu contre cette faille
        $form = $this->createFormBuilder()->getForm();
     
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
          $form->bind($request);
     
          if ($form->isValid()) {
            // On supprime l'lieu
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieu);
            $em->flush();
     
            // On définit un message flash
            $this->get('session')->getFlashBag()->add('info', 'Lieu bien supprimé');
     
            // Puis on redirige vers l'accueil
            return $this->redirect($this->generateUrl('pr2lieu_index'));
          }
        }
     
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
        return $this->render('PR2ForumBundle:Lieu:supprimer.html.twig', array(
          'lieu' => $lieu,
          'form'    => $form->createView()
        ));
      }
}