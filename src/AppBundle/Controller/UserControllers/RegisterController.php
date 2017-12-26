<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;
use AppBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class RegisterController extends Controller{
 
    /**
     * @Route("/add-user", name="add-user")
     */
    public function registerAction(Request $request)
    {
    if (isset($_POST['_firstName'])) {
            $username = $_POST['_firstName'];
            $mail = $_POST['_email'];
            $password = $_POST['_password'];
            $address = $_POST['_address'];
            $lastname = $_POST['_lastname'];
            $phone = $_POST['_phone'];

            $usernameExist = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('username' => $username));

            $usermail = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('email' => $mail));

            if ($usernameExist) {
                $result = "name exist";
                return new Response($result);
            }

            if ($usermail) {
                $result = "mail exist";
                return new Response($result);
            }

            $encoder = $this->container->get('security.password_encoder');
            $addUser = new Users();
            $encoded = $encoder->encodePassword($addUser, $password);

            $addUser -> setUsername($username)
                -> setEmail($mail)
                -> setAddress($address)
                -> setPhone($phone)
                ->setLastname($lastname)
                -> setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($addUser);
            $em->flush();
            $result = "success";
            return new Response($result); 
        }
       else{
            return $this->redirectToRoute('login');  
       }        

    } 



}