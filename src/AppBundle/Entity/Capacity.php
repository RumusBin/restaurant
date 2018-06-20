<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\ApiCoreBundle\Annotation as Api;

/**
 * Capacity
 *
 * @ORM\Table(name="capacity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CapacityRepository")
 * @Api\AnonymousAccess()
 * @Api\AnonymousCreate()
 * @Api\AnonymousUpdate()
 * @Api\AnonymousDelete()
 *
 */
class Capacity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Api\AnonymousAccess();
     * @Api\AnonymousCreate()
     * @Api\AnonymousUpdate()
     * @Api\AnonymousDelete()
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant", inversedBy="capacities")
     * @ORM\JoinColumn(name="restaurant_id", referencedColumnName="id")
     */
    private $restaurant;

    /**
     * @ORM\OneToOne(targetEntity="ProductionUnit", inversedBy="capacity", cascade={"persist"})
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     */
    private $productionUnit;

    /**
     * @ORM\OneToOne(targetEntity="TimeUnit", inversedBy="capacity", cascade={"persist"})
     * @ORM\JoinColumn(name="time_unit_id", referencedColumnName="id")
     */
    private $timeUnit;

    /**
     * @ORM\OneToOne(targetEntity="ProductGroup", inversedBy="capacity", cascade={"persist"})
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $productGroup;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     *
     * @return ProductGroup
     */
    public function getProductGroup() :ProductGroup
    {
        return $this->productGroup;
    }

    /**
     * @param ProductGroup $productGroup
     *
     * @return Capacity
     */
    public function setProductGroup(ProductGroup $productGroup) :Capacity
    {
        $this->productGroup = $productGroup->setCapacity($this);

        return $this;
    }

    /**
     * @return ProductionUnit
     */
    public function getProductionUnit()
    {
        return $this->productionUnit;
    }

    /**
     * @param ProductionUnit $productionUnit
     *
     * @return Capacity
     */
    public function setProductionUnit(ProductionUnit $productionUnit) :Capacity
    {
        $this->productionUnit = $productionUnit->setCapacity($this);

        return $this;
    }

    /**
     * @return TimeUnit
     */
    public function getTimeUnit()
    {
        return $this->timeUnit;
    }

    /**
     * @param TimeUnit $timeUnit
     *
     * @return Capacity
     */
    public function setTimeUnit(TimeUnit $timeUnit) :Capacity
    {
        $this->timeUnit = $timeUnit->setCapacity($this);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * @param Restaurant $restaurant
     *
     */
    public function setRestaurant(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }
}

