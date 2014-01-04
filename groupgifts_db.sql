-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2014 at 08:06 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `groupgifts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Hello World', 'Yahooooooo! We are the world, we are the children', 'blog_102213063620Xtr.jpg', '2013-10-21 22:36:20', '2013-10-23 16:57:51'),
(6, 'The Lorem Ipsumssss', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>', 'blog_102313233533lhr.jpg', '2013-11-22 15:35:36', '2013-10-23 16:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registry_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypaltrans_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contribution` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `registry_id`, `payment_type`, `paypaltrans_id`, `payer_id`, `first_name`, `last_name`, `contribution`, `created_at`, `updated_at`) VALUES
(1, '4', 'credit_card', 'PAY-8YE85502YB451715FKKP4TPA', '', 'Moja', 'Co', 10.36, '2013-12-04 16:33:25', '2013-12-04 16:33:25'),
(2, '4', 'credit_card', 'PAY-9E838169N51695801KKP4WFA', '', 'Moja', 'Co', 10.36, '2013-12-04 16:39:11', '2013-12-04 16:39:11'),
(3, '4', 'paypal', 'PAY-9WB33900A4737054GKKP5DSQ', 'MTDSYLWGURFAN', 'Vyl', 'FakeTumz', 50.50, '2013-12-04 17:07:45', '2013-12-04 17:07:45'),
(4, '4', 'paypal', 'PAY-57B6684273022635JKKXKUFI', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 500.00, '2013-12-15 23:22:38', '2013-12-15 23:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country`, `region`) VALUES
(1, 'Australia', 'Middle East & Asia Pacific'),
(2, 'Aland Islands', 'Europe'),
(3, 'Albania', 'Europe'),
(4, 'Algeria', 'Africa'),
(5, 'American Samoa', 'Middle East & Asia Pacific'),
(6, 'Andorra', 'Europe'),
(7, 'Angola', 'Africa'),
(8, 'Anguilla', 'Central & South America'),
(9, 'Antarctica', 'Central & South America'),
(10, 'Antigua and Barbuda', 'Central & South America'),
(11, 'Argentina', 'Central & South America'),
(12, 'Armenia', 'Middle East & Asia Pacific'),
(13, 'Aruba', 'Central & South America'),
(14, 'Afghanistan', 'Middle East & Asia Pacific'),
(15, 'Austria', 'Europe'),
(16, 'Azerbaijan', 'Middle East & Asia Pacific'),
(17, 'Bahamas', 'Central & South America'),
(18, 'Bahrain', 'Middle East & Asia Pacific'),
(19, 'Bangladesh', 'Middle East & Asia Pacific'),
(20, 'Barbados', 'Central & South America'),
(21, 'Belarus', 'Middle East & Asia Pacific'),
(22, 'Belgium', 'Europe'),
(23, 'Belize', 'Central & South America'),
(24, 'Benin', 'Africa'),
(25, 'Bermuda', 'Central & South America'),
(26, 'Bhutan', 'Middle East & Asia Pacific'),
(27, 'Bolivia', 'Central & South America'),
(28, 'Bonaire', 'Central & South America'),
(29, 'Bosnia and Herzegovina', 'Europe'),
(30, 'Botswana', 'Africa'),
(31, 'Bouvet Island', 'Central & South America'),
(32, 'Brazil', 'Central & South America'),
(33, 'British Indian Ocean Territory', 'Middle East & Asia Pacific'),
(34, 'Brunei Darussalam', 'Middle East & Asia Pacific'),
(35, 'Bulgaria', 'Europe'),
(36, 'Burkina Faso', 'Africa'),
(37, 'Burundi', 'Africa'),
(38, 'Cambodia', 'Middle East & Asia Pacific'),
(39, 'Cameroon', 'Africa'),
(40, 'Canada', 'North America'),
(41, 'Cape Verde', 'Africa'),
(42, 'Cayman Islands', 'Central & South America'),
(43, 'Central African Republic', 'Africa'),
(44, 'Chad', 'Africa'),
(45, 'Chile', 'Central & South America'),
(46, 'China', 'Middle East & Asia Pacific'),
(47, 'Christmas Island', 'Middle East & Asia Pacific'),
(48, 'Clipperton Island', 'Europe'),
(49, 'Cocos (Keeling) Islands', 'Middle East & Asia Pacific'),
(50, 'Colombia', 'Central & South America'),
(51, 'Comoros', 'Africa'),
(52, 'Congo', 'Africa'),
(53, 'Congo', 'Africa'),
(54, 'Cook Islands', 'Middle East & Asia Pacific'),
(55, 'Costa Rica', 'Central & South America'),
(56, 'Cote d Ivoire', 'Africa'),
(57, 'Croatia', 'Europe'),
(58, 'Cuba', 'Central & South America'),
(59, 'Curacao', 'Central & South America'),
(60, 'Cyprus', 'Europe'),
(61, 'Czech Republic', 'Europe'),
(62, 'Denmark', 'Europe'),
(63, 'Disputed Territory', 'Middle East & Asia Pacific'),
(64, 'Djibouti', 'Africa'),
(65, 'Dominica', 'Central & South America'),
(66, 'Dominican Republic', 'Central & South America'),
(67, 'Ecuador', 'Central & South America'),
(68, 'Egypt', 'Africa'),
(69, 'El Salvador', 'Central & South America'),
(70, 'Equatorial Guinea', 'Africa'),
(71, 'Eritrea', 'Africa'),
(72, 'Estonia', 'Europe'),
(73, 'Ethiopia', 'Africa'),
(74, 'Falkland Islands (Malvinas)', 'Central & South America'),
(75, 'Faroe Islands', 'Europe'),
(76, 'Fiji', 'Middle East & Asia Pacific'),
(77, 'Finland', 'Europe'),
(78, 'France', 'Europe'),
(79, 'French Guiana', 'Central & South America'),
(80, 'French Polynesia', 'Middle East & Asia Pacific'),
(81, 'French Southern Territories', 'Central & South America'),
(82, 'Gabon', 'Africa'),
(83, 'Gambia', 'Africa'),
(84, 'Georgia', 'Middle East & Asia Pacific'),
(85, 'Germany', 'Europe'),
(86, 'Ghana', 'Africa'),
(87, 'Gibraltar', 'Europe'),
(88, 'Greece', 'Europe'),
(89, 'Greenland', 'Europe'),
(90, 'Grenada', 'Central & South America'),
(91, 'Guadeloupe', 'Central & South America'),
(92, 'Guam', 'Middle East & Asia Pacific'),
(93, 'Guatemala', 'Central & South America'),
(94, 'Guernsey', 'Europe'),
(95, 'Guinea', 'Africa'),
(96, 'Guinea-Bissau', 'Africa'),
(97, 'Guyana', 'Central & South America'),
(98, 'Haiti', 'Central & South America'),
(99, 'Heard Island and McDonald Islands', 'Central & South America'),
(100, 'Holy See (Vatican City State)', 'Europe'),
(101, 'Honduras', 'Central & South America'),
(102, 'Hong Kong', 'Middle East & Asia Pacific'),
(103, 'Hungary', 'Europe'),
(104, 'Iceland', 'Europe'),
(105, 'India', 'Middle East & Asia Pacific'),
(106, 'Indonesia', 'Middle East & Asia Pacific'),
(107, 'Islamic Republic of Iran', 'Middle East & Asia Pacific'),
(108, 'Iraq', 'Middle East & Asia Pacific'),
(109, 'Ireland', 'Europe'),
(110, 'Isle of Man', 'Europe'),
(111, 'Israel', 'Middle East & Asia Pacific'),
(112, 'Italy', 'Europe'),
(113, 'Jamaica', 'Central & South America'),
(114, 'Japan', 'Middle East & Asia Pacific'),
(115, 'Jersey', 'Europe'),
(116, 'Jordan', 'Middle East & Asia Pacific'),
(117, 'Kazakhstan', 'Middle East & Asia Pacific'),
(118, 'Kenya', 'Africa'),
(119, 'Kiribati', 'Middle East & Asia Pacific'),
(120, 'Democratic Peoples Republic of Korea', 'Middle East & Asia Pacific'),
(121, 'Republic of Korea', 'Middle East & Asia Pacific'),
(122, 'Kuwait', 'Middle East & Asia Pacific'),
(123, 'Kyrgyzstan', 'Middle East & Asia Pacific'),
(124, 'Lao Peoples Democratic Republic', 'Middle East & Asia Pacific'),
(125, 'Latvia', 'Europe'),
(126, 'Lebanon', 'Middle East & Asia Pacific'),
(127, 'Lesotho', 'Africa'),
(128, 'Liberia', 'Africa'),
(129, 'Libya', 'Africa'),
(130, 'Liechtenstein', 'Europe'),
(131, 'Lithuania', 'Europe'),
(132, 'Luxembourg', 'Europe'),
(133, 'Macao', 'Middle East & Asia Pacific'),
(134, 'Macedonia', 'Europe'),
(135, 'Madagascar', 'Africa'),
(136, 'Malawi', 'Africa'),
(137, 'Malaysia', 'Middle East & Asia Pacific'),
(138, 'Maldives', 'Middle East & Asia Pacific'),
(139, 'Mali', 'Africa'),
(140, 'Malta', 'Europe'),
(141, 'Marshall Islands', 'Middle East & Asia Pacific'),
(142, 'Martinique', 'Central & South America'),
(143, 'Mauritania', 'Africa'),
(144, 'Mauritius', 'Africa'),
(145, 'Mayotte', 'Africa'),
(146, 'Mexico', 'Central & South America'),
(147, 'Micronesia', 'Middle East & Asia Pacific'),
(148, 'Moldova', 'Middle East & Asia Pacific'),
(149, 'Monaco', 'Europe'),
(150, 'Mongolia', 'Middle East & Asia Pacific'),
(151, 'Montenegro', 'Europe'),
(152, 'Montserrat', 'Central & South America'),
(153, 'Morocco', 'Africa'),
(154, 'Mozambique', 'Africa'),
(155, 'Myanmar', 'Middle East & Asia Pacific'),
(156, 'Namibia', 'Africa'),
(157, 'Nauru', 'Middle East & Asia Pacific'),
(158, 'Nepal', 'Middle East & Asia Pacific'),
(159, 'Netherlands', 'Europe'),
(160, 'New Caledonia', 'Middle East & Asia Pacific'),
(161, 'New Zealand', 'Middle East & Asia Pacific'),
(162, 'Nicaragua', 'Central & South America'),
(163, 'Niger', 'Africa'),
(164, 'Nigeria', 'Africa'),
(165, 'Niue', 'Middle East & Asia Pacific'),
(166, 'Norfolk Island', 'Middle East & Asia Pacific'),
(167, 'Northern Mariana Islands', 'Middle East & Asia Pacific'),
(168, 'Norway', 'Europe'),
(169, 'Oman', 'Middle East & Asia Pacific'),
(170, 'Pakistan', 'Middle East & Asia Pacific'),
(171, 'Palau', 'Middle East & Asia Pacific'),
(172, 'Occupied Palestinian Territory', 'Middle East & Asia Pacific'),
(173, 'Panama', 'Central & South America'),
(174, 'Papua New Guinea', 'Middle East & Asia Pacific'),
(175, 'Paraguay', 'Central & South America'),
(176, 'Peru', 'Central & South America'),
(177, 'Philippines', 'Middle East & Asia Pacific'),
(178, 'Pitcairn', 'Middle East & Asia Pacific'),
(179, 'Poland', 'Europe'),
(180, 'Portugal', 'Europe'),
(181, 'Puerto Rico', 'Central & South America'),
(182, 'Qatar', 'Middle East & Asia Pacific'),
(183, 'Reunion', 'Africa'),
(184, 'Romania', 'Europe'),
(185, 'Russian Federation', 'Middle East & Asia Pacific'),
(186, 'Rwanda', 'Africa'),
(187, 'Saint Bathelemy', 'Central & South America'),
(188, 'Saint Helena', 'Africa'),
(189, 'Saint Kitts and Nevis', 'Central & South America'),
(190, 'Saint Lucia', 'Central & South America'),
(191, 'Saint Martin (French Part)', 'Central & South America'),
(192, 'Saint Pierre and Miquelon', 'North America'),
(193, 'Saint Vincent and the Grenadines', 'Central & South America'),
(194, 'Samoa', 'Middle East & Asia Pacific'),
(195, 'San Marino', 'Europe'),
(196, 'Sao Tome and Principe', 'Africa'),
(197, 'Saudi Arabia', 'Middle East & Asia Pacific'),
(198, 'Senegal', 'Africa'),
(199, 'Serbia', 'Europe'),
(200, 'Seychelles', 'Africa'),
(201, 'Sierra Leone', 'Africa'),
(202, 'Singapore', 'Middle East & Asia Pacific'),
(203, 'Slovakia', 'Europe'),
(204, 'Slovenia', 'Europe'),
(205, 'Solomon Islands', 'Middle East & Asia Pacific'),
(206, 'Somalia', 'Africa'),
(207, 'South Africa', 'Africa'),
(208, 'South Georgia and the South Sandwich Islands', 'Central & South America'),
(209, 'South Sudan', 'Africa'),
(210, 'Spain', 'Europe'),
(211, 'Sri Lanka', 'Middle East & Asia Pacific'),
(212, 'Sudan', 'Africa'),
(213, 'Suriname', 'Central & South America'),
(214, 'Svalbard and Jan Mayen', 'Europe'),
(215, 'Swaziland', 'Africa'),
(216, 'Sweden', 'Europe'),
(217, 'Switzerland', 'Europe'),
(218, 'Syrian Arab Republic', 'Middle East & Asia Pacific'),
(219, 'Taiwan', 'Middle East & Asia Pacific'),
(220, 'Tajikistan', 'Middle East & Asia Pacific'),
(221, 'Tanzania', 'Africa'),
(222, 'Thailand', 'Middle East & Asia Pacific'),
(223, 'Timor-Leste', 'Middle East & Asia Pacific'),
(224, 'Togo', 'Africa'),
(225, 'Tokelau', 'Middle East & Asia Pacific'),
(226, 'Tonga', 'Middle East & Asia Pacific'),
(227, 'Trinidad and Tobago', 'Central & South America'),
(228, 'Tunisia', 'Africa'),
(229, 'Turkey', 'Europe'),
(230, 'Turkmenistan', 'Middle East & Asia Pacific'),
(231, 'Turks and Caicos Islands', 'Central & South America'),
(232, 'Tuvalu', 'Middle East & Asia Pacific'),
(233, 'Uganda', 'Africa'),
(234, 'Ukraine', 'Middle East & Asia Pacific'),
(235, 'United Arab Emirates', 'Middle East & Asia Pacific'),
(236, 'United Kingdom', 'Europe'),
(237, 'United States', 'North America'),
(238, 'United States Minor Outlying Islands', 'Middle East & Asia Pacific'),
(239, 'Uruguay', 'Central & South America'),
(240, 'Uzbekistan', 'Middle East & Asia Pacific'),
(241, 'Vanuatu', 'Middle East & Asia Pacific'),
(242, 'Venezuela', 'Central & South America'),
(243, 'Viet Nam', 'Middle East & Asia Pacific'),
(244, 'Virgin Islands - British', 'Central & South America'),
(245, 'Virgin Islands - U.S.', 'Central & South America'),
(246, 'Wallis and Futuna', 'Middle East & Asia Pacific'),
(247, 'Western Sahara', 'Africa'),
(248, 'Yemen', 'Middle East & Asia Pacific'),
(249, 'Zambia', 'Africa'),
(250, 'Zimbabwe', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `gift-certificates`
--

CREATE TABLE IF NOT EXISTS `gift-certificates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gift-certificates`
--

INSERT INTO `gift-certificates` (`id`, `gc_name`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Gift Certificate Cute', 12.36, '2013-11-07 17:14:10', '2013-11-07 17:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `giftcerts-code`
--

CREATE TABLE IF NOT EXISTS `giftcerts-code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gc_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `giftcerts-code`
--

INSERT INTO `giftcerts-code` (`id`, `user_id`, `gc_id`, `code`, `available`, `created_at`, `updated_at`) VALUES
(1, '15', '2', '20131226-b9a6QKtw-150', 1, '2013-12-26 00:03:30', '2013-12-26 00:03:30'),
(2, '15', '2', '20131226-TY9DhX2x-151', 1, '2013-12-26 00:03:30', '2013-12-26 00:03:30'),
(3, '15', '2', '20131226-wLmGeMDA-152', 1, '2013-12-26 00:03:30', '2013-12-26 00:03:30'),
(4, '15', '2', '20131226-OhEz5aOg-153', 1, '2013-12-26 00:03:30', '2013-12-26 00:03:30'),
(5, '15', '2', '20131226-jZnaKRHD-154', 1, '2013-12-26 00:03:30', '2013-12-26 00:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'New User', 'Name: Lyra Programmer<br/>Email: jane@mindblowideas.com', '2013-08-07 16:47:44', '2013-08-07 16:47:44'),
(3, 'New User', 'Name: Paula Programmer<br/>Email: paula@mindblowideas.com', '2013-08-07 16:54:22', '2013-08-07 16:54:22'),
(4, 'New User', 'Name: Krystle Pagalilauan<br/>Email: kpagalilauan@yahoo.com', '2013-11-17 19:48:58', '2013-11-17 19:48:58'),
(5, 'New User', 'Name: Moja Co<br/>Email: moja@yahoo.com', '2013-11-17 20:35:48', '2013-11-17 20:35:48'),
(6, 'New User', 'Name: Banung Jety<br/>Email: luffy@one-piece.com', '2013-12-22 21:40:05', '2013-12-22 21:40:05'),
(7, 'New User: <b>lyrajane.bonaog</b>', 'New account was created for  [login with FACEBOOK]', '2013-12-23 02:29:22', '2013-12-23 02:29:22'),
(8, 'New User: <b>lyrajane.bonaog</b>', 'New account was created for  [login with FACEBOOK]', '2013-12-23 16:40:10', '2013-12-23 16:40:10'),
(9, 'New User: <b>lyrajane.bonaog</b>', 'New account was created for  [login with FACEBOOK]', '2013-12-23 16:42:00', '2013-12-23 16:42:00'),
(10, 'New User: <b>lyrajane.bonaog</b>', 'New account was created for  [login with FACEBOOK]', '2013-12-25 21:02:19', '2013-12-25 21:02:19'),
(11, 'Admin Updated', 'Username: Administrator1 Adminstrator<br/>Email: sa@user.admin', '2014-01-03 23:01:02', '2014-01-03 23:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `invited-contributors`
--

CREATE TABLE IF NOT EXISTS `invited-contributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registry_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invited-contributors`
--

INSERT INTO `invited-contributors` (`id`, `name`, `email`, `registry_id`, `created_at`, `updated_at`) VALUES
(1, 'Jane Erese', 'jane@mindblowideas.com', '4', '2013-12-23 21:34:22', '2013-12-23 21:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `location-product`
--

CREATE TABLE IF NOT EXISTS `location-product` (
  `lp_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(225) NOT NULL,
  `product_id` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=330 ;

--
-- Dumping data for table `location-product`
--

INSERT INTO `location-product` (`lp_id`, `location`, `product_id`, `created_at`) VALUES
(312, 'New South Wales', '18', '2013-09-18 06:29:01'),
(313, 'Victoria', '18', '2013-09-18 06:29:01'),
(314, 'Western Australia', '19', '2013-09-18 06:29:12'),
(315, 'Northern Territory', '19', '2013-09-18 06:29:12'),
(316, 'New South Wales', '21', '2013-09-19 05:57:38'),
(317, 'Victoria', '21', '2013-09-19 05:57:38'),
(318, 'Queensland', '21', '2013-09-19 05:57:38'),
(319, 'Western Australia', '21', '2013-09-19 05:57:38'),
(320, 'South Australia', '21', '2013-09-19 05:57:38'),
(321, 'Australian Capital Territory', '21', '2013-09-19 05:57:38'),
(322, 'Tasmania', '21', '2013-09-19 05:57:38'),
(323, 'Northern Territory', '21', '2013-09-19 05:57:38'),
(328, 'New South Wales', '1', '2013-12-28 01:57:47'),
(329, 'Victoria', '1', '2013-12-28 01:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_06_14_074911_create_newsletter_table', 1),
('2013_06_15_071115_create_users_tbl', 1),
('2013_07_31_044440_create_pages_table', 2),
('2013_08_07_225449_createhistorytbl', 3),
('2013_08_09_061217_createproducsttble', 4),
('2013_08_12_223131_createOccasionsTable', 5),
('2013_08_12_223432_createOccasiontypetable', 5),
('2013_08_29_031334_createregistrytable', 6),
('2013_10_05_064719_createWishlisttbl', 7),
('2013_10_17_035330_createRatetable', 8),
('2013_10_21_013059_createBlogtable', 9),
('2013_11_07_041608_createGiftCertTable', 10),
('2013_11_21_233810_createOrderTable', 11),
('2013_11_21_235805_createORderProdTable', 12),
('2013_12_04_235408_createContributionTable', 13),
('2013_12_24_034010_createContriTable', 14),
('2013_12_26_060159_creteGiftCertcodes', 15);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'orvyl@mindblowideas.com', '2013-08-02 20:56:54', '2013-08-02 20:56:54'),
(5, 'jane@mindblowideas.com', '2013-08-07 16:02:36', '2013-08-07 16:02:36'),
(7, 'paula@mindblowideas.com', '2013-08-07 16:54:21', '2013-08-07 16:54:21'),
(8, 'orvyl.t@gmail.com', '2013-12-10 18:01:52', '2013-12-10 18:01:52'),
(9, 'luffy@one-piece.com', '2013-12-22 21:40:05', '2013-12-22 21:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `details`, `type`, `done`, `created_at`, `updated_at`) VALUES
(2, '3', 'First Note', 'This is the detail of my first note.', 'uAlert', 0, '2013-07-06 00:59:33', '2013-07-11 22:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `occasion-types`
--

CREATE TABLE IF NOT EXISTS `occasion-types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `occasion_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `occasion-types`
--

INSERT INTO `occasion-types` (`id`, `occasion_type`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Birthday Gifts', 'Sending the right birthday gift will make your loved one''s day all the more special. Go ahead and pick up the ideal virtual birthday gift from our collection of fun', 1, '2013-08-12 15:08:10', '2013-12-09 17:47:38'),
(5, 'Gift Occasions', 'Give gift always!', 2, '2013-08-12 20:45:43', '2013-12-09 17:49:19'),
(6, 'Wedding', 'Wedding time :)', 0, '2013-12-09 17:52:56', '2013-12-09 17:52:56'),
(7, 'Engagement', 'Engagement party!', 0, '2013-12-09 19:23:40', '2013-12-09 19:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE IF NOT EXISTS `occasions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `occasion_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occasion_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `occasion_name`, `occasion_type`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Baby Birthday', '1', 1, '2013-08-12 15:07:14', '2013-12-09 19:25:46'),
(2, '18th Birthday', '1', 2, '2013-09-17 19:32:54', '2013-12-09 19:25:46'),
(3, '60th Birthday', '1', 6, '2013-09-17 19:34:09', '2013-12-09 19:25:46'),
(4, '21st Birthday', '1', 4, '2013-09-17 19:34:31', '2013-12-09 19:25:46'),
(5, '25th Birthday', '1', 5, '2013-09-17 19:37:59', '2013-12-09 19:25:46'),
(7, 'Anniversary', '5', 1, '2013-09-17 19:38:59', '2013-09-17 20:13:41'),
(8, 'Bucks Party', '5', 1, '2013-12-09 17:50:32', '2013-12-09 17:50:32'),
(9, 'Hens Party', '5', 2, '2013-12-09 17:50:45', '2013-12-09 17:50:45'),
(10, 'Bar & Bat Mitzvah', '5', 3, '2013-12-09 17:51:08', '2013-12-09 17:51:08'),
(11, 'Holidays', '5', 4, '2013-12-09 17:51:18', '2013-12-09 17:51:18'),
(12, 'Father''s Day', '5', 5, '2013-12-09 17:51:33', '2013-12-09 17:51:33'),
(13, 'Mother''s Day', '5', 6, '2013-12-09 17:51:44', '2013-12-09 17:51:44'),
(14, 'Engagement', '6', 0, '2013-12-09 17:53:06', '2013-12-09 17:53:06'),
(15, 'Wedding', '6', 1, '2013-12-09 17:53:20', '2013-12-09 17:53:20'),
(16, 'Honeymoon', '6', 2, '2013-12-09 17:53:39', '2013-12-09 17:53:39'),
(17, 'Wedding Registry', '6', 3, '2013-12-09 19:21:51', '2013-12-09 19:21:51'),
(18, 'Gateways', '6', 4, '2013-12-09 19:22:00', '2013-12-09 19:22:00'),
(19, 'Thank You', '7', 0, '2013-12-09 19:23:50', '2013-12-09 19:23:50'),
(20, 'Congratulations', '7', 1, '2013-12-09 19:24:04', '2013-12-09 19:24:04'),
(21, 'Promotion', '7', 2, '2013-12-09 19:24:15', '2013-12-09 19:24:15'),
(22, 'Retirement', '7', 3, '2013-12-09 19:24:23', '2013-12-09 19:24:23'),
(23, 'New Job', '7', 4, '2013-12-09 19:24:30', '2013-12-09 19:24:30'),
(24, 'Debut', '1', 3, '2013-12-09 19:25:12', '2013-12-09 19:25:46'),
(25, '80th Birthday', '1', 6, '2013-12-09 19:26:28', '2013-12-09 19:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `order-products`
--

CREATE TABLE IF NOT EXISTS `order-products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id_ref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `order-products`
--

INSERT INTO `order-products` (`id`, `order_id`, `product_id_ref`, `product_name`, `price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(5, '6', '21', 'Stress ball', 85.36, 1, 85.36, '2013-11-21 20:23:22', '2013-11-21 20:23:22'),
(6, '7', '21', 'Stress ball', 85.36, 1, 85.36, '2013-11-22 18:10:06', '2013-11-22 18:10:06'),
(7, '7', 'gc_2', 'Gift Cert: Gift Certificate Cute', 12.36, 1, 12.36, '2013-11-22 18:10:06', '2013-11-22 18:10:06'),
(8, '8', '19', 'Wrist Watch Coolness', 84.36, 1, 84.36, '2013-11-28 17:55:48', '2013-11-28 17:55:48'),
(9, '9', '21', 'Stress ball', 85.36, 1, 85.36, '2013-12-09 20:18:36', '2013-12-09 20:18:36'),
(10, '9', 'gc_2', 'Gift Cert: Gift Certificate Cute', 12.36, 1, 12.36, '2013-12-09 20:18:36', '2013-12-09 20:18:36'),
(11, '10', '21', 'Stress ball', 85.36, 6, 512.16, '2013-12-22 21:43:21', '2013-12-22 21:43:21'),
(12, '11', '21', 'Stress ball', 85.36, 1, 85.36, '2013-12-25 21:29:49', '2013-12-25 21:29:49'),
(13, '11', 'gc_2', 'Gift Cert: Gift Certificate Cute', 12.36, 1, 12.36, '2013-12-25 21:29:49', '2013-12-25 21:29:49'),
(14, '13', '21', 'Stress ball', 85.36, 1, 85.36, '2013-12-26 00:01:28', '2013-12-26 00:01:28'),
(15, '14', '21', 'Stress ball', 85.36, 1, 85.36, '2013-12-26 00:03:30', '2013-12-26 00:03:30'),
(16, '14', 'gc_2', 'Gift Cert: Gift Certificate Cute', 12.36, 5, 61.80, '2013-12-26 00:03:30', '2013-12-26 00:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypaltrans_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `voucher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_credit` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `paypaltrans_id`, `payer_id`, `first_name`, `last_name`, `total`, `voucher`, `store_credit`, `created_at`, `updated_at`) VALUES
(6, '3', 'paypal', 'PAY-79J38771NR7567816KKHNYJQ', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 65.36, '', 20.00, '2013-11-21 20:23:22', '2013-11-21 20:23:22'),
(7, '3', 'credit_card', 'PAY-8D8497527T462400EKKIA46Q', '', 'Orvyl1', 'Tumaneng', 77.72, '', 20.00, '2013-11-22 18:10:06', '2013-11-22 18:10:06'),
(8, '10', 'paypal', 'PAY-3YT280130U0240823KKL7HZI', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 84.36, '', 20.00, '2013-11-28 17:55:48', '2013-11-28 17:55:48'),
(9, '10', 'paypal', 'PAY-0RB910832X746790KKKTJLZQ', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 97.72, '', 20.00, '2013-12-09 20:18:36', '2013-12-09 20:18:36'),
(10, '11', 'paypal', 'PAY-26993303MT279592FKK342AA', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 512.16, '', 20.00, '2013-12-22 21:43:21', '2013-12-22 21:43:21'),
(11, '15', 'paypal', 'PAY-1RS54629UE2288532KK535LA', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 97.72, '', 20.00, '2013-12-25 21:29:49', '2013-12-25 21:29:49'),
(12, '15', 'paypal', 'PAY-4F496599DW901945CKK56DQQ', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 147.16, '', 20.00, '2013-12-25 23:59:45', '2013-12-25 23:59:45'),
(13, '15', 'paypal', 'PAY-0JY18837XA0875626KK56EPQ', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 147.16, '', 20.00, '2013-12-26 00:01:28', '2013-12-26 00:01:28'),
(14, '15', 'paypal', 'PAY-328726326X0340700KK56FPA', 'G9DCJ89SFXBD4', 'Buyer', 'Mindblow', 147.16, '', 20.00, '2013-12-26 00:03:30', '2013-12-26 00:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'How it works', '<div class="help">\n		<h1>How it works</h1>\n		<h5>So you know that annoying moment when you have to organise a group present? It generally begins with an email starting what you know will be a painstakingly long lasting email chain of back and forth emails on what to get them. Who is going to organise it? What are we expected to put in? When do we need this present by? Or perhaps you look forward to the really awesome process of chasing everybody for money for a gift that they said would contribute to, and you have already paid for. </h5>\n		<h5>Well no more! </h5>\n		<h5>We are introducing a new way of managing the group gifting process so you no longer have to chase everybody up. Here’s how it works.</h5>\n	</div>\n	<div class="how-it-works works-bg">\n		<div class="how-inner-steps present-img">\n			<div class="how-holder content-gifts top-present">\n				<p>Find the <span>PRESENT </span>you are looking for</p>\n				<div class="first"></div>\n			</div>\n		</div>\n		<div class="how-inner-steps people-img">\n			<div class="how-holder content-gifts1">\n				<p>Decide <span>HOW MANY PEOPLE</span> are going to put in your gift</p>\n				<div class="second"></div>\n			</div>\n		</div>\n		<div class="how-inner-steps make-payment-img">\n			<div class="how-holder content-gifts">\n				<p><span>MAKE YOUR PAYMENT</span> and the other parties involved will be notified automatically</p>\n				<div class="first"></div>\n			</div>\n		</div>\n		<div class="how-inner-steps gifts-img">\n			<div class="how-holder content-gifts2">\n				<p><span>MANAGE</span> the <span>GROUP GIFTING</span> process using our specifically built portal</p>\n				<div class="second"></div>\n			</div>\n		</div>\n		<div class="how-inner-steps purcahse-gifts-img">\n			<div class="how-holder content-gifts bottom-img">\n				<p><span>gift purchased</span> and on its way to your preferred delivery address</p>\n				<div class="third"></div>\n			</div>\n		</div>\n	</div>', '2013-07-30 20:11:23', '2013-08-03 00:34:34'),
(2, 'About Us', '<p>Group Gifts is changing the way Australians buy group presents.  We have built a portal to make managing present buying for any occasion simple. Group Gifts aim is to take the difficulty out of managing group presents by allowing all parties to pay separately and easily.  Better still, if you know what you want you can send people a link to contribute to your gift!</p>\r\n			<p>The idea came to our founder Richard after he had spent many afternoons emailing, discussing, and organising his friends’ to contribute towards a birthday present. </p>\r\n			<p>Not only did Richard have to outlay all the cash to buy the present, he then had to spend many afternoons chasing up people for payments, organising delivery and creating spreadsheets to manage the whole process</p>\r\n			<p>He decided to come up with a way that allowed gifts for any occasion to be easily shared, managed and paid for. The Group Gifts mission is to make the gifting process as easy as people for all parties involved, no matter what the occasion.</p>', '2013-08-01 18:13:10', '2013-08-01 18:13:10'),
(3, 'Privacy Policy', '<h1>Privacy Policies</h1>\n		<div class="privacy">\n			<h3>Group Gifts does</h3>\n			<p>Group Gifts is a portal for allowing group multiples users purchase towards a gift accessible through the domain <a href=" http://groupgifts.com.au"> www.groupgifts.com.au .</a></p>\n			<p>In this Policy, “we”, “our” and “us” or refers to Group Gifts.</p>\n			<p>This Privacy Statement outlines how we manage and handle the personal information provided by you through the Website, mobile site and Group Gifts. By using our website or mobile website, you accept this Privacy Statement and expressly consent to our collection, use and disclosure of your personal information. </p>\n			<p>This Privacy Policy incorporates the National Privacy Principles <strong>(NPPs)</strong> contained in the Privacy Act 1988 (CTH) <strong>(Privacy Act)</strong> and we acknowledge that we are obligated to comply with these laws. </p>\n			<ol>\n				<li>\n					<h3>1. Collection</h3>\n					<h3>1.1	What information do we collect? </h3>\n					<p><strong>‘Personal information’</strong> is information or an opinion relating to an individual which can be used to identify that individual. In order to provide our services to you, we may collect and store your personal information. We will only collect your Personal Information in accordance with the NPPs by lawful and fair means, without unreasonable intrusiveness and only where necessary for activities relating to the provision of our services to you (Primary Purpose). Examples of Personal Information collected directly from you may include your name, work, family’s details, location, date of birth, marital status, email address and contact details. </p>\n					<p>Situation where we may use your personal information include:</p>\n					<p>•	On the Group Gifts system or social networking sites</p>\n					<p>•	To provide you with marketing communication. Please inform us if you do not wish to receive marketing communication from us and we will take steps to remove your from these campaigns.</p>\n					<p>When you visit our website www.groupgfits.com.au we may automatically collect information about you – including details of access, IP address, web statistics and other information which is required to ensure that the site is functioning properly.</p>\n				</li>\n				<li>\n					<h3>1.2	Cookies</h3>\n					<p>When you visit our website or mobile site, the server may attach “a cookie” to your computer’s memory.  A “cookie” assists us to store information about how visitors to our website or mobile site use it and to make assumptions about what information may be of most interest to you. However, this information is not linked to any Personal Information you may provide and cannot be used to identify you. You should be able to configure your computer so that it disables “cookies” or does not accept them. </p>							\n				</li>\n				<li>\n					<h3>2.	Uses  and disclosure</h3>\n					<p>We will only use and disclose your personal information for the Primary Purpose for which it was collected and for reasonably expected secondary purposes (related to primary purposes). However, we may also use and disclose your personal information in other circumstances permitted by the Privacy Act.</p>\n					<h3>2.1	Do we disclose your information to Third Parties?</h3>\n					<p>We do not sell trade or otherwise transfer your personal information to third parties except where necessary to provide you with our services (e.g. delivery details) or where required by law. If we do disclose your personal information to third parties, we will take all reasonable steps to ensure that those third parties comply with the NPPs when handling your personal information, regardless of whether they are required to do so by law.</p>\n					<p>Some of your personal information collected will be used to identify potential commercial offers or opportunities which may be attractive to you. We source such offers and opportunities from third parties, but information regarding any offers will be communicated to you directly by us.</p>\n					<p>Our website, mobile site may direct you to websites operated by third parties including Facebook and other social media sites (Linked Sites). We are not responsible for the content or practices of the Linked Sites or their privacy policies regarding collection, storage, use and dissemination of your personal information. We encourage you to already read the applicable privacy statement of any Linked Site before using it.</p>														\n				</li>\n				<li>\n					<h3>3.	Data Quality</h3>\n					<p>We will take reasonable steps to ensure that any of your personal information we collect, use or disclose is accurate, complete and up-to-date.</p>\n				</li>\n				<li>\n					<h3>4.	Data Security</h3>\n					<p>We will take reasonable steps to protect your personal information from misuse, loss, unauthorised access, modification or disclosure and will endeavour to delete or destroy your personal information if you request us to do so if you no longer use our site.</p>\n					<p>Only authorised users can access your personal information and access to your personal information is only for approved purposes.</p>\n				</li>\n				<li>\n					<h3>5.	Openness</h3>\n					<p>Subject  always to the exceptions contained in the Privacy Act, upon your request, we will take reasonable steps to let you know what sort of information we hold about you, for what purpose it is held, and how we collect, store, use and disclose that personal information.</p>\n				</li>\n				<li>\n					<h3>6.	Access and Correction</h3>\n					<h3>6.1	Access</h3>\n					<p>Please contact us by email at help@groupgifts.com.au to ask for access to your information, make a complaint concerning privacy or if your personal information is inaccurate, incomplete or out of date.</p>\n					<p>We reserve the right to charge you a reasonable fee for processing your request for access to personal information if that request is onerous.</p>							\n				</li>\n				<li>\n					<h3>7.	Identifiers</h3>\n					<p>We will not use or disclose an identifier assigned to you by a government agency unless required to do so by law.</p>\n				</li>\n				<li>\n					<h3>8.	Anonymity</h3>\n					<p>Wherever it is lawful and practice, you have the option of not identifying yourself when entering into transactions with us.</p>\n				</li>\n				<li>\n					<h3>9.	Data Flows</h3>\n					<p>We may transfer your personal information to someone who is in a foreign country. However, we will only do so in accordance with the Privacy Act and if we reasonably believe that the recipient is subject to a law, binding scheme or contract which effectively upholds principles of fair handling of personal information that are substantially similar to NPPs.</p>\n				</li>\n				<li>\n					<h3>10.	Sensitive Information</h3>\n					<p>Some personal information (e.g. race, ethnicity, health, criminal record etc.) is sensitive and requires a higher level of protection under the Privacy Act. We will not disclose your sensitive personal information other than as permitted by law or with your consent.</p>\n					<h3>Contact Details & Additional Information</h3>\n					<p>It is important that you read through become familiar with the Privacy Policy.  We reserve the right to amend this Privacy Policy in order to comply with legislative updates or in order to reflect any changes that we make in the way that we collect or store your personal information.</p>\n					<p>If you require further information regarding this Privacy Policy, please contact us by email at <a href="#"> help@groupgifts.com.au .</a></p>\n				</li>\n			</ol>\n			<div class="privacy-bottom-pic"></div>\n		</div>', '2013-08-01 17:25:14', '2013-08-01 17:25:14'),
(4, 'Terms and Conditions', '<h1>Terms and Conditions</h1>\n		<div class="privacy">\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n			<div class="privacy-bottom-pic"></div>\n		</div>', '2013-08-02 03:08:13', '2013-08-02 03:08:13'),
(5, 'Suppliers', '<h1>Suppliers</h1>\n		<div class="suppliers">\n			<h4>Already a supplier?</h4>\n			<p>Group Gifting is changing the gifting market in Australia forever!  We work in a partnership relationship with all our suppliers to ensure a win-win situation so that your product or service is available to millions more people around Australia!</p>\n			<h4>Already a supplier?</h4>\n			<p>If you are already one of our awesome suppliers login to your account using the login area on the top right. Existing suppliers requiring assistance can email suppliers@groupgifts.com.au with your details and we will be in contact with you shortly. </p>\n			<h4>Becoming a supplier</h4>\n			<p>Group Gifts supports a wide range of Australian businesses to ensure consumers get presents they actually want for all occasions, utilising our specifically built gifting portal.</p>\n			<p>We are always scoping the market for cool and funky new products. If you believe that you supply something that is awesome then sign up today!</p>\n			<p>Please be aware in advance that any Group Gifting supplier is required to be registered for GST and adhere to our <a href="http://groupgifts.com.au/terms-and-conditions">terms our and conditions. </a></p>\n			<p>If this is your business then please complete our new supplier form here.</p>\n		</div>', '2013-08-01 21:13:20', '2013-08-01 21:13:20'),
(6, 'Gift Certificates', '<h1>Gift Certificates</h1>\r\n		<h5>If your group cannot decide what is the best gift for your recipient why not get them a gift certificate and let them choose. Group Gifts gift certificates can be used as currency towards anything on our website (including registries) and are valid for 12 months from the date of purchase.</h5>', '2013-11-07 19:05:12', '2013-11-07 18:05:14'),
(7, 'Gift Registry', '<p>Aren’t you sick of getting a lot of really average presents for your birthday and pretending to look excited when you get them? How about that awesome pen and bag you got for the corporate milestone? Or that time the family put together to get Mum another massage for her birthday? Or perhaps you want a few baby gifts for your impending baby shower that you actually need as opposed to something your friends will think look cute</p>\r\n							<p>Don’t you think it is time people started getting something they actually you want, even though it is not your wedding or engagement? Well now you can!</p>\r\n							<p>Through Group Gifts you can now setup a registry for free for any occasion and have people contribute towards the gift or party whether they know each other or not! </p>						\r\n							<p>Group Gifts Registry service costs ZERO to setup, just click on the Create button to get started!</p>', '2013-11-27 18:04:08', '2013-11-27 18:04:08'),
(8, 'Thank you page - contributor', '<p>Thank you for trusting Group Gifts.</p>\r\n		<p>You will be notified if the registry is 100% paid and approved.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment-information`
--

CREATE TABLE IF NOT EXISTS `payment-information` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store_credit` decimal(10,2) NOT NULL,
  `card_type` varchar(225) NOT NULL,
  `card_number` text NOT NULL,
  `card_holder_fname` text NOT NULL,
  `card_holder_lname` varchar(225) NOT NULL,
  `expiry_month` varchar(225) NOT NULL,
  `expiry_year` varchar(225) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment-information`
--

INSERT INTO `payment-information` (`pi_id`, `user_id`, `store_credit`, `card_type`, `card_number`, `card_holder_fname`, `card_holder_lname`, `expiry_month`, `expiry_year`, `last_updated`) VALUES
(1, 3, 20.00, 'mastercard', '5500005555555559', 'Orvyl1', 'Tumaneng', 'January', '2015', '2013-11-15 02:02:23'),
(2, 10, 0.00, 'visa', '4111111111111111', 'Moja', 'Co', 'January', '2017', '2013-11-18 04:36:43'),
(3, 11, 0.00, '', '', 'Banung', 'Jety', '', '', '2013-12-23 05:40:05'),
(4, 14, 0.00, '', '', 'Lyra Jane', 'Bona-og', '', '', '2013-12-24 00:42:00'),
(5, 15, 0.00, '', '', 'Lyra Jane', 'Bona-og', '', '', '2013-12-26 05:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `product-images`
--

CREATE TABLE IF NOT EXISTS `product-images` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `primary` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product-images`
--

INSERT INTO `product-images` (`pi_id`, `product_id`, `image`, `primary`, `created_at`) VALUES
(17, '1', 'prod17081213035246sAF.jpg', 1, '2013-09-11 07:34:28'),
(18, '1', 'prod17081213035246l31.jpg', 0, '2013-09-11 07:34:33'),
(19, '1', 'prod17081213035246y6h.jpg', 0, '2013-09-11 07:34:31'),
(20, '18', 'prod18081213050026jGj.jpg', 1, '2013-08-12 05:00:26'),
(21, '18', 'prod18081213053034SnZ.jpg', 1, '2013-08-12 05:30:34'),
(24, '21', 'prod21091813060123Osm.jpg', 1, '2013-09-18 06:01:23'),
(25, '21', 'prod21091813060123WTN.jpg', 0, '2013-09-18 06:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `product-occasion`
--

CREATE TABLE IF NOT EXISTS `product-occasion` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(225) NOT NULL,
  `occ_id` varchar(225) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`op_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product-occasion`
--

INSERT INTO `product-occasion` (`op_id`, `product_id`, `occ_id`, `date_created`) VALUES
(8, '18', '5', '2013-09-18 06:29:01'),
(9, '18', '7', '2013-09-18 06:29:01'),
(10, '19', '4', '2013-09-18 06:29:12'),
(11, '19', '6', '2013-09-18 06:29:12'),
(12, '21', '3', '2013-09-19 05:57:38'),
(13, '21', '6', '2013-09-19 05:57:38'),
(19, '1', '2', '2013-12-28 01:57:47'),
(20, '1', '7', '2013-12-28 01:57:47'),
(21, '1', '19', '2013-12-28 01:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `validity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `free_exchange` tinyint(1) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `short_description`, `product_details`, `tags`, `price`, `validity`, `free_exchange`, `delivery_date`, `delivery_cost`, `created_at`, `updated_at`) VALUES
(1, 'Mountain Adventure Combo Package', 'Mountaineering or mountain climbing is the sport, hobby or profession of hiking, skiing, and climbing mountains.', '<p>Experience an exhilarating driving event where you get to drive a V8 race car on a high-speed championship race track. On this experience combines to include 8 drive laps and 3 hot laps around Queensland Raceway. The ultimate V8 racing package.</p>\r\n	\r\n	<h4>Activity Highlights</h4>\r\n	<p>Drive a V8 race car</p>\r\n	<p>Experience the excitement of flat out hot laps</p>\r\n	\r\n	<h4>Whats Included</h4>\r\n	<p>You drive 8 laps</p>\r\n	<p>3 back seat hot laps</p>\r\n	<p>Race suits and helmets will be provided</p>\r\n	<p>Driver briefing is held before the race event.</p>\r\n	\r\n	<h4>Main Description</h4>\r\n	<p>Your V8 drive day begins as you register at reception followed by a driver briefing that will you for your experience in a fully prepared V8 race car. An experienced race driver will give you information on car handling, cornering, braking and the track. After the briefing we head to pit lane where you will be fitted with a race suit and helmet.</p>\r\n	<br>\r\n	<p>Before jumping in the car you get to choose to drive a Holden or Ford V8.</p>\r\n	<p>When it’s your turn to be the driver, we’ll strap you behind the wheel of the V8, introduce you to your personal in-car coach and before long you’ll be burning rubber out of pit lane for the drive of a lifetime! Your coach will show you the fastest way around the track, showing you how to drive the best you possibly can and helping you to improve lap times and cornering techniques. You’ll be treated to 8 self-drive laps around the circuit</p>\r\n	<br>\r\n	<p>Once you have completed the driving component its time to complete 3 hot laps. You will be strapped into the back seat of a specially designed V8 race car. A professional race driver will have you traveling at ridiculous speeds while talking you through the experience via an intercom fitted helmet.</p>\r\n	<p>You can choose to purchase a DVD of your drive for an additional $45 payable on the day.</p>\r\n	<br>\r\n	<p>This experience voucher is valid for 12 months from date of purchase.</p>', 'Mountain,Climbing,Adventure', 999.36, '13 months', 0, '2014-05-09', 25.36, '2013-08-11 19:52:46', '2013-12-27 17:57:47'),
(18, 'Tour in the Philippines', 'The name Philippines is derived from that of King Philip II of Spain. Spanish explorer Ruy López de Villalobos during his expedition in 1542 named the islands of Leyte and Samar Felipinas.', '<p>Experience an exhilarating driving event where you get to drive a V8 race car on a high-speed championship race track. On this experience combines to include 8 drive laps and 3 hot laps around Queensland Raceway. The ultimate V8 racing package.</p><h4>Activity Highlights</h4><p>Drive a V8 race car</p><p>Experience the excitement of flat out hot laps</p><h4>Whats Included</h4><p>You drive 8 laps</p><p>3 back seat hot laps</p><p>Race suits and helmets will be provided</p><p>Driver briefing is held before the race event.</p><h4>Main Description</h4><p>Your V8 drive day begins as you register at reception followed by a driver briefing that will you for your experience in a fully prepared V8 race car. An experienced race driver will give you information on car handling, cornering, braking and the track. After the briefing we head to pit lane where you will be fitted with a race suit and helmet.</p><br><p>Before jumping in the car you get to choose to drive a Holden or Ford V8.</p><p>When it’s your turn to be the driver, we’ll strap you behind the wheel of the V8, introduce you to your personal in-car coach and before long you’ll be burning rubber out of pit lane for the drive of a lifetime! Your coach will show you the fastest way around the track, showing you how to drive the best you possibly can and helping you to improve lap times and cornering techniques. You’ll be treated to 8 self-drive laps around the circuit</p><br><p>Once you have completed the driving component its time to complete 3 hot laps. You will be strapped into the back seat of a specially designed V8 race car. A professional race driver will have you traveling at ridiculous speeds while talking you through the experience via an intercom fitted helmet.</p><p>You can choose to purchase a DVD of your drive for an additional $45 payable on the day.</p><br><p>This experience voucher is valid for 12 months from date of purchase.</p>', 'Philippines,Adventure,Tour,Asia', 999.99, '24 months', 1, '1970-01-01', 999.99, '2013-08-11 20:38:45', '2013-09-17 22:29:01'),
(19, 'Wrist Watch Coolness', 'A watch is a timepiece, typically worn either around the wrist or attached on a chain and carried in a pocket. Wristwatches are the most common type of watch used today.', '<font face="sans-serif" size="2" style="font-style: normal; font-variant: normal; font-weight: normal;"><span style="line-height: 19.1875px;">This is a sample description of this product.</span></font><div style="font-style: normal; font-variant: normal; font-weight: normal;"><font face="sans-serif" size="2"><span style="line-height: 19.1875px;"><br></span></font></div><div><font face="sans-serif" size="2"><span style="line-height: 19.1875px;">A watch is a timepiece, typically worn either around the wrist or attached on a chain and carried in a pocket. Wristwatches are the most common type of watch used today.</span></font></div>', 'Watch,Wrist,Time,Clock', 84.36, '12 months', 0, '1970-01-01', 85.36, '2013-08-11 21:47:05', '2013-09-17 22:29:12'),
(21, 'Stress ball', 'A stress ball is a malleable toy, usually not more than 7 cm in diameter. It is squeezed in the hand and manipulated by the fingers, ostensibly to either help relieve stress and muscle tension.', '<div><font face="Arial, Verdana"><span style="font-size: 12px;">A stress ball is a malleable toy, usually not more than 7 cm in diameter. It is squeezed in the hand and manipulated by the fingers, ostensibly to either help relieve stress and muscle tension or to exercise the muscles of the hand.</span></font></div><div><font face="Arial, Verdana"><span style="font-size: 12px;"><br></span></font></div><div><font face="Arial, Verdana"><span style="font-size: 12px;">There are many types of stress balls. Many are a closed-cell polyurethane foam rubber. This type of stress ball is made by injecting the liquid components of the foam into a mold. The resulting chemical reaction creates carbon dioxide bubbles as a byproduct, which in turn creates the foam.</span></font></div><div><font face="Arial, Verdana"><span style="font-size: 12px;"><br></span></font></div><div><font face="Arial, Verdana"><span style="font-size: 12px;">Stress balls, especially those used in physical therapy, can also contain gel of different densities inside a rubber or cloth skin. Another type uses a thin rubber membrane surrounding a fine powder. The latter type can be made at home by filling a balloon with baking soda. Some balls similar to a footbag are marketed and used as stress balls.</span></font></div>', 'Stress,Ball,Stress Ball,Toy', 85.36, '24 months', 1, '1970-01-01', 2.30, '2013-09-17 22:01:23', '2013-09-18 21:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score_quality` int(11) NOT NULL,
  `score_value` int(11) NOT NULL,
  `score_service` int(11) NOT NULL,
  `score_fun` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `product_id`, `score_quality`, `score_value`, `score_service`, `score_fun`, `comment`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 5, 0, 3, 1, 'This product is average but the price is sooo good!!!', '2013-10-17 17:09:45', '2013-10-17 17:09:45'),
(2, '1', '21', 4, 1, 5, 5, 'This is cool!', '2013-11-07 20:49:21', '2013-11-07 20:49:21'),
(3, '10', '21', 5, 3, 4, 5, 'This is great!!!!', '2013-11-17 21:18:17', '2013-11-17 21:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE IF NOT EXISTS `recipient` (
  `recipient_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` varchar(225) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`recipient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`recipient_id`, `recipient`, `updated_at`) VALUES
(1, 'For Him', '2013-08-09 07:12:59'),
(2, 'For Her', '2013-08-09 07:13:04'),
(3, 'For Them', '2013-08-09 07:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `recipient-product`
--

CREATE TABLE IF NOT EXISTS `recipient-product` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(225) NOT NULL,
  `recipient_id` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

--
-- Dumping data for table `recipient-product`
--

INSERT INTO `recipient-product` (`rp_id`, `product_id`, `recipient_id`, `created_at`) VALUES
(163, '18', '1', '2013-09-18 06:29:01'),
(164, '18', '2', '2013-09-18 06:29:01'),
(165, '19', '1', '2013-09-18 06:29:12'),
(166, '19', '2', '2013-09-18 06:29:12'),
(167, '21', '1', '2013-09-19 05:57:38'),
(168, '21', '2', '2013-09-19 05:57:38'),
(169, '21', '3', '2013-09-19 05:57:38'),
(172, '1', '3', '2013-12-28 01:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `registry`
--

CREATE TABLE IF NOT EXISTS `registry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occasion_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_date` date NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `another_address` tinyint(1) NOT NULL,
  `registry_title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `registry_welcome` text COLLATE utf8_unicode_ci NOT NULL,
  `registry_image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `registry`
--

INSERT INTO `registry` (`id`, `code`, `user_id`, `occasion_type`, `address`, `suburb`, `state_id`, `postcode`, `country_id`, `contact`, `email`, `party_date`, `currency`, `another_address`, `registry_title`, `registry_welcome`, `registry_image`, `created_at`, `updated_at`) VALUES
(4, '3-111325012413F5EyaT', '11', 'personal', 'San Jose', 'village', '1', '4125', '1', '8463369', 'haiki@yahoo.com', '2014-02-15', 'AUD', 0, 'Happy Birthday to you :)', 'Happy birthday to you bro! Lorem ipsum dolor sit amet consectatur inf.', '', '2013-11-24 17:24:13', '2013-11-24 17:27:47'),
(5, '10-111328233559zRPlF7', '11', 'marriage', 'San Jose', 'Subdv', '1', '2225', '1', '845216', 'yolac@yahoo.com', '2014-04-17', 'AUD', 0, 'Happy wedding to you guys - #loveNextLevel', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', '', '2013-11-28 15:35:59', '2013-11-28 15:42:18'),
(6, '3-011404054641qWOc0N', '3', 'personal', 'Mandaluyong City', 'Village', '1', '1550', '1', '827387', 'paypal@mindblowideas.com', '2014-01-24', 'AUD', 0, 'This is great', 'Greatness', '', '2014-01-03 21:46:41', '2014-01-03 21:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `registry-deladdress`
--

CREATE TABLE IF NOT EXISTS `registry-deladdress` (
  `regdel_id` int(11) NOT NULL AUTO_INCREMENT,
  `registry_id` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `suburb` varchar(225) NOT NULL,
  `country_id` varchar(225) NOT NULL,
  `postcode` varchar(225) NOT NULL,
  `state_id` varchar(225) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`regdel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `registry-deladdress`
--

INSERT INTO `registry-deladdress` (`regdel_id`, `registry_id`, `address`, `suburb`, `country_id`, `postcode`, `state_id`, `last_updated`) VALUES
(1, '1', '', '', '', '', '', '2013-11-25 00:37:09'),
(2, '2', '', '', '', '', '', '2013-11-25 00:46:37'),
(3, '3', '', '', '', '', '', '2013-11-25 01:17:17'),
(4, '4', '', '', '', '', '', '2013-11-25 01:24:13'),
(5, '5', '', '', '', '', '', '2013-11-28 23:35:59'),
(6, '6', '', '', '', '', '', '2013-12-06 07:07:40'),
(7, '7', '', '', '', '', '', '2013-12-17 05:54:00'),
(8, '8', '', '', '', '', '', '2013-12-17 06:29:38'),
(9, '6', '', '', '', '', '', '2014-01-04 05:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `registry-marriage`
--

CREATE TABLE IF NOT EXISTS `registry-marriage` (
  `rm_id` int(11) NOT NULL AUTO_INCREMENT,
  `registry_id` varchar(225) NOT NULL,
  `bride_fname` varchar(225) NOT NULL,
  `bride_lname` varchar(225) NOT NULL,
  `groom_fname` varchar(225) NOT NULL,
  `groom_lname` varchar(225) NOT NULL,
  `couple_type` varchar(225) NOT NULL,
  PRIMARY KEY (`rm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `registry-marriage`
--

INSERT INTO `registry-marriage` (`rm_id`, `registry_id`, `bride_fname`, `bride_lname`, `groom_fname`, `groom_lname`, `couple_type`) VALUES
(1, '5', 'Lyra Jane', 'Smith', 'Anthony', 'Reyes', 'Same Sex Couple');

-- --------------------------------------------------------

--
-- Table structure for table `registry-personal`
--

CREATE TABLE IF NOT EXISTS `registry-personal` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT,
  `occasion_description` varchar(225) NOT NULL,
  `registry_id` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `registry-personal`
--

INSERT INTO `registry-personal` (`rp_id`, `occasion_description`, `registry_id`, `first_name`, `last_name`, `bday`) VALUES
(1, '', '1', 'Haiki', 'Terminator', '1995-11-22'),
(2, '', '2', 'Haiki', 'Terminator', '1995-11-08'),
(3, '', '3', 'Haiki', 'Terminator', '1994-11-23'),
(4, '', '4', 'John', 'Reyes', '1994-11-23'),
(5, '', '6', 'RR', 'Tumbel', '1995-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `registry-product`
--

CREATE TABLE IF NOT EXISTS `registry-product` (
  `rprod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(225) NOT NULL,
  `reg_id` varchar(225) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rprod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `registry-product`
--

INSERT INTO `registry-product` (`rprod_id`, `prod_id`, `reg_id`, `qty`, `date_added`) VALUES
(3, '18', '4', 2, '2013-11-26 01:19:48'),
(4, '1', '4', 2, '2013-11-26 01:19:48'),
(5, '21', '5', 4, '2013-11-28 23:42:31'),
(6, '21', '6', 1, '2013-12-06 07:09:02'),
(7, '18', '6', 1, '2013-12-06 07:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_abbr` varchar(5) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_abbr`, `state`) VALUES
(1, 'NSW', 'New South Wales'),
(2, 'VIC', 'Victoria'),
(3, 'QLD', 'Queensland'),
(4, 'WA', 'Western Australia'),
(5, 'SA', 'South Australia'),
(6, 'ACT', 'Australian Capital Territory'),
(7, 'TAS', 'Tasmania'),
(8, 'NT', 'Northern Territory');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `country` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `online` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `active`, `usertype`, `birthday`, `country`, `state`, `phone`, `online`, `created_at`, `updated_at`) VALUES
(1, 'Administrator1', 'Super', 'Adminstrator', 'sa@user.admin', '$2y$08$k/N9jYoXznEwIp1LLiRB5emZUZ3/GH/vZsJvDIxv0XAG8.1x7euLa', 1, 'admin', '2013-08-30', 'Australia', 'New South Wales', '8446236', 0, '2013-08-02 01:11:22', '2014-01-03 23:01:02'),
(3, '', 'Orvyl', 'Tumanengqweqweqwe', 'orvyl@mindblowideas.com', '$2y$08$6R0Ras1xFy7thdsdrlIEJ.iMRRPqQ2UD5dg4ETvvG/Ru4Ewwz2kOa', 1, 'client', '2013-08-15', 'Australia', 'New South Wales', '86236', 0, '2013-08-02 20:56:54', '2013-12-16 16:02:16'),
(10, '', 'Moja', 'Co', 'moja@yahoo.com', '$2y$08$4RAaYvhtGuHMcvogKEjNj.FTNtKnHtrv4hJgbamj5k1m5N9wDZ8Ve', 1, 'client', '1991-11-26', 'Australia', 'Queensland', '45236', 0, '2013-11-17 20:35:48', '2013-12-15 22:25:12'),
(11, '', 'Banung', 'Jety', 'luffy@one-piece.com', '$2y$10$mSzb/B1JrGpvJyamF4l3JecUIle89yI1u6x6oDh5u2c7HXWJ9BujS', 1, 'client', '1992-12-01', 'Australia', 'New South Wales', '8446236', 0, '2013-12-22 21:40:05', '2013-12-22 21:40:05'),
(14, 'lyrajane.bonaog', 'Lyra Jane', 'Bona-og', 'lyrajane@mindblowideas.com', '', 1, 'client', '1970-01-01', 'Australia', 'New South Wales', '8446236', 0, '2013-12-23 16:42:00', '2013-12-23 17:03:09'),
(15, 'lyrajane.bonaog', 'Lyra Jane', 'Bona-og', 'lyrajane.bonaog@facebook.com', '', 1, 'client', '0000-00-00', '', '', '', 0, '2013-12-25 21:02:19', '2013-12-25 21:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registry_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wish_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wish_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `wish_image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `wish_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `registry_id`, `wish_title`, `wish_desc`, `wish_image`, `wish_amount`, `created_at`, `updated_at`) VALUES
(13, '4', 'Happy Money', 'This is a gift in money form', 'wishlist13.jpg', 200.00, '2013-11-24 17:25:27', '2013-11-24 17:25:27'),
(14, '5', 'Honeymoon Grande', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 'wishlist14.jpg', 200.00, '2013-11-28 15:37:32', '2013-11-28 15:37:32'),
(15, '6', 'My gift', 'I hope you can buy now your own bike', 'wishlist15.jpg', 100.00, '2013-12-05 23:08:27', '2013-12-05 23:08:27'),
(17, '7', 'This is test', 'This is test', 'wishlist17.png', 25.25, '2013-12-16 22:05:09', '2013-12-16 22:05:09'),
(19, '7', 'yeheheh', 'yehehe', 'wishlist19.png', 1600.00, '2013-12-16 22:08:30', '2013-12-16 22:08:30'),
(20, '6', 'This is test', 'Yow', '', 25.25, '2014-01-03 21:46:54', '2014-01-03 21:46:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
