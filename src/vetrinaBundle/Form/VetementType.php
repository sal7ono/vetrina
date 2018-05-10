<?php

namespace vetrinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VetementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { $size=array();
    for($i=12; $i<=100; $i++) {
      $size[$i]=$i;  
    }
        $builder
                ->add('nomvet','text', array('label' => 'Nom de vetement'))
               
                ->add('marque','choice', array('choices'=>array('moderne'=>'moderne','traditionnelle'=>'traditionnelle','classique'=>'classique')))
                
                ->add('taille','choice',array('choices'=>array('chiffres romains:'=>array('L'=>'L','M'=>'M','XL'=>'XL','XXL'=>'XXL','XXXL'=>'XXXL'),'nombres:'=>$size)))
                ->add('etatVet','choice', array('label' => 'Etat','choices'=>array('0'=>'Neuf','1'=>'Bon etat','2'=>'Mal')))
                ->add('prixloc','integer', array (
    'label' => 'Prix de location',
    'required' => true,
    'scale'=>3,
    'attr' => array(
       'min' => 0.5,
       'max' => 999999,
       'step' =>  0.010
    ),
 ))
                ->add('prix','integer', array (
    'required' => true,
    'scale'=>3,
    'attr' => array(
       'min' => 0.5,
       'max' => 999999,
       'step' =>  0.010
    ),
))
                ->add('disponibilite','choice', array('choices'=>array('0'=>'Non Disponible','1'=>'Disponible')))
                ->add('categorie','choice', array('choices'=>array('Homme'=>'Homme','Femme'=>'Femme','Enfant'=>'Enfant')))
                ->add('file','file', array('label' => 'Image','required' => false))
                 ->add('description','textarea');
             
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vetrinaBundle\Entity\Vetement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vetrinabundle_vetement';
    }


}
