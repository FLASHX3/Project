-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Juillet 2021 à 13:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `digital`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `Auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`Id`, `Auteur`, `Contenu`, `Date`) VALUES
(1, 'Flash', 'Salut', '2021-07-03 20:19:18');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `School` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Id`, `Name`, `User_name`, `School`, `Email`, `Password`, `Type_user`) VALUES
(1, 'Walter', 'Flash', 'Saint-Jérôme', 'wltrflsh@gmail.com', 'b1660b92f99ee060f7ab199a39e4a4b6034f0098', 'admin'),
(2, 'Ghislain', 'NKG', 'Saint-Jérôme', 'ngadeu@gmail.com', '8c99f215b3249d88078e8dac81008dbe9449888b', 'admin'),
(3, 'Stephane', 'Titos', 'Saint-Jérôme', 'Titos@gmail.com', '36bd4f73be32ed7262c164e7ee72163e7543989e', 'admin'),
(4, 'Charlotte', 'Charky', 'Saint-Jérôme', 'charlottesimo@gmail.com', 'df71da6b9865b3d66094d24b014aa3f1f8486f25', 'admin'),
(5, 'Landry', 'Moukam', 'Saint-Jérôme', 'landry@gmail.com', 'aec728ce8be51bd89b02235b546566709f87b7b4', 'admin'),
(6, 'Mark', 'Max', 'Libermann', 'mark@gmail.com', '01ece0a6158c95643383fa9d013fe33aa4436216', 'user'),
(7, 'Patricia', 'Joyce', 'IUG', 'patriciaj@gmaili.com', '13fcdbbb84094783aa823d4c7120b3a6a25f7c36', 'user'),
(8, 'Johann', 'Kegne', 'IUG', 'johannkegne@gmail.com', '9ccb02329d44e3b8247c3385890b6c8de4437f36', 'user'),
(9, 'Junior', 'Chriqt', 'IUC', 'junior@gmail.com', 'c0f3f85d3260f4b74f897be5c35e3615e7150955', 'user'),
(10, 'Ousmanou', 'Ousmane', 'Cadenelle', 'ousmanou@gmail.com', 'c800f391387fe467adf09bacbd526eaba0a2cb97', 'user'),
(11, 'Naomie', 'Chloé', 'Lycée de la cité des palmiers', 'naomie@gmail.com', 'bb35650a9d86bb7bde4325d95491ff89ceb66037', 'user'),
(12, 'Quentin', 'Tayou', 'Lycée de Deïdo', 'quentin@gmail.com', '2333c537cb1190804be6845b74538dc6cffe614c', 'user'),
(13, 'Sayou', 'Dilane', 'De la salle', 'sayou@gmail.com', '9a7687de62d335541f7baef31f97a20cb1ce3e1f', 'user'),
(16, 'Roger', 'Batonga', 'IUT', 'roger@gmail.com', '0fb02c2505a4e27f8456cc1a8fd4e78d1e8b53ad', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `établissements`
--

CREATE TABLE IF NOT EXISTS `établissements` (
  `Id_etablissement` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_établissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type_établissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_etablissement`),
  UNIQUE KEY `Id_établissement` (`Id_etablissement`),
  UNIQUE KEY `Nom_établissement` (`Nom_établissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `établissements`
--

INSERT INTO `établissements` (`Id_etablissement`, `Nom_établissement`, `Type_établissement`) VALUES
(1, 'Saint Jérôme', 'Université'),
(2, 'Libermann', 'Collège'),
(3, 'UD', 'Université'),
(4, 'Chevreul', 'Collège'),
(5, 'Lycée de Deïdo', 'Lycée'),
(6, 'Lycée de la cité des palmiers', 'Lycée'),
(7, 'IUT', 'Université'),
(8, 'ENSPD', 'Université'),
(9, 'IUG', 'Université'),
(10, 'Saint-Michel', 'Collège'),
(11, 'Saint-Charles Boromé', 'Collège'),
(12, 'Lycée de Bonabérie', 'Lycée'),
(13, 'FMSPD', 'Université '),
(14, 'Cadenelle', 'Lycée'),
(15, 'IUES/INSAM', 'Université'),
(16, 'Dauphine', 'Collège'),
(17, 'De la salle', 'Université'),
(18, 'Vogth', 'Collège '),
(19, 'Lycée technique', 'Lycée'),
(20, 'Saint-Louis', 'Collège'),
(21, 'Lycée D''Akwa', 'Lycée'),
(22, 'Saint-Joseph', 'Collège'),
(23, 'IUGET', 'Université');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
