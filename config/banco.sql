CREATE SCHEMA IF NOT EXISTS `scai` DEFAULT CHARACTER SET utf8 ;
USE `scai` ;

-- -----------------------------------------------------
-- Table `mydb`.`SETOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`SETOR` (
  `idSETOR` INT NOT NULL,
  `ZOO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSETOR`));

INSERT INTO SETOR VALUES (1,'ZOO 2');
INSERT INTO SETOR VALUES (2,'ZOO 3');
INSERT INTO SETOR VALUES (3,'EQUOTERAPIA');

DROP table SCAI.SETOR;
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
-- Table `mydb`.`FUNCIONARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scai`.`FUNCIONARIO` (
  `idFUNCIONARIO` INT NOT NULL PRIMARY KEY,
  `NOME` VARCHAR(45) NOT NULL,  
  `CPF` INT NOT NULL,
  `EMAIL` VARCHAR(45) NOT NULL,
  `TELEFONE` INT NOT NULL,
  `DT_NASCIMENTO` DATE NOT NULL,
  `ESTADO` VARCHAR(45) NOT NULL, -- tirar da tabela
  `CIDADE` VARCHAR(45) NOT NULL,
  `SENHA` VARCHAR(45) NOT NULL);

select * from FUNCIONARIO;

CREATE TABLE USUARIOS(
	id int not null primary key,
    nome varchar(50),
    usuario varchar(50),
    email varchar(50),
    senha varchar(50));
    
    select * from USUARIOS;
