<?php

namespace MaterialsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="MaterialsBundle\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\ManyToOne(targetEntity="Family")
     */
    private $family;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SubFamily")
     */
    private $subFamily;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_number", type="string", length=255)
     */
    private $registrationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="date_of_circulation", type="date")
     */
    private $dateOfCirculation;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_places", type="integer")
     */
    private $numberOfPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="bodywork", type="string", length=255)
     */
    private $bodywork;

    /**
     * @var string
     *
     * @ORM\Column(name="energy", type="string", length=255)
     */
    private $energy;

    /**
     * @var int
     *
     * @ORM\Column(name="fiscal_power", type="integer")
     */
    private $fiscalPower;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var bool
     *
     * @ORM\Column(name="grey_carte", type="boolean")
     */
    private $greyCarte;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Model")
     */
    private $model;


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
     * @return Equipment
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
     * Set family
     *
     * @param string $family
     *
     * @return Equipment
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set subFamily
     *
     * @param string $subFamily
     *
     * @return Equipment
     */
    public function setSubFamily($subFamily)
    {
        $this->subFamily = $subFamily;

        return $this;
    }

    /**
     * Get subFamily
     *
     * @return string
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }

    /**
     * Set registrationNumber
     *
     * @param string $registrationNumber
     *
     * @return Equipment
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get registrationNumber
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * Set dateOfCirculation
     *
     * @param string $dateOfCirculation
     *
     * @return Equipment
     */
    public function setDateOfCirculation($dateOfCirculation)
    {
        $this->dateOfCirculation = $dateOfCirculation;

        return $this;
    }

    /**
     * Get dateOfCirculation
     *
     * @return string
     */
    public function getDateOfCirculation()
    {
        return $this->dateOfCirculation;
    }

    /**
     * Set numberOfPlaces
     *
     * @param integer $numberOfPlaces
     *
     * @return Equipment
     */
    public function setNumberOfPlaces($numberOfPlaces)
    {
        $this->numberOfPlaces = $numberOfPlaces;

        return $this;
    }

    /**
     * Get numberOfPlaces
     *
     * @return int
     */
    public function getNumberOfPlaces()
    {
        return $this->numberOfPlaces;
    }

    /**
     * Set bodywork
     *
     * @param string $bodywork
     *
     * @return Equipment
     */
    public function setBodywork($bodywork)
    {
        $this->bodywork = $bodywork;

        return $this;
    }

    /**
     * Get bodywork
     *
     * @return string
     */
    public function getBodywork()
    {
        return $this->bodywork;
    }

    /**
     * Set energy
     *
     * @param string $energy
     *
     * @return Equipment
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return string
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set fiscalPower
     *
     * @param integer $fiscalPower
     *
     * @return Equipment
     */
    public function setFiscalPower($fiscalPower)
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    /**
     * Get fiscalPower
     *
     * @return int
     */
    public function getFiscalPower()
    {
        return $this->fiscalPower;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Equipment
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
     * Set greyCarte
     *
     * @param boolean $greyCarte
     *
     * @return Equipment
     */
    public function setGreyCarte($greyCarte)
    {
        $this->greyCarte = $greyCarte;

        return $this;
    }

    /**
     * Get greyCarte
     *
     * @return bool
     */
    public function getGreyCarte()
    {
        return $this->greyCarte;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Equipment
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Equipment
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
}

