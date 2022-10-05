-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2021 at 02:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sit_cv_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `auteur`, `contenu`, `date_creation`) VALUES
(8, 'Bubulle', '   Test commentaire\r\n                    ', '2021-02-19'),
(9, 'Bubulle', '  hey you                          ', '2021-02-19'),
(10, 'Bubulle', '      Hello there\r\n                      ', '2021-02-19'),
(11, 'Bubulle', '                General Kenobi            ', '2021-02-19'),
(12, 'Bubulle', '          &lt;strong&gt;Bam&lt;/strong&gt;                  ', '2021-02-19'),
(13, 'Bubulle', '', '2021-02-21'),
(14, 'Bubulle', '', '2021-02-21'),
(15, 'Tauren de Haut-Roc', 'Bonjour humain', '2021-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`) VALUES
(1, 'Bubulle', '$2y$10$FsAH1iwG/R/1BwTWvgTxYuvry8jq4n1oeaCLK9EUGnV932vNBotJa', 'bubulle@hey.you'),
(2, 'Papitaine', '$2y$10$zHtURWUujA2dsfvJc2urFe.CKhcWU.kAOaTYx.J91gZVY.qITYXJe', 'capi@capitaine.fr'),
(3, 'Tauren de Haut-Roc', '$2y$10$3aLYvVx7G.ZmEMVToOX/VOKTOs7VGSkgHY1GSAjVk4OYemKtibZN.', 'hautroc@tauren.fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
