-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 19 juin 2018 à 17:01
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `s4boutique`
--
CREATE DATABASE IF NOT EXISTS `s4boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `s4boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle_categorie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle_categorie`) VALUES
(1, 'TShirt'),
(2, 'Veste');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nomclient` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_client` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_client` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_client` varchar(62) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_client` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_client` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_client` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_client` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite_client` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_client` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nomclient`, `prenom_client`, `email_client`, `password_client`, `adresse_client`, `cp_client`, `ville_client`, `tel_client`, `civilite_client`, `newsletter_client`, `is_active`, `roles`) VALUES
(1, 'TAVERNIER', 'Bruno', 'ophois34@gmail.com', '$2y$14$y65OCDVCUZqrn/ULZc7UhuP7gq3xYuJv3psnqaN5TxP3UsJQu2KIW', 'rue Tabaga', '34000', 'Montpellier', '0607080910', 'h', 'n', 1, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(2, 'TAVERNIER', 'Bruno', 'info@ophois.com', '$2y$14$CZzTVIHmLXbAN15ItldkpuVWPyJNlrJ07dfQAjI2BHkj.fKb6fa1u', 'rue Tabaga', '34000', 'Montpellier', '0612065717', 'h', 'o', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(3, 'TAVERNIER', 'Bruno', 'ophois@ophois.com', '$2y$14$uXYWWnmd..d0lHdYAK17ZuYClcCGNFqGOESk.MlMgNeDIcNa2DxCq', 'rue Tabaga', '34000', 'Montpellier', '0612065717', 'h', 'n', 1, 'a:1:{i:0;s:9:\"ROLE_USER\";}');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_reglement` int(11) NOT NULL,
  `id_etat_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE `detail_commande` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `quantite_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_commande`
--

DROP TABLE IF EXISTS `etat_commande`;
CREATE TABLE `etat_commande` (
  `id` int(11) NOT NULL,
  `libelle_etat_commande` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180614080445'),
('20180614142734'),
('20180618083414');

-- --------------------------------------------------------

--
-- Structure de la table `mode_reglement`
--

DROP TABLE IF EXISTS `mode_reglement`;
CREATE TABLE `mode_reglement` (
  `id` int(11) NOT NULL,
  `libelle_reglement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit_id` int(11) NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `date_panier` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_client`, `id_produit_id`, `quantite_produit`, `date_panier`) VALUES
(1, 1, 3, 5, '2018-06-15 12:44:30'),
(3, 2, 3, 2, '2018-06-15 13:37:44'),
(5, 1, 1, 1, '2018-06-18 14:21:30'),
(8, 1, 4, 2, '0000-00-00 00:00:00'),
(9, 1, 2, 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `id_categorie_id` int(11) NOT NULL,
  `ref_produit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_produit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_produit` decimal(5,2) NOT NULL,
  `taille_produit` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_produit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_produit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_produit` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stocks_produit` int(11) NOT NULL,
  `sexe_produit` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `id_categorie_id`, `ref_produit`, `nom_produit`, `prix_produit`, `taille_produit`, `couleur_produit`, `photo_produit`, `description_produit`, `stocks_produit`, `sexe_produit`) VALUES
(1, 1, '001', 'Tshirt Moche', '250.00', 'L', 'blouge', 'tshirt_moche_blouge.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fringilla aliquet tempor. Sed lorem nulla, pellentesque vitae purus eu, commodo laoreet turpis. Proin nibh ex, hendrerit nec facilisis et, luctus elementum dolor. Sed auctor dui id magna lacinia vestibulum. Donec eros urna, sagittis vitae blandit ac, pretium ut magna. Phasellus consequat, purus vel suscipit imperdiet, libero mauris convallis tortor, vitae tempor dolor lorem nec nibh. Nam at mi eget eros suscipit vestibulum tempor a felis. Nam dignissim, mauris eu viverra elementum, ipsum lectus pretium massa, sed tincidunt purus ipsum non nibh. Ut at turpis id dolor porta eleifend ac vitae mi. Aenean congue mi sit amet quam aliquet, ac scelerisque nisi ultricies. Sed id ante nulla. Sed faucibus sodales accumsan. Vivamus laoreet nulla et magna lacinia, et faucibus velit dictum. Curabitur in erat dui. Phasellus facilisis dui in massa convallis, in volutpat magna placerat. Curabitur lorem massa, malesuada a nunc id, condimentum scelerisque dolor.', 5, 'M'),
(2, 1, '002', 'Tshirt beurk', '250.00', 'XXL', 'greige', 'tshirt_beurk_greige.jpg', 'Vivamus mattis sed justo in cursus. Nulla facilisi. Cras et enim lacus. Duis vehicula massa non metus volutpat, vel tincidunt eros euismod. In dignissim, risus nec ultricies rhoncus, felis augue commodo augue, vel porta nisl nisi ac magna. Maecenas ex augue, rhoncus sit amet viverra ut, tempus efficitur massa. Duis laoreet luctus nisl ac fermentum. Nam odio dui, tristique eget volutpat in, vestibulum nec massa. Integer at arcu leo. Sed quis rhoncus lectus, vel efficitur dui. Mauris et dolor consequat, hendrerit neque at, sodales ante. Aliquam erat volutpat. Phasellus lobortis eu neque id tempus. Phasellus faucibus ante ac odio tempor, in fringilla dui malesuada.', 8, 'F'),
(3, 2, '003', 'Veste Moche', '250.00', 'L', 'blouge', 'veste_moche_blouge.jpg', 'Vestibulum consectetur, elit vehicula placerat vulputate, odio libero placerat erat, nec consectetur est odio vitae eros. Pellentesque vitae maximus dolor. Praesent in viverra est. Integer id enim eu ex placerat pretium quis ac dui. Aenean sed bibendum nisl, a tempus ex. Fusce non erat quis magna placerat rhoncus. Cras ut ex lorem. Suspendisse purus lectus, tincidunt luctus augue a, semper ornare tellus. In elementum dolor libero, vel commodo risus pretium et. Morbi eros felis, imperdiet ut ultrices a, dapibus at massa. Fusce quis nulla magna. Mauris tempor lobortis nisl, a lacinia mi facilisis sit amet. Vestibulum enim risus, venenatis nec quam id, aliquam elementum dui. Quisque eget dolor nec nibh efficitur sollicitudin.', 0, 'M'),
(4, 2, '004', 'Veste beurk', '250.00', 'XXL', 'greige', 'veste_beurk_greige.jpg', 'Ut vestibulum justo rhoncus semper tincidunt. Aenean id pellentesque mi, sit amet iaculis mauris. Aenean in congue erat. Nulla facilisi. Vestibulum ut mauris a eros laoreet aliquam. Suspendisse quis dignissim turpis. Integer consequat dolor nulla, eu condimentum mi aliquam in. Integer eget blandit justo. Vestibulum in elementum arcu. Nullam luctus, tortor ut interdum rhoncus, leo lectus aliquam nunc, in luctus nunc risus sit amet neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum bibendum facilisis pharetra. Praesent quis ipsum eu orci aliquam fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 8, 'F'),
(12, 1, 'cvbvc', 'sdds', '0.00', 'sfs', 'fsd', 'f30b6af84d5f86ccfd0a37312543668a.jpeg', 'fsdfds', 3, 'h'),
(13, 2, '0245', 'veste rouge', '500.00', 'XL', 'rouge', 'f25dd436bfbdcf86db60963177a4893e.jpeg', 'veste rouge discrète pour soirée habillées', 1, 'F'),
(14, 2, '0123', 'Veste sapin', '250.00', 'M', 'verte', 'b59123621dfb809f4267a114c6d9c2f6.jpeg', 'Veste sapin de Noël. Parfaite pour avoir les boules...', 2, 'F'),
(15, 2, '045', 'Veste bleue', '168.00', 'L', 'bleue', '995555979498769710f52f03386d5da4.jpeg', 'veste bleue', 1, 'M');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etat_commande`
--
ALTER TABLE `etat_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `mode_reglement`
--
ALTER TABLE `mode_reglement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_24CC0DF2AABEFE2C` (`id_produit_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BE2DDF8C9F34925F` (`id_categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_commande`
--
ALTER TABLE `etat_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mode_reglement`
--
ALTER TABLE `mode_reglement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_24CC0DF2AABEFE2C` FOREIGN KEY (`id_produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_BE2DDF8C9F34925F` FOREIGN KEY (`id_categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
