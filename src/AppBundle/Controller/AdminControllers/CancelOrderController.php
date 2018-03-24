<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CancelOrderController extends Controller /*implements TokenAuthenticatedController*/
{

    /**
    * @Route("/cancel-order/{id}", name="cancelOrder")
    */
    public function cancelOrderAction($id=0,Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository('AppBundle:Notice')->find($id);

        $em->remove($order);
        $em->flush();
        $this->addFlash(
            'notice',
            'Item deleted'
            );
        return $this->redirectToRoute('viewOrders'); 

        

    } 

}
