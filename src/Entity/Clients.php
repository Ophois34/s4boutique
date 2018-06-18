<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomclient;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailClient;

    /**
     * @ORM\Column(type="string", length=62)
     */
    private $passwordClient;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $adresseClient;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cpClient;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $villeClient;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telClient;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $civiliteClient;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $newsletterClient;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    /**
    * @ORM\Column(type="array")
    */
    private $roles;

    // constructeur. Définit le statut actif et ajoute le role ADMIN automatiquement
    public function __construct()
    {
        $this->isActive = true;
        $this->roles[] = 'ROLE_USER';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomclient(): ?string
    {
        return $this->nomclient;
    }

    public function setNomclient(string $nomclient): self
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }
    //méthode imposée par l'interface
    public function getUsername(): ?string
    {
        return $this->emailClient;
    }
    // méthode imposée par l'interface
    public function setUsername(string $emailClient): self
    {
        $this->emailClient = $emailClient;
        return $this;
    }
    //méthode imposée par l'interface
    public function getPassword(): ?string
    {
        return $this->passwordClient;
    }
    public function getPasswordClient(): ?string
    {
        return $this->passwordClient;
    }
    //méthode imposée par l'interface
    public function setPassword(string $passwordClient): self
    {
        $this->passwordClient = $passwordClient;
        return $this;
    }

    public function setPasswordClient(string $passwordClient): self
    {
        $this->passwordClient = $passwordClient;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresseClient;
    }

    public function setAdresseClient(string $adresseClient): self
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    public function getCpClient(): ?string
    {
        return $this->cpClient;
    }

    public function setCpClient(string $cpClient): self
    {
        $this->cpClient = $cpClient;

        return $this;
    }

    public function getVilleClient(): ?string
    {
        return $this->villeClient;
    }

    public function setVilleClient(string $villeClient): self
    {
        $this->villeClient = $villeClient;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getCiviliteClient(): ?string
    {
        return $this->civiliteClient;
    }

    public function setCiviliteClient(string $civiliteClient): self
    {
        $this->civiliteClient = $civiliteClient;

        return $this;
    }

    public function getNewsletterClient(): ?string
    {
        return $this->newsletterClient;
    }

    public function setNewsletterClient(string $newsletterClient): self
    {
        $this->newsletterClient = $newsletterClient;

        return $this;
    }
    //récupération des rôles
    public function getRoles()
    {
        return $this->roles; //return ['ROLE_USER'];
    }
    //récupération du "salt" (null car bcript le fait automatiquement)
    public function getSalt()
    {
        return null;
    }
    //fonction imposée par l'interface user
    public function eraseCredentials()
    {
    }
    //sérialisation de l'utilisateur (pour stocker en session)
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->emailClient,
            $this->passwordClient,
            $this->isActive
        ));
    }
    //dé-sérialisation de l'objet (session)
    public function unserialize($serialized)
    {
        list($this->id, 
                 $this->emailClient,
                 $this->passwordClient,
                 $this->isActive)
        = unserialize($serialized);
    }
    //ajout d'un role
    public function setRoles($val)
    {
        return $this->roles[] = $val;
    }
    //compte non expiré?
    public function isAccountNonExpired()
    {
        return true;
    }
    //Compte non vérouillé
    public function isAccountNonLocked()
    {
        return true;
    }
    //  identifiants non expirés
    public function isCredentialsNonExpired()
    {
        return true;
    }
    // est activé
    public function isEnabled()
    {
        return $this->isActive;
    }
}
