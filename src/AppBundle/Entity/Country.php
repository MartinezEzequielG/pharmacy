<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\CountryModel;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 * @ORM\Table(name="country")
 */
class Country
{
    use CountryModel;

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
    private $name;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


}

