<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\ApiCoreBundle\Annotation as Api;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RestaurantRepository")
 * @Api\AnonymousAccess()
 * @Api\AnonymousCreate()
 * @Api\AnonymousUpdate()
 * @Api\AnonymousDelete()
 */
class Restaurant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Capacity", mappedBy="restaurant", cascade={"persist"})
     */
    private $capacities;

    public function __construct()
    {
        $this->capacities = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getCapacities()
    {
        return $this->capacities;
    }

    /**
     * @param Capacity $capacity
     *
     * @return Restaurant
     */
    public function setCapacities(Capacity $capacity) :Restaurant
    {
        $this->capacities[] = $capacity;

        return $this;
    }
}

