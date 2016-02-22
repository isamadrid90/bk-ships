<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ship
 *
 * @ORM\Table(name="ship")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ShipRepository")
 */
class Ship
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6)
     */
    private $color;

    /**
     * @var bool
     *
     * @ORM\Column(name="detection", type="boolean")
     */
    private $detection;

    /**
     * @var bool
     *
     * @ORM\Column(name="turbo_boost", type="boolean")
     */
    private $turboBoost;

    /**
     * @var int
     *
     * @ORM\Column(name="passengers", type="integer")
     */
    private $passengers;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string")
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string")
     */
    private $longitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_start_date", type="datetime", nullable=true)
     */
    private $reservationStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fabrication_date", type="datetime")
     */
    private $fabricationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_end_date", type="datetime", nullable=true)
     */
    private $reservationEndDate;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id
     *
     * @return integer
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Ship
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
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



    /**
     * Set description
     *
     * @param string $description
     * @return Ship
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Ship
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set detection
     *
     * @param boolean $detection
     * @return Ship
     */
    public function setDetection($detection)
    {
        $this->detection = $detection;

        return $this;
    }

    /**
     * Get detection
     *
     * @return boolean 
     */
    public function getDetection()
    {
        return $this->detection;
    }

    /**
     * Set turboBoost
     *
     * @param boolean $turboBoost
     * @return Ship
     */
    public function setTurboBoost($turboBoost)
    {
        $this->turboBoost = $turboBoost;

        return $this;
    }

    /**
     * Get turboBoost
     *
     * @return boolean 
     */
    public function getTurboBoost()
    {
        return $this->turboBoost;
    }

    /**
     * Set passengers
     *
     * @param integer $passengers
     * @return Ship
     */
    public function setPassengers($passengers)
    {
        $this->passengers = $passengers;

        return $this;
    }

    /**
     * Get passengers
     *
     * @return integer 
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Ship
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Ship
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set reservationStartDate
     *
     * @param \DateTime $reservationStartDate
     * @return Ship
     */
    public function setReservationStartDate($reservationStartDate)
    {
        $this->reservationStartDate = $reservationStartDate;

        return $this;
    }

    /**
     * Get reservationStartDate
     *
     * @return \DateTime 
     */
    public function getReservationStartDate()
    {
        return $this->reservationStartDate;
    }

    /**
     * Set reservationEnDate
     *
     * @param \DateTime $reservationEndDate
     * @return Ship
     */
    public function setReservationEndDate($reservationEndDate)
    {
        $this->reservationEndDate = $reservationEndDate;

        return $this;
    }

    /**
     * Get reservationEndDate
     *
     * @return \DateTime 
     */
    public function getReservationEndDate()
    {
        return $this->reservationEndDate;
    }

    /**
     * @return \DateTime
     */
    public function getFabricationDate()
    {
        return $this->fabricationDate;
    }

    /**
     * @param \DateTime $fabricationDate
     */
    public function setFabricationDate($fabricationDate)
    {
        $this->fabricationDate = $fabricationDate;
    }
}
