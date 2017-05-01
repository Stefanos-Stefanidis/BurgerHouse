<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Rate;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class CartController extends Controller{
 
    /**
     * @Route("/rate", name="rate")
     */
    public function rateAction(Request $request)
    {
        $session = $request->getSession();
        $usermailsess = $session->get('user');

        if (isset($usermailsess)){
            $prid =  $_POST['prid'];
            $rating =  $_POST['rate'];
            
            $isVoted = $this->getDoctrine()
                    ->getRepository('AppBundle:Rate')
                    ->findOneBy(
                    array('prid' => $prid, 'user' => $usermailsess));
            
            if ($isVoted) {
                
                $em = $this->getDoctrine()->getManager();
                $isVoted = $em->getRepository('AppBundle:Rate')->findOneBy(
                    array('prid' => $prid, 'user' => $usermailsess));

                $isVoted->setRate($rating);
                $em->flush();
            }else
            {
                $rate = new Rate();

                $rate -> setPrid($prid)
                        -> setRate($rating)
                        -> setUser($usermailsess);
                    
                $em = $this->getDoctrine()->getManager();
                $em->persist($rate);
                $em->flush();
            }

            return $this->redirectToRoute('list');

        }
    }

}