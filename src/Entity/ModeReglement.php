<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeReglementRepository")
 */
class ModeReglement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $libelleReglement;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleReglement(): ?string
    {
        return $this->libelleReglement;
    }

    public function setLibelleReglement(string $libelleReglement): self
    {
        $this->libelleReglement = $libelleReglement;

        return $this;
    }
}
