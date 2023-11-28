<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="sale")
 */
class Sale
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="SaleDetail")
     * @JoinTable(name="sale_items",
     *      joinColumns={@ORM\JoinColumn(name="sale_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="saleDetail_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $items;

 
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;


    /**
     * @ORM\ManyToOne(targetEntity="Pharmacy")
     * @ORM\JoinColumn(name="pharmacy_id", referencedColumnName="id")
     */
    private $pharmacy;

    
    
    public function __construct() 
    {
        $this->items = new ArrayCollection();
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
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     
     * @return  self
     */ 
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of pharmacy
     */ 
    public function getPharmacy()
    {
        return $this->pharmacy;
    }

    /**
     * Set the value of pharmacy
     *
     * @return  self
     */ 
    public function setPharmacy($pharmacy)
    {
        $this->pharmacy = $pharmacy;

        return $this;
    }
}

