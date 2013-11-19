SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `kiddify` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `kiddify` ;

-- -----------------------------------------------------
-- Table `kiddify`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`country` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`country` (
  `id` INT NOT NULL,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kiddify`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`user` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`user` (
  `id` INT NOT NULL,
  `username` VARCHAR(255) NULL,
  `avatar_url` VARCHAR(255) NULL,
  `schoolname` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `parent_email` VARCHAR(255) NULL,
  `tc_agree` TINYINT(1) NULL,
  `city` VARCHAR(255) NULL,
  `birthdate` DATE NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_country1`
    FOREIGN KEY (`country_id`)
    REFERENCES `kiddify`.`country` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `username_UNIQUE` ON `kiddify`.`user` (`username` ASC);

CREATE INDEX `fk_user_country1_idx` ON `kiddify`.`user` (`country_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`badge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`badge` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`badge` (
  `id` INT NOT NULL,
  `url` VARCHAR(255) NULL,
  `title` VARCHAR(255) NULL,
  `translation` VARCHAR(255) NULL,
  `key` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kiddify`.`contest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`contest` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`contest` (
  `id` INT NOT NULL,
  `badge_id` INT NOT NULL,
  `logo_url` VARCHAR(255) NULL,
  `banner_url` VARCHAR(255) NULL,
  `title` VARCHAR(255) NULL,
  `description_short` TEXT NULL,
  `description_long` TEXT NULL,
  `date_start` DATETIME NULL,
  `date_end` DATETIME NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_contests_badges1`
    FOREIGN KEY (`badge_id`)
    REFERENCES `kiddify`.`badge` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_contests_badges1_idx` ON `kiddify`.`contest` (`badge_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`category` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `language` VARCHAR(45) NULL,
  `key` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kiddify`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`video` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`video` (
  `id` INT NOT NULL,
  `title` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  `contest_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  `url` VARCHAR(255) NULL,
  `accepted` DATE NULL,
  `preview_url` VARCHAR(255) NULL,
  `created` DATE NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`, `user_id`),
  CONSTRAINT `fk_video_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_videos_contests1`
    FOREIGN KEY (`contest_id`)
    REFERENCES `kiddify`.`contest` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_videos_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `kiddify`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_video_users1_idx` ON `kiddify`.`video` (`user_id` ASC);

CREATE INDEX `fk_videos_contests1_idx` ON `kiddify`.`video` (`contest_id` ASC);

CREATE INDEX `fk_videos_category1_idx` ON `kiddify`.`video` (`category_id` ASC);




-- -----------------------------------------------------
-- Table `kiddify`.`badge_video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`badge_video` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`badge_video` (
  `badge_id` INT NOT NULL,
  `video_id` INT NOT NULL,
  PRIMARY KEY (`badge_id`, `video_id`),
  CONSTRAINT `fk_badges_has_videos_badges1`
    FOREIGN KEY (`badge_id`)
    REFERENCES `kiddify`.`badge` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_badges_has_videos_videos1`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_badges_has_videos_videos1_idx` ON `kiddify`.`badge_video` (`video_id` ASC);

CREATE INDEX `fk_badges_has_videos_badges1_idx` ON `kiddify`.`badge_video` (`badge_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`transcript`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`transcript` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`transcript` (
  `id` INT NOT NULL,
  `video_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `language` VARCHAR(45) NULL,
  `body` TEXT NULL,
  `version` INT NULL,
  `is_srt` TINYINT(1) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_transcripts_videos1`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transcripts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_transcripts_videos1_idx` ON `kiddify`.`transcript` (`video_id` ASC);

CREATE INDEX `fk_transcripts_users1_idx` ON `kiddify`.`transcript` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`contest_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`contest_user` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`contest_user` (
  `contests_id` INT NOT NULL COMMENT 'a contest has at least one creator, but might have reviewers, etc\n',
  `users_id` INT NOT NULL,
  PRIMARY KEY (`contests_id`, `users_id`),
  CONSTRAINT `fk_contests_has_users_contests1`
    FOREIGN KEY (`contests_id`)
    REFERENCES `kiddify`.`contest` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contests_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_contests_has_users_users1_idx` ON `kiddify`.`contest_user` (`users_id` ASC);

CREATE INDEX `fk_contests_has_users_contests1_idx` ON `kiddify`.`contest_user` (`contests_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`tag` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`tag` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `language` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kiddify`.`video_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`video_tag` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`video_tag` (
  `video_id` INT NOT NULL,
  `tag_id` INT NOT NULL,
  PRIMARY KEY (`video_id`, `tag_id`),
  CONSTRAINT `fk_video_has_tag_video1`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_has_tag_tag1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `kiddify`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_video_has_tag_tag1_idx` ON `kiddify`.`video_tag` (`tag_id` ASC);

CREATE INDEX `fk_video_has_tag_video1_idx` ON `kiddify`.`video_tag` (`video_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`review`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`review` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`review` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `video_id` INT NOT NULL,
  `video_user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_review_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_video1`
    FOREIGN KEY (`video_id` , `video_user_id`)
    REFERENCES `kiddify`.`video` (`id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_review_user1_idx` ON `kiddify`.`review` (`user_id` ASC);

CREATE INDEX `fk_review_video1_idx` ON `kiddify`.`review` (`video_id` ASC, `video_user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`follow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`follow` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`follow` (
  `follower_id` INT NOT NULL,
  `followed_id` INT NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`follower_id`, `followed_id`),
  CONSTRAINT `fk_user_has_user_user1`
    FOREIGN KEY (`follower_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_user_user2`
    FOREIGN KEY (`followed_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_user_has_user_user2_idx` ON `kiddify`.`follow` (`followed_id` ASC);

CREATE INDEX `fk_user_has_user_user1_idx` ON `kiddify`.`follow` (`follower_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`message` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `body` VARCHAR(255) NULL,
  `viewed` TINYINT(1) NULL,
  `recipient_id` INT NOT NULL,
  `sender_id` INT NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_messages_user1`
    FOREIGN KEY (`recipient_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_user2`
    FOREIGN KEY (`sender_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_messages_user1_idx` ON `kiddify`.`message` (`recipient_id` ASC);

CREATE INDEX `fk_messages_user2_idx` ON `kiddify`.`message` (`sender_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`filter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`filter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`filter` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `weight` INT NULL,
  `default` TINYINT(1) NULL,
  `user_id` INT NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_filter_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kiddify`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_filter_user1_idx` ON `kiddify`.`filter` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`parameter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`parameter` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `filter_id` INT NOT NULL,
  `sorting_id` INT NULL,
  `people_id` INT NULL,
  `tag_ids` TINYTEXT NULL,
  `category_ids` TINYTEXT NULL,
  `badge_ids` TINYTEXT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_parameter_filter1`
    FOREIGN KEY (`filter_id`)
    REFERENCES `kiddify`.`filter` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_parameter_filter1_idx` ON `kiddify`.`parameter` (`filter_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`review_criteria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`review_criteria` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`review_criteria` (
  `id` INT NOT NULL,
  `achived` TINYINT(1) NULL,
  `key` VARCHAR(255) NULL,
  `review_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_review_criteria_review1`
    FOREIGN KEY (`review_id`)
    REFERENCES `kiddify`.`review` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_review_criteria_review1_idx` ON `kiddify`.`review_criteria` (`review_id` ASC);


-- -----------------------------------------------------
-- Table `kiddify`.`counter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kiddify`.`counter` ;

CREATE TABLE IF NOT EXISTS `kiddify`.`counter` (
  `id` INT NOT NULL,
  `key` VARCHAR(255) NULL,
  `counter` INT NULL,
  `video_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_counter_video1`
    FOREIGN KEY (`video_id`)
    REFERENCES `kiddify`.`video` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_counter_video1_idx` ON `kiddify`.`counter` (`video_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
