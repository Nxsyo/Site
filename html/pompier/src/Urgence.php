<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table(name: 'urgences')]
class Urgence
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $niveau;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set niveau.
     *
     * @param string $niveau
     *
     * @return Urgence
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau.
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}
