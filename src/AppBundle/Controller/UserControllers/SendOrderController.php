<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Notice;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class SendOrderController extends Controller{
 

    /**
    * @Route("/send-order", name="send-order")
    */
    public function sendAction(Request $request)
    {
        $session = $request->getSession();
        $usermailsess = $session->get('user');

        $order =  $_POST['order'];
        $orderPrice =  $_POST['price'];
        $description =  $_POST['descr'];
        $trimOrder = rtrim($order, ":");

        $notice = new Notice();
        $notice -> setProducts($trimOrder)
                -> setPrice($orderPrice)
                ->setUser($usermailsess)
                ->setDescription($description);

        $em = $this->getDoctrine()->getManager();
        $em->persist($notice);
        $em->flush();

        $em = $this->getDoctrine()->getManager();
        $cartArray = $em->getRepository('AppBundle:Cart')->findByUser($usermailsess);

        foreach ($cartArray as $cart) {
            $em->remove($cart);
        }

        $em->flush();
        return $this->redirectToRoute('basket');
       
    } 
}