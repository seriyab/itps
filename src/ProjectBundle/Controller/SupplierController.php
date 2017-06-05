<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Supplier controller.
 *
 */
class SupplierController extends Controller
{
    /**
     * Lists all supplier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $suppliers = $em->getRepository('ProjectBundle:Supplier')->findAll();

        return $this->render('supplier/index.html.twig', array(
            'suppliers' => $suppliers,
        ));
    }

    /**
     * Finds and displays a supplier entity.
     *
     */
    public function showAction(Supplier $supplier)
    {

        return $this->render('supplier/show.html.twig', array(
            'supplier' => $supplier,
        ));
    }
}
