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


class UpdateProductController extends Controller /*implements TokenAuthenticatedController*/
{
 
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
            $image =  $_POST['image'];

            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('AppBundle:Products')->find($id);

            $item->setName($name);
            $item->setPrice($price);
            $item->setCategory($category);
            $item->setDescription($description);
            $item->setTags($tags);
            $item->setImage($image);
            $em->flush();
            return $this->redirectToRoute('edit');

        }
    }

}