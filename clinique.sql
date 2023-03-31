-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 31 mars 2023 à 08:14
-- Version du serveur :  10.3.34-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `couverturesociale`
--

CREATE TABLE `couverturesociale` (
  `OrganismeSocial` varchar(100) DEFAULT NULL,
  `NumSecu` int(11) DEFAULT NULL,
  `EstAssure` tinyint(1) DEFAULT NULL,
  `EstALD` tinyint(1) DEFAULT NULL,
  `NomMutuelleAssu` varchar(100) DEFAULT NULL,
  `NumAdherent` varchar(100) DEFAULT NULL,
  `NomChambre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `couverturesociale`
--

INSERT INTO `couverturesociale` (`OrganismeSocial`, `NumSecu`, `EstAssure`, `EstALD`, `NomMutuelleAssu`, `NumAdherent`, `NomChambre`) VALUES
('MalakoffMederic', 111, 1, 0, 'Assurance ', '123456rez1354', '26'),
('aze', 1234, 1, 1, 'aze', '1324', 'c25'),
('Super', 74580, 1, 1, 'Incroyable', '7', '2'),
('azer', 784125, 1, 0, 'aze', '781451', '15e4'),
('test', 456156, 1, 1, 'test', '123', '123'),
('test', 456156, 1, 1, 'test', '123', '123'),
('test', 456156, 1, 1, 'test', '123', '123'),
('test', 456156, 1, 1, 'test', '123', '123'),
('azeaze', 1458236, 1, 0, 'azeaze', '14258', 'aze'),
('testenc', 145874551, 1, 0, 'test', '5464132', '45132586'),
('98rez4fd', 12, 1, 0, 'ezdfsc51', '84615', '84165'),
('rezf4156d', 1485, 1, 0, 'rfdsv846', 'ze9r8f4dsc65', '984615'),
('rt48g', 789, 1, 0, '9rz8fe4', '984f65', '984rd1f56'),
('rfd4156', 78945, 1, 0, '89re4f156d', '489165', '9f4s8d15'),
('8f75d4', 948156, 1, 0, '8e4dfs165', '481fds65', '46153'),
('9r8e4f15', 984156, 1, 1, '89er4f156', '984gfd156', '894ez165');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `NumSecuSociale` int(11) DEFAULT NULL,
  `CHEMIN_Cidenti` varchar(100) DEFAULT NULL,
  `CHEMIN_Cvitale` varchar(100) DEFAULT NULL,
  `CHEMIN_Cmutuelle` varchar(100) DEFAULT NULL,
  `CHEMIN_LivretFamille` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`NumSecuSociale`, `CHEMIN_Cidenti`, `CHEMIN_Cvitale`, `CHEMIN_Cmutuelle`, `CHEMIN_LivretFamille`) VALUES
(12, '../fichiers/17-03-2023_09.08.50test-tessstg-CARTEIDENTITECapture.PNG', '../fichiers/17-03-2023_09.08.50test-tessstg-MUTUELLECapture.PNG', '../fichiers/17-03-2023_09.08.50test-tessstg-CARTEVITALECapture.PNG', 'DEFAULT'),
(12, '../fichiers/17-03-2023_09.09.38test-tessstg-CARTEIDENTITECapture.PNG', '../fichiers/17-03-2023_09.09.38test-tessstg-MUTUELLECapture.PNG', '../fichiers/17-03-2023_09.09.38test-tessstg-CARTEVITALE', 'DEFAULT'),
(12, '../fichiers/17-03-2023_09.10.27test-tessstg-CARTEIDENTITECapture.PNG', '../fichiers/17-03-2023_09.10.27test-tessstg-MUTUELLECapture.PNG', '../fichiers/17-03-2023_09.10.27test-tessstg-CARTEVITALECapture.PNG', 'DEFAULT'),
(78945, '../fichiers/24-03-2023_08.25.06zer4d1f56-48fds615-CARTEIDENTITEBTS SIO - B1 - TP 4 - Linux.pdf', '../fichiers/24-03-2023_08.25.06zer4d1f56-48fds615-MUTUELLEBTS SIO - B1 - TP 4 - Linux.pdf', '../fichiers/24-03-2023_08.25.06zer4d1f56-48fds615-CARTEVITALEmission1-SLAM.pdf', 'DEFAULT'),
(948156, '../fichiers/24-03-2023_08.52.20e9r48gvf56-48dgf156-CARTEIDENTITEBTS SIO - B1 - TP 4 - Linux.pdf', '../fichiers/24-03-2023_08.52.20e9r48gvf56-48dgf156-MUTUELLEmission1-SLAM.pdf', '../fichiers/24-03-2023_08.52.20e9r48gvf56-48dgf156-CARTEVITALELa sécurité des données.docx', 'DEFAULT'),
(948156, '../fichiers/24-03-2023_08.52.38e9r48gvf56-48dgf156-CARTEIDENTITEBTS SIO - B1 - TP 4 - Linux.pdf', '../fichiers/24-03-2023_08.52.38e9r48gvf56-48dgf156-MUTUELLEmission1-SLAM.pdf', '../fichiers/24-03-2023_08.52.38e9r48gvf56-48dgf156-CARTEVITALELa sécurité des données.docx', 'DEFAULT'),
(984156, '../fichiers/30-03-2023_08.44.24e89g156f-984f156-CARTEIDENTITElotus-s-retail-growth-freehold--600.png', '../fichiers/30-03-2023_08.44.24e89g156f-984f156-MUTUELLElotus-s-retail-growth-freehold--600.png', '../fichiers/30-03-2023_08.44.24e89g156f-984f156-CARTEVITALElotus-s-retail-growth-freehold--600.png', 'DEFAULT');

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisations`
--

CREATE TABLE `hospitalisations` (
  `ID_PreAdmin` int(11) NOT NULL,
  `DateAdmi` date DEFAULT NULL,
  `Heure_inter` varchar(100) DEFAULT NULL,
  `ID_medecin` int(11) DEFAULT NULL,
  `ID_MotifAdmi` int(11) DEFAULT NULL,
  `NumSecuSociale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hospitalisations`
--

INSERT INTO `hospitalisations` (`ID_PreAdmin`, `DateAdmi`, `Heure_inter`, `ID_medecin`, `ID_MotifAdmi`, `NumSecuSociale`) VALUES
(1, '2023-03-09', '07:50', 3, 1, 111),
(2, '2023-03-10', '14:32', 3, 1, 145874551),
(3, '2023-03-04', '07:50', 7, 2, 111),
(4, '2023-03-09', '14:40', 5, 1, 1485);

-- --------------------------------------------------------

--
-- Structure de la table `motifspreadmin`
--

CREATE TABLE `motifspreadmin` (
  `ID_MotifAdmin` int(11) NOT NULL,
  `NomMotif` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `motifspreadmin`
--

INSERT INTO `motifspreadmin` (`ID_MotifAdmin`, `NomMotif`) VALUES
(1, 'Fracture'),
(2, 'Ambulatoire'),
(3, 'Opération'),
(4, 'Urgence');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `NumSecuSociale` int(11) NOT NULL,
  `Civilite` varchar(100) DEFAULT NULL,
  `NomNaiss` varchar(100) DEFAULT NULL,
  `NomEpouse` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `CodeP` int(11) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` varchar(100) DEFAULT NULL,
  `ID_persCONFIANCE` int(11) DEFAULT NULL,
  `ID_persPREVENIR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`NumSecuSociale`, `Civilite`, `NomNaiss`, `NomEpouse`, `Prenom`, `DateNaiss`, `Adresse`, `CodeP`, `Ville`, `Email`, `Telephone`, `ID_persCONFIANCE`, `ID_persPREVENIR`) VALUES
(12, 'Homme', 'test', 'default', 'tessstg', '2023-03-08', 'sd8f46s54df', 4896156, '4s8dfc615', 'ze489df6s5', '984165', 17, 17),
(111, 'Homme', 'Milito', 'default', 'Nathan', '2022-11-10', 'test', 78914, 'test', 'test', '6514798', 1, 1),
(789, 'Homme', '98rdf4gv56', 'default', '9r8f4dv65', '2023-03-15', 'dfg8v465', 894651, 'r9f8d4sv65', 'dg8f465', '948651', 19, 19),
(1234, 'homme', 'test', 'default', 'test', '2022-11-09', 'test', 12249, 'tesxt', 'test', '12354', 1, 1),
(1485, 'Homme', 'zer84df61s5', 'default', 'ez984df6s5', '2023-03-06', 'zerdf486cs5', 84615, 'e98df4cs156', 'rezcdf486', '894651', 18, 18),
(74580, 'Femme', 'Robyn', 'default', 'Robyyyn', '2022-11-10', 'test', 78141, 'test', 'test', '120205', 3, 2),
(78945, 'Homme', 'zer4d1f56', 'default', '48fds615', '2023-03-22', 're948f16dv5', 894, '948dfs16', '98rf4e156', '48156', 21, 21),
(256978, 'Homme', 'test', 'default', 'test65', '2002-07-03', 'test', 12536, 'test', 'test', '1253574', 1, 1),
(456156, 'Homme', 'test', 'default', 'test', '2022-12-08', 'test', 51644, 'teszt', 'test', '4235', 5, 5),
(748596, 'Homme', 'test45616', 'default', 'tes154641', '2022-12-28', 'test', 465413, 'teszt', 'test', '41523', 6, 6),
(784125, 'Homme', 'test', 'default', 'test', '2022-12-20', 'test', 78412, 'test', 'test', '789411', 4, 4),
(948156, 'Homme', 'e9r48gvf56', 'default', '48dgf156', '2023-03-16', 're9f48d1', 984615, '94h8g6', 'dgf48156', '48165', 22, 22),
(984156, 'Homme', 'e89g156f', 'default', '984f156', '2023-03-08', 'zr984df56', 984156, '984gfd156', '894fd156', '894156', 23, 23),
(984615, 'Homme', '9r48dgf65a8g49df6a', 'default', '98rtg4f9dg48v65', '2023-03-17', 're8gf4v6f5', 84615, '8r4dgf615', 'gdf48651', '486513', 20, 20),
(1458236, 'Homme', 'azeaze', 'default', 'azeaze', '2023-03-09', 'azeaze', 14586, 'azeaze', 'azeaze', '47878', 8, 8),
(145874551, 'Femme', 'Test', 'default', 'test', '2023-03-09', 'test', 78941, 'test', 'test', '45312', 16, 16);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `ID_Personnel` int(11) NOT NULL,
  `NomMedecin` varchar(100) DEFAULT NULL,
  `PrenomMedecin` varchar(100) DEFAULT NULL,
  `IDservice` int(11) DEFAULT NULL,
  `Identifiant` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`ID_Personnel`, `NomMedecin`, `PrenomMedecin`, `IDservice`, `Identifiant`, `MotDePasse`) VALUES
(1, 'Milito', 'Nathan', 3, 'Nathan.M', 'azerty123'),
(2, 'Caro', 'Natacha', 4, 'Natacha.C', 'nat123'),
(3, 'Dupont', 'Franck', 5, 'Dupont.F', 'fra123'),
(4, 'Garcia', 'Caroline', 2, 'caro.G', 'car123'),
(5, 'Da silva', 'Bernard', 2, 'dasilva.B', 'ber123'),
(6, 'Paulnareff', 'Michel', 4, 'Michel.P', 'azerty123'),
(7, 'Karine', 'Marchand', 7, 'Karine.M', 'kar123'),
(8, 'Justine', 'Lepoiver', 4, 'Justine.L', 'Jusleposecr2@');

-- --------------------------------------------------------

--
-- Structure de la table `personnesautres`
--

CREATE TABLE `personnesautres` (
  `IDpersonne` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnesautres`
--

INSERT INTO `personnesautres` (`IDpersonne`, `Nom`, `Prenom`, `Telephone`, `Adresse`) VALUES
(1, 'Carlier', 'Nathan', 6241451, 'adresseCarlier'),
(2, 'ROBYYNNN', 'ROOOOBYN', 123456, 'test'),
(3, 'ROBYYNNN2', 'ROOOOBYN2', 123456, 'test2'),
(4, 'Nathan', 'Milito', 7894561, '8 rue averue de la plus'),
(5, 'test', 'teszt', 451, 'test'),
(6, 'test2', 'test2', 6, 'test'),
(7, 'aze', 'aze', 5461, 'aze'),
(8, 'aaaaaa', 'aaaaaa', 78941, '144458'),
(9, 'mora', 'florian', 688279399, 'quievy'),
(10, 'mora', 'florian', 25645, 'quievy'),
(11, 'hezuizhfc', 'dushfub', 487984, 'azerzerezr'),
(12, 'mora', 'sarah', 25645, '123'),
(13, 'dsfjiodjtop', 'jgiorjeotijt', 74852, 'rzer zghrg'),
(14, 'lore', 'sarah', 1548, '1254'),
(15, 'grealish', 'jack', 688279399, 'zazad'),
(16, 'test', 'test', 5654635, 'test'),
(17, 'test', 'test', 54612498, 'test'),
(18, 'test', 'testttt', 84615, 's4s68fd51'),
(19, '98e4zdfs65', '98fe4ds', 984156, '98r4fdvg56'),
(20, '9rez8f4d61', '84fe6d5s', 984615, '48615dgfv'),
(21, '9rt8fe465', '948fds1v56', 948165, '9dgf4815'),
(22, 'ez9r84f6d', '89fd4615', 984165, '98f4ds'),
(23, '8t9r4fd6', '84gfd165', 84156, '984df16');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `IDservice` int(11) NOT NULL,
  `NomService` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`IDservice`, `NomService`) VALUES
(1, 'Ambulatoire'),
(2, 'Opératoire'),
(3, 'Administration'),
(4, 'Secrétariat'),
(5, 'Généraliste'),
(6, 'Pharmacie'),
(7, 'Neurologue');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `couverturesociale`
--
ALTER TABLE `couverturesociale`
  ADD KEY `couverturesociale_FK` (`NumSecu`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD KEY `documents_FK` (`NumSecuSociale`);

--
-- Index pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  ADD PRIMARY KEY (`ID_PreAdmin`),
  ADD KEY `FK_IDmedecin` (`ID_medecin`),
  ADD KEY `hospitalisations_FK` (`NumSecuSociale`),
  ADD KEY `IDmotif` (`ID_MotifAdmi`);

--
-- Index pour la table `motifspreadmin`
--
ALTER TABLE `motifspreadmin`
  ADD PRIMARY KEY (`ID_MotifAdmin`),
  ADD UNIQUE KEY `ID_MotifAdmin` (`ID_MotifAdmin`) USING BTREE;

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`NumSecuSociale`),
  ADD KEY `FK_persoCONF` (`ID_persCONFIANCE`),
  ADD KEY `FK_persoPREV` (`ID_persPREVENIR`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`ID_Personnel`),
  ADD KEY `medecins_FK` (`IDservice`);

--
-- Index pour la table `personnesautres`
--
ALTER TABLE `personnesautres`
  ADD PRIMARY KEY (`IDpersonne`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IDservice`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  MODIFY `ID_PreAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `motifspreadmin`
--
ALTER TABLE `motifspreadmin`
  MODIFY `ID_MotifAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `ID_Personnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personnesautres`
--
ALTER TABLE `personnesautres`
  MODIFY `IDpersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `IDservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `couverturesociale`
--
ALTER TABLE `couverturesociale`
  ADD CONSTRAINT `couverturesociale_FK` FOREIGN KEY (`NumSecu`) REFERENCES `patients` (`NumSecuSociale`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_FK` FOREIGN KEY (`NumSecuSociale`) REFERENCES `patients` (`NumSecuSociale`);

--
-- Contraintes pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  ADD CONSTRAINT `FK_IDpersonnel` FOREIGN KEY (`ID_medecin`) REFERENCES `personnel` (`ID_Personnel`),
  ADD CONSTRAINT `IDmotif` FOREIGN KEY (`ID_MotifAdmi`) REFERENCES `motifspreadmin` (`ID_MotifAdmin`),
  ADD CONSTRAINT `hospitalisations_FK` FOREIGN KEY (`NumSecuSociale`) REFERENCES `patients` (`NumSecuSociale`);

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `FK_persoCONF` FOREIGN KEY (`ID_persCONFIANCE`) REFERENCES `personnesautres` (`IDpersonne`),
  ADD CONSTRAINT `FK_persoPREV` FOREIGN KEY (`ID_persPREVENIR`) REFERENCES `personnesautres` (`IDpersonne`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_IDserviceMed` FOREIGN KEY (`IDservice`) REFERENCES `service` (`IDservice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
