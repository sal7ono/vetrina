<?php

namespace vetrinaBundle\Repository;

/**
 * DemandeAchatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DemandeAchatRepository extends \Doctrine\ORM\EntityRepository
{ public function ByidClient($id)
{
    $qb= $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.client=:id')
                ->orderBy('u.id')
                ->setParameter('id',$id);
        return $qb->getQuery()->getResult();
}
 public function bydemandeachat($vetement)
 {$qb= $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.vetement IN (:vetement)')
                ->orderBy('u.id')
                ->setParameter('vetement',$vetement);
        return $qb->getQuery()->getResult();
     
     
     
 }
 public function byidLivraison($id)
{$qb= $this->createQueryBuilder('u')
                ->select('u.Livraison')
                ->where('u.id=:id')
                ->orderBy('u.id')
                ->setParameter('id',$id);
        return $qb->getQuery()->getResult();
    
}
public function byLivraison($id)
{$qb= $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.Livraison IN (:id)')
               
                ->setParameter('id',$id);
        return $qb->getQuery()->getResult();
    
}
}