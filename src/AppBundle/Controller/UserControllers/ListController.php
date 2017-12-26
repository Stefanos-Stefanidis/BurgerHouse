<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ListController extends Controller{

    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {

        $categoriesOrderedByOrder = $this->getDoctrine()->getRepository('AppBundle:Category')->findByMaxCategory();
        
        $result=[];
        for ($i = 0; $i < sizeOf($categoriesOrderedByOrder); $i++) { 
            
            $list[$i] = $this->getDoctrine()
                    ->getRepository('AppBundle:Products')
                    ->findByCategory($categoriesOrderedByOrder[$i]->getName());

            }
            foreach($list as $array){
                    $result = array_merge($result, $array);
            } 

        return $this->render('default/list.html.twig',array(
                'totalCategories'=>$categoriesOrderedByOrder,'list'=>$result
            )); 

    } 


}