<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Family;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Family controller.
 *
 */
class FamilyController extends Controller
{
    /**
     * Lists all family entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $families = $em->getRepository('MaterialsBundle:Family')->findAll();

        return $this->render('family/index.html.twig', array(
            'families' => $families,
        ));
    }

    /**
     * Creates a new family entity.
     *
     */
    public function newAction(Request $request)
    {
        $family = new Family();
        $form = $this->createForm('MaterialsBundle\Form\FamilyType', $family);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($family);
            $em->flush();

            return $this->redirectToRoute('family_show', array('id' => $family->getId()));
        }

        return $this->render('family/new.html.twig', array(
            'family' => $family,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a family entity.
     *
     */
    public function showAction(Family $family)
    {
        $deleteForm = $this->createDeleteForm($family);

        return $this->render('family/show.html.twig', array(
            'family' => $family,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing family entity.
     *
     */
    public function editAction(Request $request, Family $family)
    {
        $deleteForm = $this->createDeleteForm($family);
        $editForm = $this->createForm('MaterialsBundle\Form\FamilyType', $family);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('family_edit', array('id' => $family->getId()));
        }

        return $this->render('family/edit.html.twig', array(
            'family' => $family,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a family entity.
     *
     */
    public function deleteAction(Request $request, Family $family)
    {
        $form = $this->createDeleteForm($family);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($family);
            $em->flush();
        }

        return $this->redirectToRoute('family_index');
    }

    /**
     * Creates a form to delete a family entity.
     *
     * @param Family $family The family entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Family $family)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('family_delete', array('id' => $family->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
