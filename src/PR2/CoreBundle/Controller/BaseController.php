<?php

namespace PR2\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class BaseController extends Controller
{

    protected abstract function getViewPaths();
    protected abstract function getRoutes();
    protected abstract function getRepository();
    protected abstract function createEntity();
    protected abstract function createEntityType();
    protected abstract function createModifierEntityType();

    protected function beforeIndex(array &$params) {}
    protected function beforeVoir(array &$params) {}

    protected function baseIndex() {
        $entities = $this->getRepository()->findAll();

        $params = array('entities' => $entities);

        $this->beforeIndex($params);

        return $this->render($this->getViewPaths()['index'], $params);
    }

    protected function baseVoir($id) {
        $entity = $this->getRepository()->find($id);

        $params = array('entity' => $entity);

        $this->beforeVoir($params);

        return $this->render($this->getViewPaths()['voir'], $params);
    }

    protected function baseAjouter() {
        $entity = $this->createEntity();
        $form = $this->createForm($this->createEntityType(), $entity);
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);
     
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Entitée bien ajoutée!');
         
                // On redirige vers la page de visualisation de l'objet nouvellement créé
                return $this->redirect($this->generateUrl($this->getRoutes()["index"]));
            }
        }
     
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        $params = array(
            'form' => $form->createView(),
        );
     
        return $this->render($this->getViewPaths()['ajouter'], $params);
    }

    protected function baseModifier($entity) {
        $form = $this->createForm($this->createEntityType(), $entity);
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On enregistre la lieu
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Entitée bien modifiée!');
         
                return $this->redirect($this->generateUrl($this->getRoutes()["index"]));
            }
        }

        $params = array(
            'form' => $form->createView(),
            'entity' => $entity
        );
     
        return $this->render($this->getViewPaths()['modifier'], $params);
    }

    protected function baseSupprimer($entity) {
        $form = $this->createFormBuilder()->getForm();
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On supprime l'objet
                $em = $this->getDoctrine()->getManager();
                $em->remove($entity);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Entitée bien supprimée!');
         
                // Puis on redirige vers l'accueil
                return $this->redirect($this->generateUrl($this->getRoutes()["index"]));
            }
        }

        $params = array(
            'entity' => $entity,
            'form' => $form->createView()
        );
     
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
        return $this->render($this->getViewPaths()['supprimer'], $params);
    }
}