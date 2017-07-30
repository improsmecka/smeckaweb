<?php
namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="smecka_event")
 */
class Event  
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     @ORM\ManyToOne(targetEntity="User", inversedBy="events")
     */
    private $user;
    
    
    
    /** @ORM\Column(type="integer") */
    private $points = 0;
    
 
    /** @ORM\Column(type="integer") */
    private $faction=3;
    
    /** @ORM\Column(type="text") */
    private $description="";
    
    
    /** @ORM\Column(type="integer") */
    private $valid=0;
    
    /** @ORM\Column(type="text") */
    private $title="";
   
    
    /** @ORM\Column(type="text") */
    private $action="";

    
    /** @ORM\Column(type="datetime", nullable=true) */
    private $created=null;
    
    
    public function getId(){
            return $this->id;
    }

    public function setId($id){
            $this->id = $id;
    }

    public function getUser(){
            return $this->user;
    }

    public function setUser($user){
            $this->user = $user;
    }

    public function getPoints(){
            return $this->points;
    }

    public function setPoints($points){
            $this->points = $points;
    }

    public function getFaction(){
            return $this->faction;
    }

    public function setFaction($faction){
            $this->faction = $faction;
    }

    public function getDescription(){
            return $this->description;
    }

    public function setDescription($description){
            $this->description = $description;
    }

    public function getValid(){
            return $this->valid;
    }

    public function setValid($valid){
            $this->valid = $valid;
    }

    public function getTitle(){
            return $this->title;
    }

    public function setTitle($title){
            $this->title = $title;
    }

    public function getAction(){
            return $this->action;
    }

    public function setAction($action){
            $this->action = $action;
    }

    public function getCreated(){
            return $this->created;
    }

    public function setCreated($created){
            $this->created = $created;
    }


   
    
 
    
    public function __construct()
    {
        $this->created = new DateTime();
        //todo 
        $this->valid=1;
        $this->points= rand(1,10);
        
       
    }
    
    
    
}