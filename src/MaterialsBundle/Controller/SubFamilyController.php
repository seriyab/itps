<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\SubFamily;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Subfamily controller.
 *
 */
class SubFamilyController extends Controller
{
    /**
     * Lists all subFamily entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subFamilies = $em->getRepository('MaterialsBundle:SubFamily')->findAll();

        return $this->render('subfamily/index.html.twig', array(
            'subFamilies' => $subFamilies,
        ));
    }

    /**
     * Creates a new subFamily entity.
     *
     */
    public function newAction(Request $request)
    {
        $subFamily = new Subfamily();
        $form = $this->createForm('MaterialsBundle\Form\SubFamilyType', $subFamily);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subFamily);
            $em->flush();

            return $this->redirectToRoute('subfamily_show', array('id' => $subFamily->getId()));
        }

        return $this->render('subfamily/new.html.twig', array(
            'subFamily' => $subFamily,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subFamily entity.
     *
     */
    public function showAction(SubFamily $subFamily)
    {
        $deleteForm = $this->createDeleteForm($subFamily);

        return $this->render('subfamily/show.html.twig', array(
            'subFamily' => $subFamily,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subFamily entity.
     *
     */
    public function editAction(Request $request, SubFamily $subFamily)
    {
        $deleteForm = $this->createDeleteForm($subFamily);
        $editForm = $this->createForm('MaterialsBundle\Form\SubFamilyType', $subFamily);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subfamily_edit', array('id' => $subFamily->getId()));
        }

        return $this->render('subfamily/edit.html.twig', array(
            'subFamily' => $subFamily,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subFamily entity.
     *
     */
    public function deleteAction(Request $request, SubFamily $subFamily)
    {
        $form = $this->createDeleteForm($subFamily);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subFamily);
            $em->flush();
        }

        return $this->redirectToRoute('subfamily_index');
    }

    /**
     * Creates a form to delete a subFamily entity.
     *
     * @param SubFamily $subFamily The subFamily entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubFamily $subFamily)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subfamily_delete', array('id' => $subFamily->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
