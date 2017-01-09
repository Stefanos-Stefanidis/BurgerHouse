<?php

namespace AppBundle\Controller;

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


class AdminController extends Controller /*implements TokenAuthenticatedController*/
{
    /**
     * @Route("/admin-homepage", name="homeAdmin")
     */
    public function adminAction(Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {
            return $this->render('default/admin.html.twig');           
        }
        else{
            return $this->render('default/login.html.twig');
            
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('admin', 'FALSE');

        return $this->redirectToRoute('login');
            
    }
    /**
     * @Route("/add-product", name="add-product")
     */
    public function indexAction(Request $request)
    {

        if (isset($_POST['add-btn'])) {

            $name =  $_POST['productName'];
            $price =  $_POST['price'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $tags = $_POST['tags'];

            $addProduct = new Products();

            $addProduct -> setName($name)
            -> setPrice($price)
            -> setCategory($category)
            -> setDescription($description)
            -> setTags($tags);

            $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($addProduct);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Product added'
                );
            return $this->redirectToRoute('add-product'); 

        }

        if (isset($_POST['category-btn'])) {
            $categoryName = $_POST['addCategory'];

            $addCategory = new Category();

            $addCategory -> setName($categoryName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($addCategory);
            $em->flush();
            $this->addFlash(
                'notice',
                'Category added'
                );

            return $this->redirectToRoute('add-product'); 

        }

        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();
            return $this->render('default/addProduct.html.twig',array(
                'category'=>$categories
                ));           
        }
        else{
            return $this->render('default/login.html.twig');
            
        }

    }

    /**
     * @Route("/offer", name="offer")
     */
    public function offerAction(Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $offer1 = $this->getDoctrine()
            ->getRepository('AppBundle:Offers')
            ->findByOffer(1);
            $offer2 = $this->getDoctrine()
            ->getRepository('AppBundle:Offers')
            ->findByOffer(2);
            $offer3 = $this->getDoctrine()
            ->getRepository('AppBundle:Offers')
            ->findByOffer(3);

            return $this->render('default/addOffer.html.twig',array(
                'offers1'=>$offer1,'offers2'=>$offer2,'offers3'=>$offer3
                ));        
        }
        else{
            return $this->render('default/login.html.twig');
            
        }
    }


    /**
    * @Route("/createOffer/{id}", name="createOffer")
    */
    public function createOfferAction($id=0,Request $request)
    {

        $product = $this->getDoctrine()
        ->getRepository('AppBundle:Products')
        ->findAll();

        $offer = $this->getDoctrine()
        ->getRepository('AppBundle:Offers')
        ->findByOffer($id);

        return $this->render('default/manageOffers.html.twig',array(
            'offers'=>$offer,'products'=>$product
            ));          

    }
    
    /**
    * @Route("/remove", name="removeOffer")
    */
    public function removeOfferAction(Request $request)
    {
        $id =  $_POST['removeid'];
        $em = $this->getDoctrine()->getManager();
        $offer = $em->getRepository('AppBundle:Offers')->find($id);

        $em->remove($offer);
        $em->flush();

        return $this->redirectToRoute('createOffer');

    }
    /**
    * @Route("/post-offer", name="post-offer")
    */
    public function postOfferAction(Request $request)
    {
        $offer =  $_POST['products'];
        $prprice =  $_POST['price'];
        $offerNum =  $_POST['offer'];
       
        $offerArray = explode(",",$offer);
        $priceArray = explode(",",$prprice);
        
        for ($i=0; $i < (sizeof($offerArray)-1) ; $i++) { 
                $createOffer = new Offers();
                $createOffer  -> setProduct($offerArray[$i])
                -> setTimes($priceArray[$i])
                ->setOffer($offerNum);

                $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $em->persist($createOffer);

            // actually executes the queries (i.e. the INSERT query)
                $em->flush();

        }
        

        return $this->redirectToRoute('createOffer');          

    }
    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {
            $listItems = $this->getDoctrine()
            ->getRepository('AppBundle:Products')
            ->findAll();
            return $this->render('default/editList.html.twig',array(
                'list'=>$listItems
                ));            
        }
        else{
            return $this->render('default/login.html.twig');
            
        }

    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id=0, Request $request)
    {   

        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('AppBundle:Products')->find($id);

            $em->remove($item);
            $em->flush();
            $this->addFlash(
                'notice',
                'Item deleted'
                );
            return $this->redirectToRoute('edit');        
        }
        else{
            return $this->render('default/login.html.twig');
            
        }


    }

    /**
     * @Route("/edit-item/{id}", name="editItem")
     */
    public function editItemAction($id=0, Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('AppBundle:Products')->find($id);
            $categories = $em->getRepository('AppBundle:Category')->findAll();
            return $this->render('default/editItem.html.twig',array(
                'item'=>$item,'categories'=>$categories
                ));        

            $this->addFlash(
                'notice',
                'Item deleted'
                );
        }
        else{
            return $this->render('default/login.html.twig');
            
        }

    }

    /**
     * @Route("/item-update/{id}", name="itemUpdate")
     */
    public function itemUpdateAction(Request $request,$id=0)
    {


        if (isset($_POST['update-btn'])) {

            $name =  $_POST['productName'];
            $price =  $_POST['price'];
            $category =  $_POST['category'];
            $description =  $_POST['description'];
            $tags =  $_POST['tags'];

            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('AppBundle:Products')->find($id);

            $item->setName($name);
            $item->setPrice($price);
            $item->setCategory($category);
            $item->setDescription($description);
            $item->setTags($tags);
            $em->flush();
            return $this->redirectToRoute('edit');

        }
    }

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
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {         
            $comments = $this->getDoctrine()
            ->getRepository('AppBundle:Comments')
            ->findAllDesc();
            return $this->render('default/manageComments.html.twig',array(
                'comments'=>$comments
                ));        

        }
        else{
            return $this->render('default/login.html.twig');    
        }

    } 
}
