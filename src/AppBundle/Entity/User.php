<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection	as ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
    
     /** @ORM\Column(type="decimal", scale=2, nullable=true, options={ "default":0}) */
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