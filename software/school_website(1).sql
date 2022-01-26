-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `headline` longtext,
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
(2, 'সাফল্য ও অর্জন', 'মাইকেল মধুসূদন কলেজে সর্বশেষ ছাত্র সংসদ নির্বাচন হয় ১৯৮১ সালে', '<p>সভাপতি ও মাহবুব আলম সাধারণ সম্পাদক নির্বাচিত হন।</p>\r\n\r\n<p>ছাত্র সংসদের গঠনতন্ত্র অনুযায়ী, এ কলেজের শিক্ষার্থীরা শুধু সহসভাপতি, উপ-সভাপতি ও সাধারণ সম্পাদক পদপ্রার্থী তিনজনকে সরাসরি ভোট দিয়ে নির্বাচন করতে পারবেন।</p>\r\n\r\n<p>বাকি পদগুলো পূরণ হবে ক্লাস প্রতিনিধিদের সমন্বয়ে।</p>\r\n\r\n<p>শুরুর দিকে এ প্রক্রিয়ায় ছাত্র সংসদ গঠন করতে সমস্যা হয়নি। কিন্তু এখন কলেজের পরিসর বেড়েছে, শ্রেণিসংখ্যা এবং শিক্ষার্থীও বেড়েছে কয়েক গুণ।</p>\r\n\r\n<p>এ মহাবিদ্যালয়ের শিক্ষার্থী বর্তমানে সাড়ে তিন হাজারের বেশি। উচ্চ মাধ্যমিক শ্রেণি ছাড়াও ১৯টি বিষয়ে অনার্স ও মাস্টার্স চালু রয়েছে এখানে। এ অবস্থায় কলেজে ক্লাস প্রতিনিধি মনোনয়নই অসম্ভব হয়ে পড়েছে। তাই শিক্ষার্থীদের পক্ষ থেকে গত শতাব্দীর আশির দশকে সরাসরি ভোটের মাধ্যমেই সব পদ পূরণের দাবি ওঠে।</p>\r\n', 'lib/images/307015a2ec90d1f355.PNG', '2017-12-11 00:00:00', 7, '2019-04-12 00:00:00', 1),
(3, 'সাফল্য ও অর্জন', 'Inter-Cantonment Public School and College Parliamentary Debate Competition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'lib/images/307015a2ec90d1f355.PNG', '2017-12-11 00:00:00', 7, '2019-01-25 00:00:00', 9),
(4, 'সাফল্য ও অর্জন', 'Inter-Cantonment Public School and College Parliamentary Debate Competition', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'lib/images/307015a2ec90d1f355.PNG', '2017-12-11 00:00:00', 7, '2019-01-25 00:00:00', 9),
(5, 'সাফল্য ও অর্জন', 'Inter-Cantonment Public School and College Parliamentary Debate Competition', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'lib/images/307015a2ec90d1f355.PNG', '2017-12-11 00:00:00', 7, '2019-01-25 00:00:00', 9);

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
  `employee_address` text,
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
  `title` longtext,
  `name` varchar(500) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feature_slideshow`
--

INSERT INTO `feature_slideshow` (`id`, `title`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(57, 'feature slideshow for testing purpose', '883722860slideshow.png', '2018-04-30 02:11:53', 1, '0000-00-00 00:00:00', 0),
(62, 'test purpose slideshow', '24302banner_03.jpg', '2019-01-20 19:12:26', 9, '0000-00-00 00:00:00', 0),
(63, 'test purpose slideshow', '26285banner_04.jpg', '2019-01-20 19:12:26', 9, '0000-00-00 00:00:00', 0),
(64, 'মাইকেল মধুসূদন কলেজে সর্বশেষ ছাত্র সংসদ নির্বাচন হয় ১৯৮১ সালে', '1428715100banner_04.jpg', '2019-01-24 19:09:57', 9, '0000-00-00 00:00:00', 0);

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
  `LectureVideo` longtext NOT NULL,
  `LectureLink` varchar(255) NOT NULL,
  `LectureDetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`LectureId`, `LectureTitle`, `SubjectId`, `LectureVideo`, `LectureLink`, `LectureDetails`) VALUES
