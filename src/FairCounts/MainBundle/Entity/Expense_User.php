<?php

namespace FairCounts\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expense_User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Expense_User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


	/**
     * @ORM\OneToOne(targetEntity="FairCounts\MainBundle\Entity\Expense")
     * @ORM\JoinColumn(nullable=true)
     */
    private $expense;
	
	/**
     * @ORM\OneToOne(targetEntity="FairCounts\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;
	
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
