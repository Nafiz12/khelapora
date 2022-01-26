/************* ASIF 26-01-2017 **********/
ALTER TABLE `students` DROP COLUMN `UpdatedBy`, DROP COLUMN `UpdateDate`, ADD COLUMN `IsResidential` TINYINT(1) DEFAULT 0 NULL AFTER `StudentStatus`;

ALTER TABLE `sp_sms`.`books` CHANGE `BookTypeId` `TypeId` INT(11) NULL;
ALTER TABLE `sp_sms`.`books` CHANGE `BookID` `BookId` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;