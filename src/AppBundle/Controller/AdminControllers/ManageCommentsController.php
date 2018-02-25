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


class ManageCommentsController extends Controller /*implements TokenAuthenticatedController*/
{
   
 
    /**
     * @Route("/deleteComment/{id}", name="deleteComment")
     */
    public function deleteCommentAction($id=0, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:Comments')->find($id);
        $em->remove($item);
        $em->flush();
        $this->addFlash(
            'notice',
            'Comment deleted'
            );

        return $this->redirectToRoute('manageComments');

    }

    /**
    * @Route("/manage-comments", name="manageComments")
    */
    public function manageCommentsAction(Request $request)
    {


        $comments = $this->getDoctrine()
        ->getRepository('AppBundle:Comments')
        ->findAllDesc();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $comments,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 12)
        );

        return $this->render('default/manageComments.html.twig',array(
            'comments'=>$result
            ));        

        

    } 

}