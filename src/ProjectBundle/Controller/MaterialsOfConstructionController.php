<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\MaterialsOfConstruction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Materialsofconstruction controller.
 *
 */
class MaterialsOfConstructionController extends Controller
{
    /**
     * Lists all materialsOfConstruction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $materialsOfConstructions = $em->getRepository('ProjectBundle:MaterialsOfConstruction')->findAll();

        return $this->render('materialsofconstruction/index.html.twig', array(
            'materialsOfConstructions' => $materialsOfConstructions,
        ));
    }

    /**
     * Creates a new materialsOfConstruction entity.
     *
     */
    public function newAction(Request $request)
    {
        $materialsOfConstruction = new Materialsofconstruction();
        $form = $this->createForm('ProjectBundle\Form\MaterialsOfConstructionType', $materialsOfConstruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($materialsOfConstruction);
            $em->flush();

            return $this->redirectToRoute('materialsofconstruction_show', array('id' => $materialsOfConstruction->getId()));
        }

        return $this->render('materialsofconstruction/new.html.twig', array(
            'materialsOfConstruction' => $materialsOfConstruction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a materialsOfConstruction entity.
     *
     */
    public function showAction(MaterialsOfConstruction $materialsOfConstruction)
    {
        $deleteForm = $this->createDeleteForm($materialsOfConstruction);

        return $this->render('materialsofconstruction/show.html.twig', array(
            'materialsOfConstruction' => $materialsOfConstruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing materialsOfConstruction entity.
     *
     */
    public function editAction(Request $request, MaterialsOfConstruction $materialsOfConstruction)
    {
        $deleteForm = $this->createDeleteForm($materialsOfConstruction);
        $editForm = $this->createForm('ProjectBundle\Form\MaterialsOfConstructionType', $materialsOfConstruction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materialsofconstruction_edit', array('id' => $materialsOfConstruction->getId()));
        }

        return $this->render('materialsofconstruction/edit.html.twig', array(
            'materialsOfConstruction' => $materialsOfConstruction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a materialsOfConstruction entity.
     *
     */
    public function deleteAction(Request $request, MaterialsOfConstruction $materialsOfConstruction)
    {
        $form = $this->createDeleteForm($materialsOfConstruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($materialsOfConstruction);
            $em->flush();
        }

        return $this->redirectToRoute('materialsofconstruction_index');
    }

    /**
     * Creates a form to delete a materialsOfConstruction entity.
     *
     * @param MaterialsOfConstruction $materialsOfConstruction The materialsOfConstruction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MaterialsOfConstruction $materialsOfConstruction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materialsofconstruction_delete', array('id' => $materialsOfConstruction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
