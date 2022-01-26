/*
SQLyog  v11.01 (32 bit)
MySQL - 5.5.47-0ubuntu0.12.04.1 : Database - sp_sms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sp_sms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sp_sms`;

/*Table structure for table `academic_documents` */

DROP TABLE IF EXISTS `academic_documents`;

CREATE TABLE `academic_documents` (
  `DocumentId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `DocumentName` varchar(100) DEFAULT NULL,
  `DocumentType` char(1) DEFAULT NULL COMMENT 'S=>Syllabus,B=>BookList',
  `DocumentPath` varchar(250) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`DocumentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `academic_documents` */

/*Table structure for table `acc_account_types` */

DROP TABLE IF EXISTS `acc_account_types`;

CREATE TABLE `acc_account_types` (
  `TypeId` smallint(5) unsigned NOT NULL COMMENT 'Acc types identification number',
  `Name` varchar(200) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acc_account_types` */

insert  into `acc_account_types`(`TypeId`,`Name`,`Type`) values (10,'ASSET','ASSET'),(11,'CASH','ASSET'),(12,'BANK','ASSET'),(13,'ACCOUNTS RECEIVABLE','ASSET'),(14,'FIXED ASSET','ASSET'),(15,'CURRENT ASSET','ASSET'),(16,'INVESTMENT','ASSET'),(20,'LIABILITY','LIABILITY'),(21,'ACCOUNTS PAYABLE','LIABILITY'),(22,'ACCUMULATED DEPRECIATITON','LIABILITY'),(23,'CURRENT LIABILITY','LIABILITY'),(24,'LONG TERM LIABILITY','LIABILITY'),(25,'SURPLUS','LIABILITY'),(30,'INCOME','INCOME'),(40,'EXPENSE','EXPENSE'),(50,'RETAINED EARNING','EQUITY'),(51,'OPENING BALANCE','EQUITY'),(52,'EQUITY','EQUITY'),(53,'RESERVE FUND','EQUITY'),(54,'PRIORITY ADJUSTMENT','EQUITY');

/*Table structure for table `acc_ledgers` */

DROP TABLE IF EXISTS `acc_ledgers`;

CREATE TABLE `acc_ledgers` (
  `LedgerId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeId` int(11) NOT NULL,
  `LedgerName` varbinary(100) NOT NULL,
  `LedgerCode` varchar(100) NOT NULL,
  `LedgerDescription` varchar(100) DEFAULT NULL,
  `IsDeletable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`LedgerId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `acc_ledgers` */

insert  into `acc_ledgers`(`LedgerId`,`TypeId`,`LedgerName`,`LedgerCode`,`LedgerDescription`,`IsDeletable`) values (1,11,'Cash In Hand','100',NULL,0),(2,12,'Cash In Bank','101',NULL,0),(3,30,'Product Sale','200',NULL,0),(4,30,'Product Sale Due','202',NULL,0),(5,40,'Product Purchase','300',NULL,0),(6,40,'Product Purchase Due','301',NULL,0),(7,40,'House Rent','400',NULL,1),(8,40,'Electricity Bill','401',NULL,1),(9,40,'Water Bill','402',NULL,1),(10,40,'Tea Cost','403',NULL,1),(11,40,'Printing Cost','404',NULL,1),(13,30,'Maintainance Fee','500','',1),(14,30,'Income from Project','501','xxxx',1),(15,30,' Income from Repair & Maintainance','502','ccc',1);

/*Table structure for table `acc_voucher_details` */

DROP TABLE IF EXISTS `acc_voucher_details`;

CREATE TABLE `acc_voucher_details` (
  `VoucherDetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `VoucherId` int(11) NOT NULL,
  `CheckNumber` varchar(255) DEFAULT NULL,
  `CreditLedgerId` int(11) DEFAULT NULL,
  `DebitLedgerId` int(11) DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`VoucherDetailsId`),
  KEY `FK_rxil01ayf22kc8il2bt4ey73o` (`CreditLedgerId`),
  KEY `FK_671tab39nhxp1bbic9iub22vm` (`DebitLedgerId`),
  KEY `FK_2vcxkvnfh3c32ca7cx35frbkv` (`VoucherId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `acc_voucher_details` */

insert  into `acc_voucher_details`(`VoucherDetailsId`,`VoucherId`,`CheckNumber`,`CreditLedgerId`,`DebitLedgerId`,`Particulars`,`Amount`) values (2,1,NULL,1,13,'dsd',100.00);

/*Table structure for table `acc_vouchers` */

DROP TABLE IF EXISTS `acc_vouchers`;

CREATE TABLE `acc_vouchers` (
  `VoucherId` int(11) NOT NULL AUTO_INCREMENT,
  `VoucherType` varchar(255) NOT NULL COMMENT 'P=>Payment, R=>Receipt',
  `VoucherCode` varchar(255) NOT NULL,
  `VoucherAmount` decimal(10,2) NOT NULL,
  `VoucherDate` date NOT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `IsAutoVoucher` int(1) DEFAULT NULL,
  PRIMARY KEY (`VoucherId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `acc_vouchers` */

insert  into `acc_vouchers`(`VoucherId`,`VoucherType`,`VoucherCode`,`VoucherAmount`,`VoucherDate`,`Particulars`,`EntryDate`,`UpdatedBy`,`UpdatedOn`,`EntryBy`,`IsAutoVoucher`) values (1,'R','R-001',100.00,'2016-12-18','sd','2016-12-18',NULL,NULL,1,0);

/*Table structure for table `book_authors` */

DROP TABLE IF EXISTS `book_authors`;

CREATE TABLE `book_authors` (
  `AuthorId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AuthorName` varchar(200) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`AuthorId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `book_authors` */

insert  into `book_authors`(`AuthorId`,`AuthorName`,`Description`) values (1,'Jahid',NULL),(2,'Mahabub Zaman',NULL),(3,'Manjur Mahmud',NULL),(4,'Hasan Imam',NULL),(5,'Silmat Shistry',NULL),(6,'Diruba Islam',NULL),(7,'Feroz','ssd');

/*Table structure for table `book_details` */

DROP TABLE IF EXISTS `book_details`;

CREATE TABLE `book_details` (
  `BookDetailsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BookId` int(11) DEFAULT NULL,
  `IdentificationNumber` varchar(100) DEFAULT NULL,
  `BookStatus` char(1) DEFAULT 'A' COMMENT 'A=>Available,N=>Not Available',
  PRIMARY KEY (`BookDetailsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `book_details` */

/*Table structure for table `book_types` */

DROP TABLE IF EXISTS `book_types`;

CREATE TABLE `book_types` (
  `TypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `book_types` */

insert  into `book_types`(`TypeId`,`TypeName`) values (1,'Bangla'),(2,'English'),(3,'Mathmatics'),(4,'general Knowledge');

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `BookId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BookName` varchar(200) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `NumberOfBooks` int(11) DEFAULT NULL,
  `TypeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`BookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `books` */

/*Table structure for table `config_class_periods` */

DROP TABLE IF EXISTS `config_class_periods`;

CREATE TABLE `config_class_periods` (
  `PeriodId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PeriodName` varchar(100) DEFAULT NULL,
  `PeriodStartTime` varchar(100) DEFAULT NULL,
  `PeriodEndTime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PeriodId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `config_class_periods` */

insert  into `config_class_periods`(`PeriodId`,`PeriodName`,`PeriodStartTime`,`PeriodEndTime`) values (1,'1st Period','9:00','10:00'),(2,'2nd period','10:00','11:00'),(3,'3rd period','11:00','12:00'),(4,'4th period','12:00','1:00'),(5,'Tiffin Period','1:00','2:00'),(6,'5th period','2:00','2:30'),(7,'6th period','2:30','3:00'),(8,'7th period','3:00','3:30'),(9,'8th period','3:30','4:00');

/*Table structure for table `config_class_routines` */

DROP TABLE IF EXISTS `config_class_routines`;

CREATE TABLE `config_class_routines` (
  `RoutineId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `PeriodId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`RoutineId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `config_class_routines` */

insert  into `config_class_routines`(`RoutineId`,`ClassId`,`SectionId`,`SubjectId`,`EmployeeId`,`Day`,`PeriodId`,`RoomNumber`) values (2,1,1,3,16,'SAT',3,NULL),(3,1,1,5,15,'SAT',3,NULL),(4,1,1,6,14,'SAT',4,NULL),(5,1,2,1,17,'SAT',2,NULL),(6,1,1,1,17,'SUN',1,NULL),(7,1,1,2,10,'SAT',2,NULL),(8,1,1,13,5,'SAT',6,NULL),(9,1,1,3,3,'SAT',7,NULL),(10,1,1,1,17,'SAT',1,NULL);

/*Table structure for table `config_classes` */

DROP TABLE IF EXISTS `config_classes`;

CREATE TABLE `config_classes` (
  `ClassId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(100) DEFAULT NULL,
  `ClassDescription` text,
  PRIMARY KEY (`ClassId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `config_classes` */

insert  into `config_classes`(`ClassId`,`ClassName`,`ClassDescription`) values (1,'6','dfg'),(2,'7',NULL),(3,'8',NULL),(4,'9',NULL),(6,'10','as');

/*Table structure for table `config_sections` */

DROP TABLE IF EXISTS `config_sections`;

CREATE TABLE `config_sections` (
  `SectionId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `SectionName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `config_sections` */

insert  into `config_sections`(`SectionId`,`ClassId`,`SectionName`) values (1,1,'A'),(2,1,'B'),(3,1,'C'),(4,2,'A'),(5,2,'B'),(6,2,'C'),(7,3,'A'),(8,3,'B'),(9,3,'C'),(10,4,'A'),(11,4,'B'),(12,4,'C'),(13,6,'A'),(14,6,'B'),(15,6,'C');

/*Table structure for table `config_subjects` */

DROP TABLE IF EXISTS `config_subjects`;

CREATE TABLE `config_subjects` (
  `SubjectId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SubjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `config_subjects` */

insert  into `config_subjects`(`SubjectId`,`SubjectName`) values (1,'Bangla 1st'),(2,'Bangla 2nd'),(3,'English 1st'),(4,'English 2nd'),(5,'Math'),(6,'Religion'),(7,'Physics'),(8,'Chemistry'),(9,'Biology'),(10,'Higher Math'),(11,'Accounting'),(12,'Sociology'),(13,'ICT');

/*Table structure for table `dormitories` */

DROP TABLE IF EXISTS `dormitories`;

CREATE TABLE `dormitories` (
  `DormitoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `DormitoryName` varchar(100) DEFAULT NULL,
  `NoOfRooms` int(11) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`DormitoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `dormitories` */

insert  into `dormitories`(`DormitoryId`,`DormitoryName`,`NoOfRooms`,`Description`) values (1,'Dormitory 001',25,NULL),(2,'Dormitory 002',25,NULL),(3,'Dormitory 003',25,NULL);

/*Table structure for table `employee_designations` */

DROP TABLE IF EXISTS `employee_designations`;

CREATE TABLE `employee_designations` (
  `DesignationId` int(11) NOT NULL AUTO_INCREMENT,
  `DesignationName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DesignationId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `employee_designations` */

insert  into `employee_designations`(`DesignationId`,`DesignationName`) values (1,'Head Master'),(2,'Assistant Head Master'),(3,'Senior Teacher'),(4,'Assistant Teacher'),(5,'Jounior Teacher'),(6,'Pion'),(7,'Driver'),(8,'Kerani');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `EmployeeId` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeName` varchar(50) NOT NULL,
  `EmployeeDesignation` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `SpouseName` varchar(50) NOT NULL,
  `EmployeeAddress` text,
  `ContactNo` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `IsTeacher` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `employees` */

insert  into `employees`(`EmployeeId`,`EmployeeName`,`EmployeeDesignation`,`DOB`,`SpouseName`,`EmployeeAddress`,`ContactNo`,`Email`,`Gender`,`IsTeacher`) values (1,'Rebeka Sultana',1,'1984-06-12','',NULL,'01688163666',NULL,'F',0),(2,'Harun Ur Rashid',2,'1984-06-12','',NULL,'01688163566',NULL,'M',0),(3,'Bilkis Ara Banu',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(4,'Teacher2',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(5,'Teacher3',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(6,'Teacher4',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(7,'Teacher5',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(8,'Teacher6',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(9,'Teacher7',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(10,'Teacher8',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(11,'Teacher9',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(12,'Teacher10',3,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(13,'Teacher11',4,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(14,'Teacher12',4,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(15,'Teacher13',4,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(16,'Teacher14',4,'1984-06-12','',NULL,'01688163566',NULL,'F',1),(17,'Teacher15',4,'1984-06-12','',NULL,'01688163566',NULL,'F',1);

/*Table structure for table `exams` */

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams` (
  `ExamId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ExamDate` date DEFAULT NULL,
  `ExamName` varchar(100) DEFAULT NULL,
  `ExamDescription` tinytext,
  PRIMARY KEY (`ExamId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `exams` */

insert  into `exams`(`ExamId`,`ExamDate`,`ExamName`,`ExamDescription`) values (1,'2017-04-01','1st Semester','This is the First Exam of year'),(2,'2017-08-01','2nd Semester',NULL),(3,'2017-12-01','3rd Semester','as');

/*Table structure for table `fee_configurations` */

DROP TABLE IF EXISTS `fee_configurations`;

CREATE TABLE `fee_configurations` (
  `FeeConfigId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) NOT NULL,
  `FeeTypeId` int(11) DEFAULT NULL COMMENT 'M=>Monthly, A=>Admision',
  `Amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`FeeConfigId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fee_configurations` */

/*Table structure for table `fee_types` */

DROP TABLE IF EXISTS `fee_types`;

CREATE TABLE `fee_types` (
  `TypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fee_types` */

insert  into `fee_types`(`TypeId`,`TypeName`) values (1,'Admission fee'),(2,'Monthly Fee');

/*Table structure for table `fees` */

DROP TABLE IF EXISTS `fees`;

CREATE TABLE `fees` (
  `FeeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `FeeTypeId` int(11) DEFAULT NULL COMMENT 'A=>AdmissionFee, M=>Monhtly Fee',
  `TransactionDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(1) DEFAULT NULL,
  PRIMARY KEY (`FeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fees` */

/*Table structure for table `grade_points` */

DROP TABLE IF EXISTS `grade_points`;

CREATE TABLE `grade_points` (
  `GradeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `GradeName` varchar(100) DEFAULT NULL,
  `GradePoint` varchar(10) DEFAULT NULL,
  `MarkFrom` int(10) DEFAULT NULL,
  `MarkTo` int(10) DEFAULT NULL,
  `GradeDescription` tinytext,
  PRIMARY KEY (`GradeId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `grade_points` */

insert  into `grade_points`(`GradeId`,`GradeName`,`GradePoint`,`MarkFrom`,`MarkTo`,`GradeDescription`) values (1,'A+','5.0',80,100,NULL),(2,'A','4.0',70,79,NULL),(3,'A-','3.5',60,69,NULL),(4,'B','3.0',50,59,NULL),(5,'C','2',40,49,NULL),(6,'D','1',33,39,NULL),(7,'F','0',0,32,NULL);

/*Table structure for table `manage_marks` */

DROP TABLE IF EXISTS `manage_marks`;

CREATE TABLE `manage_marks` (
  `MarkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassID` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `ExamId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `SbaMark` int(3) DEFAULT '0',
  `SubjectiveMark` int(3) DEFAULT '0',
  `ObjectiveMark` int(3) DEFAULT '0',
  `TotalMark` int(3) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MarkId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `manage_marks` */

insert  into `manage_marks`(`MarkId`,`ClassID`,`SectionId`,`Year`,`ExamId`,`SubjectId`,`StudentId`,`SbaMark`,`SubjectiveMark`,`ObjectiveMark`,`TotalMark`,`EntryOn`,`EntryBy`) values (31,1,1,'2016',1,1,1,10,35,40,85,'2017-01-19 05:43:31',1),(32,1,1,'2016',1,1,2,10,34,39,83,'2017-01-19 05:43:31',1),(33,1,1,'2016',1,1,3,10,31,40,81,'2017-01-19 05:43:31',1),(34,1,1,'2016',1,1,4,10,32,35,77,'2017-01-19 05:43:31',1),(35,1,1,'2016',1,1,5,9,38,36,83,'2017-01-19 05:43:31',1),(36,1,1,'2016',1,1,6,9,31,34,74,'2017-01-19 05:43:31',1),(37,1,1,'2016',1,1,7,9,38,33,80,'2017-01-19 05:43:31',1),(38,1,1,'2016',1,1,8,9,32,32,73,'2017-01-19 05:43:31',1),(39,1,1,'2016',1,1,9,9,36,35,80,'2017-01-19 05:43:31',1),(40,1,1,'2016',1,1,10,9,24,23,56,'2017-01-19 05:43:31',1),(41,1,1,'2016',1,1,11,9,26,24,59,'2017-01-19 05:43:31',1),(42,1,1,'2016',1,1,12,9,31,35,75,'2017-01-19 05:43:31',1),(43,1,1,'2016',1,1,13,8,30,35,73,'2017-01-19 05:43:31',1),(44,1,1,'2016',1,1,14,8,28,29,65,'2017-01-19 05:43:31',1),(45,1,1,'2016',1,1,15,8,31,29,68,'2017-01-19 05:43:31',1),(46,1,1,'2016',1,2,1,10,35,35,80,'2017-01-22 02:21:26',1),(47,1,1,'2016',1,2,2,10,34,36,80,'2017-01-22 02:21:26',1),(48,1,1,'2016',1,2,3,10,27,35,72,'2017-01-22 02:21:26',1),(49,1,1,'2016',1,2,4,10,29,35,74,'2017-01-22 02:21:26',1),(50,1,1,'2016',1,2,5,9,28,36,73,'2017-01-22 02:21:26',1),(51,1,1,'2016',1,2,6,10,36,37,83,'2017-01-22 02:21:26',1),(52,1,1,'2016',1,2,7,10,27,38,75,'2017-01-22 02:21:26',1),(53,1,1,'2016',1,2,8,10,36,32,78,'2017-01-22 02:21:26',1),(54,1,1,'2016',1,2,9,10,28,35,73,'2017-01-22 02:21:26',1),(55,1,1,'2016',1,2,10,10,28,35,73,'2017-01-22 02:21:26',1),(56,1,1,'2016',1,2,11,10,36,25,71,'2017-01-22 02:21:26',1),(57,1,1,'2016',1,2,12,10,36,25,71,'2017-01-22 02:21:26',1),(58,1,1,'2016',1,2,13,10,36,25,71,'2017-01-22 02:21:26',1),(59,1,1,'2016',1,2,14,10,36,40,86,'2017-01-22 02:21:26',1),(60,1,1,'2016',1,2,15,10,34,40,84,'2017-01-22 02:21:26',1);

/*Table structure for table `organizations` */

DROP TABLE IF EXISTS `organizations`;

CREATE TABLE `organizations` (
  `OrganizationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrganizationName` varchar(200) DEFAULT NULL,
  `OrganizationAddress_1` varchar(200) DEFAULT NULL,
  `OrganizationAddress_2` varchar(200) DEFAULT NULL,
  `OrganizationAddress_3` varchar(200) DEFAULT NULL,
  `OrganizationLogo` varchar(50) DEFAULT NULL,
  `CashMemoPrefix` varchar(30) DEFAULT NULL,
  `MemoPrfix` varchar(100) DEFAULT NULL,
  `StudentCodePrefix` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`OrganizationId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `organizations` */

insert  into `organizations`(`OrganizationId`,`OrganizationName`,`OrganizationAddress_1`,`OrganizationAddress_2`,`OrganizationAddress_3`,`OrganizationLogo`,`CashMemoPrefix`,`MemoPrfix`,`StudentCodePrefix`) values (1,'Narayangonj Govt Girls High School','Masdair, Narayangonj',NULL,NULL,NULL,'SM-','PM-',NULL);

/*Table structure for table `parents` */

DROP TABLE IF EXISTS `parents`;

CREATE TABLE `parents` (
  `ParentId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `ParentName` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(200) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ParentId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `parents` */

insert  into `parents`(`ParentId`,`StudentId`,`ParentName`,`ContactNumber`,`UserId`) values (1,135,'Golam Rosul','01552875498',6),(2,136,'Father ','01822447078',8);

/*Table structure for table `student_attendances` */

DROP TABLE IF EXISTS `student_attendances`;

CREATE TABLE `student_attendances` (
  `AttendanceId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `AttendanceType` char(1) DEFAULT NULL COMMENT 'P=>Present. A=>Absent,L=>Late',
  `GroupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`AttendanceId`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `student_attendances` */

insert  into `student_attendances`(`AttendanceId`,`ClassId`,`SectionId`,`Date`,`Year`,`StudentId`,`AttendanceType`,`GroupId`) values (1,1,1,'2017-01-19',NULL,1,'A',1),(2,1,1,'2017-01-19',NULL,2,'P',1),(3,1,1,'2017-01-19',NULL,3,'P',1),(4,1,1,'2017-01-19',NULL,4,'P',1),(5,1,1,'2017-01-19',NULL,5,'P',1),(6,1,1,'2017-01-19',NULL,6,'P',1),(7,1,1,'2017-01-19',NULL,7,'A',1),(8,1,1,'2017-01-19',NULL,8,'P',1),(9,1,1,'2017-01-19',NULL,9,'P',1),(10,1,1,'2017-01-19',NULL,10,'P',1),(11,1,1,'2017-01-19',NULL,11,'P',1),(12,1,1,'2017-01-19',NULL,12,'P',1),(13,1,1,'2017-01-19',NULL,13,'P',1),(14,1,1,'2017-01-19',NULL,14,'P',1),(15,1,1,'2017-01-19',NULL,15,'P',1),(16,6,13,'2017-01-27',NULL,136,'P',2),(17,6,13,'2017-01-28',NULL,136,'P',3),(18,6,13,'2017-01-29',NULL,136,'P',4),(19,6,13,'2017-01-30',NULL,136,'P',5),(20,6,13,'2017-01-31',NULL,136,'A',6),(21,1,1,'2017-01-27',NULL,1,'P',7),(22,1,1,'2017-01-27',NULL,2,'P',7),(23,1,1,'2017-01-27',NULL,3,'P',7),(24,1,1,'2017-01-27',NULL,4,'P',7),(25,1,1,'2017-01-27',NULL,5,'A',7),(26,1,1,'2017-01-27',NULL,6,'P',7),(27,1,1,'2017-01-27',NULL,7,'P',7),(28,1,1,'2017-01-27',NULL,8,'P',7),(29,1,1,'2017-01-27',NULL,9,'P',7),(30,1,1,'2017-01-27',NULL,10,'A',7),(31,1,1,'2017-01-27',NULL,11,'P',7),(32,1,1,'2017-01-27',NULL,12,'P',7),(33,1,1,'2017-01-27',NULL,13,'P',7),(34,1,1,'2017-01-27',NULL,14,'P',7),(35,1,1,'2017-01-27',NULL,15,'P',7);

/*Table structure for table `student_books` */

DROP TABLE IF EXISTS `student_books`;

CREATE TABLE `student_books` (
  `StudentBookId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `BookDetailsId` int(11) DEFAULT NULL,
  `TakenDate` date DEFAULT NULL,
  `GivenDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StudentBookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_books` */

/*Table structure for table `student_dormitories` */

DROP TABLE IF EXISTS `student_dormitories`;

CREATE TABLE `student_dormitories` (
  `StudentDormitoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `DormitoryId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`StudentDormitoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_dormitories` */

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL AUTO_INCREMENT,
  `Year` varchar(100) DEFAULT NULL,
  `StudentName` varchar(50) DEFAULT NULL,
  `StudentCode` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `RollNo` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `FathersName` varchar(50) DEFAULT NULL,
  `MothersName` varchar(50) DEFAULT NULL,
  `ContactNumber` varchar(30) DEFAULT NULL,
  `HomeNumber` varchar(30) DEFAULT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `AdmissionDate` date DEFAULT NULL,
  `StudentStatus` char(1) DEFAULT 'A' COMMENT 'A=Active, C=Closed',
  `IsResidential` tinyint(1) DEFAULT '0',
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`StudentId`,`Year`,`StudentName`,`StudentCode`,`ClassId`,`SectionId`,`RollNo`,`Address`,`DateOfBirth`,`FathersName`,`MothersName`,`ContactNumber`,`HomeNumber`,`StudentEmail`,`Gender`,`AdmissionDate`,`StudentStatus`,`IsResidential`,`EntryBy`,`EntryDate`) values (1,'2016','Student1','006A001',1,1,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(2,'2016','Student2','006A002',1,1,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(3,'2016','Student3','006A003',1,1,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(4,'2016','Student4','006A004',1,1,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(5,'2016','Student5','006A005',1,1,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(6,'2016','Student6','006A006',1,1,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(7,'2016','Student7','006A007',1,1,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(8,'2016','Student8','006A008',1,1,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(9,'2016','Student9','006A009',1,1,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(10,'2016','Student10','006A010',1,1,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(11,'2016','Student11','006A011',1,1,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(12,'2016','Student12','006A012',1,1,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(13,'2016','Student13','006A013',1,1,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(14,'2016','Student14','006A014',1,1,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(15,'2016','Student15','006A015',1,1,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(16,'2016','Student2','006B002',1,2,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(17,'2016','Student3','006B003',1,2,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(18,'2016','Student4','006B004',1,2,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(19,'2016','Student5','006B005',1,2,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(20,'2016','Student6','006B006',1,2,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(21,'2016','Student7','006B007',1,2,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(22,'2016','Student8','006B008',1,2,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(23,'2016','Student9','006B009',1,2,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(24,'2016','Student10','006B010',1,2,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(25,'2016','Student11','006B011',1,2,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(26,'2016','Student12','006B012',1,2,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(27,'2016','Student13','006B013',1,2,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(28,'2016','Student14','006B014',1,2,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(29,'2016','Student15','006B015',1,2,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(30,'2016','Student1','006C001',1,3,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(31,'2016','Student2','006C002',1,3,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(32,'2016','Student3','006C003',1,3,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(33,'2016','Student4','006C004',1,3,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(34,'2016','Student5','006C005',1,3,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(35,'2016','Student6','006C006',1,3,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(36,'2016','Student7','006C007',1,3,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(37,'2016','Student8','006C008',1,3,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(38,'2016','Student9','006C009',1,3,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(39,'2016','Student10','006C010',1,3,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(40,'2016','Student11','006C011',1,3,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(41,'2016','Student12','006C012',1,3,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(42,'2016','Student13','006C013',1,3,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(43,'2016','Student14','006C014',1,3,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(44,'2016','Student15','006C015',1,3,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(45,'2016','Student1','007A001',2,4,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(46,'2016','Student2','007A002',2,4,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(47,'2016','Student3','007A003',2,4,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(48,'2016','Student4','007A004',2,4,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(49,'2016','Student5','007A005',2,4,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(50,'2016','Student6','007A006',2,4,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(51,'2016','Student7','007A007',2,4,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(52,'2016','Student8','007A008',2,4,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(53,'2016','Student9','007A009',2,4,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(54,'2016','Student10','007A010',2,4,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(55,'2016','Student11','007A011',2,4,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(56,'2016','Student12','007A012',2,4,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(57,'2016','Student13','007A013',2,4,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(58,'2016','Student14','007A014',2,4,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(59,'2016','Student15','007A015',2,4,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(60,'2016','Student2','007B001',2,5,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(61,'2016','Student2','007B002',2,5,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(62,'2016','Student3','007B003',2,5,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(63,'2016','Student4','007B004',2,5,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(64,'2016','Student5','007B005',2,5,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(65,'2016','Student6','007B006',2,5,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(66,'2016','Student7','007B007',2,5,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(67,'2016','Student8','007B008',2,5,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(68,'2016','Student9','007B009',2,5,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(69,'2016','Student10','007B010',2,5,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(70,'2016','Student11','007B011',2,5,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(71,'2016','Student12','007B012',2,5,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(72,'2016','Student13','007B013',2,5,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(73,'2016','Student14','007B014',2,5,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(74,'2016','Student15','007B015',2,5,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(75,'2016','Student1','007C001',2,6,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(76,'2016','Student2','007C002',2,6,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(77,'2016','Student3','007C003',2,6,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(78,'2016','Student4','007C004',2,6,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(79,'2016','Student5','007C005',2,6,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(80,'2016','Student6','007C006',2,6,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(81,'2016','Student7','007C007',2,6,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(82,'2016','Student8','007C008',2,6,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(83,'2016','Student9','007C009',2,6,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(84,'2016','Student10','007C010',2,6,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(85,'2016','Student11','007C011',2,6,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(86,'2016','Student12','007C012',2,6,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(87,'2016','Student13','007C013',2,6,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(88,'2016','Student14','007C014',2,6,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(89,'2016','Student15','007C015',2,6,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(90,'2016','Student1','008A001',3,7,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(91,'2016','Student2','008A002',3,7,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(92,'2016','Student3','008A003',3,7,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(93,'2016','Student4','008A004',3,7,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(94,'2016','Student5','008A005',3,7,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(95,'2016','Student6','008A006',3,7,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(96,'2016','Student7','008A007',3,7,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(97,'2016','Student8','008A008',3,7,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(98,'2016','Student9','008A009',3,7,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(99,'2016','Student10','008A010',3,7,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(100,'2016','Student11','008A011',3,7,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(101,'2016','Student12','008A012',3,7,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(102,'2016','Student13','008A013',3,7,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(103,'2016','Student14','008A014',3,7,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(104,'2016','Student15','008A015',3,7,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(105,'2016','Student2','008B001',3,8,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(106,'2016','Student2','008B002',3,8,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(107,'2016','Student3','008B003',3,8,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(108,'2016','Student4','008B004',3,8,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(109,'2016','Student5','008B005',3,8,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(110,'2016','Student6','008B006',3,8,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(111,'2016','Student7','008B007',3,8,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(112,'2016','Student8','008B008',3,8,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(113,'2016','Student9','008B009',3,8,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(114,'2016','Student10','008B010',3,8,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(115,'2016','Student11','008B011',3,8,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(116,'2016','Student12','008B012',3,8,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(117,'2016','Student13','008B013',3,8,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(118,'2016','Student14','008B014',3,8,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(119,'2016','Student15','008B015',3,8,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(120,'2016','Student1','008C001',3,9,'1',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(121,'2016','Student2','008C002',3,9,'2',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163888',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(122,'2016','Student3','008C003',3,9,'3',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(123,'2016','Student4','008C004',3,9,'4',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(124,'2016','Student5','008C005',3,9,'5',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(125,'2016','Student6','008C006',3,9,'6',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(126,'2016','Student7','008C007',3,9,'7',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(127,'2016','Student8','008C008',3,9,'8',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(128,'2016','Student9','008C009',3,9,'9',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(129,'2016','Student10','008C010',3,9,'10',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(130,'2016','Student11','008C011',3,9,'11',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(131,'2016','Student12','008C012',3,9,'12',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(132,'2016','Student13','008C013',3,9,'13',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(133,'2016','Student14','008C014',3,9,'14',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(134,'2016','Student15','008C015',3,9,'15',NULL,NULL,'Father\'s Name','Mother\'s NAme','01688163666',NULL,NULL,'F','2014-06-17','A',0,1,NULL),(135,'2016','Mehedi','ST7A016',2,4,'16','Dhaka','1995-01-03','Golam Rosul','Fatema Begum','01552875498',NULL,'','M','2017-01-26','A',0,1,'2017-01-26'),(136,'2016','Fokrul Sujon','ST10A001',6,13,'1','Noakhali ','1992-01-03','Father ','Mother','01822447078',NULL,'','M','2017-01-26','A',0,1,'2017-01-26');

/*Table structure for table `transport_routes` */

DROP TABLE IF EXISTS `transport_routes`;

CREATE TABLE `transport_routes` (
  `RouteId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RouteName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RouteId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `transport_routes` */

insert  into `transport_routes`(`RouteId`,`RouteName`) values (1,'Mohammadpur');

/*Table structure for table `transports` */

DROP TABLE IF EXISTS `transports`;

CREATE TABLE `transports` (
  `TransportId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TransportName` varchar(100) DEFAULT NULL,
  `TransportNumber` varchar(100) DEFAULT NULL,
  `RouteId` int(11) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Type` char(1) DEFAULT NULL COMMENT 'S=>Student,E=>Employees',
  PRIMARY KEY (`TransportId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `transports` */

insert  into `transports`(`TransportId`,`TransportName`,`TransportNumber`,`RouteId`,`Capacity`,`Type`) values (1,'Choitali','302',1,170,'S');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `is_parents` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`password`,`role_id`,`name`,`reg_date`,`status`,`user_name`,`is_parents`) values (1,'c4ca4238a0b923820dcc509a6f75849b',1,'Admin','2016-04-01',1,'admin',0),(6,'f72940fe7ed0666735566f807dc6e4d0',13,'Golam Rosul','2017-01-26',1,'01552875498',1),(7,'25d55ad283aa400af464c76d713c07ad',10,'Mostofa Kamal','2017-01-26',1,'kamal',0),(8,'30c74a6484e399acca32a6ce26ef791b',13,'Father ','2017-01-26',1,'01822447078',1);

/*Table structure for table `user_role_wise_privileges` */

DROP TABLE IF EXISTS `user_role_wise_privileges`;

CREATE TABLE `user_role_wise_privileges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `controller` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `resource_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5410 DEFAULT CHARSET=latin1;

/*Data for the table `user_role_wise_privileges` */

insert  into `user_role_wise_privileges`(`id`,`controller`,`action`,`role_id`,`resource_id`) values (4484,'config_classes','index',10,NULL),(4485,'config_classes','view',10,NULL),(4486,'config_sections','index',10,NULL),(4487,'config_sections','view',10,NULL),(4488,'config_subjects','index',10,NULL),(4489,'config_subjects','view',10,NULL),(4490,'config_class_routines','index',10,NULL),(4491,'config_class_routines','view',10,NULL),(4492,'students','index',10,NULL),(4493,'students','view',10,NULL),(4494,'student_attendances','index',10,NULL),(4495,'student_attendances','view',10,NULL),(4496,'student_attendances','add',10,NULL),(4497,'student_attendances','edit',10,NULL),(4498,'student_attendances','delete',10,NULL),(4499,'fees','index',10,NULL),(4500,'fees','view',10,NULL),(4501,'fees','add',10,NULL),(4502,'fees','edit',10,NULL),(4503,'fees','delete',10,NULL),(4504,'manage_marks','index',10,NULL),(4505,'manage_marks','view',10,NULL),(4506,'manage_marks','add',10,NULL),(4507,'manage_marks','edit',10,NULL),(4508,'manage_marks','delete',10,NULL),(4509,'report_tabulation_sheets','index',10,NULL),(4510,'report_tabulation_sheets','view',10,NULL),(4511,'report_tabulation_sheets','add',10,NULL),(4512,'report_tabulation_sheets','edit',10,NULL),(4513,'report_tabulation_sheets','delete',10,NULL),(4514,'report_mark_sheets','index',10,NULL),(4515,'report_mark_sheets','view',10,NULL),(4516,'report_mark_sheets','add',10,NULL),(4517,'report_mark_sheets','edit',10,NULL),(4518,'report_mark_sheets','delete',10,NULL),(4774,'report_mark_sheets','index',13,NULL),(4775,'report_mark_sheets','view',13,NULL),(4776,'report_mark_sheets','add',13,NULL),(4777,'report_mark_sheets','edit',13,NULL),(4778,'report_mark_sheets','delete',13,NULL),(4779,'users','change_password',13,NULL),(4780,'report_attendance_registers','index',13,NULL),(4781,'report_attendance_registers','view',13,NULL),(4782,'report_attendance_registers','add',13,NULL),(4783,'report_attendance_registers','edit',13,NULL),(4784,'report_attendance_registers','delete',13,NULL),(5246,'organizations','index',1,NULL),(5247,'organizations','view',1,NULL),(5248,'organizations','add',1,NULL),(5249,'organizations','edit',1,NULL),(5250,'organizations','delete',1,NULL),(5251,'config_classes','index',1,NULL),(5252,'config_classes','view',1,NULL),(5253,'config_classes','add',1,NULL),(5254,'config_classes','edit',1,NULL),(5255,'config_classes','delete',1,NULL),(5256,'config_sections','index',1,NULL),(5257,'config_sections','view',1,NULL),(5258,'config_sections','add',1,NULL),(5259,'config_sections','edit',1,NULL),(5260,'config_sections','delete',1,NULL),(5261,'config_subjects','index',1,NULL),(5262,'config_subjects','view',1,NULL),(5263,'config_subjects','add',1,NULL),(5264,'config_subjects','edit',1,NULL),(5265,'config_subjects','delete',1,NULL),(5266,'config_class_periods','index',1,NULL),(5267,'config_class_periods','view',1,NULL),(5268,'config_class_periods','add',1,NULL),(5269,'config_class_periods','edit',1,NULL),(5270,'config_class_periods','delete',1,NULL),(5271,'config_class_routines','index',1,NULL),(5272,'config_class_routines','view',1,NULL),(5273,'config_class_routines','add',1,NULL),(5274,'config_class_routines','edit',1,NULL),(5275,'config_class_routines','delete',1,NULL),(5276,'students','index',1,NULL),(5277,'students','view',1,NULL),(5278,'students','add',1,NULL),(5279,'students','edit',1,NULL),(5280,'students','delete',1,NULL),(5281,'batch_students','index',1,NULL),(5282,'batch_students','view',1,NULL),(5283,'batch_students','add',1,NULL),(5284,'batch_students','edit',1,NULL),(5285,'batch_students','delete',1,NULL),(5286,'student_attendances','index',1,NULL),(5287,'student_attendances','view',1,NULL),(5288,'student_attendances','add',1,NULL),(5289,'student_attendances','edit',1,NULL),(5290,'student_attendances','delete',1,NULL),(5291,'fee_configurations','index',1,NULL),(5292,'fee_configurations','view',1,NULL),(5293,'fee_configurations','add',1,NULL),(5294,'fee_configurations','edit',1,NULL),(5295,'fee_configurations','delete',1,NULL),(5296,'fees','index',1,NULL),(5297,'fees','view',1,NULL),(5298,'fees','add',1,NULL),(5299,'fees','edit',1,NULL),(5300,'fees','delete',1,NULL),(5301,'exams','index',1,NULL),(5302,'exams','view',1,NULL),(5303,'exams','add',1,NULL),(5304,'exams','edit',1,NULL),(5305,'exams','delete',1,NULL),(5306,'grade_points','index',1,NULL),(5307,'grade_points','view',1,NULL),(5308,'grade_points','add',1,NULL),(5309,'grade_points','edit',1,NULL),(5310,'grade_points','delete',1,NULL),(5311,'manage_marks','index',1,NULL),(5312,'manage_marks','view',1,NULL),(5313,'manage_marks','add',1,NULL),(5314,'manage_marks','edit',1,NULL),(5315,'manage_marks','delete',1,NULL),(5316,'report_tabulation_sheets','index',1,NULL),(5317,'report_tabulation_sheets','view',1,NULL),(5318,'report_tabulation_sheets','add',1,NULL),(5319,'report_tabulation_sheets','edit',1,NULL),(5320,'report_tabulation_sheets','delete',1,NULL),(5321,'report_mark_sheets','index',1,NULL),(5322,'report_mark_sheets','view',1,NULL),(5323,'report_mark_sheets','add',1,NULL),(5324,'report_mark_sheets','edit',1,NULL),(5325,'report_mark_sheets','delete',1,NULL),(5326,'employees','index',1,NULL),(5327,'employees','view',1,NULL),(5328,'employees','add',1,NULL),(5329,'employees','edit',1,NULL),(5330,'employees','delete',1,NULL),(5331,'employee_designations','index',1,NULL),(5332,'employee_designations','view',1,NULL),(5333,'employee_designations','add',1,NULL),(5334,'employee_designations','edit',1,NULL),(5335,'employee_designations','delete',1,NULL),(5336,'ac_ledgers','index',1,NULL),(5337,'ac_ledgers','view',1,NULL),(5338,'ac_ledgers','add',1,NULL),(5339,'ac_ledgers','edit',1,NULL),(5340,'ac_ledgers','delete',1,NULL),(5341,'ac_payment_vouchers','index',1,NULL),(5342,'ac_payment_vouchers','view',1,NULL),(5343,'ac_payment_vouchers','add',1,NULL),(5344,'ac_payment_vouchers','edit',1,NULL),(5345,'ac_payment_vouchers','delete',1,NULL),(5346,'ac_receipt_vouchers','index',1,NULL),(5347,'ac_receipt_vouchers','view',1,NULL),(5348,'ac_receipt_vouchers','add',1,NULL),(5349,'ac_receipt_vouchers','edit',1,NULL),(5350,'ac_receipt_vouchers','delete',1,NULL),(5351,'ac_income_statements','index',1,NULL),(5352,'ac_income_statements','view',1,NULL),(5353,'authors','index',1,NULL),(5354,'authors','view',1,NULL),(5355,'authors','add',1,NULL),(5356,'authors','edit',1,NULL),(5357,'authors','delete',1,NULL),(5358,'book_types','index',1,NULL),(5359,'book_types','view',1,NULL),(5360,'book_types','add',1,NULL),(5361,'book_types','edit',1,NULL),(5362,'book_types','delete',1,NULL),(5363,'books','index',1,NULL),(5364,'books','view',1,NULL),(5365,'books','add',1,NULL),(5366,'books','edit',1,NULL),(5367,'books','delete',1,NULL),(5368,'manage_library_books','index',1,NULL),(5369,'manage_library_books','view',1,NULL),(5370,'manage_library_books','add',1,NULL),(5371,'manage_library_books','edit',1,NULL),(5372,'manage_library_books','delete',1,NULL),(5373,'dormitories','index',1,NULL),(5374,'dormitories','view',1,NULL),(5375,'dormitories','add',1,NULL),(5376,'dormitories','edit',1,NULL),(5377,'dormitories','delete',1,NULL),(5378,'student_dormitories','index',1,NULL),(5379,'student_dormitories','view',1,NULL),(5380,'student_dormitories','add',1,NULL),(5381,'student_dormitories','edit',1,NULL),(5382,'student_dormitories','delete',1,NULL),(5383,'transport_routes','index',1,NULL),(5384,'transport_routes','view',1,NULL),(5385,'transport_routes','add',1,NULL),(5386,'transport_routes','edit',1,NULL),(5387,'transport_routes','delete',1,NULL),(5388,'transports','index',1,NULL),(5389,'transports','view',1,NULL),(5390,'transports','add',1,NULL),(5391,'transports','edit',1,NULL),(5392,'transports','delete',1,NULL),(5393,'users','index',1,NULL),(5394,'users','view',1,NULL),(5395,'users','add',1,NULL),(5396,'users','edit',1,NULL),(5397,'users','delete',1,NULL),(5398,'users','change_password',1,NULL),(5399,'user_roles','index',1,NULL),(5400,'user_roles','view',1,NULL),(5401,'user_roles','add',1,NULL),(5402,'user_roles','edit',1,NULL),(5403,'user_roles','delete',1,NULL),(5404,'user_roles','user_role_wise_privillige',1,NULL),(5405,'report_attendance_registers','index',1,NULL),(5406,'report_attendance_registers','view',1,NULL),(5407,'report_attendance_registers','add',1,NULL),(5408,'report_attendance_registers','edit',1,NULL),(5409,'report_attendance_registers','delete',1,NULL);

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'User Role identification number',
  `role_name` varchar(200) NOT NULL,
  `role_description` varchar(500) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_user_roles_role_Name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`role_name`,`role_description`,`parent_id`,`lft`,`rgt`,`is_editable`) values (1,'Super Admin','Super Admin',NULL,1,38,0),(10,'Teacher','Teacher',NULL,NULL,NULL,0),(12,'Computer Operator',NULL,NULL,NULL,NULL,1),(13,'Parent','Student Parent',NULL,NULL,NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
