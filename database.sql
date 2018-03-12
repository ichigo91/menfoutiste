-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 12 mars 2018 à 22:21
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hots`
--
CREATE DATABASE IF NOT EXISTS `hots` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hots`;

-- --------------------------------------------------------

--
-- Structure de la table `build`
--

CREATE TABLE `build` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `heros` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `1` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `7` varchar(255) NOT NULL,
  `10` varchar(255) NOT NULL,
  `13` varchar(255) NOT NULL,
  `16` varchar(255) NOT NULL,
  `20` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `build`
--

INSERT INTO `build` (`id`, `id_user`, `heros`, `type`, `comments`, `1`, `4`, `7`, `10`, `13`, `16`, `20`) VALUES
(1, '1', '1', 'shield', '', '2', '1', '3', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Structure de la table `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `classe` int(1) NOT NULL,
  `img_min` varchar(255) NOT NULL,
  `1` text NOT NULL,
  `4` text NOT NULL,
  `7` text NOT NULL,
  `10` text NOT NULL,
  `13` text NOT NULL,
  `16` text NOT NULL,
  `20` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `heros`
--

INSERT INTO `heros` (`id`, `nom`, `classe`, `img_min`, `1`, `4`, `7`, `10`, `13`, `16`, `20`) VALUES
(1, 'Tyraël', 0, '22_portrait_tyrael.jpg', 'a:3:{i:0;a:3:{s:3:\"nom\";s:14:\"Sauvegarde (Z)\";s:11:\"description\";s:192:\"Augmente la capacité conféré à Tyraël par Vertu de 25% et lui rend 146 (+4% par niveau) points de vie si ce bouclier est détruit. N\'augmente pas le bouclier dont bénéficie les alliés.\";s:5:\"image\";s:22:\"188_sauvegarde--z-.jpg\";}i:1;a:3:{s:3:\"nom\";s:23:\"Justice universelle (Z)\";s:11:\"description\";s:105:\"Porte la capacité du bouclier conféré aux alliés par Vertu à 100% de celui dont bénéficie Tyraël.\";s:5:\"image\";s:33:\"11205_justice-universelle--z-.jpg\";}i:2;a:3:{s:3:\"nom\";s:21:\"Restauration cuisante\";s:11:\"description\";s:222:\"Infliger des dégâts à un héros rend 14 (+4% par niveau) points de vie en 5 secondes à Tyraël. Infliger des dégâts réinitialise cette durée et permet de cumuler le montant de points de vie rendus jusqu\'à 10 fois.\";s:5:\"image\";s:31:\"11206_restauration-cuisante.png\";}}', 'a:3:{i:0;a:3:{s:3:\"nom\";s:18:\"Archangélisme (A)\";s:11:\"description\";s:118:\"Confère 20 points d\'armure tant que Puissance d\'El\'Druin est active et jusqu\'à 3 secondes après la téléportation.\";s:5:\"image\";s:27:\"11207_archangelisme--a-.jpg\";}i:1;a:3:{s:3:\"nom\";s:19:\"Lié par la loi (A)\";s:11:\"description\";s:228:\"Augmente le ralentissement de Puissance d\'El\'Druin de 10%. Les attaques de base portées à des ennemis ralentis par Puissance d\'El\'Druin augmentent la durée de ce ralentissement de 1 seconde, jusqu\'à un maximum de 4 secondes.\";s:5:\"image\";s:28:\"11208_lie-par-la-loi--a-.jpg\";}i:2;a:3:{s:3:\"nom\";s:18:\"Vigueur divine (E)\";s:11:\"description\";s:195:\"Si Châtiment touche un ennemi, es attaques de base de Tyraël portées dans les 4 secondes qui suivent lui rendent un montant de points de vie équivalent à 50% des dégâts qu\'elles infligent.\";s:5:\"image\";s:28:\"11209_vigueur-divine--e-.jpg\";}}', 'a:3:{i:0;a:3:{s:3:\"nom\";s:10:\"Talion (Z)\";s:11:\"description\";s:139:\"À son expiration ou sa destruction, le bouclier de Tyraël explose et inflige 177 (+4% par niveau) points de dégâts aux ennemis proches.\";s:5:\"image\";s:18:\"177_talion--z-.jpg\";}i:1;a:3:{s:3:\"nom\";s:23:\"Purification du mal (E)\";s:11:\"description\";s:125:\"Chaque héros adverse touché par Châtiment augmente les dégâts des attaques de base de Tyraël de 35% pendant 4 secondes.\";s:5:\"image\";s:31:\"168_purification-du-mal--e-.jpg\";}i:2;a:3:{s:3:\"nom\";s:25:\"Vindicte instantanée (E)\";s:11:\"description\";s:121:\"Châtiment augmente la vitesse de déplacement de 20% supplémentaires et la vitesse d\'attaque de 25% pendant 2 secondes.\";s:5:\"image\";s:32:\"173_vindicte-instantanee--e-.jpg\";}}', 'a:2:{i:0;a:3:{s:3:\"nom\";s:12:\"Jugement (R)\";s:11:\"description\";s:232:\"Après un délai de 0.75 seconde, charge un héros ennemi, lui inflige 156 (+4% par niveau) points de dégâts et l\'étourdit pendant 1.5 secondes. Repousse les ennemis proches et leur inflige 78 (+4% par niveau) points de dégâts.\";s:5:\"image\";s:20:\"180_jugement--r-.jpg\";}i:1;a:3:{s:3:\"nom\";s:18:\"Sanctification (R)\";s:11:\"description\";s:109:\"Après 0.5 secondes, créé un champ d\'énergie sacrée qui rend les alliés invulnérables. Dure 3 secondes.\";s:5:\"image\";s:26:\"181_sanctification--r-.jpg\";}}', 'a:3:{i:0;a:3:{s:3:\"nom\";s:20:\"Epée de justice (A)\";s:11:\"description\";s:159:\"Quand Tyraël de téléporte auprès de son épée, il change de place avec elle et peut de nouveau activer la capacité pour revenir à sa position d\'origine.\";s:5:\"image\";s:27:\"186_epee-de-justice--a-.jpg\";}i:1;a:3:{s:3:\"nom\";s:16:\"Terre sainte (A)\";s:11:\"description\";s:109:\"Crée un cercle qui interdit aux ennemis l\'accès à la zone où Puissance d\'El\'Druin a téléporté Tyraël.\";s:5:\"image\";s:24:\"187_terre-sainte--a-.jpg\";}i:2;a:3:{s:3:\"nom\";s:27:\"Prévention et punition (Z)\";s:11:\"description\";s:218:\"Chaque héros adverse touché par Châtiment réduit le temps de recharge de Vertu de 1 seconde. Chaque héros allié bénéficiant d\'un bouclier conféré par Vertu augmente les dégâts du prochain Châtiment de 25%.\";s:5:\"image\";s:36:\"11210_prevention-et-punition--z-.jpg\";}}', 'a:3:{i:0;a:3:{s:3:\"nom\";s:20:\"Forge horadrique (A)\";s:11:\"description\";s:103:\"Les attaques de base de Tyraël réduisent le temps de recharge de Puissance d\'El\'Druin de 1.5 seconde.\";s:5:\"image\";s:28:\"167_forge-horadrique--a-.jpg\";}i:1;a:3:{s:3:\"nom\";s:16:\"Nimbe ardent (A)\";s:11:\"description\";s:252:\"Tant que Puissance d\'El\'Druin est active, Tyraël et El\'Druin infligent 16 (+4% par niveau) points de dégâts par seconde aux ennemis proches. Pendant 3 secondes après s\'être téléporté, Tyraël continue d\'infliger ces dégâts augmentés de 100%.\";s:5:\"image\";s:26:\"11211_nimbe-ardent--a-.jpg\";}i:2;a:3:{s:3:\"nom\";s:14:\"Bras armé (E)\";s:11:\"description\";s:151:\"Tant que Puissance d\'El\'Druin est active et jusqu\'à 3 secondes après la téléportation, le temps de recharge de Châtiment s\'écoule 100% plus vite.\";s:5:\"image\";s:23:\"11212_bras-arme--e-.jpg\";}}', 'a:4:{i:0;a:3:{s:3:\"nom\";s:22:\"Ange de la Justice (R)\";s:11:\"description\";s:74:\"Augmente la portée de 50% et réduit le temps de recharge de 40 secondes.\";s:5:\"image\";s:30:\"192_ange-de-la-justice--r-.jpg\";}i:1;a:3:{s:3:\"nom\";s:18:\"Arène sacrée (R)\";s:11:\"description\";s:106:\"Augmente la durée de Sanctification de 1 seconde et les dégâts des alliés qui en bénéficient de 25%.\";s:5:\"image\";s:24:\"193_arene-sacree--r-.jpg\";}i:2;a:3:{s:3:\"nom\";s:19:\"Défense angélique\";s:11:\"description\";s:189:\"Confère 40 points d\'armure pendant 4 secondes.\r\nChaque fois que le bouclier conféré par Vertu absorbe des dégâts, le temps de recharge de Défense angélique est réduit de 3 secondes.\";s:5:\"image\";s:27:\"11213_defense-angelique.png\";}i:3;a:3:{s:3:\"nom\";s:16:\"Sceau d\'El\'Druin\";s:11:\"description\";s:87:\"Utiliser une capacité de base augmente la vitesse d\'attaque de 50% pendant 3 secondes.\";s:5:\"image\";s:24:\"11214_sceau-deldruin.png\";}}'),
(2, 'Kramer', 0, '319_portrait_kramer.jpg', '', '', '', '', '', '', ''),
(3, 'Diablo', 0, '4_portrait_diablo.jpg', '', '', '', '', '', '', ''),
(4, 'Maiev', 2, '320_portrait_maiev.jpg', '', '', '', '', '', '', ''),
(5, 'Uther', 1, '24_portrait_uther.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pick` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `pick`) VALUES
(1, 'ichigo91', '6ddbcf9220a0a67e0c4575410fc19f046ef17e86', '20211'),
(2, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '01201');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `build`
--
ALTER TABLE `build`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
