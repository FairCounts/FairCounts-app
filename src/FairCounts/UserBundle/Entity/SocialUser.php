<?php

namespace FairCounts\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * SocialUser
 * @ORM\Entity
 */
class SocialUser extends User
{
	/**
     * @var string
     */
    private $token;
	
	public function setToken($token){
		$this->token = $token;
		
		return $this;
	}
	
	 /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }
}

?>