-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 09:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dirdatadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(11) NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `banner_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 Approved, 1 Not Approved',
  `type` tinyint(4) NOT NULL COMMENT '1 Top, 2 Bottom, 3 Sidebar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `seller_id`, `banner_image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 'uploads/topbar/Beauty-Wellness.jpg', 1, 1, '2018-12-12 06:23:59', '2018-12-12 06:26:13'),
(2, 4, 'uploads/topbar/Holiday-Sub-Ad.jpg', 1, 1, '2018-12-12 06:24:05', '2018-12-12 06:26:16'),
(3, 4, 'uploads/topbar/Holiday-Sub-Ad.jpg', 1, 2, '2018-12-12 06:24:31', '2018-12-12 06:26:20'),
(4, 4, 'uploads/topbar/Beauty-Wellness.jpg', 1, 2, '2018-12-12 06:24:38', '2018-12-12 06:26:23'),
(5, 4, 'uploads/topbar/analysis.png', 1, 3, '2018-12-12 06:25:09', '2018-12-12 06:26:29'),
(6, 4, 'uploads/topbar/image.png', 1, 3, '2018-12-12 06:25:24', '2018-12-12 06:26:36'),
(7, 4, 'uploads/topbar/cycle-graphic.png', 1, 3, '2018-12-12 06:25:32', '2018-12-12 06:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(11) NOT NULL,
  `blog_category_id` int(10) unsigned NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `unique_code`, `title`, `slug`, `featured_image`, `short_description`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 2, '7imNeNTvnu', 'Latin words combined with a handful of models', 'latin-words-combined-with-a-handful-of-model', 'uploads/blogs/food-632806_1920-800x533.jpg', 'Quisque laoreet mi libero, et tempus lacus venenatis eget. Nulla vitaeipsum inturpis blandit congue ofer ornare inleo. Nulla nibhmi sagittis necaliquet pharetra vitae turpis. Nam tristique mauris necultricies its tristiqu. orbilitelit molestie eget tincidunt luctus consequat sitameturna.', '<h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Venue Details</h2><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which one looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non characteristic words etc.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Quisque laoreet mi libero, et tempus lacus venenatis eget. Nulla vitaeipsum inturpis blandit congue ofer ornare inleo. Nulla nibhmi sagittis necaliquet pharetra vitae turpis. Nam tristique mauris necultricies its tristiqu. orbilitelit molestie eget tincidunt luctus consequat sitameturna.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Aenean sapienest, rutrum malesuada quamuis tristique tincinibh hasellusut elementum not semlass and aptent taciti sociosqu ad litorarutrum malesuada quamuis tristique torquent per conubia nostra permite inceptos our its it himenaeos aecsed laoreet diam. Crasut auctor ipsusque commodo suscipit onet tristiques viverrarcu idaugue blandit ultricies nibhrhoncus rutrum malesuada tristique.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Latin words combined with a handful of model sentence structures to generate Loremere Ipsum which looks reasonable. The generated lorem Ipsum is therefore always free fromes combined with a handful of model repetition injected humour or non characteristic words etc.</p><h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Venue Facilities</h2><ul class="check-circle" style="margin-bottom: 30px; padding: 0px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);"><li style="position: relative; list-style: none; padding-left: 10px;">Wedding Hall</li><li style="position: relative; list-style: none; padding-left: 10px;">Dining</li><li style="position: relative; list-style: none; padding-left: 10px;">Liability Insurance</li><li style="position: relative; list-style: none; padding-left: 10px;">In House Catering</li><li style="position: relative; list-style: none; padding-left: 10px;">Dining</li><li style="position: relative; list-style: none; padding-left: 10px;">DJ Facilities</li><li style="position: relative; list-style: none; padding-left: 10px;">Personal Chef</li><li style="position: relative; list-style: none; padding-left: 10px;">Guest Parking</li><li style="position: relative; list-style: none; padding-left: 10px;">Seating Amenities</li></ul><h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Why Our Wedding Venue</h2><ul class="check-circle" style="margin-bottom: 30px; padding: 0px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);"><li style="position: relative; list-style: none; padding-left: 10px;">Wedding parties have exclusive use of the venue for the day</li><li style="position: relative; list-style: none; padding-left: 10px;">Last Minute Offer £3,800 inc VAT for any wedding booked in the next 8 weeks.</li><li style="position: relative; list-style: none; padding-left: 10px;">Licensed for civil ceremonies, civil partnerships and outside ceremonies with stunning views.</li><li style="position: relative; list-style: none; padding-left: 10px;">This venue is a superb location for a Wedding Reception catering from 30 to 650 guests.</li></ul>', '2018-12-20 08:28:36', '2018-12-20 08:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
`id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1', '2018-12-20 08:10:23', '2018-12-20 08:11:41'),
(2, 'test2', 'test2', '2018-12-20 08:10:23', '2018-12-20 08:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
`id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instant_type` tinyint(4) NOT NULL COMMENT '1 WhatsApp, 2 Skype, 3 WeChat',
  `instant_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_sector` int(11) DEFAULT NULL,
  `company_status` tinyint(4) DEFAULT NULL COMMENT '1 Agent, 2 End User, 3 Reseller',
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `postal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_in` int(11) DEFAULT NULL,
  `data_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 Not filled , 1 Filled',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `user_id`, `unique_code`, `first_name`, `last_name`, `instant_type`, `instant_id`, `company_name`, `company_slug`, `business_sector`, `company_status`, `designation`, `contact_number`, `website`, `address1`, `address2`, `city`, `state`, `country`, `postal`, `buy_in`, `data_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 'LQ8H1u8XEn', 'praveen', 'Kumar', 1, '12889', 'Uni Worn India', 'uni-worn-india', 1, 2, NULL, '78765455566', NULL, 'udaipur sector 4 hian margir', '2234', 'Udaipur', 'Rajasthan', 5, '313000', 1, 1, NULL, '2018-12-13 18:30:00', '2018-12-13 00:32:39'),
(7, 13, '15Lrv9d1bd', 'tuhin', 'roy', 1, '12345', 'tfghf', 'tfghf', 5, 2, NULL, '456465', NULL, 'fdf', 'cvc', 'cvf', 'ul', 9, '12334', 1, 1, NULL, '2019-02-07 00:10:04', '2019-02-07 00:10:46'),
(8, 15, 'CfPrVO03Hy', 'buyer1', '1', 2, 'maruf.hossen2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-02-07 13:38:19', '2019-02-07 13:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_enquiries`
--

CREATE TABLE IF NOT EXISTS `buyer_enquiries` (
`id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_enquiries`
--

INSERT INTO `buyer_enquiries` (`id`, `user_id`, `buyer_id`, `name`, `phone`, `email_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'praveen', '78765455566', 'patelprem1992@gmail.com', 'eeee', '2018-12-14 07:36:31', '2018-12-14 07:36:31'),
(2, 5, 1, 'praveen', '78765455566', 'patelprem1992@gmail.com', 'sesere', '2018-12-14 07:37:47', '2018-12-14 07:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_f_a_qs`
--

CREATE TABLE IF NOT EXISTS `buyer_f_a_qs` (
`id` int(11) NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_f_a_qs`
--

INSERT INTO `buyer_f_a_qs` (`id`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(1, 'Can i see my post traffic ?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. ', '2019-01-23 18:30:00', '2019-01-23 18:30:00'),
(2, 'How i can manage my account?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.\r\n\r\nFood truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', '2019-01-24 18:30:00', '2019-01-24 18:30:00'),
(3, 'How i can manage my account?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.\r\n\r\nFood truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', '2019-01-24 18:30:00', '2019-01-24 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_helps`
--

CREATE TABLE IF NOT EXISTS `buyer_helps` (
`id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_helps`
--

INSERT INTO `buyer_helps` (`id`, `title`, `icon_class`, `short_description`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 'GFADGGA111', 'feature-icon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-01-24 11:03:25', '2019-01-24 11:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_posts`
--

CREATE TABLE IF NOT EXISTS `buyer_posts` (
`id` int(11) NOT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `unique_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` tinyint(4) NOT NULL COMMENT '1 Buy, 2 Sell',
  `product_type` tinyint(4) NOT NULL COMMENT '1 New, 2 Used',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_posts`
--

INSERT INTO `buyer_posts` (`id`, `buyer_id`, `unique_code`, `title`, `post_slug`, `description`, `post_type`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'aD2oBBEaMU', 'I want new Laptop', 'i-want-new-laptop', '<strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', 1, 1, '2018-12-13 00:02:48', '2018-12-13 00:02:48'),
(2, 1, 'jYftAu0SBc', 'Want to sell Eletro Machine', 'want-to-sell-eletro-machine', '<strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', 2, 2, '2018-12-13 00:03:18', '2018-12-13 00:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_profiles`
--

CREATE TABLE IF NOT EXISTS `buyer_profiles` (
`id` int(11) NOT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_profiles`
--

INSERT INTO `buyer_profiles` (`id`, `buyer_id`, `logo`, `profile_description`) VALUES
(1, 1, 'uploads/buyercompanylogo/button-app-store.png', '<h2 style="padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: rgb(0, 0, 0);">Why do we use it?</h2><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
(2, 7, 'uploads/buyercompanylogo/15822984_1431233476910792_1119045870190829545_n.jpg', '<p>hi</p>');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_safeties`
--

CREATE TABLE IF NOT EXISTS `buyer_safeties` (
`id` int(11) NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_safeties`
--

INSERT INTO `buyer_safeties` (`id`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-01-24 12:03:29', '2019-01-24 12:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_traffics`
--

CREATE TABLE IF NOT EXISTS `buyer_traffics` (
`id` int(11) NOT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_traffics`
--

INSERT INTO `buyer_traffics` (`id`, `buyer_id`, `ip_address`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 1, '::1', 'http://localhost/kce/public/buyer-post/i-want-new-laptopaD2oBBEaMU', '2018-12-14 09:31:53', '2018-12-14 09:31:53'),
(2, 1, '::1', 'http://localhost/kce/public/buyer/uni-worn-india/LQ8H1u8XEn', '2018-12-14 09:38:01', '2018-12-14 09:38:01'),
(3, 1, '::1', 'http://localhost/kce/public/buyer-post/want-to-sell-eletro-machine/jYftAu0SBc', '2019-01-14 09:26:58', '2019-01-14 09:26:58'),
(4, 1, '::1', 'http://localhost/kce/public/buyer-post/want-to-sell-eletro-machine/jYftAu0SBc', '2019-01-14 09:27:19', '2019-01-14 09:27:19'),
(5, 1, '185.93.230.17', 'http://www.bogorfashions.com/buyer-post/i-want-new-laptop/aD2oBBEaMU', '2019-02-01 15:57:16', '2019-02-01 15:57:16'),
(6, 1, '185.93.230.17', 'http://www.bogorfashions.com/buyer-post/want-to-sell-eletro-machine/jYftAu0SBc', '2019-02-01 15:57:16', '2019-02-01 15:57:16'),
(7, 1, '66.248.202.17', 'http://www.bogorfashions.com/buyer-post/i-want-new-laptop/aD2oBBEaMU', '2019-02-02 02:21:03', '2019-02-02 02:21:03'),
(8, 1, '66.248.203.17', 'http://bogorfashions.com/buyer-post/want-to-sell-eletro-machine/jYftAu0SBc', '2019-02-04 03:10:39', '2019-02-04 03:10:39'),
(9, 1, '185.93.230.17', 'http://bogorfashions.com/buyer-post/i-want-new-laptop/aD2oBBEaMU', '2019-02-05 06:41:35', '2019-02-05 06:41:35'),
(10, 1, '66.248.203.17', 'http://bogorfashions.com/buyer-post/i-want-new-laptop/aD2oBBEaMU', '2019-02-06 08:07:08', '2019-02-06 08:07:08'),
(11, 1, '66.248.203.17', 'http://bogorfashions.com/buyer-post/want-to-sell-eletro-machine/jYftAu0SBc', '2019-02-06 08:07:08', '2019-02-06 08:07:08'),
(12, 1, '66.248.202.17', 'http://www.bogorfashions.com/buyer-post/i-want-new-laptop/aD2oBBEaMU', '2019-02-07 13:48:27', '2019-02-07 13:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `city_name`, `city_slug`, `deleted_at`) VALUES
(1, 1, 'Udaipur', 'udaipur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_flag` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_flag`, `country_slug`) VALUES
(1, 'Benin', 'uploads/country/benin.png', 'benin'),
(2, 'Angola', 'uploads/country/angola-flag.png', 'angola'),
(3, 'Algeria', 'uploads/country/algeria-flag.png', 'algeria'),
(4, 'Burundi', 'uploads/country/burundi.png', 'burundi'),
(5, 'Burkina Faso', 'uploads/country/burkina-faso.png', 'burkina-faso'),
(6, 'Cameroon', 'uploads/country/cameroon.png', 'cameroon'),
(7, 'Botswana', 'uploads/country/botswana.png', 'botswana'),
(8, 'Cape Verde', 'uploads/country/cape-verde.png', 'cape-verde'),
(9, 'Chad', 'uploads/country/chad.png', 'chad'),
(10, 'Congo', 'uploads/country/democratic-republic-of-congo.png', 'congo'),
(11, 'Djibouti', 'uploads/country/djibouti.png', 'djibouti'),
(12, 'Egypt', 'uploads/country/egypt.png', 'egypt');

-- --------------------------------------------------------

--
-- Table structure for table `country_listings`
--

CREATE TABLE IF NOT EXISTS `country_listings` (
`id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_listings`
--

INSERT INTO `country_listings` (`id`, `country_id`, `title`, `slug`, `price`, `description`, `featured_image`, `upload_file`, `created_at`, `updated_at`) VALUES
(1, 3, 'Alegria Business Diectory', 'alegria-business-diectory', '300.00', '<h3 style="margin-top: 15px; margin-bottom: 15px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">The standard Lorem Ipsum passage, used since the 1500s</h3><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3 style="margin-top: 15px; margin-bottom: 15px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>', 'uploads/countrylisting/vishwakarma-puja5.jpg', 'uploads/countrylisting_pdf/Application Shipments.pptx', '2018-12-13 01:18:22', '2018-12-13 01:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `country_listing_features`
--

CREATE TABLE IF NOT EXISTS `country_listing_features` (
`id` int(11) NOT NULL,
  `country_listing_id` int(10) unsigned NOT NULL,
  `feature_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_listing_features`
--

INSERT INTO `country_listing_features` (`id`, `country_listing_id`, `feature_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Top Business numbers', '2018-12-13 01:18:22', '2018-12-13 01:18:22'),
(2, 1, 'Execl and pdf list', '2018-12-13 01:18:22', '2018-12-13 01:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `country_purchases`
--

CREATE TABLE IF NOT EXISTS `country_purchases` (
`id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `invoice_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_purchases`
--

INSERT INTO `country_purchases` (`id`, `country_id`, `invoice_no`, `email_id`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'CD20181213642', 'darkmat13r-buyer1@gmail.com', '300.00', '2018-12-13 04:40:32', '2018-12-13 04:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `join_communities`
--

CREATE TABLE IF NOT EXISTS `join_communities` (
`id` int(11) NOT NULL,
  `fb` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_communities`
--

INSERT INTO `join_communities` (`id`, `fb`, `twitter`, `whatsapp`, `gplus`, `instagram`) VALUES
(1, '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `knowtos`
--

CREATE TABLE IF NOT EXISTS `knowtos` (
`id` int(11) NOT NULL,
  `known_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowtos`
--

INSERT INTO `knowtos` (`id`, `known_name`) VALUES
(1, 'Friends'),
(2, 'Referral'),
(3, 'Online'),
(4, 'Email'),
(5, 'Tv Ad'),
(6, 'Radio'),
(7, 'Social Media'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(11) NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_23_054357_create_permission_tables', 1),
(4, '2018_11_23_115712_create_countries_table', 1),
(5, '2018_11_24_051340_create_cities_table', 1),
(6, '2018_11_24_103323_create_product_categories_table', 1),
(7, '2018_11_24_103346_create_product_sub_categories_table', 1),
(8, '2018_11_30_073145_create_sellers_table', 1),
(9, '2018_11_30_082840_create_buyers_table', 1),
(10, '2018_12_02_110050_create_seller_plans_table', 1),
(11, '2018_12_03_092442_create_products_table', 1),
(12, '2018_12_03_092443_create_product_images_table', 1),
(13, '2018_12_04_110054_create_buyer_posts_table', 1),
(14, '2018_12_06_050721_create_knowtos_table', 1),
(15, '2018_12_06_063550_create_seller_profiles_table', 1),
(16, '2018_12_06_085304_create_sector_categories_table', 1),
(17, '2018_12_06_112320_create_country_listings_table', 1),
(18, '2018_12_06_112342_create_sector_listings_table', 1),
(19, '2018_12_06_112529_create_country_listing_features_table', 1),
(20, '2018_12_06_112558_create_sector_listing_features_table', 1),
(21, '2018_12_07_065442_create_join_communities_table', 1),
(22, '2018_12_08_052856_create_news_categories_table', 1),
(23, '2018_12_08_052857_create_news_table', 1),
(24, '2018_12_08_072519_create_banners_table', 1),
(25, '2018_12_09_040841_create_website_profiles_table', 1),
(26, '2018_12_09_074158_create_buyer_profiles_table', 1),
(27, '2018_12_10_121053_create_website_enquiries_table', 1),
(28, '2018_12_11_114103_create_seller_purchase_plans_table', 1),
(29, '2018_12_13_070219_create_sector_purchases_table', 1),
(30, '2018_12_13_094901_create_country_purchases_table', 1),
(31, '2018_12_14_102844_create_seller_enquiries_table', 1),
(32, '2018_12_14_124042_create_buyer_enquiries_table', 1),
(33, '2018_12_14_143606_create_seller_traffics_table', 1),
(34, '2018_12_14_144123_create_buyer_traffics_table', 1),
(35, '2018_12_20_133122_create_blog_categories_table', 1),
(36, '2018_12_20_133329_create_blogs_table', 1),
(37, '2019_01_24_092725_create_seller_helps_table', 1),
(38, '2019_01_24_092808_create_seller_f_a_qs_table', 1),
(39, '2019_01_24_092820_create_seller_safeties_table', 1),
(40, '2019_01_24_092833_create_buyer_safeties_table', 1),
(41, '2019_01_24_092850_create_buyer_helps_table', 1),
(42, '2019_01_24_092859_create_buyer_f_a_qs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(3, 'App\\User', 10),
(2, 'App\\User', 11),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(3, 'App\\User', 14),
(2, 'App\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `unique_code`, `title`, `slug`, `featured_image`, `short_description`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 1, '8CY8D4qSeE', 'Latin words combined with a handful of model', 'latin-words-combined-with-a-handful-of-model', 'uploads/news/post-pic.jpg', 'Quisque laoreet mi libero, et tempus lacus venenatis eget. Nulla vitaeipsum inturpis blandit congue ofer ornare inleo. Nulla nibhmi sagittis necaliquet pharetra vitae turpis. Nam tristique mauris necultricies its tristiqu. orbilitelit molestie eget tincidunt luctus consequat sitameturna.', '<h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Venue Details</h2><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which one looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non characteristic words etc.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Quisque laoreet mi libero, et tempus lacus venenatis eget. Nulla vitaeipsum inturpis blandit congue ofer ornare inleo. Nulla nibhmi sagittis necaliquet pharetra vitae turpis. Nam tristique mauris necultricies its tristiqu. orbilitelit molestie eget tincidunt luctus consequat sitameturna.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Aenean sapienest, rutrum malesuada quamuis tristique tincinibh hasellusut elementum not semlass and aptent taciti sociosqu ad litorarutrum malesuada quamuis tristique torquent per conubia nostra permite inceptos our its it himenaeos aecsed laoreet diam. Crasut auctor ipsusque commodo suscipit onet tristiques viverrarcu idaugue blandit ultricies nibhrhoncus rutrum malesuada tristique.</p><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);">Latin words combined with a handful of model sentence structures to generate Loremere Ipsum which looks reasonable. The generated lorem Ipsum is therefore always free fromes combined with a handful of model repetition injected humour or non characteristic words etc.</p><h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Venue Facilities</h2><ul class="check-circle" style="margin-bottom: 30px; padding: 0px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);"><li style="position: relative; list-style: none; padding-left: 10px;">Wedding Hall</li><li style="position: relative; list-style: none; padding-left: 10px;">Dining</li><li style="position: relative; list-style: none; padding-left: 10px;">Liability Insurance</li><li style="position: relative; list-style: none; padding-left: 10px;">In House Catering</li><li style="position: relative; list-style: none; padding-left: 10px;">Dining</li><li style="position: relative; list-style: none; padding-left: 10px;">DJ Facilities</li><li style="position: relative; list-style: none; padding-left: 10px;">Personal Chef</li><li style="position: relative; list-style: none; padding-left: 10px;">Guest Parking</li><li style="position: relative; list-style: none; padding-left: 10px;">Seating Amenities</li></ul><h2 style="font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); margin-top: 0px; font-size: 22px; -webkit-font-smoothing: antialiased; background-color: rgb(250, 249, 245);">Why Our Wedding Venue</h2><ul class="check-circle" style="margin-bottom: 30px; padding: 0px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(250, 249, 245);"><li style="position: relative; list-style: none; padding-left: 10px;">Wedding parties have exclusive use of the venue for the day</li><li style="position: relative; list-style: none; padding-left: 10px;">Last Minute Offer £3,800 inc VAT for any wedding booked in the next 8 weeks.</li><li style="position: relative; list-style: none; padding-left: 10px;">Licensed for civil ceremonies, civil partnerships and outside ceremonies with stunning views.</li><li style="position: relative; list-style: none; padding-left: 10px;">This venue is a superb location for a Wedding Reception catering from 30 to 650 guests.</li></ul>', '2018-12-20 13:26:08', '2018-12-20 07:56:08'),
(2, 2, 'F8A331M9qz', 'Create Task & Manage To-Dos', 'create-task-manage-to-dos', 'uploads/news/post-pic-2.jpg', 'Get organized! Start with a checklist that''s personalized based on your wedding date and check off items as you complete them', '<h1 style="margin-top: 0px; font-size: 30px; font-family: Montserrat, sans-serif; color: rgb(60, 54, 52); -webkit-font-smoothing: antialiased; text-align: center; background-color: rgb(250, 249, 245);">Customize &amp; Arrange Your To-Dos</h1><p style="margin-bottom: 20px; color: rgb(112, 106, 104); font-family: Roboto, sans-serif; font-size: 16px; text-align: center; background-color: rgb(250, 249, 245);">Your wedding, your to-dos. Edit a task name, due date and notes to make it your own. Or easily add new items as you go to keep all of your wedding to-dos in one place!</p><a href="file:///G:/workline/htdocs/kce/public/webtheme/planning-to-do.html#" class="btn-link" style="background-color: rgb(250, 249, 245); color: rgb(0, 175, 176); transition: all 0.3s ease 0s; -webkit-font-smoothing: antialiased; font-family: Montserrat, sans-serif; text-transform: uppercase; font-size: 16px; text-align: center;">GET STARTED</a>', '2018-12-20 13:26:04', '2018-12-20 07:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
`id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Apparel & Fasion', 'apparel-fasion', '2018-12-11 11:47:29', '2018-12-11 11:47:29'),
(2, 'African Markets', 'african-markets', '2018-12-11 11:47:29', '2018-12-11 11:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('patelprem1992@gmail.com', '$2y$10$C5VmEjoLNHGm460ZXYPBp..0O.79yCFrOukjZxf1kWlB8Je2cdrim', '2018-12-14 05:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` tinyint(4) NOT NULL COMMENT '1 Buy, 2 Sell',
  `product_type` tinyint(4) NOT NULL COMMENT '1 New, 2 Used',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `unique_code`, `product_name`, `product_price`, `short_description`, `full_description`, `product_slug`, `featured_image`, `post_type`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'gbfPsG7m76', 'Water Pump', '500.00', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', '<h2 style="padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: rgb(0, 0, 0);">What is Lorem Ipsum?</h2><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'water-pump', 'uploads/products/featured/location-pic.jpg', 1, 1, '2018-12-05 18:30:00', '2018-12-14 18:30:00'),
(2, 1, 'rsAToprDU2', 'Genrate Engine', '300.00', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', '<h2 style="padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: rgb(0, 0, 0);">What is Lorem Ipsum?</h2><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'genrate-engine', 'uploads/products/featured/location-pic-3.jpg', 1, 2, '2018-12-05 18:30:00', '2018-12-20 18:30:00'),
(3, 2, 'gd2Ws7WNbe', 'Assemble Dry Licud Machine', '300.00', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', '<div><span style="font-family: DauphinPlain; font-size: 24px;">Where does it come from?</span><br></div><div><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English&nbsp;</p></div>', 'assemble-dry-licud-machine', 'uploads/products/featured/location-pic-2.jpg', 2, 1, '2018-12-20 18:30:00', '2018-12-20 18:30:00'),
(4, 1, '8BmTLArzr6', 'Want to buy Redwood machie', '230.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore', '<p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span></p>', 'want-to-buy-redwood-machie', 'uploads/products/featured/e132341771d717c4f84f2e0b93b4a514.jpg', 1, 1, '2018-12-16 00:50:20', '2018-12-16 00:50:20'),
(5, 1, 'ZecIGArOWg', 'Sell Used xray Machine', '320.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore', '<p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span></p>', 'sell-used-xray-machine', 'uploads/products/featured/Dhanteras-HD-Images.jpg', 1, 1, '2018-12-16 00:51:16', '2018-12-16 00:51:16'),
(6, 2, '7ZlHLlMxj5', 'Want to buy New Tractor', '4900.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore', '<p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span></p><p><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna aliqi ora incidunt ut labore et dolore</span><span style="color: rgb(128, 128, 128); font-family: Roboto, Arial, Tahoma, sans-serif;"><br></span></p>', 'want-to-buy-new-tractor', 'uploads/products/featured/small-business.jpg', 1, 1, '2018-12-16 00:54:30', '2018-12-16 00:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
`id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_img` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `thumb_img`, `category_slug`) VALUES
(1, 'Agriculture', 'uploads/category/Agriculture.jpg', 'agriculture'),
(2, 'Automobile Parts', 'uploads/category/Electrical & Electronics.jpg', 'automobile-parts'),
(3, 'Computers & IT', 'uploads/category/Computers & IT.jpg', 'computers-it'),
(4, 'Home Appliances', 'uploads/category/Home Appliances.jpg', 'home-appliances'),
(5, 'Logistics', 'uploads/category/Logistics.png', 'logistics'),
(6, 'Food and Beverrages', 'uploads/category/food-632806_1920-800x533.jpg', 'food-and-beverrages'),
(7, 'Gifts and Novelties', 'uploads/category/gifts-novelties-500x500.jpg', 'gifts-and-novelties'),
(8, 'handicraft products', 'uploads/category/colorful-design-rajasthani-umbrella-handicraft-216-500x500.jpg', 'handicraft-products'),
(9, 'Construction & Real Estate', 'uploads/category/ConstructionRealEstate.jpg', 'construction-real-estate'),
(10, 'Electronics & Electrical', 'uploads/category/Electronics & Electrical.jpg', 'electronics-electrical'),
(11, 'Exhibitions & Trade Fairs', 'uploads/category/Exhibitions & Trade Fairs.jpg', 'exhibitions-trade-fairs'),
(12, 'Foodstuff & Beverages', 'uploads/category/food-632806_1920-800x533.jpg', 'foodstuff-beverages');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
`id` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 'uploads/products/location-pic.jpg', '2018-12-12 06:35:24', '2018-12-12 06:35:24'),
(2, 5, 'uploads/products/location-pic-3.jpg', '2018-12-12 06:36:17', '2018-12-12 06:36:41'),
(3, 6, 'uploads/products/location-pic-2.jpg', '2018-12-12 06:37:14', '2018-12-12 06:37:14'),
(4, 7, 'uploads/products/e132341771d717c4f84f2e0b93b4a514.jpg', '2018-12-16 00:50:20', '2018-12-16 00:50:20'),
(5, 8, 'uploads/products/Dhanteras-HD-Images.jpg', '2018-12-16 00:51:16', '2018-12-16 00:51:16'),
(6, 9, 'uploads/products/small-business.jpg', '2018-12-16 00:54:30', '2018-12-16 00:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE IF NOT EXISTS `product_sub_categories` (
`id` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `sub_cat_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_cat_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `category_id`, `sub_cat_name`, `sub_cat_slug`, `deleted_at`) VALUES
(1, 1, 'sub category', 'sub-category', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-01-24 09:56:24', '2019-01-24 09:56:24'),
(2, 'buyer', 'web', '2019-01-24 09:56:24', '2019-01-24 09:56:24'),
(3, 'seller', 'web', '2019-01-24 09:56:24', '2019-01-24 09:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sector_categories`
--

CREATE TABLE IF NOT EXISTS `sector_categories` (
`id` int(11) NOT NULL,
  `sector_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sector_categories`
--

INSERT INTO `sector_categories` (`id`, `sector_name`, `sector_slug`, `image`) VALUES
(1, 'Travel Agency', 'travel-agency', 'uploads/listing/travel-agency.png'),
(2, 'Share Marketing', 'share-marketing', 'uploads/listing/smartphone.png'),
(3, 'Laboratory', 'laboratory', 'uploads/listing/flask (2).png'),
(4, 'Wedding Agency', 'wedding-agency', 'uploads/listing/rings.png');

-- --------------------------------------------------------

--
-- Table structure for table `sector_listings`
--

CREATE TABLE IF NOT EXISTS `sector_listings` (
`id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sector_listings`
--

INSERT INTO `sector_listings` (`id`, `sector_id`, `title`, `slug`, `price`, `description`, `featured_image`, `upload_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Travel Agency', 'travel-agency', '100.00', '<h3 style="margin-top: 15px; margin-bottom: 15px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">The standard Lorem Ipsum passage, used since the 1500s</h3><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3 style="margin-top: 15px; margin-bottom: 15px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>', 'uploads/sectorlisting/screenshot.png', 'uploads/sectorlisting_pdf/Sql Query.txt', '2018-12-13 01:19:18', '2018-12-13 01:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `sector_listing_features`
--

CREATE TABLE IF NOT EXISTS `sector_listing_features` (
`id` int(11) NOT NULL,
  `sector_listing_id` int(10) unsigned NOT NULL,
  `feature_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sector_listing_features`
--

INSERT INTO `sector_listing_features` (`id`, `sector_listing_id`, `feature_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Top Business numbers', '2018-12-13 01:19:18', '2018-12-13 01:19:18'),
(2, 1, 'Execl and pdf list', '2018-12-13 01:19:18', '2018-12-13 01:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `sector_purchases`
--

CREATE TABLE IF NOT EXISTS `sector_purchases` (
`id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `invoice_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sector_purchases`
--

INSERT INTO `sector_purchases` (`id`, `sector_id`, `invoice_no`, `email_id`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'SD20181213995', 'darkmat13r-buyer1@gmail.com', '100.00', '2018-12-13 04:37:31', '2018-12-13 04:37:31'),
(2, 1, 'SD20181213686', 'darkmat13r-buyer1@gmail.com', '100.00', '2018-12-13 04:39:53', '2018-12-13 04:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
`id` int(11) NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instant_type` tinyint(4) NOT NULL COMMENT '1 WhatsApp, 2 Skype, 3 WeChat',
  `instant_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_sector` int(11) DEFAULT NULL COMMENT 'category id',
  `company_status` tinyint(4) DEFAULT NULL COMMENT '1 Manufacturer, 2 Exporter',
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `postal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_in` tinyint(4) DEFAULT NULL COMMENT '1 In africa, 2 in Global',
  `data_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 Not filled , 1 Filled',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `unique_code`, `user_id`, `first_name`, `last_name`, `instant_type`, `instant_id`, `company_name`, `company_slug`, `business_sector`, `company_status`, `designation`, `contact_number`, `website`, `address1`, `address2`, `city`, `state`, `country`, `postal`, `sell_in`, `data_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '37J1LBTQxv', 5, 'Praveen', 'Patel', 1, 'dsg', 'Object Developer', 'object-developer', 1, 2, NULL, '78765455566', NULL, 'udaipur sector 4 hian margir', 'Sector -2', 'Udaipur', 'Rajasthan', 5, '313000', 1, 1, NULL, '2018-12-13 18:30:00', '2018-12-12 10:56:50'),
(2, 'xO48gs8VYi', 7, 'Praveen', 'Web', 1, 'dsg', 'Uni Worn India', 'uni-worn-india', 1, 2, NULL, '78765455566', 'www.demo.com', 'udaipur sector 4 hian margir', '2234', 'Udaipur', 'Rajasthan', 3, '313000', 1, 1, NULL, '2019-01-14 10:17:03', '2019-01-14 10:18:14'),
(6, 'KVO1q8avxw', 14, 'Seller', '1', 2, 'maruf.hossen2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-02-07 05:23:56', '2019-02-07 05:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `seller_enquiries`
--

CREATE TABLE IF NOT EXISTS `seller_enquiries` (
`id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_enquiries`
--

INSERT INTO `seller_enquiries` (`id`, `user_id`, `seller_id`, `name`, `phone`, `email_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 'praveen', '78765455566', 'patelprem1992@gmail.com', 'et', '2018-12-14 07:20:17', '2018-12-14 07:20:17'),
(2, 5, 4, 'praveen', '78765455566', 'patelprem1992@gmail.com', 'erer', '2018-12-14 07:20:36', '2018-12-14 07:20:36'),
(3, 14, 2, 'test', '98999', 'marufhossen23@gmail.com', 'maruf', '2019-02-07 13:34:08', '2019-02-07 13:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `seller_f_a_qs`
--

CREATE TABLE IF NOT EXISTS `seller_f_a_qs` (
`id` int(11) NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_f_a_qs`
--

INSERT INTO `seller_f_a_qs` (`id`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(1, 'How you can create register?', 'Laoreet turpis non eleifend felis tortor qui diam praesented feugiat min metus tempofaucibus maecenas consectetur miat curabitur hender fringilla enim a accumsan turpis aliquamc fringilla nulla hendrerit leo eget suscipit rhoncus sed at ipsum consequat ac orci a semper act interdum elit cras elit magna vivera dictum laoreet tincidunt auctor eu at maecen consectetur curabitur hendrerit fringilla leo eget lorem ipsum.', '2019-01-24 10:54:19', '2019-01-24 11:05:32'),
(3, 'Is it free for find products ?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', '2019-01-24 18:30:00', '2019-01-24 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `seller_helps`
--

CREATE TABLE IF NOT EXISTS `seller_helps` (
`id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_helps`
--

INSERT INTO `seller_helps` (`id`, `title`, `icon_class`, `short_description`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 'General Question', 'feature-icon', 'Suspendisse potentionec nec lorem elementustibulum varius.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-01-24 10:50:56', '2019-01-24 11:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `seller_plans`
--

CREATE TABLE IF NOT EXISTS `seller_plans` (
`id` int(11) NOT NULL,
  `plan_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_plans`
--

INSERT INTO `seller_plans` (`id`, `plan_name`, `charge`, `plan_month`, `description`) VALUES
(1, 'Basic', '50', '12', 'Normal Listing in 1 Category\r\nUpload 10 Product Images\r\nSend Emails to 100 Contacts\r\n24/7 Support'),
(2, 'Silver', '100', '12', 'Featured Listing in 1 Category\r\nListing in Top Section of Category\r\nHigher Search Results Rankings\r\nUpload 10 Product Images\r\nSend Emails to 200 Contacts\r\n24/7 Support'),
(3, 'Premium', '200', '12', 'Featured Listing in 1 Category\r\nListing in Top Section of Category\r\nHigher Search Results Rankings\r\nLink to Listing in Category Sidebar\r\nUpload 10 Product Images\r\nRotating Link on Home Page\r\nSend Emails to 200 Contacts\r\nHigher visibility\r\n24/7 Support');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profiles`
--

CREATE TABLE IF NOT EXISTS `seller_profiles` (
`id` int(11) NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_profiles`
--

INSERT INTO `seller_profiles` (`id`, `seller_id`, `logo`, `profile_description`) VALUES
(1, 2, 'uploads/companylogo/5bf45826ede21.image.jpg', '<h2 style="padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: rgb(0, 0, 0);">Why do we use it COmpany?</h2><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
(2, 1, 'uploads/companylogo/food-632806_1920-800x533.jpg', '<p><span style="color: rgb(112, 106, 104); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `seller_purchase_plans`
--

CREATE TABLE IF NOT EXISTS `seller_purchase_plans` (
`id` int(11) NOT NULL,
  `plan_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `invoice_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `plan_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 inactive, 1 active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_purchase_plans`
--

INSERT INTO `seller_purchase_plans` (`id`, `plan_id`, `seller_id`, `invoice_no`, `purchase_price`, `start_date`, `end_date`, `plan_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 4, 'SP20181213629', '200.00', '2018-12-13', '2019-12-13', 1, '2018-12-13 05:15:46', '2018-12-13 05:15:46', NULL),
(2, 3, 5, 'SP20181213630', '200.00', '2019-01-14', '2019-04-13', 1, '2019-01-16 18:30:00', '2019-01-24 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_safeties`
--

CREATE TABLE IF NOT EXISTS `seller_safeties` (
`id` int(11) NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_safeties`
--

INSERT INTO `seller_safeties` (`id`, `full_description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2019-01-24 12:06:49', '2019-01-24 12:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `seller_traffics`
--

CREATE TABLE IF NOT EXISTS `seller_traffics` (
`id` int(11) NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_traffics`
--

INSERT INTO `seller_traffics` (`id`, `seller_id`, `ip_address`, `page_name`, `created_at`, `updated_at`) VALUES
(6, 4, '192.119.164.128', 'http://www.kce.top5outlet.com/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-17 18:49:09', '2018-12-17 18:49:09'),
(7, 4, '192.119.164.128', 'http://www.kce.top5outlet.com/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-17 18:49:21', '2018-12-17 18:49:21'),
(8, 4, '216.185.45.101', 'http://kce.top5outlet.com/public/seller-product/water-pump/gbfPsG7m76', '2018-12-18 05:08:01', '2018-12-18 05:08:01'),
(9, 4, '216.185.45.101', 'http://kce.top5outlet.com/public/seller-product/water-pump/gbfPsG7m76', '2018-12-18 05:08:11', '2018-12-18 05:08:11'),
(10, 4, '216.185.45.141', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-18 07:56:27', '2018-12-18 07:56:27'),
(11, 4, '216.185.45.141', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-18 07:56:37', '2018-12-18 07:56:37'),
(12, 4, '216.185.45.141', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2018-12-18 08:03:17', '2018-12-18 08:03:17'),
(13, 4, '216.185.45.141', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2018-12-18 08:03:33', '2018-12-18 08:03:33'),
(14, 4, '45.56.194.117', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2018-12-18 22:16:11', '2018-12-18 22:16:11'),
(15, 4, '45.56.194.117', 'http://kce.top5outlet.com/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2018-12-18 22:16:29', '2018-12-18 22:16:29'),
(16, 4, '216.185.45.164', 'http://kce.top5outlet.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-20 23:09:38', '2018-12-20 23:09:38'),
(17, 4, '216.185.45.164', 'http://kce.top5outlet.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-20 23:09:49', '2018-12-20 23:09:49'),
(18, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2018-12-23 08:33:58', '2018-12-23 08:33:58'),
(19, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2018-12-23 08:34:16', '2018-12-23 08:34:16'),
(20, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/genrate-engine/rsAToprDU2', '2018-12-23 08:34:21', '2018-12-23 08:34:21'),
(21, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2018-12-23 08:34:51', '2018-12-23 08:34:51'),
(22, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2018-12-23 08:35:26', '2018-12-23 08:35:26'),
(23, 4, '54.165.90.203', 'http://kce.top5outlet.com/seller-product/water-pump/gbfPsG7m76', '2018-12-23 08:35:39', '2018-12-23 08:35:39'),
(24, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2018-12-23 02:51:47', '2018-12-23 02:51:47'),
(25, 4, '::1', 'http://localhost/kce/public/supplier/Object Developer/37J1LBTQxv', '2018-12-23 02:52:26', '2018-12-23 02:52:26'),
(26, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:11:28', '2019-01-14 09:11:28'),
(27, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:12:01', '2019-01-14 09:12:01'),
(28, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:12:06', '2019-01-14 09:12:06'),
(29, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:12:51', '2019-01-14 09:12:51'),
(30, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:24:00', '2019-01-14 09:24:00'),
(31, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:26:10', '2019-01-14 09:26:10'),
(32, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-14 09:26:24', '2019-01-14 09:26:24'),
(33, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-14 09:26:36', '2019-01-14 09:26:36'),
(34, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-14 09:26:52', '2019-01-14 09:26:52'),
(35, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-14 10:18:32', '2019-01-14 10:18:32'),
(36, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-23 22:09:30', '2019-01-23 22:09:30'),
(37, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-23 22:10:01', '2019-01-23 22:10:01'),
(38, 4, '::1', 'http://localhost/kce/public/supplier/object-developer/37J1LBTQxv', '2019-01-23 22:12:25', '2019-01-23 22:12:25'),
(39, 4, '::1', 'http://localhost/kce/public/seller-product/water-pump/gbfPsG7m76', '2019-01-25 04:06:20', '2019-01-25 04:06:20'),
(40, 4, '::1', 'http://localhost/kce/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-25 04:06:29', '2019-01-25 04:06:29'),
(41, 4, '::1', 'http://localhost/kce/public/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-25 04:06:39', '2019-01-25 04:06:39'),
(42, 4, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 04:07:06', '2019-01-25 04:07:06'),
(43, 5, '::1', 'http://localhost/kce/public/supplier/uni-worn-india/xO48gs8VYi', '2019-01-25 04:07:18', '2019-01-25 04:07:18'),
(44, 2, '::1', 'http://localhost/kce/public/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-25 05:33:36', '2019-01-25 05:33:36'),
(45, 1, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 05:34:19', '2019-01-25 05:34:19'),
(46, 1, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 05:36:03', '2019-01-25 05:36:03'),
(47, 1, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 05:37:12', '2019-01-25 05:37:12'),
(48, 1, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 05:37:23', '2019-01-25 05:37:23'),
(49, 1, '::1', 'http://localhost/kce/public/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-25 05:37:33', '2019-01-25 05:37:33'),
(50, 2, '::1', 'http://localhost/kce/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-25 05:37:48', '2019-01-25 05:37:48'),
(51, 2, '::1', 'http://localhost/kce/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-25 05:38:20', '2019-01-25 05:38:20'),
(52, 2, '::1', 'http://localhost/kce/public/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-25 05:38:25', '2019-01-25 05:38:25'),
(53, 2, '::1', 'http://localhost/kce/public/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-25 05:38:29', '2019-01-25 05:38:29'),
(54, 2, '::1', 'http://localhost/kce/public/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-25 05:47:18', '2019-01-25 05:47:18'),
(55, 1, '::1', 'http://localhost/kce/public/seller-product/genrate-engine/rsAToprDU2', '2019-01-25 06:24:43', '2019-01-25 06:24:43'),
(56, 2, '::1', 'http://localhost/kce/public/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-25 23:39:36', '2019-01-25 23:39:36'),
(57, 2, '192.99.47.111', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-26 23:37:37', '2019-01-26 23:37:37'),
(58, 2, '89.234.68.90', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-28 03:19:56', '2019-01-28 03:19:56'),
(59, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-28 11:15:24', '2019-01-28 11:15:24'),
(60, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-01-28 11:15:35', '2019-01-28 11:15:35'),
(61, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-01-28 11:15:48', '2019-01-28 11:15:48'),
(62, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-28 11:16:03', '2019-01-28 11:16:03'),
(63, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-28 11:16:23', '2019-01-28 11:16:23'),
(64, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-28 11:16:37', '2019-01-28 11:16:37'),
(65, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-28 18:28:44', '2019-01-28 18:28:44'),
(66, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-01-28 18:28:50', '2019-01-28 18:28:50'),
(67, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-01-28 18:28:58', '2019-01-28 18:28:58'),
(68, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-28 18:29:10', '2019-01-28 18:29:10'),
(69, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-28 18:29:31', '2019-01-28 18:29:31'),
(70, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-28 18:29:37', '2019-01-28 18:29:37'),
(71, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-28 19:18:32', '2019-01-28 19:18:32'),
(72, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-01-28 19:18:42', '2019-01-28 19:18:42'),
(73, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-01-28 19:18:55', '2019-01-28 19:18:55'),
(74, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-28 19:19:10', '2019-01-28 19:19:10'),
(75, 2, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-28 19:19:20', '2019-01-28 19:19:20'),
(76, 1, '184.94.240.92', 'http://www.bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-28 19:19:27', '2019-01-28 19:19:27'),
(77, 2, '66.248.202.17', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-29 00:51:36', '2019-01-29 00:51:36'),
(78, 2, '66.248.202.17', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-29 00:54:16', '2019-01-29 00:54:16'),
(79, 2, '66.248.202.17', 'http://bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-29 01:20:52', '2019-01-29 01:20:52'),
(80, 2, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-29 17:44:09', '2019-01-29 17:44:09'),
(81, 1, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-01-29 17:44:21', '2019-01-29 17:44:21'),
(82, 1, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-01-29 17:44:32', '2019-01-29 17:44:32'),
(83, 2, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-01-29 17:44:47', '2019-01-29 17:44:47'),
(84, 2, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-29 17:45:01', '2019-01-29 17:45:01'),
(85, 1, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-01-29 17:45:13', '2019-01-29 17:45:13'),
(86, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-01-31 03:05:42', '2019-01-31 03:05:42'),
(87, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-01-31 03:07:17', '2019-01-31 03:07:17'),
(88, 2, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-01 15:56:38', '2019-02-01 15:56:38'),
(89, 1, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-02-01 15:56:39', '2019-02-01 15:56:39'),
(90, 2, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-01 15:56:39', '2019-02-01 15:56:39'),
(91, 1, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-02-01 15:56:40', '2019-02-01 15:56:40'),
(92, 1, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-02-01 15:56:40', '2019-02-01 15:56:40'),
(93, 2, '185.93.230.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-01 15:56:41', '2019-02-01 15:56:41'),
(94, 1, '185.93.230.17', 'http://www.bogorfashions.com/supplier/object-developer/37J1LBTQxv', '2019-02-01 15:57:20', '2019-02-01 15:57:20'),
(95, 2, '185.93.230.17', 'http://www.bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-01 15:57:21', '2019-02-01 15:57:21'),
(96, 1, '185.93.230.17', 'http://bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-02-01 17:05:11', '2019-02-01 17:05:11'),
(97, 1, '185.93.230.17', 'http://bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-02-01 17:05:23', '2019-02-01 17:05:23'),
(98, 2, '185.93.229.17', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-02 00:10:30', '2019-02-02 00:10:30'),
(99, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-02 02:12:46', '2019-02-02 02:12:46'),
(100, 2, '185.93.230.17', 'http://bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-03 11:31:00', '2019-02-03 11:31:00'),
(101, 1, '185.93.230.17', 'http://bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-02-03 12:37:31', '2019-02-03 12:37:31'),
(102, 2, '185.93.230.17', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-03 22:22:20', '2019-02-03 22:22:20'),
(103, 1, '185.93.229.17', 'http://www.bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-02-04 08:03:18', '2019-02-04 08:03:18'),
(104, 1, '185.93.230.17', 'http://bogorfashions.com/supplier/object-developer/37J1LBTQxv', '2019-02-05 06:35:56', '2019-02-05 06:35:56'),
(105, 2, '66.248.203.17', 'http://bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-05 20:59:22', '2019-02-05 20:59:22'),
(106, 2, '66.248.203.17', 'http://bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-06 08:05:16', '2019-02-06 08:05:16'),
(107, 2, '66.248.203.17', 'http://bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-06 08:05:34', '2019-02-06 08:05:34'),
(108, 1, '66.248.203.17', 'http://bogorfashions.com/seller-product/sell-used-xray-machine/ZecIGArOWg', '2019-02-06 08:05:43', '2019-02-06 08:05:43'),
(109, 1, '66.248.203.17', 'http://bogorfashions.com/seller-product/want-to-buy-redwood-machie/8BmTLArzr6', '2019-02-06 08:05:53', '2019-02-06 08:05:53'),
(110, 1, '66.248.203.17', 'http://bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-02-06 08:06:10', '2019-02-06 08:06:10'),
(111, 2, '66.248.203.17', 'http://bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-06 08:06:13', '2019-02-06 08:06:13'),
(112, 1, '66.248.203.17', 'http://bogorfashions.com/supplier/object-developer/37J1LBTQxv', '2019-02-06 08:07:05', '2019-02-06 08:07:05'),
(113, 2, '66.248.203.17', 'http://bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-06 08:07:06', '2019-02-06 08:07:06'),
(114, 2, '185.93.229.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-06 21:15:26', '2019-02-06 21:15:26'),
(115, 2, '192.88.134.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-06 21:51:41', '2019-02-06 21:51:41'),
(116, 2, '185.93.228.17', 'http://www.bogorfashions.com/seller-product/want-to-buy-new-tractor/7ZlHLlMxj5', '2019-02-06 21:57:40', '2019-02-06 21:57:40'),
(117, 1, '66.248.202.17', 'http://bogorfashions.com/seller-product/genrate-engine/rsAToprDU2', '2019-02-06 23:17:15', '2019-02-06 23:17:15'),
(118, 2, '185.93.229.17', 'http://www.bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-07 10:24:25', '2019-02-07 10:24:25'),
(119, 2, '192.88.134.17', 'http://www.bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-07 10:54:15', '2019-02-07 10:54:15'),
(120, 2, '185.93.228.17', 'http://www.bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-07 12:05:58', '2019-02-07 12:05:58'),
(121, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-07 13:29:28', '2019-02-07 13:29:28'),
(122, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/water-pump/gbfPsG7m76', '2019-02-07 13:29:42', '2019-02-07 13:29:42'),
(123, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-07 13:46:41', '2019-02-07 13:46:41'),
(124, 2, '66.248.202.17', 'http://www.bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-07 14:12:16', '2019-02-07 14:12:16'),
(125, 2, '185.93.230.17', 'http://bogorfashions.com/seller-product/assemble-dry-licud-machine/gd2Ws7WNbe', '2019-02-07 15:37:29', '2019-02-07 15:37:29'),
(126, 2, '185.93.229.17', 'http://www.bogorfashions.com/supplier/uni-worn-india/xO48gs8VYi', '2019-02-07 17:36:20', '2019-02-07 17:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 inactive, 1 active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KCE', 'kc@bogorfashions.com', NULL, '$2y$10$5VqtujE.RAkCqngNn3KnjeEsMWk1F.gaeEZ6T0U5rs9zhWkkuI/7C', 1, 'luz8TIt2pkxWUCbCAQe6o6bRxL8elQHs0jWp6aQe0SS7nrqORoUZjYkugrg3', '2018-12-11 00:06:31', '2019-02-06 21:05:29'),
(2, 'praveen', 'patelprem1992@gmail.com', NULL, '$2y$10$M.hqt1mCekhQ8nTh8V.zDO7TpR5C.juiUY3x1g/UvneRraw7conMi', 1, 'Hlay5nSTgTYOyRQOf42FqTMaDqAAJsFkRCQWHjEkdKq5wDqanpDgQGfUArNT', '2018-12-12 05:45:14', '2018-12-12 05:45:31'),
(3, 'Deepak', 'deepakpogra143@gmail.com', NULL, '$2y$10$/gCUose0CNRA5OYWOladQOrZz1JuE1wKX1KPb3sIx24VKTI3imvfi', 1, '6GPLPwG2E71qcKVydkmkhvGvRxw5OKFOSyLvHBoQGhXGKHIOjT9wjGefg9aG', '2018-12-12 06:49:12', '2018-12-12 06:53:26'),
(4, 'Jista', 'jestina@gmail.com', NULL, '$2y$10$AGJ5ef6Y86OFrCnmqGUn2OVYld2pmSISnJCQSFQOyL6yZfeHXr4Be', 1, 'O2YOwtegLr7vsJeuQVOdtCxu2m68xnOGFt9hEZTOKlV6LtxvKzO3v5UJllYS', '2019-01-14 10:17:03', '2019-01-14 10:17:03'),
(13, 'tuhin', 'tuhin1@gmail.com', NULL, '$2y$10$1w1tMJfEY.OXiY1l/JyUCOzb78wwVHcvTgPW8hfAVlVP2Ttk1921S', 1, 'dXjGHX86V7lYJiuspIGVUjZkyQx1VjeiNu14IIGmRBWqsQKptGLX0pZKAFVL', '2019-02-07 00:10:04', '2019-02-07 00:10:04'),
(14, 'bangladesh', 'marufhossen23@gmail.com', NULL, '$2y$10$uWKTTf1mpGYWNXnpH3R2ceToPo6pNAGZj24bjefWVnaAw1r.EdXpK', 1, 'N0DDdSvOrZkELVMlhGsFDgHStXoipt2X7UrZV3Lhrqt6UK78nmPd9SHkJbFj', '2019-02-07 05:23:56', '2019-02-07 05:23:56'),
(15, 'buyer1', 'buyer', NULL, '$2y$10$TWxPHwEp723u.uJ/tQznW.yngOtlg2uSuQAo44FtG5QhNqNw526j2', 1, NULL, '2019-02-07 13:38:19', '2019-02-07 13:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `website_enquiries`
--

CREATE TABLE IF NOT EXISTS `website_enquiries` (
`id` int(11) NOT NULL,
  `first` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_enquiries`
--

INSERT INTO `website_enquiries` (`id`, `first`, `lastname`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'praveen', 'sd', 'patelprem1992@gmail.com', '78765455566', 'sdf', '2018-12-11 11:47:02', '2018-12-11 11:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `website_profiles`
--

CREATE TABLE IF NOT EXISTS `website_profiles` (
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
`id` int(11) NOT NULL,
  `website_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_email_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inst_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_address` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_profiles`
--

INSERT INTO `website_profiles` (`logo`, `id`, `website_name`, `email_id`, `support_email_id`, `phone_no`, `fb_url`, `youtube_url`, `twitter_url`, `inst_url`, `gplus_url`, `business_address`, `created_at`, `updated_at`) VALUES
('uploads/website_profile/globe-813-737115.png', 1, 'Business Diretory', 'info@buzdirectory.com', 'support@buzdirectory.com', '+01-76687-377', '#', '#', '#', '#', '#', 'udaipur sector 4 hian margir', '2018-12-10 18:36:32', '2018-12-15 19:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`), ADD KEY `banners_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_enquiries`
--
ALTER TABLE `buyer_enquiries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_f_a_qs`
--
ALTER TABLE `buyer_f_a_qs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_helps`
--
ALTER TABLE `buyer_helps`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_posts`
--
ALTER TABLE `buyer_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_profiles`
--
ALTER TABLE `buyer_profiles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_safeties`
--
ALTER TABLE `buyer_safeties`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_traffics`
--
ALTER TABLE `buyer_traffics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_listings`
--
ALTER TABLE `country_listings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_listing_features`
--
ALTER TABLE `country_listing_features`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_purchases`
--
ALTER TABLE `country_purchases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_communities`
--
ALTER TABLE `join_communities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowtos`
--
ALTER TABLE `knowtos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_categories`
--
ALTER TABLE `sector_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_listings`
--
ALTER TABLE `sector_listings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_listing_features`
--
ALTER TABLE `sector_listing_features`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_purchases`
--
ALTER TABLE `sector_purchases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_enquiries`
--
ALTER TABLE `seller_enquiries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_f_a_qs`
--
ALTER TABLE `seller_f_a_qs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_helps`
--
ALTER TABLE `seller_helps`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_plans`
--
ALTER TABLE `seller_plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_purchase_plans`
--
ALTER TABLE `seller_purchase_plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_safeties`
--
ALTER TABLE `seller_safeties`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_traffics`
--
ALTER TABLE `seller_traffics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_enquiries`
--
ALTER TABLE `website_enquiries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_profiles`
--
ALTER TABLE `website_profiles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buyer_enquiries`
--
ALTER TABLE `buyer_enquiries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buyer_f_a_qs`
--
ALTER TABLE `buyer_f_a_qs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `buyer_helps`
--
ALTER TABLE `buyer_helps`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buyer_posts`
--
ALTER TABLE `buyer_posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buyer_profiles`
--
ALTER TABLE `buyer_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buyer_safeties`
--
ALTER TABLE `buyer_safeties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buyer_traffics`
--
ALTER TABLE `buyer_traffics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `country_listings`
--
ALTER TABLE `country_listings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country_listing_features`
--
ALTER TABLE `country_listing_features`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country_purchases`
--
ALTER TABLE `country_purchases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `join_communities`
--
ALTER TABLE `join_communities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `knowtos`
--
ALTER TABLE `knowtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sector_categories`
--
ALTER TABLE `sector_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sector_listings`
--
ALTER TABLE `sector_listings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sector_listing_features`
--
ALTER TABLE `sector_listing_features`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sector_purchases`
--
ALTER TABLE `sector_purchases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `seller_enquiries`
--
ALTER TABLE `seller_enquiries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seller_f_a_qs`
--
ALTER TABLE `seller_f_a_qs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seller_helps`
--
ALTER TABLE `seller_helps`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seller_plans`
--
ALTER TABLE `seller_plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seller_purchase_plans`
--
ALTER TABLE `seller_purchase_plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seller_safeties`
--
ALTER TABLE `seller_safeties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seller_traffics`
--
ALTER TABLE `seller_traffics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `website_enquiries`
--
ALTER TABLE `website_enquiries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `website_profiles`
--
ALTER TABLE `website_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
