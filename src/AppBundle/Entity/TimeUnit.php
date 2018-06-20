<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeUnit
 *
 * @ORM\Table(name="time_unit")
 * @ORM\Entity(repositoryClass="TimeUnitRepository")
 */
class TimeUnit
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
     * @ORM\OneToOne(targetEntity="Capacity", mappedBy="timeUnit")
     */
    private $capacity;


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
     * @return TimeUnit
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
     * @return Capacity
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param Capacity $capacity
     *
     * @return TimeUnit
     */
    public function setCapacity(Capacity $capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }
}

