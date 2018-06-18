-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Nov-2013 às 17:26
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `realce`
--
CREATE DATABASE IF NOT EXISTS `realce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `realce`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE IF NOT EXISTS `agendamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero` double DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `ok` tinyint(4) NOT NULL DEFAULT '0',
  `data` date NOT NULL,
  `hora` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `nome`, `endereco`, `numero`, `bairro`, `telefone`, `email`, `descricao`, `ok`, `data`, `hora`) VALUES
(10, 'LUÍS RAFAEL ZANIBONI MALANDRIN', 'RUA DR JOÃO PEREIRA DA CUNAH', 373, 'PENHA RIO DO PEIXE', '38638506', 'rafaelmalandrin@hotmail.com', 'Quero fazer um toldo em uma loja', 0, '2013-11-08', '10:00'),
(14, 'WESLEY CARDOSO', 'RUA MARIO BALDASSIM', 197, 'DELLA ROCHA', '19-9-9814-7415', 'wesley_maximo@hotmail.com', 'Orçamento de forro PVC.', 0, '2013-11-08', '09:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faleconosco`
--

CREATE TABLE IF NOT EXISTS `faleconosco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `texto` text NOT NULL,
  `ok` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `faleconosco`
--

INSERT INTO `faleconosco` (`id`, `email`, `texto`, `ok`) VALUES
(5, 'wesley_maximo@hotmail.com', 'Boa noite. Gostaria de ser revendedor.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `valor` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `comentario`, `valor`) VALUES
(78, 'Mesa simples', '180,00'),
(80, 'Resma de Chamex', '30,00'),
(81, 'Mesa Simples Acabamento Azul', '180,00'),
(82, 'Ventilador FAET', '40,00'),
(83, 'Mesa de Canto', '240,00'),
(85, 'Poltrona Simples', '80,00'),
(86, 'Ventilador Qualitas Médio', '80,00'),
(87, 'Ventilador de Teto', '150,00'),
(88, 'Ventilador P/ Escritório Base Alta', '120,00'),
(89, 'Luminária de Mesa', '20,00'),
(90, 'Ventilador Qualitas Comercial P/ Parede', '180,00'),
(91, 'Mouse Bright Óptico', '20,00'),
(92, 'Mouse Óptico', '20,00'),
(93, 'Poltrona do Patrão', '220,00'),
(94, 'Cadeira de Espera 2 Lugares', '150,00'),
(95, 'Banquinhos para Balcão Preço Unitário', '60,00'),
(96, 'Arquivo P/ Escritório', '120,00'),
(97, 'Armário', '150,00'),
(98, 'Cadeira de Plástico', '20,00'),
(99, 'Prateleira Pequena', '80,00'),
(100, 'Ventilador de Mesa', '30,00'),
(101, 'Ventilador de Parede Branco', '150,00'),
(102, 'Ventilador de Teto', '300,00'),
(103, 'Cadeira de Praia', '30,00'),
(104, 'Mesa de 6 Lugares Para Refeitório', '450,00'),
(105, 'Estante de Computador Marrom', '200,00'),
(106, 'Estante de Computador Rosa', '200,00'),
(107, 'Cadeira de Espera 3 Lugares', '120,00'),
(108, 'Ventilador Qualitas Pedestal Longo', '130,00'),
(109, 'Estante de Computador Acabamento Azul', '150,00'),
(110, 'Ventilador de Teto Branco', '140,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `comentario`) VALUES
(12, 'Divisória C/ Vidro'),
(13, 'Forro Branco'),
(14, 'Persiana Desenhada'),
(15, 'Divisória Grande Com Vidro'),
(16, 'Toldo Transparente'),
(17, 'Toldo Para Loja'),
(18, 'Persiana'),
(19, 'Persiana Desenhada Para Criança'),
(20, 'Piso Xadrez'),
(21, 'Balcão Pequeno Para Loja'),
(22, 'Forro Cor Madeira'),
(23, 'Forro Cor Madeira Invernizada'),
(24, 'Forro Branco'),
(25, 'Persiana Lateral'),
(26, 'Persiana Grande'),
(27, 'Persiana Desenhada'),
(28, 'Divisória Grande Com Vidro'),
(29, 'Persiana Colorida'),
(30, 'Persiana Preta'),
(31, 'Persiana Duas Cores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(1, 'adm', '1029716');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
