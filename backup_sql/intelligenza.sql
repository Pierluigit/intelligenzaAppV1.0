-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql16j15.db.hostpoint.internal
-- Generation Time: Jun 10, 2020 at 05:47 PM
-- Server version: 10.1.45-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escortgi_intelligenza`
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
(3, 1, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(244, 25, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(245, 25, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(246, 25, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(247, 26, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(248, 26, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(249, 26, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(250, 29, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(251, 29, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(252, 29, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(253, 30, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(254, 30, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(255, 30, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(256, 31, 'home', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(257, 31, 'billing', '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(258, 31, 'delivery', '', '', '', '', 'yes', '', '', '', '', '', '', '', '');

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
  `datePromoCodeActivation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
(10, 25, 0),
(11, 26, 0),
(12, 29, 0),
(13, 30, 0),
(14, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets_movements`
--

CREATE TABLE `admin_wallets_movements` (
  `idWalletMovment` int(11) NOT NULL,
  `idWallet` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dateMovement` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `article_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `dateInsert` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `dateCreation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateModification` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idMember` int(11) NOT NULL,
  `ifPublicGallery` varchar(5) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`idGallery`, `dateCreation`, `dateModification`, `idMember`, `ifPublicGallery`, `tags`, `name`, `description`) VALUES
(16, '2020-04-14 12:46:27', '0000-00-00 00:00:00', 1, 'no', 'youpi', 'Champi', 'ma passion les bollets'),
(17, '2020-04-26 16:11:59', '0000-00-00 00:00:00', 1, '', 'lausanne', 'Cathedrale', 'youpi un soir de novembre vers 2h du matin'),
(19, '2020-05-08 22:12:26', '0000-00-00 00:00:00', 1, 'no', '', 'Skydiving', 'Mon sport préféré'),
(22, '2020-05-11 16:13:52', '0000-00-00 00:00:00', 1, 'no', '', 'youpi', 'super galleries'),
(23, '2020-05-10 10:26:47', '0000-00-00 00:00:00', 1, '', '', 'Petit minou', ''),
(24, '2020-05-11 13:26:56', '0000-00-00 00:00:00', 1, '', '', 'fantasyie', '');

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
  `since` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
  `idMCode` varchar(64) NOT NULL,
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

