-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 19 Juin 2017 à 17:44
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  5.6.30-11+deb.sury.org~xenial+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `itps`
--

-- --------------------------------------------------------

--
-- Structure de la table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `bank`
--

INSERT INTO `bank` (`id`, `name`, `phone`, `address`, `mail`) VALUES
(1, 'ATTIJARI BANK', '70640626', 'Jendouba', 'courrier@attijaribank.com.tn'),
(2, 'STB', '78603026', 'Jendouba', 'SECAG.JENDOUBA@STB.COM.TN'),
(3, 'NH', '78000000', 'Jendouba', 'banquehabitat@bh.fin.tn');

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Alfa romeo'),
(2, 'Alpine'),
(3, 'Audi'),
(4, 'BMW'),
(5, 'Chevrolet'),
(6, 'Chrysler'),
(7, 'Citroen'),
(8, 'Fiat'),
(9, 'Ford'),
(10, 'Honda'),
(11, 'Hyundai'),
(12, 'Infiniti'),
(13, 'Jaguar'),
(14, 'Jeep'),
(15, 'Lancia'),
(16, 'Land Rover'),
(17, 'Lexus'),
(18, 'Lotus'),
(19, 'Mazda'),
(20, 'Mercedes'),
(21, 'Mini'),
(22, 'Mitsubishi'),
(23, 'Nissan'),
(24, 'Opel'),
(25, 'peugeot'),
(26, 'Porsche'),
(27, 'Renault'),
(28, 'Seat'),
(29, 'Subaru'),
(30, 'Suzuki'),
(31, 'Toyota'),
(32, 'Volkswagen'),
(33, 'Volvo'),
(34, 'MAN'),
(35, 'SCANIA'),
(36, 'MAZ'),
(37, 'Isuzu'),
(38, 'Iveco'),
(39, 'Astra');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `mail`, `address`) VALUES
(1, 'CRDA Jendouba', '78000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clocking`
--

CREATE TABLE `clocking` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `construction_site_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `construction_site`
--

CREATE TABLE `construction_site` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` double DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `construction_site`
--

INSERT INTO `construction_site` (`id`, `client_id`, `name`, `duration`, `startDate`, `endDate`, `city`, `address`, `budget`, `type`, `status`) VALUES
(1, 1, 'Bou argoub', 36, '2012-01-01', '2017-01-01', 'Jendouba', 'test', 74458805, 'test', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `employment_contract`
--

CREATE TABLE `employment_contract` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `signature_date` datetime DEFAULT NULL,
  `salary` double NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `employment_contract`
--

INSERT INTO `employment_contract` (`id`, `personal_id`, `type`, `startDate`, `end_date`, `signature_date`, `salary`, `function_id`) VALUES
(1, 1, 'CDI', '2017-08-12', '2018-08-12', '2017-06-19 00:00:00', 500, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employment_function`
--

CREATE TABLE `employment_function` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `employment_function`
--

INSERT INTO `employment_function` (`id`, `name`) VALUES
(1, 'Ingénieur'),
(2, 'Chauffeur');

-- --------------------------------------------------------

--
-- Structure de la table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `family_id` int(11) DEFAULT NULL,
  `sub_family_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registration_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_circulation` date NOT NULL,
  `number_of_places` int(11) NOT NULL,
  `bodywork` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `energy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fiscal_power` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grey_carte` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `family`
--

INSERT INTO `family` (`id`, `name`) VALUES
(4, 'Camion'),
(1, 'Citerne'),
(5, 'Engins'),
(3, 'Remorque'),
(2, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'seriya', 'seriya', 'seriya@itps.tn', 'seriya@itps.tn', 1, NULL, '$2y$13$tdEyVtXwtjNIm7/bcRLFceAGRtEHazb7re2H26njtsJwODarAY/Iu', '2017-06-19 12:03:06', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}');

-- --------------------------------------------------------

--
-- Structure de la table `insurance_company`
--

CREATE TABLE `insurance_company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `insurance_company`
--

INSERT INTO `insurance_company` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Selim Assurances', 'Beja', '71184200'),
(2, 'Loyed', '11, Rue Sakiet Sidi Youssef Jendouba 8100', '78606950'),
(3, 'AMI', '7, Rue Mohamed Ali Jendouba 8100', '78604340'),
(4, 'Star', '17 Rue Rbiaa - App. N° : 102 1er étage 8100 Jendouba', '78612100');

-- --------------------------------------------------------

--
-- Structure de la table `kiosk`
--

CREATE TABLE `kiosk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `kiosk`
--

INSERT INTO `kiosk` (`id`, `name`, `address`) VALUES
(1, 'SNDP', 'Av. Moh. ali akid charguia tunis'),
(2, 'AGIL', 'Jendouba');

-- --------------------------------------------------------

--
-- Structure de la table `leasing`
--

CREATE TABLE `leasing` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `leasing`
--

INSERT INTO `leasing` (`id`, `name`) VALUES
(1, 'UBCI'),
(2, 'Hanabal'),
(3, 'Attijari');

-- --------------------------------------------------------

--
-- Structure de la table `materials_of_construction`
--

CREATE TABLE `materials_of_construction` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mechanic`
--

CREATE TABLE `mechanic` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `mechanic`
--

INSERT INTO `mechanic` (`id`, `firstname`, `lastname`, `phone`, `address`) VALUES
(1, 'CHBICHIB', 'Moussa', NULL, 'Jendouba'),
(2, 'NAWARI', 'Mondher', NULL, 'Jendouba');

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `taxe` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `order_line`
--

INSERT INTO `order_line` (`id`, `quantity`, `taxe`, `label`, `purchase_order_id`, `product_id`) VALUES
(9, 545, '545454444', '44444', 8, 1),
(10, 5, '44', 'test', 8, 1),
(11, 66, '6565656565', '65656565', 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `partner_category`
--

CREATE TABLE `partner_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `partner_category`
--

INSERT INTO `partner_category` (`id`, `name`) VALUES
(1, 'Fournisseurs matériels Pieces mécaniques'),
(2, 'Fournisseurs materiels Bureau'),
(3, 'Labo d\'analyses'),
(4, 'Fournisseurs Matériaux'),
(5, 'Fournisseurs matériels Chantier');

-- --------------------------------------------------------

--
-- Structure de la table `partner_type`
--

CREATE TABLE `partner_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `martial_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driving_license` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_temporary` tinyint(1) NOT NULL,
  `workplace_id` int(11) DEFAULT NULL,
  `daily_rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `personal`
--

INSERT INTO `personal` (`id`, `firstname`, `lastname`, `birthdate`, `phone`, `mobile`, `mail`, `address`, `martial_status`, `driving_license`, `is_temporary`, `workplace_id`, `daily_rate`) VALUES
(1, 'Youcef', 'test', NULL, '0600000001', '0600000001', NULL, 'test', 'Célibataire', 'aucun', 0, NULL, NULL),
(2, 'Seriya', 'test', NULL, '0600000001', '0600000001', NULL, 'test', 'Célibataire', 'aucun', 0, NULL, NULL),
(3, 'test', 'test', NULL, '0600000001', '0600000001', NULL, 'test', 'Célibataire', 'aucun', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `category`, `type`, `price`, `quantity`, `name`) VALUES
(1, 'Fourniture bureau', 'Type 1 (Kg)', 5445, 54, 'fjytuytuyuy');

-- --------------------------------------------------------

--
-- Structure de la table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_min` double DEFAULT NULL,
  `price_max` double DEFAULT NULL,
  `unitOfMeasurement` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `price_min`, `price_max`, `unitOfMeasurement`) VALUES
(1, 'Type 1', 10, 100, 'Kg');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `reference` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliverydate` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `currence` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `reference`, `deliverydate`, `location`, `status`, `buyer_id`, `currence`, `supplier_id`, `project_id`) VALUES
(8, 'jggjh', '2012-01-01 00:00:00', 'Chantier', 'Demandé', 1, 'tnd', 1, NULL),
(9, 'fgfghhhfgg', '2012-01-01 00:00:00', 'ffgfgh', 'fffghfg', 1, 'tnd', 1, NULL),
(10, '77887878', '2017-06-19 00:00:00', 'Chantier', 'Demandé', 1, 'tnd', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`id`, `name`, `address`) VALUES
(1, 'Bureau', 'bureau'),
(2, 'Lotissement', 'Lotissement');

-- --------------------------------------------------------

--
-- Structure de la table `sub_family`
--

CREATE TABLE `sub_family` (
  `id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sub_family`
--

INSERT INTO `sub_family` (`id`, `family_id`, `name`) VALUES
(1, 1, 'Tracteur Tourisme'),
(2, 3, 'Tracteur Agricol'),
(3, 3, 'Camions'),
(4, 4, 'lourd'),
(5, 4, 'Poids loud'),
(6, 4, 'Tourisme'),
(7, 5, 'Pneumati-que(Tourisme)'),
(8, 5, 'Compacteur'),
(9, 5, 'Sur-chenille'),
(10, 1, 'Camions'),
(11, 2, 'Voiture personnel'),
(12, 2, 'Voiture de fonction'),
(13, 5, 'Surshenile');

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siret_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tva_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone`, `mail`, `contactName`, `type`, `category`, `city`, `fax`, `siret_number`, `tva_number`) VALUES
(1, 'PIMA (Pieces Industrielles et Matériels Agricole)', 'Route de Naassen- EL Mourouj VI- 1135 Naassen', '79307879', NULL, NULL, 'Société', 'Fournisseurs matériels Pieces mécaniques', 'Ben Arous', NULL, '46015F/A/M/000', '46015F/A/M/000'),
(2, 'MATECH', 'Route de Sousse- Mégrine Riadh- 2014 TUNIS', '71493000', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Tunis', NULL, NULL, NULL),
(3, 'SYMAC', 'ZI Route Ain Drahem Jendouba 8100', '78610455', NULL, NULL, 'Société', 'Fournisseurs Matériaux', 'Jendouba', NULL, NULL, NULL),
(4, 'SOCABS', '24 av. Farhat Hached 9000 Béja', '78440624', NULL, NULL, 'Société', 'Fournisseurs Matériaux', 'Beja', NULL, NULL, NULL),
(5, 'PPM', 'Route de Raoued 2083-Ariana', '70685425', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Ariana', NULL, NULL, NULL),
(6, 'SOTUDIS', 'Parc Industriel de Ben Arous BP 211- 2013 Ben Arous', '71384000', NULL, NULL, 'Société', 'Fournisseurs matériels Pieces mécaniques', 'Ben Arous', NULL, NULL, NULL),
(7, 'SOCOMET', '8012 Fondek Jedid', '72399444', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Nabeul', NULL, NULL, NULL),
(8, 'COGEMHY', '3 Rue Om Khalthoum- Tunis', '71338377', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Tunis', NULL, NULL, NULL),
(9, 'COMAF', '33 Av de l\'Environement Borj Louzir 2080 Ariana', '71690123', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Ariana', NULL, NULL, NULL),
(10, 'SRPS', '45 Rue Ali Darghouth 1001 Tunis', '71353797', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Tunis', NULL, NULL, NULL),
(11, 'F2C', '63 Rue 18 Janvier 1001-Tunis', '71255016', NULL, NULL, 'Société', 'Fournisseurs matériels Chantier', 'Tunis', NULL, NULL, NULL),
(12, 'STTP', 'Rue Ali Darghouth Tunis 1001', '71252836', NULL, NULL, 'Société', 'Fournisseurs matériels Pieces mécaniques', 'Tunis', NULL, '1074079 N/A/M/000', '1074079 N/A/M/000');

-- --------------------------------------------------------

--
-- Structure de la table `type_of_construction_materials`
--

CREATE TABLE `type_of_construction_materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_min` double DEFAULT NULL,
  `price_max` double DEFAULT NULL,
  `unitOfMeasurement` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `workplace`
--

CREATE TABLE `workplace` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `workplace`
--

INSERT INTO `workplace` (`id`, `name`) VALUES
(1, 'Bureau'),
(2, 'Lotissement'),
(3, 'Chantier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clocking`
--
ALTER TABLE `clocking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D3E9DCCD5D430949` (`personal_id`),
  ADD KEY `IDX_D3E9DCCD64D218E` (`location_id`),
  ADD KEY `IDX_D3E9DCCD4994A532` (`construction_site_id`);

--
-- Index pour la table `construction_site`
--
ALTER TABLE `construction_site`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BF4E61B419EB6921` (`client_id`);

--
-- Index pour la table `employment_contract`
--
ALTER TABLE `employment_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_165EC3665D430949` (`personal_id`),
  ADD KEY `IDX_165EC36667048801` (`function_id`);

--
-- Index pour la table `employment_function`
--
ALTER TABLE `employment_function`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D338D583C35E566A` (`family_id`),
  ADD KEY `IDX_D338D583D15310D4` (`sub_family_id`),
  ADD KEY `IDX_D338D58344F5D008` (`brand_id`),
  ADD KEY `IDX_D338D5837975B7E7` (`model_id`);

--
-- Index pour la table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A5E6215B5E237E06` (`name`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `insurance_company`
--
ALTER TABLE `insurance_company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kiosk`
--
ALTER TABLE `kiosk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `leasing`
--
ALTER TABLE `leasing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materials_of_construction`
--
ALTER TABLE `materials_of_construction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E0F4D1166D1F9C` (`project_id`),
  ADD KEY `IDX_E0F4D12ADD6D8C` (`supplier_id`),
  ADD KEY `IDX_E0F4D15080ECDE` (`warehouse_id`);

--
-- Index pour la table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79572D944F5D008` (`brand_id`);

--
-- Index pour la table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9CE58EE1A45D7E6A` (`purchase_order_id`),
  ADD KEY `IDX_9CE58EE14584665A` (`product_id`);

--
-- Index pour la table `partner_category`
--
ALTER TABLE `partner_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partner_type`
--
ALTER TABLE `partner_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F18A6D84AC25FB46` (`workplace_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2FB3D0EE19EB6921` (`client_id`);

--
-- Index pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_21E210B26C755722` (`buyer_id`),
  ADD KEY `IDX_21E210B22ADD6D8C` (`supplier_id`),
  ADD KEY `IDX_21E210B2166D1F9C` (`project_id`);

--
-- Index pour la table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_family`
--
ALTER TABLE `sub_family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_17B76E17C35E566A` (`family_id`);

--
-- Index pour la table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_of_construction_materials`
--
ALTER TABLE `type_of_construction_materials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `clocking`
--
ALTER TABLE `clocking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `construction_site`
--
ALTER TABLE `construction_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `employment_contract`
--
ALTER TABLE `employment_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `employment_function`
--
ALTER TABLE `employment_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `insurance_company`
--
ALTER TABLE `insurance_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `kiosk`
--
ALTER TABLE `kiosk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `leasing`
--
ALTER TABLE `leasing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `materials_of_construction`
--
ALTER TABLE `materials_of_construction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `partner_category`
--
ALTER TABLE `partner_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `partner_type`
--
ALTER TABLE `partner_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sub_family`
--
ALTER TABLE `sub_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `type_of_construction_materials`
--
ALTER TABLE `type_of_construction_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clocking`
--
ALTER TABLE `clocking`
  ADD CONSTRAINT `FK_D3E9DCCD4994A532` FOREIGN KEY (`construction_site_id`) REFERENCES `construction_site` (`id`),
  ADD CONSTRAINT `FK_D3E9DCCD5D430949` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `FK_D3E9DCCD64D218E` FOREIGN KEY (`location_id`) REFERENCES `workplace` (`id`);

--
-- Contraintes pour la table `construction_site`
--
ALTER TABLE `construction_site`
  ADD CONSTRAINT `FK_BF4E61B419EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `employment_contract`
--
ALTER TABLE `employment_contract`
  ADD CONSTRAINT `FK_165EC3665D430949` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `FK_165EC36667048801` FOREIGN KEY (`function_id`) REFERENCES `employment_function` (`id`);

--
-- Contraintes pour la table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `FK_D338D58344F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_D338D5837975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `FK_D338D583C35E566A` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`),
  ADD CONSTRAINT `FK_D338D583D15310D4` FOREIGN KEY (`sub_family_id`) REFERENCES `sub_family` (`id`);

--
-- Contraintes pour la table `materials_of_construction`
--
ALTER TABLE `materials_of_construction`
  ADD CONSTRAINT `FK_E0F4D1166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `construction_site` (`id`),
  ADD CONSTRAINT `FK_E0F4D12ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `FK_E0F4D15080ECDE` FOREIGN KEY (`warehouse_id`) REFERENCES `store` (`id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_D79572D944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `FK_9CE58EE14584665A` FOREIGN KEY (`product_id`) REFERENCES `product_type` (`id`),
  ADD CONSTRAINT `FK_9CE58EE1A45D7E6A` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_order` (`id`);

--
-- Contraintes pour la table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `FK_F18A6D84AC25FB46` FOREIGN KEY (`workplace_id`) REFERENCES `workplace` (`id`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_2FB3D0EE19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `FK_21E210B2166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `construction_site` (`id`),
  ADD CONSTRAINT `FK_21E210B22ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `FK_21E210B26C755722` FOREIGN KEY (`buyer_id`) REFERENCES `personal` (`id`);

--
-- Contraintes pour la table `sub_family`
--
ALTER TABLE `sub_family`
  ADD CONSTRAINT `FK_17B76E17C35E566A` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
