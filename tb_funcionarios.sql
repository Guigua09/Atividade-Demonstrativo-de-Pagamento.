-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Out-2025 às 23:35
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `folha_pagto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionarios`
--

CREATE TABLE IF NOT EXISTS `tb_funcionarios` (
  `N_Registro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Funcionario` varchar(150) NOT NULL,
  `data_admissao` date NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `qtde_salarios` int(11) NOT NULL,
  `salario_bruto` decimal(10,2) NOT NULL,
  `inss` decimal(10,2) NOT NULL,
  `salario_liquido` decimal(10,2) NOT NULL,
  PRIMARY KEY (`N_Registro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_funcionarios`
--

INSERT INTO `tb_funcionarios` (`N_Registro`, `Nome_Funcionario`, `data_admissao`, `cargo`, `qtde_salarios`, `salario_bruto`, `inss`, `salario_liquido`) VALUES
(1, 'Diego Alencar', '2025-09-24', 'Ajudante Geral', 1, '1850.30', '203.53', '1646.77'),
(2, 'Moquidesia', '2025-09-21', 'Ajudante Geral', 1, '1850.30', '203.53', '1646.77'),
(3, 'Fernanda Souza', '2025-10-22', 'Professora', 2, '2509.32', '276.03', '2233.29'),
(4, 'Odete Silva', '2022-02-03', 'CEO', 5, '12000.87', '1320.10', '10680.77'),
(5, 'Jorge Tavares', '2025-07-09', 'Auxiliar', 2, '1200.00', '0.00', '1200.00'),
(6, 'Gabriel Silva', '2024-02-29', 'Professor', 2, '2500.00', '275.00', '2225.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
