<?php namespace vetrinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use vetrinaBundle\Entity\Vetement;
use vetrinaBundle\Entity\Client;
use vetrinaBundle\Entity\DemandeAchat;
use vetrinaBundle\Entity\DemandeEchange;
use vetrinaBundle\Entity\DemandeLocation;
use vetrinaBundle\Entity\Livraison;
use vetrinaBundle\Form\DemandeLocationType;
class DemandeController extends Controller
{
public function  ValidationDemandeAchatAction()
        {
     $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
             $panier = $session->get('panier');
             
     $vetements = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panier')));
      foreach($vetements as $vetement)
        { $demande= new DemandeAchat();
        $demande->setClient($this->container->get('security.context')->getToken()->getUser());
        $demande->setVetement($vetement);
        $em->persist($demande);
        $em->flush();
          
          
          
          
          
        }
    $session->remove('panier');
     return $this->redirect($this->generateUrl('monpanier'));
    
    
    
        }
 public function  ValiderDemandeLocationAction()
        {
     $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
             $panier = $session->get('panierloc');
          
     $vetements = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierloc')));
      foreach($vetements as $vetement)
        { $demande= new DemandeLocation();
    $session1 = $this->getRequest()->getSession();
                  $dateloc= $session1->get('dateloc');
                $em = $this->getDoctrine()->getManager();
                  $demande->setClient($this->container->get('security.context')->getToken()->getUser());
                  $demande->setVetement($vetement);
                  $demande->setDateloc($dateloc);
        $em->persist($demande);
        $em->flush();
              
           
      
        
      
          
          
          
          
          
        }
    $session->remove('panierloc');
     $session->remove('dateloc');
     return $this->redirect($this->generateUrl('monpanier'));
    
    
    
        } 
  public function ValiderDemandeEchangeAction()
  {$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
         $panier = $session->get('panierech');
       $vetements = $em->getRepository('vetrinaBundle:Vetement')->findArray(array_keys($session->get('panierech')));
        $session1 = $this->getRequest()->getSession();
        $vet= $em->getRepository('vetrinaBundle:Vetement')->find(($session1->get('id')));
        foreach($vetements as $vetement)
        { $demande= new DemandeEchange();
        $demande->setClient($this->container->get('security.context')->getToken()->getUser());
        $demande->setVetement($vetement);
        $demande->setEchanger($session1->get('id'));
        $demande->setEtat('attente');
        $em->persist($demande);
        $em->flush();
        
        $mademande= new DemandeEchange();
        $mademande->setClient($vetement->getClient());
         $mademande->setVetement($vet);
         $mademande->setEchanger($vetement->getId());
        $em->persist($mademande);
        $em->flush();}
        $session->remove('panierech');
        $session1->remove('id');
     return $this->redirect($this->generateUrl('monpanier'));
  }
public function monpanierAction()
{
     $em = $this->getDoctrine()->getManager();
     $demandes = $em->getRepository('vetrinaBundle:DemandeAchat')->ByidClient($this->container->get('security.context')->getToken()->getUser());
     return $this->render('vetrinaBundle:Default:monpanier.html.twig', array('paniers' => $demandes));
} 
public function monpanierlocAction()
{
     $em = $this->getDoctrine()->getManager();
     $demandes = $em->getRepository('vetrinaBundle:DemandeLocation')->ByidClient($this->container->get('security.context')->getToken()->getUser());
     return $this->render('vetrinaBundle:Default:monpanierloc.html.twig', array('paniers' => $demandes));
}       
public function monpanierechAction()
{    $vet= array();
    
     $em = $this->getDoctrine()->getManager();
    
     $demandes = $em->getRepository('vetrinaBundle:DemandeEchange')->ByidClient($this->container->get('security.context')->getToken()->getUser());
     foreach ($demandes as $demande)
     $vet[]= $em->getRepository('vetrinaBundle:Vetement')->find($demande->getEchanger());
     
     return $this->render('vetrinaBundle:Default:monpanierech.html.twig', array('paniers' => $demandes,'vetement'=>$vet ));


}

public function afficheachatAction()
{ $em = $this->getDoctrine()->getManager();
$demandes= array();
    
  $vetement=$em->getRepository('vetrinaBundle:Vetement')->byclientid($this->container->get('security.context')->getToken()->getUser());
 
  $demandes= $em->getRepository('vetrinaBundle:DemandeAchat')->bydemandeachat($vetement); 
 
 
 
     
 return $this->render('vetrinaBundle:Default:demandeachat.html.twig', array('demandes' => $demandes));
     
}
public function affichelocationAction()
{ $em = $this->getDoctrine()->getManager();
$demandes= array();
    
  $vetement=$em->getRepository('vetrinaBundle:Vetement')->byclientid($this->container->get('security.context')->getToken()->getUser());
 
  $demandes= $em->getRepository('vetrinaBundle:DemandeLocation')->bydemandelocation($vetement); 
 
 
 
     
 return $this->render('vetrinaBundle:Default:demandelocation.html.twig', array('demandes' => $demandes));
     
}
public function afficheechangeAction()
{ $em = $this->getDoctrine()->getManager();
$demandes= array();
    $vet=array();
  $vetement=$em->getRepository('vetrinaBundle:Vetement')->byclientid($this->container->get('security.context')->getToken()->getUser());
  $demandes= $em->getRepository('vetrinaBundle:DemandeEchange')->bydemandeEchange($vetement); 
     foreach ($demandes as $demande)
     {
         $vet[]= $em->getRepository('vetrinaBundle:Vetement')->find($demande->getEchanger());
         
     }
  
 
 
 
     
 return $this->render('vetrinaBundle:Default:demandeEchange.html.twig', array('demandes' => $demandes,'vetement'=>$vet));
     
}

public function etatdemandeAction($id,$etat)
{$em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeAchat')->find($id);
    $demandes->setEtat($etat);
     $em->persist($demandes);
        $em->flush();
         return $this->redirect($this->generateUrl('demandes'));
}
public function etatdemandelocAction($id,$etat)
{$em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeLocation')->find($id);
    $demandes->setEtat($etat);
     $em->persist($demandes);
        $em->flush();
         return $this->redirect($this->generateUrl('demandes'));
}
public function etatdemandeechAction($id,$vid,$etat)
{$em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeEchange')->find($id);
    $demandes->setEtat($etat);
     $em->persist($demandes);
        $em->flush();
       $vetement= $em->getRepository('vetrinaBundle:Vetement')->find($vid);
      
        $mademande=$em->getRepository('vetrinaBundle:DemandeEchange')->Byidvetement($vetement);
 foreach ($mademande as $demande)
 {
         $demande->setEtat($etat);
          $em->persist($demande);
 $em->flush();}
         return $this->redirect($this->generateUrl('demandes'));
}
public function ValidePanierAction($id)
{
    $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeAchat')->find($id);
    $livraison = new Livraison();
    $livraison->setDateLiv(new \DateTime('now +1 day'));
      $em->persist($livraison);
        $em->flush();
    $demandes->setLivraison($livraison);
  
    
   $em->persist($demandes);
  
        $em->flush();
         return $this->redirect($this->generateUrl('facturepdf',array('id' =>$id)));
      
     
           
 

 
}
public function ValidePanierlocAction($id)
{
    $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeLocation')->find($id);
    $livraison = new Livraison();
    $livraison->setDateLiv(new \DateTime('now +1 day'));
    
    
      $em->persist($livraison);
        $em->flush();
    $demandes->setLivraison($livraison);
  
    
   $em->persist($demandes);
  
        $em->flush();
        
      return $this->redirect($this->generateUrl('facturepdfloc',array('id' =>$id)));
     
           
 

 
}
public function ValidePanierechAction($id,$vid)
{
    $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeEchange')->find($id);
    $livraison = new Livraison();
    $livraison->setDateLiv(new \DateTime('now +1 day'));
    
    
      $em->persist($livraison);
        $em->flush();
    $demandes->setLivraison($livraison);
  
    
   $em->persist($demandes);
  
        $em->flush();
        
      return $this->redirect($this->generateUrl('facturepdfech',array('id' =>$id,'vid'=>$vid)));
     
           
 

 
}
public function FactureToPDFAction($id)
{  $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeAchat')->find($id);
     $vetement=$em->getRepository('vetrinaBundle:Vetement')->find($demandes->getVetement());
     $demandelocation=$em->getRepository('vetrinaBundle:DemandeLocation')->bydemandelocation($vetement);
        $demandeechange=$em->getRepository('vetrinaBundle:DemandeEchange')->bydemandeEchange($vetement);
      ob_end_clean();
    $html = $this->renderView('vetrinaBundle:Default:FacturePDF.html.twig', array('demandes' => $demandes));
  $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('Vetrina');
        $pdf->SetTitle(('Facture'));
        $pdf->SetSubject('');
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', '', 11, '', true);
        //$pdf->SetMargins(20,20,40, true);
        $pdf->AddPage();
        
        $filename = 'Facture';
        $directory=__DIR__.'/../../../web/pdf/';
        $path=$directory.$filename.$id.".pdf";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I');
        $pdf->Output($path,'F');
       
    $livraison= $em->getRepository('vetrinaBundle:Livraison')->find($demandes->getLivraison());
    $livraison->setPdf($path);
    $em->persist($livraison);
      $em->flush();
       $vetement->setDisponibilite(FALSE);
     
     $em->persist($vetement);
       $em->flush();
    
}
public function FactureToPDFlocAction($id)
{  $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeLocation')->find($id);
     $vetement=$em->getRepository('vetrinaBundle:Vetement')->find($demandes->getVetement());
      ob_end_clean();
    $html = $this->renderView('vetrinaBundle:Default:FacturePDFloc.html.twig', array('demandes' => $demandes));
     $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('Vetrina');
        $pdf->SetTitle(('Facture'));
        $pdf->SetSubject('');
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', '', 11, '', true);
        //$pdf->SetMargins(20,20,40, true);
        $pdf->AddPage();
        
        $filename = 'Facture';
        $directory=__DIR__.'/../../../web/pdf/';
        $path=$directory.$filename.$id.".pdf";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I');
        
        $pdf->Output($path,'F');
     $pd = realpath($this->get('kernel')->getRootDir() . "/../pdf/" . $filename .$id. '.pdf');
       
      $livraison=$em->getRepository('vetrinaBundle:Livraison')->find($demandes->getLivraison());
      $livraison->setPdf($path);
      $em->persist($livraison);
      $em->flush();
     $vetement->setDisponibilite(FALSE);
     
     $em->persist($vetement);
       $em->flush();
      
}
public function FactureToPDFechAction($id,$vid)
{  $em = $this->getDoctrine()->getManager();
    $demandes= $em->getRepository('vetrinaBundle:DemandeEchange')->find($id);
     $vetement=$em->getRepository('vetrinaBundle:Vetement')->find($demandes->getVetement());
     $vet=$em->getRepository('vetrinaBundle:Vetement')->find($vid);
    
      ob_end_clean();
    $html = $this->renderView('vetrinaBundle:Default:FacturePDFech.html.twig', array('demandes' => $demandes,'vet'=>$vet));
  $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('Vetrina');
        $pdf->SetTitle(('Facture'));
        $pdf->SetSubject('');
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', '', 11, '', true);
        //$pdf->SetMargins(20,20,40, true);
        $pdf->AddPage();
        
        $filename = 'Facture';
        $directory=__DIR__.'/../../../web/pdf/';
        $path=$directory.$filename.$id.".pdf";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I');
        $pdf->Output($path,'F');
       
    $livraison= $em->getRepository('vetrinaBundle:Livraison')->find($demandes->getLivraison());
    $livraison->setPdf($path);
    $em->persist($livraison);
      $em->flush();
     
       $vetement->setDisponibilite(FALSE);
       $em->flush();
      
    
}
}