INSERT INTO `members` (`idMember`, `idMCode`, `pseudo`, `--- connection ---`, `password`, `lostPassCode`, `dateRequestRegeneratePass`, `email`, `emailChange`, `validationEmailCode`, `ifEmailConfirmed`, `validationCodeNewEmail`, `dateRequestChangeEmail`, `doubleAuthentificationCode`, `dateDoubleAuthentification`, `--- perso ---`, `job`, `skills`, `age`, `sex`, `sports`, `hobbies`, `--- contact ---`, `phonePerso`, `phonePro`, `skypePseudo`, `--- social ---`, `websitePerso`, `websitePro`, `socialLink1`, `socialLink2`, `socialLink3`, `-- delet accunt ---`, `ifDeletAccunt`, `dateAskDeletion`, `commentDelete`) VALUES
(1, 'ce835a31e1491c9e59e0e9bbe319cab2', 'Heart Chakra', '', '3e14f1fd1d0475b33ccd4a32db76bc7d', '', '0000-00-00 00:00:00', 'intelligenza@protonmail.com', '', 'be931d169953cbf2dc9762b6aae4550f', 'yes', '', '0000-00-00 00:00:00', 68412, '2020-04-26 19:46:38', '', 'Data Juggler ', 'PHP 7.4, HTML5, CSS3, jQuery, MYSQL, Javascript, Ajax    ', 46, 'Man', 'Skydiving, vélo ski', 'Permaculture', '', '+41 76 456 34 34', '+41 079 234 45 45', 'pierluigi', '', 'https://pierluigi.ch', 'https://www.intelligenza.pro', 'https://www.youtube.com/pierluigi', 'https://www.twitter.com/pierluigi', 'https://www.facebook.com/pierluigi', '', '', '0000-00-00 00:00:00', ''),
(25, '67ee2acb0dbb3f6129a0595019f2b19f', 'victoria', '', 'e4a45dcbb38f7204ae94693f925929d6', '', '0000-00-00 00:00:00', 'pierluigdi.neva@gmail.com', '', '12d907452c9c6054f8b45cda7b46dd4a', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(26, '737e67ca0c43c1bd0e5432d75134dc1c', 'Fleur', '', 'e696192837318837521a7bd69983956e', '', '0000-00-00 00:00:00', 'pierlusigi.neva@gmail.coms', '', '7155176e2cd0d22aaaa8821608be4dd0', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(29, '5ac00e59afaba69811f10c6110bdf771', 'Fsociety', '', 'b1e667238f9d214623d135c184c5d422', '', '0000-00-00 00:00:00', 'team@fsociety.org', '', '6ff3e1c2b7176336a328b7365a287e01', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', '', 0, 'Woman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(30, 'ef2d9f74afc61e87736076f82506804b', 'Little Bird', '', '1bfb8fb1a787f2abd15bd2fd66f05866', '', '0000-00-00 00:00:00', 'member@intelligenza.pro', '', '4ef3e35741a7ecaae32268187ad614e4', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 'webdesigner', 'Design CSS HTML', 35, 'Woman', 'Swiming', 'Informatique', '', '079 345 56 23', '', '', '', 'https://www.ctp.ch', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(31, '6c3660305c8f7a02a107359e3df78304', 'Sophia', '', '7a5cfe244a53bff543289ad73a3917c1', '', '0000-00-00 00:00:00', 'pierluigi.neva@gmail.com', '', '3d3022f83c23246bdf04676e1a174526', 'yes', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 'UX Designer', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `members_blocked`
--

CREATE TABLE `members_blocked` (
  `id` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idMemberBlocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members_friends`
--

CREATE TABLE `members_friends` (
  `id` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idMemberFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_friends`
--

INSERT INTO `members_friends` (`id`, `idMember`, `idMemberFriend`) VALUES
(16, 31, 1),
(29, 25, 1),
(34, 30, 1),
(53, 1, 31),
(55, 1, 30),
(58, 26, 1),
(59, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `members_groups`
--

CREATE TABLE `members_groups` (
  `idGroup` int(11) NOT NULL,
  `active` varchar(5) NOT NULL,
  `idMember` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members_groupsUsers`
--

CREATE TABLE `members_groupsUsers` (
  `idGroupsUser` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `rigths` varchar(64) NOT NULL
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
  `ifProfileAllPrivate` varchar(5) NOT NULL,
  `ifPublicPost` varchar(5) NOT NULL,
  `ifPublicFriendList` varchar(5) NOT NULL,
  `ifPublicVideo` varchar(5) NOT NULL,
  `ifPublicPhoto` varchar(5) NOT NULL,
  `ifShowFonction` varchar(5) NOT NULL,
  `ifShowSkills` varchar(5) NOT NULL,
  `ifShowAge` varchar(5) NOT NULL,
  `ifShowSex` varchar(5) NOT NULL,
  `ifShowSports` varchar(5) NOT NULL,
  `ifShowHobbies` varchar(5) NOT NULL,
  `ifShowEmail` varchar(5) NOT NULL,
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

INSERT INTO `members_intel` (`idIntelMember`, `ipUser`, `idMember`, `dateInscription`, `rights`, `subRights`, `avatar`, `bgProfile`, `--- communication —`, `ifMP`, `ifUseEmail`, `emailServer`, `passEmailServer`, `ifNotyUp`, `--- parametre account ---`, `ifProfileAllPrivate`, `ifPublicPost`, `ifPublicFriendList`, `ifPublicVideo`, `ifPublicPhoto`, `ifShowFonction`, `ifShowSkills`, `ifShowAge`, `ifShowSex`, `ifShowSports`, `ifShowHobbies`, `ifShowEmail`, `ifShowPhonePerso`, `ifShowPhonePro`, `ifShowSkype`, `ifShowWebsitePerso`, `ifShowWebsitePro`, `ifShowSocialLink1`, `ifShowSocialLink2`, `ifShowSocialLink3`, `ifShowName`, `ifShowPhone`, `ifShowEntryCode`, `ifShowStreet`, `ifShowZipCode`, `ifShowCity`, `ifShowState`, `ifShowCountry`, `--- preference ---`, `languagePref`, `deliverySchedule`, `preferedHours`, `--- ftp ---`) VALUES
(1, '31.165.24.94', 1, '2020-03-05 21:13:08', 'Administrator', '', 'avatar_sunEtredeLumiere.jpg', 'bg_sunEtredeLumiere_youtube.jpg', '', 'yes', 'yes', 'pierluigi@intelligenza.pro', 'v3bMdXkt', 'no', '', 'no', 'no', 'yes', 'no', 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', 'yes', 'yes', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', '', '', '', 'no', '', 'ru', '', '', ''),
(11, '31.165.24.94', 25, '2020-05-13 20:53:21', 'Member', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '31.165.24.94', 26, '2020-05-13 21:03:43', 'Member', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '31.165.24.94', 29, '2020-05-13 21:43:05', 'Administrator', 'Alpha', '', '', '', 'no', '', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '31.165.24.94', 30, '2020-05-13 22:20:44', 'Member', '', '9.jpg', '', '', 'no', '', '', '', 'yes', '', 'no', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '45.82.223.50', 31, '2020-05-13 22:46:54', 'Member', '', 'girl.jpg', '', '', 'no', '', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members_tags`
--

CREATE TABLE `members_tags` (
  `id` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idMemberTagged` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_tags`
--

INSERT INTO `members_tags` (`id`, `idMember`, `idMemberTagged`, `tags`) VALUES
(23, 1, 31, '3'),
(24, 31, 1, ''),
(27, 1, 30, '2'),
(28, 30, 1, ''),
(31, 1, 25, ''),
(32, 25, 1, '');

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

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`idPhoto`, `idMember`, `idPost`, `idBlog`, `idLabel`, `idGallery`, `type`, `tag`, `photoName`, `title`, `description`) VALUES
(23, 1, 0, 0, 0, 17, '', '', '738.jpg', '', ''),
(24, 1, 0, 0, 0, 17, '', '', '734.jpg', '', ''),
(25, 1, 0, 0, 0, 17, '', '', '737.jpg', '', ''),
(26, 1, 0, 0, 0, 17, '', '', '739.jpg', '', ''),
(27, 1, 0, 0, 0, 17, '', '', '740.jpg', '', ''),
(28, 1, 0, 0, 0, 17, '', '', '735.jpg', '', ''),
(29, 1, 0, 0, 0, 17, '', '', '736.jpg', '', ''),
(30, 1, 0, 0, 0, 17, '', '', '726.jpg', '', ''),
(31, 1, 0, 0, 0, 17, '', '', '728.jpg', '', ''),
(32, 1, 0, 0, 0, 17, '', '', '731.jpg', '', ''),
(33, 1, 0, 0, 0, 17, '', '', '729.jpg', '', ''),
(34, 1, 0, 0, 0, 17, '', '', '727.jpg', '', ''),
(35, 1, 0, 0, 0, 17, '', '', '730.jpg', '', ''),
(37, 1, 0, 0, 0, 17, '', '', '733.jpg', '', ''),
(65, 1, 0, 0, 0, 16, '', '', 'champi_1.jpg', '', ''),
(66, 1, 0, 0, 0, 16, '', '', 'champi_6.jpg', '', ''),
(67, 1, 0, 0, 0, 16, '', '', 'champi_9.jpg', '', ''),
(68, 1, 0, 0, 0, 16, '', '', 'champi_2.jpg', '', ''),
(69, 1, 0, 0, 0, 16, '', '', 'champi_12.jpg', '', ''),
(70, 1, 0, 0, 0, 16, '', '', 'champi_5.jpg', '', ''),
(71, 1, 0, 0, 0, 16, '', '', 'champi_10.jpg', '', ''),
(72, 1, 0, 0, 0, 16, '', '', 'champi_3.jpg', '', ''),
(73, 1, 0, 0, 0, 16, '', '', 'champi_8.jpg', '', ''),
(74, 1, 0, 0, 0, 16, '', '', 'champi_14.jpg', '', ''),
(75, 1, 0, 0, 0, 16, '', '', 'champi_19.jpg', '', ''),
(76, 1, 0, 0, 0, 16, '', '', 'champi_4.jpg', '', ''),
(77, 1, 0, 0, 0, 16, '', '', 'champi_7.jpg', '', ''),
(78, 1, 0, 0, 0, 16, '', '', 'champi_13.jpg', '', ''),
(79, 1, 0, 0, 0, 16, '', '', 'champi_15.jpg', '', ''),
(80, 1, 0, 0, 0, 16, '', '', 'champi_17.jpg', '', ''),
(81, 1, 0, 0, 0, 16, '', '', 'champi_11.jpg', '', ''),
(82, 1, 0, 0, 0, 16, '', '', 'champi_18.jpg', '', ''),
(83, 1, 0, 0, 0, 16, '', '', 'champi_20.jpg', '', ''),
(84, 1, 0, 0, 0, 16, '', '', 'champi_16.jpg', '', ''),
(85, 1, 0, 0, 0, 19, '', '', 'moi_re_sky.png', '', ''),
(87, 8, 0, 0, 0, 21, '', '', 'myPassport.jpg', '', ''),
(88, 8, 0, 0, 0, 21, '', '', 'myPassport.jpg', '', ''),
(89, 1, 0, 0, 0, 19, '', '', 'myPassport.jpg', '', ''),
(90, 1, 0, 0, 0, 0, '', '', 'myPassport.jpg', '', ''),
(91, 1, 0, 0, 0, 19, '', '', 'mortDeRire.png', '', ''),
(92, 1, 0, 0, 0, 0, '', '', 'moiHorsDeLeurCercle.png', '', ''),
(95, 8, 0, 0, 0, 0, '', '', 'avatarPierluigiFlo.png', '', ''),
(96, 8, 0, 0, 0, 0, '', '', 'moiHorsDeLeurCercle.png', '', ''),
(97, 1, 0, 0, 0, 22, '', '', 'IMG_20140731_0017.jpg', '', ''),
(98, 1, 0, 0, 0, 22, '', '', 'IMG_20140731_0019.jpg', '', ''),
(99, 1, 0, 0, 0, 22, '', '', 'IMG_20140731_0022.jpg', '', ''),
(100, 1, 0, 0, 0, 22, '', '', 'IMG_20140731_0018.jpg', '', ''),
(101, 1, 0, 0, 0, 22, '', '', 'IMG_20140731_0020.jpg', '', ''),
(103, 1, 0, 0, 0, 0, '', '', 'avatarPierluigiFlo.png', '', ''),
(104, 16, 0, 0, 0, 0, '', '', 'girl.jpg', '', ''),
(105, 1, 0, 0, 0, 23, '', '', 'F51AE0CB-0A85-4282-95A0-5440942DE047.jpeg', '', ''),
(106, 1, 0, 0, 0, 23, '', '', '95EB7901-2F25-4569-B2C9-80AF0EF20196.jpeg', '', ''),
(107, 31, 0, 0, 0, 0, '', '', 'girl.jpg', '', ''),
(110, 30, 0, 0, 0, 0, '', '', '9.jpg', '', ''),
(111, 1, 0, 0, 0, 0, '', '', 'myPassport.jpg', '', ''),
(112, 1, 0, 0, 0, 0, '', '', 'myPassport.jpg', '', ''),
(113, 1, 0, 0, 0, 0, '', '', 'myPassport.jpg', '', ''),
(114, 1, 0, 0, 0, 0, '', '', 'myPassport.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `idMember` int(11) NOT NULL,
  `article_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `timeStamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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

--
-- Dumping data for table `site_blackList_pseudo`
--

INSERT INTO `site_blackList_pseudo` (`idBlackListePseudo`, `pseudo`) VALUES
(11, 'Data Juggler'),
(12, 'intelligenza'),
(13, 'ai'),
(14, 'ia'),
(15, 'Pierluigi Abloc'),
(16, 'Être de Lumière'),
(17, 'Pierluigi'),
(20, 'ia');

-- --------------------------------------------------------

--
-- Table structure for table `site_blackList_user`
--

CREATE TABLE `site_blackList_user` (
  `idBlackListUser` int(11) NOT NULL,
  `ipUser` varchar(255) NOT NULL,
  `idMember` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
(25, ' CON '),
(26, ' PIPI '),
(27, ' PIPI ');

-- --------------------------------------------------------

--
-- Table structure for table `site_noty`
--

CREATE TABLE `site_noty` (
  `idNoty` int(11) NOT NULL,
  `idFrom` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateNoty` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateNotyUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
(10, 0, 1, '2020-05-13 21:17:14', '2020-05-13 21:17:14', 'notyUp', '', 'welcome', 'Welcome', 'Great health and good job', ''),
(11, 0, 30, '2020-05-13 22:20:44', '2020-05-13 22:20:44', 'notyUp', '', 'welcome', 'Welcome', 'Great health and good job', ''),
(12, 0, 29, '2020-05-13 22:20:44', '2020-05-13 22:20:44', 'notyUp', '', 'welcome', 'Welcome', 'Great health and good job', ''),
(13, 0, 31, '2020-05-13 22:46:54', '2020-05-13 22:46:54', 'notyUp', '', 'welcome', 'Welcome', 'Great health and good job', ''),
(14, 0, 1, '2020-05-24 09:15:19', '0000-00-00 00:00:00', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', ''),
(15, 0, 1, '2020-05-24 19:30:48', '0000-00-00 00:00:00', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', ''),
(16, 0, 1, '2020-05-28 15:27:19', '2020-05-28 15:27:19', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', ''),
(18, 1, 29, '2020-06-01 22:44:38', '2020-06-01 22:44:38', 'notyUp', '', 'friends', 'Congratulation', 'Fsociety has accepted your request!', ''),
(19, 1, 29, '2020-06-01 22:49:29', '2020-06-01 22:49:29', 'notyUp', '', 'friends', 'Congratulation', 'Heart Chakra has accepted your request!', ''),
(21, 1, 29, '2020-06-01 22:52:04', '2020-06-01 22:52:04', 'notyUp', '', 'friends', 'Congratulation', 'Heart Chakra has accepted your request!', ''),
(22, 31, 1, '2020-06-01 22:58:45', '2020-06-01 23:01:54', 'notyUp', '', 'friends', 'Congratulations!', 'Sophia has accepted your friend request', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1'),
(23, 1, 31, '2020-06-02 01:45:24', '2020-06-02 01:45:24', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(24, 1, 31, '2020-06-02 01:45:24', '2020-06-02 01:45:24', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', 'profileEdit.php?editFriend=1'),
(25, 0, 25, '2020-06-02 13:35:18', '2020-06-02 13:35:18', 'notyUp', '', 'friends', 'Congratulations!', ' has accepted your friend request', ''),
(26, 0, 25, '2020-06-02 13:35:18', '2020-06-02 13:35:18', 'notyUp', '', 'friends', 'Congratulations!', ' has accepted your friend request', 'profileEdit.php?editFriend=1'),
(27, 1, 25, '2020-06-02 13:36:13', '2020-06-02 13:36:13', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(28, 1, 25, '2020-06-02 13:36:13', '2020-06-02 13:36:13', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', 'profileEdit.php?editFriend=1'),
(29, 1, 31, '2020-06-02 18:30:38', '2020-06-02 18:30:38', 'notyUp', '', 'friends', 'Refused!', 'Heart Chakra has Refused your friend request', 'profileEdit.php?editFriend=1'),
(30, 1, 29, '2020-06-02 19:17:34', '2020-06-02 19:17:34', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(31, 1, 29, '2020-06-02 19:17:55', '2020-06-02 19:17:55', 'notyUp', '', 'friends', 'Refused!', 'Heart Chakra has Refused your friend request', 'profileEdit.php?editFriend=1'),
(32, 1, 25, '2020-06-02 21:25:56', '2020-06-02 21:25:56', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(33, 1, 26, '2020-06-02 22:58:13', '2020-06-02 22:58:13', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(34, 1, 25, '2020-06-02 23:09:42', '2020-06-02 23:09:42', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(35, 1, 25, '2020-06-02 23:09:58', '2020-06-02 23:09:58', 'notyUp', '', 'friends', 'Refused!', 'Heart Chakra has Refused your friend request', 'profileEdit.php?editFriend=1'),
(36, 1, 25, '2020-06-02 23:12:40', '2020-06-02 23:12:40', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(37, 1, 25, '2020-06-03 00:01:05', '2020-06-03 00:01:05', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(38, 1, 25, '2020-06-03 00:13:38', '2020-06-03 00:13:38', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(39, 1, 25, '2020-06-03 00:16:32', '2020-06-03 00:16:32', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(40, 1, 26, '2020-06-03 00:56:27', '2020-06-03 00:56:27', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(41, 1, 30, '2020-06-03 00:56:37', '2020-06-03 00:56:37', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(42, 1, 26, '2020-06-03 14:18:21', '2020-06-03 14:18:21', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(43, 1, 30, '2020-06-03 14:19:01', '2020-06-03 14:19:01', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(44, 1, 30, '2020-06-03 16:55:25', '2020-06-03 16:55:25', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(45, 1, 30, '2020-06-03 16:56:06', '2020-06-03 16:56:06', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(46, 1, 25, '2020-06-03 17:09:06', '2020-06-03 17:09:06', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(47, 1, 26, '2020-06-03 17:15:36', '2020-06-03 17:15:36', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(48, 1, 30, '2020-06-03 17:16:33', '2020-06-03 17:16:33', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(49, 1, 25, '2020-06-03 17:26:12', '2020-06-03 17:26:12', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(50, 1, 31, '2020-06-03 18:21:57', '2020-06-03 18:21:57', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(51, 1, 25, '2020-06-03 18:21:59', '2020-06-03 18:21:59', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(52, 1, 30, '2020-06-03 18:22:02', '2020-06-03 18:22:02', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(53, 1, 30, '2020-06-03 19:46:00', '2020-06-03 19:46:00', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(54, 1, 30, '2020-06-03 19:46:35', '2020-06-03 19:46:35', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(55, 1, 31, '2020-06-03 19:47:59', '2020-06-03 19:47:59', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(56, 1, 25, '2020-06-03 19:48:02', '2020-06-03 19:48:02', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(57, 1, 30, '2020-06-03 19:48:04', '2020-06-03 19:48:04', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(58, 1, 26, '2020-06-03 19:48:05', '2020-06-03 19:48:05', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(59, 30, 1, '2020-06-04 00:42:17', '2020-06-04 00:42:17', 'notyUp', '', 'friends', 'Coucou', 'je t&rsquo;aime ::', ''),
(60, 30, 1, '2020-06-04 00:44:28', '2020-06-04 00:44:28', 'notyUp', '', 'friends', 'Ti amo', 'dinner ce soir 20h a toute', 'https://restaurant-lamaryllis.com/'),
(61, 1, 30, '2020-06-04 00:47:41', '2020-06-04 00:47:41', 'notyUp', '', 'friends', 'je t&rsquo;aime pour ta sincérité', 'merci d&rsquo;être là a toute super le resto nickel a 20h', ''),
(62, 1, 26, '2020-06-04 12:02:31', '2020-06-04 12:02:31', 'notyUp', '', 'friends', 'Youpi on a gagné', 'je t&rsquo;aime mon petit coeur', ''),
(63, 1, 30, '2020-06-04 12:12:13', '2020-06-04 12:12:13', 'notyUp', '', 'friends', 'Ciao mon petit bird', 'd&rsquo;amour', ''),
(64, 1, 31, '2020-06-04 12:20:58', '2020-06-04 12:20:58', 'notyUp', '', 'friends', 'coucou', 'salut tu me manque', ''),
(65, 1, 26, '2020-06-04 13:35:56', '2020-06-04 13:35:56', 'notyUp', '', 'friends', 'Refused!', 'Heart Chakra has Refused your friend request', 'gatheringPeople.php'),
(66, 30, 1, '2020-06-04 13:45:50', '2020-06-04 13:45:50', 'notyUp', '', 'friends', 'Youpi je t&rsquo;aime', 'merci d&rsquo;être là', ''),
(67, 1, 25, '2020-06-04 13:47:29', '2020-06-04 13:47:29', 'notyUp', '', 'friends', 'Congratulations!', 'Heart Chakra has accepted your friend request', ''),
(68, 0, 1, '2020-06-04 15:50:07', '2020-06-04 15:50:07', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', ''),
(69, 0, 1, '2020-06-09 06:43:58', '2020-06-09 06:43:58', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', ''),
(70, 0, 1, '2020-06-09 13:29:59', '2020-06-09 13:29:59', 'notyUp', '', 'Login Try', 'Someone has login in try', 'Hello check your try intelligenza site!', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_notySawByUser`
--

CREATE TABLE `site_notySawByUser` (
  `idWhoSawNoty` int(11) NOT NULL,
  `idMemberWhoSawNoty` int(11) NOT NULL,
  `idNoty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_notySawByUser`
--

INSERT INTO `site_notySawByUser` (`idWhoSawNoty`, `idMemberWhoSawNoty`, `idNoty`) VALUES
(20, 1, 1),
(21, 16, 7),
(22, 1, 15),
(23, 1, 14),
(24, 29, 18),
(25, 29, 19),
(26, 30, 57),
(27, 30, 54),
(28, 30, 53),
(29, 30, 52),
(30, 30, 48),
(31, 30, 45),
(32, 30, 44);

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
  `ifRememberMe` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `site_settings` (`idSetting`, `activeDbSettings`, `--- app ---`, `publicKey`, `privateKey`, `app_version`, `app_version_date`, `-- config --`, `ifActivePsp`, `ifKillAllSessionBlockLogin`, `ifLimitToComingSoon`, `ifOnlyApp`, `ifBlockNewRegistration`, `ifLocalSite`, `urlRoot`, `nameProject`, `faviconProject`, `logoProject`, `logoHProject`, `logoEmailProject`, `logoPdfProject`, `emailContactProject`, `emailComEmailProject`, `dateCountDownProject`, `sinceOrUntilCountDownProject`, `ifRememberMe`, `timeRememberMe`, `timeConnection`, `limitTimeProcessDoubleAndLost`, `limitTimeBlackList`, `ifLimitAge`, `limitAge`, `ifDoubleAuthentification`, `ifDemandSecurePassword`, `ifDemandSecureEmail`, `secureWebMail`, `ifActiveAcceptCookies`, `ifLookSelectAndRightClic`, `ifSharingFolder`, `limitSizePublicFolder`, `ifGathering`, `--- audio ---`, `ifUseAudio`, `volume`, `-- back end styles --`, `linkColor`, `linkColorOver`, `linkColorActive`, `linkColorVisited`, `selectionColorBg`, `selectionColor`, `bgProfileHeader`, `avatarProfile`, `-- front end styles --`, `bgRegister`, `bgLogin`, `bgComingSoon`, `bgPrivacy`, `bgTerms`, `bgAirlock`, `bgLostPass`, `bgFaq`, `bgContact`, `--- users ---`, `ifMembersUseKnowledges`, `ifMembersUseWallet`, `ifMembersUseLabel`, `ifMembersUseMyFolder`, `limitSizeMyFolder`, `-- money --`, `paypal`, `IBAN`, `BIC`, `-- cron tasks --`, `activeCronTasks`, `cronReport`, `emailReportCronTasks`) VALUES
(77, 'yes', '', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'v1.0', '2020-05-01 16:18:33', '', 'no', 'no', 'no', 'no', 'no', 'no', 'https://intelligenza.pro', 'intelligenza', 'intel/iconeColor_devPerso.png', 'intel/logoCouleurs_600.png', 'intel/logoApp.png', 'intel/logoCouleurs_600.png', 'intel/logoApp.png', 'team@intelligenza.pro', 'team@intelligenza.pro', '2020,04,11', 'until', 'yes', 86400, 300, 180, 86400, 'no', '14', 'no', 'no', 'no', 'protonmail.com/tutanota.com/posteo.de/mailfence.com/startmail.com/mailbox.org', 'no', 'yes', 'no', 1000, 'no', '', 'no', 9, '', '#3399ff', '#64b2ff', '#ffa500', '#64b2ff', 'white', 'black', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 100, '', 'https://www.paypal.com/cgi-bin/webscrcmd_s-xclickhosted_button_id4JGTFVZMJHM66sourceurl', '', '', '', 'yes', 'yes', 'email@free.com');

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
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_stats_links`
--

INSERT INTO `site_stats_links` (`idClic`, `id`, `idType`, `idLabel`, `ipUser`, `userAgent`, `page`, `time`, `cible`, `country`, `language`) VALUES
(18, 0, 'download', 0, '31.165.24.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'comingSoon', '2020-05-18 17:50:53', 'zip/intelligenzaAppV1.0.zip', 'Switzerland', 'en'),
(19, 0, 'download', 0, '31.165.24.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'comingSoon', '2020-05-18 17:51:13', 'zip/intelligenzaAppV1.0.zip', 'Switzerland', 'en'),
(20, 0, 'download', 0, '31.165.24.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'readme', '2020-05-18 17:53:32', 'zip/intelligenzaAppV1.0.zip', 'html', 'html'),
(21, 0, 'download', 0, '31.165.24.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'readme', '2020-05-18 18:55:35', 'zip/intelligenzaAppV1.0.zip', 'html', 'html');

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

--
-- Dumping data for table `site_stats_visits`
--

INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(1, 0, '46.229.168.149', '2020-05-15 15:51:19', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2, 0, '5.157.59.211', '2020-05-15 15:51:32', '', 'https://www.intelligenza.pro', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(7, 0, '31.165.24.94', '2020-05-15 16:36:38', '', 'https://intelligenza.pro/admin/analytics.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(8, 0, '192.255.109.179', '2020-05-15 17:35:01', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(9, 0, '31.165.24.94', '2020-05-15 19:02:37', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(10, 0, '31.165.24.94', '2020-05-15 19:02:40', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(11, 0, '31.165.24.94', '2020-05-15 19:02:44', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(12, 0, '196.52.84.7', '2020-05-15 19:03:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(13, 0, '196.52.84.7', '2020-05-15 19:03:57', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(14, 0, '196.52.84.7', '2020-05-15 19:04:00', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(15, 0, '196.52.84.7', '2020-05-15 19:04:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(16, 0, '196.52.84.24', '2020-05-15 20:28:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(17, 0, '196.52.84.24', '2020-05-15 20:28:00', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(18, 0, '196.52.84.24', '2020-05-15 20:28:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(19, 0, '196.52.84.24', '2020-05-15 20:28:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(20, 0, '5.140.233.250', '2020-05-15 20:57:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(21, 0, '5.140.233.250', '2020-05-15 20:57:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(22, 0, '31.165.24.94', '2020-05-15 21:00:50', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(23, 0, '31.165.24.94', '2020-05-15 21:00:50', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(24, 0, '31.165.24.94', '2020-05-15 21:00:53', '', 'https://intelligenza.pro/index.php?', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(25, 0, '31.165.24.94', '2020-05-15 21:00:53', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(26, 0, '31.165.24.94', '2020-05-15 21:00:53', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(27, 0, '31.165.24.94', '2020-05-15 21:00:55', '', 'https://intelligenza.pro/index.php?', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(28, 0, '31.165.24.94', '2020-05-15 21:00:55', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(29, 0, '31.165.24.94', '2020-05-15 21:00:55', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(30, 0, '31.165.24.94', '2020-05-15 21:00:57', '', 'https://intelligenza.pro/index.php?', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(31, 0, '31.165.24.94', '2020-05-15 21:00:57', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(32, 0, '31.165.24.94', '2020-05-15 21:00:57', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(33, 0, '31.165.24.94', '2020-05-15 21:00:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(34, 0, '31.165.24.94', '2020-05-15 21:00:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(35, 0, '31.165.24.94', '2020-05-15 21:01:01', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(36, 0, '31.165.24.94', '2020-05-15 21:01:01', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(37, 0, '31.165.24.94', '2020-05-15 21:01:05', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(38, 0, '31.165.24.94', '2020-05-15 21:02:14', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(39, 0, '31.165.24.94', '2020-05-15 21:02:14', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(40, 0, '31.165.24.94', '2020-05-15 21:02:16', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(41, 0, '31.165.24.94', '2020-05-15 21:02:16', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(42, 0, '31.165.24.94', '2020-05-15 21:02:17', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(43, 0, '31.165.24.94', '2020-05-15 21:02:18', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(44, 0, '31.165.24.94', '2020-05-15 21:02:18', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(45, 0, '31.165.24.94', '2020-05-15 21:02:19', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(46, 0, '31.165.24.94', '2020-05-15 21:02:19', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(47, 0, '31.165.24.94', '2020-05-15 21:02:24', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(48, 0, '94.102.51.78', '2020-05-15 21:31:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(49, 0, '94.102.51.78', '2020-05-15 21:31:21', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(50, 0, '94.102.51.78', '2020-05-15 21:31:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(51, 0, '179.43.176.213', '2020-05-16 01:50:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(52, 0, '179.43.176.213', '2020-05-16 01:50:45', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(53, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(54, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(55, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(56, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(57, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(58, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(59, 0, '179.43.176.213', '2020-05-16 01:50:46', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(60, 0, '64.150.163.165', '2020-05-16 02:48:07', '', 'https://intelligenza.pro/wp-login.php', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(61, 0, '196.52.84.24', '2020-05-16 04:22:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(62, 0, '196.52.84.24', '2020-05-16 04:22:44', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(63, 0, '196.52.84.24', '2020-05-16 04:22:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(64, 0, '196.52.84.24', '2020-05-16 04:22:45', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(65, 0, '196.52.84.24', '2020-05-16 04:22:45', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(66, 0, '42.117.48.35', '2020-05-16 05:10:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(67, 0, '42.117.48.35', '2020-05-16 05:10:16', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(68, 0, '42.117.48.35', '2020-05-16 05:10:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(69, 0, '42.117.48.35', '2020-05-16 05:10:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(70, 0, '42.117.48.35', '2020-05-16 05:10:20', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(71, 0, '42.117.48.35', '2020-05-16 05:10:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(72, 0, '42.117.48.35', '2020-05-16 05:10:23', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(73, 0, '42.117.48.35', '2020-05-16 05:10:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(74, 0, '42.117.48.35', '2020-05-16 05:10:25', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(75, 0, '164.132.161.178', '2020-05-16 05:45:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(76, 0, '164.132.161.178', '2020-05-16 05:45:04', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(77, 0, '164.132.161.178', '2020-05-16 05:45:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(78, 0, '207.46.13.121', '2020-05-16 06:32:10', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(79, 0, '209.17.96.210', '2020-05-16 06:43:00', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(80, 0, '46.229.168.132', '2020-05-16 07:34:03', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(81, 0, '46.229.168.139', '2020-05-16 07:34:05', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(82, 0, '35.240.48.220', '2020-05-16 08:46:53', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(83, 0, '35.240.48.220', '2020-05-16 08:46:53', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(84, 0, '54.36.148.42', '2020-05-16 09:16:40', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(85, 0, '46.229.168.162', '2020-05-16 10:39:59', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(86, 0, '178.159.37.88', '2020-05-16 11:06:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(87, 0, '178.159.37.88', '2020-05-16 11:06:20', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(88, 0, '178.159.37.88', '2020-05-16 11:06:21', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(89, 0, '178.159.37.88', '2020-05-16 11:06:21', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(90, 0, '178.159.37.88', '2020-05-16 11:06:21', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(91, 0, '31.165.24.94', '2020-05-16 11:54:26', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(92, 0, '31.165.24.94', '2020-05-16 11:54:27', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(93, 0, '196.52.84.24', '2020-05-16 12:18:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(94, 0, '196.52.84.24', '2020-05-16 12:18:18', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(95, 0, '196.52.84.24', '2020-05-16 12:18:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(96, 0, '196.52.84.24', '2020-05-16 12:18:18', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(97, 0, '196.52.84.24', '2020-05-16 12:18:21', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(98, 0, '17.58.97.136', '2020-05-16 12:21:16', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(99, 0, '31.165.24.94', '2020-05-16 12:36:11', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(100, 0, '31.165.24.94', '2020-05-16 12:36:11', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(101, 0, '31.165.24.94', '2020-05-16 12:58:24', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(102, 0, '31.165.24.94', '2020-05-16 12:58:24', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(103, 0, '31.165.24.94', '2020-05-16 12:58:24', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(104, 0, '31.165.24.94', '2020-05-16 12:59:52', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(105, 0, '31.165.24.94', '2020-05-16 12:59:52', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(106, 0, '31.165.24.94', '2020-05-16 13:00:32', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(107, 0, '31.165.24.94', '2020-05-16 13:00:32', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(108, 0, '31.165.24.94', '2020-05-16 13:01:26', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(109, 0, '31.165.24.94', '2020-05-16 13:01:26', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(110, 0, '31.165.24.94', '2020-05-16 13:03:56', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(111, 0, '31.165.24.94', '2020-05-16 13:03:56', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(112, 0, '31.165.24.94', '2020-05-16 13:04:02', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(113, 0, '66.249.64.144', '2020-05-16 16:00:47', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(114, 0, '66.249.64.144', '2020-05-16 16:10:54', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(115, 0, '184.154.189.90', '2020-05-16 16:58:18', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(116, 0, '78.29.106.200', '2020-05-16 17:24:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(117, 0, '78.29.106.200', '2020-05-16 17:24:45', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(118, 0, '78.29.106.200', '2020-05-16 17:25:03', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(119, 0, '78.29.106.200', '2020-05-16 17:25:04', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(120, 0, '78.29.106.200', '2020-05-16 17:25:23', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(121, 0, '46.229.168.149', '2020-05-16 17:33:40', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(122, 0, '54.36.148.148', '2020-05-16 18:19:26', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(123, 0, '46.229.168.150', '2020-05-16 18:40:27', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(124, 0, '196.52.84.24', '2020-05-16 18:48:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(125, 0, '196.52.84.24', '2020-05-16 18:48:58', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(126, 0, '196.52.84.24', '2020-05-16 18:48:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(127, 0, '196.52.84.24', '2020-05-16 18:48:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(128, 0, '196.52.84.24', '2020-05-16 18:49:00', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(129, 0, '66.249.64.142', '2020-05-16 22:10:42', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(130, 0, '185.244.173.229', '2020-05-16 23:29:20', '', 'https://intelligenza.pro/wp-login.php', 'comingSoon', '', '', 'Firefox ', 'en', 'Russia', '', ''),
(131, 0, '185.108.106.202', '2020-05-17 00:32:10', '', 'https://intelligenza.pro/404.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(132, 0, '185.108.106.202', '2020-05-17 00:32:10', '', 'https://intelligenza.pro/index.php?ipChanged', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(133, 0, '185.108.106.202', '2020-05-17 00:32:31', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(134, 0, '185.108.106.202', '2020-05-17 00:32:32', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(135, 0, '185.108.106.202', '2020-05-17 00:32:32', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(136, 0, '185.108.106.202', '2020-05-17 00:32:36', '', 'https://intelligenza.pro/connect.php?', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(137, 0, '185.108.106.202', '2020-05-17 00:32:36', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(138, 0, '185.108.106.202', '2020-05-17 00:32:36', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(139, 0, '185.108.106.202', '2020-05-17 00:32:40', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(140, 0, '185.108.106.202', '2020-05-17 00:32:40', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(141, 0, '185.108.106.202', '2020-05-17 00:32:40', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(142, 0, '185.108.106.202', '2020-05-17 00:32:42', '', 'https://intelligenza.pro/connect.php?', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(143, 0, '185.108.106.202', '2020-05-17 00:32:43', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(144, 0, '185.108.106.202', '2020-05-17 00:32:43', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(145, 0, '185.108.106.202', '2020-05-17 00:32:49', '', 'https://intelligenza.pro/index.php?', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(146, 0, '185.108.106.202', '2020-05-17 00:32:49', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(147, 0, '185.108.106.202', '2020-05-17 00:32:49', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(148, 0, '185.108.106.202', '2020-05-17 00:32:51', '', 'https://intelligenza.pro/index.php?', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(149, 0, '185.108.106.202', '2020-05-17 00:32:52', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(150, 0, '185.108.106.202', '2020-05-17 00:32:52', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(151, 0, '185.108.106.202', '2020-05-17 00:32:56', '', 'https://intelligenza.pro/index.php?', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(152, 0, '185.108.106.202', '2020-05-17 00:32:56', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(153, 0, '185.108.106.202', '2020-05-17 00:32:57', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(154, 0, '185.108.106.202', '2020-05-17 00:32:58', '', 'https://intelligenza.pro/index.php?', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(155, 0, '185.108.106.202', '2020-05-17 00:32:58', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(156, 0, '185.108.106.202', '2020-05-17 00:32:58', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(157, 0, '185.108.106.202', '2020-05-17 00:32:59', '', 'https://intelligenza.pro/index.php?', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(158, 0, '185.108.106.202', '2020-05-17 00:32:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(159, 0, '185.108.106.202', '2020-05-17 00:32:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(160, 0, '185.108.106.202', '2020-05-17 00:33:01', '', 'https://intelligenza.pro/index.php?', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(161, 0, '185.108.106.202', '2020-05-17 00:33:01', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(162, 0, '185.108.106.202', '2020-05-17 00:33:01', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(163, 0, '185.108.106.202', '2020-05-17 00:33:02', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(164, 0, '185.108.106.202', '2020-05-17 00:33:02', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(165, 0, '185.108.106.202', '2020-05-17 00:33:03', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(166, 0, '185.108.106.202', '2020-05-17 00:33:09', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(167, 0, '115.79.196.85', '2020-05-17 00:38:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(168, 0, '115.79.196.85', '2020-05-17 00:38:59', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(169, 0, '115.79.196.85', '2020-05-17 00:39:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(170, 0, '196.52.84.35', '2020-05-17 00:58:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(171, 0, '196.52.84.35', '2020-05-17 00:58:24', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(172, 0, '196.52.84.35', '2020-05-17 00:58:24', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(173, 0, '196.52.84.35', '2020-05-17 00:58:24', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(174, 0, '196.52.84.35', '2020-05-17 00:58:24', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(175, 0, '185.234.219.246', '2020-05-17 01:16:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(176, 0, '185.234.219.246', '2020-05-17 01:16:04', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(177, 0, '198.71.239.15', '2020-05-17 03:16:08', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(178, 0, '198.71.239.15', '2020-05-17 03:16:08', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(179, 0, '198.71.239.15', '2020-05-17 03:16:08', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(180, 0, '13.82.92.196', '2020-05-17 06:06:48', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(181, 0, '13.82.92.196', '2020-05-17 06:09:21', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(182, 0, '13.82.92.196', '2020-05-17 06:09:22', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(183, 0, '13.82.92.196', '2020-05-17 06:09:23', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(184, 0, '13.82.92.196', '2020-05-17 06:09:24', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(185, 0, '13.82.92.196', '2020-05-17 06:09:25', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(186, 0, '13.82.92.196', '2020-05-17 06:09:26', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(187, 0, '13.82.92.196', '2020-05-17 06:09:26', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(188, 0, '13.82.92.196', '2020-05-17 06:09:27', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(189, 0, '13.82.92.196', '2020-05-17 06:09:28', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(190, 0, '13.82.92.196', '2020-05-17 06:09:29', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(191, 0, '13.82.92.196', '2020-05-17 06:09:29', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(192, 0, '13.82.92.196', '2020-05-17 06:09:30', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(193, 0, '13.82.92.196', '2020-05-17 06:09:31', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(194, 0, '13.82.92.196', '2020-05-17 06:09:32', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(195, 0, '13.82.92.196', '2020-05-17 06:09:32', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(196, 0, '13.82.92.196', '2020-05-17 06:09:33', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(197, 0, '13.82.92.196', '2020-05-17 06:09:34', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(198, 0, '13.82.92.196', '2020-05-17 06:09:34', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(199, 0, '13.82.92.196', '2020-05-17 06:09:35', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(200, 0, '13.82.92.196', '2020-05-17 06:09:36', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(201, 0, '13.82.92.196', '2020-05-17 06:09:36', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(202, 0, '13.82.92.196', '2020-05-17 06:09:37', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(203, 0, '13.82.92.196', '2020-05-17 06:09:38', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(204, 0, '2001:1c00:2201:35e0:21a3:280a:afc6:4104', '2020-05-17 08:58:56', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(205, 0, '5.44.169.215', '2020-05-17 09:03:00', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(206, 0, '5.44.169.215', '2020-05-17 09:03:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(207, 0, '196.52.84.35', '2020-05-17 09:28:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(208, 0, '196.52.84.35', '2020-05-17 09:28:07', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(209, 0, '196.52.84.35', '2020-05-17 09:28:08', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(210, 0, '196.52.84.35', '2020-05-17 09:28:08', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(211, 0, '196.52.84.35', '2020-05-17 09:28:08', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(212, 0, '31.165.24.94', '2020-05-17 11:38:10', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(213, 0, '31.165.24.94', '2020-05-17 11:38:10', '', 'https://intelligenza.pro/index.php?ipChanged', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(214, 0, '31.165.24.94', '2020-05-17 11:41:38', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(215, 0, '31.165.24.94', '2020-05-17 11:41:38', '', 'https://intelligenza.pro/index.php?ipChanged', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(216, 0, '31.165.24.94', '2020-05-17 11:41:43', '', 'https://intelligenza.pro/index.php?ipChanged', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(217, 0, '31.165.24.94', '2020-05-17 11:41:43', '', 'https://intelligenza.pro/index.php?ipChanged', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(218, 0, '31.165.24.94', '2020-05-17 11:41:43', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(219, 0, '31.165.24.94', '2020-05-17 11:41:47', '', 'https://intelligenza.pro/index.php?', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(220, 0, '31.165.24.94', '2020-05-17 11:41:47', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(221, 0, '31.165.24.94', '2020-05-17 11:41:48', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(222, 0, '31.165.24.94', '2020-05-17 11:41:49', '', 'https://intelligenza.pro/index.php?', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(223, 0, '31.165.24.94', '2020-05-17 11:41:49', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(224, 0, '31.165.24.94', '2020-05-17 11:41:49', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(225, 0, '31.165.24.94', '2020-05-17 11:41:50', '', 'https://intelligenza.pro/index.php?', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(226, 0, '31.165.24.94', '2020-05-17 11:41:50', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(227, 0, '31.165.24.94', '2020-05-17 11:41:50', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(228, 0, '31.165.24.94', '2020-05-17 11:41:51', '', 'https://intelligenza.pro/index.php?', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(229, 0, '31.165.24.94', '2020-05-17 11:41:51', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(230, 0, '31.165.24.94', '2020-05-17 11:41:51', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(231, 0, '31.165.24.94', '2020-05-17 11:41:55', '', 'https://intelligenza.pro/index.php?', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(232, 0, '31.165.24.94', '2020-05-17 11:41:55', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(233, 0, '31.165.24.94', '2020-05-17 11:41:55', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(234, 0, '31.165.24.94', '2020-05-17 11:42:03', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(235, 0, '31.165.24.94', '2020-05-17 11:42:03', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(236, 0, '31.165.24.94', '2020-05-17 11:42:03', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(237, 0, '31.165.24.94', '2020-05-17 11:42:06', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(238, 0, '31.165.24.94', '2020-05-17 11:42:06', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(239, 0, '31.165.24.94', '2020-05-17 11:42:36', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(240, 0, '31.165.24.94', '2020-05-17 11:42:36', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(241, 0, '31.165.24.94', '2020-05-17 11:42:36', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(242, 0, '31.165.24.94', '2020-05-17 11:42:38', '', 'https://intelligenza.pro/connect.php?', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(243, 0, '31.165.24.94', '2020-05-17 11:42:38', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(244, 0, '31.165.24.94', '2020-05-17 11:42:38', '', 'https://intelligenza.pro/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(245, 0, '31.165.24.94', '2020-05-17 11:42:46', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(246, 0, '31.165.24.94', '2020-05-17 11:42:46', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(247, 0, '31.165.24.94', '2020-05-17 11:42:46', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(248, 0, '31.165.24.94', '2020-05-17 11:42:51', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(249, 0, '31.165.24.94', '2020-05-17 11:43:02', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(250, 0, '31.165.24.94', '2020-05-17 11:43:05', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(251, 0, '31.165.24.94', '2020-05-17 11:43:12', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(252, 0, '31.165.24.94', '2020-05-17 11:43:15', '', 'https://intelligenza.pro/connect.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(253, 0, '31.165.24.94', '2020-05-17 11:43:18', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(254, 0, '31.165.24.94', '2020-05-17 11:43:33', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(255, 0, '31.165.24.94', '2020-05-17 11:43:34', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(256, 0, '31.165.24.94', '2020-05-17 11:43:35', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(257, 0, '31.165.24.94', '2020-05-17 11:43:39', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(258, 0, '31.165.24.94', '2020-05-17 11:43:40', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(259, 0, '31.165.24.94', '2020-05-17 11:43:48', '', 'https://intelligenza.pro/404.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(260, 0, '31.165.24.94', '2020-05-17 11:44:04', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(261, 0, '31.165.24.94', '2020-05-17 11:44:34', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(262, 0, '31.165.24.94', '2020-05-17 11:44:37', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(263, 0, '31.165.24.94', '2020-05-17 11:44:42', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(264, 0, '31.165.24.94', '2020-05-17 11:44:51', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(265, 0, '31.165.24.94', '2020-05-17 11:45:06', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(266, 0, '31.165.24.94', '2020-05-17 11:45:14', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(267, 0, '31.165.24.94', '2020-05-17 11:45:17', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(268, 0, '31.165.24.94', '2020-05-17 11:45:21', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(269, 0, '31.165.24.94', '2020-05-17 11:45:30', '', 'https://intelligenza.pro/404.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(270, 0, '31.165.24.94', '2020-05-17 11:45:31', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(271, 0, '31.165.24.94', '2020-05-17 11:45:45', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(272, 0, '31.165.24.94', '2020-05-17 12:27:04', '', 'https://intelligenza.pro/index.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(273, 0, '31.165.24.94', '2020-05-17 12:27:10', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(274, 0, '95.28.229.144', '2020-05-17 12:53:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(275, 0, '95.28.229.144', '2020-05-17 12:53:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(276, 0, '95.28.229.144', '2020-05-17 12:53:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(277, 0, '207.46.13.104', '2020-05-17 15:19:21', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(278, 0, '88.218.17.43', '2020-05-17 16:16:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(279, 0, '185.220.101.39', '2020-05-17 16:16:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(280, 0, '185.220.101.39', '2020-05-17 16:16:50', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(281, 0, '77.243.191.18', '2020-05-17 16:42:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(282, 0, '77.243.191.18', '2020-05-17 16:42:24', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(283, 0, '77.243.191.18', '2020-05-17 16:42:26', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(284, 0, '77.243.191.18', '2020-05-17 16:42:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(285, 0, '176.114.153.111', '2020-05-17 17:21:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(286, 0, '176.114.153.111', '2020-05-17 17:21:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(287, 0, '176.114.153.111', '2020-05-17 17:21:38', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(288, 0, '196.52.84.35', '2020-05-17 17:25:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(289, 0, '196.52.84.35', '2020-05-17 17:25:20', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(290, 0, '196.52.84.35', '2020-05-17 17:25:21', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(291, 0, '196.52.84.35', '2020-05-17 17:25:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(292, 0, '185.220.101.154', '2020-05-17 18:00:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(293, 0, '51.89.235.177', '2020-05-17 18:00:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(294, 0, '51.89.235.177', '2020-05-17 18:00:28', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(295, 0, '46.229.168.130', '2020-05-17 19:29:04', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(296, 0, '62.210.80.34', '2020-05-17 19:39:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(297, 0, '62.210.80.34', '2020-05-17 19:39:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(298, 0, '62.210.80.34', '2020-05-17 19:39:40', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(299, 0, '62.210.80.34', '2020-05-17 19:39:40', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(300, 0, '54.36.148.202', '2020-05-17 20:23:23', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(301, 0, '40.84.20.13', '2020-05-17 20:30:10', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(302, 0, '40.84.20.13', '2020-05-17 20:30:17', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(303, 0, '40.84.20.13', '2020-05-17 20:30:24', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(304, 0, '46.98.128.48', '2020-05-17 20:52:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(305, 0, '46.98.128.48', '2020-05-17 20:52:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(306, 0, '46.98.128.48', '2020-05-17 20:52:36', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(307, 0, '46.98.128.48', '2020-05-17 20:52:36', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(308, 0, '31.165.24.94', '2020-05-17 20:55:43', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(309, 0, '31.165.24.94', '2020-05-17 20:55:47', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(310, 0, '31.165.24.94', '2020-05-17 20:55:54', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(311, 0, '31.165.24.94', '2020-05-17 20:55:57', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(312, 0, '31.165.24.94', '2020-05-17 20:56:01', '', 'https://intelligenza.pro/connect.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(313, 0, '31.165.24.94', '2020-05-17 20:57:16', '', 'https://intelligenza.pro/connect.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(314, 0, '31.165.24.94', '2020-05-17 20:57:17', '', 'https://intelligenza.pro/connect.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(315, 0, '31.165.24.94', '2020-05-17 20:57:19', '', 'https://intelligenza.pro/contact.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(316, 0, '31.165.24.94', '2020-05-17 20:57:21', '', 'https://intelligenza.pro/privacy.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(317, 0, '31.165.24.94', '2020-05-17 20:57:23', '', 'https://intelligenza.pro/lostPassword.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(318, 0, '31.165.24.94', '2020-05-17 20:57:25', '', 'https://intelligenza.pro/register.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(319, 0, '31.165.24.94', '2020-05-17 20:57:30', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(320, 0, '31.165.24.94', '2020-05-17 20:57:32', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(321, 0, '31.165.24.94', '2020-05-17 20:57:37', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(322, 0, '31.165.24.94', '2020-05-17 21:14:33', '', 'https://intelligenza.pro/admin/appCircles.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(323, 0, '31.165.24.94', '2020-05-17 21:14:44', '', 'https://intelligenza.pro/admin/appCircles.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(324, 0, '31.165.24.94', '2020-05-17 21:15:43', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(325, 0, '31.165.24.94', '2020-05-17 21:15:45', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(326, 0, '31.165.24.94', '2020-05-17 21:15:53', '', 'https://intelligenza.pro/connect.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(327, 0, '185.108.106.202', '2020-05-17 21:24:38', '', 'https://intelligenza.pro/admin/analytics.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(328, 0, '185.108.106.202', '2020-05-17 21:24:50', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(329, 0, '185.108.106.202', '2020-05-17 21:25:14', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(330, 0, '213.180.203.100', '2020-05-17 21:59:43', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(331, 0, '77.243.191.18', '2020-05-17 23:41:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(332, 0, '77.243.191.18', '2020-05-17 23:41:40', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(333, 0, '77.243.191.18', '2020-05-17 23:41:40', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(334, 0, '77.243.191.18', '2020-05-17 23:41:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(335, 0, '196.52.84.35', '2020-05-18 01:34:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(336, 0, '196.52.84.35', '2020-05-18 01:34:16', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(337, 0, '196.52.84.35', '2020-05-18 01:34:17', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(338, 0, '196.52.84.35', '2020-05-18 01:34:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(339, 0, '42.117.48.54', '2020-05-18 02:23:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(340, 0, '42.117.48.54', '2020-05-18 02:23:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(341, 0, '42.117.48.54', '2020-05-18 02:23:06', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(342, 0, '185.147.70.45', '2020-05-18 04:57:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(343, 0, '188.163.109.153', '2020-05-18 05:58:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(344, 0, '188.163.109.153', '2020-05-18 05:58:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(345, 0, '188.163.109.153', '2020-05-18 05:58:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(346, 0, '54.36.149.90', '2020-05-18 06:01:42', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(347, 0, '77.243.191.18', '2020-05-18 07:11:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(348, 0, '77.243.191.18', '2020-05-18 07:11:27', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(349, 0, '77.243.191.18', '2020-05-18 07:11:28', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(350, 0, '77.243.191.18', '2020-05-18 07:11:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(351, 0, '185.234.219.246', '2020-05-18 07:13:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(352, 0, '185.234.219.246', '2020-05-18 07:13:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(353, 0, '42.236.103.106', '2020-05-18 07:50:53', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(354, 0, '196.52.84.35', '2020-05-18 09:42:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(355, 0, '196.52.84.35', '2020-05-18 09:42:22', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(356, 0, '196.52.84.35', '2020-05-18 09:42:24', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(357, 0, '196.52.84.35', '2020-05-18 09:42:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(358, 0, '31.165.24.94', '2020-05-18 09:48:43', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(359, 0, '31.165.24.94', '2020-05-18 10:14:17', '', 'https://www.pierluigi.ch/index.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(360, 0, '79.173.90.153', '2020-05-18 10:25:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(361, 0, '79.173.90.153', '2020-05-18 10:25:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(362, 0, '79.173.90.153', '2020-05-18 10:25:49', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(363, 0, '31.165.24.94', '2020-05-18 10:43:55', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(364, 0, '31.165.24.94', '2020-05-18 13:23:50', '', 'https://www.pierluigi.ch/index.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(365, 0, '31.165.24.94', '2020-05-18 13:24:23', '', 'https://www.pierluigi.ch/consultantWeb.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(366, 0, '31.165.24.94', '2020-05-18 13:32:16', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(367, 0, '31.165.24.94', '2020-05-18 13:32:22', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(368, 0, '77.243.191.18', '2020-05-18 15:04:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(369, 0, '77.243.191.18', '2020-05-18 15:04:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(370, 0, '77.243.191.18', '2020-05-18 15:04:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(371, 0, '77.243.191.18', '2020-05-18 15:04:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(372, 0, '207.46.13.20', '2020-05-18 15:14:49', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(373, 0, '54.36.149.25', '2020-05-18 15:29:01', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(374, 0, '164.132.201.87', '2020-05-18 16:05:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(375, 0, '164.132.201.87', '2020-05-18 16:05:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(376, 0, '164.132.201.87', '2020-05-18 16:05:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(377, 0, '164.132.201.87', '2020-05-18 16:05:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(378, 0, '66.249.89.83', '2020-05-18 16:18:15', '', '', 'app_profileEdit', '', '', '', 'en', 'United States', '', ''),
(379, 0, '66.249.89.81', '2020-05-18 16:18:17', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(380, 0, '196.52.84.35', '2020-05-18 17:47:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(381, 0, '196.52.84.35', '2020-05-18 17:47:11', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(382, 0, '196.52.84.35', '2020-05-18 17:47:12', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(383, 0, '196.52.84.35', '2020-05-18 17:47:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(384, 0, '87.225.27.137', '2020-05-18 18:51:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(385, 0, '87.225.27.137', '2020-05-18 18:51:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(386, 0, '87.225.27.137', '2020-05-18 18:51:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(387, 0, '213.180.203.101', '2020-05-18 20:10:37', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(388, 0, '178.154.200.109', '2020-05-18 20:10:58', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(389, 0, '128.14.209.242', '2020-05-18 20:38:53', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(390, 0, '92.38.136.69', '2020-05-18 20:46:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(391, 0, '92.38.136.69', '2020-05-18 20:46:08', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(392, 0, '92.38.136.69', '2020-05-18 20:46:08', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(393, 0, '92.38.136.69', '2020-05-18 20:46:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(394, 0, '92.38.136.69', '2020-05-18 20:46:08', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(395, 0, '92.38.136.69', '2020-05-18 20:46:09', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(396, 0, '185.108.106.203', '2020-05-18 22:04:47', '', 'https://intelligenza.pro/admin/appFrontEnd.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(397, 0, '185.108.106.203', '2020-05-18 22:06:47', '', 'https://intelligenza.pro/admin/appFrontEnd.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(398, 0, '185.108.106.203', '2020-05-18 22:07:58', '', 'https://intelligenza.pro/admin/appFrontEnd.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(399, 0, '142.93.157.53', '2020-05-18 22:35:12', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(400, 0, '138.197.162.93', '2020-05-18 22:35:13', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(401, 0, '159.203.24.155', '2020-05-18 22:35:14', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(402, 0, '159.203.32.136', '2020-05-18 22:35:15', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(403, 0, '77.243.191.18', '2020-05-18 22:56:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(404, 0, '77.243.191.18', '2020-05-18 22:56:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(405, 0, '77.243.191.18', '2020-05-18 22:56:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(406, 0, '77.243.191.18', '2020-05-18 22:56:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(407, 0, '188.165.232.202', '2020-05-18 23:01:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(408, 0, '188.165.232.202', '2020-05-18 23:01:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(409, 0, '188.165.232.202', '2020-05-18 23:01:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(410, 0, '46.229.168.137', '2020-05-18 23:38:38', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(411, 0, '92.37.142.158', '2020-05-19 01:40:26', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(412, 0, '196.52.84.35', '2020-05-19 01:51:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(413, 0, '196.52.84.35', '2020-05-19 01:51:19', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(414, 0, '196.52.84.35', '2020-05-19 01:51:20', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(415, 0, '196.52.84.35', '2020-05-19 01:51:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(416, 0, '54.36.149.95', '2020-05-19 02:18:03', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(417, 0, '40.77.167.101', '2020-05-19 03:44:07', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(418, 0, '66.249.64.142', '2020-05-19 03:55:33', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(419, 0, '77.243.191.18', '2020-05-19 06:50:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(420, 0, '77.243.191.18', '2020-05-19 06:50:37', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(421, 0, '77.243.191.18', '2020-05-19 06:50:40', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(422, 0, '77.243.191.18', '2020-05-19 06:50:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(423, 0, '93.120.133.156', '2020-05-19 08:36:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(424, 0, '93.120.133.156', '2020-05-19 08:36:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(425, 0, '178.154.200.109', '2020-05-19 08:53:58', '', '', 'faq', '', '', '', 'en', 'Russia', '', ''),
(426, 0, '66.249.64.144', '2020-05-19 10:04:07', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(427, 0, '66.249.64.146', '2020-05-19 10:27:02', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(428, 0, '31.165.24.94', '2020-05-19 10:44:06', '', 'https://intelligenza.pro/admin/index.php', 'app_admin_appSettings', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(429, 0, '31.165.24.94', '2020-05-19 10:44:06', '', 'https://intelligenza.pro/admin/index.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(430, 0, '31.165.24.94', '2020-05-19 10:44:17', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(431, 0, '31.165.24.94', '2020-05-19 10:44:27', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(432, 0, '46.119.114.171', '2020-05-19 10:54:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(433, 0, '46.119.114.171', '2020-05-19 10:54:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(434, 0, '54.36.149.92', '2020-05-19 12:26:01', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(435, 0, '46.253.188.128', '2020-05-19 13:16:28', '', '', 'comingSoon', 'iPhone', '', 'Safari ', 'fr', 'Switzerland', '', ''),
(436, 0, '46.253.188.128', '2020-05-19 13:16:32', '', '', 'comingSoon', 'iPhone', '', 'Safari ', 'fr', 'Switzerland', '', ''),
(437, 0, '87.228.41.10', '2020-05-19 13:40:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(438, 0, '87.228.41.10', '2020-05-19 13:40:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(439, 0, '40.113.85.123', '2020-05-19 13:44:40', '', '', 'comingSoon', '', 'Windows', '', 'en', 'Ireland', '', ''),
(440, 0, '13.69.199.207', '2020-05-19 13:44:47', '', '', 'privacy', '', 'Windows', '', 'en', 'Ireland', '', ''),
(441, 0, '13.69.199.207', '2020-05-19 13:44:52', '', '', 'terms', '', 'Windows', '', 'en', 'Ireland', '', ''),
(442, 0, '13.69.199.207', '2020-05-19 13:44:57', '', '', 'faq', '', 'Windows', '', 'en', 'Ireland', '', ''),
(443, 0, '13.69.199.207', '2020-05-19 13:45:02', '', '', 'contact', '', 'Windows', '', 'en', 'Ireland', '', ''),
(444, 0, '209.17.97.26', '2020-05-19 14:07:33', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(445, 0, '213.180.203.100', '2020-05-19 14:25:34', '', '', 'privacy', '', '', '', 'en', 'Russia', '', ''),
(446, 0, '128.14.209.226', '2020-05-19 17:19:06', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(447, 0, '31.165.24.94', '2020-05-19 17:53:55', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(448, 0, '31.165.24.94', '2020-05-19 17:53:57', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(449, 0, '31.165.24.94', '2020-05-19 17:54:09', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(450, 0, '31.165.24.94', '2020-05-19 17:54:15', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(451, 0, '31.165.24.94', '2020-05-19 17:54:23', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(452, 0, '31.165.24.94', '2020-05-19 17:54:56', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(453, 0, '31.165.24.94', '2020-05-19 17:54:57', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(454, 0, '31.165.24.94', '2020-05-19 17:55:02', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(455, 0, '31.165.24.94', '2020-05-19 17:55:53', '', 'https://intelligenza.pro/contact.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(456, 0, '31.165.24.94', '2020-05-19 17:55:56', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(457, 0, '66.249.89.83', '2020-05-19 18:06:43', '', '', 'app_profileEdit', '', '', '', 'en', 'United States', '', ''),
(458, 0, '66.249.89.83', '2020-05-19 18:06:44', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(459, 0, '5.188.210.18', '2020-05-19 18:29:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(460, 0, '5.188.210.18', '2020-05-19 18:29:56', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(461, 0, '5.188.210.18', '2020-05-19 18:29:57', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(462, 0, '178.154.200.109', '2020-05-19 20:43:15', '', '', 'register', '', '', '', 'en', 'Russia', '', ''),
(463, 0, '173.46.91.11', '2020-05-19 21:07:12', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'United States', '', ''),
(464, 0, '54.36.148.249', '2020-05-19 21:32:33', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(465, 0, '185.108.106.202', '2020-05-19 22:31:08', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(466, 0, '185.108.106.202', '2020-05-19 22:33:03', '', 'https://intelligenza.pro/index.php?ipChanged', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(467, 0, '185.108.106.202', '2020-05-19 22:33:07', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(468, 0, '185.108.106.202', '2020-05-19 22:33:12', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(469, 0, '185.108.106.202', '2020-05-19 22:33:13', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(470, 0, '185.108.106.202', '2020-05-19 22:33:15', '', 'https://intelligenza.pro/terms.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(471, 0, '185.108.106.202', '2020-05-19 22:34:07', '', 'https://intelligenza.pro/connect.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(472, 0, '185.108.106.202', '2020-05-19 22:34:41', '', 'https://intelligenza.pro/lostPassword.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(473, 0, '185.108.106.202', '2020-05-19 22:34:43', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(474, 0, '185.108.106.202', '2020-05-19 22:34:44', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(475, 0, '185.108.106.202', '2020-05-19 22:34:45', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(476, 0, '185.108.106.202', '2020-05-19 22:34:47', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(477, 0, '185.108.106.202', '2020-05-19 22:34:48', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(478, 0, '185.108.106.202', '2020-05-19 22:34:49', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(479, 0, '54.36.148.43', '2020-05-19 22:35:07', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(480, 0, '5.188.84.150', '2020-05-19 22:46:10', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(481, 0, '5.188.84.150', '2020-05-19 22:46:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(482, 0, '5.188.84.150', '2020-05-19 22:46:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(483, 0, '5.188.84.150', '2020-05-19 22:46:11', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(484, 0, '93.73.199.52', '2020-05-19 22:49:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(485, 0, '93.73.199.52', '2020-05-19 22:49:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(486, 0, '66.249.64.146', '2020-05-20 00:17:36', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(487, 0, '77.243.191.18', '2020-05-20 00:26:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(488, 0, '77.243.191.18', '2020-05-20 00:26:44', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(489, 0, '77.243.191.18', '2020-05-20 00:26:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(490, 0, '77.243.191.18', '2020-05-20 00:26:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', '', '', ''),
(491, 0, '185.45.12.126', '2020-05-20 00:33:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Romania', '', ''),
(492, 0, '5.188.210.18', '2020-05-20 01:25:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(493, 0, '5.188.210.18', '2020-05-20 01:25:02', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(494, 0, '5.188.210.18', '2020-05-20 01:25:03', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(495, 0, '178.154.200.109', '2020-05-20 04:05:05', '', '', 'register', '', '', '', 'en', 'Russia', '', ''),
(496, 0, '207.46.13.146', '2020-05-20 06:27:21', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(497, 0, '185.104.186.26', '2020-05-20 07:25:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(498, 0, '185.104.186.26', '2020-05-20 07:25:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(499, 0, '185.104.186.26', '2020-05-20 07:25:33', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(500, 0, '185.104.186.26', '2020-05-20 07:25:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(501, 0, '54.36.148.40', '2020-05-20 08:52:29', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(502, 0, '31.165.24.94', '2020-05-20 09:53:47', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(503, 0, '31.165.24.94', '2020-05-20 09:53:55', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(504, 0, '31.165.24.94', '2020-05-20 09:54:04', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(505, 0, '31.165.24.94', '2020-05-20 10:09:11', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(506, 0, '31.165.24.94', '2020-05-20 10:09:28', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(507, 0, '31.165.24.94', '2020-05-20 10:12:16', '', 'https://intelligenza.pro/?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(508, 0, '31.165.24.94', '2020-05-20 10:12:18', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(509, 0, '31.165.24.94', '2020-05-20 10:13:15', '', 'https://intelligenza.pro/register.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(510, 0, '31.165.24.94', '2020-05-20 10:13:20', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(511, 0, '93.73.199.52', '2020-05-20 10:15:30', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(512, 0, '2.95.183.192', '2020-05-20 12:06:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(513, 0, '2.95.183.192', '2020-05-20 12:06:46', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(514, 0, '2.95.183.192', '2020-05-20 12:06:47', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(515, 0, '176.48.14.224', '2020-05-20 12:30:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(516, 0, '176.48.14.224', '2020-05-20 12:30:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(517, 0, '176.48.14.224', '2020-05-20 12:30:14', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(518, 0, '42.236.99.86', '2020-05-20 12:34:43', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(519, 0, '185.104.186.26', '2020-05-20 16:09:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(520, 0, '185.104.186.26', '2020-05-20 16:09:42', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(521, 0, '185.104.186.26', '2020-05-20 16:09:43', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(522, 0, '185.104.186.26', '2020-05-20 16:09:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(523, 0, '54.36.148.207', '2020-05-20 17:41:26', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(524, 0, '54.36.149.49', '2020-05-20 18:53:09', '', '', 'connect', '', '', '', 'en', 'France', '', ''),
(525, 0, '46.119.125.43', '2020-05-20 19:10:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(526, 0, '46.119.125.43', '2020-05-20 19:10:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(527, 0, '77.74.177.113', '2020-05-20 19:37:01', '', 'https://www.intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(528, 0, '40.77.167.49', '2020-05-20 19:45:37', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(529, 0, '37.120.156.27', '2020-05-20 22:25:46', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(530, 0, '37.120.156.27', '2020-05-20 22:25:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(531, 0, '37.120.156.27', '2020-05-20 22:25:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(532, 0, '104.45.12.191', '2020-05-20 23:23:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(533, 0, '104.45.12.191', '2020-05-20 23:23:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(534, 0, '185.108.106.203', '2020-05-20 23:34:22', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(535, 0, '185.108.106.203', '2020-05-20 23:39:33', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'France', '', ''),
(536, 0, '54.36.149.0', '2020-05-20 23:46:18', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(537, 0, '185.104.186.26', '2020-05-21 01:03:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(538, 0, '185.104.186.26', '2020-05-21 01:03:57', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(539, 0, '185.104.186.26', '2020-05-21 01:03:58', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(540, 0, '185.104.186.26', '2020-05-21 01:03:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(541, 0, '95.152.62.153', '2020-05-21 01:15:54', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(542, 0, '95.152.62.153', '2020-05-21 01:15:54', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(543, 0, '95.152.62.153', '2020-05-21 01:16:00', '', 'https://intelligenza.pro/modular/_captcha/securimage_show.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(544, 0, '5.188.84.150', '2020-05-21 04:29:07', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(545, 0, '92.115.182.243', '2020-05-21 05:22:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(546, 0, '92.115.182.243', '2020-05-21 05:22:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(547, 0, '93.174.93.24', '2020-05-21 06:06:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(548, 0, '93.174.93.24', '2020-05-21 06:06:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(549, 0, '95.163.255.131', '2020-05-21 06:44:17', '', 'http://intelligenza.pro/', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(550, 0, '31.132.211.144', '2020-05-21 07:49:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(551, 0, '31.132.211.144', '2020-05-21 07:49:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(552, 0, '31.132.211.144', '2020-05-21 07:49:49', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(553, 0, '196.52.84.47', '2020-05-21 08:41:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(554, 0, '196.52.84.47', '2020-05-21 08:41:14', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(555, 0, '196.52.84.47', '2020-05-21 08:41:15', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(556, 0, '196.52.84.47', '2020-05-21 08:41:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(557, 0, '207.46.13.222', '2020-05-21 09:48:29', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(558, 0, '185.104.186.26', '2020-05-21 09:56:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(559, 0, '185.104.186.26', '2020-05-21 09:56:31', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(560, 0, '185.104.186.26', '2020-05-21 09:56:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(561, 0, '185.104.186.26', '2020-05-21 09:56:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(562, 0, '66.249.64.146', '2020-05-21 10:07:35', '', '', 'terms', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(563, 0, '66.249.64.148', '2020-05-21 10:07:50', '', '', 'terms', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(564, 0, '66.249.64.142', '2020-05-21 10:16:20', '', '', 'faq', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(565, 0, '66.249.64.144', '2020-05-21 10:16:35', '', '', 'faq', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(566, 0, '66.249.64.146', '2020-05-21 11:05:41', '', '', 'connect', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(567, 0, '66.249.64.142', '2020-05-21 11:47:30', '', '', 'privacy', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(568, 0, '207.46.13.222', '2020-05-21 12:25:49', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(569, 0, '46.229.168.138', '2020-05-21 12:38:32', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(570, 0, '31.165.24.94', '2020-05-21 13:38:42', '', 'https://www.pierluigi.ch/', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(571, 0, '31.165.24.94', '2020-05-21 13:38:53', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(572, 0, '31.165.24.94', '2020-05-21 13:39:14', '', 'https://intelligenza.pro/connect.php?', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(573, 0, '31.165.24.94', '2020-05-21 13:39:17', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(574, 0, '31.165.24.94', '2020-05-21 13:39:19', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(575, 0, '31.165.24.94', '2020-05-21 13:39:21', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(576, 0, '31.165.24.94', '2020-05-21 13:39:23', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(577, 0, '31.165.24.94', '2020-05-21 13:39:25', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(578, 0, '46.165.245.154', '2020-05-21 14:07:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(579, 0, '46.165.245.154', '2020-05-21 14:07:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(580, 0, '54.36.148.59', '2020-05-21 14:40:29', '', '', 'contact', '', '', '', 'en', 'France', '', ''),
(581, 0, '66.249.64.146', '2020-05-21 15:08:02', '', '', 'lostPassword', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(582, 0, '196.52.84.47', '2020-05-21 16:09:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(583, 0, '196.52.84.47', '2020-05-21 16:09:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(584, 0, '196.52.84.47', '2020-05-21 16:09:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(585, 0, '196.52.84.47', '2020-05-21 16:09:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(586, 0, '92.38.136.69', '2020-05-21 16:40:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(587, 0, '92.38.136.69', '2020-05-21 16:40:30', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(588, 0, '92.38.136.69', '2020-05-21 16:40:30', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(589, 0, '54.36.148.188', '2020-05-21 16:46:19', '', '', 'faq', '', '', '', 'en', 'France', '', ''),
(590, 0, '84.121.192.46', '2020-05-21 16:50:50', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Spain', '', ''),
(591, 0, '84.121.192.46', '2020-05-21 16:50:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Spain', '', ''),
(592, 0, '84.121.192.46', '2020-05-21 16:50:51', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Spain', '', ''),
(593, 0, '31.165.24.94', '2020-05-21 17:13:57', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(594, 0, '31.165.24.94', '2020-05-21 17:14:10', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(595, 0, '31.165.24.94', '2020-05-21 17:14:23', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(596, 0, '13.92.112.183', '2020-05-21 17:18:42', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(597, 0, '13.92.112.183', '2020-05-21 17:18:43', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(598, 0, '66.249.64.144', '2020-05-21 17:47:45', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(599, 0, '5.188.210.18', '2020-05-21 18:09:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(600, 0, '5.188.210.18', '2020-05-21 18:09:11', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(601, 0, '5.188.210.18', '2020-05-21 18:09:11', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(602, 0, '185.104.186.26', '2020-05-21 18:16:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(603, 0, '185.104.186.26', '2020-05-21 18:16:41', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(604, 0, '185.104.186.26', '2020-05-21 18:16:42', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(605, 0, '185.104.186.26', '2020-05-21 18:16:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(606, 0, '54.82.38.6', '2020-05-21 18:17:07', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(607, 0, '66.249.64.142', '2020-05-21 18:22:30', '', '', 'register', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(608, 0, '100.25.10.255', '2020-05-21 18:54:51', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(609, 0, '100.25.10.255', '2020-05-21 18:56:53', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(610, 0, '100.25.10.255', '2020-05-21 18:57:53', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(611, 0, '100.25.10.255', '2020-05-21 18:57:53', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(612, 0, '100.25.10.255', '2020-05-21 18:57:53', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(613, 0, '100.25.10.255', '2020-05-21 18:57:54', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(614, 0, '100.25.10.255', '2020-05-21 18:57:54', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(615, 0, '100.25.10.255', '2020-05-21 18:58:54', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(616, 0, '100.25.10.255', '2020-05-21 19:00:56', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(617, 0, '100.25.10.255', '2020-05-21 19:03:04', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(618, 0, '52.178.134.108', '2020-05-21 19:14:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ireland', '', ''),
(619, 0, '52.178.134.108', '2020-05-21 19:14:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ireland', '', ''),
(620, 0, '5.188.210.18', '2020-05-21 19:55:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(621, 0, '5.188.210.18', '2020-05-21 19:55:27', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(622, 0, '5.188.210.18', '2020-05-21 19:55:28', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(623, 0, '178.159.37.69', '2020-05-21 20:22:00', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(624, 0, '178.159.37.69', '2020-05-21 20:22:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(625, 0, '178.159.37.69', '2020-05-21 20:22:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(626, 0, '178.159.37.69', '2020-05-21 20:22:06', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(627, 0, '178.159.37.69', '2020-05-21 20:22:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(628, 0, '178.159.37.69', '2020-05-21 20:22:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(629, 0, '150.136.248.154', '2020-05-21 20:30:57', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'United States', '', ''),
(630, 0, '31.28.163.40', '2020-05-21 22:16:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(631, 0, '31.28.163.40', '2020-05-21 22:16:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(632, 0, '31.28.163.40', '2020-05-21 22:16:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(633, 0, '31.28.163.40', '2020-05-21 22:16:19', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(634, 0, '207.180.234.195', '2020-05-21 23:12:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(635, 0, '207.180.234.195', '2020-05-21 23:12:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(636, 0, '196.52.84.47', '2020-05-21 23:46:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(637, 0, '196.52.84.47', '2020-05-21 23:46:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(638, 0, '196.52.84.47', '2020-05-21 23:46:19', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(639, 0, '196.52.84.47', '2020-05-21 23:46:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(640, 0, '46.229.168.139', '2020-05-22 00:01:42', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(641, 0, '54.36.148.98', '2020-05-22 00:44:52', '', '', 'lostPassword', '', '', '', 'en', 'France', '', ''),
(642, 0, '54.36.148.99', '2020-05-22 02:21:09', '', '', 'privacy', '', '', '', 'en', 'France', '', ''),
(643, 0, '128.71.101.250', '2020-05-22 02:21:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(644, 0, '5.188.210.18', '2020-05-22 02:41:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(645, 0, '5.188.210.18', '2020-05-22 02:41:46', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(646, 0, '5.188.210.18', '2020-05-22 02:41:46', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(647, 0, '134.119.207.105', '2020-05-22 03:29:54', '', 'https://www.intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(648, 0, '134.119.207.105', '2020-05-22 03:30:08', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(649, 0, '134.119.207.105', '2020-05-22 03:30:23', '', 'http://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(650, 0, '2.95.16.224', '2020-05-22 03:57:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(651, 0, '2.95.16.224', '2020-05-22 03:57:42', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(652, 0, '2.95.16.224', '2020-05-22 03:57:43', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(653, 0, '54.36.149.9', '2020-05-22 04:10:18', '', '', 'register', '', '', '', 'en', 'France', '', ''),
(654, 0, '45.82.71.34', '2020-05-22 04:12:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(655, 0, '45.82.71.34', '2020-05-22 04:12:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(656, 0, '45.82.71.34', '2020-05-22 04:12:55', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(657, 0, '54.153.62.208', '2020-05-22 04:30:47', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'United States', '', ''),
(658, 0, '2a03:f680:fff3::32dc', '2020-05-22 04:46:39', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(659, 0, '2a03:f680:fff3::32dc', '2020-05-22 04:46:39', '', '', 'register', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(660, 0, '2a03:f680:fff3::32dc', '2020-05-22 04:46:40', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(661, 0, '2a03:f680:fff3::32dc', '2020-05-22 04:46:40', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(662, 0, '2a03:f680:fff3::32dc', '2020-05-22 04:46:40', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(663, 0, '185.234.219.246', '2020-05-22 05:32:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(664, 0, '185.234.219.246', '2020-05-22 05:32:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(665, 0, '185.234.219.246', '2020-05-22 05:32:02', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(666, 0, '54.36.149.47', '2020-05-22 05:56:03', '', '', 'terms', '', '', '', 'en', 'France', '', ''),
(667, 0, '213.180.203.101', '2020-05-22 06:52:58', '', '', 'terms', '', '', '', 'en', 'Russia', '', ''),
(668, 0, '91.121.76.25', '2020-05-22 06:59:28', '', '', 'comingSoon', '', 'Windows', 'IE ', 'en', 'France', '', ''),
(669, 0, '158.69.127.133', '2020-05-22 07:15:14', '', '', 'comingSoon', '', '', '', 'en', 'Canada', '', ''),
(670, 0, '158.69.127.133', '2020-05-22 07:15:18', '', '', 'comingSoon', '', '', '', 'en', 'Canada', '', ''),
(671, 0, '158.69.127.133', '2020-05-22 07:15:19', '', '', 'contact', '', '', '', 'en', 'Canada', '', ''),
(672, 0, '158.69.127.133', '2020-05-22 07:15:20', '', '', 'terms', '', '', '', 'en', 'Canada', '', ''),
(673, 0, '158.69.127.133', '2020-05-22 07:15:21', '', '', 'privacy', '', '', '', 'en', 'Canada', '', ''),
(674, 0, '158.69.127.133', '2020-05-22 07:15:22', '', '', 'faq', '', '', '', 'en', 'Canada', '', ''),
(675, 0, '158.69.127.133', '2020-05-22 07:15:23', '', '', 'register', '', '', '', 'en', 'Canada', '', ''),
(676, 0, '158.69.127.133', '2020-05-22 07:15:24', '', '', 'connect', '', '', '', 'en', 'Canada', '', ''),
(677, 0, '158.69.127.133', '2020-05-22 07:15:25', '', '', 'lostPassword', '', '', '', 'en', 'Canada', '', ''),
(678, 0, '158.69.127.133', '2020-05-22 07:15:27', '', '', 'connect', '', '', '', 'en', 'Canada', '', ''),
(679, 0, '158.69.127.133', '2020-05-22 07:15:29', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'Canada', '', ''),
(680, 0, '51.77.246.67', '2020-05-22 07:15:47', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(681, 0, '192.71.3.26', '2020-05-22 07:26:24', '', 'http://intelligenza.pro/', 'comingSoon', '', '', '', 'en', 'Sweden', '', ''),
(682, 0, '196.52.84.47', '2020-05-22 07:37:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(683, 0, '196.52.84.47', '2020-05-22 07:37:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(684, 0, '196.52.84.47', '2020-05-22 07:37:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(685, 0, '196.52.84.47', '2020-05-22 07:37:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(686, 0, '54.36.149.11', '2020-05-22 07:42:08', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(687, 0, '95.221.62.12', '2020-05-22 07:53:58', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(688, 0, '5.164.216.201', '2020-05-22 08:38:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(689, 0, '5.164.216.201', '2020-05-22 08:39:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(690, 0, '5.164.216.201', '2020-05-22 08:39:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(691, 0, '42.236.10.91', '2020-05-22 08:51:36', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(692, 0, '42.236.10.76', '2020-05-22 08:51:41', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(693, 0, '91.76.149.239', '2020-05-22 09:47:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(694, 0, '91.76.149.239', '2020-05-22 09:47:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(695, 0, '91.121.71.36', '2020-05-22 11:41:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(696, 0, '91.121.71.36', '2020-05-22 11:41:48', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(697, 0, '91.121.71.36', '2020-05-22 11:41:48', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(698, 0, '5.188.84.150', '2020-05-22 12:14:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(699, 0, '5.188.84.150', '2020-05-22 12:14:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(700, 0, '83.221.222.94', '2020-05-22 13:48:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(701, 0, '83.221.222.94', '2020-05-22 13:48:53', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(702, 0, '83.221.222.94', '2020-05-22 13:48:54', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(703, 0, '99.106.76.40', '2020-05-22 14:01:42', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'United States', '', ''),
(704, 0, '196.52.84.47', '2020-05-22 15:51:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(705, 0, '196.52.84.47', '2020-05-22 15:51:17', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(706, 0, '196.52.84.47', '2020-05-22 15:51:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(707, 0, '196.52.84.47', '2020-05-22 15:51:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(708, 0, '45.12.222.34', '2020-05-22 16:10:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(709, 0, '45.12.222.34', '2020-05-22 16:10:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(710, 0, '45.12.222.34', '2020-05-22 16:10:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(711, 0, '45.12.222.34', '2020-05-22 16:10:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(712, 0, '178.141.189.34', '2020-05-22 16:46:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(713, 0, '178.141.189.34', '2020-05-22 16:46:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(714, 0, '178.141.189.34', '2020-05-22 16:46:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(715, 0, '78.47.197.112', '2020-05-22 16:49:16', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(716, 0, '46.119.171.242', '2020-05-22 17:41:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(717, 0, '46.119.171.242', '2020-05-22 17:41:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(718, 0, '185.191.215.99', '2020-05-22 18:31:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(719, 0, '185.191.215.99', '2020-05-22 18:31:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(720, 0, '185.191.215.99', '2020-05-22 18:31:59', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(721, 0, '185.191.215.99', '2020-05-22 18:32:01', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(722, 0, '185.104.186.26', '2020-05-22 18:57:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(723, 0, '185.104.186.26', '2020-05-22 18:57:21', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(724, 0, '185.104.186.26', '2020-05-22 18:57:24', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(725, 0, '185.104.186.26', '2020-05-22 18:57:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(726, 0, '51.145.54.154', '2020-05-22 20:09:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(727, 0, '51.145.54.154', '2020-05-22 20:09:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(728, 0, '5.183.92.56', '2020-05-22 20:23:03', '', 'https://intelligenza.pro/admin/profile.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(729, 0, '5.183.92.56', '2020-05-22 20:23:15', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(730, 0, '207.46.13.148', '2020-05-22 20:38:21', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(731, 0, '115.79.196.85', '2020-05-22 22:39:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(732, 0, '79.173.90.153', '2020-05-22 22:58:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(733, 0, '79.173.90.153', '2020-05-22 22:58:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(734, 0, '79.173.90.153', '2020-05-22 22:58:49', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(735, 0, '66.249.66.16', '2020-05-22 23:20:11', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(736, 0, '196.52.84.47', '2020-05-22 23:56:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(737, 0, '196.52.84.47', '2020-05-22 23:56:58', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(738, 0, '196.52.84.47', '2020-05-22 23:56:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(739, 0, '196.52.84.47', '2020-05-22 23:56:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(740, 0, '213.180.203.101', '2020-05-23 00:03:05', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(741, 0, '213.180.203.9', '2020-05-23 00:03:43', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(742, 0, '128.72.160.96', '2020-05-23 00:14:46', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(743, 0, '128.72.160.96', '2020-05-23 00:14:46', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(744, 0, '18.232.184.13', '2020-05-23 00:51:28', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(745, 0, '185.104.186.26', '2020-05-23 01:38:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(746, 0, '185.104.186.26', '2020-05-23 01:38:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(747, 0, '185.104.186.26', '2020-05-23 01:38:26', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(748, 0, '185.104.186.26', '2020-05-23 01:38:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(749, 0, '65.52.150.51', '2020-05-23 02:55:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(750, 0, '65.52.150.51', '2020-05-23 02:55:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(751, 0, '52.228.8.254', '2020-05-23 03:00:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(752, 0, '52.228.8.254', '2020-05-23 03:00:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(753, 0, '66.249.66.18', '2020-05-23 03:13:32', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(754, 0, '46.229.168.144', '2020-05-23 06:01:35', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(755, 0, '196.52.84.47', '2020-05-23 08:02:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(756, 0, '196.52.84.47', '2020-05-23 08:02:28', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(757, 0, '196.52.84.47', '2020-05-23 08:02:29', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(758, 0, '196.52.84.47', '2020-05-23 08:02:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(759, 0, '185.104.186.26', '2020-05-23 08:59:50', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(760, 0, '185.104.186.26', '2020-05-23 08:59:51', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(761, 0, '185.104.186.26', '2020-05-23 08:59:52', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(762, 0, '185.104.186.26', '2020-05-23 08:59:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(763, 0, '109.70.100.21', '2020-05-23 09:09:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(764, 0, '109.70.100.21', '2020-05-23 09:09:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(765, 0, '46.229.168.142', '2020-05-23 09:11:29', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(766, 0, '31.165.24.94', '2020-05-23 09:49:05', '', 'https://intelligenza.pro/admin/wallet.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(767, 0, '213.180.203.101', '2020-05-23 09:59:33', '', '', 'lostPassword', '', '', '', 'en', 'Russia', '', ''),
(768, 0, '40.77.167.204', '2020-05-23 10:27:34', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(769, 0, '109.234.38.61', '2020-05-23 10:30:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(770, 0, '109.234.38.61', '2020-05-23 10:30:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(771, 0, '109.234.38.61', '2020-05-23 10:30:56', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(772, 0, '31.165.24.94', '2020-05-23 10:34:29', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(773, 0, '31.165.24.94', '2020-05-23 10:34:41', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(774, 0, '185.220.101.15', '2020-05-23 11:03:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(775, 0, '185.220.101.15', '2020-05-23 11:04:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(776, 0, '3.235.193.246', '2020-05-23 11:15:40', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(777, 0, '185.220.101.196', '2020-05-23 11:27:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(778, 0, '185.220.101.196', '2020-05-23 11:27:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(779, 0, '185.220.101.196', '2020-05-23 11:27:41', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(780, 0, '157.55.39.253', '2020-05-23 12:05:02', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(781, 0, '31.165.24.94', '2020-05-23 12:55:34', '', 'https://intelligenza.pro/admin/modular.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(782, 0, '3.235.22.57', '2020-05-23 13:00:38', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(783, 0, '3.235.22.57', '2020-05-23 13:04:12', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(784, 0, '31.165.24.94', '2020-05-23 13:36:17', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(785, 0, '31.165.24.94', '2020-05-23 13:36:51', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(786, 0, '31.165.24.94', '2020-05-23 13:43:03', '', 'https://intelligenza.pro/connect.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(787, 0, '37.120.192.24', '2020-05-23 13:46:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(788, 0, '37.120.192.24', '2020-05-23 13:46:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(789, 0, '37.120.192.24', '2020-05-23 13:46:29', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(790, 0, '5.62.20.30', '2020-05-23 14:01:38', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(791, 0, '5.62.20.30', '2020-05-23 14:01:39', '', 'http://intelligenza.pro', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(792, 0, '31.165.24.94', '2020-05-23 14:21:15', '', 'https://intelligenza.pro/index.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(793, 0, '31.165.24.94', '2020-05-23 14:21:19', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(794, 0, '31.165.24.94', '2020-05-23 15:17:15', '', 'https://intelligenza.pro/admin/modular.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(795, 0, '17.58.97.137', '2020-05-23 15:51:48', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(796, 0, '31.165.24.94', '2020-05-23 15:58:38', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(797, 0, '31.165.24.94', '2020-05-23 16:00:17', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(798, 0, '31.165.24.94', '2020-05-23 16:01:01', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(799, 0, '31.165.24.94', '2020-05-23 16:03:14', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(800, 0, '31.165.24.94', '2020-05-23 16:05:21', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(801, 0, '31.165.24.94', '2020-05-23 16:05:37', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(802, 0, '31.165.24.94', '2020-05-23 16:05:48', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(803, 0, '31.165.24.94', '2020-05-23 16:06:02', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(804, 0, '31.165.24.94', '2020-05-23 16:06:12', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(805, 0, '31.165.24.94', '2020-05-23 16:06:27', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(806, 0, '3.235.223.142', '2020-05-23 16:11:34', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(807, 0, '3.235.223.142', '2020-05-23 16:37:04', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(808, 0, '128.71.4.171', '2020-05-23 17:03:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(809, 0, '128.71.4.171', '2020-05-23 17:03:30', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(810, 0, '128.71.4.171', '2020-05-23 17:03:30', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(811, 0, '46.229.168.145', '2020-05-23 17:12:51', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(812, 0, '3.235.223.142', '2020-05-23 17:23:23', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(813, 0, '185.104.186.26', '2020-05-23 17:24:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(814, 0, '185.104.186.26', '2020-05-23 17:24:22', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(815, 0, '185.104.186.26', '2020-05-23 17:24:24', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(816, 0, '185.104.186.26', '2020-05-23 17:24:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(817, 0, '196.52.84.47', '2020-05-23 17:59:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(818, 0, '196.52.84.47', '2020-05-23 17:59:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(819, 0, '196.52.84.47', '2020-05-23 17:59:33', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(820, 0, '196.52.84.47', '2020-05-23 17:59:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(821, 0, '31.165.24.94', '2020-05-23 18:17:12', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(822, 0, '3.235.194.133', '2020-05-23 20:35:12', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(823, 0, '13.82.191.243', '2020-05-23 21:15:49', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(824, 0, '13.82.191.243', '2020-05-23 21:15:56', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(825, 0, '13.82.191.243', '2020-05-23 21:16:02', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'United States', '', ''),
(826, 0, '31.165.24.94', '2020-05-23 21:31:12', '', 'https://intelligenza.pro/infos/install.html', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(827, 0, '31.165.24.94', '2020-05-23 21:31:17', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(828, 0, '89.208.230.199', '2020-05-23 21:35:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(829, 0, '89.208.230.199', '2020-05-23 21:35:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(830, 0, '89.208.230.199', '2020-05-23 21:35:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(831, 0, '89.208.230.199', '2020-05-23 21:35:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(832, 0, '185.210.217.12', '2020-05-23 21:56:13', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(833, 0, '185.210.217.12', '2020-05-23 21:56:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(834, 0, '185.210.217.12', '2020-05-23 21:56:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(835, 0, '185.210.217.12', '2020-05-23 21:56:15', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(836, 0, '5.188.84.150', '2020-05-23 22:44:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(837, 0, '5.188.84.150', '2020-05-23 22:44:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(838, 0, '5.188.84.150', '2020-05-23 22:44:37', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(839, 0, '5.62.61.231', '2020-05-24 00:42:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Croatia', '', ''),
(840, 0, '5.62.61.231', '2020-05-24 00:42:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Croatia', '', ''),
(841, 0, '5.62.61.231', '2020-05-24 00:42:40', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Croatia', '', ''),
(842, 0, '196.52.84.47', '2020-05-24 00:45:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(843, 0, '196.52.84.47', '2020-05-24 00:45:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(844, 0, '196.52.84.47', '2020-05-24 00:45:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(845, 0, '196.52.84.47', '2020-05-24 00:45:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(846, 0, '46.118.120.189', '2020-05-24 00:50:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(847, 0, '46.118.120.189', '2020-05-24 00:50:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(848, 0, '46.118.120.189', '2020-05-24 00:50:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(849, 0, '66.249.66.14', '2020-05-24 01:29:03', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(850, 0, '159.224.255.154', '2020-05-24 05:11:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(851, 0, '159.224.255.154', '2020-05-24 05:11:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(852, 0, '159.224.255.154', '2020-05-24 05:11:03', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(853, 0, '209.17.97.42', '2020-05-24 07:06:25', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(854, 0, '167.99.97.137', '2020-05-24 07:16:59', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'IE ', 'en', 'United States', '', ''),
(855, 0, '207.46.13.6', '2020-05-24 07:43:50', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(856, 0, '196.52.84.47', '2020-05-24 07:59:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(857, 0, '196.52.84.47', '2020-05-24 07:59:57', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(858, 0, '196.52.84.47', '2020-05-24 07:59:58', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(859, 0, '196.52.84.47', '2020-05-24 07:59:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(860, 0, '31.165.24.94', '2020-05-24 09:15:36', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(861, 0, '176.100.111.30', '2020-05-24 10:09:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(862, 0, '176.100.111.30', '2020-05-24 10:09:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(863, 0, '176.100.111.30', '2020-05-24 10:09:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(864, 0, '188.165.232.202', '2020-05-24 10:45:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(865, 0, '188.165.232.202', '2020-05-24 10:45:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(866, 0, '188.165.232.202', '2020-05-24 10:45:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(867, 0, '17.58.97.136', '2020-05-24 11:10:25', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(868, 0, '66.249.66.14', '2020-05-24 11:32:58', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(869, 0, '88.147.153.101', '2020-05-24 11:35:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(870, 0, '88.147.153.101', '2020-05-24 11:35:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(871, 0, '5.188.84.150', '2020-05-24 11:45:25', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(872, 0, '5.188.84.150', '2020-05-24 11:45:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(873, 0, '5.188.84.150', '2020-05-24 11:45:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(874, 0, '5.188.84.150', '2020-05-24 11:45:27', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(875, 0, '185.232.21.29', '2020-05-24 12:47:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(876, 0, '185.232.21.29', '2020-05-24 12:47:48', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(877, 0, '185.232.21.29', '2020-05-24 12:47:49', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(878, 0, '185.232.21.29', '2020-05-24 12:47:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(879, 0, '2a01:4f9:2b:faff:267b:2b82:2fdf:4e2e', '2020-05-24 12:48:16', '', '', 'lostPassword', '', '', 'Chrome ', 'en', 'Germany', '', ''),
(880, 0, '178.32.56.32', '2020-05-24 12:56:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(881, 0, '178.32.56.32', '2020-05-24 12:56:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(882, 0, '178.32.56.32', '2020-05-24 12:56:09', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(883, 0, '178.32.56.32', '2020-05-24 12:56:09', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(884, 0, '178.32.56.32', '2020-05-24 12:56:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(885, 0, '196.52.84.47', '2020-05-24 15:15:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(886, 0, '196.52.84.47', '2020-05-24 15:15:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(887, 0, '196.52.84.47', '2020-05-24 15:15:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(888, 0, '196.52.84.47', '2020-05-24 15:16:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(889, 0, '5.183.92.56', '2020-05-24 15:57:28', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(890, 0, '5.188.210.18', '2020-05-24 16:00:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(891, 0, '5.188.210.18', '2020-05-24 16:00:36', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(892, 0, '5.188.210.18', '2020-05-24 16:00:36', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(893, 0, '195.238.108.90', '2020-05-24 16:38:24', '', 'https://www.intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(894, 0, '66.249.66.14', '2020-05-24 16:55:30', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(895, 0, '46.229.168.135', '2020-05-24 17:47:20', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(896, 0, '77.74.177.114', '2020-05-24 18:15:48', '', 'http://intelligenza.pro', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(897, 0, '79.126.87.49', '2020-05-24 19:14:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(898, 0, '79.126.87.49', '2020-05-24 19:14:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(899, 0, '178.159.37.88', '2020-05-24 19:25:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(900, 0, '178.159.37.88', '2020-05-24 19:25:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(901, 0, '178.159.37.88', '2020-05-24 19:25:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(902, 0, '31.165.24.94', '2020-05-24 19:31:16', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(903, 0, '31.165.24.94', '2020-05-24 19:31:22', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(904, 0, '183.136.225.46', '2020-05-24 19:33:06', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'China', '', ''),
(905, 0, '216.10.28.33', '2020-05-24 19:45:36', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(906, 0, '207.46.13.136', '2020-05-24 19:46:16', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(907, 0, '5.183.92.56', '2020-05-24 20:38:42', '', 'https://intelligenza.pro/connect.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(908, 0, '5.183.92.56', '2020-05-24 20:38:49', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(909, 0, '5.183.92.56', '2020-05-24 20:38:55', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(910, 0, '136.243.32.227', '2020-05-24 21:56:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(911, 0, '136.243.32.227', '2020-05-24 21:56:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(912, 0, '196.52.84.45', '2020-05-24 22:48:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(913, 0, '196.52.84.45', '2020-05-24 22:48:55', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(914, 0, '196.52.84.45', '2020-05-24 22:48:57', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(915, 0, '196.52.84.45', '2020-05-24 22:48:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(916, 0, '66.249.66.14', '2020-05-24 23:08:08', '', '', 'register', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(917, 0, '49.12.13.212', '2020-05-24 23:23:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(918, 0, '49.12.13.212', '2020-05-24 23:23:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(919, 0, '49.12.13.212', '2020-05-24 23:23:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(920, 0, '49.12.13.212', '2020-05-24 23:23:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(921, 0, '207.244.240.54', '2020-05-25 01:29:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(922, 0, '207.244.240.54', '2020-05-25 01:29:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(923, 0, '207.244.240.54', '2020-05-25 01:29:30', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(924, 0, '5.188.84.150', '2020-05-25 04:18:13', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(925, 0, '185.232.21.29', '2020-05-25 04:51:50', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(926, 0, '185.232.21.29', '2020-05-25 04:51:50', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(927, 0, '185.232.21.29', '2020-05-25 04:51:51', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(928, 0, '185.232.21.29', '2020-05-25 04:51:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(929, 0, '46.229.168.141', '2020-05-25 05:26:57', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(930, 0, '45.10.234.215', '2020-05-25 06:04:14', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'Malaysia', '', ''),
(931, 0, '196.52.84.45', '2020-05-25 06:12:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(932, 0, '196.52.84.45', '2020-05-25 06:12:40', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(933, 0, '196.52.84.45', '2020-05-25 06:12:41', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(934, 0, '196.52.84.45', '2020-05-25 06:12:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(935, 0, '93.174.93.24', '2020-05-25 06:44:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(936, 0, '93.174.93.24', '2020-05-25 06:44:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(937, 0, '85.117.235.138', '2020-05-25 07:36:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(938, 0, '85.117.235.138', '2020-05-25 07:36:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(939, 0, '192.99.225.97', '2020-05-25 07:50:17', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'Canada', '', ''),
(940, 0, '192.99.225.97', '2020-05-25 07:50:27', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(941, 0, '192.99.225.97', '2020-05-25 07:50:31', '', '', 'privacy', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(942, 0, '192.99.225.97', '2020-05-25 07:50:42', '', '', 'terms', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(943, 0, '192.99.225.97', '2020-05-25 07:50:47', '', '', 'connect', '', 'Windows', 'Firefox ', 'en', 'Canada', '', ''),
(944, 0, '192.99.225.97', '2020-05-25 07:50:49', '', '', 'register', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(945, 0, '192.99.225.97', '2020-05-25 07:50:55', '', '', 'faq', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(946, 0, '192.99.225.97', '2020-05-25 07:51:03', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(947, 0, '192.99.225.97', '2020-05-25 07:51:07', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(948, 0, '192.99.225.97', '2020-05-25 07:51:11', '', '', 'comingSoon', '', '', '', 'en', 'Canada', '', ''),
(949, 0, '142.4.219.91', '2020-05-25 07:51:54', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(950, 0, '188.163.109.153', '2020-05-25 08:32:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(951, 0, '188.163.109.153', '2020-05-25 08:32:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(952, 0, '188.163.109.153', '2020-05-25 08:32:27', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(953, 0, '40.77.167.238', '2020-05-25 09:23:32', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(954, 0, '5.188.84.150', '2020-05-25 09:37:59', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(955, 0, '5.188.84.150', '2020-05-25 09:37:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(956, 0, '5.188.84.150', '2020-05-25 09:38:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(957, 0, '5.188.84.150', '2020-05-25 09:38:00', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(958, 0, '42.236.10.88', '2020-05-25 09:40:29', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(959, 0, '42.236.10.88', '2020-05-25 09:40:30', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(960, 0, '178.159.37.155', '2020-05-25 10:28:11', '', 'https://www.intelligenza.pro/contact.php', 'contact', '', 'Windows', '', 'en', 'Russia', '', ''),
(961, 0, '213.159.213.137', '2020-05-25 10:56:17', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(962, 0, '84.17.49.45', '2020-05-25 11:00:18', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(963, 0, '84.17.49.45', '2020-05-25 11:00:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(964, 0, '84.17.49.45', '2020-05-25 11:00:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(965, 0, '17.58.97.136', '2020-05-25 11:13:34', '', '', 'register', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(966, 0, '5.188.84.150', '2020-05-25 11:27:21', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(967, 0, '31.165.24.94', '2020-05-25 13:15:53', '', 'https://intelligenza.pro/admin/profile.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(968, 0, '31.165.24.94', '2020-05-25 13:15:56', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(969, 0, '31.165.24.94', '2020-05-25 13:15:59', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(970, 0, '196.52.84.45', '2020-05-25 15:01:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(971, 0, '196.52.84.45', '2020-05-25 15:01:34', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(972, 0, '196.52.84.45', '2020-05-25 15:01:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(973, 0, '196.52.84.45', '2020-05-25 15:01:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(974, 0, '31.165.24.94', '2020-05-25 15:46:41', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(975, 0, '31.165.24.94', '2020-05-25 15:47:09', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(976, 0, '31.165.24.94', '2020-05-25 15:47:14', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(977, 0, '213.180.203.101', '2020-05-25 17:08:41', '', '', 'connect', '', '', '', 'en', 'Russia', '', ''),
(978, 0, '92.38.136.69', '2020-05-25 19:25:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(979, 0, '92.38.136.69', '2020-05-25 19:25:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(980, 0, '92.38.136.69', '2020-05-25 19:25:46', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(981, 0, '54.184.128.130', '2020-05-25 19:27:44', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'United States', '', ''),
(982, 0, '17.58.97.136', '2020-05-25 19:51:43', '', '', 'contact', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(983, 0, '198.143.158.82', '2020-05-25 21:25:49', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(984, 0, '92.38.136.69', '2020-05-25 21:49:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(985, 0, '92.38.136.69', '2020-05-25 21:49:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(986, 0, '92.38.136.69', '2020-05-25 21:49:16', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(987, 0, '31.132.211.144', '2020-05-25 21:57:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(988, 0, '31.132.211.144', '2020-05-25 21:57:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(989, 0, '31.132.211.144', '2020-05-25 21:57:15', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(990, 0, '196.52.84.45', '2020-05-25 22:33:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(991, 0, '196.52.84.45', '2020-05-25 22:33:50', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(992, 0, '196.52.84.45', '2020-05-25 22:33:52', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(993, 0, '196.52.84.45', '2020-05-25 22:33:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(994, 0, '192.3.4.162', '2020-05-25 22:50:50', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(995, 0, '192.3.52.246', '2020-05-25 22:50:53', '', 'http://intelligenza.pro', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(996, 0, '192.3.52.246', '2020-05-25 22:50:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(997, 0, '192.3.52.246', '2020-05-25 22:50:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(998, 0, '148.251.182.79', '2020-05-25 23:26:22', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(999, 0, '17.58.97.136', '2020-05-25 23:38:56', '', '', 'lostPassword', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1000, 0, '118.68.196.83', '2020-05-26 00:10:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1001, 0, '118.68.196.83', '2020-05-26 00:10:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1002, 0, '128.72.160.96', '2020-05-26 00:44:55', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1003, 0, '128.72.160.96', '2020-05-26 00:44:56', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1004, 0, '66.249.66.14', '2020-05-26 02:08:06', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1005, 0, '66.249.66.16', '2020-05-26 02:08:34', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1006, 0, '66.249.66.14', '2020-05-26 02:10:45', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1007, 0, '17.58.97.136', '2020-05-26 02:53:41', '', '', 'terms', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1008, 0, '46.229.168.151', '2020-05-26 04:20:50', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(1009, 0, '66.249.66.16', '2020-05-26 05:02:22', '', '', 'privacy', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1010, 0, '5.188.84.150', '2020-05-26 05:46:56', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1011, 0, '66.249.66.14', '2020-05-26 06:05:57', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1012, 0, '66.249.66.16', '2020-05-26 06:06:15', '', 'https://intelligenza.pro/', 'connect', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1013, 0, '196.52.84.48', '2020-05-26 06:06:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1014, 0, '196.52.84.48', '2020-05-26 06:06:43', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1015, 0, '196.52.84.48', '2020-05-26 06:06:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1016, 0, '196.52.84.48', '2020-05-26 06:06:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1017, 0, '175.42.86.204', '2020-05-26 08:38:30', '', 'http://www.dreams-works.net/profile/41811621/view/', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'China', '', ''),
(1018, 0, '46.229.168.135', '2020-05-26 09:03:27', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1019, 0, '31.165.24.94', '2020-05-26 09:31:07', '', 'https://intelligenza.pro/admin/appFrontEnd.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1020, 0, '31.165.24.94', '2020-05-26 09:31:09', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1021, 0, '31.165.24.94', '2020-05-26 09:31:17', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1022, 0, '31.165.24.94', '2020-05-26 09:31:57', '', 'https://intelligenza.pro/admin/appFrontEnd.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1023, 0, '31.165.24.94', '2020-05-26 09:32:00', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1024, 0, '31.165.24.94', '2020-05-26 09:32:02', '', 'https://intelligenza.pro/connect.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1025, 0, '31.165.24.94', '2020-05-26 09:32:04', '', 'https://intelligenza.pro/register.php', 'lostPassword', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1026, 0, '31.165.24.94', '2020-05-26 09:32:57', '', 'https://intelligenza.pro/lostPassword.php', 'privacy', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1027, 0, '31.165.24.94', '2020-05-26 09:32:58', '', 'https://intelligenza.pro/privacy.php', 'terms', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1028, 0, '31.165.24.94', '2020-05-26 09:33:00', '', 'https://intelligenza.pro/terms.php', 'faq', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1029, 0, '31.165.24.94', '2020-05-26 09:33:02', '', 'https://intelligenza.pro/faq.php', 'contact', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1030, 0, '31.165.24.94', '2020-05-26 09:35:08', '', 'https://intelligenza.pro/404.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1031, 0, '31.165.24.94', '2020-05-26 09:35:13', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1032, 0, '207.46.13.62', '2020-05-26 11:43:05', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1033, 0, '95.84.56.179', '2020-05-26 12:31:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Macintosh', 'Chrome ', 'en', 'Russia', '', ''),
(1034, 0, '95.84.56.179', '2020-05-26 12:31:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Macintosh', 'Chrome ', 'en', 'Russia', '', ''),
(1035, 0, '95.84.56.179', '2020-05-26 12:31:20', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'Russia', '', ''),
(1036, 0, '196.52.84.48', '2020-05-26 13:51:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1037, 0, '196.52.84.48', '2020-05-26 13:51:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1038, 0, '196.52.84.48', '2020-05-26 13:51:26', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1039, 0, '196.52.84.48', '2020-05-26 13:51:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1040, 0, '46.188.98.10', '2020-05-26 15:31:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1041, 0, '46.188.98.10', '2020-05-26 15:31:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1042, 0, '46.188.98.10', '2020-05-26 15:31:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1043, 0, '46.188.98.10', '2020-05-26 15:31:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1044, 0, '46.188.98.10', '2020-05-26 15:31:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1045, 0, '46.188.98.10', '2020-05-26 15:31:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1046, 0, '46.188.98.10', '2020-05-26 15:31:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1047, 0, '46.188.98.10', '2020-05-26 15:31:19', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1048, 0, '188.165.235.173', '2020-05-26 18:05:00', '', '', 'comingSoon', '', '', 'Chrome ', 'en', 'France', '', ''),
(1049, 0, '91.121.71.36', '2020-05-26 18:09:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1050, 0, '91.121.71.36', '2020-05-26 18:09:02', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1051, 0, '91.121.71.36', '2020-05-26 18:09:03', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1052, 0, '62.210.80.34', '2020-05-26 18:15:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1053, 0, '62.210.80.34', '2020-05-26 18:15:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1054, 0, '62.210.80.34', '2020-05-26 18:15:25', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1055, 0, '62.210.80.34', '2020-05-26 18:15:26', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1056, 0, '161.35.209.20', '2020-05-26 18:56:47', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1057, 0, '185.234.219.246', '2020-05-26 20:29:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1058, 0, '185.234.219.246', '2020-05-26 20:29:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1059, 0, '185.234.219.246', '2020-05-26 20:29:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1060, 0, '185.166.87.199', '2020-05-26 20:34:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Estonia', '', ''),
(1061, 0, '185.166.87.199', '2020-05-26 20:34:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Estonia', '', ''),
(1062, 0, '185.166.87.199', '2020-05-26 20:34:33', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Estonia', '', ''),
(1063, 0, '196.52.84.48', '2020-05-26 21:18:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1064, 0, '196.52.84.48', '2020-05-26 21:18:53', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1065, 0, '196.52.84.48', '2020-05-26 21:18:54', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1066, 0, '196.52.84.48', '2020-05-26 21:18:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1067, 0, '42.118.218.53', '2020-05-26 22:08:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1068, 0, '42.118.218.53', '2020-05-26 22:08:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1069, 0, '178.255.215.98', '2020-05-26 22:56:45', '', '', 'comingSoon', '', '', 'Safari ', 'en', 'France', '', ''),
(1070, 0, '207.46.13.207', '2020-05-26 23:45:31', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1071, 0, '144.168.162.250', '2020-05-27 00:55:12', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1072, 0, '161.35.209.59', '2020-05-27 01:34:10', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1073, 0, '46.229.168.144', '2020-05-27 04:28:32', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1074, 0, '196.52.84.48', '2020-05-27 04:31:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1075, 0, '196.52.84.48', '2020-05-27 04:31:11', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1076, 0, '196.52.84.48', '2020-05-27 04:31:13', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1077, 0, '196.52.84.48', '2020-05-27 04:31:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1078, 0, '51.15.114.154', '2020-05-27 06:12:45', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1079, 0, '17.58.97.136', '2020-05-27 06:40:40', '', '', 'faq', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1080, 0, '213.5.78.181', '2020-05-27 07:00:46', '', 'https://www.intelligenza.pro', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1081, 0, '42.236.10.120', '2020-05-27 09:51:44', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1082, 0, '42.236.99.154', '2020-05-27 09:52:14', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1083, 0, '31.165.24.94', '2020-05-27 11:13:47', '', 'https://intelligenza.pro/admin/myFolder.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1084, 0, '31.165.24.94', '2020-05-27 11:13:56', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1085, 0, '104.192.108.10', '2020-05-27 11:34:36', '', '', 'comingSoon', 'iPhone', '', 'Safari ', 'en', 'United States', '', ''),
(1086, 0, '66.249.66.16', '2020-05-27 11:53:40', '', '', 'register', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1087, 0, '196.52.84.48', '2020-05-27 12:05:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1088, 0, '196.52.84.48', '2020-05-27 12:05:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1089, 0, '196.52.84.48', '2020-05-27 12:05:27', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1090, 0, '196.52.84.48', '2020-05-27 12:05:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1091, 0, '207.46.13.18', '2020-05-27 14:06:33', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1092, 0, '185.104.184.126', '2020-05-27 14:10:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1093, 0, '185.104.184.126', '2020-05-27 14:10:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1094, 0, '185.104.184.126', '2020-05-27 14:10:36', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1095, 0, '196.52.84.48', '2020-05-27 17:25:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1096, 0, '196.52.84.48', '2020-05-27 17:25:53', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1097, 0, '196.52.84.48', '2020-05-27 17:25:53', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1098, 0, '196.52.84.48', '2020-05-27 17:25:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1099, 0, '35.164.235.49', '2020-05-27 19:00:42', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1100, 0, '164.132.201.87', '2020-05-27 20:02:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1101, 0, '164.132.201.87', '2020-05-27 20:02:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1102, 0, '164.132.201.87', '2020-05-27 20:02:34', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1103, 0, '164.132.201.87', '2020-05-27 20:02:35', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1104, 0, '54.209.43.45', '2020-05-27 20:41:13', '', 'https://www.intelligenza.pro/', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1105, 0, '54.209.43.45', '2020-05-27 20:41:41', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(1106, 0, '54.209.43.45', '2020-05-27 20:41:51', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(1107, 0, '54.209.43.45', '2020-05-27 20:42:00', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(1108, 0, '54.209.43.45', '2020-05-27 20:42:09', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(1109, 0, '54.209.43.45', '2020-05-27 20:42:31', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1110, 0, '54.209.43.45', '2020-05-27 20:42:41', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(1111, 0, '54.209.43.45', '2020-05-27 20:42:49', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(1112, 0, '54.209.43.45', '2020-05-27 20:43:08', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(1113, 0, '81.177.160.18', '2020-05-27 20:55:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1114, 0, '81.177.160.18', '2020-05-27 20:55:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1115, 0, '81.177.160.18', '2020-05-27 20:55:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1116, 0, '145.255.21.85', '2020-05-27 21:27:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1117, 0, '145.255.21.85', '2020-05-27 21:27:35', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1118, 0, '145.255.21.85', '2020-05-27 21:27:35', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1119, 0, '144.76.60.98', '2020-05-27 21:28:28', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(1120, 0, '144.76.60.98', '2020-05-27 21:28:30', '', '', 'connect', '', '', '', 'en', 'Germany', '', ''),
(1121, 0, '144.76.60.98', '2020-05-27 21:28:31', '', '', 'register', '', '', '', 'en', 'Germany', '', ''),
(1122, 0, '144.76.60.98', '2020-05-27 21:28:33', '', '', 'lostPassword', '', '', '', 'en', 'Germany', '', ''),
(1123, 0, '144.76.60.98', '2020-05-27 21:28:33', '', '', 'privacy', '', '', '', 'en', 'Germany', '', ''),
(1124, 0, '144.76.60.98', '2020-05-27 21:28:35', '', '', 'terms', '', '', '', 'en', 'Germany', '', ''),
(1125, 0, '144.76.60.98', '2020-05-27 21:28:36', '', '', 'faq', '', '', '', 'en', 'Germany', '', ''),
(1126, 0, '144.76.60.98', '2020-05-27 21:28:40', '', '', 'contact', '', '', '', 'en', 'Germany', '', ''),
(1127, 0, '144.76.60.98', '2020-05-27 21:28:46', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(1128, 0, '5.188.84.150', '2020-05-27 21:54:12', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1129, 0, '5.188.84.150', '2020-05-27 21:54:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1130, 0, '5.188.84.150', '2020-05-27 21:54:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1131, 0, '5.188.84.150', '2020-05-27 21:54:15', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1132, 0, '31.165.24.94', '2020-05-27 22:11:47', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1133, 0, '31.165.24.94', '2020-05-27 22:11:50', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1134, 0, '31.165.24.94', '2020-05-27 22:12:03', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1135, 0, '31.165.24.94', '2020-05-27 22:12:16', '', 'https://intelligenza.pro/admin/appSettings.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1136, 0, '31.165.24.94', '2020-05-27 22:12:19', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1137, 0, '31.165.24.94', '2020-05-27 22:12:35', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1138, 0, '178.154.200.124', '2020-05-27 22:17:08', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1139, 0, '31.165.24.94', '2020-05-27 22:20:15', '', 'https://intelligenza.pro/admin/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1140, 0, '31.165.24.94', '2020-05-27 22:20:26', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1141, 0, '95.84.56.179', '2020-05-27 22:49:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1142, 0, '95.84.56.179', '2020-05-27 22:49:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1143, 0, '31.165.24.94', '2020-05-27 22:50:18', '', 'https://intelligenza.pro/admin/myFolder.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1144, 0, '31.165.24.94', '2020-05-27 22:50:25', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1145, 0, '178.154.200.161', '2020-05-27 23:01:32', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1146, 0, '178.154.200.117', '2020-05-27 23:03:47', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1147, 0, '178.159.37.69', '2020-05-28 00:59:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1148, 0, '178.159.37.69', '2020-05-28 00:59:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1149, 0, '178.159.37.69', '2020-05-28 00:59:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1150, 0, '196.52.84.48', '2020-05-28 01:08:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1151, 0, '196.52.84.48', '2020-05-28 01:08:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1152, 0, '196.52.84.48', '2020-05-28 01:08:03', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1153, 0, '196.52.84.48', '2020-05-28 01:08:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1154, 0, '75.155.224.20', '2020-05-28 03:32:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1155, 0, '5.188.84.150', '2020-05-28 04:43:49', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1156, 0, '81.177.160.18', '2020-05-28 04:52:59', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1157, 0, '46.229.168.137', '2020-05-28 05:51:43', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(1158, 0, '46.188.98.10', '2020-05-28 07:41:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1159, 0, '46.188.98.10', '2020-05-28 07:41:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1160, 0, '46.188.98.10', '2020-05-28 07:41:23', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1161, 0, '196.52.84.13', '2020-05-28 09:02:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1162, 0, '196.52.84.13', '2020-05-28 09:02:15', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1163, 0, '196.52.84.13', '2020-05-28 09:02:16', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1164, 0, '196.52.84.13', '2020-05-28 09:02:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1165, 0, '17.58.97.136', '2020-05-28 14:28:37', '', '', 'privacy', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1166, 0, '185.234.219.246', '2020-05-28 14:39:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1167, 0, '185.234.219.246', '2020-05-28 14:39:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1168, 0, '185.234.219.246', '2020-05-28 14:39:39', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1169, 0, '178.70.94.151', '2020-05-28 15:02:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1170, 0, '178.70.94.151', '2020-05-28 15:02:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1171, 0, '178.70.94.151', '2020-05-28 15:02:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1172, 0, '31.165.24.94', '2020-05-28 15:26:53', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1173, 0, '31.165.24.94', '2020-05-28 15:29:41', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1174, 0, '31.165.24.94', '2020-05-28 15:29:45', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1175, 0, '207.46.13.129', '2020-05-28 15:31:01', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1176, 0, '5.183.92.56', '2020-05-28 15:42:45', '', 'https://intelligenza.pro/admin/appMembers.php?whileMembers=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1177, 0, '5.183.92.56', '2020-05-28 15:43:04', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1178, 0, '5.183.92.56', '2020-05-28 15:43:41', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1179, 0, '5.183.92.56', '2020-05-28 15:43:50', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1180, 0, '17.58.97.136', '2020-05-28 15:47:14', '', '', 'connect', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1181, 0, '2a00:23c7:9500:5601:756e:1b2d:aac8:2908', '2020-05-28 15:48:20', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1182, 0, '196.52.84.13', '2020-05-28 16:49:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1183, 0, '196.52.84.13', '2020-05-28 16:49:44', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1184, 0, '196.52.84.13', '2020-05-28 16:49:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1185, 0, '196.52.84.13', '2020-05-28 16:49:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1186, 0, '2.95.24.28', '2020-05-28 18:30:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1187, 0, '2.95.24.28', '2020-05-28 18:30:55', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1188, 0, '2.95.24.28', '2020-05-28 18:30:55', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1189, 0, '31.132.211.144', '2020-05-28 18:42:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1190, 0, '31.132.211.144', '2020-05-28 18:42:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1191, 0, '31.132.211.144', '2020-05-28 18:42:57', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1192, 0, '46.188.98.10', '2020-05-28 19:10:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1193, 0, '46.188.98.10', '2020-05-28 19:10:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1194, 0, '46.188.98.10', '2020-05-28 19:10:41', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1195, 0, '31.165.24.94', '2020-05-28 19:29:27', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1196, 0, '31.165.24.94', '2020-05-28 19:29:31', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1197, 0, '31.165.24.94', '2020-05-28 19:29:35', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1198, 0, '46.229.168.131', '2020-05-28 19:49:48', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(1199, 0, '31.165.24.94', '2020-05-28 20:14:35', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1200, 0, '31.165.24.94', '2020-05-28 20:14:37', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1201, 0, '31.165.24.94', '2020-05-28 20:14:46', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1202, 31, '31.165.24.94', '2020-05-28 20:14:46', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1203, 31, '31.165.24.94', '2020-05-28 20:14:51', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1204, 31, '31.165.24.94', '2020-05-28 20:15:38', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1205, 31, '31.165.24.94', '2020-05-28 20:16:18', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1206, 31, '31.165.24.94', '2020-05-28 20:16:43', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1207, 31, '31.165.24.94', '2020-05-28 20:17:03', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1208, 31, '31.165.24.94', '2020-05-28 20:17:41', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1209, 31, '31.165.24.94', '2020-05-28 20:19:18', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1210, 31, '31.165.24.94', '2020-05-28 20:19:20', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1211, 31, '31.165.24.94', '2020-05-28 20:19:25', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1212, 31, '31.165.24.94', '2020-05-28 20:19:25', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1213, 31, '31.165.24.94', '2020-05-28 20:20:06', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1214, 31, '31.165.24.94', '2020-05-28 20:22:30', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1215, 31, '31.165.24.94', '2020-05-28 20:23:21', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1216, 31, '31.165.24.94', '2020-05-28 20:24:10', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1217, 31, '31.165.24.94', '2020-05-28 20:24:57', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1218, 31, '31.165.24.94', '2020-05-28 20:25:48', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1219, 31, '31.165.24.94', '2020-05-28 20:25:58', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1220, 31, '31.165.24.94', '2020-05-28 20:26:27', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1221, 31, '31.165.24.94', '2020-05-28 20:27:32', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1222, 31, '31.165.24.94', '2020-05-28 20:28:08', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1223, 31, '31.165.24.94', '2020-05-28 20:28:36', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1224, 31, '31.165.24.94', '2020-05-28 20:29:18', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1225, 31, '31.165.24.94', '2020-05-28 20:29:45', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1226, 31, '31.165.24.94', '2020-05-28 20:31:35', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1227, 31, '31.165.24.94', '2020-05-28 20:32:14', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1228, 31, '31.165.24.94', '2020-05-28 20:33:10', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1229, 31, '31.165.24.94', '2020-05-28 20:33:59', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1230, 31, '31.165.24.94', '2020-05-28 20:34:12', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1231, 31, '31.165.24.94', '2020-05-28 20:38:48', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1232, 0, '31.165.24.94', '2020-05-28 20:38:48', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1233, 0, '31.165.24.94', '2020-05-28 20:38:51', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1234, 0, '31.165.24.94', '2020-05-28 20:39:03', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1235, 0, '31.165.24.94', '2020-05-28 20:39:55', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1236, 0, '31.165.24.94', '2020-05-28 20:39:58', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1237, 0, '31.165.24.94', '2020-05-28 20:40:02', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1238, 0, '31.165.24.94', '2020-05-28 20:43:03', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1239, 0, '31.165.24.94', '2020-05-28 20:43:06', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1240, 0, '31.165.24.94', '2020-05-28 20:43:12', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1241, 30, '31.165.24.94', '2020-05-28 20:43:12', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1242, 30, '31.165.24.94', '2020-05-28 20:43:16', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1243, 30, '31.165.24.94', '2020-05-28 20:48:15', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1244, 30, '31.165.24.94', '2020-05-28 20:48:25', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1245, 30, '31.165.24.94', '2020-05-28 20:48:34', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1246, 30, '31.165.24.94', '2020-05-28 20:48:38', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1247, 30, '31.165.24.94', '2020-05-28 20:48:47', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1248, 30, '31.165.24.94', '2020-05-28 20:48:47', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1249, 30, '31.165.24.94', '2020-05-28 20:48:52', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1250, 30, '31.165.24.94', '2020-05-28 20:48:52', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1251, 30, '31.165.24.94', '2020-05-28 20:48:56', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1252, 30, '31.165.24.94', '2020-05-28 20:48:57', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1253, 30, '31.165.24.94', '2020-05-28 20:49:05', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1254, 0, '31.165.24.94', '2020-05-28 20:49:06', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1255, 0, '31.165.24.94', '2020-05-28 20:49:11', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1256, 0, '31.165.24.94', '2020-05-28 20:49:23', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1257, 0, '183.136.225.46', '2020-05-28 20:56:41', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'China', '', ''),
(1258, 0, '5.183.94.58', '2020-05-28 22:30:12', '', 'https://intelligenza.pro/admin/profile.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1259, 0, '5.183.94.58', '2020-05-28 22:30:16', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1260, 0, '5.183.94.58', '2020-05-28 22:30:21', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Germany', '', ''),
(1261, 0, '188.165.232.202', '2020-05-28 23:20:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1262, 0, '188.165.232.202', '2020-05-28 23:20:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1263, 0, '188.165.232.202', '2020-05-28 23:20:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1264, 0, '207.46.13.3', '2020-05-28 23:24:29', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1265, 0, '196.52.84.13', '2020-05-29 00:34:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1266, 0, '196.52.84.13', '2020-05-29 00:34:22', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1267, 0, '196.52.84.13', '2020-05-29 00:34:22', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1268, 0, '196.52.84.13', '2020-05-29 00:34:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1269, 0, '54.36.148.31', '2020-05-29 01:46:04', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1270, 0, '178.159.37.155', '2020-05-29 03:39:51', '', 'https://www.intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Firefox ', 'en', 'Russia', '', ''),
(1271, 0, '207.46.13.3', '2020-05-29 03:56:38', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1272, 0, '185.88.100.234', '2020-05-29 07:29:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1273, 0, '185.88.100.234', '2020-05-29 07:29:12', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1274, 0, '185.88.100.234', '2020-05-29 07:29:12', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1275, 0, '196.52.84.13', '2020-05-29 08:25:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1276, 0, '196.52.84.13', '2020-05-29 08:25:38', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1277, 0, '196.52.84.13', '2020-05-29 08:25:39', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1278, 0, '196.52.84.13', '2020-05-29 08:25:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1279, 0, '31.165.24.94', '2020-05-29 08:35:27', '', 'https://intelligenza.pro/admin/share.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1280, 0, '31.165.24.94', '2020-05-29 08:35:32', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1281, 0, '31.165.24.94', '2020-05-29 08:35:36', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1282, 0, '42.236.12.130', '2020-05-29 09:34:16', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1283, 0, '42.236.12.130', '2020-05-29 09:34:17', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1284, 0, '188.163.109.153', '2020-05-29 10:37:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1285, 0, '188.163.109.153', '2020-05-29 10:37:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1286, 0, '78.46.185.161', '2020-05-29 11:46:09', '', '', 'contact', '', 'Windows', 'IE ', 'en', 'Germany', '', ''),
(1287, 0, '5.172.199.73', '2020-05-29 12:52:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1288, 0, '5.172.199.73', '2020-05-29 12:52:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1289, 0, '5.172.199.73', '2020-05-29 12:52:24', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1290, 0, '196.52.84.13', '2020-05-29 15:19:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1291, 0, '196.52.84.13', '2020-05-29 15:19:50', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1292, 0, '196.52.84.13', '2020-05-29 15:19:51', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1293, 0, '196.52.84.13', '2020-05-29 15:19:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1294, 0, '54.36.148.84', '2020-05-29 16:37:59', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1295, 0, '40.77.167.221', '2020-05-29 17:31:58', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1296, 0, '46.229.168.161', '2020-05-29 17:51:08', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1297, 0, '46.188.98.10', '2020-05-29 17:58:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1298, 0, '46.188.98.10', '2020-05-29 17:58:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1299, 0, '46.188.98.10', '2020-05-29 17:58:49', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1300, 0, '185.22.175.133', '2020-05-29 19:08:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1301, 0, '185.22.175.133', '2020-05-29 19:08:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(1302, 0, '185.22.175.133', '2020-05-29 19:08:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1303, 0, '123.116.33.18', '2020-05-29 19:44:13', '', '', 'comingSoon', '', '', '', 'en', 'China', '', ''),
(1304, 0, '123.116.33.18', '2020-05-29 19:44:16', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'China', '', ''),
(1305, 0, '192.36.248.249', '2020-05-29 21:37:43', '', 'http://intelligenza.pro/', 'comingSoon', '', '', '', 'en', 'Sweden', '', ''),
(1306, 0, '196.52.84.13', '2020-05-29 23:02:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1307, 0, '196.52.84.13', '2020-05-29 23:02:33', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1308, 0, '196.52.84.13', '2020-05-29 23:02:36', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1309, 0, '196.52.84.13', '2020-05-29 23:02:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1310, 0, '93.174.93.24', '2020-05-29 23:20:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1311, 0, '93.174.93.24', '2020-05-29 23:20:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1312, 0, '185.108.107.30', '2020-05-29 23:52:52', '', 'https://intelligenza.pro/admin/index.php?', 'app_profileEdit', '', 'Macintosh', 'Chrome ', 'fr', 'Finland', '', ''),
(1313, 0, '185.108.107.30', '2020-05-29 23:52:53', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Macintosh', 'Chrome ', 'fr', 'Finland', '', ''),
(1314, 0, '46.229.168.129', '2020-05-30 00:38:10', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(1315, 0, '188.163.109.153', '2020-05-30 01:13:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1316, 0, '188.163.109.153', '2020-05-30 01:13:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1317, 0, '188.163.109.153', '2020-05-30 01:13:09', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1318, 0, '49.12.72.87', '2020-05-30 04:10:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1319, 0, '5.188.62.25', '2020-05-30 04:32:45', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1320, 0, '5.188.62.25', '2020-05-30 04:32:45', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1321, 0, '5.188.62.25', '2020-05-30 04:32:45', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1322, 0, '5.188.62.25', '2020-05-30 04:32:46', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1323, 0, '5.188.62.25', '2020-05-30 04:41:58', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1324, 0, '5.188.62.25', '2020-05-30 04:41:59', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1325, 0, '5.188.62.25', '2020-05-30 04:41:59', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1326, 0, '5.188.62.25', '2020-05-30 04:41:59', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1327, 0, '5.188.62.25', '2020-05-30 04:50:41', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1328, 0, '5.188.62.25', '2020-05-30 04:50:41', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1329, 0, '5.188.62.25', '2020-05-30 04:50:41', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1330, 0, '5.188.62.25', '2020-05-30 04:50:42', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1331, 0, '5.188.62.25', '2020-05-30 04:59:31', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1332, 0, '5.188.62.25', '2020-05-30 04:59:31', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1333, 0, '5.188.62.25', '2020-05-30 04:59:32', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1334, 0, '5.188.62.25', '2020-05-30 04:59:32', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1335, 0, '5.188.62.25', '2020-05-30 05:08:22', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1336, 0, '5.188.62.25', '2020-05-30 05:08:23', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1337, 0, '5.188.62.25', '2020-05-30 05:08:23', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1338, 0, '5.188.62.25', '2020-05-30 05:08:24', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1339, 0, '5.188.62.25', '2020-05-30 05:17:18', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1340, 0, '5.188.62.25', '2020-05-30 05:17:19', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1341, 0, '5.188.62.25', '2020-05-30 05:17:19', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1342, 0, '5.188.62.25', '2020-05-30 05:17:19', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1343, 0, '5.188.62.25', '2020-05-30 05:26:09', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1344, 0, '5.188.62.25', '2020-05-30 05:26:09', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1345, 0, '5.188.62.25', '2020-05-30 05:26:10', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1346, 0, '5.188.62.25', '2020-05-30 05:26:10', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1347, 0, '78.85.244.225', '2020-05-30 05:35:03', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'Russia', '', ''),
(1348, 0, '78.85.244.225', '2020-05-30 05:35:06', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'Russia', '', ''),
(1349, 0, '5.188.62.25', '2020-05-30 05:35:06', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1350, 0, '5.188.62.25', '2020-05-30 05:35:07', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1351, 0, '5.188.62.25', '2020-05-30 05:35:07', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1352, 0, '5.188.62.25', '2020-05-30 05:35:07', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1353, 0, '5.188.62.25', '2020-05-30 05:43:56', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1354, 0, '5.188.62.25', '2020-05-30 05:43:56', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1355, 0, '5.188.62.25', '2020-05-30 05:43:57', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1356, 0, '5.188.62.25', '2020-05-30 05:43:57', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1357, 0, '5.188.62.25', '2020-05-30 05:52:50', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1358, 0, '5.188.62.25', '2020-05-30 05:52:50', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1359, 0, '5.188.62.25', '2020-05-30 05:52:51', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1360, 0, '5.188.62.25', '2020-05-30 05:52:51', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1361, 0, '5.188.62.25', '2020-05-30 06:01:44', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1362, 0, '5.188.62.25', '2020-05-30 06:01:44', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1363, 0, '5.188.62.25', '2020-05-30 06:01:45', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1364, 0, '5.188.62.25', '2020-05-30 06:01:45', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1365, 0, '209.17.96.122', '2020-05-30 06:03:31', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1366, 0, '5.188.62.25', '2020-05-30 06:10:40', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1367, 0, '5.188.62.25', '2020-05-30 06:10:40', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1368, 0, '5.188.62.25', '2020-05-30 06:10:41', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1369, 0, '5.188.62.25', '2020-05-30 06:10:41', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1370, 0, '94.103.82.197', '2020-05-30 06:14:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1371, 0, '94.103.82.197', '2020-05-30 06:14:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1372, 0, '5.188.62.25', '2020-05-30 06:19:27', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1373, 0, '5.188.62.25', '2020-05-30 06:19:27', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1374, 0, '5.188.62.25', '2020-05-30 06:19:27', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1375, 0, '5.188.62.25', '2020-05-30 06:19:28', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1376, 0, '157.55.39.164', '2020-05-30 06:20:06', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1377, 0, '5.188.62.25', '2020-05-30 06:28:17', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1378, 0, '5.188.62.25', '2020-05-30 06:28:17', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1379, 0, '5.188.62.25', '2020-05-30 06:28:18', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1380, 0, '5.188.62.25', '2020-05-30 06:28:18', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1381, 0, '5.188.62.25', '2020-05-30 06:37:08', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1382, 0, '5.188.62.25', '2020-05-30 06:37:08', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1383, 0, '5.188.62.25', '2020-05-30 06:37:09', '', 'https://intelligenza.pro/admin/', 'app_admin_home', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1384, 0, '5.188.62.25', '2020-05-30 06:37:09', '', 'https://intelligenza.pro/admin/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1385, 0, '196.52.84.13', '2020-05-30 06:45:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1386, 0, '196.52.84.13', '2020-05-30 06:45:08', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1387, 0, '196.52.84.13', '2020-05-30 06:45:10', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1388, 0, '196.52.84.13', '2020-05-30 06:45:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1389, 0, '31.132.211.144', '2020-05-30 07:16:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1390, 0, '31.132.211.144', '2020-05-30 07:16:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1391, 0, '31.132.211.144', '2020-05-30 07:16:46', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1392, 0, '46.229.168.136', '2020-05-30 08:17:52', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(1393, 0, '54.36.148.206', '2020-05-30 08:32:56', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1394, 0, '31.165.24.94', '2020-05-30 09:28:17', '', 'https://intelligenza.pro/admin/appMembers.php?whileMembers=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1395, 0, '31.165.24.94', '2020-05-30 09:28:26', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1396, 0, '66.249.66.16', '2020-05-30 10:41:11', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1397, 0, '185.220.101.25', '2020-05-30 11:45:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1398, 0, '185.220.101.25', '2020-05-30 11:45:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1399, 0, '185.220.101.25', '2020-05-30 11:45:18', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1400, 0, '159.224.255.154', '2020-05-30 13:56:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1401, 0, '159.224.255.154', '2020-05-30 13:56:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1402, 0, '159.224.255.154', '2020-05-30 13:56:36', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1403, 0, '196.52.84.13', '2020-05-30 14:22:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1404, 0, '196.52.84.13', '2020-05-30 14:22:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1405, 0, '196.52.84.13', '2020-05-30 14:22:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1406, 0, '196.52.84.13', '2020-05-30 14:22:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1407, 0, '5.172.199.73', '2020-05-30 14:38:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1408, 0, '5.172.199.73', '2020-05-30 14:38:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1409, 0, '5.172.199.73', '2020-05-30 14:38:45', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Greece', '', ''),
(1410, 0, '195.176.3.24', '2020-05-30 16:15:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(1411, 0, '195.176.3.24', '2020-05-30 16:15:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(1412, 0, '195.176.3.24', '2020-05-30 16:15:20', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Switzerland', '', ''),
(1413, 0, '49.12.13.212', '2020-05-30 17:14:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1414, 0, '17.58.97.136', '2020-05-30 19:24:55', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1415, 0, '157.55.39.123', '2020-05-30 19:46:35', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1416, 0, '51.38.233.93', '2020-05-30 21:13:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1417, 0, '51.38.233.93', '2020-05-30 21:13:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1418, 0, '51.38.233.93', '2020-05-30 21:13:48', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1419, 0, '196.52.84.13', '2020-05-30 22:07:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1420, 0, '196.52.84.13', '2020-05-30 22:07:14', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1421, 0, '196.52.84.13', '2020-05-30 22:07:15', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1422, 0, '196.52.84.13', '2020-05-30 22:07:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1423, 0, '196.245.217.126', '2020-05-31 00:09:00', '', 'https://www.intelligenza.pro', 'contact', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(1424, 0, '84.17.59.70', '2020-05-31 01:06:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1425, 0, '84.17.59.70', '2020-05-31 01:06:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1426, 0, '84.17.59.70', '2020-05-31 01:06:52', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1427, 0, '88.147.153.34', '2020-05-31 01:09:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1428, 0, '88.147.153.34', '2020-05-31 01:09:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1429, 0, '54.36.148.149', '2020-05-31 01:18:58', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1430, 0, '72.11.157.71', '2020-05-31 01:49:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1431, 0, '72.11.157.71', '2020-05-31 01:49:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1432, 0, '196.52.84.13', '2020-05-31 05:24:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1433, 0, '196.52.84.13', '2020-05-31 05:24:28', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1434, 0, '196.52.84.13', '2020-05-31 05:24:28', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1435, 0, '196.52.84.13', '2020-05-31 05:24:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1436, 0, '86.126.8.198', '2020-05-31 06:09:57', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Romania', '', ''),
(1437, 0, '46.229.168.137', '2020-05-31 07:06:49', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(1438, 0, '81.209.177.145', '2020-05-31 08:57:09', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(1439, 0, '196.52.84.13', '2020-05-31 11:55:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1440, 0, '196.52.84.13', '2020-05-31 11:55:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1441, 0, '196.52.84.13', '2020-05-31 11:55:04', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1442, 0, '196.52.84.13', '2020-05-31 11:55:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1443, 0, '45.9.148.219', '2020-05-31 13:14:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1444, 0, '45.9.148.219', '2020-05-31 13:14:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1445, 0, '185.117.118.189', '2020-05-31 14:37:12', '', 'https://intelligenza.pro/admin/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Russia', '', ''),
(1446, 0, '185.117.118.189', '2020-05-31 14:37:31', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Russia', '', ''),
(1447, 0, '54.36.148.231', '2020-05-31 14:43:59', '', '', 'connect', '', '', '', 'en', 'France', '', ''),
(1448, 0, '31.165.24.94', '2020-05-31 14:55:55', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1449, 0, '31.165.24.94', '2020-05-31 14:55:59', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1450, 0, '31.165.24.94', '2020-05-31 14:56:04', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1451, 0, '66.249.66.18', '2020-05-31 16:31:19', '', '', 'contact', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1452, 0, '46.229.168.135', '2020-05-31 17:20:42', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(1453, 0, '193.70.73.242', '2020-05-31 18:07:51', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'France', '', ''),
(1454, 0, '54.36.148.168', '2020-05-31 18:36:00', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1455, 0, '220.79.34.109', '2020-05-31 18:53:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'South Korea', '', ''),
(1456, 0, '178.159.37.88', '2020-05-31 18:53:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1457, 0, '178.159.37.88', '2020-05-31 18:53:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1458, 0, '178.159.37.88', '2020-05-31 18:53:09', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1459, 0, '178.159.37.88', '2020-05-31 18:53:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1460, 0, '220.79.34.109', '2020-05-31 18:53:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'South Korea', '', ''),
(1461, 0, '196.52.84.14', '2020-05-31 20:30:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1462, 0, '196.52.84.14', '2020-05-31 20:30:31', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1463, 0, '196.52.84.14', '2020-05-31 20:30:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1464, 0, '196.52.84.14', '2020-05-31 20:30:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1465, 0, '157.55.39.57', '2020-05-31 21:41:05', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1466, 0, '46.119.187.93', '2020-06-01 00:21:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1467, 0, '46.119.187.93', '2020-06-01 00:21:05', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1468, 0, '46.119.187.93', '2020-06-01 00:21:06', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1469, 0, '46.0.203.99', '2020-06-01 00:52:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1470, 0, '46.0.203.99', '2020-06-01 00:52:42', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1471, 0, '46.0.203.99', '2020-06-01 00:52:42', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1472, 0, '128.71.162.46', '2020-06-01 01:01:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1473, 0, '128.71.162.46', '2020-06-01 01:01:45', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1474, 0, '128.71.162.46', '2020-06-01 01:01:46', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1475, 0, '54.36.149.101', '2020-06-01 02:04:01', '', '', 'contact', '', '', '', 'en', 'France', '', ''),
(1476, 0, '176.100.190.63', '2020-06-01 02:31:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1477, 0, '176.100.190.63', '2020-06-01 02:31:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1478, 0, '176.100.190.63', '2020-06-01 02:31:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1479, 0, '176.100.190.63', '2020-06-01 02:31:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1480, 0, '54.36.148.79', '2020-06-01 04:19:50', '', '', 'faq', '', '', '', 'en', 'France', '', ''),
(1481, 0, '92.38.136.69', '2020-06-01 04:53:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1482, 0, '92.38.136.69', '2020-06-01 04:53:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1483, 0, '92.38.136.69', '2020-06-01 04:53:17', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1484, 0, '196.52.84.14', '2020-06-01 05:01:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1485, 0, '196.52.84.14', '2020-06-01 05:01:00', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1486, 0, '196.52.84.14', '2020-06-01 05:01:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1487, 0, '196.52.84.14', '2020-06-01 05:01:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1488, 0, '31.132.211.144', '2020-06-01 08:30:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1489, 0, '31.132.211.144', '2020-06-01 08:30:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1490, 0, '31.132.211.144', '2020-06-01 08:30:10', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1491, 0, '42.236.99.154', '2020-06-01 08:55:38', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1492, 0, '42.236.12.190', '2020-06-01 08:55:48', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1493, 0, '178.159.37.69', '2020-06-01 10:34:14', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1494, 0, '31.165.24.94', '2020-06-01 11:08:13', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Macintosh', 'Chrome ', 'fr', 'Switzerland', '', ''),
(1495, 0, '46.229.168.131', '2020-06-01 11:17:28', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(1496, 0, '188.163.109.153', '2020-06-01 11:26:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1497, 0, '188.163.109.153', '2020-06-01 11:26:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1498, 0, '188.163.109.153', '2020-06-01 11:26:32', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1499, 0, '54.36.149.90', '2020-06-01 11:39:46', '', '', 'lostPassword', '', '', '', 'en', 'France', '', ''),
(1500, 0, '54.36.149.17', '2020-06-01 12:12:25', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1501, 0, '54.36.149.100', '2020-06-01 12:45:18', '', '', 'privacy', '', '', '', 'en', 'France', '', ''),
(1502, 0, '2a01:4f9:c010:7e0c::1', '2020-06-01 12:58:57', '', 'http://intelligenza.pro', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1503, 0, '54.36.149.8', '2020-06-01 13:02:39', '', '', 'register', '', '', '', 'en', 'France', '', ''),
(1504, 0, '54.36.148.242', '2020-06-01 13:20:26', '', '', 'terms', '', '', '', 'en', 'France', '', ''),
(1505, 0, '196.52.84.14', '2020-06-01 13:32:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1506, 0, '196.52.84.14', '2020-06-01 13:32:15', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1507, 0, '196.52.84.14', '2020-06-01 13:32:16', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1508, 0, '196.52.84.14', '2020-06-01 13:32:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1509, 0, '2001:bc8:608:102a::1', '2020-06-01 15:36:51', '', 'http://intelligenza.pro', 'comingSoon', 'iPhone', '', 'Safari ', 'en', 'France', '', ''),
(1510, 0, '31.165.24.94', '2020-06-01 16:06:11', '', 'https://intelligenza.pro/admin/analytics.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1511, 0, '31.165.24.94', '2020-06-01 16:06:17', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1512, 0, '178.159.37.69', '2020-06-01 16:14:18', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1513, 0, '157.55.39.57', '2020-06-01 17:36:59', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1514, 0, '45.82.223.50', '2020-06-01 19:59:00', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1515, 0, '45.82.223.50', '2020-06-01 19:59:04', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1516, 0, '45.82.223.50', '2020-06-01 19:59:16', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1517, 0, '88.147.173.61', '2020-06-01 20:01:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1518, 0, '88.147.173.61', '2020-06-01 20:01:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1519, 0, '51.15.15.164', '2020-06-01 20:02:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1520, 0, '51.15.15.164', '2020-06-01 20:02:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1521, 0, '51.15.15.164', '2020-06-01 20:02:07', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1522, 0, '51.15.15.164', '2020-06-01 20:02:07', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1523, 0, '183.136.225.46', '2020-06-01 20:29:39', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'China', '', ''),
(1524, 0, '188.172.220.71', '2020-06-01 20:31:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1525, 0, '188.172.220.71', '2020-06-01 20:31:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1526, 0, '188.172.220.71', '2020-06-01 20:31:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1527, 0, '87.117.49.202', '2020-06-01 20:32:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1528, 0, '87.117.49.202', '2020-06-01 20:32:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1529, 0, '87.117.49.202', '2020-06-01 20:32:19', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1530, 0, '66.249.64.144', '2020-06-01 21:26:05', '', '', 'lostPassword', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(1531, 0, '196.52.84.14', '2020-06-01 22:05:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1532, 0, '196.52.84.14', '2020-06-01 22:05:17', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1533, 0, '196.52.84.14', '2020-06-01 22:05:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1534, 0, '196.52.84.14', '2020-06-01 22:05:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1535, 0, '45.82.223.50', '2020-06-01 22:40:08', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1536, 0, '45.82.223.50', '2020-06-01 22:40:11', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1537, 0, '45.82.223.50', '2020-06-01 22:40:18', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1538, 0, '45.82.223.50', '2020-06-01 22:44:07', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1539, 0, '45.82.223.50', '2020-06-01 22:44:09', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1540, 0, '45.82.223.50', '2020-06-01 22:44:13', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1541, 0, '45.82.223.50', '2020-06-01 22:45:02', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1542, 0, '45.82.223.50', '2020-06-01 22:45:05', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1543, 0, '45.82.223.50', '2020-06-01 22:45:09', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1544, 0, '45.82.223.50', '2020-06-01 22:48:32', '', 'https://intelligenza.pro/admin/noty.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1545, 0, '45.82.223.50', '2020-06-01 22:48:35', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1546, 0, '45.82.223.50', '2020-06-01 22:48:40', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1547, 0, '45.82.223.50', '2020-06-01 22:52:11', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1548, 0, '45.82.223.50', '2020-06-01 22:52:14', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1549, 0, '45.82.223.50', '2020-06-01 22:52:18', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1550, 0, '45.82.223.50', '2020-06-01 22:54:55', '', 'https://intelligenza.pro/admin/index.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1551, 0, '45.82.223.50', '2020-06-01 22:54:57', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1552, 0, '45.82.223.50', '2020-06-01 22:55:01', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1553, 0, '45.82.223.50', '2020-06-01 22:57:01', '', 'https://intelligenza.pro/admin/appMembers.php?whileMembers=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1554, 0, '45.82.223.50', '2020-06-01 22:57:03', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1555, 0, '45.82.223.50', '2020-06-01 22:57:07', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1556, 31, '45.82.223.50', '2020-06-01 22:57:07', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1557, 31, '45.82.223.50', '2020-06-01 22:57:28', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1558, 31, '45.82.223.50', '2020-06-01 22:57:48', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1559, 31, '45.82.223.50', '2020-06-01 22:58:45', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1560, 31, '45.82.223.50', '2020-06-01 22:58:45', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1561, 31, '45.82.223.50', '2020-06-01 22:58:54', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1562, 0, '45.82.223.50', '2020-06-01 22:58:54', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1563, 0, '45.82.223.50', '2020-06-01 22:58:56', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1564, 0, '45.82.223.50', '2020-06-01 22:59:01', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1565, 0, '51.77.52.160', '2020-06-02 00:10:15', '', '', 'comingSoon', '', '', 'Chrome ', 'en', 'Poland', '', ''),
(1566, 0, '54.214.160.74', '2020-06-02 01:27:22', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1567, 0, '66.249.66.18', '2020-06-02 02:41:49', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1568, 0, '35.204.228.166', '2020-06-02 02:55:57', '', '', 'comingSoon', '', '', 'Firefox ', 'en', '', '', ''),
(1569, 0, '35.204.228.166', '2020-06-02 02:55:57', '', '', 'app_admin_home', '', '', 'Firefox ', 'en', '', '', ''),
(1570, 0, '35.204.228.166', '2020-06-02 02:55:58', '', '', 'comingSoon', '', '', 'Firefox ', 'en', '', '', ''),
(1571, 0, '45.132.227.184', '2020-06-02 03:07:56', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1572, 0, '45.132.227.184', '2020-06-02 03:07:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1573, 0, '45.132.227.184', '2020-06-02 03:07:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1574, 0, '45.132.227.184', '2020-06-02 03:07:59', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1575, 0, '196.52.84.14', '2020-06-02 05:26:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1576, 0, '196.52.84.14', '2020-06-02 05:26:45', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1577, 0, '196.52.84.14', '2020-06-02 05:26:46', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1578, 0, '196.52.84.14', '2020-06-02 05:26:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1579, 0, '46.191.233.30', '2020-06-02 05:27:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1580, 0, '46.191.233.30', '2020-06-02 05:27:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1581, 0, '46.191.233.30', '2020-06-02 05:27:11', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1582, 0, '83.221.222.94', '2020-06-02 05:57:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1583, 0, '83.221.222.94', '2020-06-02 05:57:13', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1584, 0, '83.221.222.94', '2020-06-02 05:57:13', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1585, 0, '46.229.168.132', '2020-06-02 05:58:23', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1586, 0, '157.55.39.57', '2020-06-02 06:20:34', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1587, 0, '54.36.148.76', '2020-06-02 06:25:18', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1588, 0, '213.180.203.100', '2020-06-02 06:51:04', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1589, 0, '185.209.28.82', '2020-06-02 08:01:08', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1590, 0, '31.132.211.144', '2020-06-02 11:52:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1591, 0, '31.132.211.144', '2020-06-02 11:52:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1592, 0, '31.132.211.144', '2020-06-02 11:52:13', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1593, 0, '196.52.84.14', '2020-06-02 12:59:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1594, 0, '196.52.84.14', '2020-06-02 12:59:12', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1595, 0, '196.52.84.14', '2020-06-02 12:59:13', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1596, 0, '196.52.84.14', '2020-06-02 12:59:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1597, 0, '209.17.97.50', '2020-06-02 13:00:11', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1598, 0, '31.165.24.94', '2020-06-02 13:32:46', '', 'https://intelligenza.pro/css/jquery.dataTables.css', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1599, 0, '31.165.24.94', '2020-06-02 13:32:46', '', 'https://intelligenza.pro/css/jquery.dataTables.css', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1600, 0, '31.165.24.94', '2020-06-02 13:35:18', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1601, 0, '31.165.24.94', '2020-06-02 13:35:18', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1602, 0, '31.165.24.94', '2020-06-02 13:35:18', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1603, 0, '31.165.24.94', '2020-06-02 13:35:22', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1604, 0, '31.165.24.94', '2020-06-02 13:35:36', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1605, 0, '178.154.200.109', '2020-06-02 14:53:49', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1606, 0, '3.235.75.174', '2020-06-02 16:30:42', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(1607, 0, '3.235.75.174', '2020-06-02 16:38:03', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(1608, 0, '3.235.75.174', '2020-06-02 16:40:22', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(1609, 0, '3.235.75.174', '2020-06-02 16:51:14', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(1610, 0, '3.235.75.174', '2020-06-02 16:53:14', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1611, 0, '3.235.75.174', '2020-06-02 16:57:22', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(1612, 0, '3.235.75.174', '2020-06-02 17:20:25', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(1613, 0, '3.235.75.174', '2020-06-02 17:21:38', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(1614, 0, '185.166.87.130', '2020-06-02 17:27:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Macintosh', 'Chrome ', 'en', 'Estonia', '', ''),
(1615, 0, '185.166.87.130', '2020-06-02 17:27:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Macintosh', 'Chrome ', 'en', 'Estonia', '', ''),
(1616, 0, '185.166.87.130', '2020-06-02 17:27:38', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'Estonia', '', ''),
(1617, 0, '176.107.182.236', '2020-06-02 17:58:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1618, 0, '176.107.182.236', '2020-06-02 17:58:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1619, 0, '176.107.182.236', '2020-06-02 17:58:16', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1620, 0, '3.235.75.174', '2020-06-02 18:26:01', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1621, 0, '178.154.200.109', '2020-06-02 18:29:34', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1622, 0, '31.165.24.94', '2020-06-02 19:18:06', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1623, 0, '31.165.24.94', '2020-06-02 19:18:08', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1624, 0, '31.165.24.94', '2020-06-02 19:18:12', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1625, 0, '31.165.24.94', '2020-06-02 19:18:16', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1626, 0, '31.165.24.94', '2020-06-02 19:18:18', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1627, 0, '31.165.24.94', '2020-06-02 19:18:22', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(1628, 0, '31.165.24.94', '2020-06-02 19:19:08', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1629, 0, '31.165.24.94', '2020-06-02 19:19:10', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1630, 0, '31.165.24.94', '2020-06-02 19:19:13', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1631, 0, '91.77.198.11', '2020-06-02 19:34:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1632, 0, '91.77.198.11', '2020-06-02 19:34:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1633, 0, '91.77.198.11', '2020-06-02 19:34:33', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1634, 0, '196.52.84.14', '2020-06-02 20:27:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1635, 0, '196.52.84.14', '2020-06-02 20:27:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1636, 0, '196.52.84.14', '2020-06-02 20:28:00', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1637, 0, '196.52.84.14', '2020-06-02 20:28:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1638, 0, '17.58.97.136', '2020-06-02 20:57:25', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1639, 0, '2.95.201.196', '2020-06-02 21:03:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1640, 0, '2.95.201.196', '2020-06-02 21:03:28', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1641, 0, '2.95.201.196', '2020-06-02 21:03:28', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1642, 0, '45.82.223.45', '2020-06-03 00:11:56', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1643, 0, '45.82.223.45', '2020-06-03 00:11:59', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1644, 0, '45.82.223.45', '2020-06-03 00:12:04', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1645, 0, '54.36.149.100', '2020-06-03 00:22:35', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1646, 0, '52.24.234.124', '2020-06-03 01:07:33', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1647, 0, '183.136.225.46', '2020-06-03 01:53:11', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'China', '', ''),
(1648, 0, '92.38.136.69', '2020-06-03 02:08:02', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1649, 0, '92.38.136.69', '2020-06-03 02:08:02', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1650, 0, '178.154.200.109', '2020-06-03 03:05:54', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1651, 0, '178.154.200.109', '2020-06-03 03:05:58', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1652, 0, '145.255.21.66', '2020-06-03 03:27:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1653, 0, '145.255.21.66', '2020-06-03 03:27:17', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1654, 0, '145.255.21.66', '2020-06-03 03:27:17', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1655, 0, '178.175.130.250', '2020-06-03 04:38:46', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1656, 0, '178.175.130.250', '2020-06-03 04:38:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1657, 0, '178.175.130.250', '2020-06-03 04:38:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1658, 0, '178.175.130.250', '2020-06-03 04:38:48', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1659, 0, '138.246.253.15', '2020-06-03 04:47:56', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1660, 0, '46.185.114.1', '2020-06-03 06:20:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1661, 0, '46.185.114.1', '2020-06-03 06:20:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1662, 0, '196.52.84.14', '2020-06-03 07:09:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1663, 0, '196.52.84.14', '2020-06-03 07:09:46', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1664, 0, '196.52.84.14', '2020-06-03 07:09:48', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1665, 0, '196.52.84.14', '2020-06-03 07:09:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1666, 0, '104.194.220.184', '2020-06-03 07:27:12', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1667, 0, '104.194.220.184', '2020-06-03 07:27:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1668, 0, '104.194.220.184', '2020-06-03 07:27:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1669, 0, '104.194.220.184', '2020-06-03 07:27:16', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1670, 0, '42.236.55.21', '2020-06-03 08:50:25', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1671, 0, '42.236.10.107', '2020-06-03 08:50:33', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1672, 0, '49.12.75.111', '2020-06-03 09:14:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1673, 0, '84.17.49.204', '2020-06-03 09:42:02', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1674, 0, '84.17.49.204', '2020-06-03 09:42:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1675, 0, '84.17.49.204', '2020-06-03 09:42:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1676, 0, '74.84.150.210', '2020-06-03 11:59:59', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1677, 0, '178.159.37.69', '2020-06-03 12:08:07', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1678, 0, '178.159.37.69', '2020-06-03 12:08:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1679, 0, '178.159.37.69', '2020-06-03 12:08:13', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1680, 0, '178.159.37.69', '2020-06-03 12:08:14', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1681, 0, '175.42.87.88', '2020-06-03 12:25:37', '', 'http://www.andrewancheta.com/blog/41811621/profile/', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'China', '', ''),
(1682, 0, '62.210.82.198', '2020-06-03 12:57:48', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1683, 0, '188.165.232.202', '2020-06-03 13:21:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1684, 0, '188.165.232.202', '2020-06-03 13:21:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1685, 0, '188.165.232.202', '2020-06-03 13:21:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1686, 0, '31.165.24.94', '2020-06-03 13:27:02', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1687, 0, '31.165.24.94', '2020-06-03 13:27:05', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1688, 0, '31.165.24.94', '2020-06-03 13:27:09', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1689, 0, '46.229.168.150', '2020-06-03 13:32:57', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(1690, 0, '196.52.84.14', '2020-06-03 14:46:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1691, 0, '196.52.84.14', '2020-06-03 14:46:30', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1692, 0, '196.52.84.14', '2020-06-03 14:46:31', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1693, 0, '196.52.84.14', '2020-06-03 14:46:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1694, 0, '192.160.102.166', '2020-06-03 16:18:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1695, 0, '192.160.102.166', '2020-06-03 16:18:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1696, 0, '192.160.102.166', '2020-06-03 16:18:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1697, 0, '5.196.64.109', '2020-06-03 16:27:18', '', 'https://www.intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1698, 0, '5.196.64.109', '2020-06-03 16:27:34', '', 'https://www.intelligenza.pro/connect.php', 'connect', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1699, 0, '5.196.64.109', '2020-06-03 16:27:36', '', 'https://www.intelligenza.pro/register.php', 'register', '', 'Windows', 'IE ', 'en', 'France', '', ''),
(1700, 0, '5.196.64.109', '2020-06-03 16:27:38', '', 'https://www.intelligenza.pro/lostPassword.php', 'lostPassword', '', '', '', 'en', 'France', '', ''),
(1701, 0, '5.196.64.109', '2020-06-03 16:27:40', '', 'https://www.intelligenza.pro/privacy.php', 'privacy', '', 'Macintosh', 'Firefox ', 'en', 'France', '', ''),
(1702, 0, '5.196.64.109', '2020-06-03 16:27:43', '', 'https://www.intelligenza.pro/terms.php', 'terms', '', 'Windows', 'Firefox ', 'en', 'France', '', ''),
(1703, 0, '5.196.64.109', '2020-06-03 16:27:45', '', 'https://www.intelligenza.pro/faq.php', 'faq', '', '', '', 'en', 'France', '', ''),
(1704, 0, '5.196.64.109', '2020-06-03 16:27:47', '', 'https://www.intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1705, 0, '54.36.148.253', '2020-06-03 18:31:47', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1706, 0, '77.74.177.114', '2020-06-03 19:37:07', '', 'https://www.intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1707, 0, '196.52.84.14', '2020-06-03 22:12:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1708, 0, '196.52.84.14', '2020-06-03 22:12:41', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1709, 0, '196.52.84.14', '2020-06-03 22:12:43', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1710, 0, '196.52.84.14', '2020-06-03 22:12:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1711, 0, '81.209.177.145', '2020-06-03 22:13:45', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(1712, 0, '81.209.177.145', '2020-06-03 22:13:52', '', '', 'lostPassword', '', '', '', 'en', '', '', ''),
(1713, 0, '81.209.177.145', '2020-06-03 22:14:08', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(1714, 0, '81.209.177.145', '2020-06-03 22:14:14', '', '', 'contact', '', '', '', 'en', '', '', ''),
(1715, 0, '81.209.177.145', '2020-06-03 22:14:30', '', '', 'privacy', '', '', '', 'en', '', '', ''),
(1716, 0, '81.209.177.145', '2020-06-03 22:14:37', '', '', 'register', '', '', '', 'en', '', '', ''),
(1717, 0, '81.209.177.145', '2020-06-03 22:14:47', '', '', 'comingSoon', '', '', '', 'en', '', '', ''),
(1718, 0, '81.209.177.145', '2020-06-03 22:14:56', '', '', 'terms', '', '', '', 'en', '', '', ''),
(1719, 0, '81.209.177.145', '2020-06-03 22:15:03', '', '', 'faq', '', '', '', 'en', '', '', ''),
(1720, 0, '81.209.177.145', '2020-06-03 22:15:14', '', '', 'connect', '', '', '', 'en', '', '', ''),
(1721, 0, '31.165.24.94', '2020-06-03 22:47:12', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1722, 0, '31.165.24.94', '2020-06-03 22:47:15', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1723, 0, '31.165.24.94', '2020-06-03 22:47:22', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1724, 0, '31.165.24.94', '2020-06-03 22:47:53', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1725, 0, '31.165.24.94', '2020-06-03 22:47:55', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1726, 0, '31.165.24.94', '2020-06-03 22:47:59', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1727, 30, '31.165.24.94', '2020-06-03 22:47:59', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1728, 30, '31.165.24.94', '2020-06-03 22:48:25', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1729, 30, '31.165.24.94', '2020-06-03 22:48:35', '', 'https://intelligenza.pro/admin/noty.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1730, 30, '31.165.24.94', '2020-06-03 22:48:36', '', 'https://intelligenza.pro/admin/noty.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1731, 30, '31.165.24.94', '2020-06-03 22:48:40', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1732, 30, '31.165.24.94', '2020-06-03 22:48:40', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1733, 30, '31.165.24.94', '2020-06-03 22:48:43', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1734, 30, '31.165.24.94', '2020-06-03 22:48:43', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1735, 30, '31.165.24.94', '2020-06-03 22:48:47', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1736, 30, '31.165.24.94', '2020-06-03 22:48:47', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1737, 30, '31.165.24.94', '2020-06-03 22:48:50', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1738, 30, '31.165.24.94', '2020-06-03 22:48:50', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1739, 30, '31.165.24.94', '2020-06-03 22:48:54', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1740, 30, '31.165.24.94', '2020-06-03 22:48:54', '', 'https://intelligenza.pro/admin/noty.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1741, 30, '31.165.24.94', '2020-06-03 22:48:58', '', 'https://intelligenza.pro/admin/noty.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1742, 30, '31.165.24.94', '2020-06-03 22:49:03', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1743, 30, '31.165.24.94', '2020-06-03 22:49:11', '', 'https://intelligenza.pro/admin/noty.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1744, 30, '31.165.24.94', '2020-06-03 22:49:11', '', 'https://intelligenza.pro/admin/noty.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1745, 30, '31.165.24.94', '2020-06-03 22:49:14', '', 'https://intelligenza.pro/admin/noty.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1746, 30, '31.165.24.94', '2020-06-03 22:49:21', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1747, 30, '31.165.24.94', '2020-06-03 22:49:37', '', 'https://intelligenza.pro/admin/noty.php', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1748, 30, '31.165.24.94', '2020-06-03 22:49:41', '', 'https://intelligenza.pro/admin/noty.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1749, 30, '31.165.24.94', '2020-06-03 22:50:31', '', 'https://intelligenza.pro/admin/noty.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1750, 30, '31.165.24.94', '2020-06-03 22:52:06', '', 'https://intelligenza.pro/admin/noty.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1751, 30, '31.165.24.94', '2020-06-03 22:52:44', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1752, 0, '31.165.24.94', '2020-06-03 22:52:44', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1753, 0, '31.165.24.94', '2020-06-03 22:52:46', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1754, 0, '31.165.24.94', '2020-06-03 22:52:53', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1755, 0, '31.165.24.94', '2020-06-03 22:53:36', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1756, 0, '31.165.24.94', '2020-06-03 22:53:38', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1757, 0, '31.165.24.94', '2020-06-03 22:53:42', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1758, 30, '31.165.24.94', '2020-06-03 22:53:42', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1759, 30, '31.165.24.94', '2020-06-03 22:53:49', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1760, 30, '31.165.24.94', '2020-06-03 23:04:41', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1761, 30, '31.165.24.94', '2020-06-03 23:06:01', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1762, 30, '31.165.24.94', '2020-06-03 23:07:14', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1763, 30, '31.165.24.94', '2020-06-03 23:07:22', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_gatheringPeople', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1764, 30, '31.165.24.94', '2020-06-03 23:07:25', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1765, 30, '31.165.24.94', '2020-06-03 23:07:39', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1766, 30, '31.165.24.94', '2020-06-03 23:08:07', '', '', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1767, 30, '31.165.24.94', '2020-06-03 23:19:53', '', '', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1768, 30, '31.165.24.94', '2020-06-03 23:23:48', '', '', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1769, 30, '31.165.24.94', '2020-06-03 23:23:52', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1770, 30, '31.165.24.94', '2020-06-03 23:23:52', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1771, 30, '31.165.24.94', '2020-06-03 23:26:18', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1772, 30, '31.165.24.94', '2020-06-03 23:26:52', '', '', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1773, 30, '31.165.24.94', '2020-06-03 23:27:20', '', '', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1774, 30, '31.165.24.94', '2020-06-03 23:27:36', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_modular', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1775, 30, '31.165.24.94', '2020-06-03 23:27:55', '', 'https://intelligenza.pro/admin/appModular.php', 'app_modular', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1776, 30, '31.165.24.94', '2020-06-03 23:27:59', '', 'https://intelligenza.pro/admin/appModular.php?cancelNotyMember=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1777, 30, '31.165.24.94', '2020-06-03 23:28:02', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1778, 30, '31.165.24.94', '2020-06-03 23:28:02', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1779, 30, '31.165.24.94', '2020-06-03 23:28:59', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1780, 30, '31.165.24.94', '2020-06-03 23:29:02', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1781, 30, '31.165.24.94', '2020-06-03 23:29:02', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1782, 30, '31.165.24.94', '2020-06-03 23:29:15', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1783, 30, '31.165.24.94', '2020-06-03 23:29:25', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_modular', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1784, 30, '31.165.24.94', '2020-06-03 23:29:30', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1785, 30, '31.165.24.94', '2020-06-03 23:30:06', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1786, 30, '31.165.24.94', '2020-06-03 23:30:31', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1787, 30, '31.165.24.94', '2020-06-03 23:31:00', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1788, 30, '31.165.24.94', '2020-06-03 23:33:39', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1789, 30, '31.165.24.94', '2020-06-03 23:34:12', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1790, 30, '31.165.24.94', '2020-06-03 23:34:24', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1791, 30, '31.165.24.94', '2020-06-03 23:34:48', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1792, 30, '31.165.24.94', '2020-06-03 23:36:44', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1793, 30, '31.165.24.94', '2020-06-03 23:37:23', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1794, 30, '31.165.24.94', '2020-06-03 23:38:53', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1795, 30, '31.165.24.94', '2020-06-03 23:39:02', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1796, 30, '31.165.24.94', '2020-06-03 23:40:48', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1797, 30, '31.165.24.94', '2020-06-03 23:41:26', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1798, 30, '31.165.24.94', '2020-06-03 23:42:09', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1799, 30, '31.165.24.94', '2020-06-03 23:42:24', '', 'https://intelligenza.pro/admin/appModular.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1800, 30, '31.165.24.94', '2020-06-03 23:42:42', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1801, 30, '31.165.24.94', '2020-06-03 23:42:42', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1802, 30, '31.165.24.94', '2020-06-03 23:42:48', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1803, 30, '31.165.24.94', '2020-06-03 23:42:48', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1804, 30, '31.165.24.94', '2020-06-03 23:42:53', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1805, 0, '66.249.66.14', '2020-06-03 23:57:22', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1806, 30, '31.165.24.94', '2020-06-03 23:59:43', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1807, 30, '31.165.24.94', '2020-06-04 00:00:56', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1808, 0, '178.154.200.109', '2020-06-04 00:07:27', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1809, 0, '46.229.168.133', '2020-06-04 00:09:33', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(1810, 30, '31.165.24.94', '2020-06-04 00:29:36', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1811, 30, '31.165.24.94', '2020-06-04 00:31:23', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1812, 30, '31.165.24.94', '2020-06-04 00:31:26', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1813, 30, '31.165.24.94', '2020-06-04 00:31:26', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1814, 30, '31.165.24.94', '2020-06-04 00:33:10', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1815, 30, '31.165.24.94', '2020-06-04 00:33:18', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1816, 30, '31.165.24.94', '2020-06-04 00:33:18', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1817, 30, '31.165.24.94', '2020-06-04 00:34:30', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1818, 30, '31.165.24.94', '2020-06-04 00:34:33', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1819, 30, '31.165.24.94', '2020-06-04 00:35:01', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1820, 30, '31.165.24.94', '2020-06-04 00:35:51', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1821, 30, '31.165.24.94', '2020-06-04 00:36:20', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1822, 30, '31.165.24.94', '2020-06-04 00:36:47', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1823, 30, '31.165.24.94', '2020-06-04 00:37:07', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1824, 30, '31.165.24.94', '2020-06-04 00:38:33', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1825, 30, '31.165.24.94', '2020-06-04 00:39:10', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1826, 30, '31.165.24.94', '2020-06-04 00:42:17', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1827, 30, '31.165.24.94', '2020-06-04 00:43:00', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1828, 30, '31.165.24.94', '2020-06-04 00:43:00', '', 'https://intelligenza.pro/admin/profileEdit.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1829, 30, '31.165.24.94', '2020-06-04 00:44:28', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1830, 30, '31.165.24.94', '2020-06-04 00:44:29', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1831, 30, '31.165.24.94', '2020-06-04 00:44:45', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1832, 0, '31.165.24.94', '2020-06-04 00:44:45', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1833, 0, '31.165.24.94', '2020-06-04 00:44:47', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1834, 0, '31.165.24.94', '2020-06-04 00:44:52', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1835, 0, '31.165.24.94', '2020-06-04 00:47:51', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1836, 0, '31.165.24.94', '2020-06-04 00:47:54', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1837, 0, '31.165.24.94', '2020-06-04 00:48:01', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1838, 30, '31.165.24.94', '2020-06-04 00:48:01', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1839, 30, '31.165.24.94', '2020-06-04 00:48:13', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_noty', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1840, 30, '31.165.24.94', '2020-06-04 00:48:34', '', 'https://intelligenza.pro/admin/noty.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1841, 30, '31.165.24.94', '2020-06-04 00:48:54', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1842, 0, '31.165.24.94', '2020-06-04 00:48:54', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1843, 0, '31.165.24.94', '2020-06-04 00:48:56', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1844, 0, '31.165.24.94', '2020-06-04 00:49:01', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1845, 0, '95.216.78.144', '2020-06-04 00:53:54', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(1846, 0, '206.189.117.9', '2020-06-04 01:05:19', '', 'http://intelligenza.pro/', 'comingSoon', '', 'Windows', 'IE ', 'en', 'United Kingdom', '', ''),
(1847, 0, '185.166.87.130', '2020-06-04 01:07:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Estonia', '', ''),
(1848, 0, '185.166.87.130', '2020-06-04 01:07:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Estonia', '', ''),
(1849, 0, '157.55.39.42', '2020-06-04 02:19:47', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1850, 0, '34.210.169.49', '2020-06-04 03:33:38', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'United States', '', ''),
(1851, 0, '34.210.169.49', '2020-06-04 03:33:39', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'United States', '', ''),
(1852, 0, '178.159.37.155', '2020-06-04 03:54:32', '', 'https://www.intelligenza.pro/contact.php', 'contact', '', 'Macintosh', 'Firefox ', 'en', 'Russia', '', ''),
(1853, 0, '62.210.111.127', '2020-06-04 04:27:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1854, 0, '62.210.111.127', '2020-06-04 04:27:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1855, 0, '62.210.111.127', '2020-06-04 04:27:31', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1856, 0, '62.210.111.127', '2020-06-04 04:27:31', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(1857, 0, '94.103.82.197', '2020-06-04 05:08:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1858, 0, '94.103.82.197', '2020-06-04 05:08:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1859, 0, '94.103.82.197', '2020-06-04 05:08:14', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1860, 0, '196.52.84.14', '2020-06-04 05:33:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1861, 0, '196.52.84.14', '2020-06-04 05:33:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1862, 0, '196.52.84.14', '2020-06-04 05:33:18', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1863, 0, '196.52.84.14', '2020-06-04 05:33:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1864, 0, '157.55.39.42', '2020-06-04 06:53:52', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1865, 0, '67.207.205.178', '2020-06-04 07:03:18', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1866, 0, '2001:4ca0:108:42::15', '2020-06-04 07:51:51', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1867, 0, '145.255.21.66', '2020-06-04 08:20:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1868, 0, '145.255.21.66', '2020-06-04 08:20:09', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1869, 0, '145.255.21.66', '2020-06-04 08:20:09', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1870, 0, '109.234.38.61', '2020-06-04 08:27:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1871, 0, '109.234.38.61', '2020-06-04 08:27:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1872, 0, '109.234.38.61', '2020-06-04 08:27:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1873, 0, '31.132.211.144', '2020-06-04 10:17:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1874, 0, '31.132.211.144', '2020-06-04 10:17:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1875, 0, '31.132.211.144', '2020-06-04 10:17:45', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1876, 0, '188.163.109.153', '2020-06-04 11:48:56', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1877, 0, '188.163.109.153', '2020-06-04 11:48:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1878, 0, '188.163.109.153', '2020-06-04 11:48:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1879, 0, '199.244.88.132', '2020-06-04 12:43:12', '', '', 'comingSoon', '', 'Macintosh', 'Chrome ', 'en', 'United States', '', ''),
(1880, 0, '199.66.92.179', '2020-06-04 13:01:51', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1881, 0, '199.66.92.179', '2020-06-04 13:01:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1882, 0, '199.66.92.179', '2020-06-04 13:01:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1883, 0, '199.66.92.179', '2020-06-04 13:01:56', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Canada', '', ''),
(1884, 0, '196.52.84.29', '2020-06-04 13:10:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1885, 0, '196.52.84.29', '2020-06-04 13:10:31', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1886, 0, '196.52.84.29', '2020-06-04 13:10:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1887, 0, '196.52.84.29', '2020-06-04 13:10:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1888, 0, '31.165.24.94', '2020-06-04 13:40:10', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1889, 0, '31.165.24.94', '2020-06-04 13:40:12', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1890, 0, '31.165.24.94', '2020-06-04 13:40:15', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1891, 30, '31.165.24.94', '2020-06-04 13:40:15', '', 'https://intelligenza.pro/connect.php', 'app_dashboard', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1892, 30, '31.165.24.94', '2020-06-04 13:40:32', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1893, 30, '31.165.24.94', '2020-06-04 13:41:32', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1894, 30, '31.165.24.94', '2020-06-04 13:42:05', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1895, 30, '31.165.24.94', '2020-06-04 13:42:29', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1896, 30, '31.165.24.94', '2020-06-04 13:45:02', '', 'https://intelligenza.pro/admin/dashboard.php?', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1897, 30, '31.165.24.94', '2020-06-04 13:45:31', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1898, 30, '31.165.24.94', '2020-06-04 13:45:32', '', 'https://intelligenza.pro/admin/profileEdit.php', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1899, 30, '31.165.24.94', '2020-06-04 13:45:50', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1900, 30, '31.165.24.94', '2020-06-04 13:45:50', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1901, 30, '31.165.24.94', '2020-06-04 13:46:42', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1&notyOk=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1902, 0, '31.165.24.94', '2020-06-04 13:46:42', '', 'https://intelligenza.pro/admin/profileEdit.php?editFriend=1&notyOk=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1903, 0, '31.165.24.94', '2020-06-04 13:46:44', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1904, 0, '31.165.24.94', '2020-06-04 13:46:49', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1905, 0, '54.36.148.7', '2020-06-04 13:51:51', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1906, 0, '185.220.101.195', '2020-06-04 14:04:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1907, 0, '185.220.101.200', '2020-06-04 14:04:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1908, 0, '185.220.101.200', '2020-06-04 14:04:11', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1909, 0, '31.165.24.94', '2020-06-04 14:18:32', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1910, 0, '31.165.24.94', '2020-06-04 14:18:44', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1911, 0, '31.165.24.94', '2020-06-04 14:18:57', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1912, 0, '31.165.24.94', '2020-06-04 14:19:03', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_profileEdit', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1913, 0, '31.165.24.94', '2020-06-04 14:19:07', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'app_admin_home', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1914, 0, '31.165.24.94', '2020-06-04 14:19:12', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1915, 0, '31.165.24.94', '2020-06-04 14:19:32', '', 'https://intelligenza.pro/', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', '', '', ''),
(1916, 0, '31.165.24.94', '2020-06-04 14:20:21', '', 'https://intelligenza.pro/404.php', 'register', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1917, 0, '31.165.24.94', '2020-06-04 14:20:34', '', 'https://intelligenza.pro/register.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1918, 0, '31.165.24.94', '2020-06-04 14:21:09', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1919, 0, '212.76.5.156', '2020-06-04 15:32:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Kazakhstan', '', ''),
(1920, 0, '212.76.5.156', '2020-06-04 15:32:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Kazakhstan', '', ''),
(1921, 0, '212.76.5.156', '2020-06-04 15:32:41', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Kazakhstan', '', ''),
(1922, 0, '5.164.217.169', '2020-06-04 15:34:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(1923, 0, '5.164.217.169', '2020-06-04 15:34:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1924, 0, '5.164.217.169', '2020-06-04 15:34:43', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1925, 0, '5.164.217.169', '2020-06-04 15:34:46', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1926, 0, '178.175.148.32', '2020-06-04 19:16:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1927, 0, '178.175.148.32', '2020-06-04 19:16:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1928, 0, '178.175.148.32', '2020-06-04 19:16:37', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Republic of Moldova', '', ''),
(1929, 0, '157.55.39.42', '2020-06-04 20:14:54', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1930, 0, '196.52.84.29', '2020-06-04 20:52:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1931, 0, '196.52.84.29', '2020-06-04 20:52:48', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1932, 0, '196.52.84.29', '2020-06-04 20:52:49', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1933, 0, '196.52.84.29', '2020-06-04 20:52:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1934, 0, '185.220.101.211', '2020-06-04 22:39:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1935, 0, '23.129.64.208', '2020-06-04 22:39:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1936, 0, '23.129.64.208', '2020-06-04 22:39:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1937, 0, '46.0.203.99', '2020-06-04 22:57:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1938, 0, '46.0.203.99', '2020-06-04 22:57:23', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1939, 0, '46.0.203.99', '2020-06-04 22:57:24', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1940, 0, '46.229.168.138', '2020-06-05 00:44:49', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1941, 0, '92.63.111.27', '2020-06-05 01:49:12', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(1942, 0, '178.162.209.133', '2020-06-05 03:11:10', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(1943, 0, '178.162.209.133', '2020-06-05 03:11:12', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(1944, 0, '178.162.209.133', '2020-06-05 03:11:14', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(1945, 0, '42.116.242.165', '2020-06-05 04:16:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1946, 0, '42.116.242.165', '2020-06-05 04:16:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1947, 0, '42.116.242.165', '2020-06-05 04:16:16', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1948, 0, '196.52.84.29', '2020-06-05 04:31:08', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1949, 0, '196.52.84.29', '2020-06-05 04:31:09', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1950, 0, '196.52.84.29', '2020-06-05 04:31:10', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1951, 0, '196.52.84.29', '2020-06-05 04:31:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1952, 0, '46.229.168.135', '2020-06-05 06:38:51', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(1953, 0, '151.106.54.34', '2020-06-05 07:54:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1954, 0, '151.106.54.34', '2020-06-05 07:54:01', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1955, 0, '151.106.54.34', '2020-06-05 07:54:01', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(1956, 0, '71.6.158.166', '2020-06-05 08:12:31', '', '', 'comingSoon', '', '', 'Chrome ', 'en', 'United States', '', ''),
(1957, 0, '42.236.10.82', '2020-06-05 08:52:54', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(1958, 0, '209.17.97.66', '2020-06-05 09:09:13', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1959, 0, '157.55.39.42', '2020-06-05 10:04:46', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1960, 0, '109.252.138.21', '2020-06-05 10:59:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1961, 0, '109.252.138.21', '2020-06-05 10:59:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1962, 0, '109.252.138.21', '2020-06-05 10:59:33', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1963, 0, '109.252.138.21', '2020-06-05 10:59:34', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1964, 0, '196.52.84.29', '2020-06-05 12:16:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1965, 0, '196.52.84.29', '2020-06-05 12:16:40', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1966, 0, '196.52.84.29', '2020-06-05 12:16:41', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1967, 0, '196.52.84.29', '2020-06-05 12:16:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1968, 0, '31.165.24.94', '2020-06-05 14:21:34', '', 'https://intelligenza.pro/admin/profileEdit.php?editPhoto=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1969, 0, '31.165.24.94', '2020-06-05 14:21:39', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(1970, 0, '176.107.182.236', '2020-06-05 14:36:03', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1971, 0, '176.107.182.236', '2020-06-05 14:36:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1972, 0, '176.107.182.236', '2020-06-05 14:36:04', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(1973, 0, '46.229.168.148', '2020-06-05 14:50:14', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(1974, 0, '54.36.148.179', '2020-06-05 15:01:55', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(1975, 0, '185.234.219.246', '2020-06-05 15:22:27', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Poland', '', ''),
(1976, 0, '212.32.253.225', '2020-06-05 16:37:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1977, 0, '212.32.253.225', '2020-06-05 16:37:45', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(1978, 0, '185.216.34.236', '2020-06-05 17:18:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1979, 0, '185.216.34.236', '2020-06-05 17:18:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1980, 0, '185.216.34.236', '2020-06-05 17:18:11', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1981, 0, '185.216.34.236', '2020-06-05 17:18:11', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(1982, 0, '17.58.97.136', '2020-06-05 17:58:22', '', '', 'lostPassword', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(1983, 0, '196.52.84.29', '2020-06-05 18:36:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1984, 0, '196.52.84.29', '2020-06-05 18:36:20', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1985, 0, '196.52.84.29', '2020-06-05 18:36:20', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1986, 0, '196.52.84.29', '2020-06-05 18:36:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(1987, 0, '178.170.144.231', '2020-06-05 18:44:21', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1988, 0, '178.170.144.231', '2020-06-05 18:44:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1989, 0, '178.170.144.231', '2020-06-05 18:44:22', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1990, 0, '167.172.25.216', '2020-06-05 19:34:46', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(1991, 0, '178.170.144.231', '2020-06-05 19:41:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1992, 0, '178.170.144.231', '2020-06-05 19:41:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Italy', '', ''),
(1993, 0, '18.27.197.252', '2020-06-05 19:52:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1994, 0, '18.27.197.252', '2020-06-05 19:52:49', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(1995, 0, '92.38.136.69', '2020-06-05 20:31:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1996, 0, '92.38.136.69', '2020-06-05 20:31:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1997, 0, '92.38.136.69', '2020-06-05 20:31:24', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(1998, 0, '1.55.54.28', '2020-06-05 20:39:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(1999, 0, '1.55.54.28', '2020-06-05 20:39:50', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(2000, 0, '1.55.54.28', '2020-06-05 20:39:51', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Vietnam', '', ''),
(2001, 0, '157.55.39.42', '2020-06-05 20:41:42', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2002, 0, '176.9.158.46', '2020-06-05 20:59:10', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(2003, 0, '176.9.158.46', '2020-06-05 20:59:11', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(2004, 0, '176.9.158.46', '2020-06-05 20:59:12', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Germany', '', ''),
(2005, 0, '157.55.39.42', '2020-06-05 21:24:32', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2006, 0, '157.55.39.42', '2020-06-05 23:08:59', '', '', 'comingSoon', 'iPhone', '', 'Safari ', 'en', 'United States', '', ''),
(2007, 0, '2a01:4f8:c17:c293::1', '2020-06-06 01:17:58', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(2008, 0, '196.52.84.29', '2020-06-06 01:59:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2009, 0, '196.52.84.29', '2020-06-06 01:59:43', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2010, 0, '196.52.84.29', '2020-06-06 01:59:44', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2011, 0, '196.52.84.29', '2020-06-06 01:59:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2012, 0, '51.143.138.92', '2020-06-06 04:02:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2013, 0, '51.143.138.92', '2020-06-06 04:02:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2014, 0, '40.77.202.62', '2020-06-06 06:47:35', '', '', 'comingSoon', 'iPhone', '', 'Safari ', 'en', 'United States', '', ''),
(2015, 0, '104.194.220.184', '2020-06-06 06:48:08', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2016, 0, '104.194.220.184', '2020-06-06 06:48:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2017, 0, '104.194.220.184', '2020-06-06 06:48:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2018, 0, '5.44.169.215', '2020-06-06 07:06:12', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2019, 0, '5.44.169.215', '2020-06-06 07:06:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2020, 0, '5.44.169.215', '2020-06-06 07:06:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2021, 0, '5.44.169.215', '2020-06-06 07:06:15', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2022, 0, '5.44.169.215', '2020-06-06 07:06:16', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2023, 0, '5.44.169.215', '2020-06-06 07:06:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2024, 0, '54.36.148.115', '2020-06-06 09:53:42', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2025, 0, '196.52.84.29', '2020-06-06 10:20:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2026, 0, '196.52.84.29', '2020-06-06 10:20:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2027, 0, '196.52.84.29', '2020-06-06 10:20:35', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2028, 0, '196.52.84.29', '2020-06-06 10:20:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2029, 0, '37.120.145.94', '2020-06-06 11:44:21', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Denmark', '', ''),
(2030, 0, '37.120.145.94', '2020-06-06 11:44:25', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Denmark', '', ''),
(2031, 0, '37.120.145.94', '2020-06-06 11:44:26', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Denmark', '', ''),
(2032, 0, '157.55.39.42', '2020-06-06 11:46:43', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2033, 0, '46.188.98.10', '2020-06-06 12:23:34', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2034, 0, '46.188.98.10', '2020-06-06 12:23:35', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2035, 0, '46.188.98.10', '2020-06-06 12:23:35', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2036, 0, '188.163.109.153', '2020-06-06 14:33:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2037, 0, '188.163.109.153', '2020-06-06 14:33:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2038, 0, '188.163.109.153', '2020-06-06 14:33:24', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2039, 0, '46.147.208.55', '2020-06-06 14:45:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2040, 0, '46.147.208.55', '2020-06-06 14:45:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2041, 0, '46.229.168.137', '2020-06-06 15:03:58', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(2042, 0, '45.82.223.75', '2020-06-06 15:25:10', '', 'https://intelligenza.pro/admin/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2043, 0, '45.82.223.75', '2020-06-06 15:25:19', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2044, 0, '84.17.51.65', '2020-06-06 15:48:36', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2045, 0, '84.17.51.65', '2020-06-06 15:48:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2046, 0, '84.17.51.65', '2020-06-06 15:48:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2047, 0, '84.17.51.65', '2020-06-06 15:48:38', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2048, 0, '46.185.114.1', '2020-06-06 17:50:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2049, 0, '46.185.114.1', '2020-06-06 17:50:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2050, 0, '196.52.84.29', '2020-06-06 18:48:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2051, 0, '196.52.84.29', '2020-06-06 18:48:09', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2052, 0, '196.52.84.29', '2020-06-06 18:48:10', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2053, 0, '196.52.84.29', '2020-06-06 18:48:10', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2054, 0, '157.55.39.42', '2020-06-06 19:04:31', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2055, 0, '185.191.215.99', '2020-06-06 21:04:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2056, 0, '185.191.215.99', '2020-06-06 21:04:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2057, 0, '185.191.215.99', '2020-06-06 21:04:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2058, 0, '185.191.215.99', '2020-06-06 21:04:56', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2059, 0, '157.55.39.42', '2020-06-06 23:03:07', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2060, 0, '35.165.110.249', '2020-06-07 01:20:39', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2061, 0, '93.75.38.205', '2020-06-07 02:38:11', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2062, 0, '93.75.38.205', '2020-06-07 02:38:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2063, 0, '93.75.38.205', '2020-06-07 02:38:12', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2064, 0, '79.137.69.236', '2020-06-07 03:09:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2065, 0, '79.137.69.236', '2020-06-07 03:09:42', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2066, 0, '79.137.69.236', '2020-06-07 03:09:44', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2067, 0, '196.52.84.29', '2020-06-07 03:18:44', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2068, 0, '196.52.84.29', '2020-06-07 03:18:44', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2069, 0, '196.52.84.29', '2020-06-07 03:18:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2070, 0, '196.52.84.29', '2020-06-07 03:18:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2071, 0, '46.229.168.144', '2020-06-07 03:57:44', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(2072, 0, '54.36.148.235', '2020-06-07 05:36:46', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2073, 0, '94.228.207.1', '2020-06-07 06:52:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2074, 0, '94.228.207.1', '2020-06-07 06:52:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2075, 0, '94.228.207.1', '2020-06-07 06:52:39', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2076, 0, '91.233.117.109', '2020-06-07 07:03:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2077, 0, '91.233.117.109', '2020-06-07 07:03:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2078, 0, '91.233.117.109', '2020-06-07 07:03:02', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2079, 0, '5.188.210.18', '2020-06-07 07:07:58', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2080, 0, '213.180.203.100', '2020-06-07 08:37:10', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2081, 0, '95.216.78.144', '2020-06-07 08:37:53', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(2082, 0, '213.180.203.105', '2020-06-07 08:38:09', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2083, 0, '178.154.200.135', '2020-06-07 08:38:16', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2084, 0, '5.188.210.18', '2020-06-07 09:03:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2085, 0, '5.188.210.18', '2020-06-07 09:03:20', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2086, 0, '5.188.210.18', '2020-06-07 09:03:21', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2087, 0, '91.233.117.109', '2020-06-07 09:31:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2088, 0, '91.233.117.109', '2020-06-07 09:31:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2089, 0, '91.233.117.109', '2020-06-07 09:31:16', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Finland', '', ''),
(2090, 0, '196.52.84.29', '2020-06-07 11:38:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2091, 0, '196.52.84.29', '2020-06-07 11:38:58', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2092, 0, '196.52.84.29', '2020-06-07 11:38:59', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2093, 0, '196.52.84.29', '2020-06-07 11:38:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2094, 0, '45.132.227.184', '2020-06-07 11:46:20', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2095, 0, '45.132.227.184', '2020-06-07 11:46:20', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2096, 0, '45.132.227.184', '2020-06-07 11:46:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2097, 0, '45.132.227.184', '2020-06-07 11:46:25', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2098, 0, '54.36.148.115', '2020-06-07 13:28:53', '', '', 'connect', '', '', '', 'en', 'France', '', ''),
(2099, 0, '157.55.39.42', '2020-06-07 13:29:17', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2100, 0, '176.226.153.128', '2020-06-07 13:43:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2101, 0, '176.226.153.128', '2020-06-07 13:43:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2102, 0, '17.58.97.136', '2020-06-07 14:31:14', '', '', 'comingSoon', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(2103, 0, '213.180.203.101', '2020-06-07 14:41:41', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2104, 0, '54.36.148.235', '2020-06-07 14:45:26', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2105, 0, '46.0.203.99', '2020-06-07 15:59:37', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2106, 0, '46.0.203.99', '2020-06-07 15:59:37', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2107, 0, '46.0.203.99', '2020-06-07 15:59:37', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2108, 0, '185.210.218.100', '2020-06-07 17:17:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Romania', '', ''),
(2109, 0, '93.159.230.28', '2020-06-07 18:15:57', '', 'http://intelligenza.pro', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2110, 0, '31.165.24.94', '2020-06-07 18:25:42', '', 'https://intelligenza.pro/admin/profileEdit.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2111, 0, '31.165.24.94', '2020-06-07 18:26:17', '', 'https://intelligenza.pro/connect.php?reLog=1', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2112, 0, '196.52.84.29', '2020-06-07 19:58:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2113, 0, '196.52.84.29', '2020-06-07 19:58:05', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2114, 0, '196.52.84.29', '2020-06-07 19:58:06', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2115, 0, '196.52.84.29', '2020-06-07 19:58:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2116, 0, '37.120.218.194', '2020-06-07 20:30:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(2117, 0, '37.120.218.194', '2020-06-07 20:30:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(2118, 0, '37.120.218.194', '2020-06-07 20:30:28', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Belgium', '', ''),
(2119, 0, '46.229.168.143', '2020-06-07 21:14:27', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(2120, 0, '185.130.184.217', '2020-06-07 21:58:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(2121, 0, '185.130.184.217', '2020-06-07 21:58:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(2122, 0, '179.43.139.150', '2020-06-07 22:46:50', '', 'https://intelligenza.pro/admin/profileEdit.php', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2123, 0, '95.216.78.144', '2020-06-07 23:59:45', '', '', 'comingSoon', '', '', '', 'en', 'Germany', '', ''),
(2124, 0, '188.165.232.202', '2020-06-08 00:22:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2125, 0, '188.165.232.202', '2020-06-08 00:22:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2126, 0, '188.165.232.202', '2020-06-08 00:22:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2127, 0, '207.46.13.148', '2020-06-08 00:46:11', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2128, 0, '54.36.148.75', '2020-06-08 01:44:35', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2129, 0, '175.139.165.28', '2020-06-08 03:24:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Malaysia', '', ''),
(2130, 0, '175.139.165.28', '2020-06-08 03:24:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Malaysia', '', ''),
(2131, 0, '46.188.98.10', '2020-06-08 03:27:50', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2132, 0, '46.188.98.10', '2020-06-08 03:27:50', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2133, 0, '46.188.98.10', '2020-06-08 03:27:50', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2134, 0, '46.188.98.10', '2020-06-08 03:27:51', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2135, 0, '46.188.98.10', '2020-06-08 03:27:52', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2136, 0, '46.188.98.10', '2020-06-08 03:27:52', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2137, 0, '46.188.98.10', '2020-06-08 03:27:53', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2138, 0, '188.163.109.153', '2020-06-08 03:55:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2139, 0, '188.163.109.153', '2020-06-08 03:55:59', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2140, 0, '188.163.109.153', '2020-06-08 03:55:59', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2141, 0, '196.52.84.34', '2020-06-08 04:23:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2142, 0, '196.52.84.34', '2020-06-08 04:23:13', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2143, 0, '196.52.84.34', '2020-06-08 04:23:14', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2144, 0, '196.52.84.34', '2020-06-08 04:23:15', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2145, 0, '46.229.168.132', '2020-06-08 04:26:14', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2146, 0, '46.173.55.27', '2020-06-08 05:10:00', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2147, 0, '66.249.66.18', '2020-06-08 05:16:12', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2148, 0, '178.159.37.88', '2020-06-08 07:36:30', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2149, 0, '178.159.37.88', '2020-06-08 07:36:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2150, 0, '178.159.37.88', '2020-06-08 07:36:32', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2151, 0, '178.159.37.88', '2020-06-08 07:36:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2152, 0, '17.58.97.136', '2020-06-08 09:18:48', '', '', 'register', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(2153, 0, '178.154.200.109', '2020-06-08 09:25:45', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2154, 0, '46.158.45.89', '2020-06-08 10:54:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2155, 0, '46.158.45.89', '2020-06-08 10:54:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2156, 0, '46.158.45.89', '2020-06-08 10:54:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2157, 0, '46.158.45.89', '2020-06-08 10:54:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2158, 0, '79.173.90.153', '2020-06-08 12:30:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2159, 0, '79.173.90.153', '2020-06-08 12:30:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2160, 0, '79.173.90.153', '2020-06-08 12:30:57', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2161, 0, '52.90.242.113', '2020-06-08 12:48:33', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2162, 0, '196.52.84.34', '2020-06-08 12:51:09', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2163, 0, '196.52.84.34', '2020-06-08 12:51:12', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2164, 0, '196.52.84.34', '2020-06-08 12:51:14', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2165, 0, '196.52.84.34', '2020-06-08 12:51:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2166, 0, '207.46.13.148', '2020-06-08 15:14:35', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2167, 0, '45.132.227.184', '2020-06-08 16:47:38', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2168, 0, '45.132.227.184', '2020-06-08 16:47:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2169, 0, '45.132.227.184', '2020-06-08 16:47:41', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2170, 0, '45.132.227.184', '2020-06-08 16:47:43', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2171, 0, '95.128.161.152', '2020-06-08 17:22:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2172, 0, '95.128.161.152', '2020-06-08 17:22:47', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2173, 0, '95.128.161.152', '2020-06-08 17:22:47', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2174, 0, '185.234.219.246', '2020-06-08 18:22:48', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', '', 'Firefox ', 'en', 'Poland', '', ''),
(2175, 0, '95.72.236.112', '2020-06-08 20:35:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2176, 0, '95.72.236.112', '2020-06-08 20:35:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2177, 0, '95.72.236.112', '2020-06-08 20:35:31', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2178, 0, '13.89.247.17', '2020-06-08 20:40:39', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2179, 0, '13.89.247.17', '2020-06-08 20:40:41', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2180, 0, '196.52.84.34', '2020-06-08 21:20:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2181, 0, '196.52.84.34', '2020-06-08 21:20:38', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2182, 0, '196.52.84.34', '2020-06-08 21:20:39', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2183, 0, '196.52.84.34', '2020-06-08 21:20:39', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2184, 0, '46.229.168.148', '2020-06-08 21:25:32', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2185, 0, '54.36.149.19', '2020-06-08 22:09:24', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2186, 0, '66.249.66.16', '2020-06-08 22:36:35', '', '', 'comingSoon', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(2187, 0, '185.57.30.97', '2020-06-08 22:44:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2188, 0, '185.57.30.97', '2020-06-08 22:44:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2189, 0, '185.57.30.97', '2020-06-08 22:44:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2190, 0, '46.33.57.43', '2020-06-08 22:53:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2191, 0, '46.33.57.43', '2020-06-08 22:53:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2192, 0, '46.33.57.43', '2020-06-08 22:53:33', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2193, 0, '46.33.57.43', '2020-06-08 22:53:34', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2194, 0, '94.23.23.224', '2020-06-08 23:30:33', '', '', 'contact', '', 'Windows', 'Firefox ', 'en', 'France', '', ''),
(2195, 0, '91.77.198.11', '2020-06-08 23:50:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2196, 0, '91.77.198.11', '2020-06-08 23:50:57', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2197, 0, '91.77.198.11', '2020-06-08 23:50:58', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2198, 0, '195.181.172.79', '2020-06-08 23:53:01', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2199, 0, '195.181.172.79', '2020-06-08 23:53:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2200, 0, '195.181.172.79', '2020-06-08 23:53:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2201, 0, '195.181.172.79', '2020-06-08 23:53:03', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2202, 0, '174.127.135.130', '2020-06-08 23:54:07', '', '', 'comingSoon', '', 'Windows', 'IE ', 'en', 'United States', '', ''),
(2203, 0, '45.12.220.198', '2020-06-09 00:03:50', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Sweden', '', ''),
(2204, 0, '45.12.220.198', '2020-06-09 00:03:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Sweden', '', ''),
(2205, 0, '45.12.220.198', '2020-06-09 00:03:51', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Sweden', '', ''),
(2206, 0, '192.3.179.196', '2020-06-09 00:09:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2207, 0, '192.3.179.196', '2020-06-09 00:09:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2208, 0, '192.3.179.196', '2020-06-09 00:09:24', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2209, 0, '52.231.77.82', '2020-06-09 00:22:02', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'South Korea', '', ''),
(2210, 0, '52.231.77.82', '2020-06-09 00:22:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'South Korea', '', ''),
(2211, 0, '52.231.77.82', '2020-06-09 00:22:05', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'South Korea', '', ''),
(2212, 0, '185.220.103.4', '2020-06-09 01:49:40', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Germany', '', ''),
(2213, 0, '193.70.12.238', '2020-06-09 01:49:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2214, 0, '174.127.135.130', '2020-06-09 02:17:21', '', '', 'comingSoon', '', 'Windows', 'Firefox ', 'en', 'United States', '', ''),
(2215, 0, '176.107.183.146', '2020-06-09 03:33:14', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2216, 0, '176.107.183.146', '2020-06-09 03:33:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2217, 0, '176.107.183.146', '2020-06-09 03:33:19', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2218, 0, '46.185.114.1', '2020-06-09 04:07:05', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2219, 0, '46.185.114.1', '2020-06-09 04:07:06', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2220, 0, '185.132.177.198', '2020-06-09 05:10:46', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2221, 0, '185.132.177.198', '2020-06-09 05:10:47', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2222, 0, '185.132.177.198', '2020-06-09 05:10:48', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Netherlands', '', ''),
(2223, 0, '145.255.21.66', '2020-06-09 05:20:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2224, 0, '145.255.21.66', '2020-06-09 05:20:59', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2225, 0, '145.255.21.66', '2020-06-09 05:20:59', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2226, 0, '17.58.97.136', '2020-06-09 06:35:05', '', '', 'terms', '', 'Macintosh', 'Safari ', 'en', 'United States', '', ''),
(2227, 0, '78.155.22.88', '2020-06-09 06:42:22', '', 'https://www.pierluigi.ch/', 'comingSoon', '', 'Windows', 'Chrome ', 'fr', 'Switzerland', '', ''),
(2228, 0, '37.229.198.155', '2020-06-09 07:22:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2229, 0, '37.229.198.155', '2020-06-09 07:22:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2230, 0, '37.229.198.155', '2020-06-09 07:22:29', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2231, 0, '78.155.22.88', '2020-06-09 07:28:27', '', 'https://www.pierluigi.ch/', 'comingSoon', '', 'Windows', 'Chrome ', 'fr', 'Switzerland', '', ''),
(2232, 0, '38.68.37.77', '2020-06-09 07:38:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2233, 0, '38.68.37.77', '2020-06-09 07:38:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2234, 0, '34.221.61.46', '2020-06-09 08:36:12', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2235, 0, '54.244.76.44', '2020-06-09 08:45:06', '', '', 'lostPassword', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2236, 0, '54.244.76.44', '2020-06-09 08:46:00', '', '', 'register', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2237, 0, '54.244.76.44', '2020-06-09 08:47:27', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2238, 0, '34.214.12.201', '2020-06-09 08:49:11', '', '', 'faq', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2239, 0, '34.214.12.201', '2020-06-09 08:56:12', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2240, 0, '196.52.84.34', '2020-06-09 08:59:32', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2241, 0, '196.52.84.34', '2020-06-09 08:59:32', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2242, 0, '196.52.84.34', '2020-06-09 08:59:33', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2243, 0, '196.52.84.34', '2020-06-09 08:59:33', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2244, 0, '34.214.12.201', '2020-06-09 09:09:26', '', '', 'terms', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2245, 0, '34.221.61.46', '2020-06-09 09:09:32', '', '', 'connect', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2246, 0, '54.212.173.207', '2020-06-09 09:10:14', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2247, 0, '54.212.173.207', '2020-06-09 09:10:16', '', '', 'faq', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2248, 0, '34.221.61.46', '2020-06-09 09:12:06', '', '', 'privacy', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2249, 0, '34.221.61.46', '2020-06-09 10:02:43', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2250, 0, '34.221.74.221', '2020-06-09 10:13:01', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2251, 0, '34.221.74.221', '2020-06-09 10:27:12', '', '', 'contact', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2252, 0, '66.249.66.18', '2020-06-09 10:31:53', '', '', 'privacy', 'Android', '', 'Chrome ', 'en', 'United States', '', ''),
(2253, 0, '34.221.74.221', '2020-06-09 10:58:23', '', '', 'terms', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2254, 0, '34.221.74.221', '2020-06-09 11:14:47', '', '', 'privacy', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2255, 0, '34.221.74.221', '2020-06-09 11:31:21', '', '', 'faq', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2256, 0, '89.44.201.104', '2020-06-09 13:07:29', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Romania', '', ''),
(2257, 0, '89.44.201.104', '2020-06-09 13:07:29', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Romania', '', ''),
(2258, 0, '216.173.66.18', '2020-06-09 13:10:43', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2259, 0, '31.165.24.94', '2020-06-09 13:27:49', '', 'https://intelligenza.pro/index.php?ipChanged', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', '');
INSERT INTO `site_stats_visits` (`idVisit`, `idMember`, `ipUser`, `dateVisit`, `--- stats ---`, `fromPage`, `visitPage`, `whatSupport`, `platform`, `browser`, `language`, `country`, `city`, `square`) VALUES
(2260, 0, '31.165.24.94', '2020-06-09 13:27:54', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2261, 0, '31.165.24.94', '2020-06-09 13:29:34', '', 'https://intelligenza.pro/admin/index.php?', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2262, 0, '31.165.24.94', '2020-06-09 13:31:03', '', '', 'comingSoon', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2263, 0, '188.163.109.153', '2020-06-09 13:48:00', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2264, 0, '188.163.109.153', '2020-06-09 13:48:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2265, 0, '63.246.143.146', '2020-06-09 15:36:06', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2266, 0, '183.136.225.46', '2020-06-09 16:02:00', '', '', 'comingSoon', '', 'Macintosh', 'Firefox ', 'en', 'China', '', ''),
(2267, 0, '38.96.28.143', '2020-06-09 16:57:42', '', '', 'faq', '', '', '', 'en', 'United States', '', ''),
(2268, 0, '104.239.4.122', '2020-06-09 16:57:43', '', '', 'terms', '', '', '', 'en', 'United States', '', ''),
(2269, 0, '38.128.157.97', '2020-06-09 16:57:44', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(2270, 0, '38.77.197.46', '2020-06-09 16:57:44', '', '', 'lostPassword', '', '', '', 'en', 'United States', '', ''),
(2271, 0, '173.0.94.255', '2020-06-09 16:57:45', '', '', 'privacy', '', '', '', 'en', 'United States', '', ''),
(2272, 0, '149.100.190.196', '2020-06-09 16:57:45', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(2273, 0, '38.135.200.77', '2020-06-09 16:57:45', '', '', 'register', '', '', '', 'en', 'United States', '', ''),
(2274, 0, '196.52.84.34', '2020-06-09 17:45:58', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2275, 0, '196.52.84.34', '2020-06-09 17:46:00', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2276, 0, '196.52.84.34', '2020-06-09 17:46:02', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2277, 0, '196.52.84.34', '2020-06-09 17:46:04', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2278, 0, '54.36.148.147', '2020-06-09 18:20:14', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2279, 0, '54.36.148.147', '2020-06-09 18:57:20', '', '', 'contact', '', '', '', 'en', 'France', '', ''),
(2280, 0, '54.36.148.147', '2020-06-09 19:57:02', '', '', 'comingSoon', '', '', '', 'en', 'France', '', ''),
(2281, 0, '31.165.24.94', '2020-06-09 20:37:27', '', 'https://intelligenza.pro/index.php?', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2282, 0, '31.165.24.94', '2020-06-09 20:37:32', '', 'https://intelligenza.pro/connect.php', 'connect', '', 'Mac OS X Version 10.15', 'Firefox ', 'en', 'Switzerland', '', ''),
(2283, 0, '114.106.73.15', '2020-06-09 20:44:43', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(2284, 0, '114.106.73.15', '2020-06-09 20:45:01', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(2285, 0, '114.106.73.15', '2020-06-09 20:45:05', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(2286, 0, '192.71.103.173', '2020-06-09 21:44:27', '', 'http://intelligenza.pro/', 'comingSoon', '', '', '', 'en', 'Sweden', '', ''),
(2287, 0, '164.132.201.87', '2020-06-09 22:07:25', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'France', '', ''),
(2288, 0, '54.36.149.11', '2020-06-09 22:18:28', '', '', 'faq', '', '', '', 'en', 'France', '', ''),
(2289, 0, '184.154.74.66', '2020-06-09 22:48:55', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'United States', '', ''),
(2290, 0, '178.159.37.145', '2020-06-10 00:48:53', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2291, 0, '178.159.37.145', '2020-06-10 00:48:54', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2292, 0, '178.159.37.145', '2020-06-10 00:48:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2293, 0, '178.159.37.145', '2020-06-10 00:48:54', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2294, 0, '157.55.39.40', '2020-06-10 01:35:19', '', '', 'comingSoon', '', '', '', 'en', 'United States', '', ''),
(2295, 0, '196.52.84.34', '2020-06-10 02:32:36', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2296, 0, '196.52.84.34', '2020-06-10 02:32:37', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2297, 0, '196.52.84.34', '2020-06-10 02:32:38', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2298, 0, '196.52.84.34', '2020-06-10 02:32:38', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2299, 0, '178.154.200.109', '2020-06-10 02:32:56', '', '', 'comingSoon', '', '', '', 'en', 'Russia', '', ''),
(2300, 0, '54.36.149.11', '2020-06-10 02:34:27', '', '', 'lostPassword', '', '', '', 'en', 'France', '', ''),
(2301, 0, '54.36.149.11', '2020-06-10 03:00:26', '', '', 'privacy', '', '', '', 'en', 'France', '', ''),
(2302, 0, '54.36.148.27', '2020-06-10 03:24:16', '', '', 'register', '', '', '', 'en', 'France', '', ''),
(2303, 0, '54.36.148.147', '2020-06-10 04:23:46', '', '', 'terms', '', '', '', 'en', 'France', '', ''),
(2304, 0, '46.229.168.129', '2020-06-10 06:23:26', '', '', 'connect', '', '', '', 'en', 'United States', '', ''),
(2305, 0, '37.232.133.252', '2020-06-10 07:42:17', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2306, 0, '37.232.133.252', '2020-06-10 07:42:18', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2307, 0, '37.232.133.252', '2020-06-10 07:42:19', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2308, 0, '5.44.169.215', '2020-06-10 09:37:20', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2309, 0, '5.44.169.215', '2020-06-10 09:37:23', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2310, 0, '5.44.169.215', '2020-06-10 09:37:24', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2311, 0, '5.44.169.215', '2020-06-10 09:37:25', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2312, 0, '5.44.169.215', '2020-06-10 09:37:25', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2313, 0, '5.44.169.215', '2020-06-10 09:37:26', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2314, 0, '79.126.101.95', '2020-06-10 10:03:12', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2315, 0, '79.126.101.95', '2020-06-10 10:03:13', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2316, 0, '196.52.84.34', '2020-06-10 11:11:19', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2317, 0, '196.52.84.34', '2020-06-10 11:11:19', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2318, 0, '196.52.84.34', '2020-06-10 11:11:21', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2319, 0, '196.52.84.34', '2020-06-10 11:11:22', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'United Kingdom', '', ''),
(2320, 0, '51.79.103.170', '2020-06-10 11:16:38', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Canada', '', ''),
(2321, 0, '51.79.103.170', '2020-06-10 11:17:08', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Canada', '', ''),
(2322, 0, '51.79.103.170', '2020-06-10 11:17:23', '', '', 'comingSoon', '', '', 'Firefox ', 'en', 'Canada', '', ''),
(2323, 0, '42.236.10.116', '2020-06-10 11:50:44', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(2324, 0, '42.236.10.120', '2020-06-10 11:50:47', '', 'https://intelligenza.pro/', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'China', '', ''),
(2325, 0, '46.191.138.158', '2020-06-10 12:31:25', '', '', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2326, 0, '185.216.34.236', '2020-06-10 12:49:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(2327, 0, '185.216.34.236', '2020-06-10 12:49:27', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(2328, 0, '185.216.34.236', '2020-06-10 12:49:27', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(2329, 0, '185.216.34.236', '2020-06-10 12:49:28', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Austria', '', ''),
(2330, 0, '5.188.210.18', '2020-06-10 13:27:28', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2331, 0, '5.188.210.18', '2020-06-10 13:27:29', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2332, 0, '5.188.210.18', '2020-06-10 13:27:32', '', 'https://intelligenza.pro/index.php', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2333, 0, '83.221.222.94', '2020-06-10 14:11:46', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2334, 0, '83.221.222.94', '2020-06-10 14:11:46', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2335, 0, '83.221.222.94', '2020-06-10 14:11:47', '', 'https://intelligenza.pro/register.php', 'register', '', 'Windows', 'Chrome ', 'en', 'Russia', '', ''),
(2336, 0, '46.229.168.134', '2020-06-10 14:31:18', '', '', 'contact', '', '', '', 'en', 'United States', '', ''),
(2337, 0, '176.107.183.146', '2020-06-10 15:16:52', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2338, 0, '176.107.183.146', '2020-06-10 15:16:55', '', 'https://intelligenza.pro/contact.php', 'contact', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', ''),
(2339, 0, '176.107.183.146', '2020-06-10 15:16:56', '', 'https://intelligenza.pro/?okcf=1', 'comingSoon', '', 'Windows', 'Chrome ', 'en', 'Ukraine', '', '');

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
  `fileName` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `iframe` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`idVideo`, `idMember`, `statut`, `fileName`, `tag`, `cover`, `title`, `description`, `iframe`) VALUES
(1, 1, '', '', '', '', '', '', '<iframe width=\"720\" height=\"405\" src=\"https://www.youtube.com/embed/s1pG7k_1nSw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

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
-- Indexes for table `members_blocked`
--
ALTER TABLE `members_blocked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_friends`
--
ALTER TABLE `members_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_groups`
--
ALTER TABLE `members_groups`
  ADD PRIMARY KEY (`idGroup`);

--
-- Indexes for table `members_groupsUsers`
--
ALTER TABLE `members_groupsUsers`
  ADD PRIMARY KEY (`idGroupsUser`);

--
-- Indexes for table `members_intel`
--
ALTER TABLE `members_intel`
  ADD PRIMARY KEY (`idIntelMember`);

--
-- Indexes for table `members_tags`
--
ALTER TABLE `members_tags`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idCodeBenefits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `members_blocked`
--
ALTER TABLE `members_blocked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members_friends`
--
ALTER TABLE `members_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `members_groups`
--
ALTER TABLE `members_groups`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_groupsUsers`
--
ALTER TABLE `members_groupsUsers`
  MODIFY `idGroupsUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_intel`
--
ALTER TABLE `members_intel`
  MODIFY `idIntelMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members_tags`
--
ALTER TABLE `members_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellPoints`
--
ALTER TABLE `sellPoints`
  MODIFY `idSellPoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_blackList_email`
--
ALTER TABLE `site_blackList_email`
  MODIFY `idEmailBlackListed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `site_blackList_pseudo`
--
ALTER TABLE `site_blackList_pseudo`
  MODIFY `idBlackListePseudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `site_blackList_user`
--
ALTER TABLE `site_blackList_user`
  MODIFY `idBlackListUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_blackList_words`
--
ALTER TABLE `site_blackList_words`
  MODIFY `idWordBlackListed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `site_noty`
--
ALTER TABLE `site_noty`
  MODIFY `idNoty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `site_notySawByUser`
--
ALTER TABLE `site_notySawByUser`
  MODIFY `idWhoSawNoty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `site_stats_links`
--
ALTER TABLE `site_stats_links`
  MODIFY `idClic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `site_stats_visits`
--
ALTER TABLE `site_stats_visits`
  MODIFY `idVisit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2340;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
