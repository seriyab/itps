<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\LeaveApplication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Leaveapplication controller.
 *
 */
class LeaveApplicationController extends Controller
{
    /**
     * Lists all leaveApplication entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leaveApplications = $em->getRepository('StaffBundle:LeaveApplication')->findAll();

        return $this->render('leaveapplication/index.html.twig', array(
            'leaveApplications' => $leaveApplications,
        ));
    }

    /**
     * Creates a new leaveApplication entity.
     *
     */
    public function newAction(Request $request)
    {
        $leaveApplication = new Leaveapplication();
        $form = $this->createForm('StaffBundle\Form\LeaveApplicationType', $leaveApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leaveApplication);
            $em->flush();

            return $this->redirectToRoute('leaveapplication_show', array('id' => $leaveApplication->getId()));
        }

        return $this->render('leaveapplication/new.html.twig', array(
            'leaveApplication' => $leaveApplication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leaveApplication entity.
     *
     */
    public function showAction(LeaveApplication $leaveApplication)
    {
        $deleteForm = $this->createDeleteForm($leaveApplication);

        return $this->render('leaveapplication/show.html.twig', array(
            'leaveApplication' => $leaveApplication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leaveApplication entity.
     *
     */
    public function editAction(Request $request, LeaveApplication $leaveApplication)
    {
        $deleteForm = $this->createDeleteForm($leaveApplication);
        $editForm = $this->createForm('StaffBundle\Form\LeaveApplicationType', $leaveApplication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('leaveapplication_edit', array('id' => $leaveApplication->getId()));
        }

        return $this->render('leaveapplication/edit.html.twig', array(
            'leaveApplication' => $leaveApplication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leaveApplication entity.
     *
     */
    public function deleteAction(Request $request, LeaveApplication $leaveApplication)
    {
        $form = $this->createDeleteForm($leaveApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leaveApplication);
            $em->flush();
        }

        return $this->redirectToRoute('leaveapplication_index');
    }

    /**
     * Creates a form to delete a leaveApplication entity.
     *
     * @param LeaveApplication $leaveApplication The leaveApplication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeaveApplication $leaveApplication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leaveapplication_delete', array('id' => $leaveApplication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
