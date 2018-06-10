-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 08-Jun-2018 às 11:25
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
-- Database: `admin_ds_observatorio_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Aluno',
  `sobrenome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Sobrenome',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissao_id` int(11) NOT NULL DEFAULT '10',
  `responsavel` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `first` tinyint(4) NOT NULL DEFAULT '0',
  `deletado` int(2) NOT NULL DEFAULT '0',
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `nome`, `sobrenome`, `email`, `senha`, `permissao_id`, `responsavel`, `avatar`, `first`, `deletado`, `code`, `ativado`) VALUES
(1, NULL, 'Hamilton', 'Silva', 'hsfradinho@gmail.com', 'e10adc3949ba59abbe56e057f20f883k', 100, 0, '0', 1, 0, '0', 0),
(2, NULL, 'Hamilton', 'Silva', 'hsfradinho@gmail.com2', 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 0, 0, '0', 0),
(100, NULL, 'Teste Ramos Coimbra', '0', 'teste@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 1, 0, '0', 0),
(101, NULL, 'Hamilton', 'Silva', 'hsfradinho@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 0, 0, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
