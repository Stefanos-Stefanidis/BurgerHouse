<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Order;
use AppBundle\Entity\User;
use AppBundle\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class SendOrderController extends Controller{
   

    /**
    * @Route("/send-order", name="send-order")
    */
    public function sendAction(Request $request)
    {

        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            //$usermailsess = $this->getUser()->getEmail();
            $id = $this->getUser()->getId();
        }else{
            $usermailsess = $_SERVER['REMOTE_ADDR'];
        }
        
        $findOrder = $this->getDoctrine()
        ->getRepository('AppBundle:Cart')
        ->findByUserId($id);

        $order = new Order();
        $user = new User();
        $product = new Product();
        foreach ($findOrder as $value) {
            dump($user->setUserId($id)->getId($id));
            $order  -> setOrderId(1)
                    -> setUserId($user->setUserId($id))
                    -> setProductId($product->setProductId($id))
                    -> setQuantity(1);
                
            $em = $this->getDoctrine()->getManager();
            //$em->persist($order);
            $em->merge($order);
            $em->flush();

        }
   
        //dump($order[0]->getId());
        return new Response('done');
/*         $order =  $_POST['order'];
        $orderPrice =  $_POST['price'];
        $description =  $_POST['descr'];
        $trimOrder = rtrim($order, ":");
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];



        $notice = new Notice();
        $notice -> setProducts($trimOrder)
        -> setPrice($orderPrice)
        -> setName($firstName)
        -> setLastname($lastName)
        -> setEmail($email)
        -> setPhone($phone)
        ->setAddress($address)
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
        return $this->redirectToRoute('basket'); */
    }
}