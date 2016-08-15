<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Products;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AdminController extends Controller
{
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
        $categories = $this->getDoctrine()
                    ->getRepository('AppBundle:Category')
                    ->findAll();
        return $this->render('default/addProduct.html.twig',array(
                'category'=>$categories
            )); 
        //return $this->render('default/addProduct.html.twig');
    }

    /**
     * @Route("/offer", name="ofer")
     */
    public function offerAction(Request $request)
    {
        return $this->render('default/addOffer.html.twig');
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(Request $request)
    {
        $listItems = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findAll();
        return $this->render('default/editList.html.twig',array(
                'list'=>$listItems
            )); 
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id=0, Request $request)
    {
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
}
