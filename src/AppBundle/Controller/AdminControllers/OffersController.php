<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ramsey\Uuid\Uuid;
use AppBundle\Entity\Offers;



class OffersController extends Controller
{
   /**
     * @Route("/offer", name="offer")
     */
    public function offerAction(Request $request)
    {


    $allProducts = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->findAll();

    $allOffers = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findAll();
        

        $repository = $this->getDoctrine()
        ->getRepository(Offers::class);
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $query = $entityManager->createQuery(
            'SELECT DISTINCT p.offer
            FROM AppBundle:Offers p'
        );
        
        $offersUuids = $query->getResult();
        dump($offersUuids);

    return $this->render('default/addOffer.html.twig',array(
        'allProducts'=>$allProducts, 'allOffers'=>$allOffers, 'offersUuids'=>$offersUuids
    ));        

    }


    /**
    * @Route("/edit-offers", name="editOffers")
    */
    public function createOfferAction($id=0,Request $request)
    {

        $Offers = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findAll();

        $offer = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findByOffer($id);

        return $this->render('default/manageOffers.html.twig',array(
            'offers'=>$offer,'product'=>$product
            ));          

    }
    
    /**
    * @Route("/remove-offer/{id}", name="removeOffer")
    */
    public function removeOfferAction($id=0, Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        
        $query = $entityManager->createQuery(
            'DELETE 
            FROM AppBundle:Offers o
            WHERE o.offer = :id 
            '
        )->setParameter('id', $id);

        $query->execute();

        return $this->redirectToRoute('offer');

    }
    /**
    * @Route("/post-offer", name="post-offer")
    */
    public function postOfferAction(Request $request)
    {


        $price =  $_POST['newPrice'];
        $productIds =  $_POST['productIds'];
        $productArray = explode(',', $productIds);
        
        $uuid4 = Uuid::uuid4();
        
        foreach ($productArray as $productId) {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('AppBundle:Product')->findOneById($productId);
            $offer = new Offers();
            $offer -> setPrice($price);
            $offer -> setOffer($uuid4);
            $offer -> setProduct($product);
    
            $em->persist($offer);
            $em->flush();
        }
        return $this->redirectToRoute('offer');          

    }

}