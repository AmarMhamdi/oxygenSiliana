<?php

/**
 * Description of AdherentRepository
 *
 * @author Amaar
 */
namespace Oxygen\SalleDeSportBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AdherentRepository extends EntityRepository{
/**
 * @param string $role
 *
 * @return array
 */
public function findByRole($role)
{
   $query = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM OxygenSalleDeSportBundle:Adherent u WHERE u.roles LIKE :role'
            )->setParameter('role', '%"ROLE_MY_ADMIN"%');

   $trainers = $query->getResult();

    return $trainers;
}
}
