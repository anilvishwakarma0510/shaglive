-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2023 at 05:18 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitalqzv_shaglive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin 1', 'admin@gmail.com', '$2y$10$TcHE4ljqciK/GefbNUrO7ufBsnVQXVtt8QAbmVPstu/NPTKqgAWr6', '2023-02-16 08:07:48', '2023-02-20 07:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `bust`
--

CREATE TABLE `bust` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bust`
--

INSERT INTO `bust` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Large', NULL, NULL),
(2, 'Medium', NULL, NULL),
(3, 'Small', NULL, NULL),
(4, 'Unknow', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrition` longtext COLLATE utf8mb4_unicode_ci,
  `footer_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `heading`, `descrition`, `footer_description`, `created_at`, `updated_at`, `slug`) VALUES
(5, 'Women', 'Cam Girls Live', '<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>', '<h2>Cam Girls Live</h2>\r\n\r\n<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>\r\n\r\n<h3>Browse Webcam Girl Models &amp; Free Shows</h3>\r\n\r\n<p>You will only find webcam girls in this section, with all models showcasing their irresistible kinks. Explore the wide range of sexy webcam shows or use filters, including age, number of viewers, show rating, and much more to track down your perfect free cam shows for an extra special experience. Enter the live chat for free and watch incredible cam girls shows or create a free account for additional benefits, like the ability to go full screen, and have a personalized name for these cam girls to recognize you by. Watching girl webcams is a simple and easy process. We provide you with hundreds of free cams so you can find the exact type of sex shows and live chats that you&rsquo;re looking for without having to spend a dime. Top cam girl porn is more interactive than ever before. Hot cam girl porn is the newest trend and here, you&rsquo;ll get to experience live sex in high definition, on full screen, and with highly entertaining, insanely sexy webcam girls. Join in on the fun now. What are you waiting for? Just pick a hot cam girl chat room to start watching free webcam porn now.</p>', '2023-02-21 06:31:55', '2023-02-28 11:34:18', 'women'),
(6, 'Featured', 'Cam Girls Live', '<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>', '<h2>Cam Girls Live</h2>\r\n\r\n<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>\r\n\r\n<h3>Browse Webcam Girl Models &amp; Free Shows</h3>\r\n\r\n<p>You will only find webcam girls in this section, with all models showcasing their irresistible kinks. Explore the wide range of sexy webcam shows or use filters, including age, number of viewers, show rating, and much more to track down your perfect free cam shows for an extra special experience. Enter the live chat for free and watch incredible cam girls shows or create a free account for additional benefits, like the ability to go full screen, and have a personalized name for these cam girls to recognize you by. Watching girl webcams is a simple and easy process. We provide you with hundreds of free cams so you can find the exact type of sex shows and live chats that you&rsquo;re looking for without having to spend a dime. Top cam girl porn is more interactive than ever before. Hot cam girl porn is the newest trend and here, you&rsquo;ll get to experience live sex in high definition, on full screen, and with highly entertaining, insanely sexy webcam girls. Join in on the fun now. What are you waiting for? Just pick a hot cam girl chat room to start watching free webcam porn now.</p>', '2023-02-21 06:31:55', '2023-02-28 11:29:08', 'featured'),
(7, 'Trans', 'Cam Girls Live', '<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>', '<h2>Cam Girls Live</h2>\r\n\r\n<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>\r\n\r\n<h3>Browse Webcam Girl Models &amp; Free Shows</h3>\r\n\r\n<p>You will only find webcam girls in this section, with all models showcasing their irresistible kinks. Explore the wide range of sexy webcam shows or use filters, including age, number of viewers, show rating, and much more to track down your perfect free cam shows for an extra special experience. Enter the live chat for free and watch incredible cam girls shows or create a free account for additional benefits, like the ability to go full screen, and have a personalized name for these cam girls to recognize you by. Watching girl webcams is a simple and easy process. We provide you with hundreds of free cams so you can find the exact type of sex shows and live chats that you&rsquo;re looking for without having to spend a dime. Top cam girl porn is more interactive than ever before. Hot cam girl porn is the newest trend and here, you&rsquo;ll get to experience live sex in high definition, on full screen, and with highly entertaining, insanely sexy webcam girls. Join in on the fun now. What are you waiting for? Just pick a hot cam girl chat room to start watching free webcam porn now.</p>', '2023-02-21 06:31:55', '2023-02-28 11:29:00', 'trans'),
(8, 'Couple', 'Cam Girls Live', '<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>', '<h2>Cam Girls Live</h2>\r\n\r\n<p>Our webcam girls feature some of the hottest scenes you can imagine. These sexy cam girls are live and broadcasted from all around the globe. Browse countless webcam girl models below and discover some of the hottest and most irresistible cam girls around. You can get a sneak peek of any of the live cams and watch live sex, or participate in countless live chats. Our insanely sexy girl cams allow you to enjoy the full show, providing you with the top sexy girl webcams, live and waiting for you.</p>\r\n\r\n<h3>Browse Webcam Girl Models &amp; Free Shows</h3>\r\n\r\n<p>You will only find webcam girls in this section, with all models showcasing their irresistible kinks. Explore the wide range of sexy webcam shows or use filters, including age, number of viewers, show rating, and much more to track down your perfect free cam shows for an extra special experience. Enter the live chat for free and watch incredible cam girls shows or create a free account for additional benefits, like the ability to go full screen, and have a personalized name for these cam girls to recognize you by. Watching girl webcams is a simple and easy process. We provide you with hundreds of free cams so you can find the exact type of sex shows and live chats that you&rsquo;re looking for without having to spend a dime. Top cam girl porn is more interactive than ever before. Hot cam girl porn is the newest trend and here, you&rsquo;ll get to experience live sex in high definition, on full screen, and with highly entertaining, insanely sexy webcam girls. Join in on the fun now. What are you waiting for? Just pick a hot cam girl chat room to start watching free webcam porn now.</p>', '2023-02-21 06:31:55', '2023-02-28 11:28:39', 'couple');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 99, 2, '2023-02-21 09:29:43', '2023-02-21 09:56:55'),
(2, 'kandahar', 1, 5, '2023-02-21 09:57:49', NULL),
(4, 'Visakhapatnam', 99, 2, '2023-02-21 10:14:50', NULL),
(5, 'Indore', 99, 8, '2023-02-21 10:15:41', NULL),
(6, 'Bhopal', 99, 8, '2023-02-21 10:16:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UTC_offset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `iso3`, `phonecode`, `UTC_offset`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', '+93', '+04:30', NULL, NULL),
(2, 'AL', 'Albania', 'ALB', '+355', '+01:00', NULL, NULL),
(3, 'DZ', 'Algeria', 'DZA', '+213', '+01:00', NULL, NULL),
(4, 'AS', 'American Samoa', 'ASM', '+1684', '+11:00', NULL, NULL),
(5, 'AD', 'Andorra', 'AND', '+376', '+01:00', NULL, NULL),
(6, 'AO', 'Angola', 'AGO', '+244', '+01:00', NULL, NULL),
(7, 'AI', 'Anguilla', 'AIA', '+1264', '+04:00', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, '+672', '+11:00', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', 'ATG', '+1268', '+04:00', NULL, NULL),
(10, 'AR', 'Argentina', 'ARG', '+54', '+03:00', NULL, NULL),
(11, 'AM', 'Armenia', 'ARM', '+374', '+04:00', NULL, NULL),
(12, 'AW', 'Aruba', 'ABW', '+297', '+04:00', NULL, NULL),
(13, 'AU', 'Australia', 'AUS', '+61', '+09:30', NULL, NULL),
(14, 'AT', 'Austria', 'AUT', '+43', '+01:00', NULL, NULL),
(15, 'AZ', 'Azerbaijan', 'AZE', '+994', '+04:00', NULL, NULL),
(16, 'BS', 'Bahamas', 'BHS', '+1242', '+05:00', NULL, NULL),
(17, 'BH', 'Bahrain', 'BHR', '+973', '+03:00', NULL, NULL),
(18, 'BD', 'Bangladesh', 'BGD', '+880', '+06:00', NULL, NULL),
(19, 'BB', 'Barbados', 'BRB', '+1246', '+04:00', NULL, NULL),
(20, 'BY', 'Belarus', 'BLR', '+375', '+03:00', NULL, NULL),
(21, 'BE', 'Belgium', 'BEL', '+32', '+01:00', NULL, NULL),
(22, 'BZ', 'Belize', 'BLZ', '+501', '+06:00', NULL, NULL),
(23, 'BJ', 'Benin', 'BEN', '+229', '+01:00', NULL, NULL),
(24, 'BM', 'Bermuda', 'BMU', '+1441', '+04:00', NULL, NULL),
(25, 'BT', 'Bhutan', 'BTN', '+975', '+06:00', NULL, NULL),
(26, 'BO', 'Bolivia', 'BOL', '+591', '+04:00', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', 'BIH', '+387', '+01:00', NULL, NULL),
(28, 'BW', 'Botswana', 'BWA', '+267', '+02:00', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, '+47', '', NULL, NULL),
(30, 'BR', 'Brazil', 'BRA', '+55', '+03:00', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, '+246', '+06:00', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', 'BRN', '+673', '+08:00', NULL, NULL),
(33, 'BG', 'Bulgaria', 'BGR', '+359', '+02:00', NULL, NULL),
(34, 'BF', 'Burkina Faso', 'BFA', '+226', '+00:00', NULL, NULL),
(35, 'BI', 'Burundi', 'BDI', '+257', '+02:00', NULL, NULL),
(36, 'KH', 'Cambodia', 'KHM', '+855', '+07:00', NULL, NULL),
(37, 'CM', 'Cameroon', 'CMR', '+237', '+01:00', NULL, NULL),
(38, 'CA', 'Canada', 'CAN', '+1', '+05:00', NULL, NULL),
(39, 'CV', 'Cape Verde', 'CPV', '+238', '+01:00', NULL, NULL),
(40, 'KY', 'Cayman Islands', 'CYM', '+1345', '+05:00', NULL, NULL),
(41, 'CF', 'Central African Republic', 'CAF', '+236', '+01:00', NULL, NULL),
(42, 'TD', 'Chad', 'TCD', '+235', '+01:00', NULL, NULL),
(43, 'CL', 'Chile', 'CHL', '+56', '+04:00', NULL, NULL),
(44, 'CN', 'China', 'CHN', '+86', '+08:00', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, '+61', '+07:00', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, '+672', '+06:30', NULL, NULL),
(47, 'CO', 'Colombia', 'COL', '+57', '+05:00', NULL, NULL),
(48, 'KM', 'Comoros', 'COM', '+269', '+03:00', NULL, NULL),
(49, 'CG', 'Congo', 'COG', '+242', '+01:00', NULL, NULL),
(50, 'CD', 'Congo, the Democratic Republic of the', 'COD', '+242', '+01:00', NULL, NULL),
(51, 'CK', 'Cook Islands', 'COK', '+682', '+10:00', NULL, NULL),
(52, 'CR', 'Costa Rica', 'CRI', '+506', '+06:00', NULL, NULL),
(53, 'CI', 'Cote D\'Ivoire', 'CIV', '+225', '+00:00', NULL, NULL),
(54, 'HR', 'Croatia', 'HRV', '+385', '+01:00', NULL, NULL),
(55, 'CU', 'Cuba', 'CUB', '+53', '+05:00', NULL, NULL),
(56, 'CY', 'Cyprus', 'CYP', '+357', '+02:00', NULL, NULL),
(57, 'CZ', 'Czech Republic', 'CZE', '+420', '+01:00', NULL, NULL),
(58, 'DK', 'Denmark', 'DNK', '+45', '+01:00', NULL, NULL),
(59, 'DJ', 'Djibouti', 'DJI', '+253', '+03:00', NULL, NULL),
(60, 'DM', 'Dominica', 'DMA', '+1767', '+04:00', NULL, NULL),
(61, 'DO', 'Dominican Republic', 'DOM', '+1809', '+04:00', NULL, NULL),
(62, 'EC', 'Ecuador', 'ECU', '+593', '+05:00', NULL, NULL),
(63, 'EG', 'Egypt', 'EGY', '+20', '+02:00', NULL, NULL),
(64, 'SV', 'El Salvador', 'SLV', '+503', '+06:00', NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', 'GNQ', '+240', '+01:00', NULL, NULL),
(66, 'ER', 'Eritrea', 'ERI', '+291', '+03:00', NULL, NULL),
(67, 'EE', 'Estonia', 'EST', '+372', '+02:00', NULL, NULL),
(68, 'ET', 'Ethiopia', 'ETH', '+251', '+03:00', NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', 'FLK', '+500', '+03:00', NULL, NULL),
(70, 'FO', 'Faroe Islands', 'FRO', '+298', '+00:00', NULL, NULL),
(71, 'FJ', 'Fiji', 'FJI', '+679', '+12:00', NULL, NULL),
(72, 'FI', 'Finland', 'FIN', '+358', '+02:00', NULL, NULL),
(73, 'FR', 'France', 'FRA', '+33', '+01:00', NULL, NULL),
(74, 'GF', 'French Guiana', 'GUF', '+594', '+03:00', NULL, NULL),
(75, 'PF', 'French Polynesia', 'PYF', '+689', '+09:00', NULL, NULL),
(76, 'TF', 'French Southern Territories', NULL, '+260', '+05:00', NULL, NULL),
(77, 'GA', 'Gabon', 'GAB', '+241', '+01:00', NULL, NULL),
(78, 'GM', 'Gambia', 'GMB', '+220', '+00:00', NULL, NULL),
(79, 'GE', 'Georgia', 'GEO', '+995', '+04:00', NULL, NULL),
(80, 'DE', 'Germany', 'DEU', '+49', '+01:00', NULL, NULL),
(81, 'GH', 'Ghana', 'GHA', '+233', '+00:00', NULL, NULL),
(82, 'GI', 'Gibraltar', 'GIB', '+350', '+01:00', NULL, NULL),
(83, 'GR', 'Greece', 'GRC', '+30', '+02:00', NULL, NULL),
(84, 'GL', 'Greenland', 'GRL', '+299', '+00:00', NULL, NULL),
(85, 'GD', 'Grenada', 'GRD', '+1473', '+04:00', NULL, NULL),
(86, 'GP', 'Guadeloupe', 'GLP', '+590', '+04:00', NULL, NULL),
(87, 'GU', 'Guam', 'GUM', '+1671', '+10:00', NULL, NULL),
(88, 'GT', 'Guatemala', 'GTM', '+502', '+06:00', NULL, NULL),
(89, 'GN', 'Guinea', 'GIN', '+224', '+00:00', NULL, NULL),
(90, 'GW', 'Guinea-Bissau', 'GNB', '+245', '+00:00', NULL, NULL),
(91, 'GY', 'Guyana', 'GUY', '+592', '+04:00', NULL, NULL),
(92, 'HT', 'Haiti', 'HTI', '+509', '+05:00', NULL, NULL),
(93, 'HM', 'Heard Island and Mcdonald Islands', NULL, '+291', '', NULL, NULL),
(94, 'VA', 'Holy See (Vatican City State)', 'VAT', '+39', '+01:00', NULL, NULL),
(95, 'HN', 'Honduras', 'HND', '+504', '+06:00', NULL, NULL),
(96, 'HK', 'Hong Kong', 'HKG', '+852', '+08:00', NULL, NULL),
(97, 'HU', 'Hungary', 'HUN', '+36', '+01:00', NULL, NULL),
(98, 'IS', 'Iceland', 'ISL', '+354', '+00:00', NULL, NULL),
(99, 'IN', 'India', 'IND', '+91', '+05:30', NULL, NULL),
(100, 'ID', 'Indonesia', 'IDN', '+62', '+07:00', NULL, NULL),
(101, 'IR', 'Iran, Islamic Republic of', 'IRN', '+98', '+03:30', NULL, NULL),
(102, 'IQ', 'Iraq', 'IRQ', '+964', '+03:00', NULL, NULL),
(103, 'IE', 'Ireland', 'IRL', '+353', '+00:00', NULL, NULL),
(104, 'IL', 'Israel', 'ISR', '+972', '+02:00', NULL, NULL),
(105, 'IT', 'Italy', 'ITA', '+39', '+01:00', NULL, NULL),
(106, 'JM', 'Jamaica', 'JAM', '+1876', '+05:00', NULL, NULL),
(107, 'JP', 'Japan', 'JPN', '+81', '+09:00', NULL, NULL),
(108, 'JO', 'Jordan', 'JOR', '+962', '+03:00', NULL, NULL),
(109, 'KZ', 'Kazakhstan', 'KAZ', '+7', '+06:00', NULL, NULL),
(110, 'KE', 'Kenya', 'KEN', '+254', '+03:00', NULL, NULL),
(111, 'KI', 'Kiribati', 'KIR', '+686', '+13:00', NULL, NULL),
(112, 'KP', 'Korea, Democratic People\'s Republic of', 'PRK', '+850', '+09:00', NULL, NULL),
(113, 'KR', 'Korea, Republic of', 'KOR', '+82', '+09:00', NULL, NULL),
(114, 'KW', 'Kuwait', 'KWT', '+965', '+03:00', NULL, NULL),
(115, 'KG', 'Kyrgyzstan', 'KGZ', '+996', '+06:00', NULL, NULL),
(116, 'LA', 'Lao People\'s Democratic Republic', 'LAO', '+856', '+07:00', NULL, NULL),
(117, 'LV', 'Latvia', 'LVA', '+371', '+02:00', NULL, NULL),
(118, 'LB', 'Lebanon', 'LBN', '+961', '+02:00', NULL, NULL),
(119, 'LS', 'Lesotho', 'LSO', '+266', '+02:00', NULL, NULL),
(120, 'LR', 'Liberia', 'LBR', '+231', '+00:00', NULL, NULL),
(121, 'LY', 'Libyan Arab Jamahiriya', 'LBY', '+218', '+01:00', NULL, NULL),
(122, 'LI', 'Liechtenstein', 'LIE', '+423', '+01:00', NULL, NULL),
(123, 'LT', 'Lithuania', 'LTU', '+370', '+02:00', NULL, NULL),
(124, 'LU', 'Luxembourg', 'LUX', '+352', '+01:00', NULL, NULL),
(125, 'MO', 'Macao', 'MAC', '+853', '+08:00', NULL, NULL),
(126, 'MK', 'Macedonia, the Former Yugoslav Republic of', 'MKD', '+389', '+01:00', NULL, NULL),
(127, 'MG', 'Madagascar', 'MDG', '+261', '+03:00', NULL, NULL),
(128, 'MW', 'Malawi', 'MWI', '+265', '+02:00', NULL, NULL),
(129, 'MY', 'Malaysia', 'MYS', '+60', '+08:00', NULL, NULL),
(130, 'MV', 'Maldives', 'MDV', '+960', '+05:00', NULL, NULL),
(131, 'ML', 'Mali', 'MLI', '+223', '+00:00', NULL, NULL),
(132, 'MT', 'Malta', 'MLT', '+356', '+01:00', NULL, NULL),
(133, 'MH', 'Marshall Islands', 'MHL', '+692', '+12:00', NULL, NULL),
(134, 'MQ', 'Martinique', 'MTQ', '+596', '+04:00', NULL, NULL),
(135, 'MR', 'Mauritania', 'MRT', '+222', '+00:00', NULL, NULL),
(136, 'MU', 'Mauritius', 'MUS', '+230', '+04:00', NULL, NULL),
(137, 'YT', 'Mayotte', NULL, '+269', '+03:00', NULL, NULL),
(138, 'MX', 'Mexico', 'MEX', '+52', '+06:00', NULL, NULL),
(139, 'FM', 'Micronesia, Federated States of', 'FSM', '+691', '+10:00', NULL, NULL),
(140, 'MD', 'Moldova, Republic of', 'MDA', '+373', '+02:00', NULL, NULL),
(141, 'MC', 'Monaco', 'MCO', '+377', '+01:00', NULL, NULL),
(142, 'MN', 'Mongolia', 'MNG', '+976', '+08:00', NULL, NULL),
(143, 'MS', 'Montserrat', 'MSR', '+1664', '+04:00', NULL, NULL),
(144, 'MA', 'Morocco', 'MAR', '+212', '+00:00', NULL, NULL),
(145, 'MZ', 'Mozambique', 'MOZ', '+258', '+02:00', NULL, NULL),
(146, 'MM', 'Myanmar', 'MMR', '+95', '+06:30', NULL, NULL),
(147, 'NA', 'Namibia', 'NAM', '+264', '+01:00', NULL, NULL),
(148, 'NR', 'Nauru', 'NRU', '+674', '+12:00', NULL, NULL),
(149, 'NP', 'Nepal', 'NPL', '+977', '+05:45', NULL, NULL),
(150, 'NL', 'Netherlands', 'NLD', '+31', '+01:00', NULL, NULL),
(151, 'AN', 'Netherlands Antilles', 'ANT', '+599', '', NULL, NULL),
(152, 'NC', 'New Caledonia', 'NCL', '+687', '+11:00', NULL, NULL),
(153, 'NZ', 'New Zealand', 'NZL', '+64', '+12:00', NULL, NULL),
(154, 'NI', 'Nicaragua', 'NIC', '+505', '+06:00', NULL, NULL),
(155, 'NE', 'Niger', 'NER', '+227', '+01:00', NULL, NULL),
(156, 'NG', 'Nigeria', 'NGA', '+234', '+01:00', NULL, NULL),
(157, 'NU', 'Niue', 'NIU', '+683', '+11:00', NULL, NULL),
(158, 'NF', 'Norfolk Island', 'NFK', '+672', '+11:30', NULL, NULL),
(159, 'MP', 'Northern Mariana Islands', 'MNP', '+1670', '+10:00', NULL, NULL),
(160, 'NO', 'Norway', 'NOR', '+47', '+01:00', NULL, NULL),
(161, 'OM', 'Oman', 'OMN', '+968', '+04:00', NULL, NULL),
(162, 'PK', 'Pakistan', 'PAK', '+92', '+05:00', NULL, NULL),
(163, 'PW', 'Palau', 'PLW', '+680', '+09:00', NULL, NULL),
(164, 'PS', 'Palestinian Territory, Occupied', NULL, '+970', '+02:00', NULL, NULL),
(165, 'PA', 'Panama', 'PAN', '+507', '+05:00', NULL, NULL),
(166, 'PG', 'Papua New Guinea', 'PNG', '+675', '+10:00', NULL, NULL),
(167, 'PY', 'Paraguay', 'PRY', '+595', '+04:00', NULL, NULL),
(168, 'PE', 'Peru', 'PER', '+51', '+05:00', NULL, NULL),
(169, 'PH', 'Philippines', 'PHL', '+63', '+08:00', NULL, NULL),
(170, 'PN', 'Pitcairn', 'PCN', '+64', '+08:00', NULL, NULL),
(171, 'PL', 'Poland', 'POL', '+48', '+01:00', NULL, NULL),
(172, 'PT', 'Portugal', 'PRT', '+351', '+01:00', NULL, NULL),
(173, 'PR', 'Puerto Rico', 'PRI', '+1787', '+04:00', NULL, NULL),
(174, 'QA', 'Qatar', 'QAT', '+974', '+03:00', NULL, NULL),
(175, 'RE', 'Reunion', 'REU', '+262', '+04:00', NULL, NULL),
(176, 'RO', 'Romania', 'ROM', '+40', '+02:00', NULL, NULL),
(177, 'RU', 'Russian Federation', 'RUS', '+70', '+12:00', NULL, NULL),
(178, 'RW', 'Rwanda', 'RWA', '+250', '+02:00', NULL, NULL),
(179, 'SH', 'Saint Helena', 'SHN', '+290', '+00:00', NULL, NULL),
(180, 'KN', 'Saint Kitts and Nevis', 'KNA', '+1869', '+04:00', NULL, NULL),
(181, 'LC', 'Saint Lucia', 'LCA', '+1758', '+04:00', NULL, NULL),
(182, 'PM', 'Saint Pierre and Miquelon', 'SPM', '+508', '+03:00', NULL, NULL),
(183, 'VC', 'Saint Vincent and the Grenadines', 'VCT', '+1784', '+04:00', NULL, NULL),
(184, 'WS', 'Samoa', 'WSM', '+684', '+13:00', NULL, NULL),
(185, 'SM', 'San Marino', 'SMR', '+378', '+01:00', NULL, NULL),
(186, 'ST', 'Sao Tome and Principe', 'STP', '+239', '+00:00', NULL, NULL),
(187, 'SA', 'Saudi Arabia', 'SAU', '+966', '+03:00', NULL, NULL),
(188, 'SN', 'Senegal', 'SEN', '+221', '+00:00', NULL, NULL),
(189, 'CS', 'Serbia and Montenegro', NULL, '+381', '', NULL, NULL),
(190, 'SC', 'Seychelles', 'SYC', '+248', '+04:00', NULL, NULL),
(191, 'SL', 'Sierra Leone', 'SLE', '+232', '+00:00', NULL, NULL),
(192, 'SG', 'Singapore', 'SGP', '+65', '+08:00', NULL, NULL),
(193, 'SK', 'Slovakia', 'SVK', '+421', '+01:00', NULL, NULL),
(194, 'SI', 'Slovenia', 'SVN', '+386', '+01:00', NULL, NULL),
(195, 'SB', 'Solomon Islands', 'SLB', '+677', '+11:00', NULL, NULL),
(196, 'SO', 'Somalia', 'SOM', '+252', '+03:00', NULL, NULL),
(197, 'ZA', 'South Africa', 'ZAF', '+27', '+02:00', NULL, NULL),
(198, 'GS', 'South Georgia and the South Sandwich Islands', NULL, '+500', '+02:00', NULL, NULL),
(199, 'ES', 'Spain', 'ESP', '+34', '+01:00', NULL, NULL),
(200, 'LK', 'Sri Lanka', 'LKA', '+94', '+05:30', NULL, NULL),
(201, 'SD', 'Sudan', 'SDN', '+249', '+03:00', NULL, NULL),
(202, 'SR', 'Suriname', 'SUR', '+597', '+03:00', NULL, NULL),
(203, 'SJ', 'Svalbard and Jan Mayen', 'SJM', '+47', '+01:00', NULL, NULL),
(204, 'SZ', 'Swaziland', 'SWZ', '+268', '+02:00', NULL, NULL),
(205, 'SE', 'Sweden', 'SWE', '+46', '+01:00', NULL, NULL),
(206, 'CH', 'Switzerland', 'CHE', '+41', '+01:00', NULL, NULL),
(207, 'SY', 'Syrian Arab Republic', 'SYR', '+963', '+02:00', NULL, NULL),
(208, 'TW', 'Taiwan, Province of China', 'TWN', '+886', '+08:00', NULL, NULL),
(209, 'TJ', 'Tajikistan', 'TJK', '+992', '+05:00', NULL, NULL),
(210, 'TZ', 'Tanzania, United Republic of', 'TZA', '+255', '+03:00', NULL, NULL),
(211, 'TH', 'Thailand', 'THA', '+66', '+07:00', NULL, NULL),
(212, 'TL', 'Timor-Leste', NULL, '+670', '+09:00', NULL, NULL),
(213, 'TG', 'Togo', 'TGO', '+228', '+00:00', NULL, NULL),
(214, 'TK', 'Tokelau', 'TKL', '+690', '+13:00', NULL, NULL),
(215, 'TO', 'Tonga', 'TON', '+676', '+13:00', NULL, NULL),
(216, 'TT', 'Trinidad and Tobago', 'TTO', '+1868', '+04:00', NULL, NULL),
(217, 'TN', 'Tunisia', 'TUN', '+216', '+01:00', NULL, NULL),
(218, 'TR', 'Turkey', 'TUR', '+90', '+02:00', NULL, NULL),
(219, 'TM', 'Turkmenistan', 'TKM', '+7370', '+05:00', NULL, NULL),
(220, 'TC', 'Turks and Caicos Islands', 'TCA', '+1649', '+05:00', NULL, NULL),
(221, 'TV', 'Tuvalu', 'TUV', '+688', '+12:00', NULL, NULL),
(222, 'UG', 'Uganda', 'UGA', '+256', '+03:00', NULL, NULL),
(223, 'UA', 'Ukraine', 'UKR', '+380', '+02:00', NULL, NULL),
(224, 'AE', 'United Arab Emirates', 'ARE', '+971', '+04:00', NULL, NULL),
(225, 'GB', 'United Kingdom', 'GBR', '+44', '+00:00', NULL, NULL),
(226, 'US', 'United States', 'USA', '+1', '+10:00', NULL, NULL),
(227, 'UM', 'United States Minor Outlying Islands', NULL, '+1', '+10:00', NULL, NULL),
(228, 'UY', 'Uruguay', 'URY', '+598', '+03:00', NULL, NULL),
(229, 'UZ', 'Uzbekistan', 'UZB', '+998', '+05:00', NULL, NULL),
(230, 'VU', 'Vanuatu', 'VUT', '+678', '+11:00', NULL, NULL),
(231, 'VE', 'Venezuela', 'VEN', '+58', '+04:30', NULL, NULL),
(232, 'VN', 'Viet Nam', 'VNM', '+84', '+07:00', NULL, NULL),
(233, 'VG', 'Virgin Islands, British', 'VGB', '+1284', '+04:00', NULL, NULL),
(234, 'VI', 'Virgin Islands, U.s.', 'VIR', '+1340', '+04:00', NULL, NULL),
(235, 'WF', 'Wallis and Futuna', 'WLF', '+681', '+12:00', NULL, NULL),
(236, 'EH', 'Western Sahara', 'ESH', '+212', '+00:00', NULL, NULL),
(237, 'YE', 'Yemen', 'YEM', '+967', '+03:00', NULL, NULL),
(238, 'ZM', 'Zambia', 'ZMB', '+260', '+02:00', NULL, NULL),
(239, 'ZW', 'Zimbabwe', 'ZWE', '+263', '+02:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ethinicity`
--

