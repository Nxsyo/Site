<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table(name: 'typereas')]
class Typerea
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $environnement;


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
     * Set environnement.
     *
     * @param string $environnement
     *
     * @return Typerea
     */
    public function setEnvironnement($environnement)
    {
        $this->environnement = $environnement;

        return $this;
    }

    /**
     * Get environnement.
     *
     * @return string
     */
    public function getEnvironnement()
    {
        return $this->environnement;
    }
}
