-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema croche
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema croche
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `croche` DEFAULT CHARACTER SET utf8mb3 ;
USE `croche` ;

-- -----------------------------------------------------
-- Table `croche`.`blog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`blog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Video` LONGTEXT NOT NULL,
  `Titulo` VARCHAR(255) NOT NULL,
  `Descricao` LONGTEXT NOT NULL,
  `imagem` LONGTEXT NOT NULL,
  `Status` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`blog-etapas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`blog-etapas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(255) NOT NULL,
  `Descricao` LONGTEXT NOT NULL,
  `Blog` INT NOT NULL,
  `Status` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`home`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`home` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Imagem-1` VARCHAR(255) NOT NULL,
  `Imagem-2` VARCHAR(255) NOT NULL,
  `Texto-1` LONGTEXT NOT NULL,
  `Texto-2` LONGTEXT NOT NULL,
  `Texto-3` LONGTEXT NOT NULL,
  `Titutlo-1` VARCHAR(255) NOT NULL,
  `Titutlo-2` VARCHAR(255) NOT NULL,
  `Titutlo-3` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`carousel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`carousel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Imagem` VARCHAR(255) NOT NULL,
  `Home_idHome` INT NOT NULL,
  PRIMARY KEY (`id`, `Home_idHome`),
  INDEX `fk_Carousel_Home_idx` (`Home_idHome` ASC) VISIBLE,
  CONSTRAINT `fk_Carousel_Home`
    FOREIGN KEY (`Home_idHome`)
    REFERENCES `croche`.`home` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`carrinho` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Produto` INT NOT NULL,
  `Usuario` INT NOT NULL,
  `Quantidade` INT NOT NULL,
  `Preco` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Categoria` VARCHAR(255) NOT NULL,
  `Descricao` LONGTEXT NOT NULL,
  `Status` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`fale-conosco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`fale-conosco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(255) NOT NULL,
  `Imagem` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(255) NOT NULL,
  `Descricao` LONGTEXT NOT NULL,
  `imagem` LONGTEXT NOT NULL,
  `Preco` DOUBLE NOT NULL,
  `Categoria` INT NOT NULL,
  `Status` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`sobrenos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`sobrenos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(255) NOT NULL,
  `Texto` LONGTEXT NOT NULL,
  `Visao` LONGTEXT NOT NULL,
  `Missao` LONGTEXT NOT NULL,
  `Valores` LONGTEXT NOT NULL,
  `Imagem` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `nivel` INT NOT NULL,
  `statusRegistro` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `croche`.`usuariorecuperasenha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `croche`.`usuariorecuperasenha` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `chave` VARCHAR(250) NOT NULL,
  `statusRegistro` INT NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY USING BTREE (`id`),
  INDEX `FK1_usuariorecuperacaosenha` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `FK1_usuariorecuperacaosenha`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `croche`.`usuario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
