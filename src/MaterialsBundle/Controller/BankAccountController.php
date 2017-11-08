<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\BankAccount;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bankaccount controller.
 *
 */
class BankAccountController extends Controller
{
    /**
     * Lists all bankAccount entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bankAccounts = $em->getRepository('MaterialsBundle:BankAccount')->findAll();

        return $this->render('bankaccount/index.html.twig', array(
            'bankAccounts' => $bankAccounts,
        ));
    }

    /**
     * Creates a new bankAccount entity.
     *
     */
    public function newAction(Request $request)
    {
        $bankAccount = new Bankaccount();
        $form = $this->createForm('MaterialsBundle\Form\BankAccountType', $bankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bankAccount);
            $em->flush();

            return $this->redirectToRoute('bankaccount_show', array('id' => $bankAccount->getId()));
        }

        return $this->render('bankaccount/new.html.twig', array(
            'bankAccount' => $bankAccount,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bankAccount entity.
     *
     */
    public function showAction(BankAccount $bankAccount)
    {
        $deleteForm = $this->createDeleteForm($bankAccount);

        return $this->render('bankaccount/show.html.twig', array(
            'bankAccount' => $bankAccount,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bankAccount entity.
     *
     */
    public function editAction(Request $request, BankAccount $bankAccount)
    {
        $deleteForm = $this->createDeleteForm($bankAccount);
        $editForm = $this->createForm('MaterialsBundle\Form\BankAccountType', $bankAccount);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('info', 'Les modifications ont été enregistrées!');
            
            return $this->redirectToRoute('bankaccount_edit', array('id' => $bankAccount->getId()));
        }

        return $this->render('bankaccount/edit.html.twig', array(
            'bankAccount' => $bankAccount,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bankAccount entity.
     *
     */
    public function deleteAction(Request $request, BankAccount $bankAccount)
    {
        $form = $this->createDeleteForm($bankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bankAccount);
            $em->flush();
        }

        return $this->redirectToRoute('bankaccount_index');
    }

    /**
     * Creates a form to delete a bankAccount entity.
     *
     * @param BankAccount $bankAccount The bankAccount entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BankAccount $bankAccount)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bankaccount_delete', array('id' => $bankAccount->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
