<?php

namespace StaffBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clocking
 *
 * @ORM\Table(name="clocking_report")
 * @ORM\Entity(repositoryClass="StaffBundle\Repository\ClockingReportRepository")
 */
class ClockingReport
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
     * @ORM\ManyToOne(targetEntity="Clocking", inversedBy="clockingReport", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $clocking;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_time", type="time")
     */
    private $arrivalTime;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personal;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Workplace")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Project")
     * @ORM\JoinColumn(nullable=true)
     */
    private $constructionSite;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var integer
     * @ORM\Column(name="status", type="string", length=50)
     */
    private $status;


    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set personal
     *
     * @param string $personal
     *
     * @return Clocking
     */
    public function setPersonal($personal)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return string
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Clocking
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
     * Set constructionSite
     *
     * @param string $constructionSite
     *
     * @return Clocking
     */
    public function setConstructionSite($constructionSite)
    {
        $this->constructionSite = $constructionSite;

        return $this;
    }

    /**
     * Get constructionSite
     *
     * @return string
     */
    public function getConstructionSite()
    {
        return $this->constructionSite;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Clocking
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Clocking
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    function getClocking() {
        return $this->clocking;
    }

    function setClocking($clocking) {
        $this->clocking = $clocking;
        return $this;
    }
    
    function getArrivalTime() {
        return $this->arrivalTime;
    }

    function setArrivalTime(\DateTime $arrivalTime) {
        $this->arrivalTime = $arrivalTime;
        return $this;
    }
}

