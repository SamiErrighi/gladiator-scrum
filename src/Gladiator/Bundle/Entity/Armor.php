<?php

namespace Gladiator\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gladiator\Bundle\InterfaceManager\IDefense;

/**
 * Class Weapon
 * @ORM\Entity
 * @ORM\Table(name="armors")
 * @package Gladiator\Bundle\Entity
 */
class Armor extends Equipement implements IDefense
{
    /**
     * @ORM\Column(type="decimal")
     */
    private $rateDef;

    public function flee()
    {

    }

    /**
     * @return mixed
     */
    public function getRateDef()
    {
        return $this->rateDef;
    }

    /**
     * @param mixed $rateDef
     */
    public function setRateDef($rateDef)
    {
        $this->rateDef = $rateDef;
    }


}