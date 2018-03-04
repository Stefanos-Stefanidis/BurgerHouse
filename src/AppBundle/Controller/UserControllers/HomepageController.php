<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;
class HomepageController extends Controller{

	 /**
     * @Route("/", name="homepage")
     */
	 public function indexAction(Request $request)
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
	 	return $this->render('default/index.html.twig',array(
	 		'offers1'=>$offer1,'offers2'=>$offer2,'offers3'=>$offer3
	 		));

	 }

	}