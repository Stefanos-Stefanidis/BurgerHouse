<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MustLogController extends Controller 
{

    /**
     * @Route("/mustLog", name="mustLog")
     */
    public function logAction(Request $request)
    {
      
        return $this->render('default/notLogged.html.twig');
       
    }
}
