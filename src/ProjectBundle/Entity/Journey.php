<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journey
 *
 * @ORM\Table(name="journey")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\JourneyRepository")
 */
class Journey
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
     * @var Project
     *
     * @ORM\ManyToOne(targetEntity="MaterialsBundle\Entity\Equipment")
     */
    private $equipment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float")
     */
    private $distance;

    /**
     * @var float
     *
     * @ORM\Column(name="gazoilPrice", type="float")
     */
    private $gazoilPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set equipment
     *
     * @param string $equipment
     *
     * @return Journey
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment
     *
     * @return string
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Journey
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
     * Set distance
     *
     * @param float $distance
     *
     * @return Journey
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set gazoilPrice
     *
     * @param float $gazoilPrice
     *
     * @return Journey
     */
    public function setGazoilPrice($gazoilPrice)
    {
        $this->gazoilPrice = $gazoilPrice;

        return $this;
    }

    /**
     * Get gazoilPrice
     *
     * @return float
     */
    public function getGazoilPrice()
    {
        return $this->gazoilPrice;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Journey
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
}

