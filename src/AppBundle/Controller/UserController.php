<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Newsletter;
use AppBundle\Entity\Comments;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
/*        $conn = $this->get('database_connection');
        $users = $conn->fetchAll('SELECT * FROM comments');
        foreach ($conn->query($users) as $rows) {
                    $productID = $rows ['name'];
                    $productName = $rows['comment'];
           
                
            }*/
        return $this->render('default/index.html.twig');
    }

     /**
     * @Route("/newslettter", name="newslettter")
     */
    public function mailAction()
    {

    	
        $usermail =  $_POST['usermail'];
	  
        // replace this example code with whatever you need
        $mail = new Newsletter();

        $mail 	-> setMail($usermail)
    			-> setDate(date('Y-m-d'));
        $em = $this->getDoctrine()->getManager();

	    // tells Doctrine you want to (eventually) save the Product (no queries yet)
	    $em->persist($mail);

	    // actually executes the queries (i.e. the INSERT query)
	    $em->flush();

	    return $this->render('default/index.html.twig');        


    }	

    /**
     * @Route("/comments", name="comments")
     */
    public function commentsAction()
    {
        $comments = $this->getDoctrine()
                    ->getRepository('AppBundle:Comments')
                    ->findAll();
        return $this->render('default/comments.html.twig',array(
                'comments'=>$comments
            ));        

    }  


    /**
     * @Route("/commentsSubmit", name="commentsSubmit")
     */
    public function commentsSubmitAction()
    {
        $username =  $_POST['username'];
        $comment =  $_POST['comment'];
      
        // replace this example code with whatever you need
        $addComment = new Comments();

        $addComment -> setName($username)
                -> setComment($comment);
        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($addComment);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        return $this->render('default/index.html.twig');        
              


    }  
}
