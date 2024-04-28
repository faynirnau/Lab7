-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 28 avr. 2024 à 13:08
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lab7`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `issue_date` date NOT NULL,
  `number_pages` int(11) NOT NULL,
  `genre` enum('romantic','sci-fi','crime fiction','adventure','fantasy') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `name`, `author_name`, `issue_date`, `number_pages`, `genre`) VALUES
(1, 'Percy Jackson & the Olympians: The Lightning Thief', 'Rick Riordan', '2005-07-01', 377, 'fantasy'),
(2, 'Harry Potter and the Philosopher\'s Stone', 'J. K. Rowling', '1997-06-26', 223, 'fantasy'),
(3, 'les misérables', 'Victor Hugo', '1862-01-01', 1462, 'romantic'),
(4, 'The Chronicles of Narnia, The Lion, the Witch and the Wardrobe', 'C. S. Lewis', '1950-08-16', 172, 'fantasy'),
(5, 'the little prince', 'Antoine de Saint-Exupéry', '1943-04-01', 93, 'adventure'),
(6, 'Twenty Thousand Leagues Under the Seas', 'Jules Verne', '1870-06-01', 485, 'sci-fi'),
(7, 'Dune', 'Frank Herbert', '1965-08-01', 896, 'sci-fi'),
(8, 'The lord of the rings, The Fellowship of the Ring', 'J. R. R. Tolkien', '1954-07-29', 423, 'fantasy'),
(9, 'It', 'Stephen King', '1986-09-15', 1138, 'fantasy'),
(10, 'A Song of Ice and Fire, A Game of Thrones', 'George R. R. Martin', '1996-08-01', 694, 'fantasy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
