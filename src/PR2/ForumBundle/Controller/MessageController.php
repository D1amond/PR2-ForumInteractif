<?php

namespace PR2\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PR2\ForumBundle\Entity\Sujet;
use PR2\ForumBundle\Entity\Message;
use PR2\ForumBundle\Form\MessageType;
use PR2\ForumBundle\Form\MessageReplyType;

class MessageController extends Controller
{
    public function repondreAction(Sujet $sujet)
    {
        if ($sujet == null && !$sujet->getEstActif()) {
            throw new $this->createNotFoundException('Sujet invalide ou fermé!');
        }
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $auteur = $this->get('security.context')->getToken()->getUser()->getDresseurActif();
        } else {
            throw $this->createNotFoundException('Vous devez être connecté pour créer un nouveau sujet!');
        }
        if ($auteur == null) {
            throw $this->createNotFoundException('Vous n\'avez pas de dresseur actif!');
        }
        
        $message = new message();
        
        $message->setAuteur($auteur);
        $message->setSujet($sujet);
        $sujet->addMessage($message);
        
        $form = $this->createForm(new MessageType(), $message);
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            
            if ($form->isValid()) {
                if ($this->get('security.context')->isGranted('ROLE_USER')) {

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($message);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('info', 'Message bien ajouté!');

                    return $this->redirect($this->generateUrl('pr2forum_voirSujet', ['id' => $sujet->getId()]));
                } else {
                    throw $this->createNotFoundException('Vous devez être connecté pour créer un nouveau sujet!');
                };
            }
        }
        
        return $this->render('PR2ForumBundle:Message:repondre.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}