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
     * @ORM\ManyToMany(targetEntity="FairCounts\UserBundle\Entity\User", mappedBy="expensesOwe", cascade={"persist"})
     */
    private $usersWhoOweMoney;
	
	/**
     * @var integer
     * @ORM\ManyToMany(targetEntity="FairCounts\UserBundle\Entity\User", mappedBy="expensesPaid", cascade={"persist"})
     */
    private $usersWhoPaid;
	
	/**
     * @var integer
     * @ORM\ManyToOne(targetEntity="FairCounts\MainBundle\Entity\FolderOfExpense", inversedBy="expenses", cascade={"persist"})
	 * @ORM\JoinTable(name="folder_expense",
     * joinColumns={@ORM\JoinColumn(name="id_expense", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="id_folder", referencedColumnName="id")})
     */
    private $folderOfExpense;
	
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
