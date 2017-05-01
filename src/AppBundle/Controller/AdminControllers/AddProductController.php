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

            $addProduct = new Products();

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

        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {
            $dir    = 'images/products';
            $array_files = scandir($dir);
      

            $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

            return $this->render('default/addProduct.html.twig',array(
                'category'=>$categories,'files'=>$array_files
                ));           
        }
        else{
            return $this->render('default/login.html.twig');
            
        }

    }

}