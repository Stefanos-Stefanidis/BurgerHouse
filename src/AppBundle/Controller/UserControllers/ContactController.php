<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller{

    /**
    * @Route("/contact", name="contact")
    */
    public function contactAction()
    {
        if (isset($_POST['submit'])){
            $mailacc = $_POST['usermail'];
            $message = $_POST['message'];
            $subject  = $_POST['subject'];
            $mail = 'ruzuroshiv@gmail.com';

            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mailacc)
                ->setTo($mail)
                ->setBody('Mail From '.$mailacc.'<br>'.$message,'text/html');
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('contact');        

        }else{
            return $this->render('default/contact.html.twig');        
        }

    }

}