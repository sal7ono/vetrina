<?php

namespace vetrinaBundle\Repository;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends \Doctrine\ORM\EntityRepository
{
    public function nombreclient() {
       return $this->createQueryBuilder('u')
             
               ->select('COUNT(u)')
 
                        ->getQuery()
 
                        ->getSingleScalarResult();
    }
}