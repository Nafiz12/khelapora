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
-- Database: `emsbdcom_coaching`
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
  `Description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acc_account_types`
--

CREATE TABLE `acc_account_types` (
  `TypeId` smallint(5) UNSIGNED NOT NULL COMMENT 'Acc types identification number',
  `Name` varchar(200) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc_ledgers`
--

INSERT INTO `acc_ledgers` (`LedgerId`, `TypeId`, `LedgerName`, `LedgerCode`, `IsGroupHead`, `GroupHeadId`, `LedgerDescription`, `IsDeletable`) VALUES
(1, 11, 0x4361736820496e2048616e64, '100', 1, 0, NULL, 0),
(2, 12, 0x4361736820496e2042616e6b, '101', 1, 0, NULL, 0),
(3, 30, 0x41646d697373696f6e20466565, '102', 0, 36, '', 1),
(9, 40, 0x546561636865722053616c617279, '108', 0, 37, '', 1),
(11, 40, 0x4f66666963652052656e74, '110', 1, 0, '', 1),
(12, 40, 0x56617420616e6420546178, '111', 1, 0, '', 1),
(13, 40, 0x456c6563747269636974792042696c6c20, '112', 0, 41, '', 1),
(14, 40, 0x54726176656c20616e6420436f6e766579616e636520, '113', 1, 0, '', 1),
(15, 40, 0x50686f746f636f707920616e64207072696e74696e6720, '114', 0, 42, '', 1),
(16, 40, 0x54656c6570686f6e6520616e6420436f6d6d756e69636174696f6e, '115', 0, 41, '', 1),
(17, 40, 0x5761736820616e6420436c65616e, '116', 1, 0, '', 1),
(18, 40, 0x456e7465727461696e6d656e7420, '117', 1, 0, '', 1),
(19, 40, 0x52657061697220616e64206d61696e74656e616e636520, '118', 1, 0, '', 1),
(20, 40, 0x4578616d20706170657220, '119', 0, 21, '', 1),
(21, 40, 0x53746174696f6e61727920, '120', 1, 0, '', 1),
(22, 40, 0x47616d657320616e642043756c747572616c2070726f6772616d, '121', 1, 0, '', 1),
(23, 40, 0x5072697a6520446973747269627574696f6e2070726f6772616d, '122', 0, 22, '', 1),
(24, 40, 0x4d696c6164204d616866696c20, '123', 0, 22, '', 1),
(28, 40, 0x53796c6c61627573207072696e74696e672063686172676520, '127', 0, 42, '', 1),
(29, 40, 0x5075626c696369747920616e64206164766572746973656d656e7420, '128', 0, 42, '', 1),
(30, 40, 0x4f746865727320457870656e736573, '129', 1, 0, '', 1),
(37, 40, 0x53616c61727920457870656e736573, '4000', 1, 0, '', 1),
(38, 40, 0x53746166662053616c617269657320, '4001', 0, 37, '', 1),
(39, 40, 0x4368616c6b, '1011', 0, 21, '', 1),
(40, 40, 0x447573746572, '1102', 0, 21, '', 1),
(41, 40, 0x5574696c6974792042696c6c, '5000', 1, 0, '', 1),
(42, 40, 0x5072696e74696e6720262050686f746f636f7079, '8000', 1, 0, '', 1),
(43, 40, 0x52657061697220616e64206d61696e74656e616e6365, '1001', 0, 19, '', 1),
(44, 40, 0x456e7465727461696e6d656e74, '1002', 0, 18, '', 1),
(45, 40, 0x5761736820616e6420436c65616e, '1004', 0, 17, '', 1),
(46, 40, 0x54726176656c20616e6420436f6e766579616e636509, '1005', 0, 14, '', 1),
(47, 40, 0x56617420616e6420546178, '1006', 0, 12, '', 1),
(48, 40, 0x4f66666963652052656e74, '1008', 0, 11, '', 1),
(49, 30, 0x4f6e652054696d6520466565, '001', 1, 0, '', 1),
(50, 30, 0x41646d697373696f6e20466565, '1020', 1, 0, '', 1),
(51, 30, 0x41646d697373696f6e20466565, '1030', 0, 50, '', 1),
(52, 30, 0x4d6f6e74686c7920466565, '1031', 0, 50, '', 1),
(53, 30, 0x4f6e6c696e6520436861726765, '1032', 0, 50, '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc_vouchers`
--

INSERT INTO `acc_vouchers` (`VoucherId`, `BranchId`, `VoucherType`, `VoucherCode`, `VoucherAmount`, `VoucherDate`, `Particulars`, `EntryDate`, `UpdatedBy`, `UpdatedOn`, `EntryBy`, `IsAutoVoucher`) VALUES
(1, 2, 'R', 'RV-001', 2000.00, '2019-05-18', '[auto] Fee received for Md. Shahriar Kabir [ 249701 ] Memo Number002001', '2019-05-18', NULL, NULL, 14, 1),
(2, 2, 'R', 'RV-002', 3000.00, '2019-05-18', '[auto] Fee received for Md. Humayun Kabir [ 2501001 ] Memo Number002002', '2019-05-18', NULL, NULL, 14, 1),
(3, 2, 'R', 'RV-003', 300.00, '2019-05-20', '[auto] Fee received for Md. Shahriar Kabir [ 249701 ] Memo Number002003', '2019-05-20', NULL, NULL, 14, 1),
(4, 2, 'P', 'PV-001', 34455.00, '2019-05-20', 'cfcfvfvg', '2019-05-20', NULL, NULL, 14, 0),
(5, 2, 'R', 'RV-004', 3000.00, '2019-05-24', '[auto] Fee received for shamtu [ 2501002 ] Memo Number002004', '2019-05-24', NULL, NULL, 14, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc_voucher_details`
--

INSERT INTO `acc_voucher_details` (`VoucherDetailsId`, `BranchId`, `VoucherId`, `CheckNumber`, `CreditLedgerId`, `DebitLedgerId`, `Particulars`, `Amount`) VALUES
(59, 2, 1, NULL, 51, 1, '[auto] Fee received for Md. Shahriar Kabir [ 249701 ] Memo Number002001', 2000.00),
(60, 2, 2, NULL, 51, 1, '[auto] Fee received for Md. Humayun Kabir [ 2501001 ] Memo Number002002', 3000.00),
(61, 2, 3, NULL, 51, 1, '[auto] Fee received for Md. Shahriar Kabir [ 249701 ] Memo Number002003', 300.00),
(62, 2, 4, NULL, 13, 1, '455', 34455.00),
(63, 2, 5, NULL, 51, 1, '[auto] Fee received for shamtu [ 2501002 ] Memo Number002004', 3000.00);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_opening_balances`
--

INSERT INTO `ac_opening_balances` (`BalanceId`, `Date`, `LedgerId`, `BranchId`, `Amount`) VALUES
(1, '2019-01-01', 1, 1, 400000.00),
(2, '2019-01-01', 2, 1, 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `BatchId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `BatchName` varchar(200) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`BatchId`, `BranchId`, `CourseId`, `BatchName`, `StartTime`, `EndTime`) VALUES
(7, 2, 49, 'PNF001', '09:05:00', '11:00:00'),
(8, 2, 49, 'NPS002', '11:00:00', '01:00:00'),
(9, 2, 50, 'NWF001', '09:00:00', '11:00:00'),
(10, 2, 50, 'NWS002', '11:00:00', '01:00:00'),
(11, 2, 51, 'NVF001', '09:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookId` int(11) UNSIGNED NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `BookName` varchar(200) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `NumberOfBooks` int(11) DEFAULT NULL,
  `TypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookId`, `SubjectId`, `BookName`, `AuthorId`, `NumberOfBooks`, `TypeId`) VALUES
(1, 31, 'First lecture on  আন্তর্জাতিক বিষয়াবলি', 2, NULL, 8),
(2, 28, 'suggetions on English literature', 2, NULL, 9),
(3, 30, 'First lecture on  Science & Technology', 2, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `AuthorId` int(11) UNSIGNED NOT NULL,
  `AuthorName` varchar(200) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`AuthorId`, `AuthorName`, `Description`) VALUES
(2, 'English Literature', 'Chairman of Poricroma');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `BookDetailsId` int(11) UNSIGNED NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `IdentificationNumber` varchar(100) DEFAULT NULL,
  `BookStatus` char(1) DEFAULT 'A' COMMENT 'A=>Available,N=>Not Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_stocks`
--

CREATE TABLE `book_stocks` (
  `StockId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `AvailableNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_types`
--

CREATE TABLE `book_types` (
  `TypeId` int(11) UNSIGNED NOT NULL,
  `TypeName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_types`
--

INSERT INTO `book_types` (`TypeId`, `TypeName`) VALUES
(8, 'Lecture Sheets'),
(9, 'Books'),
(10, 'Suggetions');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BranchId` int(11) UNSIGNED NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `BranchCode` varchar(100) NOT NULL,
  `ContactNumber` varchar(100) DEFAULT NULL,
  `BranchAddress` mediumtext DEFAULT NULL,
  `IsHeadOffice` tinyint(1) DEFAULT 0,
  `Logo` mediumtext DEFAULT NULL,
  `LandPhone` varchar(100) DEFAULT NULL,
  `Mobile` varchar(100) DEFAULT NULL,
  `Fax` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `BranchOpeningDate` date DEFAULT NULL,
  `Year` varchar(200) DEFAULT '2019-2020'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchId`, `BranchName`, `BranchCode`, `ContactNumber`, `BranchAddress`, `IsHeadOffice`, `Logo`, `LandPhone`, `Mobile`, `Fax`, `Email`, `BranchOpeningDate`, `Year`) VALUES
(1, 'Main Branch', '000', '01711274688', '27, Indira Road, Farmgate, Dhaka 1215', 1, '1015014295ce7d09fda632.png', '01', '01711', '', 'headoffice@d.com', '2018-12-01', '2019-2020'),
(2, 'Ashik\'s English Solution ', '002', '01711274688', 'Nilkhet, Dhaka -1245', 0, '19655611835f85d98dcbb40.png', '', '01746952089', '', 'nilkhet@gmail.com', '2019-05-12', '2019-2020'),
(3, 'Shohor Branch', '003', '01711274688', 'Mirpur-10, Dhaka', 0, '2056562065cde75c460e9c.jpg', '09611456456', '09611456456', '', 'sham@gmail.com', '2019-05-17', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `class_wise_subjects`
--

CREATE TABLE `class_wise_subjects` (
  `SubjectClassId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_wise_subjects`
--

INSERT INTO `class_wise_subjects` (`SubjectClassId`, `BranchId`, `Medium`, `ClassId`, `SubjectId`) VALUES
(15, 4, 'B', 17, 23),
(16, 4, 'B', 18, 23),
(17, 4, 'B', 19, 23),
(18, 4, 'E', 17, 23),
(19, 4, 'E', 18, 23),
(20, 4, 'E', 19, 23),
(21, 4, 'B', 17, 22),
(22, 4, 'B', 18, 22),
(23, 4, 'B', 19, 22),
(24, 4, 'E', 17, 22),
(25, 4, 'E', 18, 22),
(26, 4, 'E', 19, 22),
(27, 4, 'B', 16, 21),
(28, 4, 'E', 16, 21),
(29, 4, 'B', 14, 20),
(30, 4, 'B', 15, 20),
(31, 4, 'B', 16, 20),
(32, 4, 'B', 17, 20),
(33, 4, 'B', 18, 20),
(34, 4, 'E', 14, 20),
(35, 4, 'E', 15, 20),
(36, 4, 'E', 16, 20),
(37, 4, 'E', 17, 20),
(38, 4, 'E', 18, 20),
(39, 4, 'V', 14, 20),
(40, 4, 'V', 15, 20),
(41, 4, 'V', 16, 20),
(42, 4, 'V', 17, 20),
(43, 4, 'V', 18, 20),
(44, 4, 'B', 14, 19),
(45, 4, 'B', 15, 19),
(46, 4, 'B', 16, 19),
(47, 4, 'B', 17, 19),
(48, 4, 'B', 18, 19),
(49, 4, 'B', 19, 19),
(50, 4, 'E', 14, 19),
(51, 4, 'E', 15, 19),
(52, 4, 'E', 16, 19),
(53, 4, 'E', 17, 19),
(54, 4, 'E', 18, 19),
(55, 4, 'E', 19, 19),
(56, 4, 'B', 14, 18),
(57, 4, 'B', 15, 18),
(58, 4, 'B', 16, 18);

-- --------------------------------------------------------

--
-- Table structure for table `config_classes`
--

CREATE TABLE `config_classes` (
  `ClassId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassCode` varchar(100) DEFAULT NULL,
  `ClassName` varchar(100) DEFAULT NULL,
  `ClassDescription` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_classes`
--

INSERT INTO `config_classes` (`ClassId`, `BranchId`, `ClassCode`, `ClassName`, `ClassDescription`) VALUES
(49, 2, '001', 'Preliminary', ''),
(50, 2, '002', 'Written', ''),
(51, 2, '003', 'Viva', ''),
(52, 2, '004', 'Bank Job', ''),
(53, 2, '005', 'Others', ''),
(54, 3, '001', 'Preliminary', ''),
(55, 3, '002', 'Written', ''),
(56, 3, '003', 'Viva', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_subjects`
--

CREATE TABLE `config_subjects` (
  `SubjectId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `SubjectName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_subjects`
--

INSERT INTO `config_subjects` (`SubjectId`, `BranchId`, `SubjectName`) VALUES
(33, 2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_lists`
--

CREATE TABLE `distribution_lists` (
  `DistributionId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `Number` int(100) NOT NULL,
  `EntryBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution_lists`
--

INSERT INTO `distribution_lists` (`DistributionId`, `BranchId`, `ClassId`, `TypeId`, `SubjectId`, `StudentId`, `BookId`, `Number`, `EntryBy`) VALUES
(6, 2, 49, 8, 31, 1, 1, 2, 14),
(7, 2, 49, 9, 28, 1, 2, 3, 14),
(8, 2, 49, 8, 31, 1, 1, 2, 14),
(9, 2, 50, 8, 31, 2, 1, 1, 1),
(10, 2, 49, 9, 28, 1, 2, 10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `DormitoryId` int(11) UNSIGNED NOT NULL,
  `DormitoryName` varchar(100) DEFAULT NULL,
  `NoOfRooms` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Reason` text DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeId`, `BranchId`, `EmployeeName`, `EmployeeCode`, `DateOfBirth`, `Email`, `Nid`, `ContactNumber`, `AltContactNumber`, `Gender`, `BloodGroup`, `FathersName`, `MothersName`, `SpouseName`, `PresentAddress`, `PermanentAddress`, `DateOfJoining`, `DesignationId`, `CurrentSalary`, `Ref1`, `RefContactNumber`, `Ref2`, `Ref2ContactNumber`, `Status`, `DegreeId`, `IsTeacher`, `Image`, `Reason`, `UserId`) VALUES
(1, 2, 'Md.Ahatasham', '001', '2000-05-10', 'sham@gmail.com', '19896112000087', '01746973657', '01746973657', 'M', 'B+', 'Mobarak Ali', 'Sultana Jahan', '', 'Nikunjo-2, Khilkhet, Dahaka-1229', 'Nikunjo-2, Khilkhet, Dahaka-1229', '2017-05-11', 11, 30000.00, '', '', '', '', 'A', 'Honours', 1, '16311353915cde50050542b.jpg', NULL, 15);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_departments`
--

CREATE TABLE `employee_departments` (
  `DepartmentId` int(11) UNSIGNED NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11, 'Teacher'),
(12, 'Receptionist'),
(13, 'Chairman');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ExamId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `CourseId` int(11) NOT NULL,
  `ExamName` varchar(100) DEFAULT NULL,
  `ExamDate` date NOT NULL,
  `ExamDescription` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ExamId`, `BranchId`, `CourseId`, `ExamName`, `ExamDate`, `ExamDescription`) VALUES
(14, 2, 49, '1st Weekly Exam', '2019-05-17', ''),
(15, 2, 49, '2nd Second Weekly Exam', '2019-05-18', ''),
(16, 2, 50, '1st Current Affairs', '2019-05-19', ''),
(17, 2, 49, 'Lecture Sheets999', '2019-05-24', 'dhjdh'),
(18, 2, 50, 'dfdf', '2020-10-05', 'dfsdfsf');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendance`
--

CREATE TABLE `exam_attendance` (
  `ExamAttendanceId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `ExamDate` int(11) NOT NULL,
  `Attendance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_attendance`
--

INSERT INTO `exam_attendance` (`ExamAttendanceId`, `BranchId`, `CourseId`, `StudentId`, `ExamId`, `ExamDate`, `Attendance`) VALUES
(9, 2, 49, 1, 14, 2019, 'P'),
(10, 2, 49, 1, 14, 2019, 'P');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `DueDate` date NOT NULL,
  `EntryDate` datetime DEFAULT NULL,
  `EntryBy` int(1) DEFAULT NULL,
  `VoucherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`FeeId`, `BranchId`, `Year`, `MemoNo`, `StudentId`, `TransactionDate`, `TotalWaiverAmount`, `TotalAmount`, `DueDate`, `EntryDate`, `EntryBy`, `VoucherId`) VALUES
(1, 2, '2019-2020', '002001', 1, '2019-05-18', 0.00, 2000.00, '2019-05-31', '2019-05-18 00:00:00', 14, 1),
(2, 2, '2019-2020', '002002', 2, '2019-05-18', 0.00, 3000.00, '2019-05-30', '2019-05-18 00:00:00', 14, 2),
(3, 2, '2019-2020', '002003', 1, '2019-05-20', 0.00, 300.00, '2019-05-30', '2019-05-20 00:00:00', 14, 3),
(4, 2, '2019-2020', '002004', 3, '2019-05-24', 0.00, 3000.00, '2019-05-31', '2019-05-24 00:00:00', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `CategoryId` int(11) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL,
  `LedgerCode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`CategoryId`, `CategoryName`, `LedgerCode`) VALUES
(3, 'Admission Fee', 1030),
(4, 'Monthly Fee', 1031),
(5, 'Online Charge', 1032);

-- --------------------------------------------------------

--
-- Table structure for table `fee_configurations`
--

CREATE TABLE `fee_configurations` (
  `FeeConfigId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TypeId` int(11) DEFAULT NULL COMMENT 'M=>Monthly, A=>Admision',
  `Amount` decimal(10,2) DEFAULT NULL,
  `WaiverAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_configurations`
--

INSERT INTO `fee_configurations` (`FeeConfigId`, `BranchId`, `CourseId`, `TypeId`, `Amount`, `WaiverAmount`) VALUES
(124, 2, 49, 21, 5000.00, NULL),
(125, 2, 50, 21, 7000.00, NULL),
(126, 2, 51, 21, 6000.00, NULL),
(127, 2, 49, 22, 1000.00, NULL),
(128, 2, 49, 21, 5000.00, NULL);

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
  `CourseId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `TypeId` int(11) DEFAULT NULL,
  `WaiverAmount` decimal(10,2) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `DueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_details`
--

INSERT INTO `fee_details` (`FeeDetailsId`, `FeeId`, `Year`, `TransactionDate`, `StudentId`, `CourseId`, `BranchId`, `TypeId`, `WaiverAmount`, `Amount`, `DueDate`) VALUES
(53, 1, '2019-2020', '2019-05-18', 1, 49, 2, 21, 0.00, 2000.00, '2019-05-31'),
(54, 2, '2019-2020', '2019-05-18', 2, 50, 2, 21, 0.00, 3000.00, '2019-05-30'),
(55, 3, '2019-2020', '2019-05-20', 1, 49, 2, 21, 0.00, 300.00, '2019-05-30'),
(56, 4, '2019-2020', '2019-05-24', 3, 50, 2, 21, 0.00, 3000.00, '2019-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `TypeId` int(11) UNSIGNED NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `TypeName` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `IsMonthlyFee` tinyint(1) DEFAULT 0,
  `IsWaiverApplicable` tinyint(1) DEFAULT NULL,
  `IsOneTimeFee` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`TypeId`, `CategoryId`, `TypeName`, `Description`, `IsMonthlyFee`, `IsWaiverApplicable`, `IsOneTimeFee`) VALUES
(21, 3, 'Admission Fee', '', 0, 0, 1),
(22, 4, 'Monthly Fee', '', 1, 1, 0),
(23, 5, 'Online Charge', '', 0, 0, 1);

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
  `GradeDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Reason` mediumtext NOT NULL,
  `IsApproved` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_calculations`
--

CREATE TABLE `leave_calculations` (
  `LeaveCalculationId` int(11) UNSIGNED NOT NULL,
  `Year` varchar(20) NOT NULL,
  `SickLeave` int(11) NOT NULL,
  `EarnLeave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_categories`
--

CREATE TABLE `leave_categories` (
  `LeaveCategoryId` int(11) UNSIGNED NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `LectureId` int(11) NOT NULL,
  `LectureTitle` varchar(200) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `LectureVideo` longtext NOT NULL,
  `LectureLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mark_details`
--

CREATE TABLE `mark_details` (
  `MarkDetailsId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `PracticalMark` int(100) DEFAULT NULL,
  `SubjectiveMark` int(100) DEFAULT NULL,
  `ObjectiveMark` int(100) DEFAULT NULL,
  `Point` float DEFAULT NULL,
  `Grade` varchar(20) DEFAULT NULL,
  `TotalMark` int(20) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Logo` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`OrganizationId`, `OrganizationName`, `OrganizationAddress_1`, `OrganizationAddress_2`, `OrganizationAddress_3`, `OrganizationLogo`, `CashMemoPrefix`, `MemoPrfix`, `StudentCodePrefix`, `Logo`) VALUES
(1, 'Main Branch', '27, Indira Road, Farmgate, Dhaka 1215', NULL, NULL, NULL, 'SM-', 'PM-', '', '5232799545cd27ec322eac.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`ParentId`, `BranchId`, `StudentId`, `ParentName`, `ContactNumber`, `UserId`) VALUES
(1, 2, 3, 'dsdsd', '01745962589', 500);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `StudentName` varchar(50) DEFAULT NULL,
  `BatchId` int(11) NOT NULL,
  `StudentCode` varchar(100) DEFAULT NULL,
  `CourseId` varchar(200) DEFAULT NULL,
  `RollNo` int(20) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `PresentAddress` varchar(200) DEFAULT NULL,
  `PermanentAddress` mediumtext DEFAULT NULL,
  `FathersName` varchar(50) DEFAULT NULL,
  `GuardianContactNumber` int(22) NOT NULL,
  `MothersName` varchar(50) DEFAULT NULL,
  `Contact` varchar(30) DEFAULT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `AdmissionDate` date DEFAULT NULL,
  `BloodGroup` varchar(100) DEFAULT NULL COMMENT 'UNKNOWN/A+/A-/B+/B-/O+/O-/AB+/AB-',
  `StudentPhoto` varchar(500) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Occupation` varchar(100) NOT NULL,
  `SSC` varchar(100) NOT NULL,
  `SSCYear` varchar(100) NOT NULL,
  `SSCBoard` varchar(200) NOT NULL,
  `SSCSubject` varchar(200) NOT NULL,
  `SSCResult` float NOT NULL,
  `HSC` varchar(100) NOT NULL,
  `HSCYear` varchar(100) NOT NULL,
  `HSCBoard` varchar(200) NOT NULL,
  `HSCSubject` varchar(200) NOT NULL,
  `HSCResult` float NOT NULL,
  `Graduation` varchar(100) NOT NULL,
  `GraduationYear` varchar(100) NOT NULL,
  `GraduationBoard` varchar(200) NOT NULL,
  `GraduationSubject` varchar(200) NOT NULL,
  `GraduationResult` float NOT NULL,
  `PostGraduation` varchar(100) NOT NULL,
  `PostGraduationYear` varchar(100) NOT NULL,
  `PostGraduationBoard` varchar(200) NOT NULL,
  `PostGraduationSubject` varchar(200) NOT NULL,
  `PostGraduationResult` float NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `BranchId`, `Year`, `StudentName`, `BatchId`, `StudentCode`, `CourseId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `GuardianContactNumber`, `MothersName`, `Contact`, `StudentEmail`, `AdmissionDate`, `BloodGroup`, `StudentPhoto`, `EntryBy`, `EntryDate`, `Image`, `Occupation`, `SSC`, `SSCYear`, `SSCBoard`, `SSCSubject`, `SSCResult`, `HSC`, `HSCYear`, `HSCBoard`, `HSCSubject`, `HSCResult`, `Graduation`, `GraduationYear`, `GraduationBoard`, `GraduationSubject`, `GraduationResult`, `PostGraduation`, `PostGraduationYear`, `PostGraduationBoard`, `PostGraduationSubject`, `PostGraduationResult`, `Status`) VALUES
(1, 2, '2019-2020', 'Md. Shahriar Kabir', 7, '249701', '49', 1, '1999-05-11', 'House-10, Road:20, Uttara Model Town, Dhaka-1230', 'House-10, Road:20, Uttara Model Town, Dhaka-1230', 'Md. Humayun Kabir', 1842376549, 'Sultana Kabir', '01842376548', 'shahriar@gmail.com', '2019-05-17', 'B-', NULL, NULL, '2019-05-17', '6652768195cde513deb282.png', 'Student', '', '2007', 'Dhaka', 'Science', 5, '', '2009', 'Dhaka', 'Science', 5, '', '2014', 'University of Chittagong', 'Computer Science & Engineering', 3.75, '', '', '', '', 0, 1),
(2, 2, '2019-2020', 'Md. Humayun Kabir', 10, '2501001', '50', 1, '1970-01-01', 'Nikunjo-2, Khilkhet, Dhaka-1229', 'Nikunjo-2, Khilkhet, Dhaka-1229', 'Md. Mohiuddin Kabir', 1842376548, 'Humayra Kabir', '01842376548', 'kabir@gmail.com', '2019-05-18', 'B-', NULL, NULL, '2019-05-18', '11068348075cdf21fc25397.jpg', 'Student', '', '2008', 'Chittagong', 'Science', 5, '', '2010', 'Dhaka', 'Science', 5, '', '2014', 'University of Dhaka', 'Mathematics', 3.3, '', '', '', '', 0, 1),
(3, 2, '2019-2020', 'shamtu', 10, '2501002', '50', 2, '2020-05-15', 'dededededede', 'wswswswswsws', 'dsdsd', 2147483647, 'sdsdsd', '01745962589', 'sham@gmail.com', '2019-05-20', 'A-', NULL, NULL, '2019-05-20', '8072636805f85d9abba7e9.png', 'Student', '', '2006', 'dhaka', 'sfsf', 3, '', '2008', 'dsfsdf', 'sfsf', 3, '', '', '', '', 0, '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `AttendanceId` int(11) UNSIGNED NOT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `AttendanceType` char(1) DEFAULT NULL COMMENT 'P=>Present. A=>Absent,L=>Late',
  `GroupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`AttendanceId`, `BranchId`, `CourseId`, `Date`, `Year`, `StudentId`, `AttendanceType`, `GroupId`) VALUES
(79, 2, 49, '2019-05-17', NULL, 1, 'P', 1),
(80, 2, 50, '2019-05-22', NULL, 2, 'P', 2),
(81, 2, 50, '2019-05-24', NULL, 3, 'P', 3),
(82, 2, 49, '2020-05-11', NULL, 1, 'A', 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_dormitories`
--

CREATE TABLE `student_dormitories` (
  `StudentDormitoryId` int(11) UNSIGNED NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `DormitoryId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject_wise_marks`
--

CREATE TABLE `subject_wise_marks` (
  `SubMarkId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `TotalMark` int(100) NOT NULL,
  `PassMark` int(100) NOT NULL,
  `SubMark` int(100) NOT NULL,
  `ObjMark` int(100) NOT NULL,
  `PraMark` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE `transport_routes` (
  `RouteId` int(11) UNSIGNED NOT NULL,
  `RouteName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `IsAdmin` int(11) NOT NULL,
  `is_parents` tinyint(1) DEFAULT 0,
  `is_employee` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `BranchId`, `EmployeeId`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `IsAdmin`, `is_parents`, `is_employee`) VALUES
(1, 1, NULL, 'd83f67c56c7699c3178ba10a8daa767b', 1, 'Admin', '2016-04-01', 1, 'admin', 0, 0, 0),
(13, 4, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Admin_user', '2018-12-07', 1, 'admin_user', 0, 0, 0),
(14, 2, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'School Book user', '2019-05-12', 1, 'sb002', 0, 0, 0),
(15, 2, NULL, '24ee880b0be659672f08060da4c9d091', 15, 'Md.Ahatasham', '2019-05-17', 1, '01746973657', 0, 0, 1),
(16, 3, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'School Book user', '2019-05-17', 1, 'sb003', 0, 0, 0),
(498, 1, NULL, '25d55ad283aa400af464c76d713c07ad', 1, 'Admin_user', '2019-05-18', 1, 'adminUser', 0, 0, 0),
(499, 1, NULL, '25d55ad283aa400af464c76d713c07ad', 20, 'sham', '2019-07-02', 1, 'sham', 1, 0, 0),
(500, 2, NULL, '2dfd8238409741b68137d7acb81b6701', 16, 'dsdsd', '2020-10-13', 1, '01745962589', 0, 1, 0);

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
  `is_editable` tinyint(1) DEFAULT 1,
  `is_teacher` tinyint(1) DEFAULT 0,
  `is_parent` tinyint(1) DEFAULT 0,
  `is_payroll` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `role_description`, `parent_id`, `lft`, `rgt`, `is_editable`, `is_teacher`, `is_parent`, `is_payroll`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, 1, 38, 0, 0, 0, 0),
(15, 'Teacher', 'Teacher', NULL, NULL, NULL, 0, 1, 0, 0),
(16, 'Parent', 'Parents', NULL, NULL, NULL, 0, 0, 1, 0),
(17, 'Admin', 'Admin', NULL, NULL, NULL, 1, 0, 0, 0),
(20, 'Main Admin', 'super admin', NULL, NULL, NULL, 1, 0, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11896, 'employees', 'index', 18, NULL),
(11897, 'employees', 'view', 18, NULL),
(11898, 'employees', 'edit', 18, NULL),
(11899, 'leave_applies', 'index', 18, NULL),
(11900, 'leave_applies', 'view', 18, NULL),
(11901, 'leave_applies', 'add', 18, NULL),
(11902, 'leave_applies', 'edit', 18, NULL),
(11903, 'leave_applies', 'delete', 18, NULL),
(12905, 'organizations', 'index', 17, NULL),
(12906, 'organizations', 'view', 17, NULL),
(12907, 'organizations', 'add', 17, NULL),
(12908, 'organizations', 'edit', 17, NULL),
(12909, 'organizations', 'delete', 17, NULL),
(12910, 'config_classes', 'index', 17, NULL),
(12911, 'config_classes', 'view', 17, NULL),
(12912, 'config_classes', 'add', 17, NULL),
(12913, 'config_classes', 'edit', 17, NULL),
(12914, 'config_classes', 'delete', 17, NULL),
(12915, 'config_sections', 'index', 17, NULL),
(12916, 'config_sections', 'view', 17, NULL),
(12917, 'config_sections', 'add', 17, NULL),
(12918, 'config_sections', 'edit', 17, NULL),
(12919, 'config_sections', 'delete', 17, NULL),
(12920, 'config_subjects', 'index', 17, NULL),
(12921, 'config_subjects', 'view', 17, NULL),
(12922, 'config_subjects', 'add', 17, NULL),
(12923, 'config_subjects', 'edit', 17, NULL),
(12924, 'config_subjects', 'delete', 17, NULL),
(12925, 'config_class_periods', 'index', 17, NULL),
(12926, 'config_class_periods', 'view', 17, NULL),
(12927, 'config_class_periods', 'add', 17, NULL),
(12928, 'config_class_periods', 'edit', 17, NULL),
(12929, 'config_class_periods', 'delete', 17, NULL),
(12930, 'config_class_routines', 'index', 17, NULL),
(12931, 'config_class_routines', 'view', 17, NULL),
(12932, 'config_class_routines', 'add', 17, NULL),
(12933, 'config_class_routines', 'edit', 17, NULL),
(12934, 'config_class_routines', 'delete', 17, NULL),
(12935, 'students', 'index', 17, NULL),
(12936, 'students', 'view', 17, NULL),
(12937, 'students', 'add', 17, NULL),
(12938, 'students', 'edit', 17, NULL),
(12939, 'students', 'delete', 17, NULL),
(12940, 'student_attendances', 'index', 17, NULL),
(12941, 'student_attendances', 'view', 17, NULL),
(12942, 'student_attendances', 'add', 17, NULL),
(12943, 'student_attendances', 'edit', 17, NULL),
(12944, 'student_attendances', 'delete', 17, NULL),
(12945, 'fee_types', 'index', 17, NULL),
(12946, 'fee_types', 'view', 17, NULL),
(12947, 'fee_types', 'add', 17, NULL),
(12948, 'fee_types', 'edit', 17, NULL),
(12949, 'fee_types', 'delete', 17, NULL),
(12950, 'fee_configurations', 'index', 17, NULL),
(12951, 'fee_configurations', 'view', 17, NULL),
(12952, 'fee_configurations', 'add', 17, NULL),
(12953, 'fee_configurations', 'edit', 17, NULL),
(12954, 'fee_configurations', 'delete', 17, NULL),
(12955, 'fees', 'index', 17, NULL),
(12956, 'fees', 'view', 17, NULL),
(12957, 'fees', 'add', 17, NULL),
(12958, 'fees', 'edit', 17, NULL),
(12959, 'fees', 'delete', 17, NULL),
(12960, 'exams', 'index', 17, NULL),
(12961, 'exams', 'view', 17, NULL),
(12962, 'exams', 'add', 17, NULL),
(12963, 'exams', 'edit', 17, NULL),
(12964, 'exams', 'delete', 17, NULL),
(12965, 'exam_routines', 'index', 17, NULL),
(12966, 'exam_routines', 'view', 17, NULL),
(12967, 'exam_routines', 'add', 17, NULL),
(12968, 'exam_routines', 'edit', 17, NULL),
(12969, 'exam_routines', 'delete', 17, NULL),
(12970, 'grade_points', 'index', 17, NULL),
(12971, 'grade_points', 'view', 17, NULL),
(12972, 'grade_points', 'add', 17, NULL),
(12973, 'grade_points', 'edit', 17, NULL),
(12974, 'grade_points', 'delete', 17, NULL),
(12975, 'manage_marks', 'index', 17, NULL),
(12976, 'manage_marks', 'view', 17, NULL),
(12977, 'manage_marks', 'add', 17, NULL),
(12978, 'manage_marks', 'edit', 17, NULL),
(12979, 'manage_marks', 'delete', 17, NULL),
(12980, 'report_tabulation_sheets', 'index', 17, NULL),
(12981, 'report_tabulation_sheets', 'view', 17, NULL),
(12982, 'report_tabulation_sheets', 'add', 17, NULL),
(12983, 'report_tabulation_sheets', 'edit', 17, NULL),
(12984, 'report_tabulation_sheets', 'delete', 17, NULL),
(12985, 'report_mark_sheets', 'index', 17, NULL),
(12986, 'report_mark_sheets', 'view', 17, NULL),
(12987, 'report_mark_sheets', 'add', 17, NULL),
(12988, 'report_mark_sheets', 'edit', 17, NULL),
(12989, 'report_mark_sheets', 'delete', 17, NULL),
(12990, 'admit_cards', 'index', 17, NULL),
(12991, 'admit_cards', 'view', 17, NULL),
(12992, 'admit_cards', 'add', 17, NULL),
(12993, 'admit_cards', 'edit', 17, NULL),
(12994, 'admit_cards', 'delete', 17, NULL),
(12995, 'employees', 'index', 17, NULL),
(12996, 'employees', 'view', 17, NULL),
(12997, 'employees', 'add', 17, NULL),
(12998, 'employees', 'edit', 17, NULL),
(12999, 'employees', 'delete', 17, NULL),
(13000, 'employee_departments', 'index', 17, NULL),
(13001, 'employee_departments', 'view', 17, NULL),
(13002, 'employee_departments', 'add', 17, NULL),
(13003, 'employee_departments', 'edit', 17, NULL),
(13004, 'employee_departments', 'delete', 17, NULL),
(13005, 'employee_designations', 'index', 17, NULL),
(13006, 'employee_designations', 'view', 17, NULL),
(13007, 'employee_designations', 'add', 17, NULL),
(13008, 'employee_designations', 'edit', 17, NULL),
(13009, 'employee_designations', 'delete', 17, NULL),
(13010, 'employee_branch_transfers', 'index', 17, NULL),
(13011, 'employee_branch_transfers', 'view', 17, NULL),
(13012, 'employee_branch_transfers', 'add', 17, NULL),
(13013, 'employee_branch_transfers', 'edit', 17, NULL),
(13014, 'employee_branch_transfers', 'delete', 17, NULL),
(13015, 'employee_promotions', 'index', 17, NULL),
(13016, 'employee_promotions', 'view', 17, NULL),
(13017, 'employee_promotions', 'add', 17, NULL),
(13018, 'employee_promotions', 'edit', 17, NULL),
(13019, 'employee_promotions', 'delete', 17, NULL),
(13020, 'employee_leave_managements', 'index', 17, NULL),
(13021, 'employee_leave_managements', 'view', 17, NULL),
(13022, 'employee_salary_disbursements', 'index', 17, NULL),
(13023, 'employee_salary_disbursements', 'view', 17, NULL),
(13024, 'employee_attendances', 'index', 17, NULL),
(13025, 'employee_attendances', 'view', 17, NULL),
(13026, 'ac_ledgers', 'index', 17, NULL),
(13027, 'ac_ledgers', 'view', 17, NULL),
(13028, 'ac_ledgers', 'add', 17, NULL),
(13029, 'ac_ledgers', 'edit', 17, NULL),
(13030, 'ac_ledgers', 'delete', 17, NULL),
(13031, 'ac_vouchers', 'index', 17, NULL),
(13032, 'ac_vouchers', 'view', 17, NULL),
(13033, 'ac_vouchers', 'add', 17, NULL),
(13034, 'ac_vouchers', 'edit', 17, NULL),
(13035, 'ac_vouchers', 'delete', 17, NULL),
(13036, 'ac_payment_vouchers', 'index', 17, NULL),
(13037, 'ac_payment_vouchers', 'view', 17, NULL),
(13038, 'ac_payment_vouchers', 'add', 17, NULL),
(13039, 'ac_payment_vouchers', 'edit', 17, NULL),
(13040, 'ac_payment_vouchers', 'delete', 17, NULL),
(13041, 'ac_receipt_vouchers', 'index', 17, NULL),
(13042, 'ac_receipt_vouchers', 'view', 17, NULL),
(13043, 'ac_receipt_vouchers', 'add', 17, NULL),
(13044, 'ac_receipt_vouchers', 'edit', 17, NULL),
(13045, 'ac_receipt_vouchers', 'delete', 17, NULL),
(13046, 'authors', 'index', 17, NULL),
(13047, 'authors', 'view', 17, NULL),
(13048, 'authors', 'add', 17, NULL),
(13049, 'authors', 'edit', 17, NULL),
(13050, 'authors', 'delete', 17, NULL),
(13051, 'book_types', 'index', 17, NULL),
(13052, 'book_types', 'view', 17, NULL),
(13053, 'book_types', 'add', 17, NULL),
(13054, 'book_types', 'edit', 17, NULL),
(13055, 'book_types', 'delete', 17, NULL),
(13056, 'books', 'index', 17, NULL),
(13057, 'books', 'view', 17, NULL),
(13058, 'books', 'add', 17, NULL),
(13059, 'books', 'edit', 17, NULL),
(13060, 'books', 'delete', 17, NULL),
(13061, 'manage_library_books', 'index', 17, NULL),
(13062, 'manage_library_books', 'view', 17, NULL),
(13063, 'manage_library_books', 'add', 17, NULL),
(13064, 'manage_library_books', 'edit', 17, NULL),
(13065, 'manage_library_books', 'delete', 17, NULL),
(13066, 'dormitories', 'index', 17, NULL),
(13067, 'dormitories', 'view', 17, NULL),
(13068, 'dormitories', 'add', 17, NULL),
(13069, 'dormitories', 'edit', 17, NULL),
(13070, 'dormitories', 'delete', 17, NULL),
(13071, 'student_dormitories', 'index', 17, NULL),
(13072, 'student_dormitories', 'view', 17, NULL),
(13073, 'student_dormitories', 'add', 17, NULL),
(13074, 'student_dormitories', 'edit', 17, NULL),
(13075, 'student_dormitories', 'delete', 17, NULL),
(13076, 'transport_routes', 'index', 17, NULL),
(13077, 'transport_routes', 'view', 17, NULL),
(13078, 'transport_routes', 'add', 17, NULL),
(13079, 'transport_routes', 'edit', 17, NULL),
(13080, 'transport_routes', 'delete', 17, NULL),
(13081, 'transports', 'index', 17, NULL),
(13082, 'transports', 'view', 17, NULL),
(13083, 'transports', 'add', 17, NULL),
(13084, 'transports', 'edit', 17, NULL),
(13085, 'transports', 'delete', 17, NULL),
(13086, 'users', 'index', 17, NULL),
(13087, 'users', 'view', 17, NULL),
(13088, 'users', 'add', 17, NULL),
(13089, 'users', 'edit', 17, NULL),
(13090, 'users', 'delete', 17, NULL),
(13091, 'users', 'change_password', 17, NULL),
(13092, 'student_parents', 'index', 17, NULL),
(13093, 'student_parents', 'view', 17, NULL),
(13094, 'student_parents', 'add', 17, NULL),
(13095, 'student_parents', 'edit', 17, NULL),
(13096, 'student_parents', 'delete', 17, NULL),
(13097, 'user_roles', 'index', 17, NULL),
(13098, 'user_roles', 'view', 17, NULL),
(13099, 'user_roles', 'add', 17, NULL),
(13100, 'user_roles', 'edit', 17, NULL),
(13101, 'user_roles', 'delete', 17, NULL),
(13102, 'user_roles', 'user_role_wise_privillige', 17, NULL),
(13103, 'day_wise_class_routines', 'index', 17, NULL),
(13104, 'day_wise_class_routines', 'view', 17, NULL),
(13105, 'day_wise_class_routines', 'add', 17, NULL),
(13106, 'day_wise_class_routines', 'edit', 17, NULL),
(13107, 'day_wise_class_routines', 'delete', 17, NULL),
(13108, 'report_attendance_registers', 'index', 17, NULL),
(13109, 'report_attendance_registers', 'view', 17, NULL),
(13110, 'report_attendance_registers', 'add', 17, NULL),
(13111, 'report_attendance_registers', 'edit', 17, NULL),
(13112, 'report_attendance_registers', 'delete', 17, NULL),
(13113, 'report_student_registers', 'index', 17, NULL),
(13114, 'report_student_registers', 'view', 17, NULL),
(13115, 'report_student_registers', 'add', 17, NULL),
(13116, 'report_student_registers', 'edit', 17, NULL),
(13117, 'report_student_registers', 'delete', 17, NULL),
(13118, 'report_employee_registers', 'index', 17, NULL),
(13119, 'report_employee_registers', 'view', 17, NULL),
(13120, 'report_employee_registers', 'add', 17, NULL),
(13121, 'report_employee_registers', 'edit', 17, NULL),
(13122, 'report_employee_registers', 'delete', 17, NULL),
(13123, 'report_student_dues', 'index', 17, NULL),
(13124, 'report_student_dues', 'view', 17, NULL),
(13125, 'report_student_dues', 'add', 17, NULL),
(13126, 'report_student_dues', 'edit', 17, NULL),
(13127, 'report_student_dues', 'delete', 17, NULL),
(13128, 'report_fee_waivers', 'index', 17, NULL),
(13129, 'report_fee_waivers', 'view', 17, NULL),
(13130, 'report_fee_waivers', 'add', 17, NULL),
(13131, 'report_fee_waivers', 'edit', 17, NULL),
(13132, 'report_fee_waivers', 'delete', 17, NULL),
(13133, 'ac_income_statements', 'index', 17, NULL),
(13134, 'ac_income_statements', 'view', 17, NULL),
(14490, 'branches', 'index', 1, NULL),
(14491, 'branches', 'view', 1, NULL),
(14492, 'branches', 'add', 1, NULL),
(14493, 'branches', 'edit', 1, NULL),
(14494, 'branches', 'delete', 1, NULL),
(14495, 'organizations', 'index', 1, NULL),
(14496, 'organizations', 'view', 1, NULL),
(14497, 'organizations', 'add', 1, NULL),
(14498, 'organizations', 'edit', 1, NULL),
(14499, 'organizations', 'delete', 1, NULL),
(14500, 'config_classes', 'index', 1, NULL),
(14501, 'config_classes', 'view', 1, NULL),
(14502, 'config_classes', 'add', 1, NULL),
(14503, 'config_classes', 'edit', 1, NULL),
(14504, 'config_classes', 'delete', 1, NULL),
(14505, 'config_subjects', 'index', 1, NULL),
(14506, 'config_subjects', 'view', 1, NULL),
(14507, 'config_subjects', 'add', 1, NULL),
(14508, 'config_subjects', 'edit', 1, NULL),
(14509, 'config_subjects', 'delete', 1, NULL),
(14510, 'config_class_periods', 'index', 1, NULL),
(14511, 'config_class_periods', 'view', 1, NULL),
(14512, 'config_class_periods', 'add', 1, NULL),
(14513, 'config_class_periods', 'edit', 1, NULL),
(14514, 'config_class_periods', 'delete', 1, NULL),
(14515, 'students', 'index', 1, NULL),
(14516, 'students', 'view', 1, NULL),
(14517, 'students', 'add', 1, NULL),
(14518, 'students', 'edit', 1, NULL),
(14519, 'students', 'delete', 1, NULL),
(14520, 'student_attendances', 'index', 1, NULL),
(14521, 'student_attendances', 'view', 1, NULL),
(14522, 'student_attendances', 'add', 1, NULL),
(14523, 'student_attendances', 'edit', 1, NULL),
(14524, 'student_attendances', 'delete', 1, NULL),
(14525, 'fee_categories', 'index', 1, NULL),
(14526, 'fee_categories', 'view', 1, NULL),
(14527, 'fee_categories', 'add', 1, NULL),
(14528, 'fee_categories', 'edit', 1, NULL),
(14529, 'fee_categories', 'delete', 1, NULL),
(14530, 'fee_types', 'index', 1, NULL),
(14531, 'fee_types', 'view', 1, NULL),
(14532, 'fee_types', 'add', 1, NULL),
(14533, 'fee_types', 'edit', 1, NULL),
(14534, 'fee_types', 'delete', 1, NULL),
(14535, 'fee_configurations', 'index', 1, NULL),
(14536, 'fee_configurations', 'view', 1, NULL),
(14537, 'fee_configurations', 'add', 1, NULL),
(14538, 'fee_configurations', 'edit', 1, NULL),
(14539, 'fee_configurations', 'delete', 1, NULL),
(14540, 'fees', 'index', 1, NULL),
(14541, 'fees', 'view', 1, NULL),
(14542, 'fees', 'add', 1, NULL),
(14543, 'fees', 'edit', 1, NULL),
(14544, 'fees', 'delete', 1, NULL),
(14545, 'exams', 'index', 1, NULL),
(14546, 'exams', 'view', 1, NULL),
(14547, 'exams', 'add', 1, NULL),
(14548, 'exams', 'edit', 1, NULL),
(14549, 'exams', 'delete', 1, NULL),
(14550, 'employees', 'index', 1, NULL),
(14551, 'employees', 'view', 1, NULL),
(14552, 'employees', 'add', 1, NULL),
(14553, 'employees', 'edit', 1, NULL),
(14554, 'employees', 'delete', 1, NULL),
(14555, 'employee_designations', 'index', 1, NULL),
(14556, 'employee_designations', 'view', 1, NULL),
(14557, 'employee_designations', 'add', 1, NULL),
(14558, 'employee_designations', 'edit', 1, NULL),
(14559, 'employee_designations', 'delete', 1, NULL),
(14560, 'ac_ledgers', 'index', 1, NULL),
(14561, 'ac_ledgers', 'view', 1, NULL),
(14562, 'ac_ledgers', 'add', 1, NULL),
(14563, 'ac_ledgers', 'edit', 1, NULL),
(14564, 'ac_ledgers', 'delete', 1, NULL),
(14565, 'ac_opening_balances', 'index', 1, NULL),
(14566, 'ac_opening_balances', 'view', 1, NULL),
(14567, 'ac_opening_balances', 'add', 1, NULL),
(14568, 'ac_opening_balances', 'edit', 1, NULL),
(14569, 'ac_opening_balances', 'delete', 1, NULL),
(14570, 'ac_vouchers', 'index', 1, NULL),
(14571, 'ac_vouchers', 'view', 1, NULL),
(14572, 'ac_vouchers', 'add', 1, NULL),
(14573, 'ac_vouchers', 'edit', 1, NULL),
(14574, 'ac_vouchers', 'delete', 1, NULL),
(14575, 'ac_payment_vouchers', 'index', 1, NULL),
(14576, 'ac_payment_vouchers', 'view', 1, NULL),
(14577, 'ac_payment_vouchers', 'add', 1, NULL),
(14578, 'ac_payment_vouchers', 'edit', 1, NULL),
(14579, 'ac_payment_vouchers', 'delete', 1, NULL),
(14580, 'ac_receipt_vouchers', 'index', 1, NULL),
(14581, 'ac_receipt_vouchers', 'view', 1, NULL),
(14582, 'ac_receipt_vouchers', 'add', 1, NULL),
(14583, 'ac_receipt_vouchers', 'edit', 1, NULL),
(14584, 'ac_receipt_vouchers', 'delete', 1, NULL),
(14585, 'authors', 'index', 1, NULL),
(14586, 'authors', 'view', 1, NULL),
(14587, 'authors', 'add', 1, NULL),
(14588, 'authors', 'edit', 1, NULL),
(14589, 'authors', 'delete', 1, NULL),
(14590, 'book_types', 'index', 1, NULL),
(14591, 'book_types', 'view', 1, NULL),
(14592, 'book_types', 'add', 1, NULL),
(14593, 'book_types', 'edit', 1, NULL),
(14594, 'book_types', 'delete', 1, NULL),
(14595, 'books', 'index', 1, NULL),
(14596, 'books', 'view', 1, NULL),
(14597, 'books', 'add', 1, NULL),
(14598, 'books', 'edit', 1, NULL),
(14599, 'books', 'delete', 1, NULL),
(14600, 'manage_library_books', 'index', 1, NULL),
(14601, 'manage_library_books', 'view', 1, NULL),
(14602, 'manage_library_books', 'add', 1, NULL),
(14603, 'manage_library_books', 'edit', 1, NULL),
(14604, 'manage_library_books', 'delete', 1, NULL),
(14605, 'users', 'index', 1, NULL),
(14606, 'users', 'view', 1, NULL),
(14607, 'users', 'add', 1, NULL),
(14608, 'users', 'edit', 1, NULL),
(14609, 'users', 'delete', 1, NULL),
(14610, 'users', 'change_password', 1, NULL),
(14611, 'student_parents', 'index', 1, NULL),
(14612, 'student_parents', 'view', 1, NULL),
(14613, 'student_parents', 'add', 1, NULL),
(14614, 'student_parents', 'edit', 1, NULL),
(14615, 'student_parents', 'delete', 1, NULL),
(14616, 'user_roles', 'index', 1, NULL),
(14617, 'user_roles', 'view', 1, NULL),
(14618, 'user_roles', 'add', 1, NULL),
(14619, 'user_roles', 'edit', 1, NULL),
(14620, 'user_roles', 'delete', 1, NULL),
(14621, 'user_roles', 'user_role_wise_privillige', 1, NULL),
(14622, 'report_attendance_registers', 'index', 1, NULL),
(14623, 'report_attendance_registers', 'view', 1, NULL),
(14624, 'report_attendance_registers', 'add', 1, NULL),
(14625, 'report_attendance_registers', 'edit', 1, NULL),
(14626, 'report_attendance_registers', 'delete', 1, NULL),
(14627, 'report_student_registers', 'index', 1, NULL),
(14628, 'report_student_registers', 'view', 1, NULL),
(14629, 'report_student_registers', 'add', 1, NULL),
(14630, 'report_student_registers', 'edit', 1, NULL),
(14631, 'report_student_registers', 'delete', 1, NULL),
(14632, 'student_wise_lectures', 'index', 1, NULL),
(14633, 'student_wise_lectures', 'view', 1, NULL),
(14634, 'student_wise_lectures', 'add', 1, NULL),
(14635, 'student_wise_lectures', 'edit', 1, NULL),
(14636, 'student_wise_lectures', 'delete', 1, NULL),
(14637, 'exam_wise_attendance_reports', 'index', 1, NULL),
(14638, 'exam_wise_attendance_reports', 'view', 1, NULL),
(14639, 'exam_wise_attendance_reports', 'add', 1, NULL),
(14640, 'exam_wise_attendance_reports', 'edit', 1, NULL),
(14641, 'exam_wise_attendance_reports', 'delete', 1, NULL),
(14642, 'student_histories', 'index', 1, NULL),
(14643, 'student_histories', 'view', 1, NULL),
(14644, 'student_histories', 'add', 1, NULL),
(14645, 'student_histories', 'edit', 1, NULL),
(14646, 'student_histories', 'delete', 1, NULL),
(14647, 'report_fee_registers', 'index', 1, NULL),
(14648, 'report_fee_registers', 'view', 1, NULL),
(14649, 'report_fee_registers', 'add', 1, NULL),
(14650, 'report_fee_registers', 'edit', 1, NULL),
(14651, 'report_fee_registers', 'delete', 1, NULL),
(14652, 'report_daily_collection_registers', 'index', 1, NULL),
(14653, 'report_daily_collection_registers', 'view', 1, NULL),
(14654, 'report_daily_collection_registers', 'add', 1, NULL),
(14655, 'report_daily_collection_registers', 'edit', 1, NULL),
(14656, 'report_daily_collection_registers', 'delete', 1, NULL),
(14657, 'report_student_dues', 'index', 1, NULL),
(14658, 'report_student_dues', 'view', 1, NULL),
(14659, 'report_student_dues', 'add', 1, NULL),
(14660, 'report_student_dues', 'edit', 1, NULL),
(14661, 'report_student_dues', 'delete', 1, NULL),
(14662, 'ledger_reports', 'index', 1, NULL),
(14663, 'ledger_reports', 'view', 1, NULL),
(14664, 'ledger_reports', 'add', 1, NULL),
(14665, 'ledger_reports', 'edit', 1, NULL),
(14666, 'ledger_reports', 'delete', 1, NULL),
(14667, 'report_daily_transactions', 'index', 1, NULL),
(14668, 'report_daily_transactions', 'view', 1, NULL),
(14669, 'report_daily_transactions', 'add', 1, NULL),
(14670, 'report_daily_transactions', 'edit', 1, NULL),
(14671, 'report_daily_transactions', 'delete', 1, NULL),
(14672, 'income_expense_reports', 'index', 1, NULL),
(14673, 'income_expense_reports', 'view', 1, NULL),
(14674, 'income_expense_reports', 'add', 1, NULL),
(14675, 'income_expense_reports', 'edit', 1, NULL),
(14676, 'income_expense_reports', 'delete', 1, NULL),
(14677, 'ac_income_statements', 'index', 1, NULL),
(14678, 'ac_income_statements', 'view', 1, NULL),
(14679, 'student_attendances', 'index', 15, NULL),
(14680, 'student_attendances', 'view', 15, NULL),
(14681, 'student_attendances', 'add', 15, NULL),
(14682, 'employees', 'index', 15, NULL),
(14683, 'employees', 'view', 15, NULL),
(14684, 'users', 'change_password', 15, NULL),
(14685, 'report_attendance_registers', 'index', 15, NULL),
(14686, 'report_attendance_registers', 'view', 15, NULL),
(14687, 'report_attendance_registers', 'add', 15, NULL),
(14688, 'report_attendance_registers', 'edit', 15, NULL),
(14689, 'report_attendance_registers', 'delete', 15, NULL),
(14690, 'report_student_registers', 'index', 15, NULL),
(14691, 'report_student_registers', 'view', 15, NULL),
(14692, 'report_student_registers', 'add', 15, NULL),
(14693, 'report_student_registers', 'edit', 15, NULL),
(14694, 'report_student_registers', 'delete', 15, NULL),
(14695, 'report_student_dues', 'index', 15, NULL),
(14696, 'report_student_dues', 'view', 15, NULL),
(14697, 'report_student_dues', 'add', 15, NULL),
(14698, 'report_student_dues', 'edit', 15, NULL),
(14699, 'report_student_dues', 'delete', 15, NULL);

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
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`BatchId`);

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
-- Indexes for table `book_stocks`
--
ALTER TABLE `book_stocks`
  ADD PRIMARY KEY (`StockId`);

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
-- Indexes for table `class_wise_subjects`
--
ALTER TABLE `class_wise_subjects`
  ADD PRIMARY KEY (`SubjectClassId`);

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
-- Indexes for table `distribution_lists`
--
ALTER TABLE `distribution_lists`
  ADD PRIMARY KEY (`DistributionId`);

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
-- Indexes for table `exam_attendance`
--
ALTER TABLE `exam_attendance`
  ADD PRIMARY KEY (`ExamAttendanceId`);

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
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`CategoryId`);

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
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`LectureId`);

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
-- Indexes for table `subject_wise_marks`
--
ALTER TABLE `subject_wise_marks`
  ADD PRIMARY KEY (`SubMarkId`);

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
  MODIFY `LedgerId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `acc_vouchers`
--
ALTER TABLE `acc_vouchers`
  MODIFY `VoucherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `acc_voucher_details`
--
ALTER TABLE `acc_voucher_details`
  MODIFY `VoucherDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `BatchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_authors`
--
ALTER TABLE `book_authors`
  MODIFY `AuthorId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `BookDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_stocks`
--
ALTER TABLE `book_stocks`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_types`
--
ALTER TABLE `book_types`
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_wise_subjects`
--
ALTER TABLE `class_wise_subjects`
  MODIFY `SubjectClassId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `config_classes`
--
ALTER TABLE `config_classes`
  MODIFY `ClassId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `config_class_periods`
--
ALTER TABLE `config_class_periods`
  MODIFY `PeriodId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_class_routines`
--
ALTER TABLE `config_class_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_sections`
--
ALTER TABLE `config_sections`
  MODIFY `SectionId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_subjects`
--
ALTER TABLE `config_subjects`
  MODIFY `SubjectId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `distribution_lists`
--
ALTER TABLE `distribution_lists`
  MODIFY `DistributionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `DormitoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `DesignationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_promotions`
--
ALTER TABLE `employee_promotions`
  MODIFY `PromotionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `ExamId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_attendance`
--
ALTER TABLE `exam_attendance`
  MODIFY `ExamAttendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_routine_details`
--
ALTER TABLE `exam_routine_details`
  MODIFY `RoutineDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `FeeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `CategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_configurations`
--
ALTER TABLE `fee_configurations`
  MODIFY `FeeConfigId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `fee_details`
--
ALTER TABLE `fee_details`
  MODIFY `FeeDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `grade_points`
--
ALTER TABLE `grade_points`
  MODIFY `GradeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `LectureId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MarkId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mark_details`
--
ALTER TABLE `mark_details`
  MODIFY `MarkDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `OrganizationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `ParentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `AttendanceId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
-- AUTO_INCREMENT for table `subject_wise_marks`
--
ALTER TABLE `subject_wise_marks`
  MODIFY `SubMarkId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `TransportId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `RouteId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14700;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
