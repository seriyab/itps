<?php

namespace PurchaseBundle\Controller;

use PurchaseBundle\Entity\PurchaseOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Purchaseorder controller.
 *
 */
class PurchaseOrderController extends Controller
{
    /**
     * Lists all purchaseOrder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $purchaseOrders = $em->getRepository('PurchaseBundle:PurchaseOrder')->findAll();

        return $this->render('purchaseorder/index.html.twig', array(
            'purchaseOrders' => $purchaseOrders,
        ));
    }

    /**
     * Creates a new purchaseOrder entity.
     *
     */
    public function newAction(Request $request)
    {
        $purchaseOrder = new Purchaseorder();
        $form = $this->createForm('PurchaseBundle\Form\PurchaseOrderType', $purchaseOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchaseOrder);
            $em->flush();

            return $this->redirectToRoute('purchaseorder_show', array('id' => $purchaseOrder->getId()));
        }

        return $this->render('purchaseorder/new.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a purchaseOrder entity.
     *
     */
    public function showAction(PurchaseOrder $purchaseOrder)
    {
        $deleteForm = $this->createDeleteForm($purchaseOrder);

        return $this->render('purchaseorder/show.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing purchaseOrder entity.
     *
     */
    public function editAction(Request $request, PurchaseOrder $purchaseOrder)
    {
        $deleteForm = $this->createDeleteForm($purchaseOrder);
        $editForm = $this->createForm('PurchaseBundle\Form\PurchaseOrderType', $purchaseOrder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('purchaseorder_edit', array('id' => $purchaseOrder->getId()));
        }

        return $this->render('purchaseorder/edit.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a purchaseOrder entity.
     *
     */
    public function deleteAction(Request $request, PurchaseOrder $purchaseOrder)
    {
        $form = $this->createDeleteForm($purchaseOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($purchaseOrder);
            $em->flush();
        }

        return $this->redirectToRoute('purchaseorder_index');
    }

    /**
     * Creates a form to delete a purchaseOrder entity.
     *
     * @param PurchaseOrder $purchaseOrder The purchaseOrder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PurchaseOrder $purchaseOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('purchaseorder_delete', array('id' => $purchaseOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
