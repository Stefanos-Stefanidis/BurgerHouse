<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Notice;

class FinishOrderController extends Controller 
{

    /**
    * @Route("/finish-order/{id}", name="FinishlOrder")
    */
    public function FinishlOrderAction($id=0,Request $request)
    {



        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
            'UPDATE AppBundle:Notice o
            SET o.orderStatus = :orderStatus
            WHERE o.noticeId = :id 
            '
        )->setParameter('id', $id)->setParameter('orderStatus', 'FINISH');

        $query->execute();

        $query = $em->createQuery(
            'UPDATE AppBundle:NoticeInfo o
            SET o.orderStatus = :orderStatus
            WHERE o.noticeId = :id 
            '
        )->setParameter('id', $id)->setParameter('orderStatus', 'FINISH');

        $query->execute();

        $this->addFlash(
            'notice',
            'Order Finished'
        );
        return $this->redirectToRoute('viewOrders'); 

        

    } 

}
