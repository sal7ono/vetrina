<?php 
namespace vetrinaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use vetrinaBundle\Entity\Vetement;

class LoadVetementData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
         
    }
    public function getOrder()
    {
    return 2;
    }
}

