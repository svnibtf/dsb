-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 08-Jun-2018 às 13:50
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accbr_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `cod_estados` int(11) DEFAULT NULL,
  `sigla` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`cod_estados`, `sigla`, `nome`) VALUES
(1, 'AC', 'ACRE'),
(2, 'AL', 'ALAGOAS'),
(3, 'AP', 'AMAPÁ'),
(4, 'AM', 'AMAZONAS'),
(5, 'BA', 'BAHIA'),
(6, 'CE', 'CEARÁ'),
(7, 'DF', 'DISTRITO FEDERAL'),
(8, 'ES', 'ESPÍRITO SANTO'),
(9, 'RR', 'RORAIMA'),
(10, 'GO', 'GOIÁS'),
(11, 'MA', 'MARANHÃO'),
(12, 'MT', 'MATO GROSSO'),
(13, 'MS', 'MATO GROSSO DO SUL'),
(14, 'MG', 'MINAS GERAIS'),
(15, 'PA', 'PARÁ'),
(16, 'PB', 'PARAÍBA'),
(17, 'PR', 'PARANÁ'),
(18, 'PE', 'PERNAMBUCO'),
(19, 'PI', 'PIAUÍ'),
(20, 'RJ', 'RIO DE JANEIRO'),
(21, 'RN', 'RIO GRANDE DO NORTE'),
(22, 'RS', 'RIO GRANDE DO SUL'),
(23, 'RO', 'RONDÔNIA'),
(24, 'TO', 'TOCANTINS'),
(25, 'SC', 'SANTA CATARINA'),
(26, 'SP', 'SÃO PAULO'),
(27, 'SE', 'SERGIPE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
