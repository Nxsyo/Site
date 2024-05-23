<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'competence')]
class Competence
{
    #[ORM\Id]
    #[ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;
    
    #[ORM\Column(type: 'string', length: 255)] // Ajustez la longueur selon vos besoins
    private string $short_lib;
    
    #[ORM\Column(type: 'string', length: 1000)] // Ajustez la longueur selon vos besoins
    private string $long_lib;
    
    #[ORM\ManyToMany(targetEntity: Realisation::class, mappedBy: 'competences')]
    private $realisations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->realisations = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set shortLib.
     *
     * @param string $shortLib
     *
     * @return Competence
     */
    public function setShortLib($shortLib)
    {
        $this->short_lib = $shortLib;

        return $this;
    }

    /**
     * Get shortLib.
     *
     * @return string
     */
    public function getShortLib()
    {
        return $this->short_lib;
    }

    /**
     * Set longLib.
     *
     * @param string $longLib
     *
     * @return Competence
     */
    public function setLongLib($longLib)
    {
        $this->long_lib = $longLib;

        return $this;
    }

    /**
     * Get longLib.
     *
     * @return string
     */
    public function getLongLib()
    {
        return $this->long_lib;
    }

    /**
     * Add realisation.
     *
     * @param \Realisation $realisation
     *
     * @return Competence
     */
    public function addRealisation(\Realisation $realisation)
    {
        $this->realisations[] = $realisation;

        return $this;
    }

    /**
     * Remove realisation.
     *
     * @param \Realisation $realisation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRealisation(\Realisation $realisation)
    {
        return $this->realisations->removeElement($realisation);
    }

    /**
     * Get realisations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealisations()
    {
        return $this->realisations;
    }
}
