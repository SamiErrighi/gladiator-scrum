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
use Gladiator\Bundle\Entity\Armor;

class LoadArmorData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $armor = new Armor();

        $manager->persist($armor);
        $manager->flush();
    }
}