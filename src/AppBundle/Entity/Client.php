<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\ClientModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client
{
    use ClientModel;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO") 
     * @var int
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

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
     * Get the value of person
     */ 
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set the value of person
     *
     * @return  self
     */ 
    public function setPerson($person)
    {
        $this->person = $person;

        return $this;
    }
          
}

