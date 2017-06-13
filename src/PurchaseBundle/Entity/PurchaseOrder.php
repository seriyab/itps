<?php

namespace PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseOrder
 *
 * @ORM\Table(name="purchase_order")
 * @ORM\Entity(repositoryClass="PurchaseBundle\Repository\PurchaseOrderRepository")
 */
class PurchaseOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=20, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="Buyer", type="string", length=255)
     */
    private $buyer;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier", type="string", length=255)
     */
    private $supplier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deliverydate", type="datetime")
     */
    private $deliverydate;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="OrderLine", mappedBy="purchaseOrder")
     */
    private $orderLine;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return PurchaseOrder
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set buyer
     *
     * @param string $buyer
     *
     * @return PurchaseOrder
     */
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return string
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set supplier
     *
     * @param string $supplier
     *
     * @return PurchaseOrder
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return string
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set deliverydate
     *
     * @param \DateTime $deliverydate
     *
     * @return PurchaseOrder
     */
    public function setDeliverydate($deliverydate)
    {
        $this->deliverydate = $deliverydate;

        return $this;
    }

    /**
     * Get deliverydate
     *
     * @return \DateTime
     */
    public function getDeliverydate()
    {
        return $this->deliverydate;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return PurchaseOrder
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return PurchaseOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getOrderLine()
    {
        return $this->orderLine;
    }

    /**
     * @param string $orderLine
     *
     * @return PurchaseOrder
     */
    public function setOrderLine($orderLine)
    {
        $this->orderLine = $orderLine;

        return $this;
    }
}

