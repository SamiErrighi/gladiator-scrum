<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 16/12/2014
 * Time: 21:15
 */

namespace Gladiator\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gladiator\Bundle\InterfaceManager\IDefense;

/**
 * Class Trident
 * @ORM\Entity
 * @ORM\Table(name="tridents")
 * @package Gladiator\Bundle\Entity
 */
class Trident extends weapon implements IDefense
{
    public function flee()
    {

    }
} 