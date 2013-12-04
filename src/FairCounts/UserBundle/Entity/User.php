<?php
// src/FairCounts/UserBundle/Entity/User.php

namespace FairCounts\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @Assert\NotBlank(groups={"Registration"})
     * @Assert\Email(groups={"Registration"})
     */
    protected $email;
	
	/**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(groups={"Registration"})
     */
    protected $name;
    
	/**
     * @var integer
     * @ORM\ManyToMany(targetEntity="FairCounts\MainBundle\Entity\Expense", inversedBy="usersWhoPaid", cascade={"persist"})
	 * @ORM\JoinTable(name="user_paidExpense",
     * joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="id_expense", referencedColumnName="id")})
     */
    private $expensesPaid;
	
	/**
     * @var integer
     * @ORM\ManyToMany(targetEntity="FairCounts\MainBundle\Entity\Expense", inversedBy="usersWhoOweMoney", cascade={"persist"})
	 * @ORM\JoinTable(name="user_oweExpense",
     * joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="id_expense", referencedColumnName="id")})
     */
    private $expensesOwe;
	
	/**
     * @var integer
     * @ORM\ManyToMany(targetEntity="FairCounts\MainBundle\Entity\FolderOfExpense", inversedBy="users", cascade={"persist"})
	 * @ORM\JoinTable(name="user_folder",
     * joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="id_folder", referencedColumnName="id")})
     */
    private $foldersOfExpense;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
	
	public function getNumberOfFolders(){
		return $foldersOfExpense;
	}
	
	/**
     * Set name
     *
     * @param string $name
     * @return User
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
    
    public function setEmail($email)
    {
       parent::setEmail($email);
       $this->setUsername($email);
    }
}