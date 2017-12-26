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


class LogoutController extends Controller /*implements TokenAuthenticatedController*/
{
    
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
     
        return $this->redirectToRoute('login');
            
    }

}