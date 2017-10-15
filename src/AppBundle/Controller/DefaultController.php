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
            ->setMaxResults( 4 )
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
        
        $factions=array(1=>0,2=>0,3=>0);        
        $query4 = $repository->createQueryBuilder('alle')
            ->where('alle.valid >0')            
            ->setMaxResults( 2000000 )
            ->getQuery();
        $events2 = $query->getResult();
        foreach ($events2 as $e ){
            $factions[ $e->getFaction()]+=$e->getPoints();            
        }
            
        
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'events'=>$events,
            'ferocity'=>$ferocity,
            'points'=>$points,
            'factions'=>$factions,
            
        ]);
    }
}
