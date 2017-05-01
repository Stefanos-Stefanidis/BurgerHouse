<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Products;
use AppBundle\Entity\Users;
use AppBundle\Entity\Notice;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class CartController extends Controller{
 

    /**
     * @Route("/cart/{id}", name="cart")
     */
    public function cartAction($id=0,Request $request)
    {
        
        $session = $request->getSession();
        if (!empty($_POST["name"])) {
            $usermailsess = $session->get('user');
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