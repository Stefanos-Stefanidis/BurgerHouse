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
        

        if (!empty($_GET["productQuantity"])) {

            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $usermailsess = $this->getUser()->getEmail();
            }else{
                $usermailsess = $_SERVER['REMOTE_ADDR'];
            }

            $productQuantity =  $_GET['productQuantity']; 
            $productComment =  $_GET['productComment']; 
            $id =  $_GET['productId']; 

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

    
            $translated = $this->get('translator')->trans('Added to basket');
            
            $respone;
            $respone['message'] = $translated;
  
            return $this->json($respone);
        }
        else{
            return $this->redirectToRoute('homepage');

        }



    }
}