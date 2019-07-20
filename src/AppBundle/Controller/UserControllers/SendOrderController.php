<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Basket;
use AppBundle\Entity\Notice;
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
        

        $findOrder = $this->getDoctrine()
        ->getRepository('AppBundle:AddToCart')
        ->findByUserId($userId);
        
        $uuid4 = Uuid::uuid4();

        $user = $this->getUser();
        foreach ($findOrder as $value) {
            $newOrder = new Notice();
            $em = $this->getDoctrine()->getManager();
            $newOrder -> setQuantity($value->getQuantity());
            $newOrder -> setUserId($user);
            $newOrder -> setNoticeId($uuid4);
            $newOrder -> setProductId($value->getProductId());

            $em->persist($newOrder);
            $em->flush();
        } 


        
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