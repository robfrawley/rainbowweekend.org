<?php

namespace Rw\WebBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProgramRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProgramRepository extends EntityRepository
{
	public function getByContextOrderByDatetime($context)
    {   
        $q = $this
            ->createQueryBuilder('p')
            ->where('p.context = :context')
            ->setParameter('context', $context)
            ->orderBy('p.datetime', 'ASC')
            ->getQuery()
        ;
        
        try {
            $entries = $q->getResult();
        }
        catch (NoResultException $e) {
            return null;
        }

        return $entries;
    }
}