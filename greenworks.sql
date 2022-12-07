-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 juin 2022 à 03:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greenworks`
--

-- --------------------------------------------------------

--
-- Structure de la table `mygreenwork`
--

CREATE TABLE `mygreenwork` (
  `idgw` int(11) NOT NULL,
  `titreMGW` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `ing` varchar(250) NOT NULL,
  `etp` varchar(250) NOT NULL,
  `idUtil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mygreenwork`
--

INSERT INTO `mygreenwork` (`idgw`, `titreMGW`, `img`, `date`, `ing`, `etp`, `idUtil`) VALUES
(26, 'Veste en laine polere', 'photo\\img7.jfif', '2022-06-26', '27 Bouteiles', 'Etapes 12', 1),
(27, 'Stylos pilote', 'photo\\img6.jfif', '2022-06-26', 'Bouteiles plastique', 'Etapes 24', 1),
(28, 'Recyclage Plastique', 'photo\\img8.jfif', '2022-06-26', 'Plastiques', 'Etapes 48', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nomUtilisateur` varchar(250) NOT NULL,
  `motDePasse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `nom`, `prenom`, `email`, `nomUtilisateur`, `motDePasse`) VALUES
(1, 'benhamza', 'alae', 'alaebenhamza3@gmail.com', 'alaehamza', 'alae123'),
(2, 'test', 'test', 'test@email.com', 'test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mygreenwork`
--
ALTER TABLE `mygreenwork`
  ADD PRIMARY KEY (`idgw`),
  ADD KEY `FK_ID` (`idUtil`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mygreenwork`
--
ALTER TABLE `mygreenwork`
  MODIFY `idgw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mygreenwork`
--
ALTER TABLE `mygreenwork`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
