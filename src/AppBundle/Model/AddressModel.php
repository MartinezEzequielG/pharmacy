<?php

namespace AppBundle\Model;

Trait AddressModel 
{
    public function isCompleted()
    {
        if (! $this->getStreet()) {
            return false;
        }

        if (! $this->getNumber()) {
            return false;
        }

        if (! $this->getState()) {
            return false;
        }

        if (! $this->getCity()) {
            return false;
        }

        if (! $this->getCountry()) {
            return false;
        }

        if ($this->getCountry()->getId() != $this->getState()->getCountry()->getId()){
            return false;
        }

        if ($this->getState()->getId() != $this->getCity()->getState()->getId()){
            return false;
        }

        return true;
    }
}