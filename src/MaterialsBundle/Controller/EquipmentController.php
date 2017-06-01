<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Equipment controller.
 *
 */
class EquipmentController extends Controller
{
    /**
     * Lists all equipment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipments = $em->getRepository('MaterialsBundle:Equipment')->findAll();

        return $this->render('equipment/index.html.twig', array(
            'equipments' => $equipments,
        ));
    }

    /**
     * Creates a new equipment entity.
     *
     */
    public function newAction(Request $request)
    {
        $equipment = new Equipment();
        $form = $this->createForm('MaterialsBundle\Form\EquipmentType', $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipment);
            $em->flush();

            return $this->redirectToRoute('equipment_show', array('id' => $equipment->getId()));
        }

        return $this->render('equipment/new.html.twig', array(
            'equipment' => $equipment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipment entity.
     *
     */
    public function showAction(Equipment $equipment)
    {
        $deleteForm = $this->createDeleteForm($equipment);

        return $this->render('equipment/show.html.twig', array(
            'equipment' => $equipment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing equipment entity.
     *
     */
    public function editAction(Request $request, Equipment $equipment)
    {
        $deleteForm = $this->createDeleteForm($equipment);
        $editForm = $this->createForm('MaterialsBundle\Form\EquipmentType', $equipment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipment_edit', array('id' => $equipment->getId()));
        }

        return $this->render('equipment/edit.html.twig', array(
            'equipment' => $equipment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a equipment entity.
     *
     */
    public function deleteAction(Request $request, Equipment $equipment)
    {
        $form = $this->createDeleteForm($equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipment);
            $em->flush();
        }

        return $this->redirectToRoute('equipment_index');
    }

    /**
     * Creates a form to delete a equipment entity.
     *
     * @param Equipment $equipment The equipment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipment $equipment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipment_delete', array('id' => $equipment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
