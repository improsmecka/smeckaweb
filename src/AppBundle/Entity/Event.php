<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="event")
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
    private $points;
    
    public function getPoints() {return $this->points;}
    
    /** @ORM\Column(type="integer") */
    private $faction;
    
    /** @ORM\Column(type="text") */
    private $description;
    
    /** @ORM\Column(type="integer") */
    private $valid;
    
    /** @ORM\Column(type="text") */
    private $title;
    public function getTitle() {return $this->title;}
    
    /** @ORM\Column(type="text") */
    private $action;
    public function getAction() {return $this->action;}
    
    /** @ORM\Column(type="datetime") */
    private $created;
    
    
   
    
 
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    
    
}