<?php
namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\Table(name="smecka_event")
 * @Vich\Uploadable
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
    private $faction=1;
    
    /** @ORM\Column(type="text") */
    private $description="";
    
    
    /** @ORM\Column(type="boolean") */
    private $valid=false;
    
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
            return $this;
    }

    public function getUser(){
            return $this->user;
    }

    public function setUser($user){
            $this->user = $user;
            return $this;
    }

    public function getPoints(){
            return $this->points;
    }

    public function setPoints($points){
            $this->points = $points;
            return $this;
    }

    public function getFaction(){
            return $this->faction;
    }

    public function setFaction($faction){
            $this->faction = $faction;
            return $this;
    }

    public function getDescription(){
            return $this->description;
    }

    public function setDescription($description){
            $this->description = $description;
            return $this;
    }

    public function getValid(){
            return $this->valid;
    }

    public function setValid($valid){
            $this->valid = $valid;
            return $this;
    }

    public function getTitle(){
            return $this->title;
    }

    public function setTitle($title){
            $this->title = $title;
            return $this;
    }

    public function getAction(){
            return $this->action;
    }

    public function setAction($action){
            $this->action = $action;
            return $this;
    }

    public function getCreated(){
            return $this->created;
         
    }

    public function setCreated($created){
            $this->created = $created;
            return $this;
    }


    public function __construct()
    {
        $this->created = new DateTime();
        //todo 
        $this->valid=true;
        $this->points= rand(1,10);       
    }
    
    
/**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    // ...

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }     
   

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Event
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
