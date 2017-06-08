<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\TypeOfConstructionMaterials;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeofconstructionmaterial controller.
 *
 */
class TypeOfConstructionMaterialsController extends Controller
{
    /**
     * Lists all typeOfConstructionMaterial entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeOfConstructionMaterials = $em->getRepository('ProjectBundle:TypeOfConstructionMaterials')->findAll();

        return $this->render('typeofconstructionmaterials/index.html.twig', array(
            'typeOfConstructionMaterials' => $typeOfConstructionMaterials,
        ));
    }

    /**
     * Creates a new typeOfConstructionMaterial entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeOfConstructionMaterial = new TypeOfConstructionMaterials();
        $form = $this->createForm('ProjectBundle\Form\TypeOfConstructionMaterialsType', $typeOfConstructionMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfConstructionMaterial);
            $em->flush();

            return $this->redirectToRoute('typeofconstructionmaterials_show', array('id' => $typeOfConstructionMaterial->getId()));
        }

        return $this->render('typeofconstructionmaterials/new.html.twig', array(
            'typeOfConstructionMaterial' => $typeOfConstructionMaterial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeOfConstructionMaterial entity.
     *
     */
    public function showAction(TypeOfConstructionMaterials $typeOfConstructionMaterial)
    {
        $deleteForm = $this->createDeleteForm($typeOfConstructionMaterial);

        return $this->render('typeofconstructionmaterials/show.html.twig', array(
            'typeOfConstructionMaterial' => $typeOfConstructionMaterial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeOfConstructionMaterial entity.
     *
     */
    public function editAction(Request $request, TypeOfConstructionMaterials $typeOfConstructionMaterial)
    {
        $deleteForm = $this->createDeleteForm($typeOfConstructionMaterial);
        $editForm = $this->createForm('ProjectBundle\Form\TypeOfConstructionMaterialsType', $typeOfConstructionMaterial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeofconstructionmaterials_edit', array('id' => $typeOfConstructionMaterial->getId()));
        }

        return $this->render('typeofconstructionmaterials/edit.html.twig', array(
            'typeOfConstructionMaterial' => $typeOfConstructionMaterial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeOfConstructionMaterial entity.
     *
     */
    public function deleteAction(Request $request, TypeOfConstructionMaterials $typeOfConstructionMaterial)
    {
        $form = $this->createDeleteForm($typeOfConstructionMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeOfConstructionMaterial);
            $em->flush();
        }

        return $this->redirectToRoute('typeofconstructionmaterials_index');
    }

    /**
     * Creates a form to delete a typeOfConstructionMaterial entity.
     *
     * @param TypeOfConstructionMaterials $typeOfConstructionMaterial The typeOfConstructionMaterial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeOfConstructionMaterials $typeOfConstructionMaterial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeofconstructionmaterials_delete', array('id' => $typeOfConstructionMaterial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
