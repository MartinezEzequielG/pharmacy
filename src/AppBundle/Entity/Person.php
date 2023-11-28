<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use AppBundle\Model\PersonModel;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{

    use PersonModel;

    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;


     /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $middleName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $maternalLastName;

    /**
     * @ORM\ManyToMany(targetEntity="Identification", cascade={"persist"})
     * @JoinTable(name="person_identifications",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="identification_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $identifications;

    /**
     * @ORM\ManyToOne(targetEntity="Address", cascade={"persist"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

     /**
     * @ORM\ManyToOne(targetEntity="Phone", cascade={"persist"})
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     */
    private $phone;

    
    public function __construct()
    {
        $this->identifications = new ArrayCollection();   
    }
   
}

