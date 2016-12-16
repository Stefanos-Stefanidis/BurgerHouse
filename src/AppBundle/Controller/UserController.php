<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Newsletter;
use AppBundle\Entity\Comments;
use AppBundle\Entity\Products;
use AppBundle\Entity\Login;
use AppBundle\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller 
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

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
    public function commentsAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('offset',0);

        $comments = $this->getDoctrine()
                    ->getRepository('AppBundle:Comments')
                    ->findAllLimit();
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
    public function nextAction($limit =5 ,Request $request)
    {     
        $session = $request->getSession();
        $offset = $session->get('offset');
            $offset = $offset +5;
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

    /**
    * @Route("/contact", name="contact")
    */
    public function contactAction()
    {
        if (isset($_POST['submit'])){
            $mailacc = $_POST['usermail'];
            $message = $_POST['message'];

            $to      = 'prettyfilemanager@gmail.com';
            $subject = 'the subject';
            $message = $message;
            $headers = 'From:'.$mailacc . "\r\n" .
                'Reply-To:'.$mailacc. "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
            $this->addFlash(
                'notice',
                'Mail send'
                );

            return $this->redirectToRoute('contact');        

        }else{
            return $this->render('default/contact.html.twig');        
        }

    }

    /**
    * @Route("/login", name="login")
    */
    public function loginAction(Request $request)
    {
        if (isset($_POST['loginBtn'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $userFound = $this->getDoctrine()
                    ->getRepository('AppBundle:Login')
                    ->findOneBy(
                    array('username' => $username, 'password' => $password));

                $userExist = $this->getDoctrine()
                    ->getRepository('AppBundle:Users')
                    ->findOneBy(
                    array('mail' => $username, 'password' => $password));
                    if ($userExist) {
                        $session = $request->getSession();
                        $session->set('user', 'logged');
                        return $this->redirectToRoute('list');
                    }
                    if ($userFound) {
                       
                        $isAdmin = $this->getDoctrine()
                        ->getRepository('AppBundle:Login')
                        ->findOneBy(
                        array('username' => $username, 'password' => $password,'type' => 'admin'));

                        if ($isAdmin) {
                            $session = $request->getSession();
                            $session->set('admin', 'TRUE');
                            return $this->redirectToRoute('homeAdmin'); 
                        }else{
                            return $this->redirectToRoute('list');                        
                        }
                       
                    }
                    else{
                        $this->addFlash(
                            'notice',
                            'Incorect username or password'
                        );
                        return $this->redirectToRoute('login');                        
                    }
        }else{
            return $this->render('default/login.html.twig');
        }
    }


    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        $listItems = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findAll();
        return $this->render('default/list.html.twig',array(
                'list'=>$listItems
            ));        

    } 


    /**
     * @Route("/details/{id}", name="details")
     */
    public function detailsAction($id=0, Request $request)
    {

        $listItem = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->find($id);
        if (!$listItem) {
            throw $this->createNotFoundException(
                'No product found for id '. $id
            );
        }
        return $this->render('default/details.html.twig',array(
                'item'=>$listItem
            ));        

    } 

    /**
     * @Route("/add-user", name="add-user")
     */
    public function registerAction(Request $request)
    {
        if (isset($_POST['firstName'])) {
            $name = $_POST['firstName'];
            $surname = $_POST['lastName'];
            $mail = $_POST['email'];
            $pass = $_POST['password'];

            $addUser = new Users();

            $addUser -> setName($name)
                    -> setLastname($surname)
                    -> setMail($mail)
                    -> setPassword($pass);
            $em = $this->getDoctrine()->getManager();
            $em->persist($addUser);
            $em->flush();
            return $this->redirectToRoute('login'); 
        }
       else{
            return $this->redirectToRoute('login');  
       }        

    } 


}
