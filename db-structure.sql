SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bandify` DEFAULT CHARACTER SET utf8 ;
USE `bandify`;

-- -----------------------------------------------------
-- Table `bandify`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`users` (
    `userId` INT(11) NOT NULL AUTO_INCREMENT,
    `firstname` CHAR(30) NOT NULL,
    `lastname` CHAR(30) NOT NULL,
    `email` CHAR(30) NOT NULL,
    `password` CHAR(30) NOT NULL,
    `city` CHAR(30),
    `instrument1` INT(11),
    `instrument2` INT(11),
    `instrument3` INT(11),
    `influence1` INT(11),
    `influence2` INT(11),
    `influence3` INT(11),
    `bio` TEXT(255),
    `created_at` TIMESTAMP,
    PRIMARY KEY (`userId`),
    CONSTRAINT `fk_instrument1_instrumentId`
        FOREIGN KEY (`instrument1`)
        REFERENCES `bandify`.`instruments` (`instrumentId`),
    CONSTRAINT `fk_instrument2_instrumentId`
        FOREIGN KEY (`instrument2`)
        REFERENCES `bandify`.`instruments` (`instrumentId`),
    CONSTRAINT `fk_instrument3_instrumentId`
        FOREIGN KEY (`instrument3`)
        REFERENCES `bandify`.`instruments` (`instrumentId`),
    CONSTRAINT `fk_influence1_instrumentId`
        FOREIGN KEY (`influence1`)
        REFERENCES `bandify`.`musicInfluences` (`influenceId`),
    CONSTRAINT `fk_influence2_instrumentId`
        FOREIGN KEY (`influence2`)
        REFERENCES `bandify`.`musicInfluences` (`influenceId`),
    CONSTRAINT `fk_influence3_instrumentId`
        FOREIGN KEY (`influence3`)
        REFERENCES `bandify`.`musicInfluences` (`influenceId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`musicGroups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicGroups` (
    `musicGroupId` INT(11) NOT NULL AUTO_INCREMENT,
    `memberId` INT(11) NOT NULL,
    `groupName` INT(11) NOT NULL,
    `created_at` TIMESTAMP,
    PRIMARY KEY (`musicGroupId`),
    CONSTRAINT `fk_memberId_userId`
        FOREIGN KEY (`memberId`)
        REFERENCES `bandify`.`users` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`searchPosts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`searchPosts` (
    `searchPostId` INT(11) NOT NULL AUTO_INCREMENT,
    `authorId` INT(11) NOT NULL,
    `title` CHAR(20) NOT NULL,
    `body` TEXT(255) NOT NULL,
    `created_at` TIMESTAMP,
    PRIMARY KEY (`searchPostId`),
    CONSTRAINT `fk_authorId_userId`
        FOREIGN KEY (`authorId`)
        REFERENCES `bandify`.`users` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`instruments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`instruments` (
    `instrumentId` INT(11) NOT NULL AUTO_INCREMENT,
    `name` INT(20) NOT NULL,
    PRIMARY KEY (`instrumentId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`musicInfluences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicInfluences` (
    `influenceId` INT(11) NOT NULL AUTO_INCREMENT,
    `name` INT(20) NOT NULL,
    PRIMARY KEY (`influenceId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;