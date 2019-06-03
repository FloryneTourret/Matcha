-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  lun. 03 juin 2019 à 14:17
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
-- Structure de la table `discussion_messages`
--

CREATE TABLE `discussion_messages` (
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `discussion_messages`
--

INSERT INTO `discussion_messages` (`user_id`, `discussion_id`, `message_content`, `message_date`, `lu`) VALUES
(4, 2, 'adwawd', '2019-05-30 14:12:07', 1),
(4, 2, 'awd', '2019-05-30 15:30:31', 1),
(4, 2, 's', '2019-05-30 15:32:26', 1),
(4, 2, 'coucou', '2019-05-30 15:34:57', 1),
(4, 2, 'test', '2019-05-30 15:35:03', 1),
(4, 2, 'awd', '2019-05-30 15:35:27', 1),
(4, 2, 'adwawd', '2019-05-30 15:35:46', 1),
(4, 2, 'adwawdawdawdawd', '2019-05-30 15:35:47', 1),
(4, 2, 'awd', '2019-05-30 15:36:07', 1),
(4, 2, 'awd', '2019-05-30 15:36:08', 1),
(2, 2, 'coucou', '2019-05-30 15:38:13', 1),
(4, 2, 'test', '2019-05-30 15:39:33', 1),
(4, 2, 'jkljkj', '2019-05-30 15:39:37', 1),
(4, 2, 'lkl;', '2019-05-30 15:39:38', 1),
(2, 2, 'cc', '2019-05-30 15:39:58', 1),
(4, 2, 'awdawd', '2019-05-30 15:42:56', 1),
(4, 2, '', '2019-05-30 15:42:57', 1),
(4, 2, 'aw', '2019-05-30 15:42:57', 1),
(4, 2, 'daw', '2019-05-30 15:42:57', 1),
(4, 2, 'da', '2019-05-30 15:42:57', 1),
(4, 2, 'wd', '2019-05-30 15:42:57', 1),
(4, 2, 'awd', '2019-05-30 15:42:57', 1),
(4, 2, 'awd', '2019-05-30 15:42:58', 1),
(4, 2, 'aw', '2019-05-30 15:42:58', 1),
(4, 2, 'awd', '2019-05-30 15:44:24', 1),
(4, 2, 'awdawd', '2019-05-30 15:44:28', 1),
(4, 2, '', '2019-05-30 15:44:28', 1),
(4, 2, '', '2019-05-30 15:44:28', 1),
(4, 2, '', '2019-05-30 15:44:29', 1),
(4, 2, '', '2019-05-30 15:44:29', 1),
(4, 2, '', '2019-05-30 15:44:32', 1),
(4, 2, '', '2019-05-30 15:44:33', 1),
(4, 2, 'd', '2019-05-30 15:44:38', 1),
(4, 2, '', '2019-05-30 15:44:39', 1),
(4, 2, '', '2019-05-30 15:44:39', 1),
(4, 2, '', '2019-05-30 15:44:39', 1),
(4, 2, '', '2019-05-30 15:44:39', 1),
(4, 2, 'd', '2019-05-30 15:45:23', 1),
(4, 2, 'd', '2019-05-30 15:45:27', 1),
(4, 2, '  ', '2019-05-30 15:45:29', 1),
(4, 2, 'awd', '2019-05-30 15:46:20', 1),
(4, 2, 'awd', '2019-05-30 15:47:26', 1),
(4, 2, 'd', '2019-05-30 15:49:40', 1),
(4, 2, 'coucou', '2019-05-30 15:49:45', 1),
(4, 2, 'oui', '2019-05-30 15:49:50', 1),
(4, 2, 'ok', '2019-05-30 15:50:01', 1),
(4, 2, 'd', '2019-05-30 15:51:10', 1),
(4, 2, 'coucu', '2019-05-30 15:51:12', 1),
(4, 2, 'plop', '2019-05-30 15:51:48', 1),
(4, 2, 'awdawd', '2019-05-30 15:55:08', 1),
(4, 2, 'test', '2019-05-30 15:59:17', 1),
(4, 2, 'test', '2019-05-30 16:07:04', 1),
(4, 2, 'test', '2019-05-30 16:07:58', 1),
(4, 2, 'test', '2019-05-30 16:09:02', 1),
(4, 2, 'awdawdlalw;kdalw;dkal;wkdl;awkdlakwdl;akw dl;ak l;ak a', '2019-05-30 16:09:58', 1),
(4, 2, 'awdawldkalw;dkalw;dkal;kwdalw;dkalw;kdl;akwd', '2019-05-30 16:10:37', 1),
(4, 2, '131545', '2019-05-30 16:10:49', 1),
(4, 2, '444', '2019-05-30 16:11:11', 1),
(4, 2, 'coucou', '2019-05-30 16:11:20', 1),
(4, 2, 'd', '2019-05-30 16:14:47', 1),
(4, 2, 'd', '2019-05-30 16:14:57', 1),
(4, 2, 'adw', '2019-05-30 16:15:24', 1),
(4, 2, 'adwad', '2019-05-30 16:15:30', 1),
(4, 2, 'adw', '2019-05-30 16:22:50', 1),
(4, 2, 'coucou', '2019-05-30 16:22:56', 1),
(4, 2, 'test', '2019-05-30 16:34:48', 1),
(4, 2, 'd', '2019-05-30 16:46:51', 1),
(4, 2, 's', '2019-05-30 16:46:55', 1),
(4, 2, 'd', '2019-05-30 16:48:33', 1),
(4, 2, 'd', '2019-05-30 16:48:48', 1),
(4, 2, 'test', '2019-05-30 16:51:37', 1),
(4, 2, 'awdawd', '2019-05-30 17:01:37', 1),
(4, 2, 'awd', '2019-05-30 17:01:40', 1),
(2, 2, 'tedt', '2019-05-30 17:02:29', 1),
(2, 2, 'rwar', '2019-05-30 17:03:46', 1),
(4, 2, 'test', '2019-05-30 17:13:45', 1),
(4, 2, 'teest', '2019-05-30 17:14:22', 1),
(4, 2, 'quoi', '2019-05-30 17:14:29', 1),
(4, 2, 'salut', '2019-05-30 17:14:41', 1),
(2, 2, 'test', '2019-05-30 17:14:44', 1),
(4, 2, 'awdad', '2019-05-30 17:14:47', 1),
(4, 2, 'ici', '2019-05-30 17:14:50', 1),
(4, 2, 'awd', '2019-05-30 17:15:00', 1),
(2, 2, 'coucou', '2019-05-30 17:15:15', 1),
(2, 2, 'test', '2019-05-30 17:15:42', 1),
(2, 2, 'adw', '2019-05-30 17:15:43', 1),
(2, 2, 'awd', '2019-05-30 17:15:44', 1),
(2, 2, 'awda', '2019-05-30 17:15:44', 1),
(2, 2, 'wda', '2019-05-30 17:15:44', 1),
(2, 2, 'wda', '2019-05-30 17:15:44', 1),
(2, 2, 'wd', '2019-05-30 17:15:44', 1),
(4, 2, 'awd', '2019-05-30 17:15:50', 1),
(4, 2, 'awd', '2019-05-30 17:15:51', 1),
(4, 2, 'awd', '2019-05-30 17:15:53', 1),
(2, 2, 'coucou', '2019-06-03 10:13:51', 1),
(2, 2, 'gregsergho;dfbgqebrj;bgerbgoh[obhgajorbgoxbgrw;lbgp\'w[gB\'Sbgobrgbf;jnv\'SEIG\'RGN\'FBP\"FBPWirghs\'fiavb\'dfbno\'fbgnar\'psgjwpr\'GJKSDNVP\'EPWIGHIS\'GHNIP\'SNVLSb\'FP\'RI\'GHDSBN\'AEibp\'epghid\'sbnird\'ganhrabngheth', '2019-06-03 10:14:30', 1),
(2, 3, 'cc', '2019-06-03 10:16:02', 1),
(42, 4, 'coucou', '2019-06-03 10:47:24', 1),
(2, 4, 'hello', '2019-06-03 10:47:40', 0);

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
-- Structure de la table `notifs`
--

CREATE TABLE `notifs` (
  `user_id` int(11) NOT NULL,
  `emit_user_id` int(11) NOT NULL,
  `content_notif` text NOT NULL,
  `notif_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifs`
--

INSERT INTO `notifs` (`user_id`, `emit_user_id`, `content_notif`, `notif_date`, `lu`) VALUES
(1, 2, 'a vu votre profil', '2019-06-03 11:36:38', 0),
(1, 2, 'a vu votre profil', '2019-06-03 11:42:28', 0),
(1, 2, 'a vu votre profil', '2019-06-03 12:47:56', 0),
(1, 2, 'ne vous match plus', '2019-06-03 12:48:00', 0),
(1, 2, 'vous a liké', '2019-06-03 12:48:05', 0),
(1, 2, 'vous a matché', '2019-06-03 12:48:05', 0);

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
(1, 'assets/upload/biggoril/5cee3e2f27f0e.jpg', 5, '2019-05-29 08:09:19'),
(2, 'assets/upload/redzebra/5cee3e31b6bb2.jpg', 6, '2019-05-29 08:09:22'),
(3, 'assets/upload/beautifu/5cee3e33832e1.jpg', 7, '2019-05-29 08:09:23'),
(4, 'assets/upload/blackbea/5cee3e34298dc.jpg', 8, '2019-05-29 08:09:24'),
(5, 'assets/upload/goldenbe/5cee3e34ddff9.jpg', 9, '2019-05-29 08:09:25'),
(6, 'assets/upload/lazylady/5cee3e35bb140.jpg', 10, '2019-05-29 08:09:26'),
(7, 'assets/upload/whitegor/5cee3e36c52c7.jpg', 11, '2019-05-29 08:09:27'),
(8, 'assets/upload/happyzeb/5cee3e3923572.jpg', 12, '2019-05-29 08:09:29'),
(9, 'assets/upload/whiteele/5cee3e39e9ee6.jpg', 13, '2019-05-29 08:09:30'),
(10, 'assets/upload/crazycat/5cee3e3ad08cd.jpg', 14, '2019-05-29 08:09:31'),
(11, 'assets/upload/lazytige/5cee3e543de44.jpg', 15, '2019-05-29 08:09:56'),
(12, 'assets/upload/sadcat92/5cee3e55d83f4.jpg', 16, '2019-05-29 08:09:58'),
(13, 'assets/upload/yellowli/5cee3e56eb1bd.jpg', 17, '2019-05-29 08:09:59'),
(14, 'assets/upload/blackwol/5cee3e57ec92b.jpg', 18, '2019-05-29 08:10:00'),
(15, 'assets/upload/brownwol/5cee3e5984bfd.jpg', 19, '2019-05-29 08:10:01'),
(16, 'assets/upload/purpleze/5cee3e7fc4863.jpg', 20, '2019-05-29 08:10:40'),
(17, 'assets/upload/ticklish/5cee3e807ec29.jpg', 21, '2019-05-29 08:10:40'),
(18, 'assets/upload/crazyele/5cee3e815524d.jpg', 22, '2019-05-29 08:10:41'),
(19, 'assets/upload/brownfro/5cee3e82e716a.jpg', 23, '2019-05-29 08:10:43'),
(20, 'assets/upload/blackpan/5cee3e83b03e1.jpg', 24, '2019-05-29 08:10:44'),
(21, 'assets/upload/tinylion/5cee3e8464985.jpg', 25, '2019-05-29 08:10:44'),
(22, 'assets/upload/smalllio/5cee3e8554e82.jpg', 26, '2019-05-29 08:10:45'),
(23, 'assets/upload/happyrab/5cee3e861b455.jpg', 27, '2019-05-29 08:10:46'),
(24, 'assets/upload/silverwo/5cee3e8721f52.jpg', 28, '2019-05-29 08:10:47'),
(25, 'assets/upload/whitetig/5cee3e88a8950.jpg', 29, '2019-05-29 08:10:49'),
(26, 'assets/upload/heavymee/5cee3e92a12a4.jpg', 30, '2019-05-29 08:10:58'),
(27, 'assets/upload/goldenla/5cee3e9420ae9.jpg', 31, '2019-05-29 08:11:00'),
(28, 'assets/upload/browngor/5cee3e94dc2f3.jpg', 32, '2019-05-29 08:11:01'),
(29, 'assets/upload/purplepe/5cee3e96e94af.jpg', 33, '2019-05-29 08:11:03'),
(30, 'assets/upload/happybut/5cee3e9a453e9.jpg', 34, '2019-05-29 08:11:06'),
(31, 'assets/upload/whitepea/5cee3e9b98518.jpg', 35, '2019-05-29 08:11:07'),
(32, 'assets/upload/brownfis/5cee3ead26ca1.jpg', 36, '2019-05-29 08:11:25'),
(33, 'assets/upload/crazygoo/5cee3eaf1677b.jpg', 37, '2019-05-29 08:11:27'),
(34, 'assets/upload/whitefro/5cee3eb08ec8d.jpg', 38, '2019-05-29 08:11:28'),
(35, 'assets/upload/Tinykoal/5cee3f456e5e8.jpg', 39, '2019-05-29 08:13:57'),
(36, 'assets/upload/Angrycat/5cee3f469ffa9.jpg', 40, '2019-05-29 08:13:59'),
(37, 'assets/upload/Lazypand/5cee3f478445d.jpg', 41, '2019-05-29 08:13:59'),
(38, 'assets/upload/Greentig/5cee3f486dbb6.jpg', 42, '2019-05-29 08:14:00'),
(39, 'assets/upload/Purplebe/5cee3f49cd111.jpg', 43, '2019-05-29 08:14:02'),
(40, 'assets/upload/Bigfish4/5cee3f4ad5b70.jpg', 44, '2019-05-29 08:14:03'),
(41, 'assets/upload/Bigfrog4/5cee3f4c0a5b4.jpg', 45, '2019-05-29 08:14:04'),
(42, 'assets/upload/Crazyzeb/5cee3f4cdf199.jpg', 46, '2019-05-29 08:14:05'),
(43, 'assets/upload/Tinyostr/5cee3f4dc0348.jpg', 47, '2019-05-29 08:14:06'),
(44, 'assets/upload/Silverli/5cee3f4e82ab8.jpg', 48, '2019-05-29 08:14:06'),
(45, 'assets/upload/Bigbutte/5cee3f505da66.jpg', 49, '2019-05-29 08:14:08'),
(46, 'assets/upload/Blackele/5cee3f515b928.jpg', 50, '2019-05-29 08:14:09'),
(47, 'assets/upload/Yellowze/5cee3f6001c0a.jpg', 51, '2019-05-29 08:14:24'),
(48, 'assets/upload/Purpleca/5cee3f6171215.jpg', 52, '2019-05-29 08:14:25'),
(49, 'assets/upload/Angrysna/5cee3f6318545.jpg', 53, '2019-05-29 08:14:27'),
(50, 'assets/upload/Yellowfi/5cee3f66af680.jpg', 54, '2019-05-29 08:14:31'),
(51, 'assets/upload/Lazykoal/5cee3f6763284.jpg', 55, '2019-05-29 08:14:31'),
(52, 'assets/upload/Heavysna/5cee3f688326c.jpg', 56, '2019-05-29 08:14:32'),
(53, 'assets/upload/Orangela/5cee3f697bce3.jpg', 57, '2019-05-29 08:14:33'),
(54, 'assets/upload/Blackgoo/5cee3f6a3a7b4.jpg', 58, '2019-05-29 08:14:34'),
(55, 'assets/upload/Blackduc/5cee3f6b53a0f.jpg', 59, '2019-05-29 08:14:35'),
(56, 'assets/upload/Happygoo/5cee3f6c51525.jpg', 60, '2019-05-29 08:14:36'),
(58, 'assets/upload/lettoh/cc88ba6983dc7b9f.jpg', 1, '2019-05-29 09:21:25'),
(61, 'assets/upload/floryne/f9b348115542138a.jpg', 61, '2019-05-30 15:50:52'),
(63, 'assets/upload/xx_dark_s@suké_xx/1fe0cb9b7ca9d059.jpg', 62, '2019-05-30 16:59:21'),
(64, 'assets/upload/napunchman/715f765a5b92fd68.png', 4, '2019-05-30 17:00:55'),
(65, 'assets/upload/ftourret/2d42d4323a643081.jpg', 2, '2019-06-03 12:54:36');

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
(3, 'OnePunchMan'),
(4, 'Saitama'),
(5, 'Chauve'),
(6, 'PHP'),
(7, 'Burgers'),
(8, 'Nutella'),
(9, 'Mood'),
(10, 'Netflix'),
(11, 'And'),
(12, 'Chill'),
(13, 'Caca'),
(14, 'd1h'),
(15, 'Dark'),
(16, 'Orochimaru');

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
  `popularity` int(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `token_expiration` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_birthdate`, `user_gender_id`, `user_orientation_id`, `login`, `email`, `biography`, `path_profile_picture`, `last_connexion`, `password`, `admin`, `notif`, `enabled`, `longitude`, `latitude`, `address`, `city`, `country`, `popularity`, `token`, `token_expiration`) VALUES
(1, 'Frédéric', 'LEONARD', '1997-08-12', 1, 2, 'lettoh', 'lettoh08@gmail.com', 'Je suis Fred. Je ne suis pas non binaire. Entièrement Homme. Avec un pénis quoi.', 'assets/upload/lettoh/cc88ba6983dc7b9f.jpg', '2019-05-30 16:31:10', '$2y$10$N9eet7EhGZfqNr5ZNb5k9eVy4BXIuxmcVP/4xD5NFUsv/pL.JABjS', 1, 1, 1, 4.78405, 45.7582, '10 Avenue de Ménival, 69005 Lyon, France', 'Lyon', 'France', 16, NULL, NULL),
(2, 'Floryne', 'TOURRET', '1998-12-04', 2, 1, 'ftourret', 'floryne.tourret@gmail.com', 'You came here because we do this better than you, and part of that is letting our creatives be unproductive until they are.', 'assets/upload/ftourret/2d42d4323a643081.jpg', '2019-06-03 14:07:47', '$2y$10$iBDaoi5JQ7QKIIqLi.DWve3Qp6cAyx5PuUxGmoclQqhPl3rZ6MxsC', 1, 1, 1, 4.78405, 45.7582, '10 Avenue de Ménival, 69005 Lyon, France', 'Lyon', 'France', 32, NULL, NULL),
(3, 'Frédéric', 'LEONARD', '1997-08-12', 3, 4, 'lettard', 'frederic.leonard.pro@gmail.com', NULL, '', '2019-05-23 14:02:32', '$2y$10$LL173fJwQAKDxyx//q15BukDGX//c4x0Kzo4pkHYYZY0njcSNSwCS', 0, 1, 1, 2.3527, 48.8543, 'Hôtel de Ville, Quai de l\'Hôtel de ville, 75004 Paris, France', 'Paris', 'France', 1, NULL, NULL),
(4, 'Nathan', 'PUNCH MAN', '1995-08-02', 1, 2, 'napunchman', 'naplouvi@student.le-101.fr', 'How can there be too many typefaces in the world? Are there too many songs, too many books, too many places to go?', 'assets/upload/napunchman/715f765a5b92fd68.png', '2019-05-30 17:15:53', '$2y$10$biHqxwJhplQ0zjL6AV0tWe1Rp5B5gU0.8nXPGwTeSoCsJo3d/r7/q', 0, 1, 1, 2.3527, 48.8543, 'Hôtel de Ville, Quai de l\'Hôtel de ville, 75004 Paris, France', 'Paris', 'France', 18, NULL, NULL),
(5, 'Jean-Luc', 'RIVERS', '1988-01-16', 3, 4, 'biggoril', 'biggoril@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/biggoril/5cee3e2f27f0e.jpg', '2019-05-29 08:09:19', '$2y$10$49i0A8DUB6jtlq/vRBjLouuPNuuOb5BwoVernxe88TCX7WtrObsvi', 0, 0, 1, 4.97699, 45.8362, '2 Rue des Montelières, 01700 Saint-Maurice-de-Beynost, France', 'Saint-Maurice-de-Beynost', ' France', 0, NULL, NULL),
(6, 'Anna', 'RICHARDS', '1977-09-09', 2, 3, 'redzebra', 'redzebra@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/redzebra/5cee3e31b6bb2.jpg', '2019-05-29 08:09:22', '$2y$10$j8P3oYvC769CRC0y/wR9e.sMtLVdyIwOTUmsFjy5D7mz6.uLFlO6a', 0, 0, 1, 3.76083, 45.9933, 'Terrenoire, 03250 Laprugne, France', 'Laprugne', ' France', 0, NULL, NULL),
(7, 'Valentina', 'BAUER', '1984-08-09', 3, 3, 'beautifu', 'beautifu@matcha.z4r7p1.fr', 'Extreme bacon fan. Internet geek. Explorer. Award-winning analyst. Pop culture fanatic. Incurable coffee enthusiast. Freelance introvert.', 'assets/upload/beautifu/5cee3e33832e1.jpg', '2019-05-29 08:09:23', '$2y$10$Rx5VGujVA/s5aUSn4iksAuysYLVj.d2kpqkjAnk2w31hput83Q0be', 0, 0, 1, 4.97699, 45.8362, '2 Rue des Montelières, 01700 Saint-Maurice-de-Beynost, France', 'Saint-Maurice-de-Beynost', ' France', 0, NULL, NULL),
(8, 'Katelynn', 'MADDOX', '1986-03-07', 2, 1, 'blackbea', 'blackbea@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/blackbea/5cee3e34298dc.jpg', '2019-05-29 08:09:24', '$2y$10$7vKmpK4zPAud96k8WkWZ/Ot77PMavTRPXbMkrYtMFwmnYMzm0rIG.', 0, 0, 1, 4.83154, 45.7439, '22 Avenue Leclerc, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(9, 'Clarisse', 'KEITH', '1989-06-09', 2, 4, 'goldenbe', 'goldenbe@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/goldenbe/5cee3e34ddff9.jpg', '2019-05-29 08:09:25', '$2y$10$1YclqNh2YShCYyb7.5oAi.fKZ/WLZ3AtIwMcTeA/AWNY8kVSDuXTi', 0, 0, 1, 4.84999, 45.8528, '980 Rue de la République, 69250 Fleurieu-sur-Saône, France', 'Fleurieu-sur-Saône', ' France', 1, NULL, NULL),
(10, 'Valentina', 'NUNEZ', '1998-09-28', 2, 1, 'lazylady', 'lazylady@matcha.z4r7p1.fr', 'Extreme bacon fan. Internet geek. Explorer. Award-winning analyst. Pop culture fanatic. Incurable coffee enthusiast. Freelance introvert.', 'assets/upload/lazylady/5cee3e35bb140.jpg', '2019-05-29 08:09:26', '$2y$10$wwBYTb6VAzB2UPgF0udw3OfAYEbfhPCkJ50QlqivjmRmk4XD/.tGK', 0, 0, 1, 4.09867, 45.5404, 'D109, 42610 Saint-Georges-Haute-ville, France', 'Saint-Georges-Haute-ville', ' France', 0, NULL, NULL),
(11, 'Pauline', 'PARKS', '1992-05-06', 2, 2, 'whitegor', 'whitegor@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/whitegor/5cee3e36c52c7.jpg', '2019-05-29 08:09:27', '$2y$10$Ckm5n9SUJ/WfcuFcdkDP9Oz1oos6Jul68EmgruLegMwmH8x6yu4X.', 0, 0, 1, 4.26096, 45.2084, 'Touron, 43290 Raucoules, France', 'Raucoules', ' France', 0, NULL, NULL),
(12, 'Khalil', 'FERNANDEZ', '1972-06-23', 1, 1, 'happyzeb', 'happyzeb@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/happyzeb/5cee3e3923572.jpg', '2019-05-29 08:09:29', '$2y$10$qCUV2HL9CQldAyShQyixxOpHmuY1K8f8PvPx6.pUqPJ0vbmLoxLQK', 0, 0, 1, 5.88066, 45.9274, 'Chemin Rural des Trois Mulets, 74150 Val-de-Fier, France', 'Val-de-Fier', ' France', 1, NULL, NULL),
(13, 'Brice', 'HEBERT', '1980-08-30', 3, 1, 'whiteele', 'whiteele@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/whiteele/5cee3e39e9ee6.jpg', '2019-05-29 08:09:30', '$2y$10$HDk.4DRgBwXbPtvO6J2O1.4ZxrAPRGiC/dgtFg.eb6WWaj0UYzXpi', 0, 0, 1, 4.87404, 45.7446, '124 Cours Albert Thomas, 69008 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(14, 'Joelle', 'MILLER', '1993-01-30', 3, 2, 'crazycat', 'crazycat@matcha.z4r7p1.fr', 'Twitter practitioner. Analyst. Unapologetic tv trailblazer. Bacon expert. Internet fanatic.', 'assets/upload/crazycat/5cee3e3ad08cd.jpg', '2019-05-29 08:09:31', '$2y$10$v3RtWWGo8w6cSgRoFWGytOYGar7gaXew77wBa/Wy6n5CmcwpdzyG6', 0, 0, 1, 4.85138, 45.7468, '337 Rue Garibaldi, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(15, 'Clarisse', 'ONEAL', '1983-06-17', 2, 1, 'lazytige', 'lazytige@matcha.z4r7p1.fr', 'Extreme bacon fan. Internet geek. Explorer. Award-winning analyst. Pop culture fanatic. Incurable coffee enthusiast. Freelance introvert.', 'assets/upload/lazytige/5cee3e543de44.jpg', '2019-05-29 08:09:56', '$2y$10$sTeEdWIM3rILpGvvdgzi0.T6MjEkhn7vkZnuWBQBpcnNO5netYdEu', 0, 0, 1, 4.79929, 45.7485, '24 Boulevard des Provinces, 69110 Sainte-Foy-lès-Lyon, France', 'Sainte-Foy-lès-Lyon', ' France', 0, NULL, NULL),
(16, 'Kevin', 'LEBLANC', '1999-10-24', 1, 2, 'sadcat92', 'sadcat92@matcha.z4r7p1.fr', 'Subtly charming travel guru. Food scholar. Evil communicator. Total social media advocate. Zombie expert.', 'assets/upload/sadcat92/5cee3e55d83f4.jpg', '2019-05-29 08:09:58', '$2y$10$OB5L5TgBhiZdEHuvweWaf.ddu1T3J/5c6j2NVZB4POr.tsDre5S/y', 0, 0, 1, 5.82848, 45.9295, 'D991, 73310 Motz, France', 'Motz', ' France', 1, NULL, NULL),
(17, 'Guillaume', 'HANEY', '1994-10-05', 3, 3, 'yellowli', 'yellowli@matcha.z4r7p1.fr', 'Friend of animals everywhere. Future teen idol. General internet junkie. Evil webaholic. Extreme reader. Gamer.', 'assets/upload/yellowli/5cee3e56eb1bd.jpg', '2019-05-29 08:09:59', '$2y$10$pdW.g5LzsVilZAK.wevnRel2Mtx3LO.z7xlcZuiS.po/qp.GH2rE.', 0, 0, 1, 4.85697, 45.7547, '6 Place Danton, 69003 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(18, 'Aiden', 'GRAY', '1973-03-13', 1, 2, 'blackwol', 'blackwol@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/blackwol/5cee3e57ec92b.jpg', '2019-05-29 08:10:00', '$2y$10$44sfuWZg5/ytdC49AeN9F.71uQwpH.EMqIm4lcSg2WPFTwemG13.y', 0, 0, 1, 4.72667, 45.7225, '43 Route du Boulot, 69126 Chaponost, France', 'Chaponost', ' France', 1, NULL, NULL),
(19, 'Kasey', 'POPE', '1977-01-31', 2, 2, 'brownwol', 'brownwol@matcha.z4r7p1.fr', 'Amateur beer guru. Certified pop culture practitioner. Evil music advocate. Food enthusiast.', 'assets/upload/brownwol/5cee3e5984bfd.jpg', '2019-05-29 08:10:01', '$2y$10$fQwIVUbXHWho0/Pb.imBEOZkSheli/Wxu4gE4PNETJSCQxhralQoq', 0, 0, 1, 4.73816, 45.8206, '30 Chemin de la Fouillouse, 69570 Dardilly, France', 'Dardilly', ' France', 0, NULL, NULL),
(20, 'Katelynn', 'MCDONALD', '1986-06-01', 2, 1, 'purpleze', 'purpleze@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/purpleze/5cee3e7fc4863.jpg', '2019-05-29 08:10:40', '$2y$10$VFh2pkU6y6JeauknPvtrjutilEo4BY65hXamVj9temNWtralZ/mVu', 0, 0, 1, 4.82705, 45.7717, '4 Place du Lieutenant Morel, 69001 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(21, 'Valentina', 'LANE', '1993-08-02', 2, 4, 'ticklish', 'ticklish@matcha.z4r7p1.fr', 'Extreme bacon fan. Internet geek. Explorer. Award-winning analyst. Pop culture fanatic. Incurable coffee enthusiast. Freelance introvert.', 'assets/upload/ticklish/5cee3e807ec29.jpg', '2019-05-29 08:10:40', '$2y$10$7utVuFYPtOTZ51BpbFeo0.W4XhXmdNeE7Ia1rKCgmO4cZDb0TF7AG', 0, 0, 1, 4.82705, 45.7717, '4 Place du Lieutenant Morel, 69001 Lyon, France', 'Lyon', ' France', 2, NULL, NULL),
(22, 'Coralie', 'FERGUSON', '1986-07-29', 3, 1, 'crazyele', 'crazyele@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/crazyele/5cee3e815524d.jpg', '2019-05-29 08:10:41', '$2y$10$wv9ApWJ70OBeQGt0T69oNeo/JLrZ0QCSL3G/P51rtJGN1CtUPLxFO', 0, 0, 1, 4.82705, 45.7717, '4 Place du Lieutenant Morel, 69001 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(24, 'Silas', 'HORTON', '1997-02-05', 3, 4, 'blackpan', 'blackpan@matcha.z4r7p1.fr', 'Extreme coffee buff. Social media expert. Passionate zombie fanatic. Hipster-friendly beer ninja.', 'assets/upload/blackpan/5cee3e83b03e1.jpg', '2019-05-29 08:10:44', '$2y$10$jR6BLGvcWslRjDJdFxvpq./ylPNP/tbmreNhubWAmlB/ENoQoj5ma', 0, 0, 1, 4.69824, 45.9247, '134 Chemin de Rongefer, 69480 Lachassagne, France', 'Lachassagne', ' France', 1, NULL, NULL),
(25, 'Laurine', 'GRAY', '1982-06-03', 2, 4, 'tinylion', 'tinylion@matcha.z4r7p1.fr', 'Amateur beer guru. Certified pop culture practitioner. Evil music advocate. Food enthusiast.', 'assets/upload/tinylion/5cee3e8464985.jpg', '2019-05-29 08:10:44', '$2y$10$rZjsMF9vA8BUSVKTMum4FO4t0KftvVn7og6okXedmeXDagFvbWlNO', 0, 0, 1, 4.83914, 45.7433, '11 Rue de la Grande Famille, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(26, 'Gertrude', 'BLEVINS', '1975-06-06', 2, 4, 'smalllio', 'smalllio@matcha.z4r7p1.fr', 'Proud entrepreneur. Wannabe troublemaker. Twitter advocate. Internet maven. Bacon nerd. Hipster-friendly food buff. Amateur communicator.', 'assets/upload/smalllio/5cee3e8554e82.jpg', '2019-05-29 08:10:45', '$2y$10$KLFUcK4XaNGN0jGPrck/XOiHsQEf7DiWkmsouG/NfftgE1F.kZXbO', 0, 0, 1, 4.69824, 45.9247, '134 Chemin de Rongefer, 69480 Lachassagne, France', 'Lachassagne', ' France', 0, NULL, NULL),
(27, 'Lorelei', 'NUNEZ', '1995-06-16', 2, 5, 'happyrab', 'happyrab@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/happyrab/5cee3e861b455.jpg', '2019-05-29 08:10:46', '$2y$10$b2lTJtdvAsN.SewuyuZzxuRa1py5W8epMspqEVjIbJGJMndgu6scG', 0, 0, 1, 5.34789, 46.2946, 'Aux Communes, 01370 Treffort-Cuisiat, France', 'Treffort-Cuisiat', ' France', 0, NULL, NULL),
(28, 'Zoe', 'RANGEL', '1973-12-31', 3, 2, 'silverwo', 'silverwo@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/silverwo/5cee3e8721f52.jpg', '2019-05-29 08:10:47', '$2y$10$BBas6ukGo.6OdSL6/zJr/.084J.yMPn0.F0K0f15QDwTTH2l5vrt2', 0, 0, 1, 4.7631, 45.7902, '8 Chemin des Serres, 69130 Écully, France', 'Écully', ' France', 1, NULL, NULL),
(29, 'Leon', 'LEBLANC', '1986-03-09', 1, 1, 'whitetig', 'whitetig@matcha.z4r7p1.fr', 'Food aficionado. Travel guru. Web scholar. Proud problem solver. Zombie advocate. Analyst. Incurable tv nerd.', 'assets/upload/whitetig/5cee3e88a8950.jpg', '2019-05-29 08:10:49', '$2y$10$vjUzdJYpMhO0ZhFZ84J51.3uZIVUn8umMJNZaeZu323QgHHSRLzem', 0, 0, 1, 4.81061, 45.7474, '28 Avenue Valioud, 69110 Sainte-Foy-lès-Lyon, France', 'Sainte-Foy-lès-Lyon', ' France', 0, NULL, NULL),
(30, 'Caitlyn', 'WHITEHEAD', '1997-10-31', 2, 2, 'heavymee', 'heavymee@matcha.z4r7p1.fr', 'Food aficionado. Travel guru. Web scholar. Proud problem solver. Zombie advocate. Analyst. Incurable tv nerd.', 'assets/upload/heavymee/5cee3e92a12a4.jpg', '2019-05-29 08:10:58', '$2y$10$NTE6NjqBfYtj8FYkB3O.y.HBfESBCZd8OVFixME/U38p3vquztnlO', 0, 0, 1, 4.83914, 45.7433, '11 Rue de la Grande Famille, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(31, 'Jagger', 'MOSES', '1981-12-19', 3, 3, 'goldenla', 'goldenla@matcha.z4r7p1.fr', 'Travel scholar. Avid pop culture enthusiast. Falls down a lot. Unapologetic student. Communicator.', 'assets/upload/goldenla/5cee3e9420ae9.jpg', '2019-05-29 08:11:00', '$2y$10$GIm4cEuUSVAhGKvbVXTCPOX9Apj3nUKed7scpImxbQ6MYqpXa33ES', 0, 0, 1, 3.86368, 45.8568, 'Rochefort, 42430 Champoly, France', 'Champoly', ' France', 0, NULL, NULL),
(32, 'Simon', 'VANCE', '1993-12-14', 1, 4, 'browngor', 'browngor@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/browngor/5cee3e94dc2f3.jpg', '2019-05-29 08:11:01', '$2y$10$a2DI/TEnlDsrW2Va5Qz60OTRp6fzRAkCymqS7Ozvfx7INlBAO4/Gu', 0, 0, 1, 4.62243, 45.7481, 'D50, 69670 Vaugneray, France', 'Vaugneray', ' France', 1, NULL, NULL),
(33, 'Josue', 'MACIAS', '1973-05-25', 1, 5, 'purplepe', 'purplepe@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/purplepe/5cee3e96e94af.jpg', '2019-05-29 08:11:03', '$2y$10$4ZcJuw2Uj5cqQSCNoEwePeF9gqzgRm5DGAWv6pGo7ocu8nYZDCdHu', 0, 0, 1, 4.83154, 45.7439, '22 Avenue Leclerc, 69007 Lyon, France', 'Lyon', ' France', 1, NULL, NULL),
(34, 'Camille', 'MELTON', '1987-04-14', 2, 3, 'happybut', 'happybut@matcha.z4r7p1.fr', 'Extreme coffee buff. Social media expert. Passionate zombie fanatic. Hipster-friendly beer ninja.', 'assets/upload/happybut/5cee3e9a453e9.jpg', '2019-05-29 08:11:06', '$2y$10$3vlwnJWtVZR6FsdhgLMJFuGuOBl47bXulyqhqhNyMTJlvUsnRq3Pq', 0, 0, 1, 4.83061, 45.7758, '3 Rue de Cuire, 69004 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(35, 'Aiden', 'DONALDSON', '1991-02-17', 1, 2, 'whitepea', 'whitepea@matcha.z4r7p1.fr', 'Hardcore introvert. Falls down a lot. Certified gamer. Internet buff. Lifelong student.', 'assets/upload/whitepea/5cee3e9b98518.jpg', '2019-05-29 08:11:07', '$2y$10$yhDidqQpQXEZZD4TtiHp7OG1UVT6yxzb0Boyka1FBGuWHkYG4RMuO', 0, 0, 1, 4.27155, 45.978, 'D26, 42470 Lay, France', 'Lay', ' France', 1, NULL, NULL),
(36, 'Alden', 'COOLEY', '1996-07-18', 1, 4, 'brownfis', 'brownfis@matcha.z4r7p1.fr', 'Freelance reader. Zombie lover. Troublemaker. Travel fan. Friend of animals everywhere. Extreme writer. Certified social media scholar.', 'assets/upload/brownfis/5cee3ead26ca1.jpg', '2019-05-29 08:11:25', '$2y$10$KBle0GDhUkQmp.lq5nvk1.99A.H2JR/Ev63KpK5H5wgWVMCwXEsnO', 0, 0, 1, 5.75303, 46.2577, 'Unnamed Road, 01130 Belleydoux, France', 'Belleydoux', ' France', 1, NULL, NULL),
(37, 'Astrid', 'OLIVER', '1972-10-11', 3, 1, 'crazygoo', 'crazygoo@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/crazygoo/5cee3eaf1677b.jpg', '2019-05-29 08:11:27', '$2y$10$JUXNmvzqoaG5NfzLibVkI.H9iVkEoYdKJPvy8rRplaw.vKm3Y9WzG', 0, 0, 1, 4.83154, 45.7439, '22 Avenue Leclerc, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(38, 'Adele', 'GLASS', '1975-03-27', 2, 4, 'whitefro', 'whitefro@matcha.z4r7p1.fr', 'Proud entrepreneur. Wannabe troublemaker. Twitter advocate. Internet maven. Bacon nerd. Hipster-friendly food buff. Amateur communicator.', 'assets/upload/whitefro/5cee3eb08ec8d.jpg', '2019-05-29 08:11:28', '$2y$10$9kFrgwNDRWOJWhRiyYRFGO9Qa0eiizHD3DwsdzydQ8wciWWiVWWKu', 0, 0, 1, 4.84429, 45.7542, '5 Rue Louis Dansard, 69007 Lyon, France', 'Lyon', ' France', 0, NULL, NULL),
(39, 'Agathe', 'MCDONALD', '1982-10-12', 2, 2, 'Tinykoal', 'Tinykoal@matcha.z4r7p1.fr', 'Troublemaker. Unapologetic writer. Alcoholaholic. Pop culture junkie. Social media lover. Lifelong music advocate. Travel practitioner. Twitter guru.', 'assets/upload/Tinykoal/5cee3f456e5e8.jpg', '2019-05-29 08:13:57', '$2y$10$JYD3ay8GUWa2RESQrjUTIe9jG22QisQoqVhq2JTFpPsaUAjEWzhKe', 0, 0, 1, 4.83758, 45.7431, '23 Rue Lortet, 69007 Lyon, France', 'Lyon', 'France', 1, NULL, NULL),
(40, 'Kendrick', 'HUMPHREY', '1978-08-12', 3, 5, 'Angrycat', 'Angrycat@matcha.z4r7p1.fr', 'Zombie expert. Freelance food fanatic. Amateur web maven. Bacon aficionado. Passionate explorer. Proud gamer. Typical analyst.', 'assets/upload/Angrycat/5cee3f469ffa9.jpg', '2019-05-29 08:13:59', '$2y$10$ZjQwXwIjlD9EuRMvAKgyIuy3/5e5pfRLsyQjimmFj2lJo8eq/86y2', 0, 0, 1, 4.76023, 45.7424, '15 Rue de la Doulline, 69340 Francheville, France', 'Francheville', 'France', 1, NULL, NULL),
(41, 'Andrea', 'MCDONALD', '2000-07-20', 3, 2, 'Lazypand', 'Lazypand@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/Lazypand/5cee3f478445d.jpg', '2019-05-29 08:13:59', '$2y$10$261W1dX9maDZ0QPJvisH.OKSXEKapdSignUvSjiHkb0sCpDO/2Fxq', 0, 0, 1, 4.787, 45.7011, '37 Rue de l\'Égalité, 69230 Saint-Genis-Laval, France', 'Saint-Genis-Laval', 'France', 0, NULL, NULL),
(42, 'Remie', 'HENRY', '1997-09-14', 1, 4, 'Greentig', 'Greentig@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/Greentig/5cee3f486dbb6.jpg', '2019-06-03 10:47:24', '$2y$10$9KLLWiOLPNZLYp7EeagwKOjrvpZuwI11zkyVhUY4A8DaCvx7Ddl/6', 0, 0, 1, 4.62243, 45.7481, 'D50, 69670 Vaugneray, France', 'Vaugneray', 'France', 16, NULL, NULL),
(43, 'Vincent', 'LANE', '2000-08-31', 3, 5, 'Purplebe', 'Purplebe@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/Purplebe/5cee3f49cd111.jpg', '2019-05-29 08:14:02', '$2y$10$h5XlOzM0xwyItGb0fCvkgu.R0urHDZ47LYg3tTnF6PYAhlm4VwDb.', 0, 0, 1, 4.91852, 45.4026, 'Chemin du Gourray, 38150 La Chapelle-de-Surieu, France', 'La Chapelle-de-Surieu', 'France', 0, NULL, NULL),
(44, 'Teagan', 'CHASE', '1976-03-18', 2, 2, 'Bigfish4', 'Bigfish4@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/Bigfish4/5cee3f4ad5b70.jpg', '2019-05-29 08:14:03', '$2y$10$3xdHq4Rtx/rw75cxsLLq5.2uWf.iwiyqE.3w77LcxeVfIxbU2eerm', 0, 0, 1, 4.83292, 45.7358, '15 Allée Léopold Sédar Senghor, 69007 Lyon, France', 'Lyon', 'France', 0, NULL, NULL),
(45, 'Quentin', 'KEITH', '1972-11-05', 1, 3, 'Bigfrog4', 'Bigfrog4@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/Bigfrog4/5cee3f4c0a5b4.jpg', '2019-05-29 08:14:04', '$2y$10$64viyyccOF5O0rA0m0MMiukpfCVP3oAg516lazshdxzcRgG6IXYhq', 0, 0, 1, 4.71264, 45.621, '3635 Route Départementale 42, 69440 Taluyers, France', 'Taluyers', 'France', 1, NULL, NULL),
(46, 'Roméo', 'BIRD', '1991-01-14', 3, 5, 'Crazyzeb', 'Crazyzeb@matcha.z4r7p1.fr', 'Zombie expert. Freelance food fanatic. Amateur web maven. Bacon aficionado. Passionate explorer. Proud gamer. Typical analyst.', 'assets/upload/Crazyzeb/5cee3f4cdf199.jpg', '2019-05-29 08:14:05', '$2y$10$2eDIXT9UfPAoGs6QeyaFeO/r.61U8SKux3scFIcFAhw1e77Sj7lHG', 0, 0, 1, 4.61619, 45.7037, 'Châteauvieux, 69510 Yzeron, France', 'Yzeron', 'France', 0, NULL, NULL),
(47, 'Kenzie', 'VANCE', '1988-05-09', 2, 1, 'Tinyostr', 'Tinyostr@matcha.z4r7p1.fr', 'Food aficionado. Travel guru. Web scholar. Proud problem solver. Zombie advocate. Analyst. Incurable tv nerd.', 'assets/upload/Tinyostr/5cee3f4dc0348.jpg', '2019-05-29 08:14:06', '$2y$10$YaVWtppBDTvjDN782Cd86O1DpJghKNcg4Em1gmr3PCGNNMfkronea', 0, 0, 1, 4.86224, 45.759, '14 Avenue Georges Pompidou, 69003 Lyon, France', 'Lyon', 'France', 0, NULL, NULL),
(48, 'Gertrude', 'JOSEPH', '1992-03-06', 2, 2, 'Silverli', 'Silverli@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/Silverli/5cee3f4e82ab8.jpg', '2019-05-29 08:14:06', '$2y$10$zcObcyGvM.Tn2s4zI9n21ugdSHIYxyl8dNrHNsWDvY3wnOiawuUe6', 0, 0, 1, 4.85646, 45.7417, '94 Boulevard des Tchécoslovaques, 69007 Lyon, France', 'Lyon', 'France', 0, NULL, NULL),
(49, 'Sophie', 'MADDOX', '1993-09-20', 2, 3, 'Bigbutte', 'Bigbutte@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/Bigbutte/5cee3f505da66.jpg', '2019-05-29 08:14:08', '$2y$10$nGE2x1QLknFS8esu6/Ss3.JoqaVaRZHsM0nAtptHut98pH9Ry5pwm', 0, 0, 1, 5.02435, 45.6932, '3 Chemin de la Planta, 69720 Saint-Bonnet-de-Mure, France', 'Saint-Bonnet-de-Mure', 'France', 0, NULL, NULL),
(50, 'Didier', 'SOTO', '1986-04-06', 1, 3, 'Blackele', 'Blackele@matcha.z4r7p1.fr', 'Amateur beer guru. Certified pop culture practitioner. Evil music advocate. Food enthusiast.', 'assets/upload/Blackele/5cee3f515b928.jpg', '2019-05-29 08:14:09', '$2y$10$WY9as7hZhtaTa/VG2CauI.SwtdXCnbV8x4Hc3O7gvR/P8fZh1G40.', 0, 0, 1, 5.37368, 46.0229, '13 Chemin du Pré des Granges, 01640 Saint-Jean-le-Vieux, France', 'Saint-Jean-le-Vieux', 'France', 1, NULL, NULL),
(51, 'Juliette', 'MOSES', '1990-09-08', 3, 3, 'Yellowze', 'Yellowze@matcha.z4r7p1.fr', 'Total explorer. Student. Alcoholaholic. Incurable coffee buff. Passionate tv enthusiast. Thinker.', 'assets/upload/Yellowze/5cee3f6001c0a.jpg', '2019-05-29 08:14:24', '$2y$10$CWi7X22gLDaeD.zospRbheF4YDj.qR9P3SG3ffbs5rzYBKkzhPuU2', 0, 0, 1, 3.97892, 46.3662, 'Les Prés, 03130 Luneau, France', 'Luneau', 'France', 0, NULL, NULL),
(52, 'Shayna', 'FERNANDEZ', '1989-03-15', 2, 2, 'Purpleca', 'Purpleca@matcha.z4r7p1.fr', 'Travel scholar. Avid pop culture enthusiast. Falls down a lot. Unapologetic student. Communicator.', 'assets/upload/Purpleca/5cee3f6171215.jpg', '2019-05-29 08:14:25', '$2y$10$UARaP/zomTOsAv37MRbrEe9Zr5kHjFK9R.oTx42wNc.NJS/yAiary', 0, 0, 1, 4.66733, 45.5123, 'Rigodon, 69420 Longes, France', 'Longes', 'France', 0, NULL, NULL),
(53, 'Romaine', 'WINTERS', '1982-09-05', 2, 5, 'Angrysna', 'Angrysna@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/Angrysna/5cee3f6318545.jpg', '2019-05-29 08:14:27', '$2y$10$kY1xy0WaWyXx8KPSwBVwj.NrxKh8yebjNrtcPKzwvWBotG04C9WSO', 0, 0, 1, 4.1068, 45.2202, 'Unnamed Road, 43200 Saint-Maurice-de-Lignon, France', 'Saint-Maurice-de-Lignon', 'France', 0, NULL, NULL),
(54, 'Valentina', 'HOBBS', '1987-03-20', 3, 4, 'Yellowfi', 'Yellowfi@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/Yellowfi/5cee3f66af680.jpg', '2019-05-29 08:14:31', '$2y$10$zsk5WQoSC4AgnJ.P1Ngggu9brTiWs5rlEdLSaqzE3n6w7NeyBKuoq', 0, 0, 1, 4.83828, 45.7671, '5 Quai Jean Moulin, 69001 Lyon, France', 'Lyon', 'France', 0, NULL, NULL),
(55, 'Quentin', 'ZAMORA', '1988-05-14', 1, 5, 'Lazykoal', 'Lazykoal@matcha.z4r7p1.fr', 'Troublemaker. Music lover. Internet fan. Evil reader. Alcohol fanatic. Coffee practitioner. Bacon trailblazer.', 'assets/upload/Lazykoal/5cee3f6763284.jpg', '2019-05-29 08:14:31', '$2y$10$/oWD3CPuhOFkfvXktSOQ/e13/mnIfWndNahE3n5mpDZMAiOxwFs16', 0, 0, 1, 4.77355, 45.6232, '904 Chemin des Charmes, 69390 Millery, France', 'Millery', 'France', 0, NULL, NULL),
(56, 'Valentin', 'NUNEZ', '1997-07-24', 1, 2, 'Heavysna', 'Heavysna@matcha.z4r7p1.fr', 'Hardcore travel geek. Lifelong problem solver. Internet junkie. Creator. Thinker. Certified explorer.', 'assets/upload/Heavysna/5cee3f688326c.jpg', '2019-05-29 08:14:32', '$2y$10$x/4R6eAxhS8teIj0YF3vGOd1nDtclb1CIiNfD/VxO53ObC2.TXK/y', 0, 0, 1, 4.9833, 46.5398, '2184 Route de Pont de Vaux, 71290 Préty, France', 'Préty', 'France', 1, NULL, NULL),
(57, 'Khalil', 'MAHONEY', '1978-08-13', 3, 3, 'Orangela', 'Orangela@matcha.z4r7p1.fr', 'Introvert. Prone to fits of apathy. Unable to type with boxing gloves on. Proud bacon aficionado. Alcohol buff. Social media junkie.', 'assets/upload/Orangela/5cee3f697bce3.jpg', '2019-05-29 08:14:33', '$2y$10$44DjLr567bsCez9uRco4TOpchU6QuRA9zYRpJta6RMrKqYIy.bLOS', 0, 0, 1, 5.72826, 45.4334, '290 Chemin de Moulin Cornier, 38380 Miribel-les-Échelles, France', 'Miribel-les-Échelles', 'France', 0, NULL, NULL),
(58, 'Amandine', 'GRAY', '1973-01-14', 2, 2, 'Blackgoo', 'Blackgoo@matcha.z4r7p1.fr', 'Zombie expert. Freelance food fanatic. Amateur web maven. Bacon aficionado. Passionate explorer. Proud gamer. Typical analyst.', 'assets/upload/Blackgoo/5cee3f6a3a7b4.jpg', '2019-05-29 08:14:34', '$2y$10$20s1GyantbXD4ZRMc/JIwewSoTV1S6k4nru84oZTYVoVgOAThBF6.', 0, 0, 1, 6.06385, 45.7156, 'Unnamed Road, 73340 Arith, France', 'Arith', 'France', 0, NULL, NULL),
(59, 'Nathalie', 'GROSS', '1992-02-25', 2, 2, 'Blackduc', 'Blackduc@matcha.z4r7p1.fr', 'Entrepreneur. Troublemaker. Social media practitioner. Subtly charming twitter geek. Proud beer enthusiast. Bacon ninja. Web fan. Typical reader.', 'assets/upload/Blackduc/5cee3f6b53a0f.jpg', '2019-05-29 08:14:35', '$2y$10$Y55VRATQkjCFQqAsSFBjAOP1LYnDUy607xHIh18AjZYmlvJNPjcYq', 0, 0, 1, 5.16258, 45.3852, '515 Chemin de l\'Étang, 38260 Faramans, France', 'Faramans', 'France', 0, NULL, NULL),
(60, 'Rodney', 'BLEVINS', '1993-07-01', 1, 5, 'Happygoo', 'Happygoo@matcha.z4r7p1.fr', 'Music fanatic. Evil alcohol scholar. Lifelong communicator. Devoted beer practitioner. Tv lover.', 'assets/upload/Happygoo/5cee3f6c51525.jpg', '2019-05-29 08:14:36', '$2y$10$k/HFao2//DzHjyIZomGNaO/t7Z2bnz00d3kBgdUpsILqT2q7CHyGS', 0, 0, 1, 4.82571, 45.7583, '27 Rue du Doyenné, 69005 Lyon, France', 'Lyon', 'France', 1, NULL, NULL),
(61, 'Floryne', 'TOURRET', '2001-05-30', 3, 4, 'floryne', 'ftourret@student.le-101.fr', 'A work of art is one of mystery, the one extreme magic; everything else is either arithmetic or biology.', 'assets/upload/floryne/f9b348115542138a.jpg', '2019-05-30 15:51:17', '$2y$10$eppYfbrDdr6TloGBrjAPWeqJB9KjMo0QRZxn/PEGRWWKVuUg6hNG6', 0, 1, 1, 4.81414, 45.7363, '50 Quai Rambaud, 69002 Lyon, France', 'Lyon', 'France', 1, NULL, NULL),
(62, 'Roméo', 'LEBG', '2001-05-30', 2, 1, 'xx_dark_s@suké_xx', 'catfactory974@gmail.com', 'A mystery is the most stimulating force in unleashing the imagination.', 'assets/upload/xx_dark_s@suké_xx/1fe0cb9b7ca9d059.jpg', '2019-05-30 17:01:06', '$2y$10$lPAWvM30BHfgWeTRamzAbeu8MZPY1r9igGYvKZ0wyPNsF32QmtACa', 0, 1, 1, 4.81739, 45.7392, '22 Passage Panama, 69002 Lyon, France', 'Lyon', 'France', 16, NULL, NULL);

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
(2, 40),
(2, 18);

-- --------------------------------------------------------

--
-- Structure de la table `user_discussion`
--

CREATE TABLE `user_discussion` (
  `discussion_id` int(11) NOT NULL,
  `first_user_id` int(11) NOT NULL,
  `second_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_discussion`
--

INSERT INTO `user_discussion` (`discussion_id`, `first_user_id`, `second_user_id`) VALUES
(2, 2, 4),
(3, 2, 1),
(4, 42, 2),
(5, 2, 1);

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
(1, 2),
(62, 4),
(4, 62),
(2, 42),
(42, 2),
(2, 1);

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
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(42, 5),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(43, 5),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(45, 5),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 5),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(49, 5),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(50, 5),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(51, 5),
(52, 1),
(52, 2),
(52, 3),
(52, 4),
(52, 5),
(53, 1),
(53, 2),
(53, 3),
(53, 4),
(53, 5),
(54, 1),
(54, 2),
(54, 3),
(54, 4),
(54, 5),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(55, 5),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(56, 5),
(57, 1),
(57, 2),
(57, 3),
(57, 4),
(57, 5),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 5),
(59, 1),
(59, 2),
(59, 3),
(59, 4),
(59, 5),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(60, 5),
(4, 3),
(4, 4),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(61, 1),
(2, 1),
(2, 3),
(2, 7),
(62, 3),
(62, 15),
(62, 16);

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
(2, 1, '2019-06-03 12:47:56'),
(2, 12, '2019-05-29 08:31:35'),
(2, 4, '2019-05-29 10:47:00'),
(2, 16, '2019-05-30 17:08:38'),
(2, 32, '2019-05-29 13:33:03'),
(2, 33, '2019-05-29 08:29:44'),
(2, 35, '2019-05-29 08:29:47'),
(2, 36, '2019-05-29 08:29:50'),
(2, 42, '2019-06-03 10:46:50'),
(2, 45, '2019-05-29 08:29:56'),
(2, 50, '2019-05-29 08:30:00'),
(2, 56, '2019-05-29 08:30:13'),
(2, 60, '2019-05-29 08:30:18'),
(1, 2, '2019-05-30 15:52:18'),
(2, 21, '2019-05-29 09:26:25'),
(2, 28, '2019-05-30 14:33:54'),
(2, 39, '2019-05-29 09:26:31'),
(2, 23, '2019-05-29 09:26:34'),
(2, 9, '2019-05-29 09:26:39'),
(2, 3, '2019-05-29 09:26:49'),
(2, 40, '2019-05-29 09:29:27'),
(2, 18, '2019-05-29 10:49:05'),
(1, 21, '2019-05-30 13:27:48'),
(1, 4, '2019-05-30 13:28:24'),
(2, 61, '2019-05-30 15:28:22'),
(2, 24, '2019-05-30 14:33:50'),
(62, 4, '2019-05-30 17:01:05'),
(4, 62, '2019-05-30 17:01:22'),
(42, 2, '2019-06-03 10:47:15');

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
-- Index pour la table `user_discussion`
--
ALTER TABLE `user_discussion`
  ADD PRIMARY KEY (`discussion_id`);

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
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `user_discussion`
--
ALTER TABLE `user_discussion`
  MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
