<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TaskBundle\Entity\TaskRepository")
 */
class Task {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="datetime")
     */
    private $dueDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completed", type="boolean")
     */
    private $completed;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=15)
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="tasks")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category",inversedBy="tasks")
     * @ORM\JoinColumn(name="category_id",referencedColumnName="id")
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="comment")
     */
    private $comments;
    
    
    public function __construct() {

        $this->comments = new ArrayCollection();
    }
    
    public function __toString() {
        return $this->name. " " .$this->priority." ".$this->dueDate." ".$this->description;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Task
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate() {
        return $this->dueDate;
    }

    /**
     * Set completed
     *
     * @param boolean $completed
     * @return Task
     */
    public function setCompleted($completed) {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean 
     */
    public function getCompleted() {
        return $this->completed;
    }

    /**
     * Set priority
     *
     * @param string $priority
     * @return Task
     */
    public function setPriority($priority) {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string 
     */
    public function getPriority() {
        return $this->priority;
    }


    /**
     * Set user
     *
     * @param \TaskBundle\Entity\User $user
     * @return Task
     */
    public function setUser(\TaskBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TaskBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \TaskBundle\Entity\Category $category
     * @return Task
     */
    public function setCategory(\TaskBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \TaskBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add comments
     *
     * @param \TaskBundle\Entity\Comment $comments
     * @return Task
     */
    public function addComment(\TaskBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \TaskBundle\Entity\Comment $comments
     */
    public function removeComment(\TaskBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
