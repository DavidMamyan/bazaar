-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2016 at 02:40 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Mher', 'Margaryan', 'margaryan.mher@yahoo.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `address`, `telephone`, `email`, `website`, `vat_rate`) VALUES
(1, 'Bazaar', 'Bashinjaghyan 15\r\nArmenia, \r\nYerevan ', '+374 93775960', 'margaryan.mher.28@gmail.com', 'bazaar.com', '19.50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `identity` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `identity`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Biographies & Autobiographies', 'biographies-authobiographies', 'Biographies & Autobiographies', 'Biographies & Autobiographies', 'Biographies & Autobiographies'),
(2, 'Computers & IT', 'computers-it', 'Computers & IT', 'Computers & IT', 'Computers & IT'),
(3, 'Art & Architecture', 'art-architecturee', 'Art & Architectureee', 'Art & Architecture', 'Art & Architecture'),
(4, 'Clothing & Perfume', 'clothing-perfume', 'Clothing & Perfume', 'Clothing & Perfume', 'Clothing & Perfume'),
(6, 'Books', 'books', 'Books', 'Books', 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `country` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `address_1`, `address_2`, `town`, `region`, `post_code`, `country`, `email`, `password`, `date`, `active`, `hash`) VALUES
(21, 'Mher', 'Margaryan', 'Armenia, Noyemberyan', 'Teryan str, 26', 'Noyemberyan', 'Tavush', '2808', 14, 'margaryan.mher.28@gmail.com', 'f0ed626e2e5a8441b48e02ee9132d7caa578f3ac5c809e1508dddb7764c8c43bd25360c8e326cbef476739d5a1a5a0a471e20b8ccdf79b00b85ca88e3131df5a', '2016-09-19 19:38:06', 1, '137701698020160919193806475717451');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Aland Islands', 'AX'),
(3, 'Albania', 'AL'),
(4, 'Algeria', 'DZ'),
(5, 'American Samoa', 'AS'),
(6, 'Andorra', 'AD'),
(7, 'Angola', 'AO'),
(8, 'Anguilla', 'AI'),
(9, 'Antarctica', 'AQ'),
(10, 'Antigua And Barbuda', 'AG'),
(11, 'Argentina', 'AR'),
(12, 'Armenia', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Australia', 'AU'),
(15, 'Austria', 'AT'),
(16, 'Azerbaijan', 'AZ'),
(17, 'Bahamas', 'BS'),
(18, 'Bahrain', 'BH'),
(19, 'Bangladesh', 'BD'),
(20, 'Barbados', 'BB'),
(21, 'Belarus', 'BY'),
(22, 'Belgium', 'BE'),
(23, 'Belize', 'BZ'),
(24, 'Benin', 'BJ'),
(25, 'Bermuda', 'BM'),
(26, 'Bhutan', 'BT'),
(27, 'Bolivia', 'BO'),
(28, 'Bosnia And Herzegovina', 'BA'),
(29, 'Botswana', 'BW'),
(30, 'Bouvet Island', 'BV'),
(31, 'Brazil', 'BR'),
(32, 'British Indian Ocean Territory', 'IO'),
(33, 'Brunei Darussalam', 'BN'),
(34, 'Bulgaria', 'BG'),
(35, 'Burkina Faso', 'BF'),
(36, 'Burundi', 'BI'),
(37, 'Cambodia', 'KH'),
(38, 'Cameroon', 'CM'),
(39, 'Canada', 'CA'),
(40, 'Cape Verde', 'CV'),
(41, 'Cayman Islands', 'KY'),
(42, 'Central African Republic', 'CF'),
(43, 'Chad', 'TD'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Christmas Island', 'CX'),
(47, 'Cocos (keeling) Islands', 'CC'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Congo', 'CG'),
(51, 'Congo, The Democratic Republic Of', 'CD'),
(52, 'Cook Islands', 'CK'),
(53, 'Costa Rica', 'CR'),
(54, 'Cote D''ivoire', 'CI'),
(55, 'Croatia', 'HR'),
(56, 'Cuba', 'CU'),
(57, 'Cyprus', 'CY'),
(58, 'Czech Republic', 'CZ'),
(59, 'Denmark', 'DK'),
(60, 'Djibouti', 'DJ'),
(61, 'Dominica', 'DM'),
(62, 'Dominican Republic', 'DO'),
(63, 'Ecuador', 'EC'),
(64, 'Egypt', 'EG'),
(65, 'El Salvador', 'SV'),
(66, 'Equatorial Guinea', 'GQ'),
(67, 'Eritrea', 'ER'),
(68, 'Estonia', 'EE'),
(69, 'Ethiopia', 'ET'),
(70, 'Falkland Islands (malvinas)', 'FK'),
(71, 'Faroe Islands', 'FO'),
(72, 'Fiji', 'FJ'),
(73, 'Finland', 'FI'),
(74, 'France', 'FR'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guernsey', 'GG'),
(91, 'Guinea', 'GN'),
(92, 'Guinea-bissau', 'GW'),
(93, 'Guyana', 'GY'),
(94, 'Haiti', 'HT'),
(95, 'Heard Island And Mcdonald Islands', 'HM'),
(96, 'Holy See (vatican City State)', 'VA'),
(97, 'Honduras', 'HN'),
(98, 'Hong Kong', 'HK'),
(99, 'Hungary', 'HU'),
(100, 'Iceland', 'IS'),
(101, 'India', 'IN'),
(102, 'Indonesia', 'ID'),
(103, 'Iran, Islamic Republic Of', 'IR'),
(104, 'Iraq', 'IQ'),
(105, 'Ireland', 'IE'),
(106, 'Isle Of Man', 'IM'),
(107, 'Israel', 'IL'),
(108, 'Italy', 'IT'),
(109, 'Jamaica', 'JM'),
(110, 'Japan', 'JP'),
(111, 'Jersey', 'JE'),
(112, 'Jordan', 'JO'),
(113, 'Kazakhstan', 'KZ'),
(114, 'Kenya', 'KE'),
(115, 'Kiribati', 'KI'),
(116, 'Korea, Democratic People''s Republic Of', 'KP'),
(117, 'Korea, Republic Of', 'KR'),
(118, 'Kuwait', 'KW'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Lao People''s Democratic Republic', 'LA'),
(121, 'Latvia', 'LV'),
(122, 'Lebanon', 'LB'),
(123, 'Lesotho', 'LS'),
(124, 'Liberia', 'LR'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macao', 'MO'),
(130, 'Macedonia, The Former Yugoslav Republic Of', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Marshall Islands', 'MH'),
(138, 'Martinique', 'MQ'),
(139, 'Mauritania', 'MR'),
(140, 'Mauritius', 'MU'),
(141, 'Mayotte', 'YT'),
(142, 'Mexico', 'MX'),
(143, 'Micronesia, Federated States Of', 'FM'),
(144, 'Moldova, Republic Of', 'MD'),
(145, 'Monaco', 'MC'),
(146, 'Mongolia', 'MN'),
(147, 'Montserrat', 'MS'),
(148, 'Morocco', 'MA'),
(149, 'Mozambique', 'MZ'),
(150, 'Myanmar', 'MM'),
(151, 'Namibia', 'NA'),
(152, 'Nauru', 'NR'),
(153, 'Nepal', 'NP'),
(154, 'Netherlands', 'NL'),
(155, 'Netherlands Antilles', 'AN'),
(156, 'New Caledonia', 'NC'),
(157, 'New Zealand', 'NZ'),
(158, 'Nicaragua', 'NI'),
(159, 'Niger', 'NE'),
(160, 'Nigeria', 'NG'),
(161, 'Niue', 'NU'),
(162, 'Norfolk Island', 'NF'),
(163, 'Northern Mariana Islands', 'MP'),
(164, 'Norway', 'NO'),
(165, 'Oman', 'OM'),
(166, 'Pakistan', 'PK'),
(167, 'Palau', 'PW'),
(168, 'Palestinian Territory, Occupied', 'PS'),
(169, 'Panama', 'PA'),
(170, 'Papua New Guinea', 'PG'),
(171, 'Paraguay', 'PY'),
(172, 'Peru', 'PE'),
(173, 'Philippines', 'PH'),
(174, 'Pitcairn', 'PN'),
(175, 'Poland', 'PL'),
(176, 'Portugal', 'PT'),
(177, 'Puerto Rico', 'PR'),
(178, 'Qatar', 'QA'),
(179, 'Reunion', 'RE'),
(180, 'Romania', 'RO'),
(181, 'Russian Federation', 'RU'),
(182, 'Rwanda', 'RW'),
(183, 'Saint Helena', 'SH'),
(184, 'Saint Kitts And Nevis', 'KN'),
(185, 'Saint Lucia', 'LC'),
(186, 'Saint Pierre And Miquelon', 'PM'),
(187, 'Saint Vincent And The Grenadines', 'VC'),
(188, 'Samoa', 'WS'),
(189, 'San Marino', 'SM'),
(190, 'Sao Tome And Principe', 'ST'),
(191, 'Saudi Arabia', 'SA'),
(192, 'Senegal', 'SN'),
(193, 'Serbia And Montenegro', 'CS'),
(194, 'Seychelles', 'SC'),
(195, 'Sierra Leone', 'SL'),
(196, 'Singapore', 'SG'),
(197, 'Slovakia', 'SK'),
(198, 'Slovenia', 'SI'),
(199, 'Solomon Islands', 'SB'),
(200, 'Somalia', 'SO'),
(201, 'South Africa', 'ZA'),
(202, 'South Georgia And The South Sandwich Islands', 'GS'),
(203, 'Spain', 'ES'),
(204, 'Sri Lanka', 'LK'),
(205, 'Sudan', 'SD'),
(206, 'Suriname', 'SR'),
(207, 'Svalbard And Jan Mayen', 'SJ'),
(208, 'Swaziland', 'SZ'),
(209, 'Sweden', 'SE'),
(210, 'Switzerland', 'CH'),
(211, 'Syrian Arab Republic', 'SY'),
(212, 'Taiwan, Province Of China', 'TW'),
(213, 'Tajikistan', 'TJ'),
(214, 'Tanzania, United Republic Of', 'TZ'),
(215, 'Thailand', 'TH'),
(216, 'Timor-leste', 'TL'),
(217, 'Togo', 'TG'),
(218, 'Tokelau', 'TK'),
(219, 'Tonga', 'TO'),
(220, 'Trinidad And Tobago', 'TT'),
(221, 'Tunisia', 'TN'),
(222, 'Turkey', 'TR'),
(223, 'Turkmenistan', 'TM'),
(224, 'Turks And Caicos Islands', 'TC'),
(225, 'Tuvalu', 'TV'),
(226, 'Uganda', 'UG'),
(227, 'Ukraine', 'UA'),
(228, 'United Arab Emirates', 'AE'),
(229, 'United Kingdom', 'GB'),
(230, 'United States', 'US'),
(231, 'United States Minor Outlying Islands', 'UM'),
(232, 'Uruguay', 'UY'),
(233, 'Uzbekistan', 'UZ'),
(234, 'Vanuatu', 'VU'),
(235, 'Venezuela', 'VE'),
(236, 'Viet Nam', 'VN'),
(237, 'Virgin Islands, British', 'VG'),
(238, 'Virgin Islands, U.S.', 'VI'),
(239, 'Wallis And Futuna', 'WF'),
(240, 'Western Sahara', 'EH'),
(241, 'Yemen', 'YE'),
(242, 'Zambia', 'ZM'),
(243, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `pp_status` tinyint(1) NOT NULL DEFAULT '0',
  `txn_id` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client`, `vat_rate`, `vat`, `subtotal`, `total`, `date`, `status`, `pp_status`, `txn_id`, `payment_status`, `notes`) VALUES
(1, 21, '19.50', '50.70', '260.00', '310.70', '2016-09-20 00:31:03', 2, 1, NULL, NULL, '									'),
(3, 21, '19.50', '3.90', '19.99', '23.89', '2016-09-20 13:35:42', 3, 0, NULL, NULL, '																		'),
(20, 21, '19.50', '3.90', '19.99', '23.89', '2016-09-20 14:33:39', 1, 0, NULL, NULL, NULL),
(21, 21, '19.50', '3.90', '19.99', '23.89', '2016-09-20 14:38:37', 2, 0, NULL, NULL, '									'),
(24, 21, '19.50', '6.24', '31.99', '38.23', '2016-09-24 22:30:19', 2, 0, NULL, NULL, 'give him a cookie');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order`, `product`, `price`, `qty`) VALUES
(16, 20, 2, '19.99', 1),
(17, 21, 2, '19.99', 1),
(21, 24, 22, '12.00', 1),
(22, 24, 2, '19.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `identity` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `date`, `category`, `image`, `identity`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Gaming PC', 'Relatively new gaming pc is for sale. Nice condition, used for 6 months.', '260.00', '2016-09-12 08:41:07', 2, 'pcsell.jpg', 'gamin-pc', 'Gaming PC', 'Gaming PC', 'Gaming PC'),
(2, 'Jane Eyre', 'A nice book about a girl who was bullied during her childhood and so on.', '19.99', '2016-09-04 00:00:00', 1, 'janeeyre.jpg', 'jane-eyre', 'Jane Eyre', 'Jane Eyre', 'Jane Eyre'),
(22, 'First Step 2 Forever: My Story', 'Cute little girl telling her story.', '12.00', '2016-09-22 20:21:09', 1, '20160922202109-index.jpg', '1st-step-to-forever', 'First Step 2 Forever: My Story', 'First Step 2 Forever: My Story', 'First Step 2 Forever: My Story');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Dispatched');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `fk_stage` (`status`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order` (`order`,`product`),
  ADD KEY `FK_PRODUCT` (`product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
