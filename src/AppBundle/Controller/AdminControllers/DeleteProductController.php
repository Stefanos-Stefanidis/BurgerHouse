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


class DeleteProductController extends Controller /*implements TokenAuthenticatedController*/
{
 
    /**
     * @Route("/delete-product/{id}", name="deletepr")
     */
    public function deleteProductAction($id=0, Request $request)
    {   

        $session = $request->getSession();
        $admin = $session->get('admin');

        if ($admin=='TRUE') {

            $em = $this->getDoctrine()->getManager();
            $itemDlt = $em->getRepository('AppBundle:Products')->find($id);
            $em->remove($itemDlt);
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
}