<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Offers;



class OffersController extends Controller
{
   /**
     * @Route("/offer", name="offer")
     */
   public function offerAction(Request $request)
   {



    $offer1 = $this->getDoctrine()
    ->getRepository('AppBundle:Offers')
    ->findByOffer(1);
    $offer2 = $this->getDoctrine()
    ->getRepository('AppBundle:Offers')
    ->findByOffer(2);
    $offer3 = $this->getDoctrine()
    ->getRepository('AppBundle:Offers')
    ->findByOffer(3);

    return $this->render('default/addOffer.html.twig',array(
        'offers1'=>$offer1,'offers2'=>$offer2,'offers3'=>$offer3
        ));        

}


    /**
    * @Route("/createOffer/{id}", name="createOffer")
    */
    public function createOfferAction($id=0,Request $request)
    {

        $product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->findAll();

        $offer = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findByOffer($id);

        return $this->render('default/manageOffers.html.twig',array(
            'offers'=>$offer,'product'=>$product
            ));          

    }
    
    /**
    * @Route("/remove", name="removeOffer")
    */
    public function removeOfferAction(Request $request)
    {
        $id =  $_POST['removeid'];
        $em = $this->getDoctrine()->getManager();
        $offer = $em->getRepository('AppBundle:Offers')->find($id);

        $em->remove($offer);
        $em->flush();

        return $this->redirectToRoute('createOffer');

    }
    /**
    * @Route("/post-offer", name="post-offer")
    */
    public function postOfferAction(Request $request)
    {
        $offer =  $_POST['products'];
        $prprice =  $_POST['price'];
        $offerNum =  $_POST['offer'];
        
        $offerArray = explode(",",$offer);
        $priceArray = explode(",",$prprice);
        
        for ($i=0; $i < (sizeof($offerArray)-1) ; $i++) { 
            $createOffer = new Offers();
            $createOffer  -> setProduct($offerArray[$i])
            -> setTimes($priceArray[$i])
            ->setOffer($offerNum);

            $em = $this->getDoctrine()->getManager();
            $em->persist($createOffer);
            $em->flush();

        }
        

        return $this->redirectToRoute('createOffer');          

    }

}