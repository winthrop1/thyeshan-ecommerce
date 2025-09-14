-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 13, 2021 at 08:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_l9_202430n`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitprice` float NOT NULL,
  `bought` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `active`) VALUES
(1, 'Tea', 1),
(2, 'Birds Nest', 1),
(3, 'Honey', 1),
(4, 'Medicated Oils', 1),
(5, 'Precious Herbs', 1),
(6, 'Herbal Supplements', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_qn`
--

DROP TABLE IF EXISTS `customer_qn`;
CREATE TABLE IF NOT EXISTS `customer_qn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_qn`
--

INSERT INTO `customer_qn` (`id`, `name`, `email`, `message`, `date`) VALUES
(3, 'nkfdnkf', '123@123.com', 'dsfsdfsdfsdfsd', '2021-07-31 23:58:51'),
(4, 'wihfgdf', 'wdiihgf@gjdpofj', 'dwadscdxzc', '2021-08-07 11:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `memname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenum` int(8) NOT NULL,
  `deliveryadd` varchar(1000) NOT NULL,
  `postalcode` int(6) NOT NULL,
  `unitno` varchar(10) NOT NULL,
  `mempic` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `memname`, `password`, `phonenum`, `deliveryadd`, `postalcode`, `unitno`, `mempic`, `created`) VALUES
(14, 'qwe@123', 'davidina', '123', 91234567, 'dewq', 123456, '123', 'Profiles/_herbaloil.jpg', '2021-07-28 23:53:54'),
(18, '123@qwe', 'hello', '123', 91234567, 'ABCDEFGHI', 123456, '0101', 'Profiles/_herbaloil.jpg', '2021-07-31 10:48:17'),
(19, 'lim@yahoo.com', 'qwe', '123', 91234567, 'ABCDEFGHI', 123, '0101', 'Profiles/_herbaloil.jpg', '2021-08-13 15:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `orddetail`
--

DROP TABLE IF EXISTS `orddetail`;
CREATE TABLE IF NOT EXISTS `orddetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitprice` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orddetail`
--

INSERT INTO `orddetail` (`id`, `ordid`, `proid`, `qty`, `unitprice`) VALUES
(13, 46, 8, 1, 39.9),
(12, 45, 9, 1, 68),
(11, 44, 7, 5, 39.9),
(10, 44, 15, 1, 2.9),
(9, 44, 19, 1, 2061),
(14, 47, 9, 13, 68),
(15, 49, 12, 5, 9.5),
(16, 49, 6, 3, 10.5),
(17, 51, 19, 2, 2061),
(18, 52, 10, 3, 4.9),
(19, 53, 10, 1, 4.9),
(20, 53, 18, 3, 378),
(21, 54, 33, 3, 6.5),
(22, 54, 31, 5, 792),
(23, 54, 17, 3, 12),
(24, 55, 31, 1, 792),
(25, 55, 17, 1, 12),
(26, 56, 19, 10, 2061),
(27, 56, 6, 6, 10.5),
(28, 57, 10, 3, 4.9),
(29, 58, 18, 1, 378),
(30, 58, 7, 3, 39.9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `orddate` datetime NOT NULL DEFAULT current_timestamp(),
  `reqdate` datetime NOT NULL,
  `deldate` datetime DEFAULT NULL,
  `ccldate` datetime DEFAULT NULL,
  `ordstatus` enum('O','D','C') NOT NULL DEFAULT 'O',
  `totqty` int(11) DEFAULT NULL,
  `totprice` float(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `memid`, `orddate`, `reqdate`, `deldate`, `ccldate`, `ordstatus`, `totqty`, `totprice`) VALUES
(39, 18, '2021-08-08 03:33:34', '2021-08-14 03:33:00', NULL, '2021-08-08 13:32:39', 'C', NULL, 31),
(38, 18, '2021-08-08 02:59:12', '2021-08-10 02:55:00', NULL, NULL, 'O', NULL, 364),
(37, 18, '2021-08-08 02:55:42', '2021-08-10 02:55:00', NULL, NULL, 'O', NULL, 364),
(36, 18, '2021-08-08 02:54:20', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(35, 18, '2021-08-08 02:54:19', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(34, 18, '2021-08-08 02:54:19', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(33, 18, '2021-08-08 02:54:19', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(32, 18, '2021-08-08 02:54:18', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(31, 18, '2021-08-08 02:49:06', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(30, 18, '2021-08-08 02:47:57', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(29, 18, '2021-08-08 02:47:57', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(28, 18, '2021-08-08 02:47:57', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(27, 18, '2021-08-08 02:47:56', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(26, 18, '2021-08-08 02:42:23', '2021-08-10 02:42:00', NULL, NULL, 'O', NULL, 19),
(25, 18, '2021-08-07 13:31:00', '2021-08-09 13:25:00', NULL, NULL, 'O', NULL, 85),
(24, 18, '2021-08-07 13:25:23', '2021-08-09 13:25:00', NULL, NULL, 'O', NULL, 85),
(23, 18, '2021-08-07 13:01:58', '2021-08-08 12:58:00', NULL, NULL, 'O', NULL, 404),
(22, 18, '2021-08-07 12:58:12', '2021-08-08 12:58:00', NULL, NULL, 'O', NULL, 404),
(40, 18, '2021-08-09 03:12:00', '2021-08-11 03:11:00', NULL, NULL, 'O', NULL, 217),
(41, 18, '2021-08-09 03:12:34', '2021-08-11 03:11:00', NULL, NULL, 'O', NULL, 217),
(42, 18, '2021-08-09 03:20:57', '2021-08-12 03:17:00', NULL, NULL, 'O', NULL, 2422),
(43, 18, '2021-08-09 03:23:54', '2021-08-12 03:23:00', NULL, NULL, 'O', NULL, 2422),
(44, 18, '2021-08-09 03:25:25', '2021-08-12 03:23:00', NULL, '2021-08-09 03:32:02', 'C', NULL, 2422),
(45, 18, '2021-08-09 15:41:05', '2021-08-14 15:41:00', NULL, NULL, 'O', NULL, 73),
(46, 18, '2021-08-09 15:42:05', '2021-08-09 20:42:00', '2021-08-13 13:45:17', NULL, 'D', NULL, 43),
(47, 18, '2021-08-11 04:09:10', '2021-08-14 04:08:00', NULL, NULL, 'O', NULL, 946),
(48, 18, '2021-08-11 04:32:36', '2021-08-14 04:08:00', NULL, NULL, 'O', NULL, 946),
(49, 18, '2021-08-12 18:39:40', '2021-08-11 18:39:00', '2021-08-13 13:45:17', NULL, 'D', NULL, 85),
(50, 18, '2021-08-12 18:40:09', '2021-08-11 18:39:00', NULL, NULL, 'O', NULL, 85),
(51, 18, '2021-08-12 22:04:51', '2021-08-12 22:05:00', '2021-08-13 13:45:17', NULL, 'D', NULL, 4411),
(52, 18, '2021-08-13 10:59:47', '2021-08-15 10:59:00', NULL, NULL, 'O', NULL, 16),
(53, 18, '2021-08-13 11:04:19', '2021-08-13 11:05:00', '2021-08-13 13:45:17', NULL, 'D', NULL, 1219),
(54, 18, '2021-08-13 11:06:09', '2021-08-17 11:06:00', NULL, '2021-08-13 11:11:48', 'C', NULL, 4297),
(55, 18, '2021-08-13 11:33:15', '2021-08-16 11:33:00', NULL, '2021-08-13 11:33:19', 'C', NULL, 860),
(56, 18, '2021-08-13 13:42:15', '2021-08-17 13:42:00', NULL, NULL, 'O', NULL, 22120),
(57, 18, '2021-08-13 13:44:40', '2021-08-13 13:44:00', '2021-08-13 13:45:17', NULL, 'D', NULL, 16),
(58, 19, '2021-08-13 15:26:28', '2021-08-15 15:26:00', NULL, '2021-08-13 15:26:47', 'C', NULL, 533);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `pcost` float NOT NULL,
  `pcat` int(11) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `ppic` varchar(255) NOT NULL,
  `uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `pcost`, `pcat`, `pdesc`, `ppic`, `uploaded`) VALUES
(6, 'Chrysanthemum Bud ', 10.5, 1, 'Premium Quality Herbs. No Added Artificial Flavourings or Colourings. Popular among family and young children. Packaged in Singapore.', 'Products/chrysanthemum-removebg-preview.png', '2021-07-26 01:16:06'),
(7, 'Ginseng Bird\'s Nest', 39.9, 2, 'Food for the Skin: Improves complexion, rich in calcium, iron, potassium, magnesium. Considered an anti-aging booster.', 'Products/birdnest-removebg-preview.png', '2021-07-26 01:16:06'),
(8, 'Imperial Phoenix Birds Nest (Rose) ', 39.9, 2, 'Food for the Skin: Improves complexion, rich in calcium, iron, potassium, magnesium. Considered an anti-aging booster.', 'Products/Imperial-Phoenix-Birds-Nest-Rose-150g--7__1_-removebg-preview.png', '2021-07-26 16:47:42'),
(9, 'Crocodile Oil 50ml', 68, 4, 'Moisturise and softens skin; Reduce inflammation; Lighten the appearance of wrinkles, acne scars, sun spots, dark spots, freckles and stretch marks', 'Products/crocOil-small-removebg-preview.png', '2021-07-26 16:51:40'),
(10, 'Double Prawn Herbal Oil (Qing Cao You) 28ml', 4.9, 4, 'It is meant for treating wounds and bruises. Throughout our childhood, we definitely came across this particular ointment known for its â€˜burning sensationâ€™ once applied to the injured area.', 'Products/herbaloil-removebg-preview.png', '2021-07-26 16:53:18'),
(15, 'Double Prawn Herbal Oil (Qing Cao You) 14ml', 2.9, 4, 'It is meant for treating wounds and bruises. Throughout our childhood, we definitely came across this particular ointment known for its â€˜burning sensationâ€™ once applied to the injured area.', 'Products/herbaloil14-removebg-preview.png', '2021-07-26 17:04:40'),
(12, 'Hong Far Oil 60ml', 9.5, 4, 'Promotes blood circulation, removes blood stasis, provides relief of aches and pains of muscles and joints associated with rheumatism, lumbago, sciatica, sprains and stiff muscles and joints.', 'Products/Hong_Far_Oil-removebg-preview.png', '2021-07-26 17:00:59'),
(13, 'Herbal Analgesic Oil 55ml ', 18, 4, 'Promotes blood circulation; Attempts to remove blood stasis; Eliminates wind dampness; Relieves joint swelling and pain associated with rheumatic aches and sprains; Relieves pain from bruises.', 'Products/analgesicoil-removebg-preview.png', '2021-07-26 17:01:50'),
(14, 'Nutmeg Balm Pin Li 15g', 4.5, 4, 'Massage balm for joint and muscle pain. Apply onto affected areas 3 to 4 times daily. Suitable for children with abdominal pain, gentle balm', 'Products/Nutmeg-Balm-Thye-Shan-3-600x600-removebg-preview.png', '2021-07-26 17:02:43'),
(16, 'Teksoo Oil 60ml', 12, 4, 'For a wide range of fungal infections such as Athleteâ€™s Foot. Helps relieve skin itch, cracking, scaling and other skin irritations. Contains ingredients that absorb odour, protect the skin, and have antiseptic and anti-inflammatory properties.', 'Products/Tecksoo-Oil-60ml--1-removebg-preview.png', '2021-07-26 17:10:21'),
(17, 'Hud Kwai Oil 60ml', 12, 4, 'Strong formula, Strong medicinal properties, especially suitable for labourers, scalding.', 'Products/Hud-Kwai-Oil-60ml--2-removebg-preview.png', '2021-07-26 17:10:58'),
(18, 'Indonesian Natural Birds Nest Grade Super AA 50g', 378, 2, 'Food for the Skin: Improves complexion, rich in calcium, iron, potassium, magnesium. Considered an anti-aging booster. Food for mothers for prenatal and postnatal nourishment', 'Products/Indonesian-Natural-Birds-Nest-50g-03165--1-600x600-removebg-preview.png', '2021-07-26 17:17:09'),
(19, 'Indonesian Natural Birds Nest Grade Super AA 300g', 2061, 2, 'Food for the Skin: Improves complexion, rich in calcium, iron, potassium, magnesium. Considered an anti-aging booster. Food for mothers for prenatal and postnatal nourishment', 'Products/Indonesian-Natural-Birds-Nest-Super-AA-300g--03157-1-600x600-removebg-preview.png', '2021-07-26 17:18:54'),
(20, 'Black Wolfberry (Wild Large) 125g', 18.2, 1, 'Rich in antioxidants (anti-aging and cancer fighting). Improves vision and liver Nourish Yin and improves blood and hence having beautiful skin and complexion. A super food', 'Products/blackwolfberry-removebg-preview.png', '2021-07-26 17:21:17'),
(21, 'Blooming Flower Tea Balls 24s', 32.8, 1, 'Calming tea, rich in anti-oxidants. Tastes slightly astringent, with floral sweetness, rich notes of honey and roasted nuts. TieGuanYin has a soft, mellow smooth and savory taste. The taste is softer than Green Tea.', 'Products/Blooming-Flower-Balls-2-removebg-preview.png', '2021-07-26 18:13:31'),
(22, 'Blooming Flower Tea Balls 15s', 23.8, 1, 'Calming tea, rich in anti-oxidants. Tastes slightly astringent, with floral sweetness, rich notes of honey and roasted nuts. TieGuanYin has a soft, mellow smooth and savory taste. The taste is softer than Green Tea.', 'Products/blooming-flower-tea-balls-15--300x300-removebg-preview.png', '2021-07-26 18:14:00'),
(23, 'Red Coral Honey Bee Apitherapy 120ml ', 120, 3, 'Helps relief of Rheumatic Pain, minor chest pain, tired and painful muscles, joints and bones, inflammation and Swelling caused by bruises, Lumbago and Muscular Aches.', 'Products/RedCoral-Honey-Bee-Apitherapy-4-600x600-removebg-preview.png', '2021-07-27 22:39:27'),
(24, 'Manuka Honey Waradaa 100+ MGO 500g', 67.5, 3, ' Immunity boosting, soothes the throat, improve digestive system, aids complexion.', 'Products/Waradaa-Manuka-Honey-100-3-600x600-removebg-preview.png', '2021-07-27 22:40:09'),
(25, 'Manuka Honey Waradaa 250+ MGO 500g', 73.5, 3, 'Immunity boosting, soothes the throat, improve digestive system, aids complexion.', 'Products/Waradaa-Manuka-Honey-250-1-600x600-removebg-preview.png', '2021-07-27 22:40:42'),
(26, 'Manuka Honey Waradaa 500+ MGO 250g', 97.5, 3, 'Immunity boosting, soothes the throat, improve digestive system, aids complexion.', 'Products/Waradaa-Manuka-Honey-500-250g-1-600x600-removebg-preview.png', '2021-07-27 22:41:55'),
(27, 'Shihu Dendrobium (Huoshan) 75g', 28, 5, 'It enriches Yin, generates fluids in the body, and reduces heatiness. The main target organs are the Kidneys, Liver, Stomach, Lungs. It greatly improves condition of dry and tired eyes.', 'Products/Huoshan-Shihu-Dendrobium-75g--1-600x600-removebg-preview.png', '2021-07-27 22:53:49'),
(28, 'Dang Shen Superior Codonopsis 300g', 64, 5, 'Boosts Qi or Energy, Invigorates spleen, Nourish blood, Improves lung functions, improves immunity, replenishes bodily fluids.', 'Products/Dang-Shen-SUPERIOR--19261-2-600x600-removebg-preview.png', '2021-07-27 22:54:46'),
(29, 'Chuan Bei Fine Powder 60g', 28, 5, 'Treat cough, reduce phlegm, clear heatiness, strengthen lungs and heart, improves Yin.', 'Products/Chuan-Bei-Fine-Powder--1-600x600-removebg-preview.png', '2021-07-27 22:55:16'),
(30, 'Chinese Cinnamon Superior Grade 30g', 18.5, 5, 'Warming and clears meridians. Cinnamon comes from the bark of the tree, and is a spice commonly used in many cuisines. It has a warm sweet flavour.', 'Products/Chinese-Cinnamon-30g--19265-1-600x600-removebg-preview.png', '2021-07-27 22:55:43'),
(31, 'Indonesian Natural Birds Nest Grade Super AAA 100g ', 792, 2, 'Food for the Skin: Improves complexion, rich in calcium, iron, potassium, magnesium. Considered an anti-aging booster. Food for mothers for prenatal and postnatal nourishment', 'Products/Indonesian-Natural-Birds-Nest-Grade-Super-AAA-100g--03168-1-600x600-removebg-preview.png', '2021-07-29 23:25:54'),
(32, 'Li Chung Wan 10 Pills (Uniflex Brand) ', 28, 6, ' Traditionally used for indigestion, loss of appetite, mild vomiting, diarrhea, and symptomatic relief of cough.', 'Products/Li-Chung-Wan-2-600x600-removebg-preview.png', '2021-08-05 01:18:35'),
(33, 'Antelopeâ€™s Horn Common Cold Capsules Natureâ€™s Green 24s', 6.5, 6, 'For use when having fever, headache, cough, sore throat and dryness of mouth due to both the common cold and influenza.', 'Products/Antelope-Horn-Capsules-5-600x600-removebg-preview.png', '2021-08-05 01:19:10'),
(34, 'Watermelon Frost Powder Insufflations 3g', 3.8, 6, 'Aid to relieve signs of bodily heat, swelling and pain in throat, or even sore throat or ulcer.', 'Products/Sanjin-Xi-Gua-Shuang-1-600x600-removebg-preview.png', '2021-08-05 01:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `star` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`star`, `image`) VALUES
(0, 'Ratings/0_star.png'),
(1, 'Ratings/1_star.png'),
(2, 'Ratings/2_star.png'),
(3, 'Ratings/3_star.png'),
(4, 'Ratings/4_star.png'),
(5, 'Ratings/5_star.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  `uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `review`, `rating`, `uploaded`) VALUES
(1, 'admin ', 'efdsfsdfds', 2, '2021-08-12 01:44:50'),
(2, 'admin ', 'icohaknosnalkcnasnclaknsclknalskcnlkxncklnxzlcn;klnpfoewpoijfoiejvsdknvmds vknspoi j[ewonf knsioJ{oif slkfn j [ojfspemslkdmfkdnflksndflkdsnfl;kndsvoinsdivdsvds', 5, '2021-08-12 16:50:04'),
(3, 'John', 'ofjknhsakj fjnvcxkznv oihef kNKFLNLSKnfdoisjfdsklnflkdn OIFlknsfk ! ', 3, '2021-08-12 16:53:38'),
(4, 'admin ', 'ewrfsdfvs dfsdf d', 4, '2021-08-12 17:02:38'),
(5, 'sjfioafjsoa', 'Wjodjfdklmfksmfs', 2, '2021-08-12 22:38:38'),
(6, 'dfksflks', 'dwaoijdaskmkcnoianfkdnfvdsfdsff', 3, '2021-08-12 23:48:22'),
(7, 'admin ', 'asdasvvcxvxcsfdsdf', 0, '2021-08-13 11:54:44'),
(8, 'hello ', 'Hellos ialkdnlakncoianokfnas ', 3, '2021-08-13 13:41:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