CREATE TABLE `ethinicity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ethinicity`
--

INSERT INTO `ethinicity` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'White', NULL, NULL),
(2, 'Asian', NULL, NULL),
(3, 'Black', NULL, NULL),
(4, 'Indian', NULL, NULL),
(5, 'Latin', NULL, NULL),
(6, 'Unknow', NULL, '2023-02-20 10:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `eyes`
--

CREATE TABLE `eyes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eyes`
--

INSERT INTO `eyes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Blue', NULL, NULL),
(2, 'Brown', NULL, NULL),
(3, 'Green', NULL, NULL),
(4, 'Unknow', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=Inactive,1=Active,2=Draft',
  `is_free` tinyint(4) NOT NULL COMMENT '1=Free,2=Paid',
  `credits` bigint(20) NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `user_id`, `title`, `file`, `status`, `is_free`, `credits`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'Test', 'uploads/gallary/1676972609.png', 1, 2, 10, 'Tst', NULL, NULL),
(3, 2, 'df', 'uploads/gallery/10908715121677670830.png', 1, 1, 0, '<p>sddfsdf</p>', '2023-03-01 11:40:30', '2023-03-01 11:40:30'),
(4, 2, 'Test', 'uploads/gallery/8576553281677670858.png', 1, 1, 0, '<p>Test</p>', '2023-03-01 11:40:58', '2023-03-01 11:40:58'),
(5, 2, 'Test', 'uploads/gallery/6846994241677670952.png', 1, 2, 1000, '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', '2023-03-01 11:42:32', '2023-03-01 11:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `hairs`
--

CREATE TABLE `hairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hairs`
--

INSERT INTO `hairs` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Brown', NULL, NULL),
(2, 'Blonde', NULL, NULL),
(3, 'Black', NULL, NULL),
(4, 'Red', NULL, NULL),
(5, 'qweqewseqwe', NULL, '2023-02-21 07:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `height`
--

CREATE TABLE `height` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `in_inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `height`
--

INSERT INTO `height` (`id`, `in_inch`, `in_cm`, `created_at`, `updated_at`) VALUES
(6, '4\'11\"', '149.89', NULL, NULL),
(9, '2\' 3\"', '69', '2023-02-20 13:14:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_16_075953_create_admin_models_table', 2),
(6, '2023_02_16_091654_create_country_models_table', 3),
(7, '2023_02_16_093047_create_state_models_table', 4),
(8, '2023_02_16_093101_create_city_models_table', 5),
(10, '2023_02_16_102558_modify_users_table', 6),
(11, '2023_02_16_105055_create_ethinicity_models_table', 7),
(12, '2023_02_16_105114_create_eyes_models_table', 7),
(13, '2023_02_16_105131_create_hair_models_table', 7),
(14, '2023_02_16_105146_create_weight_models_table', 7),
(15, '2023_02_16_105156_create_height_models_table', 7),
(16, '2023_02_16_105217_create_public_hair_models_table', 7),
(17, '2023_02_16_105234_create_bust_models_table', 7),
(18, '2023_02_16_113907_create_category_models_table', 8),
(19, '2023_02_16_114258_create_tags_models_table', 9),
(20, '2023_02_17_114351_modify_users_table', 10),
(21, '2023_02_21_052951_create_password_resets_models_table', 11),
(22, '2023_02_21_081709_modify_users_table', 12),
(23, '2023_02_24_094330_add_multiple_column_to_users', 13),
(24, '2023_02_28_112153_add_multiple_column_to_category', 14),
(25, '2023_02_28_112210_add_multiple_column_to_users', 14),
(26, '2023_02_28_120457_create_working_hour_models_table', 15),
(27, '2023_03_01_051545_create_gallary_models_table', 16),
(28, '2023_03_01_053057_create_video_models_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(7, 'anil.webwiders@gmail.com', 'qBVODnPhRKRvQc21bFwHFao0hN7jf6WpCRSkqKurVExRKi97Jaw5LOv4TfIjo8gr', '2023-02-21 06:30:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_hair`
--

CREATE TABLE `public_hair` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_hair`
--

INSERT INTO `public_hair` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Trimmed', NULL, NULL),
(2, 'Shaved', NULL, NULL),
(3, 'Hairy', NULL, NULL),
(4, 'Unknow', NULL, '2023-02-21 07:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(2, 'Andhra Pradesh', 99, '2023-02-21 07:51:44', '2023-02-21 08:04:44'),
(3, 'Assam', 99, '2023-02-21 08:05:17', '2023-02-21 08:06:12'),
(4, 'Kabul', 1, '2023-02-21 09:38:42', NULL),
(5, 'Kandahar', 1, '2023-02-21 09:38:56', NULL),
(6, 'Kapisa', 1, '2023-02-21 09:39:04', NULL),
(7, 'Khost', 1, '2023-02-21 09:39:32', NULL),
(8, 'M.P', 99, '2023-02-21 10:15:16', '2023-02-21 10:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created_at`, `updated_at`) VALUES
(7, 'asian', '2023-02-28 11:44:59', NULL),
(8, 'bigboobs', '2023-02-28 11:45:14', NULL),
(9, 'mature', '2023-02-28 11:45:30', NULL),
(10, 'ebony', '2023-02-28 11:45:39', NULL),
(11, 'hairy', '2023-02-28 11:45:49', NULL),
(12, 'latina', '2023-02-28 11:45:58', NULL),
(13, 'milf', '2023-02-28 11:46:22', NULL),
(14, 'bbw', '2023-02-28 11:46:31', NULL),
(15, 'squirt', '2023-02-28 11:47:23', NULL),
(16, 'teen', '2023-02-28 11:47:30', NULL),
(17, 'smalltits', '2023-02-28 11:47:39', NULL),
(18, 'milk', '2023-02-28 11:47:46', NULL),
(19, 'feet', '2023-02-28 11:47:55', NULL),
(20, 'pantyhose', '2023-02-28 11:48:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = modal,2= customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'approved  by admin for modal',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 = blocked,1= active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexual_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `hair_colour` int(11) DEFAULT NULL,
  `eyes_color` int(11) DEFAULT NULL,
  `ethnicity` int(11) DEFAULT NULL,
  `public_hair` int(11) DEFAULT NULL,
  `bust` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` longtext COLLATE utf8mb4_unicode_ci,
  `user_id_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reject_reason` text COLLATE utf8mb4_unicode_ci COMMENT 'reason for reject',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `user_type`, `email_verified_at`, `password`, `first_name`, `last_name`, `is_approved`, `status`, `phone`, `phone_code`, `country`, `state`, `city`, `zip`, `address`, `dob`, `gender`, `sexual_preference`, `height`, `weight`, `hair_colour`, `eyes_color`, `ethnicity`, `public_hair`, `bust`, `facebook`, `twitter`, `insta`, `about_me`, `user_id_doc`, `user_address_doc`, `reject_reason`, `remember_token`, `updated_at`, `created_at`, `profile_image`, `cover_image`, `id_doc`, `address_doc`, `tags`) VALUES
(2, 'anil.webwiders@gmail.com', 'anil', '1', '2023-02-20 12:58:38', '$2y$10$szcTBypDRJktrl4BaCHPZeIrDQ5UxQcWh2cT3avapmps5kmwy7eNK', 'Anil', 'Vishwakarma', '1', '1', '234234234', NULL, 99, 2, 1, '3423423', NULL, '1993-10-05', 'male', 'male', 6, 6, 3, 2, 3, 3, 1, NULL, NULL, NULL, 'sdfsddfsddf', 'uploads/user_docs/kmH8wmdSeZPXAaHSvdTe9exPJ2AUd5PljOeHT5Rz.png', 'uploads/user_docs/SnY6InZr1MMGD6AaMNkNIx7nxTbn5ZFLlAFmXP59.png', NULL, '1QHjLSqNKAI4kjRSYAxvsRUkTM8vDppXz8iWoCggNJJhWIXBvZ8Es71VzJU1', '2023-02-28 11:48:59', '2023-02-17 13:20:19', 'uploads/user_profile/1676972609.png', NULL, 'Passport', 'Driving License', '14,8,10,19'),
(3, 'anil@mailinator.com', 'anil1', '1', '2023-02-20 11:41:08', '$2y$10$Czlly/1mkA3yRhmgAIVXZ.rXkVm.UZ2aUPyv3RD16FBuHAy.P0vhm', 'Anil', 'Vishwakarma', '0', '1', '1231312', NULL, 99, 2, 1, '3423423', NULL, '1993-10-05', 'male', NULL, 6, 6, 3, 2, 3, 3, 1, NULL, NULL, NULL, NULL, 'uploads/user_docs/bFyurXoEabsce14OiJoEUVvdboNQKBZeaOTg7BjS.jpg', 'uploads/user_docs/60IB4cQ8j01821kfoe8VKPkzgILrGLsjkBkSYzwp.jpg', NULL, '', '2023-02-21 12:33:43', '2023-02-20 10:51:19', NULL, NULL, 'Passport', 'Driving License', NULL),
(5, 'yashwebwiders@gmail.com', 'yashsaxena', '1', '2023-02-23 00:30:29', '$2y$10$BZiDUyAbPNQCcxXKvArYpedQdnbLStYjQQO4NsEtHhG1ojl2mPTEi', 'yash', 'saxena', '1', '1', '1234567890', NULL, 1, NULL, NULL, '12413', NULL, '1995-08-16', 'male', 'female', 6, 3, 3, 1, 2, 4, 4, NULL, NULL, NULL, 'ryearhae', 'uploads/user_docs/1677112187.jpg', 'uploads/user_docs/1677112187.jpg', NULL, '', '2023-02-23 00:33:17', '2023-02-23 00:29:47', NULL, NULL, 'Passport', 'Driving License', NULL),
(6, 'mayurkarttat@gmail.com', 'test', '1', '2023-02-23 12:32:20', '$2y$10$7VNyCajJeqvf6yXw8v4TnelnUepsP9Vh/E8c.zgoYMq5M3YhKolga', 'test', 'test', '1', '1', '0116', NULL, 3, NULL, NULL, NULL, NULL, '2004-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/user_docs/1677155510.jpg', 'uploads/user_docs/1677155510.jpg', NULL, '', '2023-02-23 12:34:22', '2023-02-23 12:31:50', NULL, NULL, 'Passport', 'Driving License', NULL),
(8, 'as11@gmail.com', 'admin', '1', NULL, '$2y$10$JiG57qru1x3u83TX5e7eqOuVOahM9R34W2tNPwf3kZ1EZ1uhv1jgK', 'Rahul', 'safasa', '0', '1', '87947895651', NULL, 99, NULL, NULL, NULL, NULL, '2005-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/user_docs/1677233792.png', 'uploads/user_docs/1677233792.png', NULL, 'p0PCXLldYozJCcEUcY1wNI4VLHs30ZxXuIonBTVvEbb8VYkJu3Fkh7SSpsmh', '2023-02-24 10:16:32', '2023-02-24 10:16:32', NULL, NULL, 'Passport', 'Driving License', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=Inactive,1=Active,2=Draft',
  `is_free` tinyint(4) NOT NULL COMMENT '1=Free,2=Paid',
  `credits` bigint(20) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `video`, `trailer`, `thumb`, `status`, `is_free`, `credits`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'Test', 'uploads/video/1231231223.mp4', 'uploads/trailer/1231231223.mp4', 'uploads/thumb/1676972609.png', 2, 2, 100, 'test', NULL, NULL),
(3, 2, 'Lorem Ipsum', 'uploads/video/2591683331677676039.mp4', 'uploads/trailer/19109632321677676039.mp4', 'uploads/thumb/18080569901677676039.jpg', 0, 2, 100, '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', '2023-03-01 13:07:19', '2023-03-01 13:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `in_ibs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_kg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`id`, `in_ibs`, `in_kg`, `created_at`, `updated_at`) VALUES
(1, '99', '44.55', NULL, NULL),
(2, '100', '45', NULL, NULL),
(3, '101', '45.45', NULL, NULL),
(6, '22', '10', '2023-02-20 13:07:26', NULL),
(7, '51', '23', '2023-02-20 13:09:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `working_hour`
--

CREATE TABLE `working_hour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `week_day` tinyint(4) DEFAULT NULL COMMENT '0=Sun,1=Mon,2=Tue,3=Wed,4=Thu,5=Fri,6=Sat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_hour`
--

INSERT INTO `working_hour` (`id`, `user_id`, `open_time`, `close_time`, `week_day`, `created_at`, `updated_at`) VALUES
(1, 2, '07:16:00', '21:17:00', 4, '2023-02-28 12:43:54', '2023-02-28 12:49:36'),
(2, 2, '08:19:00', '22:23:00', 3, '2023-02-28 12:49:13', '2023-02-28 12:49:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bust`
--
ALTER TABLE `bust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ethinicity`
--
ALTER TABLE `ethinicity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eyes`
--
ALTER TABLE `eyes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallary_user_id_foreign` (`user_id`);

--
-- Indexes for table `hairs`
--
ALTER TABLE `hairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `height`
--
ALTER TABLE `height`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `public_hair`
--
ALTER TABLE `public_hair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_hour`
--
ALTER TABLE `working_hour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `working_hour_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bust`
--
ALTER TABLE `bust`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `ethinicity`
--
ALTER TABLE `ethinicity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `eyes`
--
ALTER TABLE `eyes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hairs`
--
ALTER TABLE `hairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `height`
--
ALTER TABLE `height`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_hair`
--
ALTER TABLE `public_hair`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `working_hour`
--
ALTER TABLE `working_hour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallary`
--
ALTER TABLE `gallary`
  ADD CONSTRAINT `gallary_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working_hour`
--
ALTER TABLE `working_hour`
  ADD CONSTRAINT `working_hour_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
