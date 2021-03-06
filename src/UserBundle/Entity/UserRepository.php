<?php

namespace UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function liste($role = 'ROLE_ADMIN')
    {
        $qb = $this->createQueryBuilder('u')
            ->Where('u.roles NOT LIKE :roles')
            ->setParameter('roles', '%' . $role . '%')
            ->orderBy('u.id', 'DESC');

        return $qb->getQuery()->getResult();

    }

    public function recherche(
        $nom = null,
        $prenom = null,
        $username = null,
        $sexe = null,
        $cin = null,
        $fonction = null,
        $departement,
        $role = 'ROLE_ADMIN'
    )
    {
        $qb = $this->createQueryBuilder('u')
            ->Where('u.roles NOT LIKE :roles')
            ->setParameter('roles', '%' . $role . '%')

            ->orderBy('u.id', 'DESC');

        if (!empty($nom)) {
            $qb->andWhere('u.nom like :nom')
                ->setParameter('nom', '%' . $nom . '%');
        }
        if (!empty($prenom)) {
            $qb->andWhere('u.prenom like :prenom')
                ->setParameter('prenom', '%' . $prenom . '%');
        }
        if (!empty($username)) {
            $qb->andWhere('u.username = :username')
                ->setParameter('username', $username);
        }
        if (!empty($sexe)) {
            $qb->andWhere('u.sexe = :sexe')
                ->setParameter('sexe', $sexe);
        }
        if (!empty($cin)) {
            $qb->andWhere('u.cin = :cin')
                ->setParameter('cin', $cin);
        }
        if (!empty($fonction)) {
            $qb->andWhere('u.fonction = :fonction')
                ->setParameter('fonction', $fonction);
        }
        if (!empty($departement)) {
            $qb->andWhere('u.departement = :departement')
                ->setParameter('departement', $departement);
        }

        return $qb->getQuery()->getResult();

    }


}
