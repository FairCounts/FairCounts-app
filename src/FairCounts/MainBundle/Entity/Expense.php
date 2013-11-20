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
	 * @var float
	 * @ORM\Column(type="float")
	 */
	private $amount; 
	
	/**
	 * @var \DateTime
	 * @ORM\Column(type="date")
	 */
	private $date; 
	
	/**
	 * @var string
	 * @ORM\Column(type="string")
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
	
	/**
     * Get Amount
     *
     * @return float 
     */
	public function getAmount()
	{
		return $this->amount;
	}
	
	/**
     * Get Date
     *
     * @return \DateTime 
     */
	public function getDate()
	{
		return $this->date;
	}
	
	/**
     * Get Label
     *
     * @return string
     */
	public function getLabel()
	{
		return $this->label;
	}
}
