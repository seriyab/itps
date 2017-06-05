<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Kiosk;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Kiosk controller.
 *
 */
class KioskController extends Controller
{
    /**
     * Lists all kiosk entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kiosks = $em->getRepository('MaterialsBundle:Kiosk')->findAll();

        return $this->render('kiosk/index.html.twig', array(
            'kiosks' => $kiosks,
        ));
    }

    /**
     * Creates a new kiosk entity.
     *
     */
    public function newAction(Request $request)
    {
        $kiosk = new Kiosk();
        $form = $this->createForm('MaterialsBundle\Form\KioskType', $kiosk);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kiosk);
            $em->flush();

            return $this->redirectToRoute('kiosk_show', array('id' => $kiosk->getId()));
        }

        return $this->render('kiosk/new.html.twig', array(
            'kiosk' => $kiosk,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kiosk entity.
     *
     */
    public function showAction(Kiosk $kiosk)
    {
        $deleteForm = $this->createDeleteForm($kiosk);

        return $this->render('kiosk/show.html.twig', array(
            'kiosk' => $kiosk,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kiosk entity.
     *
     */
    public function editAction(Request $request, Kiosk $kiosk)
    {
        $deleteForm = $this->createDeleteForm($kiosk);
        $editForm = $this->createForm('MaterialsBundle\Form\KioskType', $kiosk);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kiosk_edit', array('id' => $kiosk->getId()));
        }

        return $this->render('kiosk/edit.html.twig', array(
            'kiosk' => $kiosk,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kiosk entity.
     *
     */
    public function deleteAction(Request $request, Kiosk $kiosk)
    {
        $form = $this->createDeleteForm($kiosk);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kiosk);
            $em->flush();
        }

        return $this->redirectToRoute('kiosk_index');
    }

    /**
     * Creates a form to delete a kiosk entity.
     *
     * @param Kiosk $kiosk The kiosk entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kiosk $kiosk)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kiosk_delete', array('id' => $kiosk->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
