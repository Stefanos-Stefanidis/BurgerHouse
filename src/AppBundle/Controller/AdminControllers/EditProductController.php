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

class EditProductController extends Controller /*implements TokenAuthenticatedController*/
{
   
    /**
     * @Route("/edit-item/{id}", name="editItem")
     */
    public function editItemAction($id = 0, Request $request)
    {

        $dir    = 'images/uploads';
        $array_files = scandir($dir);
        
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:Products')->find($id);
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('default/editItem.html.twig', array(
            'item'=>$item,'categories'=>$categories,'files'=>$array_files
            ));
    }
}
