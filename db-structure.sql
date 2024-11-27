SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bandify` DEFAULT CHARACTER SET utf8 ;
USE `bandify`;

-- -----------------------------------------------------
-- Table `bandify`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`users` (
    `userId` INT(30) NOT NULL AUTO_INCREMENT,
    `firstname` CHAR(255) NOT NULL,
    `lastname` CHAR(255) NOT NULL,
    `email` CHAR(255) NOT NULL,
    `password` CHAR(255) NOT NULL,
    `cityId` INT(30),
    `instrument` INT[],
    `influence` INT[],
    `bio` TEXT,
    `created_at` TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    PRIMARY KEY (`userId`),
    CONSTRAINT `fk_cityId_cityId`
        FOREIGN KEY (`cityId`)
        REFERENCES `bandify`.`cities` (`cityId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`cities` (
    `cityId` INT(30) NOT NULL AUTO_INCREMENT,
    `cityName` CHAR(100) NOT NULL,
    `state` CHAR(50) NOT NULL,
    PRIMARY KEY (`cityId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`musicGroups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicGroups` (
    `musicGroupId` INT(30) NOT NULL AUTO_INCREMENT,
    `memberId` INT(30) NOT NULL,
    `groupName` CHAR(50) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    PRIMARY KEY (`musicGroupId`),
    CONSTRAINT `fk_memberId_userId`
        FOREIGN KEY (`memberId`)
        REFERENCES `bandify`.`users` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`posts` (
    `postId` INT(30) NOT NULL AUTO_INCREMENT,
    `authorId` INT(30) NOT NULL,
    `title` CHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    PRIMARY KEY (`postId`),
    CONSTRAINT `fk_authorId_userId`
        FOREIGN KEY (`authorId`)
        REFERENCES `bandify`.`users` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`instruments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`instruments` (
    `instrument` CHAR(50) NOT NULL,
    PRIMARY KEY (`instrument`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`influences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`influences` (
    `influenceId` INT(50),
    `influenceName` CHAR(100),
    `genre` CHAR(50),
    PRIMARY KEY (`influenceId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;