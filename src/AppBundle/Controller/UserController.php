<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{     
    /**
     * @Route("/u/{User}", name="user_show")
     */
    public function showAction($User)
    {		
		$data=$this->getDoctrine()->getRepository("AppBundle:User")->find($User);
                if(!$data) return $this->redirectToRoute('homepage');
                
                
     
                $data->recalculate();
                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
                if($data->getPoints()<1){
                    return $this->redirectToRoute('homepage');
                }
     
                
		return $this->render('default/user.html.twig',["user"=>$data
                        //,'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
                        ] );
    }    

    /**
     * @Route("/cron" )
     * 
     */
    public function Cron(Request $Request){
        
        $repository = $this->getDoctrine()->getRepository(\AppBundle\Entity\User::class);
        $em = $this->getDoctrine()->getManager();
              
        $users = $repository->findAll();
        foreach($users as $U){
            $U->recalculate();
            $em->persist($U);
        }
        $em->flush();
        return new Response("OK");
        
        
    }    
}