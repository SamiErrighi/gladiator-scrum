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

    public function isUniqueUpdate($id, $value, $edit_id)
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.id')
            ->where('e.user = :user')
            ->andWhere('e.name = :name')
            ->andWhere('e.id != :edit_id')
            ->setParameter(':user', $id)
            ->setParameter(':name', $value)
            ->setParameter(':edit_id', $edit_id)
            ->getQuery()
            ->getOneOrNullResult();

        if(null == $result) {
            return true;
        }

        return false;
    }
} 