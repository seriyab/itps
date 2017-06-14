<?php

namespace PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="taxe", type="string", length=20, nullable=true)
     */
    private $taxe;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;


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
     * Set taxe
     *
     * @param string $taxe
     *
     * @return OrderLine
     */
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    /**
     * Get taxe
     *
     * @return string
     */
    public function getTaxe()
    {
        return $this->taxe;
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
}

