<?php

namespace MaterialsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubFamily
 *
 * @ORM\Table(name="sub_family")
 * @ORM\Entity(repositoryClass="MaterialsBundle\Repository\SubFamilyRepository")
 */
class SubFamily
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(nullable=false)
     */
    private $family;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="insurance", type="boolean")
     */
    private $insurance;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="tax", type="boolean")
     */
    private $tax;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="grey_card", type="boolean")
     */
    private $greyCard;

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
     * @return SubFamily
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
     * @return SubFamily
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
    
    function getInsurance() {
        return $this->insurance;
    }

    function getTax() {
        return $this->tax;
    }

    function getGreyCard() {
        return $this->greyCard;
    }

    function setInsurance($insurance) {
        $this->insurance = $insurance;
        return $this;
    }

    function setTax($tax) {
        $this->tax = $tax;
        return $this;
    }

    function setGreyCard($greyCard) {
        $this->greyCard = $greyCard;
        return $this;
    }
    
    public function __toString() 
    {
        return $this->name;
    }
}

