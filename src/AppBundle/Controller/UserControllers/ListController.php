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
        $notEmptyCategories=[];
        
        for ($i = 0; $i < sizeOf($categoriesOrderedByOrder); $i++) { 
            
            $list[$i] = $this->getDoctrine()
                    ->getRepository('AppBundle:Product')
                    ->findByCategory($categoriesOrderedByOrder[$i]->getId());
            
            if (!empty($list[$i])) {
                array_push($notEmptyCategories, $categoriesOrderedByOrder[$i]);
            }

        }

        foreach($list as $array){
            $result = array_merge($result, $array);
        } 

        return $this->render('default/list.html.twig',array(
            'totalCategories'=>$notEmptyCategories,'list'=>$result
        )); 

    } 


}