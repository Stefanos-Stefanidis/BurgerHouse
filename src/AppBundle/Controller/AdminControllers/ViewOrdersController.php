<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Products;
use AppBundle\Entity\Category;
use AppBundle\Entity\Offers;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Controller\TokenAuthenticatedController;


class ViewOrdersController extends Controller /*implements TokenAuthenticatedController*/
{
 
    /**
    * @Route("/view-orders/{id}", name="viewOrders")
    */
    public function viewOrdersAction($id=0, Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $offer1 = $this->getDoctrine()
                ->getRepository('AppBundle:Offers')
                ->findByOffer(1);
            $offer2 = $this->getDoctrine()
                ->getRepository('AppBundle:Offers')
                ->findByOffer(2);
            $offer3 = $this->getDoctrine()
                ->getRepository('AppBundle:Offers')
                ->findByOffer(3);   

            $menu = $this->getDoctrine()
            ->getRepository('AppBundle:Notice')
            ->findBy(array(), array('date' => 'ASC'));

            $notice = $this->getDoctrine()
                ->getRepository('AppBundle:Notice')
                ->findById($id);
            return $this->render('default/viewOrders.html.twig',array(
                'notices'=>$notice,'menus'=>$menu,'offers1'=>$offer1,'offers2'=>$offer2,
                'offers3'=>$offer3
                ));        

        }
        else{
            return $this->render('default/login.html.twig');    
        }

    } 

}