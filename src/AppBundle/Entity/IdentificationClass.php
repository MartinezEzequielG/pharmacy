<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\IdentificationClassModel;


/**
 * @ORM\Entity
 * @ORM\Table(name="identificationClass")
 */
class IdentificationClass
{

    use IdentificationClassModel;


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


   
}

