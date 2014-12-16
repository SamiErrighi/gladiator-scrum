<?php

namespace Gladiator\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gladiators")
 * @author Sami Errighi
 */
class Gladiator
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
     * @ORM\ManyToOne(targetEntity="Gladiator\Bundle\Entity\Equipe", inversedBy="gladiators")
     * @ORM\JoinColumn(name="equipe_id", referencedColumnName="id", nullable=false)
     */
    private $equipe;

    /**
     * @ORM\ManyToMany(targetEntity="Gladiator\Bundle\Entity\Armury", inversedBy="gladiators")
     */
    private $armuries;

    public function __construct() {
        $this->armuries = new ArrayCollection();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @param mixed $equipe
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }

    /**
     * @return mixed
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * @param mixed $equipements
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;
    }

    /**
     * @return mixed
     */
    public function getArmuries()
    {
        return $this->armuries;
    }

    /**
     * @param mixed $armuries
     */
    public function setArmuries($armuries)
    {
        $this->armuries = $armuries;
    }



}