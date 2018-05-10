<?php
namespace vetrinaBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('tva',array($this,'calculTva')));
    }
    public function  calculTva($prix)
    {
        return round($prix / 0.75,0);
    }
    public function getName()
    {
        return 'tva_extension';
    }
}