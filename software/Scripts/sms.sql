-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2019 at 02:46 PM
-- Server version: 10.2.21-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edubookb_cosmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_documents`
--

CREATE TABLE `academic_documents` (
  `DocumentId` int(11) UNSIGNED NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `DocumentName` varchar(100) DEFAULT NULL,
  `DocumentType` char(1) DEFAULT NULL COMMENT 'S=>Syllabus,B=>BookList',
  `DocumentPath` varchar(250) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_account_types`
--

CREATE TABLE `acc_account_types` (
  `TypeId` smallint(5) UNSIGNED NOT NULL COMMENT 'Acc types identification number',
  `Name` varchar(200) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_account_types`
--

INSERT INTO `acc_account_types` (`TypeId`, `Name`, `Type`) VALUES
(10, 'ASSET', 'ASSET'),
(11, 'CASH', 'ASSET'),
(12, 'BANK', 'ASSET'),
(13, 'ACCOUNTS RECEIVABLE', 'ASSET'),
(14, 'FIXED ASSET', 'ASSET'),
(15, 'CURRENT ASSET', 'ASSET'),
(16, 'INVESTMENT', 'ASSET'),
(20, 'LIABILITY', 'LIABILITY'),
(21, 'ACCOUNTS PAYABLE', 'LIABILITY'),
(22, 'ACCUMULATED DEPRECIATITON', 'LIABILITY'),
(23, 'CURRENT LIABILITY', 'LIABILITY'),
(24, 'LONG TERM LIABILITY', 'LIABILITY'),
(25, 'SURPLUS', 'LIABILITY'),
(30, 'INCOME', 'INCOME'),
(40, 'EXPENSE', 'EXPENSE'),
(50, 'RETAINED EARNING', 'EQUITY'),
(51, 'OPENING BALANCE', 'EQUITY'),
(52, 'EQUITY', 'EQUITY'),
(53, 'RESERVE FUND', 'EQUITY'),
(54, 'PRIORITY ADJUSTMENT', 'EQUITY');

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledgers`
--

CREATE TABLE `acc_ledgers` (
  `LedgerId` int(11) UNSIGNED NOT NULL,
  `TypeId` int(11) NOT NULL,
  `LedgerName` varbinary(100) NOT NULL,
  `LedgerCode` varchar(100) NOT NULL,
  `IsGroupHead` tinyint(1) DEFAULT 1,
  `GroupHeadId` int(11) DEFAULT 0,
  `LedgerDescription` varchar(100) DEFAULT NULL,
  `IsDeletable` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_ledgers`
--

INSERT INTO `acc_ledgers` (`LedgerId`, `TypeId`, `LedgerName`, `LedgerCode`, `IsGroupHead`, `GroupHeadId`, `LedgerDescription`, `IsDeletable`) VALUES
(1, 11, 0x4361736820496e2048616e64, '100', 1, 0, NULL, 0),
(2, 12, 0x4361736820496e2042616e6b, '101', 1, 0, NULL, 0),
(3, 30, 0x41646d697373696f6e20466565, '102', 1, 0, '', 1),
(4, 30, 0x536561736f6e20436861726765, '103', 1, 0, '', 1),
(5, 30, 0x4578616d20466565, '104', 1, 0, '', 1),
(6, 30, 0x547574696f6e20466565, '105', 1, 0, '', 1),
(7, 30, 0x5475746f7269616c204578616d696e6174696f6e20466565, '106', 1, 0, '', 1),
(8, 30, 0x53656d6573746572204578616d696e6174696f6e20466565, '107', 1, 0, '', 1),
(9, 40, 0x546561636865722053746166662053616c617279, '108', 1, 0, '', 1),
(10, 40, 0x486f6e6f72617269756d, '109', 1, 0, '', 1),
(11, 40, 0x4f66666963652052656e74, '110', 1, 0, '', 1),
(12, 40, 0x56617420616e6420546178, '111', 1, 0, '', 1),
(13, 40, 0x456c6563747269636974792042696c6c20, '112', 0, 31, '', 1),
(14, 40, 0x54726176656c20616e6420436f6e766579616e636520, '113', 1, 0, '', 1),
(15, 40, 0x50686f746f636f707920616e64207072696e74696e6720, '114', 1, 0, '', 1),
(16, 40, 0x54656c6570686f6e6520616e6420436f6d6d756e69636174696f6e, '115', 1, 0, '', 1),
(17, 40, 0x5761736820616e6420436c65616e, '116', 0, 31, '', 1),
(18, 40, 0x456e7465727461696e6d656e7420, '117', 1, 0, '', 1),
(19, 40, 0x52657061697220616e64206d61696e74656e616e636520, '118', 1, 0, '', 1),
(20, 40, 0x4578616d20706170657220, '119', 1, 0, '', 1),
(21, 40, 0x53746174696f6e61727920, '120', 1, 0, '', 1),
(22, 40, 0x47616d657320616e642043756c747572616c2070726f6772616d, '121', 1, 0, '', 1),
(23, 40, 0x5072697a6520446973747269627574696f6e2070726f6772616d, '122', 1, 0, '', 1),
(24, 40, 0x4d696c6164204d616866696c20, '123', 1, 0, '', 1),
(25, 40, 0x4661726577656c6c206f66205353432043616e646964617465732020, '124', 1, 0, '', 1),
(26, 40, 0x41646d6974204361726420457870656e73657320, '125', 1, 0, '', 1),
(27, 40, 0x526573756c74204361726420457870656e73657320, '126', 1, 0, '', 1),
(28, 40, 0x53796c6c61627573207072696e74696e672063686172676520, '127', 1, 0, '', 1),
(29, 40, 0x5075626c696369747920616e64206164766572746973656d656e7420, '128', 1, 0, '', 1),
(30, 40, 0x4f746865727320457870656e736573, '129', 1, 0, '', 1),
(31, 40, 0x53746174696f6e61727920, '222', 1, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_vouchers`
--

CREATE TABLE `acc_vouchers` (
  `VoucherId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `VoucherType` varchar(255) NOT NULL COMMENT 'P=>Payment, R=>Receipt',
  `VoucherCode` varchar(255) NOT NULL,
  `VoucherAmount` decimal(10,2) NOT NULL,
  `VoucherDate` date NOT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `IsAutoVoucher` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_vouchers`
--

INSERT INTO `acc_vouchers` (`VoucherId`, `BranchId`, `VoucherType`, `VoucherCode`, `VoucherAmount`, `VoucherDate`, `Particulars`, `EntryDate`, `UpdatedBy`, `UpdatedOn`, `EntryBy`, `IsAutoVoucher`) VALUES
(1, 4, 'P', 'PV-001', '350.00', '2019-01-26', '26-10-2019 total', '2019-01-26', NULL, NULL, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acc_voucher_details`
--

CREATE TABLE `acc_voucher_details` (
  `VoucherDetailsId` int(11) NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `VoucherId` int(11) NOT NULL,
  `CheckNumber` varchar(255) DEFAULT NULL,
  `CreditLedgerId` int(11) DEFAULT NULL,
  `DebitLedgerId` int(11) DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_voucher_details`
--

INSERT INTO `acc_voucher_details` (`VoucherDetailsId`, `BranchId`, `VoucherId`, `CheckNumber`, `CreditLedgerId`, `DebitLedgerId`, `Particulars`, `Amount`) VALUES
(21, 4, 1, NULL, 13, 1, 'Asif 200', '200.00'),
(22, 4, 1, NULL, 17, 1, 'Rahim', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `ac_opening_balances`
--

CREATE TABLE `ac_opening_balances` (
  `BalanceId` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `LedgerId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookId` int(11) UNSIGNED NOT NULL,
  `BookName` varchar(200) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `NumberOfBooks` int(11) DEFAULT NULL,
  `TypeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `AuthorId` int(11) UNSIGNED NOT NULL,
  `AuthorName` varchar(200) DEFAULT NULL,
  `Description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `BookDetailsId` int(11) UNSIGNED NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `IdentificationNumber` varchar(100) DEFAULT NULL,
  `BookStatus` char(1) DEFAULT 'A' COMMENT 'A=>Available,N=>Not Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_types`
--

CREATE TABLE `book_types` (
  `TypeId` int(11) UNSIGNED NOT NULL,
  `TypeName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_types`
--

INSERT INTO `book_types` (`TypeId`, `TypeName`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Mathmatics'),
(4, 'general Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BranchId` int(11) UNSIGNED NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `BranchCode` varchar(100) NOT NULL,
  `ContactNumber` varchar(100) DEFAULT NULL,
  `BranchAddress` text DEFAULT NULL,
  `IsHeadOffice` tinyint(1) DEFAULT 0,
  `Logo` text DEFAULT NULL,
  `LandPhone` varchar(100) DEFAULT NULL,
  `Mobile` varchar(100) DEFAULT NULL,
  `Fax` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `BranchOpeningDate` date DEFAULT NULL,
  `StartTime` varchar(100) DEFAULT NULL,
  `EndTime` varchar(100) DEFAULT NULL,
  `Year` varchar(200) DEFAULT '2019-2020',
  `Shift` varchar(5) DEFAULT NULL,
  `Medium` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchId`, `BranchName`, `BranchCode`, `ContactNumber`, `BranchAddress`, `IsHeadOffice`, `Logo`, `LandPhone`, `Mobile`, `Fax`, `Email`, `BranchOpeningDate`, `StartTime`, `EndTime`, `Year`, `Shift`, `Medium`) VALUES
(1, 'Headoffice', '000', '0162255533', 'Air', 1, '1_1.jpg', '01', '01711', '', '', '2018-12-01', '', '', '2019-2020', 'M,D', 'B,E,V'),
(4, 'A-One Academy ', '001', 'Contact No : +8801711274688', '772/2, Monipur, Mirpur-2, Dhaka-1216', 0, '9103799805c2cf0f55ce99.jpg', '01', '01711', '', '', '2018-12-31', '', '', '2019-2020', 'M,D', 'B,E,V'),
(5, 'Kids Care', '002', '8801711274688', 'Monipur, Mirpur-2, Dhaka', 0, NULL, '8801711274688', '8801711274688', '8801711274688', '', '2019-02-02', '', '', '2019-2020', 'M,D', 'B,E,V'),
(6, 'Cosmopolitan Laboratory  Institute ', '003', '01622777444', '983/1 Monipur Mirpur-2 Dhaka- 1216', 0, '14953169175c18d905cd301.jpg', '8801711274688', '8801711274688', '8801711274688', '', '2019-01-11', '', '', '2019-2020', 'M,D', 'B,E,V');

-- --------------------------------------------------------

--
-- Table structure for table `config_classes`
--

CREATE TABLE `config_classes` (
  `ClassId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassCode` varchar(100) DEFAULT NULL,
  `ClassName` varchar(100) DEFAULT NULL,
  `ClassDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_classes`
--

INSERT INTO `config_classes` (`ClassId`, `BranchId`, `ClassCode`, `ClassName`, `ClassDescription`) VALUES
(14, 4, '06', 'Six', ''),
(15, 4, '07', 'Seven', ''),
(16, 4, '08', 'Eight', ''),
(17, 4, '09', 'Nine', ''),
(18, 4, '10', 'Ten', ''),
(19, 4, '11', 'Eleven', ''),
(20, 6, 'PL', 'Play', ''),
(21, 6, 'NU', 'Nursery', ''),
(22, 6, 'KG', 'KG', ''),
(23, 6, 'ON', 'One', ''),
(24, 6, 'TW', 'Two', ''),
(25, 6, 'TH', 'Three', ''),
(26, 6, 'FO', 'Four', ''),
(27, 6, 'FI', 'Five', ''),
(28, 6, 'SI', 'Six', ''),
(29, 6, 'SE', 'Seven', ''),
(30, 6, 'EI', 'Eight', ''),
(31, 6, 'NI', 'Nine', ''),
(32, 6, 'TE', 'Ten', ''),
(33, 6, 'PR1', 'Prep 1', ''),
(34, 6, 'PR2', 'Prep 2', ''),
(35, 6, 'PR3', 'Prep 3', ''),
(36, 6, 'EV1', 'English V One', ''),
(37, 6, 'EV2', 'English V Two', ''),
(38, 6, 'EV3', 'English V Three', ''),
(39, 4, '05', 'Five', ''),
(40, 4, '04', 'Four', ''),
(41, 4, '03', 'Three', ''),
(42, 4, '02', 'Two', ''),
(43, 4, '01', 'One', '');

-- --------------------------------------------------------

--
-- Table structure for table `config_class_periods`
--

CREATE TABLE `config_class_periods` (
  `PeriodId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(2) DEFAULT NULL,
  `PeriodName` varchar(100) DEFAULT NULL,
  `PeriodStartTime` varchar(100) DEFAULT NULL,
  `PeriodEndTime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_class_periods`
--

INSERT INTO `config_class_periods` (`PeriodId`, `BranchId`, `Shift`, `PeriodName`, `PeriodStartTime`, `PeriodEndTime`) VALUES
(19, 4, 'M', '1st Period', '09:00', '09:50'),
(20, 4, 'M', '2nd Period', '09:50', '10:40'),
(21, 4, 'M', '3rd Period', '10:40', '11:30');

-- --------------------------------------------------------

--
-- Table structure for table `config_class_routines`
--

CREATE TABLE `config_class_routines` (
  `RoutineId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Shift` char(2) DEFAULT NULL,
  `Medium` char(2) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `PeriodId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_sections`
--

CREATE TABLE `config_sections` (
  `SectionId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `SectionCode` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_sections`
--

INSERT INTO `config_sections` (`SectionId`, `BranchId`, `SectionCode`, `ClassId`, `SectionName`) VALUES
(16, 4, NULL, 11, 'Bonolata'),
(17, 4, NULL, 12, 'M6 Rose'),
(18, 4, NULL, 12, 'D6 Rose'),
(19, 4, '01', 14, 'M6 Rose'),
(20, 4, '02', 14, 'M6 Lily'),
(21, 4, '03', 14, 'M6 Tulip'),
(22, 4, '04', 14, 'M6 Bela'),
(23, 4, '05', 14, 'D6 Rose'),
(24, 4, '06', 14, 'D6 Lily'),
(25, 4, '07', 14, 'D6 Bela'),
(26, 4, '08', 14, 'D6 Tulip'),
(27, 4, '09', 14, 'D6 Daffodil'),
(28, 4, '10', 15, 'M7 Rose'),
(29, 4, '11', 15, 'M7 Lily'),
(30, 4, '12', 15, 'M7 Tulip'),
(31, 4, '13', 15, 'M7 Bela'),
(32, 4, '14', 15, 'D7 Rose'),
(33, 4, '15', 15, 'D7 Lily'),
(34, 4, '16', 15, 'D7 Tulip'),
(35, 4, '17', 15, 'D7 Bela'),
(36, 4, '18', 15, 'D7 Daffodil'),
(37, 4, '19', 16, 'M8 Rose'),
(38, 4, '20', 16, 'M8 Lily'),
(39, 4, '21', 16, 'M8 Tulip'),
(40, 4, '22', 16, 'E8 Rose'),
(41, 4, '23', 16, 'E8 Tulip'),
(42, 4, '24', 17, 'M9 Rose'),
(43, 4, '25', 17, 'E9 Rose'),
(44, 4, '26', 19, 'E11 Rose'),
(45, 6, '01', 20, 'Morning '),
(46, 6, '02', 20, 'Day'),
(47, 6, '01', 21, 'Morning '),
(48, 6, '02', 21, 'Day'),
(49, 6, '01', 22, 'Morning '),
(50, 6, '02', 22, 'Day'),
(51, 6, '01', 23, 'Morning '),
(52, 6, '02', 23, 'Day'),
(53, 6, '01', 24, 'Morning '),
(54, 6, '02', 24, 'Day'),
(55, 6, '01', 25, 'Morning '),
(56, 6, '02', 26, 'Day'),
(57, 6, '02', 27, 'Day'),
(58, 6, '02', 28, 'Day'),
(59, 6, '02', 29, 'Day'),
(60, 6, '02', 30, 'Day'),
(61, 6, '02', 31, 'Day'),
(62, 6, '02', 32, 'Day'),
(63, 6, '01', 33, 'Morning '),
(64, 6, '02', 33, 'Day'),
(65, 6, '01', 34, 'Morning '),
(66, 6, '02', 34, 'Day'),
(67, 6, '01', 35, 'Morning '),
(68, 6, '02', 35, 'Day'),
(69, 6, '01', 36, 'Morning '),
(70, 6, '02', 36, 'Day'),
(71, 6, '01', 37, 'Morning '),
(72, 6, '02', 37, 'Day'),
(73, 6, '01', 38, 'Morning '),
(74, 6, '02', 38, 'Day'),
(75, 4, '27', 39, 'D5 Rose'),
(76, 4, '28', 39, 'D5 lily'),
(77, 4, '29', 39, 'M5 Jui'),
(78, 4, '30', 39, 'M5 Rose'),
(79, 4, '36', 39, 'M5 Lily'),
(80, 4, '31', 16, 'M8 Jui'),
(81, 4, '32', 41, 'M3 Rose'),
(83, 4, '33', 41, 'M3 Lily'),
(84, 4, '34', 41, 'D3 Rose'),
(85, 4, '35', 41, 'D3 Lily'),
(86, 4, '37', 16, 'D8 Daffodil'),
(87, 4, '38', 43, 'M1 Rose');

-- --------------------------------------------------------

--
-- Table structure for table `config_subjects`
--

CREATE TABLE `config_subjects` (
  `SubjectId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `SubjectName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_subjects`
--

INSERT INTO `config_subjects` (`SubjectId`, `BranchId`, `SubjectName`) VALUES
(1, 4, 'Bangla 1st'),
(2, 4, 'Bangla 2nd'),
(3, 4, 'English 1st'),
(4, 4, 'English 2nd'),
(5, 4, 'Math'),
(14, 4, 'Science'),
(15, 4, 'B.G.S'),
(16, 4, 'Religion'),
(17, 4, 'I.C.T'),
(18, 4, 'Agricultural'),
(19, 4, 'Home Science'),
(20, 4, 'G.Math'),
(21, 4, 'H.Math'),
(22, 4, 'Physics'),
(23, 4, 'Chemistry'),
(24, 4, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `DormitoryId` int(11) UNSIGNED NOT NULL,
  `DormitoryName` varchar(100) DEFAULT NULL,
  `NoOfRooms` int(11) DEFAULT NULL,
  `Description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dormitories`
--

INSERT INTO `dormitories` (`DormitoryId`, `DormitoryName`, `NoOfRooms`, `Description`) VALUES
(1, 'Dormitory 001', 25, NULL),
(2, 'Dormitory 002', 25, NULL),
(3, 'Dormitory 003', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeId` int(11) NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `EmployeeName` varchar(50) NOT NULL,
  `EmployeeCode` varchar(100) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Nid` varchar(20) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `AltContactNumber` varchar(20) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `FathersName` varchar(100) DEFAULT NULL,
  `MothersName` varchar(100) DEFAULT NULL,
  `SpouseName` varchar(100) DEFAULT NULL,
  `PresentAddress` text DEFAULT NULL,
  `PermanentAddress` text DEFAULT NULL,
  `DateOfJoining` date DEFAULT NULL,
  `DesignationId` int(11) DEFAULT NULL,
  `CurrentSalary` decimal(10,2) DEFAULT NULL,
  `Ref1` varchar(100) DEFAULT NULL,
  `RefContactNumber` varchar(20) DEFAULT NULL,
  `Ref2` varchar(100) DEFAULT NULL,
  `Ref2ContactNumber` varchar(100) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL,
  `DegreeId` varchar(100) DEFAULT NULL,
  `IsTeacher` tinyint(1) DEFAULT 1,
  `Image` varchar(600) DEFAULT NULL,
  `Reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeId`, `BranchId`, `EmployeeName`, `EmployeeCode`, `DateOfBirth`, `Email`, `Nid`, `ContactNumber`, `AltContactNumber`, `Gender`, `BloodGroup`, `FathersName`, `MothersName`, `SpouseName`, `PresentAddress`, `PermanentAddress`, `DateOfJoining`, `DesignationId`, `CurrentSalary`, `Ref1`, `RefContactNumber`, `Ref2`, `Ref2ContactNumber`, `Status`, `DegreeId`, `IsTeacher`, `Image`, `Reason`) VALUES
(1, 6, 'Shahinur Rahman', 'aa', '1970-01-01', 'shahinurrahman989@gm', '19895017975232103', '01739265992', NULL, 'M', 'O+', 'Shorab Hossain', 'Jarina Begum', 'N/A', '664, Monipur, Mirpur - 2 Dhaka - 1216', 'Lahini, Mohini Mills, Kushtia (7001)', '2017-10-07', 4, '6500.00', 'Fahim', NULL, 'Nazim Uddin', NULL, 'A', 'Honours', 1, NULL, NULL),
(2, 6, 'Abdul Hakim ', 'ab', '1990-01-01', 'ahahim111990@gmal.co', '19909415181000204', '01750665030', NULL, 'M', 'AB+', 'Late. Kasiruddin', 'Mst. Hameda khatun ', 'N/A', '805/1, Monipur, Mirpur -2 , Dhaka-1216', 'Torrah, Horipur, Thakurgaon', '2018-12-18', 4, '6000.00', 'Md. Alamgir Hossain', NULL, 'No', NULL, 'A', 'Honours', 1, NULL, NULL),
(3, 6, 'Kalyani Biswas ', 'ac', '1970-01-01', 'Kbiswas134@gmal.com', '19874413347451858', '01781585918', NULL, 'F', 'B+', 'Kalipada Biswas', 'Bindu Biswas ', 'N/A', '903/1, Monipur, Mirpur, -2, Dhaka -1216', 'Vill + P.O, Khalkula P.S Kaligonj, Dist, Jhenidah 7350 ', '2017-01-03', 4, '6000.00', 'Taposh Biswas (01926101150)', NULL, 'Sathi Mandal (01789743362)', NULL, 'A', 'Honours', 1, NULL, NULL),
(4, 6, 'Md. Abdul Baki', 'ad', '1970-01-01', '', '8719079517245', '01718929502', NULL, 'M', 'B+', 'Late Azgor Ali Sarder', 'Marium Begum', 'Mst Mortuza Khatun', '954, Middle Monipur Mirpur - 2 Dhaka -1216', 'Jugkhula, Patkelghata, Satkhira.', '1995-06-06', 4, '5700.00', '', NULL, '', NULL, 'A', 'Honours', 1, '18838478695c18c7447429a.jpg', NULL),
(5, 6, 'Md. Mobarak Hossain', 'ae', '1970-01-01', 'belal@cosmopolitanelc.com', '19882648111000086', '01766276581', '', 'M', 'B+', 'Late Md. Amzad Hossain', 'Hena Begum', 'Jannatul Mawya', '704, Middle Monipur, Mirpur - 2, Dhaka - 1216', 'Agnulkaly  West para, Khoshatbaria, Shahjadpur, Shirajgong.', '2011-01-02', 2, '0.00', 'Md. Alauddin (01673991620)', '', 'Adus Salam Mia (01716941536)', NULL, 'A', 'Honours', 1, NULL, NULL),
(6, 1, 'Md. Moniruzzaman Shobuz', 'a', '1985-02-02', 'zs.technologyworld@gmail.com', '19852610457000056', '01711712403', '', 'M', 'O+', 'Md. Emdadul Hoque', 'Mst, Morjina Khatun', 'Mst. Samira Khatun', '964 Mollah Road, Monipur, Mirpur -2, Dhaka - 1216', 'Taragunia, Dolatpur, Kushtia', '2013-01-10', 10, '0.00', 'Fahim', '', 'Nazim Uddin', NULL, 'A', 'Honours', 1, '7400777425c18e2bcc5288.JPG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_branch_transfers`
--

CREATE TABLE `employee_branch_transfers` (
  `TransferId` int(11) UNSIGNED NOT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `OldBranchId` int(11) DEFAULT NULL,
  `NewBranchId` int(11) DEFAULT NULL,
  `TransferDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_departments`
--

CREATE TABLE `employee_departments` (
  `DepartmentId` int(11) UNSIGNED NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_designations`
--

CREATE TABLE `employee_designations` (
  `DesignationId` int(11) NOT NULL,
  `DesignationName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_designations`
--

INSERT INTO `employee_designations` (`DesignationId`, `DesignationName`) VALUES
(1, 'Head Master'),
(2, 'Assistant Head Master'),
(3, 'Senior Teacher'),
(4, 'Assistant Teacher'),
(5, 'Jounior Teacher'),
(6, 'Pion'),
(7, 'Driver'),
(8, 'Kerani'),
(9, 'Admin'),
(10, 'Assistant Admin ');

-- --------------------------------------------------------

--
-- Table structure for table `employee_promotions`
--

CREATE TABLE `employee_promotions` (
  `PromotionId` int(11) NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `PromotionDate` date DEFAULT NULL,
  `OldDesignationId` int(11) DEFAULT NULL,
  `NewDesignationId` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `Type` char(1) DEFAULT NULL COMMENT 'P=>Promotion, D=>Demotion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ExamId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `HasSba` tinyint(1) DEFAULT 0,
  `HasObjective` tinyint(1) DEFAULT 0,
  `ExamName` varchar(100) DEFAULT NULL,
  `ExamDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ExamId`, `BranchId`, `HasSba`, `HasObjective`, `ExamName`, `ExamDescription`) VALUES
(8, 4, 0, 1, 'Weekly Exam', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam_routines`
--

CREATE TABLE `exam_routines` (
  `RoutineId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `ExamId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_routines`
--

INSERT INTO `exam_routines` (`RoutineId`, `BranchId`, `Shift`, `Medium`, `ExamId`, `ClassId`, `Year`, `EntryBy`, `EntryDate`) VALUES
(1, 4, 'M', 'B', 8, 18, '2019-2020', 13, '2018-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine_details`
--

CREATE TABLE `exam_routine_details` (
  `RoutineDetailsId` int(11) UNSIGNED NOT NULL,
  `RoutineId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `ExamId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL,
  `ExamDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_routine_details`
--

INSERT INTO `exam_routine_details` (`RoutineDetailsId`, `RoutineId`, `BranchId`, `Shift`, `Medium`, `Year`, `ExamId`, `ClassId`, `SubjectId`, `RoomNumber`, `ExamDate`) VALUES
(2, 1, 4, 'M', 'B', '2019-2020', 8, 18, 1, '200', '2018-12-03'),
(3, 1, 4, 'M', 'B', '2019-2020', 8, 18, 1, '200', '2018-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `FeeId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `MemoNo` varchar(100) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `TransactionDate` date DEFAULT NULL,
  `TotalWaiverAmount` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `EntryDate` datetime DEFAULT NULL,
  `EntryBy` int(1) DEFAULT NULL,
  `VoucherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fee_configurations`
--

CREATE TABLE `fee_configurations` (
  `FeeConfigId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `TypeId` int(11) DEFAULT NULL COMMENT 'M=>Monthly, A=>Admision',
  `Amount` decimal(10,2) DEFAULT NULL,
  `WaiverAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_configurations`
--

INSERT INTO `fee_configurations` (`FeeConfigId`, `BranchId`, `ClassId`, `TypeId`, `Amount`, `WaiverAmount`) VALUES
(33, 6, 20, 11, '2000.00', '0.00'),
(34, 6, 21, 11, '2000.00', '0.00'),
(35, 6, 22, 11, '2000.00', '0.00'),
(36, 6, 23, 11, '2000.00', '0.00'),
(37, 6, 24, 11, '2000.00', '0.00'),
(38, 6, 25, 11, '3000.00', '0.00'),
(40, 6, 26, 11, '3000.00', '0.00'),
(41, 6, 27, 11, '3000.00', '0.00'),
(42, 6, 28, 11, '3500.00', '0.00'),
(43, 6, 29, 11, '3500.00', '0.00'),
(45, 6, 30, 11, '3500.00', '0.00'),
(46, 6, 31, 11, '4000.00', '0.00'),
(47, 6, 32, 11, '4000.00', '0.00'),
(48, 6, 33, 11, '5000.00', '0.00'),
(49, 6, 34, 11, '5000.00', '0.00'),
(50, 6, 35, 11, '5000.00', '0.00'),
(51, 6, 36, 11, '5000.00', '0.00'),
(52, 6, 37, 11, '5000.00', '0.00'),
(53, 6, 38, 11, '5000.00', '0.00'),
(54, 6, 20, 15, '5000.00', '0.00'),
(55, 6, 21, 15, '5000.00', '0.00'),
(56, 6, 22, 15, '5000.00', '0.00'),
(57, 6, 23, 15, '5000.00', '0.00'),
(58, 6, 24, 15, '5000.00', '0.00'),
(59, 6, 25, 15, '5000.00', '0.00'),
(64, 6, 26, 15, '4500.00', '0.00'),
(69, 6, 27, 15, '4500.00', '0.00'),
(71, 6, 28, 15, '5000.00', '0.00'),
(73, 6, 29, 15, '5000.00', '0.00'),
(75, 6, 30, 15, '5000.00', '0.00'),
(76, 6, 31, 15, '5500.00', '0.00'),
(77, 6, 32, 15, '5500.00', '0.00'),
(78, 6, 33, 15, '7000.00', '0.00'),
(79, 6, 34, 15, '7000.00', '0.00'),
(80, 6, 35, 15, '7000.00', '0.00'),
(81, 6, 36, 15, '7000.00', '0.00'),
(82, 6, 37, 15, '7000.00', '0.00'),
(83, 6, 38, 15, '7000.00', '0.00'),
(84, 6, 20, 13, '1000.00', NULL),
(85, 6, 21, 13, '1000.00', NULL),
(86, 6, 22, 13, '1000.00', NULL),
(87, 6, 23, 13, '1000.00', NULL),
(88, 6, 24, 13, '1000.00', NULL),
(89, 6, 25, 13, '1000.00', NULL),
(90, 6, 26, 13, '1000.00', NULL),
(91, 6, 27, 13, '1000.00', NULL),
(92, 6, 28, 13, '1100.00', NULL),
(93, 6, 29, 13, '1100.00', NULL),
(94, 6, 30, 13, '1100.00', NULL),
(95, 6, 30, 13, '1100.00', NULL),
(96, 6, 31, 13, '1200.00', NULL),
(97, 6, 32, 13, '1200.00', NULL),
(98, 6, 33, 13, '2000.00', NULL),
(99, 6, 34, 13, '1900.00', NULL),
(100, 6, 35, 13, '1800.00', NULL),
(101, 6, 36, 13, '1600.00', NULL),
(102, 6, 37, 13, '1600.00', NULL),
(103, 6, 38, 13, '1600.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_details`
--

CREATE TABLE `fee_details` (
  `FeeDetailsId` int(11) UNSIGNED NOT NULL,
  `FeeId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `TransactionDate` date DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `TypeId` int(11) DEFAULT NULL,
  `WaiverAmount` decimal(10,2) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `TypeId` int(11) UNSIGNED NOT NULL,
  `TypeName` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `IsMonthlyFee` tinyint(1) DEFAULT 0,
  `IsWaiverApplicable` tinyint(1) DEFAULT NULL,
  `IsOneTimeFee` tinyint(1) DEFAULT 0,
  `LedgerCode` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`TypeId`, `TypeName`, `Description`, `IsMonthlyFee`, `IsWaiverApplicable`, `IsOneTimeFee`, `LedgerCode`) VALUES
(11, 'Admission Fee', '', 0, 1, 1, '101'),
(13, 'Tuition Fee', '', 1, 1, 0, '102'),
(14, '1st Month Exam Fee', '', 0, 0, 1, '103'),
(15, '2nd Month Exam Fee', '', 0, 0, 1, '104'),
(16, 'Half Yearly Exam Fee', '', 0, 0, 1, '105'),
(17, '3rd Month Exam Fee', '', 0, 0, 1, '106'),
(18, '4th Month Exam Fee', '', 0, 0, 1, '107'),
(19, 'Yearly Exam Fee', '', 0, 0, 1, '108');

-- --------------------------------------------------------

--
-- Table structure for table `grade_points`
--

CREATE TABLE `grade_points` (
  `GradeId` int(11) UNSIGNED NOT NULL,
  `GradeName` varchar(100) DEFAULT NULL,
  `GradePoint` varchar(10) DEFAULT NULL,
  `MarkFrom` int(10) DEFAULT NULL,
  `MarkTo` int(10) DEFAULT NULL,
  `GradeDescription` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_points`
--

INSERT INTO `grade_points` (`GradeId`, `GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`, `GradeDescription`) VALUES
(1, 'A+', '5.0', 80, 100, NULL),
(2, 'A', '4.0', 70, 79, NULL),
(3, 'A-', '3.5', 60, 69, NULL),
(4, 'B', '3.0', 50, 59, NULL),
(5, 'C', '2', 40, 49, NULL),
(6, 'D', '1', 33, 39, NULL),
(7, 'F', '0', 0, 32, NULL),
(8, 'Scholarship ', '5.00', 90, 100, '  ');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applies`
--

CREATE TABLE `leave_applies` (
  `LeaveApplicationId` int(4) NOT NULL,
  `UserId` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `FromDate` date NOT NULL,
  `Todate` date NOT NULL,
  `LeaveCategoriesId` int(2) NOT NULL,
  `Reason` text NOT NULL,
  `IsApproved` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_calculations`
--

CREATE TABLE `leave_calculations` (
  `LeaveCalculationId` int(11) UNSIGNED NOT NULL,
  `Year` varchar(20) NOT NULL,
  `SickLeave` int(11) NOT NULL,
  `EarnLeave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_categories`
--

CREATE TABLE `leave_categories` (
  `LeaveCategoryId` int(11) UNSIGNED NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `MarkId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamId` int(11) NOT NULL,
  `SubjectId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`MarkId`, `BranchId`, `ClassID`, `SectionId`, `ExamDate`, `ExamId`, `SubjectId`) VALUES
(1, 4, 16, 37, '2018-12-04', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark_details`
--

CREATE TABLE `mark_details` (
  `MarkDetailsId` int(11) UNSIGNED NOT NULL,
  `MarkId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `SbaDeafault` int(11) DEFAULT NULL,
  `SbaMark` int(20) DEFAULT NULL,
  `SubjectiveDefault` int(11) DEFAULT NULL,
  `SubjectiveMark` int(20) DEFAULT NULL,
  `ObjectiveDefault` int(11) DEFAULT NULL,
  `ObjectiveMark` int(20) DEFAULT NULL,
  `TotalMark` int(20) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark_details`
--

INSERT INTO `mark_details` (`MarkDetailsId`, `MarkId`, `BranchId`, `ClassID`, `SectionId`, `ExamId`, `ExamDate`, `SubjectId`, `StudentId`, `SbaDeafault`, `SbaMark`, `SubjectiveDefault`, `SubjectiveMark`, `ObjectiveDefault`, `ObjectiveMark`, `TotalMark`, `EntryOn`, `EntryBy`) VALUES
(7, 1, 4, 16, 37, 8, '2018-12-04', 1, 156, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(8, 1, 4, 16, 37, 8, '2018-12-04', 1, 157, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(9, 1, 4, 16, 37, 8, '2018-12-04', 1, 158, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(10, 1, 4, 16, 37, 8, '2018-12-04', 1, 159, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(11, 1, 4, 16, 37, 8, '2018-12-04', 1, 160, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(12, 1, 4, 16, 37, 8, '2018-12-04', 1, 161, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(13, 1, 4, 16, 37, 8, '2018-12-04', 1, 162, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(14, 1, 4, 16, 37, 8, '2018-12-04', 1, 163, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(15, 1, 4, 16, 37, 8, '2018-12-04', 1, 164, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(16, 1, 4, 16, 37, 8, '2018-12-04', 1, 165, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(17, 1, 4, 16, 37, 8, '2018-12-04', 1, 166, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(18, 1, 4, 16, 37, 8, '2018-12-04', 1, 167, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(19, 1, 4, 16, 37, 8, '2018-12-04', 1, 168, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(20, 1, 4, 16, 37, 8, '2018-12-04', 1, 169, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13),
(21, 1, 4, 16, 37, 8, '2018-12-04', 1, 170, NULL, NULL, 25, 0, 25, 0, 0, '2018-12-13 10:45:36', 13);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `OrganizationId` int(10) UNSIGNED NOT NULL,
  `OrganizationName` varchar(200) DEFAULT NULL,
  `OrganizationAddress_1` varchar(200) DEFAULT NULL,
  `OrganizationAddress_2` varchar(200) DEFAULT NULL,
  `OrganizationAddress_3` varchar(200) DEFAULT NULL,
  `OrganizationLogo` varchar(50) DEFAULT NULL,
  `CashMemoPrefix` varchar(30) DEFAULT NULL,
  `MemoPrfix` varchar(100) DEFAULT NULL,
  `StudentCodePrefix` varchar(10) DEFAULT NULL,
  `Logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`OrganizationId`, `OrganizationName`, `OrganizationAddress_1`, `OrganizationAddress_2`, `OrganizationAddress_3`, `OrganizationLogo`, `CashMemoPrefix`, `MemoPrfix`, `StudentCodePrefix`, `Logo`) VALUES
(1, 'Headoffice', 'Air', NULL, NULL, NULL, 'SM-', 'PM-', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `ParentId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ParentName` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(200) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`ParentId`, `BranchId`, `StudentId`, `ParentName`, `ContactNumber`, `UserId`) VALUES
(10, 4, 154, 'Hossen Ahmed Raton', '01713257941', 17),
(11, 4, 155, 'Md. Salauddin Mintu', '01817538430', 18),
(13, 4, 156, 'Galib Yeashir', '01814658328', 19),
(14, 4, 157, 'Md. Habibur Rahman', '01816600080', 20),
(15, 4, 158, 'Md. Sayedur Rahman', '01727217928', 21),
(16, 4, 159, 'Md. Nizamuddin', '01976210415', 22),
(17, 4, 160, 'Md. Abdul Maivivan', '01718771056', 23),
(18, 4, 161, 'Rezual Karim', '01712755876', 24),
(19, 4, 162, 'Md. Mazedul Islam', '01750536922', 25),
(20, 4, 163, 'Md. Abdullah Al Mamun', '01674628237', 26),
(21, 4, 164, 'Rokib Hossain', '01732772217', 27),
(22, 4, 165, 'Md. Khalilur Rahman', '01922897556', 28),
(23, 4, 166, 'Sosanto Boshu', '01924730477', 29),
(24, 4, 167, 'Md. Aminur Rahman Khan', '01923344139', 30),
(25, 4, 168, 'Md. Anwar Hossain', '01715039739', 31),
(26, 4, 169, 'Md. Zakir Hossain', '01712128991', 32),
(27, 4, 170, 'Abul Kalam Azad', '01733173284', 33),
(28, 4, 171, 'Selim Ahmed', '01819945399', 38),
(29, 4, 172, 'Saidul Islam', '01819202492', 39),
(30, 4, 173, 'Mahumudul Hasan', '01718334559', 40),
(31, 4, 174, 'Mir Monowar Hossain', '01711939089', 41),
(32, 4, 175, 'Munshi Masud Hossen', '01929993008', 42),
(33, 4, 176, 'Md.Jalal Uddin', '01741692264', 43),
(34, 4, 177, 'Md. Abdul Halim', '01818095700', 44),
(35, 4, 178, 'Anamul Haq Mollah', '01714340144', 45),
(36, 4, 179, 'Mizanur Rahman', '01814097490', 46),
(37, 4, 180, 'Md. Kamal Parvase', '01713148520', 47),
(38, 4, 181, 'MD. Abul Khaer', '01720513592', 48),
(39, 4, 182, 'Tariqul Islam', '01730083684', 49),
(40, 4, 183, 'Dr.Md Khalid Jamil', '01720110514', 50),
(41, 4, 184, 'late, Aminul Islam', '01919868457', 51),
(42, 4, 185, 'MD. Nur Nobi', '01961817877', 52),
(43, 4, 186, 'Md. Ehtesham ul- Haque', '01711530855', 53),
(44, 4, 187, 'Kalipodo Sharma', '01780172784', 54),
(45, 4, 188, 'Mounzurul Islam', '01922554352', 55),
(46, 4, 189, 'Hanif MD. Sofrur Razzak', '01626530604', 56),
(47, 4, 190, 'Imrul Kayes', '01678592203', 57),
(48, 4, 191, 'Rafiqul Islam', '01714049531', 58),
(49, 4, 192, 'Md. Rafiquel Islam', '01717094845', 59),
(50, 4, 193, 'Mizanur Rahman ', '01917406622', 60),
(51, 4, 194, 'Mir Hossain Chowdhury', '01715030477', 61),
(52, 4, 195, 'Sadiqur Rahman', '01819128893', 62),
(53, 4, 196, 'S.M Shafikur Rahman', '01715734554', 63),
(54, 4, 197, 'MD. Tariqul Islam', '01913391721', 64),
(55, 4, 198, 'Saiful Islam', '01712603625', 65),
(56, 4, 199, 'lets Khundaqur Mosharraf', '01682848907', 66),
(57, 4, 200, 'Kazi Giash uddin ', '01680306572', 67),
(58, 4, 201, 'Abul Hayath Md.. Kamruzzaman', '01912716921', 68),
(59, 4, 202, 'Md. Abul Kashem', '01717037870', 70),
(60, 4, 203, 'Asit Kumar Debnath', '01716479053', 71),
(61, 4, 204, 'Narayan Das', '01911487320', 72),
(62, 4, 205, 'MD. Liakat Ali', '01715407907', 73),
(63, 4, 206, 'K.M. Abul Kalam Azad', '01711136902', 74),
(64, 4, 207, 'Golam Saroar', '01711577455', 75),
(65, 4, 208, 'Billiam Banarge', '01676041213', 76),
(66, 4, 209, 'Anisur Zaman', '01733255685', 77),
(67, 4, 210, 'Monayem Khan', '01740974326', 78),
(68, 4, 211, 'Abdul Hye', '01717382184', 79),
(69, 4, 212, 'Kharul Bashar', '01715529665, 01625677168', 80),
(70, 4, 213, 'Abdur Satter', '01869233572', 81),
(71, 4, 214, 'MD. Rezaul Karim', '01684328636', 82),
(72, 4, 215, 'MD. Kamal Hossan', '01716281100', 83),
(73, 4, 216, 'MD. Farid Hossain Militon', '01972013367', 84),
(74, 4, 217, 'Kh. MD. Sohidul Islam', '01758926683', 85),
(75, 4, 218, 'DR, MD. Mizanur Rahman ', '017111131492', 86),
(76, 4, 219, 'Md. Aminur Rahman Khan', '016833301130', 87),
(77, 4, 220, 'Faruk Ahamed Monir', '01729161400', 88),
(78, 4, 221, 'H.M Aslim', '01730965953', 89),
(79, 4, 222, 'Razibul Hasan', '01718238897', 90),
(80, 4, 223, 'MD. Mabin', '01711204502', 91),
(81, 4, 224, 'MD. Salim Reza', '01712221303', 92),
(82, 4, 225, 'Saiful islam', '01822825308', 93),
(83, 4, 226, 'A. K.M Hasan Reza', '01716620698', 94),
(84, 4, 227, 'MD. Mohibur Rahman', '01911232334', 95),
(85, 4, 228, 'Tajul Islam', '01715111750', 96),
(86, 4, 229, 'MD. Zakir Hossain', '01712128991', 97),
(87, 4, 230, 'Shahjahan Ali', '01731945252', 98),
(88, 4, 231, 'Khan Mahbub Shohel', '01714686047', 99),
(89, 4, 232, 'Md. Rafiquel Islam', '01715094845', 100),
(90, 4, 233, 'MD. Mahbub Hasan', '01678062309', 101),
(91, 4, 234, 'Lutfor Rahman khan', '01957794952', 102),
(92, 4, 235, 'Hemyet Hossen', '01712297000', 103),
(93, 4, 236, 'Jahirul Hoque', '01712123676', 104),
(94, 4, 237, 'Tariqul Islam', '01730083684', 105),
(95, 4, 238, 'MD. Azar Ali', '01726595732', 106),
(96, 4, 239, 'Md. Kamal Parvase', '01713148520', 107),
(97, 4, 240, 'Samsul Islam', '01798515959', 108),
(98, 4, 241, 'Jebon Robi Das', '01917705690', 109),
(99, 4, 242, 'Zahrul Islam', '01741565333', 110),
(100, 4, 243, 'Abdul Hye', '01717382184', 111),
(101, 4, 244, 'Monayem Khan', '017740974326', 112),
(102, 4, 245, 'S.Kibriya', '01716127527', 113),
(103, 4, 246, 'Kharul Bashar', '01625677168', 114),
(104, 4, 247, 'Mahumudul Hasan Shaikh', '01715199159', 115),
(105, 4, 248, 'MD. Fazlul Karim', '01742255344', 116),
(106, 4, 249, 'Billiam Banarge', '01676041213', 117),
(107, 4, 250, 'Anisur Zaman', '01733255685', 118),
(108, 4, 251, 'Atikur Rahman', '01754041055', 119),
(109, 4, 252, 'Rafiqul Majid', '01713030572', 120),
(110, 4, 253, 'Shihab Hossain', '01552358070', 121),
(111, 4, 254, 'MD. Kamruzzaman', '01711603676', 122),
(112, 4, 255, 'Sheikh Masbah Uddin ', '01711019374', 123),
(113, 4, 256, 'MD. Shah Alam Patwary', '01812775061', 124),
(114, 4, 257, 'MD. Motalab', '01758109926', 125),
(115, 4, 258, 'Mizanur Rahman', '01917701762', 126),
(116, 4, 259, 'Mohammad Forhad Hossain', '01793009143', 127),
(117, 4, 260, 'MD. Iqbal Hossain', '01712108607', 128),
(118, 4, 261, 'Mohammad Mintu', '01741181184', 129),
(119, 4, 262, 'MD. Belayt Hossan', '01719794855', 130),
(120, 4, 263, 'Capt. Imranor Reza Chowdhury', '01818489543', 131),
(121, 4, 264, 'MD. Mozibur Rahman', '01718268866', 132),
(122, 4, 265, 'A.H.M Shaful Azam', '01819210451', 133),
(123, 4, 266, 'Shamsul Hoque Selim', '01686090312  /  01635090191', 134),
(124, 4, 267, 'Shamim Ahamid', '01730399080', 135),
(125, 4, 268, 'Noor Nobi Chowdhury', '01814469504', 136),
(126, 4, 269, 'Engr. MD. Hasanuzzaman', '01911785982', 137),
(127, 4, 270, 'Shalim Mollah', '01937261866', 138),
(128, 4, 271, 'Dr, Mohammad Idmish Ali', '01712790646', 139),
(129, 4, 272, 'MD. Kamrul Islam', '01780484703', 140),
(130, 4, 273, 'Late. Ataur Rahman Chowdhury', '01726596202', 141),
(131, 4, 274, 'Late. Khaza Abdus Salam', '01855596750', 142),
(132, 4, 275, 'Shahin Rahman', '01713199688', 143),
(133, 4, 276, 'MD. Zahidul Haque Khan', '01716814936', 144),
(134, 4, 277, 'Rafiqul Islam', '01834678958', 145),
(135, 4, 278, 'MD. Shihabul Islam', '01673466264', 146),
(136, 4, 279, 'Fakhruddin Khan', '01713147027', 147),
(137, 4, 280, 'Hafez Sultan Mahmud', '01725336241', 148),
(138, 4, 281, 'MD. Razzak Mizi', '01813930728', 149),
(139, 4, 282, 'MD. Showkat Ali Molla', '01712615814, 01675317852', 150),
(140, 4, 283, 'S.M Shafikur Rahman', '01715734554', 151),
(141, 4, 284, 'Mostafezur Rahman', '01684108908', 152),
(142, 4, 285, 'MD. Jamal Hossen', '017727530213', 153),
(143, 4, 286, 'Mostafezur Rahman', '01684108908', 154),
(144, 4, 287, 'MD. Jahangir Alam', '01819597111', 155),
(145, 4, 288, 'Belal Hossen', '01942789859', 156),
(146, 4, 289, 'MD. Sharif Hossen', '01819558081', 157),
(147, 4, 290, 'Lutfor Rahman', '01714020818', 158),
(148, 4, 291, 'MD. Abdul Khayer', '01948611561', 159),
(149, 4, 292, 'MD. Al- Jubaide', '01816365336', 160),
(150, 4, 293, 'Rafiqul Islam', '01834678958', 161),
(151, 4, 294, 'MD. Repon Munshe', '01757293286', 162),
(152, 4, 295, 'Aslam Hossain', '01827587980', 163),
(153, 4, 296, 'Abdur Rahman', '01737325157', 164),
(154, 4, 297, 'MD. Monirul Islam', '01926689950', 165),
(155, 4, 298, 'Hhafiz Mollah', '01798240545', 166),
(156, 4, 299, 'MD. Jul-E- Aslam', '01711713678', 167),
(157, 4, 300, 'MD. Shafiqul Islam', '01716913210', 168),
(158, 4, 301, 'Fazlul Hoque', '01819483728', 169),
(159, 4, 302, 'MD. Newaj Hossain', '01828142286', 170),
(160, 4, 303, 'Razaul Rahman', '01711464708', 171),
(161, 4, 304, 'MD. Khadimul Islam', '01719524221', 172),
(162, 4, 305, 'Morshed Zaman Liton', '01711785106', 173),
(163, 4, 306, 'Mizanur Rahman', '01715601041', 174),
(164, 4, 307, 'Syed Sotter Ahmed', '01835026634', 175),
(165, 4, 308, 'Sk. Kamrul Islam', '01973234292', 176),
(166, 4, 309, 'MD. Izharul islam', '01711955442', 177),
(167, 4, 310, 'MD. Raknuzzaman', '01819556485', 178),
(168, 4, 311, 'Abdul Sattar', '01881659416', 179),
(169, 4, 312, 'Wahidur Rahman Khan', '01745885058', 180),
(170, 4, 313, 'MD. Abul Hashem', '01817584753', 181),
(171, 4, 314, 'MD. Saiful Islam', '01819202492', 182),
(172, 4, 315, 'Nazrul Islam', '01712593593', 183),
(173, 4, 316, 'Abu Naser', '01711392359', 184),
(174, 4, 317, 'MD. Mokhlesur Rahman', '01711525484', 185),
(175, 4, 318, 'MD. Zahid Alom', '01610744422', 186),
(176, 4, 319, 'Kawsar Talukder', '01711595334', 187),
(177, 4, 320, 'Kamruzaman', '01843516484', 188),
(178, 4, 321, 'Golam Rabani', '01937548008', 189),
(179, 4, 322, 'MD. Anisur Rahman', '01712027728', 190),
(180, 4, 323, 'Zahrul Islam', '01741565333', 191),
(181, 4, 324, 'Jebon Robi Das', '01917705690', 192),
(182, 4, 325, 'MD. Nurunnabi Mondol', '01711101455', 193),
(183, 4, 326, 'Abdur Rahman', '01617589413', 194),
(184, 4, 327, 'DR. Bidyut', '01931354805', 195),
(185, 4, 328, 'MD. Jahangir Alam', '01517075151', 196),
(186, 4, 329, 'MD. Mazharul Islam', '01718559605', 197),
(187, 4, 330, 'MD. Farid Hossain Militon', '01972013367', 198),
(188, 4, 331, 'Shafique Ahmed Khan', '01730791792, 01913058955', 199),
(189, 4, 332, 'MD. Jamal Hossen', '01715933238', 200),
(190, 4, 333, 'G.M. Hafizul Islam', '01715513853', 201),
(191, 4, 334, 'Habibur Rahman Khan', '0176250600', 202),
(192, 4, 335, 'Zahrul Islam', '01720273644', 203),
(193, 4, 336, 'MD. Sayed Hossen', '01718082226', 204),
(194, 4, 337, 'MD. Alamgir Hossain', '01713093185', 205),
(195, 4, 338, 'MD. Shariful Islam', '01714099307', 206),
(196, 4, 339, 'Habibur Rahman', '01757987313', 207),
(197, 4, 340, 'A K M Saiful Islam', '01711314107', 208),
(198, 4, 341, 'Miah Mohammad Al -Amin', '01822000298', 209),
(199, 4, 342, 'Rokinuzzaman', '01819556485', 210),
(200, 4, 343, 'MD. Zeaur Rahman', '01716093784', 211),
(201, 4, 344, 'Afsa Balale', '01936133395', 212),
(202, 4, 345, 'Md. Nizamuddin', '01732228825', 213),
(203, 4, 346, 'Mur-A- Alom', '01917389179', 214),
(204, 4, 347, 'Gazi Mohammad Abid Hosan', '01741081699', 215),
(205, 4, 348, 'MD. Harunur Rashid', '01760001420', 216),
(206, 4, 349, 'Rezual Karim', '01712211216', 217),
(207, 4, 350, 'Harun or Rashid', '01990307673', 218),
(208, 4, 351, 'Sofiqur Rahman', '01781446590', 219),
(209, 6, 352, 'Md. Shakhawat Hossain', '01909146922', 220),
(210, 6, 353, 'Humayun Kabir', '01991091066', 221),
(211, 6, 354, 'Md. Moniruzzman Monir', '01764521465', 222),
(212, 6, 355, 'S.M. Shoeb', '01671127028', 223),
(213, 6, 356, 'Md. Nura Alam Siddiqui', '01712251866', 224),
(214, 6, 357, 'Md. Jalal Uddin ', '01916030713', 225),
(215, 6, 358, 'Majedul Islam', '01985558922', 226),
(216, 6, 359, 'Md. Nasir Uddin', '01715347790', 227),
(217, 6, 360, 'Md. Shaidul Islam', '01977431566', 228),
(218, 6, 361, 'Omar Faruk', '01754211676', 231),
(219, 6, 362, 'Omar Faruk', '01754211676', 232),
(220, 6, 363, 'Sheik Jamal Hossain (Munna)', '01923793967', 233),
(221, 6, 364, 'Andrew Miltion Gomes ', '01850524707', 234),
(222, 6, 365, 'Md, Monirul Islam', '01723309065', 235),
(223, 6, 366, 'A K M Sorowor Hossain ', '01631596977', 236),
(224, 6, 367, 'Md. Arshadul Hoque', '01716425592', 237),
(225, 6, 368, 'Zahir Raihan Babul ', '01714446699', 238),
(226, 6, 369, 'Md, Abdur Rahin ', '0171824381', 239),
(227, 6, 370, 'Moshiur Rahaman ', '01916284438', 240),
(228, 6, 371, 'Samiul Islam ', '01721699816', 241),
(229, 6, 372, 'MD. Saiful Islam ', '01822825308', 242),
(230, 6, 373, 'Ashif Rajiul Hasan', '01715011528', 243),
(231, 6, 374, 'MD. Shajedul Karim ', '01550156385', 244),
(232, 6, 375, 'MD. Monirujjman ', '01768561510', 245),
(233, 6, 376, 'Abdullah Al Mamun', '01915463147', 246),
(234, 6, 377, 'MD. Aowlad Hossain ', '01647722099', 247),
(235, 6, 378, 'Sumon Rana ', '01912494474', 248),
(236, 6, 379, 'Sanjit Kumer Saha', '01712694106', 249),
(237, 6, 380, 'Md. Abu Sayeed ', '01753647080', 250),
(238, 6, 381, 'MD. Ismail Hossain ', '01718100222', 251),
(239, 6, 382, 'Ismial Hossain ', '01626474041', 252),
(240, 6, 383, 'Md. Akram Hossain Shimul ', '01713093822', 253),
(241, 6, 384, 'Md. Abdur Rahaman ', '01951224492', 254),
(242, 6, 385, 'MD. Monirujjaman ', '01711574882', 255),
(243, 6, 386, 'MD. Mostak Ahamed ', '01717899492', 256),
(244, 6, 387, 'Md. Ariful Islam', '01968858337', 257),
(245, 6, 388, 'Lal Chan ', '01739607109', 258),
(246, 6, 389, 'Mostofa Mahmud Zoha', '01712669309', 259),
(247, 6, 390, 'Sakil Ahamed ', '01837386656', 260),
(248, 6, 391, 'F.M. Foridul Islam', '01779554972', 261),
(249, 6, 392, 'Md. Siddikur Rahaman ', '01734694070', 262),
(250, 6, 393, 'Mohammad Dalower Hossan ', '01912416046', 263),
(251, 6, 394, 'Mohammad Dalower Hossan ', '01912416046', 264),
(252, 6, 395, 'Md. Anowar Hossain ', '01752107693', 265),
(253, 6, 396, 'Md. Zahid Hossain ', '01714163224', 266),
(254, 6, 397, 'md. Liton ', '01777815820', 267),
(255, 6, 398, 'Md Aminul Islam', '01710771840', 268),
(256, 6, 399, 'Kripamoy Sarkar ', '0172697107', 269),
(257, 6, 400, 'K.M. Ronot Jahan Tomal ', '01711186310', 270),
(258, 6, 401, 'Anwar Hosan ', '01635406871', 271),
(259, 6, 403, 'Md. Abu Yousuf Murad ', '01914907167', 272),
(260, 6, 404, 'Md. Abul Bashar ', '01932716613', 273),
(261, 6, 405, 'Md. Abul Bashar ', '01932716613', 273),
(262, 6, 406, 'Md. Hasem ', '01942334614', 274),
(263, 6, 407, 'Lutfar Rahaman ', '01720014474', 275),
(264, 6, 408, 'Hossainul Kibria ', '01737686722', 276),
(265, 6, 409, 'Dewan Shadadul Hoque Uzzal ', '01710990808', 277),
(266, 6, 410, 'Saiful Islam ', '01678715101', 278),
(267, 6, 411, 'Saiful Islam ', '01678715101', 279),
(268, 6, 412, 'Md. Jul-E- Aslam ', '01711713678', 280),
(269, 6, 413, 'Sheikh Abdur Rohim ', '01933361473', 281),
(270, 6, 414, 'Md. Mujebur Rahaman ', '01674742222', 282),
(271, 6, 415, 'MD. Golam Rosul ', '01712355498', 283),
(272, 6, 416, 'Md. Saiful Islam ', '01850861056', 284),
(273, 6, 417, 'Md.Nuruddin Hwlhder ', '01913227421', 285),
(274, 6, 418, 'Md. Shumsud Daha ', '01716642291', 286),
(275, 6, 419, 'Md. Anawer Hossain ', '01872629482', 287),
(276, 6, 420, 'Md. Josim Uddin ', '01814216040', 288),
(277, 6, 421, 'Mohammad Masud Rana', '01716901330', 289),
(278, 6, 422, 'Muhammad Shafidllah Shake ', '01716763729', 290),
(279, 6, 423, 'Md. Touidul Islam ', '01718942675', 291),
(280, 6, 424, 'Mijanur Rahaman ', '01818515384', 292),
(281, 6, 425, 'Shaikh Abul Kashrm Fardous ', '01711956191', 293),
(282, 6, 426, 'Md. Abjal Hossan ', '01948356096', 294),
(283, 6, 427, 'Warish Nadim ', '01624847867', 295),
(284, 6, 428, 'Imtiaz Masroor ', '01715021592', 296),
(285, 6, 429, 'Md. Nazrul Islam ', '01710622850', 297),
(286, 6, 430, 'Md. Obidun Nobi ', '01730405410', 298),
(287, 6, 431, 'Dalowar Hossain ', '01745901847', 299),
(288, 6, 432, 'Abdul Kadir ', '01954499091', 300),
(289, 6, 433, 'MD. jalal ', '01777525139', 301),
(290, 6, 434, 'Akrim Hossain Mia', '01715699669', 302),
(291, 6, 435, 'Swapanchandra Das ', '0', 303),
(292, 6, 436, 'Md. Sinto Hossain ', '01776797671', 304),
(293, 6, 437, 'Md. Raihan Mia', '01771587606', 305),
(294, 6, 438, 'Sheikh Mohammed Arman ', '01815437103', 306),
(295, 4, 439, 'Md. Nurul Islam', '01938872474', 307),
(296, 6, 440, 'Md. Rabbi ', '01835497781', 308),
(297, 6, 441, 'Md. Amjad ', '01715819219', 309),
(298, 6, 442, 'Md. Dalower Hossain ', '01914849902', 310),
(299, 6, 443, 'Md. Jahngir ', '01960800211', 311),
(300, 6, 444, 'Abdul Bashar ', '01722026600', 312),
(301, 6, 445, 'Md. Litan Akon ', '01786693250', 313),
(302, 6, 446, 'Heal Mahmad ', '01712081008', 314),
(303, 6, 447, 'Md. Badrul Alam Shipon ', '0', 315),
(304, 6, 448, 'Md. Masud Rana ', '01749972072', 316),
(305, 6, 449, 'Md. Ferouz Mahmud', '01712472015', 317),
(306, 6, 450, 'Md. Abu Bokkor Shiddik Ripon ', '01924958344', 318),
(307, 6, 451, 'Md. Habib Islam ', '01722902003', 319),
(308, 6, 452, 'Mohammad Saiful Islam ', '01764788893', 320),
(309, 6, 453, 'Md. Milon Hossain ', '01948634744', 321),
(310, 6, 454, 'Santu Mia ', '0', 322),
(311, 6, 455, 'Abul Kalam Manshi ', '01734349394', 323),
(312, 6, 456, 'Md. Monir Hossen ', '01991633355', 324),
(313, 6, 457, 'Alamgir Hossain ', '01932600639', 325),
(314, 6, 458, 'Amdadul Shikder ', '01751938945', 326),
(315, 6, 459, 'Md. Feroj Ahmed ', '01714495061', 327),
(316, 6, 460, 'Md. Shakhoyat Hossan ', '01924527164', 328),
(317, 6, 461, 'Md. Ikbal Mullik ', '01910761859', 329),
(318, 4, 462, 'Mohammad Musfequs Saeheen', '01819790408', 330),
(319, 4, 463, 'Hosian Kibria ', '01737686722', 331),
(320, 4, 464, 'Kamal', '01714446757', 332),
(321, 4, 465, 'Habibur Rahman', '01754540587', 333),
(322, 4, 466, 'MD. Murshedul Haque', '01716968772', 334),
(323, 4, 467, 'Samsul Huda', '01817079159', 335),
(324, 4, 468, 'Harunar Rashid', '01712588352', 336),
(325, 4, 469, 'Dr. Jahangir Alam', '01712027371', 337),
(326, 4, 470, 'Prodip Kumar Das', '01715434913', 338),
(327, 4, 471, 'MD. Sharower Hossain', '01552469989', 339),
(328, 4, 472, 'MD. Motalab', '01758109926', 340),
(329, 4, 473, 'Mohammad Oliulla', '01672592257', 341),
(330, 4, 474, 'MD. Abdul Karim', '01712684258', 342),
(331, 6, 475, 'Jihadul Islam ', '01', 343),
(332, 6, 476, 'Md. Abu Rasel ', '017400900178', 344),
(333, 6, 477, 'Anayet Hossain ', '01792224223', 345),
(334, 6, 478, 'Ariful Islam ', '01814784562', 346),
(335, 6, 479, 'Md. Rezaul Karim ', '01718653736', 347),
(336, 6, 480, 'Md. Ali ', '01677482295', 348),
(337, 6, 481, 'Mohammad Ali', '01912150951', 349),
(338, 6, 482, 'Ahidur Rahman ', '01948148003', 350),
(339, 6, 483, 'Monirujjaman Manir ', '01627284197', 351),
(340, 6, 484, 'Md. Nazrul Islam ', '01710622350', 352),
(341, 6, 485, 'Munsur Ahamed ', '01713623762', 353),
(342, 6, 486, 'Abdul Majid Molla ', '01933361910', 354),
(343, 6, 487, 'Md. Sentu Hosen', '01776797671', 355),
(344, 6, 488, 'Md. Sidul Islam ', '01941552680', 356),
(345, 6, 489, 'Md. Anowar Hosan ', '01884914983', 357),
(346, 6, 490, 'Hafeza Md. Eiles ', '01741692212', 358),
(347, 6, 491, 'Md. Mannan ', '01792414993', 359),
(348, 4, 492, 'Hashem Ali', '01713371403', 360),
(349, 4, 493, 'Abdul Owahab Khan', '01988984833', 361),
(350, 4, 494, 'Bozulur Rahman', '01674308857', 362),
(351, 4, 495, 'Monayem Khan', '01740574326', 363),
(352, 6, 496, 'Kobir Hosen ', '019928545731', 364),
(353, 6, 497, 'Asadul Sheikh ', '019928545731', 365),
(354, 4, 498, 'Kazi Abdul Aziz', '01686408227', 366),
(355, 4, 499, 'Shihab Hossain', '01552358070', 367),
(356, 4, 500, 'MD. Sayem Ahamed', '01911384050', 368),
(357, 4, 501, 'Abdul Bashar', '01818619063', 369),
(358, 6, 502, 'Sumon Khan ', '01720222328', 370),
(359, 4, 503, 'Srajul Islam', '01712290157', 371),
(360, 4, 504, 'MD. Jamal uddin', '01713927865, 01914878515', 372),
(361, 4, 505, 'Sorwar Hossain', '01738655789', 373),
(362, 4, 506, 'Ajaharul islam', '01713581806', 374),
(363, 4, 507, 'MD. Roni', '01675703882', 375),
(364, 6, 508, 'Md. Fazulr Rahman Bhuyan ', '01726694948', 376),
(365, 4, 509, 'Samsul Haque', '01922556198', 377),
(366, 4, 510, 'Fariduzzaman', '01916143261', 378),
(367, 4, 511, 'Jalal Uddin( Emon)', '01921699385', 379),
(368, 4, 512, 'MD. Amin', '01719888660', 380),
(369, 6, 513, 'Abdul Mannan ', '01724486021', 381),
(370, 6, 514, 'Rashed Ahamed ', '01533403082', 382),
(371, 6, 515, 'Suman Chandra Pual ', '01754901435', 383),
(372, 6, 516, 'Bidhan Kumar Podder ', '01720956041', 384),
(373, 6, 517, 'Md. Jasim Uddin ', 'Due ', 385),
(374, 6, 518, 'Md. Aiub Ali ', '01966160198', 386),
(375, 6, 519, 'Md. Roni Hasan ', '01715620071', 387),
(376, 6, 520, 'Md. nasir Uddin ', '01970807384', 388),
(377, 6, 521, 'M. Hayder Shams ', '01680877299', 389),
(378, 6, 522, 'Due ', 'Due ', 390),
(379, 6, 523, 'Mohammad Saiful Islam ', '0176788893', 391),
(380, 6, 524, 'Jontu Lal Halder ', '01639456533', 392),
(381, 6, 525, 'Md. Aslam Kazi ', '01733742021', 393),
(382, 6, 526, 'Hannan Mia', '01911161802', 394),
(383, 6, 527, 'Anwar Hosan ', '01748973527', 395),
(384, 6, 528, 'Mhamud Hasan ', '01715116133', 396),
(385, 6, 529, 'Md. Nasir Hossain ', '01765589657', 397),
(386, 6, 530, 'Belal Hossain ', '01707771751', 398),
(387, 6, 531, 'Md. Abu Sateid ', '01953647080', 399),
(388, 6, 532, 'Md. Johurul Islam ', '01717176394', 400),
(389, 6, 533, 'Khorshed Alam ', '01938718153', 401),
(390, 6, 534, 'Alauddin Howlader ', '01986810461', 402),
(391, 6, 535, 'Md. Shohel ', '01933788424', 403),
(392, 6, 536, 'Md. Abdul Manan Ali', '01718964489', 404),
(393, 6, 537, 'Md. Abdul Manan Ali', '01718964489', 405),
(394, 6, 538, 'Md. Jewel Rana ', '01913460858', 406),
(395, 4, 539, 'MD. Kamrul Islam', '01797253068', 407),
(396, 4, 540, 'Raquibul Hasan', '01717853122', 408),
(397, 6, 541, 'Md. Morad Hossain ', '01790643908', 409),
(398, 4, 542, 'MD. Zahidul ALam (Zahid)', '01714200170', 410),
(399, 6, 543, 'Md. Anisul Haque ', '01914232257', 411),
(400, 4, 544, 'Shohel Ahmed', '01924707451', 412),
(401, 4, 545, 'MD. Mazidul Islam', '01792033567', 413),
(402, 4, 546, 'MD. Rafiquel Islam', '01711024281', 414),
(403, 4, 547, 'Bikash Chandol Mandol', '01710953056', 415),
(404, 4, 548, 'Mainul Islam', '01711231608', 416),
(405, 4, 549, 'Hosin ferdour Shsir', '01715547187', 417),
(406, 6, 550, 'Md. Abu Naser Owahed ', '01708985800', 418),
(407, 4, 551, 'Yeasin Arafat', '01788650456', 419),
(408, 6, 552, 'Md. Mominul Islam ', '01712055348', 420),
(409, 4, 553, 'Sharif Golam Kawsar', '01712280733', 421),
(410, 6, 554, 'Md. Badol Hossen ', '01552335893', 422),
(411, 4, 555, 'Jakir Hossen', '01678022709', 423),
(412, 6, 556, 'Md. Soliman Ali ', '01729071789', 424),
(413, 6, 557, 'Md. Alamgir Hossain ', '01713093706', 425),
(414, 6, 558, 'Md. Selim ', '01731012669', 426),
(415, 6, 559, 'Md. Abjal Hosan ', '01948356096', 427),
(416, 6, 560, 'Sajedul Karim ', '01775053316', 428),
(417, 4, 561, 'MD. Roknuzzaman', '01819556485', 429),
(418, 4, 562, 'Abdul Sattar', '01881659416', 430),
(419, 4, 563, 'Elius Mia', '01711200450', 431),
(420, 4, 564, 'Zahid Kamal ', '01714920005', 432),
(421, 4, 565, 'Emon', '01785298242', 433),
(422, 4, 566, 'MD. Rezaul Karim ', '01914702746', 434),
(423, 4, 567, 'MD. Mosharaf Hossain Molla', '01711314000', 435),
(424, 4, 568, 'Abu Naser', '01711392359', 436),
(425, 4, 569, 'Kamruzaman ', '01843516484', 437),
(426, 4, 570, 'K.M Abul Kalam Azad', '01711136902', 438),
(427, 4, 571, 'MD. Fareq Hossain ', '01717346502', 439),
(428, 4, 572, 'Shalim Mullah', '01937261866', 440),
(429, 4, 573, 'S.M Fayzur Rahman', '01552381962', 441),
(430, 4, 574, 'Zahrul Islam ', '01741565333', 442),
(431, 4, 575, 'DR. MD. Mizanur Rahman ', '01711131492', 443),
(432, 4, 576, 'Nurul Alam ', '01681049205', 444),
(433, 4, 577, 'Akter Hossain ', '01741653087', 445),
(434, 4, 578, 'MD. Moslem Uddin Sarker', '01552342843', 446),
(435, 4, 579, 'Mojammal Haque', '01822954111', 447),
(436, 4, 580, 'MD. Mizanur Rahman ', '01848238827', 448),
(437, 4, 581, 'Ariful Islam ', '01718163085', 449),
(438, 4, 582, 'MD. Mohibur Rahman ', '01911232334', 450),
(439, 4, 583, 'MD. Mahabub Hasan', '01678062309', 451),
(440, 4, 584, 'KH. Mahfug Munzur (Monzur)', '01711476068', 452),
(441, 4, 585, 'MD. Abul Hashem', '01817584753', 453),
(442, 4, 586, 'MD. Raziul Karim', '01717250068', 454),
(443, 4, 587, 'Rafiqul Haque Shikder', '01778917571', 455),
(444, 4, 588, 'MD. Yiamin Ali', '01742969041', 456),
(445, 4, 589, 'MD. Nazrul Islam Shikder', '01716283386', 457),
(446, 6, 590, 'Md. Shahadat Hossain ', '01711022012', 458),
(447, 6, 591, 'Md. Monir Hossen ', '01991633355', 459),
(448, 6, 592, 'Md. Mijanur Rahaman ', '01764519860', 460),
(449, 6, 593, 'Syed Siddiqur Rahaman ', '01717039065', 461),
(450, 6, 594, 'Hamidul Islam ', '01679178961', 462),
(451, 6, 595, 'Md. Shajahan ', '01726020249', 463),
(452, 6, 596, 'Md. Ashraf Ali ', '01715024460', 464),
(453, 6, 597, 'Md.Abu Sayed ', '01953647080', 465),
(454, 6, 598, 'Late Md. Sadik Hossain ', '01929030882', 466),
(455, 6, 599, 'Md. Shah Alom ', '01882404398', 467),
(456, 6, 600, 'Mizanur Rahman ', '01733848806', 468),
(457, 6, 601, 'Md. Titu ', '01718304106', 469),
(458, 6, 602, 'Md. Mahfujur Rahman ', '01718957392', 470),
(459, 6, 603, 'Md. Shakhawat Ali ', '01816601412', 471),
(460, 6, 604, 'Md. Jasim Uddin ', 'Due ', 472),
(461, 6, 605, 'Md. Hafujur Sheikh ', '01929109053', 473),
(462, 6, 606, 'Shorab Hossen Shajada ', '01718811568', 474),
(463, 6, 607, 'Md. Alomgir Hosen', '01726880856', 475),
(464, 6, 608, 'T.M. Asafuddowla Rana ', '01755533431', 476),
(465, 6, 609, 'Musiur Rahman ', '01734861879', 477),
(466, 6, 610, 'Musiur Rahman ', '01734861879', 478),
(467, 6, 611, 'Md. Abul Kalam ', '01936557213', 479);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(1) DEFAULT 'M' COMMENT 'M=Morning, D=Dat',
  `Year` varchar(100) DEFAULT NULL,
  `Medium` char(1) DEFAULT 'B' COMMENT 'B=Bangla, E=English',
  `StudentName` varchar(50) DEFAULT NULL,
  `StudentCode` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `RollNo` varchar(20) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `PresentAddress` varchar(200) DEFAULT NULL,
  `PermanentAddress` text DEFAULT NULL,
  `FathersName` varchar(50) DEFAULT NULL,
  `FathersOccupation` varchar(100) DEFAULT NULL COMMENT 'TEACHER/STUDENT/GOVT.SERVICE/RETIRED/PRIVET SERVICE/POLITICIAN/ POLICE OFFICER/BUSINESS/AGRECULTURE/DAY LABORE/OTHERS',
  `FathersEmail` varchar(100) DEFAULT NULL,
  `MothersName` varchar(50) DEFAULT NULL,
  `MothersNumber` varchar(100) DEFAULT NULL,
  `MothersOccupation` varchar(100) DEFAULT NULL COMMENT 'TEACHER/STUDENT/GOVT.SERVICE/RETIRED/PRIVET SERVICE/POLITICIAN/ POLICE OFFICER/BUSINESS/AGRECULTURE/DAY LABORE/HOUSE WIFE/OTHERS',
  `ContactNumber` varchar(30) DEFAULT NULL,
  `HomeNumber` varchar(30) DEFAULT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `AdmissionDate` date DEFAULT NULL,
  `StudentStatus` char(1) DEFAULT 'A' COMMENT 'A=Active, C=Closed',
  `BloodGroup` varchar(100) DEFAULT NULL COMMENT 'UNKNOWN/A+/A-/B+/B-/O+/O-/AB+/AB-',
  `Religion` varchar(100) DEFAULT NULL COMMENT 'ISLAM/HINDU/KRISTIAN/BUDDHIST',
  `StudentPhoto` varchar(500) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `EmergencyName` varchar(100) DEFAULT NULL,
  `EmergencyNumber` varchar(100) DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `MonthlyWaiverAmount` decimal(10,2) DEFAULT 0.00,
  `PreviousCode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `BranchId`, `Shift`, `Year`, `Medium`, `StudentName`, `StudentCode`, `ClassId`, `SectionId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `FathersOccupation`, `FathersEmail`, `MothersName`, `MothersNumber`, `MothersOccupation`, `ContactNumber`, `HomeNumber`, `StudentEmail`, `Gender`, `AdmissionDate`, `StudentStatus`, `BloodGroup`, `Religion`, `StudentPhoto`, `EntryBy`, `EntryDate`, `EmergencyName`, `EmergencyNumber`, `Image`, `MonthlyWaiverAmount`, `PreviousCode`) VALUES
(154, 4, 'M', '2019-2020', 'B', 'Junayed Ahmed Ador', '001MB0302', 14, 21, '2', '2005-04-28', '764/1, Monipur, Mirpur-2, Dhhaka-1216', '', 'Hossen Ahmed Raton', 'Private Service', NULL, 'Mahamuda Mahabub Samiha', '01711006680', 'House Wife', '01713257941', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2018-12-09', '', '', NULL, '0.00', '0010302'),
(155, 4, 'D', '2019-2020', 'B', 'Md. Alif Hossain', '001DB1602', 15, 34, '2', '2004-04-15', '19/3 Kotbari Gabtoli Mirpur, Dhaka', '', 'Md. Salauddin Mintu', 'Business', NULL, 'Mafuza Begum', '01919404848', 'House Wife', '01817538430', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2018-12-09', '', '', NULL, '0.00', '0011602'),
(156, 4, 'M', '2019-2020', 'B', 'Irisha Salsabil Ifa', '001MB081901', 16, 37, '1', '2006-04-29', 'Towin One Villa, Mazar Road, Mirpur-1', '', 'Galib Yeashir', 'Private Service', NULL, 'Kanij Fatema', '01916842843', 'House Wife', '01814658328', NULL, '', 'F', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081901'),
(157, 4, 'M', '2019-2020', 'B', 'Tasnia Ebnat Sowbia', '001MB081902', 16, 37, '2', '2005-07-15', 'Monipur, Mirpur-2 Adoros Road 900 Dhaka-1216', '', 'Md. Habibur Rahman', 'Private Service', NULL, 'Razia Zinat', '01816600079', 'House Wife', '01816600080', NULL, '', 'F', '2018-11-01', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081902'),
(158, 4, 'M', '2019-2020', 'B', 'Rownak Afrin', '001MB081903', 16, 37, '3', '2018-12-12', 'Borobag, Mirpur-2 Dhaka', '', 'Md. Sayedur Rahman', 'Private Service', NULL, 'Farhana Monir Chowdhury', '01727217928', 'House Wife', '01727217928', NULL, '', 'F', '2018-12-10', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081903'),
(159, 4, 'M', '2019-2020', 'B', 'Nazmun Nahar Prity', '001MB081904', 16, 37, '4', '2007-01-15', '656/c Monipur, Mirpur-2 Dhaka-1216', '', 'Md. Nizamuddin', 'Private Service', NULL, 'Farida yesmin', '01712980229', 'House Wife', '01976210415', NULL, '', 'F', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081904'),
(160, 4, 'M', '2019-2020', 'B', 'Mahreen Jannat Mowri', '001MB081905', 16, 37, '5', '2007-01-30', '111/ B-2, Shah Ali Bag, lane-2 Mirpur-1 Dhaka-1216', '', 'Md. Abdul Maivivan', 'Private Service', NULL, 'Parvin Akter', '01712169157', 'House Wife', '01718771056', NULL, '', 'F', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081905'),
(161, 4, 'M', '2019-2020', 'B', 'Shubah Tasnim Soya', '001MB081906', 16, 37, '6', '2006-06-29', '664, Mollah Road Mirpur-2 Dhaka-1216', '', 'Rezual Karim', 'Private Service', NULL, 'Fahamed Afroj', '01766707020', 'House Wife', '01712755876', NULL, '', 'F', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081906'),
(162, 4, 'M', '2019-2020', 'B', 'Muslima Akter Tripti', '001MB081907', 16, 37, '7', '2006-03-23', '1/1/1 West Monipur, Borobagh Dhaka-1216', '', 'Md. Mazedul Islam', 'Private Service', NULL, 'Afroza Begum', '01750536922', 'House Wife', '01750536922', NULL, '', 'F', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081907'),
(163, 4, 'M', '2019-2020', 'B', 'Masruba Mahnaz', '001MB081908', 16, 37, '8', '2005-04-16', 'Maghna Tower Flat No c-3 House No-53/1 Borobag Mirpur -2 Dhaka', '', 'Md. Abdullah Al Mamun', 'Private Service', NULL, 'Umme Hasna', '01685183625', 'House Wife', '01674628237', NULL, '', 'F', '2018-11-29', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081908'),
(164, 4, 'M', '2019-2020', 'B', 'Sadia Hossain', '001MB081909', 16, 37, '9', '2006-01-04', 'Perarbas, Jilpur, Mirpur', '', 'Rokib Hossain', 'Private Service', NULL, 'Reba Hossain', '017327722117', 'House Wife', '01732772217', NULL, '', 'F', '2018-11-14', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081909'),
(165, 4, 'M', '2019-2020', 'B', 'Tabassum Rahman Tisha', '001MB081910', 16, 37, '10', '2005-11-20', '782 West Kazipara, Mirpur Dhaka', '', 'Md. Khalilur Rahman', 'Private Service', NULL, 'Rokeya Akter', '01922897556', 'House Wife', '01922897556', NULL, '', 'F', '2018-11-13', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081910'),
(166, 4, 'M', '2019-2020', 'B', 'Priyanka Bose Pinke', '001MB081911', 16, 37, '11', '2004-10-08', '78/3, Borobag, Mirpur-2', '', 'Sosanto Boshu', 'Private Service', NULL, 'Ritu Bosu', '01924730477', 'House Wife', '01924730477', NULL, '', 'F', '2018-11-12', 'A', 'Unknown', 'Hindu', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081911'),
(167, 4, 'M', '2019-2020', 'B', 'Maisha Lamin Khan Boishakhi', '001MB081912', 16, 37, '12', '2006-04-14', '141/senpara parbota Mirpur-10  Dhaka-1216', '', 'Md. Aminur Rahman Khan', 'Business', NULL, 'Nargis Parvin Rupa', '01923344139', 'House Wife', '01923344139', NULL, '', 'F', '2018-11-10', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081912'),
(168, 4, 'M', '2019-2020', 'B', 'Sheikh Marisa Hossain', '001MB081913', 16, 37, '13', '2005-09-19', 'Monipur, Mirpur -2 Adorso Road, Dhaka-1216', '', 'Md. Anwar Hossain', 'Others', NULL, 'Zinia Sultana (let)', '01711877521', 'Others', '01715039739', NULL, '', 'F', '2018-11-08', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081913'),
(169, 4, 'M', '2019-2020', 'B', 'Jawata Afrana Rupanti', '001MB081914', 16, 37, '14', '2005-10-10', '1085/1 Madhua Apartment East Monipur, Mirpur-10 Dhaka-1216', '', 'Md. Zakir Hossain', 'Private Service', NULL, 'Jahanara Ranu', '01780186107', 'House Wife', '01712128991', NULL, '', 'F', '2018-11-07', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081914'),
(170, 4, 'M', '2019-2020', 'B', 'Anisha Azad Katha', '001MB081915', 16, 37, '15', '2006-12-15', '1049 West Monipur Mirpur-2 Dhaka', '', 'Abul Kalam Azad', 'Private Service', NULL, 'Mansura ', '01733173284', 'House Wife', '01733173284', NULL, '', 'F', '2018-11-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-10', '', '', NULL, '0.00', '001081915'),
(171, 4, 'M', '2019-2020', 'B', 'Sumaya Ahmad Sinthe', '001MB081916', 16, 37, '16', '2006-05-27', 'H# 345/1 Ahmad Nagor Paikpara Mirpur-1 Dhaka', '', 'Selim Ahmed', 'Business', NULL, 'Sahanara Begum', '01723220500', 'House Wife', '01819945399', NULL, '', 'F', '2018-11-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081916'),
(172, 4, 'M', '2019-2020', 'B', 'Labiba Islam', '001MB081917', 16, 37, '17', '2006-08-31', '247/3A Ahmad Nagor Paikpara Mirpur-1 Dhaka', '', 'Saidul Islam', 'Business', NULL, 'Laki Islam', '01816680181', 'House Wife', '01819202492', NULL, '', 'F', '2018-11-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081917'),
(173, 4, 'M', '2019-2020', 'B', 'Fabiha Bushra Takya', '001MB081918', 16, 37, '18', '2006-03-30', '64/3, Paikpara, govt coloni Mirpur-1 Dhaka-1216', '', 'Mahumudul Hasan', 'Private Service', NULL, 'Mukta', '01740801922', 'House Wife', '01718334559', NULL, '', 'F', '2018-11-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081918'),
(174, 4, 'M', '2019-2020', 'B', 'Mir Mashrika Roza', '001MB081919', 16, 37, '19', '2006-12-18', '130/3-A, Jonakiroad, Ahmednagar, Mirpur-1 Dhaka', '', 'Mir Monowar Hossain', 'Business', NULL, 'Nasrin Nahar', '01911117726', 'House Wife', '01711939089', NULL, '', 'F', '2018-11-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081919'),
(175, 4, 'M', '2019-2020', 'B', 'Nafisha Binte Masud Preonty', '001MB081920', 16, 37, '20', '2006-11-18', '210/1 Ahmad Nagor mirpur-1 Dhaka-1216', '', 'Munshi Masud Hossen', 'Private Service', NULL, 'Ruksana Parvin', '01819169233', 'House Wife', '01929993008', NULL, '', 'F', '2018-11-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081920'),
(176, 4, 'M', '2019-2020', 'B', 'Jesia Jannat ', '001MB081921', 16, 37, '21', '2005-10-13', '900 Adorsho Road, Mirpur-2 Monipur Dhaka-1216', '', 'Md.Jalal Uddin', 'Private Service', NULL, 'Mahfuza Akter Rina', '01741692264', 'House Wife', '01741692264', NULL, '', 'F', '2018-11-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001081921'),
(177, 4, 'M', '2019-2020', 'B', 'Razna Mahiat', '001MB082001', 16, 38, '1', '2004-12-29', '333/1-A Ahmed Nagor, Paikpara Mirpur-1 Dhaka', '', 'Md. Abdul Halim', 'Private Service', NULL, 'Mrs. Moluda Khatun', '01935470473', 'House Wife', '01818095700', NULL, '', 'F', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082001'),
(178, 4, 'M', '2019-2020', 'B', 'Tanjia Sultana', '001MB082002', 16, 38, '2', '2005-11-13', 'House No-840, Mid Monipur Mirpur -2 Dhaka', '', 'Anamul Haq Mollah', 'Private Service', NULL, 'Arifa Sultana', '01912918077', 'House Wife', '01714340144', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082002'),
(179, 4, 'M', '2019-2020', 'B', 'Tasnim Rahman', '001MB082003', 16, 38, '3', '2005-03-12', '772/1 Monipur Mirpur Dhaka', '', 'Mizanur Rahman', 'Business', NULL, 'Masuma Akter', '01966185352', 'House Wife', '01814097490', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082003'),
(180, 4, 'M', '2019-2020', 'B', 'Jarin Tasnim', '001MB082004', 16, 38, '4', '2005-05-01', 'H#57 Brobag Mirpur-2 Dhaka', '', 'Md. Kamal Parvase', 'Private Service', NULL, 'Tonuja Khanom', '01716940675', 'House Wife', '01713148520', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082004'),
(181, 4, 'M', '2019-2020', 'B', 'Rehnuma Tasneem', '001MB082005', 16, 38, '5', '2005-10-21', '971/1 East Monipur, Mirpur', '', 'MD. Abul Khaer', 'Private Service', NULL, 'Fatema Tuj Johura', '01720513592', 'House Wife', '01720513592', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082005'),
(182, 4, 'M', '2019-2020', 'B', 'Jarin Tasnim Othoi', '001MB082006', 16, 38, '6', '2005-10-10', '30, Popular Housing-1 Borobag, Mirpur-2', '', 'Tariqul Islam', 'Private Service', NULL, 'Khadija Akter', '01731516169', 'House Wife', '01730083684', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082006'),
(183, 4, 'M', '2019-2020', 'B', 'Tasnim Tabassum Hrid', '001MB082007', 16, 38, '7', '2007-01-18', '999 East Monipur Mirpur-2 Dhaka-1216', '', 'Dr.Md Khalid Jamil', 'Private Service', NULL, 'Israt Jahan', '01720110514', 'House Wife', '01720110514', NULL, '', 'F', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082007'),
(184, 4, 'M', '2019-2020', 'B', 'Anjuman Amin Athoy', '001MB082008', 16, 38, '8', '2006-01-13', '15/1 Ahmmad Nagor Mirpur-1 Dhaka-1216', '', 'late, Aminul Islam', 'Others', NULL, 'Shamima', '01919868457', 'House Wife', '01919868457', NULL, '', 'F', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082008'),
(185, 4, 'M', '2019-2020', 'B', 'Tabassum Maria', '001MB082009', 16, 38, '9', '2006-02-14', 'House-44, Sc-6 Abemau-5 Mirpur', '', 'MD. Nur Nobi', 'Private Service', NULL, 'Tahmina Akter', '01961817877', 'House Wife', '01961817877', NULL, '', 'F', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082009'),
(186, 4, 'M', '2019-2020', 'B', 'Shams Hasin Hoque Esha', '001MB082010', 16, 38, '10', '2006-09-22', '6/A Mirpur-6 Dhaka-1216', '', 'Md. Ehtesham ul- Haque', 'Private Service', NULL, 'Hasina Begum', '01921099698', 'House Wife', '01711530855', NULL, '', 'M', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082010'),
(187, 4, 'M', '2019-2020', 'B', 'Anchol Sharma', '001MB082011', 16, 38, '11', '2006-03-01', '16/1/2 Tolarbag Mirpur-1 Dhaka', '', 'Kalipodo Sharma', 'Private Service', NULL, 'Smriti Kona Sharma', '01780172784', 'House Wife', '01780172784', NULL, '', 'F', '2018-12-06', 'A', 'Unknown', 'Hindu', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082011'),
(188, 4, 'M', '2019-2020', 'B', 'Rahnuma Islam', '001MB082012', 16, 38, '12', '2006-08-27', '3/7 North Prierbag Mirpur-1 Dhaka', '', 'Mounzurul Islam', 'Private Service', NULL, 'Kamrunnher', '01915529129', 'House Wife', '01922554352', NULL, '', 'F', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082012'),
(189, 4, 'M', '2019-2020', 'B', 'Taibanur Razzak', '001MB082013', 16, 38, '13', '2004-06-06', '30/A Ahmed Nagor Jonaki Road Monipur, Mirpur Dhaka-1216', '', 'Hanif MD. Sofrur Razzak', 'Business', NULL, 'Taslima Khatun', '018339131422', 'House Wife', '01626530604', NULL, '', 'F', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082013'),
(190, 4, 'M', '2019-2020', 'B', 'Farhan Sadik SAjim', '001MB082101', 16, 39, '1', '2004-03-13', 'B-541 3rd coleny Mazar Road Dhaka-1216', '', 'Imrul Kayes', 'Business', NULL, 'Nazma Akter', '01775548897', 'House Wife', '01678592203', NULL, '', 'M', '2018-11-13', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082101'),
(191, 4, 'M', '2019-2020', 'B', 'Farhan Sadman ur Rafiq', '001MB082102', 16, 39, '2', '2005-11-08', '183/3, 2nd colon, Dhaka', '', 'Rafiqul Islam', 'Business', NULL, 'Farhana Haque', '01711077090', 'House Wife', '01714049531', NULL, '', 'M', '2018-11-13', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082102'),
(192, 4, 'M', '2019-2020', 'B', 'Md. Ravidhul Islam Ratul', '001MB082103', 16, 39, '3', '2006-07-01', '452/2 South Monipur Mirpur Dhaka-1216', '', 'Md. Rafiquel Islam', 'Business', NULL, 'Mrs. Farhana Rume', '01937595499', 'House Wife', '01717094845', NULL, '', 'M', '2018-11-07', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082103'),
(193, 4, 'M', '2019-2020', 'B', 'Shahib Ahamed', '001MB082104', 16, 39, '4', '2006-03-24', '104 Glolartag Mirpur-1 Dhaka', '', 'Mizanur Rahman ', 'Business', NULL, 'Soneya Parvin', '01710828997', 'House Wife', '01917406622', NULL, '', 'M', '2018-11-28', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082104'),
(194, 4, 'M', '2019-2020', 'B', 'Sabiha Chowdhury Mithi', '001MB082014', 16, 38, '14', '2006-04-18', '25/2 Borobag Mirpur-2 Dhaka- 1216', '', 'Mir Hossain Chowdhury', 'Private Service', NULL, 'Nasima Akther', '01726737072, 01731101413', 'House Wife', '01715030477', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082014'),
(195, 4, 'M', '2019-2020', 'B', 'Jarin Nafisa Rahman', '001MB082015', 16, 38, '15', '2006-09-22', 'H# 17/1/1 Tolarbag Mirpur-1, Dhaka-1216', '', 'Sadiqur Rahman', 'Private Service', NULL, 'Shamima Sultana', '01720676678', 'House Wife', '01819128893', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082015'),
(196, 4, 'M', '2019-2020', 'B', 'Shefa Rahman', '001MB082016', 16, 38, '16', '2006-04-09', '843/1 Middle Monipur , Mirpur -2 Dhaka-1216', '', 'S.M Shafikur Rahman', 'Private Service', NULL, 'Shahina Afroz', '01916843047', 'House Wife', '01715734554', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082016'),
(197, 4, 'M', '2019-2020', 'B', 'Nusrat Jahan', '001MB082017', 16, 38, '17', '2005-12-17', '333/1 South Monopur Mirpur-1', '', 'MD. Tariqul Islam', 'Private Service', NULL, 'Mss.Shamima Nassrine ', '01716779575', 'Teacher', '01913391721', NULL, '', 'F', '2018-12-10', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082017'),
(198, 4, 'M', '2019-2020', 'B', 'Sumaiya Islam', '001MB082201', 16, 40, '1', '2004-10-24', 'Brobasi, Aminbazar, Savar', '', 'Saiful Islam', 'Private Service', NULL, 'Sonia Islam', '01732679880', 'House Wife', '01712603625', NULL, '', 'F', '2018-12-17', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082201'),
(199, 4, 'M', '2019-2020', 'B', 'Maisha Mushrat Muskan', '001MB082018', 16, 38, '18', '2005-11-20', 'Amin Bazar, Savar', '', 'lets Khundaqur Mosharraf', 'Others', NULL, 'Rabea Begum', '01682848907', 'House Wife', '01682848907', NULL, '', 'F', '2018-12-17', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082018'),
(200, 4, 'M', '2019-2020', 'B', 'Rahik Jahin Deha', '001MB082019', 16, 38, '19', '2006-03-03', '763/5 Monipur, Mirpur', '', 'Kazi Giash uddin ', 'Business', NULL, 'Ruma Akter Kanon', '01746222786', 'Teacher', '01680306572', NULL, '', 'F', '2018-12-17', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082019'),
(201, 4, 'M', '2019-2020', 'B', 'Fahima Afroj Jahin', '001MB082020', 16, 38, '20', '2004-03-18', '160/4/A Middl Piek para (Bau Bazar) Mirpur-1 Dhaka-1216', '', 'Abul Hayath Md.. Kamruzzaman', 'Private Service', NULL, 'Zakia Parvin', '01911702650', 'House Wife', '01912716921', NULL, '', 'F', '2018-12-17', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-18', '', '', NULL, '0.00', '001082020'),
(202, 4, 'D', '2019-2020', 'B', 'Sabbir Hossain Saim', '001DB050501', 39, 75, '1', '2009-07-21', 'Block/D Road 23, House-29, Mirpur-6 Dhaka-1216', '', 'Md. Abul Kashem', 'Business', NULL, 'Doly Akter', '01687269033', 'House Wife', '01717037870', NULL, '', 'M', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050501'),
(203, 4, 'D', '2019-2020', 'B', 'Aritra Debnath', '001DB050502', 39, 75, '2', '2009-12-05', '62/8 Paikpara Gov.Staf Quater Mirpur-1, Dhaka', '', 'Asit Kumar Debnath', 'Private Service', NULL, 'Gouri Biswas', '01784396349', 'Govt Service', '01716479053', NULL, '', 'M', '2018-11-18', 'A', 'Unknown', 'Hindu', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050502'),
(204, 4, 'D', '2019-2020', 'B', 'Shuvro Chowdhury', '001DB050503', 39, 75, '3', '2009-01-15', '#497 South Monipur, Mirpur-2 Dhaka', '', 'Narayan Das', 'Private Service', NULL, 'Mukti Chowdhury', '01911209543', 'Private Service', '01911487320', NULL, '', 'M', '2018-11-18', 'A', 'Unknown', 'Hindu', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050503'),
(205, 4, 'D', '2019-2020', 'B', 'Farhan Easir Tarif', '001DB050504', 39, 75, '4', '2008-09-26', 'C/o- Khandaker Moshrauf Hossan, 363/1, south monipur Mirpur-2 Dhaka ', '', 'MD. Liakat Ali', 'Private Service', NULL, 'Mehebuba basar Tandra', '01818763717', 'House Wife', '01715407907', NULL, '', 'M', '2018-12-01', 'A', 'Unknown', 'Islam', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050504'),
(206, 4, 'D', '2019-2020', 'B', 'K.M. Nuruzaman Nabil', '001DB050505', 39, 75, '5', '2009-10-05', '18/3, Borobug, Mirpur-2 Dhaka-1216', '', 'K.M. Abul Kalam Azad', 'Private Service', NULL, 'Nahar Khatun', '01923342672', 'Private Service', '01711136902', NULL, '', 'M', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050505'),
(207, 4, 'D', '2019-2020', 'B', 'Shafayat Ishraq', '001DB050506', 39, 75, '6', '2008-11-18', 'H#857 Monipur, Mirpur-2 Dhaka-1216', '', 'Golam Saroar', 'Business', NULL, 'Sarmin Akter', '01718648292', 'House Wife', '01711577455', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 69, '2018-12-24', '', '', NULL, '0.00', '001050506'),
(208, 4, 'M', '2019-2020', 'B', 'Oikkya Banargee', '001MB082105', 16, 39, '5', '2004-11-24', '1020 East Monipur, Mirpur-2 Dhaka', '', 'Billiam Banarge', 'Business', NULL, 'Latifa Khatun', '01916843118', 'Private Service', '01676041213', NULL, '', 'F', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '001082105'),
(209, 4, 'M', '2019-2020', 'B', 'Asnin Zaaman Anha', '001MB081922', 16, 37, '22', '2006-11-14', 'H# 742/6 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Anisur Zaman', 'Private Service', NULL, 'Sabina Yesmin', '01733255684', 'House Wife', '01733255685', NULL, '', 'F', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '001081922'),
(210, 4, 'M', '2019-2020', 'B', 'Fatema Akter Maisha', '001MB082021', 16, 38, '21', '2006-10-17', '100/A Borobag Mirpur-2 Dhaka-1216', '', 'Monayem Khan', 'Business', NULL, 'Masuda Begum', '01742396721', 'House Wife', '01740974326', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '001082021'),
(211, 4, 'M', '2019-2020', 'B', 'Sharaf Zabin Aritri', '001MB082022', 16, 38, '22', '2006-06-11', 'House No-1/9, Borobag Mirpur-2', '', 'Abdul Hye', 'Private Service', NULL, 'Israt Jahan', '01765972608', 'House Wife', '01717382184', NULL, '', 'F', '2018-12-18', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '001082022'),
(212, 4, 'M', '2019-2020', 'B', 'Tahia Haque', '001MB082023', 16, 38, '23', '2006-03-29', '461 South Monipur, Mirpur-2 Dhaka-1216', '', 'Kharul Bashar', 'Private Service', NULL, 'Monara Hoque', '01715529665, 01625677168', 'Business', '01715529665, 01625677168', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '001082023'),
(213, 4, 'M', '2019-2020', 'B', 'Marzia Akter Mim', '001MB0505201', 39, 77, '1', '2008-07-14', 'H# 2/2/2 Tolarbag Mirpur-1 Dhaka-1216', '', 'Abdur Satter', 'Private Service', NULL, 'Sabrina Akter', '01718181848', 'House Wife', '01869233572', NULL, '', 'F', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505201'),
(214, 4, 'M', '2019-2020', 'B', 'Mst. Marzia Karim Ruba', '001MB0505202', 39, 77, '2', '2008-12-30', 'House No-41 Road No-5 Black-E Pallabi Mirpur-12 Dhaka -1216', '', 'MD. Rezaul Karim', 'Private Service', NULL, 'Mst. Selina Khatun', '01632330238', 'Private Service', '01684328636', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505202'),
(215, 4, 'M', '2019-2020', 'B', 'Jannatul Ferdous Ahona', '001MB0505203', 39, 77, '3', '2008-03-31', 'H# 117/1 East Ahmad Nagar Mirpur-1 Dhaka-1216', '', 'MD. Kamal Hossan', 'Private Service', NULL, 'Sonia Kamal', '01717415621', 'House Wife', '01716281100', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505203'),
(216, 4, 'D', '2019-2020', 'B', 'Sania Islam Protiva', '001DB0505101', 39, 76, '1', '2008-04-13', '798 Monipur, Mirpur-2 Dhaka.', '', 'MD. Farid Hossain Militon', 'Business', NULL, 'Moni Afroz', '01972013367', 'House Wife', '01972013367', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505101'),
(217, 4, 'D', '2019-2020', 'B', 'Sadia Islam Borsha', '001DB0505102', 39, 76, '2', '2008-08-31', 'H-617 Middle Monipur, Mirpur-2 Dhaka-1216', '', 'Kh. MD. Sohidul Islam', 'Business', NULL, 'Beauty Begum', '01670309108', 'House Wife', '01758926683', NULL, '', 'F', '2018-11-10', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505102'),
(218, 4, 'D', '2019-2020', 'B', 'Farah Anjum', '001DB0505103', 39, 76, '3', '2009-11-04', '173/5 West Argoan Shapla housing Dhaka-1207', '', 'DR, MD. Mizanur Rahman ', 'Private Service', NULL, 'DR. Ferdousi Begum', '01746644043', 'Private Service', '017111131492', NULL, '', 'F', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505103'),
(219, 4, 'M', '2019-2020', 'B', 'Sumaiya Arobi Knan', '001MB0505401', 39, 79, '1', '2009-07-10', '141, Senpara Porbata Mirpur-10 Dhaka-1216', '', 'Md. Aminur Rahman Khan', 'Business', NULL, 'Nargis Parvin', '01923344139', 'House Wife', '016833301130', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505401'),
(220, 4, 'M', '2019-2020', 'B', 'Fardatul Rikza Toyo', '001MB0505402', 39, 79, '2', '2008-11-23', '482/4 East Monipur, Mirpur, Dhaka', '', 'Faruk Ahamed Monir', 'Private Service', NULL, 'Hafcha Akter Shirin', '01914838135', 'House Wife', '01729161400', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505402'),
(221, 4, 'M', '2019-2020', 'B', 'Tasfia Boni', '001MB0505403', 39, 79, '3', '2009-03-21', '15/A pirarbag Mirpur-2 Dhaka-1216', '', 'H.M Aslim', 'Govt Service', NULL, 'Najma Akter', '01677830214', 'Govt Service', '01730965953', NULL, '', 'F', '2018-11-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505403'),
(222, 4, 'M', '2019-2020', 'B', 'Labiba Nurain', '001MB0505404', 39, 79, '4', '2008-03-20', '61/2 Jonika Road Mirpur-1 Dhaka', '', 'Razibul Hasan', 'Private Service', NULL, 'Ferdousihi Sultana', '01718238897', 'House Wife', '01718238897', NULL, '', 'F', '2018-12-01', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505404'),
(223, 4, 'M', '2019-2020', 'B', 'Tanjila Tisha', '001MB0505405', 39, 79, '5', '2007-09-24', 'H F/2 NasimbG Mirpur-2 Dhaka-1216', '', 'MD. Mabin', 'Govt Service', NULL, 'Ratna', '017114574175', 'House Wife', '01711204502', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505405'),
(224, 4, 'M', '2019-2020', 'B', 'Zerin Sanja', '001MB0505406', 39, 79, '6', '2009-08-03', '43 Boronag Mirpur, Mirpur-2', '', 'MD. Salim Reza', 'Private Service', NULL, 'Jubaida Reza', '01912658983', 'House Wife', '01712221303', NULL, '', 'F', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505406'),
(225, 4, 'M', '2019-2020', 'B', 'Sadia Akter', '001MB0505407', 39, 79, '7', '2008-09-08', '55/1/3 H-9 C South Prierbag Mirpur-1 Dhaka-1216', '', 'Saiful islam', 'Govt Service', NULL, 'Shanaj Parvin', '01840979449', 'House Wife', '01822825308', NULL, '', 'F', '2018-12-13', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505407'),
(226, 4, 'M', '2019-2020', 'B', 'Zara Reza Shrestha ', '001MB0505408', 39, 79, '8', '2009-01-01', '27/6/A North Pirerbag Mirpur Dhaja-1216', '', 'A. K.M Hasan Reza', 'Private Service', NULL, 'Mahmuda Parvin Mitul', '017163033388', 'House Wife', '01716620698', NULL, '', 'F', '2018-12-01', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505408'),
(227, 4, 'M', '2019-2020', 'B', 'Shara Rahman', '001MB0505409', 39, 79, '9', '2009-09-03', '492/1 Monipur Mirpur-2 Dhaka-1216', '', 'MD. Mohibur Rahman', 'Private Service', NULL, 'Fatema Khatun', '01552372095', 'House Wife', '01911232334', NULL, '', 'F', '2018-12-01', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505409'),
(228, 4, 'M', '2019-2020', 'B', 'Tanha Islam Tura', '001MB0505410', 39, 79, '10', '2008-12-22', '47/3 Shah Alibag Mirpur-1 Dhaka-1216', '', 'Tajul Islam', 'Private Service', NULL, 'Morium Akter', '01715111750', 'House Wife', '01715111750', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505410'),
(229, 4, 'M', '2019-2020', 'B', 'Joyeta Afnan Prionti', '001MB0505411', 39, 79, '11', '2008-07-20', '1085/1 East Monipur Mirpur-10', '', 'MD. Zakir Hossain', 'Private Service', NULL, 'Jahanara Ranu', '01780186107', 'House Wife', '01712128991', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505411'),
(230, 4, 'M', '2019-2020', 'B', 'Sanjida Yesmin Orni', '001MB0505412', 39, 79, '12', '2007-10-15', '683/1 Molla Road Monipur, Mirpur-1 Dhaka-1216', '', 'Shahjahan Ali', 'Private Service', NULL, 'Shaley', '01794586883', 'House Wife', '01731945252', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505412'),
(231, 4, 'M', '2019-2020', 'B', 'Noshin Sharmili', '001MB0505413', 39, 79, '13', '2008-09-18', 'Monipur, Mirpur-2 763/10 Dhaka-1216', '', 'Khan Mahbub Shohel', 'Private Service', NULL, 'Khaleda Bagum', '01714686047', 'House Wife', '01714686047', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505413'),
(232, 4, 'M', '2019-2020', 'B', 'Fabiha Islam Raisha', '001MB0505414', 39, 79, '14', '2007-12-02', '452/2 East Sheyrapara washa road Mirpur Dhaka', '', 'Md. Rafiquel Islam', 'Private Service', NULL, 'Mrs. Farhana Rume', '01937595499', 'House Wife', '01715094845', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505414'),
(233, 4, 'M', '2019-2020', 'B', 'Samin Mahbub Athio', '001MB0505415', 39, 79, '15', '2007-09-09', '42/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Mahbub Hasan', 'Private Service', NULL, 'Fatima Akter', '01712522561', 'House Wife', '01678062309', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505415'),
(234, 4, 'M', '2019-2020', 'B', 'Tasfia Sultana', '001MB0505416', 39, 79, '16', '2009-06-22', '3/5/C North Pererbag Mirpur-2 Dhaka', '', 'Lutfor Rahman khan', 'Business', NULL, 'Armin Sultana', '01951669045', 'House Wife', '01957794952', NULL, '', 'F', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505416'),
(235, 4, 'M', '2019-2020', 'B', 'Muhai Minur Rashid', '001MB0505301', 39, 78, '1', '2008-10-22', '720 East Kazipara Mirpur-10 Dhaka-1', '', 'Hemyet Hossen', 'Private Service', NULL, 'Rehana Parvin', '01710923624', 'House Wife', '01712297000', NULL, '', 'M', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505301'),
(236, 4, 'M', '2019-2020', 'B', 'Mohammad Zafar Bin Jahir', '001MB0505302', 39, 78, '2', '2009-09-27', '311 North Monipur Mirpur-2 Dhaka', '', 'Jahirul Hoque', 'Govt Service', NULL, 'Nayeema Akter', '01748196952', 'Private Service', '01712123676', NULL, '', 'M', '2018-12-06', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505302'),
(237, 4, 'M', '2019-2020', 'B', 'Farhan Tanvir Mahi', '001MB0505303', 39, 78, '3', '2009-04-12', '30 Popular Housing-1 Borobag Mirpur-2 Dhaka-1216', '', 'Tariqul Islam', 'Private Service', NULL, 'Khadija Akter', '01731516169', 'House Wife', '01730083684', NULL, '', 'M', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505303'),
(238, 4, 'M', '2019-2020', 'B', 'Abid Ali', '001MB0505304', 39, 78, '4', '2007-12-13', '899/1 AdssoRoad, Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Azar Ali', 'Private Service', NULL, 'Khadeza Akter', '01726595732', 'House Wife', '01726595732', NULL, '', 'M', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505304'),
(239, 4, 'M', '2019-2020', 'B', 'MA. Talha', '001MB0505305', 39, 78, '5', '2009-04-01', 'H# 57 Brobag Mirpur-2 Dhaka', '', 'Md. Kamal Parvase', 'Private Service', NULL, 'Tonuja Khanom', '01716940675', 'House Wife', '01713148520', NULL, '', 'M', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 16, '2018-12-24', '', '', NULL, '0.00', '0010505305'),
(240, 4, 'D', '2019-2020', 'B', 'Zunayedul Islam', '001DB071603', 15, 34, '3', '2005-12-04', 'H# 1/9 Borobag Mirpur-2 Dhaka-1216', '', 'Samsul Islam', 'Others', NULL, 'Laila Sultana', '01798515959', 'House Wife', '01798515959', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071603'),
(241, 4, 'D', '2019-2020', 'B', 'Rishov Robidas Polock', '001DB071604', 15, 34, '4', '2006-09-26', 'H# 7/10 Brobag, Mirpur-2 Dhaka-1216', '', 'Jebon Robi Das', 'Private Service', NULL, 'Shilpe Rani Robi Dash', '019258190477', 'House Wife', '01917705690', NULL, '', 'M', '2018-12-10', 'A', 'Unknown', 'Hindu', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071604'),
(242, 4, 'D', '2019-2020', 'B', 'Azahrul Islam Siam', '001DB092501', 17, 43, '1', '2003-11-23', 'H# 125/A North Prearbag Mirpur-1 Dhaka-1216', '', 'Zahrul Islam', 'Business', NULL, 'Asma Begum', '01786280419', 'House Wife', '01741565333', NULL, '', 'M', '2018-12-10', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001092501'),
(243, 4, 'M', '2019-2020', 'B', 'Sharaf Zabin Aritri', '001MB082024', 16, 38, '24', '2006-06-11', 'House No-1/9, Borobag, Mirpur-2', '', 'Abdul Hye', 'Private Service', NULL, 'Israt Jahan', '01765972608', 'House Wife', '01717382184', NULL, '', 'F', '2018-12-18', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082024'),
(244, 4, 'M', '2019-2020', 'B', 'Fatema Akter Maisha', '001MB082025', 16, 38, '25', '2006-10-17', '100/A Borobag Mirpur-2 Dhaka-1216', '', 'Monayem Khan', 'Business', NULL, 'Masuda Begum', '01742396721', 'House Wife', '017740974326', NULL, '', 'M', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082025'),
(245, 4, 'D', '2019-2020', 'B', 'Safat Kibriya', '001DB071605', 15, 34, '5', '2006-12-10', 'H-10, R-11 Block-H Mirpur-2', '', 'S.Kibriya', 'Private Service', NULL, 'Nina', '01718333093', 'House Wife', '01716127527', NULL, '', 'M', '2018-01-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071605'),
(246, 4, 'M', '2019-2020', 'B', 'Tahia Hoque', '001MB082026', 16, 38, '26', '2006-03-29', '461 South Monipur, Mirpur-2 Dhaka-1216', '', 'Kharul Bashar', 'Others', NULL, 'Monara Hoque', '01715529665', 'Business', '01625677168', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082026'),
(247, 4, 'D', '2019-2020', 'B', 'Maliha Akhtar', '001DB071401', 15, 32, '1', '2007-05-02', '742 West Kazipara, Monipur Mirpur Dhaka-1216', '', 'Mahumudul Hasan Shaikh', 'Business', NULL, 'Dilruba Akhtar', '01714246751', 'Govt Service', '01715199159', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071401'),
(248, 4, 'M', '2019-2020', 'B', 'Anika Tasnia Karim', '001MB071001', 15, 28, '1', '2004-06-18', '1025 Katal Tala Mirpur-2 Dhaka-1216', '', 'MD. Fazlul Karim', 'Private Service', NULL, 'Farhana Jesmin', '01787776605', 'House Wife', '01742255344', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071001'),
(249, 4, 'M', '2019-2020', 'B', 'Oikkya Banargee', '001MB082106', 16, 39, '6', '2004-11-24', '1030 East Monipur Mirpur-2 Dhaka', '', 'Billiam Banarge', 'Business', NULL, 'Latifa Khatun', '01916843118', 'Private Service', '01676041213', NULL, '', 'F', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082106'),
(250, 4, 'M', '2019-2020', 'B', 'Asnin Zaaman Anha', '001MB081923', 16, 37, '23', '2006-11-14', 'H# 742/6 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Anisur Zaman', 'Private Service', NULL, 'Sabina Yesmin', '01733255684', 'House Wife', '01733255685', NULL, '', 'F', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001081923'),
(251, 4, 'D', '2019-2020', 'B', 'Humayra Akhtar Mim', '001DB060501', 14, 23, '1', '2008-10-10', '620 Monipur Mirpur Dhaka-1216', '', 'Atikur Rahman', 'Teacher', NULL, 'Jubedu Akhtar Rina', '01733739962', 'House Wife', '01754041055', NULL, '', 'F', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060501'),
(252, 4, 'M', '2019-2020', 'B', 'Tasneem Amna Majid', '001MB071002', 15, 28, '2', '2007-07-30', '99/1 Ahmed nagar Mirpur-1', '', 'Rafiqul Majid', 'Business', NULL, 'Ferdousihi Majid', '01913518377', 'House Wife', '01713030572', NULL, '', 'F', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071002'),
(253, 4, 'M', '2019-2020', 'B', 'Yeas Ebon', '001MB082107', 16, 39, '7', '2005-05-01', '57 Brobag Mirpur-2 Dhaka-1216', '', 'Shihab Hossain', 'Private Service', NULL, 'Mouslime Atair', '01869706714', 'House Wife', '01552358070', NULL, '', 'M', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082107'),
(254, 4, 'M', '2019-2020', 'B', 'Samin Ibnea Zaman', '001MB060303', 14, 21, '3', '2008-06-23', 'H# 67/3 Shahinpukur Mirpur-2 Dhaka-1216', '', 'MD. Kamruzzaman', 'Private Service', NULL, 'Masuda Sultana', '01819208080', 'House Wife', '01711603676', NULL, '', 'F', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060303'),
(255, 4, 'M', '2019-2020', 'B', 'Sheikh Nafisa Nawar', '001MB071003', 15, 28, '3', '2008-08-01', '333/1 A/2 Akota Road Ahmad Nagor Paikpara Mirpur', '', 'Sheikh Masbah Uddin ', 'Private Service', NULL, 'Kamrun Nahar', '01816496827', 'House Wife', '01711019374', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071003'),
(256, 4, 'M', '2019-2020', 'B', 'Samiya Sultana Sara', '001MB071004', 15, 28, '4', '2006-05-27', '894 Middle Monipur Mirpur Dhaka-1216', '', 'MD. Shah Alam Patwary', 'Business', NULL, 'Aysha Akther', '01815601609', 'House Wife', '01812775061', NULL, '', 'F', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071004'),
(257, 4, 'M', '2019-2020', 'B', 'Minahazul  Islam', '001MB082108', 16, 39, '8', '2005-06-09', '52/9 Ahamad Nagar Mirpur-1 Dhaka-1216', '', 'MD. Motalab', 'Private Service', NULL, 'Halima Khatun', '01758109926', 'House Wife', '01758109926', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082108'),
(258, 4, 'M', '2019-2020', 'B', 'Tasnim Rahman', '001MB071005', 15, 28, '5', '2007-09-19', 'R#3 H# 35/c Samoly, Dhaka', '', 'Mizanur Rahman', '', NULL, 'Rozina Begum', '01712665987', 'House Wife', '01917701762', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071005'),
(259, 4, 'M', '2019-2020', 'B', 'Shahad AL- Hasan', '001MB071201', 15, 30, '1', '2007-10-02', 'House-4 Road-8, Bososti @ Forest Housing Borobag, Mirpur-2 Dhaka-1216', '', 'Mohammad Forhad Hossain', 'Govt Service', NULL, 'Saleha Akter', '01795365972', 'House Wife', '01793009143', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071201'),
(260, 4, 'M', '2019-2020', 'B', 'Noor Maisha', '001MB082027', 16, 38, '27', '2007-01-01', '146/5, West Monipur Mirpur Dhaka', '', 'MD. Iqbal Hossain', 'Private Service', NULL, 'Morjena Akter', '01726390566', 'House Wife', '01712108607', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082027'),
(261, 4, 'D', '2019-2020', 'B', 'Mushfiqur Rahman Mridul ', '001DB071606', 15, 34, '6', '2007-03-14', '100/A Borobag, Mirpur-2 Dhaka-1216', '', 'Mohammad Mintu', 'Private Service', NULL, 'Farzana Akter', '01741181184', 'Private Service', '01741181184', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071606'),
(262, 4, 'M', '2019-2020', 'B', 'Nabiha Tasnim ', '001MB071006', 15, 28, '6', '2007-09-28', 'Mirpur-6, Block-E, Road-2 House No-11', '', 'MD. Belayt Hossan', 'Private Service', NULL, 'Martuza Yasmin (Moni)', '01734174107', 'House Wife', '01719794855', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071006'),
(263, 4, 'M', '2019-2020', 'B', 'Inun Tazrin Binte Reza', '001MB081924', 16, 37, '24', '2005-06-30', '900 Middle Monipur Adorsho Road, Mirpur, Dhaka', '', 'Capt. Imranor Reza Chowdhury', 'Govt Service', NULL, 'Mrs. Salma Khandaker', '01635421971', 'House Wife', '01818489543', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001081924'),
(264, 4, 'M', '2019-2020', 'B', 'Sahed Sarar Abid', '001MB060201', 14, 20, '1', '2008-07-06', 'Kha 2/3 Popular Housing Borobag Mirpur-2 Dhaka-1216', '', 'MD. Mozibur Rahman', 'Govt Service', NULL, 'Mst. Saifun Nahar Sohely', '01703412996', 'House Wife', '01718268866', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060201'),
(265, 4, 'M', '2019-2020', 'B', 'Tanvir Azam', '001MB071202', 15, 30, '2', '2002-05-01', '85/2, Borobug Mirpur-2 Dhaka-1216', '', 'A.H.M Shaful Azam', 'Private Service', NULL, 'Jasmin Ara Khan', '01812004358', 'House Wife', '01819210451', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071202'),
(266, 4, 'M', '2019-2020', 'B', 'Heidisha Mourim', '001MB060101', 14, 19, '1', '2007-05-03', '3/0/1A Ahemmed Nagor Mirpur-1', '', 'Shamsul Hoque Selim', 'Business', NULL, 'Shammi Nasrin', '01686090312', 'House Wife', '01686090312  /  01635090191', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060101'),
(267, 4, 'M', '2019-2020', 'B', 'Rafa Meherin', '001MB060102', 14, 19, '2', '2007-02-20', '14/2 Ahamad Nagor, Paikpara Mirpur-1 Dhaka-1216', '', 'Shamim Ahamid', 'Private Service', NULL, 'Roshni', '01797176907', 'House Wife', '01730399080', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060102'),
(268, 4, 'M', '2019-2020', 'B', 'Minor Rahaman Alvi', '001MB060304', 14, 21, '4', '2007-06-15', 'Monipur 981/2', '', 'Noor Nobi Chowdhury', 'Business', NULL, 'Shopna Akter', '01823074380', 'House Wife', '01814469504', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060304'),
(269, 4, 'D', '2019-2020', 'B', 'Sheikh Muhammad Rafiul Hasan', '001DB071607', 15, 34, '7', '2006-03-01', 'House#04 Road #5 Bosoti Housing Borobag Mirpur-2 Dhaka -1216', '', 'Engr. MD. Hasanuzzaman', 'Govt Service', NULL, 'Ummay Kulsum', '01912913108', 'House Wife', '01911785982', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071607'),
(270, 4, 'D', '2019-2020', 'B', 'Israt Jahan Maisha', '001DB071402', 15, 32, '2', '2004-04-14', '1E 7/29, Mirpur-1, Dhaka-1216', '', 'Shalim Mollah', 'Business', NULL, 'Nasema Akter', '01932901814', 'House Wife', '01937261866', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071402'),
(271, 4, 'D', '2019-2020', 'B', 'Tahmid Bin Ali', '001DB071608', 15, 34, '8', '2007-09-10', 'Govt, Officers complez House#6 Flat# A/5 Mirpur-2 Dhaka', '', 'Dr, Mohammad Idmish Ali', 'Private Service', NULL, 'Dr, Rokeya Begum', '01716593529', 'Private Service', '01712790646', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071608'),
(272, 4, 'D', '2019-2020', 'B', 'Sadman Faiyaz', '001DB060801', 14, 26, '1', '2007-07-16', 'House-17, Road-4 Block-B Mirpur-6', '', 'MD. Kamrul Islam', 'Private Service', NULL, 'Sharmeen Akter', '01914001592', 'Private Service', '01780484703', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060801'),
(273, 4, 'D', '2019-2020', 'B', 'Adiba Ohin Chowdhwry', '001DB071403', 15, 32, '3', '2006-03-07', 'Houuse # 12 Road#15 Janata Housing Mirpur-1, Dhaka', '', 'Late. Ataur Rahman Chowdhury', 'Others', NULL, 'Fowzia Afroz', '01726596202', 'House Wife', '01726596202', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071403'),
(274, 4, 'D', '2019-2020', 'B', 'KM Imrul Hasan', '001DB082301', 16, 41, '1', '2005-10-14', '188/7 Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Late. Khaza Abdus Salam', 'Others', NULL, 'Rina Khanam', '01855596750', 'House Wife', '01855596750', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082301'),
(275, 4, 'M', '2019-2020', 'B', 'Sadia', '001MB060103', 14, 19, '3', '2007-04-20', '7793/1 Monipur, Mirpur-2 Dhaka-1216', '', 'Shahin Rahman', 'Private Service', NULL, 'Shanaj', '01307539364', 'House Wife', '01713199688', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '200.00', '001060103'),
(276, 4, 'M', '2019-2020', 'B', 'Abrar Jawad', '001MB082109', 16, 39, '9', '2006-11-12', 'Flat No-V3, 150/1, ShaAli Bag, Mirpur-1', '', 'MD. Zahidul Haque Khan', 'Business', NULL, 'Dilruba Afroj', '01716814936', 'Teacher', '01716814936', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001082109'),
(277, 4, 'M', '2019-2020', 'B', 'Nujhat Tabassum Anny', '001MB071007', 15, 28, '7', '2005-10-24', '894 Middle Monipur Mirpur-02', '', 'Rafiqul Islam', 'Private Service', NULL, 'Salma Akter', '018346778958', 'House Wife', '01834678958', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071007'),
(278, 4, 'M', '2019-2020', 'B', 'Shemaz Shazneen Rizza', '001MB071008', 15, 28, '8', '2007-05-11', '37/2-A Shah Ali Bag Mirpur-1 Dhaka-1216', '', 'MD. Shihabul Islam', 'Private Service', NULL, 'Sultana Razia Manmun', '01682076438', 'House Wife', '01673466264', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001071008'),
(279, 4, 'M', '2019-2020', 'B', 'Iftekhaaruddin Khan', '001MB060305', 14, 21, '5', '2007-11-25', '331/1 Ahmed Nagor, Paikpara Mirpur-1 Dhaka-1216', '', 'Fakhruddin Khan', 'Private Service', NULL, 'Dilruba Pervin Khan', '01712671765', 'House Wife', '01713147027', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001060305'),
(280, 4, 'M', '2019-2020', 'B', 'Marzan Sultana Mim', '001MB083101', 16, 80, '1', '2005-12-18', 'Monipur Mirpur-2  Dhaka-1216, House No-59', '', 'Hafez Sultan Mahmud', 'Business', NULL, 'Fatema Parvin', '01731301885', 'House Wife', '01725336241', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001083101'),
(281, 4, 'M', '2019-2020', 'B', 'Asma Akther', '001MB083102', 16, 80, '2', '2006-01-05', '3/6/A1 North Prrearbag Mirpur Dhaka-1216', '', 'MD. Razzak Mizi', 'Business', NULL, 'Beauty Begum', '01813930728', 'House Wife', '01813930728', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-05', '', '', NULL, '0.00', '001083102'),
(282, 4, 'M', '2019-2020', 'B', 'Safwan Ibne Ali', '001MB053006', 39, 78, '6', '2009-01-22', '755, Middle Monipur, Mirpur-2 Dhaka', '', 'MD. Showkat Ali Molla', 'Private Service', NULL, 'Shahpar Binte Allam', '01918165207', 'House Wife', '01712615814, 01675317852', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053006'),
(283, 4, 'M', '2019-2020', 'B', 'S.M Imran Rahman', '001MB053007', 39, 78, '7', '2009-11-21', '843/1, Middle, Mirpur-2 Dhak-1216', '', 'S.M Shafikur Rahman', 'Others', NULL, 'Shahina Afroz', '01916843047', 'House Wife', '01715734554', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053007'),
(284, 4, 'M', '2019-2020', 'B', 'Tanjid Rahman Saad', '001MB053008', 39, 78, '8', '2009-02-09', '1045/2 East Monipur, Mirpur-2 Dhaka-1216', '', 'Mostafezur Rahman', 'Private Service', NULL, 'Nusrat Yesmin', '01718660577', 'House Wife', '01684108908', NULL, '', 'M', '2018-12-15', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053008'),
(285, 4, 'M', '2019-2020', 'B', 'MD. Ibrahim', '001MB053009', 39, 78, '9', '2008-06-20', 'H#694 Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Jamal Hossen', 'Private Service', NULL, 'Shilpe Akter', '017526810077', 'House Wife', '017727530213', NULL, '', 'M', '2018-12-13', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053009'),
(286, 4, 'M', '2019-2020', 'B', 'Sanjid Rahman Sami', '001MB053010', 39, 78, '10', '2009-02-09', '1045/2 Katal Tala East Monipur Mirpur-2 Dhaka-1216', '', 'Mostafezur Rahman', 'Private Service', NULL, 'Nusrat Yesmin', '01718660557', 'House Wife', '01684108908', NULL, '', 'M', '2018-12-15', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053010'),
(287, 4, 'M', '2019-2020', 'B', 'Jabid Hasan', '001MB053011', 39, 78, '11', '2008-08-27', 'flat No-6/c Shah Ali Bag Mirpur-1, Dhaka', '', 'MD. Jahangir Alam', 'Govt Service', NULL, 'Zinat Mohal', '01716044777', 'Teacher', '01819597111', NULL, '', 'M', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053011'),
(288, 4, 'M', '2019-2020', 'B', 'Abdur Rahman (Farhan)', '001MB053012', 39, 78, '12', '2008-05-12', '261/262 Block # Cha Mirpur-2 Dhaka-1216', '', 'Belal Hossen', 'Private Service', NULL, 'Sajeda Yesmin', '01942789859', 'House Wife', '01942789859', NULL, '', 'M', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053012'),
(289, 4, 'M', '2019-2020', 'B', 'Tanvir Ahamed Abdullah', '001MB053013', 39, 78, '13', '2007-03-07', '648/2/A West Kazipara Mirpur Dhaka', '', 'MD. Sharif Hossen', 'Private Service', NULL, 'Fatema Akter', '01552413461', 'Govt Service', '01819558081', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053013'),
(290, 4, 'M', '2019-2020', 'B', 'Manjor Rahman Tasdid', '001MB053014', 39, 78, '14', '2009-10-20', '24/1 Dawanbari Amin Bazar', '', 'Lutfor Rahman', 'Business', NULL, 'Fatema Rahman', '01822762066', 'House Wife', '01714020818', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053014'),
(291, 4, 'M', '2019-2020', 'B', 'Yeasin Arafat', '001MB053015', 39, 78, '15', '2009-07-17', '19/27 Staf quater Mirpur-1 Dhaka', '', 'MD. Abdul Khayer', 'Business', NULL, 'Tiasha Akter', '01912321159', 'House Wife', '01948611561', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053015');
INSERT INTO `students` (`StudentId`, `BranchId`, `Shift`, `Year`, `Medium`, `StudentName`, `StudentCode`, `ClassId`, `SectionId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `FathersOccupation`, `FathersEmail`, `MothersName`, `MothersNumber`, `MothersOccupation`, `ContactNumber`, `HomeNumber`, `StudentEmail`, `Gender`, `AdmissionDate`, `StudentStatus`, `BloodGroup`, `Religion`, `StudentPhoto`, `EntryBy`, `EntryDate`, `EmergencyName`, `EmergencyNumber`, `Image`, `MonthlyWaiverAmount`, `PreviousCode`) VALUES
(292, 4, 'M', '2019-2020', 'B', 'AL- Rafsun', '001MB053016', 39, 78, '16', '2008-03-25', '50 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Al- Jubaide', 'Private Service', NULL, 'Mis Rika', '01815001253', 'House Wife', '01816365336', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053016'),
(293, 4, 'M', '2019-2020', 'B', 'Talha Zubayer Arik', '001MB053017', 39, 78, '17', '2008-08-03', '894 Middle Monipur, Mirpur-2', '', 'Rafiqul Islam', 'Private Service', NULL, 'Salma Akter', '01834678958', 'House Wife', '01834678958', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053017'),
(294, 4, 'M', '2019-2020', 'B', 'Rayan Hossen', '001MB053018', 39, 78, '18', '2009-09-08', '76/2 Ansar Camp, Mirpur -1 Dhaka-1216', '', 'MD. Repon Munshe', 'Private Service', NULL, 'Rumi Begum', '01757293286', 'House Wife', '01757293286', NULL, '', 'M', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053018'),
(295, 4, 'M', '2019-2020', 'B', 'MD. Fahim Hossain', '001MB053019', 39, 78, '19', '2009-12-18', '791/3 Middle Monipur, Mirpur, Dhaka-1216', '', 'Aslam Hossain', 'Govt Service', NULL, 'Johora Akter', '01640924929', 'House Wife', '01827587980', NULL, '', 'M', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053019'),
(296, 4, 'M', '2019-2020', 'B', 'Sheke Alve Rahman', '001MB053020', 39, 78, '20', '2007-01-03', '856/3 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Abdur Rahman', 'Private Service', NULL, 'Rozi Rahman', '01711933395', 'House Wife', '01737325157', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001053020'),
(297, 4, 'M', '2019-2020', 'B', 'Jusama Ambia Roponty', '001MB0505417', 39, 79, '17', '2009-01-11', 'H# 35 R# 3 Popular Housing Mirpur Dhaka-1216', '', 'MD. Monirul Islam', 'Private Service', NULL, 'Runia Belkis', '01725557969', 'House Wife', '01926689950', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '0010505417'),
(298, 4, 'M', '2019-2020', 'B', 'Esha Maria Anu', '001MB0505418', 39, 79, '18', '2008-12-21', '819/2 Monipur, Mirpur-2 Dhaka-1216', '', 'Hhafiz Mollah', 'Private Service', NULL, 'Rita', '01798240545', 'House Wife', '01798240545', NULL, '', 'F', '2018-12-23', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '0010505418'),
(299, 4, 'M', '2019-2020', 'B', 'Adiba Tasnim Adrita', '001MB0505419', 39, 79, '19', '2008-12-04', 'H# 1064/2 Sanpara, Mirpur-2 Dhaka-1216', '', 'MD. Jul-E- Aslam', 'Govt Service', NULL, 'Hosneara', '01757838199', 'House Wife', '01711713678', NULL, '', 'F', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '0010505419'),
(300, 4, 'M', '2019-2020', 'B', 'Sumehra Islam Oishe', '001MB052904', 39, 77, '4', '2009-07-09', 'House No-31 Road -9 Block-H, Section-2 Mirpur-2 Dhaka-1216', '', 'MD. Shafiqul Islam', 'Private Service', NULL, 'Mst. Zesmin Khatun', '01733211715', 'House Wife', '01716913210', NULL, '', 'F', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052904'),
(301, 4, 'M', '2019-2020', 'B', 'Farjana Afrin Lubna', '001MB052905', 39, 77, '5', '2009-01-08', 'H#12/5/179 Palobi Mirpur-12 Dhaka', '', 'Fazlul Hoque', 'Business', NULL, 'Aysha Akther', '01822997958', 'House Wife', '01819483728', NULL, '', 'F', '2018-12-17', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052905'),
(302, 4, 'M', '2019-2020', 'B', 'Naailah Kaniz Sharfa', '001MB052906', 39, 77, '6', '2018-09-19', 'Chittagong Villa 17/1E, Tolarbag Dhaka-1206', '', 'MD. Newaj Hossain', 'Business', NULL, 'Nusrat Akter', '01533696190', 'House Wife', '01828142286', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052906'),
(303, 4, 'M', '2019-2020', 'B', 'Tasnim Sultana', '001MB052907', 39, 77, '7', '2009-01-06', '1G/2/28 Mirpur-Dhaka-1216', '', 'Razaul Rahman', 'Others', NULL, 'Farida yesmin', '01711464708', 'House Wife', '01711464708', NULL, '', 'F', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052907'),
(304, 4, 'M', '2019-2020', 'B', 'Marzia Mymuna (Borsha)', '001MB052908', 39, 77, '8', '2009-05-19', '390 Middle Monipur', '', 'MD. Khadimul Islam', 'Business', NULL, 'Farhana Jannat (Papy)', '01717914249', 'House Wife', '01719524221', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052908'),
(305, 4, 'M', '2019-2020', 'B', 'Nahrin Zaman', '001MB052909', 39, 77, '9', '2008-02-04', '38 Glortag Mirpur-1 Dhaka-1216', '', 'Morshed Zaman Liton', 'Business', NULL, 'Jesmin', '01712805792', 'House Wife', '01711785106', NULL, '', 'F', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052909'),
(306, 4, 'M', '2019-2020', 'B', 'Nejum Rahman', '001MB052910', 39, 77, '10', '2008-01-01', '390 North Monipur Mirpur-2 Dhaka-1216', '', 'Mizanur Rahman', 'Business', NULL, 'Shanu Akter', '01770252886', 'House Wife', '01715601041', NULL, '', 'F', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052910'),
(307, 4, 'M', '2019-2020', 'B', 'Syeda Al Bushra (Tamme)', '001MB052911', 39, 77, '11', '2009-06-23', 'House-31 Road-1, sec-12 Block-C, Pallabi Dhaka', '', 'Syed Sotter Ahmed', 'Private Service', NULL, 'Samsun Naher', '01953148104', 'House Wife', '01835026634', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052911'),
(308, 4, 'M', '2019-2020', 'B', 'Warisa Islam', '001MB052912', 39, 77, '12', '2008-08-27', '607/A Monipur, Mirpur-2 Dhaka', '', 'Sk. Kamrul Islam', 'Business', NULL, 'Jannati Islam', '01727242041', 'Private Service', '01973234292', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052912'),
(309, 4, 'M', '2019-2020', 'B', 'Lubana Mehtashin Zaina', '001MB052913', 39, 77, '13', '2009-01-11', '59/D/B Darussalam Road Mirpur Dhaka', '', 'MD. Izharul islam', 'Business', NULL, 'Kanij Fatama', '01736850489', 'House Wife', '01711955442', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052913'),
(310, 4, 'M', '2019-2020', 'B', 'Tahir Jaman', '001MB052914', 39, 77, '14', '2010-01-20', '440/1 South Monipur Mirpur, Dhaka', '', 'MD. Raknuzzaman', 'Private Service', NULL, 'Mst. Shanjeda Parvin', '01712222339', 'House Wife', '01819556485', NULL, '', 'F', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052914'),
(311, 4, 'M', '2019-2020', 'B', 'Sanjida Yeasmin', '001MB052915', 39, 77, '15', '2008-11-16', 'Sector-06, Block-KA Road-04, House No-01 Mirpur, Dhaka-1216', '', 'Abdul Sattar', 'Business', NULL, 'Halima Khatun', '01775476293', 'House Wife', '01881659416', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052915'),
(312, 4, 'D', '2019-2020', 'B', 'Mohammad Khan', '001DB052707', 39, 75, '7', '2008-01-28', '761 Kingshok Monipur Mirpur-2 Dhaka-1216', '', 'Wahidur Rahman Khan', 'Business', NULL, 'Moriam AKter jeba', '01872205955', 'House Wife', '01745885058', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052707'),
(313, 4, 'D', '2019-2020', 'B', 'Talha Jobair', '001DB052708', 39, 75, '8', '2009-10-21', '184 Ahmad Nagar Parerbag Mirpur', '', 'MD. Abul Hashem', 'Business', NULL, 'Sabina Akter', '01817584753', 'House Wife', '01817584753', NULL, '', 'M', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052708'),
(314, 4, 'D', '2019-2020', 'B', 'MD. Shadman Islam', '001DB052709', 39, 75, '9', '2009-10-28', '247/3-A Ahmad Nagar Parerbag Mirpur', '', 'MD. Saiful Islam', 'Business', NULL, 'Samsun Naher Luchy', '01816680181', 'House Wife', '01819202492', NULL, '', 'M', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052709'),
(315, 4, 'D', '2019-2020', 'B', 'Nusfiqul Islam Limaon', '001DB052710', 39, 75, '10', '2008-10-20', '177/2 Ahmad Nagar Paikpara Mirpur-1 Dhaka-1216', '', 'Nazrul Islam', 'Private Service', NULL, 'Nadia Afroj', '01714200327', 'House Wife', '01712593593', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052710'),
(316, 4, 'D', '2019-2020', 'B', 'Rafiul Hassan', '001DB052711', 39, 75, '11', '2007-06-16', 'Gramin Bank Housing Mirpur-2 Dhaka-1216', '', 'Abu Naser', 'Business', NULL, 'Roksana Begum', '01733167501', 'House Wife', '01711392359', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052711'),
(317, 4, 'D', '2019-2020', 'B', 'Mushfiqur Rahman (Razin)', '001DB052712', 39, 75, '12', '2008-01-01', '5 A/b 1st Colony Mazar Road Mirpur Dhaka-1216', '', 'MD. Mokhlesur Rahman', 'Business', NULL, 'Tahmina Rahman', '01787590160', 'House Wife', '01711525484', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052712'),
(318, 4, 'D', '2019-2020', 'B', 'Saiful Arefin Sowad', '001DB052713', 39, 75, '13', '2009-10-02', '459 South Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Zahid Alom', 'Others', NULL, 'Aklima Hossen', '01685095373', 'House Wife', '01610744422', NULL, '', 'M', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052713'),
(319, 4, 'D', '2019-2020', 'B', 'Ahanaf Thamid', '001DB052714', 39, 75, '14', '2008-09-07', '213/9/2 Shapla Housing Agargow Dhaka', '', 'Kawsar Talukder', 'Business', NULL, 'Roksana AKther', '01726262593', 'House Wife', '01711595334', NULL, '', 'M', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052714'),
(320, 4, 'D', '2019-2020', 'B', 'Mahadi Islam', '001DB052715', 39, 75, '15', '2009-02-15', '85/3 Brobag Mirpur-2 Dhaka-1216', '', 'Kamruzaman', 'Business', NULL, 'Halima Akter', '01912776721', 'House Wife', '01843516484', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052715'),
(321, 4, 'D', '2019-2020', 'B', 'Digonto Kabir Ahmed', '001DB052716', 39, 75, '16', '2010-01-06', '801/B South Monipur, Mirpur Dhaka-1216', '', 'Golam Rabani', 'Private Service', NULL, 'Jesmin Akter', '01726010001', 'House Wife', '01937548008', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052716'),
(322, 4, 'D', '2019-2020', 'B', 'S.M Sadman Sakif', '001DB052717', 39, 75, '17', '2009-04-22', 'Plot# D-12, Road #1/3 Block#D Pallabi Dhaka', '', 'MD. Anisur Rahman', 'Private Service', NULL, 'Mst. Shammi Akter', '01723922341', 'House Wife', '01712027728', NULL, '', 'M', '2018-12-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052717'),
(323, 4, 'D', '2019-2020', 'B', 'Sabinun NAhar Samira', '001DB052804', 39, 76, '4', '2007-10-18', 'H#125/A North prearbag Mirpur Dhaka-1216', '', 'Zahrul Islam', 'Business', NULL, 'Asma Begum', '01786280419', 'House Wife', '01741565333', NULL, '', 'F', '2018-12-10', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052804'),
(324, 4, 'D', '2019-2020', 'B', 'Rictika Robidas Puza', '001DB052805', 39, 76, '5', '2008-09-25', 'H# 7/10 Brobag Mirpur-2 Dhaka-1216', '', 'Jebon Robi Das', 'Private Service', NULL, 'Shilpe Rani Robi Dash', '019258190477', 'House Wife', '01917705690', NULL, '', 'F', '2018-12-09', 'A', 'Unknown', 'Hindu', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052805'),
(325, 4, 'D', '2019-2020', 'B', 'Nawsheen Tabassum Nuha', '001DB052806', 39, 76, '6', '2008-07-06', '270/4-A West Agargoan Dhaka-1207', '', 'MD. Nurunnabi Mondol', 'Private Service', NULL, 'Most. Masuda Khatun', '01731713644', 'House Wife', '01711101455', NULL, '', 'F', '2018-12-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052806'),
(326, 4, 'D', '2019-2020', 'B', 'Maliha Rahman Raha', '001DB052807', 39, 76, '7', '2008-12-19', '150 West Monipur, Mirpur-2 Dhaka-1216', '', 'Abdur Rahman', 'Business', NULL, 'Rina', '01740603178', 'House Wife', '01617589413', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052807'),
(327, 4, 'D', '2019-2020', 'B', 'Bhumii', '001DB052808', 39, 76, '8', '2009-02-10', '108/A, Monipur Mirpur Dhaka', '', 'DR. Bidyut', 'Private Service', NULL, 'DR. Laila', '01712043357', 'Private Service', '01931354805', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052808'),
(328, 4, 'D', '2019-2020', 'B', 'Tasmima  Alam Sara', '001DB052809', 39, 76, '9', '2010-12-25', '32/G, New D type offiver Quater, Taltola Dhaka', '', 'MD. Jahangir Alam', 'Govt Service', NULL, 'Afroja  Najnin', '01712607015', 'Govt Service', '01517075151', NULL, '', 'F', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052809'),
(329, 4, 'D', '2019-2020', 'B', 'Madeeha Mahasin', '001DB052810', 39, 76, '10', '2009-09-17', '9/13, Paikpara Govt D type Quater Mirpur-1 Dhaka', '', 'MD. Mazharul Islam', 'Govt Service', NULL, 'Most. Zinara Pervin', '01727184070', 'Govt Service', '01718559605', NULL, '', 'F', '2019-01-04', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052810'),
(330, 4, 'D', '2019-2020', 'B', 'Samia Islam Protiva', '001DB052811', 39, 76, '11', '2008-04-13', '798 Monipur Mirpur-2 Dhaka', '', 'MD. Farid Hossain Militon', 'Business', NULL, 'Moni Afroz', '01972013367', 'House Wife', '01972013367', NULL, '', 'F', '2018-10-21', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001052811'),
(331, 4, 'M', '2019-2020', 'B', 'Khaliq Ahmed Sajid', '001MB030301', 41, 81, '1', '2010-08-27', '36-A Ahmad nagor sayed Atikullah Sorok ', '', 'Shafique Ahmed Khan', 'Private Service', NULL, 'Lipy Begumm', '01913058955, 01754282009', 'House Wife', '01730791792, 01913058955', NULL, '', 'M', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-07', '', '', NULL, '0.00', '001030301'),
(332, 4, 'M', '2019-2020', 'B', 'Faysal Mahmud', '001MB030302', 41, 81, '2', '2010-06-30', '695/B Middle Monipur Mirpur, Dhaka-1216', '', 'MD. Jamal Hossen', 'Private Service', NULL, 'Fatema', '01726159380', 'House Wife', '01715933238', NULL, '', 'M', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030302'),
(333, 4, 'M', '2019-2020', 'B', 'G.M. Farhan Shahriar (Sazim)', '001MB030303', 41, 81, '3', '2010-11-27', '529 South Monipur Mirpur Dhaka', '', 'G.M. Hafizul Islam', 'Govt Service', NULL, 'Rehana Pervin', '01620729266', 'House Wife', '01715513853', NULL, '', 'M', '2018-12-23', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030303'),
(334, 4, 'M', '2019-2020', 'B', 'Abdur Raqeeb Khan', '001MB030304', 41, 81, '4', '2010-09-11', '822 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Habibur Rahman Khan', 'Private Service', NULL, 'Kazi Jesmin', '01754192504', 'House Wife', '0176250600', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030304'),
(335, 4, 'M', '2019-2020', 'B', 'Safayet Islam Zafir', '001MB030305', 41, 81, '5', '2010-08-12', '247/3/A Ahmad Nagor Paikpara Mirpur-1 Dhaka-1216', '', 'Zahrul Islam', 'Business', NULL, 'Sweety Islam', '01816149737', 'House Wife', '01720273644', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030305'),
(336, 4, 'M', '2019-2020', 'B', 'Shabil Shahriar', '001MB030306', 41, 81, '6', '2010-02-27', '131/2 Jonicki Road Mirpur-1 Dhaka-1216', '', 'MD. Sayed Hossen', 'Business', NULL, 'Meharun Nesa', '01747053452', 'House Wife', '01718082226', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030306'),
(337, 4, 'M', '2019-2020', 'B', 'MD. Ahamadinezad Lamim', '001MB030307', 41, 81, '7', '2010-10-27', '47 Ahamed Nagor Mirpur-1', '', 'MD. Alamgir Hossain', 'Private Service', NULL, 'Mrs. Lipea Khatun', '01745988424', 'House Wife', '01713093185', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030307'),
(338, 4, 'M', '2019-2020', 'B', 'Monowarul Islam Noor', '001MB030308', 41, 81, '8', '2010-09-23', '796/1 Saptarsi Monipur, Mirpur-2', '', 'MD. Shariful Islam', 'Private Service', NULL, 'Moni Akter', '01731678219', 'House Wife', '01714099307', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030308'),
(339, 4, 'M', '2019-2020', 'B', 'Jihan', '001MB030309', 41, 81, '9', '2010-08-07', '28/1C Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Habibur Rahman', 'Private Service', NULL, 'Jarin Tasnim', '01753194055', 'Private Service', '01757987313', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030309'),
(340, 4, 'M', '2019-2020', 'B', 'DM. Samiul Islam', '001MB030310', 41, 81, '10', '2010-07-22', '', '', 'A K M Saiful Islam', 'Private Service', NULL, 'Rabia Islam', '01711314107', 'House Wife', '01711314107', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030310'),
(341, 4, 'M', '2019-2020', 'B', 'Marsheha Al- Amin', '001MB030311', 41, 81, '11', '2010-10-23', 'H# 4 R#18 B#C Mirpur-10 Dhaka-1216', '', 'Miah Mohammad Al -Amin', 'Govt Service', NULL, 'Tasnim Sultana', '01917754400', 'House Wife', '01822000298', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030311'),
(342, 4, 'M', '2019-2020', 'B', 'MD. Ayman Zarif', '001MB030312', 41, 81, '12', '2010-12-07', '440/1 South Monipur, Mirpur-2 Dhaka-1216', '', 'Rokinuzzaman', 'Private Service', NULL, 'Shanaj Parvin', '01712222339', 'House Wife', '01819556485', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030312'),
(343, 4, 'M', '2019-2020', 'B', 'Ahnaf Ahmed', '001MB030313', 41, 81, '13', '2010-07-07', '165/1 Road-07 South Bishil Mirpur-1', '', 'MD. Zeaur Rahman', 'Private Service', NULL, 'Shahana Parvin', '01911152152', 'House Wife', '01716093784', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030313'),
(344, 4, 'M', '2019-2020', 'B', 'Hozaifa Balale', '001MB030314', 41, 81, '14', '2010-05-09', '1085 East Monipur Mirpur Dhaka-1216', '', 'Afsa Balale', 'Private Service', NULL, 'Maleha Tasnim', '01936133395', 'House Wife', '01936133395', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030314'),
(345, 4, 'M', '2019-2020', 'B', 'Farhana Yasir', '001MB030315', 41, 81, '15', '2010-12-01', '911 middle monipur Mirpur Dhaka', '', 'Md. Nizamuddin', 'Private Service', NULL, 'Farhana Yesmin', '01732228826', 'House Wife', '01732228825', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030315'),
(346, 4, 'M', '2019-2020', 'B', 'Tanjim Mahmud Kasfi', '001MB030316', 41, 81, '16', '2010-04-01', 'House No-312/7, Tolarbag 3 No Gate Mirpur-1', '', 'Mur-A- Alom', 'Private Service', NULL, 'Maksuda Parvin', '01912929596', 'Private Service', '01917389179', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030316'),
(347, 4, 'M', '2019-2020', 'B', 'G.M Parthib', '001MB030317', 41, 81, '17', '2011-05-22', 'H# 29 North Perirbag Mirpur Dhaka', '', 'Gazi Mohammad Abid Hosan', 'Business', NULL, 'Fariha Islam', '01670807940', 'House Wife', '01741081699', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030317'),
(348, 4, 'M', '2019-2020', 'B', 'MD. Arafat Islam Mahim', '001MB030318', 41, 81, '18', '2010-05-07', 'B-6, C-5, Bhandon Colony Agargaon Taltola Dhaka', '', 'MD. Harunur Rashid', 'Govt Service', NULL, 'Monjunea Begum', '01760001410', 'House Wife', '01760001420', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030318'),
(349, 4, 'M', '2019-2020', 'B', 'Enan Tawsif Raim', '001MB030319', 41, 81, '19', '2011-01-18', 'H# 60 R#2 Kalshe Road Mirpur-11 Dhaka-1216', '', 'Rezual Karim', 'Private Service', NULL, 'Yesmin Flora', '01717034640', 'House Wife', '01712211216', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030319'),
(350, 4, 'M', '2019-2020', 'B', 'Niam Or- Rashid Riham', '001MB030320', 41, 81, '20', '2011-03-12', 'H# 772/1 Middle monipur Mirpur-2 Dhaka-1216', '', 'Harun or Rashid', 'Business', NULL, 'Rina Akter', '01913524425', 'House Wife', '01990307673', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030320'),
(351, 4, 'M', '2019-2020', 'B', 'Dihanur Rahman', '001MB030321', 41, 81, '21', '2011-01-01', 'H# 130/1/A Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Sofiqur Rahman', 'Business', NULL, 'Dina Rahman', '01781446590', 'House Wife', '01781446590', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 69, '2019-01-07', '', '', NULL, '0.00', '001030321'),
(352, 6, 'M', '2019-2020', 'E', 'Md. Zulfiquar Tahmid', '003MEPR10101', 33, 63, '1', '2015-09-12', '799/1 Monipur,  Morpur - 2 Dhaka - 1216.', 'Khaonaia Rangpur', 'Md. Shakhawat Hossain', 'Private Service', NULL, 'Jannatun Ferdoushi', '01755637602', 'House Wife', '01909146922', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01755637602', '', NULL, '0.00', '003PR10101'),
(353, 6, 'M', '2019-2020', 'E', 'Jubayer Kabir', '003MEPR10102', 33, 63, '2', '1970-01-01', '1030/4D Pepsi Goli, Monipur Mirpur- 2 , Dhaka - 1216', 'Vill: Chandiber, Ps: Bhairab, Dst: Kishorgonj', 'Humayun Kabir', 'Govt Service', NULL, 'Asma Begum', '01991091065', 'Student', '01991091066', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01991091066', '', NULL, '0.00', '003PR10102'),
(354, 6, 'D', '2019-2020', 'E', 'Musa Sadnan Mahi ', '003DEPR10201', 33, 64, '1', '2014-09-21', '928/1. Monipur Mirpur-2 Dhaka-1216', 'VILL+ Po. Dhani Shafa P.S. Mathbaria. Dist. Piroypur.', 'Md. Moniruzzman Monir', 'Private Service', NULL, 'Munni Akter', '01770346480', 'House Wife', '01764521465', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01770346480', '', NULL, '0.00', '003PR10201'),
(355, 6, 'D', '2019-2020', 'E', 'S.M. Arekin Ayman', '003DEPR10202', 33, 64, '2', '2015-12-10', '855, Monipur, Mirpur, Dhaka-1216', '13/B 1/4, Mirpur-13 Kafrul Dhaka ', 'S.M. Shoeb', 'Private Service', NULL, 'Afroza Sultana', '01671127027', 'House Wife', '01671127028', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01671127027', '', NULL, '0.00', '003PR10202'),
(356, 6, 'D', '2019-2020', 'E', 'Zarin Subah ', '003DEPR10203', 33, 64, '3', '2016-02-12', '1172 East. Monipur, Mirpur Dhaka-1216', 'Vill +Pos, Paikarhati, Ps, Santhia, Dist, Pabna.', 'Md. Nura Alam Siddiqui', 'Private Service', NULL, 'Most. Sharmin Sultana', '01727462023', 'House Wife', '01712251866', NULL, '', 'F', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01727462023', '', NULL, '0.00', '003PR10203'),
(357, 6, 'D', '2019-2020', 'E', 'Md. Jiahdul Islam', '003DEPR10204', 33, 64, '4', '2013-12-06', '982/1. Middle Monipur Mirpur Dhaka -1216', 'Bhona Bathmor Borgona ', 'Md. Jalal Uddin ', 'Private Service', NULL, 'Sufia Begum', '01910761969', 'House Wife', '01916030713', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01910761969', '', NULL, '0.00', '003PR10204'),
(358, 6, 'D', '2019-2020', 'E', 'Nourin Islam', '003DEPR20201', 34, 66, '1', '2014-04-24', '1268/2. Monipur, Mirpur Dhaka-1216', '1268/2. Monipur, Mirpur Dhaka-1216', 'Majedul Islam', 'Private Service', NULL, 'Most. Ratana Khatun ', '01933228119', 'House Wife', '01985558922', NULL, '', 'F', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01933228119', '', NULL, '0.00', '003PR20201'),
(359, 6, 'D', '2019-2020', 'E', 'Allnaf Islam Zarif', '003DEPR20202', 34, 66, '2', '2014-02-14', '23, West Monipur, (2 ND Floor) Mirpur Dhaka-1216', 'Village. Zineya Post. Kahathi Para Bakegona Dist. Barisal ', 'Md. Nasir Uddin', 'Business', NULL, 'Halima Khatun', '01714285225', 'House Wife', '01715347790', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01714285225', '', NULL, '0.00', '003PR20202'),
(360, 6, 'D', '2019-2020', 'E', 'Ramisha Sarish Manha', '003DEPR20203', 34, 66, '3', '2015-02-01', '........................', '......................', 'Md. Shaidul Islam', 'Business', NULL, 'Umma Habiba Mila', '01841431566', '', '01977431566', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-09', '01977431566', '', NULL, '0.00', '003PR20203'),
(361, 6, 'M', '2019-2020', 'E', 'Safayet Arafa', '003MEPR20101', 34, 65, '1', '2013-03-20', '982/2,A Monipur, Mirpur, Dhaka-1216', '982/2,A Monipur, Mirpur, Dhaka-1216', 'Omar Faruk', 'Business', NULL, 'Sharmin Sultana', '01754211676', 'House Wife', '01754211676', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01754211676', '', NULL, '0.00', '003PR20101'),
(362, 6, 'M', '2019-2020', 'E', 'Sowab Ahir', '003MEPR20102', 34, 65, '2', '2013-03-20', '982/2 .A Monipur Mirpur Dhaka - 1216', '982/2 .A Monipur Mirpur Dhaka - 1216', 'Omar Faruk', 'Business', NULL, 'Sharmin Sultana', '01754211676', 'House Wife', '01754211676', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01754211676', '', NULL, '0.00', '003PR20102'),
(363, 6, 'D', '2019-2020', 'E', 'Sheik Oshorjo Jamal (OKOR)', '003DEPR20204', 34, 66, '4', '2013-07-23', '1117/1118, East Monipur, Mirpur-2 Dhaka -1216', 'Vill, Gopalpur, Post, Alfadanga, District, Faridpur  ', 'Sheik Jamal Hossain (Munna)', 'Govt Service', NULL, 'Shamsun Nahar ', '01923793967', 'Govt Service', '01923793967', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01923793967', '', NULL, '0.00', '003PR20204'),
(364, 6, 'D', '2019-2020', 'E', 'Samul Jiuse Gomes', '003DEPR20205', 34, 66, '5', '1970-01-01', '875 , East Monipur, Mirpur, - Dhaka - 1216', 'Doha Nawabgonj ', 'Andrew Miltion Gomes ', 'Private Service', NULL, 'Elezabeth Nisha Gomes ', '01818910506', 'House Wife', '01850524707', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Christian', NULL, 36, '2019-01-12', '01818910506', '', NULL, '0.00', '003PR20205'),
(365, 6, 'D', '2019-2020', 'E', 'Muntaha Fatema', '003DEPR20206', 34, 66, '6', '2012-03-18', '906, middle Monipur, Mirpur -2 Dhaka -1216', '906, middle Monipur, Mirpur -2 Dhaka -1216', 'Md, Monirul Islam', 'Private Service', NULL, 'Jamila Afroz Giny', '01711263603', 'House Wife', '01723309065', NULL, '', 'F', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01711263603', '', NULL, '0.00', '003PR20206'),
(366, 6, 'D', '2019-2020', 'E', 'Muhammad Abrar Hossain ', '003DEPR30201', 35, 68, '1', '2012-11-03', '76 Borobag Mirpur Dhaka -1216', '76 Borobag Mirpur Dhaka -1216', 'A K M Sorowor Hossain ', 'Private Service', NULL, 'Sarmin Akter ', '0194747765', 'Govt Service', '01631596977', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '0194747765', '', NULL, '0.00', '003PR30201'),
(367, 6, 'M', '2019-2020', 'E', 'Md. Al- Rafi ', '003MEPR30101', 35, 67, '1', '2019-09-16', '947, Borobagh Mirpur Dhka -1216', 'vill- Surjacki Po, Bondo Pasha , Ps, Boalmari Dist, Faridpur ', 'Md. Arshadul Hoque', 'Private Service', NULL, 'Most, Afroza Kkanom (Tuli)', '01727254772', 'House Wife', '01716425592', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01727254772', '', NULL, '0.00', '003PR30101'),
(368, 6, 'M', '2019-2020', 'E', 'Ahanaf Raihan Saad', '003MEPR30102', 35, 67, '2', '2102-09-05', '01726622644', '', 'Zahir Raihan Babul ', 'Business', NULL, 'Shamui Raihan Sheuli ', '01726622644', 'House Wife', '01714446699', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '3/6, Boro Bag Mirpur-2, Dhka- 1216', 'Vill, Furshail P.O, Malkhanagar, P.S, Shirajoikhan, Dist, Munshigoj ', NULL, '0.00', '003PR30102'),
(369, 6, 'D', '2019-2020', 'E', 'Aumit Hasan ', '003DEPR30202', 35, 68, '2', '2013-12-06', '52/1, Borobag Monipur, Mirpur-2 Dhaka - 1216', 'Garamahs Chondhong Bekuir ', 'Md, Abdur Rahin ', 'Private Service', NULL, 'Tanjina Akter ', '01723146916', 'House Wife', '0171824381', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01723146916', '', NULL, '0.00', '003PR30202'),
(370, 6, 'M', '2019-2020', 'B', 'MD. Mohiminur Rahaman Ahon ', '003MBPL0101', 20, 45, '1', '1970-01-01', '1168 East Monipur Mirpur Dhaka - 1216', '', 'Moshiur Rahaman ', 'Private Service', NULL, 'Sharmin Rahaman ', '01754211676', 'House Wife', '01916284438', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01916284438', '', NULL, '0.00', '003PL0101'),
(371, 6, 'D', '2019-2020', 'B', 'Samia Islam ', '003DBPL0201', 20, 46, '1', '2014-12-27', '983, Monipur Mirpur Dhaka -1216', 'Raghunatpur Ballarshar ', 'Samiul Islam ', 'Private Service', NULL, 'Sabina Islam ', '01677105216', 'House Wife', '01721699816', NULL, '', 'F', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01677105216', '', NULL, '0.00', '003PL0201'),
(372, 6, 'D', '2019-2020', 'B', 'MD. Arafat Hossain Saad ', '003DBPL0202', 20, 46, '2', '2015-01-11', '100/3. A, Monipur, Mirpur, Dhaka, -1216', '100/3. A, Monipur, Mirpur, Dhaka, -1216', 'MD. Saiful Islam ', 'Private Service', NULL, 'Shahanaj ', '01840979779', 'House Wife', '01822825308', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01840979779', '', NULL, '0.00', '003PL0202'),
(373, 6, 'M', '2019-2020', 'B', 'Ramisha Binty Hasan Rodushi ', '003MBPL0102', 20, 45, '2', '2015-08-20', '924, Monipur, Mirpur, -2 Dhaka - 1216', '924, Monipur, Mirpur, -2 Dhaka - 1216', 'Ashif Rajiul Hasan', 'Private Service', NULL, 'Narsies Begum ', '01715785977', '', '01715011528', NULL, '', 'F', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-12', '01715785977', '', NULL, '0.00', '003PL0102'),
(374, 6, 'D', '2019-2020', 'B', 'Shekh Sharriar Hasan Dian ', '003DBPL0203', 20, 46, '3', '2014-12-28', '896/1. Adrsha Road Middle Monipur Mirpur-2 Dhaka -1216', 'Villg. Rahmatour, Sheroa, Sherpar, Bogor', 'MD. Shajedul Karim ', 'Private Service', NULL, 'Mist. Halima Khatun', '01550156385', 'House Wife', '01550156385', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01550156385', '', NULL, '0.00', '003PL0203'),
(375, 6, 'D', '2019-2020', 'B', 'MD. Mahir Labib', '003DBPL0204', 20, 46, '4', '2014-06-11', 'Hasem Villa 957, Moddho Monipur, Mirpur -2 Dhaka -1216', 'Vill, Lohalia, Po+Ps, Babugonj , Dis, Barishal', 'MD. Monirujjman ', 'Private Service', NULL, 'Jannatul Ferduws ', '01758970886', 'House Wife', '01768561510', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01758970886', '', NULL, '0.00', '003PL0204'),
(376, 6, 'D', '2019-2020', 'B', 'Jubayer Islam Rafi ', '003DBPL0205', 20, 46, '5', '2015-01-24', 'East Monipur, Monipur, Dhaka -1216', 'Chanmona Barisal ', 'Abdullah Al Mamun', 'Private Service', NULL, 'Ayesha Akter', '01717322341', 'House Wife', '01915463147', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01717322341', '', NULL, '0.00', '003PL0205'),
(377, 6, 'D', '2019-2020', 'B', 'Ayat Hossain ', '003DBPL0206', 20, 46, '6', '2013-08-27', '997,4/A, Momipur, Mirpur, Dhaka -1216', '997,4/A, Momipur, Mirpur, Dhaka -1216', 'MD. Aowlad Hossain ', 'Business', NULL, 'MRS. Rojia Begum ', '01703795677', 'House Wife', '01647722099', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01703795677', '', NULL, '0.00', '003PL0206'),
(378, 6, 'D', '2019-2020', 'B', 'Sumona Akter ', '003DBPL0207', 20, 46, '7', '2013-11-09', '408, Monipur, Mirpur, Dhaka-1216', 'Vill,  Khulna , PLS. Bagarhat, ', 'Sumon Rana ', 'Business', NULL, 'Nazma Begum ', '01978500040', 'House Wife', '01912494474', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01978500040', '', NULL, '0.00', '003PL0207'),
(379, 6, 'M', '2019-2020', 'B', 'Avrojit Saha Hrik ', '003MBPL0103', 20, 45, '3', '2015-12-07', '731, Monipur, Mirpur Dhaka-1216', 'Sirajgonj 6721', 'Sanjit Kumer Saha', 'Private Service', NULL, 'Soma Saha ', '01724418448', 'House Wife', '01712694106', NULL, '', 'M', '2015-12-07', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-13', '01724418448', '', NULL, '0.00', '003PL0103'),
(380, 6, 'M', '2019-2020', 'B', 'Labib Abdullah ', '003MBPL0104', 20, 45, '4', '2013-05-11', '1127/East, Monipur, Mirpur Dhaka-1216 ', '1127/East, Monipur, Mirpur Dhaka-1216 ', 'Md. Abu Sayeed ', 'Business', NULL, 'Shila ', '01753704509', 'House Wife', '01753647080', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01753704509', '', NULL, '0.00', '003PL0104'),
(381, 6, 'D', '2019-2020', 'B', 'Umaima Binte Islam (IPI)', '003DBPL0208', 20, 46, '8', '2014-11-03', '875 Flat-5/C, Middle Monipur, Mirpur, Dhka -1216', 'Vill, & PO, Swastipur PS, & Dist. Krhtia', 'MD. Ismail Hossain ', 'Private Service', NULL, 'Shamima Nurjahan', '01795110488', 'House Wife', '01718100222', NULL, '', 'F', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '', '', NULL, '0.00', '003PL0208'),
(382, 6, 'M', '2019-2020', 'B', 'Durra Maknun ', '003MBPL0105', 20, 45, '5', '2014-07-22', '1052, East, Monipur, Mirpur,-2 Dhaka-1216', '1052, East, Monipur, Mirpur,-2 Dhaka-1216', 'Ismial Hossain ', 'Private Service', NULL, 'Mahbuba Akter ', '01626474041', 'House Wife', '01626474041', NULL, '', 'F', '2014-07-22', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01626474041', '', NULL, '0.00', '003PL0105'),
(383, 6, 'D', '2019-2020', 'B', 'M Saifan Hossain ', '003DBPL0209', 20, 46, '9', '2015-08-17', '3/A, 821 Monipur, Mirpur-2 Dhaka -1216', '3/A, 821 Monipur, Mirpur-2 Dhaka -1216', 'Md. Akram Hossain Shimul ', 'Private Service', NULL, 'Chamon Ara Afroz ', '01674760818', 'Govt Service', '01713093822', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01674760818', '', NULL, '0.00', '003PL0209'),
(384, 6, 'M', '2019-2020', 'B', 'Sheik Mushfika ', '003MBPL0106', 20, 45, '6', '2015-04-14', 'East, Monipur, Mirpur-2 Dhaka -1216', 'East, Monipur, Mirpur-2 Dhaka -1216', 'Md. Abdur Rahaman ', 'Business', NULL, 'Aysha Akter ', '01717401409', 'House Wife', '01951224492', NULL, '', 'F', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01717401409', '', NULL, '0.00', '003PL0106'),
(385, 6, 'D', '2019-2020', 'B', 'Mashfia Toya', '003DBNU0201', 21, 48, '1', '2013-06-30', '664. Molla Road Monipur, Mirpur, Dhaka -1216', 'Vill, Mehendigonj P.O, Chormetua, Dist, Barisal ', 'MD. Monirujjaman ', 'Private Service', NULL, 'Sabina Yeasmin ', '01749393570', 'House Wife', '01711574882', NULL, '', 'F', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01749393570', '', NULL, '0.00', '003NU0201'),
(386, 6, 'D', '2019-2020', 'B', 'Anas Ahamed ', '003DBNU0202', 21, 48, '2', '2014-02-21', '875 East, Monipur, Mirpur, Dhaka-1216', 'Vill, Shangash, Dis, Shirag gonge ', 'MD. Mostak Ahamed ', 'Business', NULL, 'Saima Begum', '01717899492', 'House Wife', '01717899492', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01717899492', '', NULL, '0.00', '003NU0202'),
(387, 6, 'D', '2019-2020', 'B', 'Ms. Sumaya Khatun ', '003DBNU0203', 21, 48, '3', '2013-09-23', '991, Monipur, Mirpur Dhaka -1216', 'Parvabanipur, Khamarkandi PS. Sheritpur', 'Md. Ariful Islam', 'Business', NULL, 'Mst. Shathi Begum ', '01682912307', 'House Wife', '01968858337', NULL, '', 'F', '2013-09-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01682912307', '', NULL, '0.00', '003NU0203'),
(388, 6, 'D', '2019-2020', 'B', 'Nur Muhammad Saif ', '003DBNU0204', 21, 48, '4', '2013-06-30', 'Monipur, Mirpur Dhaka -1216', 'Monipur, Mirpur Dhaka -1216', 'Lal Chan ', 'Business', NULL, 'Shahinur Akter ', '01996507782', 'House Wife', '01739607109', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-13', '01996507782', '', NULL, '0.00', '003NU0204'),
(389, 6, 'M', '2019-2020', 'B', 'Nur-E- Esratus Zarrah', '003MBNU0101', 21, 47, '1', '2013-10-09', '641, Middle kaza Para Mirpur -121+6', '641, Middle kaza Para Mirpur -121+6', 'Mostofa Mahmud Zoha', 'Teacher', NULL, 'Kamrunnahar ', '01712669309', 'Teacher', '01712669309', NULL, '', 'F', '2019-01-14', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-14', '01712669309', '', NULL, '0.00', '003NU0101'),
(390, 6, 'D', '2019-2020', 'B', 'Tangil Ahamed ', '003DBNU0205', 21, 48, '5', '2013-09-18', '611. Borabeg Mirpur-2 Dhaka - 1216', '611. Borabeg Mirpur-2 Dhaka - 1216', 'Sakil Ahamed ', 'Business', NULL, 'Tahamina Sultana', '01986204860', 'House Wife', '01837386656', NULL, '', 'M', '2013-09-18', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01986204860', '', NULL, '0.00', '003NU0205'),
(391, 6, 'D', '2019-2020', 'B', 'Mahajibin Nawrin ', '003DBNU0206', 21, 48, '6', '2013-06-30', '1049 Kathal Tola Mirpur-2 Dhaka -1216', '1049 Kathal Tola Mirpur-2 Dhaka -1216', 'F.M. Foridul Islam', 'Private Service', NULL, 'Sharmin Sultana ', '01779554972', 'House Wife', '01779554972', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01779554972', '', NULL, '0.00', '003NU0206'),
(392, 6, 'D', '2019-2020', 'B', 'Mis. Nushrat Jahan ', '003DBNU0207', 21, 48, '7', '2013-09-09', 'Middle Monipur, Mirpur, -2 Dhaka-1216', 'Vill, Juuiadoho PO. Juuiadoho Dis, Kustia.', 'Md. Siddikur Rahaman ', 'Private Service', NULL, 'Mst. Kajol Rekha', '01734694070', 'House Wife', '01734694070', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01734694070', '', NULL, '0.00', '003NU0207'),
(393, 6, 'D', '2019-2020', 'B', 'Nahiyan Abdullah Saif', '003DBNU0208', 21, 48, '8', '2014-09-17', 'East, Monipur, Mirpur,-2 Dhaka-1216', 'Vill Soufh Shampur PO. Dairasharf ', 'Mohammad Dalower Hossan ', 'Private Service', NULL, 'Niru Sultana ', '01963564815', 'House Wife', '01912416046', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01963564815', '', NULL, '0.00', '003NU0208'),
(394, 6, 'D', '2019-2020', 'B', 'Nahiyan Abdullah Saif', '003DBNU0209', 21, 48, '9', '2014-09-17', 'East, Monipur, Mirpur-2 1216 Dhaka -1216\r\n', 'Vill, Soufh Shampur PO. Dairasharif', 'Mohammad Dalower Hossan ', 'Private Service', NULL, 'Niru Sultana ', '01963564815', 'House Wife', '01912416046', NULL, '', 'F', '2014-09-17', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01963564815', '', NULL, '0.00', '003NU0209'),
(395, 6, 'D', '2019-2020', 'B', 'Ariyan Sharker', '003DBNU0210', 21, 48, '10', '2014-06-30', '788. Middle Monipur Mirpur-2 Dhaka -1216', 'Vill, Chowdhiry Kandi PO+Ps, Muirad Nagar Comlla ', 'Md. Anowar Hossain ', 'Private Service', NULL, 'Mrs. Selina Akter', '01676159484', 'House Wife', '01752107693', NULL, '', 'M', '2014-06-30', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01676159484', '', NULL, '0.00', '003NU0210'),
(396, 6, 'D', '2019-2020', 'B', 'Muhammad Shaheed Bin Zahid (Shaian)', '003DBNU0211', 21, 48, '11', '2013-09-02', '1125, Monipur, Mirpur, Dhaka -1216', 'Nabin Nagar Saraj Gonj Bazar Chjadanga', 'Md. Zahid Hossain ', 'Private Service', NULL, 'Mst. Shahima Akter ', '01715103829', 'House Wife', '01714163224', NULL, '', 'M', '2013-09-02', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01715103829', '', NULL, '0.00', '003NU0211'),
(397, 6, 'D', '2019-2020', 'B', 'Jannatul Nayem Laisa ', '003DBNU0212', 21, 48, '12', '2014-08-29', 'Monipur Mirpur-2 Dhaka -1216', 'Monipur Mirpur-2 Dhaka -1216', 'md. Liton ', 'Private Service', NULL, 'Sharmin Sultana ', '01777815820', 'House Wife', '01777815820', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01777815820', '', NULL, '0.00', '003NU0212'),
(398, 6, 'D', '2019-2020', 'B', 'Rizwana Islam ', '003DBNU0213', 21, 48, '13', '2013-08-26', '971/2 East Monipur, Mirpur, - 2 Dhaka 1216', 'Vill. Kazi Road 7/3 P.O Ghatail Dist. Tangail ', 'Md Aminul Islam', 'Business', NULL, 'Shilpi Islam ', '01733720046', 'House Wife', '01710771840', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01733720046', '', NULL, '0.00', '003NU0213'),
(399, 6, 'D', '2019-2020', 'B', 'Adrita Sarkar Progga ', '003DBNU0214', 21, 48, '14', '2013-06-30', '855. Mehna Tower Monipur Mirpur-2 Dhaka -1216', '855. Mehna Tower Monipur Mirpur-2 Dhaka -1216', 'Kripamoy Sarkar ', 'Private Service', NULL, 'Shanchita Rani Biswas ', '0172697107', 'Private Service', '0172697107', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-16', '0172697107', '', NULL, '0.00', '003NU0214'),
(400, 6, 'M', '2019-2020', 'B', 'Sayedat Sadat Taziq', '003MBNU0102', 21, 47, '2', '2014-12-12', 'East, Monipur, Mirpur -2 Dhaka -1216', 'East, Monipur, Mirpur -2 Dhaka -1216', 'K.M. Ronot Jahan Tomal ', 'Business', NULL, 'Israt Jahan Sitvana ', '01759394778', 'Govt Service', '01711186310', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '', '', NULL, '0.00', '003NU0102'),
(401, 6, 'M', '2019-2020', 'B', 'Umme Habiba ', '003MBNU0103', 21, 47, '3', '2014-11-14', '1073 East Monipur Mirpur-2 Dhaka-1216', '1073 East Monipur Mirpur-2 Dhaka-1216', 'Anwar Hosan ', 'Private Service', NULL, 'Makshoda Akter ', '01635406871', 'House Wife', '01635406871', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01635406871', '', NULL, '0.00', '003NU0103'),
(402, 6, 'M', '2019-2020', 'B', 'Adnan Yousuf Labib ', '003MBNU0104', 21, 47, '4', '2014-05-30', '871, Monipur Mirpur, Dhaka -1216', '871, Monipur Mirpur, Dhaka -1216', 'Md. Abu Yousuf Murad ', '', NULL, 'Fifuza Begum ', '01914907167', 'House Wife', '01914907167', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01914907167', '', NULL, '0.00', '003NU0104'),
(403, 6, 'M', '2019-2020', 'B', 'Adnan Yousuf Labib ', '003MBNU0105', 21, 47, '5', '2014-05-30', '871, Monipur Mirpur, Dhaka -1216', '871, Monipur Mirpur, Dhaka -1216', 'Md. Abu Yousuf Murad ', '', NULL, 'Fifuza Begum ', '01914907167', 'House Wife', '01914907167', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01914907167', '', NULL, '0.00', '003NU0105'),
(404, 6, 'M', '2019-2020', 'B', 'Maliha Bushra ', '003MBNU0106', 21, 47, '6', '2014-12-16', '922, Middle Monipur , Mirpur, Dhka -1216', 'Vil. Ginia PO. Kathipara Dist. Borishal ', 'Md. Abul Bashar ', 'Business', NULL, 'Minuy Akter ', '01932716613', 'Private Service', '01932716613', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01932716613', '', NULL, '0.00', '003NU0106'),
(405, 6, 'M', '2019-2020', 'B', 'Maliha Bushra ', '003MBNU0107', 21, 47, '7', '2014-12-16', '922, Middle Monipur , Mirpur, Dhka -1216', 'Vil. Ginia PO. Kathipara Dist. Borishal ', 'Md. Abul Bashar ', 'Business', NULL, 'Minuy Akter ', '01932716613', 'Private Service', '01932716613', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01932716613', '', NULL, '0.00', '003NU0107'),
(406, 6, 'M', '2019-2020', 'B', 'Rafi Islam ', '003MBNU0108', 21, 47, '8', '2013-06-24', 'East, Monipur Mirpur Dhaka-1216', 'East, Monipur Mirpur Dhaka-1216', 'Md. Hasem ', 'Business', NULL, 'Happy Begum ', '01916924377', 'House Wife', '01942334614', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01916924377', '', NULL, '0.00', '003NU0108'),
(407, 6, 'D', '2019-2020', 'B', 'Tamzid Azad Hira ', '003DBNU0215', 21, 48, '15', '2013-08-14', '922/1 Middel Monipur, Mirpur-2, Dhaka-1216', 'Shahadadpur, Shirajgonge.', 'Lutfar Rahaman ', 'Private Service', NULL, 'Halima Khatun', '01714073827', 'House Wife', '01720014474', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01720014474', '01714073827', NULL, '0.00', '003NU0215'),
(408, 6, 'D', '2019-2020', 'B', 'Rayann Kibira ', '003DBNU0216', 21, 48, '16', '2014-04-02', '1035. East Monipur, Mirpur-2 Dhaka -1216', '1035. East Monipur, Mirpur-2 Dhaka -1216', 'Hossainul Kibria ', '', NULL, 'Tahmina Akter ', '01644329055', '', '01737686722', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01644329055', '', NULL, '0.00', '003NU0216'),
(409, 6, 'D', '2019-2020', 'B', 'Abid Abrar Safin ', '003DBNU0217', 21, 48, '17', '2014-10-31', '982/2-a Middle Monipur, Mirpur-2 Dhaka -1216', 'Madaur Solabaria Ataikula Pabna ', 'Dewan Shadadul Hoque Uzzal ', 'Private Service', NULL, 'Mst. Aisa Siddika ', '01718298043', 'House Wife', '01710990808', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01718298043', '', NULL, '0.00', '003NU0217'),
(410, 6, 'D', '2019-2020', 'B', 'Mobin Islam ', '003DBNU0218', 21, 48, '18', '2015-05-27', '997/1, Monipur Mirpur-2 , Dhaka -1216', '997/1, Monipur Mirpur-2 , Dhaka -1216', 'Saiful Islam ', 'Private Service', NULL, 'Farjana Shikder ', '01678715101', 'House Wife', '01678715101', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01678715101', '', NULL, '0.00', '003NU0218'),
(411, 6, 'D', '2019-2020', 'B', 'Mobin Islam ', '003DBNU0219', 21, 48, '19', '2015-05-27', '9971, Monipur, Mirpur Dhaka-1216', '9971, Monipur, Mirpur Dhaka-1216', 'Saiful Islam ', 'Private Service', NULL, 'Farjana Shikder ', '01678715101', 'House Wife', '01678715101', NULL, '', 'F', '2015-05-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01678715101', '', NULL, '0.00', '003NU0219'),
(412, 6, 'D', '2019-2020', 'B', 'Samiha Tasnim Ridita ', '003DBNU0220', 21, 48, '20', '2015-08-07', '1064/2, Senpara Mirpur 10 Dhaka', '1064/2, Senpara Mirpur 10 Dhaka', 'Md. Jul-E- Aslam ', 'Govt Service', NULL, 'Mst. Hosneara ', '01757838199', 'House Wife', '01711713678', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01757838199', '', NULL, '0.00', '003NU0220'),
(413, 6, 'D', '2019-2020', 'B', 'Sarita Muhat ', '003DBNU0221', 21, 48, '21', '2013-12-04', '741 Middle Monipur Mirpur Dhaka -1216', '741 Middle Monipur Mirpur Dhaka -1216', 'Sheikh Abdur Rohim ', 'Business', NULL, 'Shirmen Ahamed ', '01933361473', 'House Wife', '01933361473', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01933361473', '', NULL, '0.00', '003NU0221'),
(414, 6, 'M', '2019-2020', 'B', 'Md. Muntakin Rahman ', '003MBNU0109', 21, 47, '9', '2013-12-05', '982/a Middle Monipur, Monipur, Dhaka -1216', 'Mobin Monzil C&B Road North Sagardi word No.-23 Barisal 8200 ', 'Md. Mujebur Rahaman ', 'Business', NULL, 'Marufa Akhter ', '01712940698', 'House Wife', '01674742222', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01712940698', '', NULL, '0.00', '003NU0109'),
(415, 6, 'D', '2019-2020', 'B', 'Rabiya Khatun ', '003DBNU0222', 21, 48, '22', '2013-10-09', '1063/4 East Monipur, Mirpur, Dhaka -1216', 'Vill + P/O- Dhawrah P/S- Shailkupa Dist. Jhenaidah ', 'MD. Golam Rosul ', 'Govt Service', NULL, 'Sabina Khatun ', '01721198864', 'House Wife', '01712355498', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01721198864', '', NULL, '0.00', '003NU0222'),
(416, 6, 'M', '2019-2020', 'B', 'Said Bin Saif ', '003MBNU0110', 21, 47, '10', '2014-02-09', '741/2, Middle Monipur, Mirpur, Dhaka -12106', '741/2, Middle Monipur, Mirpur, Dhaka -12106', 'Md. Saiful Islam ', 'Private Service', NULL, 'Anir Koli ', '01636166009', 'House Wife', '01850861056', NULL, '', 'M', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01636166009', '', NULL, '0.00', '003NU0110'),
(417, 6, 'D', '2019-2020', 'B', 'Tabashum Nur Tashfih ', '003DBNU0223', 21, 48, '23', '2014-08-20', '640/6 East Monipur Mirpur, Dhaka -1216', 'Vill, Nalgorh PO. Chhrpata Ps. Doulaz Khhn Dist Bhola', 'Md.Nuruddin Hwlhder ', 'Private Service', NULL, 'Hasnat Akter ', '01730783673', 'House Wife', '01913227421', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01730783673', '', NULL, '0.00', '003NU0223'),
(418, 6, 'D', '2019-2020', 'B', 'Subha Sanjida Seyana ', '003DBNU0224', 21, 48, '24', '2014-11-22', '667/2 Modho Monipur Mirpur- Dhaka -1216', 'ABoVe', 'Md. Shumsud Daha ', 'Private Service', NULL, 'Salma Begum ', '01716642291', 'House Wife', '01716642291', NULL, '', 'F', '2019-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-16', '01716642291', '', NULL, '0.00', '003NU0224'),
(419, 6, 'D', '2019-2020', 'B', 'Miss, Jannatul Soya ', '003DBKG0201', 22, 50, '1', '2012-12-25', '999/ Monipur Mirpur-2 Dhaka -1216', 'B-110 Enayat Nagor LincMills Siddirgonj Nara Yangonj', 'Md. Anawer Hossain ', 'Private Service', NULL, 'Miss. Tahamina Akter Hira', '01872629483', 'House Wife', '01872629482', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01872629483', '', NULL, '0.00', '003KG0201'),
(420, 6, 'M', '2019-2020', 'B', 'Afia Jahin Tasnim ', '003MBKG0101', 22, 49, '1', '2013-06-30', '1041 East Monipur Mirpur Dhaka -1216', 'Sugondhi Soformdi Chadp\'ur ', 'Md. Josim Uddin ', 'Private Service', NULL, 'Frdoics Akter ', '01814216041', 'House Wife', '01814216040', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01814216041', '', NULL, '0.00', '003KG0101');
INSERT INTO `students` (`StudentId`, `BranchId`, `Shift`, `Year`, `Medium`, `StudentName`, `StudentCode`, `ClassId`, `SectionId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `FathersOccupation`, `FathersEmail`, `MothersName`, `MothersNumber`, `MothersOccupation`, `ContactNumber`, `HomeNumber`, `StudentEmail`, `Gender`, `AdmissionDate`, `StudentStatus`, `BloodGroup`, `Religion`, `StudentPhoto`, `EntryBy`, `EntryDate`, `EmergencyName`, `EmergencyNumber`, `Image`, `MonthlyWaiverAmount`, `PreviousCode`) VALUES
(421, 6, 'D', '2019-2020', 'B', 'Tasnim Rana Nazifa ', '003DBKG0202', 22, 50, '2', '2012-06-06', '983/3. (5the Floor) Monipur, Mirpur, Dhaka -1216', 'Vill. Foaspur Po. Dopripr Ps. Nagarpur Dist. Tangail', 'Mohammad Masud Rana', 'Private Service', NULL, 'Mst.Sonia Khatun ', '01928984640', 'House Wife', '01716901330', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01928984640', '', NULL, '0.00', '003KG0202'),
(422, 6, 'M', '2019-2020', 'B', 'Abrar Jaheen ', '003MBKG0102', 22, 49, '2', '2012-12-29', '981, Monipur Monipur Dhaka 1216', '981, Monipur Monipur Dhaka 1216', 'Muhammad Shafidllah Shake ', 'Govt Service', NULL, 'Zannatul Ferdousy ', '01716763729', '', '01716763729', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01716763729', '', NULL, '0.00', '003KG0102'),
(423, 6, 'M', '2019-2020', 'B', 'Sadman Ahmad Shopnil ', '003MBKG0103', 22, 49, '3', '2013-01-25', '53/1 Borobag Mirpur Dhaka -1216', 'Vill, Balutungi PO Adina College Ps. Shibgonj Dis Chapainawabgonl ', 'Md. Touidul Islam ', 'Business', NULL, 'Saleha Khatun ', '01707327587', 'House Wife', '01718942675', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01707327587', '', NULL, '0.00', '003KG0103'),
(424, 6, 'M', '2019-2020', 'B', 'Mehajebin ', '003MBKG0104', 22, 49, '4', '2013-09-12', '875, Middle Monipur Mirpur Dhaka -1216', 'Kulia Boutia Mokshepur ', 'Mijanur Rahaman ', 'Private Service', NULL, 'Rajia Sultana ', '01716887589', 'House Wife', '01818515384', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01716887589', '', NULL, '0.00', '003KG0104'),
(425, 6, 'M', '2019-2020', 'B', 'Shaikh Hossain Md Al Faisal Ankon ', '003MBKG0105', 22, 49, '5', '2013-11-01', '664, East Monipur, Mirpur Dhaka -1216', '664, East Monipur, Mirpur Dhaka -1216', 'Shaikh Abul Kashrm Fardous ', '', NULL, 'Shemima Yesmin ', '01711956191', 'House Wife', '01711956191', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01711956191', '', NULL, '0.00', '003KG0105'),
(426, 6, 'D', '2019-2020', 'B', 'Nilema Akter Jannat', '003DBKG0203', 22, 50, '3', '1970-01-01', '383/3 Middle Monipur Mirpur Dhaka -1216', 'Sharitpur Pst Damoka Dist Shoritpur', 'Md. Abjal Hossan ', 'Private Service', NULL, 'Ms Jahanara Bagum ', '01948356096', 'House Wife', '01948356096', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01948356096', '', NULL, '0.00', '003KG0203'),
(427, 6, 'D', '2019-2020', 'B', 'Wasima Akter Adiba', '003DBKG0204', 22, 50, '4', '2013-08-09', '1064 East Monipur Mirpur Dhaka -1216', 'Vill. Paratoli PO Goniar Chor Dist Comilla ', 'Warish Nadim ', 'Business', NULL, 'Khadija Nadim ', '01624847867', 'House Wife', '01624847867', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01624847867', '', NULL, '0.00', '003KG0204'),
(428, 6, 'D', '2019-2020', 'B', 'Ayesha MasroorInita ', '003DBKG0205', 22, 50, '5', '2013-12-25', '1001/1 Khatal Tala Panirpamp Mirpur -2 ', '1001/1 Khatal Tala Panirpamp Mirpur -2 ', 'Imtiaz Masroor ', 'Private Service', NULL, 'Kamrun Nasha ', '01715021592', 'House Wife', '01715021592', NULL, '', 'F', '2013-12-25', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01715021592', '', NULL, '0.00', '003KG0205'),
(429, 6, 'M', '2019-2020', 'B', 'Mst. Morium ', '003MBKG0106', 22, 49, '6', '2013-06-20', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Md. Nazrul Islam ', 'Govt Service', NULL, 'Mst. Asma Begum ', '01817263492', 'House Wife', '01710622850', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01817263492', '', NULL, '0.00', '003KG0106'),
(430, 6, 'M', '2019-2020', 'B', 'Furhadun Nubi Omi', '003MBKG0107', 22, 49, '7', '2014-02-25', '1045 East Monipur Mirpur Dhaka -1216', '281/282, Mirpur-2', 'Md. Obidun Nobi ', 'Private Service', NULL, 'Nilima Ferdous Ara ', '01718104144', 'House Wife', '01730405410', NULL, '', 'M', '2014-02-25', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01718104144', '', NULL, '0.00', '003KG0107'),
(431, 6, 'D', '2019-2020', 'B', 'Suseda Jannat Nawsin ', '003DBKG0206', 22, 50, '6', '2013-09-12', 'Mollha Road Monipur Mirpur Dhaka -1216', 'Vill.  Khaya Pls. Dabirdir Dis Comilla ', 'Dalowar Hossain ', 'Business', NULL, 'Mss . Nusrat Jahan ', '01712139284', 'House Wife', '01745901847', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01712139284', '', NULL, '0.00', '003KG0206'),
(432, 6, 'M', '2019-2020', 'B', 'Rukaya Kadir ', '003MBKG0108', 22, 49, '8', '2013-06-30', '1074/1 East Monipur Mirpur Dhaka ', '1074/1 East Monipur Mirpur Dhaka ', 'Abdul Kadir ', 'Business', NULL, 'Jannatul Ferdus ', '01758724623', 'House Wife', '01954499091', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01758724623', '', NULL, '0.00', '003KG0108'),
(433, 6, 'M', '2019-2020', 'B', 'MD. Dalim ', '003MBKG0109', 22, 49, '9', '2012-11-17', '91 East Monipur Mirpur Dhaka -1216', 'Vill. Vinnadi PO. Kishorgong ', 'MD. jalal ', 'Govt Service', NULL, 'Rina ', '01777525139', 'House Wife', '01777525139', NULL, '', 'M', '2017-11-12', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01777525139', '', NULL, '0.00', '003KG0109'),
(434, 6, 'M', '2019-2020', 'B', 'Rafiul Akram Arif ', '003MBKG0110', 22, 49, '10', '2012-08-02', '987, East Monipur Mirpur  Dhaka -12163', '987, East Monipur Mirpur  Dhaka -12163', 'Akrim Hossain Mia', 'Business', NULL, 'Souda Polina Khamom ', '01715699669', 'House Wife', '01715699669', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01715699669', '', NULL, '0.00', '003KG0110'),
(435, 6, 'D', '2019-2020', 'B', 'Shreysi Sarabasti Das Mitu ', '003DBKG0207', 22, 50, '7', '2013-09-29', '9 Borobag Monipur Mirpur Dhaka -1216', '9 Borobag Monipur Mirpur Dhaka -1216', 'Swapanchandra Das ', 'Private Service', NULL, 'Monisha Rani Dey', '0', 'Private Service', '0', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-19', '0', '', NULL, '0.00', '003KG0207'),
(436, 6, 'M', '2019-2020', 'B', 'Hamim H ossain Hamja ', '003MBKG0111', 22, 49, '11', '2012-09-24', '1039/1 East Monipur Mirpur Dhaka -1216', 'Madaripur ', 'Md. Sinto Hossain ', 'Business', NULL, 'Ikra Begum ', '01965965497', 'House Wife', '01776797671', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01965965497', '', NULL, '0.00', '003KG0111'),
(437, 6, 'D', '2019-2020', 'B', 'Rose Akter ', '003DBKG0208', 22, 50, '8', '2012-11-03', '1064/2 Monipur Mirpur Dhaka -1216', '1064/2 Monipur Mirpur Dhaka -1216', 'Md. Raihan Mia', 'Business', NULL, 'Nasima Begum ', '01785496295', 'House Wife', '01771587606', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01785496295', '', NULL, '0.00', '003KG0208'),
(438, 6, 'D', '2019-2020', 'B', 'Sheikh Mohammed Anaf Labib ', '003DBKG0209', 22, 50, '9', '2013-02-14', '1100, East Monipur Mirpur Dhaka -1216', '1100, East Monipur Mirpur Dhaka -1216', 'Sheikh Mohammed Arman ', 'Private Service', NULL, 'Kohinur Naznin ', '01914342338', 'House Wife', '01815437103', NULL, '', 'M', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-19', '01914342338', '', NULL, '0.00', '003KG0209'),
(439, 4, 'M', '2019-2020', 'B', 'Tasfia Islam', '001MB0303301', 41, 85, '1', '2010-10-20', '17/1. Zabbar Housing, Mazar Road, Mirpur-1, Dhaka', '17/1. Zabbar Housing, Mazar Road, Mirpur-1, Dhaka', 'Md. Nurul Islam', 'Business', NULL, 'Mrs. Rabeya Khatun', '01830563415', 'House Wife', '01938872474', NULL, '', 'F', '2019-01-19', 'A', 'Unknown', 'Islam', NULL, 13, '2019-01-19', '', '', NULL, '0.00', '0010303301'),
(440, 6, 'D', '2019-2020', 'B', 'Raha Moni Akter Tonni ', '003DBDBON0201', 23, 52, '1', '2012-04-23', 'East Monipur Mirpur Dhaka -1216', 'East Monipur Mirpur Dhaka -1216', 'Md. Rabbi ', 'Business', NULL, 'Sonia ', '01835497781', 'House Wife', '01835497781', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01835497781', '', NULL, '0.00', '003DBON0201'),
(441, 6, 'M', '2019-2020', 'B', 'Abida Sultana Asa ', '003MBMBON0101', 23, 51, '1', '2012-09-29', '383.C South Monipur ', 'AS . Same DIST. Pabna ', 'Md. Amjad ', 'Business', NULL, 'Hasina Parvin ', '01711954557', 'House Wife', '01715819219', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01711954557', '', NULL, '0.00', '003MBON0101'),
(442, 6, 'M', '2019-2020', 'B', 'MD. Siam ', '003MBMBON0102', 23, 51, '2', '2011-01-11', '904/1 Adarsho road Miniour Mirpur Dhaka -1216', 'Vill. Gowrebardi Pol> Somargui Dist Narayangonj ', 'Md. Dalower Hossain ', 'Private Service', NULL, 'Mst. Jhomure Akter ', '01912521059', 'House Wife', '01914849902', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01912521059', '', NULL, '0.00', '003MBON0102'),
(443, 6, 'M', '2019-2020', 'B', 'Md. Jahid Hassain ', '003MBMBON0103', 23, 51, '3', '1970-01-01', 'Middle Monipur Mirpur Dhaka -1216', 'Middle Monipur Mirpur Dhaka -1216', 'Md. Jahngir ', 'Business', NULL, 'Shath Akter ', '01960800211', 'House Wife', '01960800211', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01960800211', '', NULL, '0.00', '003MBON0103'),
(444, 6, 'M', '2019-2020', 'B', 'Afaf Mahtir Nabil ', '003MBMBON0104', 23, 51, '4', '2012-06-30', '17/5 Borobagh Mirpur Dhaka -1216', 'Vill. Poranpur Faridpur ', 'Abdul Bashar ', 'Business', NULL, 'Meherunnesa Begum ', '01722026600', 'House Wife', '01722026600', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01722026600', '', NULL, '0.00', '003MBON0104'),
(445, 6, 'M', '2019-2020', 'B', 'Nusrat Jahan Maisha ', '003MBMBON0105', 23, 51, '5', '2013-06-02', 'Kathaltala East Monipur Mirpur Dhaka -1216', 'Kathaltala East Monipur Mirpur Dhaka -1216', 'Md. Litan Akon ', 'Business', NULL, 'Israt Jahan Ratna ', '01786693250', 'House Wife', '01786693250', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01786693250', '', NULL, '0.00', '003MBON0105'),
(446, 6, 'M', '2019-2020', 'B', 'Humaira ISlam Khashbo', '003MBMBON0106', 23, 51, '6', '2012-06-02', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Heal Mahmad ', 'Business', NULL, 'Mihty ISlam ', '01712081008', 'House Wife', '01712081008', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01712081008', '', NULL, '0.00', '003MBON0106'),
(447, 6, 'M', '2019-2020', 'B', 'Sajedul Alam ', '003MBMBON0107', 23, 51, '7', '2012-10-10', '1072 East Monipur Mirpur Dhaka -1216', '13JF5274VuNthhwKkLrYyZW73smjSYAEen', 'Md. Badrul Alam Shipon ', 'Private Service', NULL, 'Salma Akter ', '0', 'House Wife', '0', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '', '', NULL, '0.00', '003MBON0107'),
(448, 6, 'M', '2019-2020', 'B', 'Humayra Sultana Ahona ', '003MBMBON0108', 23, 51, '8', '2012-06-02', 'East Monipur Mirpur Dhaka -1216', 'East Monipur Mirpur Dhaka -1216', 'Md. Masud Rana ', 'Business', NULL, 'Liza Sultana ', '01749972072', 'House Wife', '01749972072', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01749972072', '', NULL, '0.00', '003MBON0108'),
(449, 6, 'M', '2019-2020', 'B', 'Samiha Mahmud Nur ', '003MBMBON0109', 23, 51, '9', '2012-09-28', 'House- 866. Monipur Mirpur -2 Dhaka -1216', 'Vill. Saygram P.O. Barohazar Dist. Barisal ', 'Md. Ferouz Mahmud', 'Private Service', NULL, 'Shahana Mahmud ', '01734090097', 'House Wife', '01712472015', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01734090097', '', NULL, '0.00', '003MBON0109'),
(450, 6, 'M', '2019-2020', 'B', 'Faouzia Tasnime ', '003MBMBTW0101', 24, 53, '1', '2010-08-06', '195 East Monipur Mirpur Dhaka -1216', '1265 East Monipur Mirpur Dhaka -1216', 'Md. Abu Bokkor Shiddik Ripon ', 'Business', NULL, 'Mss. Shonia ', '01924958344', 'House Wife', '01924958344', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01924958344', '', NULL, '0.00', '003MBTW0101'),
(451, 6, 'M', '2019-2020', 'B', 'Hafejul Islam Limon ', '003MBMBTW0102', 24, 53, '2', '2011-02-11', '1006/2 East Monipur Mirpur Dhaka -1216', 'Lalmonir Hat ', 'Md. Habib Islam ', 'Business', NULL, 'Dalim Begum ', '01721436858', 'House Wife', '01722902003', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01721436858', '', NULL, '0.00', '003MBTW0102'),
(452, 6, 'M', '2019-2020', 'B', 'Al- Mahi Rahman Nafi ', '003MBMBTW0103', 24, 53, '3', '2012-08-06', '194/1 Shewrpara Betola Mosjid ', 'Vill Cagunia P.O Gutia P.S Wasinpun Barisal ', 'Mohammad Saiful Islam ', 'Private Service', NULL, 'Ruma Akter ', '01766142351', 'House Wife', '01764788893', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01766142351', '', NULL, '0.00', '003MBTW0103'),
(453, 6, 'M', '2019-2020', 'B', 'Md. Nirob ', '003MBMBTW0104', 24, 53, '4', '2013-02-02', '991. East Monipur Mirpur Dhaka -1216', 'Barisil ', 'Md. Milon Hossain ', 'Business', NULL, 'Mis Nazma Begum ', '01948634744', 'House Wife', '01948634744', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01948634744', '', NULL, '0.00', '003MBTW0104'),
(454, 6, 'M', '2019-2020', 'B', 'Nusrat Jahan Surovi ', '003MBMBTW0105', 24, 53, '5', '2013-06-02', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Santu Mia ', 'Private Service', NULL, 'Sabina Yesmin ', '0', 'House Wife', '0', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '0', '', NULL, '0.00', '003MBTW0105'),
(455, 6, 'M', '2019-2020', 'B', 'Md. Foisal ', '003MBMBTW0106', 24, 53, '6', '2010-01-01', '569, Monipur  Mirpur Dhaka -1216', '569, Monipur  Mirpur Dhaka -1216', 'Abul Kalam Manshi ', 'Business', NULL, 'Miss Rajia Sultana ', '01734349394', 'House Wife', '01734349394', NULL, '', 'M', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01734349394', '', NULL, '0.00', '003MBTW0106'),
(456, 6, 'M', '2019-2020', 'B', 'Tabin Hossen Diba ', '003MBMBTW0107', 24, 53, '7', '2012-01-04', '1040/2, East Monipur Mirpur Dhaka -1216', '1040/2, East Monipur Mirpur Dhaka -1216', 'Md. Monir Hossen ', 'Business', NULL, 'Ruma Akter ', '01991633355', 'House Wife', '01991633355', NULL, '', 'F', '2012-01-04', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01991633355', '', NULL, '0.00', '003MBTW0107'),
(457, 6, 'M', '2019-2020', 'B', 'Jannatul F02-04-2012erdous ', '003MBMBTW0108', 24, 53, '8', '2013-02-02', 'West Monipur Mirpur Dhaka -1216', 'Bikrampur ', 'Alamgir Hossain ', 'Private Service', NULL, 'Ankhi Begun ', '01932600639', 'House Wife', '01932600639', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01932600639', '', NULL, '0.00', '003MBTW0108'),
(458, 6, 'M', '2019-2020', 'B', 'Merine Jahan Elma ', '003MBMBTW0109', 24, 53, '9', '2011-06-26', '922. Middle Monipur  Mirpur Dhaka -1216', '922. Middle Monipur  Mirpur Dhaka -1216', 'Amdadul Shikder ', 'Business', NULL, 'Jahanara Akter ', '01760070808', 'House Wife', '01751938945', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01760070808', '', NULL, '0.00', '003MBTW0109'),
(459, 6, 'M', '2019-2020', 'B', 'Tashfin Ahmed Madhurjo ', '003MBMBTW0110', 24, 53, '10', '2009-10-02', 'Monipur Mirpur Dhaka -1216', 'Aniatpur Chile Sheragonj ', 'Md. Feroj Ahmed ', 'Private Service', NULL, 'Shamima Ahmed ', '01716326834', 'House Wife', '01714495061', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01716326834', '', NULL, '0.00', '003MBTW0110'),
(460, 6, 'M', '2019-2020', 'B', 'Umma Samiya Wantika ', '003MBMBTW0111', 24, 53, '11', '2012-05-01', '663, Middle Monipur, Mirpur Dhaka - 1216', 'Gupti Gwole Bazar Fridgonj Chodpur ', 'Md. Shakhoyat Hossan ', 'Private Service', NULL, 'Mst. Kamrannher', '01869054758', 'House Wife', '01924527164', NULL, '', 'F', '2019-01-20', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-20', '01869054758', '', NULL, '0.00', '003MBTW0111'),
(461, 6, 'D', '2019-2020', 'B', 'Md. Jisun Mullik ', '003DBDBTH0101', 25, 55, '1', '2011-06-25', '990. East Monipur Mirpur Dhaka -1216', 'Vill. Makahite, PO. Munshigonj ', 'Md. Ikbal Mullik ', 'Business', NULL, 'Jasmin Akter ', '01910761859', 'House Wife', '01910761859', NULL, '', 'M', '2019-01-21', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-21', '01910761859', '', NULL, '0.00', '003DBTH0101'),
(462, 4, 'D', '2019-2020', 'B', 'Sameeha zaheen', '001DB033501', 41, 85, '1', '2010-11-12', '762/10, Monipur Mirpur-2 Dhaka-1216', '', 'Mohammad Musfequs Saeheen', 'Private Service', NULL, 'Jannatul Ferdush', '01811667788', 'House Wife', '01819790408', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(463, 4, 'D', '2019-2020', 'B', 'Kaniz Fatema', '001DB033502', 41, 85, '2', '2010-07-20', '1035 East Monipur, Mirpur Dhaka-1216', '', 'Hosian Kibria ', 'Business', NULL, 'Tahamina', '01726880241', 'House Wife', '01737686722', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(464, 4, 'D', '2019-2020', 'B', 'Samia Khan', '001DB033503', 41, 85, '3', '2010-07-06', '57 Borobag, Mirpur -2 ', '', 'Kamal', 'Business', NULL, 'Jasmin', '01714446756', 'House Wife', '01714446757', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(465, 4, 'D', '2019-2020', 'B', 'Habiba Rahman Rose', '001DB033504', 41, 85, '4', '2010-04-10', '715 Monipur, Mirpur-2 Dhaka-1216', '', 'Habibur Rahman', 'Business', NULL, 'Misses Rita', '01721932879', 'House Wife', '01754540587', NULL, '', 'F', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(466, 4, 'D', '2019-2020', 'B', 'Tahnica', '001DB033505', 41, 85, '5', '2010-12-03', '841, Middle Monipur Mirpur, Dhaka-1216', '', 'MD. Murshedul Haque', 'Govt Service', NULL, 'Kamrun Nahar', '01753498447', 'House Wife', '01716968772', NULL, '', 'F', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(467, 4, 'D', '2019-2020', 'B', 'Tammana Tasnim Ohana', '001DB082201', 16, 40, '1', '2007-10-02', '29/2B Middle Paikpara , Mirpur, Dhaka-1216', '', 'Samsul Huda', 'Private Service', NULL, 'Jesmin Sultana', '01775014866', 'House Wife', '01817079159', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(468, 4, 'D', '2019-2020', 'B', 'Nusrat Jahan', '001DB060502', 14, 23, '2', '2007-02-14', '338/2 North Monipur Mirpur-2, Dhaka-1216', '', 'Harunar Rashid', 'Govt Service', NULL, 'Afroza Khanom', '01724149694', 'House Wife', '01712588352', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(469, 4, 'D', '2019-2020', 'B', 'Iptida Ariana Peu', '001DB082202', 16, 40, '2', '2004-04-14', '1083/1, East Monipur Mirpur-2', '', 'Dr. Jahangir Alam', 'Private Service', NULL, 'Sehely Islam', '01776797064', 'House Wife', '01712027371', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(470, 4, 'D', '2019-2020', 'B', 'Dipa Das', '001DB060503', 14, 23, '3', '2008-12-21', '2/3-B, Brobag', '', 'Prodip Kumar Das', 'Private Service', NULL, 'Dipti Sarker', '01727442770', 'Private Service', '01715434913', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Hindu', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(471, 4, 'D', '2019-2020', 'B', 'Meher Afroz', '001DB082203', 16, 40, '3', '2006-07-14', '64/1A, Shah Ali Bagh Mirpur-1 Dhaka-1216', '', 'MD. Sharower Hossain', 'Business', NULL, 'Kaorsheda Begum', '01400525707', 'House Wife', '01552469989', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(472, 4, 'M', '2019-2020', 'B', 'Minhazul Islam', '001MB082110', 16, 39, '10', '2005-06-09', '52/9 Ahmad Nagor Mirpur-1, Dhaka-1216', '', 'MD. Motalab', 'Private Service', NULL, 'Halima Khatun', '01758109926', 'House Wife', '01758109926', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(473, 4, 'D', '2019-2020', 'B', 'Sadia Omy', '001DB082204', 16, 40, '4', '2005-08-04', '239/4/1 Pabna Goli, Prearbag Mirpur-1, Dhaka-1216', '', 'Mohammad Oliulla', 'Business', NULL, 'Ferdousi Akter', '01672951845', 'House Wife', '01672592257', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(474, 4, 'D', '2019-2020', 'B', 'Kamrun Nahar Kona', '001DB082205', 16, 40, '5', '2006-09-08', '1022 East Monipur, Mirpur-2', '', 'MD. Abdul Karim', 'Private Service', NULL, 'Yeasmin Akter', '01735160369', 'House Wife', '01712684258', NULL, '', 'F', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-21', '', '', NULL, '0.00', NULL),
(475, 6, 'M', '2019-2020', 'B', 'Tabassum Jannat Maria ', '003MBTH0101', 25, 55, '1', '2010-05-25', '101 Shenpara Mirpur Dhaka -1216', '101 Shenpara Mirpur Dhaka -1216', 'Jihadul Islam ', 'Private Service', NULL, 'Dulal ', '01', 'House Wife', '01', NULL, '', 'F', '2019-01-22', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-22', '01', '', NULL, '0.00', NULL),
(476, 6, 'M', '2019-2020', 'B', 'Adnan Rafie ', '003MBTH0102', 25, 55, '2', '2010-10-22', '111, Jonota House Mirpur Dhaka -1216', 'Shirkordi Kumonkhuli ', 'Md. Abu Rasel ', 'Private Service', NULL, 'Fahmida Khanom ', '01772069076', 'House Wife', '017400900178', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '', '', NULL, '0.00', NULL),
(477, 6, 'M', '2019-2020', 'B', 'Israk Hossain ', '003MBTH0103', 25, 55, '3', '2010-01-10', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Anayet Hossain ', 'Private Service', NULL, 'Mou Shumi Akter ', '01792224223', 'House Wife', '01792224223', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01792224223', '', NULL, '0.00', NULL),
(478, 6, 'M', '2019-2020', 'B', 'Md. Amir Hamja ', '003MBTH0104', 25, 55, '4', '2010-10-02', '', '', 'Ariful Islam ', 'Business', NULL, 'Rehama Begum', '01814783597', 'House Wife', '01814784562', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '1203, East Monipur Mirpur Dhaka -1213', 'Gomana Kamarkhali Modhalhdi Fordpur ', NULL, '0.00', NULL),
(479, 6, 'M', '2019-2020', 'B', 'Md. Rohen ISlam Nahid ', '003MBTH0105', 25, 55, '5', '2010-11-01', '40 Shenpara Mirpur Dhaka -1216', '40 Shenpara Mirpur Dhaka -1216', 'Md. Rezaul Karim ', 'Business', NULL, 'Mrs. Nazma Begum ', '01736519159', 'House Wife', '01718653736', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01736519159', '', NULL, '0.00', NULL),
(480, 6, 'M', '2019-2020', 'B', 'Mithila ', '003MBTH0106', 25, 55, '6', '2009-12-16', '1240/1, East Monipur Mirpur Dhaka -1216', '1240/1, East Monipur Mirpur Dhaka -1216', 'Md. Ali ', 'Private Service', NULL, 'Hena Begum', '01991097647', 'House Wife', '01677482295', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01991097647', '', NULL, '0.00', NULL),
(481, 6, 'M', '2019-2020', 'B', 'Akila Rahman ', '003MBTH0107', 25, 55, '7', '2011-11-03', 'East, monipur Mirpur Dhaka -1216 ', 'Vill. Eshangopalpur Faridpur ', 'Mohammad Ali', 'Private Service', NULL, 'Shirin Akter ', '01912150951', 'House Wife', '01912150951', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01912150951', '', NULL, '0.00', NULL),
(482, 6, 'M', '2019-2020', 'B', 'Md. Sabbir Rahman ', '003MBTH0108', 25, 55, '8', '2009-08-09', 'Monipur Mirpur  Dhaka -1216', 'Monipur Mirpur  Dhaka -1216', 'Ahidur Rahman ', 'Business', NULL, 'Rokya Begum ', '01948148003', 'House Wife', '01948148003', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01948148003', '', NULL, '0.00', NULL),
(483, 6, 'M', '2019-2020', 'B', 'Rudba Afrin Tajji ', '003MBTH0109', 25, 55, '9', '2011-11-19', '1119/1118, East Monipur Mirpur Dhaka -1216', '1119/1118, East Monipur Mirpur Dhaka -1216', 'Monirujjaman Manir ', 'Business', NULL, 'Sadia Afrin Oishi ', '01912715634', 'House Wife', '01627284197', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01912715634', '', NULL, '0.00', NULL),
(484, 6, 'M', '2019-2020', 'B', 'Md. Al. Amin ', '003MBTH0110', 25, 55, '10', '1970-01-01', 'Mirpur Thana Monipur Dhaka -1216', 'Borisal ', 'Md. Nazrul Islam ', 'Govt Service', NULL, 'Mrs. Asma Begum ', '01817263492', 'House Wife', '01710622350', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01817263492', '', NULL, '0.00', NULL),
(485, 6, 'M', '2019-2020', 'B', 'Nowshin Sayera Esha ', '003MBTH0111', 25, 55, '11', '2010-10-12', '1263/3 East Monipur Mirpur Dhaka -1216', 'Khader Gaan Moflob Chadpur ', 'Munsur Ahamed ', 'Others', NULL, 'Kanis Fatima ', '01613623762', 'House Wife', '01713623762', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01613623762', '', NULL, '0.00', NULL),
(486, 6, 'M', '2019-2020', 'B', 'Tamanna Akter Mim', '003MBTH0112', 25, 55, '12', '2010-05-17', '1167, East Monipur Mirpur Dhaka -1216', 'Bikrampur', 'Abdul Majid Molla ', 'Business', NULL, 'Sapna Akter ', '01933361910', 'House Wife', '01933361910', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01933361910', '', NULL, '0.00', NULL),
(487, 6, 'M', '2019-2020', 'B', 'Yamin Hosen Tahson ', '003MBTH0113', 25, 55, '13', '2010-01-21', '1039/1 East Monipur Mirpur Dhaka -1216', 'Royon Rojor Madeirepur ', 'Md. Sentu Hosen', 'Business', NULL, 'Ikra Begum', '01965965497', 'House Wife', '01776797671', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01965965497', '', NULL, '0.00', NULL),
(488, 6, 'M', '2019-2020', 'B', 'Ahnaf Tazwar Eram', '003MBTH0114', 25, 55, '14', '1970-01-01', '948/2 Khanarmor Mirpur Dhaka -1216', 'Jagua, Jagua hat Kutahli ', 'Md. Sidul Islam ', 'Business', NULL, 'Mahamuda Rahan Nitu ', '01941552680', 'House Wife', '01941552680', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01941552680', '', NULL, '0.00', NULL),
(489, 6, 'M', '2019-2020', 'B', 'Md. Aynal Islam Aumlan ', '003MBTH0115', 25, 55, '15', '1970-01-01', '981Middle Monipur Dhaka -1216', '981Middle Monipur Dhaka -1216', 'Md. Anowar Hosan ', 'Business', NULL, 'Taslima Begum ', '01884914983', 'House Wife', '01884914983', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01884914983', '', NULL, '0.00', NULL),
(490, 6, 'M', '2019-2020', 'B', 'Mashrufa Tasnim ', '003MBTH0116', 25, 55, '16', '2010-10-20', '58/6. Shen Para Mirpur Dhaka -1216', 'Vill. Bondo Chorpara O.P. Hadira, Dist. Tangial ', 'Hafeza Md. Eiles ', 'Private Service', NULL, 'Moriom', '01741692212', 'House Wife', '01741692212', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01741692212', '', NULL, '0.00', NULL),
(491, 6, 'M', '2019-2020', 'B', 'Md. Shakib Hossain ', '003MBTH0117', 25, 55, '17', '1970-01-01', '994. Middle Monipur Mirpur Dhaka -1216', 'vill. Singhoira PO. Kholabari P.S. Modhupur Tangail', 'Md. Mannan ', 'Business', NULL, 'Shalima Begum ', '01792414993', 'House Wife', '01792414993', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01792414993', '', NULL, '0.00', NULL),
(492, 4, 'D', '2019-2020', 'B', 'Asma Ul Husna (Hiya)', '001DB082206', 16, 40, '6', '2005-01-01', '39/2 Dhankheter Mor, Shahalibag, Dhaka-1216', '', 'Hashem Ali', 'Private Service', NULL, 'Momotaz Khatun', '01716389747', 'House Wife', '01713371403', NULL, '', 'F', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(493, 4, 'D', '2019-2020', 'B', 'Shabia Tasnim orchi', '001DB082207', 16, 40, '7', '2006-07-22', '1055/2 East Monipur Mirpur-2, Dhaka-1216', '', 'Abdul Owahab Khan', 'Private Service', NULL, 'Monara Begum', '01918543926', 'Govt Service', '01988984833', NULL, '', 'F', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(494, 4, 'D', '2019-2020', 'B', 'Tahmeed Hassan Sun', '001DB033401', 41, 84, '1', '2010-09-26', '982/B, Monipur Mirpur-2 Dhaka-1216', '', 'Bozulur Rahman', 'Private Service', NULL, 'Tahamena Akter', '01912544036', 'House Wife', '01674308857', NULL, '', 'M', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(495, 4, 'M', '2019-2020', 'B', 'Sabina Jahan Mona', '001MB033301', 41, 83, '1', '2010-09-08', '100/A Borobag, Mirpur-2, Dhaka-1216', '', 'Monayem Khan', 'Business', NULL, 'Masuda Begum', '01742396721', 'House Wife', '01740574326', NULL, '', 'F', '2018-12-19', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(496, 6, 'M', '2019-2020', 'B', 'Nusrat Jahan Nur ', '003MBTH0118', 25, 55, '18', '2012-03-26', '741, East Monipur Mirpur Dhaka -1216', 'Vill. Tapal Bari P.O, Raenda Dis- Bagerhat ', 'Kobir Hosen ', 'Business', NULL, 'Khadija', '019928545731', 'House Wife', '019928545731', NULL, '', 'F', '2012-03-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '019928545731', '', NULL, '0.00', NULL),
(497, 6, 'M', '2019-2020', 'B', 'Aduri ', '003MBTH0119', 25, 55, '19', '1970-01-01', 'East Monipur Mirpur Dhaka -1216', 'Vill. Tapal Bari P.S. Rayenda, Bagherhat', 'Asadul Sheikh ', 'Business', NULL, 'Asia Begum ', '019928545731', 'House Wife', '019928545731', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '019928545731', '', NULL, '0.00', NULL),
(498, 4, 'M', '2019-2020', 'B', 'Nazifa Sultana Tisha', '001MB033302', 41, 83, '2', '2010-09-14', '1003 Katal Tola, Monipur Mirpur-2, Dhaka', '', 'Kazi Abdul Aziz', 'Business', NULL, 'Let. Naiyma', '01686408227', 'Others', '01686408227', NULL, '', 'F', '2018-12-23', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(499, 4, 'M', '2019-2020', 'B', 'Jannatul Mowa', '001MB033303', 41, 83, '3', '2010-10-28', '57 Brobag, Mirpur-2 Dhaka-1216', '', 'Shihab Hossain', 'Private Service', NULL, 'Mousumi Atair', '01869706714', 'House Wife', '01552358070', NULL, '', 'F', '2018-12-24', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(500, 4, 'M', '2019-2020', 'B', 'Sharin Sara Chand', '001MB033304', 41, 83, '4', '2009-10-11', '94/3 Darussalam Mirpur, Dhaka', '', 'MD. Sayem Ahamed', 'Business', NULL, 'Zharna Akter', '01918389040', 'House Wife', '01911384050', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(501, 4, 'M', '2019-2020', 'B', 'Sabiha Sabrin', '001MB033305', 41, 83, '5', '2010-09-28', '138/A Middle Paikpara, Mirpur-1 Dhaka-1216', '', 'Abdul Bashar', 'Private Service', NULL, 'Mis Amena', '01763652097', 'House Wife', '01818619063', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(502, 6, 'M', '2019-2020', 'B', 'Najmus Sakib Hridoy ', '003MBTH0120', 25, 55, '20', '1970-01-01', '925, Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Sumon Khan ', 'Private Service', NULL, 'Mrs Koli ', '01720222328', 'House Wife', '01720222328', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01720222328', '', NULL, '0.00', NULL),
(503, 4, 'M', '2019-2020', 'B', 'Noshin Saiyara', '001MB033306', 41, 83, '6', '2010-10-04', '90/3, Middle Paikpara Mirpur-1, Dhaka-1216', '', 'Srajul Islam', 'Private Service', NULL, 'Arifa Akter', '01717864647', 'House Wife', '01712290157', NULL, '', 'F', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(504, 4, 'M', '2019-2020', 'B', 'Mohima Mostafa (Mohima)', '001MB033307', 41, 83, '7', '2010-10-20', '522/2 South Monipur, Mirpur Dhaka', '', 'MD. Jamal uddin', 'Govt Service', NULL, 'Hosna ara Khan', '01716156721, 01921466239', 'House Wife', '01713927865, 01914878515', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(505, 4, 'M', '2019-2020', 'B', 'Zara', '001MB033308', 41, 83, '8', '2010-08-27', '863/2 Amtla Mosjid modda Monipur, Mirpur-2 Dhaka-1216', '', 'Sorwar Hossain', 'Private Service', NULL, 'Rozina Akter', '01719279176', 'House Wife', '01738655789', NULL, '', 'F', '2019-01-06', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(506, 4, 'M', '2019-2020', 'B', 'Asfia tislam Tanni', '001MB033309', 41, 83, '9', '2011-03-11', '796, Monipur', '', 'Ajaharul islam', 'Business', NULL, 'Rawnak jhan', '01715078632', 'House Wife', '01713581806', NULL, '', 'F', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(507, 4, 'M', '2019-2020', 'B', 'Tangila Akter Remi', '001MB033310', 41, 83, '10', '2010-11-15', '1/F North South Darusalam Road Mirpur-1 Dhaka', '', 'MD. Roni', 'Business', NULL, 'Kuhinor Begum', '01924217878', 'House Wife', '01675703882', NULL, '', 'F', '2018-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(508, 6, 'M', '2019-2020', 'B', 'Farhanur Rahman Bhuiyan Omi', '003MBTH0121', 25, 55, '21', '2102-07-04', 'H-913 Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Fazulr Rahman Bhuyan ', 'Business', NULL, 'Onu ', '01942842787', 'House Wife', '01726694948', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01942842787', '', NULL, '0.00', NULL),
(509, 4, 'M', '2019-2020', 'B', 'Sadia Akter', '001MB033311', 41, 83, '11', '2010-06-21', '928/1 Middle Monipur, Mirpur-2 Dhaka-1216', '', 'Samsul Haque', 'Teacher', NULL, 'Azmire', '01914053998', 'House Wife', '01922556198', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(510, 4, 'M', '2019-2020', 'B', 'Fariha Zaman Riya', '001MB033312', 41, 83, '12', '2010-11-01', '695/1A Molla Road Monipur, Mirpur-2 Dhaka-1216', '', 'Fariduzzaman', 'Private Service', NULL, 'Romana Parvin', '01916143264', 'House Wife', '01916143261', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(511, 4, 'M', '2019-2020', 'B', 'Prottasha', '001MB033313', 41, 83, '13', '2010-08-30', '678/1 Molla Road Monipr, Mirpur-2 Dhaka-1216', '', 'Jalal Uddin( Emon)', 'Private Service', NULL, 'Masuda Akter', '01923844152', 'House Wife', '01921699385', NULL, '', 'F', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(512, 4, 'M', '2019-2020', 'B', 'Adiba Amin Luba', '001MB033314', 41, 83, '14', '2010-03-01', '61/2, Jonaki Road, Mirpur-1', '', 'MD. Amin', 'Private Service', NULL, 'Diba Akter', '01942253134', 'House Wife', '01719888660', NULL, '', 'F', '2018-11-29', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-23', '', '', NULL, '0.00', NULL),
(513, 6, 'D', '2019-2020', 'B', 'Suborna Akter Mili', '003DBFO0201', 26, 56, '1', '2009-02-02', '951, East Monipur Mirpur Dhaka -1216', 'Vill. Didarulla Dis. Vola', 'Abdul Mannan ', 'Business', NULL, 'Suma Akter ', '01749963127', 'House Wife', '01724486021', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01749963127', '', NULL, '0.00', NULL),
(514, 6, 'D', '2019-2020', 'B', 'Choyonika Rashed Voor ', '003DBFO0202', 26, 56, '2', '2008-11-26', '1083, East Monipur Mirpur Dhaka -1216', 'Same ', 'Rashed Ahamed ', 'Business', NULL, 'Fahamida Rashed ', '01815175821 ', 'House Wife', '01533403082', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01815175821 ', '', NULL, '0.00', NULL),
(515, 6, 'D', '2019-2020', 'B', 'Avirup Chandra Pual', '003DBFO0203', 26, 56, '3', '2009-10-17', 'East Monipur mirpur Dhaka -1216\r\n\r\n\r\n', 'Same ', 'Suman Chandra Pual ', 'Private Service', NULL, 'Shanjita Rani Pual ', '01754901435', 'House Wife', '01754901435', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-23', '01754901435', '', NULL, '0.00', NULL),
(516, 6, 'D', '2019-2020', 'B', 'Boishakhi Podder ', '003DBFO0204', 26, 56, '4', '2009-12-24', '993. Middle Monipur Mirpur Dhaka -1216', 'Vill + P.O - Jogania P.S. Naragati Dist. Narail ', 'Bidhan Kumar Podder ', 'Private Service', NULL, 'Sadnan Podder ', '01720956041', 'House Wife', '01720956041', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-23', '01720956041', '', NULL, '0.00', NULL),
(517, 6, 'D', '2019-2020', 'B', 'Jannatul Ferdous ', '003DBFO0205', 26, 56, '5', '1970-01-01', '903 Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Jasim Uddin ', 'Business', NULL, 'Reno Begum', 'Due ', 'House Wife', 'Due ', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', 'Due ', '', NULL, '0.00', NULL),
(518, 6, 'D', '2019-2020', 'B', 'Tateba Akter Happy ', '003DBFO0206', 26, 56, '6', '1970-01-01', '722, Kazipara Mirpur Dhaka -1216', 'Same ', 'Md. Aiub Ali ', 'Private Service', NULL, 'Khadiza Akter ', '01966160198', 'House Wife', '01966160198', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01966160198', '', NULL, '0.00', NULL),
(519, 6, 'D', '2019-2020', 'B', 'Hasan Al Sima ', '003DBFO0207', 26, 56, '7', '2008-09-10', '1205 Monipur Mirpur Dhaka -1216', 'Vill. Bokirbit Plo. Modhopur Tangile ', 'Md. Roni Hasan ', 'Private Service', NULL, 'Champa Khanom', '01675126242', 'House Wife', '01715620071', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01675126242', '', NULL, '0.00', NULL),
(520, 6, 'D', '2019-2020', 'B', 'Md. Toufique Uddin ', '003DBFO0208', 26, 56, '8', '2010-09-15', 'East Monipur Mirpur Dhaka -1216', 'Kalihati Tangali ', 'Md. nasir Uddin ', 'Business', NULL, 'Taslim ', '01970807383', 'House Wife', '01970807384', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01970807383', '', NULL, '0.00', NULL),
(521, 6, 'D', '2019-2020', 'B', 'Rian Rahaman ', '003DBFO0209', 26, 56, '9', '2009-04-01', 'Alina Tawar Block I Road Flat 8 Mirpur Dhaka -1216', 'Same ', 'M. Hayder Shams ', 'Business', NULL, 'Afroja Akter ', '01680877299', 'House Wife', '01680877299', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01680877299', '', NULL, '0.00', NULL),
(522, 6, 'D', '2019-2020', 'B', 'Lalon Monosmita ', '003DBFO0210', 26, 56, '10', '2010-12-25', '157(4th Flr) 4. Janata Housing  ', 'Ghosh povea Thakurgaon 5100', 'Due ', 'Others', NULL, 'Jamila Bupaska ', '017122848224', 'Private Service', 'Due ', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '017122848224', '', NULL, '0.00', NULL),
(523, 6, 'D', '2019-2020', 'B', 'Rukayia Jahan Tanisha ', '003DBFO0211', 26, 56, '11', '2010-05-16', '194/1, East Shewrapara Mirpur Dhaka -1216', 'Vill. Caguria P.O. Gutia Dis Barisal ', 'Mohammad Saiful Islam ', 'Private Service', NULL, 'Ruma Akter ', '0176614235', 'House Wife', '0176788893', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '0176614235', '', NULL, '0.00', NULL),
(524, 6, 'D', '2019-2020', 'B', 'Joti Halder ', '003DBFO0212', 26, 56, '12', '1970-01-01', '950 East Monipur Mirpur Dhaka -1216', 'Same ', 'Jontu Lal Halder ', 'Private Service', NULL, 'Lili Bala Sadhon ', '01686183405', 'Private Service', '01639456533', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Hindu', NULL, 36, '2019-01-23', '01686183405', '', NULL, '0.00', NULL),
(525, 6, 'D', '2019-2020', 'B', 'Md. Sajjad Kazi ', '003DBFO0213', 26, 56, '13', '1970-01-01', '55, East Monipur Mirpur Dhaka ', 'Same ', 'Md. Aslam Kazi ', 'Private Service', NULL, 'Saleha ', '01733742021', 'House Wife', '01733742021', NULL, '', 'M', '1970-01-01', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01733742021', '', NULL, '0.00', NULL),
(526, 6, 'D', '2019-2020', 'B', 'Maimuna Akter ', '003DBFO0214', 26, 56, '14', '2009-03-12', '863/1, Middle Monipur Mirpur Dhaka -1216', 'Kuliarchor Kishone onj ', 'Hannan Mia', 'Private Service', NULL, 'Khusbu Khanom ', '01921619922', 'Private Service', '01911161802', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01921619922', '', NULL, '0.00', NULL),
(527, 6, 'D', '2019-2020', 'B', 'Afrida Anjum Adrita ', '003DBFO0215', 26, 56, '15', '2009-07-25', '1006/5. East Monipur Mirpur Dhaka -1216', 'Vill. Itbaria Shenbagh Noakhali ', 'Anwar Hosan ', 'Private Service', NULL, 'Anwwara Begum ', '01748973527', 'House Wife', '01748973527', NULL, '', 'F', '2009-07-25', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01748973527', '', NULL, '0.00', NULL),
(528, 6, 'D', '2019-2020', 'B', '       Mehenur Akter ', '003DBFO0216', 26, 56, '16', '2010-01-01', '693/1 Monipur Mirpur Dhaka 1216', 'Vill. Protappur P.O Cadet College P.sAirport Barishal ', 'Mhamud Hasan ', 'Business', NULL, 'Afroja Akter ', '01716133696', 'House Wife', '01715116133', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01716133696', '', NULL, '0.00', NULL),
(529, 6, 'D', '2019-2020', 'B', 'Nusrat Jahan Orpi ', '003DBFO0217', 26, 56, '17', '2007-07-08', '134/3 Shen Para Mirpur Dhaka -1216', 'Same ', 'Md. Nasir Hossain ', 'Private Service', NULL, 'Gazi Asma ', '01765589657', 'House Wife', '01765589657', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01765589657', '', NULL, '0.00', NULL),
(530, 6, 'D', '2019-2020', 'B', 'Mashrafi Molla ', '003DBFO0218', 26, 56, '18', '2009-02-27', 'Amtola Monipur Mirpur Dhaka -1216', 'Vill, Barisal ', 'Belal Hossain ', 'Private Service', NULL, 'Monhi Begum ', '01707771751', 'House Wife', '01707771751', NULL, '', 'M', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01707771751', '', NULL, '0.00', NULL),
(531, 6, 'D', '2019-2020', 'B', 'Mrs. Munira ', '003DBFO0219', 26, 56, '19', '1970-01-01', '1127/ East Monipur Mirpur Dhaka -1216', 'Balehami Perojpur ', 'Md. Abu Sateid ', 'Private Service', NULL, 'Shaila ', '01953647080', 'House Wife', '01953647080', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01953647080', '', NULL, '0.00', NULL),
(532, 6, 'D', '2019-2020', 'B', 'Robeya Bosri Purnota ', '003DBFO0220', 26, 56, '20', '1970-01-01', '923/2 Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Johurul Islam ', 'Private Service', NULL, 'Tamanna Montaj', '01732302427', 'House Wife', '01717176394', NULL, '', 'F', '2019-01-23', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-23', '01732302427', '', NULL, '0.00', NULL),
(533, 6, 'D', '2019-2020', 'B', 'Khadija Khatun ', '003DFI0201', 27, 57, '1', '2008-09-29', '670/2, East Monipur Mirpur Dhaka -1216', 'Same ', 'Khorshed Alam ', 'Business', NULL, 'Shahanaz Begum ', '01938718153', 'House Wife', '01938718153', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01938718153', '', NULL, '0.00', NULL),
(534, 6, 'D', '2019-2020', 'B', 'Mim Akter Bristy', '003DBFI0202', 27, 57, '2', '1970-01-01', '855/1. East Monipur Mirpur Dhaka -1216', 'Same ', 'Alauddin Howlader ', 'Business', NULL, 'Resma Begum ', '01986810461', 'House Wife', '01986810461', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01986810461', '', NULL, '0.00', NULL),
(535, 6, 'D', '2019-2020', 'B', 'Sumaya Akter ', '003DBFI0203', 27, 57, '3', '1970-01-01', '855/1, East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Shohel ', 'Private Service', NULL, 'Asma ', '01933788424', 'House Wife', '01933788424', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01933788424', '', NULL, '0.00', NULL),
(536, 6, 'D', '2019-2020', 'B', 'Md. Rifat Hosan ', '003DBFI0204', 27, 57, '4', '2009-01-16', 'South Monipur Mirpur Dhaka -1216', 'Bhadenas Kouoha Borgona ', 'Md. Abdul Manan Ali', 'Business', NULL, 'Mrs. Raksana Begun ', '01718964489', 'House Wife', '01718964489', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01718964489', '', NULL, '0.00', NULL),
(537, 6, 'D', '2019-2020', 'B', 'Md. Rifat Hosan ', '003DBFI0205', 27, 57, '5', '2009-01-16', 'South Monipur Mirpur Dhaka -1216', 'Borgona ', 'Md. Abdul Manan Ali', 'Business', NULL, 'Mrs. Raksana Begun ', '01718964489', 'House Wife', '01718964489', NULL, '', 'M', '2009-01-16', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01718964489', '', NULL, '0.00', NULL),
(538, 6, 'D', '2019-2020', 'B', 'Lamia Jahan Mim', '003DBFI0206', 27, 57, '6', '2008-08-10', '54, Senpara Parbota Mirpur Dhaka -1216', 'Vill. Semgra P.O. Semgra Bagan Chandpur ', 'Md. Jewel Rana ', 'Business', NULL, 'Farjana Yesmin ', '01913460858', 'House Wife', '01913460858', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01913460858', '', NULL, '0.00', NULL),
(539, 4, 'D', '2019-2020', 'B', 'Shariar Omar', '001DB033402', 41, 84, '2', '2010-10-30', '52/1 Haq Vila East Ahmad Nagor, Mirpur-1', '', 'MD. Kamrul Islam', 'Others', NULL, 'Tahmina Parvin', '01797253068', 'House Wife', '01797253068', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(540, 4, 'D', '2019-2020', 'B', 'Rayyan Rameen', '001DB033403', 41, 84, '3', '2010-08-29', '334, Akota Road, Ahammed Nagor, Paikpara Mirpur-1', '', 'Raquibul Hasan', 'Private Service', NULL, 'Mst. Zebunnaher', '01717920891', 'House Wife', '01717853122', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(541, 6, 'D', '2019-2020', 'B', 'Mithila Mahjabeen ', '003DBFI0207', 27, 57, '7', '1970-01-01', 'Monipur. Mirpur Dhaka -1216', 'Village. Kagdi , P.O. Fulbarahat P.S. Saltha, Dist, Faridpur ', 'Md. Morad Hossain ', 'Business', NULL, 'Nasreen Nahar ', '01750125809', 'House Wife', '01790643908', NULL, '', 'F', '1970-01-01', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '', '', NULL, '0.00', NULL),
(542, 4, 'D', '2019-2020', 'B', 'MD. Asimul Alam Rihan', '001DB033404', 41, 84, '4', '2010-08-03', 'House -10/3/B, Al-Modina Road East Ahammad Nagor, Mirpur-1, Dhaka-1216', '', 'MD. Zahidul ALam (Zahid)', 'Private Service', NULL, 'Shurovi Kharun', '01778876200', 'Private Service', '01714200170', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(543, 6, 'D', '2019-2020', 'B', 'Nur Mohammad Sany', '003DBFI0208', 27, 57, '8', '1970-01-01', '1087, East Monipur Mirpur Dhaka -1216', 'Vill, Mojatirchor para P.O. Muktagaca ', 'Md. Anisul Haque ', 'Private Service', NULL, 'Mrs. Shahana Haque ', '01914232257', 'House Wife', '01914232257', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01914232257', '', NULL, '0.00', NULL),
(544, 4, 'D', '2019-2020', 'B', 'Towhidur Rahman', '001DB033405', 41, 84, '5', '2010-06-08', '59/1 West Monipur, Mirpur-2', '', 'Shohel Ahmed', 'Business', NULL, 'Kamrun Nahar', '01948209776', 'House Wife', '01924707451', NULL, '', 'M', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(545, 4, 'D', '2019-2020', 'B', 'MD.Mahidi Islam', '001DB033406', 41, 84, '6', '2009-11-21', 'Sha Ali Bag, Mirpur-2, Dhaka-1216', '', 'MD. Mazidul Islam', 'Govt Service', NULL, 'Kanis Fateima', '01775021326', 'House Wife', '01792033567', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(546, 4, 'D', '2019-2020', 'B', 'MD. Rurayet Rashik', '001DB033407', 41, 84, '7', '2010-11-17', '2/8/E, Bardon Bari, Mirpur-1', '', 'MD. Rafiquel Islam', 'Govt Service', NULL, 'Rokhsana Afrin', '01719354232', 'Govt Service', '01711024281', NULL, '', 'M', '2018-12-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(547, 4, 'D', '2019-2020', 'B', 'Icon Mandol Dipta', '001DB033408', 41, 84, '8', '2011-01-11', '2/2, Tolarbag Mirpur-1, Dhaka-1216', '', 'Bikash Chandol Mandol', 'Govt Service', NULL, 'Arati Biswas', '01752025902', 'Teacher', '01710953056', NULL, '', 'M', '2018-12-22', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(548, 4, 'D', '2019-2020', 'B', 'MD. Sazid', '001DB033409', 41, 84, '9', '2010-12-16', 'H# 38/C, Senpara Mirpur-2 Dhaka', '', 'Mainul Islam', 'Private Service', NULL, 'Sanjida Akter', '01937918858', 'House Wife', '01711231608', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(549, 4, 'D', '2019-2020', 'B', 'Safin Abrar Hossain', '001DB033410', 41, 84, '10', '2010-05-03', 'H# 1030/1, East Monipur Mirpur-2 Dhaka-1216', '', 'Hosin ferdour Shsir', 'Business', NULL, 'Jarjin Akter', '01712908977', 'House Wife', '01715547187', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(550, 6, 'D', '2019-2020', 'B', 'Sadia Afreen Protiva ', '003DBFI0209', 27, 57, '9', '2008-11-18', '1041 Rose Garden Mirpur Dhaka 1216', 'Village. Rajingaon P.O. Kashipur Home Komilla ', 'Md. Abu Naser Owahed ', 'Business', NULL, 'Kuksana Begum ', '01708985800', 'House Wife', '01708985800', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01708985800', '', NULL, '0.00', NULL),
(551, 4, 'D', '2019-2020', 'B', 'Arafat Bin Boniraj', '001DB033411', 41, 84, '11', '2010-12-16', 'H# 779, Alpona Monipur Mirpur-2 Dhaka', '', 'Yeasin Arafat', 'Private Service', NULL, 'Rehana Akter', '01714243243', 'House Wife', '01788650456', NULL, '', 'M', '2018-12-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(552, 6, 'D', '2019-2020', 'B', 'Maimun Labib Ankan ', '003DBFI0210', 27, 57, '10', '2013-07-20', '126, West Monipur Mirpur Dhaka -1216', 'Chakpara cornt Station Netrokona', 'Md. Mominul Islam ', 'Private Service', NULL, 'Sabina Rahman ', '01712055348', 'House Wife', '01712055348', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01712055348', '', NULL, '0.00', NULL);
INSERT INTO `students` (`StudentId`, `BranchId`, `Shift`, `Year`, `Medium`, `StudentName`, `StudentCode`, `ClassId`, `SectionId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `FathersOccupation`, `FathersEmail`, `MothersName`, `MothersNumber`, `MothersOccupation`, `ContactNumber`, `HomeNumber`, `StudentEmail`, `Gender`, `AdmissionDate`, `StudentStatus`, `BloodGroup`, `Religion`, `StudentPhoto`, `EntryBy`, `EntryDate`, `EmergencyName`, `EmergencyNumber`, `Image`, `MonthlyWaiverAmount`, `PreviousCode`) VALUES
(553, 4, 'D', '2019-2020', 'B', 'Sharif Fiad Abdullah ', '001DB033412', 41, 84, '12', '2010-07-07', '230, Janata Housing Mirpur, Dhaka-1216', '', 'Sharif Golam Kawsar', 'Private Service', NULL, 'Afroza Akter', '01912698015', 'Teacher', '01712280733', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(554, 6, 'D', '2019-2020', 'B', 'Md. Badol Hossen ', '003DBFI0211', 27, 57, '11', '1970-01-01', '668/1, Monipur Mirpur Dhaka -1216', 'same', 'Md. Badol Hossen ', 'Govt Service', NULL, 'Nasima Begum ', '01552335893', 'House Wife', '01552335893', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01552335893', '', NULL, '0.00', NULL),
(555, 4, 'D', '2019-2020', 'B', 'Mantia Jahan Meeha', '001DB082208', 16, 40, '8', '2006-04-30', '29/2B Middle Paikpara Mirpur-1, Dhaka-1216', '', 'Jakir Hossen', 'Govt Service', NULL, 'Nazma Akter', '01678022709', 'House Wife', '01678022709', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(556, 6, 'D', '2019-2020', 'B', 'Salsabil Rohan ', '003DBFI0212', 27, 57, '12', '2008-04-18', '1086, Kathal tola East Monipur Mirpur Dhaka 1216', 'Vill. Pollakuri P.O Mohonpur Dist. Rajshahi ', 'Md. Soliman Ali ', 'Private Service', NULL, 'Mrs. Kamrunnahar ', '01723919782', 'House Wife', '01729071789', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01723919782', '', NULL, '0.00', NULL),
(557, 6, 'M', '2019-2020', 'B', 'Md. Adiyet Hossain ', '003MBNU0111', 21, 47, '11', '2015-01-14', 'Shake Monjil 51/1A Borobag Mirpur -2 Dhaka 1216', 'Vill. Nasirpur  P/P- Shadapur Kachua Chandpur ', 'Md. Alamgir Hossain ', 'Private Service', NULL, 'Nahid Sultana ', '01611146484', 'House Wife', '01713093706', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01611146484', '', NULL, '0.00', NULL),
(558, 6, 'D', '2019-2020', 'B', 'Shahidul Islam Siam ', '003DBFI0213', 27, 57, '13', '1970-01-01', 'Monipur Mirpur Dhaka 1216', 'Same ', 'Md. Selim ', 'Business', NULL, 'Mist. Sumi ', '01731012669', 'House Wife', '01731012669', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01731012669', '', NULL, '0.00', NULL),
(559, 6, 'D', '2019-2020', 'B', 'Abu Shiam Niloy ', '003DBFI0214', 27, 57, '14', '1970-01-01', '383/3, Middle Monipur Mirpur Dhaka 1216', 'Vill. Shoritpur Damokdu ', 'Md. Abjal Hosan ', 'Private Service', NULL, 'Mrs. Jahanara Begum ', '01948356096', 'House Wife', '01948356096', NULL, '', 'M', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01948356096', '', NULL, '0.00', NULL),
(560, 6, 'D', '2019-2020', 'B', 'Rufaida Karim Ipsita ', '003DBFI0215', 27, 57, '15', '1970-01-01', '366/1, North Prierbagh ', 'Dakhin Nagorpur Pabna ', 'Sajedul Karim ', 'Private Service', NULL, 'Hira ', '01775053316', 'House Wife', '01775053316', NULL, '', 'F', '2019-01-24', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-24', '01775053316', '', NULL, '0.00', NULL),
(561, 4, 'M', '2019-2020', 'B', 'Tahira Jaman', '001MB052916', 39, 77, '16', '2010-01-20', '440/1 South Monipur Mirpur, Dhaka', '', 'MD. Roknuzzaman', 'Private Service', NULL, 'Ms. Shamjeda Parvin', '01712222339', 'House Wife', '01819556485', NULL, '', 'F', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(562, 4, 'M', '2019-2020', 'B', 'Sahjida Yeasmin', '001MB052917', 39, 77, '17', '2008-11-16', 'Sector-06,Block ka Road-04 House-01 Mirpur, Dhaka-1216', '', 'Abdul Sattar', 'Business', NULL, 'Halima Khatun ', '01775476293', 'House Wife', '01881659416', NULL, '', 'F', '2019-01-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(563, 4, 'D', '2019-2020', 'B', 'Abid Abdullah Ragib', '001DB052718', 39, 75, '18', '2008-08-18', '261, East Kazipara Dhaka-1216', '', 'Elius Mia', 'Govt Service', NULL, 'Rumana Sultana', '01718578755', 'House Wife', '01711200450', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(564, 4, 'D', '2019-2020', 'B', 'Rafi Ahsan', '001DB052719', 39, 75, '19', '2008-06-04', 'E/17/ 3rd Colony Bosopara Mirpur Dhaka-1216', '', 'Zahid Kamal ', 'Business', NULL, 'Sirin AKter', '01747878625', 'House Wife', '01714920005', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(565, 4, 'D', '2019-2020', 'B', 'Taokin Nahian', '001DB052720', 39, 75, '20', '2008-03-17', '172 Middle Paik para Mirpur-1 Dhaka-1216', '', 'Emon', 'Business', NULL, 'Shapla', '01717626306', 'House Wife', '01785298242', NULL, '', 'M', '2019-01-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(566, 4, 'D', '2019-2020', 'B', 'Farhan Karim ', '001DB052721', 39, 75, '21', '2008-07-25', '1026/1, Monipur Mirpur-2 Dhaka -1216', '', 'MD. Rezaul Karim ', 'Private Service', NULL, 'Konika Laila ', '01911011327', 'House Wife', '01914702746', NULL, '', 'M', '2019-01-07', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(567, 4, 'D', '2019-2020', 'B', 'Nabil Molla', '001DB052722', 39, 75, '22', '2008-02-23', '229 Monipur Mirpur Dhaka', '', 'MD. Mosharaf Hossain Molla', 'Business', NULL, 'Najnin Akter Nisa', '01842314000', 'House Wife', '01711314000', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(568, 4, 'D', '2019-2020', 'B', 'Rafiul Hasan', '001DB052723', 39, 75, '23', '2007-06-16', 'Gramin Bank Housing Mirpur-2 Dhaka-1216', '', 'Abu Naser', 'Business', NULL, 'Roksana Begum ', '01733167501', 'House Wife', '01711392359', NULL, '', 'M', '2019-01-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(569, 4, 'D', '2019-2020', 'B', 'Mahadi Islam ', '001DB052724', 39, 75, '24', '2009-02-15', '85/3 Brobag Mirpur-2 Dhaka-1216', '', 'Kamruzaman ', 'Business', NULL, 'Halima Akter', '01912776721', 'House Wife', '01843516484', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(570, 4, 'D', '2019-2020', 'B', 'K.M Nuruzaman Nabil ', '001DB052725', 39, 75, '25', '2009-10-05', '18/3 Brobag Mirpur-2 Dhaka-1216', '', 'K.M Abul Kalam Azad', 'Private Service', NULL, 'Nahar Khatun ', '01923342672', 'Private Service', '01711136902', NULL, '', 'M', '2018-12-04', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(571, 4, 'D', '2019-2020', 'B', 'Fardina Hossion (Jinia)', '001DB052812', 39, 76, '12', '2008-11-13', '137/12 C-19 Prioungon Abashik Alaka Mirpur-1 Dhaka-1216', '', 'MD. Fareq Hossain ', 'Govt Service', NULL, 'Beauty Khanam', '01711477247', 'House Wife', '01717346502', NULL, '', 'F', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(572, 4, 'D', '2019-2020', 'B', 'Tasfia Rahman Shouda', '001DB052813', 39, 76, '13', '2008-11-17', '1E/7/29 Mirpur-1 Dhaka-1216', '', 'Shalim Mullah', 'Business', NULL, 'Nasima Akter', '01932901814', 'House Wife', '01937261866', NULL, '', 'F', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(573, 4, 'D', '2019-2020', 'B', 'Amirah Binte Fayzur', '001DB052814', 39, 76, '14', '2009-05-29', '121 East Kazipara Bazar, Kafrul Mirpur Dhaka', '', 'S.M Fayzur Rahman', 'Business', NULL, 'Shelina Fatema Binte Shahid', '01715084635', 'House Wife', '01552381962', NULL, '', 'F', '2019-01-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(574, 4, 'D', '2019-2020', 'B', 'Sabikun Nahar Samira ', '001DB052815', 39, 76, '15', '2007-10-18', 'H# 125/A North Prearbag Mirpur-1 Dhaka-1216', '', 'Zahrul Islam ', 'Business', NULL, 'Asma Begum ', '01786280419', 'House Wife', '01741565333', NULL, '', 'F', '2018-12-10', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(575, 4, 'D', '2019-2020', 'B', 'Farah Anjum ', '001DB052816', 39, 76, '16', '2009-11-04', '173/5, West Agargoan Shapal Housing Dhaka-1207', '', 'DR. MD. Mizanur Rahman ', 'Private Service', NULL, 'DR. Ferdousi Begum ', '01746644043', 'Private Service', '01711131492', NULL, '', 'F', '2018-12-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(576, 4, 'M', '2019-2020', 'B', 'Mahabub Alam ', '001MB053021', 39, 78, '21', '2009-02-23', '894 Middle Monipur Mirpur-2', '', 'Nurul Alam ', 'Business', NULL, 'Aysha Begum ', '01912096788', 'House Wife', '01681049205', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(577, 4, 'M', '2019-2020', 'B', 'Tanmon Hossain Mishal ', '001MB053022', 39, 78, '22', '2008-12-25', 'R#7 H# 127 Block-E Mirpur-11', '', 'Akter Hossain ', 'Others', NULL, 'Taslima Akter', '01741653087', 'House Wife', '01741653087', NULL, '', 'M', '2019-01-10', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(578, 4, 'M', '2019-2020', 'B', 'Noman Uddin Sarker Maruf', '001MB053023', 39, 78, '23', '2008-09-08', '80/2 East Ahmad Nagor Mirpur-1', '', 'MD. Moslem Uddin Sarker', 'Business', NULL, 'Nasima Akter', '01552340360', 'House Wife', '01552342843', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(579, 4, 'M', '2019-2020', 'B', 'Mirajul Haque', '001DB053001', 39, 78, '1', '2009-10-30', '1/10 Borobag Mirpur-2 Dhaka-1216', '', 'Mojammal Haque', 'Business', NULL, 'Lipi Haque', '01717221181', 'House Wife', '01822954111', NULL, '', 'M', '2019-01-07', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(580, 4, 'M', '2019-2020', 'B', 'Labiba Mehzad Rahman', '001MB053620', 39, 79, '20', '2008-02-17', '741/1 Monipur Mirpur-2 Dhaka', '', 'MD. Mizanur Rahman ', 'Business', NULL, 'Sultana Lucky Meghla', '01924722187', 'House Wife', '01848238827', NULL, '', 'F', '2019-01-08', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(581, 4, 'M', '2019-2020', 'B', 'Kanij Fatema Afrin', '001MB053621', 39, 79, '21', '2008-03-25', '22/1 East Ahmadnagor Mirpur-1 Dhaka -1216', '', 'Ariful Islam ', 'Business', NULL, 'Anjuman Ara Tania ', '01819831570', 'House Wife', '01718163085', NULL, '', 'F', '2019-01-07', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(582, 4, 'M', '2019-2020', 'B', 'Shara Rahman ', '001MB053622', 39, 79, '22', '2009-09-03', '492/1 Monipur Mirpur-2 Dhaka-1216', '', 'MD. Mohibur Rahman ', 'Private Service', NULL, 'Fatema Khatun', '01552372095', 'House Wife', '01911232334', NULL, '', 'F', '2018-12-01', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(583, 4, 'M', '2019-2020', 'B', 'Samia Mahbub Athio', '001MB053623', 39, 79, '23', '2007-09-09', '42/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Mahabub Hasan', 'Private Service', NULL, 'Fatima Akter', '01712522561', 'House Wife', '01678062309', NULL, '', 'F', '2018-12-03', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(584, 4, 'M', '2019-2020', 'B', 'KH. Ahnag Tanjid', '001MB013801', 43, 87, '1', '2012-11-15', '535 Monipur Mirpur , Dhaka', '', 'KH. Mahfug Munzur (Monzur)', 'Private Service', NULL, 'Mrs. Khinoor Akter', '01716164803', 'House Wife', '01711476068', NULL, '', 'M', '2019-01-13', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(585, 4, 'M', '2019-2020', 'B', 'Torikul Islam Tulaib', '001MB013802', 43, 87, '2', '2013-02-28', '184 Ahmed Nagor Paikpara', '', 'MD. Abul Hashem', 'Business', NULL, 'Sabina Akter', '01533958155', 'House Wife', '01817584753', NULL, '', 'M', '2019-01-12', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(586, 4, 'M', '2019-2020', 'B', 'Rahatul Al- Karim ', '001MB013803', 43, 87, '3', '2012-11-27', '67/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Raziul Karim', 'Private Service', NULL, 'Ifty Miranan Sunthi', '01766655155', 'House Wife', '01717250068', NULL, '', 'M', '2019-01-09', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(587, 4, 'M', '2019-2020', 'B', 'Rahib Haque Sikder', '001MB013804', 43, 87, '4', '2012-11-10', '284/1 South Monipur Mirpur, Dhaka', '', 'Rafiqul Haque Shikder', 'Others', NULL, 'Tahmina Akter', '01778917571', 'House Wife', '01778917571', NULL, '', 'M', '2019-01-05', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(588, 4, 'M', '2019-2020', 'B', 'Naiyer Nubaid ', '001MB013805', 43, 87, '5', '2012-10-12', '978 East Monipur Mirpur', '', 'MD. Yiamin Ali', 'Business', NULL, 'Nahida Nasir', '01674926284', 'Teacher', '01742969041', NULL, '', 'M', '2019-01-02', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(589, 4, 'M', '2019-2020', 'B', 'Nihal Shikder', '001MB013806', 43, 87, '6', '2013-01-01', '31/1/A North Pirrerbagh Mirpur, Dhaka', '', 'MD. Nazrul Islam Shikder', 'Private Service', NULL, 'Sharmin Zerin', '01754790554', 'House Wife', '01716283386', NULL, '', 'M', '2018-11-26', 'A', 'Unknown', 'Islam', NULL, 15, '2019-01-24', '', '', NULL, '0.00', NULL),
(590, 6, 'D', '2019-2020', 'B', 'Manha Hossain ', '003DBFI0216', 27, 57, '16', '2009-09-18', '1045/2. East Monipur Mirpur Dhaka -1216', '370/A. Purbo Nasrabad Politechynec', 'Md. Shahadat Hossain ', 'Private Service', NULL, 'Khaleda Akter ', '01715346340', 'House Wife', '01711022012', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01715346340', '', NULL, '0.00', NULL),
(591, 6, 'D', '2019-2020', 'B', 'Rubaiya Hossen Dihan ', '003DBFI0217', 27, 57, '17', '2008-11-03', '1040/2, East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Monir Hossen ', 'Business', NULL, 'Ruma Akter ', '01991633355', 'House Wife', '01991633355', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01991633355', '', NULL, '0.00', NULL),
(592, 6, 'D', '2019-2020', 'B', 'Jahidur Rahaman Zisan ', '003DBFI0218', 27, 57, '18', '2009-07-26', '1200, East Monipur Mirpur Dhaka -1216', 'Vill. Baptra Chars Bhola ', 'Md. Mijanur Rahaman ', 'Private Service', NULL, 'Zharna Rahman ', '01627283729', 'House Wife', '01764519860', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01627283729', '', NULL, '0.00', NULL),
(593, 6, 'D', '2019-2020', 'B', 'Syed Amir Hamza ', '003DBFI0219', 27, 57, '19', '2010-01-01', '1030/1. Kathal Tala 7up Goli Mirpur Dhaka -1216', 'Vill, Thanmgabari P.O. Shadarpur Dist. Faridpur ', 'Syed Siddiqur Rahaman ', 'Business', NULL, 'Sayed Asma Jahan ', '01729879264', 'House Wife', '01717039065', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01729879264', '', NULL, '0.00', NULL),
(594, 6, 'D', '2019-2020', 'B', 'Muballik Islam ', '003DBFI0220', 27, 57, '20', '2008-12-10', '947/1. Middle Monipur Mirpur Dhaka -1216', '98. Giltuli Foridpur ', 'Hamidul Islam ', 'Business', NULL, 'Hosaine Gulshan ', '01679178961', 'House Wife', '01679178961', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01679178961', '', NULL, '0.00', NULL),
(595, 6, 'D', '2019-2020', 'B', 'Md. Srabon ', '003DBFI0221', 27, 57, '21', '2008-01-02', '983, Monipur Mirpuir Dhaka -1216', 'Same ', 'Md. Shajahan ', 'Business', NULL, 'Mrs. Kalpona Begum ', '01726020249', 'House Wife', '01726020249', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01726020249', '', NULL, '0.00', NULL),
(596, 6, 'D', '2019-2020', 'B', 'Fahad Mohammad ', '003DBFI0222', 27, 57, '22', '1970-01-01', '414/1. Shahin Bag Tagga ', 'Same ', 'Md. Ashraf Ali ', 'Private Service', NULL, 'Forida Yesmin ', '01715024460', 'House Wife', '01715024460', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01715024460', '', NULL, '0.00', NULL),
(597, 6, 'D', '2019-2020', 'B', 'Mrs. Muslima ', '003DBFI0223', 27, 57, '23', '1970-01-01', '1127, East Monipur Mirpur Dhaka -1216', 'Balihami ', 'Md.Abu Sayed ', 'Business', NULL, 'Shaila ', '01953647080', 'House Wife', '01953647080', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01953647080', '', NULL, '0.00', NULL),
(598, 6, 'D', '2019-2020', 'B', 'Asdia Akter Sreya ', '003DBFI0224', 27, 57, '24', '2007-08-10', 'East Monipur Mirpur Dhaka -1216', 'Same', 'Late Md. Sadik Hossain ', 'Others', NULL, 'Rakiba Akter ', '01929030882', 'House Wife', '01929030882', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01929030882', '', NULL, '0.00', NULL),
(599, 6, 'D', '2019-2020', 'B', 'Sunjida Akter ', '003DBSI0201', 28, 58, '1', '2006-02-22', '925, Middle Monipur Mirpur Dhaka 1216', 'Same ', 'Md. Shah Alom ', 'Private Service', NULL, 'Shirin Begum ', '01882404398', 'House Wife', '01882404398', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01882404398', '', NULL, '0.00', NULL),
(600, 6, 'D', '2019-2020', 'B', 'Nazmun Nahar Mun ', '003DBSI0202', 28, 58, '2', '2008-02-17', '1108/A. East Monipur Mirpur Dhaka -1216', 'Vill. 16. Dag. Monshiopara Thana Varamara Dis Kustia ', 'Mizanur Rahman ', 'Private Service', NULL, 'Rokea Khatun ', '01733848806', 'House Wife', '01733848806', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01733848806', '', NULL, '0.00', NULL),
(601, 6, 'D', '2019-2020', 'B', 'Alvina Akter ', '003DBSI0203', 28, 58, '3', '2008-04-30', '1268/ East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Titu ', 'Business', NULL, 'Mrs. Shaina ', '01703855692', 'House Wife', '01718304106', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01703855692', '', NULL, '0.00', NULL),
(602, 6, 'D', '2019-2020', 'B', 'Md. Mahinur Rahman Aunik ', '003DBSI0204', 28, 58, '4', '1970-01-01', '969/1. East Monipur Mirpur Dhaka -1216', 'Samne ', 'Md. Mahfujur Rahman ', 'Private Service', NULL, 'Mita Bishwas ', '01917329460', 'House Wife', '01718957392', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01917329460', '', NULL, '0.00', NULL),
(603, 6, 'D', '2019-2020', 'B', 'Aarman Sakib ', '003DBSI0205', 28, 58, '5', '1970-01-01', '965/2, Middle Monipur Mirpur Dhaka -1216', 'Same', 'Md. Shakhawat Ali ', 'Private Service', NULL, 'Mrs. Anisa Akter ', '01816601412', 'House Wife', '01816601412', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01816601412', '', NULL, '0.00', NULL),
(604, 6, 'D', '2019-2020', 'B', 'Ria Akter Tisha ', '003DBSI0206', 28, 58, '6', '1970-01-01', '903. Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Jasim Uddin ', 'Business', NULL, 'Reno Begum ', 'Due ', 'House Wife', 'Due ', NULL, '', 'F', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', 'Due ', '', NULL, '0.00', NULL),
(605, 6, 'D', '2019-2020', 'B', 'MD. Sourab ', '003DBSI0207', 28, 58, '7', '1970-01-01', 'Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Hafujur Sheikh ', 'Business', NULL, 'Mrs. Shuki ', '01929109053', 'House Wife', '01929109053', NULL, '', 'M', '2019-01-26', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-26', '01929109053', '', NULL, '0.00', NULL),
(606, 6, 'D', '2019-2020', 'B', 'Eshita ', '003DBSI0208', 28, 58, '8', '1970-01-01', 'East Monipur Mirpur Dhaka -1216', 'Dist: Madaripur ', 'Shorab Hossen Shajada ', 'Business', NULL, 'Maya Begum', '01718811568', 'House Wife', '01718811568', NULL, '', 'F', '2019-01-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01718811568', '', NULL, '0.00', NULL),
(607, 6, 'D', '2019-2020', 'B', 'Maliha ', '003DBSI0209', 28, 58, '9', '1970-01-01', '1256, East Monipur Mirpur Dhaka 1216', 'Vill. Khuner Chor, Dos. Madaripur ', 'Md. Alomgir Hosen', 'Business', NULL, 'Salma Akter ', '01770526043', 'House Wife', '01726880856', NULL, '', 'F', '2019-01-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01770526043', '', NULL, '0.00', NULL),
(608, 6, 'D', '2019-2020', 'B', 'T.M Rafsamddowla Raki', '003DBSI0210', 28, 58, '10', '1970-01-01', 'Kozipara Busstand Mirpur ', 'Vill, Kazipara Bogura ', 'T.M. Asafuddowla Rana ', 'Private Service', NULL, 'Roji Begum ', '01755533431', 'House Wife', '01755533431', NULL, '', 'M', '2019-01-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01755533431', '', NULL, '0.00', NULL),
(609, 6, 'D', '2019-2020', 'B', 'Mushfiqur Rahman ', '003DBSI0211', 28, 58, '11', '1970-01-01', 'Mollapara East Minpur Mirpur Dhaka -1216', 'Vill. Noyapra Kishoregonj', 'Musiur Rahman ', 'Private Service', NULL, 'Aleya Begum', '01734861879', 'House Wife', '01734861879', NULL, '', 'M', '2019-01-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01734861879', '', NULL, '0.00', NULL),
(610, 6, 'D', '2019-2020', 'B', 'Mushfiqur Rahman ', '003DBSI0212', 28, 58, '12', '1970-01-01', 'Mollapara West Moniupu Mirpur Dhaka -1216', 'Vill. Noyapara ishoregonj', 'Musiur Rahman ', 'Private Service', NULL, 'Aleya Begum', '01734861879', 'House Wife', '01734861879', NULL, '', 'M', '1970-01-01', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01734861879', '', NULL, '0.00', NULL),
(611, 6, 'D', '2019-2020', 'B', 'Md. Shahadat Hossain ', '003DBSI0213', 28, 58, '13', '1970-01-01', '991, Adarsha Road Monipur Mirpur Dhaka -1216', 'Guropuddi Sonargaon Narayangonj ', 'Md. Abul Kalam ', 'Business', NULL, 'Sajeda Begum ', '01936557213', 'House Wife', '01936557213', NULL, '', 'M', '2019-01-27', 'A', 'Unknown', 'Islam', NULL, 36, '2019-01-27', '01936557213', '', NULL, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `AttendanceId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `AttendanceType` char(1) DEFAULT NULL COMMENT 'P=>Present. A=>Absent,L=>Late',
  `GroupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`AttendanceId`, `BranchId`, `ClassId`, `SectionId`, `Date`, `Year`, `StudentId`, `AttendanceType`, `GroupId`) VALUES
(45, 4, 39, 75, '2019-01-03', NULL, 202, 'P', 1),
(46, 4, 39, 75, '2019-01-03', NULL, 203, 'A', 1),
(47, 4, 39, 75, '2019-01-03', NULL, 204, 'P', 1),
(48, 4, 39, 75, '2019-01-03', NULL, 205, 'P', 1),
(49, 4, 39, 75, '2019-01-03', NULL, 206, 'A', 1),
(50, 4, 39, 75, '2019-01-03', NULL, 207, 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_books`
--

CREATE TABLE `student_books` (
  `StudentBookId` int(11) UNSIGNED NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `BookDetailsId` int(11) DEFAULT NULL,
  `TakenDate` date DEFAULT NULL,
  `GivenDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_dormitories`
--

CREATE TABLE `student_dormitories` (
  `StudentDormitoryId` int(11) UNSIGNED NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `DormitoryId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `TransportId` int(11) UNSIGNED NOT NULL,
  `TransportName` varchar(100) DEFAULT NULL,
  `TransportNumber` varchar(100) DEFAULT NULL,
  `RouteId` int(11) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Type` char(1) DEFAULT NULL COMMENT 'S=>Student,E=>Employees'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`TransportId`, `TransportName`, `TransportNumber`, `RouteId`, `Capacity`, `Type`) VALUES
(1, 'Choitali', '302', 1, 170, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE `transport_routes` (
  `RouteId` int(11) UNSIGNED NOT NULL,
  `RouteName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_routes`
--

INSERT INTO `transport_routes` (`RouteId`, `RouteName`) VALUES
(1, 'Mohammadpur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
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

INSERT INTO `user` (`id`, `BranchId`, `EmployeeId`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `is_parents`) VALUES
(1, 1, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Admin', '2016-04-01', 1, 'admin', 0),
(11, 4, NULL, '25d55ad283aa400af464c76d713c07ad', 1, 'Asif ', '2018-12-05', 1, 'asif', 0),
(13, 4, NULL, 'f7f57a8d46c474c6e4470e7ba7f10a43', 1, 'A1 Academy ', '2018-12-07', 1, 'eb001', 0),
(15, 4, NULL, '0c5fc6b53ddb0a5f6dce134a47e03541', 15, 'Pantho Mahmud', '2018-12-08', 1, 'pantho550', 0),
(16, 4, NULL, '9c8bb1578fd1b111429c35c0a84d5095', 15, 'Said Samir', '2018-12-08', 1, 'said9643', 0),
(17, 4, NULL, '520bca0dcae2ed9a27b0228de4c99922', 16, 'Hossen Ahmed Raton', '2018-12-09', 1, '01713257941', 1),
(18, 4, NULL, 'b6a7cf93eeab9c9f218c32f303572951', 16, 'Md. Salauddin Mintu', '2018-12-09', 1, '01817538430', 1),
(19, 4, NULL, '6619d580827cdb57ad449d9ca2bc6ad0', 16, 'Galib Yeashir', '2018-12-10', 1, '01814658328', 1),
(20, 4, NULL, '55e6efee0b3a4a893f5b910d19c2a86d', 16, 'Md. Habibur Rahman', '2018-12-10', 1, '01816600080', 1),
(21, 4, NULL, 'ab015313ff1106881048e36242836bf6', 16, 'Md. Sayedur Rahman', '2018-12-10', 1, '01727217928', 1),
(22, 4, NULL, 'f88492343faecda8d4cf82ca499e96d1', 16, 'Md. Nizamuddin', '2018-12-10', 1, '01976210415', 1),
(23, 4, NULL, '1e28896c3cf85d950280450be0953737', 16, 'Md. Abdul Maivivan', '2018-12-10', 1, '01718771056', 1),
(24, 4, NULL, '08dc088c0ef13687d8ccec8ae989fb62', 16, 'Rezual Karim', '2018-12-10', 1, '01712755876', 1),
(25, 4, NULL, 'fe55c5542b23177420e029b84ce79a3f', 16, 'Md. Mazedul Islam', '2018-12-10', 1, '01750536922', 1),
(26, 4, NULL, '4ebfe902734c78ce78d49b3243e297e2', 16, 'Md. Abdullah Al Mamun', '2018-12-10', 1, '01674628237', 1),
(27, 4, NULL, '1625113259612a797982750d08c8d397', 16, 'Rokib Hossain', '2018-12-10', 1, '01732772217', 1),
(28, 4, NULL, '5abbb05218a2e05c0d308d1588387158', 16, 'Md. Khalilur Rahman', '2018-12-10', 1, '01922897556', 1),
(29, 4, NULL, 'd37ba19f15f37281879b8fc5cc35df9a', 16, 'Sosanto Boshu', '2018-12-10', 1, '01924730477', 1),
(30, 4, NULL, 'eeaef9e43cf11f35669e234d5a97e603', 16, 'Md. Aminur Rahman Khan', '2018-12-10', 1, '01923344139', 1),
(31, 4, NULL, 'b29ac8c5d42c23f6d092781c3723bd15', 16, 'Md. Anwar Hossain', '2018-12-10', 1, '01715039739', 1),
(32, 4, NULL, '45f8beb42889d5a59a803caeb1ce5738', 16, 'Md. Zakir Hossain', '2018-12-10', 1, '01712128991', 1),
(33, 4, NULL, '048236d8ca2d73146bbb45080883e9f3', 16, 'Abul Kalam Azad', '2018-12-10', 1, '01733173284', 1),
(34, 5, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 15, 'Kids Care', '2018-12-12', 1, 'eb002', 0),
(35, 1, NULL, 'ecb8a2639deb878d57e2fa109784ec9d', 1, 'Md. Moniruzzaman Shobuz', '2018-12-15', 1, 'shobuz', 0),
(36, 6, NULL, 'd515518a1715bae5fbfc59d2458de532', 15, 'Rasel', '2018-12-15', 1, 'rasel', 0),
(37, 6, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Md Saokat Hossain', '2018-12-15', 1, 'eb003', 0),
(38, 4, NULL, 'b667b118b151257bbe5425a26f64384e', 16, 'Selim Ahmed', '2018-12-18', 1, '01819945399', 1),
(39, 4, NULL, 'caedf9474dff0f7a43e65018e243090b', 16, 'Saidul Islam', '2018-12-18', 1, '01819202492', 1),
(40, 4, NULL, '665ca947f9644fa55cc2a710f3e85ec5', 16, 'Mahumudul Hasan', '2018-12-18', 1, '01718334559', 1),
(41, 4, NULL, 'f116d0cc8ac050ac2b70d4a982fa59a5', 16, 'Mir Monowar Hossain', '2018-12-18', 1, '01711939089', 1),
(42, 4, NULL, '1863be0e04a7895a431dc269ddbd3b49', 16, 'Munshi Masud Hossen', '2018-12-18', 1, '01929993008', 1),
(43, 4, NULL, '61e3ec090391de3448f4de4115b84ae0', 16, 'Md.Jalal Uddin', '2018-12-18', 1, '01741692264', 1),
(44, 4, NULL, '7141aaa583f0ce4177f9e3d9b23ef7fd', 16, 'Md. Abdul Halim', '2018-12-18', 1, '01818095700', 1),
(45, 4, NULL, 'cc897890f98adb24504ffe546f0f7c2d', 16, 'Anamul Haq Mollah', '2018-12-18', 1, '01714340144', 1),
(46, 4, NULL, '7139d1047f62b911b3a174e97c770bf5', 16, 'Mizanur Rahman', '2018-12-18', 1, '01814097490', 1),
(47, 4, NULL, '6f4bae0c15fb81820e770f107b3dc8ce', 16, 'Md. Kamal Parvase', '2018-12-18', 1, '01713148520', 1),
(48, 4, NULL, '107f7edfdf27598f21dd3cdb750b5685', 16, 'MD. Abul Khaer', '2018-12-18', 1, '01720513592', 1),
(49, 4, NULL, '2b9b365f768e74e780fd3ce5d4bf33b2', 16, 'Tariqul Islam', '2018-12-18', 1, '01730083684', 1),
(50, 4, NULL, 'f2837dfef2f6570f58b7db48f10407ad', 16, 'Dr.Md Khalid Jamil', '2018-12-18', 1, '01720110514', 1),
(51, 4, NULL, 'f48b32f7e354a17c45b44dc3b225bb52', 16, 'late, Aminul Islam', '2018-12-18', 1, '01919868457', 1),
(52, 4, NULL, '019dc29e710f4701c054fda89408846a', 16, 'MD. Nur Nobi', '2018-12-18', 1, '01961817877', 1),
(53, 4, NULL, '93d5cd3e86131462925a7ddbd5e0ce36', 16, 'Md. Ehtesham ul- Haque', '2018-12-18', 1, '01711530855', 1),
(54, 4, NULL, '52922cefb7f4ec00acb0a68502e62f43', 16, 'Kalipodo Sharma', '2018-12-18', 1, '01780172784', 1),
(55, 4, NULL, '7111508986ad6746b10427e35e27eab4', 16, 'Mounzurul Islam', '2018-12-18', 1, '01922554352', 1),
(56, 4, NULL, '906256aaedb60e551df273065d9e22b2', 16, 'Hanif MD. Sofrur Razzak', '2018-12-18', 1, '01626530604', 1),
(57, 4, NULL, '6a032f235cd04245c512f6397e77480b', 16, 'Imrul Kayes', '2018-12-18', 1, '01678592203', 1),
(58, 4, NULL, '38e8557f0263c09bd4b78e46e33fcb32', 16, 'Rafiqul Islam', '2018-12-18', 1, '01714049531', 1),
(59, 4, NULL, '60781f5fe97f1ce63e9db4c3ebc67082', 16, 'Md. Rafiquel Islam', '2018-12-18', 1, '01717094845', 1),
(60, 4, NULL, '3402b21beca934d7cba4771ce620844c', 16, 'Mizanur Rahman ', '2018-12-18', 1, '01917406622', 1),
(61, 4, NULL, '0d7631b18684c362e7b2e27cb2085e51', 16, 'Mir Hossain Chowdhury', '2018-12-18', 1, '01715030477', 1),
(62, 4, NULL, 'c0fb9f71092aefc9849cc67dcf685b47', 16, 'Sadiqur Rahman', '2018-12-18', 1, '01819128893', 1),
(63, 4, NULL, 'b138f8f4b6fd591f4aaecaff4794201d', 16, 'S.M Shafikur Rahman', '2018-12-18', 1, '01715734554', 1),
(64, 4, NULL, 'e895c1716fe70c5f5f1bca7c7ba5d949', 16, 'MD. Tariqul Islam', '2018-12-18', 1, '01913391721', 1),
(65, 4, NULL, '10ab254b5a8801177e2c27461a5766d0', 16, 'Saiful Islam', '2018-12-18', 1, '01712603625', 1),
(66, 4, NULL, '07abf8444d72105bc5f87150c8f71510', 16, 'lets Khundaqur Mosharraf', '2018-12-18', 1, '01682848907', 1),
(67, 4, NULL, '307c3161e8722623f301d0e2c2a1e340', 16, 'Kazi Giash uddin ', '2018-12-18', 1, '01680306572', 1),
(68, 4, NULL, '0375abac7b2710137db3144ef2a5703f', 16, 'Abul Hayath Md.. Kamruzzaman', '2018-12-18', 1, '01912716921', 1),
(69, 4, NULL, 'dcbb9006afaee1296ff36eabe1cddb28', 15, 'Fahim', '2018-12-23', 1, 'fahim', 0),
(70, 4, NULL, 'c38472fe83aa640e63beb227d2a890f5', 16, 'Md. Abul Kashem', '2018-12-24', 1, '01717037870', 1),
(71, 4, NULL, '8085e4e5384b9d3bc88cabb36e2a9598', 16, 'Asit Kumar Debnath', '2018-12-24', 1, '01716479053', 1),
(72, 4, NULL, 'd597fb328bd59d64778c807223d0a56d', 16, 'Narayan Das', '2018-12-24', 1, '01911487320', 1),
(73, 4, NULL, '950155345162c87cb7ba5652b752df20', 16, 'MD. Liakat Ali', '2018-12-24', 1, '01715407907', 1),
(74, 4, NULL, 'c78e2c6c04cc82d4cccbac2d867eb92f', 16, 'K.M. Abul Kalam Azad', '2018-12-24', 1, '01711136902', 1),
(75, 4, NULL, '856ed45f54f86eaa77c2de19b192569c', 16, 'Golam Saroar', '2018-12-24', 1, '01711577455', 1),
(76, 4, NULL, 'c36cbd7cc4ff7a13885727c24011416b', 16, 'Billiam Banarge', '2018-12-24', 1, '01676041213', 1),
(77, 4, NULL, '1ec91f7fe7435733a9ced3e3d602c9a7', 16, 'Anisur Zaman', '2018-12-24', 1, '01733255685', 1),
(78, 4, NULL, '4793899275c6554f3205a3fc7bcd7f75', 16, 'Monayem Khan', '2018-12-24', 1, '01740974326', 1),
(79, 4, NULL, 'f1b050dd5efb9f5744214e73e1322fc4', 16, 'Abdul Hye', '2018-12-24', 1, '01717382184', 1),
(80, 4, NULL, '69f3b21b641b093de8264a7c624912b2', 16, 'Kharul Bashar', '2018-12-24', 1, '01715529665, 01625677168', 1),
(81, 4, NULL, '722dc58c867666a8188fa01eef780037', 16, 'Abdur Satter', '2018-12-24', 1, '01869233572', 1),
(82, 4, NULL, 'f033d1568d6332aab3421a7cbb486abd', 16, 'MD. Rezaul Karim', '2018-12-24', 1, '01684328636', 1),
(83, 4, NULL, '176c1fae51cdcf0ce5375e7db326b483', 16, 'MD. Kamal Hossan', '2018-12-24', 1, '01716281100', 1),
(84, 4, NULL, '822781c79397cb0e44afc69bbb329394', 16, 'MD. Farid Hossain Militon', '2018-12-24', 1, '01972013367', 1),
(85, 4, NULL, '2597e9f585a7006bc17cd361ef806255', 16, 'Kh. MD. Sohidul Islam', '2018-12-24', 1, '01758926683', 1),
(86, 4, NULL, '617b3a6f9b73f3c54aa116ca0b7ce599', 16, 'DR, MD. Mizanur Rahman ', '2018-12-24', 1, '017111131492', 1),
(87, 4, NULL, '7f32d29569d8af099393c03afab44c6d', 16, 'Md. Aminur Rahman Khan', '2018-12-24', 1, '016833301130', 1),
(88, 4, NULL, 'ca20cb1dc95bcb821bb7fab2b1ead59b', 16, 'Faruk Ahamed Monir', '2018-12-24', 1, '01729161400', 1),
(89, 4, NULL, '72cc197278ff4a3cf24c84187d71faf9', 16, 'H.M Aslim', '2018-12-24', 1, '01730965953', 1),
(90, 4, NULL, 'f03cfd399ae780093f7e9a47a66e4c0f', 16, 'Razibul Hasan', '2018-12-24', 1, '01718238897', 1),
(91, 4, NULL, 'a28846e5a2b6cc472da43c9f8db2c09c', 16, 'MD. Mabin', '2018-12-24', 1, '01711204502', 1),
(92, 4, NULL, '973b31286d0d2f556dbc1d56503d09b0', 16, 'MD. Salim Reza', '2018-12-24', 1, '01712221303', 1),
(93, 4, NULL, '4043ea6d44a9774267a694b340c2f5f0', 16, 'Saiful islam', '2018-12-24', 1, '01822825308', 1),
(94, 4, NULL, 'decd2bf8c1347a50b424d751201089bc', 16, 'A. K.M Hasan Reza', '2018-12-24', 1, '01716620698', 1),
(95, 4, NULL, '3bc88dc7b980086a86124c4c76370abe', 16, 'MD. Mohibur Rahman', '2018-12-24', 1, '01911232334', 1),
(96, 4, NULL, 'a8e44e1c0d5a05d78ff34d243f945d8d', 16, 'Tajul Islam', '2018-12-24', 1, '01715111750', 1),
(97, 4, NULL, '45f8beb42889d5a59a803caeb1ce5738', 16, 'MD. Zakir Hossain', '2018-12-24', 1, '01712128991', 1),
(98, 4, NULL, '1ccb7f294b1870560e40f0a22de60264', 16, 'Shahjahan Ali', '2018-12-24', 1, '01731945252', 1),
(99, 4, NULL, '4f901e4a9e1b78da9e8f63ebc7d9b224', 16, 'Khan Mahbub Shohel', '2018-12-24', 1, '01714686047', 1),
(100, 4, NULL, 'c120ed53eee8dc4eca651da2ef5c835d', 16, 'Md. Rafiquel Islam', '2018-12-24', 1, '01715094845', 1),
(101, 4, NULL, '8e91381833a5c503a0fbfde378464a3e', 16, 'MD. Mahbub Hasan', '2018-12-24', 1, '01678062309', 1),
(102, 4, NULL, 'c355407e06ab50c1e3233fd646ff4109', 16, 'Lutfor Rahman khan', '2018-12-24', 1, '01957794952', 1),
(103, 4, NULL, '986793d63776095f108b966ddb32bbad', 16, 'Hemyet Hossen', '2018-12-24', 1, '01712297000', 1),
(104, 4, NULL, '09482166f1ae92cde09f49f14252d394', 16, 'Jahirul Hoque', '2018-12-24', 1, '01712123676', 1),
(105, 4, NULL, '2b9b365f768e74e780fd3ce5d4bf33b2', 16, 'Tariqul Islam', '2018-12-24', 1, '01730083684', 1),
(106, 4, NULL, '1e9b2af5576ea672b3e13425dda9b400', 16, 'MD. Azar Ali', '2018-12-24', 1, '01726595732', 1),
(107, 4, NULL, '6f4bae0c15fb81820e770f107b3dc8ce', 16, 'Md. Kamal Parvase', '2018-12-24', 1, '01713148520', 1),
(108, 4, NULL, '84ea68a65b6342ec5a8b5d293db34a51', 16, 'Samsul Islam', '2019-01-05', 1, '01798515959', 1),
(109, 4, NULL, '873e45ee95090b3574917d760d0a3f97', 16, 'Jebon Robi Das', '2019-01-05', 1, '01917705690', 1),
(110, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam', '2019-01-05', 1, '01741565333', 1),
(111, 4, NULL, 'f1b050dd5efb9f5744214e73e1322fc4', 16, 'Abdul Hye', '2019-01-05', 1, '01717382184', 1),
(112, 4, NULL, '6f13ea98a38d09271da8dc23e5e0d6b4', 16, 'Monayem Khan', '2019-01-05', 1, '017740974326', 1),
(113, 4, NULL, 'e82658b7cefc32f6237faf0a633e09c4', 16, 'S.Kibriya', '2019-01-05', 1, '01716127527', 1),
(114, 4, NULL, 'c48efc40bf4cc22bf15bd3c316abb0b0', 16, 'Kharul Bashar', '2019-01-05', 1, '01625677168', 1),
(115, 4, NULL, 'adfed9a17922b8ea0ef6241072352d2b', 16, 'Mahumudul Hasan Shaikh', '2019-01-05', 1, '01715199159', 1),
(116, 4, NULL, '74a47ca2dc4bacbdf2c61e4fd0e13e53', 16, 'MD. Fazlul Karim', '2019-01-05', 1, '01742255344', 1),
(117, 4, NULL, 'c36cbd7cc4ff7a13885727c24011416b', 16, 'Billiam Banarge', '2019-01-05', 1, '01676041213', 1),
(118, 4, NULL, '1ec91f7fe7435733a9ced3e3d602c9a7', 16, 'Anisur Zaman', '2019-01-05', 1, '01733255685', 1),
(119, 4, NULL, '676916c7fb2deb8842bc6936777ba4d9', 16, 'Atikur Rahman', '2019-01-05', 1, '01754041055', 1),
(120, 4, NULL, '1a8778b63b0ece81f4a7328a711008f5', 16, 'Rafiqul Majid', '2019-01-05', 1, '01713030572', 1),
(121, 4, NULL, '8d1bc4fa6bcfc82908c3bbc50a683bd5', 16, 'Shihab Hossain', '2019-01-05', 1, '01552358070', 1),
(122, 4, NULL, 'acb39df64fc6b39b9b366be1eae28e46', 16, 'MD. Kamruzzaman', '2019-01-05', 1, '01711603676', 1),
(123, 4, NULL, 'e30502c56e66f47bd7a443cf6c7ef586', 16, 'Sheikh Masbah Uddin ', '2019-01-05', 1, '01711019374', 1),
(124, 4, NULL, '7d88d59cb8ae876f54aa8a665fa687df', 16, 'MD. Shah Alam Patwary', '2019-01-05', 1, '01812775061', 1),
(125, 4, NULL, '0928fd7729b9cc2a3ad37297bdcee754', 16, 'MD. Motalab', '2019-01-05', 1, '01758109926', 1),
(126, 4, NULL, '903fd4efdf915fa3b527ee46efce99a8', 16, 'Mizanur Rahman', '2019-01-05', 1, '01917701762', 1),
(127, 4, NULL, 'e762dd322235a9ea410a8f8c4d6f1648', 16, 'Mohammad Forhad Hossain', '2019-01-05', 1, '01793009143', 1),
(128, 4, NULL, 'c0d6347e6b6a9d7812f400b33c25ecc0', 16, 'MD. Iqbal Hossain', '2019-01-05', 1, '01712108607', 1),
(129, 4, NULL, 'da692ab73852aa0e7907f8841bb91695', 16, 'Mohammad Mintu', '2019-01-05', 1, '01741181184', 1),
(130, 4, NULL, 'ea087c71af06863703848cdf92a19c39', 16, 'MD. Belayt Hossan', '2019-01-05', 1, '01719794855', 1),
(131, 4, NULL, '0092545384ccbfb2c4a9762acac329af', 16, 'Capt. Imranor Reza Chowdhury', '2019-01-05', 1, '01818489543', 1),
(132, 4, NULL, '35fe89cca7947ceb30fe4f49c3283d48', 16, 'MD. Mozibur Rahman', '2019-01-05', 1, '01718268866', 1),
(133, 4, NULL, '75f6b38e2cfae8e52fd90d57b95b47d3', 16, 'A.H.M Shaful Azam', '2019-01-05', 1, '01819210451', 1),
(134, 4, NULL, '7768a4d2ce138b574fe01a60599573be', 16, 'Shamsul Hoque Selim', '2019-01-05', 1, '01686090312  /  01635090191', 1),
(135, 4, NULL, '5cb318272a9aeb2ac248a1b18f346c8f', 16, 'Shamim Ahamid', '2019-01-05', 1, '01730399080', 1),
(136, 4, NULL, '1d9cb1d4f26d90f79da82aaa52c187cf', 16, 'Noor Nobi Chowdhury', '2019-01-05', 1, '01814469504', 1),
(137, 4, NULL, '60fc4f6d0f7f4c4965ddb9a56252a1b4', 16, 'Engr. MD. Hasanuzzaman', '2019-01-05', 1, '01911785982', 1),
(138, 4, NULL, 'c141b7a7cceee19dccfcf73b4e7a197d', 16, 'Shalim Mollah', '2019-01-05', 1, '01937261866', 1),
(139, 4, NULL, 'e45f7db9b910a2382c75686ae740f21a', 16, 'Dr, Mohammad Idmish Ali', '2019-01-05', 1, '01712790646', 1),
(140, 4, NULL, '54c37173f2fe372c29f5956b3891f228', 16, 'MD. Kamrul Islam', '2019-01-05', 1, '01780484703', 1),
(141, 4, NULL, '554296cd57aa0d27ccbf14f89bc0f222', 16, 'Late. Ataur Rahman Chowdhury', '2019-01-05', 1, '01726596202', 1),
(142, 4, NULL, '26980017f099fa3c57adfe6ff70a7d5c', 16, 'Late. Khaza Abdus Salam', '2019-01-05', 1, '01855596750', 1),
(143, 4, NULL, 'fa4885497de2e053f67f36a00df0ff29', 16, 'Shahin Rahman', '2019-01-05', 1, '01713199688', 1),
(144, 4, NULL, 'f292beeac8e6bfe319c0ed6921e98573', 16, 'MD. Zahidul Haque Khan', '2019-01-05', 1, '01716814936', 1),
(145, 4, NULL, 'e1fa6895cd43c362eff8d168214c5c7e', 16, 'Rafiqul Islam', '2019-01-05', 1, '01834678958', 1),
(146, 4, NULL, '08f343b93a07d5cbded8c9d90b570425', 16, 'MD. Shihabul Islam', '2019-01-05', 1, '01673466264', 1),
(147, 4, NULL, '7d1d6e2758985e5b792c28c1d589132a', 16, 'Fakhruddin Khan', '2019-01-05', 1, '01713147027', 1),
(148, 4, NULL, '767fb352c16010ee39dd1a5275ccb444', 16, 'Hafez Sultan Mahmud', '2019-01-05', 1, '01725336241', 1),
(149, 4, NULL, '052404badf77e7a2672c9921e36c5841', 16, 'MD. Razzak Mizi', '2019-01-05', 1, '01813930728', 1),
(150, 4, NULL, '13a8c165ff1d4ae8095c8ba72f89c758', 16, 'MD. Showkat Ali Molla', '2019-01-07', 1, '01712615814, 01675317852', 1),
(151, 4, NULL, 'b138f8f4b6fd591f4aaecaff4794201d', 16, 'S.M Shafikur Rahman', '2019-01-07', 1, '01715734554', 1),
(152, 4, NULL, '30c5ae724cb48988a2881e70b69ade4c', 16, 'Mostafezur Rahman', '2019-01-07', 1, '01684108908', 1),
(153, 4, NULL, '7143b0e54bba11ffac059b7f8f99f3b8', 16, 'MD. Jamal Hossen', '2019-01-07', 1, '017727530213', 1),
(154, 4, NULL, '30c5ae724cb48988a2881e70b69ade4c', 16, 'Mostafezur Rahman', '2019-01-07', 1, '01684108908', 1),
(155, 4, NULL, 'f3d7dd608380ef58a8d31d7157602d72', 16, 'MD. Jahangir Alam', '2019-01-07', 1, '01819597111', 1),
(156, 4, NULL, '8eeaf9b854592d820b83889811061e30', 16, 'Belal Hossen', '2019-01-07', 1, '01942789859', 1),
(157, 4, NULL, 'a27a5d04c36c9e0b1af19a2dafe772bf', 16, 'MD. Sharif Hossen', '2019-01-07', 1, '01819558081', 1),
(158, 4, NULL, '7873be2cf2999042d8e0b92a5442bb48', 16, 'Lutfor Rahman', '2019-01-07', 1, '01714020818', 1),
(159, 4, NULL, 'ce140a0dc4b7118afaff40198e5b37eb', 16, 'MD. Abdul Khayer', '2019-01-07', 1, '01948611561', 1),
(160, 4, NULL, '2248a54a7f933a0f31036a965047260a', 16, 'MD. Al- Jubaide', '2019-01-07', 1, '01816365336', 1),
(161, 4, NULL, 'e1fa6895cd43c362eff8d168214c5c7e', 16, 'Rafiqul Islam', '2019-01-07', 1, '01834678958', 1),
(162, 4, NULL, 'b1ee375de3c11b90134b409319ed5842', 16, 'MD. Repon Munshe', '2019-01-07', 1, '01757293286', 1),
(163, 4, NULL, 'e1e5d21ea5c235628dc504c4983a961c', 16, 'Aslam Hossain', '2019-01-07', 1, '01827587980', 1),
(164, 4, NULL, '755f5b429513c184c7a40cb252cebbc5', 16, 'Abdur Rahman', '2019-01-07', 1, '01737325157', 1),
(165, 4, NULL, '7f80060eaca05a39bf5e982be64b626b', 16, 'MD. Monirul Islam', '2019-01-07', 1, '01926689950', 1),
(166, 4, NULL, 'a7c934fbce504ee2358742b3a4619596', 16, 'Hhafiz Mollah', '2019-01-07', 1, '01798240545', 1),
(167, 4, NULL, '561cd21062543fdf451a4ba79d3a56ce', 16, 'MD. Jul-E- Aslam', '2019-01-07', 1, '01711713678', 1),
(168, 4, NULL, '85a08775db29fd6d1e6b147ed3621de6', 16, 'MD. Shafiqul Islam', '2019-01-07', 1, '01716913210', 1),
(169, 4, NULL, 'cd57c347991016ce7bb17b4490de6d10', 16, 'Fazlul Hoque', '2019-01-07', 1, '01819483728', 1),
(170, 4, NULL, 'd0a8a80e928bafea333947ff3aadf964', 16, 'MD. Newaj Hossain', '2019-01-07', 1, '01828142286', 1),
(171, 4, NULL, 'bb2c0b6c4d2c5d206dfd83ce38053758', 16, 'Razaul Rahman', '2019-01-07', 1, '01711464708', 1),
(172, 4, NULL, '5fba5f2ff75b98befa12f2497d02e099', 16, 'MD. Khadimul Islam', '2019-01-07', 1, '01719524221', 1),
(173, 4, NULL, '582cf9a8800a5ab37bb18e6c19ce01f9', 16, 'Morshed Zaman Liton', '2019-01-07', 1, '01711785106', 1),
(174, 4, NULL, 'be26fd554ab3f3ea01e93357c8180ae8', 16, 'Mizanur Rahman', '2019-01-07', 1, '01715601041', 1),
(175, 4, NULL, 'ad2f0eab01bf66dda4bc828a4d1c7639', 16, 'Syed Sotter Ahmed', '2019-01-07', 1, '01835026634', 1),
(176, 4, NULL, 'b5ed0ab2b78819ad7d3736dd97d72a07', 16, 'Sk. Kamrul Islam', '2019-01-07', 1, '01973234292', 1),
(177, 4, NULL, 'b0b6ca000522b00203cfa067f56572a5', 16, 'MD. Izharul islam', '2019-01-07', 1, '01711955442', 1),
(178, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'MD. Raknuzzaman', '2019-01-07', 1, '01819556485', 1),
(179, 4, NULL, 'b2443d7c6ba24f285bcb589aabb6a403', 16, 'Abdul Sattar', '2019-01-07', 1, '01881659416', 1),
(180, 4, NULL, '25d9746dfe4ae620cb5d44eb043455e0', 16, 'Wahidur Rahman Khan', '2019-01-07', 1, '01745885058', 1),
(181, 4, NULL, '0f51f3a19e31488f2487f5a59cb96db3', 16, 'MD. Abul Hashem', '2019-01-07', 1, '01817584753', 1),
(182, 4, NULL, 'caedf9474dff0f7a43e65018e243090b', 16, 'MD. Saiful Islam', '2019-01-07', 1, '01819202492', 1),
(183, 4, NULL, '734cc575a1346ae42312069b2cf936f6', 16, 'Nazrul Islam', '2019-01-07', 1, '01712593593', 1),
(184, 4, NULL, 'a10a7479a95615a44534a4d0bd409337', 16, 'Abu Naser', '2019-01-07', 1, '01711392359', 1),
(185, 4, NULL, '341aa14cd458d916bace7a5f28e71bb9', 16, 'MD. Mokhlesur Rahman', '2019-01-07', 1, '01711525484', 1),
(186, 4, NULL, '63c84b2868768391a938bf2d5446624b', 16, 'MD. Zahid Alom', '2019-01-07', 1, '01610744422', 1),
(187, 4, NULL, '85148c36f814f5726e7e2ff82683e544', 16, 'Kawsar Talukder', '2019-01-07', 1, '01711595334', 1),
(188, 4, NULL, '277cd16d3e422d8cf3df1055c8b49772', 16, 'Kamruzaman', '2019-01-07', 1, '01843516484', 1),
(189, 4, NULL, 'b3fdb677edac33f5bc78f84811f69a64', 16, 'Golam Rabani', '2019-01-07', 1, '01937548008', 1),
(190, 4, NULL, '2be0594ccf5f1da8a9166b21e91cddff', 16, 'MD. Anisur Rahman', '2019-01-07', 1, '01712027728', 1),
(191, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam', '2019-01-07', 1, '01741565333', 1),
(192, 4, NULL, '873e45ee95090b3574917d760d0a3f97', 16, 'Jebon Robi Das', '2019-01-07', 1, '01917705690', 1),
(193, 4, NULL, '940ce0412190f0507222b708fc8db151', 16, 'MD. Nurunnabi Mondol', '2019-01-07', 1, '01711101455', 1),
(194, 4, NULL, '875d06b79f5eee8779a9eb58697268f7', 16, 'Abdur Rahman', '2019-01-07', 1, '01617589413', 1),
(195, 4, NULL, '0ddc2966fe7781b47ac202f0ede3c1aa', 16, 'DR. Bidyut', '2019-01-07', 1, '01931354805', 1),
(196, 4, NULL, '40169b98626579a29de7dce7813b2135', 16, 'MD. Jahangir Alam', '2019-01-07', 1, '01517075151', 1),
(197, 4, NULL, '0b656f122a2b2465d1995d7ac6859779', 16, 'MD. Mazharul Islam', '2019-01-07', 1, '01718559605', 1),
(198, 4, NULL, '822781c79397cb0e44afc69bbb329394', 16, 'MD. Farid Hossain Militon', '2019-01-07', 1, '01972013367', 1),
(199, 4, NULL, 'a573734eb58b434943617d4830089541', 16, 'Shafique Ahmed Khan', '2019-01-07', 1, '01730791792, 01913058955', 1),
(200, 4, NULL, 'd3f2a44e5e5b2cef883605f9af9e1472', 16, 'MD. Jamal Hossen', '2019-01-07', 1, '01715933238', 1),
(201, 4, NULL, '8c3fd7ee82e0240d5e025012b4ac6752', 16, 'G.M. Hafizul Islam', '2019-01-07', 1, '01715513853', 1),
(202, 4, NULL, '2224d17bfc70578b950bbcec7fc5a3a2', 16, 'Habibur Rahman Khan', '2019-01-07', 1, '0176250600', 1),
(203, 4, NULL, 'ebd14e40d2115863d976ef14e70c4480', 16, 'Zahrul Islam', '2019-01-07', 1, '01720273644', 1),
(204, 4, NULL, '158977e3805277a66db29e460c41fb68', 16, 'MD. Sayed Hossen', '2019-01-07', 1, '01718082226', 1),
(205, 4, NULL, '38304ad5f4780a1750653607a9196a9e', 16, 'MD. Alamgir Hossain', '2019-01-07', 1, '01713093185', 1),
(206, 4, NULL, '90442a115229eded4d97aa472b5b561c', 16, 'MD. Shariful Islam', '2019-01-07', 1, '01714099307', 1),
(207, 4, NULL, 'f880fbafbb1f1389f2608e5f9e9138b3', 16, 'Habibur Rahman', '2019-01-07', 1, '01757987313', 1),
(208, 4, NULL, '8ef9f9f8697886aa174c244d63328fb8', 16, 'A K M Saiful Islam', '2019-01-07', 1, '01711314107', 1),
(209, 4, NULL, '3905d8ba417b51a47773e39945ec4137', 16, 'Miah Mohammad Al -Amin', '2019-01-07', 1, '01822000298', 1),
(210, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'Rokinuzzaman', '2019-01-07', 1, '01819556485', 1),
(211, 4, NULL, 'ce55ebb50477f77b37f3069fca65d8c2', 16, 'MD. Zeaur Rahman', '2019-01-07', 1, '01716093784', 1),
(212, 4, NULL, '87e9df343aa77346965bd2c98910c797', 16, 'Afsa Balale', '2019-01-07', 1, '01936133395', 1),
(213, 4, NULL, 'ff283995a009135270010c2e0a139b25', 16, 'Md. Nizamuddin', '2019-01-07', 1, '01732228825', 1),
(214, 4, NULL, '4117a622ce20aca0f7e7076884dc09d6', 16, 'Mur-A- Alom', '2019-01-07', 1, '01917389179', 1),
(215, 4, NULL, 'f48be4dc9d1c64153633c0744c693e3a', 16, 'Gazi Mohammad Abid Hosan', '2019-01-07', 1, '01741081699', 1),
(216, 4, NULL, 'cb3ea4b5c3f37a23822bfecf2f021879', 16, 'MD. Harunur Rashid', '2019-01-07', 1, '01760001420', 1),
(217, 4, NULL, '5ed873ff774981735b623bedd9b397e4', 16, 'Rezual Karim', '2019-01-07', 1, '01712211216', 1),
(218, 4, NULL, 'e6e341c65f8a9e864bc70594ceeae708', 16, 'Harun or Rashid', '2019-01-07', 1, '01990307673', 1),
(219, 4, NULL, 'd092e98758b2234f5d209f914ffdde1a', 16, 'Sofiqur Rahman', '2019-01-07', 1, '01781446590', 1),
(220, 6, NULL, 'af72ba1fb4d47ca220756f1c7ac06a21', 16, 'Md. Shakhawat Hossain', '2019-01-09', 1, '01909146922', 1),
(221, 6, NULL, '19fa605020960ad74ccd4d55368ae2af', 16, 'Humayun Kabir', '2019-01-09', 1, '01991091066', 1),
(222, 6, NULL, '3229a2a7104097259eb95a99317ca65f', 16, 'Md. Moniruzzman Monir', '2019-01-09', 1, '01764521465', 1),
(223, 6, NULL, 'b69e4e48a133632202155ec02f8a2f87', 16, 'S.M. Shoeb', '2019-01-09', 1, '01671127028', 1),
(224, 6, NULL, 'ec135e57f3fa3d18f9d1422c12aadd43', 16, 'Md. Nura Alam Siddiqui', '2019-01-09', 1, '01712251866', 1),
(225, 6, NULL, 'e069cc141c16ecc9b10bc61627c959a2', 16, 'Md. Jalal Uddin ', '2019-01-09', 1, '01916030713', 1),
(226, 6, NULL, '2c626b237d852ce6424fd43a96a316fc', 16, 'Majedul Islam', '2019-01-09', 1, '01985558922', 1),
(227, 6, NULL, '99041c85f3e256d93207499f18c5843d', 16, 'Md. Nasir Uddin', '2019-01-09', 1, '01715347790', 1),
(228, 6, NULL, '11bff5c8e4ff799c60f780246bb4bd48', 16, 'Md. Shaidul Islam', '2019-01-09', 1, '01977431566', 1),
(230, 4, NULL, 'ecb8a2639deb878d57e2fa109784ec9d', 15, 'Shobuz', '2019-01-11', 1, 'Shimul', 0),
(231, 6, NULL, 'dff3a582b43a1b3f0d974813ab227a37', 16, 'Omar Faruk', '2019-01-12', 1, '01754211676', 1),
(232, 6, NULL, 'dff3a582b43a1b3f0d974813ab227a37', 16, 'Omar Faruk', '2019-01-12', 1, '01754211676', 1),
(233, 6, NULL, '7dd9c3f557b5fa5f82372e423ff14baf', 16, 'Sheik Jamal Hossain (Munna)', '2019-01-12', 1, '01923793967', 1),
(234, 6, NULL, 'e1ab1621dc94cb68c9ab895861f93fed', 16, 'Andrew Miltion Gomes ', '2019-01-12', 1, '01850524707', 1),
(235, 6, NULL, '016d0a7e945037d0d8fa5746f057dc31', 16, 'Md, Monirul Islam', '2019-01-12', 1, '01723309065', 1),
(236, 6, NULL, 'f903596d8d2ffbf73a99bc543c5413ec', 16, 'A K M Sorowor Hossain ', '2019-01-12', 1, '01631596977', 1),
(237, 6, NULL, '48ab5c7cea90697c0bd512a15c52d5c1', 16, 'Md. Arshadul Hoque', '2019-01-12', 1, '01716425592', 1),
(238, 6, NULL, 'e2b5236ef8d49271ad357c5c40d7ca97', 16, 'Zahir Raihan Babul ', '2019-01-12', 1, '01714446699', 1),
(239, 6, NULL, 'f3a4691562c369d56b36ac0d9cc88e2d', 16, 'Md, Abdur Rahin ', '2019-01-12', 1, '0171824381', 1),
(240, 6, NULL, '54e86b9b9212e24e275e460db96d36d2', 16, 'Moshiur Rahaman ', '2019-01-12', 1, '01916284438', 1),
(241, 6, NULL, 'c007db67e804bddd450f1534425a5399', 16, 'Samiul Islam ', '2019-01-12', 1, '01721699816', 1),
(242, 6, NULL, '4043ea6d44a9774267a694b340c2f5f0', 16, 'MD. Saiful Islam ', '2019-01-12', 1, '01822825308', 1),
(243, 6, NULL, 'c21944d730ac1759be0c6c4c776ea460', 16, 'Ashif Rajiul Hasan', '2019-01-12', 1, '01715011528', 1),
(244, 6, NULL, 'e952716d38857e03f19eac11d3e56ecd', 16, 'MD. Shajedul Karim ', '2019-01-13', 1, '01550156385', 1),
(245, 6, NULL, 'cdc40052517a07c00bc1a61672eb820f', 16, 'MD. Monirujjman ', '2019-01-13', 1, '01768561510', 1),
(246, 6, NULL, '3bfbf32d40002e16f74706f2d770e840', 16, 'Abdullah Al Mamun', '2019-01-13', 1, '01915463147', 1),
(247, 6, NULL, '08412c53f79a2d364026f9e57bedf295', 16, 'MD. Aowlad Hossain ', '2019-01-13', 1, '01647722099', 1),
(248, 6, NULL, '38e960a209bd493d803d95d1ca7847e2', 16, 'Sumon Rana ', '2019-01-13', 1, '01912494474', 1),
(249, 6, NULL, '9a99ace4e199854975ee349fffd8d75c', 16, 'Sanjit Kumer Saha', '2019-01-13', 1, '01712694106', 1),
(250, 6, NULL, '17378fb019639b2dc2d0f01a16e19333', 16, 'Md. Abu Sayeed ', '2019-01-13', 1, '01753647080', 1),
(251, 6, NULL, '03130a43adf9bafd515c6f0972c99968', 16, 'MD. Ismail Hossain ', '2019-01-13', 1, '01718100222', 1),
(252, 6, NULL, '3adf59e47977c14b39e4f31f1dfda0c4', 16, 'Ismial Hossain ', '2019-01-13', 1, '01626474041', 1),
(253, 6, NULL, '46e2ae3720fb9a250af9a077cff9de71', 16, 'Md. Akram Hossain Shimul ', '2019-01-13', 1, '01713093822', 1),
(254, 6, NULL, 'fc3ab2ac41978f4074bc2ec983f52f94', 16, 'Md. Abdur Rahaman ', '2019-01-13', 1, '01951224492', 1),
(255, 6, NULL, 'cc2399fd2eb491701e532848559de1ee', 16, 'MD. Monirujjaman ', '2019-01-13', 1, '01711574882', 1),
(256, 6, NULL, 'eaae17c951e38a8cdf929dca61a15b26', 16, 'MD. Mostak Ahamed ', '2019-01-13', 1, '01717899492', 1),
(257, 6, NULL, '37729e0ac1c851d79bcb95ef7d2c7012', 16, 'Md. Ariful Islam', '2019-01-13', 1, '01968858337', 1),
(258, 6, NULL, '2d485621956397394ac7c50660a9aa44', 16, 'Lal Chan ', '2019-01-13', 1, '01739607109', 1),
(259, 6, NULL, '215320611ee66aaae33bdf405a05913b', 16, 'Mostofa Mahmud Zoha', '2019-01-14', 1, '01712669309', 1),
(260, 6, NULL, '22dead30dea3c28d3203658015bc503b', 16, 'Sakil Ahamed ', '2019-01-16', 1, '01837386656', 1),
(261, 6, NULL, 'd63fd93174f8aa461c8d6d5813f44635', 16, 'F.M. Foridul Islam', '2019-01-16', 1, '01779554972', 1),
(262, 6, NULL, '02225f70a541cd5e31b50c6e7dd61efe', 16, 'Md. Siddikur Rahaman ', '2019-01-16', 1, '01734694070', 1),
(263, 6, NULL, '38b9b0f080b788355e5a2edf5f2a97b1', 16, 'Mohammad Dalower Hossan ', '2019-01-16', 1, '01912416046', 1),
(264, 6, NULL, '38b9b0f080b788355e5a2edf5f2a97b1', 16, 'Mohammad Dalower Hossan ', '2019-01-16', 1, '01912416046', 1),
(265, 6, NULL, 'f82b771c55224de7c57a27d1be870685', 16, 'Md. Anowar Hossain ', '2019-01-16', 1, '01752107693', 1),
(266, 6, NULL, '07a40e815027e2222b548976595d1402', 16, 'Md. Zahid Hossain ', '2019-01-16', 1, '01714163224', 1),
(267, 6, NULL, '0ab521653ce07089b972ecff8ec3d664', 16, 'md. Liton ', '2019-01-16', 1, '01777815820', 1),
(268, 6, NULL, 'e536e7a1ee27ceb3d3da2c5f3163150f', 16, 'Md Aminul Islam', '2019-01-16', 1, '01710771840', 1),
(269, 6, NULL, 'e33786662470069bcc65bba1ff64ddf2', 16, 'Kripamoy Sarkar ', '2019-01-16', 1, '0172697107', 1),
(270, 6, NULL, '42ab21a9ba81bf8608a2578c12f2983e', 16, 'K.M. Ronot Jahan Tomal ', '2019-01-16', 1, '01711186310', 1),
(271, 6, NULL, '31ea12f10708bfb8b592b9e31d0e30b0', 16, 'Anwar Hosan ', '2019-01-16', 1, '01635406871', 1),
(272, 6, NULL, '8a6b876d5d97bc56a3258354522c3f66', 16, 'Md. Abu Yousuf Murad ', '2019-01-16', 1, '01914907167', 1),
(273, 6, NULL, 'ac26d16b4845eeba3aba23194593f2df', 16, 'Md. Abul Bashar ', '2019-01-16', 1, '01932716613', 1),
(274, 6, NULL, '7bb08fd88ee550c2c84ef02044d3bb60', 16, 'Md. Hasem ', '2019-01-16', 1, '01942334614', 1),
(275, 6, NULL, 'e25361413f8d4f560e8fdfc11d2d55a1', 16, 'Lutfar Rahaman ', '2019-01-16', 1, '01720014474', 1),
(276, 6, NULL, 'a697f063c6295dbedcedd92c2cbd363b', 16, 'Hossainul Kibria ', '2019-01-16', 1, '01737686722', 1),
(277, 6, NULL, 'd3fde79a53b20cb833b22ed8300a6758', 16, 'Dewan Shadadul Hoque Uzzal ', '2019-01-16', 1, '01710990808', 1),
(278, 6, NULL, 'ea4218c8f26cd70ceba2438f5780a0f2', 16, 'Saiful Islam ', '2019-01-16', 1, '01678715101', 1),
(279, 6, NULL, 'ea4218c8f26cd70ceba2438f5780a0f2', 16, 'Saiful Islam ', '2019-01-16', 1, '01678715101', 1),
(280, 6, NULL, '561cd21062543fdf451a4ba79d3a56ce', 16, 'Md. Jul-E- Aslam ', '2019-01-16', 1, '01711713678', 1),
(281, 6, NULL, '98ea6574d9e64ef30411997c0ea469d5', 16, 'Sheikh Abdur Rohim ', '2019-01-16', 1, '01933361473', 1),
(282, 6, NULL, '6a4e0659be2e7fd16eaa2c31e8d44c86', 16, 'Md. Mujebur Rahaman ', '2019-01-16', 1, '01674742222', 1),
(283, 6, NULL, '6a2b6ff0f017830fac59c70b0011a874', 16, 'MD. Golam Rosul ', '2019-01-16', 1, '01712355498', 1),
(284, 6, NULL, '3a437bdfcb7aa4db7970a589cb14c690', 16, 'Md. Saiful Islam ', '2019-01-16', 1, '01850861056', 1),
(285, 6, NULL, '57a169e1c64df587d3d11c508fd5f2fa', 16, 'Md.Nuruddin Hwlhder ', '2019-01-16', 1, '01913227421', 1),
(286, 6, NULL, '6838ffb0dcd65bcd63db557409d47804', 16, 'Md. Shumsud Daha ', '2019-01-16', 1, '01716642291', 1),
(287, 6, NULL, '5bd56fc652766d49c07c10a84c550b1a', 16, 'Md. Anawer Hossain ', '2019-01-19', 1, '01872629482', 1),
(288, 6, NULL, '7a2fb9f96840fc19afa009908a80aa6f', 16, 'Md. Josim Uddin ', '2019-01-19', 1, '01814216040', 1),
(289, 6, NULL, '27ab3e0892208d5431404fbc4d499603', 16, 'Mohammad Masud Rana', '2019-01-19', 1, '01716901330', 1),
(290, 6, NULL, '2906943dddc5a4108b870b088f9377c7', 16, 'Muhammad Shafidllah Shake ', '2019-01-19', 1, '01716763729', 1),
(291, 6, NULL, 'e8d14ad5906ed42848d1c1cbcf3c7259', 16, 'Md. Touidul Islam ', '2019-01-19', 1, '01718942675', 1),
(292, 6, NULL, '39445c151533968fc2fd6c3e18c01728', 16, 'Mijanur Rahaman ', '2019-01-19', 1, '01818515384', 1),
(293, 6, NULL, 'e0c5dc2d782e40eb7e2d00e7d7f258d0', 16, 'Shaikh Abul Kashrm Fardous ', '2019-01-19', 1, '01711956191', 1),
(294, 6, NULL, 'cab33d4f97a4300f4d834369cdee0a40', 16, 'Md. Abjal Hossan ', '2019-01-19', 1, '01948356096', 1),
(295, 6, NULL, '65909218fe8a6dbd02713fc78411c078', 16, 'Warish Nadim ', '2019-01-19', 1, '01624847867', 1),
(296, 6, NULL, 'ab4536e54ab27c8f66def2dc36f2ea73', 16, 'Imtiaz Masroor ', '2019-01-19', 1, '01715021592', 1),
(297, 6, NULL, '5bfbc5d2f8ea1dd2ac0119becfa01d50', 16, 'Md. Nazrul Islam ', '2019-01-19', 1, '01710622850', 1),
(298, 6, NULL, '158b292c21beeb2e60402259fc5c3543', 16, 'Md. Obidun Nobi ', '2019-01-19', 1, '01730405410', 1),
(299, 6, NULL, '5f863eefe8d96b27f3558f07b1034135', 16, 'Dalowar Hossain ', '2019-01-19', 1, '01745901847', 1),
(300, 6, NULL, '74373b261a0a0b461ed32c972e49b61c', 16, 'Abdul Kadir ', '2019-01-19', 1, '01954499091', 1),
(301, 6, NULL, '3f8f3fcfa9552f241624443039eceb2d', 16, 'MD. jalal ', '2019-01-19', 1, '01777525139', 1),
(302, 6, NULL, 'bfb1c1da72ff29f7bbdac7b7af3b58ad', 16, 'Akrim Hossain Mia', '2019-01-19', 1, '01715699669', 1),
(303, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Swapanchandra Das ', '2019-01-19', 1, '0', 1),
(304, 6, NULL, 'ef3b0d7bfc1b10a8ef580ba05b3756f8', 16, 'Md. Sinto Hossain ', '2019-01-19', 1, '01776797671', 1),
(305, 6, NULL, '20ea5d997fc37a75aa8a804f1091ee35', 16, 'Md. Raihan Mia', '2019-01-19', 1, '01771587606', 1),
(306, 6, NULL, 'ce1ff2d9ef8e9f0c8e92a4b759b48eb7', 16, 'Sheikh Mohammed Arman ', '2019-01-19', 1, '01815437103', 1),
(307, 4, NULL, 'd73cc2896727c6138d4f341986a3b07e', 16, 'Md. Nurul Islam', '2019-01-19', 1, '01938872474', 1),
(308, 6, NULL, '85b22fddc9f79fe2b4b6a89726322b3e', 16, 'Md. Rabbi ', '2019-01-20', 1, '01835497781', 1),
(309, 6, NULL, 'b2a1823e6edba1809de8ad320fa8f1ed', 16, 'Md. Amjad ', '2019-01-20', 1, '01715819219', 1),
(310, 6, NULL, '3e114cadcdb1e1ce40c5f69d40712aee', 16, 'Md. Dalower Hossain ', '2019-01-20', 1, '01914849902', 1),
(311, 6, NULL, '76f64883f992f4841e9dd9db943f8984', 16, 'Md. Jahngir ', '2019-01-20', 1, '01960800211', 1),
(312, 6, NULL, '356a0e19d5bb71bb8d334733050907a6', 16, 'Abdul Bashar ', '2019-01-20', 1, '01722026600', 1),
(313, 6, NULL, '4e47d78114c5a8918cca30b3eb42cc75', 16, 'Md. Litan Akon ', '2019-01-20', 1, '01786693250', 1),
(314, 6, NULL, '5896aa766fd5d5a1105c35cda3e96d35', 16, 'Heal Mahmad ', '2019-01-20', 1, '01712081008', 1),
(315, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Md. Badrul Alam Shipon ', '2019-01-20', 1, '0', 1),
(316, 6, NULL, '1963107acbeb131e5cdd9b57c7ea89ac', 16, 'Md. Masud Rana ', '2019-01-20', 1, '01749972072', 1),
(317, 6, NULL, 'bd7543bb896082d236472d9cb36cf720', 16, 'Md. Ferouz Mahmud', '2019-01-20', 1, '01712472015', 1),
(318, 6, NULL, '539cc655ea030da1f4f31d20c480d6c1', 16, 'Md. Abu Bokkor Shiddik Ripon ', '2019-01-20', 1, '01924958344', 1),
(319, 6, NULL, 'ee4c0e9e9ea69df73be7e0b9fb256390', 16, 'Md. Habib Islam ', '2019-01-20', 1, '01722902003', 1),
(320, 6, NULL, '0efa5bade15c82772d4692feb0f497a7', 16, 'Mohammad Saiful Islam ', '2019-01-20', 1, '01764788893', 1),
(321, 6, NULL, '5339721d1a0771f681b81d0155bd4d85', 16, 'Md. Milon Hossain ', '2019-01-20', 1, '01948634744', 1),
(322, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Santu Mia ', '2019-01-20', 1, '0', 1),
(323, 6, NULL, '12f70103f37562a1be973055add5fd04', 16, 'Abul Kalam Manshi ', '2019-01-20', 1, '01734349394', 1),
(324, 6, NULL, '8dc9224e23803c61a13904a87fe10f02', 16, 'Md. Monir Hossen ', '2019-01-20', 1, '01991633355', 1),
(325, 6, NULL, '24d025e239bffe4fb607c2910b4db4e2', 16, 'Alamgir Hossain ', '2019-01-20', 1, '01932600639', 1),
(326, 6, NULL, 'a88ab5cb56cfd57cd26ad7616b63f82b', 16, 'Amdadul Shikder ', '2019-01-20', 1, '01751938945', 1),
(327, 6, NULL, 'c1cea7f42ad7807f763e6e705a2ca0cf', 16, 'Md. Feroj Ahmed ', '2019-01-20', 1, '01714495061', 1),
(328, 6, NULL, '4f73cfd8b1984b8733508bb7269ca0d9', 16, 'Md. Shakhoyat Hossan ', '2019-01-20', 1, '01924527164', 1),
(329, 6, NULL, '007b3e87a14cbf7eb718bdf62500a085', 16, 'Md. Ikbal Mullik ', '2019-01-21', 1, '01910761859', 1),
(330, 4, NULL, 'ac57b0f62f0cbdb5c43a05d742392ddd', 16, 'Mohammad Musfequs Saeheen', '2019-01-21', 1, '01819790408', 1),
(331, 4, NULL, 'a697f063c6295dbedcedd92c2cbd363b', 16, 'Hosian Kibria ', '2019-01-21', 1, '01737686722', 1),
(332, 4, NULL, '26d30cc28bb540537f2cd888fcd84deb', 16, 'Kamal', '2019-01-21', 1, '01714446757', 1),
(333, 4, NULL, 'e998d886bb289bff13f07ab142e250d8', 16, 'Habibur Rahman', '2019-01-21', 1, '01754540587', 1),
(334, 4, NULL, '653d9f8513f1457ce90defb51db8821c', 16, 'MD. Murshedul Haque', '2019-01-21', 1, '01716968772', 1),
(335, 4, NULL, 'd334b5b3cf9dafdee56fd6cb8b017d77', 16, 'Samsul Huda', '2019-01-21', 1, '01817079159', 1),
(336, 4, NULL, '2fbbdd24b73ddb0b80681feb89d2b351', 16, 'Harunar Rashid', '2019-01-21', 1, '01712588352', 1),
(337, 4, NULL, '682653abc6e561321c01d0725da11332', 16, 'Dr. Jahangir Alam', '2019-01-21', 1, '01712027371', 1),
(338, 4, NULL, '3996edce9130b0ae5733cddfba7d9fe0', 16, 'Prodip Kumar Das', '2019-01-21', 1, '01715434913', 1),
(339, 4, NULL, '6c095ced589036a74c07b1b2d74645d7', 16, 'MD. Sharower Hossain', '2019-01-21', 1, '01552469989', 1),
(340, 4, NULL, '0928fd7729b9cc2a3ad37297bdcee754', 16, 'MD. Motalab', '2019-01-21', 1, '01758109926', 1),
(341, 4, NULL, '01e6ac91c10bec2c6bed22a3f0cb37a0', 16, 'Mohammad Oliulla', '2019-01-21', 1, '01672592257', 1),
(342, 4, NULL, 'd41bdacbd8f202a3bd961cb6a07f67e6', 16, 'MD. Abdul Karim', '2019-01-21', 1, '01712684258', 1),
(343, 6, NULL, '96a3be3cf272e017046d1b2674a52bd3', 16, 'Jihadul Islam ', '2019-01-22', 1, '01', 1),
(344, 6, NULL, '0a2febe7869443e5868c4ee0cdf17450', 16, 'Md. Abu Rasel ', '2019-01-23', 1, '017400900178', 1),
(345, 6, NULL, 'd4cefffb7c21b9a4adfe0f4b7867ac28', 16, 'Anayet Hossain ', '2019-01-23', 1, '01792224223', 1),
(346, 6, NULL, 'cd471893d99098d9dc78642a0ec1dbf5', 16, 'Ariful Islam ', '2019-01-23', 1, '01814784562', 1),
(347, 6, NULL, '0af4404c8d6c3013757cdcf515f69399', 16, 'Md. Rezaul Karim ', '2019-01-23', 1, '01718653736', 1),
(348, 6, NULL, '80bff3874df413f3220e51256bdb7b5c', 16, 'Md. Ali ', '2019-01-23', 1, '01677482295', 1),
(349, 6, NULL, '099acb737932db11e1081888839afe29', 16, 'Mohammad Ali', '2019-01-23', 1, '01912150951', 1),
(350, 6, NULL, 'a38ca8f947e8004866db593ee5422716', 16, 'Ahidur Rahman ', '2019-01-23', 1, '01948148003', 1),
(351, 6, NULL, '271a80661dc6ec691a05729139c815d4', 16, 'Monirujjaman Manir ', '2019-01-23', 1, '01627284197', 1),
(352, 6, NULL, '5537b794336f94794e8a87e29b54a14d', 16, 'Md. Nazrul Islam ', '2019-01-23', 1, '01710622350', 1),
(353, 6, NULL, '2e1298af806c679e200a963005f28f6f', 16, 'Munsur Ahamed ', '2019-01-23', 1, '01713623762', 1),
(354, 6, NULL, '9181569cd1411ee9ae1bcf0d4107eb14', 16, 'Abdul Majid Molla ', '2019-01-23', 1, '01933361910', 1),
(355, 6, NULL, 'ef3b0d7bfc1b10a8ef580ba05b3756f8', 16, 'Md. Sentu Hosen', '2019-01-23', 1, '01776797671', 1),
(356, 6, NULL, 'bb10636eb0f2871983a79c4f290dca9b', 16, 'Md. Sidul Islam ', '2019-01-23', 1, '01941552680', 1),
(357, 6, NULL, 'c834abf755c58fad639a6193abff66bd', 16, 'Md. Anowar Hosan ', '2019-01-23', 1, '01884914983', 1),
(358, 6, NULL, 'ebaf92797017e734cc98181bd155e0c0', 16, 'Hafeza Md. Eiles ', '2019-01-23', 1, '01741692212', 1),
(359, 6, NULL, '4446370dad5fbeb8528717212e2e11e6', 16, 'Md. Mannan ', '2019-01-23', 1, '01792414993', 1),
(360, 4, NULL, '5bf983010da9a3f699822d066730a571', 16, 'Hashem Ali', '2019-01-23', 1, '01713371403', 1),
(361, 4, NULL, '83bfd620853c37cc58c1e796dd628fd4', 16, 'Abdul Owahab Khan', '2019-01-23', 1, '01988984833', 1),
(362, 4, NULL, 'ac8ffa6f0f4b594651ed8a31f88fe302', 16, 'Bozulur Rahman', '2019-01-23', 1, '01674308857', 1),
(363, 4, NULL, 'dbd1f6373adaf8301f853b2962dc2447', 16, 'Monayem Khan', '2019-01-23', 1, '01740574326', 1),
(364, 6, NULL, '6121ef7a508bf18fb617fbc1300e0b84', 16, 'Kobir Hosen ', '2019-01-23', 1, '019928545731', 1),
(365, 6, NULL, '6121ef7a508bf18fb617fbc1300e0b84', 16, 'Asadul Sheikh ', '2019-01-23', 1, '019928545731', 1),
(366, 4, NULL, 'f62aeb95d20372bee8fadaf3258c69e6', 16, 'Kazi Abdul Aziz', '2019-01-23', 1, '01686408227', 1),
(367, 4, NULL, '8d1bc4fa6bcfc82908c3bbc50a683bd5', 16, 'Shihab Hossain', '2019-01-23', 1, '01552358070', 1),
(368, 4, NULL, '8302bf85cf3ca112461eada195532a7f', 16, 'MD. Sayem Ahamed', '2019-01-23', 1, '01911384050', 1),
(369, 4, NULL, '6d4993f366725e2733a286396fa232af', 16, 'Abdul Bashar', '2019-01-23', 1, '01818619063', 1),
(370, 6, NULL, '7c29f542d63141fc773e3457246d9acf', 16, 'Sumon Khan ', '2019-01-23', 1, '01720222328', 1),
(371, 4, NULL, 'c7c8f1810eff82a6610880d2aa3eed7c', 16, 'Srajul Islam', '2019-01-23', 1, '01712290157', 1),
(372, 4, NULL, 'aba65378ae52ffd24b9b00c0b5f200b2', 16, 'MD. Jamal uddin', '2019-01-23', 1, '01713927865, 01914878515', 1),
(373, 4, NULL, '66570ac50f5d3d4a18aad37492a2c464', 16, 'Sorwar Hossain', '2019-01-23', 1, '01738655789', 1),
(374, 4, NULL, 'c7393724892896e2dc5f3c01c5e4692e', 16, 'Ajaharul islam', '2019-01-23', 1, '01713581806', 1),
(375, 4, NULL, 'ef4ebb8d4aa126640e8cc3f017f949b0', 16, 'MD. Roni', '2019-01-23', 1, '01675703882', 1),
(376, 6, NULL, 'f8d2efb8736f239e461a889be13c82a1', 16, 'Md. Fazulr Rahman Bhuyan ', '2019-01-23', 1, '01726694948', 1),
(377, 4, NULL, 'f20dc227b86c7c83eb6a18a46ffadc46', 16, 'Samsul Haque', '2019-01-23', 1, '01922556198', 1),
(378, 4, NULL, '609a55915046774895f2082c4ae9188a', 16, 'Fariduzzaman', '2019-01-23', 1, '01916143261', 1),
(379, 4, NULL, 'bbfbeeecfc8159c7e8c81e3ab6da8672', 16, 'Jalal Uddin( Emon)', '2019-01-23', 1, '01921699385', 1),
(380, 4, NULL, '99aac81d91d720b87bc08c71b2b3eec2', 16, 'MD. Amin', '2019-01-23', 1, '01719888660', 1),
(381, 6, NULL, '4ce8a40e53083c404d05ffc08c44ece6', 16, 'Abdul Mannan ', '2019-01-23', 1, '01724486021', 1),
(382, 6, NULL, '4ef510d7977adb7bf0b5bbc2fd998dea', 16, 'Rashed Ahamed ', '2019-01-23', 1, '01533403082', 1),
(383, 6, NULL, '8cc0ffd3f6a92d0e0a38cbef8a65e490', 16, 'Suman Chandra Pual ', '2019-01-23', 1, '01754901435', 1),
(384, 6, NULL, 'f5c6c39627ab12ed2114be502bc4c8b7', 16, 'Bidhan Kumar Podder ', '2019-01-23', 1, '01720956041', 1),
(385, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Md. Jasim Uddin ', '2019-01-23', 1, 'Due ', 1),
(386, 6, NULL, 'e90b8b067bab61e6fcbd8ff4dbd9fe02', 16, 'Md. Aiub Ali ', '2019-01-23', 1, '01966160198', 1),
(387, 6, NULL, '67fcdf751d5b2508ebe965c2b1cd7fab', 16, 'Md. Roni Hasan ', '2019-01-23', 1, '01715620071', 1),
(388, 6, NULL, '73d2a77c22839abf5b8d0e2d760b0d72', 16, 'Md. nasir Uddin ', '2019-01-23', 1, '01970807384', 1),
(389, 6, NULL, 'fe303719347bfcfa2bb441e3257edce9', 16, 'M. Hayder Shams ', '2019-01-23', 1, '01680877299', 1),
(390, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Due ', '2019-01-23', 1, 'Due ', 1),
(391, 6, NULL, '13cd0810caaa70fd706081ba162300f5', 16, 'Mohammad Saiful Islam ', '2019-01-23', 1, '0176788893', 1),
(392, 6, NULL, 'e6212fa519e44723dcaff5aefa655916', 16, 'Jontu Lal Halder ', '2019-01-23', 1, '01639456533', 1),
(393, 6, NULL, 'd92993395a8b3308dc88128cb09a9157', 16, 'Md. Aslam Kazi ', '2019-01-23', 1, '01733742021', 1),
(394, 6, NULL, '5fab6f36df57d0bed28152892a539817', 16, 'Hannan Mia', '2019-01-23', 1, '01911161802', 1),
(395, 6, NULL, '93825c6e348ff7f2cf49634d3f3b5d84', 16, 'Anwar Hosan ', '2019-01-23', 1, '01748973527', 1),
(396, 6, NULL, '85ea3111bac53fa2a8c080ba1cdbec6c', 16, 'Mhamud Hasan ', '2019-01-23', 1, '01715116133', 1),
(397, 6, NULL, '19e33c6d580e0d36a8dac6fc9e7f71aa', 16, 'Md. Nasir Hossain ', '2019-01-23', 1, '01765589657', 1),
(398, 6, NULL, '26b674cebbe0352c36ca8f54fbebad9e', 16, 'Belal Hossain ', '2019-01-23', 1, '01707771751', 1),
(399, 6, NULL, '511a6317daf1db160274d4ead1b654b2', 16, 'Md. Abu Sateid ', '2019-01-23', 1, '01953647080', 1),
(400, 6, NULL, '1a372c183d7bdf6c20274594669a27b9', 16, 'Md. Johurul Islam ', '2019-01-23', 1, '01717176394', 1),
(401, 6, NULL, '4c8062013f93062e60bd047b77f4cecf', 16, 'Khorshed Alam ', '2019-01-24', 1, '01938718153', 1),
(402, 6, NULL, 'ea40d592b66afbfda0d7243fb7d8d12f', 16, 'Alauddin Howlader ', '2019-01-24', 1, '01986810461', 1),
(403, 6, NULL, 'fbe7840a2018c463e2f3928a90f73d27', 16, 'Md. Shohel ', '2019-01-24', 1, '01933788424', 1),
(404, 6, NULL, '8f78968dea3a2fba54dba91e4466deb9', 16, 'Md. Abdul Manan Ali', '2019-01-24', 1, '01718964489', 1),
(405, 6, NULL, '8f78968dea3a2fba54dba91e4466deb9', 16, 'Md. Abdul Manan Ali', '2019-01-24', 1, '01718964489', 1),
(406, 6, NULL, '940c6902ff18837f471eb455c9938d1b', 16, 'Md. Jewel Rana ', '2019-01-24', 1, '01913460858', 1),
(407, 4, NULL, 'c8403dc7f92772a7b0a55c5be0c5cf4d', 16, 'MD. Kamrul Islam', '2019-01-24', 1, '01797253068', 1),
(408, 4, NULL, '9d10229e0636ffeffa80b2a30abfac8d', 16, 'Raquibul Hasan', '2019-01-24', 1, '01717853122', 1),
(409, 6, NULL, '848517679cd944d20a5529ba4437ac0b', 16, 'Md. Morad Hossain ', '2019-01-24', 1, '01790643908', 1),
(410, 4, NULL, 'ce6e6a3c58a56eed67f0b0bb36a00407', 16, 'MD. Zahidul ALam (Zahid)', '2019-01-24', 1, '01714200170', 1),
(411, 6, NULL, '2f2a18f40cf9cf3d77409eba4c9792e2', 16, 'Md. Anisul Haque ', '2019-01-24', 1, '01914232257', 1),
(412, 4, NULL, '650dd635a3c10bfb27b47b1463d0468b', 16, 'Shohel Ahmed', '2019-01-24', 1, '01924707451', 1),
(413, 4, NULL, 'f99362ea5a207155c6958145f804cd18', 16, 'MD. Mazidul Islam', '2019-01-24', 1, '01792033567', 1),
(414, 4, NULL, 'c2b5b0f2882e29eff7fcc5acc6496d18', 16, 'MD. Rafiquel Islam', '2019-01-24', 1, '01711024281', 1),
(415, 4, NULL, 'dba3f3b3684beb20e369371cddaab147', 16, 'Bikash Chandol Mandol', '2019-01-24', 1, '01710953056', 1),
(416, 4, NULL, '5c770fe14eceb41e002ee8955b9ddb18', 16, 'Mainul Islam', '2019-01-24', 1, '01711231608', 1),
(417, 4, NULL, '785ed97e72b2f62a3b71c068dc72292f', 16, 'Hosin ferdour Shsir', '2019-01-24', 1, '01715547187', 1),
(418, 6, NULL, '63f6a4400976a36e0ee52b9b52953184', 16, 'Md. Abu Naser Owahed ', '2019-01-24', 1, '01708985800', 1),
(419, 4, NULL, 'd49a16c6c20bb7231d61eb4a87e2c552', 16, 'Yeasin Arafat', '2019-01-24', 1, '01788650456', 1),
(420, 6, NULL, 'b5ab94b96df304bb7358e13af85e9092', 16, 'Md. Mominul Islam ', '2019-01-24', 1, '01712055348', 1),
(421, 4, NULL, '3ba22e1fdda25268b1290c92e8fb9018', 16, 'Sharif Golam Kawsar', '2019-01-24', 1, '01712280733', 1),
(422, 6, NULL, 'cc0d09c635233e39d29a0fd79ac2a573', 16, 'Md. Badol Hossen ', '2019-01-24', 1, '01552335893', 1),
(423, 4, NULL, 'be65f3bf9aea00c987b4a99767316eb2', 16, 'Jakir Hossen', '2019-01-24', 1, '01678022709', 1),
(424, 6, NULL, '70e9ff7d79b568c6dc4e472add57c97a', 16, 'Md. Soliman Ali ', '2019-01-24', 1, '01729071789', 1),
(425, 6, NULL, '5d80de072accc6451781060016702d61', 16, 'Md. Alamgir Hossain ', '2019-01-24', 1, '01713093706', 1),
(426, 6, NULL, 'f4bc0df0e42fb5c8569c4bffaf4b6fbd', 16, 'Md. Selim ', '2019-01-24', 1, '01731012669', 1),
(427, 6, NULL, 'cab33d4f97a4300f4d834369cdee0a40', 16, 'Md. Abjal Hosan ', '2019-01-24', 1, '01948356096', 1),
(428, 6, NULL, 'e7397e38d6608fbe4257ce5626f673dc', 16, 'Sajedul Karim ', '2019-01-24', 1, '01775053316', 1),
(429, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'MD. Roknuzzaman', '2019-01-24', 1, '01819556485', 1),
(430, 4, NULL, 'b2443d7c6ba24f285bcb589aabb6a403', 16, 'Abdul Sattar', '2019-01-24', 1, '01881659416', 1),
(431, 4, NULL, 'fe552af6ca23d7096734518817dd62b8', 16, 'Elius Mia', '2019-01-24', 1, '01711200450', 1),
(432, 4, NULL, 'd0c99c802e35ce19b21726a2519a0978', 16, 'Zahid Kamal ', '2019-01-24', 1, '01714920005', 1),
(433, 4, NULL, '5753b1f5ad83e3b5c6e2a06f41ec0b47', 16, 'Emon', '2019-01-24', 1, '01785298242', 1),
(434, 4, NULL, '1a6cb4904de7e8b2cfb53b1bd374231a', 16, 'MD. Rezaul Karim ', '2019-01-24', 1, '01914702746', 1),
(435, 4, NULL, 'd3989c620d1e8c0b7d601005edb13ba6', 16, 'MD. Mosharaf Hossain Molla', '2019-01-24', 1, '01711314000', 1),
(436, 4, NULL, 'a10a7479a95615a44534a4d0bd409337', 16, 'Abu Naser', '2019-01-24', 1, '01711392359', 1),
(437, 4, NULL, '277cd16d3e422d8cf3df1055c8b49772', 16, 'Kamruzaman ', '2019-01-24', 1, '01843516484', 1),
(438, 4, NULL, 'c78e2c6c04cc82d4cccbac2d867eb92f', 16, 'K.M Abul Kalam Azad', '2019-01-24', 1, '01711136902', 1),
(439, 4, NULL, '5c0469aeb91af369e304d428bf575b30', 16, 'MD. Fareq Hossain ', '2019-01-24', 1, '01717346502', 1),
(440, 4, NULL, 'c141b7a7cceee19dccfcf73b4e7a197d', 16, 'Shalim Mullah', '2019-01-24', 1, '01937261866', 1),
(441, 4, NULL, 'd7b5492091dda514bcdb867740726ab7', 16, 'S.M Fayzur Rahman', '2019-01-24', 1, '01552381962', 1),
(442, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam ', '2019-01-24', 1, '01741565333', 1),
(443, 4, NULL, 'e838bc6cfb6eeaf7771d4d6808b78b85', 16, 'DR. MD. Mizanur Rahman ', '2019-01-24', 1, '01711131492', 1),
(444, 4, NULL, '44fbe9c0ab9a53420932162119cbd2d4', 16, 'Nurul Alam ', '2019-01-24', 1, '01681049205', 1),
(445, 4, NULL, '0455e5b7f48b2e3ccca2413a56724dd6', 16, 'Akter Hossain ', '2019-01-24', 1, '01741653087', 1),
(446, 4, NULL, '1326b6059a40e4157663d191a24f82d3', 16, 'MD. Moslem Uddin Sarker', '2019-01-24', 1, '01552342843', 1),
(447, 4, NULL, '6a0c6f9c0b0b0b6404489634d54926e2', 16, 'Mojammal Haque', '2019-01-24', 1, '01822954111', 1),
(448, 4, NULL, '6e9b151e45c5f0e0a5892d4433120048', 16, 'MD. Mizanur Rahman ', '2019-01-24', 1, '01848238827', 1),
(449, 4, NULL, 'e666cb60469fa9c27635a5efa90f4723', 16, 'Ariful Islam ', '2019-01-24', 1, '01718163085', 1),
(450, 4, NULL, '3bc88dc7b980086a86124c4c76370abe', 16, 'MD. Mohibur Rahman ', '2019-01-24', 1, '01911232334', 1),
(451, 4, NULL, '8e91381833a5c503a0fbfde378464a3e', 16, 'MD. Mahabub Hasan', '2019-01-24', 1, '01678062309', 1),
(452, 4, NULL, '8b8c2f38942d43e4eb34b7e4a4bf0e22', 16, 'KH. Mahfug Munzur (Monzur)', '2019-01-24', 1, '01711476068', 1),
(453, 4, NULL, '0f51f3a19e31488f2487f5a59cb96db3', 16, 'MD. Abul Hashem', '2019-01-24', 1, '01817584753', 1),
(454, 4, NULL, '633a9ce571799438ab3c18bf9cd00123', 16, 'MD. Raziul Karim', '2019-01-24', 1, '01717250068', 1),
(455, 4, NULL, '76b46b14fc46908ec59ac20890df35ed', 16, 'Rafiqul Haque Shikder', '2019-01-24', 1, '01778917571', 1),
(456, 4, NULL, '2728dfc54fac8407b37442f433ab7a4c', 16, 'MD. Yiamin Ali', '2019-01-24', 1, '01742969041', 1),
(457, 4, NULL, 'a368cfa586318b5eab21edb5d1e09f0c', 16, 'MD. Nazrul Islam Shikder', '2019-01-24', 1, '01716283386', 1),
(458, 6, NULL, '18495008c4868d12b104e6ea17ffe5b0', 16, 'Md. Shahadat Hossain ', '2019-01-26', 1, '01711022012', 1),
(459, 6, NULL, '8dc9224e23803c61a13904a87fe10f02', 16, 'Md. Monir Hossen ', '2019-01-26', 1, '01991633355', 1),
(460, 6, NULL, 'b75c1753d78b172511a36203a3cec119', 16, 'Md. Mijanur Rahaman ', '2019-01-26', 1, '01764519860', 1),
(461, 6, NULL, '241267735f32fe0317392b6bd67f60ff', 16, 'Syed Siddiqur Rahaman ', '2019-01-26', 1, '01717039065', 1),
(462, 6, NULL, '6e87fc56543d55288583626144ced9e2', 16, 'Hamidul Islam ', '2019-01-26', 1, '01679178961', 1),
(463, 6, NULL, '194b183e88f8d6e439a67cc5f5e2b7c5', 16, 'Md. Shajahan ', '2019-01-26', 1, '01726020249', 1),
(464, 6, NULL, 'a46db8ff3dc4aa86148e98881716843f', 16, 'Md. Ashraf Ali ', '2019-01-26', 1, '01715024460', 1),
(465, 6, NULL, '511a6317daf1db160274d4ead1b654b2', 16, 'Md.Abu Sayed ', '2019-01-26', 1, '01953647080', 1),
(466, 6, NULL, 'a5974b1b88f72c99ab71c0e930ec6d58', 16, 'Late Md. Sadik Hossain ', '2019-01-26', 1, '01929030882', 1),
(467, 6, NULL, '3a668364f1dbebb82cf9a81da4352b32', 16, 'Md. Shah Alom ', '2019-01-26', 1, '01882404398', 1),
(468, 6, NULL, 'f4fc38c1cf4673bd418f58e909e4756d', 16, 'Mizanur Rahman ', '2019-01-26', 1, '01733848806', 1),
(469, 6, NULL, '014b8230284652dcda9a82008414dd30', 16, 'Md. Titu ', '2019-01-26', 1, '01718304106', 1),
(470, 6, NULL, 'cfab6cdea93966f4a508a29993b3ee0a', 16, 'Md. Mahfujur Rahman ', '2019-01-26', 1, '01718957392', 1),
(471, 6, NULL, '9dec6ac8cb401ac2a6e75f49cee402b5', 16, 'Md. Shakhawat Ali ', '2019-01-26', 1, '01816601412', 1);
INSERT INTO `user` (`id`, `BranchId`, `EmployeeId`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `is_parents`) VALUES
(472, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Md. Jasim Uddin ', '2019-01-26', 1, 'Due ', 1),
(473, 6, NULL, '8e40390a8bd6165fe906f5fcba4d6441', 16, 'Md. Hafujur Sheikh ', '2019-01-26', 1, '01929109053', 1),
(474, 6, NULL, 'eb209dbe414de25189aaedc99a20ca1f', 16, 'Shorab Hossen Shajada ', '2019-01-27', 1, '01718811568', 1),
(475, 6, NULL, 'b97065daa93e6b41366f6106b3e21867', 16, 'Md. Alomgir Hosen', '2019-01-27', 1, '01726880856', 1),
(476, 6, NULL, '8512d290de9cc92e3b3c8aba5e9dc87d', 16, 'T.M. Asafuddowla Rana ', '2019-01-27', 1, '01755533431', 1),
(477, 6, NULL, '06d689473c04d4babe53c68748a5c20f', 16, 'Musiur Rahman ', '2019-01-27', 1, '01734861879', 1),
(478, 6, NULL, '06d689473c04d4babe53c68748a5c20f', 16, 'Musiur Rahman ', '2019-01-27', 1, '01734861879', 1),
(479, 6, NULL, 'e7f6d310b4a3af65bc3b6b6d10de18cb', 16, 'Md. Abul Kalam ', '2019-01-27', 1, '01936557213', 1);

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
(15, 'Teacher', 'Teacher', NULL, NULL, NULL, 0),
(16, 'Parent', 'Parents', NULL, NULL, NULL, 0),
(17, 'Admin', 'Admin', NULL, NULL, NULL, 1);

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
(4484, 'config_classes', 'index', 10, NULL),
(4485, 'config_classes', 'view', 10, NULL),
(4486, 'config_sections', 'index', 10, NULL),
(4487, 'config_sections', 'view', 10, NULL),
(4488, 'config_subjects', 'index', 10, NULL),
(4489, 'config_subjects', 'view', 10, NULL),
(4490, 'config_class_routines', 'index', 10, NULL),
(4491, 'config_class_routines', 'view', 10, NULL),
(4492, 'students', 'index', 10, NULL),
(4493, 'students', 'view', 10, NULL),
(4494, 'student_attendances', 'index', 10, NULL),
(4495, 'student_attendances', 'view', 10, NULL),
(4496, 'student_attendances', 'add', 10, NULL),
(4497, 'student_attendances', 'edit', 10, NULL),
(4498, 'student_attendances', 'delete', 10, NULL),
(4499, 'fees', 'index', 10, NULL),
(4500, 'fees', 'view', 10, NULL),
(4501, 'fees', 'add', 10, NULL),
(4502, 'fees', 'edit', 10, NULL),
(4503, 'fees', 'delete', 10, NULL),
(4504, 'manage_marks', 'index', 10, NULL),
(4505, 'manage_marks', 'view', 10, NULL),
(4506, 'manage_marks', 'add', 10, NULL),
(4507, 'manage_marks', 'edit', 10, NULL),
(4508, 'manage_marks', 'delete', 10, NULL),
(4509, 'report_tabulation_sheets', 'index', 10, NULL),
(4510, 'report_tabulation_sheets', 'view', 10, NULL),
(4511, 'report_tabulation_sheets', 'add', 10, NULL),
(4512, 'report_tabulation_sheets', 'edit', 10, NULL),
(4513, 'report_tabulation_sheets', 'delete', 10, NULL),
(4514, 'report_mark_sheets', 'index', 10, NULL),
(4515, 'report_mark_sheets', 'view', 10, NULL),
(4516, 'report_mark_sheets', 'add', 10, NULL),
(4517, 'report_mark_sheets', 'edit', 10, NULL),
(4518, 'report_mark_sheets', 'delete', 10, NULL),
(4774, 'report_mark_sheets', 'index', 13, NULL),
(4775, 'report_mark_sheets', 'view', 13, NULL),
(4776, 'report_mark_sheets', 'add', 13, NULL),
(4777, 'report_mark_sheets', 'edit', 13, NULL),
(4778, 'report_mark_sheets', 'delete', 13, NULL),
(4779, 'users', 'change_password', 13, NULL),
(4780, 'report_attendance_registers', 'index', 13, NULL),
(4781, 'report_attendance_registers', 'view', 13, NULL),
(4782, 'report_attendance_registers', 'add', 13, NULL),
(4783, 'report_attendance_registers', 'edit', 13, NULL),
(4784, 'report_attendance_registers', 'delete', 13, NULL),
(5540, 'organizations', 'index', 14, NULL),
(5541, 'organizations', 'view', 14, NULL),
(5542, 'organizations', 'add', 14, NULL),
(5543, 'organizations', 'edit', 14, NULL),
(5544, 'config_classes', 'index', 14, NULL),
(5545, 'config_classes', 'view', 14, NULL),
(5546, 'config_classes', 'add', 14, NULL),
(5547, 'config_classes', 'edit', 14, NULL),
(5548, 'config_sections', 'index', 14, NULL),
(5549, 'config_sections', 'view', 14, NULL),
(5550, 'config_sections', 'add', 14, NULL),
(5551, 'config_sections', 'edit', 14, NULL),
(5552, 'config_subjects', 'index', 14, NULL),
(5553, 'config_subjects', 'view', 14, NULL),
(5554, 'config_subjects', 'add', 14, NULL),
(5555, 'config_subjects', 'edit', 14, NULL),
(5556, 'config_class_periods', 'index', 14, NULL),
(5557, 'config_class_periods', 'view', 14, NULL),
(5558, 'config_class_periods', 'add', 14, NULL),
(5559, 'config_class_periods', 'edit', 14, NULL),
(5560, 'config_class_routines', 'index', 14, NULL),
(5561, 'config_class_routines', 'view', 14, NULL),
(5562, 'config_class_routines', 'add', 14, NULL),
(5563, 'config_class_routines', 'edit', 14, NULL),
(5564, 'students', 'index', 14, NULL),
(5565, 'students', 'view', 14, NULL),
(5566, 'students', 'add', 14, NULL),
(5567, 'students', 'edit', 14, NULL),
(5568, 'batch_students', 'index', 14, NULL),
(5569, 'batch_students', 'view', 14, NULL),
(5570, 'batch_students', 'add', 14, NULL),
(5571, 'batch_students', 'edit', 14, NULL),
(5572, 'student_attendances', 'index', 14, NULL),
(5573, 'student_attendances', 'view', 14, NULL),
(5574, 'student_attendances', 'add', 14, NULL),
(5575, 'student_attendances', 'edit', 14, NULL),
(5576, 'fee_configurations', 'index', 14, NULL),
(5577, 'fee_configurations', 'view', 14, NULL),
(5578, 'fee_configurations', 'add', 14, NULL),
(5579, 'fee_configurations', 'edit', 14, NULL),
(5580, 'fees', 'index', 14, NULL),
(5581, 'fees', 'view', 14, NULL),
(5582, 'fees', 'add', 14, NULL),
(5583, 'fees', 'edit', 14, NULL),
(5584, 'exams', 'index', 14, NULL),
(5585, 'exams', 'view', 14, NULL),
(5586, 'exams', 'add', 14, NULL),
(5587, 'exams', 'edit', 14, NULL),
(5588, 'grade_points', 'index', 14, NULL),
(5589, 'grade_points', 'view', 14, NULL),
(5590, 'grade_points', 'add', 14, NULL),
(5591, 'grade_points', 'edit', 14, NULL),
(5592, 'manage_marks', 'index', 14, NULL),
(5593, 'manage_marks', 'view', 14, NULL),
(5594, 'manage_marks', 'add', 14, NULL),
(5595, 'manage_marks', 'edit', 14, NULL),
(5596, 'report_tabulation_sheets', 'index', 14, NULL),
(5597, 'report_tabulation_sheets', 'view', 14, NULL),
(5598, 'report_tabulation_sheets', 'add', 14, NULL),
(5599, 'report_tabulation_sheets', 'edit', 14, NULL),
(5600, 'report_mark_sheets', 'index', 14, NULL),
(5601, 'report_mark_sheets', 'view', 14, NULL),
(5602, 'report_mark_sheets', 'add', 14, NULL),
(5603, 'report_mark_sheets', 'edit', 14, NULL),
(5604, 'employees', 'index', 14, NULL),
(5605, 'employees', 'view', 14, NULL),
(5606, 'employees', 'add', 14, NULL),
(5607, 'employees', 'edit', 14, NULL),
(5608, 'employee_designations', 'index', 14, NULL),
(5609, 'employee_designations', 'view', 14, NULL),
(5610, 'employee_designations', 'add', 14, NULL),
(5611, 'employee_designations', 'edit', 14, NULL),
(5612, 'ac_ledgers', 'index', 14, NULL),
(5613, 'ac_ledgers', 'view', 14, NULL),
(5614, 'ac_ledgers', 'add', 14, NULL),
(5615, 'ac_ledgers', 'edit', 14, NULL),
(5616, 'ac_payment_vouchers', 'index', 14, NULL),
(5617, 'ac_payment_vouchers', 'view', 14, NULL),
(5618, 'ac_payment_vouchers', 'add', 14, NULL),
(5619, 'ac_payment_vouchers', 'edit', 14, NULL),
(5620, 'ac_receipt_vouchers', 'index', 14, NULL),
(5621, 'ac_receipt_vouchers', 'view', 14, NULL),
(5622, 'ac_receipt_vouchers', 'add', 14, NULL),
(5623, 'ac_receipt_vouchers', 'edit', 14, NULL),
(5624, 'ac_income_statements', 'index', 14, NULL),
(5625, 'ac_income_statements', 'view', 14, NULL),
(5626, 'authors', 'index', 14, NULL),
(5627, 'authors', 'view', 14, NULL),
(5628, 'authors', 'add', 14, NULL),
(5629, 'authors', 'edit', 14, NULL),
(5630, 'book_types', 'index', 14, NULL),
(5631, 'book_types', 'view', 14, NULL),
(5632, 'book_types', 'add', 14, NULL),
(5633, 'book_types', 'edit', 14, NULL),
(5634, 'books', 'index', 14, NULL),
(5635, 'books', 'view', 14, NULL),
(5636, 'books', 'add', 14, NULL),
(5637, 'books', 'edit', 14, NULL),
(5638, 'manage_library_books', 'index', 14, NULL),
(5639, 'manage_library_books', 'view', 14, NULL),
(5640, 'manage_library_books', 'add', 14, NULL),
(5641, 'manage_library_books', 'edit', 14, NULL),
(5642, 'dormitories', 'index', 14, NULL),
(5643, 'dormitories', 'view', 14, NULL),
(5644, 'dormitories', 'add', 14, NULL),
(5645, 'dormitories', 'edit', 14, NULL),
(5646, 'student_dormitories', 'index', 14, NULL),
(5647, 'student_dormitories', 'view', 14, NULL),
(5648, 'student_dormitories', 'add', 14, NULL),
(5649, 'student_dormitories', 'edit', 14, NULL),
(5650, 'transport_routes', 'index', 14, NULL),
(5651, 'transport_routes', 'view', 14, NULL),
(5652, 'transport_routes', 'add', 14, NULL),
(5653, 'transport_routes', 'edit', 14, NULL),
(5654, 'transports', 'index', 14, NULL),
(5655, 'transports', 'view', 14, NULL),
(5656, 'transports', 'add', 14, NULL),
(5657, 'transports', 'edit', 14, NULL),
(5658, 'users', 'index', 14, NULL),
(5659, 'users', 'view', 14, NULL),
(5660, 'users', 'add', 14, NULL),
(5661, 'users', 'edit', 14, NULL),
(5662, 'user_roles', 'index', 14, NULL),
(5663, 'user_roles', 'view', 14, NULL),
(5664, 'user_roles', 'add', 14, NULL),
(5665, 'user_roles', 'edit', 14, NULL),
(5666, 'report_attendance_registers', 'index', 14, NULL),
(5667, 'report_attendance_registers', 'view', 14, NULL),
(5668, 'report_attendance_registers', 'add', 14, NULL),
(5669, 'report_attendance_registers', 'edit', 14, NULL),
(5839, 'report_mark_sheets', 'index', 16, NULL),
(5840, 'report_mark_sheets', 'view', 16, NULL),
(5841, 'report_mark_sheets', 'add', 16, NULL),
(5842, 'report_mark_sheets', 'edit', 16, NULL),
(5843, 'report_mark_sheets', 'delete', 16, NULL),
(9955, 'organizations', 'index', 17, NULL),
(9956, 'organizations', 'view', 17, NULL),
(9957, 'organizations', 'add', 17, NULL),
(9958, 'organizations', 'edit', 17, NULL),
(9959, 'organizations', 'delete', 17, NULL),
(9960, 'config_classes', 'index', 17, NULL),
(9961, 'config_classes', 'view', 17, NULL),
(9962, 'config_classes', 'add', 17, NULL),
(9963, 'config_classes', 'edit', 17, NULL),
(9964, 'config_classes', 'delete', 17, NULL),
(9965, 'config_sections', 'index', 17, NULL),
(9966, 'config_sections', 'view', 17, NULL),
(9967, 'config_sections', 'add', 17, NULL),
(9968, 'config_sections', 'edit', 17, NULL),
(9969, 'config_sections', 'delete', 17, NULL),
(9970, 'config_subjects', 'index', 17, NULL),
(9971, 'config_subjects', 'view', 17, NULL),
(9972, 'config_subjects', 'add', 17, NULL),
(9973, 'config_subjects', 'edit', 17, NULL),
(9974, 'config_subjects', 'delete', 17, NULL),
(9975, 'config_class_periods', 'index', 17, NULL),
(9976, 'config_class_periods', 'view', 17, NULL),
(9977, 'config_class_periods', 'add', 17, NULL),
(9978, 'config_class_periods', 'edit', 17, NULL),
(9979, 'config_class_periods', 'delete', 17, NULL),
(9980, 'config_class_routines', 'index', 17, NULL),
(9981, 'config_class_routines', 'view', 17, NULL),
(9982, 'config_class_routines', 'add', 17, NULL),
(9983, 'config_class_routines', 'edit', 17, NULL),
(9984, 'config_class_routines', 'delete', 17, NULL),
(9985, 'students', 'index', 17, NULL),
(9986, 'students', 'view', 17, NULL),
(9987, 'students', 'add', 17, NULL),
(9988, 'students', 'edit', 17, NULL),
(9989, 'students', 'delete', 17, NULL),
(9990, 'student_attendances', 'index', 17, NULL),
(9991, 'student_attendances', 'view', 17, NULL),
(9992, 'student_attendances', 'add', 17, NULL),
(9993, 'student_attendances', 'edit', 17, NULL),
(9994, 'student_attendances', 'delete', 17, NULL),
(9995, 'fee_types', 'index', 17, NULL),
(9996, 'fee_types', 'view', 17, NULL),
(9997, 'fee_types', 'add', 17, NULL),
(9998, 'fee_types', 'edit', 17, NULL),
(9999, 'fee_types', 'delete', 17, NULL),
(10000, 'fee_configurations', 'index', 17, NULL),
(10001, 'fee_configurations', 'view', 17, NULL),
(10002, 'fee_configurations', 'add', 17, NULL),
(10003, 'fee_configurations', 'edit', 17, NULL),
(10004, 'fee_configurations', 'delete', 17, NULL),
(10005, 'fees', 'index', 17, NULL),
(10006, 'fees', 'view', 17, NULL),
(10007, 'fees', 'add', 17, NULL),
(10008, 'fees', 'edit', 17, NULL),
(10009, 'fees', 'delete', 17, NULL),
(10010, 'exams', 'index', 17, NULL),
(10011, 'exams', 'view', 17, NULL),
(10012, 'exams', 'add', 17, NULL),
(10013, 'exams', 'edit', 17, NULL),
(10014, 'exams', 'delete', 17, NULL),
(10015, 'exam_routines', 'index', 17, NULL),
(10016, 'exam_routines', 'view', 17, NULL),
(10017, 'exam_routines', 'add', 17, NULL),
(10018, 'exam_routines', 'edit', 17, NULL),
(10019, 'exam_routines', 'delete', 17, NULL),
(10020, 'grade_points', 'index', 17, NULL),
(10021, 'grade_points', 'view', 17, NULL),
(10022, 'grade_points', 'add', 17, NULL),
(10023, 'grade_points', 'edit', 17, NULL),
(10024, 'grade_points', 'delete', 17, NULL),
(10025, 'manage_marks', 'index', 17, NULL),
(10026, 'manage_marks', 'view', 17, NULL),
(10027, 'manage_marks', 'add', 17, NULL),
(10028, 'manage_marks', 'edit', 17, NULL),
(10029, 'manage_marks', 'delete', 17, NULL),
(10030, 'report_tabulation_sheets', 'index', 17, NULL),
(10031, 'report_tabulation_sheets', 'view', 17, NULL),
(10032, 'report_tabulation_sheets', 'add', 17, NULL),
(10033, 'report_tabulation_sheets', 'edit', 17, NULL),
(10034, 'report_tabulation_sheets', 'delete', 17, NULL),
(10035, 'report_mark_sheets', 'index', 17, NULL),
(10036, 'report_mark_sheets', 'view', 17, NULL),
(10037, 'report_mark_sheets', 'add', 17, NULL),
(10038, 'report_mark_sheets', 'edit', 17, NULL),
(10039, 'report_mark_sheets', 'delete', 17, NULL),
(10040, 'admit_cards', 'index', 17, NULL),
(10041, 'admit_cards', 'view', 17, NULL),
(10042, 'admit_cards', 'add', 17, NULL),
(10043, 'admit_cards', 'edit', 17, NULL),
(10044, 'admit_cards', 'delete', 17, NULL),
(10045, 'employees', 'index', 17, NULL),
(10046, 'employees', 'view', 17, NULL),
(10047, 'employees', 'add', 17, NULL),
(10048, 'employees', 'edit', 17, NULL),
(10049, 'employees', 'delete', 17, NULL),
(10050, 'employee_departments', 'index', 17, NULL),
(10051, 'employee_departments', 'view', 17, NULL),
(10052, 'employee_departments', 'add', 17, NULL),
(10053, 'employee_departments', 'edit', 17, NULL),
(10054, 'employee_departments', 'delete', 17, NULL),
(10055, 'employee_designations', 'index', 17, NULL),
(10056, 'employee_designations', 'view', 17, NULL),
(10057, 'employee_designations', 'add', 17, NULL),
(10058, 'employee_designations', 'edit', 17, NULL),
(10059, 'employee_designations', 'delete', 17, NULL),
(10060, 'employee_branch_transfers', 'index', 17, NULL),
(10061, 'employee_branch_transfers', 'view', 17, NULL),
(10062, 'employee_branch_transfers', 'add', 17, NULL),
(10063, 'employee_branch_transfers', 'edit', 17, NULL),
(10064, 'employee_branch_transfers', 'delete', 17, NULL),
(10065, 'employee_promotions', 'index', 17, NULL),
(10066, 'employee_promotions', 'view', 17, NULL),
(10067, 'employee_promotions', 'add', 17, NULL),
(10068, 'employee_promotions', 'edit', 17, NULL),
(10069, 'employee_promotions', 'delete', 17, NULL),
(10070, 'employee_leave_managements', 'index', 17, NULL),
(10071, 'employee_leave_managements', 'view', 17, NULL),
(10072, 'employee_salary_disbursements', 'index', 17, NULL),
(10073, 'employee_salary_disbursements', 'view', 17, NULL),
(10074, 'employee_attendances', 'index', 17, NULL),
(10075, 'employee_attendances', 'view', 17, NULL),
(10076, 'ac_ledgers', 'index', 17, NULL),
(10077, 'ac_ledgers', 'view', 17, NULL),
(10078, 'ac_ledgers', 'add', 17, NULL),
(10079, 'ac_ledgers', 'edit', 17, NULL),
(10080, 'ac_ledgers', 'delete', 17, NULL),
(10081, 'ac_vouchers', 'index', 17, NULL),
(10082, 'ac_vouchers', 'view', 17, NULL),
(10083, 'ac_vouchers', 'add', 17, NULL),
(10084, 'ac_vouchers', 'edit', 17, NULL),
(10085, 'ac_vouchers', 'delete', 17, NULL),
(10086, 'ac_payment_vouchers', 'index', 17, NULL),
(10087, 'ac_payment_vouchers', 'view', 17, NULL),
(10088, 'ac_payment_vouchers', 'add', 17, NULL),
(10089, 'ac_payment_vouchers', 'edit', 17, NULL),
(10090, 'ac_payment_vouchers', 'delete', 17, NULL),
(10091, 'ac_receipt_vouchers', 'index', 17, NULL),
(10092, 'ac_receipt_vouchers', 'view', 17, NULL),
(10093, 'ac_receipt_vouchers', 'add', 17, NULL),
(10094, 'ac_receipt_vouchers', 'edit', 17, NULL),
(10095, 'ac_receipt_vouchers', 'delete', 17, NULL),
(10096, 'ac_income_statements', 'index', 17, NULL),
(10097, 'ac_income_statements', 'view', 17, NULL),
(10098, 'authors', 'index', 17, NULL),
(10099, 'authors', 'view', 17, NULL),
(10100, 'authors', 'add', 17, NULL),
(10101, 'authors', 'edit', 17, NULL),
(10102, 'authors', 'delete', 17, NULL),
(10103, 'book_types', 'index', 17, NULL),
(10104, 'book_types', 'view', 17, NULL),
(10105, 'book_types', 'add', 17, NULL),
(10106, 'book_types', 'edit', 17, NULL),
(10107, 'book_types', 'delete', 17, NULL),
(10108, 'books', 'index', 17, NULL),
(10109, 'books', 'view', 17, NULL),
(10110, 'books', 'add', 17, NULL),
(10111, 'books', 'edit', 17, NULL),
(10112, 'books', 'delete', 17, NULL),
(10113, 'manage_library_books', 'index', 17, NULL),
(10114, 'manage_library_books', 'view', 17, NULL),
(10115, 'manage_library_books', 'add', 17, NULL),
(10116, 'manage_library_books', 'edit', 17, NULL),
(10117, 'manage_library_books', 'delete', 17, NULL),
(10118, 'dormitories', 'index', 17, NULL),
(10119, 'dormitories', 'view', 17, NULL),
(10120, 'dormitories', 'add', 17, NULL),
(10121, 'dormitories', 'edit', 17, NULL),
(10122, 'dormitories', 'delete', 17, NULL),
(10123, 'student_dormitories', 'index', 17, NULL),
(10124, 'student_dormitories', 'view', 17, NULL),
(10125, 'student_dormitories', 'add', 17, NULL),
(10126, 'student_dormitories', 'edit', 17, NULL),
(10127, 'student_dormitories', 'delete', 17, NULL),
(10128, 'transport_routes', 'index', 17, NULL),
(10129, 'transport_routes', 'view', 17, NULL),
(10130, 'transport_routes', 'add', 17, NULL),
(10131, 'transport_routes', 'edit', 17, NULL),
(10132, 'transport_routes', 'delete', 17, NULL),
(10133, 'transports', 'index', 17, NULL),
(10134, 'transports', 'view', 17, NULL),
(10135, 'transports', 'add', 17, NULL),
(10136, 'transports', 'edit', 17, NULL),
(10137, 'transports', 'delete', 17, NULL),
(10138, 'users', 'index', 17, NULL),
(10139, 'users', 'view', 17, NULL),
(10140, 'users', 'add', 17, NULL),
(10141, 'users', 'edit', 17, NULL),
(10142, 'users', 'delete', 17, NULL),
(10143, 'users', 'change_password', 17, NULL),
(10144, 'student_parents', 'index', 17, NULL),
(10145, 'student_parents', 'view', 17, NULL),
(10146, 'student_parents', 'add', 17, NULL),
(10147, 'student_parents', 'edit', 17, NULL),
(10148, 'student_parents', 'delete', 17, NULL),
(10149, 'user_roles', 'index', 17, NULL),
(10150, 'user_roles', 'view', 17, NULL),
(10151, 'user_roles', 'add', 17, NULL),
(10152, 'user_roles', 'edit', 17, NULL),
(10153, 'user_roles', 'delete', 17, NULL),
(10154, 'user_roles', 'user_role_wise_privillige', 17, NULL),
(10155, 'day_wise_class_routines', 'index', 17, NULL),
(10156, 'day_wise_class_routines', 'view', 17, NULL),
(10157, 'day_wise_class_routines', 'add', 17, NULL),
(10158, 'day_wise_class_routines', 'edit', 17, NULL),
(10159, 'day_wise_class_routines', 'delete', 17, NULL),
(10160, 'report_attendance_registers', 'index', 17, NULL),
(10161, 'report_attendance_registers', 'view', 17, NULL),
(10162, 'report_attendance_registers', 'add', 17, NULL),
(10163, 'report_attendance_registers', 'edit', 17, NULL),
(10164, 'report_attendance_registers', 'delete', 17, NULL),
(10165, 'report_student_registers', 'index', 17, NULL),
(10166, 'report_student_registers', 'view', 17, NULL),
(10167, 'report_student_registers', 'add', 17, NULL),
(10168, 'report_student_registers', 'edit', 17, NULL),
(10169, 'report_student_registers', 'delete', 17, NULL),
(10170, 'report_employee_registers', 'index', 17, NULL),
(10171, 'report_employee_registers', 'view', 17, NULL),
(10172, 'report_employee_registers', 'add', 17, NULL),
(10173, 'report_employee_registers', 'edit', 17, NULL),
(10174, 'report_employee_registers', 'delete', 17, NULL),
(10175, 'report_student_dues', 'index', 17, NULL),
(10176, 'report_student_dues', 'view', 17, NULL),
(10177, 'report_student_dues', 'add', 17, NULL),
(10178, 'report_student_dues', 'edit', 17, NULL),
(10179, 'report_student_dues', 'delete', 17, NULL),
(10180, 'report_fee_collections', 'index', 17, NULL),
(10181, 'report_fee_collections', 'view', 17, NULL),
(10182, 'report_fee_collections', 'add', 17, NULL),
(10183, 'report_fee_collections', 'edit', 17, NULL),
(10184, 'report_fee_collections', 'delete', 17, NULL),
(10185, 'report_fee_waivers', 'index', 17, NULL),
(10186, 'report_fee_waivers', 'view', 17, NULL),
(10187, 'report_fee_waivers', 'add', 17, NULL),
(10188, 'report_fee_waivers', 'edit', 17, NULL),
(10189, 'report_fee_waivers', 'delete', 17, NULL),
(10190, 'report_receipt_payments', 'index', 17, NULL),
(10191, 'report_receipt_payments', 'view', 17, NULL),
(10192, 'report_receipt_payments', 'add', 17, NULL),
(10193, 'report_receipt_payments', 'edit', 17, NULL),
(10194, 'report_receipt_payments', 'delete', 17, NULL),
(10195, 'config_classes', 'index', 15, NULL),
(10196, 'config_classes', 'view', 15, NULL),
(10197, 'config_classes', 'add', 15, NULL),
(10198, 'config_classes', 'edit', 15, NULL),
(10199, 'config_sections', 'index', 15, NULL),
(10200, 'config_sections', 'view', 15, NULL),
(10201, 'config_sections', 'add', 15, NULL),
(10202, 'config_sections', 'edit', 15, NULL),
(10203, 'config_subjects', 'index', 15, NULL),
(10204, 'config_subjects', 'view', 15, NULL),
(10205, 'config_subjects', 'add', 15, NULL),
(10206, 'config_subjects', 'edit', 15, NULL),
(10207, 'config_class_periods', 'index', 15, NULL),
(10208, 'config_class_periods', 'view', 15, NULL),
(10209, 'config_class_periods', 'add', 15, NULL),
(10210, 'config_class_periods', 'edit', 15, NULL),
(10211, 'config_class_routines', 'index', 15, NULL),
(10212, 'config_class_routines', 'view', 15, NULL),
(10213, 'config_class_routines', 'add', 15, NULL),
(10214, 'config_class_routines', 'edit', 15, NULL),
(10215, 'students', 'index', 15, NULL),
(10216, 'students', 'view', 15, NULL),
(10217, 'students', 'add', 15, NULL),
(10218, 'students', 'edit', 15, NULL),
(10219, 'student_attendances', 'index', 15, NULL),
(10220, 'student_attendances', 'view', 15, NULL),
(10221, 'student_attendances', 'add', 15, NULL),
(10222, 'student_attendances', 'edit', 15, NULL),
(10223, 'fee_types', 'index', 15, NULL),
(10224, 'fee_types', 'view', 15, NULL),
(10225, 'fee_types', 'add', 15, NULL),
(10226, 'fee_types', 'edit', 15, NULL),
(10227, 'fee_types', 'delete', 15, NULL),
(10228, 'fee_configurations', 'index', 15, NULL),
(10229, 'fee_configurations', 'view', 15, NULL),
(10230, 'fee_configurations', 'add', 15, NULL),
(10231, 'fee_configurations', 'edit', 15, NULL),
(10232, 'fee_configurations', 'delete', 15, NULL),
(10233, 'fees', 'index', 15, NULL),
(10234, 'fees', 'view', 15, NULL),
(10235, 'fees', 'add', 15, NULL),
(10236, 'fees', 'edit', 15, NULL),
(10237, 'fees', 'delete', 15, NULL),
(10238, 'employees', 'index', 15, NULL),
(10239, 'employees', 'view', 15, NULL),
(10240, 'employees', 'add', 15, NULL),
(10241, 'employees', 'edit', 15, NULL),
(10242, 'employee_departments', 'index', 15, NULL),
(10243, 'employee_departments', 'view', 15, NULL),
(10244, 'employee_departments', 'add', 15, NULL),
(10245, 'employee_departments', 'edit', 15, NULL),
(10246, 'employee_designations', 'index', 15, NULL),
(10247, 'employee_designations', 'view', 15, NULL),
(10248, 'employee_designations', 'add', 15, NULL),
(10249, 'employee_designations', 'edit', 15, NULL),
(10250, 'users', 'change_password', 15, NULL),
(11039, 'branches', 'index', 1, NULL),
(11040, 'branches', 'view', 1, NULL),
(11041, 'branches', 'add', 1, NULL),
(11042, 'branches', 'edit', 1, NULL),
(11043, 'branches', 'delete', 1, NULL),
(11044, 'organizations', 'index', 1, NULL),
(11045, 'organizations', 'view', 1, NULL),
(11046, 'organizations', 'add', 1, NULL),
(11047, 'organizations', 'edit', 1, NULL),
(11048, 'organizations', 'delete', 1, NULL),
(11049, 'config_classes', 'index', 1, NULL),
(11050, 'config_classes', 'view', 1, NULL),
(11051, 'config_classes', 'add', 1, NULL),
(11052, 'config_classes', 'edit', 1, NULL),
(11053, 'config_classes', 'delete', 1, NULL),
(11054, 'config_sections', 'index', 1, NULL),
(11055, 'config_sections', 'view', 1, NULL),
(11056, 'config_sections', 'add', 1, NULL),
(11057, 'config_sections', 'edit', 1, NULL),
(11058, 'config_sections', 'delete', 1, NULL),
(11059, 'config_subjects', 'index', 1, NULL),
(11060, 'config_subjects', 'view', 1, NULL),
(11061, 'config_subjects', 'add', 1, NULL),
(11062, 'config_subjects', 'edit', 1, NULL),
(11063, 'config_subjects', 'delete', 1, NULL),
(11064, 'config_class_periods', 'index', 1, NULL),
(11065, 'config_class_periods', 'view', 1, NULL),
(11066, 'config_class_periods', 'add', 1, NULL),
(11067, 'config_class_periods', 'edit', 1, NULL),
(11068, 'config_class_periods', 'delete', 1, NULL),
(11069, 'config_class_routines', 'index', 1, NULL),
(11070, 'config_class_routines', 'view', 1, NULL),
(11071, 'config_class_routines', 'add', 1, NULL),
(11072, 'config_class_routines', 'edit', 1, NULL),
(11073, 'config_class_routines', 'delete', 1, NULL),
(11074, 'students', 'index', 1, NULL),
(11075, 'students', 'view', 1, NULL),
(11076, 'students', 'add', 1, NULL),
(11077, 'students', 'edit', 1, NULL),
(11078, 'students', 'delete', 1, NULL),
(11079, 'batch_students', 'index', 1, NULL),
(11080, 'batch_students', 'view', 1, NULL),
(11081, 'batch_students', 'add', 1, NULL),
(11082, 'batch_students', 'edit', 1, NULL),
(11083, 'batch_students', 'delete', 1, NULL),
(11084, 'student_attendances', 'index', 1, NULL),
(11085, 'student_attendances', 'view', 1, NULL),
(11086, 'student_attendances', 'add', 1, NULL),
(11087, 'student_attendances', 'edit', 1, NULL),
(11088, 'student_attendances', 'delete', 1, NULL),
(11089, 'fee_types', 'index', 1, NULL),
(11090, 'fee_types', 'view', 1, NULL),
(11091, 'fee_types', 'add', 1, NULL),
(11092, 'fee_types', 'edit', 1, NULL),
(11093, 'fee_types', 'delete', 1, NULL),
(11094, 'fee_configurations', 'index', 1, NULL),
(11095, 'fee_configurations', 'view', 1, NULL),
(11096, 'fee_configurations', 'add', 1, NULL),
(11097, 'fee_configurations', 'edit', 1, NULL),
(11098, 'fee_configurations', 'delete', 1, NULL),
(11099, 'fees', 'index', 1, NULL),
(11100, 'fees', 'view', 1, NULL),
(11101, 'fees', 'add', 1, NULL),
(11102, 'fees', 'edit', 1, NULL),
(11103, 'fees', 'delete', 1, NULL),
(11104, 'exams', 'index', 1, NULL),
(11105, 'exams', 'view', 1, NULL),
(11106, 'exams', 'add', 1, NULL),
(11107, 'exams', 'edit', 1, NULL),
(11108, 'exams', 'delete', 1, NULL),
(11109, 'exam_routines', 'index', 1, NULL),
(11110, 'exam_routines', 'view', 1, NULL),
(11111, 'exam_routines', 'add', 1, NULL),
(11112, 'exam_routines', 'edit', 1, NULL),
(11113, 'exam_routines', 'delete', 1, NULL),
(11114, 'grade_points', 'index', 1, NULL),
(11115, 'grade_points', 'view', 1, NULL),
(11116, 'grade_points', 'add', 1, NULL),
(11117, 'grade_points', 'edit', 1, NULL),
(11118, 'grade_points', 'delete', 1, NULL),
(11119, 'manage_marks', 'index', 1, NULL),
(11120, 'manage_marks', 'view', 1, NULL),
(11121, 'manage_marks', 'add', 1, NULL),
(11122, 'manage_marks', 'edit', 1, NULL),
(11123, 'manage_marks', 'delete', 1, NULL),
(11124, 'report_tabulation_sheets', 'index', 1, NULL),
(11125, 'report_tabulation_sheets', 'view', 1, NULL),
(11126, 'report_tabulation_sheets', 'add', 1, NULL),
(11127, 'report_tabulation_sheets', 'edit', 1, NULL),
(11128, 'report_tabulation_sheets', 'delete', 1, NULL),
(11129, 'report_mark_sheets', 'index', 1, NULL),
(11130, 'report_mark_sheets', 'view', 1, NULL),
(11131, 'report_mark_sheets', 'add', 1, NULL),
(11132, 'report_mark_sheets', 'edit', 1, NULL),
(11133, 'report_mark_sheets', 'delete', 1, NULL),
(11134, 'admit_cards', 'index', 1, NULL),
(11135, 'admit_cards', 'view', 1, NULL),
(11136, 'admit_cards', 'add', 1, NULL),
(11137, 'admit_cards', 'edit', 1, NULL),
(11138, 'admit_cards', 'delete', 1, NULL),
(11139, 'employees', 'index', 1, NULL),
(11140, 'employees', 'view', 1, NULL),
(11141, 'employees', 'add', 1, NULL),
(11142, 'employees', 'edit', 1, NULL),
(11143, 'employees', 'delete', 1, NULL),
(11144, 'employee_departments', 'index', 1, NULL),
(11145, 'employee_departments', 'view', 1, NULL),
(11146, 'employee_departments', 'add', 1, NULL),
(11147, 'employee_departments', 'edit', 1, NULL),
(11148, 'employee_departments', 'delete', 1, NULL),
(11149, 'employee_designations', 'index', 1, NULL),
(11150, 'employee_designations', 'view', 1, NULL),
(11151, 'employee_designations', 'add', 1, NULL),
(11152, 'employee_designations', 'edit', 1, NULL),
(11153, 'employee_designations', 'delete', 1, NULL),
(11154, 'employee_branch_transfers', 'index', 1, NULL),
(11155, 'employee_branch_transfers', 'view', 1, NULL),
(11156, 'employee_branch_transfers', 'add', 1, NULL),
(11157, 'employee_branch_transfers', 'edit', 1, NULL),
(11158, 'employee_branch_transfers', 'delete', 1, NULL),
(11159, 'employee_promotions', 'index', 1, NULL),
(11160, 'employee_promotions', 'view', 1, NULL),
(11161, 'employee_promotions', 'add', 1, NULL),
(11162, 'employee_promotions', 'edit', 1, NULL),
(11163, 'employee_promotions', 'delete', 1, NULL),
(11164, 'employee_leave_managements', 'index', 1, NULL),
(11165, 'employee_leave_managements', 'view', 1, NULL),
(11166, 'employee_leave_managements', 'add', 1, NULL),
(11167, 'employee_leave_managements', 'edit', 1, NULL),
(11168, 'employee_leave_managements', 'delete', 1, NULL),
(11169, 'employee_salary_disbursements', 'index', 1, NULL),
(11170, 'employee_salary_disbursements', 'view', 1, NULL),
(11171, 'employee_salary_disbursements', 'add', 1, NULL),
(11172, 'employee_salary_disbursements', 'edit', 1, NULL),
(11173, 'employee_salary_disbursements', 'delete', 1, NULL),
(11174, 'employee_attendances', 'index', 1, NULL),
(11175, 'employee_attendances', 'view', 1, NULL),
(11176, 'employee_attendances', 'add', 1, NULL),
(11177, 'employee_attendances', 'edit', 1, NULL),
(11178, 'employee_attendances', 'delete', 1, NULL),
(11179, 'ac_ledgers', 'index', 1, NULL),
(11180, 'ac_ledgers', 'view', 1, NULL),
(11181, 'ac_ledgers', 'add', 1, NULL),
(11182, 'ac_ledgers', 'edit', 1, NULL),
(11183, 'ac_ledgers', 'delete', 1, NULL),
(11184, 'ac_opening_balances', 'index', 1, NULL),
(11185, 'ac_opening_balances', 'view', 1, NULL),
(11186, 'ac_opening_balances', 'add', 1, NULL),
(11187, 'ac_opening_balances', 'edit', 1, NULL),
(11188, 'ac_opening_balances', 'delete', 1, NULL),
(11189, 'ac_vouchers', 'index', 1, NULL),
(11190, 'ac_vouchers', 'view', 1, NULL),
(11191, 'ac_vouchers', 'add', 1, NULL),
(11192, 'ac_vouchers', 'edit', 1, NULL),
(11193, 'ac_vouchers', 'delete', 1, NULL),
(11194, 'ac_payment_vouchers', 'index', 1, NULL),
(11195, 'ac_payment_vouchers', 'view', 1, NULL),
(11196, 'ac_payment_vouchers', 'add', 1, NULL),
(11197, 'ac_payment_vouchers', 'edit', 1, NULL),
(11198, 'ac_payment_vouchers', 'delete', 1, NULL),
(11199, 'ac_receipt_vouchers', 'index', 1, NULL),
(11200, 'ac_receipt_vouchers', 'view', 1, NULL),
(11201, 'ac_receipt_vouchers', 'add', 1, NULL),
(11202, 'ac_receipt_vouchers', 'edit', 1, NULL),
(11203, 'ac_receipt_vouchers', 'delete', 1, NULL),
(11204, 'ac_income_statements', 'index', 1, NULL),
(11205, 'ac_income_statements', 'view', 1, NULL),
(11206, 'authors', 'index', 1, NULL),
(11207, 'authors', 'view', 1, NULL),
(11208, 'authors', 'add', 1, NULL),
(11209, 'authors', 'edit', 1, NULL),
(11210, 'authors', 'delete', 1, NULL),
(11211, 'book_types', 'index', 1, NULL),
(11212, 'book_types', 'view', 1, NULL),
(11213, 'book_types', 'add', 1, NULL),
(11214, 'book_types', 'edit', 1, NULL),
(11215, 'book_types', 'delete', 1, NULL),
(11216, 'books', 'index', 1, NULL),
(11217, 'books', 'view', 1, NULL),
(11218, 'books', 'add', 1, NULL),
(11219, 'books', 'edit', 1, NULL),
(11220, 'books', 'delete', 1, NULL),
(11221, 'manage_library_books', 'index', 1, NULL),
(11222, 'manage_library_books', 'view', 1, NULL),
(11223, 'manage_library_books', 'add', 1, NULL),
(11224, 'manage_library_books', 'edit', 1, NULL),
(11225, 'manage_library_books', 'delete', 1, NULL),
(11226, 'dormitories', 'index', 1, NULL),
(11227, 'dormitories', 'view', 1, NULL),
(11228, 'dormitories', 'add', 1, NULL),
(11229, 'dormitories', 'edit', 1, NULL),
(11230, 'dormitories', 'delete', 1, NULL),
(11231, 'student_dormitories', 'index', 1, NULL),
(11232, 'student_dormitories', 'view', 1, NULL),
(11233, 'student_dormitories', 'add', 1, NULL),
(11234, 'student_dormitories', 'edit', 1, NULL),
(11235, 'student_dormitories', 'delete', 1, NULL),
(11236, 'transport_routes', 'index', 1, NULL),
(11237, 'transport_routes', 'view', 1, NULL),
(11238, 'transport_routes', 'add', 1, NULL),
(11239, 'transport_routes', 'edit', 1, NULL),
(11240, 'transport_routes', 'delete', 1, NULL),
(11241, 'transports', 'index', 1, NULL),
(11242, 'transports', 'view', 1, NULL),
(11243, 'transports', 'add', 1, NULL),
(11244, 'transports', 'edit', 1, NULL),
(11245, 'transports', 'delete', 1, NULL),
(11246, 'users', 'index', 1, NULL),
(11247, 'users', 'view', 1, NULL),
(11248, 'users', 'add', 1, NULL),
(11249, 'users', 'edit', 1, NULL),
(11250, 'users', 'delete', 1, NULL),
(11251, 'users', 'change_password', 1, NULL),
(11252, 'student_parents', 'index', 1, NULL),
(11253, 'student_parents', 'view', 1, NULL),
(11254, 'student_parents', 'add', 1, NULL),
(11255, 'student_parents', 'edit', 1, NULL),
(11256, 'student_parents', 'delete', 1, NULL),
(11257, 'user_roles', 'index', 1, NULL),
(11258, 'user_roles', 'view', 1, NULL),
(11259, 'user_roles', 'add', 1, NULL),
(11260, 'user_roles', 'edit', 1, NULL),
(11261, 'user_roles', 'delete', 1, NULL),
(11262, 'user_roles', 'user_role_wise_privillige', 1, NULL),
(11263, 'day_wise_class_routines', 'index', 1, NULL),
(11264, 'day_wise_class_routines', 'view', 1, NULL),
(11265, 'day_wise_class_routines', 'add', 1, NULL),
(11266, 'day_wise_class_routines', 'edit', 1, NULL),
(11267, 'day_wise_class_routines', 'delete', 1, NULL),
(11268, 'report_attendance_registers', 'index', 1, NULL),
(11269, 'report_attendance_registers', 'view', 1, NULL),
(11270, 'report_attendance_registers', 'add', 1, NULL),
(11271, 'report_attendance_registers', 'edit', 1, NULL),
(11272, 'report_attendance_registers', 'delete', 1, NULL),
(11273, 'report_student_registers', 'index', 1, NULL),
(11274, 'report_student_registers', 'view', 1, NULL),
(11275, 'report_student_registers', 'add', 1, NULL),
(11276, 'report_student_registers', 'edit', 1, NULL),
(11277, 'report_student_registers', 'delete', 1, NULL),
(11278, 'report_employee_registers', 'index', 1, NULL),
(11279, 'report_employee_registers', 'view', 1, NULL),
(11280, 'report_employee_registers', 'add', 1, NULL),
(11281, 'report_employee_registers', 'edit', 1, NULL),
(11282, 'report_employee_registers', 'delete', 1, NULL),
(11283, 'report_receipt_payments', 'index', 1, NULL),
(11284, 'report_receipt_payments', 'view', 1, NULL),
(11285, 'report_receipt_payments', 'add', 1, NULL),
(11286, 'report_receipt_payments', 'edit', 1, NULL),
(11287, 'report_receipt_payments', 'delete', 1, NULL),
(11288, 'report_fee_registers', 'index', 1, NULL),
(11289, 'report_fee_registers', 'view', 1, NULL),
(11290, 'report_fee_registers', 'add', 1, NULL),
(11291, 'report_fee_registers', 'edit', 1, NULL),
(11292, 'report_fee_registers', 'delete', 1, NULL),
(11293, 'report_daily_collection_registers', 'index', 1, NULL),
(11294, 'report_daily_collection_registers', 'view', 1, NULL),
(11295, 'report_daily_collection_registers', 'add', 1, NULL),
(11296, 'report_daily_collection_registers', 'edit', 1, NULL),
(11297, 'report_daily_collection_registers', 'delete', 1, NULL),
(11298, 'report_student_dues', 'index', 1, NULL),
(11299, 'report_student_dues', 'view', 1, NULL),
(11300, 'report_student_dues', 'add', 1, NULL),
(11301, 'report_student_dues', 'edit', 1, NULL),
(11302, 'report_student_dues', 'delete', 1, NULL),
(11303, 'report_fee_waivers', 'index', 1, NULL),
(11304, 'report_fee_waivers', 'view', 1, NULL),
(11305, 'report_fee_waivers', 'add', 1, NULL),
(11306, 'report_fee_waivers', 'edit', 1, NULL),
(11307, 'report_fee_waivers', 'delete', 1, NULL),
(11308, 'ledger_reports', 'index', 1, NULL),
(11309, 'ledger_reports', 'view', 1, NULL),
(11310, 'ledger_reports', 'add', 1, NULL),
(11311, 'ledger_reports', 'edit', 1, NULL),
(11312, 'ledger_reports', 'delete', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_documents`
--
ALTER TABLE `academic_documents`
  ADD PRIMARY KEY (`DocumentId`);

--
-- Indexes for table `acc_account_types`
--
ALTER TABLE `acc_account_types`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `acc_ledgers`
--
ALTER TABLE `acc_ledgers`
  ADD PRIMARY KEY (`LedgerId`);

--
-- Indexes for table `acc_vouchers`
--
ALTER TABLE `acc_vouchers`
  ADD PRIMARY KEY (`VoucherId`);

--
-- Indexes for table `acc_voucher_details`
--
ALTER TABLE `acc_voucher_details`
  ADD PRIMARY KEY (`VoucherDetailsId`),
  ADD KEY `FK_rxil01ayf22kc8il2bt4ey73o` (`CreditLedgerId`),
  ADD KEY `FK_671tab39nhxp1bbic9iub22vm` (`DebitLedgerId`),
  ADD KEY `FK_2vcxkvnfh3c32ca7cx35frbkv` (`VoucherId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`AuthorId`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`BookDetailsId`);

--
-- Indexes for table `book_types`
--
ALTER TABLE `book_types`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BranchId`);

--
-- Indexes for table `config_classes`
--
ALTER TABLE `config_classes`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `config_class_periods`
--
ALTER TABLE `config_class_periods`
  ADD PRIMARY KEY (`PeriodId`);

--
-- Indexes for table `config_class_routines`
--
ALTER TABLE `config_class_routines`
  ADD PRIMARY KEY (`RoutineId`);

--
-- Indexes for table `config_sections`
--
ALTER TABLE `config_sections`
  ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `config_subjects`
--
ALTER TABLE `config_subjects`
  ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `dormitories`
--
ALTER TABLE `dormitories`
  ADD PRIMARY KEY (`DormitoryId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeId`);

--
-- Indexes for table `employee_branch_transfers`
--
ALTER TABLE `employee_branch_transfers`
  ADD PRIMARY KEY (`TransferId`);

--
-- Indexes for table `employee_departments`
--
ALTER TABLE `employee_departments`
  ADD PRIMARY KEY (`DepartmentId`);

--
-- Indexes for table `employee_designations`
--
ALTER TABLE `employee_designations`
  ADD PRIMARY KEY (`DesignationId`);

--
-- Indexes for table `employee_promotions`
--
ALTER TABLE `employee_promotions`
  ADD PRIMARY KEY (`PromotionId`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ExamId`);

--
-- Indexes for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD PRIMARY KEY (`RoutineId`);

--
-- Indexes for table `exam_routine_details`
--
ALTER TABLE `exam_routine_details`
  ADD PRIMARY KEY (`RoutineDetailsId`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`FeeId`);

--
-- Indexes for table `fee_configurations`
--
ALTER TABLE `fee_configurations`
  ADD PRIMARY KEY (`FeeConfigId`);

--
-- Indexes for table `fee_details`
--
ALTER TABLE `fee_details`
  ADD PRIMARY KEY (`FeeDetailsId`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `grade_points`
--
ALTER TABLE `grade_points`
  ADD PRIMARY KEY (`GradeId`);

--
-- Indexes for table `leave_applies`
--
ALTER TABLE `leave_applies`
  ADD PRIMARY KEY (`LeaveApplicationId`);

--
-- Indexes for table `leave_calculations`
--
ALTER TABLE `leave_calculations`
  ADD PRIMARY KEY (`LeaveCalculationId`);

--
-- Indexes for table `leave_categories`
--
ALTER TABLE `leave_categories`
  ADD PRIMARY KEY (`LeaveCategoryId`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`MarkId`);

--
-- Indexes for table `mark_details`
--
ALTER TABLE `mark_details`
  ADD PRIMARY KEY (`MarkDetailsId`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`OrganizationId`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`ParentId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`AttendanceId`);

--
-- Indexes for table `student_books`
--
ALTER TABLE `student_books`
  ADD PRIMARY KEY (`StudentBookId`);

--
-- Indexes for table `student_dormitories`
--
ALTER TABLE `student_dormitories`
  ADD PRIMARY KEY (`StudentDormitoryId`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`TransportId`);

--
-- Indexes for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD PRIMARY KEY (`RouteId`);

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
-- AUTO_INCREMENT for table `academic_documents`
--
ALTER TABLE `academic_documents`
  MODIFY `DocumentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_ledgers`
--
ALTER TABLE `acc_ledgers`
  MODIFY `LedgerId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `acc_vouchers`
--
ALTER TABLE `acc_vouchers`
  MODIFY `VoucherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acc_voucher_details`
--
ALTER TABLE `acc_voucher_details`
  MODIFY `VoucherDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_authors`
--
ALTER TABLE `book_authors`
  MODIFY `AuthorId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `BookDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_types`
--
ALTER TABLE `book_types`
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config_classes`
--
ALTER TABLE `config_classes`
  MODIFY `ClassId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `config_class_periods`
--
ALTER TABLE `config_class_periods`
  MODIFY `PeriodId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `config_class_routines`
--
ALTER TABLE `config_class_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_sections`
--
ALTER TABLE `config_sections`
  MODIFY `SectionId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `config_subjects`
--
ALTER TABLE `config_subjects`
  MODIFY `SubjectId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `DormitoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_branch_transfers`
--
ALTER TABLE `employee_branch_transfers`
  MODIFY `TransferId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `DepartmentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_designations`
--
ALTER TABLE `employee_designations`
  MODIFY `DesignationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_promotions`
--
ALTER TABLE `employee_promotions`
  MODIFY `PromotionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `ExamId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_routine_details`
--
ALTER TABLE `exam_routine_details`
  MODIFY `RoutineDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `FeeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_configurations`
--
ALTER TABLE `fee_configurations`
  MODIFY `FeeConfigId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `fee_details`
--
ALTER TABLE `fee_details`
  MODIFY `FeeDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grade_points`
--
ALTER TABLE `grade_points`
  MODIFY `GradeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_applies`
--
ALTER TABLE `leave_applies`
  MODIFY `LeaveApplicationId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_calculations`
--
ALTER TABLE `leave_calculations`
  MODIFY `LeaveCalculationId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_categories`
--
ALTER TABLE `leave_categories`
  MODIFY `LeaveCategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MarkId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mark_details`
--
ALTER TABLE `mark_details`
  MODIFY `MarkDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `OrganizationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `ParentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `AttendanceId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_books`
--
ALTER TABLE `student_books`
  MODIFY `StudentBookId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_dormitories`
--
ALTER TABLE `student_dormitories`
  MODIFY `StudentDormitoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `TransportId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `RouteId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11313;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
