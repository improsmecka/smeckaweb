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
    public function newAction(Request $request, \Swift_Mailer $mailer)
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
            
                     
             
            
            
            $message = (new \Swift_Message('New event'))
        ->setFrom('no-reply@improsmecka.cz')
        ->setTo('improsmecka@gmail.com')
        ->setBody('New event in the database','text/plain');
         $mailer->send($message);    
      
            
            
            
            
      
            return $this->redirectToRoute('homepage');
        }

        
        
        return $this->render(
            'default/new_event.html.twig',
            array('form' => $form->createView())
        );
    }
    
    
    
}