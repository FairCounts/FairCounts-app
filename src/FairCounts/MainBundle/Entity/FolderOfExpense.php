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
}
