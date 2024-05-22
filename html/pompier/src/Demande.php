<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table(name: 'demandes')]
class Demande
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ManyToOne(targetEntity: Engin::class)]
    #[JoinColumn(name: 'engin_id', referencedColumnName:'id')]
    private Engin|null $engin = null;
    #[ManyToOne(targetEntity: Urgence::class)]
    #[JoinColumn(name: 'urgence_id', referencedColumnName:'id')]
    private Urgence|null $urgence = null;
    #[ORM\Column(type: 'string')]
    private string $coment;


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
     * Set coment.
     *
     * @param string $coment
     *
     * @return Demande
     */
    public function setComent($coment)
    {
        $this->coment = $coment;

        return $this;
    }

    /**
     * Get coment.
     *
     * @return string
     */
    public function getComent()
    {
        return $this->coment;
    }

    /**
     * Set engin.
     *
     * @param \Engin|null $engin
     *
     * @return Demande
     */
    public function setEngin(\Engin $engin = null)
    {
        $this->engin = $engin;

        return $this;
    }

    /**
     * Get engin.
     *
     * @return \Engin|null
     */
    public function getEngin()
    {
        return $this->engin;
    }

    /**
     * Set urgence.
     *
     * @param \Urgence|null $urgence
     *
     * @return Demande
     */
    public function setUrgence(\Urgence $urgence = null)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get urgence.
     *
     * @return \Urgence|null
     */
    public function getUrgence()
    {
        return $this->urgence;
    }
}
