SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bandify` DEFAULT CHARACTER SET utf8 ;
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
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`userId`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`profiles` (
    `profileId` INT(30) NOT NULL AUTO_INCREMENT,
    `profileCityId` INT,
    `bio` TEXT,
    `userId` int(30) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    PRIMARY KEY (`profileId`),

    CONSTRAINT `fk_profileCityId_cityId`
    FOREIGN KEY (`profileCityId`)
    REFERENCES `bandify`.`cities` (`cityId`),

    CONSTRAINT `fk_userId_userId`
    FOREIGN KEY (`userId`)
    REFERENCES `bandify`.`users` (`userId`)
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
    `groupId` INT NOT NULL AUTO_INCREMENT,
    `memberId` INT NOT NULL,
    `groupName` VARCHAR(50) NOT NULL,
    `groupCityId` INT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`groupId`),
    CONSTRAINT `fk_memberId_userId`
    FOREIGN KEY (`memberId`)
    REFERENCES `bandify`.`users` (`userId`),
    CONSTRAINT `fk_groupCityId_cityId`
    FOREIGN KEY (`groupCityId`)
    REFERENCES `bandify`.`cities` (`cityId`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `bandify`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`posts` (
    `postId` INT NOT NULL AUTO_INCREMENT,
    `authorId` INT NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    `postCityId` INT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`postId`),
    CONSTRAINT `fk_authorId_userId`
    FOREIGN KEY (`authorId`)
    REFERENCES `bandify`.`users` (`userId`),
    CONSTRAINT `fk_postCityId_cityId`
    FOREIGN KEY (`postCityId`)
    REFERENCES `bandify`.`cities` (`cityId`)
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
    `groupId` INT NOT NULL,
    `influenceId` INT NOT NULL,
    FOREIGN KEY (`groupId`) REFERENCES `bandify`.`musicGroups` (`groupId`),
    FOREIGN KEY (`influenceId`) REFERENCES `bandify`.`influences` (`influenceId`),
    PRIMARY KEY (`groupId`, `influenceId`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Junction Table for MusicGroup User
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bandify`.`musicGroupUsers` (
    `groupId` INT NOT NULL,
    `memberId` INT NOT NULL,
    `admin` BOOLEAN NOT NULL,
    FOREIGN KEY (`groupId`) REFERENCES `bandify`.`musicGroups` (`groupId`),
    FOREIGN KEY (`memberId`) REFERENCES `bandify`.`users` (`userId`),
    PRIMARY KEY (`groupId`, `memberId`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;