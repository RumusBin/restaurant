<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\ApiCoreBundle\Annotation as Api;

/**
 * ProductionUnit
 *
 * @ORM\Table(name="production_unit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductionUnitRepository")
 * @Api\AnonymousAccess()
 * @Api\AnonymousCreate()
 * @Api\AnonymousUpdate()
 * @Api\AnonymousDelete()
 */
class ProductionUnit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Api\AnonymousAccess();
     * @Api\AnonymousCreate()
     * @Api\AnonymousUpdate()
     * @Api\AnonymousDelete()
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Capacity", mappedBy="productionUnit")
     */
    private $capacity;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return ProductionUnit
     */
    public function setCapacity(Capacity $capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }
}

