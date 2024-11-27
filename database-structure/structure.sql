SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bandify` DEFAULT CHARACTER SET utf8;
USE `bandify`;

-- -----------------------------------------------------
-- Table `bandify`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`users` (
    `userId` INT NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `userCityId` INT,
    `bio` TEXT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`userId`),
    CONSTRAINT `fk_userCityId_cityId`
        FOREIGN KEY (`userCityId`)
        REFERENCES `bandify`.`cities` (`cityId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`cities` (
    `cityId` INT NOT NULL AUTO_INCREMENT,
    `cityName` VARCHAR(100) NOT NULL,
    `state` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`cityId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`musicGroups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicGroups` (
    `musicGroupId` INT NOT NULL AUTO_INCREMENT,
    `memberId` INT NOT NULL,
    `groupName` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`musicGroupId`),
    CONSTRAINT `fk_memberId_userId`
        FOREIGN KEY (`memberId`)
        REFERENCES `bandify`.`users` (`userId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`posts` (
    `postId` INT NOT NULL AUTO_INCREMENT,
    `authorId` INT NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`postId`),
    CONSTRAINT `fk_authorId_userId`
        FOREIGN KEY (`authorId`)
        REFERENCES `bandify`.`users` (`userId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`instruments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`instruments` (
    `instrumentId` INT NOT NULL AUTO_INCREMENT,
    `instrumentName` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`instrumentId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`influences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`influences` (
    `influenceId` INT NOT NULL AUTO_INCREMENT,
    `influenceName` VARCHAR(100),
    `genre` VARCHAR(50),
    PRIMARY KEY (`influenceId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Junction Table for User Instruments
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`userInstruments` (
    `userId` INT NOT NULL,
    `instrumentId` INT NOT NULL,
    FOREIGN KEY (`userId`) REFERENCES `bandify`.`users` (`userId`),
    FOREIGN KEY (`instrumentId`) REFERENCES `bandify`.`instruments` (`instrumentId`),
    PRIMARY KEY (`userId`, `instrumentId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Junction Table for User Influences
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`userInfluences` (
    `userId` INT NOT NULL,
    `influenceId` INT NOT NULL,
    FOREIGN KEY (`userId`) REFERENCES `bandify`.`users` (`userId`),
    FOREIGN KEY (`influenceId`) REFERENCES `bandify`.`influences` (`influenceId`),
    PRIMARY KEY (`userId`, `influenceId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Junction Table for MusicGroup Influences
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicGroupInfluences` (
    `musicGroupId` INT NOT NULL,
    `influenceId` INT NOT NULL,
    FOREIGN KEY (`musicGroupId`) REFERENCES `bandify`.`musicGroups` (`musicGroupId`),
    FOREIGN KEY (`influenceId`) REFERENCES `bandify`.`influences` (`influenceId`),
    PRIMARY KEY (`musicGroupId`, `influenceId`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
