<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 16/12/2014
 * Time: 21:48
 */

namespace Gladiator\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gladiator\Bundle\Entity\Weapon;

class LoadWeaponData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Weapon();

        $manager->persist($userAdmin);
        $manager->flush();
    }
}