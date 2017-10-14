<?php

namespace AppBundle\Controller;
use AppBundle\Form\EventType;
use AppBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EventController extends Controller
{
    
   /**
     * @Route("/new_action", name="action_submission")
     */
    public function newAction(Request $request)
    {
        // 1) build the form
        $event = new Event();
        $event->setUser($this->get('security.token_storage')->getToken()->getUser());
        
        $form = $this->createForm(EventType::class, $event);
        
        


        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            
            $data = $form->getData();
            
                       
            
            
            
                        
            // 4) save 
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            
            // todo, ale zatím jsou valid vždy, tak musím
            $u=$this->get('security.token_storage')->getToken()->getUser();
            $u->recalculate();
            $em->persist($u);
            $em->flush();
            
                
            
            
            //@todo send mail
            $this->get('security.token_storage')->getToken()->getUser()->recalculate();
            
      
            return $this->redirectToRoute('homepage');
        }

        
        
        return $this->render(
            'default/new_event.html.twig',
            array('form' => $form->createView())
        );
    }
    
    
    
}