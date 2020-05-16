-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql16j15.db.hostpoint.internal
-- Generation Time: May 15, 2020 at 10:29 PM
-- Server version: 10.1.44-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escortgi_backups`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `idAddress` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `--- address —` varchar(0) NOT NULL,
  `ifGeoAuto` varchar(5) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `ifSameHome` varchar(5) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `entryCode` varchar(64) NOT NULL,
  `street` varchar(64) NOT NULL,
  `state` varchar(64) NOT NULL,
  `zipCode` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`idAddress`, `idMember`, `type`, `--- address —`, `ifGeoAuto`, `longitude`, `latitude`, `ifSameHome`, `name`, `phone`, `entryCode`, `street`, `state`, `zipCode`, `city`, `country`) VALUES
(1, 1, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(3, 1, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_abo`
--

CREATE TABLE `admin_abo` (
  `idAbo` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `ifVip` varchar(5) NOT NULL,
  `ifPartner` varchar(5) NOT NULL,
  `dateActivated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `howLong` int(11) NOT NULL,
  `--- infos ---` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_bill`
--

CREATE TABLE `admin_bill` (
  `idBill` int(11) NOT NULL,
  `ifShowAtMember` varchar(5) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `billCode` varchar(255) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateDeadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) NOT NULL,
  `payementMode` varchar(255) NOT NULL,
  `ifPayed` varchar(5) NOT NULL,
  `datePayement` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `-- services ---` varchar(0) NOT NULL,
  `typeService` varchar(255) NOT NULL,
  `descrptionServices` mediumtext NOT NULL,
  `prestation` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `ifReduction` varchar(5) NOT NULL,
  `whyReduction` varchar(255) NOT NULL,
  `valueReduction` int(11) NOT NULL,
  `paymentModality` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_promoCode`
--

CREATE TABLE `admin_promoCode` (
  `idCodePromo` int(11) NOT NULL,
  `valide` varchar(5) NOT NULL,
  `idMemberWhoHave` int(11) NOT NULL,
  `idMemberWhoBenefits` int(11) NOT NULL,
  `ifAlreadyUsed` varchar(5) NOT NULL,
  `datePromoCodeActivation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `promoCode` varchar(64) NOT NULL,
  `idCodeBenefits` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_promoCodeBenefits`
--

CREATE TABLE `admin_promoCodeBenefits` (
  `idCodeBenefits` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_promoCodeBenefits`
--

INSERT INTO `admin_promoCodeBenefits` (`idCodeBenefits`, `type`, `categories`, `value`) VALUES
(1, 'benefits1', '1', 296),
(2, 'benefits2', '2', 592),
(3, 'benefits3', '3', 888),
(4, 'benefits4', '6', 1769),
(5, 'benefits5', '12', 2896),
(6, 'welcome', '1', 296);

-- --------------------------------------------------------

--
-- Table structure for table `admin_psp`
--

CREATE TABLE `admin_psp` (
  `idSetPsp` int(11) NOT NULL,
  `productionMode` varchar(5) NOT NULL,
  `id` int(11) NOT NULL,
  `idType` varchar(64) NOT NULL,
  `--- info PSP -` varchar(0) NOT NULL,
  `pspId` varchar(255) NOT NULL,
  `shaIn` varchar(255) NOT NULL,
  `shaOut` varchar(255) NOT NULL,
  `ifUrlBack` varchar(5) NOT NULL,
  `urlOk` varchar(255) NOT NULL,
  `urlNok` varchar(255) NOT NULL,
  `urlException` varchar(255) NOT NULL,
  `urlCancel` varchar(255) NOT NULL,
  `logoFileName` varchar(255) NOT NULL,
  `urlHome` varchar(255) NOT NULL,
  `urlCatalogue` varchar(255) NOT NULL,
  `urlDynmiqueTamplate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_psp`
--

INSERT INTO `admin_psp` (`idSetPsp`, `productionMode`, `id`, `idType`, `--- info PSP -`, `pspId`, `shaIn`, `shaOut`, `ifUrlBack`, `urlOk`, `urlNok`, `urlException`, `urlCancel`, `logoFileName`, `urlHome`, `urlCatalogue`, `urlDynmiqueTamplate`) VALUES
(82, 'no', 77, 'admin', '', '', '', '', 'no', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets`
--

CREATE TABLE `admin_wallets` (
  `idWallet` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_wallets`
--

INSERT INTO `admin_wallets` (`idWallet`, `idMember`, `amount`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets_movements`
--

CREATE TABLE `admin_wallets_movements` (
  `idWalletMovment` int(11) NOT NULL,
  `idWallet` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dateMovement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `idPostBlog` int(11) NOT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `idMember` int(11) NOT NULL,
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_sourceLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_txt` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `article_imgLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_iframe` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `Parent` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` mediumtext NOT NULL,
  `fileURL` varchar(255) NOT NULL,
  `fileMimeType` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL,
  `pings` varchar(255) NOT NULL,
  `creator` int(11) NOT NULL,
  `sex` varchar(64) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `profileURL` varchar(255) NOT NULL,
  `profilePictureURL` varchar(255) NOT NULL,
  `upvoteCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments_votes`
--

CREATE TABLE `comments_votes` (
  `idCommentVote` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `idCountry` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameFr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languageCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `capitalCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currencyLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `weather` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `zonesIATA` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`idCountry`, `name`, `nameFr`, `languageCode`, `language`, `code`, `capitalCity`, `currency`, `currencyLink`, `map`, `weather`, `zonesIATA`) VALUES
(1, 'Afghanistan', 'Afghanistan', 'en', 'Dari Pachto', 'AF', 'Kaboul', '', '', '', '0', '3'),
(2, 'Albania', 'Albanie', '', '', 'AL', '', '', '', '', '', '2'),
(3, 'Algeria', 'Algerie', '', '', 'DZ', '', '', '', '', '', '2'),
(4, 'American Samoa', 'Samoa am&eacute;ricaines', '', '', 'AS', '', '', '', '', '', '3'),
(5, 'Andorra', 'Andorre', '', '', 'AD', '', '', '', '', '', '2'),
(6, 'Angola', 'Angola', '', '', 'AO', '', '', '', '', '', '2'),
(7, 'Anguilla', 'Anguilla', '', '', 'AI', '', '', '', '', '', '1'),
(8, 'Antigua and Barbuda', 'Antigua et Barbuda', '', '', '', '', '', '', '', '', ''),
(9, 'Argentina', 'Argentine', '', '', '', '', '', '', '', '', ''),
(10, 'Armenia', 'Arm&eacute;nie', '', '', '', '', '', '', '', '', ''),
(11, 'Aruba', 'Aruba', '', '', '', '', '', '', '', '', ''),
(12, 'Australia', 'Australie', 'en', '', '', '', '', '', '', '', ''),
(13, 'Austria', 'Autriche', '', '', '', '', '', '', '', '', ''),
(14, 'Azerbaijan', 'Azerba&iuml;djan', '', '', '', '', '', '', '', '', ''),
(15, 'Bahrain', 'Bahre&iuml;n', '', '', '', '', '', '', '', '', ''),
(16, 'Bangladesh', 'Bangladesh', '', '', '', '', '', '', '', '', ''),
(17, 'Barbados', 'Barbade', '', '', '', '', '', '', '', '', ''),
(18, 'Belarus', 'B&eacute;larus', '', '', '', '', '', '', '', '', ''),
(19, 'Belgium', 'Belgique', '', '', '', '', '', '', '', '', ''),
(20, 'Belize', 'Belize', '', '', '', '', '', '', '', '', ''),
(21, 'Benin', 'B&eacute;nin', '', '', '', '', '', '', '', '', ''),
(22, 'Bermuda', 'Bermudes', '', '', '', '', '', '', '', '', ''),
(23, 'Bhutan', 'Bhoutan', '', '', '', '', '', '', '', '', ''),
(24, 'Bolivia', 'Bolivie', '', '', '', '', '', '', '', '', ''),
(25, 'Bosnia and Herzegovina', 'Bosnie-Herz&eacute;govine', '', '', '', '', '', '', '', '', ''),
(26, 'Botswana', 'Botswana', '', '', '', '', '', '', '', '', ''),
(27, 'Bouvet Island', '&Icirc;le Bouvet', '', '', '', '', '', '', '', '', ''),
(28, 'Brazil', 'Br&eacute;sil', '', '', '', '', '', '', '', '', ''),
(29, 'British Indian Ocean Territory', 'Territoire britannique de l&rsquo;oc&eacute;an Indien', '', '', '', '', '', '', '', '', ''),
(30, 'British Virgin Islands', '&Icirc;les Vierges britanniques', '', '', '', '', '', '', '', '', ''),
(31, 'Brunei', 'Brun&eacute;i Darussalam', '', '', '', '', '', '', '', '', ''),
(32, 'Bulgaria', 'Bulgarie', 'bg', '', '', '', '', '', '', '', ''),
(33, 'Burkina Faso', 'Burkina Faso', '', '', '', '', '', '', '', '', ''),
(34, 'Burma', 'Birmanie', '', '', '', '', '', '', '', '', ''),
(35, 'Burundi', 'Burundi', '', '', '', '', '', '', '', '', ''),
(36, 'Cambodia', 'Cambodge', '', '', '', '', '', '', '', '', ''),
(37, 'Cameroon', 'Cameroun', '', '', '', '', '', '', '', '', ''),
(38, 'Canada', 'Canada', '', '', '', '', '', '', '', '', ''),
(39, 'Cape Verde', 'Cap-Vert', '', '', '', '', '', '', '', '', ''),
(40, 'Cayman Islands', '&Icirc;les Ca&iuml;mans', '', '', '', '', '', '', '', '', ''),
(41, 'Central African Republic', 'R&eacute;publique centrafricaine', '', '', '', '', '', '', '', '', ''),
(42, 'Chad', 'Tchad', '', '', '', '', '', '', '', '', ''),
(43, 'Chile', 'Chili', '', '', '', '', '', '', '', '', ''),
(44, 'China', 'Chine', 'zh', '', '', '', '', '', '', '', ''),
(45, 'Christmas Islands', 'Iles Christmas', '', '', '', '', '', '', '', '', ''),
(46, 'Cocos (Keeling) Islands', '&Icirc;les des Cocos', '', '', '', '', '', '', '', '', ''),
(47, 'Colombia', 'Colombie', '', '', '', '', '', '', '', '', ''),
(48, 'Comoros', 'Comores', '', '', '', '', '', '', '', '', ''),
(49, 'Cook Islands', '&Icirc;les Cook', '', '', '', '', '', '', '', '', ''),
(50, 'Costa Rica', 'Costa Rica', '', '', '', '', '', '', '', '', ''),
(51, 'Cote d\'Ivoire', 'C&ocirc;te d&rsquo;Ivoire', '', '', '', '', '', '', '', '', ''),
(52, 'Croatia', 'Croatie', '', '', '', '', '', '', '', '', ''),
(53, 'Cuba', 'Cuba', '', '', '', '', '', '', '', '', ''),
(54, 'Cyprus', 'Chypre', '', '', '', '', '', '', '', '', ''),
(55, 'Czech Republic', 'R&eacute;publique tch&egrave;que', 'cs', '', '', '', '', '', '', '', ''),
(56, 'Democratic Republic of the Congo', 'R&eacute;publique d&eacute;mocratique du Congo', '', '', '', '', '', '', '', '', ''),
(57, 'Denmark', 'Danemark', 'da', '', '', '', '', '', '', '', ''),
(58, 'Djibouti', 'Djibouti', '', '', '', '', '', '', '', '', ''),
(59, 'Dominica', 'Dominique', '', '', '', '', '', '', '', '', ''),
(60, 'Dominican Republic', 'R&eacute;publique dominicaine', '', '', '', '', '', '', '', '', ''),
(61, 'Ecuador', '&Eacute;quateur', '', '', '', '', '', '', '', '', ''),
(62, 'Egypt', '&Eacute;gypte', '', '', '', '', '', '', '', '', ''),
(63, 'El Salvador', 'El Salvador', '', '', '', '', '', '', '', '', ''),
(64, 'Equatorial Guinea', 'Guin&eacute;e &eacute;quatoriale', '', '', '', '', '', '', '', '', ''),
(65, 'Eritrea', '&Eacute;rythr&eacute;e', '', '', '', '', '', '', '', '', ''),
(66, 'Estonia', 'Estonie', 'et', '', '', '', '', '', '', '', ''),
(67, 'Ethiopia', '&Eacute;thiopie', '', '', '', '', '', '', '', '', ''),
(68, 'Falkland Islands (Islas Malvinas)', 'Iles Falkland (Malouines)', '', '', '', '', '', '', '', '', ''),
(69, 'Faroe Islands', '&Icirc;les F&eacute;ro&eacute;', '', '', '', '', '', '', '', '', ''),
(70, 'Fiji', 'Fidji', '', '', '', '', '', '', '', '', ''),
(71, 'Finland', 'Finlande', 'fi', '', '', '', '', '', '', '', ''),
(72, 'France', 'France', 'fr', '', '', '', '', '', '', '', ''),
(73, 'French Polynesia', 'Polyn&eacute;sie Fran&ccedil;aise', '', '', '', '', '', '', '', '', ''),
(74, 'Gabon', 'Gabon', '', '', '', '', '', '', '', '', ''),
(75, 'Georgia', 'G&eacute;orgie', '', '', '', '', '', '', '', '', ''),
(76, 'Germany', 'Allemagne', 'de', 'German', 'DE', '', '', '', '', '', ''),
(77, 'Ghana', 'Ghana', '', '', '', '', '', '', '', '', ''),
(78, 'Gibraltar', 'Gibraltar', '', '', '', '', '', '', '', '', ''),
(79, 'Greece', 'Gr&egrave;ce', 'el', '', '', '', '', '', '', '', ''),
(80, 'Greenland', 'Groenland', '', '', '', '', '', '', '', '', ''),
(81, 'Grenada', 'Grenade', '', '', '', '', '', '', '', '', ''),
(82, 'Guam', 'Guam', '', '', '', '', '', '', '', '', ''),
(83, 'Guatemala', 'Guatemala', '', '', '', '', '', '', '', '', ''),
(84, 'Guernsey', 'Guernesey', '', '', '', '', '', '', '', '', ''),
(85, 'Guinea', 'Guin&eacute;e', '', '', '', '', '', '', '', '', ''),
(86, 'Guinea-Blissau', 'Guin&eacute;e-Blissau', '', '', '', '', '', '', '', '', ''),
(87, 'Guyana', 'Guyana', '', '', '', '', '', '', '', '', ''),
(88, 'Haiti', 'Ha&iuml;ti', '', '', '', '', '', '', '', '', ''),
(89, 'Holy See (Vatican City)', 'Saint-Si&egrave;ge (Vatican)', '', '', '', '', '', '', '', '', ''),
(90, 'Honduras', 'Honduras', '', '', '', '', '', '', '', '', ''),
(91, 'Hong Kong', 'Hong Kong', '', '', '', '', '', '', '', '', ''),
(92, 'Hungary', 'Hongrie', 'hu', '', '', '', '', '', '', '', ''),
(93, 'Iceland', 'Islande', 'is', '', '', '', '', '', '', '', ''),
(94, 'India', 'Inde', 'hi', '', '', '', '', '', '', '', ''),
(95, 'Indonesia', 'Indon&eacute;sie', '', '', '', '', '', '', '', '', ''),
(96, 'Iran', 'Iran', '', '', '', '', '', '', '', '', ''),
(97, 'Iraq', 'Iraq', '', '', '', '', '', '', '', '', ''),
(98, 'Ireland', 'Irlande', '', '', '', '', '', '', '', '', ''),
(99, 'Isle of Man', 'Ile de Man', '', '', '', '', '', '', '', '', ''),
(100, 'Israel', 'Isra&euml;l', '', '', '', '', '', '', '', '', ''),
(101, 'Italy', 'Italie', 'it', 'Italien', 'IT', 'Roma', 'Euro', 'http://www.xe.com/ucc/convert.cgi?template=fr&Amount=1&From=CHF&To=EUR', 'http://maps.google.ch/maps?f=q&source=s_q&hl=fr&geocode=&q=italy&aq=&sll=46.362093,9.036255&sspn=6.194073,14.27124&ie=UTF8&hq=&hnear=Italie&t=h&z=6', '', '2'),
(102, 'Jamaica', 'Jama&iuml;que', '', '', '', '', '', '', '', '', ''),
(103, 'Japan', 'Japon', 'jp', 'Japanese', '', '', '', '', '', '', ''),
(104, 'Jordan', 'Jordanie', '', '', '', '', '', '', '', '', ''),
(105, 'Kazahstan', 'Kazahstan', '', '', '', '', '', '', '', '', ''),
(106, 'Kenya', 'Kenya', '', '', '', '', '', '', '', '', ''),
(107, 'Kiribati', 'Kiribati', '', '', '', '', '', '', '', '', ''),
(108, 'Kosovo', 'Kosovo', '', '', '', '', '', '', '', '', ''),
(109, 'Kuwait', 'Kowe&iuml;t', '', '', '', '', '', '', '', '', ''),
(110, 'Kyrgyzstan', 'Kirghizistan', '', '', '', '', '', '', '', '', ''),
(111, 'Laos', 'Laos', '', '', '', '', '', '', '', '', ''),
(112, 'Latvia', 'Lettonie', 'lv', '', '', '', '', '', '', '', ''),
(113, 'Lebanon', 'Liban', '', '', '', '', '', '', '', '', ''),
(114, 'Lesotho', 'Lesotho', '', '', '', '', '', '', '', '', ''),
(115, 'Liberia', 'Lib&eacute;ria', '', '', '', '', '', '', '', '', ''),
(116, 'Libya', 'Libye', '', '', '', '', '', '', '', '', ''),
(117, 'Liechtenstein', 'Liechtenstein', '', '', '', '', '', '', '', '', ''),
(118, 'Lithuania', 'Lituanie', 'lt', '', '', '', '', '', '', '', ''),
(119, 'Luxembourg', 'Luxembourg', '', '', '', '', '', '', '', '', ''),
(120, 'Macau', 'Macao', '', '', '', '', '', '', '', '', ''),
(121, 'Macedonia', 'Mac&eacute;doine', '', '', '', '', '', '', '', '', ''),
(122, 'Madagascar', 'Madagascar', '', '', '', '', '', '', '', '', ''),
(123, 'Malawi', 'Malawi', '', '', '', '', '', '', '', '', ''),
(124, 'Malaysia', 'Malaisie', '', '', '', '', '', '', '', '', ''),
(125, 'Maldives', 'Maldives', '', '', '', '', '', '', '', '', ''),
(126, 'Mali', 'Mali', '', '', '', '', '', '', '', '', ''),
(127, 'Malta', 'Malte', '', '', '', '', '', '', '', '', ''),
(128, 'Marschal Islands', '&Icirc;les Marschal', '', '', '', '', '', '', '', '', ''),
(129, 'Mauritania', 'Mauritanie', '', '', '', '', '', '', '', '', ''),
(130, 'Mauritius', 'Maurice', '', '', '', '', '', '', '', '', ''),
(131, 'Mayotte', 'Mayotte', '', '', '', '', '', '', '', '', ''),
(132, 'Mexico', 'Mexique', '', '', '', '', '', '', '', '', ''),
(133, 'Micronesia', 'Micron&eacute;sie', '', '', '', '', '', '', '', '', ''),
(134, 'Moldova', 'Moldavie', '', '', '', '', '', '', '', '', ''),
(135, 'Monaco', 'Monaco', '', '', '', '', '', '', '', '', ''),
(136, 'Mongolia', 'Mongolie', '', '', '', '', '', '', '', '', ''),
(137, 'Montenegro', 'Mont&eacute;n&eacute;gro', '', '', '', '', '', '', '', '', ''),
(138, 'Montserrat', 'Montserrat', '', '', '', '', '', '', '', '', ''),
(139, 'Morocco', 'Maroc', '', '', '', '', '', '', '', '', ''),
(140, 'Mozambique', 'Mozambique', '', '', '', '', '', '', '', '', ''),
(141, 'Namibia', 'Namibie', '', '', '', '', '', '', '', '', ''),
(142, 'Nauru', 'Nauru', '', '', '', '', '', '', '', '', ''),
(143, 'Nepal', 'Nepal', '', '', '', '', '', '', '', '', ''),
(144, 'Netherlands Anthilles', 'Pays-Bas Anthilles', '', '', '', '', '', '', '', '', ''),
(145, 'Netherlands', 'Pays-Bas', 'nl', '', '', '', '', '', '', '', ''),
(146, 'New Zealand', 'Nouvelle-Z&eacute;lande', '', '', '', '', '', '', '', '', ''),
(147, 'Nicaragua', 'Nicaragua', '', '', '', '', '', '', '', '', ''),
(148, 'Niger', 'Niger', '', '', '', '', '', '', '', '', ''),
(149, 'Nigeria', 'Nig&eacute;ria', '', '', '', '', '', '', '', '', ''),
(150, 'Niue', 'Niue', '', '', '', '', '', '', '', '', ''),
(151, 'Norfolk Island', '&Icirc;le Norfolk', '', '', '', '', '', '', '', '', ''),
(152, 'North Korea', 'Cor&eacute;e du Nord', '', '', '', '', '', '', '', '', ''),
(153, 'Northern Mariana Islands', '&Icirc;les Mariannes du Nord', '', '', '', '', '', '', '', '', ''),
(154, 'Norway', 'Norv&egrave;ge', 'no', '', '', '', '', '', '', '', ''),
(155, 'Oman', 'Oman', '', '', '', '', '', '', '', '', ''),
(156, 'Pakistan', 'Pakistan', '', '', '', '', '', '', '', '', ''),
(157, 'Palau', 'Palaos', '', '', '', '', '', '', '', '', ''),
(158, 'Panama', 'Panama', '', '', '', '', '', '', '', '', ''),
(159, 'Papua New Guinea', 'Papouasie-Nouvelle-Guin&eacute;e', '', '', '', '', '', '', '', '', ''),
(160, 'Paraguay', 'Paraguay', '', '', '', '', '', '', '', '', ''),
(161, 'Peru', 'P&eacute;rou', '', '', '', '', '', '', '', '', ''),
(162, 'Philippines', 'Philippines', '', '', '', '', '', '', '', '', ''),
(163, 'Pitcairn Islands', '&Icirc;les Pitcairn', '', '', '', '', '', '', '', '', ''),
(164, 'Poland', 'Pologne', 'pl', '', '', '', '', '', '', '', ''),
(165, 'Portugal', 'Portugal', 'pt', '', '', '', '', '', '', '', ''),
(166, 'Puerto Rico', 'Porto Rico', '', '', '', '', '', '', '', '', ''),
(167, 'Quatar', 'Quatar', '', '', '', '', '', '', '', '', ''),
(168, 'Republic of the Congo', 'R&eacute;publique du Congo', '', '', '', '', '', '', '', '', ''),
(169, 'Romania', 'Roumanie', 'ro', '', '', '', '', '', '', '', ''),
(170, 'Russia', 'Russie', 'ru', '', '', '', '', '', '', '', ''),
(171, 'Rwanda', 'Rwanda', '', '', '', '', '', '', '', '', ''),
(172, 'Saint Helena', 'Sainte-H&eacute;l&egrave;ne', '', '', '', '', '', '', '', '', ''),
(173, 'Saint Kitts and Nevis', 'Saint Kitts et Nevis', '', '', '', '', '', '', '', '', ''),
(174, 'Saint Lucia', 'Sainte-Lucie', '', '', '', '', '', '', '', '', ''),
(175, 'Saint Pierre and Miquelon', 'Saint-Pierre-et-Miquelon', '', '', '', '', '', '', '', '', ''),
(176, 'Saint Vincent', 'Saint-Vincent', '', '', '', '', '', '', '', '', ''),
(177, 'Samoa', 'Samoa', '', '', '', '', '', '', '', '', ''),
(178, 'San Marino', 'Saint-Marin', '', '', '', '', '', '', '', '', ''),
(179, 'Sao Tome and Principe', 'S&atilde;o Tom&eacute; et Pr&iacute;ncipe', '', '', '', '', '', '', '', '', ''),
(180, 'Saudi Arabia', 'Arabie Saoudite', 'ar', '', '', '', '', '', '', '', ''),
(181, 'Senegal', 'Senegal', '', '', '', '', '', '', '', '', ''),
(182, 'Seychelles', 'Seychelles', '', '', '', '', '', '', '', '', ''),
(183, 'Sierra Leone', 'Sierra Leone', '', '', '', '', '', '', '', '', ''),
(184, 'Singapore', 'Singapour', '', '', '', '', '', '', '', '', ''),
(185, 'Slovakia', 'Slovaquie', 'sk', '', '', '', '', '', '', '', ''),
(186, 'Slovenia', 'Slov&eacute;nie', 'sl', '', '', '', '', '', '', '', ''),
(187, 'Solomon Islands', '&Icirc;les Salomon', '', '', '', '', '', '', '', '', ''),
(188, 'Somalia', 'Somalie', '', '', '', '', '', '', '', '', ''),
(189, 'South Africa', 'Afrique du Sud', '', '', '', '', '', '', '', '', ''),
(190, 'South Georgia and the South Sandwitch Islands', 'G&eacute;orgie du Sud et Iles Sandwich du Sud', '', '', '', '', '', '', '', '', ''),
(191, 'South Korea', 'Cor&eacute;e du Sud', '', '', '', '', '', '', '', '', ''),
(192, 'Spain', 'Espagne', 'es', '', '', '', '', '', '', '', ''),
(193, 'Sri Lanka', 'Sri Lanka', '', '', '', '', '', '', '', '', ''),
(194, 'Sudan', 'Soudan', '', '', '', '', '', '', '', '', ''),
(195, 'Suriname', 'Suriname', '', '', '', '', '', '', '', '', ''),
(196, 'Swaziland', 'Swaziland', '', '', '', '', '', '', '', '', ''),
(197, 'Sweden', 'Su&egrave;de', 'sv', '', '', '', '', '', '', '', ''),
(198, 'Switzerland', 'Suisse', 'FR, IT, DE', 'Français, Italien, Allemand', 'CH', 'Bern', 'CHF', 'http://www.xe.com/ucc/convert.cgi?template=fr&Amount=1&From=EUR&To=CHF', 'http://maps.google.ch/maps?hl=fr&doflg=ptk&ie=UTF8&ll=46.705969,8.453979&spn=3.077494,7.13562&t=h&z=8', '', '2'),
(199, 'Syria', 'Syrie', '', '', '', '', '', '', '', '', ''),
(200, 'Taiwan', 'Ta&iuml;wan', '', '', '', '', '', '', '', '', ''),
(201, 'Tajikistan', 'Tadjikistan', '', '', '', '', '', '', '', '', ''),
(202, 'Tanzania', 'Tanzanie', '', '', '', '', '', '', '', '', ''),
(203, 'Thailand', 'Tha&iuml;lande', '', 'Thailandais', 'TH', 'Bangkok', 'THB', 'http://www.xe.com/ucc/convert.cgi?template=fr&Amount=1&From=CHF&To=THB', 'http://maps.google.ch/maps?f=q&source=s_q&hl=fr&geocode=&q=Tha%C3%AFlande&aq=3&sll=15.623037,103.051758&sspn=17.227359,28.54248&ie=UTF8&hq=&hnear=Tha%C3%AFlande&ll=15.876809,100.986328&spn=17.206161,28.54248&t=h&z=6', '', '3'),
(204, 'the Bahamas', 'les Bahamas', '', '', '', '', '', '', '', '', ''),
(205, 'the Gambia', 'la Gambie', '', '', '', '', '', '', '', '', ''),
(206, 'Tibet', 'Tibet', '', '', '', '', '', '', '', '', ''),
(207, 'Timor-Leste', 'Timor-Leste', '', '', '', '', '', '', '', '', ''),
(208, 'Togo', 'Togo', '', '', '', '', '', '', '', '', ''),
(209, 'Tonga', 'Tonga', '', '', '', '', '', '', '', '', ''),
(210, 'Trinidad and Tobago', 'Trinidad et Tobago', '', '', '', '', '', '', '', '', ''),
(211, 'Tunisia', 'Tunisie', '', '', '', '', '', '', '', '', ''),
(212, 'Turkey', 'Turquie', 'tr', '', '', '', '', '', '', '', ''),
(213, 'Turkmenistan', 'Turkm&eacute;nistan', '', '', '', '', '', '', '', '', ''),
(214, 'Turks and Caicos Islands', '&Icirc;les Turks et Ca&iuml;ques', '', '', '', '', '', '', '', '', ''),
(215, 'Tuvalu', 'Tuvalu', '', '', '', '', '', '', '', '', ''),
(216, 'Uganda', 'Ouganda', '', '', '', '', '', '', '', '', ''),
(217, 'Ukraine', 'Ukraine', '', '', '', '', '', '', '', '', ''),
(218, 'United Arab Emirates', '&Eacute;mirats arabes unis', '', '', '', '', '', '', '', '', ''),
(219, 'United Kingdom', 'Royaume-Uni', 'en', 'English', 'GB', '', '', '', '', '', ''),
(220, 'United States', '&Eacute;tats-Unis', 'en-us', 'English US', '', '', '', '', '', '', ''),
(221, 'Uruguay', 'Uruguay', '', '', '', '', '', '', '', '', ''),
(222, 'Uzbekistan', 'Ouzb&eacute;kistan', '', '', '', '', '', '', '', '', ''),
(223, 'Vanuatu', 'Vanuatu', '', '', '', '', '', '', '', '', ''),
(224, 'Venezuela', 'Venezuela', '', '', '', '', '', '', '', '', ''),
(225, 'Vietnam', 'Vietnam', '', '', '', '', '', '', '', '', ''),
(226, 'Virgin Islands', 'Iles Vierges', '', '', '', '', '', '', '', '', ''),
(227, 'Wallis and Futuna', 'Wallis et Futuna', '', '', '', '', '', '', '', '', ''),
(228, 'Yemen', 'Y&eacute;men', '', '', '', '', '', '', '', '', ''),
(229, 'Zambia', 'Zambie', '', '', '', '', '', '', '', '', ''),
(230, 'Zimbabwe', 'Zimbabwe', '', '', '', '', '', '', '', '', ''),
(231, 'Akrotiri', 'Akrotiri', '', '', '', '', '', '', '', '', ''),
(232, 'Baker Island', '&Icirc;les Baker', '', '', '', '', '', '', '', '', ''),
(233, 'Clipperton Island', '&Icirc;le Clipperton', '', '', '', '', '', '', '', '', ''),
(234, 'Coral Sea Islands', '&Icirc;sles de la Mer de Corail', '', '', '', '', '', '', '', '', ''),
(235, 'Dhekelia', 'Dhekelia', '', '', '', '', '', '', '', '', ''),
(236, 'French Southern and Antarctic Lands', 'Territoires fran&ccedil;ais du Sud et de l&rsquo;Antarctique', '', '', '', '', '', '', '', '', ''),
(237, 'Heard Island and McDonald Islands', '&Icirc;les Heard et MacDonald', '', '', '', '', '', '', '', '', ''),
(238, 'Howland Island', '&Icirc;le Howland', '', '', '', '', '', '', '', '', ''),
(239, 'Jan Mayen', 'Jan Mayen', '', '', '', '', '', '', '', '', ''),
(240, 'Jarvis Island', '&Icirc;le Jarvis', '', '', '', '', '', '', '', '', ''),
(241, 'Johnston Atoll', 'Atoll de Johnston', '', '', '', '', '', '', '', '', ''),
(242, 'Jersey', 'Jersey', '', '', '', '', '', '', '', '', ''),
(243, 'Kingman Reef', 'R&eacute;cif Kingman', '', '', '', '', '', '', '', '', ''),
(244, 'Midway Islands', '&Icirc;les Midway', '', '', '', '', '', '', '', '', ''),
(245, 'Navassa Island', 'Ile Navassa', '', '', '', '', '', '', '', '', ''),
(246, 'New Caledonia', 'Nouvelle-Cal&eacute;donie', '', '', '', '', '', '', '', '', ''),
(247, 'Palmyra Atoll', 'Atoll de Palmyra', '', '', '', '', '', '', '', '', ''),
(248, 'Saint Barthelemy', 'Saint-Barth&eacute;l&eacute;my', '', '', '', '', '', '', '', '', ''),
(249, 'Saint Martin', 'Saint-Martin', '', '', '', '', '', '', '', '', ''),
(250, 'Serbia', 'Serbie', 'sr', '', '', '', '', '', '', '', ''),
(251, 'Svalbard', 'Svalbard', '', '', '', '', '', '', '', '', ''),
(252, 'Tokelau', 'Tokelau', '', '', '', '', '', '', '', '', ''),
(253, 'Wake Island', '&Icirc;le Wake', '', '', '', '', '', '', '', '', ''),
(254, 'United States Pacific Island Wildlife Refuges', 'United States Pacific Island Wildlife Refuges', '', '', '', '', '', '', '', '', ''),
(255, 'Hawaii', 'Hawa&iuml;', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateInsert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `question` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `questionLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solution` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `solutionLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iframe` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `idGallery` int(11) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateModification` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idMember` int(11) NOT NULL,
  `ifPublicGallery` varchar(5) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `idLabel` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `since` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` varchar(5) NOT NULL,
  `continent` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `logoMap` varchar(64) NOT NULL,
  `website` varchar(64) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `--- shop ---` int(11) NOT NULL,
  `ifUseMyShop` varchar(5) NOT NULL,
  `ifUseMyShopUrl` varchar(5) NOT NULL,
  `urlShop` varchar(255) NOT NULL,
  `ifUsePromoCode` varchar(5) NOT NULL,
  `ifDelivery` varchar(5) NOT NULL,
  `ifSmsOrders` varchar(5) NOT NULL,
  `ifEmailOrders` varchar(5) NOT NULL,
  `nameSellerLabel` varchar(64) NOT NULL,
  `emailOrders` varchar(255) NOT NULL,
  `phoneOrders` varchar(64) NOT NULL,
  `minPlaceOrder` int(11) NOT NULL,
  `orderCondition` mediumtext NOT NULL,
  `--- delivery ---` int(11) NOT NULL,
  `deliveryTime` varchar(255) NOT NULL,
  `deliveryZone` varchar(255) NOT NULL,
  `ifAskGeoloc` varchar(5) NOT NULL,
  `ifByPost` varchar(5) NOT NULL,
  `feePost` mediumtext NOT NULL,
  `country_code` varchar(64) NOT NULL,
  `region` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labels_customers`
--

CREATE TABLE `labels_customers` (
  `idCustomerLabel` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `since` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labels_sellPoints`
--

CREATE TABLE `labels_sellPoints` (
  `idSellPointLabel` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `idSellPoint` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lgt` float(10,6) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `idSellPoint` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `idMember` int(11) NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `--- connection ---` varchar(0) NOT NULL,
  `password` varchar(64) NOT NULL,
  `lostPassCode` varchar(64) NOT NULL,
  `dateRequestRegeneratePass` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(64) NOT NULL,
  `emailChange` varchar(64) NOT NULL,
  `validationEmailCode` varchar(64) NOT NULL,
  `ifEmailConfirmed` varchar(5) NOT NULL,
  `validationCodeNewEmail` varchar(64) NOT NULL,
  `dateRequestChangeEmail` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `doubleAuthentificationCode` int(11) NOT NULL,
  `dateDoubleAuthentification` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `--- perso ---` varchar(0) NOT NULL,
  `job` varchar(64) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `age` int(64) NOT NULL,
  `sex` varchar(64) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `--- contact ---` varchar(0) NOT NULL,
  `phonePerso` varchar(64) NOT NULL,
  `phonePro` varchar(64) NOT NULL,
  `skypePseudo` varchar(64) NOT NULL,
  `--- social ---` varchar(0) NOT NULL,
  `websitePerso` varchar(255) NOT NULL,
  `websitePro` varchar(255) NOT NULL,
  `socialLink1` varchar(255) NOT NULL,
  `socialLink2` varchar(255) NOT NULL,
  `socialLink3` varchar(255) NOT NULL,
  `-- delet accunt ---` varchar(0) NOT NULL,
  `ifDeletAccunt` varchar(5) NOT NULL,
  `dateAskDeletion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `commentDelete` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`idMember`, `pseudo`, `--- connection ---`, `password`, `lostPassCode`, `dateRequestRegeneratePass`, `email`, `emailChange`, `validationEmailCode`, `ifEmailConfirmed`, `validationCodeNewEmail`, `dateRequestChangeEmail`, `doubleAuthentificationCode`, `dateDoubleAuthentification`, `--- perso ---`, `job`, `skills`, `age`, `sex`, `sports`, `hobbies`, `--- contact ---`, `phonePerso`, `phonePro`, `skypePseudo`, `--- social ---`, `websitePerso`, `websitePro`, `socialLink1`, `socialLink2`, `socialLink3`, `-- delet accunt ---`, `ifDeletAccunt`, `dateAskDeletion`, `commentDelete`) VALUES
(1, 'Resistant', '', '9e6417ebffecef071eaeeb2ed0ca654b', '', '0000-00-00 00:00:00', 'resistant@protonmail.com', '', 'be931d169953cbf2dc9762b6aae4550f', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `members_friends`
--

CREATE TABLE `members_friends` (
  `id` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idMemberFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members_intel`
--

CREATE TABLE `members_intel` (
  `idIntelMember` int(11) NOT NULL,
  `ipUser` varchar(64) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rights` varchar(64) NOT NULL,
  `subRights` varchar(64) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `bgProfile` varchar(255) NOT NULL,
  `--- communication —` varchar(0) NOT NULL,
  `ifMP` varchar(5) NOT NULL,
  `ifUseEmail` varchar(5) NOT NULL,
  `emailServer` varchar(64) NOT NULL,
  `passEmailServer` varchar(64) NOT NULL,
  `ifNotyUp` varchar(5) NOT NULL,
  `--- parametre account ---` varchar(0) NOT NULL,
  `ifPublicProfile` varchar(5) NOT NULL,
  `ifPublicPost` varchar(5) NOT NULL,
  `ifPublicFriendList` varchar(5) NOT NULL,
  `ifShowFonction` varchar(5) NOT NULL,
  `ifShowSkills` varchar(5) NOT NULL,
  `ifShowAge` varchar(5) NOT NULL,
  `ifShowSex` varchar(5) NOT NULL,
  `ifShowSports` varchar(5) NOT NULL,
  `ifShowHobbies` varchar(5) NOT NULL,
  `ifShowPhonePerso` varchar(5) NOT NULL,
  `ifShowPhonePro` varchar(5) NOT NULL,
  `ifShowSkype` varchar(5) NOT NULL,
  `ifShowWebsitePerso` varchar(5) NOT NULL,
  `ifShowWebsitePro` varchar(5) NOT NULL,
  `ifShowSocialLink1` varchar(5) NOT NULL,
  `ifShowSocialLink2` varchar(5) NOT NULL,
  `ifShowSocialLink3` varchar(5) NOT NULL,
  `ifShowName` varchar(5) NOT NULL,
  `ifShowPhone` varchar(5) NOT NULL,
  `ifShowEntryCode` varchar(5) NOT NULL,
  `ifShowStreet` varchar(5) NOT NULL,
  `ifShowZipCode` varchar(5) NOT NULL,
  `ifShowCity` varchar(5) NOT NULL,
  `ifShowState` varchar(5) NOT NULL,
  `ifShowCountry` varchar(5) NOT NULL,
  `--- preference ---` varchar(0) NOT NULL,
  `languagePref` varchar(64) NOT NULL,
  `deliverySchedule` varchar(64) NOT NULL,
  `preferedHours` varchar(64) NOT NULL,
  `--- ftp ---` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_intel`
--

INSERT INTO `members_intel` (`idIntelMember`, `ipUser`, `idMember`, `dateInscription`, `rights`, `subRights`, `avatar`, `bgProfile`, `--- communication —`, `ifMP`, `ifUseEmail`, `emailServer`, `passEmailServer`, `ifNotyUp`, `--- parametre account ---`, `ifPublicProfile`, `ifPublicPost`, `ifPublicFriendList`, `ifShowFonction`, `ifShowSkills`, `ifShowAge`, `ifShowSex`, `ifShowSports`, `ifShowHobbies`, `ifShowPhonePerso`, `ifShowPhonePro`, `ifShowSkype`, `ifShowWebsitePerso`, `ifShowWebsitePro`, `ifShowSocialLink1`, `ifShowSocialLink2`, `ifShowSocialLink3`, `ifShowName`, `ifShowPhone`, `ifShowEntryCode`, `ifShowStreet`, `ifShowZipCode`, `ifShowCity`, `ifShowState`, `ifShowCountry`, `--- preference ---`, `languagePref`, `deliverySchedule`, `preferedHours`, `--- ftp ---`) VALUES
(1, '', 1, '2020-05-01 20:22:22', 'Administrator', '', '', '', '', 'no', 'no', '', '', 'yes', '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', '', '', '', 'no', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `idQuiVeutNews` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_html`
--

CREATE TABLE `newsletter_html` (
  `idNewsletter` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `published` varchar(5) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  `html` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` varchar(5) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `statut` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `idPartner` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `brand` varchar(255) NOT NULL,
  `--- contact ---` varchar(0) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `--- social ---` varchar(0) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `-- works --` varchar(0) NOT NULL,
  `24_24` varchar(5) NOT NULL,
  `monday` varchar(64) NOT NULL,
  `tuesday` varchar(64) NOT NULL,
  `wednesday` varchar(64) NOT NULL,
  `thursday` varchar(64) NOT NULL,
  `friday` varchar(64) NOT NULL,
  `saturday` varchar(64) NOT NULL,
  `sunday` varchar(64) NOT NULL,
  `--- autre ---` int(11) NOT NULL,
  `videoUrlIFrame` mediumtext NOT NULL,
  `video` mediumtext NOT NULL,
  `videoTitle` varchar(255) NOT NULL,
  `videoDescription` mediumtext NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `idPhoto` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idBlog` int(11) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `idGallery` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `photoName` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `idMember` int(11) NOT NULL,
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_sourceLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_txt` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `article_imgLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_iframe` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idLabel` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `certified` varchar(5) NOT NULL,
  `dateCertification` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `--- tri ---` int(11) NOT NULL,
  `typeProduct` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `countryProd` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `--- infos ---` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `bgProduct` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `urlBuy` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `price1` varchar(255) NOT NULL,
  `valuePp1` int(11) NOT NULL,
  `price2` varchar(255) NOT NULL,
  `valuePp2` int(11) NOT NULL,
  `price3` varchar(255) NOT NULL,
  `valuePp3` int(11) NOT NULL,
  `--- characteristics ---` int(11) NOT NULL,
  `--- others ---` int(11) NOT NULL,
  `--- multimedia---` int(11) NOT NULL,
  `iframeVideo` varchar(255) NOT NULL,
  `video` mediumtext NOT NULL,
  `videoTitle` varchar(255) NOT NULL,
  `videoDescription` varchar(255) NOT NULL,
  `audio` mediumtext NOT NULL,
  `--- autre ---` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `idRequest` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellPoints`
--

CREATE TABLE `sellPoints` (
  `idSellPoint` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `since` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idLabel` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `ifMultiShops` varchar(5) NOT NULL,
  `status` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL,
  `continent` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `region` varchar(64) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lgt` float(10,6) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `logoMap` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `-- time --` int(11) NOT NULL,
  `if24on24` varchar(5) NOT NULL,
  `if7on7` varchar(5) NOT NULL,
  `monday` varchar(64) NOT NULL,
  `tuesday` varchar(64) NOT NULL,
  `wednesday` varchar(64) NOT NULL,
  `thrusday` varchar(64) NOT NULL,
  `friday` varchar(64) NOT NULL,
  `saturday` varchar(64) NOT NULL,
  `sunday` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_blackList_email`
--

CREATE TABLE `site_blackList_email` (
  `idEmailBlackListed` int(11) NOT NULL,
  `ipUser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idMember` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `howLong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_blackList_email`
--

INSERT INTO `site_blackList_email` (`idEmailBlackListed`, `ipUser`, `email`, `idMember`, `timeStamp`, `howLong`) VALUES
(1, '', 'sms@email.tst', 0, '2018-09-28 14:56:29', 0),
(2, '', 'ucanateq@ekmail.com', 0, '2018-09-28 15:04:24', 0),
(3, '', 'jdenean69@gmail.com', 0, '2018-09-28 15:05:08', 0),
(4, '', 'westonianorton@veryawesomemail.win', 0, '2018-09-28 15:05:08', 0),
(5, '', 'kimmlsi@aol.com', 0, '2018-09-28 15:05:49', 0),
(6, '', 'ijacewje@udmail.com', 0, '2018-09-28 15:05:49', 0),
(7, '', 'utupagaj@otmail.com', 0, '2018-09-28 15:06:26', 0),
(8, '', 'icabwetiy@omiomail.com', 0, '2018-09-28 15:06:26', 0),
(9, '', 'upiqejog@outymail.com', 0, '2018-09-28 15:06:43', 0),
(10, '', 'bcb91682@aol.com', 0, '2018-09-28 15:06:43', 0),
(11, '', 'ogjovu@ejuxmail.com', 0, '2018-09-28 15:07:18', 0),
(12, '', 'ugoqob@exmail.com', 0, '2018-09-28 15:07:18', 0),
(13, '', 'uvihifax@evrmail.com', 0, '2018-09-28 15:08:12', 0),
(14, '', 'golofal@elivmail.com', 0, '2018-09-28 15:08:12', 0),
(15, '', 'golofal@elivmail.com', 0, '2018-09-28 15:09:10', 0),
(16, '', 'iburic@ibamail.com', 0, '2018-09-28 15:09:10', 0),
(17, '', 'ufaegelo@alnmail.com', 0, '2018-09-28 15:09:34', 0),
(19, '', 'galim0693@yahoo.com', 0, '2018-09-28 15:10:00', 0),
(20, '', 'ozuceruya@ekmail.com', 0, '2018-09-28 15:10:00', 0),
(21, '', 'ovpicegib@qimail.com', 0, '2018-09-28 15:10:23', 0),
(22, '', 'emozefoqi@eihmail.com', 0, '2018-09-28 15:10:23', 0),
(23, '', 'sample@email.tst', 0, '2018-09-28 15:21:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_blackList_pseudo`
--

CREATE TABLE `site_blackList_pseudo` (
  `idBlackListePseudo` int(11) NOT NULL,
  `pseudo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_blackList_user`
--

CREATE TABLE `site_blackList_user` (
  `idBlackListUser` int(11) NOT NULL,
  `ipUser` varchar(255) NOT NULL,
  `idMember` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `howLong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_blackList_words`
--

CREATE TABLE `site_blackList_words` (
  `idWordBlackListed` int(11) NOT NULL,
  `word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_blackList_words`
--

INSERT INTO `site_blackList_words` (`idWordBlackListed`, `word`) VALUES
(2, 'MERDE'),
(3, 'PUTE'),
(5, 'FUCK'),
(7, 'CACA'),
(9, 'CONNASSE'),
(10, 'CONNARD'),
(11, 'TUER'),
(12, 'CHIOT'),
(14, 'ENCULE'),
(15, 'ENCULER'),
(16, 'PETASSE'),
(17, 'SALOPE'),
(20, 'PETIT CON'),
(21, 'SALE CON '),
(24, 'TROU DU CUL'),
(25, ' CON ');

-- --------------------------------------------------------

--
-- Table structure for table `site_noty`
--

CREATE TABLE `site_noty` (
  `idNoty` int(11) NOT NULL,
  `idFrom` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateNoty` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateNotyUpdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(64) NOT NULL,
  `classCss` varchar(24) NOT NULL,
  `categories` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `message` mediumtext NOT NULL,
  `linkNoty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_noty`
--

INSERT INTO `site_noty` (`idNoty`, `idFrom`, `idMember`, `dateNoty`, `dateNotyUpdate`, `type`, `classCss`, `categories`, `title`, `message`, `linkNoty`) VALUES
(10, 0, 1, '2020-05-01 20:22:22', '2020-05-01 20:22:22', 'notyUp', '', 'welcome', 'Welcome', 'Great health and good job', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_notySawByUser`
--

CREATE TABLE `site_notySawByUser` (
  `idWhoSawNoty` int(11) NOT NULL,
  `idMemberWhoSawNoty` int(11) NOT NULL,
  `idNoty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `idSetting` int(11) NOT NULL,
  `activeDbSettings` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `--- app ---` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicKey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privateKey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_version` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_version_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `-- config --` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifActivePsp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifKillAllSessionBlockLogin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifLimitToComingSoon` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifOnlyApp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifBlockNewRegistration` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifLocalSite` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlRoot` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faviconProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoHProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoEmailProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoPdfProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailContactProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailComEmailProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCountDownProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinceOrUntilCountDownProject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeRememberMe` int(11) NOT NULL,
  `timeConnection` int(11) NOT NULL,
  `limitTimeProcessDoubleAndLost` int(11) NOT NULL,
  `limitTimeBlackList` int(11) NOT NULL,
  `ifLimitAge` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitAge` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifDoubleAuthentification` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifDemandSecurePassword` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifDemandSecureEmail` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secureWebMail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifActiveAcceptCookies` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifLookSelectAndRightClic` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifSharingFolder` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitSizePublicFolder` int(11) NOT NULL,
  `ifGathering` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `--- audio ---` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifUseAudio` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` int(11) NOT NULL,
  `-- back end styles --` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkColor` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkColorOver` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkColorActive` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkColorVisited` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectionColorBg` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectionColor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgProfileHeader` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatarProfile` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `-- front end styles --` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgRegister` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgLogin` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgComingSoon` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgPrivacy` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgTerms` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgAirlock` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgLostPass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgFaq` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgContact` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `--- users ---` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifMembersUseKnowledges` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifMembersUseWallet` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifMembersUseLabel` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifMembersUseMyFolder` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitSizeMyFolder` int(11) NOT NULL,
  `-- money --` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IBAN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIC` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `-- cron tasks --` varchar(0) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activeCronTasks` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cronReport` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailReportCronTasks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`idSetting`, `activeDbSettings`, `--- app ---`, `publicKey`, `privateKey`, `app_version`, `app_version_date`, `-- config --`, `ifActivePsp`, `ifKillAllSessionBlockLogin`, `ifLimitToComingSoon`, `ifOnlyApp`, `ifBlockNewRegistration`, `ifLocalSite`, `urlRoot`, `nameProject`, `faviconProject`, `logoProject`, `logoHProject`, `logoEmailProject`, `logoPdfProject`, `emailContactProject`, `emailComEmailProject`, `dateCountDownProject`, `sinceOrUntilCountDownProject`, `timeRememberMe`, `timeConnection`, `limitTimeProcessDoubleAndLost`, `limitTimeBlackList`, `ifLimitAge`, `limitAge`, `ifDoubleAuthentification`, `ifDemandSecurePassword`, `ifDemandSecureEmail`, `secureWebMail`, `ifActiveAcceptCookies`, `ifLookSelectAndRightClic`, `ifSharingFolder`, `limitSizePublicFolder`, `ifGathering`, `--- audio ---`, `ifUseAudio`, `volume`, `-- back end styles --`, `linkColor`, `linkColorOver`, `linkColorActive`, `linkColorVisited`, `selectionColorBg`, `selectionColor`, `bgProfileHeader`, `avatarProfile`, `-- front end styles --`, `bgRegister`, `bgLogin`, `bgComingSoon`, `bgPrivacy`, `bgTerms`, `bgAirlock`, `bgLostPass`, `bgFaq`, `bgContact`, `--- users ---`, `ifMembersUseKnowledges`, `ifMembersUseWallet`, `ifMembersUseLabel`, `ifMembersUseMyFolder`, `limitSizeMyFolder`, `-- money --`, `paypal`, `IBAN`, `BIC`, `-- cron tasks --`, `activeCronTasks`, `cronReport`, `emailReportCronTasks`) VALUES
(77, 'yes', '', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'v1.0', '2020-05-01 16:18:33', '', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', 86400, 300, 300, 86400, 'no', '18', 'no', 'no', 'no', 'protonmail.com/tutanota.com/posteo.de/mailfence.com/startmail.com/mailbox.org', 'no', 'no', 'yes', 999, 'yes', '', 'yes', 9, '', '#3399ff', '#64b2ff', '#ffa500', '#64b2ff', 'white', 'black', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'yes', 'yes', 'yes', 183, '', '', '', '', '', 'no', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_stats_links`
--

CREATE TABLE `site_stats_links` (
  `idClic` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idType` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `idLabel` int(11) NOT NULL,
  `ipUser` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userAgent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cible` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_stats_visits`
--

CREATE TABLE `site_stats_visits` (
  `idVisit` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `ipUser` varchar(255) NOT NULL,
  `dateVisit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `--- stats ---` varchar(0) NOT NULL,
  `fromPage` varchar(255) NOT NULL,
  `visitPage` varchar(255) NOT NULL,
  `whatSupport` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `square` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_userOnline`
--

CREATE TABLE `site_userOnline` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `idVideo` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `statut` varchar(5) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `iframe` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`idVideo`, `idMember`, `statut`, `tag`, `cover`, `title`, `description`, `iframe`) VALUES
(1, 1, '', '', '', '', '', '<iframe width=\"720\" height=\"405\" src=\"https://www.youtube.com/embed/s1pG7k_1nSw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idAddress`);

--
-- Indexes for table `admin_abo`
--
ALTER TABLE `admin_abo`
  ADD PRIMARY KEY (`idAbo`);

--
-- Indexes for table `admin_bill`
--
ALTER TABLE `admin_bill`
  ADD PRIMARY KEY (`idBill`);

--
-- Indexes for table `admin_promoCode`
--
ALTER TABLE `admin_promoCode`
  ADD PRIMARY KEY (`idCodePromo`);

--
-- Indexes for table `admin_promoCodeBenefits`
--
ALTER TABLE `admin_promoCodeBenefits`
  ADD PRIMARY KEY (`idCodeBenefits`);

--
-- Indexes for table `admin_psp`
--
ALTER TABLE `admin_psp`
  ADD PRIMARY KEY (`idSetPsp`);

--
-- Indexes for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD PRIMARY KEY (`idWallet`);

--
-- Indexes for table `admin_wallets_movements`
--
ALTER TABLE `admin_wallets_movements`
  ADD PRIMARY KEY (`idWalletMovment`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idPostBlog`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_votes`
--
ALTER TABLE `comments_votes`
  ADD PRIMARY KEY (`idCommentVote`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idCountry`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`idGallery`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`idLabel`);

--
-- Indexes for table `labels_customers`
--
ALTER TABLE `labels_customers`
  ADD PRIMARY KEY (`idCustomerLabel`);

--
-- Indexes for table `labels_sellPoints`
--
ALTER TABLE `labels_sellPoints`
  ADD PRIMARY KEY (`idSellPointLabel`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMember`);

--
-- Indexes for table `members_friends`
--
ALTER TABLE `members_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_intel`
--
ALTER TABLE `members_intel`
  ADD PRIMARY KEY (`idIntelMember`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`idQuiVeutNews`);

--
-- Indexes for table `newsletter_html`
--
ALTER TABLE `newsletter_html`
  ADD PRIMARY KEY (`idNewsletter`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`idPartner`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`idRequest`);

--
-- Indexes for table `sellPoints`
--
ALTER TABLE `sellPoints`
  ADD PRIMARY KEY (`idSellPoint`);

--
-- Indexes for table `site_blackList_email`
--
ALTER TABLE `site_blackList_email`
  ADD PRIMARY KEY (`idEmailBlackListed`);

--
-- Indexes for table `site_blackList_pseudo`
--
ALTER TABLE `site_blackList_pseudo`
  ADD PRIMARY KEY (`idBlackListePseudo`);

--
-- Indexes for table `site_blackList_user`
--
ALTER TABLE `site_blackList_user`
  ADD PRIMARY KEY (`idBlackListUser`);

--
-- Indexes for table `site_blackList_words`
--
ALTER TABLE `site_blackList_words`
  ADD PRIMARY KEY (`idWordBlackListed`);

--
-- Indexes for table `site_noty`
--
ALTER TABLE `site_noty`
  ADD PRIMARY KEY (`idNoty`);

--
-- Indexes for table `site_notySawByUser`
--
ALTER TABLE `site_notySawByUser`
  ADD PRIMARY KEY (`idWhoSawNoty`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`idSetting`);

--
-- Indexes for table `site_stats_links`
--
ALTER TABLE `site_stats_links`
  ADD PRIMARY KEY (`idClic`);

--
-- Indexes for table `site_stats_visits`
--
ALTER TABLE `site_stats_visits`
  ADD PRIMARY KEY (`idVisit`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idVideo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `idAddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `admin_abo`
--
ALTER TABLE `admin_abo`
  MODIFY `idAbo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_bill`
--
ALTER TABLE `admin_bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_promoCode`
--
ALTER TABLE `admin_promoCode`
  MODIFY `idCodePromo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_promoCodeBenefits`
--
ALTER TABLE `admin_promoCodeBenefits`
  MODIFY `idCodeBenefits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_psp`
--
ALTER TABLE `admin_psp`
  MODIFY `idSetPsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  MODIFY `idWallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_wallets_movements`
--
ALTER TABLE `admin_wallets_movements`
  MODIFY `idWalletMovment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `idPostBlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_votes`
--
ALTER TABLE `comments_votes`
  MODIFY `idCommentVote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `idCountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `idLabel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels_customers`
--
ALTER TABLE `labels_customers`
  MODIFY `idCustomerLabel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels_sellPoints`
--
ALTER TABLE `labels_sellPoints`
  MODIFY `idSellPointLabel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `members_friends`
--
ALTER TABLE `members_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_intel`
--
ALTER TABLE `members_intel`
  MODIFY `idIntelMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `idQuiVeutNews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_html`
--
ALTER TABLE `newsletter_html`
  MODIFY `idNewsletter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `idPartner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sellPoints`
--
ALTER TABLE `sellPoints`
  MODIFY `idSellPoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_blackList_email`
--
ALTER TABLE `site_blackList_email`
  MODIFY `idEmailBlackListed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `site_blackList_pseudo`
--
ALTER TABLE `site_blackList_pseudo`
  MODIFY `idBlackListePseudo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_blackList_user`
--
ALTER TABLE `site_blackList_user`
  MODIFY `idBlackListUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `site_blackList_words`
--
ALTER TABLE `site_blackList_words`
  MODIFY `idWordBlackListed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `site_noty`
--
ALTER TABLE `site_noty`
  MODIFY `idNoty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `site_notySawByUser`
--
ALTER TABLE `site_notySawByUser`
  MODIFY `idWhoSawNoty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `site_stats_links`
--
ALTER TABLE `site_stats_links`
  MODIFY `idClic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_stats_visits`
--
ALTER TABLE `site_stats_visits`
  MODIFY `idVisit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
