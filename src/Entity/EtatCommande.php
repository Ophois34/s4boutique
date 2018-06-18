<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatCommandeRepository")
 */
class EtatCommande
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
    private $libelleEtatCommande;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleEtatCommande(): ?string
    {
        return $this->libelleEtatCommande;
    }

    public function setLibelleEtatCommande(string $libelleEtatCommande): self
    {
        $this->libelleEtatCommande = $libelleEtatCommande;

        return $this;
    }
}
