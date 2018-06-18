<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idClient;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="integer")
     */
    private $idReglement;

    /**
     * @ORM\Column(type="integer")
     */
    private $idEtatCommande;

    public function getId()
    {
        return $this->id;
    }

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function setIdClient(int $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getIdReglement(): ?int
    {
        return $this->idReglement;
    }

    public function setIdReglement(int $idReglement): self
    {
        $this->idReglement = $idReglement;

        return $this;
    }

    public function getIdEtatCommande(): ?int
    {
        return $this->idEtatCommande;
    }

    public function setIdEtatCommande(int $idEtatCommande): self
    {
        $this->idEtatCommande = $idEtatCommande;

        return $this;
    }
}
