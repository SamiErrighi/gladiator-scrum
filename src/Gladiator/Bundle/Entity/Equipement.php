<?php

namespace Gladiator\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipements")
 * @author Sami Errighi
 */
class Equipement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $point;

    /**
     * @ORM\ManyToMany(targetEntity="Gladiator\Bundle\Entity\Gladiator", inversedBy="equipements")
     * @ORM\JoinTable(name="equipement_gladiators")
     */
    private $gladiators;

    public function __construct() {
        $this->gladiators = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param mixed $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return mixed
     */
    public function getGladiators()
    {
        return $this->gladiators;
    }

    /**
     * @param mixed $gladiators
     */
    public function setGladiators($gladiators)
    {
        $this->gladiators = $gladiators;
    }
} 