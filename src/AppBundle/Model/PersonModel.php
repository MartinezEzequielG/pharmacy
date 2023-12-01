<?php

namespace AppBundle\Model;

use AppBundle\Entity\Identification;
use Doctrine\Common\Collections\ArrayCollection;

Trait PersonModel 
{ 
    public function __construct()
    {
        $this->identifications = new ArrayCollection();   
    }
      
    public function preSet()
    {
        if ($this->getIdentifications()->isEmpty()) {
            $identification = new Identification;
            $this->getIdentifications()->add($identification);
        }
    }

    public function isCompleted()
    {
        if (!$this->getAddress() || !$this->getAddress()->isCompleted()) {
            return false;
        }
        
        if (! $this->getIdentifications() || $this->getIdentifications()->isEmpty()) {
            return false;
        }

        foreach($this->getIdentifications() as $identification){
            if(!$identification->isCompleted()){
                return false;
            }
        }

        if (! $this->getFirstName()) {
            return false;
        }

        if (! $this->getLastName()) {
            return false;
        }

        return true;
    }

}
