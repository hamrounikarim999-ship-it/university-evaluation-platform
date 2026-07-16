-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 08:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` char(8) NOT NULL,
  `etablissement` varchar(30) NOT NULL,
  `Qualité de l'enseignement` int(11) NOT NULL,
  `Ambiance` int(11) NOT NULL,
  `Vie associative` int(11) NOT NULL,
  `Services administratifs` int(11) NOT NULL,
  `Opportunités professionnelles` int(11) NOT NULL,
  PRIMARY KEY (`id`,`etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `etablissement`, `Qualité de l'enseignement`, `Ambiance`, `Vie associative`, `Services administratifs`, `Opportunités professionnelles`) VALUES
('ET000001', 'paris-cite', 4, 3, 3, 4, 5),
('ET000001', 'Sorbonne', 5, 4, 4, 5, 5),
('ET000002', 'Sorbonne', 4, 4, 4, 3, 3),
('ET000004', 'paris-nanterre', 5, 5, 5, 5, 5),
('ET000005', 'gustave-eiffel', 5, 4, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pw` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `pw`) VALUES
('ET000001', 'Martin', 'Lucas', 'lucas.martin@mail.com', 'Paris123'),
('ET000002', 'Bernard', 'Emma', 'emma.bernard@mail.com', 'Emma2026'),
('ET000003', 'Dubois', 'Hugo', 'hugo.dubois@mail.com', 'Hugo1234'),
('ET000004', 'Petit', 'Léa', 'lea.petit@mail.com', 'LeaParis'),
('ET000005', 'Robert', 'Nathan', 'nathan.robert@mail.com', 'Nathan26'),
('ET000006', 'Richard', 'Chloé', 'chloe.richard@mail.com', 'Chloe456'),
('ET000007', 'Durand', 'Louis', 'louis.durand@mail.com', 'Louis789'),
('ET000008', 'Moreau', 'Camille', 'camille.moreau@mail.com', 'Camille1'),
('ET000009', 'Simon', 'Arthur', 'arthur.simon@mail.com', 'Arthur22'),
('ET000010', 'Laurent', 'Jade', 'jade.laurent@mail.com', 'Jade2025');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `ll` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
