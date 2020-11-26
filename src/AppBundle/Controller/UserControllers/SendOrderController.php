<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Basket;
use AppBundle\Entity\Notice;
use AppBundle\Entity\NoticeInfo;
use AppBundle\Entity\User;
use AppBundle\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


class SendOrderController extends Controller{
   

    /**
    * @Route("/send-order", name="send-order")
    */
    public function sendAction(Request $request)
    {

        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $userId = $this->getUser()->getId();
        }else{
            $usermailsess = $_SERVER['REMOTE_ADDR'];
        }
        
        $address = $_POST['address'];
        $floor = $_POST['floor'];
        $area = $_POST['area'];
        $post_code = $_POST['post_code'];
        $ring_name = $_POST['ring_name'];
        $extra = $_POST['extra'];
        $order_sum = $_POST['order_sum'];

        $findOrder = $this->getDoctrine()
        ->getRepository('AppBundle:AddToCart')
        ->findByUserId($userId);
        
        $uuid4 = Uuid::uuid4();

        $user = $this->getUser();
        foreach ($findOrder as $value) {
            $newOrder = new Notice();
            $em = $this->getDoctrine()->getManager();
            $newOrder -> setQuantity($value->getQuantity());
            $newOrder -> setComment($value->getComment());
            $newOrder -> setProductId($value->getProductId());
            $newOrder -> setNoticeId($uuid4);
            $newOrder -> setOrderStatus('PROCESSING');

            $em->persist($newOrder);
            $em->flush();
        } 

        $newOrderInfo = new NoticeInfo();
        $em = $this->getDoctrine()->getManager();

        $newOrderInfo -> setAddress($address);
        $newOrderInfo -> setFloor($floor);
        $newOrderInfo -> setArea($area);
        $newOrderInfo -> setPostCode($post_code);
        $newOrderInfo -> setRingName($ring_name);
        $newOrderInfo -> setUserId($user);
        $newOrderInfo -> setExtra($extra);
        $newOrderInfo -> setOrderStatus('PROCESSING');
        $newOrderInfo -> setNoticeId($uuid4);
        $newOrderInfo -> setOrderSum($order_sum);

        $em->persist($newOrderInfo);
        $em->flush();
        
        foreach ($findOrder as $item) {
            dump($item->getId());
            $em = $this->getDoctrine()->getManager();
            $itemDlt = $em->getRepository('AppBundle:AddToCart')->find($item->getId());
            $em->remove($itemDlt);
            $em->flush();
        }

        $this->addFlash(
            'notice',
            'Order Send'
        );
        
        return $this->redirectToRoute('basket'); 
    }
}