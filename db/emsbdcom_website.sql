-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2020 at 11:58 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsbdcom_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `headline` longtext DEFAULT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `headline`, `title`, `details`, `image`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, 'সাফল্য ও অর্জন', '৩৭তম  বি.সি.এস -এ অভাবনীয় সাফল্য ', '<p>দেশে হোম লোন নিলে ফেরত দিতে হয়। না দিলে বাড়ি ক্রোকসহ অন্যান্য শাস্তি নিশ্চিত। এর থেকে সহজ হলো &lsquo;সেকেন্ড হোম লোন&rsquo; নেওয়া। আপনি ব্যাংক থেকে বিরাট অঙ্কের টাকা ঋণ নিয়ে বিদেশে সেকেন্ড হোম কিনবেন, দীর্ঘমেয়াদি ভিসা এবং নাগরিকত্ব কিনবেন; তারপর পগারপার হয়ে যাবেন। এই ঋণ টেকসই, এর সুদ দিতে হয় না, ফেরত দেওয়ার বালাই নেই। বরং বিদেশি পাসপোর্ট নিয়ে দেশে এসে টাকা বানানোর কারবারটা চালু রাখতে পারবেন। ঋণখেলাপের অর্থ বিদেশে বিনিয়োগ করে সেখানেও ব্যবসায়ী-উদ্যোক্তার সম্মান পাবেন। কষ্ট করে সেসব দেশের নাগরিকত্ব পাওয়া বাংলাদেশিদের সমাজে মাতবরি করবেন, সপরিবার বাংলাদেশিদের সভা অলংকৃত করে বক্তৃতা দেবেন। কেউ আপনাদের বিরুদ্ধে প্রচারণা চালালে দামি উকিল মারফত উকিল নোটিশ পাঠাবেন।</p>\r\n', 'lib/images/21288235805e441fdde1796.jpg', '2017-12-11 00:00:00', 7, '2020-02-12 00:00:00', 1),
(3, 'সাফল্য ও অর্জন', '৩৮তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '<p>দেশে হোম লোন নিলে ফেরত দিতে হয়। না দিলে বাড়ি ক্রোকসহ অন্যান্য শাস্তি নিশ্চিত। এর থেকে সহজ হলো &lsquo;সেকেন্ড হোম লোন&rsquo; নেওয়া। আপনি ব্যাংক থেকে বিরাট অঙ্কের টাকা ঋণ নিয়ে বিদেশে সেকেন্ড হোম কিনবেন, দীর্ঘমেয়াদি ভিসা এবং নাগরিকত্ব কিনবেন; তারপর পগারপার হয়ে যাবেন। এই ঋণ টেকসই, এর সুদ দিতে হয় না, ফেরত দেওয়ার বালাই নেই। বরং বিদেশি পাসপোর্ট নিয়ে দেশে এসে টাকা বানানোর কারবারটা চালু রাখতে পারবেন। ঋণখেলাপের অর্থ বিদেশে বিনিয়োগ করে সেখানেও ব্যবসায়ী-উদ্যোক্তার সম্মান পাবেন। কষ্ট করে সেসব দেশের নাগরিকত্ব পাওয়া বাংলাদেশিদের সমাজে মাতবরি করবেন, সপরিবার বাংলাদেশিদের সভা অলংকৃত করে বক্তৃতা দেবেন। কেউ আপনাদের বিরুদ্ধে প্রচারণা চালালে দামি উকিল মারফত উকিল নোটিশ পাঠাবেন।</p>\r\n', 'lib/images/996671495e44206a11f8d.jpg', '2017-12-11 00:00:00', 7, '2020-02-12 00:00:00', 1),
(9, 'সাফল্য ও অর্জন', '৩৬তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '<p>আগের জয়গুলোর মতো এবারের জয়ও পুরোনো শিক্ষাটাকে চোখে আঙুল দিয়ে দেখিয়েছে। অনূর্ধ্ব&ndash;১৯ দলের নেতা আকবর আলীও দেখালেন। ধীরস্থির, চৌকস ও দল-অন্তঃপ্রাণ নেতা পেলেই বাংলাদেশিরা অসাধ্য সাধন করতে পারে। যত দিন মাশরাফি দুনিয়াবি বিষয়ের বাইরে থেকে দলের তেমন নেতা ছিলেন, তত দিন তিনিও আমাদের জয় দিয়েছেন, পরাজয়ের কার্নিশ থেকে লাফ দিয়ে জয়ের আকাশে উড়িয়েছেন। কী অদ্ভুত সংকল্প আকবরের। বোনের মৃত্যুর বারো দিনের মাথায় বিশ্বকাপ জয়!</p>', 'lib/images/15992660515e4420e9ca2d4.jpg', '2020-02-12 00:00:00', 1, '0000-00-00 00:00:00', 0),
(10, 'সাফল্য ও অর্জন', '৩৫তম  বি.সি.এস -এ অভাবনীয় সাফল্য', '<p>আগের জয়গুলোর মতো এবারের জয়ও পুরোনো শিক্ষাটাকে চোখে আঙুল দিয়ে দেখিয়েছে। অনূর্ধ্ব&ndash;১৯ দলের নেতা আকবর আলীও দেখালেন। ধীরস্থির, চৌকস ও দল-অন্তঃপ্রাণ নেতা পেলেই বাংলাদেশিরা অসাধ্য সাধন করতে পারে। যত দিন মাশরাফি দুনিয়াবি বিষয়ের বাইরে থেকে দলের তেমন নেতা ছিলেন, তত দিন তিনিও আমাদের জয় দিয়েছেন, পরাজয়ের কার্নিশ থেকে লাফ দিয়ে জয়ের আকাশে উড়িয়েছেন। কী অদ্ভুত সংকল্প আকবরের। বোনের মৃত্যুর বারো দিনের মাথায় বিশ্বকাপ জয়!</p>\r\n\r\n<p>আগের জয়গুলোর মতো এবারের জয়ও পুরোনো শিক্ষাটাকে চোখে আঙুল দিয়ে দেখিয়েছে। অনূর্ধ্ব&ndash;১৯ দলের নেতা আকবর আলীও দেখালেন। ধীরস্থির, চৌকস ও দল-অন্তঃপ্রাণ নেতা পেলেই বাংলাদেশিরা অসাধ্য সাধন করতে পারে। যত দিন মাশরাফি দুনিয়াবি বিষয়ের বাইরে থেকে দলের তেমন নেতা ছিলেন, তত দিন তিনিও আমাদের জয় দিয়েছেন, পরাজয়ের কার্নিশ থেকে লাফ দিয়ে জয়ের আকাশে উড়িয়েছেন। কী অদ্ভুত সংকল্প আকবরের। বোনের মৃত্যুর বারো দিনের মাথায় বিশ্বকাপ জয়!</p>', 'lib/images/3640471545e44214b0a8b1.jpg', '2020-02-12 00:00:00', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `active` int(4) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullname`, `password`, `email`, `login_time`, `logout_time`, `active`, `image`) VALUES
(6, 'shetu', 'admin', '11', 'm@w.com', '2017-11-19 11:41:01', '2017-11-19 11:40:50', 1, 'lib/images/16130930845a11184391d20.jpg'),
(7, 'sham', 'admin', '1', 'm@w.com', '2018-04-12 03:16:37', '2018-04-10 02:40:41', 1, 'lib/images/13041601355a111b05633e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_designation` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `social_link` varchar(100) DEFAULT NULL,
  `employee_address` text DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_designation`, `dob`, `password`, `social_link`, `employee_address`, `contact_no`, `email`, `gender`, `image`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(19, 'sham', 1, '0000-00-00', 'dsfsf', NULL, 'sdfsdf', '3453453453', 'm@gmail.com', 'M', '8.jpeg', 7, '2018-01-18 11:01:20', 7, '2018-02-11 07:45:58'),
(20, 'sha', 2, '0000-00-00', 'sal', NULL, 'uttara', 'xxxxxxxxxxx', 'm@gmail.com', 'M', 'insurance_logo_small.png', 1, '2018-04-16 01:43:34', 0, '0000-00-00 00:00:00'),
(21, 'gdfgdg', 3, '0000-00-00', '1', 'fsdfsf', '                            dfgdgdfgdfgdfg                        ', '12545254875', 'sham@g.com', 'M', 'sham.png', 9, '2019-01-10 18:03:18', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designations`
--

CREATE TABLE `employee_designations` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_designations`
--

INSERT INTO `employee_designations` (`id`, `designation_name`) VALUES
(1, 'Head Teacher'),
(4, 'Assistant Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `feature_slideshow`
--

CREATE TABLE `feature_slideshow` (
  `id` int(11) NOT NULL,
  `title` longtext DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `for_slideshow` int(11) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `year` year(4) NOT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feature_slideshow`
--

INSERT INTO `feature_slideshow` (`id`, `title`, `name`, `for_slideshow`, `group_id`, `year`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(86, 'ক্রেস্ট প্রধান অনুষ্ঠানে ', '3256677398.jpg', 0, 343326716, 2019, '2019-05-15', 1, '2020-02-12 00:00:00', 1),
(87, 'প্রাক বি.সি.এস আলোচনা', '176509773914.JPG', 0, 1436380000, 2019, '2019-05-15', 1, '2020-02-12 00:00:00', 1),
(88, 'বি.সি.এস  উত্তীর্ণদের সংবর্ধনা', '16409052661.JPG', 0, 1558149252, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(89, '৩৮তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '18424000665.jpg', 1, 1700665004, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(90, '৩৮তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '3659194134.jpg', 1, 1700665004, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(91, '৩৮তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '13807569217.jpg', 1, 1700665004, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(92, '৩৮তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '11304189556.jpg', 1, 1700665004, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(93, '৩৬তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '11711107661.JPG', 1, 1053542298, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(94, '৩৬তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '139205971010.jpg', 1, 1053542298, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(95, '৩৬তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '5098829392.jpg', 1, 1053542298, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0),
(96, '৩৬তম   বি.সি.এস -এ অভাবনীয় সাফল্যের জন্য ক্যাডারদের সংবর্ধনা প্রদান', '214275480811.jpg', 1, 1053542298, 2020, '2020-02-12', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `holiday_configs`
--

CREATE TABLE `holiday_configs` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(200) NOT NULL,
  `date_from` varchar(100) NOT NULL,
  `date_to` varchar(100) NOT NULL,
  `occation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_configs`
--

INSERT INTO `holiday_configs` (`id`, `holiday_name`, `date_from`, `date_to`, `occation`) VALUES
(1, 'Independence Day', '03/26/2018', '03/26/2018', 'We have achieved independence on this glorious day');

-- --------------------------------------------------------

--
-- Table structure for table `imp_links`
--

CREATE TABLE `imp_links` (
  `id` int(11) NOT NULL,
  `link` longtext NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imp_links`
--

INSERT INTO `imp_links` (`id`, `link`, `title`) VALUES
(1, 'https://dhakaeducationboard.gov.bd/', 'মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা বোর্ড, ঢাকা'),
(2, 'http://www.dpe.gov.bd/', 'প্রাথমিক শিক্ষা অধিদপ্তর'),
(3, 'http://www.bteb.gov.bd', 'বাংলাদেশ কারিগরি শিক্ষা বোর্ড'),
(4, 'https://moedu.gov.bd/', 'শিক্ষা মন্ত্রণালয়'),
(5, 'https://mopme.gov.bd/', 'প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `LectureId` int(11) NOT NULL,
  `LectureTitle` varchar(200) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `LectureVideo` longtext DEFAULT NULL,
  `LectureLink` varchar(255) NOT NULL,
  `LectureDetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`LectureId`, `LectureTitle`, `SubjectId`, `LectureVideo`, `LectureLink`, `LectureDetails`) VALUES
(8, 'Chamak Hasan Math Song', 26, NULL, 'https://www.youtube.com/watch?v=g1Qss7Me4xc', ' New flavour of math'),
(9, 'Chamak Hasan', 26, NULL, 'https://www.youtube.com/watch?v=tgn0l_Y0K_E', ' Chamak Hasan '),
(11, 'Mukul sir has taken class on internation affairs', 31, NULL, 'https://www.youtube.com/watch?v=EOkpWpiOzeU', ' '),
(12, 'BCS PORICROMA MATH TUTORIAL ADDA With NIROB UDDIN from USA', 28, NULL, ' https://www.youtube.com/watch?v=OU0R7mSnOoM', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `menu_name`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(4, 'Dashboard', '2017-11-22 16:53:20', 7, '0000-00-00 00:00:00', 0),
(5, 'General Configuration', '2017-11-22 16:53:29', 7, '0000-00-00 00:00:00', 0),
(6, 'Feature Slideshow', '2017-11-22 16:53:36', 7, '0000-00-00 00:00:00', 0),
(7, 'Notice_boards', '2017-11-22 16:54:19', 7, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_spech`
--

CREATE TABLE `manage_spech` (
  `id` int(11) NOT NULL,
  `headline` longtext DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `spech` longtext DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `image` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_spech`
--

INSERT INTO `manage_spech` (`id`, `headline`, `name`, `designation`, `spech`, `created_on`, `created_by`, `updated_on`, `updated_by`, `image`) VALUES
(4, ' প্রিন্সিপাল এর বার্তা', 'মোঃ এহতেশাম', 'প্রিন্সিপ্যাল', '<p>বর্তমান যুগ বিজ্ঞান ও তথ্য-প্রযুক্তির উৎকর্ষের যুগ। আধুনিক বিশ্বের সকল ক্ষেত্রে বিজ্ঞান ও তথ্য-প্রযুক্তি পালন করছে জাদুর কাঠির মতো বিস্ময়কর ভূমিকা। শিক্ষা ক্ষেত্রে বিজ্ঞান ও তথ্য-প্রযুক্তির ব্যবহার ইতোমধ্যেই বিশ্বব্যাপী বিরাট আলোড়নের সৃষ্টি করেছে। এ প্রেক্ষাপটে বাংলাদেশ সরকার এদেশের শিক্ষা ব্যবস্থা আধুনিকায়নের লক্ষ্যে বিজ্ঞান ও তথ্য-প্রযুক্তির ব্যবহারকে সর্বাধিক গুরুত্ব দিয়ে সকল শিক্ষা প্রতিষ্ঠানকে অভিন্ন নেটওয়ার্কের আওতায় নিয়ে আসার ব্যাপারে ব্যাপক কর্মসূচি গ্রহণ করেছে।</p>\r\n', '2017-11-26 15:07:07', 7, '2020-02-12 12:20:40', 1, 'lib/images/4996932015a1a843bee60d.png'),
(5, NULL, 'মোঃ সুজন নুয়াখালি', 'উস্তাদ ', 'জলপাইগুড়ি জেলার বৈকণ্ঠপুর বন বিভাগের স্পেশাল টাস্কফোর্সের কর্মকর্তা সঞ্জয় দত্ত গোপনে শুরু করেন তৎপরতা। এরপর তিনি হোয়াটস অ্যাপে একটি গ্রুপ তৈরি করে ফাঁদ পাতেন। সেই ফাঁদে পা দেন ওই পাচারকারীরা। তারপর দামাদামি সাপেক্ষে চামড়াটির দাম ঠিক হয় ১০ লাখ রুপি। নির্দিষ্ট দিনে মোটরসাইকেলে করে পাঁচ পাচারকারী চিতাবাঘের চামড়া নিয়ে হাজির হন ঘটনাস্থলে। তারপর বন বিভাগের পাতা জালে ধরা পড়েন তাঁরা। ওই পাঁচজন স্বীকার করেছেন, তাঁরা চিতাবাঘটিকে মেরে মাংস দিয়ে বনভোজন করেছেন। গতকাল রোববার জলপাইগুড়ির পাশের ডুয়ার্সের ওদলাবাড়ি বনাঞ্চল থেকে ধরা পড়েন এই পাঁচজন। তাঁরা প্রত্যেকেই ডুয়ার্সের বাসিন্দা\r\n', '2017-12-06 14:09:23', 7, '2019-01-22 20:06:08', 9, 'lib/images/32835a27ed79a9e94.png');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `headline` longtext DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(5) NOT NULL,
  `is_welcome_message` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `headline`, `title`, `details`, `image`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_welcome_message`) VALUES
(2, 'রিপোর্ট এবং ঘটনা', 'গত ১২-০২-২০২০  রোজ মঙ্গলবার বি.সি.এস সম্পর্কে আলোচনা অনুষ্ঠান অনুষ্ঠিত হয়', '<p>আগের জয়গুলোর মতো এবারের জয়ও পুরোনো শিক্ষাটাকে চোখে আঙুল দিয়ে দেখিয়েছে। অনূর্ধ্ব&ndash;১৯ দলের নেতা আকবর আলীও দেখালেন। ধীরস্থির, চৌকস ও দল-অন্তঃপ্রাণ নেতা পেলেই বাংলাদেশিরা অসাধ্য সাধন করতে পারে। যত দিন মাশরাফি দুনিয়াবি বিষয়ের বাইরে থেকে দলের তেমন নেতা ছিলেন, তত দিন তিনিও আমাদের জয় দিয়েছেন, পরাজয়ের কার্নিশ থেকে লাফ দিয়ে জয়ের আকাশে উড়িয়েছেন। কী অদ্ভুত সংকল্প আকবরের। বোনের মৃত্যুর বারো দিনের মাথায় বিশ্বকাপ জয়!</p>\r\n', 'lib/images/16007910085e44224a2dbbd.jpg', '2017-12-11 00:00:00', 7, '2020-02-12 00:00:00', 1, 0),
(5, 'রিপোর্ট এবং ঘটনা', '৪১তম বিসিএস এর আবেদনপত্র পূরণে ভুল করায় নতুন করে অনলাইনে আবেদন করার অনুমতি', '<p>এ ঘটনায় তিন সদস্যের কমিটি গঠন করেছে পিসিবি। এতে আছেন পিসিবি আইনি দলের এক প্রতিনিধি, ঘরোয়া ক্রিকেটের পরিচালক হারুন রশিদ ও চিকিৎসক সোহাইল সেলিম। এ তদন্ত কমিটির কাছে মঙ্গলবার হাজিরা দিয়ে নিজ আচরণের ব্যাখ্যা দেন উমর। আজ আবার তাঁকে হাজিরা দেওয়ার নির্দেশ দিয়েছে তদন্ত কমিটি।</p>\r\n', 'lib/images/1767383435e4422a76364f.jpg', '2017-12-11 00:00:00', 7, '2020-02-12 00:00:00', 1, 0),
(8, 'রিপোর্ট এবং ঘটনা', 'মুকুল স্যার এর ক্লাস  ', '<p>মাইকেল মধুসূদন কলেজে সর্বশেষ ছাত্র সংসদ নির্বাচন হয় ১৯৮১ সালে। তখন আব্দুল কাদের সহসভাপতি ও মাহবুব আলম সাধারণ সম্পাদক নির্বাচিত হন। ছাত্র সংসদের গঠনতন্ত্র অনুযায়ী, এ কলেজের শিক্ষার্থীরা শুধু সহসভাপতি, উপ-সভাপতি ও সাধারণ সম্পাদক পদপ্রার্থী তিনজনকে সরাসরি ভোট দিয়ে নির্বাচন করতে পারবেন। বাকি পদগুলো পূরণ হবে ক্লাস প্রতিনিধিদের সমন্বয়ে। শুরুর দিকে এ প্রক্রিয়ায় ছাত্র সংসদ গঠন করতে সমস্যা হয়নি। কিন্তু এখন কলেজের পরিসর বেড়েছে, শ্রেণিসংখ্যা এবং শিক্ষার্থীও বেড়েছে কয়েক গুণ। এ মহাবিদ্যালয়ের শিক্ষার্থী বর্তমানে সাড়ে তিন হাজারের বেশি। উচ্চ মাধ্যমিক শ্রেণি ছাড়াও ১৯টি বিষয়ে অনার্স ও মাস্টার্স চালু রয়েছে এখানে। এ অবস্থায় কলেজে ক্লাস প্রতিনিধি মনোনয়নই অসম্ভব হয়ে পড়েছে। তাই শিক্ষার্থীদের পক্ষ থেকে গত শতাব্দীর আশির দশকে সরাসরি ভোটের মাধ্যমেই সব পদ পূরণের দাবি ওঠে</p>\r\n', 'lib/images/2805093565e4426218a1d1.jpg', '2019-01-22 00:00:00', 9, '2020-02-12 00:00:00', 1, 0),
(9, '৩৭তম প্রিলি. (পূর্ণাঙ্গ কোর্স) ভর্তি তথ্য :', '* প্রিলিমিনারি কোর্স প্ল্যান', '<p>বিষয়&nbsp; &nbsp;নম্বর&nbsp; &nbsp;ক্লাস সংখ্যা&nbsp; &nbsp;ক্লাস টেস্ট&nbsp; &nbsp;লেকচার শীট&nbsp; &nbsp;এ্যাসাইনমন্টে টেস্ট&nbsp; &nbsp;সাবজেক্ট টেস্ট&nbsp; &nbsp;রিভিউ টেস্ট&nbsp; &nbsp;মডেল টেস্ট<br />\r\nবাংলা ভাষা ও সাহিত্য&nbsp; &nbsp;৩৫&nbsp; &nbsp;২০টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nইংরেজি ভাষা ও সাহিত্য&nbsp; &nbsp;৩৫&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nগাণিতিক যুক্তি&nbsp; &nbsp;১৫&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nমানসিক দক্ষতা&nbsp; &nbsp;১৫&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nসাধারণ বিজ্ঞান&nbsp; &nbsp;১৫&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nকম্পিউটার ও তথ্য প্রযুক্তি&nbsp; &nbsp;১৫&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nবাংলাদেশ বিষয়াবলি&nbsp; &nbsp;৩০&nbsp; &nbsp;১৫ টি&nbsp; &nbsp;১৫ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nআন্তর্জাতিক বিষয়াবলি&nbsp; &nbsp;২০&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nভূগোল ও দুর্যোগ ব্যবস্থাপনা&nbsp; &nbsp;১০&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৩ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nনৈতিকতা, মূল্যবোধ ও সুশাসন&nbsp; &nbsp;১০&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nমোট&nbsp; &nbsp;২০০&nbsp; &nbsp;১২০ টি&nbsp; &nbsp;১০০ টি&nbsp; &nbsp;১০০ টি&nbsp; &nbsp;১৪ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১১ টি<br />\r\n<br />\r\n[মোট ক্লাস- ১২০, ক্লাস টেস্ট-১০০, এ্যাসাইনমেন্ট টেস্ট-১৪, বিষয়ভিত্তিক পরীক্ষা-১০, রিভিউ টেস্ট-১০, মডেল টেস্ট-১১]&nbsp;<br />\r\nব্যাচ তথ্য:<br />\r\nপ্রথম ব্যাচ&nbsp; &nbsp;: সময়- বেলা ১২ টা,&nbsp; &nbsp;ক্লাস শুরু-১২-০৯-১৫ইং (রবিবার)<br />\r\nদ্বিতীয় ব্যাচ&nbsp; &nbsp;: সময়-বিকাল ৩ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-০৫-১০-১৫ইং (সোমবার)<br />\r\nতৃতীয় ব্যাচ&nbsp; &nbsp;: সময়: সকাল-১০ টা,&nbsp; &nbsp;ক্লাস শুরু-২৫-১০-১৫ইং (রবিবার)<br />\r\nচতুর্থ ব্যাচ&nbsp; &nbsp;: সময়: সন্ধ্যা-৭ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-২৪-১১-১৫ইং (মঙ্গলবার)<br />\r\nপঞ্চম ব্যাচ&nbsp; &nbsp;: সময়: বিকাল-৫ টা,&nbsp; &nbsp;ক্লাস শুরু-২৪-১২-১৫ইং (শনিবার)</p>', NULL, '2019-04-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 2),
(10, '৩৬তম লিখিত (পূর্ণাঙ্গ কোর্স) ভর্তি তথ্য', 'লিখিত কোর্স প্ল্যান', '<p>প্রথম ব্যাচ&nbsp; &nbsp;: সময়- বেলা ১২ টা,&nbsp; &nbsp;ক্লাস শুরু-১৫-০৯-১৫ইং (মঙ্গলবার)<br />\r\nদ্বিতীয় ব্যাচ&nbsp; &nbsp;: সময়-বিকাল ৩ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-০৫-১০-১৫ইং (সোমবার)<br />\r\n<strong>ভর্তি তথ্য:</strong><br />\r\n০৮-০৯-২০১৫ থেকে ১৫-০৯-২০১৫ পর্যন্ত &nbsp; &nbsp; ১৫,২০০ টাকা<br />\r\n১৬-০৯-২০১৫ থেকে ০৫-১০-২০১৫ পর্যন্ত&nbsp; ১৬,২০০ টাকা</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"1\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<caption>লিখিত কোর্স প্ল্যান</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">বিষয়</th>\r\n			<th scope=\"col\">নম্বর</th>\r\n			<th scope=\"col\">ক্লাস সংখ্যা&nbsp; &nbsp;ক্লাস টেস্ট&nbsp; &nbsp;বিষয়ভিত্তিক টেস্ট&nbsp; &nbsp;মডেল টেস্ট&nbsp; &nbsp;লেকচার শীট</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>বাংলা ভাষা ও সাহিত্য</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ইংরেজি ভাষা ও সাহিত্য&nbsp; &nbsp;</td>\r\n			<td>২০০&nbsp;</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>বাংলাদেশ বিষয়াবলি</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>বাংলাদেশ বিষয়াবলি</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '2019-04-12 00:00:00', 1, '2019-04-12 00:00:00', 1, 3),
(11, 'পরিক্রমাতে  স্যাগতম', 'পরিক্রমাতে  স্যাগতম', '<p>বর্তমান যুগ বিজ্ঞান ও তথ্য-প্রযুক্তির উৎকর্ষের যুগ। আধুনিক বিশ্বের সকল ক্ষেত্রে বিজ্ঞান ও তথ্য-প্রযুক্তি পালন করছে জাদুর কাঠির মতো বিস্ময়কর ভূমিকা। শিক্ষা ক্ষেত্রে বিজ্ঞান ও তথ্য-প্রযুক্তির ব্যবহার ইতোমধ্যেই বিশ্বব্যাপী বিরাট আলোড়নের সৃষ্টি করেছে। এ প্রেক্ষাপটে বাংলাদেশ সরকার এদেশের শিক্ষা ব্যবস্থা আধুনিকায়নের লক্ষ্যে বিজ্ঞান ও তথ্য-প্রযুক্তির ব্যবহারকে সর্বাধিক গুরুত্ব দিয়ে সকল শিক্ষা প্রতিষ্ঠানকে অভিন্ন নেটওয়ার্কের আওতায় নিয়ে আসার ব্যাপারে ব্যাপক কর্মসূচি গ্রহণ করেছে।</p>\r\n', NULL, '2019-04-24 00:00:00', 1, '2020-02-12 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `description`, `created_by`, `updated_by`, `created_on`, `updated_on`) VALUES
(75, 'বাংলাদেশ সরকারী কর্ম কমিশন সচিবালয়ের সহকারী প্রোগ্রামার( ৯ম গ্রেড) পদের অস্থায়ীভাবে নিয়োগ পত্র', 'feb052020_bb_19.pdf', 1, 1, '2017-11-16 18:02:12', '2020-02-12 21:38:57'),
(76, 'তথ্য ও যোগাযোগ প্রযুক্তি বিভাগের অধীন তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তরের ১ম শ্রেণীর(৯ম গ্রেড) সহকারী নেটওয়ার্ক ইঞ্জিনিয়ার পদে বাছাই(MCQ Type) পরীক্ষার ফলাফল প্রকাশ ', 'feb052020_bb_18.pdf', 1, 1, '2017-11-19 18:03:51', '2020-02-12 21:41:55'),
(77, '  ৩৯ তম বিসিএস হতে নন-ক্যাডার ১ম শ্রেণির পদে সুপারিশ ', 'feb052020_bb_181.pdf', 1, 1, '2017-11-16 18:03:51', '2020-02-12 21:43:21'),
(78, '৪১তম বিসিএস এর আবেদনপত্র পূরণে ভুল করায় নতুন করে অনলাইনে আবেদন করার অনুমতি ', 'feb052020_bb_191.pdf', 1, 1, '2017-11-12 18:03:51', '2020-02-12 21:44:21'),
(79, '৪০তম বিসিএস পরীক্ষা-২০১৮ এর আবশ্যিক বিষয়ের লিখিত পরীক্ষার আসনবিন্যাস ', 'feb052020_bb_182.pdf', 9, 1, '2019-01-24 20:11:08', '2020-02-12 21:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `organization_configuration`
--

CREATE TABLE `organization_configuration` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `organization_name` longtext NOT NULL,
  `year` varchar(100) NOT NULL,
  `organization_slogan` varchar(200) NOT NULL,
  `eiin_no` varchar(100) NOT NULL,
  `org_email` varchar(100) DEFAULT NULL,
  `org_contact` longtext DEFAULT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_configuration`
--

INSERT INTO `organization_configuration` (`id`, `title`, `organization_name`, `year`, `organization_slogan`, `eiin_no`, `org_email`, `org_contact`, `image`, `address`) VALUES
(2, 'বি সি এস পরিক্রমা', 'বি সি এস পরিক্রমা', '1997', 'বি সি এস পরিক্রমা', '11121', 'sham@gmail.com', '+8801746 952089', 'lib/images/2800801685cb1356bc21ac.jpg', '27, ইন্দিরা রোড (২ য় তলা), ফার্মগেট তেজগাঁও, ঢাকা -১২১৫ ');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id`, `title`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(49, 'testing_purpose_slideshows', 'item8.png', '2017-11-21', 7, '0000-00-00 00:00:00', 0),
(51, 'Liblectus_Per_cras', 'item11.png', '2017-11-21', 7, '0000-00-00 00:00:00', 0),
(52, 'New_year_celebrations', 'insurance_logo_small.png', '2018-01-31', 7, '0000-00-00 00:00:00', 0),
(53, 'testing_again', 'admin.png', '2018-01-31', 7, '0000-00-00 00:00:00', 0),
(54, 'testing_again', '2.jpeg', '2018-01-31', 7, '0000-00-00 00:00:00', 0),
(55, 'testing_purpose_slideshows', 'item11.png', '2017-11-21', 7, '0000-00-00 00:00:00', 0),
(56, 'testing_again', '15.jpeg', '2018-01-31', 7, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_admission`
--

CREATE TABLE `student_admission` (
  `id` int(11) NOT NULL,
  `form_no` int(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `section` int(11) DEFAULT NULL,
  `roll_no` int(20) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `student_name` varchar(200) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `father_occupation` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `year` varchar(20) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_admission`
--

INSERT INTO `student_admission` (`id`, `form_no`, `class`, `section`, `roll_no`, `code`, `student_name`, `contact_no`, `father_name`, `mother_name`, `dob`, `address`, `father_occupation`, `status`, `image`, `created_by`, `created_on`, `year`, `updated_by`, `updated_on`) VALUES
(6, 1, '6', 24, 1, 'stSevenA001', 'sham', 0, 'qqqqqqqqqqq', 'wwwwwwwwwww', '0000-00-00', 'aaaaaaaaaaaaa', 'dddddddddddd', '', 'insurance_logo_small.png', 1, '2018-04-16 02:00:59', '2018', 0, '0000-00-00 00:00:00'),
(7, 7, '6', 24, 2, 'stSevenA002', 'sujon', 1746352610, 'qqqqqqqqqqq', 'wwwwwwwwwww', '0000-00-00', 'aaaaaaaaaaaaa', 'dddddddddddd', 'active', 'admin.png', 1, '2018-04-17 03:11:29', '2018', 1, '2018-04-17 13:02:43'),
(8, 2, '5', 16, 2, 'stSixA002', 'asif', 1746352611, 'qqqqqqqqqqq', 'wwwwwwwwwww', '0000-00-00', 'qqqqqqqqqq', 'dddddddddddd', 'active', 'insurance_logo_small.png', 1, '2018-04-17 03:12:21', '2018', 0, '0000-00-00 00:00:00'),
(9, 3, '6', 14, 1, 'stSevenB001', 'shamsu', 1746352613, 'www', 'wwwwwwwwwww', '0000-00-00', 'qqqqqqqqqq', 'dddddddddddd', 'active', 'insurance_logo_small.png', 1, '2018-04-17 03:14:10', '2018', 0, '0000-00-00 00:00:00'),
(11, 4, '7', 23, 1, 'stNineA001', 'noyon', 1746352621, 'www', 'rrrrrr', '0000-00-00', 'qqqqqqqqqq', 'dddddddddddd', 'active', 'admin.png', 1, '2018-04-18 08:58:42', '2018', 0, '0000-00-00 00:00:00'),
(12, 5, '7', 23, 2, 'stNineA002', 'likhon', 1746352632, 'qqqqqqqqqqq', 'rrrrrr', '0000-00-00', 'qqqqqqqqqq', 'dddddddddddd', 'active', 'insurance_logo_small.png', 1, '2018-04-18 09:00:59', '2018', 0, '0000-00-00 00:00:00'),
(13, 6, '7', 23, 3, 'stNineA003', 'nafiz', 1746352614, 'www', 'wwwwwwwwwww', '0000-00-00', 'aaaaaaaaaaaaa', 'dddddddddddd', 'active', 'admin.png', 1, '2018-04-17 09:02:25', '2018', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `is_parents` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `is_parents`) VALUES
(1, 'd83f67c56c7699c3178ba10a8daa767b', 14, 'Admin', '2016-04-01', 1, 'admin', 0),
(6, 'f72940fe7ed0666735566f807dc6e4d0', 13, 'Golam Rosul', '2017-01-26', 1, '01552875498', 1),
(7, 'test_user@34', 10, 'test_user', '2017-01-26', 1, 'test_user', 0),
(8, '30c74a6484e399acca32a6ce26ef791b', 13, 'Father ', '2017-01-26', 1, '01822447078', 1),
(9, 'c4ca4238a0b923820dcc509a6f75849b', 10, 'test_user', '2018-05-08', 1, 'test_user', 0),
(10, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'shams', '2019-01-09', 1, 'shams', 0),
(11, 'c4ca4238a0b923820dcc509a6f75849b', 10, 'kk', '2019-04-26', 1, 'kk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'User Role identification number',
  `role_name` varchar(200) NOT NULL,
  `role_description` varchar(500) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `role_description`, `parent_id`, `lft`, `rgt`, `is_editable`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, 1, 38, 0),
(10, 'Teacher', 'Teacher', NULL, NULL, NULL, 0),
(12, 'Computer Operator', NULL, NULL, NULL, NULL, 1),
(13, 'dd', 'dds', NULL, NULL, NULL, 1),
(14, 'Admin', 'Can do almost same as super admin', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_wise_privileges`
--

CREATE TABLE `user_role_wise_privileges` (
  `id` int(11) UNSIGNED NOT NULL,
  `controller` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `resource_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_wise_privileges`
--

INSERT INTO `user_role_wise_privileges` (`id`, `controller`, `action`, `role_id`, `resource_id`) VALUES
(12384, 'Organization_configurations', 'index', 10, NULL),
(12385, 'Organization_configurations', 'view', 10, NULL),
(12386, 'Organization_configurations', 'delete', 10, NULL),
(12387, 'Feature_slideshows', 'index', 10, NULL),
(12388, 'Feature_slideshows', 'view', 10, NULL),
(12389, 'Feature_slideshows', 'add', 10, NULL),
(12390, 'Feature_slideshows', 'edit', 10, NULL),
(12391, 'Feature_slideshows', 'delete', 10, NULL),
(12392, 'Notice_boards', 'index', 10, NULL),
(12393, 'Notice_boards', 'view', 10, NULL),
(12394, 'Notice_boards', 'add', 10, NULL),
(12395, 'Notice_boards', 'edit', 10, NULL),
(12396, 'Notice_boards', 'delete', 10, NULL),
(12397, 'Manage_speches', 'index', 10, NULL),
(12398, 'Manage_speches', 'view', 10, NULL),
(12399, 'Manage_speches', 'add', 10, NULL),
(12400, 'Manage_speches', 'edit', 10, NULL),
(12401, 'Manage_speches', 'delete', 10, NULL),
(12402, 'News_events', 'index', 10, NULL),
(12403, 'News_events', 'view', 10, NULL),
(12404, 'News_events', 'add', 10, NULL),
(12405, 'News_events', 'edit', 10, NULL),
(12406, 'News_events', 'delete', 10, NULL),
(12407, 'Achievements', 'index', 10, NULL),
(12408, 'Achievements', 'view', 10, NULL),
(12409, 'Achievements', 'add', 10, NULL),
(12410, 'Achievements', 'edit', 10, NULL),
(12411, 'Achievements', 'delete', 10, NULL),
(12412, 'users', 'index', 10, NULL),
(12413, 'users', 'view', 10, NULL),
(12414, 'users', 'add', 10, NULL),
(12415, 'users', 'edit', 10, NULL),
(12416, 'users', 'delete', 10, NULL),
(12417, 'user_roles', 'index', 10, NULL),
(12418, 'user_roles', 'view', 10, NULL),
(12419, 'user_roles', 'add', 10, NULL),
(12420, 'user_roles', 'edit', 10, NULL),
(12421, 'user_roles', 'delete', 10, NULL),
(12422, 'user_roles', 'user_role_wise_privillige', 10, NULL),
(12423, 'Organization_configurations', 'index', 14, NULL),
(12424, 'Organization_configurations', 'view', 14, NULL),
(12425, 'Organization_configurations', 'add', 14, NULL),
(12426, 'Organization_configurations', 'edit', 14, NULL),
(12427, 'Organization_configurations', 'delete', 14, NULL),
(12428, 'Feature_slideshows', 'index', 14, NULL),
(12429, 'Feature_slideshows', 'view', 14, NULL),
(12430, 'Feature_slideshows', 'add', 14, NULL),
(12431, 'Feature_slideshows', 'edit', 14, NULL),
(12432, 'Feature_slideshows', 'delete', 14, NULL),
(12433, 'Notice_boards', 'index', 14, NULL),
(12434, 'Notice_boards', 'view', 14, NULL),
(12435, 'Notice_boards', 'add', 14, NULL),
(12436, 'Notice_boards', 'edit', 14, NULL),
(12437, 'Notice_boards', 'delete', 14, NULL),
(12438, 'Manage_speches', 'index', 14, NULL),
(12439, 'Manage_speches', 'view', 14, NULL),
(12440, 'Manage_speches', 'add', 14, NULL),
(12441, 'Manage_speches', 'edit', 14, NULL),
(12442, 'Manage_speches', 'delete', 14, NULL),
(12443, 'News_events', 'index', 14, NULL),
(12444, 'News_events', 'view', 14, NULL),
(12445, 'News_events', 'add', 14, NULL),
(12446, 'News_events', 'edit', 14, NULL),
(12447, 'News_events', 'delete', 14, NULL),
(12448, 'Achievements', 'index', 14, NULL),
(12449, 'Achievements', 'view', 14, NULL),
(12450, 'Achievements', 'add', 14, NULL),
(12451, 'Achievements', 'edit', 14, NULL),
(12452, 'Achievements', 'delete', 14, NULL),
(12453, 'Lectures', 'index', 14, NULL),
(12454, 'Lectures', 'view', 14, NULL),
(12455, 'Lectures', 'add', 14, NULL),
(12456, 'Lectures', 'edit', 14, NULL),
(12457, 'Lectures', 'delete', 14, NULL),
(12458, 'Important_links', 'index', 14, NULL),
(12459, 'Important_links', 'view', 14, NULL),
(12460, 'Important_links', 'add', 14, NULL),
(12461, 'Important_links', 'edit', 14, NULL),
(12462, 'Important_links', 'delete', 14, NULL),
(12463, 'users', 'index', 14, NULL),
(12464, 'users', 'view', 14, NULL),
(12465, 'users', 'add', 14, NULL),
(12466, 'users', 'edit', 14, NULL),
(12467, 'users', 'delete', 14, NULL),
(12468, 'user_roles', 'index', 14, NULL),
(12469, 'user_roles', 'view', 14, NULL),
(12470, 'user_roles', 'add', 14, NULL),
(12471, 'user_roles', 'edit', 14, NULL),
(12472, 'user_roles', 'delete', 14, NULL),
(12524, 'Organization_configurations', 'index', 1, NULL),
(12525, 'Organization_configurations', 'view', 1, NULL),
(12526, 'Organization_configurations', 'add', 1, NULL),
(12527, 'Organization_configurations', 'edit', 1, NULL),
(12528, 'Organization_configurations', 'delete', 1, NULL),
(12529, 'Feature_slideshows', 'index', 1, NULL),
(12530, 'Feature_slideshows', 'view', 1, NULL),
(12531, 'Feature_slideshows', 'add', 1, NULL),
(12532, 'Feature_slideshows', 'edit', 1, NULL),
(12533, 'Feature_slideshows', 'delete', 1, NULL),
(12534, 'Notice_boards', 'index', 1, NULL),
(12535, 'Notice_boards', 'view', 1, NULL),
(12536, 'Notice_boards', 'add', 1, NULL),
(12537, 'Notice_boards', 'edit', 1, NULL),
(12538, 'Notice_boards', 'delete', 1, NULL),
(12539, 'Manage_speches', 'index', 1, NULL),
(12540, 'Manage_speches', 'view', 1, NULL),
(12541, 'Manage_speches', 'add', 1, NULL),
(12542, 'Manage_speches', 'edit', 1, NULL),
(12543, 'Manage_speches', 'delete', 1, NULL),
(12544, 'News_events', 'index', 1, NULL),
(12545, 'News_events', 'view', 1, NULL),
(12546, 'News_events', 'add', 1, NULL),
(12547, 'News_events', 'edit', 1, NULL),
(12548, 'News_events', 'delete', 1, NULL),
(12549, 'Achievements', 'index', 1, NULL),
(12550, 'Achievements', 'view', 1, NULL),
(12551, 'Achievements', 'add', 1, NULL),
(12552, 'Achievements', 'edit', 1, NULL),
(12553, 'Achievements', 'delete', 1, NULL),
(12554, 'Lectures', 'index', 1, NULL),
(12555, 'Lectures', 'view', 1, NULL),
(12556, 'Lectures', 'add', 1, NULL),
(12557, 'Lectures', 'edit', 1, NULL),
(12558, 'Lectures', 'delete', 1, NULL),
(12559, 'Important_links', 'index', 1, NULL),
(12560, 'Important_links', 'view', 1, NULL),
(12561, 'Important_links', 'add', 1, NULL),
(12562, 'Important_links', 'edit', 1, NULL),
(12563, 'Important_links', 'delete', 1, NULL),
(12564, 'users', 'index', 1, NULL),
(12565, 'users', 'view', 1, NULL),
(12566, 'users', 'add', 1, NULL),
(12567, 'users', 'edit', 1, NULL),
(12568, 'users', 'delete', 1, NULL),
(12569, 'users', 'change_password', 1, NULL),
(12570, 'user_roles', 'index', 1, NULL),
(12571, 'user_roles', 'view', 1, NULL),
(12572, 'user_roles', 'add', 1, NULL),
(12573, 'user_roles', 'edit', 1, NULL),
(12574, 'user_roles', 'delete', 1, NULL),
(12575, 'user_roles', 'user_role_wise_privillige', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_designations`
--
ALTER TABLE `employee_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_slideshow`
--
ALTER TABLE `feature_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_configs`
--
ALTER TABLE `holiday_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imp_links`
--
ALTER TABLE `imp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`LectureId`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_spech`
--
ALTER TABLE `manage_spech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_configuration`
--
ALTER TABLE `organization_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_admission`
--
ALTER TABLE `student_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user_roles_role_Name` (`role_name`);

--
-- Indexes for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee_designations`
--
ALTER TABLE `employee_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feature_slideshow`
--
ALTER TABLE `feature_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `holiday_configs`
--
ALTER TABLE `holiday_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imp_links`
--
ALTER TABLE `imp_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `LectureId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manage_spech`
--
ALTER TABLE `manage_spech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `organization_configuration`
--
ALTER TABLE `organization_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `student_admission`
--
ALTER TABLE `student_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12576;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
