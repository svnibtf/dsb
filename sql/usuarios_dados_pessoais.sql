-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07-Jun-2018 às 12:31
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
-- Database: `prova10_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_dados_pessoais`
--

CREATE TABLE `usuarios_dados_pessoais` (
  `udp_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `end_inicial` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cid_inicial` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `genero` int(11) NOT NULL,
  `gaming` tinyint(4) NOT NULL DEFAULT '0',
  `data_acesso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_acesso_inicial` datetime NOT NULL,
  `info_inicial` int(11) NOT NULL DEFAULT '0',
  `end_rua` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Endereço',
  `end_num` int(11) NOT NULL DEFAULT '0',
  `end_compl` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Compl',
  `pais` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Brasil',
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Estado',
  `municipio` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Municipio',
  `tel_cel` varchar(13) COLLATE utf8_unicode_ci DEFAULT '0',
  `tel_com` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `data_nasc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_cep` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dados pessoais';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios_dados_pessoais`
--
ALTER TABLE `usuarios_dados_pessoais`
  ADD PRIMARY KEY (`udp_id`),
  ADD UNIQUE KEY `usu_id` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios_dados_pessoais`
--
ALTER TABLE `usuarios_dados_pessoais`
  MODIFY `udp_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
