<?php

namespace FairCounts\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormUser
 * @ORM\Entity
 */
class FormUser extends User
{
    /**
     * @var string
     */
    private $emailAdress;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $name;

    /**
     * Set emailAdress
     *
     * @param string $emailAdress
     * @return FormUser
     */
    public function setEmailAdress($emailAdress)
    {
        $this->emailAdress = $emailAdress;
    
        return $this;
    }

    /**
     * Get emailAdress
     *
     * @return string 
     */
    public function getEmailAdress()
    {
        return $this->emailAdress;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return FormUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return FormUser
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}

?>