<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Products;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    /**
     * @Route("/admin-homepage", name="homeAdmin")
     */
    public function adminAction(Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin) {
            return $this->render('default/admin.html.twig');           
        }
        else{
            return $this->render('default/login.html.twig');
            
        }
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

        if ($admin) {
            
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

        if ($admin) {
            
            return $this->render('default/addOffer.html.twig');           
        }
        else{
            return $this->render('default/login.html.twig');
            
        }
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(Request $request)
    {
        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin) {
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

        if ($admin) {
            
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

        if ($admin) {
            
            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('AppBundle:Products')->find($id);
            $categories = $em->getRepository('AppBundle:Category')->findAll();
            return $this->render('default/editItem.html.twig',array(
                'item'=>$item,'categories'=>$categories
            ));        
            if (isset($_POST['update-btn'])) {

                $item->setName('New product name!');
                $em->flush();
                return $this->redirectToRoute('edit');

            }else{
                die('poulo');
            }
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
     * @Route("/item-update", name="itemUpdate")
     */
    public function itemUpdateAction(Request $request)
    {
          
               
            if (isset($_POST['update-btn'])) {
                $em = $this->getDoctrine()->getManager();
                $item = $em->getRepository('AppBundle:Products')->find(5);
                $name =  $_POST['productName'];

                $item->setName($name);
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

        if ($admin) {         
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
