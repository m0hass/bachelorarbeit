<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * StageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StageRepository extends EntityRepository
{
    public function listeStage($departement)
    {
        $qb = $this->createQueryBuilder('s')
            ->Where('s.departement = :departement')
            ->setParameter('departement', $departement)
            ->orderBy('s.id', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function etudiantsEnStage($departement)
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.valider = 1')
            ->andWhere('s.departement = :departement')
            ->setParameter('departement', $departement)
            ->andWhere(':now BETWEEN s.dateDebut AND s.dateFin')
            ->setParameter('now', new \Datetime())
            ->orderBy('s.id', 'DESC');

        return $qb->getQuery()->getResult();
    }

}
