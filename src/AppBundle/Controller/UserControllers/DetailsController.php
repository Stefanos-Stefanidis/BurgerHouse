<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\Tag;


class DetailsController extends Controller{
    /**
     * @Route("/details/{id}", name="details")
     */
    public function detailsAction($id=0, Request $request)
    {


        $listItem   =   $this->getDoctrine()
                            ->getRepository('AppBundle:Product')
                            ->find($id);
        $rate       =    $this->getDoctrine()
                            ->getRepository('AppBundle:Rate')
                            ->findByPrid($id);
        $tag        =    $this->getDoctrine()
                            ->getRepository('AppBundle:Tag')
                            ->findByProduct($id);                    
        dump($id);
        if (!$listItem) {
            throw $this->createNotFoundException(
                'No product found for id '. $id
            );
        }
        return $this->render('default/details.html.twig',array(
                'item'=>$listItem,'rates'=>$rate,'tags'=>$tag
            ));        

    } 

}