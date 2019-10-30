<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Notice;

class ViewOrdersController extends Controller /*implements TokenAuthenticatedController*/
{
   
    /**
    * @Route("/view-orders/", name="viewOrders")
    */
    public function viewOrdersAction($id=0, Request $request)
    {


        $entityManager = $this->getDoctrine()->getManager();

        $notice = [];
        
        $query = $entityManager->createQuery(
            'SELECT DISTINCT n.noticeId
            FROM AppBundle:Notice n
            WHERE n.orderStatus = :orderStatus'
        )->setParameter('orderStatus', 'PROCESSING');

        $productUuids = $query->getResult();
       

/*         $address = $this->getDoctrine()
        ->getRepository('AppBundle:Notice')
        ->findOneByNoticeId($id); */
        return $this->render('default/viewOrders.html.twig',array(
            'notices'=>$notice, 'productUuids'=>$productUuids
        ));        

    } 

    /**
    * @Route("/view-order/{id}", name="viewOrder")
    */
    public function viewOrderAction($id=0, Request $request)
    {


        $entityManager = $this->getDoctrine()->getManager();

        $notice = $this->getDoctrine()
        ->getRepository('AppBundle:Notice')
        ->findByNoticeId($id);
        
        $query = $entityManager->createQuery(
            'SELECT DISTINCT n.noticeId, n.dateOrder
            FROM AppBundle:Notice n
            WHERE n.orderStatus = :orderStatus
            ORDER BY n.dateOrder DESC'
        )->setParameter('orderStatus', 'PROCESSING');

        $productUuids = $query->getResult();

        return $this->render('default/viewOrders.html.twig',array(
            'notices'=>$notice, 'productUuids'=>$productUuids
        ));        

    } 

}