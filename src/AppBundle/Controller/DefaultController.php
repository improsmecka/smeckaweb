<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        $repository = $this->getDoctrine()->getRepository(\AppBundle\Entity\Event::class);

        $query = $repository->createQueryBuilder('p')
            ->where('p.valid = 1')
            ->orderBy('p.created', 'desc')
            ->setMaxResults( 3 )
            ->getQuery();
        $events = $query->getResult();
        
        
        $repository2 = $this->getDoctrine()->getRepository(\AppBundle\Entity\User::class);

        
        
        $query2 = $repository2->createQueryBuilder('u')
            ->where('u.ferocity >0')
            ->orderBy('u.ferocity', 'DESC')
            ->setMaxResults( 10 )
            ->getQuery();
        $ferocity = $query2->getResult();
        
        $query3 = $repository2->createQueryBuilder('v')
            ->where('v.points >0')
            ->orderBy('v.points', 'DESC')
            ->setMaxResults( 10 )
            ->getQuery();
        $points = $query3->getResult();
        
        

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'events'=>$events,
            'ferocity'=>$ferocity,
            'points'=>$points,
            
        ]);
    }
}
