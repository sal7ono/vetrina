<?php

namespace vetrinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vetrinaBundle\Entity\Vetement;

class AccueilController extends Controller
{
    public function indexAction()
    {    /*if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
          return $this->redirect($this->generateUrl('easyadmin'));
          
        else 
    {*/ return $this->render('vetrinaBundle:Default:index.html.twig');
    }
 public function categorieAction() {
   
    $em= $this->getDoctrine()->getManager();
     $categorie = $em->getRepository('vetrinaBundle:Vetement')->findAll();
    
   
    return $this->render('vetrinaBundle:Default:nouveaute.html.twig',array('categories'=>$categorie));
    
    
}    
 public function hommecatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $homme = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Homme');
     
    return $this->render('vetrinaBundle:Default:homcat.html.twig',array('homme'=>$homme));
    
    
} 
public function femmecatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $femme = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Femme');
  
    return $this->render('vetrinaBundle:Default:femcat.html.twig',array('femme'=>$femme));
    
    
} 
public function enfantcatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $enfant = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Enfant');
   
    return $this->render('vetrinaBundle:Default:enfcat.html.twig',array('enfant'=>$enfant));
    
    
} 
public function marquecatAction($categorie,$marque) {
    
    $em= $this->getDoctrine()->getManager();
    $marquecat = $em->getRepository('vetrinaBundle:Vetement')->bymarquecat($categorie,$marque);
   
    return $this->render('vetrinaBundle:Default:marquecat.html.twig',array('marque'=>$marquecat));
    
    
}  
}