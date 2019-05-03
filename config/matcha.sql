-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  ven. 03 mai 2019 à 16:25
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
  `id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genders`
--

INSERT INTO `genders` (`id`, `genre`) VALUES
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
  `picture_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `picture_desc` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `picture_user_id` int(11) NOT NULL,
  `picture_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_gender_id` int(11) NOT NULL DEFAULT '3',
  `user_orientation_id` int(11) NOT NULL DEFAULT '4',
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `path_profile_picture` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_gender_id`, `user_orientation_id`, `login`, `email`, `biography`, `path_profile_picture`, `password`, `admin`, `notif`, `enabled`, `token`, `token_expiration`) VALUES
(1, 'Frédéric', 'LEONARD', 1, 5, 'lettoh', 'lettoh08@gmail.com', 'Je suis Fred. Je ne suis pas non binaire. Entièrement Homme. Avec un pénis quoi.', 'assets/upload/lettoh/569251fb93daa59f.jpg', '$2y$10$N9eet7EhGZfqNr5ZNb5k9eVy4BXIuxmcVP/4xD5NFUsv/pL.JABjS', 1, 1, 1, NULL, NULL),
(2, 'Floryne', 'TOURRET', 2, 4, 'ftourret', 'floryne.tourret@gmail.com', NULL, 'assets/upload/ftourret/47c54b7051dc1ddd.jpg', '$2y$10$iBDaoi5JQ7QKIIqLi.DWve3Qp6cAyx5PuUxGmoclQqhPl3rZ6MxsC', 1, 1, 1, NULL, NULL),
(3, 'Frédéric', 'LEONARD', 3, 4, 'lettard', 'frederic.leonard.pro@gmail.com', NULL, NULL, '$2y$10$LL173fJwQAKDxyx//q15BukDGX//c4x0Kzo4pkHYYZY0njcSNSwCS', 0, 1, 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orientations`
--
ALTER TABLE `orientations`
  MODIFY `orientation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
