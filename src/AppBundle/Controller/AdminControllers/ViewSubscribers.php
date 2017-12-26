<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ViewSubscribers extends Controller
{
    /**
     * @Route("/view-subscribers", name="subscribers")
     */
    public function adminAction(Request $request)
    {
        $subscriber = $this->getDoctrine()->getRepository('AppBundle:Newsletter')->findAll();

        return $this->render('default/subscribers.html.twig',array('subscribers'=>$subscriber));

    }

}