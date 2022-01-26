
ALTER TABLE `students` DROP COLUMN `IsResidential`, ADD COLUMN `BranchId` INT(11) NULL AFTER `StudentId`, ADD COLUMN `Shift` CHAR(1) DEFAULT 'M' NULL COMMENT 'M=Morning, D=Dat' AFTER `BranchId`, ADD COLUMN `Medium` CHAR(1) DEFAULT 'B' NULL COMMENT 'B=Bangla, E=English' AFTER `Year`, CHANGE `DateOfBirth` `DateOfBirth` DATE NULL AFTER `RollNo`, ADD COLUMN `FathersOccupation` VARCHAR(100) NULL COMMENT 'TEACHER/STUDENT/GOVT.SERVICE/RETIRED/PRIVET SERVICE/POLITICIAN/ POLICE OFFICER/BUSINESS/AGRECULTURE/DAY LABORE/OTHERS' AFTER `FathersName`, ADD COLUMN `FathersEmail` VARCHAR(100) NULL AFTER `FathersOccupation`, CHANGE `MothersName` `MothersName` VARCHAR(50) CHARSET latin1 COLLATE latin1_swedish_ci NULL AFTER `FathersEmail`, ADD COLUMN `MothersOccupation` VARCHAR(100) NULL COMMENT 'TEACHER/STUDENT/GOVT.SERVICE/RETIRED/PRIVET SERVICE/POLITICIAN/ POLICE OFFICER/BUSINESS/AGRECULTURE/DAY LABORE/HOUSE WIFE/OTHERS' AFTER `MothersName`, CHANGE `Address` `PresentAddress` VARCHAR(200) CHARSET latin1 COLLATE latin1_swedish_ci NULL, ADD COLUMN `PermanentAddress` TEXT NULL AFTER `PresentAddress`, ADD COLUMN `BloodGroup` VARCHAR(100) NULL COMMENT 'UNKNOWN/A+/A-/B+/B-/O+/O-/AB+/AB-' AFTER `StudentStatus`, ADD COLUMN `Religion` VARCHAR(100) NULL COMMENT 'ISLAM/HINDU/KRISTIAN/BUDDHIST' AFTER `BloodGroup`, ADD COLUMN `StudentPhoto` VARCHAR(500) NULL AFTER `Religion`;


