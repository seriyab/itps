<?php

namespace PurchaseBundle\Repository;

/**
 * PurchaseOrderRepository
 */
class PurchaseOrderRepository extends \Doctrine\ORM\EntityRepository
{
    public function getQuantityByProduct($id)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->select('pro.name, pro.unitOfMeasurement, pro.id, SUM(o.quantity) as quantity')
            ->leftJoin('p.orderLines', 'o')
            ->leftJoin('o.product', 'pro')
            ->where('p.project = :id')
            ->groupBy('pro.id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
}
