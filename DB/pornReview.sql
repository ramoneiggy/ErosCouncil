-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 06:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pornreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `isVisible` int(1) NOT NULL DEFAULT '1',
  `datePublished` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `personID`, `PageID`, `content`, `isVisible`, `datePublished`) VALUES
(1, 1, 5, 'best site 4eva!!1!', 1, '2018-05-19 18:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `pornpages`
--

CREATE TABLE `pornpages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(512) NOT NULL COMMENT 'Address',
  `images` varchar(512) NOT NULL COMMENT 'Address',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When we added it to our base',
  `isFeatured` int(1) NOT NULL,
  `addedByUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pornpages`
--

INSERT INTO `pornpages` (`id`, `name`, `url`, `description`, `logo`, `images`, `dateAdded`, `isFeatured`, `addedByUser`) VALUES
(1, 'Pornhub', 'https://www.Pornhub.com', 'Pornhub is a pornographic video sharing website and the largest pornography site on the Internet.[5][6] Pornhub was launched in Montreal, providing professional and amateur photography since 2007.[7] Pornhub also has offices and servers in San Francisco, Houston, New Orleans and London. In March 2010, Pornhub was bought by Manwin (now known as MindGeek), which owns numerous other pornographic websites.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', '2018-04-22 00:00:00', 1, 0),
(2, 'TubeGalore', 'https://www.tubegalore.com', 'If you search a large database of many millions of the best porn tubes. Then I have to tell you about Tube Galore. This website has almost all videos available out there floating around on the internet. Awesome right? I think so. The website has existed since 2007 and has done a lot of work to be among the top. And that is Tube Galore definitely succeeded. As the webmaster says himself, Tube Galore is a vortex! And I agree. I think if you are a porn lover, you definitely need to know this site. Because this is truly one of the best porn site whichcan be found on the Internet.', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', '2018-04-22 00:00:00', 0, 0),
(3, 'YouJizz', 'https://www.youjizz.com', 'Youjizz Porn Tube! Free porn movies and sex videos on your desktop or mobile phone.', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', '2018-04-22 00:00:00', 0, 0),
(4, 'YouPorn', 'https://www.youporn.com/', 'YouPorn is a free pornographic video sharing website and one of the 100 most accessed websites in the world. Since launching in August 2006, it grew to become the most popular pornographic website on the internet, and, in November 2007, it was reported to be the largest free pornographic website as well. As of February 2013, it was the 83rd most popular website overall and the fifth most popular pornographic website. In the category of pornographic websites, it was surpassed in the rankings by competitor sites xHamster, XVideos, and Pornhub, as well as the adult webcam site LiveJasmin.\r\n\r\nThis Web 2.0 (or Porn 2.0) site differs from many other pornographic websites in that it is completely free and ad-supported. One journalist reported that in May 2007 it generated a monthly ad revenue of $120,000 and that it was owned by Stephen Paul Jones.', 'https://fs.ypncdn.com/cb/bundles/youpornwebfront/images/l_youporn_black.png?v=95cad8c89d10f1b53a4b098ccd2effa2c45bd4db', 'https://fs.ypncdn.com/cb/bundles/youpornwebfront/images/l_youporn_black.png?v=95cad8c89d10f1b53a4b098ccd2effa2c45bd4db', '2018-05-04 00:00:00', 0, 0),
(5, 'xHamster', 'https://xhamster.com/', 'xHamster is a pornographic media and social networking site headquartered in Limassol, Cyprus.[1] xHamster serves user-submitted pornographic videos, webcam models, pornographic photographs, and erotic literature, and incorporates social networking features. xHamster was founded in 2007. With more than 10 million members, it is the third most popular pornography website on the Internet after XVideos and Pornhub.\r\n\r\nThe site produces The Sex Factor, a reality series in which men and women compete to become porn stars. The site has been targeted as part of malvertising campaigns, and various governments have blocked xHamster as part of larger initiatives against Internet pornography.', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1f/XHamster_logo_2016.svg/512px-XHamster_logo_2016.svg.png', 'https://en.wikipedia.org/wiki/XHamster#/media/File:XHamster_logo_2016.svg', '2018-04-22 00:00:00', 1, 0),
(6, 'xVideos', 'https://www.xvideos.com/', 'XVideos serves as a pornographic media aggregator, a type of website which gives access to adult content in a similar manner as YouTube does for general content.[6][7] Video clips from professional videos (sometimes pirated) are mixed with amateur and other types of content.[6][7] By 2012, XVideos was the largest adult website in the world, with over 4.4 billion page views per month.[8] Fabian Thylmann, the owner of MindGeek, attempted to purchase XVideos in 2012 in order to create a monopoly of pornographic tube sites. The French owner of XVideos turned down a reported offer of more than $120 million by saying, \"Sorry, I have to go and play Diablo II.\"[7] In 2014, XVideos controversially attempted to force content providers to either pledge to renounce the right to delete videos from their accounts or to shut down their accounts immediately.[9]', 'https://upload.wikimedia.org/wikipedia/commons/0/05/Xvideos.gif', 'https://upload.wikimedia.org/wikipedia/commons/0/05/Xvideos.gif', '2018-05-04 00:00:00', 0, 0),
(7, 'XNXX', 'https://www.xnxx.com/', '100% Free Porn Movies and Sex Content', 'https://static-hw.xvideos.com/v3/img/skins/xnxx/logo-xnxx.png', 'https://static-hw.xvideos.com/v3/img/skins/xnxx/logo-xnxx.png', '2018-05-04 00:00:00', 1, 0),
(8, 'HClips', 'https://www.hclips.com/', 'Magnificent porn tube website showing a wide array of HUD movies.', 'https://www.hclips.com/images/logo.png', 'https://www.hclips.com/images/logo.png', '2018-05-04 00:00:00', 0, 0),
(9, 'Porn', 'https://www.porn.com/', 'Top porn tube site sharing an incredible amount of top notch hardcore videos ranging among all the most popular porn niches.', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Porn.com_logo.svg', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Porn.com_logo.svg', '2018-05-04 00:00:00', 0, 0),
(10, 'TNAFlix', 'https://www.tnaflix.com', 'Amazing porn tube website showing thousand of hot porn videos.', 'https://www.tnaflix.com/images/mx.png', 'https://www.tnaflix.com/images/mx.png', '2018-05-04 00:00:00', 0, 0),
(11, 'Scoreland', 'http://www.scoreland.com', 'Score has launched the careers of some of the best known big-boobed beauties in the biz and it doesn\'t look as though they\'re slowing down the jugg parade any time soon. Watch these busty babes do their thing in HD downloads and steams. They add new content to their already impressive collection every day and everything they give you is exclusive and hot.', 'http://cdn.scoreuniverse.com/scoreland/images/free/new/logo_678x60.png', '', '2018-05-11 22:38:45', 1, 0),
(12, 'Nubiles', 'http://nubiles.net/', 'This great site stars hot babes who are very excited about being able to show you how they play with themselves - and some take the time to learn how to please a man. The sheer size of the library is mind-blowing and the quality does these sexy girls justice with Full HD footage. If you\'re looking for the ultimate teen porn experience, then jump right in! ', 'http://static.nubiles.net/assets/nubilesNet/images/logos_small_black/nubiles_small_logo_black.png', 'http://static.nubiles.net/assets/nubilesNet/images/logos_small_black/nubiles_small_logo_black.png', '2018-05-11 23:34:06', 1, 0),
(13, 'Brazzers', 'https://www.brazzersnetwork.com/', 'Busty teens, sexy MILFs, gorgeous pornstars... All of them get in on hardcore, with interracial sex, blowjobs, threesomes, orgies and so much more in thousands of high-quality videos. Everything you could ever want from an XXX network is here, so come and enjoy all the action from one of our favorite porn makers - and the production values are sky-high!', 'https://static-vz.brazzerscontent.com/bzv2/brazzerscom/tour/assets/common/img/logo/brazzers_network_logo.png', 'https://static-vz.brazzerscontent.com/bzv2/brazzerscom/tour/assets/common/img/logo/brazzers_network_logo.png', '2018-05-11 23:45:03', 1, 0),
(14, 'Watch My GF', 'https://www.watchmygf.me/', 'Various ex girlfriend videos', 'https://www.watchmygf.me/images/logo.png', 'https://www.watchmygf.me/images/logo.png', '2018-05-14 23:35:20', 0, 0),
(15, 'SpankBang', 'https://spankbang.com/', 'Good porn tube website featuring a wide array of hot videos', 'https://static.spankbang.com/static_desktop/Images/logo_desktop@2x.png?rev=4', 'https://static.spankbang.com/static_desktop/Images/logo_desktop@2x.png?rev=4', '2018-05-19 17:36:25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratingscore`
--

CREATE TABLE `ratingscore` (
  `id` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingscore`
--

INSERT INTO `ratingscore` (`id`, `personID`, `PageID`, `rating`) VALUES
(1, 1, 13, 3),
(2, 1, 8, 3),
(3, 1, 12, 2),
(4, 1, 9, 2),
(5, 1, 1, 4),
(6, 1, 11, 1),
(7, 1, 15, 3),
(8, 1, 10, 2),
(9, 1, 2, 3),
(10, 1, 14, 3),
(11, 1, 5, 5),
(12, 1, 7, 4),
(13, 1, 6, 4),
(14, 1, 3, 3),
(15, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sexual_orientation`
--

CREATE TABLE `sexual_orientation` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(50) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `sexual_orientation`
--

INSERT INTO `sexual_orientation` (`ID`, `TITLE`) VALUES
(1, 'heterosexual'),
(2, 'homosexual'),
(3, 'bisexual'),
(4, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `userfavorites`
--

CREATE TABLE `userfavorites` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `pornPageID` int(11) NOT NULL,
  `dateTimeAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(256) COLLATE utf8_bin NOT NULL,
  `dateOfBirth` date NOT NULL,
  `location` varchar(2) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `sexOrientation` int(11) NOT NULL DEFAULT '4',
  `user_email` varchar(256) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(100) COLLATE utf8_bin NOT NULL,
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_pwd` varchar(256) COLLATE utf8_bin NOT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `dateOfBirth`, `location`, `gender`, `sexOrientation`, `user_email`, `avatar`, `joined`, `user_pwd`, `isAdmin`) VALUES
(1, 'Iggy', '1985-02-06', 'HR', 'male', 1, 'ramoneiggy@gmail.com', 'uploads/profilePics/Iggy-1445597018-mikimaus.png', '2018-05-19 18:40:53', '$2y$10$1YU6tCn8JAyaGpi/VIL5je3idrhQBGwQr0/uAidGZ/jR3ss8Z3Qg.', 1),
(2, 'test', '1855-01-01', 'AL', 'other', 3, 'test@mail.com', 'uploads/profilePics/user-default.png', '2018-05-19 18:48:01', '$2y$10$NcBVtLTiO0bhnAgYYYm6SOx2NcASmQkX5tuDCFdxaFOmOszxXIu36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PageID` (`PageID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `pornpages`
--
ALTER TABLE `pornpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratingscore`
--
ALTER TABLE `ratingscore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PageID` (`PageID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `sexual_orientation`
--
ALTER TABLE `sexual_orientation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pornPageID` (`pornPageID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `sexOrientation` (`sexOrientation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pornpages`
--
ALTER TABLE `pornpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratingscore`
--
ALTER TABLE `ratingscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sexual_orientation`
--
ALTER TABLE `sexual_orientation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userfavorites`
--
ALTER TABLE `userfavorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pornpages` (`id`);

--
-- Constraints for table `ratingscore`
--
ALTER TABLE `ratingscore`
  ADD CONSTRAINT `ratingscore_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pornpages` (`id`),
  ADD CONSTRAINT `ratingscore_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD CONSTRAINT `userfavorites_ibfk_1` FOREIGN KEY (`pornPageID`) REFERENCES `pornpages` (`id`),
  ADD CONSTRAINT `userfavorites_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sexOrientation`) REFERENCES `sexual_orientation` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
