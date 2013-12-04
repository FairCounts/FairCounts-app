<?php

namespace FairCounts\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FolderOfExpense
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FolderOfExpense
{
	public function __construct()
    {
        $this->expenses = new \Doctrine\Common\Collections\ArrayCollection();
		
		$this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @ORM\OneToMany(targetEntity="FairCounts\MainBundle\Entity\Expense", mappedBy="folderOfExpense", cascade={"persist"})
     */
    private $expenses;
	
	
	/**
     * @var integer
     * @ORM\ManyToMany(targetEntity="FairCounts\UserBundle\Entity\User", mappedBy="foldersOfExpense", cascade={"persist"})
     */
	private $users;
	
	
	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $status; 
	
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
     * Get status
     *
     * @return string 
     */
	public function getStatus()
	{
		return $this->status;
	}
	
	/**
     * Get label
     *
     * @return string 
     */
	public function getLabel()
	{
		return $this->label;
	}
	
	public function setLabel($newLabel){
		$this->label = $newLabel;
	}
	
	public function setStatus($newStatus){
		$this->status = $newStatus;
	}
	
	/**
     * Add expense
     *
     * @param \FairCounts\MainBundle\Entity\Expense $expenses
     * @return FolderOfExpense
     */
    public function addExpense(\FairCounts\MainBundle\Entity\Expense $exp)
    {
        $this->expenses[] = $exp;

        return $this;
    }
	
	/**
     * Add user
     *
     * @param \FairCounts\UserBundle\Entity\User $users
     * @return FolderOfExpense
     */
    public function addUser(\FairCounts\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }
}