CREATE TABLE `branches` (
  `BranchId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BranchName` varchar(100) DEFAULT NULL,
  `BranchAddress` text,
  `IsHeadOffice` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`BranchId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/** 28-11-2018 **/
ALTER TABLE `branches` CHANGE `BranchName` `BranchName` VARCHAR(100) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL, ADD COLUMN `BranchCode` VARCHAR(100) NOT NULL AFTER `BranchName`;
ALTER TABLE `students` ADD COLUMN `Image` VARCHAR(500) NULL AFTER `EntryDate`;


ALTER TABLE `students` ADD COLUMN `MothersNumber` VARCHAR(100) NULL AFTER `MothersName`, ADD COLUMN `EmergencyName` VARCHAR(100) NULL AFTER `EntryDate`, ADD COLUMN `EmergencyNumber` VARCHAR(100) NULL AFTER `EmergencyName`;
/** 30-11-2018 **/
ALTER TABLE `student_attendances` ADD COLUMN `BranchId` INT(11) NULL AFTER `AttendanceId`;

/** 02-12-2018 **/
DROP TABLE  `fee_types`;

CREATE TABLE `fee_types` (
  `TypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) DEFAULT NULL,
  `Description` text,
  `LedgerCode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `fee_configurations` CHANGE `FeeTypeId` `TypeId` INT(11) NULL COMMENT 'M=>Monthly, A=>Admision';
ALTER TABLE `fees` ADD COLUMN `VoucherId` INT(11) NULL AFTER `EntryBy`;
ALTER TABLE `fees` CHANGE `FeeTypeId` `TypeId` INT(11) NULL COMMENT 'A=>AdmissionFee, M=>Monhtly Fee';

/** 03-12-2018 **/
CREATE TABLE `employee_departments` (
  `DepartmentId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DepartmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `employees` (
  `EmployeeId` int(11) NOT NULL AUTO_INCREMENT,
  `BranchId` int(11) DEFAULT NULL,
  `EmployeeName` varchar(50) NOT NULL,
  `EmployeeCode` varchar(100) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Nid` varchar(20) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
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
  `Ref2` varchar(100) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `DegreeId` varchar(100) DEFAULT NULL,
  `IsTeacher` tinyint(1) DEFAULT '1',
  `Image` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/** 04-12-2018 **/
CREATE TABLE `employee_branch_transfers` (
  `TransferId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `EmployeeId` int(11) DEFAULT NULL,
  `OldBranchId` int(11) DEFAULT NULL,
  `NewBranchId` int(11) DEFAULT NULL,
  `TransferDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  PRIMARY KEY (`TransferId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `sms`.`employees` CHANGE `Status` `Status` CHAR(1) NULL;

CREATE TABLE `employee_promotions` (
  `PromotionId` int(11) NOT NULL AUTO_INCREMENT,
  `BranchId` int(11) DEFAULT NULL,
  `EmployeeId` int(11) DEFAULT NULL,
  `PromotionDate` date DEFAULT NULL,
  `OldDesignationId` int(11) DEFAULT NULL,
  `NewDesignationId` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `Type` char(1) DEFAULT NULL COMMENT 'P=>Promotion, D=>Demotion',
  PRIMARY KEY (`PromotionId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `employees` ADD COLUMN `Reason` TEXT(500) NULL AFTER `Image`;

/** 05-12-2018 **/
ALTER TABLE `fees` ADD COLUMN `MemoNumber` VARCHAR(100) NULL AFTER `FeeId`;

/** 06-12-2018 **/
ALTER TABLE `acc_vouchers` ADD COLUMN `BranchId` INT(11) NOT NULL AFTER `VoucherId`;
ALTER TABLE `acc_voucher_details` ADD COLUMN `BranchId` INT(11) NULL AFTER `VoucherDetailsId`;
ALTER TABLE `fee_configurations` ADD COLUMN `BranchId` INT(11) NOT NULL AFTER `FeeConfigId`;
ALTER TABLE `fees` ADD COLUMN `BranchId` INT(11) NULL AFTER `FeeId`;
ALTER TABLE `fees` ADD COLUMN `BranchId` INT(11) NULL AFTER `FeeId`;
ALTER TABLE `config_sections` ADD COLUMN `BranchId` INT(11) NULL AFTER `SectionId`;
ALTER TABLE `sms`.`fees` DROP COLUMN `ClassId`, DROP COLUMN `SectionId`, DROP COLUMN `Month`, DROP COLUMN `Year`, DROP COLUMN `TypeId`, CHANGE `MemoNumber` `MemoNo` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL, CHANGE `Amount` `TotalAmount` DECIMAL(10,2) NULL;
CREATE TABLE `sms`.`fee_details`( `FeeDetailsId` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, `FeeId` INT(11), `StudentId` INT(11), `BranchId` INT(11), `TypeId` INT(11), `Amount` DECIMAL(10,2), PRIMARY KEY (`FeeDetailsId`) );

/** 06-12-2018 **/
ALTER TABLE `exams` ADD COLUMN `BranchId` INT(11) NULL AFTER `ExamId`, CHANGE `ExamDescription` `ExamDescription` TEXT(500) CHARSET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `exams` DROP COLUMN `ExamDate`;

ALTER TABLE `manage_marks` ADD COLUMN `BranchId` INT(11) NULL AFTER `MarkId`, CHANGE `Year` `ExamDate` DATE NULL;


CREATE TABLE `marks` (
  `MarkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BranchId` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamId` int(11) NOT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  PRIMARY KEY (`MarkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `mark_details` (
  `MarkDetailsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `MarkId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `SbaMark` int(20) DEFAULT NULL,
  `SubjectiveMark` int(20) DEFAULT NULL,
  `ObjectiveMark` int(20) DEFAULT NULL,
  `TotalMark` int(20) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MarkDetailsId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE `manage_marks`;
/** 08-12-2018 **/
ALTER TABLE `parents` ADD COLUMN `BranchId` INT(11) NULL AFTER `ParentId`;
/** 09-12-2018 **/
ALTER TABLE `config_class_periods` ADD COLUMN `BranchId` INT(11) NULL AFTER `PeriodId`;

ALTER TABLE `config_class_routines` ADD COLUMN `BranchId` INT(11) NULL AFTER `RoutineId`;

ALTER TABLE `config_sections` ADD COLUMN `SectionCode` VARCHAR(100) NULL AFTER `BranchId`;
ALTER TABLE `config_classes` ADD COLUMN `ClassCode` VARCHAR(100) NULL AFTER `BranchId`;

ALTER TABLE `config_class_routines` ADD COLUMN `Shift` CHAR(2) NULL AFTER `SectionId`, ADD COLUMN `Medium` CHAR(2) NULL AFTER `Shift`;
/** 10-12-2018 **/
ALTER TABLE `config_class_periods` ADD COLUMN `Shift` CHAR(2) NULL AFTER `BranchId`;
ALTER TABLE `fees` ADD COLUMN `Waiver` DECIMAL(10,2) NULL AFTER `TransactionDate`;
ALTER TABLE `acc_vouchers` ADD COLUMN `WaiverAmount` DECIMAL(10,2) NULL AFTER `VoucherDate`;


ALTER TABLE `students` ADD COLUMN `MonthlyWaiverAmount` DECIMAL(10,2) NULL AFTER `Image`;
ALTER TABLE `fee_types` ADD COLUMN `IsWaiverApplicable` TINYINT(1) NULL AFTER `Description`;
ALTER TABLE `fee_types` ADD COLUMN `IsMonthlyFee` TINYINT(1) DEFAULT 0 NULL AFTER `Description`;
ALTER TABLE `fee_configurations` ADD COLUMN `WaiverAmount` DECIMAL(10,2) NULL AFTER `Amount`;
ALTER TABLE `fees` CHANGE `Waiver` `TotalWaiverAmount` DECIMAL(10,2) NULL;
ALTER TABLE `fee_details` ADD COLUMN `WaiverAmount` DECIMAL(10,2) NULL AFTER `TypeId`;
ALTER TABLE `acc_vouchers` DROP COLUMN `WaiverAmount`;
/** 11-12-2018 **/
ALTER TABLE `exams` ADD COLUMN `HasSba` TINYINT(1) DEFAULT 0 NULL AFTER `BranchId`, ADD COLUMN `HasObjective` TINYINT(1) DEFAULT 0 NULL AFTER `HasSba`;

ALTER TABLE `mark_details` ADD COLUMN `SbaDeafault` INT(11) NULL AFTER `StudentId`, ADD COLUMN `SubjectiveDefault` INT NULL AFTER `SbaMark`, ADD COLUMN `ObjectiveDefault` INT NULL AFTER `SubjectiveMark`;
/** 12-12-2018 **/
ALTER TABLE `config_subjects` ADD COLUMN `BranchId` INT(11) NULL AFTER `SubjectId`;
UPDATE `config_subjects` SET BranchId=4;

/** 12-12-2018 **/
ALTER TABLE `branches` ADD COLUMN `ContactNumber` VARCHAR(100) NULL AFTER `BranchCode`, ADD COLUMN `Logo` TEXT(500) NULL AFTER `IsHeadOffice`;


/** 15-12-2018 **/
CREATE TABLE `exam_routines` (
  `RoutineId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `ExamId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDate` date DEFAULT NULL,
  PRIMARY KEY (`RoutineId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE `exam_routine_details` (
  `RoutineDetailsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RoutineId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `ExamId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL,
  `ExamDate` date DEFAULT NULL,
  PRIMARY KEY (`RoutineDetailsId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/** 24-12-2018 **/
ALTER TABLE `employees` ADD COLUMN `AltContactNumber` VARCHAR(20) NULL AFTER `ContactNumber`, ADD COLUMN `RefContactNumber` VARCHAR(20) NULL AFTER `AltContactNumber`;
ALTER TABLE `employees` CHANGE `Email` `Email` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `branches` ADD COLUMN `LandPhone` VARCHAR(100) NULL AFTER `Logo`, ADD COLUMN `Mobile` VARCHAR(100) NULL AFTER `LandPhone`, ADD COLUMN `Fax` VARCHAR(100) NULL AFTER `Mobile`, ADD COLUMN `Email` VARCHAR(100) NULL AFTER `Fax`, ADD COLUMN `BranchOpeningDate` DATE NULL AFTER `Email`, ADD COLUMN `StartTime` VARCHAR(100) NULL AFTER `BranchOpeningDate`, ADD COLUMN `EndTime` VARCHAR(100) NULL AFTER `StartTime`;
/** 25-12-2018 **/
ALTER TABLE `organizations` ADD COLUMN `Logo` TEXT(500) NULL AFTER `StudentCodePrefix`;
/** 01-01-2019 **/
ALTER TABLE `fees` ADD COLUMN `Year` VARCHAR(100) NULL AFTER `BranchId`;
ALTER TABLE `fee_details` ADD COLUMN `Year` VARCHAR(100) NULL AFTER `FeeId`;

/** 02-01-2019 **/
ALTER TABLE `employees` CHANGE `Gender` `Gender` CHAR(1) CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `AltContactNumber`, CHANGE `RefContactNumber` `RefContactNumber` VARCHAR(20) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `Ref1`, CHANGE `Ref2` `Ref2` VARCHAR(100) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `RefContactNumber`, ADD COLUMN `Ref2ContactNumber` VARCHAR(100) NULL AFTER `Ref2`;
/** 12-01-2019 **/
ALTER TABLE `fee_details` ADD COLUMN `ClassId` INT(11) NULL AFTER `StudentId`;
ALTER TABLE `fee_details` ADD COLUMN `TransactionDate` DATE NULL AFTER `Year`;
/** 14-01-2019 **/
ALTER TABLE `branches` ADD COLUMN `Year` VARCHAR(200) DEFAULT '2019-2020' NULL AFTER `EndTime`;
ALTER TABLE `fee_types` ADD COLUMN `IsOneTimeFee` TINYINT(1) DEFAULT 0 NULL AFTER `IsWaiverApplicable`;

/** 18-01-2019 **/
ALTER TABLE `acc_ledgers` ADD COLUMN `IsGroupHead` TINYINT(1) DEFAULT 1 NULL AFTER `LedgerCode`, ADD COLUMN `GroupHeadId` INT(11) DEFAULT 0 NULL AFTER `IsGroupHead`;
CREATE TABLE `ac_opening_balances` (
  `BalanceId` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `LedgerId` int(11) DEFAULT NULL,
  `BranchId` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `students` ADD COLUMN `PreviousCode` VARCHAR(100) NULL AFTER `MonthlyWaiverAmount`;

CREATE TABLE `leave_categories` (`LeaveCategoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,`Name` varchar(20) NOT NULL,PRIMARY KEY (`LeaveCategoryId`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `leave_applies` ( `LeaveApplicationId` INT(4) NOT NULL AUTO_INCREMENT , `UserId` VARCHAR(30) NOT NULL , `Date` DATE NOT NULL , `FromDate` DATE NOT NULL , `Todate` DATE NOT NULL , `LeaveCategoriesId` INT(2) NOT NULL , `Reason` TEXT NOT NULL , `IsApproved` INT(2) NOT NULL , PRIMARY KEY (`LeaveApplicationId`)) ENGINE = InnoDB;
CREATE TABLE `leave_calculations` (`LeaveCalculationId` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,`Year` VARCHAR(20) NOT NULL,`Number` INT(11) NOT NULL,PRIMARY KEY (`LeaveCalculationId`)) ENGINE=INNODB DEFAULT CHARSET=latin1;

ALTER TABLE `leave_calculations` CHANGE `Number` `SickLeave` INT(11) NOT NULL, ADD COLUMN `EarnLeave` INT(11) NULL AFTER `SickLeave`;
ALTER TABLE `user` ADD COLUMN `EmployeeId` INT(11) NULL AFTER `BranchId`;


ALTER TABLE `branches` ADD COLUMN `Shift` VARCHAR(5) NULL AFTER `Year`, ADD COLUMN `Medium` VARCHAR(5) NULL AFTER `Shift`;



/** 27-01-2019 **/
ALTER TABLE `fee_types` ADD COLUMN `CategoryId` INT(11) NOT NULL AFTER `TypeId`, CHANGE `LedgerCode` `LedgerCode` VARCHAR(11) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL;


CREATE TABLE `fee_categories` (
  `CategoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) DEFAULT NULL,
  `LedgerCode` int(100) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/** 28-01-2019 **/
ALTER TABLE `fee_types` DROP COLUMN `LedgerCode`;
ALTER TABLE `fee_configurations` ADD COLUMN `Medium` CHAR(1) NOT NULL AFTER `ClassId`;
ALTER TABLE `config_classes` ADD COLUMN `Serial` INT(11) NULL AFTER `ClassDescription`;

/** 31-01-2019 **/
CREATE TABLE `class_wise_subjects` (
  `SubjectClassId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BranchId` int(11) DEFAULT NULL,
  `Medium` char(1) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  PRIMARY KEY (`SubjectClassId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `students` CHANGE `RollNo` `RollNo` INT(20) NULL;
/** 2-02-2019 **/
ALTER TABLE `user` ADD COLUMN `is_employee` TINYINT(1) DEFAULT 0 NULL AFTER `is_parents`;
ALTER TABLE `user_roles` ADD COLUMN `is_teacher` TINYINT(1) DEFAULT 0 NULL AFTER `is_editable`, ADD COLUMN `is_parent` TINYINT(1) DEFAULT 0 NULL AFTER `is_teacher`;
ALTER TABLE `user_roles` ADD COLUMN `is_payroll` TINYINT(1) DEFAULT 0 NULL AFTER `is_parent`;
INSERT INTO `user_roles` (`role_name`, `role_description`, `is_editable`, `is_payroll`) VALUES ('Payroll ', 'Payroll User', '0', '1');
ALTER TABLE `employees` ADD COLUMN `UserId` INT(11) NULL AFTER `Reason`;

/** 04-02-2019** Asif Raihan **/
ALTER TABLE `user` ADD COLUMN `IsAdmin` TINYINT(1) DEFAULT 0 NULL AFTER `is_parents`;