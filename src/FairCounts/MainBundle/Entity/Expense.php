<?php

namespace FairCounts\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expense
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Expense
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
     * @var integer
     * @ORM\ManyToOne(targetEntity="FairCounts\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userWhoOweMoney;
	
	/**
	 * @var integer
	 */
	private $amount; 
	
	/**
	 * @var \DateTime
	 */
	private $date; 
	
	/**
	 * @var string
	 */
	private $label; 

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
	public function getAmount()
	{
		return $this->amount;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
	public function getLabel()
	{
		return $this->label;
	}
}
