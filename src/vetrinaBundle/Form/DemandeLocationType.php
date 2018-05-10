<?php

namespace vetrinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class DemandeLocationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { $datenow=new \DateTime('now');
    $datemonth=new \DateTime('now + 1 month');
        $builder->add('dateloc', 'date', array(  
            'label'=>'.',
    'widget' => 'single_text',
    'attr' => array(
      
        'min'=> date($datenow->format('Y-m-d')),
        'max' =>date($datemonth->format('Y-m-d'))
    )));
    }
    
  
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'vetrinabundle_demandelocation';
    }


}
