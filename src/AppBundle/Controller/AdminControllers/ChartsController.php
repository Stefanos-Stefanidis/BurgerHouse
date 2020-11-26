<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Rate;


class ChartsController extends Controller
{
    /**
     * @Route("/view-charts", name="charts")
     */
    public function chartsAction(Request $request)
    {
        $subscriber = $this->getDoctrine()->getRepository('AppBundle:Newsletter')->findAll();

        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM AppBundle:Notice p WHERE p.orderStatus = :orderStatus'
        )->setParameter('orderStatus', 'FINISH');

        $notices = $query->getResult();

   /*      $getCancelled = $entityManager->createQuery(
            'SELECT IDENTITY(p.noticeId), count(p.productId)
            FROM AppBundle:Notice p WHERE p.orderStatus = :orderStatus GROUP BY p.id'
        )->setParameter('orderStatus', 'FINISH'); */

        $getCancelled = $entityManager->createQuery(
            'SELECT DISTINCT(p.noticeId)
            FROM AppBundle:Notice p WHERE p.orderStatus = :orderStatus'
        )->setParameter('orderStatus', 'CANCEL');
        
        $cancelledNum = $getCancelled->getResult();

        $count_cancelled = count($cancelledNum);

        $total_sales = 0;
        foreach ($notices as $notice) {
            $total_sales += $notice->getProductId()->getPrice();
        } 
     

        return $this->render('default/charts.html.twig',array('total_sales'=>$total_sales,'count_cancelled'=>$count_cancelled));

    }

    /**
     * @Route("/charts-rate-data", name="chartsRateData")
     */
    public function chartRateDataAction(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        
        $query = $entityManager->createQuery(
            'SELECT  p.rate, p.prid
            FROM AppBundle:Rate p ORDER BY p.prid'
        );
        
        $rates = $query->getResult();


        $grouped = [];

        foreach ($rates as $value) {
            $grouped[$value['prid']][] = $value['rate'];
            $addRates = $value['rate'];
        }
            

        $productNames = ['Names'];
        $productAvgRate = ['Rates'];

        foreach ($grouped  as $key => $value) {
        /*  
            $query = $entityManager->createQuery(
            'SELECT  o.name
            FROM AppBundle:Product o WHERE o.id = :id'
            )->setParameter('id', $key);
            $productName = $query->getResult(); 
        */

            $productName = $entityManager->getRepository('AppBundle:Product')->findOneById($key)->getName();
            $rateAvg = 0;
            $inc = 0;   
            for ($i=0; $i < count($value); $i++) { 
                $rateAvg = $rateAvg + $value[$i];
                $inc++;
            }

            array_push($productNames, $productName);
            array_push($productAvgRate, $rateAvg/$inc);
        }



        $respone['names'] = $productNames;
        $respone['rates'] = $productAvgRate;

        return $this->json($respone);

    }

    /**
     * @Route("/charts-top-products-data", name="chartsTopProductsData")
    */
    public function chartTopProductsDataAction(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();


        $query = $entityManager->createQuery(
            'SELECT IDENTITY(p.productId), count(p.productId)
            FROM AppBundle:Notice p WHERE p.orderStatus = :orderStatus GROUP BY p.productId'
        )->setParameter('orderStatus', 'FINISH');
        
        $numberOfProductsOrdered = $query->getResult();

        $productNames = ['Names'];
        $productQuantity = ['Quantity'];

        for ($i=0; $i < count($numberOfProductsOrdered) ; $i++) { 
            // $productName = $this->getProductName($numberOfProductsOrdered[$i][1]);
            $productName = $entityManager->getRepository('AppBundle:Product')->findOneById($numberOfProductsOrdered[$i][1])->getName();
            dump($productName);
            array_push($productNames, $productName);
            array_push($productQuantity, $numberOfProductsOrdered[$i][2]);
        }
        
        $respone['names'] = $productNames;
        $respone['quantity'] = $productQuantity;

        return $this->json($respone);

    }


}