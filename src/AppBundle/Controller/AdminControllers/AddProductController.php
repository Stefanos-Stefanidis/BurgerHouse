<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use AppBundle\Entity\Offers;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Controller\TokenAuthenticatedController;


class AddProductController extends Controller /*implements TokenAuthenticatedController*/
{
   
    /**
     * @Route("/add-product", name="add-product")
     */
    public function AddProductAction(Request $request)
    {
     

        if (isset($_POST['add-btn'])) {

            $name =  $_POST['productName'];
            $price =  $_POST['price'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $tags = $_POST['tags'];

            $addProduct = new Product();

            $addProduct -> setName($name)
            -> setPrice($price)
            -> setCategory($category)
            -> setImage($image)
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


        if (isset($_POST['dlt-category-btn'])) {
            
            $categoryName = $_POST['dltCategory'];
            $em = $this->getDoctrine()->getManager();
            $categoryDlt = $em->getRepository('AppBundle:Category')->findOneByName($categoryName);

            $em->remove($categoryDlt);
            $em->flush(); 
            
            return $this->redirectToRoute('add-product'); 

            }

        $dir    = 'images/uploads';
        $array_files = scandir($dir);

        $array_files = array_diff($array_files, array('.', '..'));
        $categories = $this->getDoctrine()
        ->getRepository('AppBundle:Category')
        ->findAll();

        return $this->render('default/addProduct.html.twig',array(
            'category'=>$categories,'files'=>$array_files
            ));           
        

    }

}