-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2020 at 07:28 AM
-- Server version: 5.6.41-84.1
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
-- Database: `kumaravi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_concept_evolution`
--

CREATE TABLE `about_concept_evolution` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(225) NOT NULL,
  `desc` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_concept_evolution`
--

INSERT INTO `about_concept_evolution` (`id`, `title`, `image`, `desc`, `add_date`, `update_date`, `status`) VALUES
(1, 'Swadhistan Chakra', 'c74ff6baaba5255a0b674b4df18fcf93.png', '<p><strong>SIGNIFICANCE OF SIX PETTALED LOTUS</strong></p>\r\n\r\n<p>Swadhisthan Chakra &rdquo; Swadisthana actually means &lsquo;dwelling place of the self&rsquo;.</p>\r\n\r\n<p>The symbol for the Swadhisthana Chakra is a six petal lotus flower. It is related to the moon which represents water.</p>\r\n\r\n<p>One who meditates on Swadhisthana is believed to obtain the status of a lord among yogis.</p>\r\n', '2020-08-27 01:36:51', '2020-08-29 12:15:15', '1'),
(2, 'Fiery Lotus', '804158f05ee6739ab88648ada715500b.jpg', '<p>There was an Asur called Tarakasura, who defeated the Devas and over turn their paradise. The only way to restore cosmic balance was by kiling him. But, Taraka had a boon: only a little baby who leads an army could kill him. The Devas wondered how as to they could produce a warror who was strong and mature enough to fight a battle even though he was a baby. They approached Brahma, who informed them, that such a child can only be produced by Siva.</p>\r\n\r\n<p>On the request of Shakti and the Devas, Siva releases his power in the form of six fiery sparks and hands them over to Agni</p>\r\n', '2020-08-27 01:37:22', '0000-00-00 00:00:00', '1'),
(3, 'Six Babies in Six Petalled Lotus', '6ebbe9d52e03957c8135fa833378336d.jpg', '<p>Ganga (The Ganga River diety) look the divine sparks of grace to Himalayan lake Sara-vana (forest of reeds) Polgai.</p>\r\n\r\n<p>These six Fire sparks became Six Beautiful Babies on Six Red Lotus Flowers</p>\r\n\r\n<p>Parvathi Matha combined the babies as one baby with 6 faces known as Shanmukha.</p>\r\n', '2020-08-27 01:37:43', '0000-00-00 00:00:00', '1'),
(4, 'Parvathi Devi & Subrahmanya Swamy', '139e093898c28a285ece5e268aeefbb2.jpg', '<p>Through the 6 faces, He can see towards East, West, North , South Sky and Earth.</p>\r\n\r\n<p>The Six heads of Kartikeya also represent Six attributes of the Diety.</p>\r\n\r\n<p>They are Gnana(Wisdom), Vairagya (Detachment), Bala (Strength), Keerthi(fame) Shree (Wealth) and Aishwarya(Divine Power)</p>\r\n', '2020-08-27 01:38:03', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `about_sthala_puranam`
--

CREATE TABLE `about_sthala_puranam` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `desc` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_sthala_puranam`
--

