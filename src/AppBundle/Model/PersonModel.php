<?php

namespace AppBundle\Model;

trait PersonModel 
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
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of middleName
     */ 
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set the value of middleName
     *
     * @return  self
     */ 
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of maternalLastName
     */ 
    public function getMaternalLastName()
    {
        return $this->maternalLastName;
    }

    /**
     * Set the value of maternalLastName
     *
     * @return  self
     */ 
    public function setMaternalLastName($maternalLastName)
    {
        $this->maternalLastName = $maternalLastName;

        return $this;
    }



   

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

     /**
     * Get joinColumns={@ORM\JoinColumn(name="identification_id", referencedColumnName="id")},
     */ 
    public function getIdentifications()
    {
        return $this->identifications;
    }

    /**
     * Set joinColumns={@ORM\JoinColumn(name="identification_id", referencedColumnName="id")},
     *
     * @return  self
     */ 
    public function setIdentifications($identifications)
    {
        $this->identifications = $identifications;

        return $this;
    }
}
