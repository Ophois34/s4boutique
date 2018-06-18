<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180614080445 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nomclient VARCHAR(50) NOT NULL, prenom_client VARCHAR(60) NOT NULL, email_client VARCHAR(100) NOT NULL, password_client VARCHAR(62) NOT NULL, adresse_client VARCHAR(150) NOT NULL, cp_client VARCHAR(5) NOT NULL, ville_client VARCHAR(100) NOT NULL, tel_client VARCHAR(20) NOT NULL, civilite_client VARCHAR(1) NOT NULL, newsletter_client VARCHAR(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, date_commande DATETIME NOT NULL, id_reglement INT NOT NULL, id_etat_commande INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_commande (id INT AUTO_INCREMENT NOT NULL, id_commande INT NOT NULL, idproduit INT NOT NULL, quantite_produit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_commande (id INT AUTO_INCREMENT NOT NULL, libelle_etat_commande VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_reglement (id INT AUTO_INCREMENT NOT NULL, libelle_reglement VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, id_produit INT NOT NULL, quantite_produit INT NOT NULL, date_panier DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT NOT NULL, ref_produit VARCHAR(20) NOT NULL, nom_produit VARCHAR(50) NOT NULL, prix_produit NUMERIC(5, 2) NOT NULL, taille_produit VARCHAR(3) NOT NULL, couleur_produit VARCHAR(20) NOT NULL, photo_produit VARCHAR(100) NOT NULL, description_produit LONGTEXT NOT NULL, stocks_produit INT NOT NULL, sexe_produit VARCHAR(1) NOT NULL, INDEX IDX_BE2DDF8C9F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C9F34925F');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE detail_commande');
        $this->addSql('DROP TABLE etat_commande');
        $this->addSql('DROP TABLE mode_reglement');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produits');
    }
}
