<?php

namespace Gladiator\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gladiator\Bundle\Validator\Constraints\UniqueNameEquipe;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Gladiator\Bundle\Entity\Repository\EquipeRepository")
 * @ORM\Table(name="equipes")
 * @author Sami Errighi
 */
class Equipe
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide")
     * @Assert\Length(max="100", maxMessage="trops grand")
     * @UniqueNameEquipe(message="Cette équipe existe déjà")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="User\Bundle\Entity\User", inversedBy="equipes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Gladiator\Bundle\Entity\Gladiator",mappedBy="equipe")
     */
    private $gladiators;

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