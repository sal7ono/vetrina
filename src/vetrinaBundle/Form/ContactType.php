<?php

namespace vetrinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType
{
    
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Nom', 'text',array('label' => false,'attr'=>array('placeholder'=>'Nom','class'=>'form-control')))
                ->add('email', 'email',array('label' => false,'attr'=>array('placeholder'=>'Email','class'=>'form-control')))
                ->add('Object', 'text',array('label' => false,'attr'=>array('placeholder'=>'Object','class'=>'form-control')))
                ->add('Description', 'textarea',array('label' => false,'attr'=>array('rows'=>'8','placeholder'=>'Ton message ici','class'=>'form-control')));
    }

    public function getName()
    {
        return 'Contact';
    }
}
?>
