<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entities\Theories;

/**
 * @ORM\Entity
 * @ORM\Table(name="scientist")
 */
class Scientist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string")
     */
    protected string $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected string $lastname;

    /**
    * @ORM\OneToMany(targetEntity="Theories", mappedBy="scientist", cascade={"persist"})
    * @var ArrayCollection|Theories[]
    */
    protected $theories;

    /**
    * @param $firstname
    * @param $lastname
    */
    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;

        $this->theories = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function addTheory(Theories $theories)
    {
        if(!$this->theories->contains($theories)) {
            $theories->setScientist($this);
            $this->theories->add($theories);
        }
    }

    public function getTheories()
    {
        return $this->theories;
    }
}