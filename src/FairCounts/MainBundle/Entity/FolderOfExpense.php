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
     * @ORM\ManyToOne(targetEntity="FairCounts\MainBundle\Entity\Expense")
     * @ORM\JoinColumn(nullable=true)
     */
    private $expenses;
	
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