INSERT INTO `about_sthala_puranam` (`id`, `image`, `desc`, `add_date`, `update_date`, `status`) VALUES
(1, 'kumar-kartikeya.png', '<p>The legend is that Kumar Kartikeya, the younger son of Lord Siva once got angry and came to the Kronch Hills from Kailash.</p>\r\n\r\n<p>Lord Siva and Maa Parvati came here and stayed on with the name Arjun and Mallika. Thus the place and the temple were called Mallikarjun. This is one of the Dwadasa Jyotirlingas.</p>\r\n', '2020-08-27 12:30:17', '2020-08-27 01:24:58', '1'),
(2, '6051dcf702e5990ce374893822d538eb.png', '<p>It is significant to the Hindu sects of both&nbsp;Saivam&nbsp;and&nbsp;Shaktam&nbsp;as this temple is referred to as one of the twelve&nbsp;Jyothirlingas&nbsp;of Lord Siva and as one of the eighteen&nbsp;Shakti Peethas&nbsp;of goddess&nbsp;Parvati.</p>\r\n\r\n<p>Parvati&nbsp;is depicted as Bhramaramba. It is the one of the only three temples in India in which both Jyotirlinga and Shaktipeeth is revered.</p>\r\n', '2020-08-27 01:18:19', '0000-00-00 00:00:00', '1'),
(3, '3ec55f5dbe5a7a50639703fd5af51057.png', '<p>This small shrine located about 3 km from Srisailam and frequented by pilgrims since ancient times.</p>\r\n\r\n<p>The traditional belief is that the Ganapathi in this temple keeps regular account of all the pilgrims to tender &lsquo;Sakshyam&rsquo; (evidence) of their visit to this Kshetram and is named as Sakshi Ganapathi.</p>\r\n', '2020-08-27 01:19:24', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `org_password` varchar(150) NOT NULL,
  `otp` varchar(15) NOT NULL,
  `security_password` varchar(150) NOT NULL,
  `admin_status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `mobile`, `org_password`, `otp`, `security_password`, `admin_status`) VALUES
(2, 'admin@advitsoft.com', 'e6e061838856bf47e1de730719fb2609', '', 'admin@123', '', '123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `title`, `desc`, `add_date`, `update_date`, `status`) VALUES
(1, 'FOR INDIAN CONTRIBUTIONS', '<p>A/c Name :<strong>&nbsp;SRI SHARADA PEETHAM, SRINGERI ,</strong><br />\r\nACCOUNT - SRI KUMARA VIHARAM, SRISAILAM<br />\r\nPurpose : SRI KUMARA VIHARAM, SRISAILAM<br />\r\nBank : KARNATAKA BANK LTD<br />\r\nA/c. No : 3292500101791401<br />\r\nIFSC Code : KARB0000329<br />\r\nBranch : BANJARA HILLS</p>\r\n', '2020-08-27 14:05:18', '2020-09-02 02:21:09', '1'),
(2, 'FOR FOREIGN CONTRIBUTIONS', '<p>A/c Name : <strong>SRI SHARADA PEETHAM, SRINGERI</strong><br />\r\nPurpose : SRI KUMARA VIHARAM, SRISAILAM<br />\r\nBank : STATE BANK OF INDIA<br />\r\nA/c. No : 37487062775<br />\r\nSWIFT CODE : SBININBB770<br />\r\nIFSC Code : SBIN0040290<br />\r\nBranch : SRINGERI KARNATAKA STATE</p>\r\n', '2020-08-27 02:44:01', '2020-08-27 05:45:17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blessings`
--

CREATE TABLE `blessings` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `desc` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blessings`
--

INSERT INTO `blessings` (`id`, `image`, `title`, `desc`, `add_date`, `update_date`, `status`) VALUES
(1, 'Sringeri-Mutt.jpg', '<p>Jagadguru Pujyashri Sri Bharati Tirtha Maha Swaminah, Sri Sharadha Peetham, Sringeri, Karnataka.</p>\r\n', '<p>Has visited the site and approved the temple concept and accepted to be as a chief patron to the temple.</p>\r\n', '2020-08-26 18:28:19', '2020-08-26 06:56:40', '1'),
(2, 'ff2e8862c4fdb948bb17bab9cbd4e3a5.jpg', '<p>Jagadguru Pujyashri Sri Vidhusekhara Bharati Swaminah, Sri Sharadha Peetham, Sringeri,Karnataka.</p>\r\n', '<p>Visited the Temple premises and blessed by performing the Rituals of Bhoomi Puja.</p>\r\n', '2020-08-26 06:51:54', '2020-08-26 06:53:19', '1'),
(3, '890e6f737eb08a6d3fac0f4c22c098ee.jpg', '<p>Pujyasri Omkarananda Swaminah, Chidbhavananda Ashram Theni,Tamilnadu.</p>\r\n', '<p>Appreciated the concept of temple and blessed</p>\r\n', '2020-08-26 06:54:31', '0000-00-00 00:00:00', '1'),
(4, 'fb0bd454011a55aea839c5e190ec4015.jpg', '<p>Guru Dev Sri Sri Ravi Shankar JI Art of Living</p>\r\n', '<p>Suggested us to build replicas of remaining 11 jyothirlingas, so that all the devotees may get an opportunity to have a glimpse of spiritual jyothirlingas in Saiva Kshetra.</p>\r\n', '2020-08-26 06:55:06', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc` text NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `desc`, `update_date`) VALUES
(1, 'Registered Office', '<p>Sri Sri Jagadguru Shankaracharya Mahasamstanam<br />\r\nDakshinamnaya, Sri Sharada Peetham,<br />\r\nSringeri- 577139, Karnataka,India</p>\r\n', '2020-08-26 07:55:51'),
(2, 'For Correspondence', '<p>Plot No.92, Road No.72, Prashasan Nagar, Jubilee Hills, Hyderabad &ndash; 500096, Telangana, India</p>\r\n', '2020-08-26 07:56:03'),
(3, 'Project Office', '<p>Enugulu Cheruvu Area,<br />\r\nNear High School, Srisailam-518101,<br />\r\nKurnool District, Andhra Pradesh, India.</p>\r\n', '2020-08-26 07:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_map`
--

CREATE TABLE `contact_map` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_map`
--

INSERT INTO `contact_map` (`id`, `desc`) VALUES
(1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15335.304014431593!2d78.861515470712!3d16.074516422040954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb5656d70792343%3A0xb2342e1f2ed1834b!2sSrisailam%2C%20Andhra%20Pradesh%20518101!5e0!3m2!1sen!2sin!4v1596300731331!5m2!1sen!2sin\" width=\"100%\" height=\"300\" frameborder=\"0\" style=\"border:1px solid #2a9da7; padding:10px;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `don_id` int(11) NOT NULL,
  `donationid` varchar(225) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `doner_type` varchar(15) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `Surname` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Son_Daughter` varchar(150) NOT NULL,
  `Mobile_Number` varchar(15) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Address` text NOT NULL,
  `Pincode` varchar(15) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `Gotram` varchar(150) NOT NULL,
  `Certificate` varchar(150) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `Birthstar` varchar(150) NOT NULL,
  `reference_marking` varchar(150) NOT NULL,
  `Reference` varchar(250) NOT NULL,
  `Purpose` varchar(150) NOT NULL,
  `PAN` varchar(150) NOT NULL,
  `Firm` varchar(150) NOT NULL,
  `general_donation` float(10,2) NOT NULL,
  `temple_stone` float(10,2) NOT NULL,
  `temple_flooor` float(10,2) NOT NULL,
  `sloka` float(10,2) NOT NULL,
  `total_amount` float(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `payment_id` varchar(225) NOT NULL,
  `payment_details` text NOT NULL,
  `payment_status` varchar(15) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`don_id`, `donationid`, `user_id`, `doner_type`, `fullName`, `Surname`, `gender`, `Date_of_Birth`, `Son_Daughter`, `Mobile_Number`, `Email`, `Address`, `Pincode`, `city`, `state`, `Gotram`, `Certificate`, `phoneNumber`, `Birthstar`, `reference_marking`, `Reference`, `Purpose`, `PAN`, `Firm`, `general_donation`, `temple_stone`, `temple_flooor`, `sloka`, `total_amount`, `add_date`, `payment_id`, `payment_details`, `payment_status`) VALUES
(1, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 12264.00, '2020-09-02 04:20:55', 'pay_FY8PCfU876HVmC', 'entity :payment<br>Amount :1226400<br>currency :INR<br>status :captured\r\n                            <br>method :netbanking<br>\r\n                            bank :ICIC<br>Trastion Id :9707974', '1'),
(2, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 11148.00, '2020-09-02 04:35:36', 'pay_FY8ekMqesPDB5V', '', '1'),
(3, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 6132.00, '2020-09-02 08:12:43', 'pay_FYCMDZPYOQSONZ', '', '1'),
(4, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 6132.00, '2020-09-03 09:00:34', 'pay_FYPRMlXZ7J4pjO', '', '1'),
(5, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 113192.00, '2020-09-03 09:27:39', '', '', '2'),
(6, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 6225210.00, '2020-09-03 09:27:43', '', '', '2'),
(7, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 97326.00, '2020-09-03 11:25:49', '', '', '2'),
(8, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 261960.00, '2020-09-03 12:47:47', '', '', '2'),
(9, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 2016.00, '2020-09-03 12:54:48', '', '', '2'),
(10, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 1116.00, '2020-09-03 01:58:41', '', '', '2'),
(11, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 61320.00, '2020-09-03 01:59:07', '', '', '2'),
(12, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 1116.00, '2020-09-03 01:59:14', '', '', '2'),
(13, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 1116.00, '2020-09-03 02:01:00', '', '', '2'),
(14, '', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 1116.00, '2020-09-03 02:01:48', '', '', '2'),
(15, '', '5', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 13404.00, '2020-09-07 01:56:19', '', '', '2'),
(16, '', '5', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 225798.00, '2020-09-07 02:34:10', '', '', '2'),
(17, '', '', '', 'sx', 'azsxd', 'Male', '2020-09-11', 'dfghj', '5678', 'fghj@gmail.com', 'dfghj', '34567', 'dfgh', 'dfghj', 'xcvbn', 'dfghj', 'ghj', 'Pushyami', 'Facebook', '', 'fghj', 'dfgh', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 01:17:01', '', '', '2'),
(18, '', '', '', 'asxd', 'azsx', 'Male', '2020-09-10', 'sdfgh', '5678', 'vb@gmail.com', 'fghj', '2345', 'fghj', 'bn', 'fgh', 'fgh', 'fghj', 'Pushyami', 'Facebook', '', 'ghj', 'rg', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 01:38:41', '', '', '2'),
(19, '', '', '', 'dqcvb', 'c vb', 'Female', '2020-09-20', 'fghjk', '12345', 'xcvb@gmail.com', 'dfvghj', '3456', ' vbn', 'xcvb', ' cvbn', 'xcvbn', 'vb', 'Jyeshta', 'Facebook', '', 'sxdcfgb', 'cdfgh', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 01:45:29', '', '', '2'),
(20, '', '', '', 'dqcvb', 'c vb', 'Female', '2020-09-20', 'fghjk', '12345', 'xcvb@gmail.com', 'dfvghj', '3456', ' vbn', 'xcvb', ' cvbn', 'xcvbn', 'vb', 'Jyeshta', 'Facebook', '', 'sxdcfgb', 'cdfgh', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-14 01:45:53', '', '', '2'),
(21, '', '', '', 'zxcf', 'xsdcfv', 'Male', '2020-09-05', 'dcfgh', '345678', 'cvb@gmail.com', 'dfghj', '345678', 'dfghj', 'dfghj', 'dfgh', 'fghjk', 'dfgh', 'Ashwini', 'Facebook', '', 'fvbn', 'dfgh', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 01:56:54', 'pay_FcqQUqXCREBsZO', '', '1'),
(22, '', '', '', 'zsxd', 'azsd', 'Male', '2020-09-05', 'zxc', '123456', 'sxcv@gmail.com', 'fghj', '34567', 'dfgh', 'dfghj', 'dfgh', 'dfgh', 'dfghj', 'Ashwini', 'Facebook', '', 'fgh', 'dfghj', '', 0.00, 0.00, 0.00, 0.00, 15073.00, '2020-09-14 02:19:25', '', '', '2'),
(23, '', '', '', 'sg', 'ff', 'Male', '2020-09-17', '234', '1234', 'erfgh@gmail.com', 'fgh', '5678', 'fghj', 'fghj', 'fgh', 'fgh', 'fgh', 'Dhanishta', 'Facebook', '', 'fghjk', 'fghj', '', 0.00, 0.00, 0.00, 0.00, 14935.00, '2020-09-14 02:21:48', '', '', '2'),
(24, '', '', '', 'asxdc', 'd', 'Male', '2020-09-11', 'edrft', '234567', 'gh@gmail.com', 'dfghj', '45678', 'rtyh', 'fghj', 'dfghj', 'dfghj', 'dfghj', 'Dhanishta', 'Facebook', '', 'dfgh', 'dfgh', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 02:25:55', '', '', '2'),
(25, '', '', '', 'asd', 'sxdf', 'Male', '2020-09-11', 'cfvgb', '23456', 'sxdc@gmail.com', 'sxdf', '2345', 'sdfg', 'df', 'sdfsdf', 'dcf', 'dfg', 'Anuraadha', 'Facebook', '', 'dfvb', 'dcf', '', 0.00, 0.00, 0.00, 0.00, 40761.00, '2020-09-14 02:27:52', '', '', '2'),
(26, '', '', '', 'sa', 'fgh', 'Female', '2020-09-11', 'asdfv', '2345678', 'zxc@gmail.com', 'ghj', '4567890', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'fghj', 'Dhanishta', 'Facebook', '', 'fgh', 'dfgh', '', 0.00, 0.00, 0.00, 0.00, 15073.00, '2020-09-14 02:46:51', 'pay_Fcs5GQmZNbLyhB', '', '1'),
(27, '', '', '1', 'Arvind', 'Medala', 'Male', '2020-05-07', 'Prem Kumar', '09000255594', 'mkarvind@gmail.com', 'Flat No.403,Fair View Plaza, Himayath Nagar,', '500029', 'Hyderabad – West Zone', 'Telangana', 'werwerwer', 'Arvind Medala', '09000255594', 'Rohini', 'Facebook', '', 'Personal', 'BDVPA3327F', '', 0.00, 0.00, 0.00, 0.00, 50260.00, '2020-09-14 04:37:55', '', '', '2'),
(28, '', '', '1', 'srinivas', 'chindam', 'Male', '1992-02-10', 'laxman', '9494458801', 'srinivasdev02@gmail.com', 'nagnoor', '505415', 'karimnagar', 'telangana', 'pashula', 'srinivas', '9494458801', 'Moola', 'Facebook', '', 'general', 'AAAAA1234A', '', 0.00, 0.00, 0.00, 0.00, 5.00, '2020-09-15 01:41:43', '', '', '2'),
(29, '', '', '1', 'srinivas', 'chindam', 'Male', '1992-02-10', 'laxman', '9494458801', 'srinivasdev02@gmail.com', 'nagnoor', '505415', 'karimnagar', 'telangana', 'pashula', 'srinivas', '9494458801', 'Moola', 'Facebook', '', 'general', 'AAAAA1234A', '', 0.00, 0.00, 0.00, 0.00, 2016.00, '2020-09-15 01:46:28', '', '', '2'),
(30, '', '', '1', 'srinivas', 'chindam', 'Male', '1992-02-10', 'laxman', '9494458801', 'srinivasdev02@gmail.com', 'nagnoor', '505415', 'karimnagar', 'telangana', 'pashula', 'srinivas', '9494458801', 'Moola', 'Facebook', '', 'general', 'AAAAA1234A', '', 0.00, 0.00, 0.00, 0.00, 1.00, '2020-09-15 01:47:25', '', '', '2'),
(31, '', '', '1', 'SRINIVAS', 'CHINDAM', 'Male', '1992-02-10', 'AAAA', '9494458802', 'srinivas@gmail.com', 'nagnoor', '505415', 'karimnagar', 'telangana', 'pashula', 'srinivas', '9494458801', 'Moola', 'Facebook', '', 'general', 'AAAAA1234A', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-15 01:51:43', '', '', '2'),
(32, '', '', '1', 'sdsad', 'dsasd', 'Male', '2020-09-18', '', '9485456', 'srinivas@gmail.com', 'fdsf', '505415', 'df', 'dfdsf', 'dfdsf', 'dfsdf', '', 'Moola', 'Facebook', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-17 01:27:00', '', '', '2'),
(33, '', '', '2', 'srinivas', 'sss', '', '0000-00-00', '', '9492202122', 'ssss@gmail.com', 'ajshdhdsi', '505415', 'dsfdf', 'dsfdf', '', 'srinivas', '', '', '', '', '', '', 'sdfsdf', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-17 03:02:12', '', '', '2'),
(34, '', '', '2', 'srinivas', 'sss', '', '0000-00-00', '', '9492202122', 'ssss@gmail.com', 'ajshdhdsi', '505415', 'dsfdf', 'dsfdf', '', 'srinivas', '', '', '', '', '', '', 'sdfsdf', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-17 03:03:27', '', '', '2'),
(35, '', '', '2', 'srinivas', 'sss', '', '0000-00-00', '', '9492202122', 'ssss@gmail.com', 'ajshdhdsi', '505415', 'dsfdf', 'dsfdf', '', 'srinivas', '', '', '', '', '', '', 'sdfsdf', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-17 03:04:34', '', '', '2'),
(36, '', '', '1', 'Dhyjh', 'Fghjhcc', 'Male', '2020-04-01', '', '9632587452', 'asdf@gmail.com', 'Ggxvhj', '531036', 'Chodavaram', 'Andhra Pradesh', '', 'Dhidvhng', '', 'Krithika', 'Facebook', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-18 08:38:52', '', '', '2'),
(37, '', '', '1', 'srinivas', 'chindam', 'Male', '2020-09-14', 'Son', '9876543210', 'srinivas@gmail.com', '11-3 ', '505415', 'Choppadandi', 'Telangana', 'aaaa', 'srinu', '', 'Moola', 'Facebook', '', 'other', '', '', 100.00, 10116.00, 0.00, 0.00, 10216.00, '2020-09-21 05:12:01', 'pay_FfgQA0wABBkAAf', '', '1'),
(38, '', '', '1', 'NRK', 'AD Systems', 'Male', '2020-09-22', 'Kshetra', '9848012345', 'nrk@nrk.com', 'Telugu Academy', '500029', 'Himayathnagar', 'Telangana', 'Kasayp', 'Kshetra', '', 'Magha/Makha', 'Facebook', '', 'Marraige', '', '', 100.00, 1116.00, 2016.00, 116000.00, 119232.00, '2020-09-22 12:39:44', '', '', '2'),
(39, '', '', '1', 'fdsdfsdf', 'dsfsdf', 'Male', '2020-09-04', 'fdgfdg', '9876543210', 'dsfsdf@gmail.com', 'dgdfg', '505415', 'Choppadandi', 'Telangana', 'sdfdsf', 'sdfsdfdf', '', 'Jyeshta', 'Facebook', '', 'dsfsdf', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-22 04:43:47', '', '', '2'),
(40, '', '', '1', 'fdsdfsdf', 'dsfsdf', 'Male', '2020-09-04', 'fdgfdg', '9876543210', 'dsfsdf@gmail.com', 'dgdfg', '505415', 'Choppadandi', 'Telangana', 'sdfdsf', 'sdfsdfdf', '', 'Jyeshta', 'Facebook', '', 'dsfsdf', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, '2020-09-22 04:44:13', '', '', '2'),
(41, '', '', '1', 'srinivas', 'chindam', 'Male', '2020-09-01', 'efewf', '9494458801', 'srinivas@gmail.com', 'safsdfdsf', '505415', 'Choppadandi', 'Telangana', 'asaffasf', 'sdfsdfsd', '', 'Bharani', 'Facebook', '', 'asdfdf', '', '', 100.00, 0.00, 0.00, 0.00, 100.00, '2020-09-22 04:54:53', '', '', '2'),
(42, '', '', '1', 'sdsdsf', 'sfsdf', 'Male', '2020-09-10', '', '9494458801', 'dsfsd@gmail.com', '9495508445', '505415', 'Choppadandi', 'Telangana', 'jjhvjvg', 'kvlhvhgv', '', 'Ashwini', 'Facebook', '', 'hjh', '', '', 0.00, 1116.00, 0.00, 0.00, 1116.00, '2020-09-22 05:14:41', '', '', '2'),
(43, '', '', '1', 'srinivas', 'sajhjshdi', 'Male', '2020-09-22', 'askkhkjabf', '9874563210', 'sakjbfkhb@gmail.com', 'sajfsdhkfhbjn', '505415', 'Choppadandi', 'Telangana', 'as.kjbadhf', 'kjsaljfhjf', '', 'Bharani', 'Facebook', '', 'asjfhkb', '', '', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-22 05:48:21', '', '', '2'),
(44, '', '', '1', 'NRK', 'AD', 'Male', '2020-09-22', 'dsafaf', '984801234', 'nrk@nrk.com', 'sfdasdfasd', '533003', 'Kakinada (Urban)', 'Andhra Pradesh', 'kasayap', 'adsfadsfa', '', 'Swaathi', 'Facebook', '', 'adsfsadfa', '', '', 100.00, 5016.00, 5016.00, 116000.00, 126132.00, '2020-09-22 05:53:07', '', '', '2'),
(45, '', '', '1', 'DFDSFSD', 'DSFDSFASDF', 'Male', '2020-09-22', 'DSFDSAGFDGA', '98', 'SDFSADF@FAF.COM', 'FASDFADF', '533001', 'Kakinada (Urban)', 'Andhra Pradesh', 'ADSFADSFA', 'ADFDSFASDF', '', 'Ashwini', 'Twitter', '', 'SDFGSFDG', '', '', 100.00, 5016.00, 10116.00, 116000.00, 131232.00, '2020-09-22 06:35:59', '', '', '2'),
(46, '', '', '1', 'dfdsfsdf', 'fasdfasdfa', 'Male', '2020-09-22', 'dsfasdfa', '98', 'adfads@abc.com', 'adfasdfa', '533003', 'Kakinada (Urban)', 'Andhra Pradesh', '', 'adfasdfad', '', 'Ashwini', 'Facebook', '', 'adfdfaf', 'arxop1245v', '', 100.00, 5016.00, 10116.00, 116000.00, 131232.00, '2020-09-22 07:00:01', '', '', '2'),
(47, '', '', '1', 'srinivas', 'sjhfks', 'Male', '2020-09-10', '', '9494455801', 'khjhj@gmail.com', 'sdfsdgf', '505415', 'Choppadandi', 'Telangana', 'sdsad', 'sadasd', '', 'Moola', 'Facebook', '', '', 'aaaaa1234a', '', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-22 07:00:06', '', '', '2'),
(48, '', '', '1', 'Fghh', 'Gghh', 'Male', '2016-07-14', '', '9635386524', 'sddff@gmail.con', 'Cbbv', '531036', 'Chodavaram', 'Andhra Pradesh', '', 'Stgccg', '', 'Rohini', 'Facebook', '', '', '', '', 0.00, 5016.00, 0.00, 0.00, 5016.00, '2020-09-23 07:39:07', '', '', '2'),
(49, '', '', '1', 'Dgg', 'Ccvg', 'Male', '2016-03-17', 'Son', '6985235609', 'zfghhd@gmail.com', 'Chhh', '531036', 'Chodavaram', 'Andhra Pradesh', '', 'Chhcxc', '', 'Mrigashiras', 'Facebook', '', 'other', 'Bajpa6704j', '', 100.00, 0.00, 0.00, 0.00, 100.00, '2020-09-23 07:42:03', 'pay_FgInDkutWezEkm', '', '1'),
(50, '', '', '1', 'Arvind', 'Medala', 'Male', '2020-09-06', '', '09000255594', 'mkarvind@gmail.com', 'Flat No.403,Fair View Plaza, Himayath Nagar,', '500029', 'Himayathnagar', 'Telangana', '', 'Arvind Medala', '', 'Mrigashiras', 'Facebook', '', '', 'ASDFG8989U', '', 789.00, 1116.00, 5016.00, 0.00, 6921.00, '2020-09-23 10:09:04', '', '', '2'),
(51, '', '', '1', 'srinivas', 'aaaa', 'Male', '2020-09-03', 'sdsad', '9494458801', 'ssss@gmail.com', 'aaaaa', '505415', 'Choppadandi', 'Telangana', 'sdfdfdsf', 'sdfdsfdf', '', 'Bharani', 'Facebook', '', 'dskgfhdsgjhds', 'aaaaa4444a', '', 100.00, 5016.00, 5016.00, 116000.00, 126132.00, '2020-09-23 01:41:30', '', '', '2'),
(52, '', '', '1', 'asdsad', 'kjhkhg', 'Male', '2020-08-12', 'kkjhjkh', '9876543210', 'srinivas@gmail.com', 'assjgjhadg', '505415', 'Choppadandi', 'Telangana', 'asfadd', 'hkashvjha', '', 'Bharani', 'Facebook', '', 'hggjgv', '', '', 0.00, 0.00, 2016.00, 0.00, 2016.00, '2020-09-23 03:12:46', '', '', '2'),
(53, '', '', '1', 'afadsfa', 'sdfasdf', 'Male', '2020-09-22', 'sdfasdfa', '98', 'asdfa@as.com', 'afa', '533003', 'Kakinada (Urban)', 'Andhra Pradesh', 'fdasfafa', 'afadsfadfafd', '', 'Ashwini', 'Facebook', '', 'fadsfasdfa', 'arxop7845v', '', 100.00, 1116.00, 2016.00, 116000.00, 119232.00, '2020-09-23 03:21:11', '', '', '2'),
(54, '', '', '1', 'sdafadf', 'asdfasd', 'Male', '2020-09-22', 'afdadsfa', '98', 'adfaf@ab.com', 'asdfadf', '533003', 'Kakinada (Urban)', 'Andhra Pradesh', 'asdfasdfa', 'asdfadsf', '', 'Rohini', 'Facebook', '', 'adsfadsfa', '', '', 100.00, 0.00, 0.00, 0.00, 100.00, '2020-09-23 03:25:54', '', '', '2'),
(55, '', '', '1', 'aaa', 'aa', 'Male', '2020-02-14', 'dfe', '9999999999', 'jdgwkgdyg@gmail.com', 'sdfjvdg', '505415', 'Choppadandi', 'Nagaland', 'nb b', 'n mn  ', '', 'Moola', 'Facebook', '', '', 'aaaaa1234a', '', 0.00, 0.00, 5016.00, 116000.00, 121016.00, '2020-09-23 08:22:07', '', '', '2'),
(56, '', '', '1', 'fdgsdfg', 'dfsasdf', 'Male', '2020-09-23', 'dsfdsaf', '9848012345', 'adsd@red.com', 'dfsdfas', '533003', 'Kakinada (Urban)', 'Andhra Pradesh', 'fasdfa', 'afdsfdf', '', 'Jyeshta', 'Facebook', '', 'afdsfasdf', '', '', 0.00, 1116.00, 2016.00, 0.00, 3132.00, '2020-09-23 07:49:49', '', '', '2'),
(57, '', '', '1', 'NRK', 'AD', 'Male', '2020-09-23', '', '9848012345', 'info@nrkad.com', 'sai rashmi, Himayathnagar', '500029', 'Hyderabad', 'Telangana', 'kasayp', 'Kshetra', '', 'Ashwini', 'Facebook', '', 'marriage', '', '', 100.00, 5016.00, 10116.00, 116000.00, 131232.00, '2020-09-23 08:39:09', 'pay_FgW3zidO1jvcKI', '', '1'),
(58, '', '', '1', 'shiva ', 'd', 'Male', '2020-09-17', 's', '9490398046', 'shiv@gmail.com', 'add', '531036', 'Chodavaram', 'Andhra Pradesh', 'pa', 'shiva', '', 'Punarvasu', 'Facebook', '', 'ss', 'BDVPA3327f', '', 250.00, 50116.00, 2016.00, 116000.00, 168382.00, '2020-09-23 09:23:39', '', '', '2'),
(59, '', '', '1', 'NRK', 'AD', 'Male', '2020-09-23', 'NA', '9848012345', 'kumar@nrkadsystems.net', 'Sai Rasmi, 2nd Floor', '500029', 'Himayathnagar', 'Telangana', 'NA', 'NRK', '', 'Chitra', 'Facebook', '', 'NA', 'arxop1245v', '', 100.00, 5016.00, 10116.00, 116000.00, 131232.00, '2020-09-23 09:23:20', '', '', '2'),
(60, '', '', '2', 'ssss', 'sssss', '', '0000-00-00', '', '9494458832', 'sss@gmail.com', 'aaaaa', '505415', 'Choppadandi', 'Telangana', '', 'sssss', '', '', '', '', 'hkg,jgjv', 'aaaaa1234a', 'ssss', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 08:58:25', '', '', '2'),
(61, '', '', '2', 'ssss', 'ssss', '', '0000-00-00', '', '9999999999', 'ssss@gmail.com', 'ssss', '505415', 'Choppadandi', 'Telangana', '', 'sssss', '', '', '', '', 'ffff', 'aaaaa1234a', 'ssss', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 09:08:03', '', '', '2'),
(62, '', '', '2', 'aaaa', 'aaaa', '', '0000-00-00', '', '9999999999', 'aaaa@gmail.com', 'aaaa', '505415', 'Choppadandi', 'Telangana', '', 'sadasd', '', '', '', '', 'aaaaa', 'asdad1234a', 'aaaa', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 09:36:55', '', '', '2'),
(63, '', '', '2', 'aaa', 'aaa', '', '0000-00-00', '', '9999999999', 'sssss@gmail.com', 'aaaaa', '505415', 'Choppadandi', 'Telangana', '', 'aaa', '', '', 'Facebook', '', 'aaaa', 'aaaaa1234a', 'aaaa', 0.00, 0.00, 5016.00, 116000.00, 121016.00, '2020-09-24 12:15:14', '', '', '2'),
(64, '', '', '2', '', '', 'Male', '2020-09-11', 'aaaa', '', '', '', '', '', '', 'aaaa', '', '', 'Bharani', '', '', '', 'AAAAA1234A', '', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 12:48:45', '', '', '2'),
(65, '', '', '1', 'dsgdf', 'sdfgsdf', 'Male', '2020-09-22', 'sdfgsdfg', '9848012345', 'shf@red.com', 'fgdsjsdfg', '533003', '', '', 'dsfgsdfg', 'sgdfgsdfg', '', 'PoorvaPhalguni', 'Facebook', '', 'fsdgdfgdg', '', '', 0.00, 1116.00, 0.00, 0.00, 1116.00, '2020-09-24 12:49:53', '', '', '2'),
(66, '', '', '1', 'AAAAA', 'AAAA', 'Male', '2020-02-10', 'ASSS', '9999999999', 'SSSSS@GMAIL.COM', 'SSZSZSZS', '505415', 'Choppadandi', 'Telangana', 'ffxcfdxfd', 'fgcfcft', '', 'Uthrashaada', 'Facebook', '', 'sdfsdf', 'aaaaa1234a', '', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 01:00:34', '', '', '2'),
(67, '', '', '2', 'aaaaa', 'aaaa', '', '0000-00-00', '', '9999999999', 'aaa@gmail.com', 'aaaa', '505415', 'Choppadandi', 'Telangana', '', 'vfgvg', '', '', 'Facebook', '', 'dfvdf', 'aaaaa1234a', 'aaa', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 01:04:03', '', '', '2'),
(68, '', '', '2', 'srinivas', 'ssss', '', '0000-00-00', '', '9999999999', 'ssss@gmail.com', 'sssss', '505415', '', '', '', 'sfsdf', '', '', 'Facebook', '', 'safdsf', 'aaaaa1234a', 'sssss', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 01:08:04', '', '', '2'),
(69, '', '', '1', 'sfdsf', 'dfdsf', 'Male', '2020-09-03', 'sdfsdf', '9876543322', 'dddd@gmail.com', 'dtfdtdtd', '505415', 'Choppadandi', 'Telangana', 'ewfdsf', 'dfdf', '', 'Jyeshta', 'Twitter', '', 'dfdsfdf', 'aaaaa1234a', '', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 01:10:35', '', '', '2'),
(70, '', '', '1', 'sss', 'sss', 'Male', '2020-02-10', 'scsdcds', '9999999999', 'ssss@gmail.com', 'hghfcgf', '505415', 'Choppadandi', 'Telangana', 'cgffg', 'hgjfgv', '', 'Poorvashaada', 'Facebook', '', 'eferf', 'aaaaa1234a', '', 0.00, 5016.00, 0.00, 116000.00, 121016.00, '2020-09-24 01:15:03', '', '', '2'),
(71, '', '', '2', 'ddfcvfd', 'hfcgfc', '', '0000-00-00', '', '9999999999', 'ggfcgf@gvgv.com', 'fcfc', '505415', 'Choppadandi', 'Telangana', '', 'gfcgfcfg', '', '', 'Facebook', '', 'hgvhgv', 'aaaaa1234a', 'cgfcgf', 0.00, 0.00, 0.00, 116000.00, 116000.00, '2020-09-24 01:17:03', '', '', '2'),
(72, '', '', '1', 'Advit', 'Software', 'Male', '2020-09-23', '', '9848012345', 'admin@advitsoft.com', 'Near TTD Temple, Himayathnagar', '500029', 'Hyderabad', 'Telangana', 'Padipala', 'Advit', '', 'Mrigashiras', 'Facebook', '', 'Business', 'arecuu1024b', '', 100.00, 10116.00, 10116.00, 116000.00, 136332.00, '2020-09-24 01:50:43', 'pay_FgnbrN5QggEoLu', '', '1'),
(73, '', '', '2', 'Advit', 'Software', '', '0000-00-00', '', '9848012345', 'admin@advitsoft.com', 'Himayatnagar', '500029', 'Hyderabad', 'Telangana', '', 'Advit Software', '', '', 'Twitter', '', 'Business', 'arxoo1245v', 'Advit Software', 200.00, 1116.00, 50116.00, 116000.00, 167432.00, '2020-09-24 01:55:18', 'pay_FgngaMHN2H0Fuj', '', '1'),
(74, '', '', '1', 'NRK ', 'AD', 'Male', '2020-09-17', 'Daughter', '9848012345', 'ad@g.com', 'afdsdsfasdf', '533003', 'Hyderabad', 'Telangana', 'dfasfdf', 'adfsdsfs', '', 'Chitra', 'Facebook', '', 'marriage', 'arxop8711c', '', 100.00, 5016.00, 2016.00, 116000.00, 123132.00, '2020-09-24 07:45:29', 'pay_Fgtf0yZLuYqiJS', '', '1'),
(75, '', '', '1', 'XY', 'hkgks', 'Male', '2020-08-31', 'Daughter', '2323369867', 'dede@xyz.com', 'fshjfjwfsjh', '500033', 'Hyderabad', 'Telangana', '', 'xyz', '', 'Magha/Makha', '', '', 'Business', 'APGPL8646P', '', 0.00, 1116.00, 10116.00, 116000.00, 127232.00, '2020-09-25 01:57:19', 'pay_FhCGn4vhCuqGj4', '', '1'),
(76, '', '', '1', 'nisha', 'jain', 'Female', '1989-01-10', 'Son', '9581619801', 'nisha@bigbears.co.in', 'attapur', '500048', 'hyderabad', 'Telangana', 'bengani', 'K C Bengani', '', 'Punarvasu', 'Twitter', '', 'welfare', '', '', 100.00, 0.00, 0.00, 0.00, 100.00, '2020-09-25 05:50:03', 'pay_FhGEUyHQZEyLBr', '', '1'),
(77, '', '', '1', 'Dhbh', 'Vcbh', 'Male', '2015-02-18', '', '6789045634', 'dggff@gmail.com', 'C fxvdxb', '531036', 'Hyderabad', 'Andhra Pradesh', '', 'Cfgfdvb', '', 'Rohini', '', '', 'welfare', '', '', 0.00, 10116.00, 0.00, 0.00, 10116.00, '2020-09-28 10:21:13', 'pay_FiKAYo0Zo55HaV', '', '1'),
(78, '', '', '1', 'Rashmika', 'Mandhana', 'Female', '1992-08-04', 'Son', '9848012345', 'rash@ras.com', 'aaa', '500003', 'Hyderabad', 'Telangana', 'Vishwa', 'Rashmika', '', 'Swaathi', 'Facebook', '', 'Children', 'arzpo8711b', '', 1000.00, 10116.00, 5016.00, 116000.00, 132132.00, '2020-10-05 04:29:43', '', '', '2'),
(79, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 100.00, 0.00, 0.00, 0.00, 0.00, '2020-10-04 07:43:00', '', '', '2'),
(80, '', '', '1', 'asd', 'df', 'Male', '2020-10-05', 'Son', '9848012345', 'rrr@rr.com', 'Padma', '500026', 'Hyderabad', 'Telangana', 'Kasayp', 'ssss', '', 'Vishaakha', 'Whatsapp', '', '', '', '', 1000.00, 0.00, 0.00, 0.00, 1000.00, '2020-10-05 02:19:18', '', '', '2'),
(81, '', '', '1', 'RRR', 'SSSS', 'Male', '2020-10-06', '', '9848012345', 'rr@sss.com', 'Himayatnagar', '500026', 'Hyderabad', 'Telangana', 'Paidi', 'WWWW', '', 'Ashlesha', 'NTV', '', '', '', '', 1000.00, 5016.00, 0.00, 0.00, 6016.00, '2020-10-05 02:19:17', 'pay_Fl9yXsxs5iDAhh', '', '1'),
(82, '', '', '1', 'NRK', 'Kumar', 'Male', '2020-10-07', '', '8074397576', 'kumar@nrkadsystems.net', 'Sai Rasmi, 2nd Floor', '500029', 'Himayathnagar', 'Telangana', 'NA', 'NRK', '', 'Vishaakha', 'Facebook', '', 'Job', 'arxop1245v', '', 100.00, 50116.00, 0.00, 0.00, 50216.00, '2020-10-06 01:49:31', 'pay_FlY0ymamxbhY4q', '', '1'),
(83, '', '', '1', 'Shiva', 'Kumar', 'Male', '2020-12-15', 'Relatives', '9490398046', 'siva@gmail.com', 'Chodavaram', '531036', 'Chodavaram', 'Andhra Pradesh', 'Sample', 'Namassivaya', '', 'PoorvaPhalguni', 'other', '', 'Job', '', '', 150.00, 0.00, 0.00, 0.00, 150.00, '2020-10-10 11:48:56', 'pay_Fn64cRjs2L4fXj', '', '1'),
(90, '444bcf7189515d6cd5168d3464fa029a7aa5e41a', '', '1', 'ss', 's', 'Male', '2020-12-15', 'Son', '9490398046', 's@gmaoil.com', 's', '531036', 'f', 'Andhra Pradesh', 's', 's', '', 'Ashwini', 'Facebook', '', 'Children', '', '', 150.00, 0.00, 0.00, 0.00, 150.00, '2020-10-10 02:47:58', '', '', '2'),
(91, '45d6b7832e067301cd11162ee275109eaf19b28f', '', '1', 's', 's', 'Male', '2020-10-21', 'Relatives', '9490398046', 's@fmail.co', 'ghj', '531036', 's', 'Andhra Pradesh', 's', 's', '', 'Ashwini', 'Sakshi TV', '', 'Marriage', '', '', 200.00, 0.00, 0.00, 0.00, 200.00, '2020-10-10 03:13:31', '', '', '2'),
(92, 'ebb290c46c8be6fc33703985dfc2c3b78ea5ec25', '', '1', 's', 's', 'Male', '2020-09-30', 'Son', '9490398046', 'd@gmail.com', 'hj', '531036', 'hj', 'Andhra Pradesh', 'dd', 'f', '', 'Uthraphalguni', 'Facebook', '', 'Health', '', '', 200.00, 0.00, 0.00, 0.00, 200.00, '2020-10-10 03:28:28', 'pay_FnC9gTRaCJ2xEJ', '', '1'),
(93, 'cdfe2a948f620799da282a893b587ccaa814f18a', '', '1', 'ABC', 'DEF', 'Male', '2020-10-12', 'Spouse', '9848012345', 'admin@nrkadsystems.net', 'HImayath nagar', '500026', 'Hyderabad', 'Telangana', 'Maharsi', 'Kshetra Media House', '', 'PoorvaPhalguni', 'Facebook', '', 'other', 'arxop1234c', '', 1000.00, 5016.00, 50116.00, 116000.00, 172132.00, '2020-10-12 01:16:47', 'pay_FniNoRvfHx9ixM', '', '1'),
(94, '1c5bedf8a26bc16042b9b1ffe3852ed12da99c5b', '', '1', 'Sample', 'Sample', 'Male', '2020-10-13', 'Son', '9490398046', 'siva@gail.com', 's', '531036', 'c', 'Andhra Pradesh', 'd', 'Shiav Kumar', '', 'PoorvaPhalguni', '', '', 'Marriage', 'bdvpa2227f', '', 150.00, 1116.00, 2016.00, 116000.00, 119282.00, '2020-10-13 09:31:55', 'pay_FoFLQHKB11cKzn', '', '1'),
(95, '8db2d1194335c9609a6cd6ae22be28a76573a94b', '', '1', 'Shiva', 'KUmar', 'Male', '1991-04-15', 'Relatives', '9490398046', 'sivaappalabattula92@gmail.com', 'Chodavaram', '531036', 'Chodavaram', 'Andhra Pradesh', 'Rusi', 'Namassivaya', '', 'Bharani', '', '', 'other', '', '', 150.00, 5016.00, 0.00, 0.00, 5166.00, '2020-10-14 06:03:49', 'pay_FombrIvxNoVKGD', '', '1'),
(96, '8666ed8de835a8f328558b2ba2542ccec7079f97', '', '1', 'NRK', 'AD', 'Male', '2020-10-14', 'Son', '9848145587', 'kumar@nrkadsystems.net', 'Padmaraonagar', '500029', 'Hyderabad', 'Telangana', 'Brahmarishi', 'P Kumar', '', 'Krithika', 'Instagram', '', 'Job', 'arxop1245v', '', 10000.00, 10116.00, 10116.00, 116000.00, 146232.00, '2020-10-14 06:12:38', 'pay_FomlAvzirrLqAV', '', '1'),
(97, '586f2189c673af2f98fa0c6dffbc3ba4fdeb271a', '', '1', 'NRK', 'AD', 'Male', '2020-10-14', 'Daughter', '9959444476', 'ram@nrkadsystems.net', 'Himayathnagar', '500029', 'Hyderabad', 'Telangana', 'Brahmarishi', 'Ram', '', 'Moola', 'Instagram', '', 'Job', 'arxop1245v', '', 10000.00, 25116.00, 10116.00, 116000.00, 161232.00, '2020-10-14 06:49:12', 'pay_FonOQhPxPzAIWr', '', '1'),
(98, '10106f959cb48c65a9c483260d3880de1812a798', '', '1', 'Kshetra', 'Media', 'Male', '2020-10-22', 'Relatives', '9848012345', 'abc@abc.com', 'Himayathnagar', '500029', 'Hyderabad', 'Telangana', 'Kashyap', 'Kshetra', '', 'Hastha', 'Instagram', '', 'Children', 'arxpp1245b', '', 1116.00, 10116.00, 5016.00, 116000.00, 132248.00, '2020-10-11 01:04:48', 'pay_Frrmipqbhwa1kz', '', '1'),
(99, 'ed96894aab58d48ae68c38dd05c10aa9838a5629', '', '1', 'NRK', 'Ad', 'Male', '2020-10-06', 'Parents', '9848012345', 'admin@nrkadsystems.net', 'Himayatnagar', '500026', 'Hyderabad', 'Telangana', 'Padipala', 'NRK Ads', '', 'Pushyami', 'Whatsapp', '', 'Marriage', 'arxpo8745b', '', 10000.00, 10116.00, 10116.00, 116000.00, 146232.00, '2020-10-18 01:13:43', 'pay_FrrsnU0B4DyrK5', '', '1'),
(100, 'd976cf5ec41a0ec89e81de68b4eda0c8b2e430a2', '', '1', 'Advit', 'Software', 'Male', '2020-10-20', 'Son', '9848012345', 'admin@nrkadsystems.net', 'Liberty circle', '500026', 'Hyderabad', 'Telangana', 'Viswa', 'Advit', '', 'Hastha', 'Enadu Paper', '', 'Job', 'arxpp1234w', '', 8000.00, 5016.00, 10116.00, 116000.00, 139132.00, '2020-10-18 13:18:01', 'pay_FrryOjhRnDi52Z', '', '1'),
(101, '8093523672cc2ebfd3d7cc54891ed335f829592b', '', '1', 's', 's', 'Male', '1991-04-15', 'Relatives', '9490398046', 'shiva@gmail.com', 'chodavaram', '531036', 'chodavaram', 'Andhra Pradesh', 'sam', 's', '', 'Bharani', 'Facebook', '', 'Health', '', '', 250.00, 1116.00, 5016.00, 0.00, 6382.00, '2020-10-22 02:10:33', 'pay_Frstq8yQOFIQN4', '', '1'),
(102, '4fecb563f15253a64b731d9471186c4998122431', '', '1', 's', 'ss', 'Male', '1991-04-15', 'Son', '9490398046', 's@gmail.com', 'sd', '531036', 'chodavaram', 'Andhra Pradesh', 'd', 's', '', 'Ashwini', 'Facebook', '', 'Children', '', '', 1500.00, 10116.00, 0.00, 0.00, 11616.00, '2020-10-22 02:22:54', 'pay_Frt6geMZk7hpyZ', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `donations_benefits`
--

CREATE TABLE `donations_benefits` (
  `id` int(11) NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations_benefits`
--

INSERT INTO `donations_benefits` (`id`, `desc`, `update_date`) VALUES
(1, '<p>दानेन भुतानि वशीभवन्ति दानेन वैराण्यपि यान्ति नाशम्।<br />\r\nपरोऽपि बन्धुत्वमुपैति दानैर्दान हि सर्वव्यसनानि हन्ति॥</p>\r\n\r\n<p>dānena bhūtāni vaśībhavanti dānena vairāṇyapi yānti nāśam।<br />\r\nparo&rsquo;pi bandhutvamupaiti dānairdāna hi sarvavyasanāni hanti॥</p>\r\n\r\n<p>We rarely get the opportunity to be involved with historic spiritual moments. Lord Senani Subrahmanya Swamy is giving us one such opportunity. Devotees with interest can contribute towards temple development.</p>\r\n\r\n<p>Be a part of this project, redeem yourself from previous sins, build a happy and prosperous life and attain SALVATION.</p>\r\n', '2020-08-29 12:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `donation_items`
--

CREATE TABLE `donation_items` (
  `do_it_id` int(11) NOT NULL,
  `donation_id` varchar(15) NOT NULL,
  `item_id` varchar(15) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `price` float(10,2) NOT NULL,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_items`
--

INSERT INTO `donation_items` (`do_it_id`, `donation_id`, `item_id`, `qty`, `price`, `add_date`) VALUES
(1, '1', '1', '2', 1116.00, '2020-09-02 04:20:55'),
(2, '1', '2', '2', 5016.00, '2020-09-02 04:20:55'),
(3, '2', '1', '1', 1116.00, '2020-09-02 04:35:36'),
(4, '2', '2', '2', 5016.00, '2020-09-02 04:35:36'),
(5, '3', '1', '1', 1116.00, '2020-09-02 08:12:43'),
(6, '3', '2', '1', 5016.00, '2020-09-02 08:12:43'),
(7, '4', '1', '1', 1116.00, '2020-09-03 09:00:34'),
(8, '4', '2', '1', 5016.00, '2020-09-03 09:00:34'),
(9, '5', '1', '6', 1116.00, '2020-09-03 09:27:39'),
(10, '5', '2', '5', 5016.00, '2020-09-03 09:27:39'),
(11, '5', '9', '1', 2016.00, '2020-09-03 09:27:39'),
(12, '5', '10', '500', 1.00, '2020-09-03 09:27:39'),
(13, '5', '11', '10', 7890.00, '2020-09-03 09:27:39'),
(14, '6', '11', '789', 7890.00, '2020-09-03 09:27:43'),
(15, '7', '1', '30', 1116.00, '2020-09-03 11:25:49'),
(16, '7', '2', '5', 5016.00, '2020-09-03 11:25:49'),
(17, '7', '9', '6', 2016.00, '2020-09-03 11:25:49'),
(18, '7', '10', '3000', 1.00, '2020-09-03 11:25:49'),
(19, '7', '11', '3', 7890.00, '2020-09-03 11:25:49'),
(20, '8', '1', '10', 1116.00, '2020-09-03 12:47:47'),
(21, '8', '2', '50', 5016.00, '2020-09-03 12:47:47'),
(22, '9', '9', '1', 2016.00, '2020-09-03 12:54:48'),
(23, '10', '1', '1', 1116.00, '2020-09-03 01:58:41'),
(24, '11', '1', '10', 1116.00, '2020-09-03 01:59:07'),
(25, '11', '2', '10', 5016.00, '2020-09-03 01:59:07'),
(26, '12', '1', '1', 1116.00, '2020-09-03 01:59:14'),
(27, '13', '1', '1', 1116.00, '2020-09-03 02:01:00'),
(28, '14', '1', '1', 1116.00, '2020-09-03 02:01:48'),
(29, '', '1', '12', 1116.00, '2020-09-07 01:56:19'),
(30, '', '10', '12', 1.00, '2020-09-07 01:56:19'),
(31, '', '2', '45', 5016.00, '2020-09-07 02:34:10'),
(32, '', '10', '78', 1.00, '2020-09-07 02:34:10'),
(33, '17', '2', '1', 5016.00, '2020-09-14 01:17:01'),
(34, '17', '9', '1', 2016.00, '2020-09-14 01:17:01'),
(35, '17', '10', '2', 1.00, '2020-09-14 01:17:01'),
(36, '17', '11', '3', 7890.00, '2020-09-14 01:17:01'),
(37, '18', '2', '1', 5016.00, '2020-09-14 01:38:41'),
(38, '18', '9', '1', 2016.00, '2020-09-14 01:38:41'),
(39, '18', '10', '2', 1.00, '2020-09-14 01:38:41'),
(40, '18', '11', '3', 7890.00, '2020-09-14 01:38:41'),
(41, '19', '2', '1', 5016.00, '2020-09-14 01:45:29'),
(42, '19', '9', '1', 2016.00, '2020-09-14 01:45:29'),
(43, '19', '10', '2', 1.00, '2020-09-14 01:45:29'),
(44, '19', '11', '3', 7890.00, '2020-09-14 01:45:29'),
(45, '20', '2', '1', 5016.00, '2020-09-14 01:45:53'),
(46, '20', '9', '1', 2016.00, '2020-09-14 01:45:53'),
(47, '20', '10', '2', 1.00, '2020-09-14 01:45:53'),
(48, '20', '11', '3', 7890.00, '2020-09-14 01:45:53'),
(49, '21', '2', '1', 5016.00, '2020-09-14 01:56:54'),
(50, '21', '9', '1', 2016.00, '2020-09-14 01:56:54'),
(51, '21', '10', '2', 1.00, '2020-09-14 01:56:54'),
(52, '21', '11', '3', 7890.00, '2020-09-14 01:56:54'),
(53, '26', 'gen', '1', 150.00, '2020-09-14 02:46:51'),
(54, '26', '2', '1', 5016.00, '2020-09-14 02:46:51'),
(55, '26', '9', '1', 2016.00, '2020-09-14 02:46:51'),
(56, '26', '10', '1', 1.00, '2020-09-14 02:46:51'),
(57, '26', '11', '1', 7890.00, '2020-09-14 02:46:51'),
(58, '27', 'gen', '1', 100.00, '2020-09-14 04:37:55'),
(59, '27', '2', '10', 5016.00, '2020-09-14 04:37:55'),
(60, '28', 'gen', '1', 0.00, '2020-09-15 01:41:43'),
(61, '29', 'gen', '1', 0.00, '2020-09-15 01:46:28'),
(62, '30', 'gen', '1', 0.00, '2020-09-15 01:47:25'),
(63, '31', 'gen', '1', 0.00, '2020-09-15 01:51:43'),
(64, '32', 'gen', '1', 0.00, '2020-09-17 01:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `events_images`
--

CREATE TABLE `events_images` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1',
  `adding_date` datetime NOT NULL,
  `update_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_images`
--

INSERT INTO `events_images` (`id`, `image`, `status`, `adding_date`, `update_data`) VALUES
(1, '1.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(2, '2.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(3, '3.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(4, '4.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(5, '5.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(6, '6.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(7, '7.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(8, '8.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(9, '9.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(10, '10.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00'),
(11, '11.jpg', '1', '2020-08-26 17:20:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_video`
--

CREATE TABLE `event_video` (
  `id` int(11) NOT NULL,
  `video` varchar(225) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fest`
--

CREATE TABLE `fest` (
  `fest_id` int(11) NOT NULL,
  `fest_date` date NOT NULL,
  `fest_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fest`
--

INSERT INTO `fest` (`fest_id`, `fest_date`, `fest_name`, `add_date`) VALUES
(1, '2020-09-21', 'aaaa', '0000-00-00 00:00:00'),
(2, '2020-09-24', 'bbbb', '0000-00-00 00:00:00'),
(106, '2020-10-25', 'Dassara', '2020-10-02 05:55:08'),
(107, '2020-11-22', 'Diwali', '2020-10-02 05:55:36'),
(108, '2020-10-18', 'Holiday', '2020-10-22 12:54:10'),
(109, '2020-10-11', 'Holiday', '2020-10-22 12:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `fund_raising_plan`
--

CREATE TABLE `fund_raising_plan` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `add_date` datetime NOT NULL,
  `upadte_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fund_raising_plan`
--

INSERT INTO `fund_raising_plan` (`id`, `title`, `category`, `price`, `unit`, `add_date`, `upadte_date`, `status`) VALUES
(1, '1 Stone', 1, 1116.00, 'Stone', '2020-08-27 05:26:59', '2020-09-21 02:49:10', '1'),
(2, '5 Stones', 1, 5016.00, 'Stone', '2020-08-27 05:32:11', '2020-09-21 02:50:02', '1'),
(3, '10 Stones', 1, 10116.00, 'Stone', '2020-09-03 09:16:10', '2020-09-21 02:49:25', '1'),
(4, '25 Stones', 1, 25116.00, 'Stone', '2020-09-03 09:26:35', '2020-09-21 02:50:26', '1'),
(5, '50 Stones', 1, 50116.00, 'Stone', '2020-09-17 01:23:54', '2020-09-21 02:50:14', '1'),
(6, '1 Sft', 2, 2016.00, 'Sft', '2020-09-17 01:24:44', '2020-09-21 02:50:40', '1'),
(7, '3 Sft', 2, 5016.00, 'Sft', '2020-09-17 01:25:23', '2020-09-21 02:50:53', '1'),
(8, '5 Sft', 2, 10116.00, 'Sft', '2020-09-17 01:26:13', '2020-09-21 02:51:05', '1'),
(9, '25 Sft', 2, 50116.00, 'Sft', '2020-09-17 01:26:47', '2020-09-21 02:51:17', '1'),
(10, 'Genreal Donation ', 0, 0.00, '', '2020-09-03 09:25:08', '2020-09-17 01:22:23', '1'),
(17, 'Sloka', 3, 116000.00, 'Plate', '2020-09-17 01:27:36', '0000-00-00 00:00:00', '1'),
(18, 'Temple Stone - Other', 0, 0.00, 'Stone', '2020-09-17 01:28:12', '0000-00-00 00:00:00', '1'),
(19, 'Temple Floor Area - Other', 0, 0.00, 'Sft', '2020-09-17 01:28:46', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `home_about`
--

CREATE TABLE `home_about` (
  `about_id` int(11) NOT NULL,
  `about` text NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_about`
--

INSERT INTO `home_about` (`about_id`, `about`, `update_date`) VALUES
(1, '<p>Srisailam played a dominant role in our religious, cultural and social history from ancient times. According to pre-historic studies the habitational history of Srisailam goes back to about 30,000-40,000 years.</p>\r\n\r\n<p>Srisailam is Abode of Lord Mallikarjuna and Goddess Brahmaramba Devi.</p>\r\n\r\n<p>Uniqueness of the place is the combination of Jyothirlingam and Shakti Peetam.</p>\r\n\r\n<p>The Skanda Purana Proclaims that a mere glance of Srisaila Sikharam frees the human soul from the fitters of rebirth.</p>\r\n', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `banner_id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `banner_status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`banner_id`, `image`, `banner_status`) VALUES
(1, '1.jpg', '1'),
(2, '2.jpg', '1'),
(3, '3.jpg', '1'),
(4, '4.jpg', '1'),
(5, '5.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sthala_puranam`
--

CREATE TABLE `sthala_puranam` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `udpate_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sthala_puranam`
--

INSERT INTO `sthala_puranam` (`id`, `desc`, `image`, `udpate_date`) VALUES
(1, '<p>Lord Siva and Parvati Matha decided to consider who will be as Prathama Pooja. Then, Siva announces a competition between the two brothers.</p>\r\n\r\n<p>Lord Siva says that, whosoever Circumambulates 3 times of the Earth (Bhupradakshinam) will be announced as winner.</p>\r\n\r\n<p>Lord Ganesha Circumambulated around his parents 3 times before karthikeya (according to Shastras, Circumambulating around their parents is equivalent to Bhupradakshinam).</p>\r\n\r\n<p>There after all the gods offered their Prathama Pooja to Lord Ganesh. Kartikeya on his return was enraged and left to stay solely on Mount Kronch in the name of Kumarabrahmachari, presently known as Srisailam</p>\r\n', 'shiva-family.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `desc` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `desc`, `add_date`, `update_date`, `status`) VALUES
(1, 'Location - Srisailam', '<p>Srisailam played a dominant role in our religious, cultural and social history from ancient times. According to pre-historic studies the&nbsp;<strong>habitational history of Srisailam goes back to about 30,000-40,000 years.</strong></p>\r\n\r\n<ul>\r\n	<li>It is Abode of&nbsp;<strong>Lord Mallikarjuna and Goddess Brahmaramba Devi.</strong></li>\r\n	<li>Uniqueness of the place is the combination of&nbsp;<strong>Jyothirlingam and Shakti Peetam.</strong></li>\r\n</ul>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'Land allotment', '<p>As per the Resolution no: 2, dated 2-9-2016 of Specified Authority of Srisaila Devasthanam, Srisailam, the Executive officer of Srisaila Devasthanam, Srisailam vide its letter Rc. No: C5/4458/2016, dated 10-9-2016 and Rc.no: C5/4458/2016 dated 22-9-2016 has allotted land to develop the above said Project.</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, 'Concept and approvals', '<p>Concept is envisaged based on Sthalapurana. Got the approvals from Endowment department , Andhra Pradesh.</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, 'Team of Consultants', '<p>Reputed National consultants are working for this World class development.</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 'Naming of the Project', '<p>As &ldquo;Kumara Brahmachari&rdquo; has selected this place as his&nbsp;<strong>Vihara Stalam,</strong>&nbsp;Jagadguru Pujyasri Sri Bharati Tirtha Maha Swaminah has named this Project as &ldquo;KUMARA VIHARAM&rdquo;</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 'Chief Patron', '<p>Government of Andhra Pradesh, Revenue (ENDTS.II) Department accorded permission to associate with&nbsp;<strong>Sri Sringeri Mutt ,Sringeri,</strong>&nbsp;Karnataka vide letter ref no : Memo. No. Rev. 01/Endw/389/2019Endts.II dated 16-8-2019.</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 'Project Implementation ', '<p>&nbsp;</p>\r\n\r\n<p>With the auspicious, blessings and guidance of their Holiness&nbsp;<strong>Sri Sri Jagadguru Shankaracharya Mahasamstanam</strong>&nbsp;Dakshinamaya, Sri Sharada Peetham , Sringeri</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 'Blessings of Gurus', '<p>Gurus gave their blessings and suggestions for the World class development of&nbsp;<strong>KUMARA VIHARAM</strong>.</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_deatils`
--

CREATE TABLE `user_deatils` (
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `area` varchar(150) NOT NULL,
  `circle` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `otp` varchar(15) NOT NULL,
  `state` varchar(150) NOT NULL,
  `district` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `otp_status` varchar(15) NOT NULL,
  `email_status` varchar(15) NOT NULL DEFAULT '2',
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_deatils`
--

INSERT INTO `user_deatils` (`user_id`, `name`, `email`, `phone`, `address`, `pincode`, `area`, `circle`, `city`, `otp`, `state`, `district`, `country`, `otp_status`, `email_status`, `add_date`, `update_date`) VALUES
(1, 'shiva', 'shiva@gmail.com', '9490398046', 'Cdm.vskp.ap', '500081', 'Cyberabad', '', 'Shaikpet', '517862', 'Telangana', 'Hyderabad', '', '1', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'kumar', 'kumar@gmail.com', '6302838564', 'axsdfv', '500081', 'Cyberabad', '', 'Shaikpet', '569403', 'Telangana', 'Hyderabad', '', '1', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Arvind Medala', 'mkarvind@gmail.com', '9000255594', 'Flat No.403,Fair View Plaza, Himayath Nagar,\r\nAbove Nike Showroom', '500029', 'Gagan', '', 'Himayathnagar', '019742', 'Telangana', 'Hyderabad', '', '1', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'NRK', 'kumar@nrkadsystems.net', '8074397576', 'Sai Rasmi, 2nd Floor', '500029', 'Himayathnagar', '', 'Himayathnagar', '531064', 'Telangana', 'Hyderabad', '', '', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'azsxc', 'azsd@gmail.com', '9490812126', 'azx sdcfv', '531036', 'Chodavaram', '', 'Chodavaram', '483290', 'Andhra Pradesh', 'Visakhapatnam', '', '1', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_concept_evolution`
--
ALTER TABLE `about_concept_evolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_sthala_puranam`
--
ALTER TABLE `about_sthala_puranam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blessings`
--
ALTER TABLE `blessings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_map`
--
ALTER TABLE `contact_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`don_id`);

--
-- Indexes for table `donations_benefits`
--
ALTER TABLE `donations_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_items`
--
ALTER TABLE `donation_items`
  ADD PRIMARY KEY (`do_it_id`);

--
-- Indexes for table `events_images`
--
ALTER TABLE `events_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_video`
--
ALTER TABLE `event_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fest`
--
ALTER TABLE `fest`
  ADD PRIMARY KEY (`fest_id`);

--
-- Indexes for table `fund_raising_plan`
--
ALTER TABLE `fund_raising_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_about`
--
ALTER TABLE `home_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `sthala_puranam`
--
ALTER TABLE `sthala_puranam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_deatils`
--
ALTER TABLE `user_deatils`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blessings`
--
ALTER TABLE `blessings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_map`
--
ALTER TABLE `contact_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `don_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `donation_items`
--
ALTER TABLE `donation_items`
  MODIFY `do_it_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `events_images`
--
ALTER TABLE `events_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event_video`
--
ALTER TABLE `event_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fest`
--
ALTER TABLE `fest`
  MODIFY `fest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `fund_raising_plan`
--
ALTER TABLE `fund_raising_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `home_about`
--
ALTER TABLE `home_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sthala_puranam`
--
ALTER TABLE `sthala_puranam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_deatils`
--
ALTER TABLE `user_deatils`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
