<?php

namespace TaskBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {

        parent::__construct();
        $this->tasks = new ArrayCollection();
        $this->categories = new ArrayCollection();
// your own logic
    }

    /**
     * @ORM\OneToMany(targetEntity="Task",mappedBy="user")
     */
    private $tasks;
    
     /**
     * @ORM\OneToMany(targetEntity="Category",mappedBy="user")
     */
    private $categories;

    public function __toString() {
        return $this->username. " " .$this->email;
    }
    


    /**
     * Add tasks
     *
     * @param \TaskBundle\Entity\Task $tasks
     * @return User
     */
    public function addTask(\TaskBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \TaskBundle\Entity\Task $tasks
     */
    public function removeTask(\TaskBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add categories
     *
     * @param \TaskBundle\Entity\Category $categories
     * @return User
     */
    public function addCategory(\TaskBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \TaskBundle\Entity\Category $categories
     */
    public function removeCategory(\TaskBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
