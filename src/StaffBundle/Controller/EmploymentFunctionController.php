<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\EmploymentFunction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Employmentfunction controller.
 *
 */
class EmploymentFunctionController extends Controller
{
    /**
     * Lists all employmentFunction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employmentFunctions = $em->getRepository('StaffBundle:EmploymentFunction')->findAll();

        return $this->render('employmentfunction/index.html.twig', array(
            'employmentFunctions' => $employmentFunctions,
        ));
    }

    /**
     * Creates a new employmentFunction entity.
     *
     */
    public function newAction(Request $request)
    {
        $employmentFunction = new Employmentfunction();
        $form = $this->createForm('StaffBundle\Form\EmploymentFunctionType', $employmentFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employmentFunction);
            $em->flush();

            return $this->redirectToRoute('employmentfunction_show', array('id' => $employmentFunction->getId()));
        }

        return $this->render('employmentfunction/new.html.twig', array(
            'employmentFunction' => $employmentFunction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employmentFunction entity.
     *
     */
    public function showAction(EmploymentFunction $employmentFunction)
    {
        $deleteForm = $this->createDeleteForm($employmentFunction);

        return $this->render('employmentfunction/show.html.twig', array(
            'employmentFunction' => $employmentFunction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employmentFunction entity.
     *
     */
    public function editAction(Request $request, EmploymentFunction $employmentFunction)
    {
        $deleteForm = $this->createDeleteForm($employmentFunction);
        $editForm = $this->createForm('StaffBundle\Form\EmploymentFunctionType', $employmentFunction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employmentfunction_edit', array('id' => $employmentFunction->getId()));
        }

        return $this->render('employmentfunction/edit.html.twig', array(
            'employmentFunction' => $employmentFunction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employmentFunction entity.
     *
     */
    public function deleteAction(Request $request, EmploymentFunction $employmentFunction)
    {
        $form = $this->createDeleteForm($employmentFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employmentFunction);
            $em->flush();
        }

        return $this->redirectToRoute('employmentfunction_index');
    }

    /**
     * Creates a form to delete a employmentFunction entity.
     *
     * @param EmploymentFunction $employmentFunction The employmentFunction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmploymentFunction $employmentFunction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employmentfunction_delete', array('id' => $employmentFunction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
