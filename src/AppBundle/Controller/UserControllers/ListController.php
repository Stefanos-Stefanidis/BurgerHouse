<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Products;
use AppBundle\Entity\Login;
use AppBundle\Entity\Users;
use AppBundle\Entity\Notice;
use AppBundle\Entity\Rate;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class ListController extends Controller{

    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        $listAppet = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findByCategory('appetizer');

        $listSalads = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findByCategory('salad');


        $listBurgers = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findByCategory('burgers');

        $listDrinks = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findByCategory('drinks');

        return $this->render('default/list.html.twig',array(
                'appetizers'=>$listAppet,'salads'=>$listSalads,
                'burgers'=>$listBurgers,'drinks'=>$listDrinks
            ));        

    } 


}