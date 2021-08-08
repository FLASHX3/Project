-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Août 2021 à 03:07
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
  `Etablissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ecole_visé` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`Id`, `Auteur`, `Contenu`, `Date`, `Etablissement`, `Ecole_visé`) VALUES
(1, 'Flash', 'Salut à tous! Dans le cadre de cette fin d''année, nous organisons une cérémonie de fin d''année où nous vous invitons tous à y participer.', '2021-07-03 20:19:18', 'Saint-Jérôme', 'Saint-Jérôme'),
(2, 'Flash', 'Venez massivement', '2021-07-26 14:55:54', 'Saint-Jérôme', 'Saint-Jérôme'),
(3, 'Batonga', 'okayy!\r\nj''aimerais y être. ça commence à quelle heure s''il vous plait?', '2021-07-26 15:00:25', 'IUT', 'Saint-Jérôme'),
(4, 'Flash', 'Salut à tous!', '0000-00-00 00:00:00', 'Saint-Jérôme', 'IUC'),
(5, 'Flash', 'Salut à tous!', '2021-08-02 15:33:25', 'Saint-Jérôme', 'IUG'),
(6, 'NKG', 'hello!', '2021-08-02 16:02:00', 'Saint-Jérôme', 'IUG'),
(7, 'Joyce', 'Salut les amis', '2021-08-02 17:03:15', 'IUG', 'IUC'),
(8, 'Joyce', 'humm', '2021-08-02 17:04:40', 'IUG', 'Saint-Jérôme'),
(9, 'Joyce', 'La grande école catholique centrale', '2021-08-02 17:14:46', 'IUG', 'UCAC'),
(10, 'Dilane', 'Comment ça se passe à l''IUG', '2021-08-02 17:34:14', 'De la salle', 'IUG'),
(11, 'Dilane', 'Vous déjà commencé les compos?', '2021-08-02 17:39:01', 'De la salle', 'IUG'),
(12, 'Dilane', 'hey', '2021-08-02 17:42:02', 'De la salle', 'IUG'),
(13, 'Dilane', '???', '2021-08-02 17:43:03', 'De la salle', 'IUG'),
(14, 'Dilane', 'http://localhost/project/img/Logo_RSA.png', '2021-08-02 18:21:27', 'De la salle', 'Saint-Jérôme'),
(15, 'Dilane', 'bye', '2021-08-02 18:31:00', 'De la salle', 'De la salle'),
(16, 'Dilane', 'humm IUC!', '2021-08-02 18:31:54', 'De la salle', 'IUC'),
(17, 'Roger', 'azerty', '2021-08-05 22:07:15', 'Conquete', 'Conquete'),
(18, 'Roger', 'qwerty', '2021-08-05 22:08:13', 'Conquete', 'Saint-Michel'),
(19, 'NMG', 'La conquete ci ne parle pas?\r\nseulement landry???', '2021-08-05 22:49:12', 'Conquete', 'Conquete'),
(20, 'Titos', 'Hey', '2021-08-05 22:53:41', 'Saint-Jérôme', 'Saint-Jérôme'),
(21, 'Roger', 'azertyqwerty', '2021-08-05 23:03:26', 'Conquete', 'Saint-Louis'),
(22, 'Roger', 'ça va', '2021-08-05 23:28:51', 'Conquete', 'Saint-Michel'),
(23, 'Flash', 'bjr', '2021-08-06 12:01:53', 'Saint-Jérôme', 'Saint-Jérôme'),
(24, 'Franck', 'salut tout le monde', '2021-08-06 12:12:13', 'Conquete', 'Conquete'),
(25, 'Flash', 'salut', '2021-08-07 02:23:51', 'Saint-Jérôme', 'Saint-Jérôme'),
(26, 'Flash', 'salut', '2021-08-07 02:34:08', 'Saint-Jérôme', 'Saint-Jérôme'),
(27, 'Flash', 'hey', '2021-08-07 02:35:01', 'Saint-Jérôme', 'Saint-Jérôme'),
(28, 'Flash', 'bonne nuit à tous', '2021-08-07 03:02:24', 'Saint-Jérôme', 'Saint-Jérôme'),
(29, 'Roger', 'azertyuiop', '2021-08-07 03:37:40', 'Conquete', 'Conquete'),
(30, 'Roger', 'fdgggh', '2021-08-07 03:37:57', 'Conquete', 'Saint-Michel'),
(31, 'Roger', 'gthnjk', '2021-08-07 03:46:17', 'Conquete', 'Saint-Michel'),
(32, 'Roger', 'rgegtr', '2021-08-07 03:46:38', 'Conquete', 'Conquete'),
(33, 'Flash', 'BJR', '2021-08-07 03:51:16', 'Saint-Jérôme', 'Saint-Jérôme'),
(34, 'Flash', 'Les polytechniciens', '2021-08-07 03:52:40', 'Saint-Jérôme', 'ENSPD'),
(35, 'Roger', 'c''est moi', '2021-08-07 03:56:31', 'Conquete', 'Conquete'),
(36, 'Roger', 'c''est moi', '2021-08-07 03:56:44', 'Conquete', 'Cadenelle'),
(37, 'Flash', 'Bonsoir\r\n', '2021-08-07 04:48:04', 'Saint-Jérôme', 'Saint-Jérôme'),
(38, 'Flash', 'hey', '2021-08-07 04:48:58', 'Saint-Jérôme', 'IUT'),
(39, 'Flash', 'hey', '2021-08-07 05:03:48', 'Saint-Jérôme', 'Saint-Jérôme'),
(40, 'Flash', 'cdk', '2021-08-07 05:04:10', 'Saint-Jérôme', 'IUT'),
(41, 'Flash', 'Dilane ci hein', '2021-08-07 05:04:42', 'Saint-Jérôme', 'IUG'),
(42, 'NKG', 'Flash tais-toi tu bavarde trop', '2021-08-07 05:07:10', 'Saint-Jérôme', 'Saint-Jérôme'),
(43, 'NKG', 'Tu es sure que tu vas bien?', '2021-08-07 05:11:52', 'Saint-Jérôme', 'IUT'),
(54, 'Joyce', 'Non les compos n''ont pas encore commencés', '2021-08-07 14:55:50', 'IUG', 'IUG'),
(55, 'Joyce', 'Mince vous bavardez hein', '2021-08-07 14:56:09', 'IUG', 'IUG'),
(56, 'Titos', 'Je te dis', '2021-08-07 20:27:35', 'Saint-Jérôme', 'Saint-Jérôme');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `School` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Id`, `Name`, `User_name`, `School`, `Age`, `Email`, `Password`, `Type_user`) VALUES
(1, 'Walter', 'Flash', 'Saint-Jérôme', 19, 'wltrflsh@gmail.com', 'b1660b92f99ee060f7ab199a39e4a4b6034f0098', 'admin'),
(2, 'Ghislain', 'NKG', 'Saint-Jérôme', 20, 'ngadeu@gmail.com', '8c99f215b3249d88078e8dac81008dbe9449888b', 'admin'),
(3, 'Stephane', 'Titos', 'Saint-Jérôme', 18, 'Titos@gmail.com', '36bd4f73be32ed7262c164e7ee72163e7543989e', 'admin'),
(4, 'Charlotte', 'Charly', 'Saint-Jérôme', 20, 'charlottesimo@gmail.com', 'df71da6b9865b3d66094d24b014aa3f1f8486f25', 'admin'),
(5, 'Landry', 'Moukam', 'Saint-Jérôme', 20, 'landry@gmail.com', 'aec728ce8be51bd89b02235b546566709f87b7b4', 'admin'),
(6, 'Mark', 'Max', 'Libermann', 17, 'mark@gmail.com', '01ece0a6158c95643383fa9d013fe33aa4436216', 'user'),
(7, 'Patricia', 'Joyce', 'IUG', 20, 'patriciaj@gmail.com', '13fcdbbb84094783aa823d4c7120b3a6a25f7c36', 'user'),
(8, 'Johann', 'Kegne', 'IUG', 21, 'johannkegne@gmail.com', '9ccb02329d44e3b8247c3385890b6c8de4437f36', 'user'),
(9, 'Junior', 'Christ', 'IUC', 24, 'junior@gmail.com', 'c0f3f85d3260f4b74f897be5c35e3615e7150955', 'user'),
(10, 'Ousmanou', 'Ousmane', 'Cadenelle', 21, 'ousmanou@gmail.com', 'c800f391387fe467adf09bacbd526eaba0a2cb97', 'user'),
(11, 'Naomie', 'Chloé', 'Lycée de la cité des palmiers', 22, 'naomie@gmail.com', 'bb35650a9d86bb7bde4325d95491ff89ceb66037', 'user'),
(12, 'Quentin', 'Tayou', 'Lycée de Deïdo', 21, 'quentin@gmail.com', '2333c537cb1190804be6845b74538dc6cffe614c', 'user'),
(13, 'Sayou', 'Dilane', 'De la salle', 19, 'sayou@gmail.com', '9a7687de62d335541f7baef31f97a20cb1ce3e1f', 'user'),
(16, 'Roger', 'Batonga', 'IUT', 20, 'roger@gmail.com', '0fb02c2505a4e27f8456cc1a8fd4e78d1e8b53ad', 'user'),
(17, 'Landry', 'Roger', 'Conquete', 18, 'roger@yahoo.fr', '29c41773114b7405f32b552697f56aa8aa9a9d3c', 'user'),
(18, 'Bogos', 'Bogooosss', 'Libermann', 14, 'moncompte@yahoo.fr', '29c41773114b7405f32b552697f56aa8aa9a9d3c', 'user'),
(19, 'Ludovic', 'Franck', 'Conquete', 17, 'ntep@gmail.com', '1ea5b0dfb74b5a61c38880711cdc1cb7a51e8f69', 'user'),
(20, 'Christian ', 'Tchato', 'Saint-Jerôme', 20, 'christianjoeltchato@gmail.com', '2609930ecf993895370d2d34667861420e22fd10', 'user'),
(21, 'Marie grâce', 'NMG', 'Conquete', 16, 'nmg@gmail.com', 'eab127935e4008f52e5ff3fd32863bc700050eb7', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `établissements`
--

CREATE TABLE IF NOT EXISTS `établissements` (
  `Id_établissement` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_établissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type_établissement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cursus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_établissement`),
  UNIQUE KEY `Id_établissement` (`Id_établissement`),
  UNIQUE KEY `Nom_établissement` (`Nom_établissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Contenu de la table `établissements`
--

INSERT INTO `établissements` (`Id_établissement`, `Nom_établissement`, `Type_établissement`, `Cursus`) VALUES
(1, 'Saint-Jérôme', 'Université', 'Universitaire'),
(2, 'Libermann', 'Collège', 'Secondaire'),
(3, 'Université de douala', 'Université', 'Universitaire'),
(4, 'Chevreul', 'Collège', 'Secondaire'),
(5, 'Lycée de Deïdo', 'Lycée', 'Secondaire'),
(6, 'Lycée de la cité des palmiers', 'Lycée', 'Secondaire'),
(7, 'IUT', 'Université', 'Universitaire'),
(8, 'ENSPD', 'Université', 'Universitaire'),
(9, 'IUG', 'Université', 'Universitaire'),
(10, 'Saint-Michel', 'Collège', 'Secondaire'),
(11, 'Saint-Charles Boromé', 'Collège', 'Secondaire'),
(12, 'Lycée de Bonabérie', 'Lycée', 'Secondaire'),
(13, 'FMSPD', 'Université ', 'Universitaire'),
(14, 'Cadenelle', 'Collège', 'Secondaire'),
(15, 'IUES-INSAM', 'Université', 'Universitaire'),
(16, 'Dauphine', 'Collège', 'Secondaire'),
(17, 'De la salle', 'Université', 'Universitaire'),
(18, 'Vogth', 'Collège ', 'Secondaire'),
(19, 'Lycée technique de Douala', 'Lycée', 'Secondaire'),
(20, 'Saint-Louis', 'Collège', 'Secondaire'),
(21, 'Lycée d''akwa', 'Lycée', 'Secondaire'),
(22, 'Saint-Joseph', 'Collège', 'Secondaire'),
(23, 'IUGET', 'Université', 'Universitaire'),
(24, 'IUL', 'Université', 'Universitaire'),
(25, 'IUC', 'Université', 'Universitaire'),
(26, 'La retraite', 'Collège', 'Secondaire'),
(27, 'Conquete', 'Collège', 'Secondaire'),
(28, 'UCAC', 'Université', 'Universitaire'),
(29, 'Université de Yaoundé II', 'Université', 'Universitaire'),
(30, 'Digital Collège', 'Université', 'Universitaire'),
(31, 'Collège de Paris', 'Universitaire', 'Universitaire'),
(32, 'IAI', 'Université', 'Universitaire'),
(33, 'Du vaal', 'Collège', 'Secondaire'),
(34, 'Institute of Technology ', 'Université', 'Universitaire'),
(35, 'Lycée bilingue du Génie militaire', 'Lycée', 'Secondaire'),
(36, 'Lycée de Ndoghem', 'Lycée', 'Secondaire'),
(37, 'Lycée de Nyalla', 'Lycée', 'Secondaire'),
(38, 'Lycée de Baffoussam', 'Lycée', 'Secondaire'),
(39, 'Lycée d''Oyack', 'Lycée', 'Secondaire');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