(2, 'dsdsdsd', 25, 'lib/images/12575cbad7052e7c4.jpg', '', 'sdsdsd'),
(3, 'dsdsdsd', 25, 'lib/images/252075cbad71642922.jpg', '', ' sdsdd');

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
  `headline` longtext,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `spech` longtext,
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
(4, ' প্রিন্সিপাল এর বার্তা', 'মোঃ এহতেশাম', 'প্রিন্সিপ্যাল', 'জলপাইগুড়ি জেলার বৈকণ্ঠপুর বন বিভাগের স্পেশাল টাস্কফোর্সের কর্মকর্তা সঞ্জয় দত্ত গোপনে শুরু করেন তৎপরতা। এরপর তিনি হোয়াটস অ্যাপে একটি গ্রুপ তৈরি করে ফাঁদ পাতেন। সেই ফাঁদে পা দেন ওই পাচারকারীরা। তারপর দামাদামি সাপেক্ষে চামড়াটির দাম ঠিক হয় ১০ লাখ রুপি। নির্দিষ্ট দিনে মোটরসাইকেলে করে পাঁচ পাচারকারী চিতাবাঘের চামড়া নিয়ে হাজির হন ঘটনাস্থলে। তারপর বন বিভাগের পাতা জালে ধরা পড়েন তাঁরা। ওই পাঁচজন স্বীকার করেছেন, তাঁরা চিতাবাঘটিকে মেরে মাংস দিয়ে বনভোজন করেছেন। গতকাল রোববার জলপাইগুড়ির পাশের ডুয়ার্সের ওদলাবাড়ি বনাঞ্চল থেকে ধরা পড়েন এই পাঁচজন। তাঁরা প্রত্যেকেই ডুয়ার্সের বাসিন্দা\r\n', '2017-11-26 15:07:07', 7, '2019-01-24 18:42:38', 9, 'lib/images/4996932015a1a843bee60d.png'),
(5, NULL, 'মোঃ সুজন নুয়াখালি', 'উস্তাদ ', 'জলপাইগুড়ি জেলার বৈকণ্ঠপুর বন বিভাগের স্পেশাল টাস্কফোর্সের কর্মকর্তা সঞ্জয় দত্ত গোপনে শুরু করেন তৎপরতা। এরপর তিনি হোয়াটস অ্যাপে একটি গ্রুপ তৈরি করে ফাঁদ পাতেন। সেই ফাঁদে পা দেন ওই পাচারকারীরা। তারপর দামাদামি সাপেক্ষে চামড়াটির দাম ঠিক হয় ১০ লাখ রুপি। নির্দিষ্ট দিনে মোটরসাইকেলে করে পাঁচ পাচারকারী চিতাবাঘের চামড়া নিয়ে হাজির হন ঘটনাস্থলে। তারপর বন বিভাগের পাতা জালে ধরা পড়েন তাঁরা। ওই পাঁচজন স্বীকার করেছেন, তাঁরা চিতাবাঘটিকে মেরে মাংস দিয়ে বনভোজন করেছেন। গতকাল রোববার জলপাইগুড়ির পাশের ডুয়ার্সের ওদলাবাড়ি বনাঞ্চল থেকে ধরা পড়েন এই পাঁচজন। তাঁরা প্রত্যেকেই ডুয়ার্সের বাসিন্দা\r\n', '2017-12-06 14:09:23', 7, '2019-01-22 20:06:08', 9, 'lib/images/32835a27ed79a9e94.png');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `headline` longtext,
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
(2, 'রিপোর্ট এবং ঘটনা', 'National Independence Day', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'lib/images/166485a2eb70ef3dc0.PNG', '2017-12-11 00:00:00', 7, '2019-01-24 00:00:00', 9, 0),
(5, 'রিপোর্ট এবং ঘটনা', 'World Labour Day', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'lib/images/48065a2eb74ed1085.jpg', '2017-12-11 00:00:00', 7, '2019-01-24 00:00:00', 9, 0),
(6, 'রিপোর্ট এবং ঘটনা', 'A1 একাডেমীতে স্যাগতম', '<p>জলপাইগুড়ি জেলার বৈকণ্ঠপুর বন বিভাগের স্পেশাল টাস্কফোর্সের কর্মকর্তা সঞ্জয় দত্ত গোপনে শুরু করেন তৎপরতা। এরপর তিনি হোয়াটস অ্যাপে একটি গ্রুপ তৈরি করে ফাঁদ পাতেন। সেই ফাঁদে পা দেন ওই পাচারকারীরা। তারপর দামাদামি সাপেক্ষে চামড়াটির দাম ঠিক হয় ১০ লাখ রুপি। নির্দিষ্ট দিনে মোটরসাইকেলে করে পাঁচ পাচারকারী চিতাবাঘের চামড়া নিয়ে হাজির হন ঘটনাস্থলে। তারপর বন বিভাগের পাতা জালে ধরা পড়েন তাঁরা। ওই পাঁচজন স্বীকার করেছেন, তাঁরা চিতাবাঘটিকে মেরে মাংস দিয়ে বনভোজন করেছেন। গতকাল রোববার জলপাইগুড়ির পাশের ডুয়ার্সের ওদলাবাড়ি বনাঞ্চল থেকে ধরা পড়েন এই পাঁচজন। তাঁরা প্রত্যেকেই ডুয়ার্সের বাসিন্দা</p>\r\n', 'lib/images/8551087805c4748b02be35.png', '2019-01-22 00:00:00', 9, '2019-04-16 00:00:00', 1, 1),
(8, 'রিপোর্ট এবং ঘটনা', 'মাইকেল মধুসূদন কলেজে সর্বশেষ ছাত্র সংসদ নির্বাচন হয় ১৯৮১ সালে', 'মাইকেল মধুসূদন কলেজে সর্বশেষ ছাত্র সংসদ নির্বাচন হয় ১৯৮১ সালে। তখন আব্দুল কাদের সহসভাপতি ও মাহবুব আলম সাধারণ সম্পাদক নির্বাচিত হন। ছাত্র সংসদের গঠনতন্ত্র অনুযায়ী, এ কলেজের শিক্ষার্থীরা শুধু সহসভাপতি, উপ-সভাপতি ও সাধারণ সম্পাদক পদপ্রার্থী তিনজনকে সরাসরি ভোট দিয়ে নির্বাচন করতে পারবেন। বাকি পদগুলো পূরণ হবে ক্লাস প্রতিনিধিদের সমন্বয়ে। শুরুর দিকে এ প্রক্রিয়ায় ছাত্র সংসদ গঠন করতে সমস্যা হয়নি।\r\n\r\n\r\nকিন্তু এখন কলেজের পরিসর বেড়েছে, শ্রেণিসংখ্যা এবং শিক্ষার্থীও বেড়েছে কয়েক গুণ। এ মহাবিদ্যালয়ের শিক্ষার্থী বর্তমানে সাড়ে তিন হাজারের বেশি। উচ্চ মাধ্যমিক শ্রেণি ছাড়াও ১৯টি বিষয়ে অনার্স ও মাস্টার্স চালু রয়েছে এখানে। এ অবস্থায় কলেজে ক্লাস প্রতিনিধি মনোনয়নই অসম্ভব হয়ে পড়েছে। তাই শিক্ষার্থীদের পক্ষ থেকে গত শতাব্দীর আশির দশকে সরাসরি ভোটের মাধ্যমেই সব পদ পূরণের দাবি ওঠে\r\n', 'lib/images/20559557965c47553ad8836.jpeg', '2019-01-22 00:00:00', 9, '2019-01-24 00:00:00', 9, 0),
(9, '৩৭তম প্রিলি. (পূর্ণাঙ্গ কোর্স) ভর্তি তথ্য :', '* প্রিলিমিনারি কোর্স প্ল্যান', '<p>বিষয়&nbsp; &nbsp;নম্বর&nbsp; &nbsp;ক্লাস সংখ্যা&nbsp; &nbsp;ক্লাস টেস্ট&nbsp; &nbsp;লেকচার শীট&nbsp; &nbsp;এ্যাসাইনমন্টে টেস্ট&nbsp; &nbsp;সাবজেক্ট টেস্ট&nbsp; &nbsp;রিভিউ টেস্ট&nbsp; &nbsp;মডেল টেস্ট<br />\r\nবাংলা ভাষা ও সাহিত্য&nbsp; &nbsp;৩৫&nbsp; &nbsp;২০টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nইংরেজি ভাষা ও সাহিত্য&nbsp; &nbsp;৩৫&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nগাণিতিক যুক্তি&nbsp; &nbsp;১৫&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;২০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nমানসিক দক্ষতা&nbsp; &nbsp;১৫&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nসাধারণ বিজ্ঞান&nbsp; &nbsp;১৫&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nকম্পিউটার ও তথ্য প্রযুক্তি&nbsp; &nbsp;১৫&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nবাংলাদেশ বিষয়াবলি&nbsp; &nbsp;৩০&nbsp; &nbsp;১৫ টি&nbsp; &nbsp;১৫ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nআন্তর্জাতিক বিষয়াবলি&nbsp; &nbsp;২০&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nভূগোল ও দুর্যোগ ব্যবস্থাপনা&nbsp; &nbsp;১০&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৩ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nনৈতিকতা, মূল্যবোধ ও সুশাসন&nbsp; &nbsp;১০&nbsp; &nbsp;৫ টি&nbsp; &nbsp;৫ টি&nbsp; &nbsp;২ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp;১ টি&nbsp; &nbsp; &nbsp;<br />\r\nমোট&nbsp; &nbsp;২০০&nbsp; &nbsp;১২০ টি&nbsp; &nbsp;১০০ টি&nbsp; &nbsp;১০০ টি&nbsp; &nbsp;১৪ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১০ টি&nbsp; &nbsp;১১ টি<br />\r\n<br />\r\n[মোট ক্লাস- ১২০, ক্লাস টেস্ট-১০০, এ্যাসাইনমেন্ট টেস্ট-১৪, বিষয়ভিত্তিক পরীক্ষা-১০, রিভিউ টেস্ট-১০, মডেল টেস্ট-১১]&nbsp;<br />\r\nব্যাচ তথ্য:<br />\r\nপ্রথম ব্যাচ&nbsp; &nbsp;: সময়- বেলা ১২ টা,&nbsp; &nbsp;ক্লাস শুরু-১২-০৯-১৫ইং (রবিবার)<br />\r\nদ্বিতীয় ব্যাচ&nbsp; &nbsp;: সময়-বিকাল ৩ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-০৫-১০-১৫ইং (সোমবার)<br />\r\nতৃতীয় ব্যাচ&nbsp; &nbsp;: সময়: সকাল-১০ টা,&nbsp; &nbsp;ক্লাস শুরু-২৫-১০-১৫ইং (রবিবার)<br />\r\nচতুর্থ ব্যাচ&nbsp; &nbsp;: সময়: সন্ধ্যা-৭ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-২৪-১১-১৫ইং (মঙ্গলবার)<br />\r\nপঞ্চম ব্যাচ&nbsp; &nbsp;: সময়: বিকাল-৫ টা,&nbsp; &nbsp;ক্লাস শুরু-২৪-১২-১৫ইং (শনিবার)</p>', NULL, '2019-04-12 00:00:00', 1, '0000-00-00 00:00:00', 0, 2),
(10, '৩৬তম লিখিত (পূর্ণাঙ্গ কোর্স) ভর্তি তথ্য', 'লিখিত কোর্স প্ল্যান', '<p>প্রথম ব্যাচ&nbsp; &nbsp;: সময়- বেলা ১২ টা,&nbsp; &nbsp;ক্লাস শুরু-১৫-০৯-১৫ইং (মঙ্গলবার)<br />\r\nদ্বিতীয় ব্যাচ&nbsp; &nbsp;: সময়-বিকাল ৩ টা,&nbsp; &nbsp; &nbsp;ক্লাস শুরু-০৫-১০-১৫ইং (সোমবার)<br />\r\n<strong>ভর্তি তথ্য:</strong><br />\r\n০৮-০৯-২০১৫ থেকে ১৫-০৯-২০১৫ পর্যন্ত &nbsp; &nbsp; ১৫,২০০ টাকা<br />\r\n১৬-০৯-২০১৫ থেকে ০৫-১০-২০১৫ পর্যন্ত&nbsp; ১৬,২০০ টাকা</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"1\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<caption>লিখিত কোর্স প্ল্যান</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">বিষয়</th>\r\n			<th scope=\"col\">নম্বর</th>\r\n			<th scope=\"col\">ক্লাস সংখ্যা&nbsp; &nbsp;ক্লাস টেস্ট&nbsp; &nbsp;বিষয়ভিত্তিক টেস্ট&nbsp; &nbsp;মডেল টেস্ট&nbsp; &nbsp;লেকচার শীট</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>বাংলা ভাষা ও সাহিত্য</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ইংরেজি ভাষা ও সাহিত্য&nbsp; &nbsp;</td>\r\n			<td>২০০&nbsp;</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>বাংলাদেশ বিষয়াবলি</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n		<tr>\r\n			<td>বাংলাদেশ বিষয়াবলি</td>\r\n			<td>২০০</td>\r\n			<td>১২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ৬টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;২ টি&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;১০টি</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '2019-04-12 00:00:00', 1, '2019-04-12 00:00:00', 1, 3);

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
(75, ' ভূরিভোজের পর বাঘের চামড়া বিক্রি করার ফাঁদে গ্রেপ্তার ৫', 'sham5.png', 1, 9, '2017-11-16 18:02:12', '2019-01-24 20:48:56'),
(76, 'আগামী 29 আগষ্ট বিদ্যালয়ে ফল সেমিষ্টার এর পাঠদান শুরু হবে। এ উপলক্ষ্যে সকল শিক্ষার্থীকে নির্ধারিত সময়ে উপস্থিত থাকতে বলা হচ্ছে।', '25_01_2017.pdf', 1, 9, '2017-11-19 18:03:51', '2019-01-22 23:24:32'),
(77, 'প্রি-স্প্রিং সেমিষ্টার পরীক্ষা ও বার্ষিক ক্রীড়া প্রতিযোগিতা প্রসংগে।', '25_01_2017.pdf', 1, 9, '2017-11-16 18:03:51', '2019-01-22 23:25:02'),
(78, 'সম্মানিত অভিভাবক/অভিভাবিকা, 1 সেপ্টেম্বর-2018, শনিবার ‘অভিভাবক দিবসে’ সামার সেমিষ্টার পরীক্ষার উত্তরপত্র প্রদান করা হবে। উক্ত ‘অভিভাবক দিবসে’ আপনার সন্তানের পরীক্ষার উত্তরপত্র সংগ্রহ এবং মতামত প্রদানের জন্য অাপনি আমন্ত্রিত।', '25_01_2017.pdf', 1, 9, '2017-11-12 18:03:51', '2019-01-22 23:25:39'),
(79, ' চিঠি লিখে জিতে নিন বাড়ি!', 'ff1.pdf', 9, 0, '2019-01-24 20:11:08', NULL);

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
  `org_contact` longtext,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_configuration`
--

INSERT INTO `organization_configuration` (`id`, `title`, `organization_name`, `year`, `organization_slogan`, `eiin_no`, `org_email`, `org_contact`, `image`, `address`) VALUES
(2, 'শিক্ষা নিয়ে গড়বো দেশ, শেখ হাসিনার বাংলাদেশ', 'শাম একাডেমি', '1997', 'শিক্ষা নিয়ে গড়বো দেশ, শেখ হাসিনার বাংলাদেশ', '11121', 'info@inntechbd.com', '+8801746 952089', 'lib/images/2800801685cb1356bc21ac.jpg', 'rngamatia , fulbaria , mymenisngh');

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
  `is_parents` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `is_parents`) VALUES
(1, '@admiinn', 1, 'Admin', '2016-04-01', 1, 'admin', 0),
(6, 'f72940fe7ed0666735566f807dc6e4d0', 13, 'Golam Rosul', '2017-01-26', 1, '01552875498', 1),
(7, 'test_user@34', 10, 'test_user', '2017-01-26', 1, 'test_user', 0),
(8, '30c74a6484e399acca32a6ce26ef791b', 13, 'Father ', '2017-01-26', 1, '01822447078', 1),
(9, 'c4ca4238a0b923820dcc509a6f75849b', 10, 'test_user', '2018-05-08', 1, 'test_user', 0),
(10, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'shams', '2019-01-09', 1, 'shams', 0);

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
  `is_editable` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `role_description`, `parent_id`, `lft`, `rgt`, `is_editable`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, 1, 38, 0),
(10, 'Teacher', 'Teacher', NULL, NULL, NULL, 0),
(12, 'Computer Operator', NULL, NULL, NULL, NULL, 1);

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
(11968, 'Organization_configurations', 'index', 10, NULL),
(11969, 'Organization_configurations', 'view', 10, NULL),
(11970, 'Organization_configurations', 'add', 10, NULL),
(11971, 'Organization_configurations', 'edit', 10, NULL),
(11972, 'Organization_configurations', 'delete', 10, NULL),
(11973, 'Admins', 'index', 10, NULL),
(11974, 'Admins', 'view', 10, NULL),
(11975, 'Admins', 'add', 10, NULL),
(11976, 'Admins', 'edit', 10, NULL),
(11977, 'Admins', 'delete', 10, NULL),
(11978, 'Change_passwords', 'index', 10, NULL),
(11979, 'Change_passwords', 'view', 10, NULL),
(11980, 'Change_passwords', 'add', 10, NULL),
(11981, 'Change_passwords', 'edit', 10, NULL),
(11982, 'Change_passwords', 'delete', 10, NULL),
(11983, 'Feature_slideshows', 'index', 10, NULL),
(11984, 'Feature_slideshows', 'view', 10, NULL),
(11985, 'Feature_slideshows', 'add', 10, NULL),
(11986, 'Feature_slideshows', 'edit', 10, NULL),
(11987, 'Feature_slideshows', 'delete', 10, NULL),
(11988, 'Notice_boards', 'index', 10, NULL),
(11989, 'Notice_boards', 'view', 10, NULL),
(11990, 'Notice_boards', 'add', 10, NULL),
(11991, 'Notice_boards', 'edit', 10, NULL),
(11992, 'Notice_boards', 'delete', 10, NULL),
(11993, 'Manage_speches', 'index', 10, NULL),
(11994, 'Manage_speches', 'view', 10, NULL),
(11995, 'Manage_speches', 'add', 10, NULL),
(11996, 'Manage_speches', 'edit', 10, NULL),
(11997, 'Manage_speches', 'delete', 10, NULL),
(11998, 'News_events', 'index', 10, NULL),
(11999, 'News_events', 'view', 10, NULL),
(12000, 'News_events', 'add', 10, NULL),
(12001, 'News_events', 'edit', 10, NULL),
(12002, 'News_events', 'delete', 10, NULL),
(12003, 'Achievements', 'index', 10, NULL),
(12004, 'Achievements', 'view', 10, NULL),
(12005, 'Achievements', 'add', 10, NULL),
(12006, 'Achievements', 'edit', 10, NULL),
(12007, 'Achievements', 'delete', 10, NULL),
(12008, 'Holiday_configs', 'index', 10, NULL),
(12009, 'Holiday_configs', 'view', 10, NULL),
(12010, 'Holiday_configs', 'add', 10, NULL),
(12011, 'Holiday_configs', 'edit', 10, NULL),
(12012, 'Holiday_configs', 'delete', 10, NULL),
(12013, 'Create_notices', 'index', 10, NULL),
(12014, 'Create_notices', 'view', 10, NULL),
(12015, 'Create_notices', 'add', 10, NULL),
(12016, 'Create_notices', 'edit', 10, NULL),
(12017, 'Create_notices', 'delete', 10, NULL),
(12018, 'Employee_designations', 'index', 10, NULL),
(12019, 'Employee_designations', 'view', 10, NULL),
(12020, 'Employee_designations', 'add', 10, NULL),
(12021, 'Employee_designations', 'edit', 10, NULL),
(12022, 'Employee_designations', 'delete', 10, NULL),
(12023, 'Employees', 'index', 10, NULL),
(12024, 'Employees', 'view', 10, NULL),
(12025, 'Employees', 'add', 10, NULL),
(12026, 'Employees', 'edit', 10, NULL),
(12027, 'Employees', 'delete', 10, NULL),
(12028, 'Student_admissions', 'index', 10, NULL),
(12029, 'Student_admissions', 'view', 10, NULL),
(12030, 'Student_admissions', 'add', 10, NULL),
(12031, 'Student_admissions', 'edit', 10, NULL),
(12032, 'Student_admissions', 'delete', 10, NULL),
(12033, 'users', 'index', 10, NULL),
(12034, 'users', 'view', 10, NULL),
(12035, 'users', 'add', 10, NULL),
(12036, 'users', 'edit', 10, NULL),
(12037, 'users', 'delete', 10, NULL),
(12038, 'user_roles', 'index', 10, NULL),
(12039, 'user_roles', 'view', 10, NULL),
(12040, 'user_roles', 'add', 10, NULL),
(12041, 'user_roles', 'edit', 10, NULL),
(12042, 'user_roles', 'delete', 10, NULL),
(12043, 'user_roles', 'user_role_wise_privillige', 10, NULL),
(12195, 'Organization_configurations', 'index', 1, NULL),
(12196, 'Organization_configurations', 'view', 1, NULL),
(12197, 'Organization_configurations', 'add', 1, NULL),
(12198, 'Organization_configurations', 'edit', 1, NULL),
(12199, 'Organization_configurations', 'delete', 1, NULL),
(12200, 'Admins', 'index', 1, NULL),
(12201, 'Admins', 'view', 1, NULL),
(12202, 'Admins', 'add', 1, NULL),
(12203, 'Admins', 'edit', 1, NULL),
(12204, 'Admins', 'delete', 1, NULL),
(12205, 'Change_passwords', 'index', 1, NULL),
(12206, 'Change_passwords', 'view', 1, NULL),
(12207, 'Change_passwords', 'add', 1, NULL),
(12208, 'Change_passwords', 'edit', 1, NULL),
(12209, 'Change_passwords', 'delete', 1, NULL),
(12210, 'Feature_slideshows', 'index', 1, NULL),
(12211, 'Feature_slideshows', 'view', 1, NULL),
(12212, 'Feature_slideshows', 'add', 1, NULL),
(12213, 'Feature_slideshows', 'edit', 1, NULL),
(12214, 'Feature_slideshows', 'delete', 1, NULL),
(12215, 'Notice_boards', 'index', 1, NULL),
(12216, 'Notice_boards', 'view', 1, NULL),
(12217, 'Notice_boards', 'add', 1, NULL),
(12218, 'Notice_boards', 'edit', 1, NULL),
(12219, 'Notice_boards', 'delete', 1, NULL),
(12220, 'Manage_speches', 'index', 1, NULL),
(12221, 'Manage_speches', 'view', 1, NULL),
(12222, 'Manage_speches', 'add', 1, NULL),
(12223, 'Manage_speches', 'edit', 1, NULL),
(12224, 'Manage_speches', 'delete', 1, NULL),
(12225, 'News_events', 'index', 1, NULL),
(12226, 'News_events', 'view', 1, NULL),
(12227, 'News_events', 'add', 1, NULL),
(12228, 'News_events', 'edit', 1, NULL),
(12229, 'News_events', 'delete', 1, NULL),
(12230, 'Achievements', 'index', 1, NULL),
(12231, 'Achievements', 'view', 1, NULL),
(12232, 'Achievements', 'add', 1, NULL),
(12233, 'Achievements', 'edit', 1, NULL),
(12234, 'Achievements', 'delete', 1, NULL),
(12235, 'Lectures', 'index', 1, NULL),
(12236, 'Lectures', 'view', 1, NULL),
(12237, 'Lectures', 'add', 1, NULL),
(12238, 'Lectures', 'edit', 1, NULL),
(12239, 'Lectures', 'delete', 1, NULL),
(12240, 'Important_links', 'index', 1, NULL),
(12241, 'Important_links', 'view', 1, NULL),
(12242, 'Important_links', 'add', 1, NULL),
(12243, 'Important_links', 'edit', 1, NULL),
(12244, 'Important_links', 'delete', 1, NULL),
(12245, 'Holiday_configs', 'index', 1, NULL),
(12246, 'Holiday_configs', 'view', 1, NULL),
(12247, 'Holiday_configs', 'add', 1, NULL),
(12248, 'Holiday_configs', 'edit', 1, NULL),
(12249, 'Holiday_configs', 'delete', 1, NULL),
(12250, 'Create_notices', 'index', 1, NULL),
(12251, 'Create_notices', 'view', 1, NULL),
(12252, 'Create_notices', 'add', 1, NULL),
(12253, 'Create_notices', 'edit', 1, NULL),
(12254, 'Create_notices', 'delete', 1, NULL),
(12255, 'Employee_designations', 'index', 1, NULL),
(12256, 'Employee_designations', 'view', 1, NULL),
(12257, 'Employee_designations', 'add', 1, NULL),
(12258, 'Employee_designations', 'edit', 1, NULL),
(12259, 'Employee_designations', 'delete', 1, NULL),
(12260, 'Employees', 'index', 1, NULL),
(12261, 'Employees', 'view', 1, NULL),
(12262, 'Employees', 'add', 1, NULL),
(12263, 'Employees', 'edit', 1, NULL),
(12264, 'Employees', 'delete', 1, NULL),
(12265, 'Student_admissions', 'index', 1, NULL),
(12266, 'Student_admissions', 'view', 1, NULL),
(12267, 'Student_admissions', 'add', 1, NULL),
(12268, 'Student_admissions', 'edit', 1, NULL),
(12269, 'Student_admissions', 'delete', 1, NULL),
(12270, 'users', 'index', 1, NULL),
(12271, 'users', 'view', 1, NULL),
(12272, 'users', 'add', 1, NULL),
(12273, 'users', 'edit', 1, NULL),
(12274, 'users', 'delete', 1, NULL),
(12275, 'users', 'change_password', 1, NULL),
(12276, 'user_roles', 'index', 1, NULL),
(12277, 'user_roles', 'view', 1, NULL),
(12278, 'user_roles', 'add', 1, NULL),
(12279, 'user_roles', 'edit', 1, NULL),
(12280, 'user_roles', 'delete', 1, NULL),
(12281, 'user_roles', 'user_role_wise_privillige', 1, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
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
  MODIFY `LectureId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12282;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
