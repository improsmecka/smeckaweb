<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FactionController extends Controller
{
    
     /**
    *  Render vydry  
     * @Route("/vydry", name="faction_vydry")
     */
    public function vydryAction(){
      return $this->show("Vydry", 1);                  
    }
    
    /**
     * Render lišky
     *@Route("/lisky", name="faction_lisky")
     */
    public function liskyAction(){
      return $this->show("Lišky", 2);                  
    } 
    
     /**
      * Render neutral
     *@Route("/neutral", name="faction_neutral")
     */
    public function neutralAction(){
      return $this->show("Liškovydřátka", 3);                  
    } 
    
    
     /**
     * Render faction
     */
    private function show($FactionName, $FactionIcon){
          // replace this example code with whatever you need
        return $this->render('default/faction.html.twig', [
            'Name'=>$FactionName,
            'Icon'=>$FactionIcon,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
        
        
    }
    
     /**
     * @Route("/faction", name="faction")
     */
    public function showAction(){
      return $this->show("Liškovydřátka", 3);                  
    } 
}