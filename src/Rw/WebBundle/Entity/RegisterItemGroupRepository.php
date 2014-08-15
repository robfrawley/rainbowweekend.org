<?php

namespace Rw\WebBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RegisterItemGroupRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RegisterItemGroupRepository extends EntityRepository
{
	public function findAllOrderByWeight($order = 'ASC')
    {   
        $q = $this
            ->createQueryBuilder('i')
            ->orderBy('i.weight', $order)
            ->getQuery()
        ;
        
        try {
            $entries = $q->getResult();
        }
        catch (NoResultException $e) {
            return [];
        }

        return $entries;
    }
}