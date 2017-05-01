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


class AdminHomepageController extends Controller /*implements TokenAuthenticatedController*/
{
        /**
     * @Route("/admin-homepage", name="homeAdmin")
     */
    public function adminAction(Request $request)
    {
 /*       $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {*/
            return $this->render('default/admin.html.twig');           
       /* }*/
     /*   else{
            return $this->render('default/login.html.twig');
            
        }*/
    }

}