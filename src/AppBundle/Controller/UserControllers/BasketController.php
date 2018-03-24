<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class BasketController extends Controller{


    /**
     * @Route("/basket", name="basket")
     */
    public function basketAction(Request $request)
    {
            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $usermailsess = $this->getUser()->getEmail();
            }else{
                $usermailsess = $_SERVER['REMOTE_ADDR'];
            }
           $offer1 = $this->getDoctrine()
           ->getRepository('AppBundle:Offers')
           ->findByOffer(1);
           $offer2 = $this->getDoctrine()
           ->getRepository('AppBundle:Offers')
           ->findByOffer(2);
           $offer3 = $this->getDoctrine()
           ->getRepository('AppBundle:Offers')
           ->findByOffer(3);

           $basket = $this->getDoctrine()
           ->getRepository('AppBundle:Cart')
           ->findByUser($usermailsess);

           $notice = $this->getDoctrine()
           ->getRepository('AppBundle:Notice')
           ->findByEmail($usermailsess);
            dump($basket);
           return $this->render('default/basket.html.twig',array(
            'items'=>$basket,'offers1'=>$offer1,'offers2'=>$offer2,
            'offers3'=>$offer3,'notices'=>$notice
            ));        

    

}  
}