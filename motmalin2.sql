-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2021 at 09:01 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeudistance`
--

-- --------------------------------------------------------

--
-- Table structure for table `motmalin2_cartes`
--

CREATE TABLE `motmalin2_cartes` (
  `id` int(11) NOT NULL,
  `nom_carte` varchar(255) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `etat` enum('Disponible','Non disponible','En main') NOT NULL DEFAULT 'Disponible',
  `resultat` enum('Placée','Défaussée') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motmalin2_cartes`
--

INSERT INTO `motmalin2_cartes` (`id`, `nom_carte`, `id_partie`, `etat`, `resultat`) VALUES
(1, 'A1', 1, 'Non disponible', 'Défaussée'),
(2, 'A2', 1, 'Non disponible', 'Défaussée'),
(3, 'A3', 1, 'Non disponible', 'Placée'),
(4, 'B1', 1, 'Non disponible', 'Placée'),
(5, 'B2', 1, 'Non disponible', 'Défaussée'),
(6, 'B3', 1, 'Non disponible', 'Défaussée'),
(7, 'C1', 1, 'Non disponible', 'Défaussée'),
(8, 'C2', 1, 'Non disponible', 'Défaussée'),
(9, 'C3', 1, 'Non disponible', 'Placée'),
(10, 'A1', 2, 'Disponible', NULL),
(11, 'A2', 2, 'Disponible', NULL),
(12, 'A3', 2, 'Disponible', NULL),
(13, 'B1', 2, 'En main', NULL),
(14, 'B2', 2, 'Disponible', NULL),
(15, 'B3', 2, 'Disponible', NULL),
(16, 'C1', 2, 'Disponible', NULL),
(17, 'C2', 2, 'Disponible', NULL),
(18, 'C3', 2, 'Disponible', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `motmalin2_participants`
--

CREATE TABLE `motmalin2_participants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `main` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motmalin2_participants`
--

INSERT INTO `motmalin2_participants` (`id`, `nom`, `id_partie`, `main`) VALUES
(1, 'Pahdidey', 1, NULL),
(2, 'Pahdidey', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `motmalin2_parties`
--

CREATE TABLE `motmalin2_parties` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `etat` enum('En attente','En cours','Terminée') NOT NULL DEFAULT 'En attente',
  `niveau` enum('Express','Classique','Expert') NOT NULL DEFAULT 'Classique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motmalin2_parties`
--

INSERT INTO `motmalin2_parties` (`id`, `nom`, `etat`, `niveau`) VALUES
(1, 'Z7QYq', 'Terminée', 'Express'),
(2, 'ONGzL', 'En cours', 'Express');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motmalin2_cartes`
--
ALTER TABLE `motmalin2_cartes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carte` (`nom_carte`),
  ADD KEY `id_partie` (`id_partie`);

--
-- Indexes for table `motmalin2_participants`
--
ALTER TABLE `motmalin2_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partie` (`id_partie`),
  ADD KEY `main` (`main`);

--
-- Indexes for table `motmalin2_parties`
--
ALTER TABLE `motmalin2_parties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motmalin2_cartes`
--
ALTER TABLE `motmalin2_cartes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `motmalin2_participants`
--
ALTER TABLE `motmalin2_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `motmalin2_parties`
--
ALTER TABLE `motmalin2_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motmalin2_participants`
--
ALTER TABLE `motmalin2_participants`
  ADD CONSTRAINT `motmalin2_participants_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `motmalin2_parties` (`id`),
  ADD CONSTRAINT `motmalin2_participants_ibfk_2` FOREIGN KEY (`main`) REFERENCES `motmalin2_cartes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
