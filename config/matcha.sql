-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  lun. 27 mai 2019 à 16:44
-- Version du serveur :  5.5.61
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `matcha`
--

-- --------------------------------------------------------

--
-- Structure de la table `genders`
--

CREATE TABLE `genders` (
  `gender_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genders`
--

INSERT INTO `genders` (`gender_id`, `genre`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'Non binaire');

-- --------------------------------------------------------

--
-- Structure de la table `orientations`
--

CREATE TABLE `orientations` (
  `orientation_id` int(11) NOT NULL,
  `orientation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orientations`
--

INSERT INTO `orientations` (`orientation_id`, `orientation_name`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'Non Binaire'),
(4, 'Bisexuel'),
(5, 'Tous les genres');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picture_path` varchar(255) COLLATE utf8_bin NOT NULL,
  `picture_user_id` int(11) NOT NULL,
  `picture_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picture_path`, `picture_user_id`, `picture_date`) VALUES
(72, 'assets/upload/lettoh/713fe1ab9f5022ca.jpg', 1, '2019-05-07 12:17:02'),
(73, 'assets/upload/lettoh/169b8e0fff618716.jpg', 1, '2019-05-07 12:25:53'),
(76, 'assets/upload/ftourret/98a321672237afc3.jpg', 2, '2019-05-20 17:01:12'),
(77, 'assets/upload/ftourret/4fc4cd012fd3b05a.jpg', 2, '2019-05-20 17:01:31'),
(78, 'assets/upload/lettard/e41be12dca88b85a.jpg', 3, '2019-05-22 13:41:21'),
(79, 'assets/upload/napunchman/1591d58189ea3dd4.png', 4, '2019-05-23 10:28:12'),
(80, 'assets/upload/ftourret/44baf63dd10dc7cc.jpg', 2, '2019-05-23 17:48:28'),
(81, 'assets/upload/napunchman/a0dbe6172a26e38e.png', 4, '2019-05-27 11:31:26'),
(82, 'assets/upload/crazyostrich546/5cebf6b8cdd77.jpg', 5, '2019-05-27 14:39:53'),
(83, 'assets/upload/brownzebra853/5cebf6e7eb3ae.jpg', 6, '2019-05-27 14:40:40'),
(84, 'assets/upload/bluebear891/5cebf721eb156.jpg', 7, '2019-05-27 14:41:38'),
(85, 'assets/upload/greenswan413/5cebfbc057d89.jpg', 8, '2019-05-27 15:01:20'),
(86, 'assets/upload/heavyladybug807/5cebfbd36845c.jpg', 9, '2019-05-27 15:01:39'),
(87, 'assets/upload/bigrabbit133/5cebfbd56e300.jpg', 10, '2019-05-27 15:01:41'),
(88, 'assets/upload/yellowkoala112/5cebfbd65204d.jpg', 11, '2019-05-27 15:01:42'),
(89, 'assets/upload/ticklishgoose218/5cebfbd8b5b6f.jpg', 12, '2019-05-27 15:01:45'),
(90, 'assets/upload/bigelephant281/5cebfbdb09536.jpg', 13, '2019-05-27 15:01:47'),
(91, 'assets/upload/greenwolf203/5cebfbdc2a98d.jpg', 14, '2019-05-27 15:01:48'),
(92, 'assets/upload/goldenpanda711/5cebfbdcde287.jpg', 15, '2019-05-27 15:01:49'),
(93, 'assets/upload/purplecat259/5cebfbde55fc5.jpg', 16, '2019-05-27 15:01:50'),
(94, 'assets/upload/orangeleopard930/5cebfbdf6d164.jpg', 17, '2019-05-27 15:01:51'),
(95, 'assets/upload/whitelion993/5cebfbe04b7da.jpg', 18, '2019-05-27 15:01:52'),
(96, 'assets/upload/angrywolf634/5cebfbfa3b50b.jpg', 19, '2019-05-27 15:02:18'),
(97, 'assets/upload/purplebear970/5cebfbfb2817c.jpg', 20, '2019-05-27 15:02:19'),
(98, 'assets/upload/angrydog186/5cebfbfc1e191.jpg', 21, '2019-05-27 15:02:20'),
(99, 'assets/upload/crazygorilla884/5cebfbfd5941d.jpg', 22, '2019-05-27 15:02:21'),
(100, 'assets/upload/ticklishtiger416/5cebfbfeb15a1.jpg', 23, '2019-05-27 15:02:23'),
(101, 'assets/upload/angrytiger993/5cebfbff67f2c.jpg', 24, '2019-05-27 15:02:23'),
(102, 'assets/upload/organictiger490/5cebfc00999e7.jpg', 25, '2019-05-27 15:02:24'),
(103, 'assets/upload/tinybutterfly477/5cebfc02661c0.jpg', 26, '2019-05-27 15:02:26'),
(104, 'assets/upload/brownfish220/5cebfc032ad02.jpg', 27, '2019-05-27 15:02:27'),
(105, 'assets/upload/silverbear554/5cebfc050a2cb.jpg', 28, '2019-05-27 15:02:29'),
(106, 'assets/upload/beautifulostrich389/5cebfc4313e6e.jpg', 29, '2019-05-27 15:03:31'),
(107, 'assets/upload/heavyfish640/5cebfc4489573.jpg', 30, '2019-05-27 15:03:32'),
(108, 'assets/upload/sadcat531/5cebfc465de09.jpg', 31, '2019-05-27 15:03:34'),
(109, 'assets/upload/angrypeacock712/5cebfc472b292.jpg', 32, '2019-05-27 15:03:35'),
(110, 'assets/upload/redwolf376/5cebfc48a1ca6.jpg', 33, '2019-05-27 15:03:36'),
(111, 'assets/upload/lazypanda434/5cebfc4964e3b.jpg', 34, '2019-05-27 15:03:37'),
(112, 'assets/upload/whitebird125/5cebfc4bdf72b.jpg', 35, '2019-05-27 15:03:40'),
(113, 'assets/upload/greenduck392/5cebfc4c9aa3e.jpg', 36, '2019-05-27 15:03:40'),
(114, 'assets/upload/brownswan116/5cebfc4d60572.jpg', 37, '2019-05-27 15:03:41'),
(115, 'assets/upload/tinybird242/5cebfc4f3f36a.jpg', 38, '2019-05-27 15:03:43'),
(116, 'assets/upload/lazywolf420/5cebfc60b8210.jpg', 39, '2019-05-27 15:04:00'),
(117, 'assets/upload/bigzebra436/5cebfc6147f28.jpg', 40, '2019-05-27 15:04:01'),
(118, 'assets/upload/organicsnake892/5cebfc6250f01.jpg', 41, '2019-05-27 15:04:02'),
(119, 'assets/upload/whitegorilla644/5cebfc64029af.jpg', 42, '2019-05-27 15:04:04'),
(120, 'assets/upload/organicfrog126/5cebfc64df552.jpg', 43, '2019-05-27 15:04:05'),
(121, 'assets/upload/orangerabbit429/5cebfc6593590.jpg', 44, '2019-05-27 15:04:05'),
(122, 'assets/upload/heavybear731/5cebfc6699ce3.jpg', 45, '2019-05-27 15:04:06'),
(123, 'assets/upload/ticklishbear367/5cebfc675c55d.jpg', 46, '2019-05-27 15:04:07'),
(124, 'assets/upload/organicfrog948/5cebfc6818d9e.jpg', 47, '2019-05-27 15:04:08'),
(125, 'assets/upload/lazyfrog867/5cebfc69d5b7d.jpg', 48, '2019-05-27 15:04:10'),
(126, 'assets/upload/silverbutterfly617/5cebfc835f7f3.jpg', 49, '2019-05-27 15:04:35'),
(127, 'assets/upload/whitedog877/5cebfc9ea1179.jpg', 50, '2019-05-27 15:05:02'),
(128, 'assets/upload/bigelephant748/5cebfce0ce339.jpg', 51, '2019-05-27 15:06:09'),
(129, 'assets/upload/heavywolf710/5cebfce1710a6.jpg', 52, '2019-05-27 15:06:09'),
(130, 'assets/upload/yellowkoala552/5cebfce256b3c.jpg', 53, '2019-05-27 15:06:10'),
(131, 'assets/upload/silvergorilla705/5cebfce4af30f.jpg', 54, '2019-05-27 15:06:13'),
(132, 'assets/upload/bigostrich840/5cebfce56df98.jpg', 55, '2019-05-27 15:06:13'),
(133, 'assets/upload/organicpeacock939/5cebfce6be23d.jpg', 56, '2019-05-27 15:06:15'),
(134, 'assets/upload/orangeduck196/5cebfce885610.jpg', 57, '2019-05-27 15:06:16'),
(135, 'assets/upload/yellowbutterfly965/5cebfce93b8be.jpg', 58, '2019-05-27 15:06:17'),
(136, 'assets/upload/bluecat898/5cebfce9f0720.jpg', 59, '2019-05-27 15:06:18'),
(137, 'assets/upload/goldenbear780/5cebfceaeaf82.jpg', 60, '2019-05-27 15:06:19');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'Food'),
(2, 'Code'),
(3, 'aaaa'),
(4, '#swag'),
(5, 'OnePunchMan'),
(6, 'Saitama'),
(7, 'Chauve');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_gender_id` int(11) NOT NULL DEFAULT '3',
  `user_orientation_id` int(11) NOT NULL DEFAULT '4',
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `path_profile_picture` varchar(255) DEFAULT NULL,
  `last_connexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `notif` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `location_update` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `token_expiration` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_birthdate`, `user_gender_id`, `user_orientation_id`, `login`, `email`, `biography`, `path_profile_picture`, `last_connexion`, `password`, `admin`, `notif`, `enabled`, `longitude`, `latitude`, `address`, `city`, `country`, `location_update`, `token`, `token_expiration`) VALUES
(1, 'Frédéric', 'LEONARD', '1997-08-12', 1, 5, 'lettoh', 'lettoh08@gmail.com', 'Je suis Fred. Je ne suis pas non binaire. Entièrement Homme. Avec un pénis quoi.', 'assets/upload/lettoh/713fe1ab9f5022ca.jpg', '2019-05-23 13:26:32', '$2y$10$N9eet7EhGZfqNr5ZNb5k9eVy4BXIuxmcVP/4xD5NFUsv/pL.JABjS', 1, 1, 1, 2.3527, 48.8543, 'Hôtel de Ville, Quai de l\'Hôtel de ville, 75004 Paris, France', 'Paris', 'France', 0, NULL, NULL),
(2, 'Floryne', 'TOURRET', '1998-12-04', 2, 1, 'ftourret', 'floryne.tourret@gmail.com', 'Don’t explain why it works; explain how you use it.', 'assets/upload/ftourret/4fc4cd012fd3b05a.jpg', '2019-05-27 16:39:11', '$2y$10$iBDaoi5JQ7QKIIqLi.DWve3Qp6cAyx5PuUxGmoclQqhPl3rZ6MxsC', 1, 1, 1, 4.78405, 45.7582, '10 Avenue de Ménival, 69005 Lyon, France', 'Lyon', 'France', 0, NULL, NULL),
(3, 'Frédéric', 'LEONARD', '1997-08-12', 3, 4, 'lettard', 'frederic.leonard.pro@gmail.com', NULL, 'assets/upload/lettard/e41be12dca88b85a.jpg', '2019-05-23 14:02:32', '$2y$10$LL173fJwQAKDxyx//q15BukDGX//c4x0Kzo4pkHYYZY0njcSNSwCS', 0, 1, 1, 2.3527, 48.8543, 'Hôtel de Ville, Quai de l\'Hôtel de ville, 75004 Paris, France', 'Paris', 'France', 0, NULL, NULL),
(4, 'Nathan', 'PUNCH MAN', '1995-08-02', 1, 2, 'napunchman', 'naplouvi@student.le-101.fr', 'How can there be too many typefaces in the world? Are there too many songs, too many books, too many places to go?', 'assets/upload/napunchman/a0dbe6172a26e38e.png', '2019-05-27 13:22:39', '$2y$10$biHqxwJhplQ0zjL6AV0tWe1Rp5B5gU0.8nXPGwTeSoCsJo3d/r7/q', 0, 1, 1, 2.3527, 48.8543, 'Hôtel de Ville, Quai de l\'Hôtel de ville, 75004 Paris, France', 'Paris', 'France', 0, NULL, NULL),
(5, 'Tatiana', 'GROSS', '1987-03-15', 2, 4, 'crazyostrich546', 'crazyostrich546@matcha.z4r7p1.fr', 'Incurable entrepreneur. Extreme internet enthusiast. Subtly charming introvert. Friend of animals everywhere.', 'assets/upload/crazyostrich546/5cebf6b8cdd77.jpg', '2019-05-27 14:39:53', '$2y$10$Wcbb67hAXUAWbaraYD2Gp..liI678StI3yfJ.TNKlT2XP2nWgrLZq', 0, 0, 1, 4.82226, 45.7517, '2615 Pont Kitchener Marchand, 69005 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(6, 'Abdul', 'DONALDSON', '1974-07-05', 1, 1, 'brownzebra853', 'brownzebra853@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/brownzebra853/5cebf6e7eb3ae.jpg', '2019-05-27 14:40:40', '$2y$10$OzZqJBsYOa9PC.pnD.Ekhu2VhvzhXRRJihBkgElH5.0yOMXND4ISq', 0, 0, 1, 5.75303, 46.2577, 'Unnamed Road, 01130 Belleydoux, France', 'Belleydoux', ' France', 0, NULL, NULL),
(7, 'Braden', 'WADE', '1982-03-29', 1, 3, 'bluebear891', 'bluebear891@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/bluebear891/5cebf721eb156.jpg', '2019-05-27 14:41:38', '$2y$10$OJKbVgDQtDG0MtLJEyG.nOo.Vy8f8TYS8PgbNjlVVJunfvwV8TVNC', 0, 0, -1, 4.72667, 45.7225, '43 Route du Boulot, 69126 Chaponost, France', 'Chaponost', ' France', 0, NULL, NULL),
(8, 'Jésus', 'MAHONEY', '1991-02-24', 1, 1, 'greenswan413', 'greenswan413@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/greenswan413/5cebfbc057d89.jpg', '2019-05-27 15:01:20', '$2y$10$faVzAmxnSmUAt6Bq6iWfqehrkUcotletWrZdeNYbXRQihOnLSPqSy', 0, 0, 1, 4.97339, 45.6681, '122 Rue Pasteur, 69780 Toussieu, France', 'Toussieu', ' France', 0, NULL, NULL),
(9, 'Bouftou Royal', 'KEITH', '1985-05-11', 2, 2, 'heavyladybug807', 'heavyladybug807@matcha.z4r7p1.fr', 'Total explorer. Student. Alcoholaholic. Incurable coffee buff. Passionate tv enthusiast. Thinker.', 'assets/upload/heavyladybug807/5cebfbd36845c.jpg', '2019-05-27 15:01:39', '$2y$10$J5/iUnXbfxTMGQpM6NVqFuM/OC5/gmCkSNV6RdKvp/Co1lUl5wniG', 0, 0, 1, 4.61619, 45.7037, 'Châteauvieux, 69510 Yzeron, France', 'Yzeron', ' France', 0, NULL, NULL),
(10, 'Phillip', 'WADE', '1985-07-24', 1, 3, 'bigrabbit133', 'bigrabbit133@matcha.z4r7p1.fr', 'Zombie expert. Freelance food fanatic. Amateur web maven. Bacon aficionado. Passionate explorer. Proud gamer. Typical analyst.', 'assets/upload/bigrabbit133/5cebfbd56e300.jpg', '2019-05-27 15:01:41', '$2y$10$MX0XjfSJHS4nOGlROrH5QusGMZA1MT7iPaNDNZN9oH36WDuCRyzcy', 0, 0, 1, 4.84332, 45.7494, '21 Rue Père Chevrier, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(11, 'Estelle', 'MATHIS', '1990-05-19', 2, 4, 'yellowkoala112', 'yellowkoala112@matcha.z4r7p1.fr', 'Proud entrepreneur. Wannabe troublemaker. Twitter advocate. Internet maven. Bacon nerd. Hipster-friendly food buff. Amateur communicator.', 'assets/upload/yellowkoala112/5cebfbd65204d.jpg', '2019-05-27 15:01:42', '$2y$10$cWsg2ffE22D3465laFocZet/uXPKh2MKaSRn3lLJ34BLtsbXHBsv6', 0, 0, 1, 4.84424, 45.7251, '23 Boulevard Chambaud de la Bruyère, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(12, 'Alizee', 'ZAMORA', '1975-02-22', 2, 1, 'ticklishgoose218', 'ticklishgoose218@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/ticklishgoose218/5cebfbd8b5b6f.jpg', '2019-05-27 15:01:45', '$2y$10$hORJ8mocMPuW1N/g5hS37ufNjFqgXMNGpFQ8Kasso9rA85cpgzojS', 0, 0, 1, 4.83914, 45.7433, '11 Rue de la Grande Famille, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(13, 'Jayden', 'ONEAL', '1983-12-22', 1, 5, 'bigelephant281', 'bigelephant281@matcha.z4r7p1.fr', 'Incurable entrepreneur. Extreme internet enthusiast. Subtly charming introvert. Friend of animals everywhere.', 'assets/upload/bigelephant281/5cebfbdb09536.jpg', '2019-05-27 15:01:47', '$2y$10$FIBQxG4f4lQKnioTx.43JuSnp.SNtS5hXbrYDVY2C1iv6AXGTVeke', 0, 0, 1, 5.37368, 46.0229, '13 Chemin du Pré des Granges, 01640 Saint-Jean-le-Vieux, France', 'Saint-Jean-le-Vieux', ' France', 0, NULL, NULL),
(14, 'Kendrick', 'KEITH', '1986-06-25', 1, 4, 'greenwolf203', 'greenwolf203@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/greenwolf203/5cebfbdc2a98d.jpg', '2019-05-27 15:01:48', '$2y$10$h5.3JVjsyLmipoa3QDBjpeIFuGGDlYh0TwxS7CZlrvCKbFamCf5om', 0, 0, 1, 4.83758, 45.7431, '23 Rue Lortet, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(15, 'Lucie', 'WHITEHEAD', '1998-12-26', 2, 5, 'goldenpanda711', 'goldenpanda711@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/goldenpanda711/5cebfbdcde287.jpg', '2019-05-27 15:01:49', '$2y$10$4kb2E1sn2lsIXZS8dSE5a.ExjIVt1hdJqWwyE3cxCvLxq4doLHh4u', 0, 0, 1, 4.66733, 45.5123, 'Rigodon, 69420 Longes, France', 'Longes', ' France', 0, NULL, NULL),
(16, 'Braden', 'MADDOX', '1993-12-19', 3, 1, 'purplecat259', 'purplecat259@matcha.z4r7p1.fr', 'Incurable entrepreneur. Extreme internet enthusiast. Subtly charming introvert. Friend of animals everywhere.', 'assets/upload/purplecat259/5cebfbde55fc5.jpg', '2019-05-27 15:01:50', '$2y$10$.caRJS3Ysc/oNY.NJKf2F.Hfzm9PpFzkb4Kdi1H2T2/023MCOhV2i', 0, 0, 1, 4.97572, 45.715, '66 Rue Ambroise Paré, 69800 Saint-Priest, France', 'Saint-Priest', ' France', 0, NULL, NULL),
(17, 'Jacqueline', 'JOSEPH', '1980-01-23', 3, 3, 'orangeleopard930', 'orangeleopard930@matcha.z4r7p1.fr', 'Food aficionado. Travel guru. Web scholar. Proud problem solver. Zombie advocate. Analyst. Incurable tv nerd.', 'assets/upload/orangeleopard930/5cebfbdf6d164.jpg', '2019-05-27 15:01:51', '$2y$10$YOlKH.gigTe3KrSfWdgLGukYR1of3SsZUOJ1wbE6EXpPdPgjRMhN.', 0, 0, 1, 5.37612, 45.2106, '458 Chemin du Rafour, 38470 Vinay, France', 'Vinay', ' France', 0, NULL, NULL),
(18, 'Etienne', 'LANE', '1970-09-21', 1, 4, 'whitelion993', 'whitelion993@matcha.z4r7p1.fr', 'Travel scholar. Avid pop culture enthusiast. Falls down a lot. Unapologetic student. Communicator.', 'assets/upload/whitelion993/5cebfbe04b7da.jpg', '2019-05-27 15:01:52', '$2y$10$ryvUbHJheKmJezvsZCxU7eNkkWdQtZRh5TIy/5Xx2AJBqHBgnl7PS', 0, 0, 1, 4.84184, 45.764, '19 Quai du Général Sarrail, 69006 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(19, 'Paulette', 'LANE', '1983-05-15', 2, 4, 'angrywolf634', 'angrywolf634@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/angrywolf634/5cebfbfa3b50b.jpg', '2019-05-27 15:02:18', '$2y$10$suGkiNQBUVayX0XUg1ms6.g2FGpDYfOX2anIjY.RICyqE2Scve2bq', 0, 0, 1, 4.83154, 45.7439, '22 Avenue Leclerc, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(20, 'Silas', 'FERNANDEZ', '1970-08-06', 1, 2, 'purplebear970', 'purplebear970@matcha.z4r7p1.fr', 'Zombie expert. Freelance food fanatic. Amateur web maven. Bacon aficionado. Passionate explorer. Proud gamer. Typical analyst.', 'assets/upload/purplebear970/5cebfbfb2817c.jpg', '2019-05-27 15:02:19', '$2y$10$DomVTQtFd38FBnebBFksH.Sg3cChqETZqw0UT.XoR595lwrpxNgci', 0, 0, 1, 4.69824, 45.9247, '134 Chemin de Rongefer, 69480 Lachassagne, France', 'Lachassagne', ' France', 0, NULL, NULL),
(21, 'Paul', 'NUNEZ', '1994-12-20', 1, 3, 'angrydog186', 'angrydog186@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/angrydog186/5cebfbfc1e191.jpg', '2019-05-27 15:02:20', '$2y$10$4Ri24WLAcioUOmwL4KfdwehNftZS.R...w9CMJqk0n2P89M11oDaK', 0, 0, 1, 4.85726, 45.7651, '45 Boulevard des Brotteaux, 69006 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(22, 'Claire', 'POPE', '1981-01-30', 3, 4, 'crazygorilla884', 'crazygorilla884@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/crazygorilla884/5cebfbfd5941d.jpg', '2019-05-27 15:02:21', '$2y$10$f9d43rOMTw6EPhX1tZpRnO/1XGTM9/5YQsp9F5iD.NN5Qenh5htoe', 0, 0, 1, 4.82196, 45.6243, '17 Allée du Bois Rond, 69360 Sérézin-du-Rhône, France', 'Sérézin-du-Rhône', ' France', 0, NULL, NULL),
(23, 'Estelle', 'LANE', '1973-07-04', 2, 5, 'ticklishtiger416', 'ticklishtiger416@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/ticklishtiger416/5cebfbfeb15a1.jpg', '2019-05-27 15:02:23', '$2y$10$5En6pnvD56JAfUvtvx5y3eG0Ru5voVsTvc.QSvUPpaToZ4FJx.p0O', 0, 0, 1, 5.02435, 45.6932, '3 Chemin de la Planta, 69720 Saint-Bonnet-de-Mure, France', 'Saint-Bonnet-de-Mure', ' France', 0, NULL, NULL),
(24, 'Lisa', 'GRAHAM', '1972-09-06', 2, 3, 'angrytiger993', 'angrytiger993@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/angrytiger993/5cebfbff67f2c.jpg', '2019-05-27 15:02:23', '$2y$10$8uXaRtORg14UeDzF2cTXiuv0ixdZzZg1UMQNNpBpCoFKMWJMZQMNi', 0, 0, 1, 4.84565, 45.7301, '118 Rue Challemel-Lacour, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(25, 'Pierre-Edouard', 'GRAHAM', '1971-05-19', 1, 4, 'organictiger490', 'organictiger490@matcha.z4r7p1.fr', 'Food aficionado. Travel guru. Web scholar. Proud problem solver. Zombie advocate. Analyst. Incurable tv nerd.', 'assets/upload/organictiger490/5cebfc00999e7.jpg', '2019-05-27 15:02:24', '$2y$10$L/7Ioc6YcRsbxHenmGBEiOjAekvQCNfg7di8HSMlM7GMhVSCI.bJu', 0, 0, 1, 4.76312, 45.6823, '19 Rue Paul Cézanne, 69530 Brignais, France', 'Brignais', ' France', 0, NULL, NULL),
(26, 'Mohammed', 'MATHIS', '1972-09-14', 1, 2, 'tinybutterfly477', 'tinybutterfly477@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/tinybutterfly477/5cebfc02661c0.jpg', '2019-05-27 15:02:26', '$2y$10$X1/nKqTIRXbwjNJLDfhnPOLDBbq7Fvnr7o18BNC.Ll3KVZXdHXLkm', 0, 0, 1, 5.53328, 45.3984, '1930 Route de Rives, 38850 Charavines, France', 'Charavines', ' France', 0, NULL, NULL),
(27, 'Louise', 'BIRD', '1974-04-19', 2, 2, 'brownfish220', 'brownfish220@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/brownfish220/5cebfc032ad02.jpg', '2019-05-27 15:02:27', '$2y$10$H.earOO.qA4SNFwZq9YECuus8y7wkkpP75K4CxnKGU73hXNVXsNji', 0, 0, 1, 4.85138, 45.7468, '337 Rue Garibaldi, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(28, 'Frederic', 'WILCOX', '1978-09-10', 1, 4, 'silverbear554', 'silverbear554@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/silverbear554/5cebfc050a2cb.jpg', '2019-05-27 15:02:29', '$2y$10$jig.BZPJorbXrqQFQK2zZ.USwkn8I1N.xa9W1wvEZ6COhgnNBkukS', 0, 0, 1, 4.84473, 45.8876, '10 Chemin des Chênes, 69250 Neuville-sur-Saône, France', 'Neuville-sur-Saône', ' France', 0, NULL, NULL),
(29, 'Thibault', 'COX', '1996-03-11', 1, 4, 'beautifulostrich389', 'beautifulostrich389@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/beautifulostrich389/5cebfc4313e6e.jpg', '2019-05-27 15:03:31', '$2y$10$epFrCnbrOInldvrhT/4RluQgg6lFM.oTeewKNqeKV.Z.BwK9ApAEu', 0, 0, 1, 4.80903, 45.5992, '43T Chemin du Plat, 69360 Ternay, France', 'Ternay', ' France', 0, NULL, NULL),
(30, 'Nathalie', 'OLIVER', '1996-11-11', 2, 1, 'heavyfish640', 'heavyfish640@matcha.z4r7p1.fr', 'Troublemaker. Unapologetic writer. Alcoholaholic. Pop culture junkie. Social media lover. Lifelong music advocate. Travel practitioner. Twitter guru.', 'assets/upload/heavyfish640/5cebfc4489573.jpg', '2019-05-27 15:03:32', '$2y$10$D7X.Qeo83TAI7x9aQa82QuzhC7L3zz7fgzXAlQ0S72l.yZc7Yki9C', 0, 0, 1, 4.82571, 45.7583, '27 Rue du Doyenné, 69005 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(31, 'Jeremie', 'COX', '1979-04-12', 3, 5, 'sadcat531', 'sadcat531@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/sadcat531/5cebfc465de09.jpg', '2019-05-27 15:03:34', '$2y$10$g4p8VFBfWTJYw5DP0o7g5O.9wGwYBqRJ1Ihn4Yupqa8S4gqnuaUgu', 0, 0, 1, 5.25036, 46.0856, 'Les Grandes Faguettes, 01160 La Tranclière, France', 'La Tranclière', ' France', 0, NULL, NULL),
(32, 'Jean-Eustache', 'MACIAS', '1977-03-16', 3, 5, 'angrypeacock712', 'angrypeacock712@matcha.z4r7p1.fr', 'Subtly charming travel guru. Food scholar. Evil communicator. Total social media advocate. Zombie expert.', 'assets/upload/angrypeacock712/5cebfc472b292.jpg', '2019-05-27 15:03:35', '$2y$10$B0dSI0Yu01BVBTJurCy42.4ChAuJC7M8nhocfYFwEv8OGARbu4pVm', 0, 0, 1, 3.87433, 45.4515, 'D256, 63840 Églisolles, France', 'Églisolles', ' France', 0, NULL, NULL),
(33, 'Zoe', 'LEBLANC', '1996-07-21', 2, 2, 'redwolf376', 'redwolf376@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/redwolf376/5cebfc48a1ca6.jpg', '2019-05-27 15:03:36', '$2y$10$mSgG1uP8EWSJ2pwz5n.oWuXWxv248ktiBD/Hi/FZEqE9DugiYhl/S', 0, 0, 1, 4.66733, 45.5123, 'Rigodon, 69420 Longes, France', 'Longes', ' France', 0, NULL, NULL),
(34, 'London', 'BIRD', '1973-06-30', 3, 5, 'lazypanda434', 'lazypanda434@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/lazypanda434/5cebfc4964e3b.jpg', '2019-05-27 15:03:37', '$2y$10$3oKO65PDKU9PGtBdakgg5uXGLlsZClGEvF7qF./PGQNET0ubj3EWS', 0, 0, 1, 4.84695, 45.7436, 'Garibaldi - Berthelot, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(35, 'Pierre', 'MOSES', '1999-08-27', 1, 5, 'whitebird125', 'whitebird125@matcha.z4r7p1.fr', 'Incurable entrepreneur. Extreme internet enthusiast. Subtly charming introvert. Friend of animals everywhere.', 'assets/upload/whitebird125/5cebfc4bdf72b.jpg', '2019-05-27 15:03:40', '$2y$10$s3sPFqumjWG9n37R4tiKB.Fk0Uoza6461HjSzymomIpVxJeRD6p6K', 0, 0, 1, 5.06449, 45.8288, '252 Route de Montluel, 01120 Niévroz, France', 'Niévroz', ' France', 0, NULL, NULL),
(36, 'Michel', 'GILLESPIE', '1986-11-06', 3, 4, 'greenduck392', 'greenduck392@matcha.z4r7p1.fr', 'Extreme coffee buff. Social media expert. Passionate zombie fanatic. Hipster-friendly beer ninja.', 'assets/upload/greenduck392/5cebfc4c9aa3e.jpg', '2019-05-27 15:03:40', '$2y$10$E/nQUFMpqV3l7zCyWzt73epOCZfXx7ruhLAblsGI6EtJ4zzAAP2BO', 0, 0, 1, 4.96634, 45.5949, '784 Route du Petit Mongey, 38200 Luzinay, France', 'Luzinay', ' France', 0, NULL, NULL),
(37, 'Laurine', 'MADDOX', '1987-10-05', 3, 5, 'brownswan116', 'brownswan116@matcha.z4r7p1.fr', 'Troublemaker. Unapologetic writer. Alcoholaholic. Pop culture junkie. Social media lover. Lifelong music advocate. Travel practitioner. Twitter guru.', 'assets/upload/brownswan116/5cebfc4d60572.jpg', '2019-05-27 15:03:41', '$2y$10$Ab9AwRFYbH0/IwZLyE0VlupF82a37P4fOHniMB/ozmcbm.7dPKlsO', 0, 0, 1, 4.73545, 45.8064, '48 Ancienne Route NATIONALE 7, 69570 Dardilly, France', 'Dardilly', ' France', 0, NULL, NULL),
(38, 'Agathe', 'HANEY', '1979-03-04', 2, 1, 'tinybird242', 'tinybird242@matcha.z4r7p1.fr', 'Troublemaker. Unapologetic writer. Alcoholaholic. Pop culture junkie. Social media lover. Lifelong music advocate. Travel practitioner. Twitter guru.', 'assets/upload/tinybird242/5cebfc4f3f36a.jpg', '2019-05-27 15:03:43', '$2y$10$zYYRM7MNgGPEl13ubGAwCu5wMwreYKO6h.Q0lIpgCq1/JguC/dx0u', 0, 0, 1, 4.66733, 45.5123, 'Rigodon, 69420 Longes, France', 'Longes', ' France', 0, NULL, NULL),
(39, 'Kevin', 'COX', '1994-03-18', 1, 5, 'lazywolf420', 'lazywolf420@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/lazywolf420/5cebfc60b8210.jpg', '2019-05-27 15:04:00', '$2y$10$zm/tzpt7/9MI0mtZwRoNWuzwAhGC2jIGq2AEgAvbuc0S3LffE5zy2', 0, 0, 1, 4.83758, 45.7431, '23 Rue Lortet, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(40, 'Océane', 'BIRD', '1994-02-16', 2, 1, 'bigzebra436', 'bigzebra436@matcha.z4r7p1.fr', 'Subtly charming travel guru. Food scholar. Evil communicator. Total social media advocate. Zombie expert.', 'assets/upload/bigzebra436/5cebfc6147f28.jpg', '2019-05-27 15:04:01', '$2y$10$6BVEUSP8PXo/LBtfuR0vJO8KbNklWsUtDofMOvN9kGQt8gfjTBpL2', 0, 0, 1, 4.84891, 45.7426, '136 Avenue Berthelot, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(41, 'Mohammed', 'HOOD', '1978-10-26', 1, 4, 'organicsnake892', 'organicsnake892@matcha.z4r7p1.fr', 'Extreme coffee buff. Social media expert. Passionate zombie fanatic. Hipster-friendly beer ninja.', 'assets/upload/organicsnake892/5cebfc6250f01.jpg', '2019-05-27 15:04:02', '$2y$10$AEmQ0GNfQ.qzthzB99gFieU8ie5feNON5ybg/QGu/KEGczaWrYQFq', 0, 0, 1, 4.84184, 45.764, '19 Quai du Général Sarrail, 69006 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(42, 'Gilbert', 'ABBOTT', '1986-11-29', 1, 3, 'whitegorilla644', 'whitegorilla644@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/whitegorilla644/5cebfc64029af.jpg', '2019-05-27 15:04:04', '$2y$10$r83yy5BCq.P/Fn1pNhrc3eiedG6YRR7zDKIj6evZ6QEkNfBXm43aq', 0, 0, 1, 4.96634, 45.5949, '784 Route du Petit Mongey, 38200 Luzinay, France', 'Luzinay', ' France', 0, NULL, NULL),
(43, 'Jeremie', 'FERNANDEZ', '1986-01-07', 3, 1, 'organicfrog126', 'organicfrog126@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/organicfrog126/5cebfc64df552.jpg', '2019-05-27 15:04:05', '$2y$10$3nULld1RdJFpofdWF3vDXe.Qm.CbGoSyZW5MZ9dBxVOxK6vShY4Ui', 0, 0, 1, 4.83537, 45.7493, '22 Quai Claude Bernard, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(44, 'Marie-Lyne', 'HENRY', '1976-05-20', 3, 5, 'orangerabbit429', 'orangerabbit429@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/orangerabbit429/5cebfc6593590.jpg', '2019-05-27 15:04:05', '$2y$10$N6FIXmA4axS000MAktYwtOnGOYy0VX9FgP0aFtVx68LFL3MVz9aeO', 0, 0, 1, 4.84565, 45.7301, '118 Rue Challemel-Lacour, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(45, 'Jonathan', 'VANCE', '1993-10-05', 3, 2, 'heavybear731', 'heavybear731@matcha.z4r7p1.fr', 'Extreme bacon fan. Internet geek. Explorer. Award-winning analyst. Pop culture fanatic. Incurable coffee enthusiast. Freelance introvert.', 'assets/upload/heavybear731/5cebfc6699ce3.jpg', '2019-05-27 15:04:06', '$2y$10$2e4PGYXzg4z/NzE8ZUiun.XXOj7J0ejNle5FVvmusx.igJblKS2EC', 0, 0, 1, 4.96634, 45.5949, '784 Route du Petit Mongey, 38200 Luzinay, France', 'Luzinay', ' France', 0, NULL, NULL),
(46, 'Jean-Eustache', 'TRUJILLO', '1996-07-08', 1, 4, 'ticklishbear367', 'ticklishbear367@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/ticklishbear367/5cebfc675c55d.jpg', '2019-05-27 15:04:07', '$2y$10$zcZ/xkrFen3aunYPszh76OCnh0MhiEoI8GRtYHiYIW2wsinfuNe3i', 0, 0, 1, 4.97572, 45.715, '66 Rue Ambroise Paré, 69800 Saint-Priest, France', 'Saint-Priest', ' France', 0, NULL, NULL),
(47, 'Benjamin', 'ONEAL', '1977-09-01', 1, 1, 'organicfrog948', 'organicfrog948@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/organicfrog948/5cebfc6818d9e.jpg', '2019-05-27 15:04:08', '$2y$10$fUD3fSiXaWy7.f7fLWMFGuXX9/pQUD0Bt0squZ/yLYMYUT3Lhk.0.', 0, 0, 1, 4.82705, 45.7717, '4 Place du Lieutenant Morel, 69001 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(48, 'John', 'ROBLES', '1982-03-12', 1, 4, 'lazyfrog867', 'lazyfrog867@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/lazyfrog867/5cebfc69d5b7d.jpg', '2019-05-27 15:04:10', '$2y$10$X6dxco6NSDJv0FxqVu8o4e13jrT7XcsOFdRJUkCVFkoRpCXK6OVtG', 0, 0, 1, 4.76023, 45.7424, '15 Rue de la Doulline, 69340 Francheville, France', 'Francheville', ' France', 0, NULL, NULL),
(49, 'Moses', 'EVERETT', '1977-03-15', 1, 1, 'silverbutterfly617', 'silverbutterfly617@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/silverbutterfly617/5cebfc835f7f3.jpg', '2019-05-27 15:04:35', '$2y$10$mxQ9VuKuXhjbQV6y5LRQBuAfxg2dgR7m4sDUSEOvKv/aBCKhy2lGK', 0, 0, 1, 4.84184, 45.764, '19 Quai du Général Sarrail, 69006 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(50, 'Brock', 'SILVA', '1982-09-10', 3, 4, 'whitedog877', 'whitedog877@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/whitedog877/5cebfc9ea1179.jpg', '2019-05-27 15:05:02', '$2y$10$0S4/4yfcLg8eYlCpNXzibu5C5tyfs3v7omCJvKaALTsbee.OZ2V/S', 0, 0, 1, 4.70587, 45.6677, '1350 Chemin du Grand Champ, 69530 Orliénas, France', 'Orliénas', ' France', 0, NULL, NULL),
(51, 'James', 'RIVERS', '1993-12-16', 3, 4, 'bigelephant748', 'bigelephant748@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/bigelephant748/5cebfce0ce339.jpg', '2019-05-27 15:06:09', '$2y$10$b4zvOyseRIO.gXlUa9Bu1.PxCitFiNxIBfohYXn6z9WRFTg843uBu', 0, 0, 1, 4.76312, 45.6823, '19 Rue Paul Cézanne, 69530 Brignais, France', 'Brignais', ' France', 0, NULL, NULL),
(52, 'Alyson', 'RIVERS', '1971-06-10', 2, 4, 'heavywolf710', 'heavywolf710@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/heavywolf710/5cebfce1710a6.jpg', '2019-05-27 15:06:09', '$2y$10$YntWVMK4KSnWbtDjAvTcAOiSREVjsZJ7MSK2FU7.ChozvGfGGlDWS', 0, 0, 1, 4.25945, 46.5425, 'Unnamed Road, 71430 Saint-Bonnet-de-Vieille-Vigne, France', 'Saint-Bonnet-de-Vieille-Vigne', ' France', 0, NULL, NULL),
(53, 'Sawyer', 'LANE', '1982-01-04', 1, 2, 'yellowkoala552', 'yellowkoala552@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/yellowkoala552/5cebfce256b3c.jpg', '2019-05-27 15:06:10', '$2y$10$JgDqENsa1xhb8M6/Fpc60OVLIzoEMiZPAWvVxAp/Jw2b9eNYtPp2e', 0, 0, 1, 5.53328, 45.3984, '1930 Route de Rives, 38850 Charavines, France', 'Charavines', ' France', 0, NULL, NULL),
(54, 'Michelle', 'ALVARADO', '1978-12-12', 2, 2, 'silvergorilla705', 'silvergorilla705@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/silvergorilla705/5cebfce4af30f.jpg', '2019-05-27 15:06:13', '$2y$10$nP9.ywxc7xBKSCaINNZVIur73JkhgoWovoY9VGSo/oG2/eH9QXXHC', 0, 0, 1, 4.83828, 45.7671, '5 Quai Jean Moulin, 69001 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(55, 'Alden', 'EVERETT', '1992-07-22', 1, 3, 'bigostrich840', 'bigostrich840@matcha.z4r7p1.fr', 'Amateur beer guru. Certified pop culture practitioner. Evil music advocate. Food enthusiast.', 'assets/upload/bigostrich840/5cebfce56df98.jpg', '2019-05-27 15:06:13', '$2y$10$RZxFmvXM5/rDXIwwyOdjduzXwZMQUczspBExyjRfsJBLK/Y3NH7JC', 0, 0, 1, 5.04509, 46.5407, 'Unnamed Road, 71290 La Genête, France', 'La Genête', ' France', 0, NULL, NULL),
(56, 'Teagan', 'VANCE', '1993-04-01', 2, 5, 'organicpeacock939', 'organicpeacock939@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/organicpeacock939/5cebfce6be23d.jpg', '2019-05-27 15:06:15', '$2y$10$cG0X.uCHZwtqT9lalUFPReZ8s7mUk.Ci/fP.urLi34QQwnOZ9tske', 0, 0, 1, 4.83758, 45.7431, '23 Rue Lortet, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(57, 'Constant', 'GRAY', '1987-12-24', 1, 2, 'orangeduck196', 'orangeduck196@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/orangeduck196/5cebfce885610.jpg', '2019-05-27 15:06:16', '$2y$10$RpLJp1YyFurPCzeIYdqNoe6dmANi8XF1abhKP72NNwPDNrANpt.fC', 0, 0, 1, 4.7824, 45.6927, '54 Chemin de Bellevue, 69230 Saint-Genis-Laval, France', 'Saint-Genis-Laval', ' France', 0, NULL, NULL),
(58, 'Jacques', 'GRAHAM', '1998-07-27', 1, 3, 'yellowbutterfly965', 'yellowbutterfly965@matcha.z4r7p1.fr', 'Travel scholar. Avid pop culture enthusiast. Falls down a lot. Unapologetic student. Communicator.', 'assets/upload/yellowbutterfly965/5cebfce93b8be.jpg', '2019-05-27 15:06:17', '$2y$10$O6rtcqERa/RilcmtYOuVB.o7fO/xt/LZkaFGl8ljZf8bjqki8WbBe', 0, 0, 1, 4.73816, 45.8206, '30 Chemin de la Fouillouse, 69570 Dardilly, France', 'Dardilly', ' France', 0, NULL, NULL),
(59, 'Kevin', 'VANCE', '1998-10-29', 1, 2, 'bluecat898', 'bluecat898@matcha.z4r7p1.fr', 'Subtly charming travel guru. Food scholar. Evil communicator. Total social media advocate. Zombie expert.', 'assets/upload/bluecat898/5cebfce9f0720.jpg', '2019-05-27 15:06:18', '$2y$10$z.HRIERHt5t/7H5srBHG7u1y3NrSK6Rd9sEhwM2FNROMdYX9EKrwO', 0, 0, 1, 4.84187, 45.7717, '12 Rue Malesherbes, 69006 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(60, 'Alexandra', 'CAREY', '1976-04-27', 2, 4, 'goldenbear780', 'goldenbear780@matcha.z4r7p1.fr', 'Subtly charming travel guru. Food scholar. Evil communicator. Total social media advocate. Zombie expert.', 'assets/upload/goldenbear780/5cebfceaeaf82.jpg', '2019-05-27 15:06:19', '$2y$10$vocTChPNzRRm7W7xgv5d7ORPR8hmI5iI6DtzAfkFQPmx/F9kZR2om', 0, 0, 1, 5.0963, 45.7316, 'Rue du Lermier, 69124 Colombier-Saugnieu, France', 'Colombier-Saugnieu', ' France', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_blacklist`
--

CREATE TABLE `user_blacklist` (
  `id_user_blacklist` int(11) NOT NULL,
  `id_user_blacklisted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_blacklist`
--

INSERT INTO `user_blacklist` (`id_user_blacklist`, `id_user_blacklisted`) VALUES
(2, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user_likes`
--

CREATE TABLE `user_likes` (
  `id_user_like` int(11) NOT NULL,
  `id_user_liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_likes`
--

INSERT INTO `user_likes` (`id_user_like`, `id_user_liked`) VALUES
(2, 1),
(3, 2),
(1, 2),
(4, 2),
(4, 3),
(1, 4),
(4, 1),
(2, 4),
(2, 22);

-- --------------------------------------------------------

--
-- Structure de la table `user_notif`
--

CREATE TABLE `user_notif` (
  `id_user_notified` int(11) NOT NULL,
  `id_user_notif` int(11) NOT NULL,
  `type_notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_report`
--

CREATE TABLE `user_report` (
  `id_user_report` int(11) NOT NULL,
  `id_user_reported` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_report`
--

INSERT INTO `user_report` (`id_user_report`, `id_user_reported`) VALUES
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user_tag`
--

CREATE TABLE `user_tag` (
  `id_user` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_tag`
--

INSERT INTO `user_tag` (`id_user`, `id_tag`) VALUES
(4, 5),
(4, 6),
(4, 7),
(2, 1),
(2, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 5),
(6, 7),
(7, 1),
(7, 2),
(7, 4),
(7, 6),
(7, 7),
(8, 1),
(8, 3),
(8, 4),
(8, 6),
(8, 7),
(9, 1),
(9, 2),
(9, 3),
(9, 6),
(9, 7),
(10, 1),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 6),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 6),
(13, 1),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(14, 1),
(14, 2),
(14, 4),
(14, 5),
(14, 7),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 7),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(18, 1),
(18, 2),
(18, 4),
(18, 6),
(18, 7),
(19, 1),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(20, 1),
(20, 3),
(20, 4),
(20, 6),
(20, 7),
(21, 1),
(21, 3),
(21, 4),
(21, 6),
(21, 7),
(22, 1),
(22, 2),
(22, 3),
(22, 6),
(22, 7),
(23, 1),
(23, 3),
(23, 4),
(23, 6),
(23, 7),
(24, 1),
(24, 3),
(24, 4),
(24, 6),
(24, 7),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 1),
(26, 2),
(26, 5),
(26, 6),
(26, 7),
(27, 2),
(27, 3),
(27, 4),
(27, 6),
(27, 7),
(28, 1),
(28, 2),
(28, 3),
(28, 5),
(28, 7),
(29, 1),
(29, 3),
(29, 4),
(29, 5),
(29, 7),
(30, 1),
(30, 2),
(30, 5),
(30, 6),
(30, 7),
(31, 1),
(31, 3),
(31, 4),
(31, 6),
(31, 7),
(32, 1),
(32, 2),
(32, 4),
(32, 5),
(32, 6),
(33, 1),
(33, 2),
(33, 3),
(33, 5),
(33, 6),
(34, 1),
(34, 3),
(34, 4),
(34, 6),
(34, 7),
(35, 2),
(35, 3),
(35, 5),
(35, 6),
(35, 7),
(36, 1),
(36, 2),
(36, 4),
(36, 6),
(36, 7),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 6),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(39, 1),
(39, 2),
(39, 4),
(39, 5),
(39, 6),
(40, 2),
(40, 3),
(40, 4),
(40, 6),
(40, 7),
(41, 1),
(41, 3),
(41, 4),
(41, 6),
(41, 7),
(42, 1),
(42, 4),
(42, 5),
(42, 6),
(42, 7),
(43, 3),
(43, 4),
(43, 5),
(43, 6),
(43, 7),
(44, 1),
(44, 2),
(44, 4),
(44, 5),
(44, 6),
(45, 2),
(45, 3),
(45, 5),
(45, 6),
(45, 7),
(46, 1),
(46, 3),
(46, 5),
(46, 6),
(46, 7),
(47, 1),
(47, 2),
(47, 3),
(47, 6),
(47, 7),
(48, 1),
(48, 2),
(48, 4),
(48, 5),
(48, 6),
(49, 3),
(49, 4),
(49, 5),
(49, 6),
(49, 7),
(50, 1),
(50, 3),
(50, 4),
(50, 5),
(50, 6),
(51, 1),
(51, 3),
(51, 4),
(51, 5),
(51, 6),
(52, 1),
(52, 3),
(52, 4),
(52, 5),
(52, 6),
(53, 1),
(53, 2),
(53, 3),
(53, 4),
(53, 6),
(54, 3),
(54, 4),
(54, 5),
(54, 6),
(54, 7),
(55, 2),
(55, 3),
(55, 5),
(55, 6),
(55, 7),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(56, 5),
(57, 2),
(57, 4),
(57, 5),
(57, 6),
(57, 7),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 7),
(59, 2),
(59, 3),
(59, 4),
(59, 6),
(59, 7),
(60, 2),
(60, 3),
(60, 4),
(60, 5),
(60, 6);

-- --------------------------------------------------------

--
-- Structure de la table `user_view`
--

CREATE TABLE `user_view` (
  `id_user_view` int(11) NOT NULL,
  `id_user_viewed` int(11) NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_view`
--

INSERT INTO `user_view` (`id_user_view`, `id_user_viewed`, `view_date`) VALUES
(1, 2, '2019-05-22 13:44:56'),
(2, 1, '2019-05-27 15:10:35'),
(2, 3, '2019-05-23 11:09:49'),
(3, 2, '2019-05-22 13:42:29'),
(4, 2, '2019-05-23 11:00:35'),
(4, 3, '2019-05-23 10:29:14'),
(1, 4, '2019-05-23 12:51:18'),
(4, 1, '2019-05-23 14:25:40'),
(2, 4, '2019-05-23 14:05:10'),
(2, 7, '2019-05-27 14:42:08'),
(2, 10, '2019-05-27 15:12:13'),
(2, 18, '2019-05-27 15:12:21'),
(2, 22, '2019-05-27 15:12:30'),
(2, 5, '2019-05-27 15:12:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Index pour la table `orientations`
--
ALTER TABLE `orientations`
  ADD PRIMARY KEY (`orientation_id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`,`picture_path`),
  ADD UNIQUE KEY `picture_path` (`picture_path`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orientations`
--
ALTER TABLE `orientations`
  MODIFY `orientation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
