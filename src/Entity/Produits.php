<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $refProduit;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomProduit;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prixProduit;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $tailleProduit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $couleurProduit;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $photoProduit;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionProduit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories")
     * @ORM\JoinColumn(nullable=false)
     */
    //jointure vers la table Categories -> id 
    private $idCategorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $stocksProduit;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexeProduit;

    public function getId()
    {
        return $this->id;
    }

    public function getRefProduit(): ?string
    {
        return $this->refProduit;
    }

    public function setRefProduit(string $refProduit): self
    {
        $this->refProduit = $refProduit;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    public function setPrixProduit($prixProduit): self
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    public function getTailleProduit(): ?string
    {
        return $this->tailleProduit;
    }

    public function setTailleProduit(string $tailleProduit): self
    {
        $this->tailleProduit = $tailleProduit;

        return $this;
    }

    public function getCouleurProduit(): ?string
    {
        return $this->couleurProduit;
    }

    public function setCouleurProduit(string $couleurProduit): self
    {
        $this->couleurProduit = $couleurProduit;

        return $this;
    }

    public function getPhotoProduit()
    {
        return $this->photoProduit;
    }

    public function setPhotoProduit($photoProduit)
    {
        $this->photoProduit = $photoProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->descriptionProduit;
    }

    public function setDescriptionProduit(string $descriptionProduit): self
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    public function getIdCategorie(): ?categories
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?categories $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getStocksProduit(): ?int
    {
        return $this->stocksProduit;
    }

    public function setStocksProduit(int $stocksProduit): self
    {
        $this->stocksProduit = $stocksProduit;

        return $this;
    }

    public function getSexeProduit(): ?string
    {
        return $this->sexeProduit;
    }

    public function setSexeProduit(string $sexeProduit): self
    {
        $this->sexeProduit = $sexeProduit;

        return $this;
    }
}
