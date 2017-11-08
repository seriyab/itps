<?php

namespace StaffBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Clocking
 *
 * @ORM\Table(name="clocking")
 * @ORM\Entity(repositoryClass="StaffBundle\Repository\ClockingRepository")
 */
class Clocking
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", unique=true)
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="ClockingReport", mappedBy="clocking", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $clockingReports;
    
    public function __construct()
    {
        $this->clockingReports = new ArrayCollection();
    }

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Clocking
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
    
    function getClockingReports() 
    {
        return $this->clockingReports;
    }

    function addClockingReport($clockingReport) 
    {
        $clockingReport->setClocking($this);
        $this->clockingReports[] = $clockingReport;
        return $this;
    }
    
    function removeClockingReport($clockingReport) 
    {
        $this->clockingReports->removeElement($clockingReport);
    }
}

