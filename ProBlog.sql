-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 06 Décembre 2018 à 17:01
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ProBlog`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Contenu de la table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `password`, `email`) VALUES
(1, 'azerty', '$2y$10$GJTv9oMRF3gbAwhBlxm9rOVBn.sAdAxXO2adSM/XFKCQNWM3OQ27i', '');

-- --------------------------------------------------------

--
-- Structure de la table `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `topic_sentence` text COLLATE utf32_unicode_ci NOT NULL,
  `content` text COLLATE utf32_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Contenu de la table `blogposts`
--

INSERT INTO `blogposts` (`id`, `title`, `topic_sentence`, `content`, `author`, `update_time`) VALUES
(1, 'Le cheminot repenti', 'Une histoire imaginaire', 'Curabitur vitae magna id nunc viverra facilisis. Aenean ante neque, scelerisque non erat vel, lobortis porta lectus. Maecenas non viverra ipsum. Nullam nec mi neque. Proin et nulla quis quam molestie ultricies. Integer pellentesque, metus in facilisis blandit, ipsum tortor pulvinar lacus, vel finibus tellus sem lobortis turpis. Nulla malesuada dui neque, eget auctor tellus placerat sed. Aliquam erat volutpat. Integer at felis ex. Curabitur tincidunt, augue sed vehicula suscipit, lorem felis ornare dui, et dignissim nisl dolor id nibh. Cras nibh dolor, sodales eu tortor in, ultricies fermentum ex.\\r\\n\\r\\nDonec lacus elit, malesuada nec quam non, ornare dignissim lacus. Donec at risus augue. Donec ut leo ac augue ultrices lobortis at ac dui. Ut tincidunt varius nisl. Maecenas ac eros id ex tempor varius. Phasellus sed fermentum urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dictum a ante a posuere. Aliquam rutrum nisl a dolor porta, a pharetra dui feugiat. Pellentesque sed felis non metus iaculis cursus nec eget enim. Donec eget felis quis elit egestas malesuada. Morbi dignissim, mauris eu rutrum tempus, odio lectus porttitor quam, efficitur mollis ipsum mauris sit amet eros.\\r\\n\\r\\nCurabitur elementum elit a ipsum varius vestibulum non accumsan nisi. In at dictum nibh. Mauris massa tortor, commodo sit amet mollis et, semper aliquam mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer mollis purus odio. Ut quis ante enim. Vivamus fringilla, tellus vitae interdum eleifend, est nisl feugiat eros, vitae ultricies nunc libero eu purus. Nulla facilisi. Sed vehicula mollis elit, eget lacinia ex interdum at. Duis at erat viverra, fringilla justo at, tincidunt risus. Aliquam euismod a arcu eu tincidunt.', 'dark_thinker', '2018-12-04 12:15:33'),
(2, 'Le temple latin', 'l\'origine du language', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam et elit sit amet ante volutpat vehicula. Aenean convallis malesuada ante, nec porttitor nisl interdum a. Quisque sed diam sit amet neque vulputate convallis. Donec venenatis mauris in orci molestie tincidunt. Sed imperdiet justo metus, vel vulputate eros mattis eu. Sed ultrices pharetra ultrices. Donec eu metus mi. Aliquam nec congue massa. Etiam gravida justo nec mi venenatis, non euismod mauris mattis. Duis eu felis sit amet libero imperdiet dignissim. Nulla facilisi. Phasellus rhoncus massa laoreet, pharetra ipsum eget, efficitur tellus. Curabitur blandit convallis nisi at lacinia. Curabitur suscipit sapien sed vehicula luctus. Quisque id libero vitae enim tincidunt pharetra.\\r\\n\\r\\nQuisque egestas odio dolor, non dapibus nibh blandit nec. Vestibulum fringilla enim sit amet magna pulvinar, nec tempus urna vestibulum. Nam neque lacus, auctor vitae venenatis sed, finibus ut mi. Vivamus sollicitudin metus eget odio pharetra, vitae lacinia neque mollis. Cras quis risus id turpis volutpat imperdiet. Cras rutrum odio consectetur molestie fringilla. Maecenas suscipit ex tincidunt nunc porta sodales. Curabitur at volutpat sapien. Aenean in cursus quam.', 'takalis', '2018-12-04 12:17:07');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `content` text COLLATE utf32_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `blog_post_id`, `content`, `author`, `insert_date`) VALUES
(1, 2, ':)', 'lucie', '2018-12-04 16:35:25');

-- --------------------------------------------------------

--
-- Structure de la table `pending_comments`
--

CREATE TABLE `pending_comments` (
  `id` int(11) NOT NULL,
  `blogpost_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `insertion_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pending_comments`
--
ALTER TABLE `pending_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `pending_comments`
--
ALTER TABLE `pending_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
