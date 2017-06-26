<?php

namespace PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderLine
 *
 * @ORM\Table(name="order_line")
 * @ORM\Entity(repositoryClass="PurchaseBundle\Repository\OrderLineRepository")
 */
class OrderLine
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
     * @ORM\ManyToOne(targetEntity="PurchaseOrder", inversedBy="orderLines", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $purchaseOrder;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ProductType")
     * @Orm\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=20, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price", type="float", nullable=true)
     */
    private $unitPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="total_price", type="float", nullable=true)
     */
    private $totalPrice;

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
     * Set purchaseOrder
     *
     * @param string $purchaseOrder
     *
     * @return OrderLine
     */
    public function setPurchaseOrder($purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;

        return $this;
    }

    /**
     * Get purchaseOrder
     *
     * @return string
     */
    public function getPurchaseOrder()
    {
        return $this->purchaseOrder;
    }

    /**
     * Set product
     *
     * @param string $product
     *
     * @return OrderLine
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return OrderLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnitPrice()
    {
        return (float)$this->unitPrice;
    }

    /**
     * @param string $unitPrice
     *
     * @return OrderLine
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getTotalPrice()
    {
        if ($this->totalPrice > 0) {
            return (float)$this->totalPrice;
        } else {
            return (float)($this->quantity * $this->unitPrice);
        }
    }

    /**
     * @param string $totalPrice
     *
     * @return OrderLine
     */
    public function setTotalPrice($totalPrice)
    {
        if ($totalPrice > 0) {
            $this->totalPrice = $totalPrice;
        } elseif ($this->unitPrice > 0) {
            $this->totalPrice = $this->quantity * $this->unitPrice;
        }
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return OrderLine
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
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
     * @return OrderLine
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
     * @return OrderLine
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}

