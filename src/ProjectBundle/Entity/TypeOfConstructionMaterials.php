<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeOfConstructionMaterials
 *
 * @ORM\Table(name="type_of_construction_materials")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\TypeOfConstructionMaterialsRepository")
 */
class TypeOfConstructionMaterials
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
     * Set name
     *
     * @param string $name
     *
     * @return TypeOfConstructionMaterials
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set priceMin
     *
     * @param float $priceMin
     *
     * @return TypeOfConstructionMaterials
     */
    public function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    /**
     * Get priceMin
     *
     * @return float
     */
    public function getPriceMin()
    {
        return $this->priceMin;
    }

    /**
     * Set priceMax
     *
     * @param float $priceMax
     *
     * @return TypeOfConstructionMaterials
     */
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    /**
     * Get priceMax
     *
     * @return float
     */
    public function getPriceMax()
    {
        return $this->priceMax;
    }

    /**
     * Set unitOfMeasurement
     *
     * @param string $unitOfMeasurement
     *
     * @return TypeOfConstructionMaterials
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;

        return $this;
    }

    /**
     * Get unitOfMeasurement
     *
     * @return string
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    public function __toString()
    {
        return $this->name . (!empty($this->getUnitOfMeasurement()) ? ' (' . $this->getUnitOfMeasurement() . ')' : '');
    }
}

