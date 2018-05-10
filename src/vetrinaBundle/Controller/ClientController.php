<?php

 namespace vetrinaBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vetrinaBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    public function BienvenueAction()
    {
         $em = $this->getDoctrine()->getManager();
         $client=$em->getRepository('vetrinaBundle:Client')->find($this->container->get('security.context')->getToken()->getUser());
         return $this->render('vetrinaBundle:Default:bienvenue.html.twig',array('client'=>$client));
    }
}