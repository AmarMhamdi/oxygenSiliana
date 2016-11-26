<?php

namespace Oxygen\SalleDeSportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * Adherent
 * @ORM\Entity(repositoryClass="Oxygen\SalleDeSportBundle\Repository\AdherentRepository")
 * @ORM\Table(name="adherent")
 * @ORM\HasLifecycleCallbacks() 
 */

class Adherent extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $firstName;
  
    /**
     * @var string
     */
    protected $lastName;
    
    /**
     * @var integer
     */
    protected $age;
    
    /**
     * @var float
     */
    protected $weight;
    
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get firstName
     *
     * @return string 
     */    
    function getFirstName() {
        return $this->firstName;
    }
    
    /**
     * Get lastName
     *
     * @return string 
     */   
    function getLastName() {
        return $this->lastName;
    }
    /**
     * Get age
     *
     * @return integer 
     */
    function getAge() {
        return $this->age;
    }
    /**
     * Get weight
     *
     * @return float 
     */
    function getWeight() {
        return $this->weight;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setWeight($weight) {
        $this->weight = $weight;
    }
}
