<?php

namespace vetrinaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vetrinaBundle\Entity\Vetement;
use vetrinaBundle\Entity\Client;
use Ob\HighchartsBundle\Highcharts\Highchart;
class StatsController extends Controller
{
    public function chartAction()
{
      $ob = new Highchart();
      $ob->chart->backgroundColor(null);
      
    

$ob->chart->renderTo('linechart');
$ob->title->text('Nombre de client par rapport au vetement');
$ob->plotOptions->pie(array(
    'allowPointSelect'  => true,
    'cursor'    => 'pointer',
    'dataLabels'    => array('enabled' => false),
    'showInLegend'  => true
    
));
  $em = $this->getDoctrine()->getManager();
  $client= $em->getRepository('vetrinaBundle:Client')->nombreclient();
  $vetement= $em->getRepository('vetrinaBundle:Vetement')->nombrevetement();
  $total= $client+ $vetement;
  $c= $client*100/$total;
  $v= $vetement*100/$total;
$data = array(
    array('Client', $c),
    array('Vetement', $v),
   
);
$ob->series(array(array('type' => 'pie','name' => 'pourcentage', 'data' => $data)));

    return $this->render('vetrinaBundle:Default:chart.html.twig', array(
        'chart' => $ob , 'client'=> $client ,'vetement'=> $vetement
    ));
}
    
}