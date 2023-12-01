<?php

namespace AppBundle\Model;

Trait IdentificationModel 
{
    public function isCompleted()
    {
        if (! $this->getType()) {
            return false;
        }
        if (! $this->getCountry()) {
            return false;
        }
        if (! $this->getCode()) {
            return false;
        }
        if ($this->getCountry()->getId() !== $this->getType()->getCountry()->getId()){
            return false;
        }
            return true;
    }


}