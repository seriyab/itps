<?php

namespace StaffBundle\Controller;

use StaffBundle\Entity\Personal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Personal controller.
 *
 */
class PersonalController extends Controller
{
    /**
     * Lists all personal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personals = $em->getRepository('StaffBundle:Personal')->findAll();

        return $this->render('personal/index.html.twig', array(
            'personals' => $personals,
        ));
    }

    /**
     * Creates a new personal entity.
     *
     */
    public function newAction(Request $request)
    {
        $personal = new Personal();
        $form = $this->createForm('StaffBundle\Form\PersonalType', $personal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personal);
            $em->flush();

            return $this->redirectToRoute('personal_show', array('id' => $personal->getId()));
        }

        return $this->render('personal/new.html.twig', array(
            'personal' => $personal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personal entity.
     *
     */
    public function showAction(Personal $personal)
    {
        $deleteForm = $this->createDeleteForm($personal);

        return $this->render('personal/show.html.twig', array(
            'personal' => $personal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personal entity.
     *
     */
    public function editAction(Request $request, Personal $personal)
    {
        $deleteForm = $this->createDeleteForm($personal);
        $editForm = $this->createForm('StaffBundle\Form\PersonalType', $personal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personal_edit', array('id' => $personal->getId()));
        }

        return $this->render('personal/edit.html.twig', array(
            'personal' => $personal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a personal entity.
     *
     */
    public function deleteAction(Request $request, Personal $personal)
    {
        $form = $this->createDeleteForm($personal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personal);
            $em->flush();
        }

        return $this->redirectToRoute('personal_index');
    }

    /**
     * Creates a form to delete a personal entity.
     *
     * @param Personal $personal The personal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personal $personal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personal_delete', array('id' => $personal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function reportAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $personals = $em->getRepository(Personal::class)->findAll();
        $permanent = $em->getRepository(Personal::class)->findBy(array('isTemporary' => false));
        $temporary = $em->getRepository(Personal::class)->findBy(array('isTemporary' => true));
        $functions = $em->getRepository(Personal::class)->countByFunction();


        return $this->render('personal/report.html.twig', array(
            'personals' => $personals,
            'permanent' => $permanent,
            'temporary' => $temporary,
            'functions' => $functions,
            'total'     => count($personals),
            'functionReport' => $this->getFunctionsReport($functions, count($personals))
        ));
    }

    private function getFunctionsReport($functions, $total)
    {
        $result = array();
        $backgroundColor = [
        "#BDC3C7",
        "#9B59B6",
        "#E74C3C",
        "#26B99A",
        "#3498DB"
        ];

        $hoverBackgroundColor = [
        "#CFD4D8",
        "#B370CF",
        "#E95E4F",
        "#36CAAB",
        "#49A9EA"
        ];

        foreach ($functions as $key => $function)
        {
            $result['data'][] = round($function['total'] * $total) / 100;
            $result['labels'][] = $function['name'];
            $result['backgroundColor'][] = $backgroundColor[$key];
            $result['hoverBackgroundColor'][] = $hoverBackgroundColor[$key];
        }

        return $result;
    }
}
