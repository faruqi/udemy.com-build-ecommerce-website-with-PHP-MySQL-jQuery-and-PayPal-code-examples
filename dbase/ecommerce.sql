-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2010 at 09:19 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` VALUES(1, 'Sebastian', 'Sulinski', 'sebastian.sulinski@gmail.com', 'e6a866daadb723bd5379bb0322ae3c5168ac7e7fc5fe41e2715c680291b9696b53ddb642262aab58a282a85d6e72cf638333be48679a8e66a0b56593d5953620');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` VALUES(1, 'Show with us!', '16 London Road\r\nBrighton\r\nEast Sussex\r\nBN16 2PL', '0845 0994 565', 'business@businessemail.com', 'businessemail.com', 17.50);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(1, 'Biographies & Autobiographies');
INSERT INTO `categories` VALUES(2, 'Computers & IT');
INSERT INTO `categories` VALUES(3, 'Art & Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `country` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` VALUES(1, 'Sebastian', 'Sulinski', 'Some address', '', 'Bognor Regis', 'West Sussex', 'Post Code', 229, 'sebastian.sulinski@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2010-12-14 18:27:56', 1, '133493328520101214182756968055345');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=244 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES(1, 'Afghanistan', 'AF');
INSERT INTO `countries` VALUES(2, 'Ãland Islands', 'AX');
INSERT INTO `countries` VALUES(3, 'Albania', 'AL');
INSERT INTO `countries` VALUES(4, 'Algeria', 'DZ');
INSERT INTO `countries` VALUES(5, 'American Samoa', 'AS');
INSERT INTO `countries` VALUES(6, 'Andorra', 'AD');
INSERT INTO `countries` VALUES(7, 'Angola', 'AO');
INSERT INTO `countries` VALUES(8, 'Anguilla', 'AI');
INSERT INTO `countries` VALUES(9, 'Antarctica', 'AQ');
INSERT INTO `countries` VALUES(10, 'Antigua And Barbuda', 'AG');
INSERT INTO `countries` VALUES(11, 'Argentina', 'AR');
INSERT INTO `countries` VALUES(12, 'Armenia', 'AM');
INSERT INTO `countries` VALUES(13, 'Aruba', 'AW');
INSERT INTO `countries` VALUES(14, 'Australia', 'AU');
INSERT INTO `countries` VALUES(15, 'Austria', 'AT');
INSERT INTO `countries` VALUES(16, 'Azerbaijan', 'AZ');
INSERT INTO `countries` VALUES(17, 'Bahamas', 'BS');
INSERT INTO `countries` VALUES(18, 'Bahrain', 'BH');
INSERT INTO `countries` VALUES(19, 'Bangladesh', 'BD');
INSERT INTO `countries` VALUES(20, 'Barbados', 'BB');
INSERT INTO `countries` VALUES(21, 'Belarus', 'BY');
INSERT INTO `countries` VALUES(22, 'Belgium', 'BE');
INSERT INTO `countries` VALUES(23, 'Belize', 'BZ');
INSERT INTO `countries` VALUES(24, 'Benin', 'BJ');
INSERT INTO `countries` VALUES(25, 'Bermuda', 'BM');
INSERT INTO `countries` VALUES(26, 'Bhutan', 'BT');
INSERT INTO `countries` VALUES(27, 'Bolivia', 'BO');
INSERT INTO `countries` VALUES(28, 'Bosnia And Herzegovina', 'BA');
INSERT INTO `countries` VALUES(29, 'Botswana', 'BW');
INSERT INTO `countries` VALUES(30, 'Bouvet Island', 'BV');
INSERT INTO `countries` VALUES(31, 'Brazil', 'BR');
INSERT INTO `countries` VALUES(32, 'British Indian Ocean Territory', 'IO');
INSERT INTO `countries` VALUES(33, 'Brunei Darussalam', 'BN');
INSERT INTO `countries` VALUES(34, 'Bulgaria', 'BG');
INSERT INTO `countries` VALUES(35, 'Burkina Faso', 'BF');
INSERT INTO `countries` VALUES(36, 'Burundi', 'BI');
INSERT INTO `countries` VALUES(37, 'Cambodia', 'KH');
INSERT INTO `countries` VALUES(38, 'Cameroon', 'CM');
INSERT INTO `countries` VALUES(39, 'Canada', 'CA');
INSERT INTO `countries` VALUES(40, 'Cape Verde', 'CV');
INSERT INTO `countries` VALUES(41, 'Cayman Islands', 'KY');
INSERT INTO `countries` VALUES(42, 'Central African Republic', 'CF');
INSERT INTO `countries` VALUES(43, 'Chad', 'TD');
INSERT INTO `countries` VALUES(44, 'Chile', 'CL');
INSERT INTO `countries` VALUES(45, 'China', 'CN');
INSERT INTO `countries` VALUES(46, 'Christmas Island', 'CX');
INSERT INTO `countries` VALUES(47, 'Cocos (keeling) Islands', 'CC');
INSERT INTO `countries` VALUES(48, 'Colombia', 'CO');
INSERT INTO `countries` VALUES(49, 'Comoros', 'KM');
INSERT INTO `countries` VALUES(50, 'Congo', 'CG');
INSERT INTO `countries` VALUES(51, 'Congo, The Democratic Republic Of', 'CD');
INSERT INTO `countries` VALUES(52, 'Cook Islands', 'CK');
INSERT INTO `countries` VALUES(53, 'Costa Rica', 'CR');
INSERT INTO `countries` VALUES(54, 'Cote D''ivoire', 'CI');
INSERT INTO `countries` VALUES(55, 'Croatia', 'HR');
INSERT INTO `countries` VALUES(56, 'Cuba', 'CU');
INSERT INTO `countries` VALUES(57, 'Cyprus', 'CY');
INSERT INTO `countries` VALUES(58, 'Czech Republic', 'CZ');
INSERT INTO `countries` VALUES(59, 'Denmark', 'DK');
INSERT INTO `countries` VALUES(60, 'Djibouti', 'DJ');
INSERT INTO `countries` VALUES(61, 'Dominica', 'DM');
INSERT INTO `countries` VALUES(62, 'Dominican Republic', 'DO');
INSERT INTO `countries` VALUES(63, 'Ecuador', 'EC');
INSERT INTO `countries` VALUES(64, 'Egypt', 'EG');
INSERT INTO `countries` VALUES(65, 'El Salvador', 'SV');
INSERT INTO `countries` VALUES(66, 'Equatorial Guinea', 'GQ');
INSERT INTO `countries` VALUES(67, 'Eritrea', 'ER');
INSERT INTO `countries` VALUES(68, 'Estonia', 'EE');
INSERT INTO `countries` VALUES(69, 'Ethiopia', 'ET');
INSERT INTO `countries` VALUES(70, 'Falkland Islands (malvinas)', 'FK');
INSERT INTO `countries` VALUES(71, 'Faroe Islands', 'FO');
INSERT INTO `countries` VALUES(72, 'Fiji', 'FJ');
INSERT INTO `countries` VALUES(73, 'Finland', 'FI');
INSERT INTO `countries` VALUES(74, 'France', 'FR');
INSERT INTO `countries` VALUES(75, 'French Guiana', 'GF');
INSERT INTO `countries` VALUES(76, 'French Polynesia', 'PF');
INSERT INTO `countries` VALUES(77, 'French Southern Territories', 'TF');
INSERT INTO `countries` VALUES(78, 'Gabon', 'GA');
INSERT INTO `countries` VALUES(79, 'Gambia', 'GM');
INSERT INTO `countries` VALUES(80, 'Georgia', 'GE');
INSERT INTO `countries` VALUES(81, 'Germany', 'DE');
INSERT INTO `countries` VALUES(82, 'Ghana', 'GH');
INSERT INTO `countries` VALUES(83, 'Gibraltar', 'GI');
INSERT INTO `countries` VALUES(84, 'Greece', 'GR');
INSERT INTO `countries` VALUES(85, 'Greenland', 'GL');
INSERT INTO `countries` VALUES(86, 'Grenada', 'GD');
INSERT INTO `countries` VALUES(87, 'Guadeloupe', 'GP');
INSERT INTO `countries` VALUES(88, 'Guam', 'GU');
INSERT INTO `countries` VALUES(89, 'Guatemala', 'GT');
INSERT INTO `countries` VALUES(90, 'Guernsey', 'GG');
INSERT INTO `countries` VALUES(91, 'Guinea', 'GN');
INSERT INTO `countries` VALUES(92, 'Guinea-bissau', 'GW');
INSERT INTO `countries` VALUES(93, 'Guyana', 'GY');
INSERT INTO `countries` VALUES(94, 'Haiti', 'HT');
INSERT INTO `countries` VALUES(95, 'Heard Island And Mcdonald Islands', 'HM');
INSERT INTO `countries` VALUES(96, 'Holy See (vatican City State)', 'VA');
INSERT INTO `countries` VALUES(97, 'Honduras', 'HN');
INSERT INTO `countries` VALUES(98, 'Hong Kong', 'HK');
INSERT INTO `countries` VALUES(99, 'Hungary', 'HU');
INSERT INTO `countries` VALUES(100, 'Iceland', 'IS');
INSERT INTO `countries` VALUES(101, 'India', 'IN');
INSERT INTO `countries` VALUES(102, 'Indonesia', 'ID');
INSERT INTO `countries` VALUES(103, 'Iran, Islamic Republic Of', 'IR');
INSERT INTO `countries` VALUES(104, 'Iraq', 'IQ');
INSERT INTO `countries` VALUES(105, 'Ireland', 'IE');
INSERT INTO `countries` VALUES(106, 'Isle Of Man', 'IM');
INSERT INTO `countries` VALUES(107, 'Israel', 'IL');
INSERT INTO `countries` VALUES(108, 'Italy', 'IT');
INSERT INTO `countries` VALUES(109, 'Jamaica', 'JM');
INSERT INTO `countries` VALUES(110, 'Japan', 'JP');
INSERT INTO `countries` VALUES(111, 'Jersey', 'JE');
INSERT INTO `countries` VALUES(112, 'Jordan', 'JO');
INSERT INTO `countries` VALUES(113, 'Kazakhstan', 'KZ');
INSERT INTO `countries` VALUES(114, 'Kenya', 'KE');
INSERT INTO `countries` VALUES(115, 'Kiribati', 'KI');
INSERT INTO `countries` VALUES(116, 'Korea, Democratic People''s Republic Of', 'KP');
INSERT INTO `countries` VALUES(117, 'Korea, Republic Of', 'KR');
INSERT INTO `countries` VALUES(118, 'Kuwait', 'KW');
INSERT INTO `countries` VALUES(119, 'Kyrgyzstan', 'KG');
INSERT INTO `countries` VALUES(120, 'Lao People''s Democratic Republic', 'LA');
INSERT INTO `countries` VALUES(121, 'Latvia', 'LV');
INSERT INTO `countries` VALUES(122, 'Lebanon', 'LB');
INSERT INTO `countries` VALUES(123, 'Lesotho', 'LS');
INSERT INTO `countries` VALUES(124, 'Liberia', 'LR');
INSERT INTO `countries` VALUES(125, 'Libyan Arab Jamahiriya', 'LY');
INSERT INTO `countries` VALUES(126, 'Liechtenstein', 'LI');
INSERT INTO `countries` VALUES(127, 'Lithuania', 'LT');
INSERT INTO `countries` VALUES(128, 'Luxembourg', 'LU');
INSERT INTO `countries` VALUES(129, 'Macao', 'MO');
INSERT INTO `countries` VALUES(130, 'Macedonia, The Former Yugoslav Republic Of', 'MK');
INSERT INTO `countries` VALUES(131, 'Madagascar', 'MG');
INSERT INTO `countries` VALUES(132, 'Malawi', 'MW');
INSERT INTO `countries` VALUES(133, 'Malaysia', 'MY');
INSERT INTO `countries` VALUES(134, 'Maldives', 'MV');
INSERT INTO `countries` VALUES(135, 'Mali', 'ML');
INSERT INTO `countries` VALUES(136, 'Malta', 'MT');
INSERT INTO `countries` VALUES(137, 'Marshall Islands', 'MH');
INSERT INTO `countries` VALUES(138, 'Martinique', 'MQ');
INSERT INTO `countries` VALUES(139, 'Mauritania', 'MR');
INSERT INTO `countries` VALUES(140, 'Mauritius', 'MU');
INSERT INTO `countries` VALUES(141, 'Mayotte', 'YT');
INSERT INTO `countries` VALUES(142, 'Mexico', 'MX');
INSERT INTO `countries` VALUES(143, 'Micronesia, Federated States Of', 'FM');
INSERT INTO `countries` VALUES(144, 'Moldova, Republic Of', 'MD');
INSERT INTO `countries` VALUES(145, 'Monaco', 'MC');
INSERT INTO `countries` VALUES(146, 'Mongolia', 'MN');
INSERT INTO `countries` VALUES(147, 'Montserrat', 'MS');
INSERT INTO `countries` VALUES(148, 'Morocco', 'MA');
INSERT INTO `countries` VALUES(149, 'Mozambique', 'MZ');
INSERT INTO `countries` VALUES(150, 'Myanmar', 'MM');
INSERT INTO `countries` VALUES(151, 'Namibia', 'NA');
INSERT INTO `countries` VALUES(152, 'Nauru', 'NR');
INSERT INTO `countries` VALUES(153, 'Nepal', 'NP');
INSERT INTO `countries` VALUES(154, 'Netherlands', 'NL');
INSERT INTO `countries` VALUES(155, 'Netherlands Antilles', 'AN');
INSERT INTO `countries` VALUES(156, 'New Caledonia', 'NC');
INSERT INTO `countries` VALUES(157, 'New Zealand', 'NZ');
INSERT INTO `countries` VALUES(158, 'Nicaragua', 'NI');
INSERT INTO `countries` VALUES(159, 'Niger', 'NE');
INSERT INTO `countries` VALUES(160, 'Nigeria', 'NG');
INSERT INTO `countries` VALUES(161, 'Niue', 'NU');
INSERT INTO `countries` VALUES(162, 'Norfolk Island', 'NF');
INSERT INTO `countries` VALUES(163, 'Northern Mariana Islands', 'MP');
INSERT INTO `countries` VALUES(164, 'Norway', 'NO');
INSERT INTO `countries` VALUES(165, 'Oman', 'OM');
INSERT INTO `countries` VALUES(166, 'Pakistan', 'PK');
INSERT INTO `countries` VALUES(167, 'Palau', 'PW');
INSERT INTO `countries` VALUES(168, 'Palestinian Territory, Occupied', 'PS');
INSERT INTO `countries` VALUES(169, 'Panama', 'PA');
INSERT INTO `countries` VALUES(170, 'Papua New Guinea', 'PG');
INSERT INTO `countries` VALUES(171, 'Paraguay', 'PY');
INSERT INTO `countries` VALUES(172, 'Peru', 'PE');
INSERT INTO `countries` VALUES(173, 'Philippines', 'PH');
INSERT INTO `countries` VALUES(174, 'Pitcairn', 'PN');
INSERT INTO `countries` VALUES(175, 'Poland', 'PL');
INSERT INTO `countries` VALUES(176, 'Portugal', 'PT');
INSERT INTO `countries` VALUES(177, 'Puerto Rico', 'PR');
INSERT INTO `countries` VALUES(178, 'Qatar', 'QA');
INSERT INTO `countries` VALUES(179, 'Reunion', 'RE');
INSERT INTO `countries` VALUES(180, 'Romania', 'RO');
INSERT INTO `countries` VALUES(181, 'Russian Federation', 'RU');
INSERT INTO `countries` VALUES(182, 'Rwanda', 'RW');
INSERT INTO `countries` VALUES(183, 'Saint Helena', 'SH');
INSERT INTO `countries` VALUES(184, 'Saint Kitts And Nevis', 'KN');
INSERT INTO `countries` VALUES(185, 'Saint Lucia', 'LC');
INSERT INTO `countries` VALUES(186, 'Saint Pierre And Miquelon', 'PM');
INSERT INTO `countries` VALUES(187, 'Saint Vincent And The Grenadines', 'VC');
INSERT INTO `countries` VALUES(188, 'Samoa', 'WS');
INSERT INTO `countries` VALUES(189, 'San Marino', 'SM');
INSERT INTO `countries` VALUES(190, 'Sao Tome And Principe', 'ST');
INSERT INTO `countries` VALUES(191, 'Saudi Arabia', 'SA');
INSERT INTO `countries` VALUES(192, 'Senegal', 'SN');
INSERT INTO `countries` VALUES(193, 'Serbia And Montenegro', 'CS');
INSERT INTO `countries` VALUES(194, 'Seychelles', 'SC');
INSERT INTO `countries` VALUES(195, 'Sierra Leone', 'SL');
INSERT INTO `countries` VALUES(196, 'Singapore', 'SG');
INSERT INTO `countries` VALUES(197, 'Slovakia', 'SK');
INSERT INTO `countries` VALUES(198, 'Slovenia', 'SI');
INSERT INTO `countries` VALUES(199, 'Solomon Islands', 'SB');
INSERT INTO `countries` VALUES(200, 'Somalia', 'SO');
INSERT INTO `countries` VALUES(201, 'South Africa', 'ZA');
INSERT INTO `countries` VALUES(202, 'South Georgia And The South Sandwich Islands', 'GS');
INSERT INTO `countries` VALUES(203, 'Spain', 'ES');
INSERT INTO `countries` VALUES(204, 'Sri Lanka', 'LK');
INSERT INTO `countries` VALUES(205, 'Sudan', 'SD');
INSERT INTO `countries` VALUES(206, 'Suriname', 'SR');
INSERT INTO `countries` VALUES(207, 'Svalbard And Jan Mayen', 'SJ');
INSERT INTO `countries` VALUES(208, 'Swaziland', 'SZ');
INSERT INTO `countries` VALUES(209, 'Sweden', 'SE');
INSERT INTO `countries` VALUES(210, 'Switzerland', 'CH');
INSERT INTO `countries` VALUES(211, 'Syrian Arab Republic', 'SY');
INSERT INTO `countries` VALUES(212, 'Taiwan, Province Of China', 'TW');
INSERT INTO `countries` VALUES(213, 'Tajikistan', 'TJ');
INSERT INTO `countries` VALUES(214, 'Tanzania, United Republic Of', 'TZ');
INSERT INTO `countries` VALUES(215, 'Thailand', 'TH');
INSERT INTO `countries` VALUES(216, 'Timor-leste', 'TL');
INSERT INTO `countries` VALUES(217, 'Togo', 'TG');
INSERT INTO `countries` VALUES(218, 'Tokelau', 'TK');
INSERT INTO `countries` VALUES(219, 'Tonga', 'TO');
INSERT INTO `countries` VALUES(220, 'Trinidad And Tobago', 'TT');
INSERT INTO `countries` VALUES(221, 'Tunisia', 'TN');
INSERT INTO `countries` VALUES(222, 'Turkey', 'TR');
INSERT INTO `countries` VALUES(223, 'Turkmenistan', 'TM');
INSERT INTO `countries` VALUES(224, 'Turks And Caicos Islands', 'TC');
INSERT INTO `countries` VALUES(225, 'Tuvalu', 'TV');
INSERT INTO `countries` VALUES(226, 'Uganda', 'UG');
INSERT INTO `countries` VALUES(227, 'Ukraine', 'UA');
INSERT INTO `countries` VALUES(228, 'United Arab Emirates', 'AE');
INSERT INTO `countries` VALUES(229, 'United Kingdom', 'GB');
INSERT INTO `countries` VALUES(230, 'United States', 'US');
INSERT INTO `countries` VALUES(231, 'United States Minor Outlying Islands', 'UM');
INSERT INTO `countries` VALUES(232, 'Uruguay', 'UY');
INSERT INTO `countries` VALUES(233, 'Uzbekistan', 'UZ');
INSERT INTO `countries` VALUES(234, 'Vanuatu', 'VU');
INSERT INTO `countries` VALUES(235, 'Venezuela', 'VE');
INSERT INTO `countries` VALUES(236, 'Viet Nam', 'VN');
INSERT INTO `countries` VALUES(237, 'Virgin Islands, British', 'VG');
INSERT INTO `countries` VALUES(238, 'Virgin Islands, U.S.', 'VI');
INSERT INTO `countries` VALUES(239, 'Wallis And Futuna', 'WF');
INSERT INTO `countries` VALUES(240, 'Western Sahara', 'EH');
INSERT INTO `countries` VALUES(241, 'Yemen', 'YE');
INSERT INTO `countries` VALUES(242, 'Zambia', 'ZM');
INSERT INTO `countries` VALUES(243, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `ipn` text,
  `response` varchar(100) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `fk_stage` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` VALUES(1, 1, 17.50, 16.58, 94.75, 111.33, '2010-12-14 19:20:52', 3, 1, 'asdf', 'Completed', NULL, NULL, 'Some notes about the order');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `order` (`order`,`product`),
  KEY `FK_PRODUCT` (`product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` VALUES(1, 1, 19, 18.95, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(1, 'Lou Reed''s New York', 'After his first book of photographs was published, Lou Reed told a journalist for The Independent on Sunday that, "I live on intuition and taking pictures is intuitive." Here, we see Lou Reed''s intuitive take on New York, the city that has been the fulcrum of his creative world for decades and with which he has become indelibly identified. We''ve heard about the streets and characters for so long through his words and music, and now we can see it through his eyes. Over 100 of Reed''s photographs comprise New York, an intimate view of what inspires him. Hardcover, 9 x 13.5 in./192 pgs / 100 color.', 16.25, '2010-07-19 22:58:30', 1, '41jvrdnqpcl.-ss500-.jpg');
INSERT INTO `products` VALUES(2, 'Andy Warhol Prints: A Catalogue Raisonné 1962-1987', 'No one can doubt that Andy Warhol has influenced the American art world both as an artist and as a personality. Feldman and Schellmann''s catalog provides the specialist with a multitude of color images that do much to illuminate Warhol as a printmaker. Unfortunately, the reproductions take up less space than the blank areas surrounding them. These small reproductions are preceded by two brief essays that provide a less-than-adequate introduction to the prints. Geldzahler has only praise for Warhol and dutifully acclaims his ``contribution to art history.'''' Roberta Bernstein''s essay is more substantive; she is more analytical and willing to make critical judgments. Though useful as a catalog of Warhol''s 364 prints, this book is not what it could be. Douglas G. Campbell, Ctr. for Fine Arts, Warner Pacific Coll., Portland, Ore.\r\nCopyright 1985 Reed Business Information, Inc.', 17.50, '2010-07-19 23:01:23', 3, '51msk1xtdbl.-ss500-.jpg');
INSERT INTO `products` VALUES(3, 'The Autobiography and Sex Life of Andy Warhol', 'Village Voice and Interview cofounder John Wilcock was first drawn into the milieu of Andy Warhol through filmmaker Jonas Mekas, assisting on some of Warhol''s early films, hanging out at his parties and quickly becoming a regular at the Factory. "About six months after I started hanging out at the old, silvery Factory on West 47th Street," he recalls, "[Gerard] Malanga came up to me and asked, ''When are you going to write something about us?''" Already fascinated by Warhol''s persona, Wilcock went to work, interviewing the artist''s closest associates, supporters and superstars. Among these were Malanga, Naomi Levine, Taylor Mead and Ultra Violet, all of whom had been in the earliest films; scriptwriter Ronnie Tavel, and photographer Gretchen Berg; art dealers Sam Green, Ivan Karp, Eleanor Ward and Leo Castelli, and the Metropolitan Museum of Art''s Henry Geldzahler; the poets Charles Henri Ford and Taylor Mead, and the artist Marisol; and the musicians Lou Reed and Nico. Paul Morrissey supplied the title: The Autobiography and Sex Life of Andy Warhol is the first oral biography of the artist. First published in 1971, and pitched against the colorful backdrop of the 1960s, it assembles a prismatic portrait of one of modern art''s least knowable artists during the early years of his fame. The Autobiography and Sex Life is likely the most revealing portrait of Warhol, being composite instead of singular; each of its interviewees offers a piece of the puzzle that was Andy Warhol. This new edition corrects the many errors of the first, and is beautifully designed in a bright, Warholian palette with numerous illustrations.The British-born writer John Wilcock cofounded The Village Voice in 1955, and went on to edit seminal publications such as The East Village Other, Los Angeles Free Press, Other Scenes and (in 1970) Interview, with Andy Warhol. ', 28.56, '2010-07-19 23:03:29', 1, '51yw-ak9hgl.-ss400-.jpg');
INSERT INTO `products` VALUES(13, 'Inside The Actors Studio - Johnny Depp', 'In one of only a handful of interviews Johnny Depp has ever granted, he brings both his fascinating eccentricity and his deep, uncompromising devotion to the craft of acting to the master s degree candidates of the Actors Studio Drama School at Pace University and to the viewers of Inside the Actors Studio in 125 countries around the world. ', 18.54, '2010-07-19 23:13:48', 1, '41tvgoec72l.-ss500-.jpg');
INSERT INTO `products` VALUES(14, 'Miles, the Autobiography', 'Miles Davis, with all his faults, flaws and laughable quirks, was still one of the most important musicians of the twentieth century. It takes a book like this where he leaves no stone unturned to make clear the debt we all owe him and his contemporaries, as well as the restless spirit that lead him beyond what he helped to establish as modern jazz. In many ways he shows himself to be, ironically, the archetypal and sterotypical artist simultaneously. Yet his telling of the profound friendships he had with Max Roach and Coltrane, his deep awe and respect but dispassionate eye for the genius and addictions of Charlie Parker, the loves of his life- and what he put them through, and his brutal, courageous hoonesty in general, gives us a gift of his haunting humanity.', 9.68, '2010-07-19 23:19:08', 1, '41pw5c70m-l.-ss500-.jpg');
INSERT INTO `products` VALUES(16, 'Dali (Taschen Basic Art Series)', 'Surveys the life and work of the Surrealist artist, and describes how his artistic vision transformed great works from earlier periods in art history. ', 18.48, '2010-07-19 23:22:48', 3, '51xqyzh2hcl.-ss500-.jpg');
INSERT INTO `products` VALUES(17, 'Wicked Cool PHP: Real-World Scripts That Solve Difficult Problems', 'Wicked Cool PHP capitalizes on the success of the "Wicked Cool" series from No Starch Press. Rather than focus on the basics of the language, Wicked Cool PHP provides (and explains) PHP scripts that can be implemented immediately to simplify webmasters'' lives. These include unique scripts for processing credit cards, checking for valid email addresses, templating, overriding PHP''s default settings, and serving dynamic images and text. Readers will also find extensive sections on working with forms, words, and files; ways to harden PHP by closing common security holes; and instructions for keeping data and transactions secure. By exploring working code, readers learn how to customize their webserver''s behavior, prevent spammers from adding annoying comments, scrape information from other web sites, and much more. This is a book that''s sure to appeal to PHP programmers who have been there and done that and who want a book that delivers meaty content, not only promise.', 18.67, '2010-07-19 23:27:01', 2, '515htcskybl.-ss500-.jpg');
INSERT INTO `products` VALUES(18, 'PHP Objects, Patterns and Practice 3rd Edition', 'This book takes you beyond the PHP basics to the enterprise development practices used by professional programmers. Updated for PHP 5.3 with new sections on closures, namespaces, and continuous integration, this edition will teach you about object features such as abstract classes, reflection, interfaces, and error handling. You''ll also discover object tools to help you learn more about your classes, objects, and methods.\r\n\r\nThen you''ll move into design patterns and the principles that make patterns powerful. You''ll learn both classic design patterns and enterprise and database patterns with easy-to-follow examples.\r\n\r\nFinally, you''ll discover how to put it all into practice to help turn great code into successful projects. You''ll learn how to manage multiple developers with Subversion, and how to build and install using Phing and PEAR. You''ll also learn strategies for automated testing and building, including continuous integration.', 28.91, '2010-07-19 23:28:58', 2, '51s9-bneftl.-ss500-.jpg');
INSERT INTO `products` VALUES(19, '50 Artists You Should Know: From Giotto to Warhol', 'This vibrant reference guide profiles 50 major artists alongside their representative works. The entries are presented in an eye-catching format that includes brief biographies, time lines, and critical analyses. Additional information helps readers locate the artist''s work online and in museums, a glossary of important terms, and sidebars highlighting relevant movements and techniques. Arranged chronologically, the selection of artists includes every major artistic movement and development since the Gothic period, giving readers a clear understanding of the evolution of the visual arts. Perfect for casual reading or easy reference, this accessible overview is a fun and practical art history lesson that everyone can enjoy. ', 18.95, '2010-07-20 10:45:16', 3, '51c4k9pth4l.-ss500-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` VALUES(1, 'Pending');
INSERT INTO `statuses` VALUES(2, 'Processing');
INSERT INTO `statuses` VALUES(3, 'Dispatched');

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
