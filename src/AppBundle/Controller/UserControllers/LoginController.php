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

class LoginController extends Controller{

    /**
    * @Route("/login", name="login")
    */
    public function loginAction(Request $request)
    {      

        if (isset($_POST['loginBtn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
                    $result = "failed";
                return new Response($result);
            $userExist = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->loadUserByUsername($username);

            $hash = $userExist->getPassword();
            if (password_verify($password, $hash)){
   /*             $authenticationUtils = $this->get('security.authentication_utils');
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();*/
                
    
            }else{
                $result = "failed";
                return new Response($result);
            }

               /* $userExist = $this->getDoctrine()
                    ->getRepository('AppBundle:Users')
                    ->findOneBy(
                    array('mail' => $username, 'password' => $password));    
                    if ($userExist) {
                       
                        $isAdmin = $this->getDoctrine()
                        ->getRepository('AppBundle:Users')
                        ->findOneBy(
                        array('mail' => $username, 'password' => $password,'type' => 'admin'));

                        if ($isAdmin) {
                            $session = $request->getSession();
                            $session->set('admin', 'TRUE');
                            return $this->redirectToRoute('homeAdmin'); 
                        }else{
                            $session = $request->getSession();
                            $session->set('user', $username);
                            return $this->redirectToRoute('list');                        
                        }
                       
                    }
                    else{
                        $this->addFlash(
                            'notice',
                            'Incorect username or password'
                        );
                        return $this->redirectToRoute('login');                        
                    }*/
                }else{
                    return $this->render('default/login.html.twig');
                }
            }

        }