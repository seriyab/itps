<?php

namespace MaterialsBundle\Controller;

use MaterialsBundle\Entity\InsuranceCompany;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Insurancecompany controller.
 *
 */
class InsuranceCompanyController extends Controller
{
    /**
     * Lists all insuranceCompany entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $insuranceCompanies = $em->getRepository('MaterialsBundle:InsuranceCompany')->findAll();

        return $this->render('insurancecompany/index.html.twig', array(
            'insuranceCompanies' => $insuranceCompanies,
        ));
    }

    /**
     * Creates a new insuranceCompany entity.
     *
     */
    public function newAction(Request $request)
    {
        $insuranceCompany = new Insurancecompany();
        $form = $this->createForm('MaterialsBundle\Form\InsuranceCompanyType', $insuranceCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($insuranceCompany);
            $em->flush();

            return $this->redirectToRoute('insurancecompany_show', array('id' => $insuranceCompany->getId()));
        }

        return $this->render('insurancecompany/new.html.twig', array(
            'insuranceCompany' => $insuranceCompany,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a insuranceCompany entity.
     *
     */
    public function showAction(InsuranceCompany $insuranceCompany)
    {
        $deleteForm = $this->createDeleteForm($insuranceCompany);

        return $this->render('insurancecompany/show.html.twig', array(
            'insuranceCompany' => $insuranceCompany,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing insuranceCompany entity.
     *
     */
    public function editAction(Request $request, InsuranceCompany $insuranceCompany)
    {
        $deleteForm = $this->createDeleteForm($insuranceCompany);
        $editForm = $this->createForm('MaterialsBundle\Form\InsuranceCompanyType', $insuranceCompany);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('insurancecompany_edit', array('id' => $insuranceCompany->getId()));
        }

        return $this->render('insurancecompany/edit.html.twig', array(
            'insuranceCompany' => $insuranceCompany,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a insuranceCompany entity.
     *
     */
    public function deleteAction(Request $request, InsuranceCompany $insuranceCompany)
    {
        $form = $this->createDeleteForm($insuranceCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($insuranceCompany);
            $em->flush();
        }

        return $this->redirectToRoute('insurancecompany_index');
    }

    /**
     * Creates a form to delete a insuranceCompany entity.
     *
     * @param InsuranceCompany $insuranceCompany The insuranceCompany entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InsuranceCompany $insuranceCompany)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('insurancecompany_delete', array('id' => $insuranceCompany->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
