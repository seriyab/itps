<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Brand controller.
 *
 */
class BrandController extends Controller
{
    /**
     * Lists all brand entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $brands = $em->getRepository('MaterialsBundle:Brand')->findAll();

        return $this->render('brand/index.html.twig', array(
            'brands' => $brands,
        ));
    }

    /**
     * Creates a new brand entity.
     *
     */
    public function newAction(Request $request)
    {
        $brand = new Brand();
        $form = $this->createForm('MaterialsBundle\Form\BrandType', $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brand);
            $em->flush();

            return $this->redirectToRoute('brand_show', array('id' => $brand->getId()));
        }

        return $this->render('brand/new.html.twig', array(
            'brand' => $brand,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a brand entity.
     *
     */
    public function showAction(Brand $brand)
    {
        $deleteForm = $this->createDeleteForm($brand);

        return $this->render('brand/show.html.twig', array(
            'brand' => $brand,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing brand entity.
     *
     */
    public function editAction(Request $request, Brand $brand)
    {
        $deleteForm = $this->createDeleteForm($brand);
        $editForm = $this->createForm('MaterialsBundle\Form\BrandType', $brand);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brand_edit', array('id' => $brand->getId()));
        }

        return $this->render('brand/edit.html.twig', array(
            'brand' => $brand,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a brand entity.
     *
     */
    public function deleteAction(Request $request, Brand $brand)
    {
        $form = $this->createDeleteForm($brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brand);
            $em->flush();
        }

        return $this->redirectToRoute('brand_index');
    }

    /**
     * Creates a form to delete a brand entity.
     *
     * @param Brand $brand The brand entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Brand $brand)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brand_delete', array('id' => $brand->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
