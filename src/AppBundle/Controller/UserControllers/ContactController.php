<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class ContactController extends Controller{

    /**
    * @Route("/contact", name="contact")
    */
    public function contactAction()
    {
        if (isset($_POST['submit'])){
            $mailacc = $_POST['usermail'];
            $message = $_POST['message'];

            $to      = 'prettyfilemanager@gmail.com';
            $subject = 'the subject';
            $message = $message;
            $headers = 'From:'.$mailacc . "\r\n" .
                'Reply-To:'.$mailacc. "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
            $this->addFlash(
                'notice',
                'Mail send'
                );

            return $this->redirectToRoute('contact');        

        }else{
            return $this->render('default/contact.html.twig');        
        }

    }

}