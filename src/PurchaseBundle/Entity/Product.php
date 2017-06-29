<?php

namespace PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialsOfConstruction
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="PurchaseBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="price_min", type="float", nullable=true)
     */
    private $priceMin;

    /**
     * @var float
     *
     * @ORM\Column(name="price_max", type="float", nullable=true)
     */
    private $priceMax;

    /**
     * @var string
     *
     * @ORM\Column(name="unitOfMeasurement", type="string", length=10, nullable=true)
     */
    private $unitOfMeasurement;

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
     * Set type
     *
     * @param string $type
     *
     * @return MaterialsOfConstruction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceMin()
    {
        return $this->priceMin;
    }

    /**
     * @param float $priceMin
     *
     * @return Product
     */
    public function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceMax()
    {
        return $this->priceMax;
    }

    /**
     * @param float $priceMax
     *
     * @return Product
     */
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param string $unitOfMeasurement
     *
     * @return Product
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

