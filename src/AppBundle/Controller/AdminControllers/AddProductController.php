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
            $newCat = $_POST['newCategory'];

            $addProduct = new Product();
            
            $addProduct -> setName($name);
            $addProduct -> setPrice($price);
            $addProduct -> setImage($image);
            $addProduct -> setDescription($description);
            
            // relates this product to the category
            // $addProduct->setCategory($addCategory);

            $entityManager = $this->getDoctrine()->getManager();


            if (!empty($newCat)) {
                $addCategory = new Category();
                $addCategory->setName($newCat);
                $addCategory-> setHierarchy(999);
                $addProduct->setCategory($addCategory);
                $entityManager->persist($addCategory);
            }else{
                $categoryObj = $entityManager->getRepository('AppBundle:Category')->findOneByName($category); 
                $addProduct->setCategory($categoryObj);
            }

            $entityManager->persist($addProduct);
            $entityManager->flush();
            
            $this->addFlash(
                'notice',
                'Product added'
                );
            return $this->redirectToRoute('add-product'); 

        }

        if (isset($_POST['category-btn'])) {
            $categoryName = $_POST['addCategory'];
            $categoryHierarchy = $_POST['categoryHierarchy'];

            $addCategory = new Category();

            $addCategory   -> setName($categoryName) 
                -> setHierarchy($categoryHierarchy);

            $em = $this->getDoctrine()->getManager();
            $em->persist($addCategory);
            $em->flush();
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