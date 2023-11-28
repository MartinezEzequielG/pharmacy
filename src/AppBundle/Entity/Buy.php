<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="buy")
 */
class Buy
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="Recipe")
     * @JoinTable(name="buy_recipes",
     *      joinColumns={@ORM\JoinColumn(name="buy_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="recipe_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $recipes;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="BuyDetail")
     * @JoinTable(name="buy_items",
     *      joinColumns={@ORM\JoinColumn(name="buy_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="buyDetail_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $items;


    /**
     * @ORM\ManyToOne(targetEntity="Pharmacy")
     * @ORM\JoinColumn(name="pharmacy_id", referencedColumnName="id")
     */
    private $pharmacy;



    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->recipes = new ArrayCollection();
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
     * Get the value of client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of recipes
     */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /**
     * Set the value of recipes
     *
     * @return  self
     */
    public function setRecipes($recipes)
    {
        $this->recipes = $recipes;

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
     * Get the value of items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of item
     *
     * @return  self
     */
    public function setItems($items)
    {
        $this->items = $items;

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
