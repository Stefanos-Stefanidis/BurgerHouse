<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('phone');
        $builder->add('lastname');
        $builder->add('address');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getPhone()
    {
        return $this->getBlockPrefix();
    }
    
    public function getLastname()
    {
        return $this->getBlockPrefix();
    }
    
    public function getAddress()
    {
        return $this->getBlockPrefix();
    }
}