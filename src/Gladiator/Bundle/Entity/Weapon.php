<?php

namespace Gladiator\Bundle\Entity;

use Gladiator\Bundle\InterfaceManager\IAttack;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Weapon
 * @ORM\Entity
 * @ORM\Table(name="weapons")
 * @package Gladiator\Bundle\Entity
 */
class Weapon extends Equipement implements IAttack
{
    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="decimal")
     */
    private $rateAtq;

    public function hit()
    {

    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getRateAtq()
    {
        return $this->rateAtq;
    }

    /**
     * @param mixed $rateAtq
     */
    public function setRateAtq($rateAtq)
    {
        $this->rateAtq = $rateAtq;
    }

}