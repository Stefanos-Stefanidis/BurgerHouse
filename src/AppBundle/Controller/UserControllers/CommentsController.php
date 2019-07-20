<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Comments;


class CommentsController extends Controller{

    /**
     * @Route("/comments", name="comments")
     */
    public function commentsAction(Request $request,$limit = 5)
    {
        $session = $request->getSession();
        $request->setLocale('el');
        $test = $request->getLocale();
        $offset = $session->get('offset');
        
        if ($offset < 0) {
            $offset = 0;
        }
        $comments = $this->getDoctrine()
                    ->getRepository('AppBundle:Comments')
                    ->findAllLimit($limit,$offset);

        return $this->render('default/comments.html.twig',array(
                'comments'=>$comments
            ));        

    }


    /**
     * @Route("/commentsRefresh", name="commentsRefresh")
     */
    public function commentsRefreshAction()
    {       

        $comments = $this->getDoctrine()
                    ->getRepository('AppBundle:Comments')
                    ->findAllLimit();
        return $this->render('default/commentsRefresh.html.twig',array(
                'comments'=>$comments
            ));        

    }  

    /**
    * @Route("/next", name="next")
    */
    public function nextAction($limit = 5 ,Request $request)
    {     
        $session = $request->getSession();
        $offset = $session->get('offset');
        
        $numOfComments = $this->getDoctrine()
        ->getRepository('AppBundle:Comments')
        ->findAll();

        if ($offset > sizeOf($numOfComments) - 5) {
            $this->addFlash(
                'notice',
                'No more comments'
                );        
            return new Response('false');
        }
        $offset = $offset + 5;
        $session->set('offset', $offset);
        $comments = $this->getDoctrine()
                    ->getRepository('AppBundle:Comments')
                    ->findAllLimit($limit,$offset);
            return $this->render('default/commentsRefresh.html.twig',array(
                'comments'=>$comments
            ));
    }

    /**
     * @Route("/previous", name="previous")
     */
    public function previousAction($limit = 5 ,Request $request)
    {
        $session = $request->getSession();
        $offset = $session->get('offset');

        if ($offset <= 0) {
            $this->addFlash(
                'notice',
                'No previous comments'
                );
        
        return new Response('false');
        }
        $offset = $offset - 5;
        $session->set('offset', $offset);
        $comments = $this->getDoctrine()
            ->getRepository('AppBundle:Comments')
            ->findAllLimit($limit,$offset);
        return $this->render('default/commentsRefresh.html.twig',array(
            'comments'=>$comments
        ));
    }
    /**
     * @Route("/commentsSubmit", name="commentsSubmit")
     */
    public function commentsSubmitAction(Request $request)
    {
        $rate = $_COOKIE['rate'];
        $username = $this->getUser()->getUsername();
        $comment =  $_POST['comment'];
        if (isset($username)) {
            $addComment = new Comments();
            $addComment -> setName($username)
                        -> setComment($comment)
                        -> setRate($rate);
            $em = $this->getDoctrine()->getManager();
            $em->persist($addComment);
            $em->flush();
            return $this->redirectToRoute('comments');  
        }else{
             return $this->redirectToRoute('mustLog');
        }

            

    } 
}