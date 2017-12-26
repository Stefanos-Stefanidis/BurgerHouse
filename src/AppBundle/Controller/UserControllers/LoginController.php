<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Users;
use AppBundle\Entity\Rate;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    /**
     * @Route("/login", name="login")
     */


    public function loginAction(Request $request)
    {

        if (isset($_POST['loginBtn'])) {

            $username = $_POST['_username'];
            $password = $_POST['_password'];
            $userExist = $this->getDoctrine()
                ->getRepository('AppBundle:Users')
                ->loadUserByUsername($username);

            $hash = $userExist->getPassword();
            if (password_verify($password, $hash)) {
                $authenticationUtils = $this->get('security.authentication_utils');
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();
                return new Response('success');

            }


        } else {
            return $this->render('default/login.html.twig');
        }
    }

}