<?php

namespace PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectBundle\Entity\Project;

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
     * @ORM\ManyToOne(targetEntity="StaffBundle\Entity\Personal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $buyer;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumn(nullable=false)
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
     * @ORM\Column(name="warehouse", type="string", length=255)
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
     * @ORM\Column(name="currence", type="string", length=10)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="OrderLine", mappedBy="purchaseOrder", cascade={"persist","remove"})
     */
    private $orderLines;

    /**
     * @var Project
     *
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Project")
     */
    private $project;

    /**
     * @var string
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PurchaseOrder
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    public function addOrderLine(OrderLine $orderLine)
    {
        $orderLine->setPurchaseOrder($this);
        $this->orderLines[] = $orderLine;

        return $this;
    }

    public function removeOrderLine(OrderLine $orderLine)
    {
        $this->orderLines->removeElement($orderLine);
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     *
     * @return PurchaseOrder
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     *
     * @return PurchaseOrder
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     *
     * @return PurchaseOrder
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString()
    {
        return $this->getReference();
    }

    /**
     * @return int
     */
    public function getTotalTtc()
    {
        $total = 0;
        if (!empty($this->getOrderLines())) {
            foreach ($this->orderLines as $orderLine) {
                if ($orderLine->getTotalPrice() > 0)
                {
                    $total += $orderLine->getTotalPrice();
                }
            }
        }

        return $total;
    }
}

