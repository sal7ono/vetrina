<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom','text',array('required'=>true))
                ->add('prenom','text',array('required'=>true))
                ->add('sexe','choice',array('choices' =>array('0'=>'Homme','1'=>'Femme')))
              
                ->add('datenaiss', 'date', array(
    'widget' => 'single_text',
    'attr' => array(
        'max' => date('2000-12-31')
    )
),array('required'=>true))
                ->add('numtel','number', array (
    'required' => true,
    
    'attr' => array(
       'min' => 10000000,
       'max' => 99999999,
       'step' => 1,
    ),
))
                ->add('adresse','text',array('required'=>true))
                ->add('codepostal','number', array (
    'required' => true,
    
    'attr' => array(
       'min' => 1000,
       'max' => 9999,
       'step' => 1,
    ),
));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}