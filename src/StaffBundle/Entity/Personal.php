<?php

namespace StaffBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Personal
 *
 * @ORM\Table(name="personal")
 * @ORM\Entity(repositoryClass="StaffBundle\Repository\PersonalRepository")
 */
class Personal
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
     * @ORM\Column(name="firstname", type="string", length=20)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=20)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=20, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="martial_status", type="string", length=20, nullable=true)
     */
    private $martialStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="driving_license", type="string", length=10, nullable=true)
     */
    private $drivingLicense;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="EmploymentContract", mappedBy="personal", cascade={"persist","remove"})
     */
    private $contracts;

    /**
     * @var Workplace
     * @ORM\ManyToOne(targetEntity="Workplace")
     */
    private $workplace;

    /**
     * @var int
     *
     * @ORM\Column(name="is_temporary", type="boolean")
     */
    private $isTemporary;

    /**
     * @var int
     *
     * @ORM\Column(name="daily_rate", type="float", nullable=true)
     */
    private $dailyRate;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EmploymentFunction")
     * @ORM\JoinColumn(nullable=true)
     */
    private $function;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Personal
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Personal
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Personal
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Personal
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Personal
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Personal
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getMartialStatus()
    {
        return $this->martialStatus;
    }

    /**
     * @param int $martialStatus
     * @return Personal
     */
    public function setMartialStatus($martialStatus)
    {
        $this->martialStatus = $martialStatus;
        return $this;
    }

    /**
     * @return int
     */
    public function getDrivingLicense()
    {
        return $this->drivingLicense;
    }

    /**
     * @param int $drivingLicense
     * @return Personal
     */
    public function setDrivingLicense($drivingLicense)
    {
        $this->drivingLicense = $drivingLicense;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsTemporary()
    {
        return $this->isTemporary;
    }

    /**
     * @param int $isTemporary
     * @return Personal
     */
    public function setIsTemporary($isTemporary)
    {
        $this->isTemporary = $isTemporary;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param string $birthdate
     * @return Personal
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    /**
     * @return string
     */
    public function getContracts()
    {
        return $this->contracts;
    }

    public function addContract(EmploymentContract $contract)
    {
        $contract->setPersonal($this);
        $this->contracts[] = $contract;

        return $this;
    }

    public function removeContract(EmploymentContract $contract)
    {
        $this->contracts->removeElement($contract);
    }

    /**
     * @return int
     */
    public function getDailyRate()
    {
        return $this->dailyRate;
    }

    /**
     * @param int $dailyRate
     * @return Personal
     */
    public function setDailyRate($dailyRate)
    {
        $this->dailyRate = $dailyRate;
        return $this;
    }

    /**
     * @return Workplace
     */
    public function getWorkplace()
    {
        return $this->workplace;
    }

    /**
     * @param Workplace $workplace
     * @return Personal
     */
    public function setWorkplace($workplace)
    {
        $this->workplace = $workplace;
        return $this;
    }

    /**
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param string $function
     * @return Personal
     */
    public function setFunction($function)
    {
        $this->function = $function;
        return $this;
    }
}

