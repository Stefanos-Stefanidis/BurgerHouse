<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\AddToCart;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class RemoveProductController extends Controller{
 
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id=0, Request $request)
    {   

        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:AddToCart')->find($id);
        $em->remove($item);
        $em->flush();
        $this->addFlash(
            'notice',
            'Item removed from basket'
        );
        return $this->redirectToRoute('basket');        
    }
}