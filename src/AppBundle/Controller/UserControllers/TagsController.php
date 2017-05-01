<?php

namespace AppBundle\Controller\UserControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Products;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;

class TagsController extends Controller{
 
    /**
     * @Route("/tag/{tag}", name="tag")
     */
    public function tagAction($tag='', Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tag = $em->getRepository("AppBundle:Products")->createQueryBuilder('o')
               ->where('o.tags LIKE :tag')
               ->setParameter('tag', '%'.$tag.'%')
               ->getQuery()
               ->getResult();

        return $this->render('default/tag.html.twig',array(
                'tags'=>$tag
            ));        

    }


}