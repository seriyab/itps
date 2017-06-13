<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\EmploymentContract;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Employmentcontract controller.
 *
 */
class EmploymentContractController extends Controller
{
    /**
     * Lists all employmentContract entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employmentContracts = $em->getRepository('StaffBundle:EmploymentContract')->findAll();

        return $this->render('employmentcontract/index.html.twig', array(
            'employmentContracts' => $employmentContracts,
        ));
    }

    /**
     * Creates a new employmentContract entity.
     *
     */
    public function newAction(Request $request)
    {
        $employmentContract = new Employmentcontract();
        $form = $this->createForm('StaffBundle\Form\EmploymentContractType', $employmentContract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employmentContract);
            $em->flush();

            return $this->redirectToRoute('employmentcontract_show', array('id' => $employmentContract->getId()));
        }

        return $this->render('employmentcontract/new.html.twig', array(
            'employmentContract' => $employmentContract,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employmentContract entity.
     *
     */
    public function showAction(EmploymentContract $employmentContract)
    {
        $deleteForm = $this->createDeleteForm($employmentContract);

        return $this->render('employmentcontract/show.html.twig', array(
            'employmentContract' => $employmentContract,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employmentContract entity.
     *
     */
    public function editAction(Request $request, EmploymentContract $employmentContract)
    {
        $deleteForm = $this->createDeleteForm($employmentContract);
        $editForm = $this->createForm('StaffBundle\Form\EmploymentContractType', $employmentContract);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employmentcontract_edit', array('id' => $employmentContract->getId()));
        }

        return $this->render('employmentcontract/edit.html.twig', array(
            'employmentContract' => $employmentContract,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employmentContract entity.
     *
     */
    public function deleteAction(Request $request, EmploymentContract $employmentContract)
    {
        $form = $this->createDeleteForm($employmentContract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employmentContract);
            $em->flush();
        }

        return $this->redirectToRoute('employmentcontract_index');
    }

    /**
     * Creates a form to delete a employmentContract entity.
     *
     * @param EmploymentContract $employmentContract The employmentContract entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmploymentContract $employmentContract)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employmentcontract_delete', array('id' => $employmentContract->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
