-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 21 Août 2021 à 03:12
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

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
(56, 'Titos', 'Je te dis', '2021-08-07 20:27:35', 'Saint-Jérôme', 'Saint-Jérôme'),
(57, 'Flash', 'okay j''ai compris!', '2021-08-08 19:32:12', 'Saint-Jérôme', 'Saint-Jérôme'),
(58, 'Flash', 'mise à jour', '2021-08-08 20:31:35', 'Saint-Jérôme', 'Saint-Jérôme'),
(59, 'Flash', 'ca marche', '2021-08-08 20:31:48', 'Saint-Jérôme', 'Saint-Jérôme'),
(60, 'Flash', 'depot local.txt', '2021-08-08 20:33:41', 'Saint-Jérôme', 'Saint-Jérôme'),
(61, 'Flash', 'df', '2021-08-08 20:34:10', 'Saint-Jérôme', 'Saint-Jérôme'),
(62, 'Flash', 'tpe AFE LEA AXELLE SJP2.docx', '2021-08-08 20:34:11', 'Saint-Jérôme', 'Saint-Jérôme'),
(63, 'Flash', 'test msg', '2021-08-09 02:05:56', 'Saint-Jérôme', 'Saint-Jérôme'),
(64, 'Flash', 'rapport.txt', '2021-08-09 02:06:28', 'Saint-Jérôme', 'Saint-Jérôme'),
(65, 'Flash', 'Classeur1.xlsx<br>regarder ceci les amis', '2021-08-09 02:07:12', 'Saint-Jérôme', 'Saint-Jérôme'),
(66, 'Joyce', 'RAPPORT DE STAGE.docx', '2021-08-09 02:12:02', 'IUG', 'IUG'),
(67, 'Flash', 'jdfhud', '2021-08-11 12:48:44', 'Saint-Jérôme', 'Saint-Jérôme'),
(68, 'Flash', '4_5850597763347123333.pptx', '2021-08-11 12:49:25', 'Saint-Jérôme', 'Saint-Jérôme'),
(69, 'Flash', 'Doc1.docx<br>jhfh', '2021-08-11 12:50:14', 'Saint-Jérôme', 'Saint-Jérôme'),
(70, 'Roger', '1548529383217.jpg', '2021-08-11 13:28:01', 'Conquete', 'Conquete'),
(71, 'Roger', 'BACA2018ANGLAIS.pdf', '2021-08-11 13:28:53', 'Conquete', 'Conquete'),
(72, 'Chloé', 'Bonjour à tous les amies', '2021-08-11 13:54:46', 'Lycée de la cité des palmiers', 'Lycée de la cité des palmiers'),
(73, 'Chloé', 'Roger ci c''est même qui? il parle trop', '2021-08-11 13:55:37', 'Lycée de la cité des palmiers', 'Conquete'),
(74, 'Chloé', 'tais toi meme nor', '2021-08-11 13:57:06', 'Lycée de la cité des palmiers', 'Conquete'),
(75, 'Flash', 'Quelles sont les filières à IAI s''il vous plait?', '2021-08-11 13:59:01', 'Saint-Jérôme', 'IAI'),
(76, 'Titos', 'IMG_20200811_105501_339.jpg', '2021-08-11 15:30:49', 'Saint-Jérôme', 'Saint-Jérôme'),
(77, 'Titos', 'Je crois qu''il y a l''informatique industriel', '2021-08-11 15:36:51', 'Saint-Jérôme', 'IAI'),
(78, 'NMG', 'Mer i pour l''épreuve du bac 2018 roger :-)', '2021-08-11 17:36:45', 'Conquete', 'Conquete'),
(79, 'NKG', 'Meme reseau télécom\r\nMais atttendons qu''ils nous repondent eux-même', '2021-08-11 18:56:04', 'Saint-Jérôme', 'IAI'),
(80, 'Titos', 'cool on peut déjà envoyé des documents', '2021-08-12 00:25:32', 'Saint-Jérôme', 'Saint-Jérôme'),
(81, 'Titos', 'c''est ton rapport de soutenance?', '2021-08-12 01:18:20', 'Saint-Jérôme', 'IUG'),
(82, 'Joyce', 'oui', '2021-08-12 01:20:34', 'IUG', 'IUG'),
(83, 'Titos', 'cool merçi', '2021-08-12 01:27:37', 'Saint-Jérôme', 'IUG'),
(84, 'Joyce', 'de rien', '2021-08-12 01:36:08', 'IUG', 'IUG'),
(85, 'Joyce', ';-)', '2021-08-12 01:36:56', 'IUG', 'IUG'),
(86, 'Titos', ':-)', '2021-08-12 01:39:02', 'Saint-Jérôme', 'IUG'),
(87, 'Titos', 'salut', '2021-08-12 09:48:01', 'Saint-Jérôme', 'Saint-Jérôme'),
(88, 'Joyce', 'bonjour', '2021-08-12 09:56:24', 'IUG', 'IUG'),
(89, 'Joyce', 'c''est comment', '2021-08-12 09:56:44', 'IUG', 'IUG'),
(90, 'Joyce', 'hey', '2021-08-12 09:57:18', 'IUG', 'Saint-Jérôme'),
(91, 'Titos', 'ca va et toi?', '2021-08-12 10:03:43', 'Saint-Jérôme', 'IUG'),
(92, 'Nyro', 'Bonjour ici je suis nouvelle', '2021-08-12 11:32:11', 'IUES-INSAM', 'IUES-INSAM'),
(93, 'La fortune', 'Salut', '2021-08-12 11:52:51', 'Saint-Louis', 'Saint-Louis'),
(94, 'Chloé', 'hum', '2021-08-17 20:13:37', 'Lycée de la cité des palmiers', 'Saint-Michel'),
(95, 'jkw', 'yep Nao c''est comment?', '2021-08-18 15:00:33', 'Lycée de la cité des palmiers', 'Lycée de la cité des palmiers'),
(96, 'Flash', 'nbhgjh', '2021-08-19 14:38:51', 'Saint-Jérôme', 'Saint-Jérôme'),
(97, 'Roger', 'slt all le moto', '2021-08-19 14:39:15', 'Conquête', 'Conquête'),
(98, 'Flash', 'tpe AFE LEA AXELLE SJP2.docx', '2021-08-19 14:39:15', 'Saint-Jérôme', 'Saint-Jérôme'),
(99, 'Chloé', 'salut', '2021-08-19 14:42:01', 'Lycée de la cité des palmiers', 'Conquête'),
(100, 'Roger', 'ao nor c''est comment', '2021-08-19 14:44:55', 'Conquête', 'Conquête'),
(101, 'Roger', 'vous ne parlez pas?', '2021-08-19 14:52:37', 'Conquête', 'Conquête'),
(102, 'Joyce', 'idem', '2021-08-20 12:24:46', 'IUG', 'IUG');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Id`, `Name`, `User_name`, `School`, `Age`, `Email`, `Password`, `Type_user`) VALUES
(1, 'Walter', 'Flash', 'Saint-Jérôme', 19, 'wltrflsh@gmail.com', 'b1660b92f99ee060f7ab199a39e4a4b6034f0098', 'admin'),
(2, 'Ghislain', 'NKG', 'Saint-Jérôme', 20, 'ngadeu@gmail.com', '8c99f215b3249d88078e8dac81008dbe9449888b', 'admin'),
(3, 'Stephane', 'Titos', 'Saint-Jérôme', 18, 'Titos@gmail.com', '36bd4f73be32ed7262c164e7ee72163e7543989e', 'admin'),
(4, 'Charlotte', 'Charly', 'Saint-Jérôme', 20, 'charlottesimo@gmail.com', 'df71da6b9865b3d66094d24b014aa3f1f8486f25', 'user'),
(5, 'Landry', 'Moukam', 'Saint-Jérôme', 20, 'landry@gmail.com', 'aec728ce8be51bd89b02235b546566709f87b7b4', 'user'),
(6, 'Mark', 'Max', 'Libermann', 17, 'mark@gmail.com', '01ece0a6158c95643383fa9d013fe33aa4436216', 'user'),
(7, 'Patricia', 'Joyce', 'IUG', 20, 'patriciaj@gmail.com', '13fcdbbb84094783aa823d4c7120b3a6a25f7c36', 'user'),
(8, 'Johann', 'Kegne', 'IUG', 21, 'johannkegne@gmail.com', '9ccb02329d44e3b8247c3385890b6c8de4437f36', 'user'),
(9, 'Junior', 'Christ', 'IUC', 24, 'junior@gmail.com', 'c0f3f85d3260f4b74f897be5c35e3615e7150955', 'user'),
(10, 'Ousmanou', 'Ousmane', 'Cadenelle', 21, 'ousmanou@gmail.com', 'c800f391387fe467adf09bacbd526eaba0a2cb97', 'user'),
(11, 'Naomie', 'Chloé', 'Lycée de la cité des palmiers', 22, 'naomie@gmail.com', 'bb35650a9d86bb7bde4325d95491ff89ceb66037', 'user'),
(12, 'Quentin', 'Tayou', 'Lycée de Deïdo', 21, 'quentin@gmail.com', '2333c537cb1190804be6845b74538dc6cffe614c', 'user'),
(13, 'Sayou', 'Dilane', 'De la salle', 19, 'sayou@gmail.com', '9a7687de62d335541f7baef31f97a20cb1ce3e1f', 'user'),
(14, 'Roger', 'Batonga', 'IUT', 20, 'roger@gmail.com', '0fb02c2505a4e27f8456cc1a8fd4e78d1e8b53ad', 'user'),
(15, 'Landry', 'Roger', 'Conquête', 18, 'roger@yahoo.fr', '29c41773114b7405f32b552697f56aa8aa9a9d3c', 'user'),
(16, 'Bogos', 'Bogooosss', 'Libermann', 14, 'moncompte@yahoo.fr', '29c41773114b7405f32b552697f56aa8aa9a9d3c', 'user'),
(17, 'Ludovic', 'Franck', 'Conquête', 17, 'ntep@gmail.com', '1ea5b0dfb74b5a61c38880711cdc1cb7a51e8f69', 'user'),
(18, 'Christian ', 'Tchato', 'Saint-Jerôme', 20, 'christianjoeltchato@gmail.com', '2609930ecf993895370d2d34667861420e22fd10', 'user'),
(19, 'Marie grâce', 'NMG', 'Conquête', 16, 'nmg@gmail.com', 'eab127935e4008f52e5ff3fd32863bc700050eb7', 'user'),
(20, 'Ormela', 'Nyro', 'IUES-INSAM', 21, 'ormela@gamail.com', '96a84802aca0f58ba93e904378ba8ac410e2d036', 'user'),
(21, 'Noppo', 'La fortune', 'Saint-Louis', 19, 'noppo@yahoo.fr', 'ab343568d01c0438da58842d95d156198290a58a', 'user'),
(22, 'Elsa', 'Elsa', 'Saint-Jérôme', 20, 'elsa@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'user'),
(23, 'Ntep', 'jkw', 'Lycée de la cité des palmiers', 18, 'jntep@univcathosjd.com', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'user'),
(24, 'Banemb', 'Francis', 'Université de Douala', 19, 'ytd@gjhk.jil', 'a2540a803401bcb9ee8315c7769d74de1da5f55e', 'user');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Contenu de la table `établissements`
--

INSERT INTO `établissements` (`Id_établissement`, `Nom_établissement`, `Type_établissement`, `Cursus`) VALUES
(1, 'Saint-Jérôme', 'Université', 'University'),
(2, 'Libermann', 'Collège', 'Secondary'),
(3, 'Université de douala', 'Université', 'University'),
(4, 'Chevreul', 'Collège', 'Secondary'),
(5, 'Lycée de Deïdo', 'Lycée', 'Secondary'),
(6, 'Lycée de la cité des palmiers', 'Lycée', 'Secondary'),
(7, 'IUT', 'Université', 'University'),
(8, 'ENSPD', 'Université', 'University'),
(9, 'IUG', 'Université', 'University'),
(10, 'Saint-Michel', 'Collège', 'Secondary'),
(11, 'Saint-Charles Boromé', 'Collège', 'Secondary'),
(12, 'Lycée de Bonabérie', 'Lycée', 'Secondary'),
(13, 'FMSPD', 'Université ', 'University'),
(14, 'Cadenelle', 'Collège', 'Secondary'),
(15, 'IUES-INSAM', 'Université', 'University'),
(16, 'Dauphine', 'Collège', 'Secondary'),
(17, 'De la salle', 'Université', 'University'),
(18, 'François Xavier Vogth', 'Collège ', 'Secondary'),
(19, 'Lycée technique de Douala', 'Lycée', 'Secondary'),
(20, 'Saint-Louis', 'Collège', 'Secondary'),
(21, 'Lycée d''akwa', 'Lycée', 'Secondary'),
(22, 'Saint-Joseph', 'Collège', 'Secondary'),
(23, 'IUGET', 'Université', 'University'),
(24, 'IUL', 'Université', 'University'),
(25, 'IUC', 'Université', 'University'),
(26, 'La retraite', 'Collège', 'Secondary'),
(27, 'Conquête', 'Collège', 'Secondary'),
(28, 'UCAC', 'Université', 'University'),
(29, 'Université de Yaoundé II', 'Université', 'University'),
(30, 'Digital Collège', 'Université', 'University'),
(31, 'Collège de Paris', 'Universitaire', 'University'),
(32, 'IAI', 'Université', 'University'),
(33, 'Du vaal', 'Collège', 'Secondary'),
(34, 'Lycée bilingue du Génie militaire', 'Lycée', 'Secondary'),
(35, 'Lycée de Ndoghem', 'Lycée', 'Secondary'),
(36, 'Lycée de Baffoussam', 'Lycée', 'Secondary');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
