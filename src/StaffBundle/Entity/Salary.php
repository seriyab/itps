<?php

namespace StaffBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salary
 *
 * @ORM\Table(name="salary")
 * @ORM\Entity(repositoryClass="StaffBundle\Repository\SalaryRepository")
 */
class Salary
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
     * @var Personal
     *
     * @ORM\ManyToOne(targetEntity="Personal")
     */
    private $worker;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="total_transportation_fees", type="float")
     */
    private $totalTransportationFees;

    /**
     * @var float
     *
     * @ORM\Column(name="total_working_days", type="float", nullable=true)
     */
    private $totalWorkingDays;

    /**
     * @var float
     *
     * @ORM\Column(name="base_salary", type="float", nullable=true)
     */
    private $baseSalary;

    /**
     * @var float
     *
     * @ORM\Column(name="loan_cost", type="float", nullable=true)
     */
    private $loanCost;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


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
     * Set worker
     *
     * @param string $worker
     *
     * @return Salary
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;

        return $this;
    }

    /**
     * Get worker
     *
     * @return string
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Salary
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set totalTransportationFees
     *
     * @param float $totalTransportationFees
     *
     * @return Salary
     */
    public function setTotalTransportationFees($totalTransportationFees)
    {
        $this->totalTransportationFees = $totalTransportationFees;

        return $this;
    }

    /**
     * Get totalTransportationFees
     *
     * @return float
     */
    public function getTotalTransportationFees()
    {
        return $this->totalTransportationFees;
    }

    /**
     * Set totalWorkingDays
     *
     * @param float $totalWorkingDays
     *
     * @return Salary
     */
    public function setTotalWorkingDays($totalWorkingDays)
    {
        $this->totalWorkingDays = $totalWorkingDays;

        return $this;
    }

    /**
     * Get totalWorkingDays
     *
     * @return float
     */
    public function getTotalWorkingDays()
    {
        return $this->totalWorkingDays;
    }

    /**
     * Set baseSalary
     *
     * @param float $baseSalary
     *
     * @return Salary
     */
    public function setBaseSalary($baseSalary)
    {
        $this->baseSalary = $baseSalary;

        return $this;
    }

    /**
     * Get baseSalary
     *
     * @return float
     */
    public function getBaseSalary()
    {
        return $this->baseSalary;
    }

    /**
     * Set loanCost
     *
     * @param float $loanCost
     *
     * @return Salary
     */
    public function setLoanCost($loanCost)
    {
        $this->loanCost = $loanCost;

        return $this;
    }

    /**
     * Get loanCost
     *
     * @return float
     */
    public function getLoanCost()
    {
        return $this->loanCost;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Salary
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}

