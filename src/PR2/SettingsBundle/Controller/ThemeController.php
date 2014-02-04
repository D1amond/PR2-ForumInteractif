<?php

namespace PR2\SettingsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PR2\SettingsBundle\Entity\Theme;
use PR2\SettingsBundle\Form\ThemeType;

/**
 * Theme controller.
 *
 */
class ThemeController extends Controller
{

    /**
     * Lists all Theme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PR2SettingsBundle:Theme')->findAll();

        return $this->render('PR2SettingsBundle:Theme:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function ajouterAction()
    {
        $theme = new Theme();
     
        // On crée le formulaire grâce à l'RegionType
        $form = $this->createForm(new ThemeType(), $theme);
     
        // On récupère la requête
        $request = $this->getRequest();
     
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);
     
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $theme dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($theme);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Theme bien ajouté');
     
                // On redirige vers la page de visualisation de l'theme nouvellement créé
                return $this->render('PR2SettingsBundle:Theme:show.html.twig', array('entity' => $theme));
            }
        }
     
        // À ce stade :
        // - Soit la requête est de type GET, donc e visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
     
        return $this->render('PR2SettingsBundle:Theme:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Theme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PR2SettingsBundle:Theme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Theme entity.');
        }

        return $this->render('PR2SettingsBundle:Theme:show.html.twig', array('entity' => $entity));
    }

    public function modifierAction(Theme $theme)
    {
        // On utiliser le RegionEditType
        $form = $this->createForm(new ThemeType(), $theme);
     
        $request = $this->getRequest();
     
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On enregistre la theme
                $em = $this->getDoctrine()->getManager();
                $em->persist($theme);
                $em->flush();
         
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Theme bien modifié');
         
                return $this->render('PR2SettingsBundle:Theme:show.html.twig', array('entity' => $theme));
            }
        }
     
        return $this->render('PR2SettingsBundle:Theme:edit.html.twig', array(
            'form'    => $form->createView(),
            'entity' => $theme
        ));
    }
    /**
     * Edits an existing Theme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PR2SettingsBundle:Theme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Theme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pr2_settings_theme_edit', array('id' => $id)));
        }

        return $this->render('PR2SettingsBundle:Theme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function supprimerAction(Theme $theme)
    {
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression de theme contre cette faille
        $form = $this->createFormBuilder()->getForm();
     
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
     
            if ($form->isValid()) {
                // On supprime l'theme
                $em = $this->getDoctrine()->getManager();
                $em->remove($theme);
                $em->flush();
     
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Theme bien supprimé');
     
                // Puis on redirige vers l'accueil
                return $this->redirect($this->generateUrl('pr2_settings_theme'));
            }
        }
     
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
        return $this->render('PR2SettingsBundle:Theme:supprimer.html.twig', array(
            'theme' => $theme,
            'form'    => $form->createView()
        ));
    }
}
