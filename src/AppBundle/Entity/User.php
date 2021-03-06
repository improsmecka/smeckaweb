<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection	as ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
/**
 * @ORM\Entity
 * @ORM\Table(name="smecka_user")
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
    
     /** @ORM\Column(type="decimal", scale=3, nullable=true, options={ "default":0}) */
    private $ferocity;
    
    /** @ORM\Column(type="string",  nullable=true) */    
    private $description;
    public function getDescription(){
        return $this->description;            
    }
    public function setDescription($Description){
        $this->description=$Description;        
    }
    
   
     /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your public name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Public name is too short.",
     *     maxMessage="Public name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
   
    private $publicName;
    public function getPublicName(){
        return $this->publicName;            
    }
    public function setPublicName($publicName){
        $this->publicName=$publicName;        
    }
    
    private $faction_points=null;
    
    /*Calculate ferocoity, points and faction_points*/
    public function recalculate(){
        $this->points=0;
        $this->ferocity=0;
        $this->faction_points=array(1=>0,2=>0,3=>0);
        
        foreach($this->events as $Event){
            if($Event->getValid()==1 ){
                $this->points+=$Event->getPoints();
                if(!isset($this->faction_points[$Event->getFaction()])) $this->faction_points[$Event->getFaction()]=0;
                $this->faction_points[$Event->getFaction()]+=$Event->getPoints();
                
                //ferocity calculation
                $datetime1 = new DateTime();
                $datetime2 = $Event->getCreated();
                $interval =$datetime1->diff($datetime2);
                $diff=intval( $interval->format('%d%')); //days                
                $this->ferocity+= ($Event->getPoints()*pow(0.9,$diff));
            }            
        }            
    }
    
    function getFactionPoints(){
        if(!is_array($this->faction_points)){
            $this->recalculate();
        }
        return $this->faction_points;        
    }
    
   
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
    
    

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return User
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Set ferocity
     *
     * @param string $ferocity
     *
     * @return User
     */
    public function setFerocity($ferocity)
    {
        $this->ferocity = $ferocity;

        return $this;
    }

    /**
     * Add event
     *
     * @param \AppBundle\Entity\Event $event
     *
     * @return User
     */
    public function addEvent(\AppBundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \AppBundle\Entity\Event $event
     */
    public function removeEvent(\AppBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }
}
