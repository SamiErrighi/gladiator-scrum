<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 16/12/2014
 * Time: 15:06
 */

namespace Gladiator\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="armuries")
 * @author Sami Errighi
 */
class Armury
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Gladiator\Bundle\Entity\Equipement", mappedBy="armuries")
     **/
    private $equipements;

    /**
     * @ORM\ManyToMany(targetEntity="Gladiator\Bundle\Entity\Gladiator", mappedBy="armuries")
     **/
    private $gladiators;

    public function __construct() {
        $this->equipements = new ArrayCollection();
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