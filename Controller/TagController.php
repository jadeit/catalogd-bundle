<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JadeIT\CatalogDBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JadeIT\CatalogDBundle\Entity\Tag;
use JadeIT\CatalogDBundle\Event\TagEvent;
use JadeIT\CatalogDBundle\Form\TagType;

/**
 * Tag controller.
 *
 */
class TagController extends Controller
{
    /**
     * Lists all Tag entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JadeITCatalogDBundle:Tag')->findAll();

        return $this->render('JadeITCatalogDBundle:Tag:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Tag entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tag();
        $form = $this->createForm(new TagType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            // Fire the New Tag Event
            $event = new TagEvent($entity);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch('jadeit.catalogd.events.tag.new', $event);

            // Delay the flush so that the event can deal with the new entity first
            $em->flush();

            return $this->redirect($this->generateUrl('tag_show', array('id' => $entity->getId())));
        }

        return $this->render('JadeITCatalogDBundle:Tag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tag entity.
     *
     */
    public function newAction()
    {
        $entity = new Tag();
        $form   = $this->createForm(new TagType(), $entity);

        return $this->render('JadeITCatalogDBundle:Tag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tag entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JadeITCatalogDBundle:Tag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JadeITCatalogDBundle:Tag:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tag entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JadeITCatalogDBundle:Tag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tag entity.');
        }

        $editForm = $this->createForm(new TagType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JadeITCatalogDBundle:Tag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tag entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JadeITCatalogDBundle:Tag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TagType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);

            // Fire the Updated Tag Event
            $event = new TagEvent($entity);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch('jadeit.catalogd.events.tag.update', $event);

            // Delay the flush so that the event can deal with the updated entity first
            $em->flush();

            return $this->redirect($this->generateUrl('tag_edit', array('id' => $id)));
        }

        return $this->render('JadeITCatalogDBundle:Tag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tag entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JadeITCatalogDBundle:Tag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tag entity.');
            }

            $em->remove($entity);

            // Fire the Delete Tag Event
            $event = new TagEvent($entity);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch('jadeit.catalogd.events.tag.delete', $event);

            // Delay the flush so that the event can deal with the deleted entity first
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tag'));
    }

    /**
     * Creates a form to delete a Tag entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
