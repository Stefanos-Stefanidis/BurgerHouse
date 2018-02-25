<?php

namespace AppBundle\Validation;
use Symfony\Component\HttpFoundation\Session\Session;

class Constraints{

    public function checkEmpty($string)
    {
        $session = new Session();

        if ($string == "") 
        {        
            $message = "You have empty fields";
            $flashBag = $session->getFlashBag()->add('notice', $message);
            return  false;
        }

        return true;
    }


}