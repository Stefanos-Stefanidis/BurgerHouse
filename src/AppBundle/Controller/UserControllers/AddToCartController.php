<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\AddToCart;
use AppBundle\Entity\User;


class AddToCartController extends Controller{
 

    /**
     * @Route("/addToCart/{id}", name="AddToCart")
     */
    public function cartAction($id=0,Request $request)
    {
        

        if (!empty($_POST["productQuantity"])) {


            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $usermailsess = $this->getUser()->getEmail();
            }else{
                $usermailsess = $_SERVER['REMOTE_ADDR'];
            }

            $productQuantity =  $_POST['productQuantity']; 
            $productComment =  $_POST['productComment']; 

            $cart = new AddToCart();
            $cart -> setQuantity($productQuantity);
            $cart -> setComment($productComment);
            
            $em = $this->getDoctrine()->getManager();
            $productId = $em->getRepository('AppBundle:Product')->findOneById($id); 
            $user = $this->getUser();
            $cart -> setUserId($user);
            $cart -> setProductId($productId);
            
            $em->persist($cart);
            $em->flush();

    
            return $this->redirectToRoute('homepage');
        }
        else{
            return $this->redirectToRoute('homepage');

        }



    }
}