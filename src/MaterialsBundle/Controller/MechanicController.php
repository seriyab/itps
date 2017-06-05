<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Mechanic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mechanic controller.
 *
 */
class MechanicController extends Controller
{
    /**
     * Lists all mechanic entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mechanics = $em->getRepository('MaterialsBundle:Mechanic')->findAll();

        return $this->render('mechanic/index.html.twig', array(
            'mechanics' => $mechanics,
        ));
    }

    /**
     * Creates a new mechanic entity.
     *
     */
    public function newAction(Request $request)
    {
        $mechanic = new Mechanic();
        $form = $this->createForm('MaterialsBundle\Form\MechanicType', $mechanic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mechanic);
            $em->flush();

            return $this->redirectToRoute('mechanic_show', array('id' => $mechanic->getId()));
        }

        return $this->render('mechanic/new.html.twig', array(
            'mechanic' => $mechanic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mechanic entity.
     *
     */
    public function showAction(Mechanic $mechanic)
    {
        $deleteForm = $this->createDeleteForm($mechanic);

        return $this->render('mechanic/show.html.twig', array(
            'mechanic' => $mechanic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mechanic entity.
     *
     */
    public function editAction(Request $request, Mechanic $mechanic)
    {
        $deleteForm = $this->createDeleteForm($mechanic);
        $editForm = $this->createForm('MaterialsBundle\Form\MechanicType', $mechanic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mechanic_edit', array('id' => $mechanic->getId()));
        }

        return $this->render('mechanic/edit.html.twig', array(
            'mechanic' => $mechanic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mechanic entity.
     *
     */
    public function deleteAction(Request $request, Mechanic $mechanic)
    {
        $form = $this->createDeleteForm($mechanic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mechanic);
            $em->flush();
        }

        return $this->redirectToRoute('mechanic_index');
    }

    /**
     * Creates a form to delete a mechanic entity.
     *
     * @param Mechanic $mechanic The mechanic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mechanic $mechanic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mechanic_delete', array('id' => $mechanic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
