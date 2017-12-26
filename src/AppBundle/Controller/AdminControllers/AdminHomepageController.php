<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminHomepageController extends Controller /*implements TokenAuthenticatedController*/
{
    /**
     * @Route("/admin-homepage", name="homeAdmin")
     */
    public function adminAction(Request $request)
    {

            return $this->render('default/admin.html.twig');           

    }

}