<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\ForumBundle\Entity\Region;
use PR2\ForumBundle\Entity\Tuile;
use PR2\ForumBundle\Entity\ImageTuile;
use PR2\ForumBundle\Entity\ImageTuileList;
use PR2\ForumBundle\Form\RegionType;
use PR2\ForumBundle\Form\RegionEditType;

class TuileController extends Controller
{
    public function indexAction(Region $region, $selection)
    {
        // $request = $this->getRequest();
     
        // // On vérifie qu'elle est de type POST
        // if ($request->getMethod() == 'POST') {
        //   // On fait le lien Requête <-> Formulaire
        //   $form->bind($request);
     
        //   // On vérifie que les valeurs entrées sont correctes
        //   // (Nous verrons la validation des objets en détail dans le prochain chapitre)
        //   if ($form->isValid()) {
        //     // On enregistre notre objet $region dans la base de données
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($region);
        //     $em->flush();
     
        //     // On définit un message flash
        //     $this->get('session')->getFlashBag()->add('info', 'Region bien ajouté');
     
        //     // On redirige vers la page de visualisation de l'region nouvellement créé
        //     return $this->redirect($this->generateUrl('pr2region_index'));
        //   }
        // }
        
        if($selection != 0){
            $laSelection = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('PR2ForumBundle:Tuile')
                    ->find($selection);
        } else{
            $laSelection = null;
        }
        $lesTuiles = $region->getTuiles();
        $role = $this->getRequest()->getSession()->get('utilisateur');
        $listeTuiles = new ImageTuileList();
        return $this->render('PR2ForumBundle:Tuile:index.html.twig', array('region' => $region,
                                                                            'selection' => $laSelection,
                                                                            'tuiles' => $lesTuiles,
                                                                            'imageTuiles' => $listeTuiles->getList(),
                                                                            'role' => $role));
    }

    public function ajouterAction(Region $region, $direction){
        if ($direction == '1') {
            $region->addTuilesTop();
        } elseif ($direction == '2') {
            $region->addTuilesRight();
        } elseif ($direction == '3') {
            $region->addTuilesBottom();
        } elseif ($direction == '4') {
            $region->addTuilesLeft();
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($region);
        $em->flush();

        return $this->redirect($this->get('router')->generate('pr2tuile_index', array('id' => $region->getId())));
    }

    public function supprimerAction(Region $region, $direction){
        if ($direction == '1') {
            $region->removeTuilesTop();
        } elseif ($direction == '2') {
            $region->removeTuilesRight();
        } elseif ($direction == '3') {
            $region->removeTuilesBottom();
        } elseif ($direction == '4') {
            $region->removeTuilesLeft();
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($region);
        $em->flush();

        return $this->redirect($this->get('router')->generate('pr2tuile_index', array('id' => $region->getId())));
    }
}