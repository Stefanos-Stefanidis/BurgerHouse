<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Products;
use AppBundle\Entity\Rate;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class DetailsController extends Controller{
    /**
     * @Route("/details/{id}", name="details")
     */
    public function detailsAction($id=0, Request $request)
    {

        $listItem = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->find($id);
        $rate =    $this->getDoctrine()
                    ->getRepository('AppBundle:Rate')
                    ->findByPrid($id);
        if (!$listItem) {
            throw $this->createNotFoundException(
                'No product found for id '. $id
            );
        }
        return $this->render('default/details.html.twig',array(
                'item'=>$listItem,'rates'=>$rate
            ));        

    } 

}