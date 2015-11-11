<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use PR2\CoreBundle\Controller\BaseController;
use PR2\ForumBundle\Entity\Lieu;
use PR2\ForumBundle\Form\LieuType;
use PR2\ForumBundle\Form\LieuEditType;

class LieuController extends BaseController
{
    protected function getViewPaths() {
        return array(
            'index' => 'PR2ForumBundle:Lieu:index.html.twig',
            'voir' => 'PR2ForumBundle:Lieu:voir.html.twig',
            'ajouter' => 'PR2ForumBundle:Lieu:ajouter.html.twig',
            'modifier' => 'PR2ForumBundle:Lieu:modifier.html.twig',
            'supprimer' => 'PR2ForumBundle:Lieu:supprimer.html.twig'
        );
    }

    protected function getRoutes() {
        return array(
            'index' => 'pr2lieu_index'
        );
    }

    protected function getRepository() {
        return $this->getDoctrine()
            ->getManager()
            ->getRepository('PR2ForumBundle:Lieu');
    }

    protected function createEntity() {
        return new Lieu();
    }

    protected function createEntityType() {
        return new LieuType();
    }

    protected function createModifierEntityType() {
        return new LieuEditType();
    }

    public function indexAction()
    {
    	return $this->baseIndex();
    }

    public function voirAction($id)
    {
        return $this->baseVoir($id);
    }

    public function ajouterAction()
    {
        return $this->baseAjouter();
    }

    public function modifierAction(Lieu $lieu)
    {
        return $this->baseModifier($lieu);
    }

    public function supprimerAction(Lieu $lieu)
    {
        return $this->baseSupprimer($lieu);
    }
}