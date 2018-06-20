<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\ApiCoreBundle\Annotation as Api;

/**
 * ProductGroup
 *
 * @ORM\Table(name="product_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductGroupRepository")
 * @Api\AnonymousAccess()
 * @Api\AnonymousCreate()
 * @Api\AnonymousUpdate()
 * @Api\AnonymousDelete()
 */
class ProductGroup
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Capacity", mappedBy="productGroup")
     */
    private $capacity;

    /**
     * @return mixed
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
     * @return ProductGroup
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }
}

