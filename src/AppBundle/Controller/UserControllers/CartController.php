<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;


class CartController extends Controller{
 

    /**
     * @Route("/cart/{id}", name="cart")
     */
    public function cartAction($id=0,Request $request)
    {
        

        if (!empty($_POST["name"])) {


            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $usermailsess = $this->getUser()->getEmail();
            }else{
                $usermailsess = $_SERVER['REMOTE_ADDR'];
            }


            $prname =  $_POST['name'];
            $prprice =  $_POST['price'];



            $cart = new Cart();

            $cart   -> setPrname($prname)
                    -> setPrice($prprice)
                    ->setUser($usermailsess);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cart);
            $em->flush();

    
            return $this->redirectToRoute('homepage');
        }
        else{
            return $this->redirectToRoute('homepage');

        }



    }
}