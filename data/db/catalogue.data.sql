-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 30 oct. 2020 à 16:44
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catalogue`
--

--
-- Déchargement des données de la table `category`
--

INSERT INTO `catalog.category` (`id_category`, `name_category`, `desc_category`) VALUES
(1, 'acoustic', NULL),
(2, 'electro acoustic', NULL),
(3, 'folk', NULL),
(4, 'ukulele', NULL),
(6, 'electric', NULL);

--
-- Déchargement des données de la table `shop`
--

INSERT INTO `catalog.shop` (`id_shop`, `name_shop`, `localisation_shop`, `ville_shop`, `desc_shop`) VALUES
(1, 'Magasin 01', '50.8509228,4.3504093', 'Brussels', 'Rue de la Vierge Noire, 1000 Brussels, Belgium'),
(2, 'Magasin 02', '50.82500633807064,4.306120664746107', 'Brussels', 'Quai de Biestebroeck, 1070 Anderlecht, Belgium'),
(3, 'Magasin 03', '50.90484876883606,4.338049680859388', 'Grimbergen', 'Treft 62, 1853 Grimbergen, Belgium'),
(4, 'Magasin 04', '50.82824487953772,4.4152973004882945', 'Brussels', 'Drève de Nivelles 72, 1160 Auderghem, Belgium'),
(5, 'Magasin 05', '51.21835101078604,4.411520750195326', 'Antwerp', 'Meir 105, 2000 Antwerp, Belgium'),
(6, 'Magasin 06', '51.178005872414154,4.3946979352539195', 'Antwerp', 'Pastoor De Conincklaan 54, 2610 Wilrijk, Belgium'),
(7, 'Magasin 07', '50.463242209583036,4.855780393750013', 'Namur', 'Rue Bosret 23, 5000 Namur, Belgium'),
(8, 'Magasin 08', '50.64318791498003,5.589804441601576', 'Liege', 'Rue de la Forêt 63, 4670 Blegny, Belgium'),
(9, 'Magasin 09', '50.628918004180214,5.569548399121107', 'Liege', 'Carrefour, N671A, 4000 Liège, Belgium');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `catalog.user` (`id_user`, `name_user`, `password_user`, `key_user`) VALUES
(1, 'McDibou', '$2y$10$iGRNnkJvw.APx.Q3INMgoOFUKgqk.HjPhGlduAt3QvkO3z/w3V0qW', '7f76997b1a2f5d5d5a6439430d7f6fdd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
