<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class Builder  extends Controller implements ContainerAwareInterface 
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $usermailsess = $this->getUser()->getEmail();
        }else{
            $usermailsess = $_SERVER['REMOTE_ADDR'];
        }


        $em = $this->container->get('doctrine')->getManager();
		$cart = $em->getRepository('AppBundle:Cart')->findByUser($usermailsess);
        $NumOfPrInCart = sizeOf($cart);
        
        $menu = $factory->createItem('root');
        $menu->addChild('Home', array('route' => 'homepage'))
            ->setExtra('translation_domain', 'AppBundle');
        $menu->addChild('List', array('route' => 'list'));
        $menu->addChild('Comments', array('route' => 'comments'));
        $menu->addChild('Contact', array('route' => 'contact'))
                ->setAttribute('class', 'childClass');
        $menu->addChild(' (<span id="NumOfPrInCart">'.$NumOfPrInCart.'</span>)', array(
            'route' => 'basket',
            'extras' => array(
                'safe_label' => true
                ),
            )
            
        )
        ->setLinkAttribute('class', 'fa fa-shopping-cart cart-font-size');                

        //->setLinkAttribute('class', 'childClass')
        // you can also add sub level's to your menu's as follows
        //$menu['Contact']->addChild('Edit profile', array('route' => 'contact'));

        // ... add more children

        return $menu;
    }
}