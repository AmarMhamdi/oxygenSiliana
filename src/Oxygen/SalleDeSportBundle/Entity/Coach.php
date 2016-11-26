<?php

namespace Oxygen\SalleDeSportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coach
 */
class Coach
{
    /**
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
