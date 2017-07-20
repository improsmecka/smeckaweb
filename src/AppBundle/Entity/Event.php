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
    
    /** @ORM\Column(type="integer") */
    private $faction;
    
    /** @ORM\Column(type="text") */
    private $description;
    
    /** @ORM\Column(type="boolean") */
    private $valid;
    
    /** @ORM\Column(type="text") */
    private $title;
    
    /** @ORM\Column(type="text") */
    private $action;
    
   
    
 
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    
    
}