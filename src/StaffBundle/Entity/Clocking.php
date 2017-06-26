<?php

namespace StaffBundle\Entity;

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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
}

