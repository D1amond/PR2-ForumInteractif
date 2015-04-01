<?php

namespace PR2\PokemonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PR2\PokemonBundle\Entity\BasePokemon;
use PR2\PokemonBundle\Form\BasePokemonType;

/**
 * BasePokemon controller.
 *
 */
class BasePokemonController extends Controller
{
    /**
     * Creates a new BasePokemon entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BasePokemon();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pr2pokemon_pokedex', array('id' => $entity->getId())));
        }

        return $this->render('PR2PokemonBundle:BasePokemon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a BasePokemon entity.
     *
     * @param BasePokemon $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BasePokemon $entity)
    {
        $form = $this->createForm(new BasePokemonType(), $entity, array(
            'action' => $this->generateUrl('pr2pokemon_basepokemon_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BasePokemon entity.
     *
     */
    public function newAction()
    {
        $entity = new BasePokemon();
        $form   = $this->createCreateForm($entity);

        return $this->render('PR2PokemonBundle:BasePokemon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BasePokemon entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PR2PokemonBundle:BasePokemon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BasePokemon entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PR2PokemonBundle:BasePokemon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BasePokemon entity.
    *
    * @param BasePokemon $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BasePokemon $entity)
    {
        $form = $this->createForm(new BasePokemonType(), $entity, array(
            'action' => $this->generateUrl('pr2pokemon_basepokemon_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BasePokemon entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PR2PokemonBundle:BasePokemon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BasePokemon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pr2pokemon_basepokemon_edit', array('id' => $id)));
        }

        return $this->render('PR2PokemonBundle:BasePokemon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BasePokemon entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PR2PokemonBundle:BasePokemon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BasePokemon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pr2pokemon_pokedex'));
    }

    /**
     * Creates a form to delete a BasePokemon entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pr2pokemon_basepokemon_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
