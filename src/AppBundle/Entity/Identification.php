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


    
}

