<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
     
     /**
     * Matches /u/*
     *
     * @Route("/u/{User}", name="user_show")
     */
    public function showAction($User){
          // replace this example code with whatever you need
        return $this->render('default/user.html.twig', [
            'User'=>$User,            
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
        
        
    }
}