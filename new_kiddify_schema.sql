SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `kiddify` DEFAULT CHARACTER SET latin1 ;
USE `kiddify` ;

-- -----------------------------------------------------
-- Table `kiddify`.`badge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`badge` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`badge` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `translation` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `key` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `kiddify`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`category` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `language` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `key` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `kiddify`.`contest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`contest` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`contest` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `badge_id` INT(11) NULL DEFAULT NULL,
  `logo_url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `banner_url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `description_short` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `description_long` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `date_start` DATETIME NULL DEFAULT NULL,
  `date_end` DATETIME NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_1A95CB5F7A2C2FC`
    FOREIGN KEY (`badge_id`)
    REFERENCES `kiddify`.`badge` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_1A95CB5F7A2C2FC` ON `kiddify`.`contest` (`badge_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`country` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`country` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `kiddify`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`user` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `country_id` INT(11) NULL DEFAULT NULL,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `avatar_url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `schoolname` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `parent_email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `tc_agree` TINYINT(1) NULL DEFAULT NULL,
  `city` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `birthdate` DATE NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_8D93D649F92F3E70`
    FOREIGN KEY (`country_id`)
    REFERENCES `kiddify`.`country` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_8D93D649F92F3E70` ON `kiddify`.`user` (`country_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`video` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`video` (
  `id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `contest_id` INT(11) NULL DEFAULT NULL,
  `category_id` INT(11) NULL DEFAULT NULL,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `accepted` DATE NULL DEFAULT NULL,
  `preview_url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `created` DATE NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `user_id`),
  CONSTRAINT `FK_7CC7DA2C12469DE2`
    FOREIGN KEY (`category_id`)
    REFERENCES `kiddify`.`category` (`id`),
  CONSTRAINT `FK_7CC7DA2C1CD0F0DE`
    FOREIGN KEY (`contest_id`)
    REFERENCES `kiddify`.`contest` (`id`),
  CONSTRAINT `FK_7CC7DA2CA76ED395`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_7CC7DA2CA76ED395` ON `kiddify`.`video` (`user_id` ASC);

CREATE INDEX `IDX_7CC7DA2C1CD0F0DE` ON `kiddify`.`video` (`contest_id` ASC);

CREATE INDEX `IDX_7CC7DA2C12469DE2` ON `kiddify`.`video` (`category_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`badge_video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`badge_video` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`badge_video` (
  `badge_id` INT(11) NOT NULL,
  `video_id` INT(11) NOT NULL,
  PRIMARY KEY (`badge_id`, `video_id`),
  CONSTRAINT `FK_18087C0029C1004E`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`),
  CONSTRAINT `FK_18087C00F7A2C2FC`
    FOREIGN KEY (`badge_id`)
    REFERENCES `kiddify`.`badge` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_18087C00F7A2C2FC` ON `kiddify`.`badge_video` (`badge_id` ASC);

CREATE INDEX `IDX_18087C0029C1004E` ON `kiddify`.`badge_video` (`video_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`contest_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`contest_user` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`contest_user` (
  `contests_id` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`contests_id`, `users_id`),
  CONSTRAINT `FK_46F8C68267B3B43D`
    FOREIGN KEY (`users_id`)
    REFERENCES `kiddify`.`user` (`id`),
  CONSTRAINT `FK_46F8C68286069206`
    FOREIGN KEY (`contests_id`)
    REFERENCES `kiddify`.`contest` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_46F8C68286069206` ON `kiddify`.`contest_user` (`contests_id` ASC);

