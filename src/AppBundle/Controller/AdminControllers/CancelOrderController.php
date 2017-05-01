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


class CancelOrderController extends Controller /*implements TokenAuthenticatedController*/
{

    /**
    * @Route("/cancel-order/{id}", name="cancelOrder")
    */
    public function cancelOrderAction($id=0,Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {         
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
        else{
            return $this->render('default/login.html.twig');    
        }

    } 

}
