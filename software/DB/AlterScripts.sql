/**** ASIF 11-01-2017 *****/
CREATE TABLE `fee_configurations` (
  `FeeConfigId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) NOT NULL,
  `FeeType` char(1) DEFAULT NULL COMMENT 'M=>Monthly, A=>Admision',
  `Amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`FeeConfigId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `fees` (
  `FeeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `FeeType` char(1) DEFAULT NULL COMMENT 'A=>AdmissionFee, M=>Monhtly Fee',
  `TransactionDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `EntryOn` datetime DEFAULT NULL,
  `EntryBy` int(1) DEFAULT NULL,
  PRIMARY KEY (`FeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**** ASIF 13-01-2017 *****/
ALTER TABLE `sp_sms`.`employees` ADD COLUMN `IsTeacher` TINYINT(1) DEFAULT 0 NULL AFTER `Gender`;
/**** ASIF 17-01-2017 *****/
CREATE TABLE `student_attendances` (
  `AttendanceId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `SectionId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `AttendanceType` char(1) DEFAULT NULL COMMENT 'A,P,L',
  `GroupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`AttendanceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/**** ASIF 18-01-2017 *****/
CREATE TABLE `exams` (
  `ExamId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ExamDate` date DEFAULT NULL,
  `ExamName` varchar(100) DEFAULT NULL,
  `ExamDescription` tinytext,
  PRIMARY KEY (`ExamId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `grade_points` (
  `GradeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `GradeName` varchar(100) DEFAULT NULL,
  `GradePoint` varchar(10) DEFAULT NULL,
  `MarkFrom` int(10) DEFAULT NULL,
  `MarkTo` int(10) DEFAULT NULL,
  `GradeDescription` tinytext,
  PRIMARY KEY (`GradeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `academic_documents` (
  `DocumentId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) DEFAULT NULL,
  `DocumentName` varchar(100) DEFAULT NULL,
  `DocumentType` char(1) DEFAULT NULL COMMENT 'S=>Syllabus,B=>BookList',
  `DocumentPath` varchar(250) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`DocumentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('A', '4.0', '70', '79');
INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('A-', '3.5', '60', '69');
INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('B', '3.0', '50', '59');
INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('C', '2', '40', '49');
INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('D', '1', '33', '39');
INSERT INTO `sp_sms`.`grade_points` (`GradeName`, `GradePoint`, `MarkFrom`, `MarkTo`) VALUES ('F', '0', '0', '32');

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/**** ASIF 13-01-2017 *****/
ALTER TABLE `user_roles` ADD COLUMN `is_editable` TINYINT(1) DEFAULT 1 NULL AFTER `rgt`;
/**** ASIF 25-01-2017 *****/
ALTER TABLE `organizations` ADD COLUMN `StudentCodePrefix` VARCHAR(10) NULL AFTER `MemoPrfix`;
ALTER TABLE `user` ADD COLUMN `is_parents` TINYINT(1) DEFAULT 0 NULL AFTER `user_name`;
/**** ASIF 25-01-2017 *****/
ALTER TABLE `parents` ADD COLUMN `UserId` INT(11) NULL AFTER `ContactNumber`;

CREATE TABLE `dormitories` (
  `DormitoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `DormitoryName` varchar(100) DEFAULT NULL,
  `NoOfRooms` int(11) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`DormitoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `student_dormitories` (
  `StudentDormitoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `DormitoryId` int(11) DEFAULT NULL,
  `RoomNumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`StudentDormitoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `book_authors` (
  `AuthorId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AuthorName` varchar(200) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`AuthorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `book_types` (
  `TypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `books` (
  `BookID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BookName` varchar(200) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `NumberOfBooks` int(11) DEFAULT NULL,
  `BookTypeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `book_details` (
  `BookDetailsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BookId` int(11) DEFAULT NULL,
  `IdentificationNumber` varchar(100) DEFAULT NULL,
  `BookStatus` char(1) DEFAULT 'A' COMMENT 'A=>Available,N=>Not Available',
  PRIMARY KEY (`BookDetailsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

INSERT INTO `dormitories` (`DormitoryName`, `NoOfRooms`) VALUES ('Dormitory 001', '25');
INSERT INTO `dormitories` (`DormitoryName`, `NoOfRooms`) VALUES ('Dormitory 002', '25');
INSERT INTO `dormitories` (`DormitoryName`, `NoOfRooms`) VALUES ('Dormitory 003', '25 ');