-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  lun. 20 mai 2019 à 16:51
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
(60, 'assets/upload/ftourret/50bf7da5c6a6757e.jpg', 2, '2019-05-06 16:00:35'),
(66, 'assets/upload/ftourret/35457773a72738fb.jpg', 2, '2019-05-06 17:34:19'),
(69, 'assets/upload/ftourret/b68f8619bf42d8d4.jpg', 2, '2019-05-06 17:35:02'),
(70, 'assets/upload/ftourret/e2abf9ca230973a2.jpg', 2, '2019-05-06 18:13:50'),
(72, 'assets/upload/lettoh/713fe1ab9f5022ca.jpg', 1, '2019-05-07 12:17:02'),
(73, 'assets/upload/lettoh/169b8e0fff618716.jpg', 1, '2019-05-07 12:25:53'),
(74, 'assets/upload/ftourret/2b92d90ae89e50f9.jpg', 2, '2019-05-15 14:53:28');

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
(2, 'Code');

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
  `token` varchar(255) DEFAULT NULL,
  `token_expiration` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_birthdate`, `user_gender_id`, `user_orientation_id`, `login`, `email`, `biography`, `path_profile_picture`, `last_connexion`, `password`, `admin`, `notif`, `enabled`, `token`, `token_expiration`) VALUES
(1, 'Frédéric', 'LEONARD', '1997-08-12', 1, 5, 'lettoh', 'lettoh08@gmail.com', 'Je suis Fred. Je ne suis pas non binaire. Entièrement Homme. Avec un pénis quoi.', 'assets/upload/lettoh/713fe1ab9f5022ca.jpg', '2019-05-14 12:58:05', '$2y$10$N9eet7EhGZfqNr5ZNb5k9eVy4BXIuxmcVP/4xD5NFUsv/pL.JABjS', 1, 1, 1, NULL, NULL),
(2, 'Floryne', 'TOURRET', '1998-12-04', 2, 1, 'ftourret', 'floryne.tourret@gmail.com', '', 'assets/upload/ftourret/b68f8619bf42d8d4.jpg', '2019-05-20 16:50:46', '$2y$10$iBDaoi5JQ7QKIIqLi.DWve3Qp6cAyx5PuUxGmoclQqhPl3rZ6MxsC', 1, 1, 1, NULL, NULL),
(3, 'Frédéric', 'LEONARD', '1997-08-12', 3, 4, 'lettard', 'frederic.leonard.pro@gmail.com', NULL, NULL, '2019-05-14 12:52:35', '$2y$10$LL173fJwQAKDxyx//q15BukDGX//c4x0Kzo4pkHYYZY0njcSNSwCS', 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_blacklist`
--

CREATE TABLE `user_blacklist` (
  `id_user_blacklist` int(11) NOT NULL,
  `id_user_blacklisted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_likes`
--

CREATE TABLE `user_likes` (
  `id_user_like` int(11) NOT NULL,
  `is_user_liked` int(11) NOT NULL
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
(2, 7);

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
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
