-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 juil. 2023 à 17:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tazoomdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbactivity`
--

CREATE TABLE `tbactivity` (
  `IDACTIVITY` int(11) NOT NULL,
  `ACTIVITY` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbactivity`
--

INSERT INTO `tbactivity` (`IDACTIVITY`, `ACTIVITY`) VALUES
(3, 'Marchadise'),
(4, 'Test'),
(5, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `tbagenda`
--

CREATE TABLE `tbagenda` (
  `IDAGENDA` int(11) NOT NULL,
  `DATEEVENT` date DEFAULT NULL,
  `EVENT` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `HORSBEGING` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `HORSEND` varchar(25) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbagenda`
--

INSERT INTO `tbagenda` (`IDAGENDA`, `DATEEVENT`, `EVENT`, `HORSBEGING`, `HORSEND`) VALUES
(1, '2023-06-09', 'Reunion Mandena Antonio MSP', '09:46', '10:49'),
(7, '2023-06-22', 'Reunion Mandena Antonio MSPfdsq', '14:11', '14:24'),
(9, '2023-06-22', 'RDV Direction Nepenthes', '19:23', '19:31'),
(12, '2023-06-30', 'Reunion Mandena Antonio MSPFF', '10:55', '10:57'),
(15, '2023-07-05', 'Reunion Mandena Antonio MSPfdsq', '21:00', '23:58'),
(16, '2023-07-06', 'Reunion Mandena Antonio MSP2', '13:09', '13:12'),
(17, '2023-07-06', 'Achat materiel', '14:12', '14:11'),
(18, '2023-07-19', 'Reunion Mandena Antonio MSP', '06:21', '06:24');

-- --------------------------------------------------------

--
-- Structure de la table `tbcaisse`
--

CREATE TABLE `tbcaisse` (
  `IDCAISSE` int(11) NOT NULL,
  `DATETODAY` date DEFAULT NULL,
  `NUMSUIVIE` varchar(25) DEFAULT NULL,
  `NUMPIECE` varchar(25) DEFAULT NULL,
  `DESIGNATION` varchar(255) DEFAULT NULL,
  `INMONTANT` int(25) NOT NULL,
  `OUTMONTANT` int(25) NOT NULL,
  `USER` varchar(25) DEFAULT NULL,
  `TYPECAISSE` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbcaisse`
--

INSERT INTO `tbcaisse` (`IDCAISSE`, `DATETODAY`, `NUMSUIVIE`, `NUMPIECE`, `DESIGNATION`, `INMONTANT`, `OUTMONTANT`, `USER`, `TYPECAISSE`) VALUES
(1, '2023-07-04', 'E-F24-003', 'F-001-23-073', 'Paiement facture CARA', 520000, 0, 'Marcus', 'INCAISSE'),
(2, '2023-07-04', 'E-F24-0047', 'F-001-23-44', 'Tettt', 0, 5200, 'Marcus', 'OUTCAISSE');

-- --------------------------------------------------------

--
-- Structure de la table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `IDCUSTOMER` int(11) NOT NULL,
  `CODECUSTOMER` int(25) DEFAULT NULL,
  `RAISONSOCIAL` varchar(255) DEFAULT NULL,
  `ADRESSE` varchar(55) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CONTACT` varchar(25) DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL,
  `STAT` varchar(55) DEFAULT NULL,
  `RCS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbcustomer`
--

INSERT INTO `tbcustomer` (`IDCUSTOMER`, `CODECUSTOMER`, `RAISONSOCIAL`, `ADRESSE`, `EMAIL`, `CONTACT`, `NIF`, `STAT`, `RCS`) VALUES
(17, 4110001, 'ACTION CONTRE LA FAIM', 'Ambovombe', '', '', '000 000 00 00', '0000 00 00 0000 000 00', 'RCS/FD/A/0001/2023'),
(18, 4110002, 'ACTION CONTRE LA FAIM2', 'Lot III AH058 Amparihydd', 'marcus@tazoom.mg', '3444444444', '000 000 00 00', '43333', 'RCS/FD/A/0001/2023');

-- --------------------------------------------------------

--
-- Structure de la table `tbdesignation`
--

CREATE TABLE `tbdesignation` (
  `IDDESIGNATION` int(11) NOT NULL,
  `IDSECTION` int(11) NOT NULL,
  `IDMTYPE` int(11) NOT NULL,
  `DESIGNATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbdesignation`
--

INSERT INTO `tbdesignation` (`IDDESIGNATION`, `IDSECTION`, `IDMTYPE`, `DESIGNATION`) VALUES
(2, 31, 2, 'IMPRESSION AUTOCOLLANT SIMPLE');

-- --------------------------------------------------------

--
-- Structure de la table `tbdesigner`
--

CREATE TABLE `tbdesigner` (
  `IDDESIGNER` int(11) NOT NULL,
  `DESIGNER` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbdesigner`
--

INSERT INTO `tbdesigner` (`IDDESIGNER`, `DESIGNER`) VALUES
(41, 'Laetitia'),
(40, 'Maeva'),
(43, 'Marcus'),
(39, 'Stanley');

-- --------------------------------------------------------

--
-- Structure de la table `tbdevis`
--

CREATE TABLE `tbdevis` (
  `IDDEVIS` int(11) NOT NULL,
  `NUMDEVIS` varchar(255) NOT NULL,
  `DATECREATION` date DEFAULT NULL,
  `DATEFERMETURE` date DEFAULT NULL,
  `ETAT` varchar(255) DEFAULT NULL,
  `CODECUSTOMER` varchar(25) NOT NULL,
  `FAMILLE` varchar(55) DEFAULT NULL,
  `SOUSFAMILLE` varchar(55) DEFAULT NULL,
  `DESIGNATION` varchar(255) DEFAULT NULL,
  `QTE` int(11) DEFAULT NULL,
  `PU` int(25) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `ACTIVITE` varchar(55) DEFAULT NULL,
  `SESSION` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbdevis`
--

INSERT INTO `tbdevis` (`IDDEVIS`, `NUMDEVIS`, `DATECREATION`, `DATEFERMETURE`, `ETAT`, `CODECUSTOMER`, `FAMILLE`, `SOUSFAMILLE`, `DESIGNATION`, `QTE`, `PU`, `DESCRIPTION`, `ACTIVITE`, `SESSION`) VALUES
(1, '', NULL, NULL, NULL, '', 'AU', 'Autocollant', 'IMPRESSION AUTOCOLLANT + TRP', 99, 9999, '- Dimetion\r\n- Media imprimer : Autocollant\r\n- Finition : TRP\r\nPost : inclus', 'Marchadise', 'TZ0002'),
(2, '', NULL, NULL, NULL, '', 'Bache', 'Autocollant', 'IMPRESSION + TRP', 5, 5100, '- Blzls\r\n + dss', 'Marchadise', 'TZ0002'),
(3, '', NULL, NULL, NULL, '', 'Bache', 'Autocollant', 'IMPRESSION AUTOCOLLANT SIMPLE', 2, 5000, 'Test', 'test2', 'TZ0002');

-- --------------------------------------------------------

--
-- Structure de la table `tbfiles`
--

CREATE TABLE `tbfiles` (
  `IDFILE` int(11) NOT NULL,
  `NAMEFILE` varchar(255) DEFAULT NULL,
  `COMMENTAIRE` text DEFAULT NULL,
  `FILES` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbfiles`
--

INSERT INTO `tbfiles` (`IDFILE`, `NAMEFILE`, `COMMENTAIRE`, `FILES`) VALUES
(1, 'JOYEUX NOËL 2022.pdf', ' AnnV', 'app/files/JOYEUX NOËL 2022.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `tbformat`
--

CREATE TABLE `tbformat` (
  `IDFORMAT` int(11) NOT NULL,
  `FORMAT` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbformat`
--

INSERT INTO `tbformat` (`IDFORMAT`, `FORMAT`) VALUES
(20, '150x150'),
(29, '15x10'),
(19, '15x15'),
(17, '240x118'),
(24, '300x100'),
(28, 'A5'),
(18, 'S-XL');

-- --------------------------------------------------------

--
-- Structure de la table `tbmedia`
--

CREATE TABLE `tbmedia` (
  `IDMEDIA` int(11) NOT NULL,
  `MEDIA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbmedia`
--

INSERT INTO `tbmedia` (`IDMEDIA`, `MEDIA`) VALUES
(34, 'AU'),
(31, 'AU-TRP'),
(5, 'Autocollant'),
(20, 'Autocopiant'),
(3, 'Bache'),
(35, 'BC'),
(21, 'Bristol'),
(12, 'Casquette'),
(16, 'Cl&eacute; USB'),
(7, 'Dos bleu'),
(24, 'Envellope 10x21'),
(23, 'Envellope A4'),
(22, 'Envellope A5'),
(10, 'Oriflamme'),
(15, 'Parapluie'),
(17, 'PCB 150'),
(18, 'PCB 300'),
(19, 'PCM 80'),
(13, 'Polo'),
(25, 'PVC5 + RFL'),
(6, 'Reflechissant'),
(9, 'Rooll-Up'),
(14, 'Stylo'),
(11, 'Tee Shirt'),
(32, 'Textile'),
(8, 'Transparent');

-- --------------------------------------------------------

--
-- Structure de la table `tbmtype`
--

CREATE TABLE `tbmtype` (
  `IDMTYPE` int(11) NOT NULL,
  `IDSECTION` int(11) NOT NULL,
  `MTYPE` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbmtype`
--

INSERT INTO `tbmtype` (`IDMTYPE`, `IDSECTION`, `MTYPE`) VALUES
(1, 31, 'Autocolant'),
(2, 34, 'Autocolant2');

-- --------------------------------------------------------

--
-- Structure de la table `tbproduction`
--

CREATE TABLE `tbproduction` (
  `IDPRODUCTION` int(11) NOT NULL,
  `DATETODAY` date DEFAULT NULL,
  `NUMSUIVIE` varchar(25) DEFAULT NULL,
  `NUMBA` varchar(25) DEFAULT NULL,
  `CUSTOMER` varchar(255) DEFAULT NULL,
  `NUMBCPO` int(11) DEFAULT NULL,
  `DESIGNATION` text DEFAULT NULL,
  `MEDIA` varchar(255) DEFAULT NULL,
  `DIMENTION` int(11) DEFAULT NULL,
  `FORMAT` varchar(25) DEFAULT NULL,
  `FINITIONS` varchar(255) DEFAULT NULL,
  `QUANTITE` int(11) DEFAULT NULL,
  `DEADLINE` date DEFAULT NULL,
  `DESIGNER` varchar(255) DEFAULT NULL,
  `LIVREELE` date DEFAULT NULL,
  `REMARQUE` text DEFAULT NULL,
  `STATUS` varchar(25) DEFAULT NULL,
  `USERRECU` varchar(25) DEFAULT NULL,
  `YEARNOW` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbproduction`
--

INSERT INTO `tbproduction` (`IDPRODUCTION`, `DATETODAY`, `NUMSUIVIE`, `NUMBA`, `CUSTOMER`, `NUMBCPO`, `DESIGNATION`, `MEDIA`, `DIMENTION`, `FORMAT`, `FINITIONS`, `QUANTITE`, `DEADLINE`, `DESIGNER`, `LIVREELE`, `REMARQUE`, `STATUS`, `USERRECU`, `YEARNOW`) VALUES
(6, '2023-07-06', 'DP-F24-017', 'BA-F24-003', '17', 0, 'Autocollat reconnaisance', 'Autocollant', 200, '15x10', 'STD', 25, '2023-07-07', 'Maeva', '2023-07-08', '', 'En Attente', 'TZ0002', 2023);

-- --------------------------------------------------------

--
-- Structure de la table `tbtodolist`
--

CREATE TABLE `tbtodolist` (
  `IDTODOLIST` int(11) NOT NULL,
  `TODOLIST` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tbtodolist`
--

INSERT INTO `tbtodolist` (`IDTODOLIST`, `TODOLIST`) VALUES
(1, 'Envoyer credit Mr Marcus'),
(7, 'Envoyer Facture SRAF'),
(8, 'AChat Burotec'),
(19, 'fdsq');

-- --------------------------------------------------------

--
-- Structure de la table `tbusers`
--

CREATE TABLE `tbusers` (
  `IDUSER` int(11) NOT NULL,
  `NUMMAT` varchar(11) DEFAULT NULL,
  `TYPEUSER` varchar(25) DEFAULT NULL,
  `POSTEOCCUP` varchar(25) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `LASTNAME` varchar(255) DEFAULT NULL,
  `CIN` int(25) DEFAULT NULL,
  `DATEDENAISSANCE` date DEFAULT NULL,
  `DEPARTEMENT` varchar(255) DEFAULT NULL,
  `DATEEMBAUCHE` date DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CONFIRMATIONTOKEN` varchar(90) DEFAULT NULL,
  `CONFIRMEDAT` datetime DEFAULT NULL,
  `RESETTOKEN` varchar(60) DEFAULT NULL,
  `RESETAT` datetime DEFAULT NULL,
  `REMEMBERTOKEN` varchar(255) DEFAULT NULL,
  `URLFILE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbusers`
--

INSERT INTO `tbusers` (`IDUSER`, `NUMMAT`, `TYPEUSER`, `POSTEOCCUP`, `USERNAME`, `FIRSTNAME`, `LASTNAME`, `CIN`, `DATEDENAISSANCE`, `DEPARTEMENT`, `DATEEMBAUCHE`, `EMAIL`, `PASSWORD`, `CONFIRMATIONTOKEN`, `CONFIRMEDAT`, `RESETTOKEN`, `RESETAT`, `REMEMBERTOKEN`, `URLFILE`) VALUES
(1, 'TZ0001', 'User', 'Designer', 'Guerin ANDRIAMANA...', '910814291', 'Guerin ANDRIAMANANTENA', 2147483647, '1991-08-14', 'Adminitration', '2023-04-25', 'ghyslainguerin@gmail.com', '$2y$10$iYBCewm9S03aNshma5wPC.UZaWdZizz2oR2j7pl4Y6ecRgarxh1XS', 'rnccNGhCW6ouhJfcRb0E8e1XSuodeqsIYcbDwwyzaVIimC0XR0jeICkkn8kF', '2023-04-25 22:26:00', NULL, NULL, NULL, 'Guerin ANDRIAMANA....png'),
(2, 'TZ0002', 'Admin', 'Direction', 'Marcus', 'ATALAH', 'Marcus', 0, '2023-04-26', 'Adminitration', '2023-04-26', 'marcus@tazoom.mg', '$2y$10$iYBCewm9S03aNshma5wPC.UZaWdZizz2oR2j7pl4Y6ecRgarxh1XS', 'gXvU5JtIUKQNWL21m7omIX76Fz4QzgojuBOfcSck4rjwGkLygaU6f0fVcrzX', '2023-04-26 22:35:41', NULL, NULL, NULL, 'Marcus.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbactivity`
--
ALTER TABLE `tbactivity`
  ADD PRIMARY KEY (`IDACTIVITY`);

--
-- Index pour la table `tbagenda`
--
ALTER TABLE `tbagenda`
  ADD PRIMARY KEY (`IDAGENDA`);

--
-- Index pour la table `tbcaisse`
--
ALTER TABLE `tbcaisse`
  ADD PRIMARY KEY (`IDCAISSE`);

--
-- Index pour la table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`IDCUSTOMER`);

--
-- Index pour la table `tbdesignation`
--
ALTER TABLE `tbdesignation`
  ADD PRIMARY KEY (`IDDESIGNATION`),
  ADD UNIQUE KEY `DESIGNATION` (`DESIGNATION`),
  ADD KEY `IDSECTION_FK2_TOTBMEDIA` (`IDSECTION`),
  ADD KEY `IDMTYPE_FK_TOTBMTYPE` (`IDMTYPE`);

--
-- Index pour la table `tbdesigner`
--
ALTER TABLE `tbdesigner`
  ADD PRIMARY KEY (`IDDESIGNER`),
  ADD UNIQUE KEY `DESIGNER` (`DESIGNER`);

--
-- Index pour la table `tbdevis`
--
ALTER TABLE `tbdevis`
  ADD PRIMARY KEY (`IDDEVIS`);

--
-- Index pour la table `tbfiles`
--
ALTER TABLE `tbfiles`
  ADD PRIMARY KEY (`IDFILE`);

--
-- Index pour la table `tbformat`
--
ALTER TABLE `tbformat`
  ADD PRIMARY KEY (`IDFORMAT`),
  ADD UNIQUE KEY `TYPEFORMAT` (`FORMAT`);

--
-- Index pour la table `tbmedia`
--
ALTER TABLE `tbmedia`
  ADD PRIMARY KEY (`IDMEDIA`),
  ADD UNIQUE KEY `MEDIA` (`MEDIA`);

--
-- Index pour la table `tbmtype`
--
ALTER TABLE `tbmtype`
  ADD PRIMARY KEY (`IDMTYPE`),
  ADD UNIQUE KEY `MTYPE` (`MTYPE`),
  ADD KEY `IDSECTION_FK_TOTBMEDIA` (`IDSECTION`);

--
-- Index pour la table `tbproduction`
--
ALTER TABLE `tbproduction`
  ADD PRIMARY KEY (`IDPRODUCTION`);

--
-- Index pour la table `tbtodolist`
--
ALTER TABLE `tbtodolist`
  ADD PRIMARY KEY (`IDTODOLIST`);

--
-- Index pour la table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`IDUSER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbactivity`
--
ALTER TABLE `tbactivity`
  MODIFY `IDACTIVITY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tbagenda`
--
ALTER TABLE `tbagenda`
  MODIFY `IDAGENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tbcaisse`
--
ALTER TABLE `tbcaisse`
  MODIFY `IDCAISSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  MODIFY `IDCUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tbdesignation`
--
ALTER TABLE `tbdesignation`
  MODIFY `IDDESIGNATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbdesigner`
--
ALTER TABLE `tbdesigner`
  MODIFY `IDDESIGNER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `tbdevis`
--
ALTER TABLE `tbdevis`
  MODIFY `IDDEVIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbfiles`
--
ALTER TABLE `tbfiles`
  MODIFY `IDFILE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbformat`
--
ALTER TABLE `tbformat`
  MODIFY `IDFORMAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tbmedia`
--
ALTER TABLE `tbmedia`
  MODIFY `IDMEDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `tbmtype`
--
ALTER TABLE `tbmtype`
  MODIFY `IDMTYPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbproduction`
--
ALTER TABLE `tbproduction`
  MODIFY `IDPRODUCTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tbtodolist`
--
ALTER TABLE `tbtodolist`
  MODIFY `IDTODOLIST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbdesignation`
--
ALTER TABLE `tbdesignation`
  ADD CONSTRAINT `IDMTYPE_FK_TOTBMTYPE` FOREIGN KEY (`IDMTYPE`) REFERENCES `tbmtype` (`IDMTYPE`),
  ADD CONSTRAINT `IDSECTION_FK2_TOTBMEDIA` FOREIGN KEY (`IDSECTION`) REFERENCES `tbmedia` (`IDMEDIA`);

--
-- Contraintes pour la table `tbmtype`
--
ALTER TABLE `tbmtype`
  ADD CONSTRAINT `IDSECTION_FK_TOTBMEDIA` FOREIGN KEY (`IDSECTION`) REFERENCES `tbmedia` (`IDMEDIA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
