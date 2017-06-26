<?php

namespace ProjectBundle\Controller;

use PurchaseBundle\Entity\OrderLine;
use PurchaseBundle\Entity\Product;
use ProjectBundle\Entity\Project;
use PurchaseBundle\Entity\PurchaseOrder;
use PurchaseBundle\Form\ProductType;
use PurchaseBundle\Form\PurchaseOrderType;
use StaffBundle\Entity\Clocking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Project controller.
 *
 */
class ProjectController extends Controller
{
    /**
     * Lists all project entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects = $em->getRepository('ProjectBundle:Project')->findAll();

        return $this->render('project/index.html.twig', array(
            'projects' => $projects,
        ));
    }

    /**
     * Creates a new project entity.
     *
     */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm('ProjectBundle\Form\ProjectType', $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('project_show', array('id' => $project->getId()));
        }

        return $this->render('project/new.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a project entity.
     *
     */
    public function showAction(Project $project)
    {
        $deleteForm = $this->createDeleteForm($project);
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->setProject($project);
        $purchaseOrderForm = $this->createForm(PurchaseOrderType::class, $purchaseOrder);

        $em = $this->getDoctrine()->getManager();
        $productsQuantity = $em->getRepository(PurchaseOrder::class)->getQuantityByProduct($project->getId());

        $personals = $em->getRepository(Clocking::class)->findBy(array('constructionSite' => $project->getId()),
            array('date' => 'DESC'));

        $projectOrders = $em->getRepository('PurchaseBundle:PurchaseOrder')->findBy(
            array('project' => $project->getId()), array('id' => 'DESC'), 10
        );

        $personalsCost = $em->getRepository(Clocking::class)->getCostByProject($project->getId());

        return $this->render('project/show.html.twig', array(
            'project' => $project,
            'delete_form' => $deleteForm->createView(),
            'orders' => $projectOrders,
            'purchaseOrderForm' => $purchaseOrderForm->createView(),
            'personals' => $personals,
            'productsQuntity' => $productsQuantity,
            'personalsCosts'  => $personalsCost
        ));
    }

    /**
     * Displays a form to edit an existing project entity.
     *
     */
    public function editAction(Request $request, Project $project)
    {
        $deleteForm = $this->createDeleteForm($project);
        $editForm = $this->createForm('PurchaseBundle\Form\ProjectType', $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_edit', array('id' => $project->getId()));
        }

        return $this->render('project/edit.html.twig', array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a project entity.
     *
     */
    public function deleteAction(Request $request, Project $project)
    {
        $form = $this->createDeleteForm($project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush();
        }

        return $this->redirectToRoute('project_index');
    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param Project $project The project entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Project $project)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
