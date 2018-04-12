DROP SCHEMA IF EXISTS `surveys`;

CREATE SCHEMA IF NOT EXISTS `surveys` DEFAULT CHARACTER SET utf8 ;
USE `surveys` ;


CREATE TABLE IF NOT EXISTS `surveys`.`surveys` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey` VARCHAR(255) NOT NULL,
  `min_age` INT(11) NOT NULL,
  `max_age` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `surveys`.`types` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `surveys`.`questions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(255) NOT NULL,
  `type_id` INT(10) UNSIGNED NOT NULL,
  `survey_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `questions_survey_id_foreign`
    FOREIGN KEY (`survey_id`)
    REFERENCES `surveys`.`surveys` (`id`),
  CONSTRAINT `questions_type_id_foreign`
    FOREIGN KEY (`type_id`)
    REFERENCES `surveys`.`types` (`id`));

CREATE TABLE IF NOT EXISTS `surveys`.`answers` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `answer` VARCHAR(255) NOT NULL,
  `question_id` INT(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `answers_question_id_foreign`
    FOREIGN KEY (`question_id`)
    REFERENCES `surveys`.`questions` (`id`));


