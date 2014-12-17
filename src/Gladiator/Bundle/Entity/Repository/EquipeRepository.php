<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 17/12/2014
 * Time: 14:26
 */

namespace Gladiator\Bundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class EquipeRepository extends EntityRepository
{
    public function isUnique($id, $value)
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.id')
            ->where('e.user = :user')
            ->andWhere('e.name = :name')
            ->setParameter(':user', $id)
            ->setParameter(':name', $value)
            ->getQuery()
            ->getOneOrNullResult();

        if(null == $result) {
            return true;
        }

        return false;
    }
} 