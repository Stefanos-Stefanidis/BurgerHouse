<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Rate;


class RateController extends Controller{
 
    /**
     * @Route("/rate", name="rate")
     */
    public function rateAction(Request $request)
    {

        $usermailsess = $this->getUser()->getEmail();

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