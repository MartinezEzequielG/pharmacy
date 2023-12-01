<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\IdentificationModel;


/**
 * @ORM\Entity
 * @ORM\Table(name="identification")
 */
class Identification
{

    use IdentificationModel;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="IdentificationClass")
     * @ORM\JoinColumn(name="identificationClass_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $code;

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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
    
}

