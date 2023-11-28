<?php

namespace AppBundle\Model;

trait CountryModel 
{
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