<?php

namespace FairCounts\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * UnregisteredUser
 * @ORM\Entity
 */
class UnregisteredUser extends User
{
	/**
     * @var string
     */
    private $name;
	
	 /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}

?>