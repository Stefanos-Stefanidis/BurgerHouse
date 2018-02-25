<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Validation\Constraints;

class ContactController extends Controller{

    /**
    * @Route("/contact", name="contact")
    */
    public function contactAction()
    {

        if (isset($_POST['submit'])){
            $mailacc = $_POST['usermail'];
            $subject  = $_POST['subject'];
            $message = $_POST['message'];
            $mail = 'ruzuroshiv@gmail.com';

            $check = new Constraints();
            if ($check->checkEmpty($message) || $check->checkEmpty($subject) || $check->checkEmpty($mailacc)) {

                $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mailacc)
                ->setTo($mail)
                ->setBody('Mail From '.$mailacc.'<br>'.$message,'text/html');
                $this->get('mailer')->send($message);
            }

            return $this->redirectToRoute('contact');        

        }else{
            return $this->render('default/contact.html.twig');        
        }

    }

}