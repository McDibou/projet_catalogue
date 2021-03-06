-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `catalogue`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(60) NOT NULL,
  `password_user` VARCHAR(255) NOT NULL,
  `key_user` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `name_user_UNIQUE` (`name_user` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.article` (
  `id_article` INT NOT NULL AUTO_INCREMENT,
  `title_article` VARCHAR(80) NOT NULL,
  `price_article` DECIMAL(10,2) NOT NULL,
  `promo_article` TINYINT NOT NULL,
  `show_article` TINYINT NOT NULL,
  `date_article` TIMESTAMP NOT NULL,
  `date_promo_article` TIMESTAMP NULL,
  `content_article` TINYTEXT NULL,
  PRIMARY KEY (`id_article`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`img`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.img` (
  `id_img` INT NOT NULL AUTO_INCREMENT,
  `name_img` VARCHAR(80) NOT NULL,
  `desc_img` TINYTEXT NULL,
  `fkey_id_article` INT NOT NULL,
  PRIMARY KEY (`id_img`),
  INDEX `fk_img_article_idx` (`fkey_id_article` ASC) ,
  CONSTRAINT `fk_img_article`
    FOREIGN KEY (`fkey_id_article`)
    REFERENCES `catalogue`.`catalog.article` (`id_article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.category` (
  `id_category` INT NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(80) NOT NULL,
  `desc_category` TINYTEXT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`shop`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.shop` (
  `id_shop` INT NOT NULL AUTO_INCREMENT,
  `name_shop` VARCHAR(80) NOT NULL,
  `localisation_shop` VARCHAR(255) NOT NULL,
  `ville_shop` VARCHAR(80) NOT NULL,
  `desc_shop` TINYTEXT NULL,
  PRIMARY KEY (`id_shop`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`category_has_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`catalog.category_has_article` (
  `fkey_id_category` INT NOT NULL,
  `fkey_id_article` INT NOT NULL,
  PRIMARY KEY (`fkey_id_category`, `fkey_id_article`),
  INDEX `fk_category_has_article_article1_idx` (`fkey_id_article` ASC) ,
  INDEX `fk_category_has_article_category1_idx` (`fkey_id_category` ASC) ,
  CONSTRAINT `fk_category_has_article_category1`
    FOREIGN KEY (`fkey_id_category`)
    REFERENCES `catalogue`.`catalog.category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_has_article_article1`
    FOREIGN KEY (`fkey_id_article`)
    REFERENCES `catalogue`.`catalog.article` (`id_article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