CREATE INDEX `IDX_46F8C68267B3B43D` ON `kiddify`.`contest_user` (`users_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`counter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`counter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`counter` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `video_id` INT(11) NULL DEFAULT NULL,
  `key` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `counter` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_C122947829C1004E`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_C122947829C1004E` ON `kiddify`.`counter` (`video_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`filter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`filter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`filter` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `weight` INT(11) NULL DEFAULT NULL,
  `default` TINYINT(1) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_7FC45F1DA76ED395`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_7FC45F1DA76ED395` ON `kiddify`.`filter` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`follow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`follow` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`follow` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `follower_id` INT(11) NULL DEFAULT NULL,
  `followed_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_68344470D956F010`
    FOREIGN KEY (`followed_id`)
    REFERENCES `kiddify`.`user` (`id`),
  CONSTRAINT `FK_68344470AC24F853`
    FOREIGN KEY (`follower_id`)
    REFERENCES `kiddify`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_68344470AC24F853` ON `kiddify`.`follow` (`follower_id` ASC);

CREATE INDEX `IDX_68344470D956F010` ON `kiddify`.`follow` (`followed_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`message` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`message` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `recipient_id` INT(11) NULL DEFAULT NULL,
  `sender_id` INT(11) NULL DEFAULT NULL,
  `type` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `subject` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `body` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `viewed` TINYINT(1) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_B6BD307FF624B39D`
    FOREIGN KEY (`sender_id`)
    REFERENCES `kiddify`.`user` (`id`),
  CONSTRAINT `FK_B6BD307FE92F8F78`
    FOREIGN KEY (`recipient_id`)
    REFERENCES `kiddify`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_B6BD307FE92F8F78` ON `kiddify`.`message` (`recipient_id` ASC);

CREATE INDEX `IDX_B6BD307FF624B39D` ON `kiddify`.`message` (`sender_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`parameter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`parameter` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `filter_id` INT(11) NULL DEFAULT NULL,
  `sorting_id` INT(11) NULL DEFAULT NULL,
  `people_id` INT(11) NULL DEFAULT NULL,
  `tag_ids` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `category_ids` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `badge_ids` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_2A979110D395B25E`
    FOREIGN KEY (`filter_id`)
    REFERENCES `kiddify`.`filter` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_2A979110D395B25E` ON `kiddify`.`parameter` (`filter_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`review`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`review` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`review` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL DEFAULT NULL,
  `video_id` INT(11) NULL DEFAULT NULL,
  `video_user_id` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_794381C629C1004E42833A38`
    FOREIGN KEY (`video_id` , `video_user_id`)
    REFERENCES `kiddify`.`video` (`id` , `user_id`),
  CONSTRAINT `FK_794381C6A76ED395`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_794381C6A76ED395` ON `kiddify`.`review` (`user_id` ASC);

CREATE INDEX `IDX_794381C629C1004E42833A38` ON `kiddify`.`review` (`video_id` ASC, `video_user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`review_criteria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`review_criteria` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`review_criteria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `review_id` INT(11) NULL DEFAULT NULL,
  `achived` TINYINT(1) NULL DEFAULT NULL,
  `key` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_955D128A3E2E969B`
    FOREIGN KEY (`review_id`)
    REFERENCES `kiddify`.`review` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_955D128A3E2E969B` ON `kiddify`.`review_criteria` (`review_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`tag` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`tag` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `language` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `kiddify`.`transcript`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`transcript` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`transcript` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `video_id` INT(11) NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  `language` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `body` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `version` INT(11) NULL DEFAULT NULL,
  `is_srt` TINYINT(1) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_A8F617C3A76ED395`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`),
  CONSTRAINT `FK_A8F617C329C1004E`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_A8F617C329C1004E` ON `kiddify`.`transcript` (`video_id` ASC);

CREATE INDEX `IDX_A8F617C3A76ED395` ON `kiddify`.`transcript` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`video_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`video_tag` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`video_tag` (
  `video_id` INT(11) NOT NULL,
  `tag_id` INT(11) NOT NULL,
  PRIMARY KEY (`video_id`, `tag_id`),
  CONSTRAINT `FK_F9107287BAD26311`
    FOREIGN KEY (`tag_id`)
    REFERENCES `kiddify`.`tag` (`id`),
  CONSTRAINT `FK_F910728729C1004E`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE INDEX `IDX_F910728729C1004E` ON `kiddify`.`video_tag` (`video_id` ASC);

CREATE INDEX `IDX_F9107287BAD26311` ON `kiddify`.`video_tag` (`tag_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
