-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sham_sms`
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
  `Description` text
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
  `IsGroupHead` tinyint(1) DEFAULT '1',
  `GroupHeadId` int(11) DEFAULT '0',
  `LedgerDescription` varchar(100) DEFAULT NULL,
  `IsDeletable` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_ledgers`
--

INSERT INTO `acc_ledgers` (`LedgerId`, `TypeId`, `LedgerName`, `LedgerCode`, `IsGroupHead`, `GroupHeadId`, `LedgerDescription`, `IsDeletable`) VALUES
(1, 11, 0x4361736820496e2048616e64, '100', 1, 0, NULL, 0),
(2, 12, 0x4361736820496e2042616e6b, '101', 1, 0, NULL, 0),
(3, 30, 0x41646d697373696f6e20466565, '102', 0, 36, '', 1),
(4, 30, 0x536561736f6e20436861726765, '103', 0, 36, '', 1),
(5, 30, 0x4d6f6e74686c79204578616d20466565, '104', 0, 8, '', 1),
(6, 30, 0x547574696f6e20466565, '105', 0, 36, '', 1),
(7, 30, 0x5475746f7269616c204578616d696e6174696f6e20466565, '106', 0, 8, '', 1),
(8, 30, 0x4578616d696e6174696f6e20466565, '107', 1, 0, '', 1),
(9, 40, 0x546561636865722053616c617279, '108', 0, 37, '', 1),
(10, 40, 0x486f6e6f72617269756d, '109', 0, 30, '', 1),
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
(25, 40, 0x4661726577656c6c206f66205353432043616e646964617465732020, '124', 0, 22, '', 1),
(26, 40, 0x41646d6974204361726420457870656e73657320, '125', 0, 42, '', 1),
(27, 40, 0x526573756c74204361726420457870656e73657320, '126', 0, 42, '', 1),
(28, 40, 0x53796c6c61627573207072696e74696e672063686172676520, '127', 0, 42, '', 1),
(29, 40, 0x5075626c696369747920616e64206164766572746973656d656e7420, '128', 0, 42, '', 1),
(30, 40, 0x4f746865727320457870656e736573, '129', 1, 0, '', 1),
(34, 30, 0x53656d6573746572204578616d696e6174696f6e20466565, '2000', 0, 8, '', 1),
(36, 30, 0x4f6e652074696d6520466565, '3000', 1, 0, '', 1),
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
(48, 40, 0x4f66666963652052656e74, '1008', 0, 11, '', 1);

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
(1, 4, 'P', 'PV-001', '350.00', '2019-01-26', '26-10-2019 total', '2019-01-26', NULL, NULL, 13, 0),
(2, 4, 'R', 'RV-001', '900.00', '2019-02-15', '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001001', '2019-02-15', NULL, NULL, 13, 1),
(3, 4, 'R', 'RV-003', '1200.00', '2019-03-06', '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001002', '2019-03-06', NULL, NULL, 13, 1),
(4, 4, 'R', 'RV-004', '200.00', '2019-02-14', '[auto] Fee received for Nusrat Jahan [ 001DB060502 ] Memo Number001003', '2019-02-14', NULL, NULL, 13, 1),
(5, 4, 'R', 'RV-005', '200.00', '2019-02-13', '[auto] Fee received for Iftekhaaruddin Khan [ 001MB060305 ] Memo Number001004', '2019-02-13', NULL, NULL, 13, 1),
(6, 4, 'P', 'PV-002', '3800.00', '2019-02-01', 'fds', '2019-02-01', NULL, NULL, 13, 0),
(7, 4, 'R', 'RV-006', '400.00', '2019-01-31', 'sd', '2019-01-31', NULL, NULL, 13, 0),
(8, 4, 'R', 'RV-008', '1300.00', '2019-02-15', '[auto] Fee received for Tasnia Ebnat Sowbia [ 001MB081902 ] Memo Number001005', '2019-02-15', NULL, NULL, 13, 1),
(9, 4, 'R', 'RV-009', '1000.00', '2019-03-06', '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001006', '2019-03-06', NULL, NULL, 13, 1),
(10, 4, 'R', 'RV-010', '200.00', '2019-03-15', '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001007', '2019-03-15', NULL, NULL, 13, 1),
(11, 4, 'R', 'RV-011', '1000.00', '2019-04-03', '[auto] Fee received for Md. Alif Hossain [ 001DB1602 ] Memo Number001008', '2019-04-03', NULL, NULL, 13, 1),
(12, 4, 'R', 'RV-012', '5500.00', '2019-04-14', '[auto] Fee received for karim [ 001201 ] Memo Number001009', '2019-04-14', NULL, NULL, 13, 1),
(13, 4, 'R', 'RV-013', '5500.00', '2019-04-14', '[auto] Fee received for karim [ 001201 ] Memo Number001009', '2019-04-14', NULL, NULL, 13, 1),
(14, 4, 'R', 'RV-014', '2500.00', '2019-04-15', '[auto] Fee received for karim [ 001201 ] Memo Number001010', '2019-04-15', NULL, NULL, 13, 1),
(15, 4, 'R', 'RV-015', '100.00', '2019-04-17', '[auto] Fee received for karim [ 001201 ] Memo Number001011', '2019-04-17', NULL, NULL, 13, 1),
(16, 4, 'R', 'RV-016', '100.00', '2019-04-17', '[auto] Fee received for karim [ 001201 ] Memo Number001011', '2019-04-17', NULL, NULL, 13, 1),
(17, 4, 'R', 'RV-017', '50.00', '2019-04-10', '[auto] Fee received for karim [ 001201 ] Memo Number001013', '2019-04-10', NULL, NULL, 13, 1),
(18, 4, 'R', 'RV-018', '50.00', '2019-04-10', '[auto] Fee received for karim [ 001201 ] Memo Number001013', '2019-04-10', NULL, NULL, 13, 1),
(19, 4, 'R', 'RV-019', '50.00', '2019-04-10', '[auto] Fee received for karim [ 001201 ] Memo Number001013', '2019-04-10', NULL, NULL, 13, 1),
(20, 4, 'R', 'RV-020', '50.00', '2019-04-10', '[auto] Fee received for karim [ 001201 ] Memo Number001013', '2019-04-10', NULL, NULL, 13, 1);

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
(22, 4, 1, NULL, 17, 1, 'Rahim', '150.00'),
(23, 4, 2, NULL, 3, 1, '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001001', '900.00'),
(24, 4, 3, NULL, 3, 1, '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001002', '1000.00'),
(25, 4, 3, NULL, 7, 1, '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001002', '200.00'),
(26, 4, 4, NULL, 7, 1, '[auto] Fee received for Nusrat Jahan [ 001DB060502 ] Memo Number001003', '200.00'),
(27, 4, 5, NULL, 7, 1, '[auto] Fee received for Iftekhaaruddin Khan [ 001MB060305 ] Memo Number001004', '200.00'),
(28, 4, 6, NULL, 9, 1, 'Salary', '3400.00'),
(29, 4, 6, NULL, 13, 1, 'Bill', '400.00'),
(30, 4, 7, NULL, 1, 7, 'r', '400.00'),
(31, 4, 8, NULL, 3, 1, '[auto] Fee received for Tasnia Ebnat Sowbia [ 001MB081902 ] Memo Number001005', '1000.00'),
(32, 4, 8, NULL, 7, 1, '[auto] Fee received for Tasnia Ebnat Sowbia [ 001MB081902 ] Memo Number001005', '300.00'),
(33, 4, 9, NULL, 3, 1, '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001006', '1000.00'),
(34, 4, 10, NULL, 7, 1, '[auto] Fee received for Junayed Ahmed Ador [ 001MB0302 ] Memo Number001007', '200.00'),
(35, 4, 11, NULL, 3, 1, '[auto] Fee received for Md. Alif Hossain [ 001DB1602 ] Memo Number001008', '1000.00'),
(36, 4, 12, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001009', '5500.00'),
(37, 4, 13, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001009', '5500.00'),
(38, 4, 14, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001010', '2500.00'),
(39, 4, 15, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001011', '100.00'),
(40, 4, 16, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001011', '100.00'),
(41, 4, 17, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001013', '50.00'),
(42, 4, 18, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001013', '50.00'),
(43, 4, 19, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001013', '50.00'),
(44, 4, 20, NULL, 3, 1, '[auto] Fee received for karim [ 001201 ] Memo Number001013', '50.00');

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

--
-- Dumping data for table `ac_opening_balances`
--

INSERT INTO `ac_opening_balances` (`BalanceId`, `Date`, `LedgerId`, `BranchId`, `Amount`) VALUES
(1, '2019-01-01', 1, 1, '400000.00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`BatchId`, `BranchId`, `CourseId`, `BatchName`, `StartTime`, `EndTime`) VALUES
(1, 4, 0, 'MRD-01', '10:00:00', '12:00:00'),
(2, 6, 0, 'MRD-02', '01:00:00', '03:00:00'),
(3, 4, 0, 'MRD-03', '04:00:00', '06:00:00'),
(4, 4, 45, 'NWF001', '09:00:00', '11:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookId`, `SubjectId`, `BookName`, `AuthorId`, `NumberOfBooks`, `TypeId`) VALUES
(1, 0, 'Lecture 01 on General Knowledge', 1, 10, 5),
(2, 0, 'Lecture 01 on bangladeshddd', 1, 10, 5),
(3, 25, 'Lecture 02 on bangladeshddd', 1, 10, 5),
(4, 23, 'Lecture 01 on General Knowledge', 1, 20, 6),
(5, 25, 'Lecture 04 on bangladeshddd', 1, 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `AuthorId` int(11) UNSIGNED NOT NULL,
  `AuthorName` varchar(200) DEFAULT NULL,
  `Description` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`AuthorId`, `AuthorName`, `Description`) VALUES
(1, 'M.I.Prodhan', 'Bcs cader of 30th bcs now working on ');

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
-- Table structure for table `book_stocks`
--

CREATE TABLE `book_stocks` (
  `StockId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `AvailableNumber` int(11) NOT NULL
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
(5, 'Lecture Sheets'),
(6, 'Suggestions'),
(7, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BranchId` int(11) UNSIGNED NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `BranchCode` varchar(100) NOT NULL,
  `ContactNumber` varchar(100) DEFAULT NULL,
  `BranchAddress` text,
  `IsHeadOffice` tinyint(1) DEFAULT '0',
  `Logo` text,
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
(4, 'Sham Academy', '001', 'Contact No : +8801711274688', '000/20, Uttara, Sector 09, Dhaka-1230', 0, '7333173385c7604ab95fac.png', '01', '01746-952089', '', '', '2018-12-31', '', '', '2019-2020', 'M,D', 'B,E,V'),
(5, 'Kids Care', '002', '8801711274688', 'Monipur, Mirpur-2, Dhaka', 0, NULL, '8801711274688', '8801711274688', '8801711274688', '', '2019-02-02', '', '', '2019-2020', 'M,D', 'B,E,V'),
(6, 'Cosmopolitan Laboratory  Institute ', '003', '01622777444', '983/1 Monipur Mirpur-2 Dhaka- 1216', 0, '14953169175c18d905cd301.jpg', '8801711274688', '8801711274688', '8801711274688', '', '2019-01-11', '', '', '2019-2020', 'M,D', 'B,E,V');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ClassDescription` text
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
(43, 4, '01', 'One', ''),
(44, 4, '001', 'Preliminary', ''),
(45, 4, '002', 'Written', ''),
(46, 4, '003', 'Viva', ''),
(47, 4, '004', 'Bank Job', ''),
(48, 4, '006', 'Others', '');

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
(21, 4, 'M', '3rd Period', '10:40', '11:30'),
(22, 4, 'M', '7th eriod', '10:20', '11:10');

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

--
-- Dumping data for table `config_class_routines`
--

INSERT INTO `config_class_routines` (`RoutineId`, `BranchId`, `ClassId`, `SectionId`, `Shift`, `Medium`, `SubjectId`, `EmployeeId`, `Day`, `PeriodId`, `RoomNumber`) VALUES
(1, 4, 14, 19, 'M', 'B', 23, 7, 'SUN', 22, '3');

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
(87, 4, '38', 43, 'M1 Rose'),
(88, 4, '00', 39, 'sham');

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
(25, 4, 'bangladeshddd');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribution_lists`
--

INSERT INTO `distribution_lists` (`DistributionId`, `BranchId`, `ClassId`, `TypeId`, `SubjectId`, `StudentId`, `BookId`, `Number`, `EntryBy`) VALUES
(1, 4, 45, 5, 25, 626, 3, 1, 13),
(2, 4, 45, 5, 25, 626, 3, 2, 13),
(3, 4, 45, 6, 23, 626, 4, 3, 13),
(4, 4, 45, 6, 25, 626, 5, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `DormitoryId` int(11) UNSIGNED NOT NULL,
  `DormitoryName` varchar(100) DEFAULT NULL,
  `NoOfRooms` int(11) DEFAULT NULL,
  `Description` tinytext
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
  `PresentAddress` text,
  `PermanentAddress` text,
  `DateOfJoining` date DEFAULT NULL,
  `DesignationId` int(11) DEFAULT NULL,
  `CurrentSalary` decimal(10,2) DEFAULT NULL,
  `Ref1` varchar(100) DEFAULT NULL,
  `RefContactNumber` varchar(20) DEFAULT NULL,
  `Ref2` varchar(100) DEFAULT NULL,
  `Ref2ContactNumber` varchar(100) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL,
  `DegreeId` varchar(100) DEFAULT NULL,
  `IsTeacher` tinyint(1) DEFAULT '1',
  `Image` varchar(600) DEFAULT NULL,
  `Reason` text,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeId`, `BranchId`, `EmployeeName`, `EmployeeCode`, `DateOfBirth`, `Email`, `Nid`, `ContactNumber`, `AltContactNumber`, `Gender`, `BloodGroup`, `FathersName`, `MothersName`, `SpouseName`, `PresentAddress`, `PermanentAddress`, `DateOfJoining`, `DesignationId`, `CurrentSalary`, `Ref1`, `RefContactNumber`, `Ref2`, `Ref2ContactNumber`, `Status`, `DegreeId`, `IsTeacher`, `Image`, `Reason`, `UserId`) VALUES
(1, 6, 'Shahinur Rahman', 'aa', '1970-01-01', 'shahinurrahman989@gm', '19895017975232103', '01739265992', NULL, 'M', 'O+', 'Shorab Hossain', 'Jarina Begum', 'N/A', '664, Monipur, Mirpur - 2 Dhaka - 1216', 'Lahini, Mohini Mills, Kushtia (7001)', '2017-10-07', 4, '6500.00', 'Fahim', NULL, 'Nazim Uddin', NULL, 'A', 'Honours', 1, NULL, NULL, NULL),
(2, 6, 'Abdul Hakim ', 'ab', '1990-01-01', 'ahahim111990@gmal.co', '19909415181000204', '01750665030', NULL, 'M', 'AB+', 'Late. Kasiruddin', 'Mst. Hameda khatun ', 'N/A', '805/1, Monipur, Mirpur -2 , Dhaka-1216', 'Torrah, Horipur, Thakurgaon', '2018-12-18', 4, '6000.00', 'Md. Alamgir Hossain', NULL, 'No', NULL, 'A', 'Honours', 1, NULL, NULL, NULL),
(3, 6, 'Kalyani Biswas ', 'ac', '1970-01-01', 'Kbiswas134@gmal.com', '19874413347451858', '01781585918', NULL, 'F', 'B+', 'Kalipada Biswas', 'Bindu Biswas ', 'N/A', '903/1, Monipur, Mirpur, -2, Dhaka -1216', 'Vill + P.O, Khalkula P.S Kaligonj, Dist, Jhenidah 7350 ', '2017-01-03', 4, '6000.00', 'Taposh Biswas (01926101150)', NULL, 'Sathi Mandal (01789743362)', NULL, 'A', 'Honours', 1, NULL, NULL, NULL),
(4, 6, 'Md. Abdul Baki', 'ad', '1970-01-01', '', '8719079517245', '01718929502', NULL, 'M', 'B+', 'Late Azgor Ali Sarder', 'Marium Begum', 'Mst Mortuza Khatun', '954, Middle Monipur Mirpur - 2 Dhaka -1216', 'Jugkhula, Patkelghata, Satkhira.', '1995-06-06', 4, '5700.00', '', NULL, '', NULL, 'A', 'Honours', 1, '18838478695c18c7447429a.jpg', NULL, NULL),
(5, 6, 'Md. Mobarak Hossain', 'ae', '1970-01-01', 'belal@cosmopolitanelc.com', '19882648111000086', '01766276581', '', 'M', 'B+', 'Late Md. Amzad Hossain', 'Hena Begum', 'Jannatul Mawya', '704, Middle Monipur, Mirpur - 2, Dhaka - 1216', 'Agnulkaly  West para, Khoshatbaria, Shahjadpur, Shirajgong.', '2011-01-02', 2, '0.00', 'Md. Alauddin (01673991620)', '', 'Adus Salam Mia (01716941536)', NULL, 'A', 'Honours', 1, NULL, NULL, NULL),
(6, 1, 'Md. Moniruzzaman Shobuz', 'a', '1985-02-02', 'zs.technologyworld@gmail.com', '19852610457000056', '01711712403', '', 'M', 'O+', 'Md. Emdadul Hoque', 'Mst, Morjina Khatun', 'Mst. Samira Khatun', '964 Mollah Road, Monipur, Mirpur -2, Dhaka - 1216', 'Taragunia, Dolatpur, Kushtia', '2013-01-10', 10, '0.00', 'Fahim', '', 'Nazim Uddin', NULL, 'A', 'Honours', 1, '7400777425c18e2bcc5288.JPG', NULL, NULL),
(7, 4, 'ASif', '007', '2019-02-12', 'as@gmail.com', '345678', '123456789', '4567890', 'M', 'A+', 'A', 'A', 'A', 'df', 'sdf', '2019-02-21', 5, '1200.00', '', '', '', '', 'A', 'HSC', 1, NULL, NULL, 490),
(8, 4, 'Afzal Vai', '008', '2019-02-13', 'as@gmail.com', '3456', '098765432100', '34', 'M', 'A+', 'zdc', 'sdf', 'sd', 'sf', 'sd', '2019-02-15', 9, '12000.00', '', '', '', '', 'A', 'HSC', 0, NULL, NULL, 491);

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
  `ExamName` varchar(100) DEFAULT NULL,
  `ExamDate` date NOT NULL,
  `ExamDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ExamId`, `BranchId`, `ExamName`, `ExamDate`, `ExamDescription`) VALUES
(9, 4, 'weekly exam', '0000-00-00', ''),
(10, 4, 'monthly exam', '0000-00-00', ''),
(11, 4, 'Current World', '2019-04-22', 'all exam will be on  current world related. 100 marks exam'),
(12, 4, 'General Knowledge', '2019-04-09', 'all exam will be on  current world related. 100 marks exam');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendance`
--

CREATE TABLE `exam_attendance` (
  `ExamAttendanceId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `ExamDate` int(11) NOT NULL,
  `Attendance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attendance`
--

INSERT INTO `exam_attendance` (`ExamAttendanceId`, `BranchId`, `StudentId`, `ExamId`, `ExamDate`, `Attendance`) VALUES
(1, 4, 625, 11, 2019, 'P'),
(2, 4, 626, 11, 2019, 'P'),
(3, 4, 627, 11, 2019, 'P'),
(4, 4, 154, 11, 2019, 'P');

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
(1, 4, 'M', 'B', 8, 18, '2019-2020', 13, '2018-12-15'),
(2, 4, 'M', 'B', 10, 14, '2019-2020', 13, '2019-03-07');

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
(3, 1, 4, 'M', 'B', '2019-2020', 8, 18, 1, '200', '2018-12-03'),
(4, 2, 4, 'M', 'B', '2019-2020', 10, 14, 24, '2002', '2019-03-04');

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

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`FeeId`, `BranchId`, `Year`, `MemoNo`, `StudentId`, `TransactionDate`, `TotalWaiverAmount`, `TotalAmount`, `EntryDate`, `EntryBy`, `VoucherId`) VALUES
(1, 4, '2019-2020', '001001', 154, '2019-02-15', '100.00', '900.00', '2019-02-15 00:00:00', 13, 2),
(2, 4, '2019-2020', '001002', 154, '2019-03-06', '0.00', '1200.00', '2019-03-06 00:00:00', 13, 3),
(3, 4, '2019-2020', '001003', 468, '2019-02-14', '0.00', '200.00', '2019-02-14 00:00:00', 13, 4),
(4, 4, '2019-2020', '001004', 279, '2019-02-13', '0.00', '200.00', '2019-02-13 00:00:00', 13, 5),
(5, 4, '2019-2020', '001005', 157, '2019-02-15', '0.00', '1300.00', '2019-02-15 00:00:00', 13, 8),
(6, 4, '2019-2020', '001006', 154, '2019-03-06', '0.00', '1000.00', '2019-03-06 00:00:00', 13, 9),
(7, 4, '2019-2020', '001007', 154, '2019-03-15', '0.00', '200.00', '2019-03-15 00:00:00', 13, 10),
(8, 4, '2019-2020', '001008', 155, '2019-04-03', '0.00', '1000.00', '2019-04-03 00:00:00', 13, 11),
(9, 4, '2019-2020', '001009', 625, '2019-04-14', '0.00', '3000.00', '2019-04-14 00:00:00', 13, 13),
(10, 4, '2019-2020', '001010', 625, '2019-04-15', '0.00', '2500.00', '2019-04-15 00:00:00', 13, 14),
(11, 4, '2019-2020', '001011', 625, '2019-04-17', '0.00', '100.00', '2019-04-17 00:00:00', 13, 15),
(12, 4, '2019-2020', '001011', 625, '2019-04-17', '0.00', '100.00', '2019-04-17 00:00:00', 13, 16),
(13, 4, '2019-2020', '001013', 625, '2019-04-10', '0.00', '50.00', '2019-04-10 00:00:00', 13, 17),
(14, 4, '2019-2020', '001013', 625, '2019-04-10', '0.00', '50.00', '2019-04-10 00:00:00', 13, 18),
(15, 4, '2019-2020', '001013', 625, '2019-04-10', '0.00', '50.00', '2019-04-10 00:00:00', 13, 19),
(16, 4, '2019-2020', '001013', 625, '2019-04-10', '0.00', '50.00', '2019-04-10 00:00:00', 13, 20);

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `CategoryId` int(11) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL,
  `LedgerCode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`CategoryId`, `CategoryName`, `LedgerCode`) VALUES
(1, 'Admission Fee', 102),
(2, 'Tution Fee', 106);

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
(103, 6, 38, 13, '1600.00', NULL),
(104, 4, 43, 11, '700.00', '0.00'),
(105, 4, 42, 11, '700.00', '0.00'),
(106, 4, 41, 11, '700.00', '0.00'),
(107, 4, 40, 11, '700.00', '0.00'),
(108, 4, 43, 11, '1000.00', '0.00'),
(109, 4, 42, 11, '1000.00', '0.00'),
(110, 4, 41, 11, '1000.00', '0.00'),
(111, 4, 40, 11, '1000.00', '0.00'),
(112, 4, 39, 11, '1000.00', '0.00'),
(113, 4, 39, 11, '1000.00', '0.00'),
(114, 4, 14, 11, '1000.00', '0.00'),
(115, 4, 15, 11, '1000.00', '0.00'),
(116, 4, 16, 11, '1000.00', '0.00'),
(117, 4, 17, 11, '1000.00', '0.00'),
(118, 4, 18, 11, '1000.00', '0.00'),
(119, 4, 16, 13, '300.00', NULL),
(120, 4, 14, 13, '200.00', NULL),
(121, 4, 3, 11, '5000.00', '0.00'),
(122, 4, 44, 11, '5500.00', '0.00');

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
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_details`
--

INSERT INTO `fee_details` (`FeeDetailsId`, `FeeId`, `Year`, `TransactionDate`, `StudentId`, `CourseId`, `BranchId`, `TypeId`, `WaiverAmount`, `Amount`) VALUES
(21, 1, '2019-2020', '2019-02-15', 154, 14, 4, 11, '100.00', '900.00'),
(22, 2, '2019-2020', '2019-03-06', 154, 14, 4, 11, '0.00', '1000.00'),
(23, 2, '2019-2020', '2019-03-06', 154, 14, 4, 13, '0.00', '200.00'),
(24, 3, '2019-2020', '2019-02-14', 468, 14, 4, 13, '0.00', '200.00'),
(25, 4, '2019-2020', '2019-02-13', 279, 14, 4, 13, '0.00', '200.00'),
(26, 5, '2019-2020', '2019-02-15', 157, 16, 4, 11, '0.00', '1000.00'),
(27, 5, '2019-2020', '2019-02-15', 157, 16, 4, 13, '0.00', '300.00'),
(28, 6, '2019-2020', '2019-03-06', 154, 14, 4, 11, '0.00', '1000.00'),
(29, 7, '2019-2020', '2019-03-15', 154, 14, 4, 13, '0.00', '200.00'),
(30, 8, '2019-2020', '2019-04-03', 155, 15, 4, 11, '0.00', '1000.00'),
(32, 9, '2019-2020', '2019-04-14', 625, 44, 4, 11, '0.00', '3000.00'),
(33, 10, '2019-2020', '2019-04-15', 625, 44, 4, 11, '0.00', '2500.00'),
(34, 11, '2019-2020', '2019-04-17', 625, 44, 4, 11, '0.00', '100.00'),
(35, 12, '2019-2020', '2019-04-17', 625, 44, 4, 11, '0.00', '100.00'),
(36, 13, '2019-2020', '2019-04-10', 625, 44, 4, 11, '0.00', '50.00'),
(37, 14, '2019-2020', '2019-04-10', 625, 44, 4, 11, '0.00', '50.00'),
(38, 15, '2019-2020', '2019-04-10', 625, 44, 4, 11, '0.00', '50.00'),
(39, 16, '2019-2020', '2019-04-10', 625, 44, 4, 11, '0.00', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `TypeId` int(11) UNSIGNED NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `TypeName` varchar(100) DEFAULT NULL,
  `Description` text,
  `IsMonthlyFee` tinyint(1) DEFAULT '0',
  `IsWaiverApplicable` tinyint(1) DEFAULT NULL,
  `IsOneTimeFee` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`TypeId`, `CategoryId`, `TypeName`, `Description`, `IsMonthlyFee`, `IsWaiverApplicable`, `IsOneTimeFee`) VALUES
(11, 1, 'Admission Fee', '', 0, 1, 1),
(13, 2, 'Tuition Fee', '', 1, 1, 0),
(14, 0, '1st Month Exam Fee', '', 0, 0, 1),
(15, 0, '2nd Month Exam Fee', '', 0, 0, 1),
(16, 0, 'Half Yearly Exam Fee', '', 0, 0, 1),
(17, 0, '3rd Month Exam Fee', '', 0, 0, 1),
(18, 0, '4th Month Exam Fee', '', 0, 0, 1),
(19, 0, 'Yearly Exam Fee', '', 0, 0, 1),
(20, 1, 'test feee', '', 0, 0, 1);

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
  `GradeDescription` tinytext
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
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `LectureId` int(11) NOT NULL,
  `LectureTitle` varchar(200) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `LectureVideo` longtext NOT NULL,
  `LectureLink` varchar(255) NOT NULL
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
(1, 4, 16, 37, '2018-12-04', 8, 1),
(2, 4, 14, 19, '2019-02-07', 8, 20),
(3, 4, 14, 19, '2019-02-05', 8, 20);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark_details`
--

INSERT INTO `mark_details` (`MarkDetailsId`, `BranchId`, `ClassID`, `SectionId`, `ExamId`, `ExamDate`, `SubjectId`, `StudentId`, `PracticalMark`, `SubjectiveMark`, `ObjectiveMark`, `Point`, `Grade`, `TotalMark`, `EntryOn`, `EntryBy`) VALUES
(33, 4, 14, 21, 8, '2019-03-08', 19, 154, 0, 33, 22, 3, 'B', 55, '2019-03-09 06:48:28', 13),
(34, 4, 14, 21, 8, '2019-03-08', 19, 254, 0, 23, 22, 2, 'C', 45, '2019-03-09 06:48:28', 13),
(35, 4, 14, 21, 8, '2019-03-08', 19, 268, 0, 34, 22, 3, 'B', 56, '2019-03-09 06:48:28', 13),
(36, 4, 14, 21, 8, '2019-03-08', 19, 279, 0, 32, 22, 3, 'B', 54, '2019-03-09 06:48:28', 13),
(37, 4, 14, 21, 10, '2019-03-07', 20, 154, 0, 35, 12, 2, 'C', 47, '2019-03-11 09:31:23', 13),
(38, 4, 14, 21, 10, '2019-03-07', 20, 254, 0, 56, 22, 4, 'A', 78, '2019-03-11 09:31:23', 13),
(39, 4, 14, 21, 10, '2019-03-07', 20, 268, 0, 56, 11, 3.5, 'A-', 67, '2019-03-11 09:31:23', 13),
(40, 4, 14, 21, 10, '2019-03-07', 20, 279, 0, 55, 11, 3.5, 'A-', 66, '2019-03-11 09:31:23', 13);

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
  `Logo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`OrganizationId`, `OrganizationName`, `OrganizationAddress_1`, `OrganizationAddress_2`, `OrganizationAddress_3`, `OrganizationLogo`, `CashMemoPrefix`, `MemoPrfix`, `StudentCodePrefix`, `Logo`) VALUES
(1, 'Headoffice', 'Air', NULL, NULL, NULL, 'SM-', 'PM-', '', '');

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
(467, 6, 611, 'Md. Abul Kalam ', '01936557213', 479),
(468, 6, 612, 'Md. Abul Kalam ', '01936557213', 480),
(469, 6, 613, 'Md. Anar Mia ', '01884914983', 481),
(470, 6, 614, 'Shek Shokot ', '01711577726', 482),
(471, 6, 615, 'Jinnah Akand ', '01746323134', 483),
(472, 6, 616, 'Jinnah Akand ', '01746323134', 484),
(473, 6, 617, 'Md. Shamim ', '01726020249', 485),
(474, 6, 618, 'Mizanur Hossen ', '01719988563', 486),
(475, 6, 619, 'Md. Ismail Hossen ', '01924461125', 487),
(476, 6, 620, 'Md. Shahjahen ', '01953694702', 488),
(477, 6, 621, 'Md. Abul Bashar ', '01700881476', 489),
(478, 4, 622, 'sha alam', '01654879952', 492),
(479, 4, 624, 'dsdsd', NULL, 494),
(480, 4, 625, 'eeeeeeeeeeeee', '09872654567', 495);

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
  `PermanentAddress` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `BranchId`, `Year`, `StudentName`, `BatchId`, `StudentCode`, `CourseId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `GuardianContactNumber`, `MothersName`, `Contact`, `StudentEmail`, `AdmissionDate`, `BloodGroup`, `StudentPhoto`, `EntryBy`, `EntryDate`, `Image`, `Occupation`, `SSC`, `SSCYear`, `SSCBoard`, `SSCSubject`, `SSCResult`, `HSC`, `HSCYear`, `HSCBoard`, `HSCSubject`, `HSCResult`, `Graduation`, `GraduationYear`, `GraduationBoard`, `GraduationSubject`, `GraduationResult`, `PostGraduation`, `PostGraduationYear`, `PostGraduationBoard`, `PostGraduationSubject`, `PostGraduationResult`, `Status`) VALUES
(154, 4, '2019-2020', 'Junayed Ahmed Ador', 0, '001MB0302', '21', 2, '2005-04-28', '764/1, Monipur, Mirpur-2, Dhhaka-1216', '', 'Hossen Ahmed Raton', 0, 'Mahamuda Mahabub Samiha', '01713257941', '', '2018-12-09', 'Unknown', NULL, 15, '2018-12-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(155, 4, '2019-2020', 'Md. Alif Hossain', 0, '001DB1602', '34', 2, '2004-04-15', '19/3 Kotbari Gabtoli Mirpur, Dhaka', '', 'Md. Salauddin Mintu', 0, 'Mafuza Begum', '01817538430', '', '2018-12-09', 'Unknown', NULL, 15, '2018-12-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(156, 4, '2019-2020', 'Irisha Salsabil Ifa', 0, '001MB081901', '37', 1, '2006-04-29', 'Towin One Villa, Mazar Road, Mirpur-1', '', 'Galib Yeashir', 0, 'Kanij Fatema', '01814658328', '', '2018-12-05', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(157, 4, '2019-2020', 'Tasnia Ebnat Sowbia', 0, '001MB081902', '37', 2, '2005-07-15', 'Monipur, Mirpur-2 Adoros Road 900 Dhaka-1216', '', 'Md. Habibur Rahman', 0, 'Razia Zinat', '01816600080', '', '2018-11-01', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(158, 4, '2019-2020', 'Rownak Afrin', 0, '001MB081903', '37', 3, '2018-12-12', 'Borobag, Mirpur-2 Dhaka', '', 'Md. Sayedur Rahman', 0, 'Farhana Monir Chowdhury', '01727217928', '', '2018-12-10', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(159, 4, '2019-2020', 'Nazmun Nahar Prity', 0, '001MB081904', '37', 4, '2007-01-15', '656/c Monipur, Mirpur-2 Dhaka-1216', '', 'Md. Nizamuddin', 0, 'Farida yesmin', '01976210415', '', '2018-12-08', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(160, 4, '2019-2020', 'Mahreen Jannat Mowri', 0, '001MB081905', '37', 5, '2007-01-30', '111/ B-2, Shah Ali Bag, lane-2 Mirpur-1 Dhaka-1216', '', 'Md. Abdul Maivivan', 0, 'Parvin Akter', '01718771056', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(161, 4, '2019-2020', 'Shubah Tasnim Soya', 0, '001MB081906', '37', 6, '2006-06-29', '664, Mollah Road Mirpur-2 Dhaka-1216', '', 'Rezual Karim', 0, 'Fahamed Afroj', '01712755876', '', '2018-12-05', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(162, 4, '2019-2020', 'Muslima Akter Tripti', 0, '001MB081907', '37', 7, '2006-03-23', '1/1/1 West Monipur, Borobagh Dhaka-1216', '', 'Md. Mazedul Islam', 0, 'Afroza Begum', '01750536922', '', '2018-12-04', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(163, 4, '2019-2020', 'Masruba Mahnaz', 0, '001MB081908', '37', 8, '2005-04-16', 'Maghna Tower Flat No c-3 House No-53/1 Borobag Mirpur -2 Dhaka', '', 'Md. Abdullah Al Mamun', 0, 'Umme Hasna', '01674628237', '', '2018-11-29', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(164, 4, '2019-2020', 'Sadia Hossain', 0, '001MB081909', '37', 9, '2006-01-04', 'Perarbas, Jilpur, Mirpur', '', 'Rokib Hossain', 0, 'Reba Hossain', '01732772217', '', '2018-11-14', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(165, 4, '2019-2020', 'Tabassum Rahman Tisha', 0, '001MB081910', '37', 10, '2005-11-20', '782 West Kazipara, Mirpur Dhaka', '', 'Md. Khalilur Rahman', 0, 'Rokeya Akter', '01922897556', '', '2018-11-13', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(166, 4, '2019-2020', 'Priyanka Bose Pinke', 0, '001MB081911', '37', 11, '2004-10-08', '78/3, Borobag, Mirpur-2', '', 'Sosanto Boshu', 0, 'Ritu Bosu', '01924730477', '', '2018-11-12', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(167, 4, '2019-2020', 'Maisha Lamin Khan Boishakhi', 0, '001MB081912', '37', 12, '2006-04-14', '141/senpara parbota Mirpur-10  Dhaka-1216', '', 'Md. Aminur Rahman Khan', 0, 'Nargis Parvin Rupa', '01923344139', '', '2018-11-10', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(168, 4, '2019-2020', 'Sheikh Marisa Hossain', 0, '001MB081913', '37', 13, '2005-09-19', 'Monipur, Mirpur -2 Adorso Road, Dhaka-1216', '', 'Md. Anwar Hossain', 0, 'Zinia Sultana (let)', '01715039739', '', '2018-11-08', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(169, 4, '2019-2020', 'Jawata Afrana Rupanti', 0, '001MB081914', '37', 14, '2005-10-10', '1085/1 Madhua Apartment East Monipur, Mirpur-10 Dhaka-1216', '', 'Md. Zakir Hossain', 0, 'Jahanara Ranu', '01712128991', '', '2018-11-07', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(170, 4, '2019-2020', 'Anisha Azad Katha', 0, '001MB081915', '37', 15, '2006-12-15', '1049 West Monipur Mirpur-2 Dhaka', '', 'Abul Kalam Azad', 0, 'Mansura ', '01733173284', '', '2018-11-06', 'Unknown', NULL, 16, '2018-12-10', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(171, 4, '2019-2020', 'Sumaya Ahmad Sinthe', 0, '001MB081916', '37', 16, '2006-05-27', 'H# 345/1 Ahmad Nagor Paikpara Mirpur-1 Dhaka', '', 'Selim Ahmed', 0, 'Sahanara Begum', '01819945399', '', '2018-11-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(172, 4, '2019-2020', 'Labiba Islam', 0, '001MB081917', '37', 17, '2006-08-31', '247/3A Ahmad Nagor Paikpara Mirpur-1 Dhaka', '', 'Saidul Islam', 0, 'Laki Islam', '01819202492', '', '2018-11-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(173, 4, '2019-2020', 'Fabiha Bushra Takya', 0, '001MB081918', '37', 18, '2006-03-30', '64/3, Paikpara, govt coloni Mirpur-1 Dhaka-1216', '', 'Mahumudul Hasan', 0, 'Mukta', '01718334559', '', '2018-11-05', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(174, 4, '2019-2020', 'Mir Mashrika Roza', 0, '001MB081919', '37', 19, '2006-12-18', '130/3-A, Jonakiroad, Ahmednagar, Mirpur-1 Dhaka', '', 'Mir Monowar Hossain', 0, 'Nasrin Nahar', '01711939089', '', '2018-11-05', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(175, 4, '2019-2020', 'Nafisha Binte Masud Preonty', 0, '001MB081920', '37', 20, '2006-11-18', '210/1 Ahmad Nagor mirpur-1 Dhaka-1216', '', 'Munshi Masud Hossen', 0, 'Ruksana Parvin', '01929993008', '', '2018-11-05', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(176, 4, '2019-2020', 'Jesia Jannat ', 0, '001MB081921', '37', 21, '2005-10-13', '900 Adorsho Road, Mirpur-2 Monipur Dhaka-1216', '', 'Md.Jalal Uddin', 0, 'Mahfuza Akter Rina', '01741692264', '', '2018-11-05', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(177, 4, '2019-2020', 'Razna Mahiat', 0, '001MB082001', '38', 1, '2004-12-29', '333/1-A Ahmed Nagor, Paikpara Mirpur-1 Dhaka', '', 'Md. Abdul Halim', 0, 'Mrs. Moluda Khatun', '01818095700', '', '2018-12-08', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(178, 4, '2019-2020', 'Tanjia Sultana', 0, '001MB082002', '38', 2, '2005-11-13', 'House No-840, Mid Monipur Mirpur -2 Dhaka', '', 'Anamul Haq Mollah', 0, 'Arifa Sultana', '01714340144', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(179, 4, '2019-2020', 'Tasnim Rahman', 0, '001MB082003', '38', 3, '2005-03-12', '772/1 Monipur Mirpur Dhaka', '', 'Mizanur Rahman', 0, 'Masuma Akter', '01814097490', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(180, 4, '2019-2020', 'Jarin Tasnim', 0, '001MB082004', '38', 4, '2005-05-01', 'H#57 Brobag Mirpur-2 Dhaka', '', 'Md. Kamal Parvase', 0, 'Tonuja Khanom', '01713148520', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(181, 4, '2019-2020', 'Rehnuma Tasneem', 0, '001MB082005', '38', 5, '2005-10-21', '971/1 East Monipur, Mirpur', '', 'MD. Abul Khaer', 0, 'Fatema Tuj Johura', '01720513592', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(182, 4, '2019-2020', 'Jarin Tasnim Othoi', 0, '001MB082006', '38', 6, '2005-10-10', '30, Popular Housing-1 Borobag, Mirpur-2', '', 'Tariqul Islam', 0, 'Khadija Akter', '01730083684', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(183, 4, '2019-2020', 'Tasnim Tabassum Hrid', 0, '001MB082007', '38', 7, '2007-01-18', '999 East Monipur Mirpur-2 Dhaka-1216', '', 'Dr.Md Khalid Jamil', 0, 'Israt Jahan', '01720110514', '', '2018-12-04', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(184, 4, '2019-2020', 'Anjuman Amin Athoy', 0, '001MB082008', '38', 8, '2006-01-13', '15/1 Ahmmad Nagor Mirpur-1 Dhaka-1216', '', 'late, Aminul Islam', 0, 'Shamima', '01919868457', '', '2018-12-05', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(185, 4, '2019-2020', 'Tabassum Maria', 0, '001MB082009', '38', 9, '2006-02-14', 'House-44, Sc-6 Abemau-5 Mirpur', '', 'MD. Nur Nobi', 0, 'Tahmina Akter', '01961817877', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(186, 4, '2019-2020', 'Shams Hasin Hoque Esha', 0, '001MB082010', '38', 10, '2006-09-22', '6/A Mirpur-6 Dhaka-1216', '', 'Md. Ehtesham ul- Haque', 0, 'Hasina Begum', '01711530855', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(187, 4, '2019-2020', 'Anchol Sharma', 0, '001MB082011', '38', 11, '2006-03-01', '16/1/2 Tolarbag Mirpur-1 Dhaka', '', 'Kalipodo Sharma', 0, 'Smriti Kona Sharma', '01780172784', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(188, 4, '2019-2020', 'Rahnuma Islam', 0, '001MB082012', '38', 12, '2006-08-27', '3/7 North Prierbag Mirpur-1 Dhaka', '', 'Mounzurul Islam', 0, 'Kamrunnher', '01922554352', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(189, 4, '2019-2020', 'Taibanur Razzak', 0, '001MB082013', '38', 13, '2004-06-06', '30/A Ahmed Nagor Jonaki Road Monipur, Mirpur Dhaka-1216', '', 'Hanif MD. Sofrur Razzak', 0, 'Taslima Khatun', '01626530604', '', '2018-12-08', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(190, 4, '2019-2020', 'Farhan Sadik SAjim', 0, '001MB082101', '39', 1, '2004-03-13', 'B-541 3rd coleny Mazar Road Dhaka-1216', '', 'Imrul Kayes', 0, 'Nazma Akter', '01678592203', '', '2018-11-13', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(191, 4, '2019-2020', 'Farhan Sadman ur Rafiq', 0, '001MB082102', '39', 2, '2005-11-08', '183/3, 2nd colon, Dhaka', '', 'Rafiqul Islam', 0, 'Farhana Haque', '01714049531', '', '2018-11-13', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(192, 4, '2019-2020', 'Md. Ravidhul Islam Ratul', 0, '001MB082103', '39', 3, '2006-07-01', '452/2 South Monipur Mirpur Dhaka-1216', '', 'Md. Rafiquel Islam', 0, 'Mrs. Farhana Rume', '01717094845', '', '2018-11-07', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(193, 4, '2019-2020', 'Shahib Ahamed', 0, '001MB082104', '39', 4, '2006-03-24', '104 Glolartag Mirpur-1 Dhaka', '', 'Mizanur Rahman ', 0, 'Soneya Parvin', '01917406622', '', '2018-11-28', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(194, 4, '2019-2020', 'Sabiha Chowdhury Mithi', 0, '001MB082014', '38', 14, '2006-04-18', '25/2 Borobag Mirpur-2 Dhaka- 1216', '', 'Mir Hossain Chowdhury', 0, 'Nasima Akther', '01715030477', '', '2018-12-09', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(195, 4, '2019-2020', 'Jarin Nafisa Rahman', 0, '001MB082015', '38', 15, '2006-09-22', 'H# 17/1/1 Tolarbag Mirpur-1, Dhaka-1216', '', 'Sadiqur Rahman', 0, 'Shamima Sultana', '01819128893', '', '2018-12-09', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(196, 4, '2019-2020', 'Shefa Rahman', 0, '001MB082016', '38', 16, '2006-04-09', '843/1 Middle Monipur , Mirpur -2 Dhaka-1216', '', 'S.M Shafikur Rahman', 0, 'Shahina Afroz', '01715734554', '', '2018-12-09', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(197, 4, '2019-2020', 'Nusrat Jahan', 0, '001MB082017', '38', 17, '2005-12-17', '333/1 South Monopur Mirpur-1', '', 'MD. Tariqul Islam', 0, 'Mss.Shamima Nassrine ', '01913391721', '', '2018-12-10', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(198, 4, '2019-2020', 'Sumaiya Islam', 0, '001MB082201', '40', 1, '2004-10-24', 'Brobasi, Aminbazar, Savar', '', 'Saiful Islam', 0, 'Sonia Islam', '01712603625', '', '2018-12-17', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(199, 4, '2019-2020', 'Maisha Mushrat Muskan', 0, '001MB082018', '38', 18, '2005-11-20', 'Amin Bazar, Savar', '', 'lets Khundaqur Mosharraf', 0, 'Rabea Begum', '01682848907', '', '2018-12-17', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(200, 4, '2019-2020', 'Rahik Jahin Deha', 0, '001MB082019', '38', 19, '2006-03-03', '763/5 Monipur, Mirpur', '', 'Kazi Giash uddin ', 0, 'Ruma Akter Kanon', '01680306572', '', '2018-12-17', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(201, 4, '2019-2020', 'Fahima Afroj Jahin', 0, '001MB082020', '38', 20, '2004-03-18', '160/4/A Middl Piek para (Bau Bazar) Mirpur-1 Dhaka-1216', '', 'Abul Hayath Md.. Kamruzzaman', 0, 'Zakia Parvin', '01912716921', '', '2018-12-17', 'Unknown', NULL, 16, '2018-12-18', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(202, 4, '2019-2020', 'Sabbir Hossain Saim', 0, '001DB050501', '75', 1, '2009-07-21', 'Block/D Road 23, House-29, Mirpur-6 Dhaka-1216', '', 'Md. Abul Kashem', 0, 'Doly Akter', '01717037870', '', '2018-12-05', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(203, 4, '2019-2020', 'Aritra Debnath', 0, '001DB050502', '75', 2, '2009-12-05', '62/8 Paikpara Gov.Staf Quater Mirpur-1, Dhaka', '', 'Asit Kumar Debnath', 0, 'Gouri Biswas', '01716479053', '', '2018-11-18', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(204, 4, '2019-2020', 'Shuvro Chowdhury', 0, '001DB050503', '75', 3, '2009-01-15', '#497 South Monipur, Mirpur-2 Dhaka', '', 'Narayan Das', 0, 'Mukti Chowdhury', '01911487320', '', '2018-11-18', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(205, 4, '2019-2020', 'Farhan Easir Tarif', 0, '001DB050504', '75', 4, '2008-09-26', 'C/o- Khandaker Moshrauf Hossan, 363/1, south monipur Mirpur-2 Dhaka ', '', 'MD. Liakat Ali', 0, 'Mehebuba basar Tandra', '01715407907', '', '2018-12-01', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(206, 4, '2019-2020', 'K.M. Nuruzaman Nabil', 0, '001DB050505', '75', 5, '2009-10-05', '18/3, Borobug, Mirpur-2 Dhaka-1216', '', 'K.M. Abul Kalam Azad', 0, 'Nahar Khatun', '01711136902', '', '2018-12-04', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(207, 4, '2019-2020', 'Shafayat Ishraq', 0, '001DB050506', '75', 6, '2008-11-18', 'H#857 Monipur, Mirpur-2 Dhaka-1216', '', 'Golam Saroar', 0, 'Sarmin Akter', '01711577455', '', '2018-12-09', 'Unknown', NULL, 69, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(208, 4, '2019-2020', 'Oikkya Banargee', 0, '001MB082105', '39', 5, '2004-11-24', '1020 East Monipur, Mirpur-2 Dhaka', '', 'Billiam Banarge', 0, 'Latifa Khatun', '01676041213', '', '2018-12-22', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(209, 4, '2019-2020', 'Asnin Zaaman Anha', 0, '001MB081922', '37', 22, '2006-11-14', 'H# 742/6 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Anisur Zaman', 0, 'Sabina Yesmin', '01733255685', '', '2018-12-22', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(210, 4, '2019-2020', 'Fatema Akter Maisha', 0, '001MB082021', '38', 21, '2006-10-17', '100/A Borobag Mirpur-2 Dhaka-1216', '', 'Monayem Khan', 0, 'Masuda Begum', '01740974326', '', '2018-12-19', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(211, 4, '2019-2020', 'Sharaf Zabin Aritri', 0, '001MB082022', '38', 22, '2006-06-11', 'House No-1/9, Borobag Mirpur-2', '', 'Abdul Hye', 0, 'Israt Jahan', '01717382184', '', '2018-12-18', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(212, 4, '2019-2020', 'Tahia Haque', 0, '001MB082023', '38', 23, '2006-03-29', '461 South Monipur, Mirpur-2 Dhaka-1216', '', 'Kharul Bashar', 0, 'Monara Hoque', '01715529665, 01625677168', '', '2018-12-19', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(213, 4, '2019-2020', 'Marzia Akter Mim', 0, '001MB0505201', '77', 1, '2008-07-14', 'H# 2/2/2 Tolarbag Mirpur-1 Dhaka-1216', '', 'Abdur Satter', 0, 'Sabrina Akter', '01869233572', '', '2018-12-08', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(214, 4, '2019-2020', 'Mst. Marzia Karim Ruba', 0, '001MB0505202', '77', 2, '2008-12-30', 'House No-41 Road No-5 Black-E Pallabi Mirpur-12 Dhaka -1216', '', 'MD. Rezaul Karim', 0, 'Mst. Selina Khatun', '01684328636', '', '2018-12-09', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(215, 4, '2019-2020', 'Jannatul Ferdous Ahona', 0, '001MB0505203', '77', 3, '2008-03-31', 'H# 117/1 East Ahmad Nagar Mirpur-1 Dhaka-1216', '', 'MD. Kamal Hossan', 0, 'Sonia Kamal', '01716281100', '', '2018-12-09', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(216, 4, '2019-2020', 'Sania Islam Protiva', 0, '001DB0505101', '76', 1, '2008-04-13', '798 Monipur, Mirpur-2 Dhaka.', '', 'MD. Farid Hossain Militon', 0, 'Moni Afroz', '01972013367', '', '2018-12-21', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(217, 4, '2019-2020', 'Sadia Islam Borsha', 0, '001DB0505102', '76', 2, '2008-08-31', 'H-617 Middle Monipur, Mirpur-2 Dhaka-1216', '', 'Kh. MD. Sohidul Islam', 0, 'Beauty Begum', '01758926683', '', '2018-11-10', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(218, 4, '2019-2020', 'Farah Anjum', 0, '001DB0505103', '76', 3, '2009-11-04', '173/5 West Argoan Shapla housing Dhaka-1207', '', 'DR, MD. Mizanur Rahman ', 0, 'DR. Ferdousi Begum', '017111131492', '', '2018-12-05', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(219, 4, '2019-2020', 'Sumaiya Arobi Knan', 0, '001MB0505401', '79', 1, '2009-07-10', '141, Senpara Porbata Mirpur-10 Dhaka-1216', '', 'Md. Aminur Rahman Khan', 0, 'Nargis Parvin', '016833301130', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(220, 4, '2019-2020', 'Fardatul Rikza Toyo', 0, '001MB0505402', '79', 2, '2008-11-23', '482/4 East Monipur, Mirpur, Dhaka', '', 'Faruk Ahamed Monir', 0, 'Hafcha Akter Shirin', '01729161400', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(221, 4, '2019-2020', 'Tasfia Boni', 0, '001MB0505403', '79', 3, '2009-03-21', '15/A pirarbag Mirpur-2 Dhaka-1216', '', 'H.M Aslim', 0, 'Najma Akter', '01730965953', '', '2018-11-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(222, 4, '2019-2020', 'Labiba Nurain', 0, '001MB0505404', '79', 4, '2008-03-20', '61/2 Jonika Road Mirpur-1 Dhaka', '', 'Razibul Hasan', 0, 'Ferdousihi Sultana', '01718238897', '', '2018-12-01', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(223, 4, '2019-2020', 'Tanjila Tisha', 0, '001MB0505405', '79', 5, '2007-09-24', 'H F/2 NasimbG Mirpur-2 Dhaka-1216', '', 'MD. Mabin', 0, 'Ratna', '01711204502', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(224, 4, '2019-2020', 'Zerin Sanja', 0, '001MB0505406', '79', 6, '2009-08-03', '43 Boronag Mirpur, Mirpur-2', '', 'MD. Salim Reza', 0, 'Jubaida Reza', '01712221303', '', '2018-12-26', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(225, 4, '2019-2020', 'Sadia Akter', 0, '001MB0505407', '79', 7, '2008-09-08', '55/1/3 H-9 C South Prierbag Mirpur-1 Dhaka-1216', '', 'Saiful islam', 0, 'Shanaj Parvin', '01822825308', '', '2018-12-13', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(226, 4, '2019-2020', 'Zara Reza Shrestha ', 0, '001MB0505408', '79', 8, '2009-01-01', '27/6/A North Pirerbag Mirpur Dhaja-1216', '', 'A. K.M Hasan Reza', 0, 'Mahmuda Parvin Mitul', '01716620698', '', '2018-12-01', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(227, 4, '2019-2020', 'Shara Rahman', 0, '001MB0505409', '79', 9, '2009-09-03', '492/1 Monipur Mirpur-2 Dhaka-1216', '', 'MD. Mohibur Rahman', 0, 'Fatema Khatun', '01911232334', '', '2018-12-01', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(228, 4, '2019-2020', 'Tanha Islam Tura', 0, '001MB0505410', '79', 10, '2008-12-22', '47/3 Shah Alibag Mirpur-1 Dhaka-1216', '', 'Tajul Islam', 0, 'Morium Akter', '01715111750', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(229, 4, '2019-2020', 'Joyeta Afnan Prionti', 0, '001MB0505411', '79', 11, '2008-07-20', '1085/1 East Monipur Mirpur-10', '', 'MD. Zakir Hossain', 0, 'Jahanara Ranu', '01712128991', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(230, 4, '2019-2020', 'Sanjida Yesmin Orni', 0, '001MB0505412', '79', 12, '2007-10-15', '683/1 Molla Road Monipur, Mirpur-1 Dhaka-1216', '', 'Shahjahan Ali', 0, 'Shaley', '01731945252', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(231, 4, '2019-2020', 'Noshin Sharmili', 0, '001MB0505413', '79', 13, '2008-09-18', 'Monipur, Mirpur-2 763/10 Dhaka-1216', '', 'Khan Mahbub Shohel', 0, 'Khaleda Bagum', '01714686047', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(232, 4, '2019-2020', 'Fabiha Islam Raisha', 0, '001MB0505414', '79', 14, '2007-12-02', '452/2 East Sheyrapara washa road Mirpur Dhaka', '', 'Md. Rafiquel Islam', 0, 'Mrs. Farhana Rume', '01715094845', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(233, 4, '2019-2020', 'Samin Mahbub Athio', 0, '001MB0505415', '79', 15, '2007-09-09', '42/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Mahbub Hasan', 0, 'Fatima Akter', '01678062309', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(234, 4, '2019-2020', 'Tasfia Sultana', 0, '001MB0505416', '79', 16, '2009-06-22', '3/5/C North Pererbag Mirpur-2 Dhaka', '', 'Lutfor Rahman khan', 0, 'Armin Sultana', '01957794952', '', '2018-12-04', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(235, 4, '2019-2020', 'Muhai Minur Rashid', 0, '001MB0505301', '78', 1, '2008-10-22', '720 East Kazipara Mirpur-10 Dhaka-1', '', 'Hemyet Hossen', 0, 'Rehana Parvin', '01712297000', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(236, 4, '2019-2020', 'Mohammad Zafar Bin Jahir', 0, '001MB0505302', '78', 2, '2009-09-27', '311 North Monipur Mirpur-2 Dhaka', '', 'Jahirul Hoque', 0, 'Nayeema Akter', '01712123676', '', '2018-12-06', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(237, 4, '2019-2020', 'Farhan Tanvir Mahi', 0, '001MB0505303', '78', 3, '2009-04-12', '30 Popular Housing-1 Borobag Mirpur-2 Dhaka-1216', '', 'Tariqul Islam', 0, 'Khadija Akter', '01730083684', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(238, 4, '2019-2020', 'Abid Ali', 0, '001MB0505304', '78', 4, '2007-12-13', '899/1 AdssoRoad, Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Azar Ali', 0, 'Khadeza Akter', '01726595732', '', '2018-12-04', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(239, 4, '2019-2020', 'MA. Talha', 0, '001MB0505305', '78', 5, '2009-04-01', 'H# 57 Brobag Mirpur-2 Dhaka', '', 'Md. Kamal Parvase', 0, 'Tonuja Khanom', '01713148520', '', '2018-12-03', 'Unknown', NULL, 16, '2018-12-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(240, 4, '2019-2020', 'Zunayedul Islam', 0, '001DB071603', '34', 3, '2005-12-04', 'H# 1/9 Borobag Mirpur-2 Dhaka-1216', '', 'Samsul Islam', 0, 'Laila Sultana', '01798515959', '', '2018-12-09', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(241, 4, '2019-2020', 'Rishov Robidas Polock', 0, '001DB071604', '34', 4, '2006-09-26', 'H# 7/10 Brobag, Mirpur-2 Dhaka-1216', '', 'Jebon Robi Das', 0, 'Shilpe Rani Robi Dash', '01917705690', '', '2018-12-10', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(242, 4, '2019-2020', 'Azahrul Islam Siam', 0, '001DB092501', '43', 1, '2003-11-23', 'H# 125/A North Prearbag Mirpur-1 Dhaka-1216', '', 'Zahrul Islam', 0, 'Asma Begum', '01741565333', '', '2018-12-10', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(243, 4, '2019-2020', 'Sharaf Zabin Aritri', 0, '001MB082024', '38', 24, '2006-06-11', 'House No-1/9, Borobag, Mirpur-2', '', 'Abdul Hye', 0, 'Israt Jahan', '01717382184', '', '2018-12-18', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(244, 4, '2019-2020', 'Fatema Akter Maisha', 0, '001MB082025', '38', 25, '2006-10-17', '100/A Borobag Mirpur-2 Dhaka-1216', '', 'Monayem Khan', 0, 'Masuda Begum', '017740974326', '', '2018-12-19', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(245, 4, '2019-2020', 'Safat Kibriya', 0, '001DB071605', '34', 5, '2006-12-10', 'H-10, R-11 Block-H Mirpur-2', '', 'S.Kibriya', 0, 'Nina', '01716127527', '', '2018-01-19', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(246, 4, '2019-2020', 'Tahia Hoque', 0, '001MB082026', '38', 26, '2006-03-29', '461 South Monipur, Mirpur-2 Dhaka-1216', '', 'Kharul Bashar', 0, 'Monara Hoque', '01625677168', '', '2018-12-19', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(247, 4, '2019-2020', 'Maliha Akhtar', 0, '001DB071401', '32', 1, '2007-05-02', '742 West Kazipara, Monipur Mirpur Dhaka-1216', '', 'Mahumudul Hasan Shaikh', 0, 'Dilruba Akhtar', '01715199159', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(248, 4, '2019-2020', 'Anika Tasnia Karim', 0, '001MB071001', '28', 1, '2004-06-18', '1025 Katal Tala Mirpur-2 Dhaka-1216', '', 'MD. Fazlul Karim', 0, 'Farhana Jesmin', '01742255344', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(249, 4, '2019-2020', 'Oikkya Banargee', 0, '001MB082106', '39', 6, '2004-11-24', '1030 East Monipur Mirpur-2 Dhaka', '', 'Billiam Banarge', 0, 'Latifa Khatun', '01676041213', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(250, 4, '2019-2020', 'Asnin Zaaman Anha', 0, '001MB081923', '37', 23, '2006-11-14', 'H# 742/6 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Anisur Zaman', 0, 'Sabina Yesmin', '01733255685', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(251, 4, '2019-2020', 'Humayra Akhtar Mim', 0, '001DB060501', '23', 1, '2008-10-10', '620 Monipur Mirpur Dhaka-1216', '', 'Atikur Rahman', 0, 'Jubedu Akhtar Rina', '01754041055', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(252, 4, '2019-2020', 'Tasneem Amna Majid', 0, '001MB071002', '28', 2, '2007-07-30', '99/1 Ahmed nagar Mirpur-1', '', 'Rafiqul Majid', 0, 'Ferdousihi Majid', '01713030572', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(253, 4, '2019-2020', 'Yeas Ebon', 0, '001MB082107', '39', 7, '2005-05-01', '57 Brobag Mirpur-2 Dhaka-1216', '', 'Shihab Hossain', 0, 'Mouslime Atair', '01552358070', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(254, 4, '2019-2020', 'Samin Ibnea Zaman', 0, '001MB060303', '21', 3, '2008-06-23', 'H# 67/3 Shahinpukur Mirpur-2 Dhaka-1216', '', 'MD. Kamruzzaman', 0, 'Masuda Sultana', '01711603676', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(255, 4, '2019-2020', 'Sheikh Nafisa Nawar', 0, '001MB071003', '28', 3, '2008-08-01', '333/1 A/2 Akota Road Ahmad Nagor Paikpara Mirpur', '', 'Sheikh Masbah Uddin ', 0, 'Kamrun Nahar', '01711019374', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(256, 4, '2019-2020', 'Samiya Sultana Sara', 0, '001MB071004', '28', 4, '2006-05-27', '894 Middle Monipur Mirpur Dhaka-1216', '', 'MD. Shah Alam Patwary', 0, 'Aysha Akther', '01812775061', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(257, 4, '2019-2020', 'Minahazul  Islam', 0, '001MB082108', '39', 8, '2005-06-09', '52/9 Ahamad Nagar Mirpur-1 Dhaka-1216', '', 'MD. Motalab', 0, 'Halima Khatun', '01758109926', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(258, 4, '2019-2020', 'Tasnim Rahman', 0, '001MB071005', '28', 5, '2007-09-19', 'R#3 H# 35/c Samoly, Dhaka', '', 'Mizanur Rahman', 0, 'Rozina Begum', '01917701762', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(259, 4, '2019-2020', 'Shahad AL- Hasan', 0, '001MB071201', '30', 1, '2007-10-02', 'House-4 Road-8, Bososti @ Forest Housing Borobag, Mirpur-2 Dhaka-1216', '', 'Mohammad Forhad Hossain', 0, 'Saleha Akter', '01793009143', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(260, 4, '2019-2020', 'Noor Maisha', 0, '001MB082027', '38', 27, '2007-01-01', '146/5, West Monipur Mirpur Dhaka', '', 'MD. Iqbal Hossain', 0, 'Morjena Akter', '01712108607', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(261, 4, '2019-2020', 'Mushfiqur Rahman Mridul ', 0, '001DB071606', '34', 6, '2007-03-14', '100/A Borobag, Mirpur-2 Dhaka-1216', '', 'Mohammad Mintu', 0, 'Farzana Akter', '01741181184', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(262, 4, '2019-2020', 'Nabiha Tasnim ', 0, '001MB071006', '28', 6, '2007-09-28', 'Mirpur-6, Block-E, Road-2 House No-11', '', 'MD. Belayt Hossan', 0, 'Martuza Yasmin (Moni)', '01719794855', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(263, 4, '2019-2020', 'Inun Tazrin Binte Reza', 0, '001MB081924', '37', 24, '2005-06-30', '900 Middle Monipur Adorsho Road, Mirpur, Dhaka', '', 'Capt. Imranor Reza Chowdhury', 0, 'Mrs. Salma Khandaker', '01818489543', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(264, 4, '2019-2020', 'Sahed Sarar Abid', 0, '001MB060201', '20', 1, '2008-07-06', 'Kha 2/3 Popular Housing Borobag Mirpur-2 Dhaka-1216', '', 'MD. Mozibur Rahman', 0, 'Mst. Saifun Nahar Sohely', '01718268866', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(265, 4, '2019-2020', 'Tanvir Azam', 0, '001MB071202', '30', 2, '2002-05-01', '85/2, Borobug Mirpur-2 Dhaka-1216', '', 'A.H.M Shaful Azam', 0, 'Jasmin Ara Khan', '01819210451', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(266, 4, '2019-2020', 'Heidisha Mourim', 0, '001MB060101', '19', 1, '2007-05-03', '3/0/1A Ahemmed Nagor Mirpur-1', '', 'Shamsul Hoque Selim', 0, 'Shammi Nasrin', '01686090312  /  01635090191', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(267, 4, '2019-2020', 'Rafa Meherin', 0, '001MB060102', '19', 2, '2007-02-20', '14/2 Ahamad Nagor, Paikpara Mirpur-1 Dhaka-1216', '', 'Shamim Ahamid', 0, 'Roshni', '01730399080', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(268, 4, '2019-2020', 'Minor Rahaman Alvi', 0, '001MB060304', '21', 4, '2007-06-15', 'Monipur 981/2', '', 'Noor Nobi Chowdhury', 0, 'Shopna Akter', '01814469504', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(269, 4, '2019-2020', 'Sheikh Muhammad Rafiul Hasan', 0, '001DB071607', '34', 7, '2006-03-01', 'House#04 Road #5 Bosoti Housing Borobag Mirpur-2 Dhaka -1216', '', 'Engr. MD. Hasanuzzaman', 0, 'Ummay Kulsum', '01911785982', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(270, 4, '2019-2020', 'Israt Jahan Maisha', 0, '001DB071402', '32', 2, '2004-04-14', '1E 7/29, Mirpur-1, Dhaka-1216', '', 'Shalim Mollah', 0, 'Nasema Akter', '01937261866', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(271, 4, '2019-2020', 'Tahmid Bin Ali', 0, '001DB071608', '34', 8, '2007-09-10', 'Govt, Officers complez House#6 Flat# A/5 Mirpur-2 Dhaka', '', 'Dr, Mohammad Idmish Ali', 0, 'Dr, Rokeya Begum', '01712790646', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(272, 4, '2019-2020', 'Sadman Faiyaz', 0, '001DB060801', '26', 1, '2007-07-16', 'House-17, Road-4 Block-B Mirpur-6', '', 'MD. Kamrul Islam', 0, 'Sharmeen Akter', '01780484703', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(273, 4, '2019-2020', 'Adiba Ohin Chowdhwry', 0, '001DB071403', '32', 3, '2006-03-07', 'Houuse # 12 Road#15 Janata Housing Mirpur-1, Dhaka', '', 'Late. Ataur Rahman Chowdhury', 0, 'Fowzia Afroz', '01726596202', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(274, 4, '2019-2020', 'KM Imrul Hasan', 0, '001DB082301', '41', 1, '2005-10-14', '188/7 Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Late. Khaza Abdus Salam', 0, 'Rina Khanam', '01855596750', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(275, 4, '2019-2020', 'Sadia', 0, '001MB060103', '19', 3, '2007-04-20', '7793/1 Monipur, Mirpur-2 Dhaka-1216', '', 'Shahin Rahman', 0, 'Shanaj', '01713199688', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(276, 4, '2019-2020', 'Abrar Jawad', 0, '001MB082109', '39', 9, '2006-11-12', 'Flat No-V3, 150/1, ShaAli Bag, Mirpur-1', '', 'MD. Zahidul Haque Khan', 0, 'Dilruba Afroj', '01716814936', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(277, 4, '2019-2020', 'Nujhat Tabassum Anny', 0, '001MB071007', '28', 7, '2005-10-24', '894 Middle Monipur Mirpur-02', '', 'Rafiqul Islam', 0, 'Salma Akter', '01834678958', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(278, 4, '2019-2020', 'Shemaz Shazneen Rizza', 0, '001MB071008', '28', 8, '2007-05-11', '37/2-A Shah Ali Bag Mirpur-1 Dhaka-1216', '', 'MD. Shihabul Islam', 0, 'Sultana Razia Manmun', '01673466264', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(279, 4, '2019-2020', 'Iftekhaaruddin Khan', 0, '001MB060305', '21', 5, '2007-11-25', '331/1 Ahmed Nagor, Paikpara Mirpur-1 Dhaka-1216', '', 'Fakhruddin Khan', 0, 'Dilruba Pervin Khan', '01713147027', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(280, 4, '2019-2020', 'Marzan Sultana Mim', 0, '001MB083101', '80', 1, '2005-12-18', 'Monipur Mirpur-2  Dhaka-1216, House No-59', '', 'Hafez Sultan Mahmud', 0, 'Fatema Parvin', '01725336241', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(281, 4, '2019-2020', 'Asma Akther', 0, '001MB083102', '80', 2, '2006-01-05', '3/6/A1 North Prrearbag Mirpur Dhaka-1216', '', 'MD. Razzak Mizi', 0, 'Beauty Begum', '01813930728', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-05', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(282, 4, '2019-2020', 'Safwan Ibne Ali', 0, '001MB053006', '78', 6, '2009-01-22', '755, Middle Monipur, Mirpur-2 Dhaka', '', 'MD. Showkat Ali Molla', 0, 'Shahpar Binte Allam', '01712615814, 01675317852', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(283, 4, '2019-2020', 'S.M Imran Rahman', 0, '001MB053007', '78', 7, '2009-11-21', '843/1, Middle, Mirpur-2 Dhak-1216', '', 'S.M Shafikur Rahman', 0, 'Shahina Afroz', '01715734554', '', '2018-12-09', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(284, 4, '2019-2020', 'Tanjid Rahman Saad', 0, '001MB053008', '78', 8, '2009-02-09', '1045/2 East Monipur, Mirpur-2 Dhaka-1216', '', 'Mostafezur Rahman', 0, 'Nusrat Yesmin', '01684108908', '', '2018-12-15', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(285, 4, '2019-2020', 'MD. Ibrahim', 0, '001MB053009', '78', 9, '2008-06-20', 'H#694 Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Jamal Hossen', 0, 'Shilpe Akter', '017727530213', '', '2018-12-13', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(286, 4, '2019-2020', 'Sanjid Rahman Sami', 0, '001MB053010', '78', 10, '2009-02-09', '1045/2 Katal Tala East Monipur Mirpur-2 Dhaka-1216', '', 'Mostafezur Rahman', 0, 'Nusrat Yesmin', '01684108908', '', '2018-12-15', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(287, 4, '2019-2020', 'Jabid Hasan', 0, '001MB053011', '78', 11, '2008-08-27', 'flat No-6/c Shah Ali Bag Mirpur-1, Dhaka', '', 'MD. Jahangir Alam', 0, 'Zinat Mohal', '01819597111', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(288, 4, '2019-2020', 'Abdur Rahman (Farhan)', 0, '001MB053012', '78', 12, '2008-05-12', '261/262 Block # Cha Mirpur-2 Dhaka-1216', '', 'Belal Hossen', 0, 'Sajeda Yesmin', '01942789859', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(289, 4, '2019-2020', 'Tanvir Ahamed Abdullah', 0, '001MB053013', '78', 13, '2007-03-07', '648/2/A West Kazipara Mirpur Dhaka', '', 'MD. Sharif Hossen', 0, 'Fatema Akter', '01819558081', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(290, 4, '2019-2020', 'Manjor Rahman Tasdid', 0, '001MB053014', '78', 14, '2009-10-20', '24/1 Dawanbari Amin Bazar', '', 'Lutfor Rahman', 0, 'Fatema Rahman', '01714020818', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(291, 4, '2019-2020', 'Yeasin Arafat', 0, '001MB053015', '78', 15, '2009-07-17', '19/27 Staf quater Mirpur-1 Dhaka', '', 'MD. Abdul Khayer', 0, 'Tiasha Akter', '01948611561', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(292, 4, '2019-2020', 'AL- Rafsun', 0, '001MB053016', '78', 16, '2008-03-25', '50 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Al- Jubaide', 0, 'Mis Rika', '01816365336', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(293, 4, '2019-2020', 'Talha Zubayer Arik', 0, '001MB053017', '78', 17, '2008-08-03', '894 Middle Monipur, Mirpur-2', '', 'Rafiqul Islam', 0, 'Salma Akter', '01834678958', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(294, 4, '2019-2020', 'Rayan Hossen', 0, '001MB053018', '78', 18, '2009-09-08', '76/2 Ansar Camp, Mirpur -1 Dhaka-1216', '', 'MD. Repon Munshe', 0, 'Rumi Begum', '01757293286', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(295, 4, '2019-2020', 'MD. Fahim Hossain', 0, '001MB053019', '78', 19, '2009-12-18', '791/3 Middle Monipur, Mirpur, Dhaka-1216', '', 'Aslam Hossain', 0, 'Johora Akter', '01827587980', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(296, 4, '2019-2020', 'Sheke Alve Rahman', 0, '001MB053020', '78', 20, '2007-01-03', '856/3 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Abdur Rahman', 0, 'Rozi Rahman', '01737325157', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(297, 4, '2019-2020', 'Jusama Ambia Roponty', 0, '001MB0505417', '79', 17, '2009-01-11', 'H# 35 R# 3 Popular Housing Mirpur Dhaka-1216', '', 'MD. Monirul Islam', 0, 'Runia Belkis', '01926689950', '', '2018-12-09', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(298, 4, '2019-2020', 'Esha Maria Anu', 0, '001MB0505418', '79', 18, '2008-12-21', '819/2 Monipur, Mirpur-2 Dhaka-1216', '', 'Hhafiz Mollah', 0, 'Rita', '01798240545', '', '2018-12-23', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(299, 4, '2019-2020', 'Adiba Tasnim Adrita', 0, '001MB0505419', '79', 19, '2008-12-04', 'H# 1064/2 Sanpara, Mirpur-2 Dhaka-1216', '', 'MD. Jul-E- Aslam', 0, 'Hosneara', '01711713678', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(300, 4, '2019-2020', 'Sumehra Islam Oishe', 0, '001MB052904', '77', 4, '2009-07-09', 'House No-31 Road -9 Block-H, Section-2 Mirpur-2 Dhaka-1216', '', 'MD. Shafiqul Islam', 0, 'Mst. Zesmin Khatun', '01716913210', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(301, 4, '2019-2020', 'Farjana Afrin Lubna', 0, '001MB052905', '77', 5, '2009-01-08', 'H#12/5/179 Palobi Mirpur-12 Dhaka', '', 'Fazlul Hoque', 0, 'Aysha Akther', '01819483728', '', '2018-12-17', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(302, 4, '2019-2020', 'Naailah Kaniz Sharfa', 0, '001MB052906', '77', 6, '2018-09-19', 'Chittagong Villa 17/1E, Tolarbag Dhaka-1206', '', 'MD. Newaj Hossain', 0, 'Nusrat Akter', '01828142286', '', '2018-12-19', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(303, 4, '2019-2020', 'Tasnim Sultana', 0, '001MB052907', '77', 7, '2009-01-06', '1G/2/28 Mirpur-Dhaka-1216', '', 'Razaul Rahman', 0, 'Farida yesmin', '01711464708', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(304, 4, '2019-2020', 'Marzia Mymuna (Borsha)', 0, '001MB052908', '77', 8, '2009-05-19', '390 Middle Monipur', '', 'MD. Khadimul Islam', 0, 'Farhana Jannat (Papy)', '01719524221', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0);
INSERT INTO `students` (`StudentId`, `BranchId`, `Year`, `StudentName`, `BatchId`, `StudentCode`, `CourseId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `GuardianContactNumber`, `MothersName`, `Contact`, `StudentEmail`, `AdmissionDate`, `BloodGroup`, `StudentPhoto`, `EntryBy`, `EntryDate`, `Image`, `Occupation`, `SSC`, `SSCYear`, `SSCBoard`, `SSCSubject`, `SSCResult`, `HSC`, `HSCYear`, `HSCBoard`, `HSCSubject`, `HSCResult`, `Graduation`, `GraduationYear`, `GraduationBoard`, `GraduationSubject`, `GraduationResult`, `PostGraduation`, `PostGraduationYear`, `PostGraduationBoard`, `PostGraduationSubject`, `PostGraduationResult`, `Status`) VALUES
(305, 4, '2019-2020', 'Nahrin Zaman', 0, '001MB052909', '77', 9, '2008-02-04', '38 Glortag Mirpur-1 Dhaka-1216', '', 'Morshed Zaman Liton', 0, 'Jesmin', '01711785106', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(306, 4, '2019-2020', 'Nejum Rahman', 0, '001MB052910', '77', 10, '2008-01-01', '390 North Monipur Mirpur-2 Dhaka-1216', '', 'Mizanur Rahman', 0, 'Shanu Akter', '01715601041', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(307, 4, '2019-2020', 'Syeda Al Bushra (Tamme)', 0, '001MB052911', '77', 11, '2009-06-23', 'House-31 Road-1, sec-12 Block-C, Pallabi Dhaka', '', 'Syed Sotter Ahmed', 0, 'Samsun Naher', '01835026634', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(308, 4, '2019-2020', 'Warisa Islam', 0, '001MB052912', '77', 12, '2008-08-27', '607/A Monipur, Mirpur-2 Dhaka', '', 'Sk. Kamrul Islam', 0, 'Jannati Islam', '01973234292', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(309, 4, '2019-2020', 'Lubana Mehtashin Zaina', 0, '001MB052913', '77', 13, '2009-01-11', '59/D/B Darussalam Road Mirpur Dhaka', '', 'MD. Izharul islam', 0, 'Kanij Fatama', '01711955442', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(310, 4, '2019-2020', 'Tahir Jaman', 0, '001MB052914', '77', 14, '2010-01-20', '440/1 South Monipur Mirpur, Dhaka', '', 'MD. Raknuzzaman', 0, 'Mst. Shanjeda Parvin', '01819556485', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(311, 4, '2019-2020', 'Sanjida Yeasmin', 0, '001MB052915', '77', 15, '2008-11-16', 'Sector-06, Block-KA Road-04, House No-01 Mirpur, Dhaka-1216', '', 'Abdul Sattar', 0, 'Halima Khatun', '01881659416', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(312, 4, '2019-2020', 'Mohammad Khan', 0, '001DB052707', '75', 7, '2008-01-28', '761 Kingshok Monipur Mirpur-2 Dhaka-1216', '', 'Wahidur Rahman Khan', 0, 'Moriam AKter jeba', '01745885058', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(313, 4, '2019-2020', 'Talha Jobair', 0, '001DB052708', '75', 8, '2009-10-21', '184 Ahmad Nagar Parerbag Mirpur', '', 'MD. Abul Hashem', 0, 'Sabina Akter', '01817584753', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(314, 4, '2019-2020', 'MD. Shadman Islam', 0, '001DB052709', '75', 9, '2009-10-28', '247/3-A Ahmad Nagar Parerbag Mirpur', '', 'MD. Saiful Islam', 0, 'Samsun Naher Luchy', '01819202492', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(315, 4, '2019-2020', 'Nusfiqul Islam Limaon', 0, '001DB052710', '75', 10, '2008-10-20', '177/2 Ahmad Nagar Paikpara Mirpur-1 Dhaka-1216', '', 'Nazrul Islam', 0, 'Nadia Afroj', '01712593593', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(316, 4, '2019-2020', 'Rafiul Hassan', 0, '001DB052711', '75', 11, '2007-06-16', 'Gramin Bank Housing Mirpur-2 Dhaka-1216', '', 'Abu Naser', 0, 'Roksana Begum', '01711392359', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(317, 4, '2019-2020', 'Mushfiqur Rahman (Razin)', 0, '001DB052712', '75', 12, '2008-01-01', '5 A/b 1st Colony Mazar Road Mirpur Dhaka-1216', '', 'MD. Mokhlesur Rahman', 0, 'Tahmina Rahman', '01711525484', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(318, 4, '2019-2020', 'Saiful Arefin Sowad', 0, '001DB052713', '75', 13, '2009-10-02', '459 South Monipur, Mirpur-2 Dhaka-1216', '', 'MD. Zahid Alom', 0, 'Aklima Hossen', '01610744422', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(319, 4, '2019-2020', 'Ahanaf Thamid', 0, '001DB052714', '75', 14, '2008-09-07', '213/9/2 Shapla Housing Agargow Dhaka', '', 'Kawsar Talukder', 0, 'Roksana AKther', '01711595334', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(320, 4, '2019-2020', 'Mahadi Islam', 0, '001DB052715', '75', 15, '2009-02-15', '85/3 Brobag Mirpur-2 Dhaka-1216', '', 'Kamruzaman', 0, 'Halima Akter', '01843516484', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(321, 4, '2019-2020', 'Digonto Kabir Ahmed', 0, '001DB052716', '75', 16, '2010-01-06', '801/B South Monipur, Mirpur Dhaka-1216', '', 'Golam Rabani', 0, 'Jesmin Akter', '01937548008', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(322, 4, '2019-2020', 'S.M Sadman Sakif', 0, '001DB052717', '75', 17, '2009-04-22', 'Plot# D-12, Road #1/3 Block#D Pallabi Dhaka', '', 'MD. Anisur Rahman', 0, 'Mst. Shammi Akter', '01712027728', '', '2018-12-09', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(323, 4, '2019-2020', 'Sabinun NAhar Samira', 0, '001DB052804', '76', 4, '2007-10-18', 'H#125/A North prearbag Mirpur Dhaka-1216', '', 'Zahrul Islam', 0, 'Asma Begum', '01741565333', '', '2018-12-10', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(324, 4, '2019-2020', 'Rictika Robidas Puza', 0, '001DB052805', '76', 5, '2008-09-25', 'H# 7/10 Brobag Mirpur-2 Dhaka-1216', '', 'Jebon Robi Das', 0, 'Shilpe Rani Robi Dash', '01917705690', '', '2018-12-09', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(325, 4, '2019-2020', 'Nawsheen Tabassum Nuha', 0, '001DB052806', '76', 6, '2008-07-06', '270/4-A West Agargoan Dhaka-1207', '', 'MD. Nurunnabi Mondol', 0, 'Most. Masuda Khatun', '01711101455', '', '2018-12-21', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(326, 4, '2019-2020', 'Maliha Rahman Raha', 0, '001DB052807', '76', 7, '2008-12-19', '150 West Monipur, Mirpur-2 Dhaka-1216', '', 'Abdur Rahman', 0, 'Rina', '01617589413', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(327, 4, '2019-2020', 'Bhumii', 0, '001DB052808', '76', 8, '2009-02-10', '108/A, Monipur Mirpur Dhaka', '', 'DR. Bidyut', 0, 'DR. Laila', '01931354805', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(328, 4, '2019-2020', 'Tasmima  Alam Sara', 0, '001DB052809', '76', 9, '2010-12-25', '32/G, New D type offiver Quater, Taltola Dhaka', '', 'MD. Jahangir Alam', 0, 'Afroja  Najnin', '01517075151', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(329, 4, '2019-2020', 'Madeeha Mahasin', 0, '001DB052810', '76', 10, '2009-09-17', '9/13, Paikpara Govt D type Quater Mirpur-1 Dhaka', '', 'MD. Mazharul Islam', 0, 'Most. Zinara Pervin', '01718559605', '', '2019-01-04', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(330, 4, '2019-2020', 'Samia Islam Protiva', 0, '001DB052811', '76', 11, '2008-04-13', '798 Monipur Mirpur-2 Dhaka', '', 'MD. Farid Hossain Militon', 0, 'Moni Afroz', '01972013367', '', '2018-10-21', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(331, 4, '2019-2020', 'Khaliq Ahmed Sajid', 0, '001MB030301', '81', 1, '2010-08-27', '36-A Ahmad nagor sayed Atikullah Sorok ', '', 'Shafique Ahmed Khan', 0, 'Lipy Begumm', '01730791792, 01913058955', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(332, 4, '2019-2020', 'Faysal Mahmud', 0, '001MB030302', '81', 2, '2010-06-30', '695/B Middle Monipur Mirpur, Dhaka-1216', '', 'MD. Jamal Hossen', 0, 'Fatema', '01715933238', '', '2018-12-22', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(333, 4, '2019-2020', 'G.M. Farhan Shahriar (Sazim)', 0, '001MB030303', '81', 3, '2010-11-27', '529 South Monipur Mirpur Dhaka', '', 'G.M. Hafizul Islam', 0, 'Rehana Pervin', '01715513853', '', '2018-12-23', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(334, 4, '2019-2020', 'Abdur Raqeeb Khan', 0, '001MB030304', '81', 4, '2010-09-11', '822 Middle Monipur Mirpur-2 Dhaka-1216', '', 'Habibur Rahman Khan', 0, 'Kazi Jesmin', '0176250600', '', '2019-01-01', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(335, 4, '2019-2020', 'Safayet Islam Zafir', 0, '001MB030305', '81', 5, '2010-08-12', '247/3/A Ahmad Nagor Paikpara Mirpur-1 Dhaka-1216', '', 'Zahrul Islam', 0, 'Sweety Islam', '01720273644', '', '2019-01-01', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(336, 4, '2019-2020', 'Shabil Shahriar', 0, '001MB030306', '81', 6, '2010-02-27', '131/2 Jonicki Road Mirpur-1 Dhaka-1216', '', 'MD. Sayed Hossen', 0, 'Meharun Nesa', '01718082226', '', '2019-01-02', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(337, 4, '2019-2020', 'MD. Ahamadinezad Lamim', 0, '001MB030307', '81', 7, '2010-10-27', '47 Ahamed Nagor Mirpur-1', '', 'MD. Alamgir Hossain', 0, 'Mrs. Lipea Khatun', '01713093185', '', '2019-01-02', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(338, 4, '2019-2020', 'Monowarul Islam Noor', 0, '001MB030308', '81', 8, '2010-09-23', '796/1 Saptarsi Monipur, Mirpur-2', '', 'MD. Shariful Islam', 0, 'Moni Akter', '01714099307', '', '2019-01-02', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(339, 4, '2019-2020', 'Jihan', 0, '001MB030309', '81', 9, '2010-08-07', '28/1C Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Habibur Rahman', 0, 'Jarin Tasnim', '01757987313', '', '2019-01-03', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(340, 4, '2019-2020', 'DM. Samiul Islam', 0, '001MB030310', '81', 10, '2010-07-22', '', '', 'A K M Saiful Islam', 0, 'Rabia Islam', '01711314107', '', '2019-01-03', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(341, 4, '2019-2020', 'Marsheha Al- Amin', 0, '001MB030311', '81', 11, '2010-10-23', 'H# 4 R#18 B#C Mirpur-10 Dhaka-1216', '', 'Miah Mohammad Al -Amin', 0, 'Tasnim Sultana', '01822000298', '', '2019-01-03', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(342, 4, '2019-2020', 'MD. Ayman Zarif', 0, '001MB030312', '81', 12, '2010-12-07', '440/1 South Monipur, Mirpur-2 Dhaka-1216', '', 'Rokinuzzaman', 0, 'Shanaj Parvin', '01819556485', '', '2019-01-05', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(343, 4, '2019-2020', 'Ahnaf Ahmed', 0, '001MB030313', '81', 13, '2010-07-07', '165/1 Road-07 South Bishil Mirpur-1', '', 'MD. Zeaur Rahman', 0, 'Shahana Parvin', '01716093784', '', '2019-01-05', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(344, 4, '2019-2020', 'Hozaifa Balale', 0, '001MB030314', '81', 14, '2010-05-09', '1085 East Monipur Mirpur Dhaka-1216', '', 'Afsa Balale', 0, 'Maleha Tasnim', '01936133395', '', '2019-01-05', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(345, 4, '2019-2020', 'Farhana Yasir', 0, '001MB030315', '81', 15, '2010-12-01', '911 middle monipur Mirpur Dhaka', '', 'Md. Nizamuddin', 0, 'Farhana Yesmin', '01732228825', '', '2019-01-05', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(346, 4, '2019-2020', 'Tanjim Mahmud Kasfi', 0, '001MB030316', '81', 16, '2010-04-01', 'House No-312/7, Tolarbag 3 No Gate Mirpur-1', '', 'Mur-A- Alom', 0, 'Maksuda Parvin', '01917389179', '', '2019-01-02', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(347, 4, '2019-2020', 'G.M Parthib', 0, '001MB030317', '81', 17, '2011-05-22', 'H# 29 North Perirbag Mirpur Dhaka', '', 'Gazi Mohammad Abid Hosan', 0, 'Fariha Islam', '01741081699', '', '2018-12-08', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(348, 4, '2019-2020', 'MD. Arafat Islam Mahim', 0, '001MB030318', '81', 18, '2010-05-07', 'B-6, C-5, Bhandon Colony Agargaon Taltola Dhaka', '', 'MD. Harunur Rashid', 0, 'Monjunea Begum', '01760001420', '', '2018-12-08', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(349, 4, '2019-2020', 'Enan Tawsif Raim', 0, '001MB030319', '81', 19, '2011-01-18', 'H# 60 R#2 Kalshe Road Mirpur-11 Dhaka-1216', '', 'Rezual Karim', 0, 'Yesmin Flora', '01712211216', '', '2018-12-08', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(350, 4, '2019-2020', 'Niam Or- Rashid Riham', 0, '001MB030320', '81', 20, '2011-03-12', 'H# 772/1 Middle monipur Mirpur-2 Dhaka-1216', '', 'Harun or Rashid', 0, 'Rina Akter', '01990307673', '', '2018-12-08', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(351, 4, '2019-2020', 'Dihanur Rahman', 0, '001MB030321', '81', 21, '2011-01-01', 'H# 130/1/A Middle Paikpara Mirpur-1 Dhaka-1216', '', 'Sofiqur Rahman', 0, 'Dina Rahman', '01781446590', '', '2018-12-08', 'Unknown', NULL, 69, '2019-01-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(352, 6, '2019-2020', 'Md. Zulfiquar Tahmid', 0, '003MEPR10101', '63', 1, '2015-09-12', '799/1 Monipur,  Morpur - 2 Dhaka - 1216.', 'Khaonaia Rangpur', 'Md. Shakhawat Hossain', 0, 'Jannatun Ferdoushi', '01909146922', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(353, 6, '2019-2020', 'Jubayer Kabir', 0, '003MEPR10102', '63', 2, '1970-01-01', '1030/4D Pepsi Goli, Monipur Mirpur- 2 , Dhaka - 1216', 'Vill: Chandiber, Ps: Bhairab, Dst: Kishorgonj', 'Humayun Kabir', 0, 'Asma Begum', '01991091066', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(354, 6, '2019-2020', 'Musa Sadnan Mahi ', 0, '003DEPR10201', '64', 1, '2014-09-21', '928/1. Monipur Mirpur-2 Dhaka-1216', 'VILL+ Po. Dhani Shafa P.S. Mathbaria. Dist. Piroypur.', 'Md. Moniruzzman Monir', 0, 'Munni Akter', '01764521465', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(355, 6, '2019-2020', 'S.M. Arekin Ayman', 0, '003DEPR10202', '64', 2, '2015-12-10', '855, Monipur, Mirpur, Dhaka-1216', '13/B 1/4, Mirpur-13 Kafrul Dhaka ', 'S.M. Shoeb', 0, 'Afroza Sultana', '01671127028', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(356, 6, '2019-2020', 'Zarin Subah ', 0, '003DEPR10203', '64', 3, '2016-02-12', '1172 East. Monipur, Mirpur Dhaka-1216', 'Vill +Pos, Paikarhati, Ps, Santhia, Dist, Pabna.', 'Md. Nura Alam Siddiqui', 0, 'Most. Sharmin Sultana', '01712251866', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(357, 6, '2019-2020', 'Md. Jiahdul Islam', 0, '003DEPR10204', '64', 4, '2013-12-06', '982/1. Middle Monipur Mirpur Dhaka -1216', 'Bhona Bathmor Borgona ', 'Md. Jalal Uddin ', 0, 'Sufia Begum', '01916030713', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(358, 6, '2019-2020', 'Nourin Islam', 0, '003DEPR20201', '66', 1, '2014-04-24', '1268/2. Monipur, Mirpur Dhaka-1216', '1268/2. Monipur, Mirpur Dhaka-1216', 'Majedul Islam', 0, 'Most. Ratana Khatun ', '01985558922', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(359, 6, '2019-2020', 'Allnaf Islam Zarif', 0, '003DEPR20202', '66', 2, '2014-02-14', '23, West Monipur, (2 ND Floor) Mirpur Dhaka-1216', 'Village. Zineya Post. Kahathi Para Bakegona Dist. Barisal ', 'Md. Nasir Uddin', 0, 'Halima Khatun', '01715347790', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(360, 6, '2019-2020', 'Ramisha Sarish Manha', 0, '003DEPR20203', '66', 3, '2015-02-01', '........................', '......................', 'Md. Shaidul Islam', 0, 'Umma Habiba Mila', '01977431566', '', '2019-01-09', 'Unknown', NULL, 36, '2019-01-09', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(361, 6, '2019-2020', 'Safayet Arafa', 0, '003MEPR20101', '65', 1, '2013-03-20', '982/2,A Monipur, Mirpur, Dhaka-1216', '982/2,A Monipur, Mirpur, Dhaka-1216', 'Omar Faruk', 0, 'Sharmin Sultana', '01754211676', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(362, 6, '2019-2020', 'Sowab Ahir', 0, '003MEPR20102', '65', 2, '2013-03-20', '982/2 .A Monipur Mirpur Dhaka - 1216', '982/2 .A Monipur Mirpur Dhaka - 1216', 'Omar Faruk', 0, 'Sharmin Sultana', '01754211676', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(363, 6, '2019-2020', 'Sheik Oshorjo Jamal (OKOR)', 0, '003DEPR20204', '66', 4, '2013-07-23', '1117/1118, East Monipur, Mirpur-2 Dhaka -1216', 'Vill, Gopalpur, Post, Alfadanga, District, Faridpur  ', 'Sheik Jamal Hossain (Munna)', 0, 'Shamsun Nahar ', '01923793967', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(364, 6, '2019-2020', 'Samul Jiuse Gomes', 0, '003DEPR20205', '66', 5, '1970-01-01', '875 , East Monipur, Mirpur, - Dhaka - 1216', 'Doha Nawabgonj ', 'Andrew Miltion Gomes ', 0, 'Elezabeth Nisha Gomes ', '01850524707', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(365, 6, '2019-2020', 'Muntaha Fatema', 0, '003DEPR20206', '66', 6, '2012-03-18', '906, middle Monipur, Mirpur -2 Dhaka -1216', '906, middle Monipur, Mirpur -2 Dhaka -1216', 'Md, Monirul Islam', 0, 'Jamila Afroz Giny', '01723309065', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(366, 6, '2019-2020', 'Muhammad Abrar Hossain ', 0, '003DEPR30201', '68', 1, '2012-11-03', '76 Borobag Mirpur Dhaka -1216', '76 Borobag Mirpur Dhaka -1216', 'A K M Sorowor Hossain ', 0, 'Sarmin Akter ', '01631596977', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(367, 6, '2019-2020', 'Md. Al- Rafi ', 0, '003MEPR30101', '67', 1, '2019-09-16', '947, Borobagh Mirpur Dhka -1216', 'vill- Surjacki Po, Bondo Pasha , Ps, Boalmari Dist, Faridpur ', 'Md. Arshadul Hoque', 0, 'Most, Afroza Kkanom (Tuli)', '01716425592', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(368, 6, '2019-2020', 'Ahanaf Raihan Saad', 0, '003MEPR30102', '67', 2, '2102-09-05', '01726622644', '', 'Zahir Raihan Babul ', 0, 'Shamui Raihan Sheuli ', '01714446699', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(369, 6, '2019-2020', 'Aumit Hasan ', 0, '003DEPR30202', '68', 2, '2013-12-06', '52/1, Borobag Monipur, Mirpur-2 Dhaka - 1216', 'Garamahs Chondhong Bekuir ', 'Md, Abdur Rahin ', 0, 'Tanjina Akter ', '0171824381', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(370, 6, '2019-2020', 'MD. Mohiminur Rahaman Ahon ', 0, '003MBPL0101', '45', 1, '1970-01-01', '1168 East Monipur Mirpur Dhaka - 1216', '', 'Moshiur Rahaman ', 0, 'Sharmin Rahaman ', '01916284438', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(371, 6, '2019-2020', 'Samia Islam ', 0, '003DBPL0201', '46', 1, '2014-12-27', '983, Monipur Mirpur Dhaka -1216', 'Raghunatpur Ballarshar ', 'Samiul Islam ', 0, 'Sabina Islam ', '01721699816', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(372, 6, '2019-2020', 'MD. Arafat Hossain Saad ', 0, '003DBPL0202', '46', 2, '2015-01-11', '100/3. A, Monipur, Mirpur, Dhaka, -1216', '100/3. A, Monipur, Mirpur, Dhaka, -1216', 'MD. Saiful Islam ', 0, 'Shahanaj ', '01822825308', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(373, 6, '2019-2020', 'Ramisha Binty Hasan Rodushi ', 0, '003MBPL0102', '45', 2, '2015-08-20', '924, Monipur, Mirpur, -2 Dhaka - 1216', '924, Monipur, Mirpur, -2 Dhaka - 1216', 'Ashif Rajiul Hasan', 0, 'Narsies Begum ', '01715011528', '', '2019-01-12', 'Unknown', NULL, 36, '2019-01-12', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(374, 6, '2019-2020', 'Shekh Sharriar Hasan Dian ', 0, '003DBPL0203', '46', 3, '2014-12-28', '896/1. Adrsha Road Middle Monipur Mirpur-2 Dhaka -1216', 'Villg. Rahmatour, Sheroa, Sherpar, Bogor', 'MD. Shajedul Karim ', 0, 'Mist. Halima Khatun', '01550156385', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(375, 6, '2019-2020', 'MD. Mahir Labib', 0, '003DBPL0204', '46', 4, '2014-06-11', 'Hasem Villa 957, Moddho Monipur, Mirpur -2 Dhaka -1216', 'Vill, Lohalia, Po+Ps, Babugonj , Dis, Barishal', 'MD. Monirujjman ', 0, 'Jannatul Ferduws ', '01768561510', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(376, 6, '2019-2020', 'Jubayer Islam Rafi ', 0, '003DBPL0205', '46', 5, '2015-01-24', 'East Monipur, Monipur, Dhaka -1216', 'Chanmona Barisal ', 'Abdullah Al Mamun', 0, 'Ayesha Akter', '01915463147', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(377, 6, '2019-2020', 'Ayat Hossain ', 0, '003DBPL0206', '46', 6, '2013-08-27', '997,4/A, Momipur, Mirpur, Dhaka -1216', '997,4/A, Momipur, Mirpur, Dhaka -1216', 'MD. Aowlad Hossain ', 0, 'MRS. Rojia Begum ', '01647722099', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(378, 6, '2019-2020', 'Sumona Akter ', 0, '003DBPL0207', '46', 7, '2013-11-09', '408, Monipur, Mirpur, Dhaka-1216', 'Vill,  Khulna , PLS. Bagarhat, ', 'Sumon Rana ', 0, 'Nazma Begum ', '01912494474', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(379, 6, '2019-2020', 'Avrojit Saha Hrik ', 0, '003MBPL0103', '45', 3, '2015-12-07', '731, Monipur, Mirpur Dhaka-1216', 'Sirajgonj 6721', 'Sanjit Kumer Saha', 0, 'Soma Saha ', '01712694106', '', '2015-12-07', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(380, 6, '2019-2020', 'Labib Abdullah ', 0, '003MBPL0104', '45', 4, '2013-05-11', '1127/East, Monipur, Mirpur Dhaka-1216 ', '1127/East, Monipur, Mirpur Dhaka-1216 ', 'Md. Abu Sayeed ', 0, 'Shila ', '01753647080', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(381, 6, '2019-2020', 'Umaima Binte Islam (IPI)', 0, '003DBPL0208', '46', 8, '2014-11-03', '875 Flat-5/C, Middle Monipur, Mirpur, Dhka -1216', 'Vill, & PO, Swastipur PS, & Dist. Krhtia', 'MD. Ismail Hossain ', 0, 'Shamima Nurjahan', '01718100222', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(382, 6, '2019-2020', 'Durra Maknun ', 0, '003MBPL0105', '45', 5, '2014-07-22', '1052, East, Monipur, Mirpur,-2 Dhaka-1216', '1052, East, Monipur, Mirpur,-2 Dhaka-1216', 'Ismial Hossain ', 0, 'Mahbuba Akter ', '01626474041', '', '2014-07-22', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(383, 6, '2019-2020', 'M Saifan Hossain ', 0, '003DBPL0209', '46', 9, '2015-08-17', '3/A, 821 Monipur, Mirpur-2 Dhaka -1216', '3/A, 821 Monipur, Mirpur-2 Dhaka -1216', 'Md. Akram Hossain Shimul ', 0, 'Chamon Ara Afroz ', '01713093822', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(384, 6, '2019-2020', 'Sheik Mushfika ', 0, '003MBPL0106', '45', 6, '2015-04-14', 'East, Monipur, Mirpur-2 Dhaka -1216', 'East, Monipur, Mirpur-2 Dhaka -1216', 'Md. Abdur Rahaman ', 0, 'Aysha Akter ', '01951224492', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(385, 6, '2019-2020', 'Mashfia Toya', 0, '003DBNU0201', '48', 1, '2013-06-30', '664. Molla Road Monipur, Mirpur, Dhaka -1216', 'Vill, Mehendigonj P.O, Chormetua, Dist, Barisal ', 'MD. Monirujjaman ', 0, 'Sabina Yeasmin ', '01711574882', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(386, 6, '2019-2020', 'Anas Ahamed ', 0, '003DBNU0202', '48', 2, '2014-02-21', '875 East, Monipur, Mirpur, Dhaka-1216', 'Vill, Shangash, Dis, Shirag gonge ', 'MD. Mostak Ahamed ', 0, 'Saima Begum', '01717899492', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(387, 6, '2019-2020', 'Ms. Sumaya Khatun ', 0, '003DBNU0203', '48', 3, '2013-09-23', '991, Monipur, Mirpur Dhaka -1216', 'Parvabanipur, Khamarkandi PS. Sheritpur', 'Md. Ariful Islam', 0, 'Mst. Shathi Begum ', '01968858337', '', '2013-09-23', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(388, 6, '2019-2020', 'Nur Muhammad Saif ', 0, '003DBNU0204', '48', 4, '2013-06-30', 'Monipur, Mirpur Dhaka -1216', 'Monipur, Mirpur Dhaka -1216', 'Lal Chan ', 0, 'Shahinur Akter ', '01739607109', '', '2019-01-13', 'Unknown', NULL, 36, '2019-01-13', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(389, 6, '2019-2020', 'Nur-E- Esratus Zarrah', 0, '003MBNU0101', '47', 1, '2013-10-09', '641, Middle kaza Para Mirpur -121+6', '641, Middle kaza Para Mirpur -121+6', 'Mostofa Mahmud Zoha', 0, 'Kamrunnahar ', '01712669309', '', '2019-01-14', 'Unknown', NULL, 36, '2019-01-14', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(390, 6, '2019-2020', 'Tangil Ahamed ', 0, '003DBNU0205', '48', 5, '2013-09-18', '611. Borabeg Mirpur-2 Dhaka - 1216', '611. Borabeg Mirpur-2 Dhaka - 1216', 'Sakil Ahamed ', 0, 'Tahamina Sultana', '01837386656', '', '2013-09-18', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(391, 6, '2019-2020', 'Mahajibin Nawrin ', 0, '003DBNU0206', '48', 6, '2013-06-30', '1049 Kathal Tola Mirpur-2 Dhaka -1216', '1049 Kathal Tola Mirpur-2 Dhaka -1216', 'F.M. Foridul Islam', 0, 'Sharmin Sultana ', '01779554972', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(392, 6, '2019-2020', 'Mis. Nushrat Jahan ', 0, '003DBNU0207', '48', 7, '2013-09-09', 'Middle Monipur, Mirpur, -2 Dhaka-1216', 'Vill, Juuiadoho PO. Juuiadoho Dis, Kustia.', 'Md. Siddikur Rahaman ', 0, 'Mst. Kajol Rekha', '01734694070', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(393, 6, '2019-2020', 'Nahiyan Abdullah Saif', 0, '003DBNU0208', '48', 8, '2014-09-17', 'East, Monipur, Mirpur,-2 Dhaka-1216', 'Vill Soufh Shampur PO. Dairasharf ', 'Mohammad Dalower Hossan ', 0, 'Niru Sultana ', '01912416046', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(394, 6, '2019-2020', 'Nahiyan Abdullah Saif', 0, '003DBNU0209', '48', 9, '2014-09-17', 'East, Monipur, Mirpur-2 1216 Dhaka -1216\r\n', 'Vill, Soufh Shampur PO. Dairasharif', 'Mohammad Dalower Hossan ', 0, 'Niru Sultana ', '01912416046', '', '2014-09-17', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(395, 6, '2019-2020', 'Ariyan Sharker', 0, '003DBNU0210', '48', 10, '2014-06-30', '788. Middle Monipur Mirpur-2 Dhaka -1216', 'Vill, Chowdhiry Kandi PO+Ps, Muirad Nagar Comlla ', 'Md. Anowar Hossain ', 0, 'Mrs. Selina Akter', '01752107693', '', '2014-06-30', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(396, 6, '2019-2020', 'Muhammad Shaheed Bin Zahid (Shaian)', 0, '003DBNU0211', '48', 11, '2013-09-02', '1125, Monipur, Mirpur, Dhaka -1216', 'Nabin Nagar Saraj Gonj Bazar Chjadanga', 'Md. Zahid Hossain ', 0, 'Mst. Shahima Akter ', '01714163224', '', '2013-09-02', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(397, 6, '2019-2020', 'Jannatul Nayem Laisa ', 0, '003DBNU0212', '48', 12, '2014-08-29', 'Monipur Mirpur-2 Dhaka -1216', 'Monipur Mirpur-2 Dhaka -1216', 'md. Liton ', 0, 'Sharmin Sultana ', '01777815820', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(398, 6, '2019-2020', 'Rizwana Islam ', 0, '003DBNU0213', '48', 13, '2013-08-26', '971/2 East Monipur, Mirpur, - 2 Dhaka 1216', 'Vill. Kazi Road 7/3 P.O Ghatail Dist. Tangail ', 'Md Aminul Islam', 0, 'Shilpi Islam ', '01710771840', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(399, 6, '2019-2020', 'Adrita Sarkar Progga ', 0, '003DBNU0214', '48', 14, '2013-06-30', '855. Mehna Tower Monipur Mirpur-2 Dhaka -1216', '855. Mehna Tower Monipur Mirpur-2 Dhaka -1216', 'Kripamoy Sarkar ', 0, 'Shanchita Rani Biswas ', '0172697107', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(400, 6, '2019-2020', 'Sayedat Sadat Taziq', 0, '003MBNU0102', '47', 2, '2014-12-12', 'East, Monipur, Mirpur -2 Dhaka -1216', 'East, Monipur, Mirpur -2 Dhaka -1216', 'K.M. Ronot Jahan Tomal ', 0, 'Israt Jahan Sitvana ', '01711186310', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(401, 6, '2019-2020', 'Umme Habiba ', 0, '003MBNU0103', '47', 3, '2014-11-14', '1073 East Monipur Mirpur-2 Dhaka-1216', '1073 East Monipur Mirpur-2 Dhaka-1216', 'Anwar Hosan ', 0, 'Makshoda Akter ', '01635406871', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(402, 6, '2019-2020', 'Adnan Yousuf Labib ', 0, '003MBNU0104', '47', 4, '2014-05-30', '871, Monipur Mirpur, Dhaka -1216', '871, Monipur Mirpur, Dhaka -1216', 'Md. Abu Yousuf Murad ', 0, 'Fifuza Begum ', '01914907167', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(403, 6, '2019-2020', 'Adnan Yousuf Labib ', 0, '003MBNU0105', '47', 5, '2014-05-30', '871, Monipur Mirpur, Dhaka -1216', '871, Monipur Mirpur, Dhaka -1216', 'Md. Abu Yousuf Murad ', 0, 'Fifuza Begum ', '01914907167', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(404, 6, '2019-2020', 'Maliha Bushra ', 0, '003MBNU0106', '47', 6, '2014-12-16', '922, Middle Monipur , Mirpur, Dhka -1216', 'Vil. Ginia PO. Kathipara Dist. Borishal ', 'Md. Abul Bashar ', 0, 'Minuy Akter ', '01932716613', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(405, 6, '2019-2020', 'Maliha Bushra ', 0, '003MBNU0107', '47', 7, '2014-12-16', '922, Middle Monipur , Mirpur, Dhka -1216', 'Vil. Ginia PO. Kathipara Dist. Borishal ', 'Md. Abul Bashar ', 0, 'Minuy Akter ', '01932716613', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(406, 6, '2019-2020', 'Rafi Islam ', 0, '003MBNU0108', '47', 8, '2013-06-24', 'East, Monipur Mirpur Dhaka-1216', 'East, Monipur Mirpur Dhaka-1216', 'Md. Hasem ', 0, 'Happy Begum ', '01942334614', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(407, 6, '2019-2020', 'Tamzid Azad Hira ', 0, '003DBNU0215', '48', 15, '2013-08-14', '922/1 Middel Monipur, Mirpur-2, Dhaka-1216', 'Shahadadpur, Shirajgonge.', 'Lutfar Rahaman ', 0, 'Halima Khatun', '01720014474', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(408, 6, '2019-2020', 'Rayann Kibira ', 0, '003DBNU0216', '48', 16, '2014-04-02', '1035. East Monipur, Mirpur-2 Dhaka -1216', '1035. East Monipur, Mirpur-2 Dhaka -1216', 'Hossainul Kibria ', 0, 'Tahmina Akter ', '01737686722', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(409, 6, '2019-2020', 'Abid Abrar Safin ', 0, '003DBNU0217', '48', 17, '2014-10-31', '982/2-a Middle Monipur, Mirpur-2 Dhaka -1216', 'Madaur Solabaria Ataikula Pabna ', 'Dewan Shadadul Hoque Uzzal ', 0, 'Mst. Aisa Siddika ', '01710990808', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(410, 6, '2019-2020', 'Mobin Islam ', 0, '003DBNU0218', '48', 18, '2015-05-27', '997/1, Monipur Mirpur-2 , Dhaka -1216', '997/1, Monipur Mirpur-2 , Dhaka -1216', 'Saiful Islam ', 0, 'Farjana Shikder ', '01678715101', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(411, 6, '2019-2020', 'Mobin Islam ', 0, '003DBNU0219', '48', 19, '2015-05-27', '9971, Monipur, Mirpur Dhaka-1216', '9971, Monipur, Mirpur Dhaka-1216', 'Saiful Islam ', 0, 'Farjana Shikder ', '01678715101', '', '2015-05-27', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(412, 6, '2019-2020', 'Samiha Tasnim Ridita ', 0, '003DBNU0220', '48', 20, '2015-08-07', '1064/2, Senpara Mirpur 10 Dhaka', '1064/2, Senpara Mirpur 10 Dhaka', 'Md. Jul-E- Aslam ', 0, 'Mst. Hosneara ', '01711713678', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(413, 6, '2019-2020', 'Sarita Muhat ', 0, '003DBNU0221', '48', 21, '2013-12-04', '741 Middle Monipur Mirpur Dhaka -1216', '741 Middle Monipur Mirpur Dhaka -1216', 'Sheikh Abdur Rohim ', 0, 'Shirmen Ahamed ', '01933361473', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(414, 6, '2019-2020', 'Md. Muntakin Rahman ', 0, '003MBNU0109', '47', 9, '2013-12-05', '982/a Middle Monipur, Monipur, Dhaka -1216', 'Mobin Monzil C&B Road North Sagardi word No.-23 Barisal 8200 ', 'Md. Mujebur Rahaman ', 0, 'Marufa Akhter ', '01674742222', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(415, 6, '2019-2020', 'Rabiya Khatun ', 0, '003DBNU0222', '48', 22, '2013-10-09', '1063/4 East Monipur, Mirpur, Dhaka -1216', 'Vill + P/O- Dhawrah P/S- Shailkupa Dist. Jhenaidah ', 'MD. Golam Rosul ', 0, 'Sabina Khatun ', '01712355498', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(416, 6, '2019-2020', 'Said Bin Saif ', 0, '003MBNU0110', '47', 10, '2014-02-09', '741/2, Middle Monipur, Mirpur, Dhaka -12106', '741/2, Middle Monipur, Mirpur, Dhaka -12106', 'Md. Saiful Islam ', 0, 'Anir Koli ', '01850861056', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(417, 6, '2019-2020', 'Tabashum Nur Tashfih ', 0, '003DBNU0223', '48', 23, '2014-08-20', '640/6 East Monipur Mirpur, Dhaka -1216', 'Vill, Nalgorh PO. Chhrpata Ps. Doulaz Khhn Dist Bhola', 'Md.Nuruddin Hwlhder ', 0, 'Hasnat Akter ', '01913227421', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(418, 6, '2019-2020', 'Subha Sanjida Seyana ', 0, '003DBNU0224', '48', 24, '2014-11-22', '667/2 Modho Monipur Mirpur- Dhaka -1216', 'ABoVe', 'Md. Shumsud Daha ', 0, 'Salma Begum ', '01716642291', '', '2019-01-16', 'Unknown', NULL, 36, '2019-01-16', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(419, 6, '2019-2020', 'Miss, Jannatul Soya ', 0, '003DBKG0201', '50', 1, '2012-12-25', '999/ Monipur Mirpur-2 Dhaka -1216', 'B-110 Enayat Nagor LincMills Siddirgonj Nara Yangonj', 'Md. Anawer Hossain ', 0, 'Miss. Tahamina Akter Hira', '01872629482', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(420, 6, '2019-2020', 'Afia Jahin Tasnim ', 0, '003MBKG0101', '49', 1, '2013-06-30', '1041 East Monipur Mirpur Dhaka -1216', 'Sugondhi Soformdi Chadp\'ur ', 'Md. Josim Uddin ', 0, 'Frdoics Akter ', '01814216040', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(421, 6, '2019-2020', 'Tasnim Rana Nazifa ', 0, '003DBKG0202', '50', 2, '2012-06-06', '983/3. (5the Floor) Monipur, Mirpur, Dhaka -1216', 'Vill. Foaspur Po. Dopripr Ps. Nagarpur Dist. Tangail', 'Mohammad Masud Rana', 0, 'Mst.Sonia Khatun ', '01716901330', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(422, 6, '2019-2020', 'Abrar Jaheen ', 0, '003MBKG0102', '49', 2, '2012-12-29', '981, Monipur Monipur Dhaka 1216', '981, Monipur Monipur Dhaka 1216', 'Muhammad Shafidllah Shake ', 0, 'Zannatul Ferdousy ', '01716763729', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(423, 6, '2019-2020', 'Sadman Ahmad Shopnil ', 0, '003MBKG0103', '49', 3, '2013-01-25', '53/1 Borobag Mirpur Dhaka -1216', 'Vill, Balutungi PO Adina College Ps. Shibgonj Dis Chapainawabgonl ', 'Md. Touidul Islam ', 0, 'Saleha Khatun ', '01718942675', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(424, 6, '2019-2020', 'Mehajebin ', 0, '003MBKG0104', '49', 4, '2013-09-12', '875, Middle Monipur Mirpur Dhaka -1216', 'Kulia Boutia Mokshepur ', 'Mijanur Rahaman ', 0, 'Rajia Sultana ', '01818515384', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(425, 6, '2019-2020', 'Shaikh Hossain Md Al Faisal Ankon ', 0, '003MBKG0105', '49', 5, '2013-11-01', '664, East Monipur, Mirpur Dhaka -1216', '664, East Monipur, Mirpur Dhaka -1216', 'Shaikh Abul Kashrm Fardous ', 0, 'Shemima Yesmin ', '01711956191', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(426, 6, '2019-2020', 'Nilema Akter Jannat', 0, '003DBKG0203', '50', 3, '1970-01-01', '383/3 Middle Monipur Mirpur Dhaka -1216', 'Sharitpur Pst Damoka Dist Shoritpur', 'Md. Abjal Hossan ', 0, 'Ms Jahanara Bagum ', '01948356096', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(427, 6, '2019-2020', 'Wasima Akter Adiba', 0, '003DBKG0204', '50', 4, '2013-08-09', '1064 East Monipur Mirpur Dhaka -1216', 'Vill. Paratoli PO Goniar Chor Dist Comilla ', 'Warish Nadim ', 0, 'Khadija Nadim ', '01624847867', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(428, 6, '2019-2020', 'Ayesha MasroorInita ', 0, '003DBKG0205', '50', 5, '2013-12-25', '1001/1 Khatal Tala Panirpamp Mirpur -2 ', '1001/1 Khatal Tala Panirpamp Mirpur -2 ', 'Imtiaz Masroor ', 0, 'Kamrun Nasha ', '01715021592', '', '2013-12-25', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(429, 6, '2019-2020', 'Mst. Morium ', 0, '003MBKG0106', '49', 6, '2013-06-20', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Md. Nazrul Islam ', 0, 'Mst. Asma Begum ', '01710622850', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(430, 6, '2019-2020', 'Furhadun Nubi Omi', 0, '003MBKG0107', '49', 7, '2014-02-25', '1045 East Monipur Mirpur Dhaka -1216', '281/282, Mirpur-2', 'Md. Obidun Nobi ', 0, 'Nilima Ferdous Ara ', '01730405410', '', '2014-02-25', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(431, 6, '2019-2020', 'Suseda Jannat Nawsin ', 0, '003DBKG0206', '50', 6, '2013-09-12', 'Mollha Road Monipur Mirpur Dhaka -1216', 'Vill.  Khaya Pls. Dabirdir Dis Comilla ', 'Dalowar Hossain ', 0, 'Mss . Nusrat Jahan ', '01745901847', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(432, 6, '2019-2020', 'Rukaya Kadir ', 0, '003MBKG0108', '49', 8, '2013-06-30', '1074/1 East Monipur Mirpur Dhaka ', '1074/1 East Monipur Mirpur Dhaka ', 'Abdul Kadir ', 0, 'Jannatul Ferdus ', '01954499091', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(433, 6, '2019-2020', 'MD. Dalim ', 0, '003MBKG0109', '49', 9, '2012-11-17', '91 East Monipur Mirpur Dhaka -1216', 'Vill. Vinnadi PO. Kishorgong ', 'MD. jalal ', 0, 'Rina ', '01777525139', '', '2017-11-12', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(434, 6, '2019-2020', 'Rafiul Akram Arif ', 0, '003MBKG0110', '49', 10, '2012-08-02', '987, East Monipur Mirpur  Dhaka -12163', '987, East Monipur Mirpur  Dhaka -12163', 'Akrim Hossain Mia', 0, 'Souda Polina Khamom ', '01715699669', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(435, 6, '2019-2020', 'Shreysi Sarabasti Das Mitu ', 0, '003DBKG0207', '50', 7, '2013-09-29', '9 Borobag Monipur Mirpur Dhaka -1216', '9 Borobag Monipur Mirpur Dhaka -1216', 'Swapanchandra Das ', 0, 'Monisha Rani Dey', '0', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(436, 6, '2019-2020', 'Hamim H ossain Hamja ', 0, '003MBKG0111', '49', 11, '2012-09-24', '1039/1 East Monipur Mirpur Dhaka -1216', 'Madaripur ', 'Md. Sinto Hossain ', 0, 'Ikra Begum ', '01776797671', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(437, 6, '2019-2020', 'Rose Akter ', 0, '003DBKG0208', '50', 8, '2012-11-03', '1064/2 Monipur Mirpur Dhaka -1216', '1064/2 Monipur Mirpur Dhaka -1216', 'Md. Raihan Mia', 0, 'Nasima Begum ', '01771587606', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(438, 6, '2019-2020', 'Sheikh Mohammed Anaf Labib ', 0, '003DBKG0209', '50', 9, '2013-02-14', '1100, East Monipur Mirpur Dhaka -1216', '1100, East Monipur Mirpur Dhaka -1216', 'Sheikh Mohammed Arman ', 0, 'Kohinur Naznin ', '01815437103', '', '2019-01-19', 'Unknown', NULL, 36, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(439, 4, '2019-2020', 'Tasfia Islam', 0, '001MB0303301', '85', 1, '2010-10-20', '17/1. Zabbar Housing, Mazar Road, Mirpur-1, Dhaka', '17/1. Zabbar Housing, Mazar Road, Mirpur-1, Dhaka', 'Md. Nurul Islam', 0, 'Mrs. Rabeya Khatun', '01938872474', '', '2019-01-19', 'Unknown', NULL, 13, '2019-01-19', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(440, 6, '2019-2020', 'Raha Moni Akter Tonni ', 0, '003DBDBON0201', '52', 1, '2012-04-23', 'East Monipur Mirpur Dhaka -1216', 'East Monipur Mirpur Dhaka -1216', 'Md. Rabbi ', 0, 'Sonia ', '01835497781', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(441, 6, '2019-2020', 'Abida Sultana Asa ', 0, '003MBMBON0101', '51', 1, '2012-09-29', '383.C South Monipur ', 'AS . Same DIST. Pabna ', 'Md. Amjad ', 0, 'Hasina Parvin ', '01715819219', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(442, 6, '2019-2020', 'MD. Siam ', 0, '003MBMBON0102', '51', 2, '2011-01-11', '904/1 Adarsho road Miniour Mirpur Dhaka -1216', 'Vill. Gowrebardi Pol> Somargui Dist Narayangonj ', 'Md. Dalower Hossain ', 0, 'Mst. Jhomure Akter ', '01914849902', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(443, 6, '2019-2020', 'Md. Jahid Hassain ', 0, '003MBMBON0103', '51', 3, '1970-01-01', 'Middle Monipur Mirpur Dhaka -1216', 'Middle Monipur Mirpur Dhaka -1216', 'Md. Jahngir ', 0, 'Shath Akter ', '01960800211', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(444, 6, '2019-2020', 'Afaf Mahtir Nabil ', 0, '003MBMBON0104', '51', 4, '2012-06-30', '17/5 Borobagh Mirpur Dhaka -1216', 'Vill. Poranpur Faridpur ', 'Abdul Bashar ', 0, 'Meherunnesa Begum ', '01722026600', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0);
INSERT INTO `students` (`StudentId`, `BranchId`, `Year`, `StudentName`, `BatchId`, `StudentCode`, `CourseId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `GuardianContactNumber`, `MothersName`, `Contact`, `StudentEmail`, `AdmissionDate`, `BloodGroup`, `StudentPhoto`, `EntryBy`, `EntryDate`, `Image`, `Occupation`, `SSC`, `SSCYear`, `SSCBoard`, `SSCSubject`, `SSCResult`, `HSC`, `HSCYear`, `HSCBoard`, `HSCSubject`, `HSCResult`, `Graduation`, `GraduationYear`, `GraduationBoard`, `GraduationSubject`, `GraduationResult`, `PostGraduation`, `PostGraduationYear`, `PostGraduationBoard`, `PostGraduationSubject`, `PostGraduationResult`, `Status`) VALUES
(445, 6, '2019-2020', 'Nusrat Jahan Maisha ', 0, '003MBMBON0105', '51', 5, '2013-06-02', 'Kathaltala East Monipur Mirpur Dhaka -1216', 'Kathaltala East Monipur Mirpur Dhaka -1216', 'Md. Litan Akon ', 0, 'Israt Jahan Ratna ', '01786693250', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(446, 6, '2019-2020', 'Humaira ISlam Khashbo', 0, '003MBMBON0106', '51', 6, '2012-06-02', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Heal Mahmad ', 0, 'Mihty ISlam ', '01712081008', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(447, 6, '2019-2020', 'Sajedul Alam ', 0, '003MBMBON0107', '51', 7, '2012-10-10', '1072 East Monipur Mirpur Dhaka -1216', '13JF5274VuNthhwKkLrYyZW73smjSYAEen', 'Md. Badrul Alam Shipon ', 0, 'Salma Akter ', '0', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(448, 6, '2019-2020', 'Humayra Sultana Ahona ', 0, '003MBMBON0108', '51', 8, '2012-06-02', 'East Monipur Mirpur Dhaka -1216', 'East Monipur Mirpur Dhaka -1216', 'Md. Masud Rana ', 0, 'Liza Sultana ', '01749972072', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(449, 6, '2019-2020', 'Samiha Mahmud Nur ', 0, '003MBMBON0109', '51', 9, '2012-09-28', 'House- 866. Monipur Mirpur -2 Dhaka -1216', 'Vill. Saygram P.O. Barohazar Dist. Barisal ', 'Md. Ferouz Mahmud', 0, 'Shahana Mahmud ', '01712472015', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(450, 6, '2019-2020', 'Faouzia Tasnime ', 0, '003MBMBTW0101', '53', 1, '2010-08-06', '195 East Monipur Mirpur Dhaka -1216', '1265 East Monipur Mirpur Dhaka -1216', 'Md. Abu Bokkor Shiddik Ripon ', 0, 'Mss. Shonia ', '01924958344', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(451, 6, '2019-2020', 'Hafejul Islam Limon ', 0, '003MBMBTW0102', '53', 2, '2011-02-11', '1006/2 East Monipur Mirpur Dhaka -1216', 'Lalmonir Hat ', 'Md. Habib Islam ', 0, 'Dalim Begum ', '01722902003', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(452, 6, '2019-2020', 'Al- Mahi Rahman Nafi ', 0, '003MBMBTW0103', '53', 3, '2012-08-06', '194/1 Shewrpara Betola Mosjid ', 'Vill Cagunia P.O Gutia P.S Wasinpun Barisal ', 'Mohammad Saiful Islam ', 0, 'Ruma Akter ', '01764788893', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(453, 6, '2019-2020', 'Md. Nirob ', 0, '003MBMBTW0104', '53', 4, '2013-02-02', '991. East Monipur Mirpur Dhaka -1216', 'Barisil ', 'Md. Milon Hossain ', 0, 'Mis Nazma Begum ', '01948634744', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(454, 6, '2019-2020', 'Nusrat Jahan Surovi ', 0, '003MBMBTW0105', '53', 5, '2013-06-02', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Santu Mia ', 0, 'Sabina Yesmin ', '0', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(455, 6, '2019-2020', 'Md. Foisal ', 0, '003MBMBTW0106', '53', 6, '2010-01-01', '569, Monipur  Mirpur Dhaka -1216', '569, Monipur  Mirpur Dhaka -1216', 'Abul Kalam Manshi ', 0, 'Miss Rajia Sultana ', '01734349394', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(456, 6, '2019-2020', 'Tabin Hossen Diba ', 0, '003MBMBTW0107', '53', 7, '2012-01-04', '1040/2, East Monipur Mirpur Dhaka -1216', '1040/2, East Monipur Mirpur Dhaka -1216', 'Md. Monir Hossen ', 0, 'Ruma Akter ', '01991633355', '', '2012-01-04', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(457, 6, '2019-2020', 'Jannatul F02-04-2012erdous ', 0, '003MBMBTW0108', '53', 8, '2013-02-02', 'West Monipur Mirpur Dhaka -1216', 'Bikrampur ', 'Alamgir Hossain ', 0, 'Ankhi Begun ', '01932600639', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(458, 6, '2019-2020', 'Merine Jahan Elma ', 0, '003MBMBTW0109', '53', 9, '2011-06-26', '922. Middle Monipur  Mirpur Dhaka -1216', '922. Middle Monipur  Mirpur Dhaka -1216', 'Amdadul Shikder ', 0, 'Jahanara Akter ', '01751938945', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(459, 6, '2019-2020', 'Tashfin Ahmed Madhurjo ', 0, '003MBMBTW0110', '53', 10, '2009-10-02', 'Monipur Mirpur Dhaka -1216', 'Aniatpur Chile Sheragonj ', 'Md. Feroj Ahmed ', 0, 'Shamima Ahmed ', '01714495061', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(460, 6, '2019-2020', 'Umma Samiya Wantika ', 0, '003MBMBTW0111', '53', 11, '2012-05-01', '663, Middle Monipur, Mirpur Dhaka - 1216', 'Gupti Gwole Bazar Fridgonj Chodpur ', 'Md. Shakhoyat Hossan ', 0, 'Mst. Kamrannher', '01924527164', '', '2019-01-20', 'Unknown', NULL, 36, '2019-01-20', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(461, 6, '2019-2020', 'Md. Jisun Mullik ', 0, '003DBDBTH0101', '55', 1, '2011-06-25', '990. East Monipur Mirpur Dhaka -1216', 'Vill. Makahite, PO. Munshigonj ', 'Md. Ikbal Mullik ', 0, 'Jasmin Akter ', '01910761859', '', '2019-01-21', 'Unknown', NULL, 36, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(462, 4, '2019-2020', 'Sameeha zaheen', 0, '001DB033501', '85', 1, '2010-11-12', '762/10, Monipur Mirpur-2 Dhaka-1216', '', 'Mohammad Musfequs Saeheen', 0, 'Jannatul Ferdush', '01819790408', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(463, 4, '2019-2020', 'Kaniz Fatema', 0, '001DB033502', '85', 2, '2010-07-20', '1035 East Monipur, Mirpur Dhaka-1216', '', 'Hosian Kibria ', 0, 'Tahamina', '01737686722', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(464, 4, '2019-2020', 'Samia Khan', 0, '001DB033503', '85', 3, '2010-07-06', '57 Borobag, Mirpur -2 ', '', 'Kamal', 0, 'Jasmin', '01714446757', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(465, 4, '2019-2020', 'Habiba Rahman Rose', 0, '001DB033504', '85', 4, '2010-04-10', '715 Monipur, Mirpur-2 Dhaka-1216', '', 'Habibur Rahman', 0, 'Misses Rita', '01754540587', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(466, 4, '2019-2020', 'Tahnica', 0, '001DB033505', '85', 5, '2010-12-03', '841, Middle Monipur Mirpur, Dhaka-1216', '', 'MD. Murshedul Haque', 0, 'Kamrun Nahar', '01716968772', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(467, 4, '2019-2020', 'Tammana Tasnim Ohana', 0, '001DB082201', '40', 1, '2007-10-02', '29/2B Middle Paikpara , Mirpur, Dhaka-1216', '', 'Samsul Huda', 0, 'Jesmin Sultana', '01817079159', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(468, 4, '2019-2020', 'Nusrat Jahan', 0, '001DB060502', '23', 2, '2007-02-14', '338/2 North Monipur Mirpur-2, Dhaka-1216', '', 'Harunar Rashid', 0, 'Afroza Khanom', '01712588352', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(469, 4, '2019-2020', 'Iptida Ariana Peu', 0, '001DB082202', '40', 2, '2004-04-14', '1083/1, East Monipur Mirpur-2', '', 'Dr. Jahangir Alam', 0, 'Sehely Islam', '01712027371', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(470, 4, '2019-2020', 'Dipa Das', 0, '001DB060503', '23', 3, '2008-12-21', '2/3-B, Brobag', '', 'Prodip Kumar Das', 0, 'Dipti Sarker', '01715434913', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(471, 4, '2019-2020', 'Meher Afroz', 0, '001DB082203', '40', 3, '2006-07-14', '64/1A, Shah Ali Bagh Mirpur-1 Dhaka-1216', '', 'MD. Sharower Hossain', 0, 'Kaorsheda Begum', '01552469989', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(472, 4, '2019-2020', 'Minhazul Islam', 0, '001MB082110', '39', 10, '2005-06-09', '52/9 Ahmad Nagor Mirpur-1, Dhaka-1216', '', 'MD. Motalab', 0, 'Halima Khatun', '01758109926', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(473, 4, '2019-2020', 'Sadia Omy', 0, '001DB082204', '40', 4, '2005-08-04', '239/4/1 Pabna Goli, Prearbag Mirpur-1, Dhaka-1216', '', 'Mohammad Oliulla', 0, 'Ferdousi Akter', '01672592257', '', '2018-12-19', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(474, 4, '2019-2020', 'Kamrun Nahar Kona', 0, '001DB082205', '40', 5, '2006-09-08', '1022 East Monipur, Mirpur-2', '', 'MD. Abdul Karim', 0, 'Yeasmin Akter', '01712684258', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-21', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(475, 6, '2019-2020', 'Tabassum Jannat Maria ', 0, '003MBTH0101', '55', 1, '2010-05-25', '101 Shenpara Mirpur Dhaka -1216', '101 Shenpara Mirpur Dhaka -1216', 'Jihadul Islam ', 0, 'Dulal ', '01', '', '2019-01-22', 'Unknown', NULL, 36, '2019-01-22', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(476, 6, '2019-2020', 'Adnan Rafie ', 0, '003MBTH0102', '55', 2, '2010-10-22', '111, Jonota House Mirpur Dhaka -1216', 'Shirkordi Kumonkhuli ', 'Md. Abu Rasel ', 0, 'Fahmida Khanom ', '017400900178', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(477, 6, '2019-2020', 'Israk Hossain ', 0, '003MBTH0103', '55', 3, '2010-01-10', 'Monipur Mirpur Dhaka -1216', 'Monipur Mirpur Dhaka -1216', 'Anayet Hossain ', 0, 'Mou Shumi Akter ', '01792224223', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(478, 6, '2019-2020', 'Md. Amir Hamja ', 0, '003MBTH0104', '55', 4, '2010-10-02', '', '', 'Ariful Islam ', 0, 'Rehama Begum', '01814784562', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(479, 6, '2019-2020', 'Md. Rohen ISlam Nahid ', 0, '003MBTH0105', '55', 5, '2010-11-01', '40 Shenpara Mirpur Dhaka -1216', '40 Shenpara Mirpur Dhaka -1216', 'Md. Rezaul Karim ', 0, 'Mrs. Nazma Begum ', '01718653736', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(480, 6, '2019-2020', 'Mithila ', 0, '003MBTH0106', '55', 6, '2009-12-16', '1240/1, East Monipur Mirpur Dhaka -1216', '1240/1, East Monipur Mirpur Dhaka -1216', 'Md. Ali ', 0, 'Hena Begum', '01677482295', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(481, 6, '2019-2020', 'Akila Rahman ', 0, '003MBTH0107', '55', 7, '2011-11-03', 'East, monipur Mirpur Dhaka -1216 ', 'Vill. Eshangopalpur Faridpur ', 'Mohammad Ali', 0, 'Shirin Akter ', '01912150951', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(482, 6, '2019-2020', 'Md. Sabbir Rahman ', 0, '003MBTH0108', '55', 8, '2009-08-09', 'Monipur Mirpur  Dhaka -1216', 'Monipur Mirpur  Dhaka -1216', 'Ahidur Rahman ', 0, 'Rokya Begum ', '01948148003', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(483, 6, '2019-2020', 'Rudba Afrin Tajji ', 0, '003MBTH0109', '55', 9, '2011-11-19', '1119/1118, East Monipur Mirpur Dhaka -1216', '1119/1118, East Monipur Mirpur Dhaka -1216', 'Monirujjaman Manir ', 0, 'Sadia Afrin Oishi ', '01627284197', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(484, 6, '2019-2020', 'Md. Al. Amin ', 0, '003MBTH0110', '55', 10, '1970-01-01', 'Mirpur Thana Monipur Dhaka -1216', 'Borisal ', 'Md. Nazrul Islam ', 0, 'Mrs. Asma Begum ', '01710622350', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(485, 6, '2019-2020', 'Nowshin Sayera Esha ', 0, '003MBTH0111', '55', 11, '2010-10-12', '1263/3 East Monipur Mirpur Dhaka -1216', 'Khader Gaan Moflob Chadpur ', 'Munsur Ahamed ', 0, 'Kanis Fatima ', '01713623762', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(486, 6, '2019-2020', 'Tamanna Akter Mim', 0, '003MBTH0112', '55', 12, '2010-05-17', '1167, East Monipur Mirpur Dhaka -1216', 'Bikrampur', 'Abdul Majid Molla ', 0, 'Sapna Akter ', '01933361910', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(487, 6, '2019-2020', 'Yamin Hosen Tahson ', 0, '003MBTH0113', '55', 13, '2010-01-21', '1039/1 East Monipur Mirpur Dhaka -1216', 'Royon Rojor Madeirepur ', 'Md. Sentu Hosen', 0, 'Ikra Begum', '01776797671', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(488, 6, '2019-2020', 'Ahnaf Tazwar Eram', 0, '003MBTH0114', '55', 14, '1970-01-01', '948/2 Khanarmor Mirpur Dhaka -1216', 'Jagua, Jagua hat Kutahli ', 'Md. Sidul Islam ', 0, 'Mahamuda Rahan Nitu ', '01941552680', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(489, 6, '2019-2020', 'Md. Aynal Islam Aumlan ', 0, '003MBTH0115', '55', 15, '1970-01-01', '981Middle Monipur Dhaka -1216', '981Middle Monipur Dhaka -1216', 'Md. Anowar Hosan ', 0, 'Taslima Begum ', '01884914983', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(490, 6, '2019-2020', 'Mashrufa Tasnim ', 0, '003MBTH0116', '55', 16, '2010-10-20', '58/6. Shen Para Mirpur Dhaka -1216', 'Vill. Bondo Chorpara O.P. Hadira, Dist. Tangial ', 'Hafeza Md. Eiles ', 0, 'Moriom', '01741692212', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(491, 6, '2019-2020', 'Md. Shakib Hossain ', 0, '003MBTH0117', '55', 17, '1970-01-01', '994. Middle Monipur Mirpur Dhaka -1216', 'vill. Singhoira PO. Kholabari P.S. Modhupur Tangail', 'Md. Mannan ', 0, 'Shalima Begum ', '01792414993', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(492, 4, '2019-2020', 'Asma Ul Husna (Hiya)', 0, '001DB082206', '40', 6, '2005-01-01', '39/2 Dhankheter Mor, Shahalibag, Dhaka-1216', '', 'Hashem Ali', 0, 'Momotaz Khatun', '01713371403', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(493, 4, '2019-2020', 'Shabia Tasnim orchi', 0, '001DB082207', '40', 7, '2006-07-22', '1055/2 East Monipur Mirpur-2, Dhaka-1216', '', 'Abdul Owahab Khan', 0, 'Monara Begum', '01988984833', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(494, 4, '2019-2020', 'Tahmeed Hassan Sun', 0, '001DB033401', '84', 1, '2010-09-26', '982/B, Monipur Mirpur-2 Dhaka-1216', '', 'Bozulur Rahman', 0, 'Tahamena Akter', '01674308857', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(495, 4, '2019-2020', 'Sabina Jahan Mona', 0, '001MB033301', '83', 1, '2010-09-08', '100/A Borobag, Mirpur-2, Dhaka-1216', '', 'Monayem Khan', 0, 'Masuda Begum', '01740574326', '', '2018-12-19', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(496, 6, '2019-2020', 'Nusrat Jahan Nur ', 0, '003MBTH0118', '55', 18, '2012-03-26', '741, East Monipur Mirpur Dhaka -1216', 'Vill. Tapal Bari P.O, Raenda Dis- Bagerhat ', 'Kobir Hosen ', 0, 'Khadija', '019928545731', '', '2012-03-26', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(497, 6, '2019-2020', 'Aduri ', 0, '003MBTH0119', '55', 19, '1970-01-01', 'East Monipur Mirpur Dhaka -1216', 'Vill. Tapal Bari P.S. Rayenda, Bagherhat', 'Asadul Sheikh ', 0, 'Asia Begum ', '019928545731', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(498, 4, '2019-2020', 'Nazifa Sultana Tisha', 0, '001MB033302', '83', 2, '2010-09-14', '1003 Katal Tola, Monipur Mirpur-2, Dhaka', '', 'Kazi Abdul Aziz', 0, 'Let. Naiyma', '01686408227', '', '2018-12-23', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(499, 4, '2019-2020', 'Jannatul Mowa', 0, '001MB033303', '83', 3, '2010-10-28', '57 Brobag, Mirpur-2 Dhaka-1216', '', 'Shihab Hossain', 0, 'Mousumi Atair', '01552358070', '', '2018-12-24', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(500, 4, '2019-2020', 'Sharin Sara Chand', 0, '001MB033304', '83', 4, '2009-10-11', '94/3 Darussalam Mirpur, Dhaka', '', 'MD. Sayem Ahamed', 0, 'Zharna Akter', '01911384050', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(501, 4, '2019-2020', 'Sabiha Sabrin', 0, '001MB033305', '83', 5, '2010-09-28', '138/A Middle Paikpara, Mirpur-1 Dhaka-1216', '', 'Abdul Bashar', 0, 'Mis Amena', '01818619063', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(502, 6, '2019-2020', 'Najmus Sakib Hridoy ', 0, '003MBTH0120', '55', 20, '1970-01-01', '925, Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Sumon Khan ', 0, 'Mrs Koli ', '01720222328', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(503, 4, '2019-2020', 'Noshin Saiyara', 0, '001MB033306', '83', 6, '2010-10-04', '90/3, Middle Paikpara Mirpur-1, Dhaka-1216', '', 'Srajul Islam', 0, 'Arifa Akter', '01712290157', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(504, 4, '2019-2020', 'Mohima Mostafa (Mohima)', 0, '001MB033307', '83', 7, '2010-10-20', '522/2 South Monipur, Mirpur Dhaka', '', 'MD. Jamal uddin', 0, 'Hosna ara Khan', '01713927865, 01914878515', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(505, 4, '2019-2020', 'Zara', 0, '001MB033308', '83', 8, '2010-08-27', '863/2 Amtla Mosjid modda Monipur, Mirpur-2 Dhaka-1216', '', 'Sorwar Hossain', 0, 'Rozina Akter', '01738655789', '', '2019-01-06', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(506, 4, '2019-2020', 'Asfia tislam Tanni', 0, '001MB033309', '83', 9, '2011-03-11', '796, Monipur', '', 'Ajaharul islam', 0, 'Rawnak jhan', '01713581806', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(507, 4, '2019-2020', 'Tangila Akter Remi', 0, '001MB033310', '83', 10, '2010-11-15', '1/F North South Darusalam Road Mirpur-1 Dhaka', '', 'MD. Roni', 0, 'Kuhinor Begum', '01675703882', '', '2018-01-05', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(508, 6, '2019-2020', 'Farhanur Rahman Bhuiyan Omi', 0, '003MBTH0121', '55', 21, '2102-07-04', 'H-913 Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Fazulr Rahman Bhuyan ', 0, 'Onu ', '01726694948', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(509, 4, '2019-2020', 'Sadia Akter', 0, '001MB033311', '83', 11, '2010-06-21', '928/1 Middle Monipur, Mirpur-2 Dhaka-1216', '', 'Samsul Haque', 0, 'Azmire', '01922556198', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(510, 4, '2019-2020', 'Fariha Zaman Riya', 0, '001MB033312', '83', 12, '2010-11-01', '695/1A Molla Road Monipur, Mirpur-2 Dhaka-1216', '', 'Fariduzzaman', 0, 'Romana Parvin', '01916143261', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(511, 4, '2019-2020', 'Prottasha', 0, '001MB033313', '83', 13, '2010-08-30', '678/1 Molla Road Monipr, Mirpur-2 Dhaka-1216', '', 'Jalal Uddin( Emon)', 0, 'Masuda Akter', '01921699385', '', '2018-12-04', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(512, 4, '2019-2020', 'Adiba Amin Luba', 0, '001MB033314', '83', 14, '2010-03-01', '61/2, Jonaki Road, Mirpur-1', '', 'MD. Amin', 0, 'Diba Akter', '01719888660', '', '2018-11-29', 'Unknown', NULL, 15, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(513, 6, '2019-2020', 'Suborna Akter Mili', 0, '003DBFO0201', '56', 1, '2009-02-02', '951, East Monipur Mirpur Dhaka -1216', 'Vill. Didarulla Dis. Vola', 'Abdul Mannan ', 0, 'Suma Akter ', '01724486021', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(514, 6, '2019-2020', 'Choyonika Rashed Voor ', 0, '003DBFO0202', '56', 2, '2008-11-26', '1083, East Monipur Mirpur Dhaka -1216', 'Same ', 'Rashed Ahamed ', 0, 'Fahamida Rashed ', '01533403082', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(515, 6, '2019-2020', 'Avirup Chandra Pual', 0, '003DBFO0203', '56', 3, '2009-10-17', 'East Monipur mirpur Dhaka -1216\r\n\r\n\r\n', 'Same ', 'Suman Chandra Pual ', 0, 'Shanjita Rani Pual ', '01754901435', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(516, 6, '2019-2020', 'Boishakhi Podder ', 0, '003DBFO0204', '56', 4, '2009-12-24', '993. Middle Monipur Mirpur Dhaka -1216', 'Vill + P.O - Jogania P.S. Naragati Dist. Narail ', 'Bidhan Kumar Podder ', 0, 'Sadnan Podder ', '01720956041', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(517, 6, '2019-2020', 'Jannatul Ferdous ', 0, '003DBFO0205', '56', 5, '1970-01-01', '903 Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Jasim Uddin ', 0, 'Reno Begum', 'Due ', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(518, 6, '2019-2020', 'Tateba Akter Happy ', 0, '003DBFO0206', '56', 6, '1970-01-01', '722, Kazipara Mirpur Dhaka -1216', 'Same ', 'Md. Aiub Ali ', 0, 'Khadiza Akter ', '01966160198', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(519, 6, '2019-2020', 'Hasan Al Sima ', 0, '003DBFO0207', '56', 7, '2008-09-10', '1205 Monipur Mirpur Dhaka -1216', 'Vill. Bokirbit Plo. Modhopur Tangile ', 'Md. Roni Hasan ', 0, 'Champa Khanom', '01715620071', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(520, 6, '2019-2020', 'Md. Toufique Uddin ', 0, '003DBFO0208', '56', 8, '2010-09-15', 'East Monipur Mirpur Dhaka -1216', 'Kalihati Tangali ', 'Md. nasir Uddin ', 0, 'Taslim ', '01970807384', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(521, 6, '2019-2020', 'Rian Rahaman ', 0, '003DBFO0209', '56', 9, '2009-04-01', 'Alina Tawar Block I Road Flat 8 Mirpur Dhaka -1216', 'Same ', 'M. Hayder Shams ', 0, 'Afroja Akter ', '01680877299', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(522, 6, '2019-2020', 'Lalon Monosmita ', 0, '003DBFO0210', '56', 10, '2010-12-25', '157(4th Flr) 4. Janata Housing  ', 'Ghosh povea Thakurgaon 5100', 'Due ', 0, 'Jamila Bupaska ', 'Due ', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(523, 6, '2019-2020', 'Rukayia Jahan Tanisha ', 0, '003DBFO0211', '56', 11, '2010-05-16', '194/1, East Shewrapara Mirpur Dhaka -1216', 'Vill. Caguria P.O. Gutia Dis Barisal ', 'Mohammad Saiful Islam ', 0, 'Ruma Akter ', '0176788893', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(524, 6, '2019-2020', 'Joti Halder ', 0, '003DBFO0212', '56', 12, '1970-01-01', '950 East Monipur Mirpur Dhaka -1216', 'Same ', 'Jontu Lal Halder ', 0, 'Lili Bala Sadhon ', '01639456533', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(525, 6, '2019-2020', 'Md. Sajjad Kazi ', 0, '003DBFO0213', '56', 13, '1970-01-01', '55, East Monipur Mirpur Dhaka ', 'Same ', 'Md. Aslam Kazi ', 0, 'Saleha ', '01733742021', '', '1970-01-01', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(526, 6, '2019-2020', 'Maimuna Akter ', 0, '003DBFO0214', '56', 14, '2009-03-12', '863/1, Middle Monipur Mirpur Dhaka -1216', 'Kuliarchor Kishone onj ', 'Hannan Mia', 0, 'Khusbu Khanom ', '01911161802', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(527, 6, '2019-2020', 'Afrida Anjum Adrita ', 0, '003DBFO0215', '56', 15, '2009-07-25', '1006/5. East Monipur Mirpur Dhaka -1216', 'Vill. Itbaria Shenbagh Noakhali ', 'Anwar Hosan ', 0, 'Anwwara Begum ', '01748973527', '', '2009-07-25', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(528, 6, '2019-2020', '       Mehenur Akter ', 0, '003DBFO0216', '56', 16, '2010-01-01', '693/1 Monipur Mirpur Dhaka 1216', 'Vill. Protappur P.O Cadet College P.sAirport Barishal ', 'Mhamud Hasan ', 0, 'Afroja Akter ', '01715116133', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(529, 6, '2019-2020', 'Nusrat Jahan Orpi ', 0, '003DBFO0217', '56', 17, '2007-07-08', '134/3 Shen Para Mirpur Dhaka -1216', 'Same ', 'Md. Nasir Hossain ', 0, 'Gazi Asma ', '01765589657', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(530, 6, '2019-2020', 'Mashrafi Molla ', 0, '003DBFO0218', '56', 18, '2009-02-27', 'Amtola Monipur Mirpur Dhaka -1216', 'Vill, Barisal ', 'Belal Hossain ', 0, 'Monhi Begum ', '01707771751', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(531, 6, '2019-2020', 'Mrs. Munira ', 0, '003DBFO0219', '56', 19, '1970-01-01', '1127/ East Monipur Mirpur Dhaka -1216', 'Balehami Perojpur ', 'Md. Abu Sateid ', 0, 'Shaila ', '01953647080', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(532, 6, '2019-2020', 'Robeya Bosri Purnota ', 0, '003DBFO0220', '56', 20, '1970-01-01', '923/2 Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Johurul Islam ', 0, 'Tamanna Montaj', '01717176394', '', '2019-01-23', 'Unknown', NULL, 36, '2019-01-23', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(533, 6, '2019-2020', 'Khadija Khatun ', 0, '003DFI0201', '57', 1, '2008-09-29', '670/2, East Monipur Mirpur Dhaka -1216', 'Same ', 'Khorshed Alam ', 0, 'Shahanaz Begum ', '01938718153', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(534, 6, '2019-2020', 'Mim Akter Bristy', 0, '003DBFI0202', '57', 2, '1970-01-01', '855/1. East Monipur Mirpur Dhaka -1216', 'Same ', 'Alauddin Howlader ', 0, 'Resma Begum ', '01986810461', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(535, 6, '2019-2020', 'Sumaya Akter ', 0, '003DBFI0203', '57', 3, '1970-01-01', '855/1, East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Shohel ', 0, 'Asma ', '01933788424', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(536, 6, '2019-2020', 'Md. Rifat Hosan ', 0, '003DBFI0204', '57', 4, '2009-01-16', 'South Monipur Mirpur Dhaka -1216', 'Bhadenas Kouoha Borgona ', 'Md. Abdul Manan Ali', 0, 'Mrs. Raksana Begun ', '01718964489', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(537, 6, '2019-2020', 'Md. Rifat Hosan ', 0, '003DBFI0205', '57', 5, '2009-01-16', 'South Monipur Mirpur Dhaka -1216', 'Borgona ', 'Md. Abdul Manan Ali', 0, 'Mrs. Raksana Begun ', '01718964489', '', '2009-01-16', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(538, 6, '2019-2020', 'Lamia Jahan Mim', 0, '003DBFI0206', '57', 6, '2008-08-10', '54, Senpara Parbota Mirpur Dhaka -1216', 'Vill. Semgra P.O. Semgra Bagan Chandpur ', 'Md. Jewel Rana ', 0, 'Farjana Yesmin ', '01913460858', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(539, 4, '2019-2020', 'Shariar Omar', 0, '001DB033402', '84', 2, '2010-10-30', '52/1 Haq Vila East Ahmad Nagor, Mirpur-1', '', 'MD. Kamrul Islam', 0, 'Tahmina Parvin', '01797253068', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(540, 4, '2019-2020', 'Rayyan Rameen', 0, '001DB033403', '84', 3, '2010-08-29', '334, Akota Road, Ahammed Nagor, Paikpara Mirpur-1', '', 'Raquibul Hasan', 0, 'Mst. Zebunnaher', '01717853122', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(541, 6, '2019-2020', 'Mithila Mahjabeen ', 0, '003DBFI0207', '57', 7, '1970-01-01', 'Monipur. Mirpur Dhaka -1216', 'Village. Kagdi , P.O. Fulbarahat P.S. Saltha, Dist, Faridpur ', 'Md. Morad Hossain ', 0, 'Nasreen Nahar ', '01790643908', '', '1970-01-01', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(542, 4, '2019-2020', 'MD. Asimul Alam Rihan', 0, '001DB033404', '84', 4, '2010-08-03', 'House -10/3/B, Al-Modina Road East Ahammad Nagor, Mirpur-1, Dhaka-1216', '', 'MD. Zahidul ALam (Zahid)', 0, 'Shurovi Kharun', '01714200170', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(543, 6, '2019-2020', 'Nur Mohammad Sany', 0, '003DBFI0208', '57', 8, '1970-01-01', '1087, East Monipur Mirpur Dhaka -1216', 'Vill, Mojatirchor para P.O. Muktagaca ', 'Md. Anisul Haque ', 0, 'Mrs. Shahana Haque ', '01914232257', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(544, 4, '2019-2020', 'Towhidur Rahman', 0, '001DB033405', '84', 5, '2010-06-08', '59/1 West Monipur, Mirpur-2', '', 'Shohel Ahmed', 0, 'Kamrun Nahar', '01924707451', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(545, 4, '2019-2020', 'MD.Mahidi Islam', 0, '001DB033406', '84', 6, '2009-11-21', 'Sha Ali Bag, Mirpur-2, Dhaka-1216', '', 'MD. Mazidul Islam', 0, 'Kanis Fateima', '01792033567', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(546, 4, '2019-2020', 'MD. Rurayet Rashik', 0, '001DB033407', '84', 7, '2010-11-17', '2/8/E, Bardon Bari, Mirpur-1', '', 'MD. Rafiquel Islam', 0, 'Rokhsana Afrin', '01711024281', '', '2018-12-26', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(547, 4, '2019-2020', 'Icon Mandol Dipta', 0, '001DB033408', '84', 8, '2011-01-11', '2/2, Tolarbag Mirpur-1, Dhaka-1216', '', 'Bikash Chandol Mandol', 0, 'Arati Biswas', '01710953056', '', '2018-12-22', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(548, 4, '2019-2020', 'MD. Sazid', 0, '001DB033409', '84', 9, '2010-12-16', 'H# 38/C, Senpara Mirpur-2 Dhaka', '', 'Mainul Islam', 0, 'Sanjida Akter', '01711231608', '', '2018-12-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(549, 4, '2019-2020', 'Safin Abrar Hossain', 0, '001DB033410', '84', 10, '2010-05-03', 'H# 1030/1, East Monipur Mirpur-2 Dhaka-1216', '', 'Hosin ferdour Shsir', 0, 'Jarjin Akter', '01715547187', '', '2018-12-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(550, 6, '2019-2020', 'Sadia Afreen Protiva ', 0, '003DBFI0209', '57', 9, '2008-11-18', '1041 Rose Garden Mirpur Dhaka 1216', 'Village. Rajingaon P.O. Kashipur Home Komilla ', 'Md. Abu Naser Owahed ', 0, 'Kuksana Begum ', '01708985800', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(551, 4, '2019-2020', 'Arafat Bin Boniraj', 0, '001DB033411', '84', 11, '2010-12-16', 'H# 779, Alpona Monipur Mirpur-2 Dhaka', '', 'Yeasin Arafat', 0, 'Rehana Akter', '01788650456', '', '2018-12-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(552, 6, '2019-2020', 'Maimun Labib Ankan ', 0, '003DBFI0210', '57', 10, '2013-07-20', '126, West Monipur Mirpur Dhaka -1216', 'Chakpara cornt Station Netrokona', 'Md. Mominul Islam ', 0, 'Sabina Rahman ', '01712055348', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(553, 4, '2019-2020', 'Sharif Fiad Abdullah ', 0, '001DB033412', '84', 12, '2010-07-07', '230, Janata Housing Mirpur, Dhaka-1216', '', 'Sharif Golam Kawsar', 0, 'Afroza Akter', '01712280733', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(554, 6, '2019-2020', 'Md. Badol Hossen ', 0, '003DBFI0211', '57', 11, '1970-01-01', '668/1, Monipur Mirpur Dhaka -1216', 'same', 'Md. Badol Hossen ', 0, 'Nasima Begum ', '01552335893', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(555, 4, '2019-2020', 'Mantia Jahan Meeha', 0, '001DB082208', '40', 8, '2006-04-30', '29/2B Middle Paikpara Mirpur-1, Dhaka-1216', '', 'Jakir Hossen', 0, 'Nazma Akter', '01678022709', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(556, 6, '2019-2020', 'Salsabil Rohan ', 0, '003DBFI0212', '57', 12, '2008-04-18', '1086, Kathal tola East Monipur Mirpur Dhaka 1216', 'Vill. Pollakuri P.O Mohonpur Dist. Rajshahi ', 'Md. Soliman Ali ', 0, 'Mrs. Kamrunnahar ', '01729071789', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(557, 6, '2019-2020', 'Md. Adiyet Hossain ', 0, '003MBNU0111', '47', 11, '2015-01-14', 'Shake Monjil 51/1A Borobag Mirpur -2 Dhaka 1216', 'Vill. Nasirpur  P/P- Shadapur Kachua Chandpur ', 'Md. Alamgir Hossain ', 0, 'Nahid Sultana ', '01713093706', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(558, 6, '2019-2020', 'Shahidul Islam Siam ', 0, '003DBFI0213', '57', 13, '1970-01-01', 'Monipur Mirpur Dhaka 1216', 'Same ', 'Md. Selim ', 0, 'Mist. Sumi ', '01731012669', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(559, 6, '2019-2020', 'Abu Shiam Niloy ', 0, '003DBFI0214', '57', 14, '1970-01-01', '383/3, Middle Monipur Mirpur Dhaka 1216', 'Vill. Shoritpur Damokdu ', 'Md. Abjal Hosan ', 0, 'Mrs. Jahanara Begum ', '01948356096', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(560, 6, '2019-2020', 'Rufaida Karim Ipsita ', 0, '003DBFI0215', '57', 15, '1970-01-01', '366/1, North Prierbagh ', 'Dakhin Nagorpur Pabna ', 'Sajedul Karim ', 0, 'Hira ', '01775053316', '', '2019-01-24', 'Unknown', NULL, 36, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(561, 4, '2019-2020', 'Tahira Jaman', 0, '001MB052916', '77', 16, '2010-01-20', '440/1 South Monipur Mirpur, Dhaka', '', 'MD. Roknuzzaman', 0, 'Ms. Shamjeda Parvin', '01819556485', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(562, 4, '2019-2020', 'Sahjida Yeasmin', 0, '001MB052917', '77', 17, '2008-11-16', 'Sector-06,Block ka Road-04 House-01 Mirpur, Dhaka-1216', '', 'Abdul Sattar', 0, 'Halima Khatun ', '01881659416', '', '2019-01-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(563, 4, '2019-2020', 'Abid Abdullah Ragib', 0, '001DB052718', '75', 18, '2008-08-18', '261, East Kazipara Dhaka-1216', '', 'Elius Mia', 0, 'Rumana Sultana', '01711200450', '', '2019-01-12', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(564, 4, '2019-2020', 'Rafi Ahsan', 0, '001DB052719', '75', 19, '2008-06-04', 'E/17/ 3rd Colony Bosopara Mirpur Dhaka-1216', '', 'Zahid Kamal ', 0, 'Sirin AKter', '01714920005', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(565, 4, '2019-2020', 'Taokin Nahian', 0, '001DB052720', '75', 20, '2008-03-17', '172 Middle Paik para Mirpur-1 Dhaka-1216', '', 'Emon', 0, 'Shapla', '01785298242', '', '2019-01-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(566, 4, '2019-2020', 'Farhan Karim ', 0, '001DB052721', '75', 21, '2008-07-25', '1026/1, Monipur Mirpur-2 Dhaka -1216', '', 'MD. Rezaul Karim ', 0, 'Konika Laila ', '01914702746', '', '2019-01-07', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(567, 4, '2019-2020', 'Nabil Molla', 0, '001DB052722', '75', 22, '2008-02-23', '229 Monipur Mirpur Dhaka', '', 'MD. Mosharaf Hossain Molla', 0, 'Najnin Akter Nisa', '01711314000', '', '2019-01-12', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(568, 4, '2019-2020', 'Rafiul Hasan', 0, '001DB052723', '75', 23, '2007-06-16', 'Gramin Bank Housing Mirpur-2 Dhaka-1216', '', 'Abu Naser', 0, 'Roksana Begum ', '01711392359', '', '2019-01-01', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(569, 4, '2019-2020', 'Mahadi Islam ', 0, '001DB052724', '75', 24, '2009-02-15', '85/3 Brobag Mirpur-2 Dhaka-1216', '', 'Kamruzaman ', 0, 'Halima Akter', '01843516484', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(570, 4, '2019-2020', 'K.M Nuruzaman Nabil ', 0, '001DB052725', '75', 25, '2009-10-05', '18/3 Brobag Mirpur-2 Dhaka-1216', '', 'K.M Abul Kalam Azad', 0, 'Nahar Khatun ', '01711136902', '', '2018-12-04', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(571, 4, '2019-2020', 'Fardina Hossion (Jinia)', 0, '001DB052812', '76', 12, '2008-11-13', '137/12 C-19 Prioungon Abashik Alaka Mirpur-1 Dhaka-1216', '', 'MD. Fareq Hossain ', 0, 'Beauty Khanam', '01717346502', '', '2019-01-12', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(572, 4, '2019-2020', 'Tasfia Rahman Shouda', 0, '001DB052813', '76', 13, '2008-11-17', '1E/7/29 Mirpur-1 Dhaka-1216', '', 'Shalim Mullah', 0, 'Nasima Akter', '01937261866', '', '2019-01-09', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(573, 4, '2019-2020', 'Amirah Binte Fayzur', 0, '001DB052814', '76', 14, '2009-05-29', '121 East Kazipara Bazar, Kafrul Mirpur Dhaka', '', 'S.M Fayzur Rahman', 0, 'Shelina Fatema Binte Shahid', '01552381962', '', '2019-01-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(574, 4, '2019-2020', 'Sabikun Nahar Samira ', 0, '001DB052815', '76', 15, '2007-10-18', 'H# 125/A North Prearbag Mirpur-1 Dhaka-1216', '', 'Zahrul Islam ', 0, 'Asma Begum ', '01741565333', '', '2018-12-10', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(575, 4, '2019-2020', 'Farah Anjum ', 0, '001DB052816', '76', 16, '2009-11-04', '173/5, West Agargoan Shapal Housing Dhaka-1207', '', 'DR. MD. Mizanur Rahman ', 0, 'DR. Ferdousi Begum ', '01711131492', '', '2018-12-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(576, 4, '2019-2020', 'Mahabub Alam ', 0, '001MB053021', '78', 21, '2009-02-23', '894 Middle Monipur Mirpur-2', '', 'Nurul Alam ', 0, 'Aysha Begum ', '01681049205', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(577, 4, '2019-2020', 'Tanmon Hossain Mishal ', 0, '001MB053022', '78', 22, '2008-12-25', 'R#7 H# 127 Block-E Mirpur-11', '', 'Akter Hossain ', 0, 'Taslima Akter', '01741653087', '', '2019-01-10', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(578, 4, '2019-2020', 'Noman Uddin Sarker Maruf', 0, '001MB053023', '78', 23, '2008-09-08', '80/2 East Ahmad Nagor Mirpur-1', '', 'MD. Moslem Uddin Sarker', 0, 'Nasima Akter', '01552342843', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(579, 4, '2019-2020', 'Mirajul Haque', 0, '001DB053001', '78', 1, '2009-10-30', '1/10 Borobag Mirpur-2 Dhaka-1216', '', 'Mojammal Haque', 0, 'Lipi Haque', '01822954111', '', '2019-01-07', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(580, 4, '2019-2020', 'Labiba Mehzad Rahman', 0, '001MB053620', '79', 20, '2008-02-17', '741/1 Monipur Mirpur-2 Dhaka', '', 'MD. Mizanur Rahman ', 0, 'Sultana Lucky Meghla', '01848238827', '', '2019-01-08', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(581, 4, '2019-2020', 'Kanij Fatema Afrin', 0, '001MB053621', '79', 21, '2008-03-25', '22/1 East Ahmadnagor Mirpur-1 Dhaka -1216', '', 'Ariful Islam ', 0, 'Anjuman Ara Tania ', '01718163085', '', '2019-01-07', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(582, 4, '2019-2020', 'Shara Rahman ', 0, '001MB053622', '79', 22, '2009-09-03', '492/1 Monipur Mirpur-2 Dhaka-1216', '', 'MD. Mohibur Rahman ', 0, 'Fatema Khatun', '01911232334', '', '2018-12-01', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(583, 4, '2019-2020', 'Samia Mahbub Athio', 0, '001MB053623', '79', 23, '2007-09-09', '42/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Mahabub Hasan', 0, 'Fatima Akter', '01678062309', '', '2018-12-03', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(584, 4, '2019-2020', 'KH. Ahnag Tanjid', 0, '001MB013801', '87', 1, '2012-11-15', '535 Monipur Mirpur , Dhaka', '', 'KH. Mahfug Munzur (Monzur)', 0, 'Mrs. Khinoor Akter', '01711476068', '', '2019-01-13', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(585, 4, '2019-2020', 'Torikul Islam Tulaib', 0, '001MB013802', '87', 2, '2013-02-28', '184 Ahmed Nagor Paikpara', '', 'MD. Abul Hashem', 0, 'Sabina Akter', '01817584753', '', '2019-01-12', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(586, 4, '2019-2020', 'Rahatul Al- Karim ', 0, '001MB013803', '87', 3, '2012-11-27', '67/1 Brobag Mirpur-2 Dhaka-1216', '', 'MD. Raziul Karim', 0, 'Ifty Miranan Sunthi', '01717250068', '', '2019-01-09', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(587, 4, '2019-2020', 'Rahib Haque Sikder', 0, '001MB013804', '87', 4, '2012-11-10', '284/1 South Monipur Mirpur, Dhaka', '', 'Rafiqul Haque Shikder', 0, 'Tahmina Akter', '01778917571', '', '2019-01-05', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(588, 4, '2019-2020', 'Naiyer Nubaid ', 0, '001MB013805', '87', 5, '2012-10-12', '978 East Monipur Mirpur', '', 'MD. Yiamin Ali', 0, 'Nahida Nasir', '01742969041', '', '2019-01-02', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(589, 4, '2019-2020', 'Nihal Shikder', 0, '001MB013806', '87', 6, '2013-01-01', '31/1/A North Pirrerbagh Mirpur, Dhaka', '', 'MD. Nazrul Islam Shikder', 0, 'Sharmin Zerin', '01716283386', '', '2018-11-26', 'Unknown', NULL, 15, '2019-01-24', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(590, 6, '2019-2020', 'Manha Hossain ', 0, '003DBFI0216', '57', 16, '2009-09-18', '1045/2. East Monipur Mirpur Dhaka -1216', '370/A. Purbo Nasrabad Politechynec', 'Md. Shahadat Hossain ', 0, 'Khaleda Akter ', '01711022012', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0);
INSERT INTO `students` (`StudentId`, `BranchId`, `Year`, `StudentName`, `BatchId`, `StudentCode`, `CourseId`, `RollNo`, `DateOfBirth`, `PresentAddress`, `PermanentAddress`, `FathersName`, `GuardianContactNumber`, `MothersName`, `Contact`, `StudentEmail`, `AdmissionDate`, `BloodGroup`, `StudentPhoto`, `EntryBy`, `EntryDate`, `Image`, `Occupation`, `SSC`, `SSCYear`, `SSCBoard`, `SSCSubject`, `SSCResult`, `HSC`, `HSCYear`, `HSCBoard`, `HSCSubject`, `HSCResult`, `Graduation`, `GraduationYear`, `GraduationBoard`, `GraduationSubject`, `GraduationResult`, `PostGraduation`, `PostGraduationYear`, `PostGraduationBoard`, `PostGraduationSubject`, `PostGraduationResult`, `Status`) VALUES
(591, 6, '2019-2020', 'Rubaiya Hossen Dihan ', 0, '003DBFI0217', '57', 17, '2008-11-03', '1040/2, East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Monir Hossen ', 0, 'Ruma Akter ', '01991633355', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(592, 6, '2019-2020', 'Jahidur Rahaman Zisan ', 0, '003DBFI0218', '57', 18, '2009-07-26', '1200, East Monipur Mirpur Dhaka -1216', 'Vill. Baptra Chars Bhola ', 'Md. Mijanur Rahaman ', 0, 'Zharna Rahman ', '01764519860', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(593, 6, '2019-2020', 'Syed Amir Hamza ', 0, '003DBFI0219', '57', 19, '2010-01-01', '1030/1. Kathal Tala 7up Goli Mirpur Dhaka -1216', 'Vill, Thanmgabari P.O. Shadarpur Dist. Faridpur ', 'Syed Siddiqur Rahaman ', 0, 'Sayed Asma Jahan ', '01717039065', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(594, 6, '2019-2020', 'Muballik Islam ', 0, '003DBFI0220', '57', 20, '2008-12-10', '947/1. Middle Monipur Mirpur Dhaka -1216', '98. Giltuli Foridpur ', 'Hamidul Islam ', 0, 'Hosaine Gulshan ', '01679178961', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(595, 6, '2019-2020', 'Md. Srabon ', 0, '003DBFI0221', '57', 21, '2008-01-02', '983, Monipur Mirpuir Dhaka -1216', 'Same ', 'Md. Shajahan ', 0, 'Mrs. Kalpona Begum ', '01726020249', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(596, 6, '2019-2020', 'Fahad Mohammad ', 0, '003DBFI0222', '57', 22, '1970-01-01', '414/1. Shahin Bag Tagga ', 'Same ', 'Md. Ashraf Ali ', 0, 'Forida Yesmin ', '01715024460', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(597, 6, '2019-2020', 'Mrs. Muslima ', 0, '003DBFI0223', '57', 23, '1970-01-01', '1127, East Monipur Mirpur Dhaka -1216', 'Balihami ', 'Md.Abu Sayed ', 0, 'Shaila ', '01953647080', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(598, 6, '2019-2020', 'Asdia Akter Sreya ', 0, '003DBFI0224', '57', 24, '2007-08-10', 'East Monipur Mirpur Dhaka -1216', 'Same', 'Late Md. Sadik Hossain ', 0, 'Rakiba Akter ', '01929030882', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(599, 6, '2019-2020', 'Sunjida Akter ', 0, '003DBSI0201', '58', 1, '2006-02-22', '925, Middle Monipur Mirpur Dhaka 1216', 'Same ', 'Md. Shah Alom ', 0, 'Shirin Begum ', '01882404398', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(600, 6, '2019-2020', 'Nazmun Nahar Mun ', 0, '003DBSI0202', '58', 2, '2008-02-17', '1108/A. East Monipur Mirpur Dhaka -1216', 'Vill. 16. Dag. Monshiopara Thana Varamara Dis Kustia ', 'Mizanur Rahman ', 0, 'Rokea Khatun ', '01733848806', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(601, 6, '2019-2020', 'Alvina Akter ', 0, '003DBSI0203', '58', 3, '2008-04-30', '1268/ East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Titu ', 0, 'Mrs. Shaina ', '01718304106', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(602, 6, '2019-2020', 'Md. Mahinur Rahman Aunik ', 0, '003DBSI0204', '58', 4, '1970-01-01', '969/1. East Monipur Mirpur Dhaka -1216', 'Samne ', 'Md. Mahfujur Rahman ', 0, 'Mita Bishwas ', '01718957392', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(603, 6, '2019-2020', 'Aarman Sakib ', 0, '003DBSI0205', '58', 5, '1970-01-01', '965/2, Middle Monipur Mirpur Dhaka -1216', 'Same', 'Md. Shakhawat Ali ', 0, 'Mrs. Anisa Akter ', '01816601412', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(604, 6, '2019-2020', 'Ria Akter Tisha ', 0, '003DBSI0206', '58', 6, '1970-01-01', '903. Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Jasim Uddin ', 0, 'Reno Begum ', 'Due ', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(605, 6, '2019-2020', 'MD. Sourab ', 0, '003DBSI0207', '58', 7, '1970-01-01', 'Middle Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Hafujur Sheikh ', 0, 'Mrs. Shuki ', '01929109053', '', '2019-01-26', 'Unknown', NULL, 36, '2019-01-26', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(606, 6, '2019-2020', 'Eshita ', 0, '003DBSI0208', '58', 8, '1970-01-01', 'East Monipur Mirpur Dhaka -1216', 'Dist: Madaripur ', 'Shorab Hossen Shajada ', 0, 'Maya Begum', '01718811568', '', '2019-01-27', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(607, 6, '2019-2020', 'Maliha ', 0, '003DBSI0209', '58', 9, '1970-01-01', '1256, East Monipur Mirpur Dhaka 1216', 'Vill. Khuner Chor, Dos. Madaripur ', 'Md. Alomgir Hosen', 0, 'Salma Akter ', '01726880856', '', '2019-01-27', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(608, 6, '2019-2020', 'T.M Rafsamddowla Raki', 0, '003DBSI0210', '58', 10, '1970-01-01', 'Kozipara Busstand Mirpur ', 'Vill, Kazipara Bogura ', 'T.M. Asafuddowla Rana ', 0, 'Roji Begum ', '01755533431', '', '2019-01-27', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(609, 6, '2019-2020', 'Mushfiqur Rahman ', 0, '003DBSI0211', '58', 11, '1970-01-01', 'Mollapara East Minpur Mirpur Dhaka -1216', 'Vill. Noyapra Kishoregonj', 'Musiur Rahman ', 0, 'Aleya Begum', '01734861879', '', '2019-01-27', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(610, 6, '2019-2020', 'Mushfiqur Rahman ', 0, '003DBSI0212', '58', 12, '1970-01-01', 'Mollapara West Moniupu Mirpur Dhaka -1216', 'Vill. Noyapara ishoregonj', 'Musiur Rahman ', 0, 'Aleya Begum', '01734861879', '', '1970-01-01', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(611, 6, '2019-2020', 'Md. Shahadat Hossain ', 0, '003DBSI0213', '58', 13, '1970-01-01', '991, Adarsha Road Monipur Mirpur Dhaka -1216', 'Guropuddi Sonargaon Narayangonj ', 'Md. Abul Kalam ', 0, 'Sajeda Begum ', '01936557213', '', '2019-01-27', 'Unknown', NULL, 36, '2019-01-27', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(612, 6, '2019-2020', 'Md. Shahadat Hossain ', 0, '003DBSI0214', '58', 14, '1970-01-01', '991. Adarsho Road Monipur Mirpur  Dhaka -1216', 'Guropuddi Sonargaon Narayangonj', 'Md. Abul Kalam ', 0, 'Sajeda Begum ', '01936557213', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(613, 6, '2019-2020', 'Asiful Islam Aunonto ', 0, '003DBSI0215', '58', 15, '2010-01-03', '981. Middle Monpur Mirpur Dhaka -1216', 'Same ', 'Md. Anar Mia ', 0, 'Taslima Begum', '01884914983', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(614, 6, '2019-2020', 'Mumthama Sondhi ', 0, '003MBSI0201', '58', 1, '2008-07-14', '100 East Monipur Mirpur Dhaka -1216', 'same', 'Shek Shokot ', 0, 'Nasima Akter Mitu ', '01711577726', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(615, 6, '2019-2020', 'Sumi Akter ', 0, '003DBSI0216', '58', 16, '2005-01-09', '856/1. Amtola Monipur Mirpur Dhaka ', 'Ghatail Tangail ', 'Jinnah Akand ', 0, 'Samsunnahar Begum ', '01746323134', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(616, 6, '2019-2020', 'Sanjala ', 0, '003DBSI0217', '58', 17, '2007-11-14', '856/1.Amtola. Monipur Mirpur Dhaka -121', 'Ghatail Tangail ', 'Jinnah Akand ', 0, 'Samsunnahar Begum', '01746323134', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(617, 6, '2019-2020', 'Shanta Khatun ', 0, '003DBSI0218', '58', 18, '2007-10-18', '983, Middle Monipur Mirpur Dhaka -1216', 'Shimla Kandi Shahi Ana Tangaile', 'Md. Shamim ', 0, 'Morjina Begum ', '01726020249', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(618, 6, '2019-2020', 'Biplob Hossen ', 0, '003DBSI0219', '58', 19, '1970-01-01', 'East Monipur Mirpur Dhaka -1216', 'Foridpur ', 'Mizanur Hossen ', 0, 'Bilkis Begum', '01719988563', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(619, 6, '2019-2020', 'Samoas Mostofa ', 0, '003DBSI0220', '58', 20, '2008-12-08', 'House No. 1081. East Monipur Mirpur Dhaka -1216', 'Same ', 'Md. Ismail Hossen ', 0, 'Saleha Akter ', '01924461125', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(620, 6, '2019-2020', 'Md. Abu Sayeed Polas', 0, '003DBSI0221', '58', 21, '2010-02-01', '992/1. East Monipur Mirpur Dhaka -1216', 'Same', 'Md. Shahjahen ', 0, 'Sobura ', '01953694702', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(621, 6, '2019-2020', 'Md. Murad Hossan ', 0, '003DBSI0222', '58', 22, '1970-01-01', '971, Monipur Mirpur Dhaka -1216', 'Gupalpur . Pirojpur ', 'Md. Abul Bashar ', 0, 'Nasrin ', '01700881476', '', '2019-01-28', 'Unknown', NULL, 36, '2019-01-28', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(622, 4, '2019-2020', 'sabrina', 0, '001MB013807', '87', 7, '2006-03-10', '', '', 'sha alam', 0, 'husne ara', '01654879952', '', '2019-03-07', 'A+', NULL, 13, '2019-03-07', NULL, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, 0),
(623, 4, '2019-2020', 'ddfdf', 3, '001301', NULL, 1, '2001-04-14', 'fff', 'fff', 'dsdsd', 2147483647, 'sdsdsd', '09878765656', 'sdf@g.com', '2019-04-14', 'A-', NULL, 13, '2019-04-14', NULL, 'Student', '', '2006', 'dfsdfsdfsf', 'sfsf', 3, '', '2008', 'dsfsdf', 'sfsf', 3, '', '2013', 'sdfsf', 'sfsf', 5, '', '', '', '', 0, 0),
(624, 4, '2019-2020', 'sham', 3, '001301', NULL, 1, '2001-04-14', 'fff', 'fff', 'dsdsd', 2147483647, 'sdsdsd', '09878765656', 'sdf@g.com', '2019-04-14', 'A-', NULL, 13, '2019-04-14', NULL, 'Student', '', '2006', 'dfsdfsdfsf', 'sfsf', 3, '', '2008', 'dsfsdf', 'sfsf', 3, '', '2013', 'sdfsf', 'sfsf', 5, '', '', '', '', 0, 0),
(625, 4, '2019-2020', 'karim', 2, '001201', '44', 1, '2019-04-04', 'sdfsfd', 'sdfsfd', 'eeeeeeeeeeeee', 2147483647, 'wwwwwwwwwwww', '09872654567', 'dd@g.com', '2019-04-14', 'O+', NULL, 13, '2019-04-14', '182515cb2d4f1e8ac7.jpg', 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '2014', 'hhhh', 'uuuu', 3.34, '', '', '', '', 0, 1),
(626, 4, '2019-2020', 'sdsdsd', 4, '445401', '45', 1, '2008-12-09', 'dfdfdf', 'dfdfdf', 'sdsdd', 2147483647, 'dsdsds', '09876765454', 'sham@gmail.com', '2019-04-16', 'A-', NULL, NULL, '2019-04-16', NULL, 'Service', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '2014', 'hhhh', 'uuuu', 3.34, '', '2016', 'gggggggggg', 'kkkkkkkkkkkkk', 3, 1),
(627, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 1, 0),
(628, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(629, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(630, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(631, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(632, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(633, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0),
(634, 4, '2019-2020', 'sddsfsdfsdf', 4, '445402', '45', 2, '2008-12-09', 'sdfsdf', 'sdfsdfsdf', 'dsdfsf', 2147483647, 'sdfsfsf', '09876765454', 'sham@gmail.com', '2019-04-16', 'O-', NULL, NULL, '2019-04-16', NULL, 'Student', '', '2006', 'hhhhhh', 'hhhhhhhhhhhhhh', 5, '', '2008', 'tttttttttt', 'hhhhhhhhh', 4.8, '', '', '', '', 0, '', '', '', '', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`AttendanceId`, `BranchId`, `CourseId`, `Date`, `Year`, `StudentId`, `AttendanceType`, `GroupId`) VALUES
(45, 4, 39, '2019-01-03', NULL, 202, 'P', 1),
(46, 4, 39, '2019-01-03', NULL, 203, 'A', 1),
(47, 4, 39, '2019-01-03', NULL, 204, 'P', 1),
(48, 4, 39, '2019-01-03', NULL, 205, 'P', 1),
(49, 4, 39, '2019-01-03', NULL, 206, 'A', 1),
(50, 4, 39, '2019-01-03', NULL, 207, 'P', 1),
(51, 4, 14, '2019-02-27', NULL, 266, 'P', 2),
(52, 4, 14, '2019-02-27', NULL, 267, 'P', 2),
(53, 4, 14, '2019-02-27', NULL, 275, 'P', 2),
(54, 4, 15, '2019-03-08', NULL, 248, 'P', 3),
(55, 4, 15, '2019-03-08', NULL, 252, 'P', 3),
(56, 4, 15, '2019-03-08', NULL, 255, 'P', 3),
(57, 4, 15, '2019-03-08', NULL, 256, 'P', 3),
(58, 4, 15, '2019-03-08', NULL, 258, 'P', 3),
(59, 4, 15, '2019-03-08', NULL, 262, 'A', 3),
(60, 4, 15, '2019-03-08', NULL, 277, 'P', 3),
(61, 4, 15, '2019-03-08', NULL, 278, 'P', 3),
(64, 4, 44, '2019-04-16', NULL, 625, 'P', 4),
(65, 4, 21, '2019-04-16', NULL, 154, 'P', 5),
(68, 4, 45, '2019-04-22', NULL, 626, 'P', 7),
(69, 4, 45, '2019-04-22', NULL, 627, 'P', 8),
(72, 4, 44, '2019-04-22', NULL, 625, 'P', 6),
(73, 4, 21, '2019-04-22', NULL, 154, 'P', 7);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_wise_marks`
--

INSERT INTO `subject_wise_marks` (`SubMarkId`, `BranchId`, `ClassId`, `SubjectId`, `TotalMark`, `PassMark`, `SubMark`, `ObjMark`, `PraMark`) VALUES
(1, 4, 14, 20, 100, 30, 75, 25, 0);

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
  `IsAdmin` int(11) NOT NULL,
  `is_parents` tinyint(1) DEFAULT '0',
  `is_employee` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `BranchId`, `EmployeeId`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `IsAdmin`, `is_parents`, `is_employee`) VALUES
(1, 1, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Admin', '2016-04-01', 1, 'admin', 0, 0, 0),
(11, 4, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'sham', '2018-12-05', 1, 'sham', 0, 0, 0),
(13, 4, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Admin_user', '2018-12-07', 1, 'admin_user', 0, 0, 0),
(15, 4, NULL, '0c5fc6b53ddb0a5f6dce134a47e03541', 15, 'Pantho Mahmud', '2018-12-08', 1, 'pantho550', 0, 0, 0),
(16, 4, NULL, '9c8bb1578fd1b111429c35c0a84d5095', 15, 'Said Samir', '2018-12-08', 1, 'said9643', 0, 0, 0),
(17, 4, NULL, '520bca0dcae2ed9a27b0228de4c99922', 16, 'Hossen Ahmed Raton', '2018-12-09', 1, '01713257941', 0, 1, 0),
(18, 4, NULL, 'b6a7cf93eeab9c9f218c32f303572951', 16, 'Md. Salauddin Mintu', '2018-12-09', 1, '01817538430', 0, 1, 0),
(19, 4, NULL, '6619d580827cdb57ad449d9ca2bc6ad0', 16, 'Galib Yeashir', '2018-12-10', 1, '01814658328', 0, 1, 0),
(20, 4, NULL, '55e6efee0b3a4a893f5b910d19c2a86d', 16, 'Md. Habibur Rahman', '2018-12-10', 1, '01816600080', 0, 1, 0),
(21, 4, NULL, 'ab015313ff1106881048e36242836bf6', 16, 'Md. Sayedur Rahman', '2018-12-10', 1, '01727217928', 0, 1, 0),
(22, 4, NULL, 'f88492343faecda8d4cf82ca499e96d1', 16, 'Md. Nizamuddin', '2018-12-10', 1, '01976210415', 0, 1, 0),
(23, 4, NULL, '1e28896c3cf85d950280450be0953737', 16, 'Md. Abdul Maivivan', '2018-12-10', 1, '01718771056', 0, 1, 0),
(24, 4, NULL, '08dc088c0ef13687d8ccec8ae989fb62', 16, 'Rezual Karim', '2018-12-10', 1, '01712755876', 0, 1, 0),
(25, 4, NULL, 'fe55c5542b23177420e029b84ce79a3f', 16, 'Md. Mazedul Islam', '2018-12-10', 1, '01750536922', 0, 1, 0),
(26, 4, NULL, '4ebfe902734c78ce78d49b3243e297e2', 16, 'Md. Abdullah Al Mamun', '2018-12-10', 1, '01674628237', 0, 1, 0),
(27, 4, NULL, '1625113259612a797982750d08c8d397', 16, 'Rokib Hossain', '2018-12-10', 1, '01732772217', 0, 1, 0),
(28, 4, NULL, '5abbb05218a2e05c0d308d1588387158', 16, 'Md. Khalilur Rahman', '2018-12-10', 1, '01922897556', 0, 1, 0),
(29, 4, NULL, 'd37ba19f15f37281879b8fc5cc35df9a', 16, 'Sosanto Boshu', '2018-12-10', 1, '01924730477', 0, 1, 0),
(30, 4, NULL, 'eeaef9e43cf11f35669e234d5a97e603', 16, 'Md. Aminur Rahman Khan', '2018-12-10', 1, '01923344139', 0, 1, 0),
(31, 4, NULL, 'b29ac8c5d42c23f6d092781c3723bd15', 16, 'Md. Anwar Hossain', '2018-12-10', 1, '01715039739', 0, 1, 0),
(32, 4, NULL, '45f8beb42889d5a59a803caeb1ce5738', 16, 'Md. Zakir Hossain', '2018-12-10', 1, '01712128991', 0, 1, 0),
(33, 4, NULL, '048236d8ca2d73146bbb45080883e9f3', 16, 'Abul Kalam Azad', '2018-12-10', 1, '01733173284', 0, 1, 0),
(34, 5, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 15, 'Kids Care', '2018-12-12', 1, 'eb002', 0, 0, 0),
(35, 1, NULL, 'ecb8a2639deb878d57e2fa109784ec9d', 1, 'Md. Moniruzzaman Shobuz', '2018-12-15', 1, 'shobuz', 0, 0, 0),
(36, 6, NULL, 'd515518a1715bae5fbfc59d2458de532', 15, 'Rasel', '2018-12-15', 1, 'rasel', 0, 0, 0),
(37, 6, NULL, 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Md Saokat Hossain', '2018-12-15', 1, 'eb003', 0, 0, 0),
(38, 4, NULL, 'b667b118b151257bbe5425a26f64384e', 16, 'Selim Ahmed', '2018-12-18', 1, '01819945399', 0, 1, 0),
(39, 4, NULL, 'caedf9474dff0f7a43e65018e243090b', 16, 'Saidul Islam', '2018-12-18', 1, '01819202492', 0, 1, 0),
(40, 4, NULL, '665ca947f9644fa55cc2a710f3e85ec5', 16, 'Mahumudul Hasan', '2018-12-18', 1, '01718334559', 0, 1, 0),
(41, 4, NULL, 'f116d0cc8ac050ac2b70d4a982fa59a5', 16, 'Mir Monowar Hossain', '2018-12-18', 1, '01711939089', 0, 1, 0),
(42, 4, NULL, '1863be0e04a7895a431dc269ddbd3b49', 16, 'Munshi Masud Hossen', '2018-12-18', 1, '01929993008', 0, 1, 0),
(43, 4, NULL, '61e3ec090391de3448f4de4115b84ae0', 16, 'Md.Jalal Uddin', '2018-12-18', 1, '01741692264', 0, 1, 0),
(44, 4, NULL, '7141aaa583f0ce4177f9e3d9b23ef7fd', 16, 'Md. Abdul Halim', '2018-12-18', 1, '01818095700', 0, 1, 0),
(45, 4, NULL, 'cc897890f98adb24504ffe546f0f7c2d', 16, 'Anamul Haq Mollah', '2018-12-18', 1, '01714340144', 0, 1, 0),
(46, 4, NULL, '7139d1047f62b911b3a174e97c770bf5', 16, 'Mizanur Rahman', '2018-12-18', 1, '01814097490', 0, 1, 0),
(47, 4, NULL, '6f4bae0c15fb81820e770f107b3dc8ce', 16, 'Md. Kamal Parvase', '2018-12-18', 1, '01713148520', 0, 1, 0),
(48, 4, NULL, '107f7edfdf27598f21dd3cdb750b5685', 16, 'MD. Abul Khaer', '2018-12-18', 1, '01720513592', 0, 1, 0),
(49, 4, NULL, '2b9b365f768e74e780fd3ce5d4bf33b2', 16, 'Tariqul Islam', '2018-12-18', 1, '01730083684', 0, 1, 0),
(50, 4, NULL, 'f2837dfef2f6570f58b7db48f10407ad', 16, 'Dr.Md Khalid Jamil', '2018-12-18', 1, '01720110514', 0, 1, 0),
(51, 4, NULL, 'f48b32f7e354a17c45b44dc3b225bb52', 16, 'late, Aminul Islam', '2018-12-18', 1, '01919868457', 0, 1, 0),
(52, 4, NULL, '019dc29e710f4701c054fda89408846a', 16, 'MD. Nur Nobi', '2018-12-18', 1, '01961817877', 0, 1, 0),
(53, 4, NULL, '93d5cd3e86131462925a7ddbd5e0ce36', 16, 'Md. Ehtesham ul- Haque', '2018-12-18', 1, '01711530855', 0, 1, 0),
(54, 4, NULL, '52922cefb7f4ec00acb0a68502e62f43', 16, 'Kalipodo Sharma', '2018-12-18', 1, '01780172784', 0, 1, 0),
(55, 4, NULL, '7111508986ad6746b10427e35e27eab4', 16, 'Mounzurul Islam', '2018-12-18', 1, '01922554352', 0, 1, 0),
(56, 4, NULL, '906256aaedb60e551df273065d9e22b2', 16, 'Hanif MD. Sofrur Razzak', '2018-12-18', 1, '01626530604', 0, 1, 0),
(57, 4, NULL, '6a032f235cd04245c512f6397e77480b', 16, 'Imrul Kayes', '2018-12-18', 1, '01678592203', 0, 1, 0),
(58, 4, NULL, '38e8557f0263c09bd4b78e46e33fcb32', 16, 'Rafiqul Islam', '2018-12-18', 1, '01714049531', 0, 1, 0),
(59, 4, NULL, '60781f5fe97f1ce63e9db4c3ebc67082', 16, 'Md. Rafiquel Islam', '2018-12-18', 1, '01717094845', 0, 1, 0),
(60, 4, NULL, '3402b21beca934d7cba4771ce620844c', 16, 'Mizanur Rahman ', '2018-12-18', 1, '01917406622', 0, 1, 0),
(61, 4, NULL, '0d7631b18684c362e7b2e27cb2085e51', 16, 'Mir Hossain Chowdhury', '2018-12-18', 1, '01715030477', 0, 1, 0),
(62, 4, NULL, 'c0fb9f71092aefc9849cc67dcf685b47', 16, 'Sadiqur Rahman', '2018-12-18', 1, '01819128893', 0, 1, 0),
(63, 4, NULL, 'b138f8f4b6fd591f4aaecaff4794201d', 16, 'S.M Shafikur Rahman', '2018-12-18', 1, '01715734554', 0, 1, 0),
(64, 4, NULL, 'e895c1716fe70c5f5f1bca7c7ba5d949', 16, 'MD. Tariqul Islam', '2018-12-18', 1, '01913391721', 0, 1, 0),
(65, 4, NULL, '10ab254b5a8801177e2c27461a5766d0', 16, 'Saiful Islam', '2018-12-18', 1, '01712603625', 0, 1, 0),
(66, 4, NULL, '07abf8444d72105bc5f87150c8f71510', 16, 'lets Khundaqur Mosharraf', '2018-12-18', 1, '01682848907', 0, 1, 0),
(67, 4, NULL, '307c3161e8722623f301d0e2c2a1e340', 16, 'Kazi Giash uddin ', '2018-12-18', 1, '01680306572', 0, 1, 0),
(68, 4, NULL, '0375abac7b2710137db3144ef2a5703f', 16, 'Abul Hayath Md.. Kamruzzaman', '2018-12-18', 1, '01912716921', 0, 1, 0),
(69, 4, NULL, 'dcbb9006afaee1296ff36eabe1cddb28', 15, 'Fahim', '2018-12-23', 1, 'fahim', 0, 0, 0),
(70, 4, NULL, 'c38472fe83aa640e63beb227d2a890f5', 16, 'Md. Abul Kashem', '2018-12-24', 1, '01717037870', 0, 1, 0),
(71, 4, NULL, '8085e4e5384b9d3bc88cabb36e2a9598', 16, 'Asit Kumar Debnath', '2018-12-24', 1, '01716479053', 0, 1, 0),
(72, 4, NULL, 'd597fb328bd59d64778c807223d0a56d', 16, 'Narayan Das', '2018-12-24', 1, '01911487320', 0, 1, 0),
(73, 4, NULL, '950155345162c87cb7ba5652b752df20', 16, 'MD. Liakat Ali', '2018-12-24', 1, '01715407907', 0, 1, 0),
(74, 4, NULL, 'c78e2c6c04cc82d4cccbac2d867eb92f', 16, 'K.M. Abul Kalam Azad', '2018-12-24', 1, '01711136902', 0, 1, 0),
(75, 4, NULL, '856ed45f54f86eaa77c2de19b192569c', 16, 'Golam Saroar', '2018-12-24', 1, '01711577455', 0, 1, 0),
(76, 4, NULL, 'c36cbd7cc4ff7a13885727c24011416b', 16, 'Billiam Banarge', '2018-12-24', 1, '01676041213', 0, 1, 0),
(77, 4, NULL, '1ec91f7fe7435733a9ced3e3d602c9a7', 16, 'Anisur Zaman', '2018-12-24', 1, '01733255685', 0, 1, 0),
(78, 4, NULL, '4793899275c6554f3205a3fc7bcd7f75', 16, 'Monayem Khan', '2018-12-24', 1, '01740974326', 0, 1, 0),
(79, 4, NULL, 'f1b050dd5efb9f5744214e73e1322fc4', 16, 'Abdul Hye', '2018-12-24', 1, '01717382184', 0, 1, 0),
(80, 4, NULL, '69f3b21b641b093de8264a7c624912b2', 16, 'Kharul Bashar', '2018-12-24', 1, '01715529665, 01625677168', 0, 1, 0),
(81, 4, NULL, '722dc58c867666a8188fa01eef780037', 16, 'Abdur Satter', '2018-12-24', 1, '01869233572', 0, 1, 0),
(82, 4, NULL, 'f033d1568d6332aab3421a7cbb486abd', 16, 'MD. Rezaul Karim', '2018-12-24', 1, '01684328636', 0, 1, 0),
(83, 4, NULL, '176c1fae51cdcf0ce5375e7db326b483', 16, 'MD. Kamal Hossan', '2018-12-24', 1, '01716281100', 0, 1, 0),
(84, 4, NULL, '822781c79397cb0e44afc69bbb329394', 16, 'MD. Farid Hossain Militon', '2018-12-24', 1, '01972013367', 0, 1, 0),
(85, 4, NULL, '2597e9f585a7006bc17cd361ef806255', 16, 'Kh. MD. Sohidul Islam', '2018-12-24', 1, '01758926683', 0, 1, 0),
(86, 4, NULL, '617b3a6f9b73f3c54aa116ca0b7ce599', 16, 'DR, MD. Mizanur Rahman ', '2018-12-24', 1, '017111131492', 0, 1, 0),
(87, 4, NULL, '7f32d29569d8af099393c03afab44c6d', 16, 'Md. Aminur Rahman Khan', '2018-12-24', 1, '016833301130', 0, 1, 0),
(88, 4, NULL, 'ca20cb1dc95bcb821bb7fab2b1ead59b', 16, 'Faruk Ahamed Monir', '2018-12-24', 1, '01729161400', 0, 1, 0),
(89, 4, NULL, '72cc197278ff4a3cf24c84187d71faf9', 16, 'H.M Aslim', '2018-12-24', 1, '01730965953', 0, 1, 0),
(90, 4, NULL, 'f03cfd399ae780093f7e9a47a66e4c0f', 16, 'Razibul Hasan', '2018-12-24', 1, '01718238897', 0, 1, 0),
(91, 4, NULL, 'a28846e5a2b6cc472da43c9f8db2c09c', 16, 'MD. Mabin', '2018-12-24', 1, '01711204502', 0, 1, 0),
(92, 4, NULL, '973b31286d0d2f556dbc1d56503d09b0', 16, 'MD. Salim Reza', '2018-12-24', 1, '01712221303', 0, 1, 0),
(93, 4, NULL, '4043ea6d44a9774267a694b340c2f5f0', 16, 'Saiful islam', '2018-12-24', 1, '01822825308', 0, 1, 0),
(94, 4, NULL, 'decd2bf8c1347a50b424d751201089bc', 16, 'A. K.M Hasan Reza', '2018-12-24', 1, '01716620698', 0, 1, 0),
(95, 4, NULL, '3bc88dc7b980086a86124c4c76370abe', 16, 'MD. Mohibur Rahman', '2018-12-24', 1, '01911232334', 0, 1, 0),
(96, 4, NULL, 'a8e44e1c0d5a05d78ff34d243f945d8d', 16, 'Tajul Islam', '2018-12-24', 1, '01715111750', 0, 1, 0),
(97, 4, NULL, '45f8beb42889d5a59a803caeb1ce5738', 16, 'MD. Zakir Hossain', '2018-12-24', 1, '01712128991', 0, 1, 0),
(98, 4, NULL, '1ccb7f294b1870560e40f0a22de60264', 16, 'Shahjahan Ali', '2018-12-24', 1, '01731945252', 0, 1, 0),
(99, 4, NULL, '4f901e4a9e1b78da9e8f63ebc7d9b224', 16, 'Khan Mahbub Shohel', '2018-12-24', 1, '01714686047', 0, 1, 0),
(100, 4, NULL, 'c120ed53eee8dc4eca651da2ef5c835d', 16, 'Md. Rafiquel Islam', '2018-12-24', 1, '01715094845', 0, 1, 0),
(101, 4, NULL, '8e91381833a5c503a0fbfde378464a3e', 16, 'MD. Mahbub Hasan', '2018-12-24', 1, '01678062309', 0, 1, 0),
(102, 4, NULL, 'c355407e06ab50c1e3233fd646ff4109', 16, 'Lutfor Rahman khan', '2018-12-24', 1, '01957794952', 0, 1, 0),
(103, 4, NULL, '986793d63776095f108b966ddb32bbad', 16, 'Hemyet Hossen', '2018-12-24', 1, '01712297000', 0, 1, 0),
(104, 4, NULL, '09482166f1ae92cde09f49f14252d394', 16, 'Jahirul Hoque', '2018-12-24', 1, '01712123676', 0, 1, 0),
(105, 4, NULL, '2b9b365f768e74e780fd3ce5d4bf33b2', 16, 'Tariqul Islam', '2018-12-24', 1, '01730083684', 0, 1, 0),
(106, 4, NULL, '1e9b2af5576ea672b3e13425dda9b400', 16, 'MD. Azar Ali', '2018-12-24', 1, '01726595732', 0, 1, 0),
(107, 4, NULL, '6f4bae0c15fb81820e770f107b3dc8ce', 16, 'Md. Kamal Parvase', '2018-12-24', 1, '01713148520', 0, 1, 0),
(108, 4, NULL, '84ea68a65b6342ec5a8b5d293db34a51', 16, 'Samsul Islam', '2019-01-05', 1, '01798515959', 0, 1, 0),
(109, 4, NULL, '873e45ee95090b3574917d760d0a3f97', 16, 'Jebon Robi Das', '2019-01-05', 1, '01917705690', 0, 1, 0),
(110, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam', '2019-01-05', 1, '01741565333', 0, 1, 0),
(111, 4, NULL, 'f1b050dd5efb9f5744214e73e1322fc4', 16, 'Abdul Hye', '2019-01-05', 1, '01717382184', 0, 1, 0),
(112, 4, NULL, '6f13ea98a38d09271da8dc23e5e0d6b4', 16, 'Monayem Khan', '2019-01-05', 1, '017740974326', 0, 1, 0),
(113, 4, NULL, 'e82658b7cefc32f6237faf0a633e09c4', 16, 'S.Kibriya', '2019-01-05', 1, '01716127527', 0, 1, 0),
(114, 4, NULL, 'c48efc40bf4cc22bf15bd3c316abb0b0', 16, 'Kharul Bashar', '2019-01-05', 1, '01625677168', 0, 1, 0),
(115, 4, NULL, 'adfed9a17922b8ea0ef6241072352d2b', 16, 'Mahumudul Hasan Shaikh', '2019-01-05', 1, '01715199159', 0, 1, 0),
(116, 4, NULL, '74a47ca2dc4bacbdf2c61e4fd0e13e53', 16, 'MD. Fazlul Karim', '2019-01-05', 1, '01742255344', 0, 1, 0),
(117, 4, NULL, 'c36cbd7cc4ff7a13885727c24011416b', 16, 'Billiam Banarge', '2019-01-05', 1, '01676041213', 0, 1, 0),
(118, 4, NULL, '1ec91f7fe7435733a9ced3e3d602c9a7', 16, 'Anisur Zaman', '2019-01-05', 1, '01733255685', 0, 1, 0),
(119, 4, NULL, '676916c7fb2deb8842bc6936777ba4d9', 16, 'Atikur Rahman', '2019-01-05', 1, '01754041055', 0, 1, 0),
(120, 4, NULL, '1a8778b63b0ece81f4a7328a711008f5', 16, 'Rafiqul Majid', '2019-01-05', 1, '01713030572', 0, 1, 0),
(121, 4, NULL, '8d1bc4fa6bcfc82908c3bbc50a683bd5', 16, 'Shihab Hossain', '2019-01-05', 1, '01552358070', 0, 1, 0),
(122, 4, NULL, 'acb39df64fc6b39b9b366be1eae28e46', 16, 'MD. Kamruzzaman', '2019-01-05', 1, '01711603676', 0, 1, 0),
(123, 4, NULL, 'e30502c56e66f47bd7a443cf6c7ef586', 16, 'Sheikh Masbah Uddin ', '2019-01-05', 1, '01711019374', 0, 1, 0),
(124, 4, NULL, '7d88d59cb8ae876f54aa8a665fa687df', 16, 'MD. Shah Alam Patwary', '2019-01-05', 1, '01812775061', 0, 1, 0),
(125, 4, NULL, '0928fd7729b9cc2a3ad37297bdcee754', 16, 'MD. Motalab', '2019-01-05', 1, '01758109926', 0, 1, 0),
(126, 4, NULL, '903fd4efdf915fa3b527ee46efce99a8', 16, 'Mizanur Rahman', '2019-01-05', 1, '01917701762', 0, 1, 0),
(127, 4, NULL, 'e762dd322235a9ea410a8f8c4d6f1648', 16, 'Mohammad Forhad Hossain', '2019-01-05', 1, '01793009143', 0, 1, 0),
(128, 4, NULL, 'c0d6347e6b6a9d7812f400b33c25ecc0', 16, 'MD. Iqbal Hossain', '2019-01-05', 1, '01712108607', 0, 1, 0),
(129, 4, NULL, 'da692ab73852aa0e7907f8841bb91695', 16, 'Mohammad Mintu', '2019-01-05', 1, '01741181184', 0, 1, 0),
(130, 4, NULL, 'ea087c71af06863703848cdf92a19c39', 16, 'MD. Belayt Hossan', '2019-01-05', 1, '01719794855', 0, 1, 0),
(131, 4, NULL, '0092545384ccbfb2c4a9762acac329af', 16, 'Capt. Imranor Reza Chowdhury', '2019-01-05', 1, '01818489543', 0, 1, 0),
(132, 4, NULL, '35fe89cca7947ceb30fe4f49c3283d48', 16, 'MD. Mozibur Rahman', '2019-01-05', 1, '01718268866', 0, 1, 0),
(133, 4, NULL, '75f6b38e2cfae8e52fd90d57b95b47d3', 16, 'A.H.M Shaful Azam', '2019-01-05', 1, '01819210451', 0, 1, 0),
(134, 4, NULL, '7768a4d2ce138b574fe01a60599573be', 16, 'Shamsul Hoque Selim', '2019-01-05', 1, '01686090312  /  01635090191', 0, 1, 0),
(135, 4, NULL, '5cb318272a9aeb2ac248a1b18f346c8f', 16, 'Shamim Ahamid', '2019-01-05', 1, '01730399080', 0, 1, 0),
(136, 4, NULL, '1d9cb1d4f26d90f79da82aaa52c187cf', 16, 'Noor Nobi Chowdhury', '2019-01-05', 1, '01814469504', 0, 1, 0),
(137, 4, NULL, '60fc4f6d0f7f4c4965ddb9a56252a1b4', 16, 'Engr. MD. Hasanuzzaman', '2019-01-05', 1, '01911785982', 0, 1, 0),
(138, 4, NULL, 'c141b7a7cceee19dccfcf73b4e7a197d', 16, 'Shalim Mollah', '2019-01-05', 1, '01937261866', 0, 1, 0),
(139, 4, NULL, 'e45f7db9b910a2382c75686ae740f21a', 16, 'Dr, Mohammad Idmish Ali', '2019-01-05', 1, '01712790646', 0, 1, 0),
(140, 4, NULL, '54c37173f2fe372c29f5956b3891f228', 16, 'MD. Kamrul Islam', '2019-01-05', 1, '01780484703', 0, 1, 0),
(141, 4, NULL, '554296cd57aa0d27ccbf14f89bc0f222', 16, 'Late. Ataur Rahman Chowdhury', '2019-01-05', 1, '01726596202', 0, 1, 0),
(142, 4, NULL, '26980017f099fa3c57adfe6ff70a7d5c', 16, 'Late. Khaza Abdus Salam', '2019-01-05', 1, '01855596750', 0, 1, 0),
(143, 4, NULL, 'fa4885497de2e053f67f36a00df0ff29', 16, 'Shahin Rahman', '2019-01-05', 1, '01713199688', 0, 1, 0),
(144, 4, NULL, 'f292beeac8e6bfe319c0ed6921e98573', 16, 'MD. Zahidul Haque Khan', '2019-01-05', 1, '01716814936', 0, 1, 0),
(145, 4, NULL, 'e1fa6895cd43c362eff8d168214c5c7e', 16, 'Rafiqul Islam', '2019-01-05', 1, '01834678958', 0, 1, 0),
(146, 4, NULL, '08f343b93a07d5cbded8c9d90b570425', 16, 'MD. Shihabul Islam', '2019-01-05', 1, '01673466264', 0, 1, 0),
(147, 4, NULL, '7d1d6e2758985e5b792c28c1d589132a', 16, 'Fakhruddin Khan', '2019-01-05', 1, '01713147027', 0, 1, 0),
(148, 4, NULL, '767fb352c16010ee39dd1a5275ccb444', 16, 'Hafez Sultan Mahmud', '2019-01-05', 1, '01725336241', 0, 1, 0),
(149, 4, NULL, '052404badf77e7a2672c9921e36c5841', 16, 'MD. Razzak Mizi', '2019-01-05', 1, '01813930728', 0, 1, 0),
(150, 4, NULL, '13a8c165ff1d4ae8095c8ba72f89c758', 16, 'MD. Showkat Ali Molla', '2019-01-07', 1, '01712615814, 01675317852', 0, 1, 0),
(151, 4, NULL, 'b138f8f4b6fd591f4aaecaff4794201d', 16, 'S.M Shafikur Rahman', '2019-01-07', 1, '01715734554', 0, 1, 0),
(152, 4, NULL, '30c5ae724cb48988a2881e70b69ade4c', 16, 'Mostafezur Rahman', '2019-01-07', 1, '01684108908', 0, 1, 0),
(153, 4, NULL, '7143b0e54bba11ffac059b7f8f99f3b8', 16, 'MD. Jamal Hossen', '2019-01-07', 1, '017727530213', 0, 1, 0),
(154, 4, NULL, '30c5ae724cb48988a2881e70b69ade4c', 16, 'Mostafezur Rahman', '2019-01-07', 1, '01684108908', 0, 1, 0),
(155, 4, NULL, 'f3d7dd608380ef58a8d31d7157602d72', 16, 'MD. Jahangir Alam', '2019-01-07', 1, '01819597111', 0, 1, 0),
(156, 4, NULL, '8eeaf9b854592d820b83889811061e30', 16, 'Belal Hossen', '2019-01-07', 1, '01942789859', 0, 1, 0),
(157, 4, NULL, 'a27a5d04c36c9e0b1af19a2dafe772bf', 16, 'MD. Sharif Hossen', '2019-01-07', 1, '01819558081', 0, 1, 0),
(158, 4, NULL, '7873be2cf2999042d8e0b92a5442bb48', 16, 'Lutfor Rahman', '2019-01-07', 1, '01714020818', 0, 1, 0),
(159, 4, NULL, 'ce140a0dc4b7118afaff40198e5b37eb', 16, 'MD. Abdul Khayer', '2019-01-07', 1, '01948611561', 0, 1, 0),
(160, 4, NULL, '2248a54a7f933a0f31036a965047260a', 16, 'MD. Al- Jubaide', '2019-01-07', 1, '01816365336', 0, 1, 0),
(161, 4, NULL, 'e1fa6895cd43c362eff8d168214c5c7e', 16, 'Rafiqul Islam', '2019-01-07', 1, '01834678958', 0, 1, 0),
(162, 4, NULL, 'b1ee375de3c11b90134b409319ed5842', 16, 'MD. Repon Munshe', '2019-01-07', 1, '01757293286', 0, 1, 0),
(163, 4, NULL, 'e1e5d21ea5c235628dc504c4983a961c', 16, 'Aslam Hossain', '2019-01-07', 1, '01827587980', 0, 1, 0),
(164, 4, NULL, '755f5b429513c184c7a40cb252cebbc5', 16, 'Abdur Rahman', '2019-01-07', 1, '01737325157', 0, 1, 0),
(165, 4, NULL, '7f80060eaca05a39bf5e982be64b626b', 16, 'MD. Monirul Islam', '2019-01-07', 1, '01926689950', 0, 1, 0),
(166, 4, NULL, 'a7c934fbce504ee2358742b3a4619596', 16, 'Hhafiz Mollah', '2019-01-07', 1, '01798240545', 0, 1, 0),
(167, 4, NULL, '561cd21062543fdf451a4ba79d3a56ce', 16, 'MD. Jul-E- Aslam', '2019-01-07', 1, '01711713678', 0, 1, 0),
(168, 4, NULL, '85a08775db29fd6d1e6b147ed3621de6', 16, 'MD. Shafiqul Islam', '2019-01-07', 1, '01716913210', 0, 1, 0),
(169, 4, NULL, 'cd57c347991016ce7bb17b4490de6d10', 16, 'Fazlul Hoque', '2019-01-07', 1, '01819483728', 0, 1, 0),
(170, 4, NULL, 'd0a8a80e928bafea333947ff3aadf964', 16, 'MD. Newaj Hossain', '2019-01-07', 1, '01828142286', 0, 1, 0),
(171, 4, NULL, 'bb2c0b6c4d2c5d206dfd83ce38053758', 16, 'Razaul Rahman', '2019-01-07', 1, '01711464708', 0, 1, 0),
(172, 4, NULL, '5fba5f2ff75b98befa12f2497d02e099', 16, 'MD. Khadimul Islam', '2019-01-07', 1, '01719524221', 0, 1, 0),
(173, 4, NULL, '582cf9a8800a5ab37bb18e6c19ce01f9', 16, 'Morshed Zaman Liton', '2019-01-07', 1, '01711785106', 0, 1, 0),
(174, 4, NULL, 'be26fd554ab3f3ea01e93357c8180ae8', 16, 'Mizanur Rahman', '2019-01-07', 1, '01715601041', 0, 1, 0),
(175, 4, NULL, 'ad2f0eab01bf66dda4bc828a4d1c7639', 16, 'Syed Sotter Ahmed', '2019-01-07', 1, '01835026634', 0, 1, 0),
(176, 4, NULL, 'b5ed0ab2b78819ad7d3736dd97d72a07', 16, 'Sk. Kamrul Islam', '2019-01-07', 1, '01973234292', 0, 1, 0),
(177, 4, NULL, 'b0b6ca000522b00203cfa067f56572a5', 16, 'MD. Izharul islam', '2019-01-07', 1, '01711955442', 0, 1, 0),
(178, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'MD. Raknuzzaman', '2019-01-07', 1, '01819556485', 0, 1, 0),
(179, 4, NULL, 'b2443d7c6ba24f285bcb589aabb6a403', 16, 'Abdul Sattar', '2019-01-07', 1, '01881659416', 0, 1, 0),
(180, 4, NULL, '25d9746dfe4ae620cb5d44eb043455e0', 16, 'Wahidur Rahman Khan', '2019-01-07', 1, '01745885058', 0, 1, 0),
(181, 4, NULL, '0f51f3a19e31488f2487f5a59cb96db3', 16, 'MD. Abul Hashem', '2019-01-07', 1, '01817584753', 0, 1, 0),
(182, 4, NULL, 'caedf9474dff0f7a43e65018e243090b', 16, 'MD. Saiful Islam', '2019-01-07', 1, '01819202492', 0, 1, 0),
(183, 4, NULL, '734cc575a1346ae42312069b2cf936f6', 16, 'Nazrul Islam', '2019-01-07', 1, '01712593593', 0, 1, 0),
(184, 4, NULL, 'a10a7479a95615a44534a4d0bd409337', 16, 'Abu Naser', '2019-01-07', 1, '01711392359', 0, 1, 0),
(185, 4, NULL, '341aa14cd458d916bace7a5f28e71bb9', 16, 'MD. Mokhlesur Rahman', '2019-01-07', 1, '01711525484', 0, 1, 0),
(186, 4, NULL, '63c84b2868768391a938bf2d5446624b', 16, 'MD. Zahid Alom', '2019-01-07', 1, '01610744422', 0, 1, 0),
(187, 4, NULL, '85148c36f814f5726e7e2ff82683e544', 16, 'Kawsar Talukder', '2019-01-07', 1, '01711595334', 0, 1, 0),
(188, 4, NULL, '277cd16d3e422d8cf3df1055c8b49772', 16, 'Kamruzaman', '2019-01-07', 1, '01843516484', 0, 1, 0),
(189, 4, NULL, 'b3fdb677edac33f5bc78f84811f69a64', 16, 'Golam Rabani', '2019-01-07', 1, '01937548008', 0, 1, 0),
(190, 4, NULL, '2be0594ccf5f1da8a9166b21e91cddff', 16, 'MD. Anisur Rahman', '2019-01-07', 1, '01712027728', 0, 1, 0),
(191, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam', '2019-01-07', 1, '01741565333', 0, 1, 0),
(192, 4, NULL, '873e45ee95090b3574917d760d0a3f97', 16, 'Jebon Robi Das', '2019-01-07', 1, '01917705690', 0, 1, 0),
(193, 4, NULL, '940ce0412190f0507222b708fc8db151', 16, 'MD. Nurunnabi Mondol', '2019-01-07', 1, '01711101455', 0, 1, 0),
(194, 4, NULL, '875d06b79f5eee8779a9eb58697268f7', 16, 'Abdur Rahman', '2019-01-07', 1, '01617589413', 0, 1, 0),
(195, 4, NULL, '0ddc2966fe7781b47ac202f0ede3c1aa', 16, 'DR. Bidyut', '2019-01-07', 1, '01931354805', 0, 1, 0),
(196, 4, NULL, '40169b98626579a29de7dce7813b2135', 16, 'MD. Jahangir Alam', '2019-01-07', 1, '01517075151', 0, 1, 0),
(197, 4, NULL, '0b656f122a2b2465d1995d7ac6859779', 16, 'MD. Mazharul Islam', '2019-01-07', 1, '01718559605', 0, 1, 0),
(198, 4, NULL, '822781c79397cb0e44afc69bbb329394', 16, 'MD. Farid Hossain Militon', '2019-01-07', 1, '01972013367', 0, 1, 0),
(199, 4, NULL, 'a573734eb58b434943617d4830089541', 16, 'Shafique Ahmed Khan', '2019-01-07', 1, '01730791792, 01913058955', 0, 1, 0),
(200, 4, NULL, 'd3f2a44e5e5b2cef883605f9af9e1472', 16, 'MD. Jamal Hossen', '2019-01-07', 1, '01715933238', 0, 1, 0),
(201, 4, NULL, '8c3fd7ee82e0240d5e025012b4ac6752', 16, 'G.M. Hafizul Islam', '2019-01-07', 1, '01715513853', 0, 1, 0),
(202, 4, NULL, '2224d17bfc70578b950bbcec7fc5a3a2', 16, 'Habibur Rahman Khan', '2019-01-07', 1, '0176250600', 0, 1, 0),
(203, 4, NULL, 'ebd14e40d2115863d976ef14e70c4480', 16, 'Zahrul Islam', '2019-01-07', 1, '01720273644', 0, 1, 0),
(204, 4, NULL, '158977e3805277a66db29e460c41fb68', 16, 'MD. Sayed Hossen', '2019-01-07', 1, '01718082226', 0, 1, 0),
(205, 4, NULL, '38304ad5f4780a1750653607a9196a9e', 16, 'MD. Alamgir Hossain', '2019-01-07', 1, '01713093185', 0, 1, 0),
(206, 4, NULL, '90442a115229eded4d97aa472b5b561c', 16, 'MD. Shariful Islam', '2019-01-07', 1, '01714099307', 0, 1, 0),
(207, 4, NULL, 'f880fbafbb1f1389f2608e5f9e9138b3', 16, 'Habibur Rahman', '2019-01-07', 1, '01757987313', 0, 1, 0),
(208, 4, NULL, '8ef9f9f8697886aa174c244d63328fb8', 16, 'A K M Saiful Islam', '2019-01-07', 1, '01711314107', 0, 1, 0),
(209, 4, NULL, '3905d8ba417b51a47773e39945ec4137', 16, 'Miah Mohammad Al -Amin', '2019-01-07', 1, '01822000298', 0, 1, 0),
(210, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'Rokinuzzaman', '2019-01-07', 1, '01819556485', 0, 1, 0),
(211, 4, NULL, 'ce55ebb50477f77b37f3069fca65d8c2', 16, 'MD. Zeaur Rahman', '2019-01-07', 1, '01716093784', 0, 1, 0),
(212, 4, NULL, '87e9df343aa77346965bd2c98910c797', 16, 'Afsa Balale', '2019-01-07', 1, '01936133395', 0, 1, 0),
(213, 4, NULL, 'ff283995a009135270010c2e0a139b25', 16, 'Md. Nizamuddin', '2019-01-07', 1, '01732228825', 0, 1, 0),
(214, 4, NULL, '4117a622ce20aca0f7e7076884dc09d6', 16, 'Mur-A- Alom', '2019-01-07', 1, '01917389179', 0, 1, 0),
(215, 4, NULL, 'f48be4dc9d1c64153633c0744c693e3a', 16, 'Gazi Mohammad Abid Hosan', '2019-01-07', 1, '01741081699', 0, 1, 0),
(216, 4, NULL, 'cb3ea4b5c3f37a23822bfecf2f021879', 16, 'MD. Harunur Rashid', '2019-01-07', 1, '01760001420', 0, 1, 0),
(217, 4, NULL, '5ed873ff774981735b623bedd9b397e4', 16, 'Rezual Karim', '2019-01-07', 1, '01712211216', 0, 1, 0),
(218, 4, NULL, 'e6e341c65f8a9e864bc70594ceeae708', 16, 'Harun or Rashid', '2019-01-07', 1, '01990307673', 0, 1, 0),
(219, 4, NULL, 'd092e98758b2234f5d209f914ffdde1a', 16, 'Sofiqur Rahman', '2019-01-07', 1, '01781446590', 0, 1, 0),
(220, 6, NULL, 'af72ba1fb4d47ca220756f1c7ac06a21', 16, 'Md. Shakhawat Hossain', '2019-01-09', 1, '01909146922', 0, 1, 0),
(221, 6, NULL, '19fa605020960ad74ccd4d55368ae2af', 16, 'Humayun Kabir', '2019-01-09', 1, '01991091066', 0, 1, 0),
(222, 6, NULL, '3229a2a7104097259eb95a99317ca65f', 16, 'Md. Moniruzzman Monir', '2019-01-09', 1, '01764521465', 0, 1, 0),
(223, 6, NULL, 'b69e4e48a133632202155ec02f8a2f87', 16, 'S.M. Shoeb', '2019-01-09', 1, '01671127028', 0, 1, 0),
(224, 6, NULL, 'ec135e57f3fa3d18f9d1422c12aadd43', 16, 'Md. Nura Alam Siddiqui', '2019-01-09', 1, '01712251866', 0, 1, 0),
(225, 6, NULL, 'e069cc141c16ecc9b10bc61627c959a2', 16, 'Md. Jalal Uddin ', '2019-01-09', 1, '01916030713', 0, 1, 0),
(226, 6, NULL, '2c626b237d852ce6424fd43a96a316fc', 16, 'Majedul Islam', '2019-01-09', 1, '01985558922', 0, 1, 0),
(227, 6, NULL, '99041c85f3e256d93207499f18c5843d', 16, 'Md. Nasir Uddin', '2019-01-09', 1, '01715347790', 0, 1, 0),
(228, 6, NULL, '11bff5c8e4ff799c60f780246bb4bd48', 16, 'Md. Shaidul Islam', '2019-01-09', 1, '01977431566', 0, 1, 0),
(230, 4, NULL, 'ecb8a2639deb878d57e2fa109784ec9d', 15, 'Shobuz', '2019-01-11', 1, 'Shimul', 0, 0, 0),
(231, 6, NULL, 'dff3a582b43a1b3f0d974813ab227a37', 16, 'Omar Faruk', '2019-01-12', 1, '01754211676', 0, 1, 0),
(232, 6, NULL, 'dff3a582b43a1b3f0d974813ab227a37', 16, 'Omar Faruk', '2019-01-12', 1, '01754211676', 0, 1, 0),
(233, 6, NULL, '7dd9c3f557b5fa5f82372e423ff14baf', 16, 'Sheik Jamal Hossain (Munna)', '2019-01-12', 1, '01923793967', 0, 1, 0),
(234, 6, NULL, 'e1ab1621dc94cb68c9ab895861f93fed', 16, 'Andrew Miltion Gomes ', '2019-01-12', 1, '01850524707', 0, 1, 0),
(235, 6, NULL, '016d0a7e945037d0d8fa5746f057dc31', 16, 'Md, Monirul Islam', '2019-01-12', 1, '01723309065', 0, 1, 0),
(236, 6, NULL, 'f903596d8d2ffbf73a99bc543c5413ec', 16, 'A K M Sorowor Hossain ', '2019-01-12', 1, '01631596977', 0, 1, 0),
(237, 6, NULL, '48ab5c7cea90697c0bd512a15c52d5c1', 16, 'Md. Arshadul Hoque', '2019-01-12', 1, '01716425592', 0, 1, 0),
(238, 6, NULL, 'e2b5236ef8d49271ad357c5c40d7ca97', 16, 'Zahir Raihan Babul ', '2019-01-12', 1, '01714446699', 0, 1, 0),
(239, 6, NULL, 'f3a4691562c369d56b36ac0d9cc88e2d', 16, 'Md, Abdur Rahin ', '2019-01-12', 1, '0171824381', 0, 1, 0),
(240, 6, NULL, '54e86b9b9212e24e275e460db96d36d2', 16, 'Moshiur Rahaman ', '2019-01-12', 1, '01916284438', 0, 1, 0),
(241, 6, NULL, 'c007db67e804bddd450f1534425a5399', 16, 'Samiul Islam ', '2019-01-12', 1, '01721699816', 0, 1, 0),
(242, 6, NULL, '4043ea6d44a9774267a694b340c2f5f0', 16, 'MD. Saiful Islam ', '2019-01-12', 1, '01822825308', 0, 1, 0),
(243, 6, NULL, 'c21944d730ac1759be0c6c4c776ea460', 16, 'Ashif Rajiul Hasan', '2019-01-12', 1, '01715011528', 0, 1, 0),
(244, 6, NULL, 'e952716d38857e03f19eac11d3e56ecd', 16, 'MD. Shajedul Karim ', '2019-01-13', 1, '01550156385', 0, 1, 0),
(245, 6, NULL, 'cdc40052517a07c00bc1a61672eb820f', 16, 'MD. Monirujjman ', '2019-01-13', 1, '01768561510', 0, 1, 0),
(246, 6, NULL, '3bfbf32d40002e16f74706f2d770e840', 16, 'Abdullah Al Mamun', '2019-01-13', 1, '01915463147', 0, 1, 0),
(247, 6, NULL, '08412c53f79a2d364026f9e57bedf295', 16, 'MD. Aowlad Hossain ', '2019-01-13', 1, '01647722099', 0, 1, 0),
(248, 6, NULL, '38e960a209bd493d803d95d1ca7847e2', 16, 'Sumon Rana ', '2019-01-13', 1, '01912494474', 0, 1, 0),
(249, 6, NULL, '9a99ace4e199854975ee349fffd8d75c', 16, 'Sanjit Kumer Saha', '2019-01-13', 1, '01712694106', 0, 1, 0),
(250, 6, NULL, '17378fb019639b2dc2d0f01a16e19333', 16, 'Md. Abu Sayeed ', '2019-01-13', 1, '01753647080', 0, 1, 0),
(251, 6, NULL, '03130a43adf9bafd515c6f0972c99968', 16, 'MD. Ismail Hossain ', '2019-01-13', 1, '01718100222', 0, 1, 0),
(252, 6, NULL, '3adf59e47977c14b39e4f31f1dfda0c4', 16, 'Ismial Hossain ', '2019-01-13', 1, '01626474041', 0, 1, 0),
(253, 6, NULL, '46e2ae3720fb9a250af9a077cff9de71', 16, 'Md. Akram Hossain Shimul ', '2019-01-13', 1, '01713093822', 0, 1, 0),
(254, 6, NULL, 'fc3ab2ac41978f4074bc2ec983f52f94', 16, 'Md. Abdur Rahaman ', '2019-01-13', 1, '01951224492', 0, 1, 0),
(255, 6, NULL, 'cc2399fd2eb491701e532848559de1ee', 16, 'MD. Monirujjaman ', '2019-01-13', 1, '01711574882', 0, 1, 0),
(256, 6, NULL, 'eaae17c951e38a8cdf929dca61a15b26', 16, 'MD. Mostak Ahamed ', '2019-01-13', 1, '01717899492', 0, 1, 0),
(257, 6, NULL, '37729e0ac1c851d79bcb95ef7d2c7012', 16, 'Md. Ariful Islam', '2019-01-13', 1, '01968858337', 0, 1, 0),
(258, 6, NULL, '2d485621956397394ac7c50660a9aa44', 16, 'Lal Chan ', '2019-01-13', 1, '01739607109', 0, 1, 0),
(259, 6, NULL, '215320611ee66aaae33bdf405a05913b', 16, 'Mostofa Mahmud Zoha', '2019-01-14', 1, '01712669309', 0, 1, 0),
(260, 6, NULL, '22dead30dea3c28d3203658015bc503b', 16, 'Sakil Ahamed ', '2019-01-16', 1, '01837386656', 0, 1, 0),
(261, 6, NULL, 'd63fd93174f8aa461c8d6d5813f44635', 16, 'F.M. Foridul Islam', '2019-01-16', 1, '01779554972', 0, 1, 0),
(262, 6, NULL, '02225f70a541cd5e31b50c6e7dd61efe', 16, 'Md. Siddikur Rahaman ', '2019-01-16', 1, '01734694070', 0, 1, 0),
(263, 6, NULL, '38b9b0f080b788355e5a2edf5f2a97b1', 16, 'Mohammad Dalower Hossan ', '2019-01-16', 1, '01912416046', 0, 1, 0),
(264, 6, NULL, '38b9b0f080b788355e5a2edf5f2a97b1', 16, 'Mohammad Dalower Hossan ', '2019-01-16', 1, '01912416046', 0, 1, 0),
(265, 6, NULL, 'f82b771c55224de7c57a27d1be870685', 16, 'Md. Anowar Hossain ', '2019-01-16', 1, '01752107693', 0, 1, 0),
(266, 6, NULL, '07a40e815027e2222b548976595d1402', 16, 'Md. Zahid Hossain ', '2019-01-16', 1, '01714163224', 0, 1, 0),
(267, 6, NULL, '0ab521653ce07089b972ecff8ec3d664', 16, 'md. Liton ', '2019-01-16', 1, '01777815820', 0, 1, 0),
(268, 6, NULL, 'e536e7a1ee27ceb3d3da2c5f3163150f', 16, 'Md Aminul Islam', '2019-01-16', 1, '01710771840', 0, 1, 0),
(269, 6, NULL, 'e33786662470069bcc65bba1ff64ddf2', 16, 'Kripamoy Sarkar ', '2019-01-16', 1, '0172697107', 0, 1, 0),
(270, 6, NULL, '42ab21a9ba81bf8608a2578c12f2983e', 16, 'K.M. Ronot Jahan Tomal ', '2019-01-16', 1, '01711186310', 0, 1, 0),
(271, 6, NULL, '31ea12f10708bfb8b592b9e31d0e30b0', 16, 'Anwar Hosan ', '2019-01-16', 1, '01635406871', 0, 1, 0),
(272, 6, NULL, '8a6b876d5d97bc56a3258354522c3f66', 16, 'Md. Abu Yousuf Murad ', '2019-01-16', 1, '01914907167', 0, 1, 0),
(273, 6, NULL, 'ac26d16b4845eeba3aba23194593f2df', 16, 'Md. Abul Bashar ', '2019-01-16', 1, '01932716613', 0, 1, 0),
(274, 6, NULL, '7bb08fd88ee550c2c84ef02044d3bb60', 16, 'Md. Hasem ', '2019-01-16', 1, '01942334614', 0, 1, 0),
(275, 6, NULL, 'e25361413f8d4f560e8fdfc11d2d55a1', 16, 'Lutfar Rahaman ', '2019-01-16', 1, '01720014474', 0, 1, 0),
(276, 6, NULL, 'a697f063c6295dbedcedd92c2cbd363b', 16, 'Hossainul Kibria ', '2019-01-16', 1, '01737686722', 0, 1, 0),
(277, 6, NULL, 'd3fde79a53b20cb833b22ed8300a6758', 16, 'Dewan Shadadul Hoque Uzzal ', '2019-01-16', 1, '01710990808', 0, 1, 0),
(278, 6, NULL, 'ea4218c8f26cd70ceba2438f5780a0f2', 16, 'Saiful Islam ', '2019-01-16', 1, '01678715101', 0, 1, 0),
(279, 6, NULL, 'ea4218c8f26cd70ceba2438f5780a0f2', 16, 'Saiful Islam ', '2019-01-16', 1, '01678715101', 0, 1, 0),
(280, 6, NULL, '561cd21062543fdf451a4ba79d3a56ce', 16, 'Md. Jul-E- Aslam ', '2019-01-16', 1, '01711713678', 0, 1, 0),
(281, 6, NULL, '98ea6574d9e64ef30411997c0ea469d5', 16, 'Sheikh Abdur Rohim ', '2019-01-16', 1, '01933361473', 0, 1, 0),
(282, 6, NULL, '6a4e0659be2e7fd16eaa2c31e8d44c86', 16, 'Md. Mujebur Rahaman ', '2019-01-16', 1, '01674742222', 0, 1, 0),
(283, 6, NULL, '6a2b6ff0f017830fac59c70b0011a874', 16, 'MD. Golam Rosul ', '2019-01-16', 1, '01712355498', 0, 1, 0),
(284, 6, NULL, '3a437bdfcb7aa4db7970a589cb14c690', 16, 'Md. Saiful Islam ', '2019-01-16', 1, '01850861056', 0, 1, 0),
(285, 6, NULL, '57a169e1c64df587d3d11c508fd5f2fa', 16, 'Md.Nuruddin Hwlhder ', '2019-01-16', 1, '01913227421', 0, 1, 0),
(286, 6, NULL, '6838ffb0dcd65bcd63db557409d47804', 16, 'Md. Shumsud Daha ', '2019-01-16', 1, '01716642291', 0, 1, 0),
(287, 6, NULL, '5bd56fc652766d49c07c10a84c550b1a', 16, 'Md. Anawer Hossain ', '2019-01-19', 1, '01872629482', 0, 1, 0),
(288, 6, NULL, '7a2fb9f96840fc19afa009908a80aa6f', 16, 'Md. Josim Uddin ', '2019-01-19', 1, '01814216040', 0, 1, 0),
(289, 6, NULL, '27ab3e0892208d5431404fbc4d499603', 16, 'Mohammad Masud Rana', '2019-01-19', 1, '01716901330', 0, 1, 0),
(290, 6, NULL, '2906943dddc5a4108b870b088f9377c7', 16, 'Muhammad Shafidllah Shake ', '2019-01-19', 1, '01716763729', 0, 1, 0),
(291, 6, NULL, 'e8d14ad5906ed42848d1c1cbcf3c7259', 16, 'Md. Touidul Islam ', '2019-01-19', 1, '01718942675', 0, 1, 0),
(292, 6, NULL, '39445c151533968fc2fd6c3e18c01728', 16, 'Mijanur Rahaman ', '2019-01-19', 1, '01818515384', 0, 1, 0),
(293, 6, NULL, 'e0c5dc2d782e40eb7e2d00e7d7f258d0', 16, 'Shaikh Abul Kashrm Fardous ', '2019-01-19', 1, '01711956191', 0, 1, 0),
(294, 6, NULL, 'cab33d4f97a4300f4d834369cdee0a40', 16, 'Md. Abjal Hossan ', '2019-01-19', 1, '01948356096', 0, 1, 0),
(295, 6, NULL, '65909218fe8a6dbd02713fc78411c078', 16, 'Warish Nadim ', '2019-01-19', 1, '01624847867', 0, 1, 0),
(296, 6, NULL, 'ab4536e54ab27c8f66def2dc36f2ea73', 16, 'Imtiaz Masroor ', '2019-01-19', 1, '01715021592', 0, 1, 0),
(297, 6, NULL, '5bfbc5d2f8ea1dd2ac0119becfa01d50', 16, 'Md. Nazrul Islam ', '2019-01-19', 1, '01710622850', 0, 1, 0),
(298, 6, NULL, '158b292c21beeb2e60402259fc5c3543', 16, 'Md. Obidun Nobi ', '2019-01-19', 1, '01730405410', 0, 1, 0),
(299, 6, NULL, '5f863eefe8d96b27f3558f07b1034135', 16, 'Dalowar Hossain ', '2019-01-19', 1, '01745901847', 0, 1, 0),
(300, 6, NULL, '74373b261a0a0b461ed32c972e49b61c', 16, 'Abdul Kadir ', '2019-01-19', 1, '01954499091', 0, 1, 0),
(301, 6, NULL, '3f8f3fcfa9552f241624443039eceb2d', 16, 'MD. jalal ', '2019-01-19', 1, '01777525139', 0, 1, 0),
(302, 6, NULL, 'bfb1c1da72ff29f7bbdac7b7af3b58ad', 16, 'Akrim Hossain Mia', '2019-01-19', 1, '01715699669', 0, 1, 0),
(303, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Swapanchandra Das ', '2019-01-19', 1, '0', 0, 1, 0),
(304, 6, NULL, 'ef3b0d7bfc1b10a8ef580ba05b3756f8', 16, 'Md. Sinto Hossain ', '2019-01-19', 1, '01776797671', 0, 1, 0),
(305, 6, NULL, '20ea5d997fc37a75aa8a804f1091ee35', 16, 'Md. Raihan Mia', '2019-01-19', 1, '01771587606', 0, 1, 0),
(306, 6, NULL, 'ce1ff2d9ef8e9f0c8e92a4b759b48eb7', 16, 'Sheikh Mohammed Arman ', '2019-01-19', 1, '01815437103', 0, 1, 0),
(307, 4, NULL, 'd73cc2896727c6138d4f341986a3b07e', 16, 'Md. Nurul Islam', '2019-01-19', 1, '01938872474', 0, 1, 0),
(308, 6, NULL, '85b22fddc9f79fe2b4b6a89726322b3e', 16, 'Md. Rabbi ', '2019-01-20', 1, '01835497781', 0, 1, 0),
(309, 6, NULL, 'b2a1823e6edba1809de8ad320fa8f1ed', 16, 'Md. Amjad ', '2019-01-20', 1, '01715819219', 0, 1, 0),
(310, 6, NULL, '3e114cadcdb1e1ce40c5f69d40712aee', 16, 'Md. Dalower Hossain ', '2019-01-20', 1, '01914849902', 0, 1, 0),
(311, 6, NULL, '76f64883f992f4841e9dd9db943f8984', 16, 'Md. Jahngir ', '2019-01-20', 1, '01960800211', 0, 1, 0),
(312, 6, NULL, '356a0e19d5bb71bb8d334733050907a6', 16, 'Abdul Bashar ', '2019-01-20', 1, '01722026600', 0, 1, 0),
(313, 6, NULL, '4e47d78114c5a8918cca30b3eb42cc75', 16, 'Md. Litan Akon ', '2019-01-20', 1, '01786693250', 0, 1, 0),
(314, 6, NULL, '5896aa766fd5d5a1105c35cda3e96d35', 16, 'Heal Mahmad ', '2019-01-20', 1, '01712081008', 0, 1, 0),
(315, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Md. Badrul Alam Shipon ', '2019-01-20', 1, '0', 0, 1, 0),
(316, 6, NULL, '1963107acbeb131e5cdd9b57c7ea89ac', 16, 'Md. Masud Rana ', '2019-01-20', 1, '01749972072', 0, 1, 0),
(317, 6, NULL, 'bd7543bb896082d236472d9cb36cf720', 16, 'Md. Ferouz Mahmud', '2019-01-20', 1, '01712472015', 0, 1, 0),
(318, 6, NULL, '539cc655ea030da1f4f31d20c480d6c1', 16, 'Md. Abu Bokkor Shiddik Ripon ', '2019-01-20', 1, '01924958344', 0, 1, 0),
(319, 6, NULL, 'ee4c0e9e9ea69df73be7e0b9fb256390', 16, 'Md. Habib Islam ', '2019-01-20', 1, '01722902003', 0, 1, 0),
(320, 6, NULL, '0efa5bade15c82772d4692feb0f497a7', 16, 'Mohammad Saiful Islam ', '2019-01-20', 1, '01764788893', 0, 1, 0),
(321, 6, NULL, '5339721d1a0771f681b81d0155bd4d85', 16, 'Md. Milon Hossain ', '2019-01-20', 1, '01948634744', 0, 1, 0),
(322, 6, NULL, 'cfcd208495d565ef66e7dff9f98764da', 16, 'Santu Mia ', '2019-01-20', 1, '0', 0, 1, 0),
(323, 6, NULL, '12f70103f37562a1be973055add5fd04', 16, 'Abul Kalam Manshi ', '2019-01-20', 1, '01734349394', 0, 1, 0),
(324, 6, NULL, '8dc9224e23803c61a13904a87fe10f02', 16, 'Md. Monir Hossen ', '2019-01-20', 1, '01991633355', 0, 1, 0),
(325, 6, NULL, '24d025e239bffe4fb607c2910b4db4e2', 16, 'Alamgir Hossain ', '2019-01-20', 1, '01932600639', 0, 1, 0),
(326, 6, NULL, 'a88ab5cb56cfd57cd26ad7616b63f82b', 16, 'Amdadul Shikder ', '2019-01-20', 1, '01751938945', 0, 1, 0),
(327, 6, NULL, 'c1cea7f42ad7807f763e6e705a2ca0cf', 16, 'Md. Feroj Ahmed ', '2019-01-20', 1, '01714495061', 0, 1, 0),
(328, 6, NULL, '4f73cfd8b1984b8733508bb7269ca0d9', 16, 'Md. Shakhoyat Hossan ', '2019-01-20', 1, '01924527164', 0, 1, 0),
(329, 6, NULL, '007b3e87a14cbf7eb718bdf62500a085', 16, 'Md. Ikbal Mullik ', '2019-01-21', 1, '01910761859', 0, 1, 0),
(330, 4, NULL, 'ac57b0f62f0cbdb5c43a05d742392ddd', 16, 'Mohammad Musfequs Saeheen', '2019-01-21', 1, '01819790408', 0, 1, 0),
(331, 4, NULL, 'a697f063c6295dbedcedd92c2cbd363b', 16, 'Hosian Kibria ', '2019-01-21', 1, '01737686722', 0, 1, 0),
(332, 4, NULL, '26d30cc28bb540537f2cd888fcd84deb', 16, 'Kamal', '2019-01-21', 1, '01714446757', 0, 1, 0),
(333, 4, NULL, 'e998d886bb289bff13f07ab142e250d8', 16, 'Habibur Rahman', '2019-01-21', 1, '01754540587', 0, 1, 0),
(334, 4, NULL, '653d9f8513f1457ce90defb51db8821c', 16, 'MD. Murshedul Haque', '2019-01-21', 1, '01716968772', 0, 1, 0),
(335, 4, NULL, 'd334b5b3cf9dafdee56fd6cb8b017d77', 16, 'Samsul Huda', '2019-01-21', 1, '01817079159', 0, 1, 0),
(336, 4, NULL, '2fbbdd24b73ddb0b80681feb89d2b351', 16, 'Harunar Rashid', '2019-01-21', 1, '01712588352', 0, 1, 0),
(337, 4, NULL, '682653abc6e561321c01d0725da11332', 16, 'Dr. Jahangir Alam', '2019-01-21', 1, '01712027371', 0, 1, 0),
(338, 4, NULL, '3996edce9130b0ae5733cddfba7d9fe0', 16, 'Prodip Kumar Das', '2019-01-21', 1, '01715434913', 0, 1, 0),
(339, 4, NULL, '6c095ced589036a74c07b1b2d74645d7', 16, 'MD. Sharower Hossain', '2019-01-21', 1, '01552469989', 0, 1, 0),
(340, 4, NULL, '0928fd7729b9cc2a3ad37297bdcee754', 16, 'MD. Motalab', '2019-01-21', 1, '01758109926', 0, 1, 0),
(341, 4, NULL, '01e6ac91c10bec2c6bed22a3f0cb37a0', 16, 'Mohammad Oliulla', '2019-01-21', 1, '01672592257', 0, 1, 0),
(342, 4, NULL, 'd41bdacbd8f202a3bd961cb6a07f67e6', 16, 'MD. Abdul Karim', '2019-01-21', 1, '01712684258', 0, 1, 0),
(343, 6, NULL, '96a3be3cf272e017046d1b2674a52bd3', 16, 'Jihadul Islam ', '2019-01-22', 1, '01', 0, 1, 0),
(344, 6, NULL, '0a2febe7869443e5868c4ee0cdf17450', 16, 'Md. Abu Rasel ', '2019-01-23', 1, '017400900178', 0, 1, 0),
(345, 6, NULL, 'd4cefffb7c21b9a4adfe0f4b7867ac28', 16, 'Anayet Hossain ', '2019-01-23', 1, '01792224223', 0, 1, 0),
(346, 6, NULL, 'cd471893d99098d9dc78642a0ec1dbf5', 16, 'Ariful Islam ', '2019-01-23', 1, '01814784562', 0, 1, 0),
(347, 6, NULL, '0af4404c8d6c3013757cdcf515f69399', 16, 'Md. Rezaul Karim ', '2019-01-23', 1, '01718653736', 0, 1, 0),
(348, 6, NULL, '80bff3874df413f3220e51256bdb7b5c', 16, 'Md. Ali ', '2019-01-23', 1, '01677482295', 0, 1, 0),
(349, 6, NULL, '099acb737932db11e1081888839afe29', 16, 'Mohammad Ali', '2019-01-23', 1, '01912150951', 0, 1, 0),
(350, 6, NULL, 'a38ca8f947e8004866db593ee5422716', 16, 'Ahidur Rahman ', '2019-01-23', 1, '01948148003', 0, 1, 0),
(351, 6, NULL, '271a80661dc6ec691a05729139c815d4', 16, 'Monirujjaman Manir ', '2019-01-23', 1, '01627284197', 0, 1, 0),
(352, 6, NULL, '5537b794336f94794e8a87e29b54a14d', 16, 'Md. Nazrul Islam ', '2019-01-23', 1, '01710622350', 0, 1, 0),
(353, 6, NULL, '2e1298af806c679e200a963005f28f6f', 16, 'Munsur Ahamed ', '2019-01-23', 1, '01713623762', 0, 1, 0),
(354, 6, NULL, '9181569cd1411ee9ae1bcf0d4107eb14', 16, 'Abdul Majid Molla ', '2019-01-23', 1, '01933361910', 0, 1, 0),
(355, 6, NULL, 'ef3b0d7bfc1b10a8ef580ba05b3756f8', 16, 'Md. Sentu Hosen', '2019-01-23', 1, '01776797671', 0, 1, 0),
(356, 6, NULL, 'bb10636eb0f2871983a79c4f290dca9b', 16, 'Md. Sidul Islam ', '2019-01-23', 1, '01941552680', 0, 1, 0),
(357, 6, NULL, 'c834abf755c58fad639a6193abff66bd', 16, 'Md. Anowar Hosan ', '2019-01-23', 1, '01884914983', 0, 1, 0),
(358, 6, NULL, 'ebaf92797017e734cc98181bd155e0c0', 16, 'Hafeza Md. Eiles ', '2019-01-23', 1, '01741692212', 0, 1, 0),
(359, 6, NULL, '4446370dad5fbeb8528717212e2e11e6', 16, 'Md. Mannan ', '2019-01-23', 1, '01792414993', 0, 1, 0),
(360, 4, NULL, '5bf983010da9a3f699822d066730a571', 16, 'Hashem Ali', '2019-01-23', 1, '01713371403', 0, 1, 0),
(361, 4, NULL, '83bfd620853c37cc58c1e796dd628fd4', 16, 'Abdul Owahab Khan', '2019-01-23', 1, '01988984833', 0, 1, 0),
(362, 4, NULL, 'ac8ffa6f0f4b594651ed8a31f88fe302', 16, 'Bozulur Rahman', '2019-01-23', 1, '01674308857', 0, 1, 0),
(363, 4, NULL, 'dbd1f6373adaf8301f853b2962dc2447', 16, 'Monayem Khan', '2019-01-23', 1, '01740574326', 0, 1, 0),
(364, 6, NULL, '6121ef7a508bf18fb617fbc1300e0b84', 16, 'Kobir Hosen ', '2019-01-23', 1, '019928545731', 0, 1, 0),
(365, 6, NULL, '6121ef7a508bf18fb617fbc1300e0b84', 16, 'Asadul Sheikh ', '2019-01-23', 1, '019928545731', 0, 1, 0),
(366, 4, NULL, 'f62aeb95d20372bee8fadaf3258c69e6', 16, 'Kazi Abdul Aziz', '2019-01-23', 1, '01686408227', 0, 1, 0),
(367, 4, NULL, '8d1bc4fa6bcfc82908c3bbc50a683bd5', 16, 'Shihab Hossain', '2019-01-23', 1, '01552358070', 0, 1, 0),
(368, 4, NULL, '8302bf85cf3ca112461eada195532a7f', 16, 'MD. Sayem Ahamed', '2019-01-23', 1, '01911384050', 0, 1, 0),
(369, 4, NULL, '6d4993f366725e2733a286396fa232af', 16, 'Abdul Bashar', '2019-01-23', 1, '01818619063', 0, 1, 0),
(370, 6, NULL, '7c29f542d63141fc773e3457246d9acf', 16, 'Sumon Khan ', '2019-01-23', 1, '01720222328', 0, 1, 0),
(371, 4, NULL, 'c7c8f1810eff82a6610880d2aa3eed7c', 16, 'Srajul Islam', '2019-01-23', 1, '01712290157', 0, 1, 0),
(372, 4, NULL, 'aba65378ae52ffd24b9b00c0b5f200b2', 16, 'MD. Jamal uddin', '2019-01-23', 1, '01713927865, 01914878515', 0, 1, 0),
(373, 4, NULL, '66570ac50f5d3d4a18aad37492a2c464', 16, 'Sorwar Hossain', '2019-01-23', 1, '01738655789', 0, 1, 0),
(374, 4, NULL, 'c7393724892896e2dc5f3c01c5e4692e', 16, 'Ajaharul islam', '2019-01-23', 1, '01713581806', 0, 1, 0),
(375, 4, NULL, 'ef4ebb8d4aa126640e8cc3f017f949b0', 16, 'MD. Roni', '2019-01-23', 1, '01675703882', 0, 1, 0),
(376, 6, NULL, 'f8d2efb8736f239e461a889be13c82a1', 16, 'Md. Fazulr Rahman Bhuyan ', '2019-01-23', 1, '01726694948', 0, 1, 0),
(377, 4, NULL, 'f20dc227b86c7c83eb6a18a46ffadc46', 16, 'Samsul Haque', '2019-01-23', 1, '01922556198', 0, 1, 0),
(378, 4, NULL, '609a55915046774895f2082c4ae9188a', 16, 'Fariduzzaman', '2019-01-23', 1, '01916143261', 0, 1, 0),
(379, 4, NULL, 'bbfbeeecfc8159c7e8c81e3ab6da8672', 16, 'Jalal Uddin( Emon)', '2019-01-23', 1, '01921699385', 0, 1, 0),
(380, 4, NULL, '99aac81d91d720b87bc08c71b2b3eec2', 16, 'MD. Amin', '2019-01-23', 1, '01719888660', 0, 1, 0),
(381, 6, NULL, '4ce8a40e53083c404d05ffc08c44ece6', 16, 'Abdul Mannan ', '2019-01-23', 1, '01724486021', 0, 1, 0),
(382, 6, NULL, '4ef510d7977adb7bf0b5bbc2fd998dea', 16, 'Rashed Ahamed ', '2019-01-23', 1, '01533403082', 0, 1, 0),
(383, 6, NULL, '8cc0ffd3f6a92d0e0a38cbef8a65e490', 16, 'Suman Chandra Pual ', '2019-01-23', 1, '01754901435', 0, 1, 0),
(384, 6, NULL, 'f5c6c39627ab12ed2114be502bc4c8b7', 16, 'Bidhan Kumar Podder ', '2019-01-23', 1, '01720956041', 0, 1, 0),
(385, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Md. Jasim Uddin ', '2019-01-23', 1, 'Due ', 0, 1, 0),
(386, 6, NULL, 'e90b8b067bab61e6fcbd8ff4dbd9fe02', 16, 'Md. Aiub Ali ', '2019-01-23', 1, '01966160198', 0, 1, 0),
(387, 6, NULL, '67fcdf751d5b2508ebe965c2b1cd7fab', 16, 'Md. Roni Hasan ', '2019-01-23', 1, '01715620071', 0, 1, 0),
(388, 6, NULL, '73d2a77c22839abf5b8d0e2d760b0d72', 16, 'Md. nasir Uddin ', '2019-01-23', 1, '01970807384', 0, 1, 0),
(389, 6, NULL, 'fe303719347bfcfa2bb441e3257edce9', 16, 'M. Hayder Shams ', '2019-01-23', 1, '01680877299', 0, 1, 0),
(390, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Due ', '2019-01-23', 1, 'Due ', 0, 1, 0),
(391, 6, NULL, '13cd0810caaa70fd706081ba162300f5', 16, 'Mohammad Saiful Islam ', '2019-01-23', 1, '0176788893', 0, 1, 0),
(392, 6, NULL, 'e6212fa519e44723dcaff5aefa655916', 16, 'Jontu Lal Halder ', '2019-01-23', 1, '01639456533', 0, 1, 0),
(393, 6, NULL, 'd92993395a8b3308dc88128cb09a9157', 16, 'Md. Aslam Kazi ', '2019-01-23', 1, '01733742021', 0, 1, 0),
(394, 6, NULL, '5fab6f36df57d0bed28152892a539817', 16, 'Hannan Mia', '2019-01-23', 1, '01911161802', 0, 1, 0),
(395, 6, NULL, '93825c6e348ff7f2cf49634d3f3b5d84', 16, 'Anwar Hosan ', '2019-01-23', 1, '01748973527', 0, 1, 0),
(396, 6, NULL, '85ea3111bac53fa2a8c080ba1cdbec6c', 16, 'Mhamud Hasan ', '2019-01-23', 1, '01715116133', 0, 1, 0),
(397, 6, NULL, '19e33c6d580e0d36a8dac6fc9e7f71aa', 16, 'Md. Nasir Hossain ', '2019-01-23', 1, '01765589657', 0, 1, 0),
(398, 6, NULL, '26b674cebbe0352c36ca8f54fbebad9e', 16, 'Belal Hossain ', '2019-01-23', 1, '01707771751', 0, 1, 0),
(399, 6, NULL, '511a6317daf1db160274d4ead1b654b2', 16, 'Md. Abu Sateid ', '2019-01-23', 1, '01953647080', 0, 1, 0),
(400, 6, NULL, '1a372c183d7bdf6c20274594669a27b9', 16, 'Md. Johurul Islam ', '2019-01-23', 1, '01717176394', 0, 1, 0),
(401, 6, NULL, '4c8062013f93062e60bd047b77f4cecf', 16, 'Khorshed Alam ', '2019-01-24', 1, '01938718153', 0, 1, 0),
(402, 6, NULL, 'ea40d592b66afbfda0d7243fb7d8d12f', 16, 'Alauddin Howlader ', '2019-01-24', 1, '01986810461', 0, 1, 0),
(403, 6, NULL, 'fbe7840a2018c463e2f3928a90f73d27', 16, 'Md. Shohel ', '2019-01-24', 1, '01933788424', 0, 1, 0),
(404, 6, NULL, '8f78968dea3a2fba54dba91e4466deb9', 16, 'Md. Abdul Manan Ali', '2019-01-24', 1, '01718964489', 0, 1, 0),
(405, 6, NULL, '8f78968dea3a2fba54dba91e4466deb9', 16, 'Md. Abdul Manan Ali', '2019-01-24', 1, '01718964489', 0, 1, 0),
(406, 6, NULL, '940c6902ff18837f471eb455c9938d1b', 16, 'Md. Jewel Rana ', '2019-01-24', 1, '01913460858', 0, 1, 0),
(407, 4, NULL, 'c8403dc7f92772a7b0a55c5be0c5cf4d', 16, 'MD. Kamrul Islam', '2019-01-24', 1, '01797253068', 0, 1, 0),
(408, 4, NULL, '9d10229e0636ffeffa80b2a30abfac8d', 16, 'Raquibul Hasan', '2019-01-24', 1, '01717853122', 0, 1, 0),
(409, 6, NULL, '848517679cd944d20a5529ba4437ac0b', 16, 'Md. Morad Hossain ', '2019-01-24', 1, '01790643908', 0, 1, 0),
(410, 4, NULL, 'ce6e6a3c58a56eed67f0b0bb36a00407', 16, 'MD. Zahidul ALam (Zahid)', '2019-01-24', 1, '01714200170', 0, 1, 0),
(411, 6, NULL, '2f2a18f40cf9cf3d77409eba4c9792e2', 16, 'Md. Anisul Haque ', '2019-01-24', 1, '01914232257', 0, 1, 0),
(412, 4, NULL, '650dd635a3c10bfb27b47b1463d0468b', 16, 'Shohel Ahmed', '2019-01-24', 1, '01924707451', 0, 1, 0),
(413, 4, NULL, 'f99362ea5a207155c6958145f804cd18', 16, 'MD. Mazidul Islam', '2019-01-24', 1, '01792033567', 0, 1, 0),
(414, 4, NULL, 'c2b5b0f2882e29eff7fcc5acc6496d18', 16, 'MD. Rafiquel Islam', '2019-01-24', 1, '01711024281', 0, 1, 0),
(415, 4, NULL, 'dba3f3b3684beb20e369371cddaab147', 16, 'Bikash Chandol Mandol', '2019-01-24', 1, '01710953056', 0, 1, 0),
(416, 4, NULL, '5c770fe14eceb41e002ee8955b9ddb18', 16, 'Mainul Islam', '2019-01-24', 1, '01711231608', 0, 1, 0),
(417, 4, NULL, '785ed97e72b2f62a3b71c068dc72292f', 16, 'Hosin ferdour Shsir', '2019-01-24', 1, '01715547187', 0, 1, 0),
(418, 6, NULL, '63f6a4400976a36e0ee52b9b52953184', 16, 'Md. Abu Naser Owahed ', '2019-01-24', 1, '01708985800', 0, 1, 0),
(419, 4, NULL, 'd49a16c6c20bb7231d61eb4a87e2c552', 16, 'Yeasin Arafat', '2019-01-24', 1, '01788650456', 0, 1, 0),
(420, 6, NULL, 'b5ab94b96df304bb7358e13af85e9092', 16, 'Md. Mominul Islam ', '2019-01-24', 1, '01712055348', 0, 1, 0),
(421, 4, NULL, '3ba22e1fdda25268b1290c92e8fb9018', 16, 'Sharif Golam Kawsar', '2019-01-24', 1, '01712280733', 0, 1, 0),
(422, 6, NULL, 'cc0d09c635233e39d29a0fd79ac2a573', 16, 'Md. Badol Hossen ', '2019-01-24', 1, '01552335893', 0, 1, 0),
(423, 4, NULL, 'be65f3bf9aea00c987b4a99767316eb2', 16, 'Jakir Hossen', '2019-01-24', 1, '01678022709', 0, 1, 0),
(424, 6, NULL, '70e9ff7d79b568c6dc4e472add57c97a', 16, 'Md. Soliman Ali ', '2019-01-24', 1, '01729071789', 0, 1, 0),
(425, 6, NULL, '5d80de072accc6451781060016702d61', 16, 'Md. Alamgir Hossain ', '2019-01-24', 1, '01713093706', 0, 1, 0),
(426, 6, NULL, 'f4bc0df0e42fb5c8569c4bffaf4b6fbd', 16, 'Md. Selim ', '2019-01-24', 1, '01731012669', 0, 1, 0),
(427, 6, NULL, 'cab33d4f97a4300f4d834369cdee0a40', 16, 'Md. Abjal Hosan ', '2019-01-24', 1, '01948356096', 0, 1, 0),
(428, 6, NULL, 'e7397e38d6608fbe4257ce5626f673dc', 16, 'Sajedul Karim ', '2019-01-24', 1, '01775053316', 0, 1, 0),
(429, 4, NULL, 'a2b3d88779d073d9fa0aeb70e02c52ed', 16, 'MD. Roknuzzaman', '2019-01-24', 1, '01819556485', 0, 1, 0),
(430, 4, NULL, 'b2443d7c6ba24f285bcb589aabb6a403', 16, 'Abdul Sattar', '2019-01-24', 1, '01881659416', 0, 1, 0),
(431, 4, NULL, 'fe552af6ca23d7096734518817dd62b8', 16, 'Elius Mia', '2019-01-24', 1, '01711200450', 0, 1, 0),
(432, 4, NULL, 'd0c99c802e35ce19b21726a2519a0978', 16, 'Zahid Kamal ', '2019-01-24', 1, '01714920005', 0, 1, 0),
(433, 4, NULL, '5753b1f5ad83e3b5c6e2a06f41ec0b47', 16, 'Emon', '2019-01-24', 1, '01785298242', 0, 1, 0),
(434, 4, NULL, '1a6cb4904de7e8b2cfb53b1bd374231a', 16, 'MD. Rezaul Karim ', '2019-01-24', 1, '01914702746', 0, 1, 0),
(435, 4, NULL, 'd3989c620d1e8c0b7d601005edb13ba6', 16, 'MD. Mosharaf Hossain Molla', '2019-01-24', 1, '01711314000', 0, 1, 0),
(436, 4, NULL, 'a10a7479a95615a44534a4d0bd409337', 16, 'Abu Naser', '2019-01-24', 1, '01711392359', 0, 1, 0),
(437, 4, NULL, '277cd16d3e422d8cf3df1055c8b49772', 16, 'Kamruzaman ', '2019-01-24', 1, '01843516484', 0, 1, 0),
(438, 4, NULL, 'c78e2c6c04cc82d4cccbac2d867eb92f', 16, 'K.M Abul Kalam Azad', '2019-01-24', 1, '01711136902', 0, 1, 0),
(439, 4, NULL, '5c0469aeb91af369e304d428bf575b30', 16, 'MD. Fareq Hossain ', '2019-01-24', 1, '01717346502', 0, 1, 0),
(440, 4, NULL, 'c141b7a7cceee19dccfcf73b4e7a197d', 16, 'Shalim Mullah', '2019-01-24', 1, '01937261866', 0, 1, 0),
(441, 4, NULL, 'd7b5492091dda514bcdb867740726ab7', 16, 'S.M Fayzur Rahman', '2019-01-24', 1, '01552381962', 0, 1, 0),
(442, 4, NULL, 'bece5a6253aa35bd6388d738733be1cb', 16, 'Zahrul Islam ', '2019-01-24', 1, '01741565333', 0, 1, 0),
(443, 4, NULL, 'e838bc6cfb6eeaf7771d4d6808b78b85', 16, 'DR. MD. Mizanur Rahman ', '2019-01-24', 1, '01711131492', 0, 1, 0),
(444, 4, NULL, '44fbe9c0ab9a53420932162119cbd2d4', 16, 'Nurul Alam ', '2019-01-24', 1, '01681049205', 0, 1, 0),
(445, 4, NULL, '0455e5b7f48b2e3ccca2413a56724dd6', 16, 'Akter Hossain ', '2019-01-24', 1, '01741653087', 0, 1, 0),
(446, 4, NULL, '1326b6059a40e4157663d191a24f82d3', 16, 'MD. Moslem Uddin Sarker', '2019-01-24', 1, '01552342843', 0, 1, 0),
(447, 4, NULL, '6a0c6f9c0b0b0b6404489634d54926e2', 16, 'Mojammal Haque', '2019-01-24', 1, '01822954111', 0, 1, 0);
INSERT INTO `user` (`id`, `BranchId`, `EmployeeId`, `password`, `role_id`, `name`, `reg_date`, `status`, `user_name`, `IsAdmin`, `is_parents`, `is_employee`) VALUES
(448, 4, NULL, '6e9b151e45c5f0e0a5892d4433120048', 16, 'MD. Mizanur Rahman ', '2019-01-24', 1, '01848238827', 0, 1, 0),
(449, 4, NULL, 'e666cb60469fa9c27635a5efa90f4723', 16, 'Ariful Islam ', '2019-01-24', 1, '01718163085', 0, 1, 0),
(450, 4, NULL, '3bc88dc7b980086a86124c4c76370abe', 16, 'MD. Mohibur Rahman ', '2019-01-24', 1, '01911232334', 0, 1, 0),
(451, 4, NULL, '8e91381833a5c503a0fbfde378464a3e', 16, 'MD. Mahabub Hasan', '2019-01-24', 1, '01678062309', 0, 1, 0),
(452, 4, NULL, '8b8c2f38942d43e4eb34b7e4a4bf0e22', 16, 'KH. Mahfug Munzur (Monzur)', '2019-01-24', 1, '01711476068', 0, 1, 0),
(453, 4, NULL, '0f51f3a19e31488f2487f5a59cb96db3', 16, 'MD. Abul Hashem', '2019-01-24', 1, '01817584753', 0, 1, 0),
(454, 4, NULL, '633a9ce571799438ab3c18bf9cd00123', 16, 'MD. Raziul Karim', '2019-01-24', 1, '01717250068', 0, 1, 0),
(455, 4, NULL, '76b46b14fc46908ec59ac20890df35ed', 16, 'Rafiqul Haque Shikder', '2019-01-24', 1, '01778917571', 0, 1, 0),
(456, 4, NULL, '2728dfc54fac8407b37442f433ab7a4c', 16, 'MD. Yiamin Ali', '2019-01-24', 1, '01742969041', 0, 1, 0),
(457, 4, NULL, 'a368cfa586318b5eab21edb5d1e09f0c', 16, 'MD. Nazrul Islam Shikder', '2019-01-24', 1, '01716283386', 0, 1, 0),
(458, 6, NULL, '18495008c4868d12b104e6ea17ffe5b0', 16, 'Md. Shahadat Hossain ', '2019-01-26', 1, '01711022012', 0, 1, 0),
(459, 6, NULL, '8dc9224e23803c61a13904a87fe10f02', 16, 'Md. Monir Hossen ', '2019-01-26', 1, '01991633355', 0, 1, 0),
(460, 6, NULL, 'b75c1753d78b172511a36203a3cec119', 16, 'Md. Mijanur Rahaman ', '2019-01-26', 1, '01764519860', 0, 1, 0),
(461, 6, NULL, '241267735f32fe0317392b6bd67f60ff', 16, 'Syed Siddiqur Rahaman ', '2019-01-26', 1, '01717039065', 0, 1, 0),
(462, 6, NULL, '6e87fc56543d55288583626144ced9e2', 16, 'Hamidul Islam ', '2019-01-26', 1, '01679178961', 0, 1, 0),
(463, 6, NULL, '194b183e88f8d6e439a67cc5f5e2b7c5', 16, 'Md. Shajahan ', '2019-01-26', 1, '01726020249', 0, 1, 0),
(464, 6, NULL, 'a46db8ff3dc4aa86148e98881716843f', 16, 'Md. Ashraf Ali ', '2019-01-26', 1, '01715024460', 0, 1, 0),
(465, 6, NULL, '511a6317daf1db160274d4ead1b654b2', 16, 'Md.Abu Sayed ', '2019-01-26', 1, '01953647080', 0, 1, 0),
(466, 6, NULL, 'a5974b1b88f72c99ab71c0e930ec6d58', 16, 'Late Md. Sadik Hossain ', '2019-01-26', 1, '01929030882', 0, 1, 0),
(467, 6, NULL, '3a668364f1dbebb82cf9a81da4352b32', 16, 'Md. Shah Alom ', '2019-01-26', 1, '01882404398', 0, 1, 0),
(468, 6, NULL, 'f4fc38c1cf4673bd418f58e909e4756d', 16, 'Mizanur Rahman ', '2019-01-26', 1, '01733848806', 0, 1, 0),
(469, 6, NULL, '014b8230284652dcda9a82008414dd30', 16, 'Md. Titu ', '2019-01-26', 1, '01718304106', 0, 1, 0),
(470, 6, NULL, 'cfab6cdea93966f4a508a29993b3ee0a', 16, 'Md. Mahfujur Rahman ', '2019-01-26', 1, '01718957392', 0, 1, 0),
(471, 6, NULL, '9dec6ac8cb401ac2a6e75f49cee402b5', 16, 'Md. Shakhawat Ali ', '2019-01-26', 1, '01816601412', 0, 1, 0),
(472, 6, NULL, '493eba9c1dc6896c680cafeb6f934618', 16, 'Md. Jasim Uddin ', '2019-01-26', 1, 'Due ', 0, 1, 0),
(473, 6, NULL, '8e40390a8bd6165fe906f5fcba4d6441', 16, 'Md. Hafujur Sheikh ', '2019-01-26', 1, '01929109053', 0, 1, 0),
(474, 6, NULL, 'eb209dbe414de25189aaedc99a20ca1f', 16, 'Shorab Hossen Shajada ', '2019-01-27', 1, '01718811568', 0, 1, 0),
(475, 6, NULL, 'b97065daa93e6b41366f6106b3e21867', 16, 'Md. Alomgir Hosen', '2019-01-27', 1, '01726880856', 0, 1, 0),
(476, 6, NULL, '8512d290de9cc92e3b3c8aba5e9dc87d', 16, 'T.M. Asafuddowla Rana ', '2019-01-27', 1, '01755533431', 0, 1, 0),
(477, 6, NULL, '06d689473c04d4babe53c68748a5c20f', 16, 'Musiur Rahman ', '2019-01-27', 1, '01734861879', 0, 1, 0),
(478, 6, NULL, '06d689473c04d4babe53c68748a5c20f', 16, 'Musiur Rahman ', '2019-01-27', 1, '01734861879', 0, 1, 0),
(479, 6, NULL, 'e7f6d310b4a3af65bc3b6b6d10de18cb', 16, 'Md. Abul Kalam ', '2019-01-27', 1, '01936557213', 0, 1, 0),
(480, 6, NULL, 'e7f6d310b4a3af65bc3b6b6d10de18cb', 16, 'Md. Abul Kalam ', '2019-01-28', 1, '01936557213', 0, 1, 0),
(481, 6, NULL, 'c834abf755c58fad639a6193abff66bd', 16, 'Md. Anar Mia ', '2019-01-28', 1, '01884914983', 0, 1, 0),
(482, 6, NULL, '606d0f9c381005149b34ceedf5976d69', 16, 'Shek Shokot ', '2019-01-28', 1, '01711577726', 0, 1, 0),
(483, 6, NULL, '46441e9c237c5198f5b93a043924031b', 16, 'Jinnah Akand ', '2019-01-28', 1, '01746323134', 0, 1, 0),
(484, 6, NULL, '46441e9c237c5198f5b93a043924031b', 16, 'Jinnah Akand ', '2019-01-28', 1, '01746323134', 0, 1, 0),
(485, 6, NULL, '194b183e88f8d6e439a67cc5f5e2b7c5', 16, 'Md. Shamim ', '2019-01-28', 1, '01726020249', 0, 1, 0),
(486, 6, NULL, 'fa841d63ebab8cc9a81ee773fa423dcc', 16, 'Mizanur Hossen ', '2019-01-28', 1, '01719988563', 0, 1, 0),
(487, 6, NULL, '409135a8a106819d5dae767ce7909683', 16, 'Md. Ismail Hossen ', '2019-01-28', 1, '01924461125', 0, 1, 0),
(488, 6, NULL, '9e807b8dd8a3b1f4cd5dacdaaaec2045', 16, 'Md. Shahjahen ', '2019-01-28', 1, '01953694702', 0, 1, 0),
(489, 6, NULL, 'cbb3cf1a1d07bd1cb3d002a586f6a60e', 16, 'Md. Abul Bashar ', '2019-01-28', 1, '01700881476', 0, 1, 0),
(490, 4, NULL, '25f9e794323b453885f5181f1b624d0b', 15, 'ASif', '2019-02-01', 1, '123456789', 0, 0, 1),
(491, 4, NULL, 'e3b748d09dd531a50791d40f6e87cc23', 18, 'Afzal Vai', '2019-02-01', 1, '098765432100', 0, 0, 1),
(492, 4, NULL, '6b99c9e58db3260e7171aeb0313bc436', 16, 'sha alam', '2019-03-07', 1, '01654879952', 0, 1, 0),
(493, 6, NULL, '25d55ad283aa400af464c76d713c07ad', 15, 'shetu', '2019-04-02', 1, 'shetu', 0, 0, 0),
(494, 4, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 16, 'dsdsd', '2019-04-14', 1, '', 0, 1, 0),
(495, 4, NULL, '1974c89bcba455fb99b0a50b7e6ccc89', 16, 'eeeeeeeeeeeee', '2019-04-14', 1, '09872654567', 0, 1, 0);

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
  `is_editable` tinyint(1) DEFAULT '1',
  `is_teacher` tinyint(1) DEFAULT '0',
  `is_parent` tinyint(1) DEFAULT '0',
  `is_payroll` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `role_description`, `parent_id`, `lft`, `rgt`, `is_editable`, `is_teacher`, `is_parent`, `is_payroll`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, 1, 38, 0, 0, 0, 0),
(15, 'Teacher', 'Teacher', NULL, NULL, NULL, 0, 1, 0, 0),
(16, 'Parent', 'Parents', NULL, NULL, NULL, 0, 0, 1, 0),
(17, 'Admin', 'Admin', NULL, NULL, NULL, 1, 0, 0, 0),
(18, 'Payroll', 'Patrol User', NULL, NULL, NULL, 0, 0, 0, 1);

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
(11896, 'employees', 'index', 18, NULL),
(11897, 'employees', 'view', 18, NULL),
(11898, 'employees', 'edit', 18, NULL),
(11899, 'leave_applies', 'index', 18, NULL),
(11900, 'leave_applies', 'view', 18, NULL),
(11901, 'leave_applies', 'add', 18, NULL),
(11902, 'leave_applies', 'edit', 18, NULL),
(11903, 'leave_applies', 'delete', 18, NULL),
(11954, 'exam_routines', 'index', 15, NULL),
(11955, 'exam_routines', 'view', 15, NULL),
(11956, 'exam_routines', 'add', 15, NULL),
(11957, 'exam_routines', 'edit', 15, NULL),
(11958, 'exam_routines', 'delete', 15, NULL),
(11959, 'manage_marks', 'index', 15, NULL),
(11960, 'manage_marks', 'view', 15, NULL),
(11961, 'manage_marks', 'add', 15, NULL),
(11962, 'manage_marks', 'edit', 15, NULL),
(11963, 'manage_marks', 'delete', 15, NULL),
(11964, 'report_tabulation_sheets', 'index', 15, NULL),
(11965, 'report_tabulation_sheets', 'view', 15, NULL),
(11966, 'report_tabulation_sheets', 'add', 15, NULL),
(11967, 'report_tabulation_sheets', 'edit', 15, NULL),
(11968, 'report_tabulation_sheets', 'delete', 15, NULL),
(11969, 'report_mark_sheets', 'index', 15, NULL),
(11970, 'report_mark_sheets', 'view', 15, NULL),
(11971, 'report_mark_sheets', 'add', 15, NULL),
(11972, 'report_mark_sheets', 'edit', 15, NULL),
(11973, 'report_mark_sheets', 'delete', 15, NULL),
(11974, 'admit_cards', 'index', 15, NULL),
(11975, 'admit_cards', 'view', 15, NULL),
(11976, 'admit_cards', 'add', 15, NULL),
(11977, 'admit_cards', 'edit', 15, NULL),
(11978, 'admit_cards', 'delete', 15, NULL),
(11979, 'employees', 'index', 15, NULL),
(11980, 'employees', 'view', 15, NULL),
(11981, 'leave_applies', 'index', 15, NULL),
(11982, 'leave_applies', 'view', 15, NULL),
(11983, 'leave_applies', 'add', 15, NULL),
(11984, 'employee_attendances', 'index', 15, NULL),
(11985, 'employee_attendances', 'view', 15, NULL),
(11986, 'employee_attendances', 'add', 15, NULL),
(11987, 'users', 'change_password', 15, NULL),
(11988, 'report_attendance_registers', 'index', 15, NULL),
(11989, 'report_attendance_registers', 'view', 15, NULL),
(11990, 'report_attendance_registers', 'add', 15, NULL),
(11991, 'report_attendance_registers', 'edit', 15, NULL),
(11992, 'report_attendance_registers', 'delete', 15, NULL),
(11993, 'report_student_registers', 'index', 15, NULL),
(11994, 'report_student_registers', 'view', 15, NULL),
(11995, 'report_student_registers', 'add', 15, NULL),
(11996, 'report_student_registers', 'edit', 15, NULL),
(11997, 'report_student_registers', 'delete', 15, NULL),
(11998, 'report_student_dues', 'index', 15, NULL),
(11999, 'report_student_dues', 'view', 15, NULL),
(12000, 'report_student_dues', 'add', 15, NULL),
(12001, 'report_student_dues', 'edit', 15, NULL),
(12002, 'report_student_dues', 'delete', 15, NULL),
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
(13813, 'branches', 'index', 1, NULL),
(13814, 'branches', 'view', 1, NULL),
(13815, 'branches', 'add', 1, NULL),
(13816, 'branches', 'edit', 1, NULL),
(13817, 'branches', 'delete', 1, NULL),
(13818, 'organizations', 'index', 1, NULL),
(13819, 'organizations', 'view', 1, NULL),
(13820, 'organizations', 'add', 1, NULL),
(13821, 'organizations', 'edit', 1, NULL),
(13822, 'organizations', 'delete', 1, NULL),
(13823, 'config_classes', 'index', 1, NULL),
(13824, 'config_classes', 'view', 1, NULL),
(13825, 'config_classes', 'add', 1, NULL),
(13826, 'config_classes', 'edit', 1, NULL),
(13827, 'config_classes', 'delete', 1, NULL),
(13828, 'config_sections', 'index', 1, NULL),
(13829, 'config_sections', 'view', 1, NULL),
(13830, 'config_sections', 'add', 1, NULL),
(13831, 'config_sections', 'edit', 1, NULL),
(13832, 'config_sections', 'delete', 1, NULL),
(13833, 'config_subjects', 'index', 1, NULL),
(13834, 'config_subjects', 'view', 1, NULL),
(13835, 'config_subjects', 'add', 1, NULL),
(13836, 'config_subjects', 'edit', 1, NULL),
(13837, 'config_subjects', 'delete', 1, NULL),
(13838, 'config_class_periods', 'index', 1, NULL),
(13839, 'config_class_periods', 'view', 1, NULL),
(13840, 'config_class_periods', 'add', 1, NULL),
(13841, 'config_class_periods', 'edit', 1, NULL),
(13842, 'config_class_periods', 'delete', 1, NULL),
(13843, 'config_class_routines', 'index', 1, NULL),
(13844, 'config_class_routines', 'view', 1, NULL),
(13845, 'config_class_routines', 'add', 1, NULL),
(13846, 'config_class_routines', 'edit', 1, NULL),
(13847, 'config_class_routines', 'delete', 1, NULL),
(13848, 'students', 'index', 1, NULL),
(13849, 'students', 'view', 1, NULL),
(13850, 'students', 'add', 1, NULL),
(13851, 'students', 'edit', 1, NULL),
(13852, 'students', 'delete', 1, NULL),
(13853, 'batch_students', 'index', 1, NULL),
(13854, 'batch_students', 'view', 1, NULL),
(13855, 'batch_students', 'add', 1, NULL),
(13856, 'batch_students', 'edit', 1, NULL),
(13857, 'batch_students', 'delete', 1, NULL),
(13858, 'student_attendances', 'index', 1, NULL),
(13859, 'student_attendances', 'view', 1, NULL),
(13860, 'student_attendances', 'add', 1, NULL),
(13861, 'student_attendances', 'edit', 1, NULL),
(13862, 'student_attendances', 'delete', 1, NULL),
(13863, 'fee_categories', 'index', 1, NULL),
(13864, 'fee_categories', 'view', 1, NULL),
(13865, 'fee_categories', 'add', 1, NULL),
(13866, 'fee_categories', 'edit', 1, NULL),
(13867, 'fee_categories', 'delete', 1, NULL),
(13868, 'fee_types', 'index', 1, NULL),
(13869, 'fee_types', 'view', 1, NULL),
(13870, 'fee_types', 'add', 1, NULL),
(13871, 'fee_types', 'edit', 1, NULL),
(13872, 'fee_types', 'delete', 1, NULL),
(13873, 'fee_configurations', 'index', 1, NULL),
(13874, 'fee_configurations', 'view', 1, NULL),
(13875, 'fee_configurations', 'add', 1, NULL),
(13876, 'fee_configurations', 'edit', 1, NULL),
(13877, 'fee_configurations', 'delete', 1, NULL),
(13878, 'fees', 'index', 1, NULL),
(13879, 'fees', 'view', 1, NULL),
(13880, 'fees', 'add', 1, NULL),
(13881, 'fees', 'edit', 1, NULL),
(13882, 'fees', 'delete', 1, NULL),
(13883, 'exams', 'index', 1, NULL),
(13884, 'exams', 'view', 1, NULL),
(13885, 'exams', 'add', 1, NULL),
(13886, 'exams', 'edit', 1, NULL),
(13887, 'exams', 'delete', 1, NULL),
(13888, 'exam_routines', 'index', 1, NULL),
(13889, 'exam_routines', 'view', 1, NULL),
(13890, 'exam_routines', 'add', 1, NULL),
(13891, 'exam_routines', 'edit', 1, NULL),
(13892, 'exam_routines', 'delete', 1, NULL),
(13893, 'grade_points', 'index', 1, NULL),
(13894, 'grade_points', 'view', 1, NULL),
(13895, 'grade_points', 'add', 1, NULL),
(13896, 'grade_points', 'edit', 1, NULL),
(13897, 'grade_points', 'delete', 1, NULL),
(13898, 'subject_wise_marks', 'index', 1, NULL),
(13899, 'subject_wise_marks', 'view', 1, NULL),
(13900, 'subject_wise_marks', 'add', 1, NULL),
(13901, 'subject_wise_marks', 'edit', 1, NULL),
(13902, 'subject_wise_marks', 'delete', 1, NULL),
(13903, 'manage_marks', 'index', 1, NULL),
(13904, 'manage_marks', 'view', 1, NULL),
(13905, 'manage_marks', 'add', 1, NULL),
(13906, 'manage_marks', 'edit', 1, NULL),
(13907, 'manage_marks', 'delete', 1, NULL),
(13908, 'report_tabulation_sheets', 'index', 1, NULL),
(13909, 'report_tabulation_sheets', 'view', 1, NULL),
(13910, 'report_tabulation_sheets', 'add', 1, NULL),
(13911, 'report_tabulation_sheets', 'edit', 1, NULL),
(13912, 'report_tabulation_sheets', 'delete', 1, NULL),
(13913, 'report_mark_sheets', 'index', 1, NULL),
(13914, 'report_mark_sheets', 'view', 1, NULL),
(13915, 'report_mark_sheets', 'add', 1, NULL),
(13916, 'report_mark_sheets', 'edit', 1, NULL),
(13917, 'report_mark_sheets', 'delete', 1, NULL),
(13918, 'admit_cards', 'index', 1, NULL),
(13919, 'admit_cards', 'view', 1, NULL),
(13920, 'admit_cards', 'add', 1, NULL),
(13921, 'admit_cards', 'edit', 1, NULL),
(13922, 'admit_cards', 'delete', 1, NULL),
(13923, 'employees', 'index', 1, NULL),
(13924, 'employees', 'view', 1, NULL),
(13925, 'employees', 'add', 1, NULL),
(13926, 'employees', 'edit', 1, NULL),
(13927, 'employees', 'delete', 1, NULL),
(13928, 'employee_departments', 'index', 1, NULL),
(13929, 'employee_departments', 'view', 1, NULL),
(13930, 'employee_departments', 'add', 1, NULL),
(13931, 'employee_departments', 'edit', 1, NULL),
(13932, 'employee_departments', 'delete', 1, NULL),
(13933, 'employee_designations', 'index', 1, NULL),
(13934, 'employee_designations', 'view', 1, NULL),
(13935, 'employee_designations', 'add', 1, NULL),
(13936, 'employee_designations', 'edit', 1, NULL),
(13937, 'employee_designations', 'delete', 1, NULL),
(13938, 'employee_branch_transfers', 'index', 1, NULL),
(13939, 'employee_branch_transfers', 'view', 1, NULL),
(13940, 'employee_branch_transfers', 'add', 1, NULL),
(13941, 'employee_branch_transfers', 'edit', 1, NULL),
(13942, 'employee_branch_transfers', 'delete', 1, NULL),
(13943, 'employee_promotions', 'index', 1, NULL),
(13944, 'employee_promotions', 'view', 1, NULL),
(13945, 'employee_promotions', 'add', 1, NULL),
(13946, 'employee_promotions', 'edit', 1, NULL),
(13947, 'employee_promotions', 'delete', 1, NULL),
(13948, 'employee_leave_managements', 'index', 1, NULL),
(13949, 'employee_leave_managements', 'view', 1, NULL),
(13950, 'employee_leave_managements', 'add', 1, NULL),
(13951, 'employee_leave_managements', 'edit', 1, NULL),
(13952, 'employee_leave_managements', 'delete', 1, NULL),
(13953, 'leave_managements', 'index', 1, NULL),
(13954, 'leave_managements', 'view', 1, NULL),
(13955, 'leave_managements', 'add', 1, NULL),
(13956, 'leave_managements', 'edit', 1, NULL),
(13957, 'leave_managements', 'delete', 1, NULL),
(13958, 'leave_applies', 'index', 1, NULL),
(13959, 'leave_applies', 'view', 1, NULL),
(13960, 'leave_applies', 'add', 1, NULL),
(13961, 'leave_applies', 'edit', 1, NULL),
(13962, 'leave_applies', 'delete', 1, NULL),
(13963, 'leave_authorizations', 'index', 1, NULL),
(13964, 'leave_authorizations', 'view', 1, NULL),
(13965, 'leave_authorizations', 'add', 1, NULL),
(13966, 'leave_authorizations', 'edit', 1, NULL),
(13967, 'leave_authorizations', 'delete', 1, NULL),
(13968, 'leave_calculations', 'index', 1, NULL),
(13969, 'leave_calculations', 'view', 1, NULL),
(13970, 'leave_calculations', 'add', 1, NULL),
(13971, 'leave_calculations', 'edit', 1, NULL),
(13972, 'leave_calculations', 'delete', 1, NULL),
(13973, 'employee_salary_disbursements', 'index', 1, NULL),
(13974, 'employee_salary_disbursements', 'view', 1, NULL),
(13975, 'employee_salary_disbursements', 'add', 1, NULL),
(13976, 'employee_salary_disbursements', 'edit', 1, NULL),
(13977, 'employee_salary_disbursements', 'delete', 1, NULL),
(13978, 'employee_attendances', 'index', 1, NULL),
(13979, 'employee_attendances', 'view', 1, NULL),
(13980, 'employee_attendances', 'add', 1, NULL),
(13981, 'employee_attendances', 'edit', 1, NULL),
(13982, 'employee_attendances', 'delete', 1, NULL),
(13983, 'ac_ledgers', 'index', 1, NULL),
(13984, 'ac_ledgers', 'view', 1, NULL),
(13985, 'ac_ledgers', 'add', 1, NULL),
(13986, 'ac_ledgers', 'edit', 1, NULL),
(13987, 'ac_ledgers', 'delete', 1, NULL),
(13988, 'ac_opening_balances', 'index', 1, NULL),
(13989, 'ac_opening_balances', 'view', 1, NULL),
(13990, 'ac_opening_balances', 'add', 1, NULL),
(13991, 'ac_opening_balances', 'edit', 1, NULL),
(13992, 'ac_opening_balances', 'delete', 1, NULL),
(13993, 'ac_vouchers', 'index', 1, NULL),
(13994, 'ac_vouchers', 'view', 1, NULL),
(13995, 'ac_vouchers', 'add', 1, NULL),
(13996, 'ac_vouchers', 'edit', 1, NULL),
(13997, 'ac_vouchers', 'delete', 1, NULL),
(13998, 'ac_payment_vouchers', 'index', 1, NULL),
(13999, 'ac_payment_vouchers', 'view', 1, NULL),
(14000, 'ac_payment_vouchers', 'add', 1, NULL),
(14001, 'ac_payment_vouchers', 'edit', 1, NULL),
(14002, 'ac_payment_vouchers', 'delete', 1, NULL),
(14003, 'ac_receipt_vouchers', 'index', 1, NULL),
(14004, 'ac_receipt_vouchers', 'view', 1, NULL),
(14005, 'ac_receipt_vouchers', 'add', 1, NULL),
(14006, 'ac_receipt_vouchers', 'edit', 1, NULL),
(14007, 'ac_receipt_vouchers', 'delete', 1, NULL),
(14008, 'authors', 'index', 1, NULL),
(14009, 'authors', 'view', 1, NULL),
(14010, 'authors', 'add', 1, NULL),
(14011, 'authors', 'edit', 1, NULL),
(14012, 'authors', 'delete', 1, NULL),
(14013, 'book_types', 'index', 1, NULL),
(14014, 'book_types', 'view', 1, NULL),
(14015, 'book_types', 'add', 1, NULL),
(14016, 'book_types', 'edit', 1, NULL),
(14017, 'book_types', 'delete', 1, NULL),
(14018, 'books', 'index', 1, NULL),
(14019, 'books', 'view', 1, NULL),
(14020, 'books', 'add', 1, NULL),
(14021, 'books', 'edit', 1, NULL),
(14022, 'books', 'delete', 1, NULL),
(14023, 'manage_library_books', 'index', 1, NULL),
(14024, 'manage_library_books', 'view', 1, NULL),
(14025, 'manage_library_books', 'add', 1, NULL),
(14026, 'manage_library_books', 'edit', 1, NULL),
(14027, 'manage_library_books', 'delete', 1, NULL),
(14028, 'dormitories', 'index', 1, NULL),
(14029, 'dormitories', 'view', 1, NULL),
(14030, 'dormitories', 'add', 1, NULL),
(14031, 'dormitories', 'edit', 1, NULL),
(14032, 'dormitories', 'delete', 1, NULL),
(14033, 'student_dormitories', 'index', 1, NULL),
(14034, 'student_dormitories', 'view', 1, NULL),
(14035, 'student_dormitories', 'add', 1, NULL),
(14036, 'student_dormitories', 'edit', 1, NULL),
(14037, 'student_dormitories', 'delete', 1, NULL),
(14038, 'transport_routes', 'index', 1, NULL),
(14039, 'transport_routes', 'view', 1, NULL),
(14040, 'transport_routes', 'add', 1, NULL),
(14041, 'transport_routes', 'edit', 1, NULL),
(14042, 'transport_routes', 'delete', 1, NULL),
(14043, 'transports', 'index', 1, NULL),
(14044, 'transports', 'view', 1, NULL),
(14045, 'transports', 'add', 1, NULL),
(14046, 'transports', 'edit', 1, NULL),
(14047, 'transports', 'delete', 1, NULL),
(14048, 'users', 'index', 1, NULL),
(14049, 'users', 'view', 1, NULL),
(14050, 'users', 'add', 1, NULL),
(14051, 'users', 'edit', 1, NULL),
(14052, 'users', 'delete', 1, NULL),
(14053, 'users', 'change_password', 1, NULL),
(14054, 'student_parents', 'index', 1, NULL),
(14055, 'student_parents', 'view', 1, NULL),
(14056, 'student_parents', 'add', 1, NULL),
(14057, 'student_parents', 'edit', 1, NULL),
(14058, 'student_parents', 'delete', 1, NULL),
(14059, 'user_roles', 'index', 1, NULL),
(14060, 'user_roles', 'view', 1, NULL),
(14061, 'user_roles', 'add', 1, NULL),
(14062, 'user_roles', 'edit', 1, NULL),
(14063, 'user_roles', 'delete', 1, NULL),
(14064, 'user_roles', 'user_role_wise_privillige', 1, NULL),
(14065, 'day_wise_class_routines', 'index', 1, NULL),
(14066, 'day_wise_class_routines', 'view', 1, NULL),
(14067, 'day_wise_class_routines', 'add', 1, NULL),
(14068, 'day_wise_class_routines', 'edit', 1, NULL),
(14069, 'day_wise_class_routines', 'delete', 1, NULL),
(14070, 'report_attendance_registers', 'index', 1, NULL),
(14071, 'report_attendance_registers', 'view', 1, NULL),
(14072, 'report_attendance_registers', 'add', 1, NULL),
(14073, 'report_attendance_registers', 'edit', 1, NULL),
(14074, 'report_attendance_registers', 'delete', 1, NULL),
(14075, 'report_student_registers', 'index', 1, NULL),
(14076, 'report_student_registers', 'view', 1, NULL),
(14077, 'report_student_registers', 'add', 1, NULL),
(14078, 'report_student_registers', 'edit', 1, NULL),
(14079, 'report_student_registers', 'delete', 1, NULL),
(14080, 'report_employee_registers', 'index', 1, NULL),
(14081, 'report_employee_registers', 'view', 1, NULL),
(14082, 'report_employee_registers', 'add', 1, NULL),
(14083, 'report_employee_registers', 'edit', 1, NULL),
(14084, 'report_employee_registers', 'delete', 1, NULL),
(14085, 'student_wise_lectures', 'index', 1, NULL),
(14086, 'student_wise_lectures', 'view', 1, NULL),
(14087, 'student_wise_lectures', 'add', 1, NULL),
(14088, 'student_wise_lectures', 'edit', 1, NULL),
(14089, 'student_wise_lectures', 'delete', 1, NULL),
(14090, 'exam_wise_attendance_reports', 'index', 1, NULL),
(14091, 'exam_wise_attendance_reports', 'view', 1, NULL),
(14092, 'exam_wise_attendance_reports', 'add', 1, NULL),
(14093, 'exam_wise_attendance_reports', 'edit', 1, NULL),
(14094, 'exam_wise_attendance_reports', 'delete', 1, NULL),
(14095, 'report_fee_registers', 'index', 1, NULL),
(14096, 'report_fee_registers', 'view', 1, NULL),
(14097, 'report_fee_registers', 'add', 1, NULL),
(14098, 'report_fee_registers', 'edit', 1, NULL),
(14099, 'report_fee_registers', 'delete', 1, NULL),
(14100, 'report_daily_collection_registers', 'index', 1, NULL),
(14101, 'report_daily_collection_registers', 'view', 1, NULL),
(14102, 'report_daily_collection_registers', 'add', 1, NULL),
(14103, 'report_daily_collection_registers', 'edit', 1, NULL),
(14104, 'report_daily_collection_registers', 'delete', 1, NULL),
(14105, 'report_student_dues', 'index', 1, NULL),
(14106, 'report_student_dues', 'view', 1, NULL),
(14107, 'report_student_dues', 'add', 1, NULL),
(14108, 'report_student_dues', 'edit', 1, NULL),
(14109, 'report_student_dues', 'delete', 1, NULL),
(14110, 'report_fee_waivers', 'index', 1, NULL),
(14111, 'report_fee_waivers', 'view', 1, NULL),
(14112, 'report_fee_waivers', 'add', 1, NULL),
(14113, 'report_fee_waivers', 'edit', 1, NULL),
(14114, 'report_fee_waivers', 'delete', 1, NULL),
(14115, 'ledger_reports', 'index', 1, NULL),
(14116, 'ledger_reports', 'view', 1, NULL),
(14117, 'ledger_reports', 'add', 1, NULL),
(14118, 'ledger_reports', 'edit', 1, NULL),
(14119, 'ledger_reports', 'delete', 1, NULL),
(14120, 'report_daily_transactions', 'index', 1, NULL),
(14121, 'report_daily_transactions', 'view', 1, NULL),
(14122, 'report_daily_transactions', 'add', 1, NULL),
(14123, 'report_daily_transactions', 'edit', 1, NULL),
(14124, 'report_daily_transactions', 'delete', 1, NULL),
(14125, 'income_expense_reports', 'index', 1, NULL),
(14126, 'income_expense_reports', 'view', 1, NULL),
(14127, 'income_expense_reports', 'add', 1, NULL),
(14128, 'income_expense_reports', 'edit', 1, NULL),
(14129, 'income_expense_reports', 'delete', 1, NULL),
(14130, 'ac_income_statements', 'index', 1, NULL),
(14131, 'ac_income_statements', 'view', 1, NULL);

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
  MODIFY `LedgerId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `acc_vouchers`
--
ALTER TABLE `acc_vouchers`
  MODIFY `VoucherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `acc_voucher_details`
--
ALTER TABLE `acc_voucher_details`
  MODIFY `VoucherDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `BatchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book_authors`
--
ALTER TABLE `book_authors`
  MODIFY `AuthorId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `class_wise_subjects`
--
ALTER TABLE `class_wise_subjects`
  MODIFY `SubjectClassId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `config_classes`
--
ALTER TABLE `config_classes`
  MODIFY `ClassId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `config_class_periods`
--
ALTER TABLE `config_class_periods`
  MODIFY `PeriodId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `config_class_routines`
--
ALTER TABLE `config_class_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config_sections`
--
ALTER TABLE `config_sections`
  MODIFY `SectionId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `config_subjects`
--
ALTER TABLE `config_subjects`
  MODIFY `SubjectId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `distribution_lists`
--
ALTER TABLE `distribution_lists`
  MODIFY `DistributionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `DormitoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ExamId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `exam_attendance`
--
ALTER TABLE `exam_attendance`
  MODIFY `ExamAttendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `RoutineId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_routine_details`
--
ALTER TABLE `exam_routine_details`
  MODIFY `RoutineDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `FeeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `CategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fee_configurations`
--
ALTER TABLE `fee_configurations`
  MODIFY `FeeConfigId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `fee_details`
--
ALTER TABLE `fee_details`
  MODIFY `FeeDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `TypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `LectureId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MarkId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mark_details`
--
ALTER TABLE `mark_details`
  MODIFY `MarkDetailsId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `OrganizationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `ParentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;
--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `AttendanceId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
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
  MODIFY `SubMarkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_role_wise_privileges`
--
ALTER TABLE `user_role_wise_privileges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
