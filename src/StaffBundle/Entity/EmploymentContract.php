<?php

namespace StaffBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmploymentContract
 *
 * @ORM\Table(name="employment_contract")
 * @ORM\Entity(repositoryClass="StaffBundle\Repository\EmploymentContractRepository")
 */
class EmploymentContract
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
     * @ORM\Column(name="type", type="string", length=10)
     */
    private $type;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Personal", inversedBy="contracts", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $personal;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EmploymentFunction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $function;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="signature_date", type="datetime", nullable=true)
     */
    private $signatureDate;

    /**
     * @var float
     *
     * @ORM\Column(name="salary", type="float")
     */
    private $salary;


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
     * @return EmploymentContract
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
     * Set personal
     *
     * @param \stdClass $personal
     *
     * @return EmploymentContract
     */
    public function setPersonal($personal)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return \stdClass
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return EmploymentContract
     */
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return EmploymentContract
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return EmploymentContract
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set signatureDate
     *
     * @param \DateTime $signatureDate
     *
     * @return EmploymentContract
     */
    public function setSignatureDate($signatureDate)
    {
        $this->signatureDate = $signatureDate;

        return $this;
    }

    /**
     * Get signatureDate
     *
     * @return \DateTime
     */
    public function getSignatureDate()
    {
        return $this->signatureDate;
    }

    /**
     * Set salary
     *
     * @param float $salary
     *
     * @return EmploymentContract
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return float
     */
    public function getSalary()
    {
        return $this->salary;
    }
}

