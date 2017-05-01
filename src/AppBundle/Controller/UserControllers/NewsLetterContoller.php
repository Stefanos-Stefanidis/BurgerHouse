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

        
        $usermail =  $_POST['usermail'];
      
        // replace this example code with whatever you need
        $mail = new Newsletter();

        $mail   -> setMail($usermail)
                -> setDate(date('Y-m-d'));
        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($mail);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return $this->render('default/index.html.twig');        


    }
}