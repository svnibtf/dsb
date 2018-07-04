-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: robb0254.publiccloud.com.br:3306
-- Generation Time: 19-Jun-2018 às 10:38
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institutoibtf1_ds_observatorio_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_obs`
--

CREATE TABLE `dados_obs` (
  `dbo_id` int(11) NOT NULL,
  `dbo_tit` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_user_id_insert` int(11) NOT NULL DEFAULT '0',
  `dbo_liberado` tinyint(4) NOT NULL DEFAULT '0',
  `dbo_estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_aluno_inn` tinyint(4) NOT NULL DEFAULT '0',
  `dbo_time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dbo_nome_post` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dbo_deletado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `dados_obs`
--

INSERT INTO `dados_obs` (`dbo_id`, `dbo_tit`, `dbo_autor`, `dbo_user_id_insert`, `dbo_liberado`, `dbo_estado`, `dbo_cidade`, `dbo_link`, `dbo_descricao`, `dbo_aluno_inn`, `dbo_time_in`, `dbo_nome_post`, `dbo_deletado`) VALUES
(1, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'www.mundodomarketing.com.br', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/oAiE2J ', 'Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 13:18:07', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_obs`
--
ALTER TABLE `dados_obs`
  ADD PRIMARY KEY (`dbo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_obs`
--
ALTER TABLE `dados_obs`
  MODIFY `dbo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
