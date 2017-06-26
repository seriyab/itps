<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\Clocking;
use StaffBundle\Entity\Personal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Clocking controller.
 *
 */
class ClockingController extends Controller
{
    /**
     * Lists all clocking entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clockings = $em->getRepository('StaffBundle:Clocking')->findByCriteria(array());

        return $this->render('clocking/index.html.twig', array(
            'clockings' => $clockings,
        ));
    }

    /**
     * Creates a new clocking entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personals = $em->getRepository(Personal::class)->findAll();
        foreach ($personals as $personal) {
            $clocking = new Clocking();
            $clocking->setPersonal($personal);
            $clocking->setLocation($personal->getWorkplace());
            $clocking->setStatus('Présent');
            $clockings[] = $clocking;
        }

        $form = $this->createForm('StaffBundle\Form\ClockingPersonalsType', ['clocking' =>  $clockings]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($clockings as $clocking) {
                $clocking->setDate($form->getData()['date']);
                $em->persist($clocking);
                $em->flush();
            }

            return $this->redirectToRoute('clocking_show', array('id' => $clocking->getId()));
        }

        return $this->render('clocking/new.html.twig', array(
            'form' => $form->createView(),
            'personals' => $personals
        ));
    }

    /**
     * Finds and displays a clocking entity.
     *
     */
    public function showAction(Clocking $clocking)
    {
        $deleteForm = $this->createDeleteForm($clocking);

        return $this->render('clocking/show.html.twig', array(
            'clocking' => $clocking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing clocking entity.
     *
     */
    public function editAction(Request $request, Clocking $clocking)
    {
        $deleteForm = $this->createDeleteForm($clocking);
        $editForm = $this->createForm('StaffBundle\Form\ClockingType', $clocking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clocking_edit', array('id' => $clocking->getId()));
        }

        return $this->render('clocking/edit.html.twig', array(
            'clocking' => $clocking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a clocking entity.
     *
     */
    public function deleteAction(Request $request, Clocking $clocking)
    {
        $form = $this->createDeleteForm($clocking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clocking);
            $em->flush();
        }

        return $this->redirectToRoute('clocking_index');
    }

    /**
     * Creates a form to delete a clocking entity.
     *
     * @param Clocking $clocking The clocking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clocking $clocking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clocking_delete', array('id' => $clocking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
