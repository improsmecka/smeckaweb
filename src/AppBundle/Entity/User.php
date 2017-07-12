<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
    
    /** @ORM\Column(type="integer") */
    private $points;
    
     /** @ORM\Column(type="decimal", scale=2) */
    private $ferocity;

    /** @ORM\OneToMany(targetEntity="Event", mappedBy="User") */
    private $events;
    
    public function getEvents() { return $this->events; }
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
         $this->events = new ArrayCollection();
    }
    
    
    
}