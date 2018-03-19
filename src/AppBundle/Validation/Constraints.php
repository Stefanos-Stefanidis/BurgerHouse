<?php

namespace AppBundle\Validation;
use Symfony\Component\HttpFoundation\Session\Session;

class Constraints{

    public function constraints($string, $whatToCheck)
    {
        $session = new Session();

        switch ($whatToCheck) {
            case 'checkEmpty':
                if (empty($string)) {
                    $message = "You have empty fields";
                    $flashBag = $session->getFlashBag()->add('notice', $message);
                    return  false;
                }
                break;
            case 'checkMail':
                if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
                    $message = "$string is not a valid email address";
                    $flashBag = $session->getFlashBag()->add('notice', $message);
                    return  false;
                }
                break;                
            default:
                break;
        }
/*         if ($string == "") 
        {        
            $message = "You have empty fields";
            $flashBag = $session->getFlashBag()->add('notice', $message);
            return  false;
        } */

        return true;
    }


}