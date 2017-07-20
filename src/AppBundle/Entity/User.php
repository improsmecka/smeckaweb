<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection	as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /** @ORM\Column(type="integer" , nullable=true, options={ "default":0}) */
    private $points;
    
     /** @ORM\Column(type="decimal", scale=2, nullable=true, options={ "default":0}) */
    private $ferocity;
   
    /** @ORM\OneToMany(targetEntity="Event", mappedBy="user") */
    private $events;
    
    public function getEvents() { return $this->events; }
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
         $this->events = new ArrayCollection();
    }
    
    public function getFerocity(){
        return $this->ferocity;
    }
    public function getPoints(){
        return $this->points;
    }
    
    
}