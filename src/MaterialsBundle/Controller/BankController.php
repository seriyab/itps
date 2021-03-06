<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Bank;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bank controller.
 *
 */
class BankController extends Controller
{
    /**
     * Lists all bank entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banks = $em->getRepository('MaterialsBundle:Bank')->findAll();

        return $this->render('bank/index.html.twig', array(
            'banks' => $banks,
        ));
    }

    /**
     * Creates a new bank entity.
     *
     */
    public function newAction(Request $request)
    {
        $bank = new Bank();
        $form = $this->createForm('MaterialsBundle\Form\BankType', $bank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bank);
            $em->flush();

            return $this->redirectToRoute('bank_show', array('id' => $bank->getId()));
        }

        return $this->render('bank/new.html.twig', array(
            'bank' => $bank,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bank entity.
     *
     */
    public function showAction(Bank $bank)
    {
        $deleteForm = $this->createDeleteForm($bank);

        return $this->render('bank/show.html.twig', array(
            'bank' => $bank,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bank entity.
     *
     */
    public function editAction(Request $request, Bank $bank)
    {
        $deleteForm = $this->createDeleteForm($bank);
        $editForm = $this->createForm('MaterialsBundle\Form\BankType', $bank);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('info', 'Les modifications ont été enregistrées!');
            return $this->redirectToRoute('bank_edit', array('id' => $bank->getId()));
        }

        return $this->render('bank/edit.html.twig', array(
            'bank' => $bank,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bank entity.
     *
     */
    public function deleteAction(Request $request, Bank $bank)
    {
        $form = $this->createDeleteForm($bank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bank);
            $em->flush();
        }

        return $this->redirectToRoute('bank_index');
    }

    /**
     * Creates a form to delete a bank entity.
     *
     * @param Bank $bank The bank entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bank $bank)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bank_delete', array('id' => $bank->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
