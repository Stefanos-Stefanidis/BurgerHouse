<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Notice;

class CancelOrderController extends Controller /*implements TokenAuthenticatedController*/
{

    /**
    * @Route("/cancel-order/{id}", name="cancelOrder")
    */
    public function cancelOrderAction($id=0,Request $request)
    {



        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
            'UPDATE AppBundle:Notice o
            SET o.orderStatus = :orderStatus
            WHERE o.noticeId = :id 
            '
        )->setParameter('id', $id)->setParameter('orderStatus', 'CANCEL');

        $query = $em->createQuery(
            'UPDATE AppBundle:NoticeInfo o
            SET o.orderStatus = :orderStatus
            WHERE o.noticeId = :id 
            '
        )->setParameter('id', $id)->setParameter('orderStatus', 'CANCEL');

        $query->execute();

        $this->addFlash(
            'notice',
            'Item deleted'
            );
        return $this->redirectToRoute('viewOrders'); 

        

    } 

}
