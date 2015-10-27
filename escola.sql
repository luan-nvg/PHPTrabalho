-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2015 às 02:33
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `escola`
--
create database escola;
use escola;
-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `vchNome` varchar(100) NOT NULL,
  `vchTelefone` varchar(20) NOT NULL,
  `vchEmaill` varchar(100) DEFAULT NULL,
  `vchCPF` varchar(16) NOT NULL,
  `bolSexo` tinyint(1) NOT NULL,
  `tnyEstadoCivil` tinyint(4) NOT NULL,
  `intMatricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='minha primeira tabela' AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `vchNome`, `vchTelefone`, `vchEmaill`, `vchCPF`, `bolSexo`, `tnyEstadoCivil`, `intMatricula`) VALUES
(1, 'Jeferson', '71-83377911', 'jefersonoliver97@hotmail.com', '046.722.955-40', 1, 1, 123456),
(2, 'Carlos', '71-81568520', 'carlos@hotmail.com', '046.722.555-45', 1, 3, 654321),
(3, 'Maria', '71-99635844', 'maria@hotmail.com', '055.888.444-45', 0, 2, 223365),
(4, 'Alane', '123', 'alane@alane', '3456', 1, 1, 12323),
(5, 'alane Mota', '123', 'alane@alane', '4567', 0, 1, NULL),
(6, 'Luan Santana', '34345', 'lua@nsantana', '93635678', 1, 1, NULL),
(7, 'Luan goes', '34345', 'lua@nsantana', '93635678', 1, 1, NULL),
(8, 'Luane goes', '34345', 'lua@nsantana', '93635678', 1, 1, 20158),
(9, 'william', '1604199', 'w.brittoo@hotmail.com', '03652147895', 1, 1, 20159),
(10, 'alllaaaaannneee', '147823685', 'alanexatinha@hotmail.com', '01452366977', 0, 2, 201510),
(11, 'dcd', '256354', 'w.brittoo@hotmail.com', '534654', 1, 1, 201511),
(15, 'Guilherme', '336750', 'g.lherme@hotmail.com', '050521567720', 1, 1, 201515),
(16, 'Guilherme', '336750', 'g.lherme@hotmail.com', '050521567720', 1, 1, 201516),
(17, 'Lucas', '12348', 'l.cas@hotmail.com', '654123', 1, 3, 201517),
(18, 'Marcos Paim', '45879', 'p.marcos@hotmail.com', '658723', 1, 4, 201518);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadocivil`
--

CREATE TABLE IF NOT EXISTS `estadocivil` (
  `tnyEstado` tinyint(4) NOT NULL AUTO_INCREMENT,
  `vchDescricao` varchar(100) NOT NULL,
  PRIMARY KEY (`tnyEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `estadocivil`
--

INSERT INTO `estadocivil` (`tnyEstado`, `vchDescricao`) VALUES
(1, 'solteiro'),
(2, 'casado'),
(3, 'viuvo'),
(4, 'divorciado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
