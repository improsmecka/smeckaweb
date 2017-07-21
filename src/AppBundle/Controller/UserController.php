<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{     
    /**
     * @Route("/u/{User}", name="user_show")
     */
    public function showAction($User)
    {
		
		$data=$this->getDoctrine()->getRepository("AppBundle:User")->find($User);
                if(!$data) return $this->redirectToRoute('homepage');
                
                if($data->getPoints()<1) return $this->redirectToRoute('homepage');
                
		return $this->render('default/user.html.twig',["user"=>$data
                        //,'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
                        ] );
    }        
}