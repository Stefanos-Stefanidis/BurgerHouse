<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Newsletter;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class NewsLetterContoller extends Controller{
 

     /**
     * @Route("/newslettter", name="newslettter")
     */
    public function mailAction()
    {


        $usermail =  $_GET['usermail'];
        $respone;
      
        $em = $this->getDoctrine()->getManager();

        $mailExists = $em->getRepository('AppBundle:Newsletter')->findOneByMail($usermail); 
        if ($mailExists) {
            $translated = $this->get('translator')->trans('User exists');
            
            $respone['message'] = $translated;
            $respone['error'] = 1;
    
            return $this->json($respone);
        }


        // replace this example code with whatever you need
        $mail = new Newsletter();

        $mail   -> setMail($usermail)
                -> setDate(date('Y-m-d'));

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($mail);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        $translated = $this->get('translator')->trans('Thank you for subscribing to our newsletter');
            
        $respone['message'] = $translated;

        return $this->json($respone);


    }
}