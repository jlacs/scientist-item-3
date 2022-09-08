<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use App\Entities\Scientist;

/**
 * @ORM\Entity
 * @ORM\Table(name="theories")
 */
class Theories
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
    protected string $title;

    /**
    * @ORM\ManyToOne(targetEntity="Scientist", inversedBy="theories")
    * @ORM\JoinColumn(name="scientist_id", referencedColumnName="id", onDelete="CASCADE")
    * @var Scientist
    */
    protected $scientist;

    /**
    * @param $title
    */
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setScientist(Scientist $scientist)
    {
        $this->scientist = $scientist;
    }

    public function getScientist()
    {
        return $this->scientist;
    }
}