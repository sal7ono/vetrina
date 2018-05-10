<?php

 namespace vetrinaBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vetrinaBundle\Entity\Vetement;
use vetrinaBundle\Entity\DemandeLocation;
use vetrinaBundle\Entity\DemandeAchat;
use vetrinaBundle\Entity\DemandeEchange;
use Symfony\Component\HttpFoundation\Request;
use vetrinaBundle\Form\DemandeLocationType;

use vetrinaBundle\Form\RechercheType;
use vetrinaBundle\Form\VetementType;
class VetementController extends Controller
{   
public function categorieAction() {
   
    $em= $this->getDoctrine()->getManager();
     $findcategorie = $em->getRepository('vetrinaBundle:Vetement')->findAll();
     $categorie  = $this->get('knp_paginator')->paginate(
        $findcategorie,$this->get('request')->query->get('page', 1),8
    );
   
    return $this->render('vetrinaBundle:Default:affiche.html.twig',array('categories'=>$categorie));
    
    
} 
public function detailsAction($id) {
    
    $em= $this->getDoctrine()->getManager();
    $details = $em->getRepository('vetrinaBundle:Vetement')->find($id);
    return $this->render('vetrinaBundle:Default:details.html.twig',array('details'=>$details));
   
        
    
    
} 
public function hommecatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $findhomme = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Homme');
     $homme =$this->get('knp_paginator')->paginate(
        $findhomme,$this->get('request')->query->get('page', 1),8 );
    return $this->render('vetrinaBundle:Default:homme.html.twig',array('homme'=>$homme));
    
    
} 
public function femmecatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $findfemme = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Femme');
    $femme =$this->get('knp_paginator')->paginate(
        $findfemme,$this->get('request')->query->get('page', 1),8 );
    return $this->render('vetrinaBundle:Default:femme.html.twig',array('femme'=>$femme));
    
    
} 
public function enfantcatAction() {
    
    $em= $this->getDoctrine()->getManager();
    $findenfant = $em->getRepository('vetrinaBundle:Vetement')->bycategorie('Enfant');
    $enfant =$this->get('knp_paginator')->paginate(
        $findenfant,$this->get('request')->query->get('page', 1),8 );
    return $this->render('vetrinaBundle:Default:enfant.html.twig',array('enfant'=>$enfant));
    
    
}
public function rechercheAction() {
    $form = $this->createForm(new RechercheType());
   return $this->render('vetrinaBundle:Default:recherche.html.twig',array('form'=>$form->createView() ));
}
public function rechercheTraitementAction() {
    $form = $this->createForm(new RechercheType());
    if ($this->get('request')->getMethod()=='POST')
    {
        $form->bind($this->get('request'));
        
    
    $em= $this->getDoctrine()->getManager();
    $finddetails = $em->getRepository('vetrinaBundle:Vetement')->recherche($form['recherche']->getData());
    } 
    else 
    {
        throw $this->createNotFoundException('Le vetement n\'existe pas.');
    }
    $details=$this->get('knp_paginator')->paginate(
        $finddetails,$this->get('request')->query->get('page', 1),8 );
    return $this->render('vetrinaBundle:Default:affiche.html.twig',array('categories'=>$details));
    
    
    
} 


 public function acheterAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
       $panier[$id] = 1;
        $session->set('panier',$panier);
        
        
       
     if (!$session->has('panier')) $session->set('panier',array());
        
          $em= $this->getDoctrine()->getManager();
          $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panier')));
          return $this->render('vetrinaBundle:Default:panier.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panier')));  
       
    }
    
     public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            
        }
        
        return $this->redirect($this->generateUrl('panier')); 
    }
     public function louerAction($id)
    {  
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panierloc');
       $panier[$id] = 1;
        $session->set('panierloc',$panier);
        
         
        
       
     if (!$session->has('panierloc')) 
         $session->set('panierloc',array());
        
          $em= $this->getDoctrine()->getManager();
          $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierloc')));
         
          return $this->render('vetrinaBundle:Default:panierloc.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panierloc')));  
       
    }
    
     public function supprimerlocAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panierloc');
        
        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panierloc',$panier);
            
        }
        
        return $this->redirect($this->generateUrl('ploc')); 
    }
     public function echangerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panierech');
       $panier[$id] = 1;
        $session->set('panierech',$panier);
        
        
       
     if (!$session->has('panierech')) $session->set('panierech',array());
        
          $em= $this->getDoctrine()->getManager();
          $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierech')));
          return $this->render('vetrinaBundle:Default:panierech.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panierech')));  
       
    }
    
     public function supprimerechAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panierech');
        
        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panierech',$panier);
            
        }
        
        return $this->redirect($this->generateUrl('pech')); 
    }
    public function panierAction() 
    
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panier')));
        
        return $this->render('vetrinaBundle:Default:panier.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panier')));
        
    }
 public function panierlocAction() 
    
    {  $form= $this->createForm(new DemandeLocationType);
          if ($this->get('request')->getMethod()=='POST')                                                                      
        {$form->handleRequest($this->getRequest());
            if ($form->isValid()) {
              $session = $this->getRequest()->getSession();
         if (!$session->has('dateloc')) $session->set('dateloc', array());
             $session->set('dateloc',$form['dateloc']->getData());
        
         return $this->redirect($this->generateUrl('ValiderDemandeLocation')); 
        }}
        return $this->render('vetrinaBundle:Default:dateloc.html.twig',array('form' => $form->createView()));
     
        
    }
     public function panierechAction() 
     
    { $session = $this->getRequest()->getSession();
         $em = $this->getDoctrine()->getManager();
       $vetement= $em->getRepository('vetrinaBundle:Vetement')->byclient($this->container->get('security.context')->getToken()->getUser());
          if ($this->get('request')->getMethod()=='POST')                                                                      
          {
          $request = $this->getRequest();
          
         if (!$session->has('id')) $session->set('id', array());
             $session->set('id',$request->request->get('id'));
        
          return $this->redirect($this->generateUrl('ValiderDemandeEchange')); 
          
          }
        
        return $this->render('vetrinaBundle:Default:vetechange.html.twig',array('vetement'=>$vetement));
     
        
    }
     public function pechAction() 
    
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panierech')) $session->set('panierech', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierech')));
        
        return $this->render('vetrinaBundle:Default:panierech.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panierech')));
        
    }
   public function plocAction() 
    
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panierloc')) $session->set('panierloc', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierloc')));
        
        return $this->render('vetrinaBundle:Default:panierloc.html.twig', array('produits' => $produits,
                                                                                             'panier' => $session->get('panier')));
        
    }


    public function vetementAction()
    { $em = $this->getDoctrine()->getManager();
        $client = $this->container->get('security.context')->getToken()->getUser();
        $entity= new Vetement();
     $form= $this->createForm(new VetementType,$entity );
      if ($this->get('request')->getMethod()=='POST')
      {
          $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setClient($client);
                $em->persist($entity);
                $em->flush();
                
                return $this->redirect($this->generateUrl('fos_user_profile_show'));
            }
      }
     return $this->render('vetrinaBundle:Default:ajoutvetement.html.twig', array('form' => $form->createView()));
     
        
        
    }
    public function clientvetAction()
    {$em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser();
    
    $vetement = $em->getRepository('vetrinaBundle:Vetement')->byclient($id);
     
    return $this->render('vetrinaBundle:Default:vetement.html.twig',array('vetement' => $vetement));
    
        
    }
    
   public function supprimervetAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('vetrinaBundle:Vetement')->find($id);
        
        
        
       
        // Pour empecher les contraintes d'integrité
        $demandeachat=$em->getRepository('vetrinaBundle:DemandeAchat')->bydemandeachat($entity);
        $demandelocation=$em->getRepository('vetrinaBundle:DemandeLocation')->bydemandelocation($entity);
        $demandeechange=$em->getRepository('vetrinaBundle:DemandeEchange')->bydemandeEchange($entity);
                  foreach($demandeachat as $demande)
                  { if($demande != NULL)
                  {$em->remove($demande);
                   $em->flush();
                  }
                  
                  }
                  foreach($demandeechange as $demande)
                  { if($demande != NULL){
                  $em->remove($demande);
                   $em->flush();
                  }}
                  foreach($demandelocation as $demande)
                  { if($demande != NULL){
                     $em->remove($demande);
                      $em->flush();
                  }} 
         $em->remove($entity);
        $em->flush();
        return $this->redirect ($this->generateUrl('fos_user_profile_show'));
    }

 
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('vetrinaBundle:Vetement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vetement entity.');
        }

        $editForm = $this->createEditForm($entity);
        

        return $this->render('vetrinaBundle:Default:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
           
        ));
    }

    /**
    * Creates a form to edit a Vetement entity.
    *
    * @param Produits $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vetement $entity)
    {
        $form = $this->createForm(new VetementType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Mettre a jour'));

        return $form;
    }
    /**
     * Edits an existing Produits entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('vetrinaBundle:Vetement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produits entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('vetrinaBundle:Default:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            
        ));
    }
    






}
