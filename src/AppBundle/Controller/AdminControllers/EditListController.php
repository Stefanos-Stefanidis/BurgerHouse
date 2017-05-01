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


class EditListController extends Controller /*implements TokenAuthenticatedController*/
{
 
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
}