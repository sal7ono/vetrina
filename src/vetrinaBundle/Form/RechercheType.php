<?php

namespace vetrinaBundle\Form;

use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\FormBuilderInterface;
 class RechercheType extends AbstractType 
 {
      public function buildForm(FormBuilderInterface $builder, array $options)
    {
          $builder->add('recherche','text',array('attr'=>array('placeholder'=>'Rechercher')));
    }
    public function getName() {
        return 'vetrinabundle_recherche';  
    }
 }