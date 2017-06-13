<?php

namespace PurchaseBundle\Controller;

use PurchaseBundle\Entity\PartnerCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Partnercategory controller.
 *
 */
class PartnerCategoryController extends Controller
{
    /**
     * Lists all partnerCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partnerCategories = $em->getRepository('PurchaseBundle:PartnerCategory')->findAll();

        return $this->render('partnercategory/index.html.twig', array(
            'partnerCategories' => $partnerCategories,
        ));
    }

    /**
     * Creates a new partnerCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $partnerCategory = new Partnercategory();
        $form = $this->createForm('PurchaseBundle\Form\PartnerCategoryType', $partnerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partnerCategory);
            $em->flush();

            return $this->redirectToRoute('partnercategory_show', array('id' => $partnerCategory->getId()));
        }

        return $this->render('partnercategory/new.html.twig', array(
            'partnerCategory' => $partnerCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partnerCategory entity.
     *
     */
    public function showAction(PartnerCategory $partnerCategory)
    {
        $deleteForm = $this->createDeleteForm($partnerCategory);

        return $this->render('partnercategory/show.html.twig', array(
            'partnerCategory' => $partnerCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partnerCategory entity.
     *
     */
    public function editAction(Request $request, PartnerCategory $partnerCategory)
    {
        $deleteForm = $this->createDeleteForm($partnerCategory);
        $editForm = $this->createForm('PurchaseBundle\Form\PartnerCategoryType', $partnerCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partnercategory_edit', array('id' => $partnerCategory->getId()));
        }

        return $this->render('partnercategory/edit.html.twig', array(
            'partnerCategory' => $partnerCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partnerCategory entity.
     *
     */
    public function deleteAction(Request $request, PartnerCategory $partnerCategory)
    {
        $form = $this->createDeleteForm($partnerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partnerCategory);
            $em->flush();
        }

        return $this->redirectToRoute('partnercategory_index');
    }

    /**
     * Creates a form to delete a partnerCategory entity.
     *
     * @param PartnerCategory $partnerCategory The partnerCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PartnerCategory $partnerCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partnercategory_delete', array('id' => $partnerCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
