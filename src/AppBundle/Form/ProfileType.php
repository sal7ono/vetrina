<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('prenom')
                ->add('sexe','choice',array('choices' =>array('0'=>'Homme','1'=>'Femme')))
              
                ->add('datenaiss', 'date', array(
    'widget' => 'single_text',
    'attr' => array(
        'max' => date('2000-12-31'))))
    
                ->add('numtel')
                ->add('adresse')
                ->add('codepostal');
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'app_user_profile';
    }
}
