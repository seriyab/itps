<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\Workplace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Workplace controller.
 *
 */
class WorkplaceController extends Controller
{
    /**
     * Lists all workplace entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $workplaces = $em->getRepository('StaffBundle:Workplace')->findAll();

        return $this->render('workplace/index.html.twig', array(
            'workplaces' => $workplaces,
        ));
    }

    /**
     * Creates a new workplace entity.
     *
     */
    public function newAction(Request $request)
    {
        $workplace = new Workplace();
        $form = $this->createForm('StaffBundle\Form\WorkplaceType', $workplace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($workplace);
            $em->flush();

            return $this->redirectToRoute('workplace_show', array('id' => $workplace->getId()));
        }

        return $this->render('workplace/new.html.twig', array(
            'workplace' => $workplace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a workplace entity.
     *
     */
    public function showAction(Workplace $workplace)
    {
        $deleteForm = $this->createDeleteForm($workplace);

        return $this->render('workplace/show.html.twig', array(
            'workplace' => $workplace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing workplace entity.
     *
     */
    public function editAction(Request $request, Workplace $workplace)
    {
        $deleteForm = $this->createDeleteForm($workplace);
        $editForm = $this->createForm('StaffBundle\Form\WorkplaceType', $workplace);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('workplace_edit', array('id' => $workplace->getId()));
        }

        return $this->render('workplace/edit.html.twig', array(
            'workplace' => $workplace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a workplace entity.
     *
     */
    public function deleteAction(Request $request, Workplace $workplace)
    {
        $form = $this->createDeleteForm($workplace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($workplace);
            $em->flush();
        }

        return $this->redirectToRoute('workplace_index');
    }

    /**
     * Creates a form to delete a workplace entity.
     *
     * @param Workplace $workplace The workplace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Workplace $workplace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('workplace_delete', array('id' => $workplace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
