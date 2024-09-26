-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2024 at 11:07 AM
-- Server version: 8.0.36
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocompletion`
--

-- --------------------------------------------------------

--
-- Table structure for table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `description`, `photo`) VALUES
(1, 'Chien', 'Un animal domestique fidèle et affectueux.', 'images/Chien.jpg'),
(2, 'Chat', 'Un animal de compagnie indépendant et curieux.', 'images/Chat.jpg'),
(3, 'Éléphant', 'Le plus grand mammifère terrestre.', 'images/Elephant.jpg'),
(4, 'Lion', 'Le roi de la jungle, connu pour sa crinière majestueuse.', 'images/Lion.jpg'),
(5, 'Tigre', 'Un grand félin avec des rayures distinctives.', 'images/Tigre.jpg'),
(6, 'Ours', 'Un mammifère omnivore souvent trouvé dans les forêts.', 'images/Ours.jpg'),
(7, 'Dauphin', 'Un mammifère marin intelligent et sociable.', 'images/Dauphin.jpg'),
(8, 'Aigle', 'Un oiseau de proie avec une vue perçante.', 'images/Aigle.jpg'),
(9, 'Serpent', 'Un reptile sans membres qui se déplace en rampant.', 'images/Serpent.jpg'),
(10, 'Faucon', 'Un oiseau rapide et agile, souvent utilisé pour la chasse.', 'images/Faucon.jpg'),
(11, 'Panda', 'Un ours noir et blanc, connu pour manger du bambou.', 'images/Panda.jpg'),
(12, 'Koala', 'Un marsupial arboricole originaire d’Australie.', 'images/Koala.jpg'),
(13, 'Crocodile', 'Un reptile aquatique avec une mâchoire puissante.', 'images/Crocodile.jpg'),
(14, 'Zèbre', 'Un équidé avec des rayures noires et blanches uniques.', 'images/Zèbre.jpg'),
(15, 'Girafe', 'Le plus grand animal terrestre, connu pour son long cou.', 'images/Girafe.jpg'),
(16, 'Rhinocéros', 'Un grand mammifère avec une peau épaisse et une ou deux cornes.', 'images/Rhinocéros.jpg'),
(17, 'Loup', 'Un canidé sauvage, souvent associé à des meutes.', 'images/Loup.jpg'),
(18, 'Hérisson', 'Un petit mammifère nocturne avec des piquants sur le dos.', 'images/Hérisson.jpg'),
(19, 'Lapin', 'Un petit mammifère herbivore aux grandes oreilles.', 'images/Lapin.jpg'),
(20, 'Singe', 'Un primate souvent trouvé dans les forêts tropicales.', 'images/Singe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
