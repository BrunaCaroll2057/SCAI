CREATE SCHEMA IF NOT EXISTS `scai` DEFAULT CHARACTER SET utf8 ;
USE `scai` ;

-- -----------------------------------------------------
-- Table `mydb`.`SETOR`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `scai`.`SETOR` (
-- `idSETOR` INT NOT NULL,
-- `ZOO` VARCHAR(45) NOT NULL,
-- PRIMARY KEY (`idSETOR`));

-- INSERT INTO SETOR VALUES (1,'ZOO 2');
-- INSERT INTO SETOR VALUES (2,'ZOO 3');
-- INSERT INTO SETOR VALUES (3,'EQUOTERAPIA');

DROP table setor;
-- DELETAR UMA TABELA

 SELECT * FROM SETOR;

-- -----------------------------------------------------
-- Table `mydb`.`VACINA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`VACINA` (
  `idVACINA` INT NOT NULL,
  `TIPO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idVACINA`));

INSERT INTO VACINA VALUES (111,'VACINA_VACA');
INSERT INTO VACINA VALUES (112,'VACINA_PORCO');
INSERT INTO VACINA VALUES (113,'VACINA_CAVALO');
INSERT INTO VACINA VALUES (114,'VACINA_OVELHA');

 SELECT * FROM VACINA;

-- -----------------------------------------------------
-- Table `scai`.`RACAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`RACAO` (
  `idRACAO` INT NOT NULL,
  `TIPO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRACAO`));
  
  INSERT INTO RACAO VALUES (101,'RACAO-BOVINO');
  INSERT INTO RACAO VALUES (102,'RACAO-SUINO');
  INSERT INTO RACAO VALUES (103,'RACAO-CAVALO');
  INSERT INTO RACAO VALUES (104,'RACAO-OVELHA');

DROP table SCAI.RACAO;
 SELECT * FROM RACAO;

-- -----------------------------------------------------
-- Table `scai`.`ESPECIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`ESPECIE` (
  `idESPECIE` INT primary KEY,
  `TIPO` VARCHAR(45) NOT NULL,
  `VACINA_idVACINA` INT NOT NULL,
  `RACAO_idRACAO` INT NOT NULL,
   FOREIGN KEY (`VACINA_idVACINA`) REFERENCES `scai`.`VACINA` (`idVACINA`),
   FOREIGN KEY (`RACAO_idRACAO`) REFERENCES `scai`.`RACAO` (`idRACAO`));
    
    DROP table SCAI.ESPECIE;
 
 INSERT INTO ESPECIE VALUES (01,'BOVINO',111,101);
 INSERT INTO ESPECIE VALUES (02,'PORCO',112,102);
 INSERT INTO ESPECIE VALUES (03,'CAVALO',113,103);
 INSERT INTO ESPECIE VALUES (04,'OVELHA',114,104);
 
 SELECT * FROM ESPECIE;
-- -----------------------------------------------------
-- Table `scai`.`ANIMAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`ANIMAL` (
  `idANIMAL` INT AUTO_INCREMENT primary KEY,
  `GENERO` VARCHAR(45) NOT NULL,
  `IDADE` INT NOT NULL,
  `DT_NASCIMENTO` DATE NOT NULL,
  `ULT_VERMIFUGACAO` DATE NULL,
  `PROX_VERMIFUGACAO` DATE NOT NULL,
  `MEDICACAO` VARCHAR(45) NULL,
  `HORA_ALIMENTACAO` VARCHAR(45) NULL,
  `RACA` VARCHAR(45) NOT NULL,
  `SETOR_idSETOR` INT NOT NULL,
  `ESPECIE_idESPECIE` INT NOT NULL,
    FOREIGN KEY (`SETOR_idSETOR`) REFERENCES `scai`.`SETOR` (`idSETOR`),
    FOREIGN KEY (`ESPECIE_idESPECIE`) REFERENCES `scai`.`ESPECIE` (`idESPECIE`));

SELECT * FROM ANIMAL;

-- -----------------------------------------------------
-- Table `mydb`.`user_form`
-- -----------------------------------------------------

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

alter table `user_form`
add column tipo varchar(250);
ALTER TABLE user_form ADD COLUMN aprovado TINYINT(1) DEFAULT 0;

INSERT INTO user_form (name, email, password, image, tipo, aprovado)
VALUES ('Administrador', 'admin@scai.com', '$2y$10$vZl9Wxx27COLtSIMfWWxiOjadZ0BpwiIs4.dfBEzk5a.3i7qmDfJ.', 'default-avatar.png', 'admin', 1);

SET SQL_SAFE_UPDATES = 0;
DELETE FROM user_form WHERE email = 'brunacaroll2057@gmail.com';

UPDATE user_form 
SET password = '$2y$10$ajcFx34WcVpOD3kOhSW71u2vdUmWYTqHPh9TDt9byeRa8gtTBypL2' 
WHERE email = 'admin@scai.com';

UPDATE user_form
SET password = '$2b$12$DbPHSg2UtKxgwvo1Ht/JCOPEbu2QG3iCF51YzWl/TRTC70G6KAYB.'
WHERE id = 1;

SELECT id, name, email, tipo, aprovado FROM user_form;

select * from user_form;

alter table `user_form`
add column tipo varchar(250);
ALTER TABLE user_form ADD COLUMN aprovado TINYINT(1) DEFAULT 0;

UPDATE user_form 
SET password = '$2y$10$tmqaCwNI3wCanVvTOwywouz4JK.ZuuByDvJihOJEB0VrV9xHKsO1y'
WHERE email = 'admin@scai.com';

SET SQL_SAFE_UPDATES = 0;

-- -----------------------------------------------------
-- Tabelas de raça
-- -----------------------------------------------------

drop table if exists reproducao_suino;

create table reproducaosuino (
    id int not null auto_increment,
    nporca varchar(50) not null,          
    raca varchar(50) not null,
    dt_nascimento date not null,
    macho varchar(45) not null,
    dt_provparto date not null,
    dt_parto date not null,
    vivos int not null,
    natimortos int not null,
    mumificados int not null,
    causa varchar(500),
    dt_desmama date not null,
    ndesmamas int not null,
    primary key (id)
);
