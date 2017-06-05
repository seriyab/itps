<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Leasing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Leasing controller.
 *
 */
class LeasingController extends Controller
{
    /**
     * Lists all leasing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leasings = $em->getRepository('MaterialsBundle:Leasing')->findAll();

        return $this->render('leasing/index.html.twig', array(
            'leasings' => $leasings,
        ));
    }

    /**
     * Creates a new leasing entity.
     *
     */
    public function newAction(Request $request)
    {
        $leasing = new Leasing();
        $form = $this->createForm('MaterialsBundle\Form\LeasingType', $leasing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leasing);
            $em->flush();

            return $this->redirectToRoute('leasing_show', array('id' => $leasing->getId()));
        }

        return $this->render('leasing/new.html.twig', array(
            'leasing' => $leasing,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leasing entity.
     *
     */
    public function showAction(Leasing $leasing)
    {
        $deleteForm = $this->createDeleteForm($leasing);

        return $this->render('leasing/show.html.twig', array(
            'leasing' => $leasing,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leasing entity.
     *
     */
    public function editAction(Request $request, Leasing $leasing)
    {
        $deleteForm = $this->createDeleteForm($leasing);
        $editForm = $this->createForm('MaterialsBundle\Form\LeasingType', $leasing);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('leasing_edit', array('id' => $leasing->getId()));
        }

        return $this->render('leasing/edit.html.twig', array(
            'leasing' => $leasing,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leasing entity.
     *
     */
    public function deleteAction(Request $request, Leasing $leasing)
    {
        $form = $this->createDeleteForm($leasing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leasing);
            $em->flush();
        }

        return $this->redirectToRoute('leasing_index');
    }

    /**
     * Creates a form to delete a leasing entity.
     *
     * @param Leasing $leasing The leasing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Leasing $leasing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leasing_delete', array('id' => $leasing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
