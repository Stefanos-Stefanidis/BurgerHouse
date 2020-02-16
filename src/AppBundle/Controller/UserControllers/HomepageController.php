<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Offers;
use AppBundle\Entity\AddToCart;

class HomepageController extends Controller{

	 /**
     * @Route("/", name="homepage")
     */
	 public function indexAction(Request $request)
	{


		$allOffers = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findAll();
        

        // $repository = $this->getDoctrine()
        // ->getRepository(Offers::class);
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $query = $entityManager->createQuery(
            'SELECT DISTINCT p.offer
            FROM AppBundle:Offers p'
        );
        
		$offersUuids = $query->getResult();
		
	 	return $this->render('default/index.html.twig',array(
	 		'allOffers'=>$allOffers,'offersUuids'=>$offersUuids
	 	));

    }
     
    /**
    * @Route("/singleOffer", name="singleOffer")
    */
    public function singleOffer() 
    {

        $uuid =  $_GET['uuid'];

        $productNamesArr= array();
        $productIdsArr= array();

        $allOffers = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findByOffer($uuid);
        
        
        foreach ($allOffers as $offer ) {
            array_push($productNamesArr,$offer->getProduct()->getName());
            array_push($productIdsArr,$offer->getProduct()->getId());
            $cart = new AddToCart();
            $cart -> setQuantity(1);
            $em = $this->getDoctrine()->getManager();
            $productId = $em->getRepository('AppBundle:Product')->findOneById($offer->getProduct()->getId()); 
            $user = $this->getUser();
            $cart -> setUserId($user);
            $cart -> setProductId($productId);
            
            $em->persist($cart);
            $em->flush();


        }
        
        $translated = $this->get('translator')->trans('Added to basket');
        
        $respone;
        $respone['message'] = $translated;
        
        return $this->json($respone);



    }

}