<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SendEmailToSubscribers extends Controller
{
    /**
     * @Route("/send-email-subscribers", name="sendSubscribers")
     */
    public function sendEmailToSubscribersAction(Request $request)
    {
        $message = (new \Swift_Message('Hello Email'))
        ->setFrom('s.stevenidis@gmail.com')
        ->setTo('ruzuroshiv@gmail.com')
        ->setBody(
                    'sdsds'
      
  
        ) ;

    $this->get('mailer')->send($message);
    return $this->redirectToRoute('subscribers');  

    }

}